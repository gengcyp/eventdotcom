
<?php
include 'formevent.php';

$lat = 13.7618086;
$lon = 100.5075252;
include 'positiongmap.php';
?>
<script type="text/javascript">


//check session
if ("<?php echo $user_type ?>"=="organizer"){

}else{
	window.location.href = "index.php";
}




//show button insert event
	$("#newevent").show();

//show title
	$("#title").text("Create Event");
</script>
