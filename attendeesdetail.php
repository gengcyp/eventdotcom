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
				// get data of attendees
				$attn = $connection->select('*','reservations INNER JOIN attendees ON reservations.reservationid=attendees.reservationid INNER JOIN users ON reservations.userid=users.userid', "WHERE reservations.eventcode=".'"'.$eid.'"');	
			
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
				 for (var i = 0; i < attns.length; i++) {
				 	// header
				 	if (i==0){
				 		$('#users').append('<tr><td>UserID</td><td>Name Of User</td><td>Phone No.</td><td>Reserve Time</td></tr>');
				 	}
				 	// show all attendees
				 	$("#users").append("<tr><td>" + attns[i]['userid']+ "</td><td>" + attns[i]['fname'] + "  " + attns[i]['lname'] + "</td><td>" + attns[i]['phoneno']+"</td><td>" + attns[i]['reservetime']+"</td></tr>");
				 	
				 }
			}
		});
	</script>
</body>
<style>
	td{
		width: 250px;
	}
	#users{
		font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
		border-collapse: collapse;
		width: 100%;
	}
	#users td, #users th {
		border: 1px solid #ddd;
		padding: 8px;
	}
	#users tr:nth-child(even), tr:nth-child(even){
		background-color: #f2f2f2;
	}
	#users tr:hover, tr:hover {
		background-color: #ddd;
		}
	#users th{
		padding-top: 12px;
		padding-bottom: 12px;
		text-align: left;
		background-color: #4CAF50;
		color: white;
	}
</style>
</html>