
<?php
include 'header.php';
include 'eventDB.php';

// include 'positiongmap.php';

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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

	//check this user is reserve event
	var r = "<?php //findReserveUser($db,$id,$uid); ?>";
	if ("<?php echo $user_type ?>"=="organizer"){//organizer user
		$(".reserve").hide();
	}else	if (r == "reserve"){		//this user is reserved
		$(".reserve").hide();
	}else if (r=="not"){				//this user isn't reserved

	}

</script>
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
			 margin: 50px 30px 50px 30px;
			 border: 1px solid white;
			 font-size: 15px;
		 }
		 .btn btn-outline-primary{
			 background: black;
		 }
	</style>
</head>
<body>
	<div class="">
		<img id=profile height="250" width="325" src="<?php echo $profilepic ?>"></img>
	</div>
	<div class="">
		<h1 id=name style="text-align:center padding: 10px;"> <?php echo $name; ?></h1>
	</div>
	<div class="">
		<img id=profilepic> </img>
	</div>
	<div class="">
		<img id=profilepic> </img>
		<?php
			$pic = loadSlidePic($db,$id);
			// $caption = array();
			include 'slidepic.php' ?>
	</div>
	<div class="">
		<h2 id=location style="text-align:center">
			<img src="https://cdn4.iconfinder.com/data/icons/pictype-free-vector-icons/16/location-alt-24.png"></img>
			<?php echo $location; ?>
		</h2><br>
	</div>
	<div id="map"></div>
	<?php include 'showmap.php'; ?>
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
