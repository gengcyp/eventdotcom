<?php
//detail to login db
$user = 'root';
$pw = '';
$dbname = 'eventdotcom';

//paht of this page
$path =  explode("/",$_SERVER['REQUEST_URI']);
$page = explode("?",$path[count($path)-1])[0];


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
		'.$dt.',
		"'.$_SESSION['uid']	.'"
		)';
		$result = $db->insert('eventdetail','(name,description,profilepic,location,latitude,longitude,attendeeslimit,price,preconditionid,started,finished,type,feedback,createddate,eventown)',$val);

		echo "insert<br>";
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


		echo "edit";
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
		$own = $event[0]["eventown"];

	}else{ // id not found
		goToHomepage();
	}
}else { // not set id in path
	if ($page != "newevent.php"){
		goToHomepage();
	}
}
function goToHomepage(){
	header('Location: index.php');
}
function findReserveUser($db,$eid,$uid){
		$event = $db->select("*",'reservations',"WHERE eventcode=".$eid." AND userid=".$uid);
		if ($event != NULL){
			echo "reserve";
		}else{
			echo "not";
		}
}
?>
