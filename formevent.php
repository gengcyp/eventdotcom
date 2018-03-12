<!DOCTYPE html>
<html>
  <?php include 'header.php';
        include 'eventDB.php';
        ?>
<script type="text/javascript">

//check session
if ("<?php echo $page ?>" == "newevent.php"){
  if (!"<?php echo $user_type ?>"=="organizer"){
    window.location.href = "index.php";
  }
}else if ("<?php echo $page ?>"  == "editevent.php"){
  <?php
  if (in_array("uid",$_SESSION)){
    $uid = $_SESSION['uid'];
  }else{
    $uid = 0;
  } ?>
  if (!"<?php echo $uid; ?>"=="<?php echo $own; ?>"){   //no permission to edit this event
    window.location.href = "event.php?id="+"<?php echo $id ?>";
  }
}
</script>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="theme_editevent.css" type="text/css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <style>
      #map {
        height: 400px;
        width: 100%;
       }
    </style>
</head>
<body>

  <div class="py-5">
    <div class="container">
      <h1 style="text-align: center" id="title"></h1>
      <div class="row">
        <div class="col-md-12">
          <form class="" method="post">

            <div class="form-group"> <label>Name</label>
              <input type="text" class="form-control form-control-lg" id="name" name="name" required="required"> <small class="form-text text-muted"></small> </div>

            <div class="form-group"> <label>Descritption</label>
              <textarea name="desc"  id="desc"  rows="5" class="form-control"></textarea>
              <!-- <input type="text" class="form-control" id="desc" name="desc">  -->
              <small class="form-text text-muted"></small> </div>

            <div class="form-group"> <label>Location</label>
              <input type="text" class="form-control w-75" id="location" name="location">
              <a  class="btn btn-outline-primary" id="find">Find on Map</a>
              <a  class="btn btn-outline-primary" id="pin">Move Pin</a>
            </div>

            <script type="text/javascript">
  					//onClick -> find location and setcenter on map
  						$("#find").click(function() {
  							var geocoder = new google.maps.Geocoder();
  							var address = $("#location").val();
  							geocoder.geocode( { 'address': address}, function(results, status) {
  							  if (status == google.maps.GeocoderStatus.OK) {
  							    latitude = results[0].geometry.location.lat();
  							    longitude = results[0].geometry.location.lng();
  							    setMapCenter(latitude,longitude);
  							  }else {
              			alert("[google maps]Something got wrong " + status);
            			}
  							});
  							return false;
  						});
              $("#pin").click(function(){
                var latlong = moveMarkerToCenter();
                $("#lat").val(latlong[0]);
                $("#lng").val(latlong[1]);
              });
  					</script>

            <div id="map"></div>
    		  	<input type="text" name="lat" id="lat" style="display: none">
    		    <input type="text" name="lng" id="lng" style="display: none">

            <div class="form-group"> <label>Limit</label>
              <input type="number" class="form-control w-25" name="limit" id="limit"> <small class="form-text text-muted"></small> </div>

            <div class="form-group"> <label>Price</label>
              <input type="number" class="form-control w-25" name="price" id="price"> <small class="form-text text-muted"></small> </div>

            <div class="form-group"> <label>Prerequiste Event</label>
              <input type="number" class="form-control w-25" name="precon" id="precon"> <small class="form-text text-muted"></small>
              <p>
                <!-- <a  class="btn btn-outline-primary" id="check" name="check">Check</a> -->
                <!-- <button type="submit" class="btn btn-outline-primary" name="check" id="check">Find</button> -->
                <script type="text/javascript">

                </script>
              </p>

            </div>

            <div class="form-group"> <label>Start</label>
              <input type="date" class="form-control w-50" name="ds" id="ds"><input type="time" class="form-control w-50" name="ts" id="ts">
            <div class="form-group"> <label>End</label>
              <input type="date" class="form-control w-50" name="df" id="df"><input type="time" class="form-control w-50" name="tf" id="tf"> <small class="form-text text-muted"></small>

            </div>

            <div class="form-group"> <label>Type</label><br>
              <div class="btn-group">
                <select class="btn btn-outline-primary dropdown-toggle" name="type" id="type">
                  <option class="dropdown-item" value="Music">Music</option>
                  <option class="dropdown-item" value="Entertainm">Entertainment</option>
                  <option class="dropdown-item" value="Other">Other</option>
                </select>
              </div>
            </div>

            <div class="form-group"> <label>Feedback Link</label>
              <input type="text" class="form-control feedback" name="feedback" id="feedback"> <small class="form-text text-muted"></small> </div>

            <button type="submit" class="btn btn-primary" name="insert" id="newevent" style="display:none">Save</button>
            <button type="submit" class="btn btn-primary" name="edit" id="editevent" style="display:none">Save</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12"></div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12"></div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <!-- <pingendo onclick="window.open('https://pingendo.com/', '_blank')" style="cursor:pointer;position: fixed;bottom: 10px;right:10px;padding:4px;background-color: #00b0eb;border-radius: 8px; width:180px;display:flex;flex-direction:row;align-items:center;justify-content:center;font-size:14px;color:white">Made with Pingendo&nbsp;&nbsp;
    <img src="https://pingendo.com/site-assets/Pingendo_logo_big.png" class="d-block" alt="Pingendo logo" height="16">
  </pingendo> -->
  <script type="text/javascript">
  </script>
</body>

</html>
