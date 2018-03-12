<!DOCTYPE html>
<html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="script.js"></script>

<?php
// $user = 'root';
// $pw = '';
// $connectionname = 'eventdotcom';
include "header.php";
// $connection = new DBconnect($connectionname,$user,$pw);
// $eid = 0; // NEED EVENT ID FROM LAST PAGE ******************************************************************
$eid = $_GET['id'];
// USER ID FROM SESSION ***************
 if (in_array("uid",$_SESSION)){
   $uid = $_SESSION['uid'];
 }else{
   $uid = 0;
 } 
if ($uid != $eid){
header('Location: http://www.example.com/');
}

?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="theme.css" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="">Transaction List</h1>
          <p>Event Name : <?php 
          $event = $connection->select("name",'eventdetail',"WHERE eventid=".$eid);
          echo $event[0][0];
          ?></p>

          <?php
          $rid = $connection->select("*",'reservations',"WHERE eventcode=".$eid);
          for ($x = 0; $x < sizeof($rid); $x++) {
            $imagecount = $connection->select("*",'reservationtransaction',"WHERE reserveid=".$rid[$x][0]);
            $count = sizeof($imagecount); 
            echo "<h4>Reserveid : ".$rid[$x][0]."</h3> ";
            $isConfirmed = $connection->select("reservestatus","reservations","WHERE reservationid=".$rid[$x][0]);
            if ($isConfirmed[0][0] == 1){
              echo "<h4>  Confirmed </h4>";

            }
            for ($y = 0;$y < $count; $y++){
              $path = $connection->select("imagepath",'reservationtransaction',"WHERE reserveid=".$rid[$x][0]);
              echo "<img style='width:200px;' src='".$path[$y][0]."'/>&nbsp";
              echo "<br>";
              //echo $path[$y][0];
              //echo "<br>";
            }
            echo "<button type='button' onclick='updateReservation(".$rid[$x][0].")'>Confirm</button>";
            echo "<button type='button' onclick='deleteReservationTransaction(".$rid[$x][0].")'>Delete</button>"; 
            } 
          ?>
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
</div>  
</div>
</body>
<script>
  function deleteReservationTransaction(entityId){
  $.post  ("deleteData.php",{path:"delete",entityId: entityId},function(data, status)
    {
      if( status=='success'){
window.location.reload();
      }
    });
  }
  function updateReservation(entityId){
  $.post  ("updateReservation.php",{path: "update",entityId: entityId},function(data, status)
    {
      if( status=='success'){
window.location.reload();
      }
    });
  }
</script>
</html>