<?php
//detail to login db
$user = 'root';
$pw = '';

//setup timezone
date_default_timezone_set("Asia/Bangkok");
$dt = date("YmdHis",time());

//create connection to db
$connection = new PDO(
   'mysql:host=localhost:3306;dbname=eventdotcom;charset=utf8mb4',$user,$pw);

//insert to event_detail ,call from newevent.php
if(isset($_POST['insertuser'])){
$insertuser = $connection->prepare(
      'INSERT INTO event_detail(eventid,name,description,profilepic,location,attendeeslimit,type,feedback,createdtime,latitude,longitude) 
      VALUES (0,	-- id autoinc
      :n,:d,"profile-pic",:loc,:lim,:type,:feedback,:dt,:lat,:lng)' 
  );

$insertuser->execute(
	[':dt' => $dt,
	':n' => $_POST["name"],
	':d' => $_POST["desc"],
	':loc' => $_POST["location"],
	':lim' => $_POST["limit"],
	':feedback' => $_POST["feedback"],
	':type'	=> $_POST["type"],
  ':lat' => $_POST["lat"],
  ':lng' => $_POST["lng"]

	]
);
$results = $insertuser->fetchAll(PDO::FETCH_OBJ);
echo "last id : ".$connection->lastInsertId();



}
?>