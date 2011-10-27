<?php
#security
#this one sholud be edited//test cvs//

$allow_from[]='209.85.83.5';
$allow_from[]='209.85.83.2';
$allow_from[]='127.0.0.1';
$allow_from[]='67.15.23.67'; 
$allow_from[]='69.61.54.178';
$allow_from[]='127.0.0.1';
$allow_from[]='69.61.64.122';
//69.61.54.178 
//MPA3$enc_method = 'MD5'; 
//MD5|ENCRYPT|leave blank for unencrypted passwords
#comment the line above to allow access from all ips
#end securirty

######################### you should NOT edit any of these below######################
#script expects $CMD variable to get the data
#  format of the DSN# host|user|pass|database|tablename|username_field|password_field#

######################################################################################

$fp = @fopen("logAdp.txt","a");

$src = $_SERVER['REMOTE_ADDR'];
$ip_found = false;

foreach ($allow_from as $value){    
	if ($src == $value) 
	$ip_found = true;
}

if (!$ip_found){   
	print "wrong ip $src";   
	fwrite($fp,"wrong IP $src");
	die;
}

$credentials=array();
header("Content-type: text/plain");
$data_ar= explode(',',$_POST['data']);
$DSN=$data_ar[1];
$credentials=explode('|',$DSN);
//$host=$credentials[0];
$host="209.85.83.3";
$user=$credentials[1];
$pass=$credentials[2];
$db=$credentials[3];
$tablename=$credentials[4];
$username_field=$credentials[5];
$password_field=$credentials[6];
$data = $_POST['data'];


fwrite($fp,$data."\n");

if(!mysql_connect($host,$user,$pass)) {
	fwrite($fp,"can not connect to db : $host - $user - $pass");
	echo "MySQL error 1";exit;
}

if(!mysql_select_db($db)) {
	fwrite($fp,"can not select db : $db");
	echo "MySQL error 2";exit;
}

if($data_ar[0]=='CHECK' || $data_ar[0]=='DELETE'){    
	list($command, $ht_file, $user) = split(',',$data);    
	if(strlen($user) < 3) die;    
	if($data_ar[0]=='CHECK')    {        
		$sql = "select password from users where screen_name='$user'";        
		$q = mysql_query($sql);        
		$r = mysql_fetch_array($q);        
			if ($r[0])
				#found        
				print "FOUND";        
			else
				#not found        
				print "NOT_FOUND";    
	}    else    {
		#DELETE 
		//get ID
		$getID = "SELECT id FROM users WHERE screen_name='$user'";
		$resGetID = mysql_query($getID);
		       
		$userID = 0;
		if ($resGetID) {
			$rowGetID = mysql_fetch_object($resGetID);
			$userID = $rowGetID->id;
		}
		if ($userID!=0) {
			
			$sql = "UPDATE users SET access_level = 0 WHERE id='$userID'";        
			$q = mysql_query($sql);        
			if($q) {        
				print "DELETED (users) $user\n";
			}
			
			$sql = "UPDATE search SET access_level = 0 WHERE id='$userID'";        
			$q = mysql_query($sql);        
			if($q) {        
				print "DELETED (search) $user\n";
			}
			
			$sql = "INSERT INTO users_cancellations (userID,cancellationDate) VALUES('$userID',now())";
			mysql_query($sql);
			
			
			$sql = "DELETE FROM interests WHERE id = '$userID'";
			mysql_query($sql);
			
		}
		           
	}#DEL OR CHECK
} elseif($data_ar[0]=='ADD') {    
	
	list($command, $ht_file, $user, $password) = split(',',$data);  

	$getID = "SELECT id FROM users WHERE screen_name='$user'";
	$resGetID = mysql_query($getID) or die(fwrite($fp,mysql_error()."\n {$getID} \n"));
	      
	fwrite($fp,"Query: $getID \n");
 
	$userID = 0;
	if ($resGetID) {
		$rowGetID = mysql_fetch_object($resGetID);
		$userID = $rowGetID->id;
		fwrite($fp,"UserID: $userID \n");
	}
	
	if ($userID!=0) {
		$sql = "UPDATE search SET access_level = 1 WHERE id='$userID'";     
		$q = mysql_query($sql);     
		
		if(mysql_errno()==0) {     
			fwrite($fp,"ADDED(search) $user\n");     
		} else {     	
			fwrite($fp,"Can not ADD(search): ".mysql_error());     
		}        
		
		$sql = "UPDATE users SET access_level = 1 WHERE id='$userID'";     
		
		$q = mysql_query($sql) or die(fwrite($fp,mysql_error()."\n {$sql} \n"));     
		
		if(mysql_errno()==0) {     
			fwrite($fp, "ADDED(users) $user\n");     
		} else {     	
			fwrite($fp, "Can not ADD(users): ".mysql_error());     
		}

		$sql = "INSERT INTO interests (id) VALUES($userID)";
		mysql_query($sql); 
		fwrite($fp,"Interests added");
		
		$sql = "DELETE FROM users_cancellations WHERE userID='$userID'";
		mysql_query($sql);
	}

	fwrite($fp,"\n\n");
	fclose($fp);
} 

else echo "Unknown command\n";
?>