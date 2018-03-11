<?php
//detail to login db
$user = 'root';
$pw = '';
$dbname = 'eventdotcom';

//setup timezone
date_default_timezone_set("Asia/Bangkok");
$dt = date("YmdHis",time());

// include 'DBconnect.php';
$db = new DBconnect($dbname,$user,$pw);

//insert event ---------------------------------------------
//check button submit in newevent.php
if(isset($_POST['insert'])){
	$val = '(
		"'.$_POST["name"]		.'",
		"'.$_POST["desc"]		.'",
		"profile-pic",
		"'.$_POST["location"]	.'",
		"'.$_POST["lat"]		.'",
		"'.$_POST["lng"]		.'",
		"'.$_POST["limit"]		.'",
		"'.$_POST["price"]		.'",
		"'.$_POST["precon"]		.'",
		"'.$_POST["ds"]	." ".$_POST["ts"]		.'",
		"'.$_POST["df"]	." ".$_POST["tf"]		.'",
		"'.$_POST["type"]		.'",
		"'.$_POST["feedback"]	.'",
		'.$dt.'
		)';
		$result = $db->insert('eventdetail','(name,description,profilepic,location,latitude,longitude,attendeeslimit,price,preconditionid,started,finished,type,feedback,createddate)',$val);

		// header("Location:event.php?id=".$result);
}
//edit event ---------------------------------------------
//check button submit in editevent.php
if(isset($_POST['edit'])){
	$val = '
		name=	"'.$_POST["name"]		.'",
		description= "'.$_POST["desc"]		.'",
		profilepic= "profile-pic",
		location= "'.$_POST["location"]	.'",
		latitude= "'.$_POST["lat"]		.'",
		longitude= "'.$_POST["lng"]		.'",
		attendeeslimit ="'.$_POST["limit"]		.'",
		price= "'.$_POST["price"]		.'",
		preconditionid= "'.$_POST["precon"]		.'",
		started= "'.$_POST["ds"]	." ".$_POST["ts"]		.'",
		finished= "'.$_POST["df"]	." ".$_POST["tf"]		.'",
		type= "'.$_POST["type"]		.'",
		feedback= "'.$_POST["feedback"]	.'"
		';
		$result = $db->update('eventdetail',$val,"WHERE eventid=".$_GET['id']);

		// header("Location:event.php?id=".$_GET['id']);

}


//show event  ---------------------------------------------
//set initial value
$name ="Not Found";
$desc = $profilepic = $location = $type = $feedback  = $createddate = "";
$lat = $lon = $price = $limit = 0;

//get id from method get
if (isset($_GET['id'])){
	$id = $_GET['id'];

	//get data from event and event detail
	$event = $db->select("*",'eventdetail',"WHERE eventid=".$id);

	if (!empty($event)){
		$name = $event[0]["name"];
		$desc = $event[0]["description"];
		$profilepic = $event[0]["profilepic"];
		$location = $event[0]["location"];
		$lat =  $event[0]["latitude"];
		$lon = $event[0]["longitude"];
		$limit = $event[0]["attendeeslimit"];
		$price =  $event[0]["price"];
		$precon = $event[0]["preconditionid"];//
		$started = $event[0]["started"];//
		$finished= $event[0]["finished"];//
		$type =  $event[0]["type"];
		$feedback =  $event[0]["feedback"];

	}else{ // id not found
		pageNotFound();
	}
}else { // not set id in path
	// goToHomepage();
	echo 'error';
}

function pageNotFound(){
	echo "page not found";
}
function goToHomepage(){
	header('Location: index.php');
}


?>
