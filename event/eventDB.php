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

//use DBconnect.php

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

// //create connection to db
// $connection = new PDO(
//    'mysql:host=localhost:3306;dbname='.$dbname.';charset=utf8mb4',$user,$pw);

// //insert to event_detail ,call from newevent.php
// if(isset($_POST['insertuser'])){
// $insertuser = $connection->prepare(
//       'INSERT INTO eventdetail(eventid,name,description,profilepic,location,attendeeslimit,type,feedback,createddate,latitude,longitude) 
//       VALUES (0,	-- id autoinc
//       :n,:d,"profile-pic",:loc,:lim,:type,:feedback,:dt,:lat,:lng)' 
//   );

// $insertuser->execute(
// 	[':dt' 	=> $dt,
// 	':n' 	=> $_POST["name"],
// 	':d' 	=> $_POST["desc"],
// 	':loc' 	=> $_POST["location"],
// 	':lim' 	=> $_POST["limit"],
// 	':feedback' => $_POST["feedback"],
// 	':type'	=> $_POST["type"],
//  ':lat' 	=> $_POST["lat"],
//  ':lng' 	=> $_POST["lng"]
// 	]
// );
// $results = $insertuser->fetchAll(PDO::FETCH_OBJ);
// echo "last id : ".$connection->lastInsertId();
// }
?>