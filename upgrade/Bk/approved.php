<?php

$dbhost = '174.120.93.50';
$dbusername = 'root';
$dbpasswd = '';
$database_name ='hornybook';

$connection = mysql_pconnect("$dbhost","$dbusername","$dbpasswd") or die ("Couldn't connect to server.");
$db = mysql_select_db("$database_name", $connection) or die("Couldn't select database.");


                 if(isset($_POST['subscription_id']))
			    {
			    $sqlsubid="select * from ccbill_post where subscription_id='".$_POST['subscription_id']."'";
				if(mysql_num_rows(mysql_query($sqlsubid))>0)
			        {
				// This subid is already inserted in db
				}
				else
				{
                                $insertPayment = "INSERT INTO ccbill_post (customer_fname,customer_lname,email,username,password,subscription_id,clientAccnum,clientSubacc,start_date,address1,city,state,zipcode,country,initialPrice,initialPeriod,recurringPrice,recurringPeriod,rebills,ip_address) VALUES('".$_POST['customer_fname']."','".$_POST['customer_lname']."','".$_POST['email']."','".$_POST['username']."','".$_POST['password']."','".$_POST['subscription_id']."','".$_POST['clientAccnum']."','".$_POST['clientSubacc']."',now(),'".$_POST['address1']."','".$_POST['city']."','".$_POST['state']."','".$_POST['zipcode']."','".$_POST['country']."','".$_POST['initialPrice']."','".$_POST['initialPeriod']."','".$_POST['recurringPrice']."','".$_POST['recurringPeriod']."','".$_POST['rebills']."','".$_POST['ip_address']."')";
				@mysql_query($insertPayment);

                		/*if($_POST['initialPrice']=='34.95') 
                            	    $updateUserAccess1 = "UPDATE tblUsers SET accesslevel ='2',upgraded=NOW() WHERE screenname='".$_POST['username']."' and pass='".$_POST['password']."'";
                    		else*/ 
                    		$updateUserAccess1 = "UPDATE tblUsers SET accesslevel ='2',upgraded=NOW() WHERE email='".$_POST['email']."'";
                        	     @mysql_query($updateUserAccess1);
						
				}
			    }
?>
