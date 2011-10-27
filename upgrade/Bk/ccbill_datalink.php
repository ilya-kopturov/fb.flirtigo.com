<?
//die();
	//sleep(5*60);//make it sleep so we have 65mins between requests

	$GLOBALS['dbHost'] = "174.120.93.50";
	$GLOBALS['dbUsername'] = "root";
	$GLOBALS['dbPassword'] = "";
	$GLOBALS['dbDatabase'] = "hornybook";

	
	$res = mysql_connect($GLOBALS['dbHost'], $GLOBALS['dbUsername'], $GLOBALS['dbPassword']) or die("Could not connect to mysql!");
	$GLOBALS['db'] = mysql_select_db($GLOBALS['dbDatabase'],$res); 
	
	$startTime=date("YmdHis", mktime(date('H')-8,date('i'),date('s'),date('m'),date('d'),date('Y')));
	$endTime=date("YmdHis", mktime(date('H')-1,date('i'),date('s'),date('m'),date('d'),date('Y')));
	
	//$startTime = date("YmdHis"); $startTime = $startTime - 120000;//20051130010100
	//$endTime = date("YmdHis"); $endTime = $endTime - 10000;//20051130010100
	
	echo "Time interval: ".$startTime." - ".$endTime;

	$ch = curl_init();
	curl_setopt ($ch, CURLOPT_URL,"https://datalink.ccbill.com/data/main.cgi?startTime=$startTime&endTime=$endTime&transactionTypes=NEW,REBILL,REFUND,CHARGEBACK,EXPIRE,VOID&clientAccnum=934240&clientSubacc=0003&username=mac007&password=billyb55");
	curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt ($ch, CURLOPT_TIMEOUT, 20);
	curl_setopt ($ch, CURLOPT_FOLLOWLOCATION,1);
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
	$result = curl_exec ($ch);
	curl_close($ch);

	echo "Response:".$result;
	
	$lines = explode("\n",$result);
	
	foreach ($lines as $line) {
		if (strstr($line,"Authentication failed")) {
			break;
		}
		
		$elements = explode('","',$line);
		$elements[0]=substr($elements[0],1);
		
		switch ($elements[0]) {
			case 'NEW':
				echo "NEW!<br />";
				$clientAccNumber = mysql_escape_string($elements[1]);
				$clientSubaccNumber = mysql_escape_string($elements[2]);
				$subscriptionID = mysql_escape_string($elements[3]);
				$transactionTimestamp = mysql_escape_string($elements[4]);
				$firstName = mysql_escape_string($elements[5]);
				$lastName = mysql_escape_string($elements[6]);
				$username = mysql_escape_string($elements[7]);
				$password = mysql_escape_string($elements[8]);
				$address = mysql_escape_string($elements[9]);
				$city = mysql_escape_string($elements[10]);
				$state = mysql_escape_string($elements[11]);
				$postalcode = mysql_escape_string($elements[12]);
				$emailAddress = mysql_escape_string($elements[14]);
				$referer = mysql_escape_string($elements[15]);
				$active = mysql_escape_string($elements[16]);
				$initialAmount = mysql_escape_string($elements[17]);
				$initialPeriod = mysql_escape_string($elements[18]);
				$recurringAmount = mysql_escape_string($elements[19]);
				$recurringPeriod = mysql_escape_string($elements[20]);
				$noRebils = mysql_escape_string($elements[21]);
				
				//check if this NEW is added
				$checkIsNEW = "SELECT * FROM ccbill_all_ipn WHERE subscription_id='$subscriptionID'";
				$resCheckIsNEW = mysql_query($checkIsNEW) or die("Error: ".mysql_error()."<br />".$checkIsNEW);
				
				if ($resCheckIsNEW) {
					if (mysql_num_rows($resCheckIsNEW)>0) {
						//this is in database, do nothing
					} else {
						//we need to add it
						//get user ID=
						$userID = 0;

						$q1= "SELECT id FROM tblUsers WHERE screenname = '{$username}' AND pass = '{$password}'";
						$resUserID = mysql_query($q1) or die("can not select user"."<br />".mysql_error()."<br />".$q1);
						
						if ($resUserID && mysql_num_rows($resUserID)==1) {
							$rowUserId = mysql_fetch_object($resUserID);
							$userID = $rowUserId->id;
						}

						echo "User ID: ".$userID."<br />";
						$insertPayment = "INSERT INTO ccbill_all_ipn (customer_fname,customer_lname,email,
						username,password,userID,price,subscription_id,clientAccnum,clientSubacc,start_date,
						address1,city,state,zipcode,referer,initialPrice,initialPeriod,recurringPrice,recurringPeriod,rebills,
						isApproved,isDatalink,transactionDate)
						VALUES('$firstName','$lastName','$emailAddress','$username','$password',$userID,
						'DATALINK','$subscriptionID','$clientAccNumber','$clientSubaccNumber',now(),
						'$address','$city','$state','$postalcode','$referer','$initialAmount','$initialPeriod','$recurringAmount','$recurringPeriod','$noRebils',
						1,1,'$transactionTimestamp')";
						mysql_query($insertPayment) or die(mysql_error()."<br />".$insertPayment);
						
						/*
						if($initialAmount=='29.95') $updateUserAccess1 = "UPDATE tblUsers SET accesslevel ='1',upgraded=NOW() WHERE id = $userID";
							    else $updateUserAccess1 = "UPDATE tblUsers SET accesslevel ='2',upgraded=NOW() WHERE id = $userID";
					 	mysql_query($updateUserAccess1) or die("Can not update users access!");
					 	*/
					 	
						 
					}
				}
				break;
		
				case 'REBILL':
				echo "REBILL!<br />";
				$clientAccNumber = mysql_escape_string($elements[1]);
				$clientSubaccNumber = mysql_escape_string($elements[2]);
				$subscriptionID = mysql_escape_string($elements[3]);
				$transactionTimestamp = mysql_escape_string($elements[4]);
				$approvalCode = mysql_escape_string($elements[5]);
				$amount = substr(mysql_escape_string($elements[6]),0,-2);
				//see if it's inserted already
				$selectRebill = "SELECT * FROM ccbill_rebills WHERE subscription_id ='$subscriptionID'";
				$resRebill = mysql_query($selectRebill) or die("can not select old rebils " . mysql_error());
				
				if ($resRebill && mysql_num_rows($resRebill)==0) {
					$insertRebill = "INSERT INTO ccbill_rebills (subscription_id,clientAccnum,clientSubacc,transactionDate,approvalCode,amount)
					VALUES('$subscriptionID','$clientAccNumber','$clientSubaccNumber','$transactionTimestamp','$approvalCode','$amount')";
					mysql_query($insertRebill) or die(mysql_error()."<br />".$insertRebill);
				} else {
					echo "REBILL AVOIDED!<br />";
				}
				
				break;
				
				case 'CHARGEBACK':
				echo "CHARGEBACK!<br />";
				$clientAccNumber = mysql_escape_string($elements[1]);
				$clientSubaccNumber = mysql_escape_string($elements[2]);
				$subscriptionID = mysql_escape_string($elements[3]);
				$transactionTimestamp = mysql_escape_string($elements[4]);
				$amount = substr(mysql_escape_string($elements[5]),0,-2);
				//see if it's inserted already
				$selectChargeback = "SELECT * FROM ccbill_chargeback WHERE subscription_id ='$subscriptionID'";
				$resChargeback = mysql_query($selectChargeback) or die("can not select old chargebacks " . mysql_error());
				
				if ($resChargeback && mysql_num_rows($resChargeback)==0) {
					$insertChargeback = "INSERT INTO ccbill_chargeback (subscription_id,clientAccnum,clientSubacc,transactionDate,amount)
					VALUES('$subscriptionID','$clientAccNumber','$clientSubaccNumber','$transactionTimestamp','$amount')";
					mysql_query($insertChargeback) or die(mysql_error()."<br />".$insertChargeback);
					
					//select userID
						$selectUserId = "SELECT * FROM ccbill_all_ipn WHERE subscription_id = '{$subscriptionID}'";
						$resUserID = mysql_query($selectUserId);
						
						if ($resUserID && mysql_num_rows($resUserID)==1) {
							$rowUserId = mysql_fetch_object($resUserID);
							$userID = $rowUserId->userID;
							
							echo "Delete ccbill User ".$userID;
							$updateUserAccess1 = "UPDATE tblUsers SET accesslevel = 0 WHERE id = '".$userID."' and accesslevel>0";
						 	@mysql_query($updateUserAccess1);
						 	
						 	mail("chris@w2interactive.com", "Chargeback CCbill", $userID, "From: admin@flirtigo.com\r\n");
						}
					
				} else {
					echo "CHARGEBACK AVOIDED!<br />";
				}
				
				break;
				
				case 'REFUND':
				echo "REFUND!<br />";
				$clientAccNumber = mysql_escape_string($elements[1]);
				$clientSubaccNumber = mysql_escape_string($elements[2]);
				$subscriptionID = mysql_escape_string($elements[3]);
				$transactionTimestamp = mysql_escape_string($elements[4]);
				$amount = substr(mysql_escape_string($elements[5]),0,-2);
				//see if it's inserted already
				$selectRefund = "SELECT * FROM ccbill_refund WHERE subscription_id ='$subscriptionID'";
				$resRefund = mysql_query($selectRefund) or die("can not select old refunds " . mysql_error());
				
				if ($resRefund && mysql_num_rows($resRefund)==0) {
					$insertRefund = "INSERT INTO ccbill_refund (subscription_id,clientAccnum,clientSubacc,transactionDate,amount)
					VALUES('$subscriptionID','$clientAccNumber','$clientSubaccNumber','$transactionTimestamp','$amount')";
					mysql_query($insertRefund) or die(mysql_error()."<br />".$insertRefund);
					
					//select userID
						$selectUserId = "SELECT * FROM ccbill_all_ipn WHERE subscription_id = '{$subscriptionID}'";
						$resUserID = mysql_query($selectUserId);
						
						if ($resUserID && mysql_num_rows($resUserID)==1) {
							$rowUserId = mysql_fetch_object($resUserID);
							$userID = $rowUserId->userID;
							
							echo "Delete ccbill User ".$userID;
							$updateUserAccess1 = "UPDATE tblUsers SET accesslevel = 0 WHERE id = '".$userID."' and accesslevel>0";
						 	@mysql_query($updateUserAccess1);
						 	
						 	mail("chris@w2interactive.com", "Refund CCbill", $userID, "From: admin@flirtigo.com\r\n");
						}
					
				} else {
					echo "REFUND AVOIDED!<br />";
				}
				
				break;
				
				case 'VOID':
				echo "VOID!<br />";
				$clientAccNumber = mysql_escape_string($elements[1]);
				$clientSubaccNumber = mysql_escape_string($elements[2]);
				$subscriptionID = mysql_escape_string($elements[3]);
				$transactionTimestamp = mysql_escape_string($elements[4]);
				$amount = substr(mysql_escape_string($elements[5]),0,-2);
				//see if it's inserted already
				$selectVoid = "SELECT * FROM ccbill_void WHERE subscription_id ='$subscriptionID'";
				$resVoid = mysql_query($selectVoid) or die("can not select old voids " . mysql_error());
				
				if ($resVoid && mysql_num_rows($resVoid)==0) {
					$insertVoid = "INSERT INTO ccbill_void (subscription_id,clientAccnum,clientSubacc,transactionDate,amount)
					VALUES('$subscriptionID','$clientAccNumber','$clientSubaccNumber','$transactionTimestamp','$amount')";
					mysql_query($insertVoid) or die(mysql_error()."<br />".$insertVoid);
					
				} else {
					echo "VOID AVOIDED!<br />";
				}
				
				break;
				
				case 'EXPIRE':
					echo "EXPIRE!<br />";
					$clientAccNumber = mysql_escape_string($elements[1]);
					$clientSubaccNumber = mysql_escape_string($elements[2]);
					$subscriptionID = mysql_escape_string($elements[3]);
					$expireDate = mysql_escape_string($elements[4]);
					$cancelDate = mysql_escape_string($elements[5]);
					$transactionProcessionFailure = substr(str_replace(array("Y","N"),array(1,0),mysql_escape_string($elements[6])),0,-2);
					
					//see if it's inserted already
					$selectCancelation = "SELECT * FROM ccbill_cancelation WHERE subscription_id ='$subscriptionID'";
					$resCancelation = mysql_query($selectCancelation) or die("can not select old cancelations " . mysql_error());
					
					if ($resCancelation && mysql_num_rows($resCancelation)==0) {
						$insertCancelation  = "INSERT INTO ccbill_cancelation (subscription_id,clientAccnum,clientSubacc,transactionDate ,expireDate,cancelationDate,transactionProcessionFailure)
						VALUES('$subscriptionID','$clientAccNumber','$clientSubaccNumber',now(),'$expireDate','$cancelDate','$transactionProcessionFailure')";
						mysql_query($insertCancelation) or die(mysql_Error()."<br />".$insertCancelation);
						
						
						//select userID
						$selectUserId = "SELECT * FROM ccbill_all_ipn WHERE subscription_id = '{$subscriptionID}'";
						$resUserID = mysql_query($selectUserId);
						
						if ($resUserID && mysql_num_rows($resUserID)==1) {
							$rowUserId = mysql_fetch_object($resUserID);
							$userID = $rowUserId->userID;
							
							echo "Delete ccbill User ".$userID;
							$updateUserAccess1 = "UPDATE tblUsers SET accesslevel = 0 WHERE id = '".$userID."' and accesslevel>0";
						 	@mysql_query($updateUserAccess1);
						 	
						 	mail("chris@w2interactive.com", "Cancel CCbill", $userID, "From: admin@flirtigo.com\r\n");
						}
					} else  {
						echo "AVOIDED CANCELATION!<br />";
					}
				break;
			 	
			default:
				break;
		}
	}
	
	echo "\nDone";
?>
