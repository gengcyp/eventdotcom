<!DOCTYPE html>
<meta charset="utf-8">
	<?php  
		// include 'DBconnect.php';
		// include 'checker.php';
		include 'header.php';

		// $connection = new DBconnect(
		// 			'eventdotcom',
		// 			 'tk', 'Working24'); 

		$attn = [0];

		// check is event id was sent
		if (isset($_POST['eid'])){
			$eid = $_POST['eid'];
			// check user that had been login 
			// if someone login get an id
			if (checkSession()){
				$user = $_SESSION['uid'];
				// check user that login is the owner
				if ($user == $eid){
					// get data of attendees
					$attn = $connection->select('*','FROM reservations INNER JOIN attendees ON reservations.reservationid=attendees.reservationid INNER JOIN users ON reservations.userid=users.userid', 'WHERE reservations.eventcode="'.$eid.'"');						
				}
			
			}

		}
	?>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<title></title>
</head>
<body>
	<div id='details'>
		<table id="users"></table>
	</div>

	<script>
		$(document).ready(function(){
			var attns = <?php echo json_encode($attn); ?>;

			if(attns[0] == 0){
				$('#details').html("<h3>Nobody attended to this Event.</h3>");
			}
			else {
				 for (var i = 0; i < cevents.length; i++) {
				 	// header
				 	if (i==0){
				 		$('#users').append('<tr><td>UserID</td><td>Name Of User</td><td>Phone No.</td></tr>');
				 	}

				 	// show all attendees
				 	$("#users").append("<tr><td>"+ "</td><td>" + attns[i]['userid']+ "</td><td>" + attns[i]['fname'] + "  " + attns[i]['lname'] + "</td><td>" + attns[i]['phoneno']+"</td></tr>");
				 	
				 }
			}
		});
	</script>
</body>
<style>
	td{
		width: 250px;
	}
</style>
</html>