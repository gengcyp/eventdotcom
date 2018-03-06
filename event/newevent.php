

<!DOCTYPE html>
<html>
<head>
	<title>Create Event</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
		  	<!-- <form action="getLatLong.php" method="post"> -->
			  	<input type="text" name="location">
			  	<!-- <input type="submit" name="findlocation" value="Find Location"  onclick="setMarker()"> -->
		  	<!-- </form> -->
		  </th>
		</tr><tr>
		  <th>
				
		  </th><th>
		    <div id="map"></div>
		  		
		  	<input type="text" name="lat" id="lat" >
		    <input type="text" name="lng" id="lng" style="display: none">
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
// include 'getLatLong.php';
include 'eventDB.php';
?>
</body>
</html>

