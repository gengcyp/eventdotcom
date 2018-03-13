<?php
	include "DBconnect.php";
	$user = 'root';
	$pw = '';
	$dbname = 'eventdotcom';
	$db = new DBconnect($dbname,$user,$pw);
		 if ($_POST["path"] == 'delete'){
		
	 	$result  = $db->delete('reservationtransaction',"WHERE reserveid = ".$_POST["entityId"]);
	 	$result  = $db->delete('reservations',"WHERE reservationid = ".$_POST["entityId"]);	

	$userid = $db->select("userid",'reservations',"WHERE reservationid =".$_POST["entityId"]);
    $email = $db->select("email",'users',"WHERE userid =".$userid[0][0]);
    $eventcode = $db->select("eventcode","reservations","WHERE reservationid =".$_POST["entityId"];)
    $eventname = $db->select("eventname","eventdetail","WHERE eventid =".$eventcode[0][0]);

    $to      = $email[0][0];
	$subject = 'Your Transaction of Event '.$eventname[0][0].' has been rejected';
	$message = 'Your Transaction of Event '.$eventname[0][0].' has been rejected';
	$headers = 'From: codehere@event.com';

	mail($to, $subject, $message, $headers);
	 }	
?>	