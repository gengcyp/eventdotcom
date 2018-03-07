<?php
include 'formevent.php';
include 'positiongmap.php';
?>
<!-- <script src="positiongmap.js"></script> -->

<script>
//check session
// if (){   //session ok
// }else {  //no permission to edit this event
//   header('Location: event.php?id='+<?php //echo $id ?>);
// }

//set header
  $("#title").text("Edit Event");

  // setMapMarker(0,0);
  //set form
  $("#name").val("<?php echo $name ?>");
  $("#desc").val("<?php echo $desc ?>");
  $("#location").val("<?php echo $location ?>");
  $("#lat").val("<?php echo $lat ?>");
  $("#lng").val("<?php echo $lon ?>");
  $("#limit").val("<?php echo $limit ?>");
  $("#price").val("<?php echo $name ?>");
  $("#feedback").val("<?php echo $price ?>");
//Type
//pre req table
//events table
//pic

</script>
