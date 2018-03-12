<?php
include 'formevent.php';
include 'positiongmap.php';
?>

<script>
<?php
// if (in_array("uid",$_SESSION)){
	$uid = $_SESSION['uid'];
// }else{
// 	$uid = 0;
// }

 ?>
// <p><?php //echo ($_SESSION['uid']); ?></p>
if ("<?php echo $uid; ?>"=="<?php echo $own; ?>"){   //no permission to edit this event

}else{
	window.location.href = "event.php?id="+"<?php echo $id ?>";
}
//show button update event
	$("#editevent").show();

//show title
  $("#title").text("Edit Event");

  //set form
  $("#name").val("<?php echo $name ?>");
  $("#desc").val("<?php echo $desc ?>");
  $("#location").val("<?php echo $location ?>");
  $("#lat").val("<?php echo $lat ?>");
  $("#lng").val("<?php echo $lon ?>");
  $("#limit").val("<?php echo $limit ?>");
	$("#precon").val("<?php echo $precon ?>");
  $("#price").val("<?php echo $price ?>");
  $("#feedback").val("<?php echo $feedback ?>");
	document.getElementById("type").value = "<?php echo $type ?>";

//set input Time
	var st = new Date("<?php echo $started ?>");
	var fn = new Date("<?php echo $finished ?>");
	var ds = st.toISOString().slice(0,10);
	var ts = st.toTimeString().split(' ')[0];
	var df = fn.toISOString().slice(0,10);
	var tf = fn.toTimeString().split(' ')[0];

  $("#ts").val(ts);
	$("#ds").val(ds);
	$("#tf").val(tf);
	$("#df").val(df);
//pic

</script>
