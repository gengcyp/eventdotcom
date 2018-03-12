<!DOCTYPE html>
<html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="script.js"></script>

<?php
$user = 'root';
$pw = '';
$connectionname = 'eventdotcom';
include "header.php";
// $connection = new DBconnect($connectionname,$user,$pw);
$eid = $_GET['id']; //NEED EVENT ID FROM LAST PAGE **************************************************

//GET USER ID FROM SESSION *****************************
  if (in_array("uid",$_SESSION)){
    $uid = $_SESSION['uid'];
  }else{
    $uid = 0;
  } 
date_default_timezone_set("Asia/Bangkok");
$dt = date("YmdHis",time());
$tempdt = $dt;
$newreservation = '("'.$uid.'","'.$eid.'","'.$dt.'")';
$connection->insert("reservations",'(userid,eventcode,reservetime)',$newreservation);
$thisreservation = $connection->select("reservationid",'reservations',"WHERE reservetime="."'".$tempdt."'");
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="theme.css" type="text/css"> </head>

<body>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="">Transaction Detail</h1>
          <p>Event Name : <?php 
          $event = $connection->select("eventname",'eventdetail',"WHERE eventid="."'".$eid."'");
          echo $event[0][0];
          ?></p>
          <p>Location : <?php 
          $event = $connection->select("location",'eventdetail',"WHERE eventid="."'".$eid."'");
          echo $event[0][0];
          ?></p>
          <p>Price : <?php 
          $event = $connection->select("price",'eventdetail',"WHERE eventid="."'".$eid."'");
          echo $event [0][0];
          ?> Baht.</p>
          
        </div>
      </div>
    </div>  
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
        </div>
      </div>
    </div>
  </div>
<div id="maindiv">
<div id="formdiv">
<h2>Upload image(s) of your transaction</h2>
<form enctype="multipart/form-data" action="" method="post">
First Field is Compulsory. Only JPEG,PNG,JPG Type Image Uploaded. Image Size Should Be Less Than 200KB.<br>
<div id="filediv"><input name="file[]" type="file" id="file"/></div>
<input type="button" id="add_more" class="upload" value="Add More Images"/><br><br><br>
<input type="submit" value="Upload Transaction" name="submit" id="upload" class="upload"/>
</form>
<?php include "upload.php"; ?>
</div>  
</div>

</body>
</html>