<!DOCTYPE html>
<html>
<head>
	<title>Create Event</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
  <script src="positiongmap.js"></script>
	<meta charset="utf-8">
	<style>
      #map {
        height: 400px;
        width: 100%;
       }
       input {
       	width: 100%;
       }
    </style>
</head>
<body>
	<h1 style="text-align: center">new event</h1>
	<form action="newevent.php" method="post">
	<table style="width:100%">
		<tr>
		  <th>
		  	Name:
		  </th><th>
		  	<input type="text" name="name">
		  </th>
		</tr><tr>
		  <th>
		  	Description:
		  </th><th>
		  	<input type="text" name="desc">
		  </th>
		</tr><tr>
		  <th>
		  	Location:
		  </th><th>
			  	<input type="text" name="location" id="location">
					<button id="find">Find on map</button>
					<script type="text/javascript">
					//onClick -> find location and setcenter on map
						$("#find").click(function() {
							var geocoder = new google.maps.Geocoder();
							var address = $("#location").val();
							geocoder.geocode( { 'address': address}, function(results, status) {
							  if (status == google.maps.GeocoderStatus.OK) {
							    latitude = results[0].geometry.location.lat();
							    longitude = results[0].geometry.location.lng();
									$("#newLat").text(latitude);
									$("#newLong").text(longitude);
							    // moveMap();
							  }else {
            			alert("Something got wrong " + status);
          			}
							});
							return false;
						});
						// function moveMap(){
						// 		setMarker($("#newLat").value(),$("#newLong").value());
						// }
					</script>
		  </th>
		</tr><tr>
		  <th>

		  </th><th>
		    <div id="map"></div>

		  	<input type="text" name="lat" id="lat" style="display: none">
		    <input type="text" name="lng" id="lng" style="display: none">
				<p id="newLat" style="display:none"></p>
				<p id="newLong" style="display:none"></p>
	  	  </th>
		</tr><tr>
		  <th>
		  	Limit:
		  </th><th>
		  	<input type="text" name="limit">
		  </th>
		</tr><tr>
		  <th>
		  	Prerequiste Event:
		  </th><th>

		  </th>
		</tr><tr>
		  <th>
		  	Type:
		  </th><th>
		  	<input type="text" name="type">
		  </th>
		</tr><tr>
		  <th>
		  	Feedback:
		  </th><th>
		  	<input type="text" name="feedback">
		  </th>
		</tr>
	</table>
	    	<input type="submit" name="insertuser" value="Submit">
	</form>
	<script async defer
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsdxMxOvyYQfWbIiNtJJTRHtoM54ZlW5g&callback=initMap">
	</script>


<?php
include 'eventDB.php';
?>
</body>
</html>
