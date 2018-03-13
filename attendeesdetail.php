<!DOCTYPE html>
<meta charset="utf-8">
	<?php  
		// include 'DBconnect.php';
		// include 'checker.php';
		include 'header.php';
		include 'reportPdf.php';
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
				$attn = $connection->select('users.userid, users.fname, users.lname, users.gender, users.phoneno, reservations.reservetime','reservations INNER JOIN attendees ON reservations.reservationid=attendees.reservationid INNER JOIN users ON reservations.userid=users.userid', "WHERE reservations.eventcode=".'"'.$eid.'"');
				
				for ($i = 0; $i < sizeof($attn); $i++){
					// change date format
					$s_date = (string)$attn[$i]['reservetime'];
					$f_date = date_create($s_date);
					$attn[$i]['reservetime'] = date_format($f_date, 'M d,Y h:i:a');
				}

				$writeheader = ['UserID', 'First Name', 'Last Name', 'Gender', 'Phone No.', 'Reserve Time'];
			
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

        <form method="post">
        	<input hidden="true" id="pdf" type="text" name="sql" value="">
            <input type="submit" name="create_pdf" class="btn btn-danger" value="Create PDF" />
        </form>
		<table id="users"></table>
		<table id="users"></table>
	</div>

	<script>
		$(document).ready(function(){
			var attns = <?php echo json_encode($attn); ?>;
			var show = "";
			if(attns[0] == 0){
				$('#details').html("<h3>Nobody attended to this Event.</h3>");
			}
			else {
				 for (var i = 0; i < attns.length; i++) {
				 	// header
				 	if (i==0){
				 		$('#users').append('<tr><td>UserID</td><td>Name Of User</td><td>Gender</td><td>Phone No.</td><td>Reserve Time</td></tr>');
				 	}
				 	// show all attendees
				 	$("#users").append("<tr><td>" + attns[i]['userid']+ "</td><td>" + attns[i]['fname'] + "  " + attns[i]['lname'] + "</td><td>" + attns[i]['gender']+"</td><td>" + attns[i]['phoneno']+"</td><td>" + attns[i]['reservetime']+"</td></tr>");

				 	show += "<tr><td>" + attns[i]['userid']+ "</td><td>" + attns[i]['fname'] + "  " + attns[i]['lname'] + "</td><td>" + attns[i]['gender']+"</td><td>" + attns[i]['phoneno']+"</td><td>" + attns[i]['reservetime']+"</td></tr>";
				 	
				 }

				 $('#pdf').val(show);

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