<!DOCTYPE html>
<?php
include 'header.php';
include 'eventDB.php';
// include 'showmap.php';
include 'positiongmap.php';

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
<link rel="stylesheet" href="theme_editevent.css" type="text/css">
<script type="text/javascript">
	//session
	//check this user is event owner
	<?php
	if (in_array("uid",$_SESSION)){
		$uid = $_SESSION['uid'];
	}else{
		$uid = 0;
	}
	 ?>
	if ("<?php echo $uid; ?>"=="<?php echo $own ?>"){   //session ok
		$("#edit").show();
	}else {  //this user is not event own

	}
	//check this user is reserve event
	var r = "<?php findReserveUser($db,$id,$uid); ?>";

	if ("<?php echo $user_type ?>"=="organizer"){//organizer user
		//***hide reserve button
	}else	if (r == "reserve"){		//this user is reserved
		//***hide reserve button
	}else if (r=="not"){				//this user isn't reserved
		$("#reserve").show();
	}

</script>

<html>
<head>
	<title><?php echo $name ?></title>
	<style>
		 #map {
			height: 400px;
			align: "center";
		 }
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
	<!-- <img id=profile height="300" width="300" src="<?php echo $profilepic ?>"></img> -->
	<h1 id=name style="text-align:center"> <?php echo $name; ?></h1>
	<img id=profilepic> </img>
	<?php
		$pic = loadSlidePic($db,$id);
		// $caption = array();
		include 'slidepic.php' ?><br>
	<p id=location style="text-align:center">
		<img src="https://cdn4.iconfinder.com/data/icons/pictype-free-vector-icons/16/location-alt-24.png"></img>
		<?php echo $location; ?>
	</p>
	<div id="map"></div>
	<script type="text/javascript">
	//show or hide map
	// if ((latitude == 0) && (longitude == 0)){
	// 	$('#map').hide();
	// }
	</script>
	<p id=desc> <?php echo $desc; ?></p>
	<?php
	if ($price!=0){
		echo '<h2>Price '.$price.' Baht</h2><br>';
	}else{
		echo '<h2>Free Event!!</h2><br>';
	}
	if ($limit!=0){
		echo '<h2>Limit '.$limit.' </h2><br>';
	}else{
		echo '<h2></h2><br>';
	}
	if ($precon>0){
		echo 'Precondition Event<br>'.$precon;
	}?>
	<a  class="btn btn-outline-primary" id="edit" style="display:none" link="editevent.php?id=<?php echo $_GET['id'] ?>">Edit</a>
	<a  class="btn btn-outline-primary" id="reserve" style="display:none">Reserve</a>

</body>
</html>
