<!DOCTYPE html>
<meta charset="utf-8">
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<title></title>
</head>
<body>

	<div id="myevent">ALL My Events</div>

	<script>
		$(document).ready(function(){
			// body...
			console.log("LLL");
			<?php
				include 'DBconnect.php';
				// connect DB
				$connection = new DBconnect(
					'eventdotcom',
					 'tk', 'Working24'); 

				// select my event from db
				// now fix uid=2
				$selected = $connection->select('*', 'eventdetail', "WHERE eventdetail.eventown=".'"'.'2'.'"');

			 ?>
			 // get myevents
			 var myevents = <?php echo json_encode($selected); ?>;

			 // show all myevents
			 for (var i = 0; i < myevents.length; i++) {

			 	$("#myevent").append("<div class=events id="+i+">"+ "EventID: " + myevents[i][0]+ ", Name of Event: " + myevents[i][1] + ", Description: " + myevents[i][2] +"</div>");
			 }
			

		});
	</script>

</body>
</html>