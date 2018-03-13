<?php
	include "DBconnect.php";
	$user = 'root';
	$pw = '';
	$dbname = 'eventdotcom';
	$db = new DBconnect($dbname,$user,$pw);
		 if ($_POST["path"] == 'delete'){
		
	 	$result  = $db->delete('reservationtransaction',"WHERE reserveid = ".$_POST["entityId"]);
	 	$result  = $db->delete('reservations',"WHERE reservationid = ".$_POST["entityId"]);	
	 	
	 }	
?>	