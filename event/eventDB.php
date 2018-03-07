<?php
//detail to login db
$user = 'root';
$pw = '';
$dbname = 'eventdotcom';

//setup timezone
date_default_timezone_set("Asia/Bangkok");
$dt = date("YmdHis",time());

include 'DBconnect.php';
$db = new DBconnect($dbname,$user,$pw);

//insert event ---------------------------------------------
if(isset($_POST['insertuser'])){
	$val = '(
		"'.$_POST["name"]		.'",
		"'.$_POST["desc"]		.'",
		"profile-pic",
		"'.$_POST["location"]	.'",
		"'.$_POST["limit"]		.'",
		"'.$_POST["type"]		.'",
		"'.$_POST["feedback"]	.'",
		'.$dt.',
		"'.$_POST["lat"]		.'",
		"'.$_POST["lng"]		.'")';

	$result = $db->insert('eventdetail','(name,description,profilepic,location,attendeeslimit,type,feedback,createddate,latitude,longitude)',$val);

	echo $result;
}

//query event  ---------------------------------------------
$name ="Not Found";
if (isset($_GET['id'])){
	$id = $_GET['id'];

	//get data from event and event detail
	$event = $db->select("*",'eventdetail',"WHERE eventid='".$id."'");

	if (!empty($event)){
		$name = $event[0]["name"];
		$desc = $event[0]["description"];
		$profilepic = $event[0]["profilepic"];
		$location = $event[0]["location"];
		$limit = $event[0]["attendeeslimit"];
		$type =  $event[0]["type"];
		$feedback =  $event[0]["feedback"];
		$price =  $event[0]["price"];
		$createddate =  $event[0]["createddate"];
		$lat =  $event[0]["latitude"];
		$lon = $event[0]["longitude"];
	}else{
		pageNotFound();
	}
}else {
	goToHomepage();
}

function pageNotFound(){
	echo "page not found";
}
function goToHomepage(){
	header('Location: index.php');
}


?>
