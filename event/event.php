<!DOCTYPE html>
<?php
include 'eventDB.php';
?>

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
	<h1 id=name style="text-align:center"> <?php echo $name; ?></h1>
	<img id=profilepic> </img>
	<?php include 'slidepic.php' ?>
	<p id=location style="text-align:center">
		<img src="https://cdn4.iconfinder.com/data/icons/pictype-free-vector-icons/16/location-alt-24.png"></img>
		<?php echo $location; ?>
	</p>
	<div id="map"></div>
	<script>
	//get lat/long
	var latitude = parseFloat("<?php echo $lat; ?>"+0);
	var longitude = parseFloat("<?php echo $lon; ?>"+0);
	//show or hide map
	if ((latitude == 0) && (longitude==0)){
		$('#map').hide();
	}
	//init google map
	function initMap() {
	  var place = {lat: latitude, lng: longitude};
	  var map = new google.maps.Map(document.getElementById('map'), {
	    zoom: 15,
	    center: place
	  });
		var trafficLayer = new google.maps.TransitLayer();
		trafficLayer.setMap(map);
	  var marker = new google.maps.Marker({
	    position: place,
	    map: map
	  });
	}
	</script>
	<script async defer
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsdxMxOvyYQfWbIiNtJJTRHtoM54ZlW5g&callback=initMap">
	</script>
	<p id=type> </p>
	<p id=desc> <?php echo $desc; ?></p>
	<p id=price> Price <?php echo $price; ?> Baht</p>
	<p id=limit> Limit <?php echo $limit; ?></p>
	<p id=precon> Precondition Event <?php  ?> </p>
	<p id=feedback style="display:none"> </p>
</body>
</html>
