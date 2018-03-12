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

		$lastid = $db->insertGetLast('eventdetail','(eventname,description,profilepic,location,latitude,longitude,attendeeslimit,price,preconditionid,started,finished,type,feedback,createddate,eventown)',$val);

		// echo $lastid;
}
//edit event ---------------------------------------------
//check button submit in editevent.php
if(isset($_POST['edit'])){
	$val = '
		eventname=	"'.$_POST["name"]		.'",
		description= "'.$_POST["desc"]		.'",
		profilepic= "profile-pic",
		location= "'.$_POST["location"]	.'",
		latitude= "'.$_POST["lat"]		.'",
		longitude= "'.$_POST["lng"]		.'",
		attendeeslimit ='.$_POST["limit"]		.',
		price= '.$_POST["price"]		.',
		preconditionid= '.$_POST["precon"]		.',
		started= "'.$_POST["ds"]	." ".$_POST["ts"]		.'",
		finished= "'.$_POST["df"]	." ".$_POST["tf"]		.'",
		type= "'.$_POST["type"]		.'",
		feedback= "'.$_POST["feedback"]	.'"
		';
		$result = $db->update('eventdetail',$val,"WHERE eventid=".$_GET['id']);


}


//show event  ---------------------------------------------

//get id from method get
if (isset($_GET['id'])){
	$id = $_GET['id'];

	//get data from event and event detail
	$event = $db->select("*",'eventdetail',"WHERE eventid=".$id);

	if (!empty($event)){
		$name = $event[0]["eventname"];
		$desc = $event[0]["description"];
		$profilepic = $event[0]["profilepic"];
		$location = $event[0]["location"];
		$lat =  $event[0]["latitude"];
		$lon = $event[0]["longitude"];
		$limit = $event[0]["attendeeslimit"];
		$price =  $event[0]["price"];
		$preconid = $event[0]["preconditionid"];//
		if ($preconid==0 || $preconid==NULL){
			$precon="";
		}else{
			$precon = $db->select('name','eventdetail','WHERE eventid='.$preconid)[0]['name'];
		}
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
		//use in event.php to show button reserve
		if ($event != NULL){
			echo "reserve";
		}else{
			echo "not";
		}
}
function loadSlidePic($db,$eid){
	$pic = $db->select('picture','detailpictures','WHERE eventid='.$eid);
	return $pic;
}
function uploadAlbum($db,$eid,$pathpic){
	$db->insertGetLast('detailpictures',
	'(eventid,picture)',
	'('.$eid.',"'.$pathpic.'")');
}
?>
