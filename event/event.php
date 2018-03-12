<!DOCTYPE html>
<?php
include 'header.php';
include 'eventDB.php';
include 'showmap.php';

?>
<script type="text/javascript">
	//session
	//check this user is event owner
	<?php
	if ($_SESSION!=NULL){
		$uid = $_SESSION['uid'];
	}else{
		$uid = 0;
	}
	 ?>
	if ("<?php echo $uid; ?>"=="<?php echo $own ?>"){   //session ok
		//***show edit button
	}else {  //this user is not event own

	}
	//check this user is reserve event
	var r = "<?php findReserveUser($db,$id,$uid); ?>";

	if ("<?php echo $user_type ?>"=="organizer"){//organizer user
		console.log("organ");
		//***hide reserve button
	}else	if (r == "reserve"){		//this user is reserved
		console.log("reserve");
		//***hide reserve button
	}else if (r=="not"){
		console.log("not");
		//***show reserve button
	}

</script>

<html>
<head>
	<title><?php echo $name ?></title>
	<style>
		 #map {
			height: 400px;
			width: 100%;
		 }
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
	<img id=profile height="300" width="300" src="<?php echo $profilepic ?>"></img>
	<h1 id=name style="text-align:center"> <?php echo $name; ?></h1>
	<img id=profilepic> </img>
	<?php include 'slidepic.php' ?>
	<p id=location style="text-align:center">
		<img src="https://cdn4.iconfinder.com/data/icons/pictype-free-vector-icons/16/location-alt-24.png"></img>
		<?php echo $location; ?>
	</p>
	<div id="map"></div>
	<p id=type> </p>
	<p id=desc> <?php echo $desc; ?></p>
	<p id=price> Price <?php echo $price; ?> Baht</p>
	<p id=limit> Limit <?php echo $limit; ?></p>
	<p id=precon> Precondition Event <br><?php echo $showprecon; ?> </p>
	<p id=feedback style="display:none"> </p>

</body>
</html>
