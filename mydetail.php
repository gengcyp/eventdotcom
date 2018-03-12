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
		include 'reportCertificate.php';
		// connect DB
		$connection = new DBconnect(
					'eventdotcom',
					 'tk', 'Working24'); 

		// select my event from db
		// status from session that user has been log in or not
		$status = "NO";
		// select detail from data base
		$cevents = [0];
		$hevents = [0];

		$myinfo = [0];

		// give certification
		// check that certi was submit
		if (isset($_POST['subcer'])){
			// give certificate to everyone that in this event
			// get event id
			$cer_eid = $_POST['ceid'];

			// change status of certificate
			$connection->update("reservations INNER JOIN attendees ON reservations.reservationid=attendees.reservationid ", "certificate=1", "WHERE eventcode='".$cer_eid."'");

			if ($connection){
				echo '<script type="text/javascript">alert("Successful gave certificate to eventid' . $cer_eid . '")</script>';
			}
		}

		// check user that had been login 
		// if someone login get an id
		if (checkSession()){
			$user = $_SESSION['uid'];
			$status = "YES";
			// get login user
			$myinfo = $connection->select('*', 'users', 'WHERE users.userid='.'"'.$user.'"');

			// check type of user
			if ($myinfo[0]['type'] == 'organizer'){
				// get event that in current duration
				$cevents = $connection->select('*', 'eventdetail', "WHERE eventdetail.eventown=".'"'.$user.'"'. "AND eventdetail.finished>=CURDATE()");
				// get event that already pass
				$hevents = $connection->select('*', 'eventdetail INNER JOIN reservations ON eventdetail.eventid=reservations.eventcode', "WHERE eventdetail.eventown=".'"'.$user.'"'. "AND eventdetail.finished<CURDATE()");
			}
			else if ($myinfo[0]['type'] == 'attendant'){
				// get event that in current duration
				$cevents = $connection->select('*', 'reservations INNER JOIN eventdetail ON eventdetail.eventid=reservations.eventcode INNER JOIN users ON users.userid=eventdetail.eventown ', "WHERE reservations.userid=".'"'.$user.'"'. "AND eventdetail.started>=CURDATE()");
				// get event that already pass
				$hevents = $connection->select('*', 'reservations INNER JOIN eventdetail ON eventdetail.eventid=reservations.eventcode INNER JOIN users ON users.userid=eventdetail.eventown ', "WHERE reservations.userid=".'"'.$user.'"'. "AND eventdetail.started<CURDATE()");				
			}
		}
		else{
			$status = "NO";
		}
		

	?>

	<div id='no-log' hidden="true">
		<h4>PLEASE LOG IN !</h4>
		<br>
		<a href="login.php"><button>LOG IN</button></a>
	</div>

	<div id="myevent" class="tab">
	  	<button class="tablinks active" onclick="openTab(event, 'info')">My Info</button>
	  	<button class="tablinks" onclick="openTab(event, 'current')">Current Events</button>
	  	<button class="tablinks" onclick="openTab(event, 'history')" >History Events</button>

	</div>			
	<div id="info" class="tabcontent">
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
	<div id='current' class="tabcontent" hidden="true"></div>
	<div id='history' class="tabcontent" hidden="true"></div>

	<script>
		$(document).ready(function(){
			// body...

			if ("<?php echo $status ;?>" == "NO") {
				$('#no-log').show();
				// $('#myevent').html("PLEASE LOG IN !");
				// $('#myevent').append("<button> LOG IN </button>");
				$('#info').html("");
				$('#myevent').hide();
			}
			else {

				 // get myevents
				 var cevents = <?php echo json_encode($cevents); ?>;
				 var hevents = <?php echo json_encode($hevents); ?>;

				 // show all myevents
				 // current events
				 for (var i = 0; i < cevents.length; i++) {

				 	// case eventowner
				 	if ('<?php echo $myinfo[0]['type']?>' == 'organizer'){
				 		$("#current").append("<div class=c-events id="+i+">"+ "EventID: " + cevents[i]['eventid']+ ", Name of Event: " + cevents[i]['eventname'] + ", Description: " + cevents[i]['description'] +"&nbsp;&nbsp;<a href='editevent.php?id="+cevents[i]['eventid']+"'><button>Edit</button></a></div>");
				 	}
				 	// case attendant user
				 	else if ('<?php echo $myinfo[0]['type']?>' == 'attendant'){
				 		$("#current").append("<div class=c-events id="+i+">"+ "EventID: " + cevents[i]['eventid']+ ", Name of Event: " + cevents[i]['eventname'] + ", Description: " + cevents[i]['description'] +"&nbsp;&nbsp;<a href='event.php?id="+cevents[i]['eventid']+"'><button>More Detail</button></a></div>");
				 	}
				 	
				 }

				 // pass events
				 for (var i = 0; i < hevents.length; i++) {

				 	if ('<?php echo $myinfo[0]['type']?>' == 'organizer'){
					 	$("#history").append("<form method='post' action=''><div class=h-events id="+i+">"+ "EventID: " + hevents[i]['eventid']+ ", Name of Event: " + hevents[i]['eventname'] + ", Description: " + hevents[i]['description'] +"&nbsp;&nbsp; <input hidden='true' type='text' name='ceid' value='" + hevents[i]['eventid'] + "'><button type='submit' name='subcer' id='cer'>Certificate</button></div></form>");
					 	// case already gave certificate
				 		if (hevents[i]['certificate'] == 1){
				 			$('#cer').attr('disabled', 'disabled');
				 		}
					 }
				 	else if ('<?php echo $myinfo[0]['type']?>' == 'attendant'){
				 		$("#history").append("<form method='post' action=''><div class=c-events id="+i+">"+ "EventID: " + hevents[i]['eventid']+ ", Name of Event: " + hevents[i]['eventname'] + ", Description: " + hevents[i]['description'] +"&nbsp;&nbsp; <input hidden='true' type='text' name='name_attendant' value=" + '<?php echo $myinfo[0]["fname"]. "  " . $myinfo[0]["lname"];?>' + "><input hidden='true' type='text' name='name_event' value='" + hevents[i]['eventname'] + "'><input hidden='true' type='text' name='name_organizer' value='" + hevents[i]['uname'] + "'><button type='submit' name='create_pdf' id='cer'>Get Certificate</button></div></form>");

				 		if (hevents[i]['certificate'] == 0){
				 			$('#cer').attr('disabled', 'disabled');
				 		}
				 	}
				 }
			}
			

		});

		function openTab(evt, tabbed){
		    // var i, tabcontent, tablinks;
		    // tabcontent = document.getElementsByClassName("tabcontent");
		    $('.tabcontent').each(function(){
		    	$(this).hide();
		    });

		    let tablinks = document.getElementsByClassName("tablinks");
		    for (i = 0; i < tablinks.length; i++) {
		        tablinks[i].className = tablinks[i].className.replace(" active", "");
		    }
		    $('#'+tabbed).css('display', 'block');
		    // document.getElementById(cityName).style.display = "block";
		    evt.currentTarget.className += " active";
		}
	</script>

</body>
<style>
	.h-events{
		border: 5px solid red;
	}
	/* Style the tab */
	.tab {
	    overflow: hidden;
	    border: 1px solid #ccc;
	    background-color: #f1f1f1;
	}

	/* Style the buttons inside the tab */
	.tab button {
	    background-color: inherit;
	    float: left;
	    border: none;
	    outline: none;
	    cursor: pointer;
	    padding: 14px 16px;
	    transition: 0.3s;
	    font-size: 17px;
	}

	/* Change background color of buttons on hover */
	.tab button:hover {
	    background-color: #ddd;
	}

	/* Create an active/current tablink class */
	.tab button.active {
	    background-color: #ccc;
	}

</style>
</html>