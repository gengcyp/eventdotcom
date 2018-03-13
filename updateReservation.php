<?php
	include "DBconnect.php";
	$user = 'root';
	$pw = '';
	$dbname = 'eventdotcom';
	$db = new DBconnect($dbname,$user,$pw);
	 if ($_POST["path"] == 'update'){
	
	$result  = $db->update("reservations", "reservestatus = 1","WHERE reservationid =".$_POST["entityId"]);
}
?>	