<?php
	session_start();  
?>
<!DOCTYPE html>
<meta charset="utf-8">
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<title></title>
</head>
<body>
	<?php
		include 'DBconnect.php';
		// connect DB
		$connection = new DBconnect(
					'eventdotcom',
					 'tk', 'Working24'); 

		// select my event from db
		// status from session that user has been log in or not
		$status = "NO";
		// select detail from data base
		$selected = "";

		if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 60)) {
		    // last request was more than 30 minutes ago
		    session_unset();     // unset $_SESSION variable for the run-time 
		    session_destroy();   // destroy session data in storage

		    $status = "NO";
		}
		else {

			$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
			if (isset($_SESSION['uid'])){
				$user = $_SESSION['uid'];
				$status = "YES";
				$selected = $connection->select('*', 'eventdetail', "WHERE eventdetail.eventown=".'"'.$user.'"');
			}
		}
		
		// now fix uid=2
		

	?>

	<div id="myevent">ALL My Events</div>

	<script>
		$(document).ready(function(){
			// body...
			console.log("LLL");

			if ("<?php echo $status ;?>" == "NO") {
				$('#myevent').html("PLEASE LOG IN !");
				$('#myevent').append("<button> LOG IN </button>");
			}
			else {
				 // get myevents
				 var myevents = <?php echo json_encode($selected); ?>;

				 // show all myevents
				 for (var i = 0; i < myevents.length; i++) {

				 	$("#myevent").append("<div class=events id="+i+">"+ "EventID: " + myevents[i][0]+ ", Name of Event: " + myevents[i][1] + ", Description: " + myevents[i][2] +"</div>");
				 }
			}
			

		});
	</script>

</body>
</html>