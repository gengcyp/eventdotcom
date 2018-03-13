<?php
if isset($_POST['findlocation']){
	$address = $_POST['location'];
	$geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$address.'&sensor=false');
	$output= json_decode($geocode);

	$lat = $output->results[0]->geometry->location->lat;
	$long = $output->results[0]->geometry->location->lng;
}
function getLat(){	return $lat;	}
function getLong(){	return $long;	}
?>
