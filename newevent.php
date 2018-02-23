

<!DOCTYPE html>
<html>
<head>
	<title>Create Event</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<meta charset="utf-8">
	<style>
      #map {
        height: 400px;
        width: 100%;
       }
    </style>
</head>
<body>

	<form action="newevent.php" method="post">
	  Name:<br>
	  <input type="text" name="name"><br>
	  Description:<br>
	  <input type="text" name="desc"><br>
	  Location:
	  <input type="text" name="location"><br>
	  Limit:
	  <input type="text" name="limit"><br>
	  Prerequiste Event:

	  Type:
	  <input type="text" name="type"><br>
	  Feedback:
	  <input type="text" name="feedback"><br>

    <div id="map"></div>
  <script src="positiongmap.js"></script>
    <input type="text" name="lat" id="lat">
    <input type="text" name="lng" id="lng">
    <input type="submit" name="insertuser" value="Submit">
	</form>

  
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsdxMxOvyYQfWbIiNtJJTRHtoM54ZlW5g&callback=initMap">
    </script>


<?php
include ('dbConnect.php');
?>
</body>
</html>

