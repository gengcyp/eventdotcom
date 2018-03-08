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
		include 'checker.php';
		// connect DB
		$connection = new DBconnect(
					'eventdotcom',
					 'tk', 'Working24'); 

		// select my event from db
		// status from session that user has been log in or not
		$status = "NO";
		// select detail from data base
		$selected = "";

		$myinfo = "";

		// check user that had been login 
		// if someone login get an id
		if (checkSession()){
			$user = $_SESSION['uid'];
			$status = "YES";
			$myinfo = $connection->select('*', 'users', 'WHERE users.userid='.'"'.$user.'"');
			$selected = $connection->select('*', 'eventdetail', "WHERE eventdetail.eventown=".'"'.$user.'"');
		}
		else{
			$status = "NO";
		}
		

	?>

	<div id="info">
		<h3>MY INFO</h3>
		<div>
			<label>First Name: </label>
			<textfield><?php echo $myinfo[0]['fname']; ?></textfield>
			<label>Last Name: </label>
			<textbox><?php echo $myinfo[0]['lname']; ?></textbox>
		</div>
		<br>
		<div>
			<label>E-Mail: </label>
			<textfield><?php echo $myinfo[0]['email']; ?></textfield>
			<label>Phone NO: </label>
			<textbox><?php echo $myinfo[0]['phoneno']; ?></textbox>			
		</div>
	</div>

	<div id="myevent">ALL My Events</div>

	<script>
		$(document).ready(function(){
			// body...
			console.log("LLL");

			if ("<?php echo $status ;?>" == "NO") {
				$('#info').html("");
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