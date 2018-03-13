<!DOCTYPE html>
<?php
include 'header.php';
include 'eventDB.php';
include 'showmap.php';
// include 'positiongmap.php';

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
	// if ("<?php// echo $uid; ?>"=="<?php //echo $own ?>"){   //session ok
	// 	$("#edit").show();
	// }else {  //this user is not event own

	// }
	//check this user is reserve event
	var r = "<?php //findReserveUser($db,$id,$uid); ?>";
	if ("<?php echo $user_type ?>"=="organizer"){//organizer user
		$(".reserve").hide();
	}else	if (r == "reserve"){		//this user is reserved
		$(".reserve").hide();
	}else if (r=="not"){				//this user isn't reserved
		
	}

</script>

<html>
<head>
	<title><?php echo $name ?></title>
	<style>
		 #map {
			height: 400px;
		 }
		 body{
			 text-align: center;
			  
		 }
		 .detail{
			 font-size: 20px;
		 }
		 .describe{
			 margin: 50px 300px 50px 300px;
			 border: 1px solid white;
			 font-size: 15px;
		 }
		 .btn btn-outline-primary{
			 background: black;
		 }
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
	<img id=profile height="250" width="325" src="<?php echo $profilepic ?>"></img>
	<h1 id=name style="text-align:center padding: 10px;"> <?php echo $name; ?></h1>
	<img id=profilepic> </img>
	<?php
		$pic = loadSlidePic($db,$id);
		// $caption = array();
		include 'slidepic.php' ?><br>
	<h2 id=location style="text-align:center">
		<img src="https://cdn4.iconfinder.com/data/icons/pictype-free-vector-icons/16/location-alt-24.png"></img>
		<?php echo $location; ?>
		</h2>
	<div id="map"></div>
	<script type="text/javascript">
	//show or hide map
	// if ((latitude == 0) && (longitude == 0)){
	// 	$('#map').hide();
	// }
	</script>
	<div class="detail">
		<div class="describe">
			<p id=desc> <?php echo $desc; ?></p>
		</div>
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
	</div>
	

	<a href='blank.php?id=<?php echo $_GET['id']; ?>'><button class="btn btn-success reserve" id='paid' style="font-size:30px; border-radius:10px; margin-right: 10px; ">Join event</button></a>
	<a href="comment.php?id=<?php echo $_GET['id']; ?>"><button class="btn btn-success" style="font-size:30px; border-radius:10px; ">go to webboard</button></a>
</body>
</html>
