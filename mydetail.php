<!DOCTYPE html>
<meta charset="utf-8">
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<title></title>
</head>
<body>
	<?php
		// include 'DBconnect.php';
		// include 'checker.php';
		include 'header.php';
		include 'reportCertificate.php';
		// connect DB
		// $connection = new DBconnect(
		// 			'eventdotcom',
		// 			 'tk', 'Working24'); 
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
			$cer_eid = $_POST['eid'];
			// change status of certificate
			$connection->update("reservations INNER JOIN attendees ON reservations.reservationid=attendees.reservationid ", "certificate=1", "WHERE eventcode='".$cer_eid."'");
			if ($connection){
				echo '<script type="text/javascript">alert("Successful gave certificate to eventid' . $cer_eid . '")</script>';
			}
		}
		if (isset($_POST['cancel'])){
			$eid = $_POST['eid'];
			$connection->update("reservations", "reservestatus=2", "WHERE eventcode='".$eid."'");	
			
			if ($connection){
				echo '<script type="text/javascript">alert("Cancel Event Successful' . $eid . '")</script>';
			}		
		}
		if (isset($_POST['esave'])){

			// update to database
			$connection->update("users", "fname="."'".$_POST['fname']."',"."lname="."'".$_POST['lname']."',"."email="."'".$_POST['email']."',"."phoneno="."'".$_POST['phoneno']."'", "WHERE userid='".$_POST['uid']."'");	
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
				$cevents = $connection->select('*', 'reservations INNER JOIN eventdetail ON eventdetail.eventid=reservations.eventcode INNER JOIN users ON users.userid=eventdetail.eventown ', "WHERE reservations.userid=".'"'.$user.'"'. "AND eventdetail.started>=CURDATE() AND reservations.reservestatus!=2");
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
		<form id="infoform" method="post" action="">
			<div>
				<input hidden="true" type="text" name="uid" value='<?php echo $myinfo[0]['userid']; ?>'>
				<label>First Name: </label>
				<input disabled="disabled" name="fname" type="text" value='<?php echo $myinfo[0]['fname']; ?>' placeholder='<?php echo $myinfo[0]['fname']; ?>'>
				<label>Last Name: </label>
				<input disabled="disabled" name="lname" type="text" value='<?php echo $myinfo[0]['lname']; ?>' placeholder='<?php echo $myinfo[0]['lname']; ?>'>
			</div>
			<br>
			<div>
				<label>E-Mail: </label>
				<input disabled="disabled" name="email" type="text" value='<?php echo $myinfo[0]['email']; ?>' placeholder='<?php echo $myinfo[0]['email']; ?>'>
				<label>Phone NO: </label>
				<input disabled="disabled" name="phoneno" type="text" value='<?php echo $myinfo[0]['phoneno']; ?>' placeholder='<?php echo $myinfo[0]['phoneno']; ?>'>			
			</div>
			<br>
			<button hidden="true" id='save' type="submit" name="esave">Save</button>			
		</form>
		<button id='edit'>Edit</button>


	</div>
	<div id='current' class="tabcontent" hidden="true">
		<table id='allCEvents'></table>
	</div>
	<div id='history' class="tabcontent" hidden="true">
		<table id='allHEvents'></table>
	</div>

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
				if ('<?php echo $myinfo[0]['type']?>' == 'admin'){
					window.location.href = "UserManage.php";
				}
				 // get myevents
				 var cevents = <?php echo json_encode($cevents); ?>;
				 var hevents = <?php echo json_encode($hevents); ?>;
				 // show all myevents
				 // current events
				 for (var i = 0; i < cevents.length; i++) {
				 	// case eventowner
				 	if ('<?php echo $myinfo[0]['type']?>' == 'organizer'){
				 		// header
				 		if (i==0){
				 			$('#allCEvents').append('<tr><td>EventID</td><td>Name Of Event</td><td>Description</td></tr>');
				 		}
				 		$("#allCEvents").append("<tr><td>" + cevents[i]['eventid']+ "</td><td>" + cevents[i]['eventname'] + "</td><td>" + cevents[i]['description'] +"</td><td><a href='editevent.php?id="+cevents[i]['eventid']+"'><button>Edit</button></a></td><td><a href='transactionmanagement.php?id="+cevents[i]['eventid']+"'><button>Approve</button></a></td></tr>");
				 	}
				 	// case attendant user
				 	else if ('<?php echo $myinfo[0]['type']?>' == 'attendant'){
				 		if (i==0){
				 			$('#allCEvents').append('<tr><td>MyCode</td><td>EventID</td><td>Name Of Event</td><td>Description</td><td>Payment</td></tr>');
				 		}
				 		$("#allCEvents").append("<tr><td><a href='https://chart.apis.google.com/chart?cht=qr&chs=230x230&choe=UTF-8&chl=reservationid%3D"+ cevents[i]['reservationid'] + "%20eventid%3D" + cevents[i]['eventid'] +"'><div id='code"+i+"'>My Code</div></a>" + "<td>" + cevents[i]['eventid']+ "</td><td>" + cevents[i]['eventname'] + "</td><td>" + cevents[i]['description'] +"</td><td><a href='blank.php?id="+cevents[i]['eventid']+"'><button id='paid"+i+"'>Upload Payment</button></a></td><td><form method='post' ><input hidden='true' type='text' name='eid' value='" + cevents[i]['eventid'] + "'><button action='' type='submit' name='cancel' id='cancel"+i+"'>Cancel</button></form></td><td><a href='event.php?id="+cevents[i]['eventid']+"'><button>More Detail</button></a></td></tr>");
				 		if (cevents[i]['reservestatus'] == 0 || cevents[i]['reservestatus'] == 1 || cevents[i]['reservestatus'] == 2){
				 			// $('#paid'+i).attr('disabled', 'disabled');
				 			$('#paid'+i).hide();
							// $('#cancel'+i).attr('disabled', 'disabled');
							$('#cancel'+i).hide();
						 } 
						if (cevents[i]['reservestatus'] == 5 || cevents[i]['reservestatus'] == 0){
							$('#code'+i+'').hide();
						}
					}
				 	
				 }
				 // pass events
				 for (var i = 0; i < hevents.length; i++) {
				 	// header
				 	if (i==0){
				 		$('#allHEvents').append('<tr><td>EventID</td><td>Name Of Event</td><td>Description</td></tr>');
				 	}
				 	if ('<?php echo $myinfo[0]['type']?>' == 'organizer'){
					 	$("#allHEvents").append("<tr><td>" + hevents[i]['eventid']+ "</td><td>" + hevents[i]['eventname'] + "</td><td>" + hevents[i]['description'] +"</td><td><form method='post' ><input hidden='true' type='text' name='eid' value='" + hevents[i]['eventid'] + "'><button formaction='attendeesdetail.php' type='submit' name='seeAttn'>See Attendees</button><button action='' type='submit' name='subcer' id='cer"+i+"'>Certificate</button></form></td></tr>");
					 	// case already gave certificate
				 		if (hevents[i]['certificate'] == 1){
				 			// $('#cer'+i).attr('disabled', 'disabled');
				 			$('#cer'+i).hide();
				 		}
					 }
				 	else if ('<?php echo $myinfo[0]['type']?>' == 'attendant'){
				 		$atname = '<?php echo $myinfo[0]["fname"]. "  " . $myinfo[0]["lname"];?>';
				 		$("#allHEvents").append("<tr><td>" + hevents[i]['eventid']+ "</td><td>" + hevents[i]['eventname'] + "</td><td>" + hevents[i]['description'] +"</td><td><form method='post' action=''><input hidden='true' type='text' name='name_attendant' value='" + $atname + "'><input hidden='true' type='text' name='name_event' value='" + hevents[i]['eventname'] + "'><input hidden='true' type='text' name='name_organizer' value='" + hevents[i]['uname'] + "'><button type='submit' name='create_pdf' id='cer"+i+"'>Get Certificate</button></form></td></tr>");
				 		if (hevents[i]['certificate'] == 0){
				 			// $('#cer'+i).attr('disabled', 'disabled');
				 			$('#cer'+i).hide();
				 		}
				 	}
				 }
			}
		});

		$('#edit').click(function(){
			console.log('asd');
			$('#infoform :input').each(function(){
				$(this).removeAttr('disabled');
			});
			$('#edit').hide();
			$('#save').show();
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
	td{
		width: 250px;
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
	/* #allCEvents, #allHEvents{
		margin-top: 20px;
		border: 2px solid #f7eac4;
	} */
	#allCEvents , #allHEvents{
		font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
		border-collapse: collapse;
		width: 100%;
	}
	#allCEvents td, #allCEvents th, #allHEvents td, #allHEvents th {
		border: 1px solid #ddd;
		padding: 8px;
	}
	#allCEvents tr:nth-child(even), #allHEvents tr:nth-child(even){
		background-color: #f2f2f2;
	}
	#allCEvents tr:hover, #allHEvents tr:hover {
		background-color: #ddd;
		}
	#allCEvents th, #allHEvents th{
		padding-top: 12px;
		padding-bottom: 12px;
		text-align: left;
		background-color: #4CAF50;
		color: white;
	}
	.tabcontent > button{
		position: absolute;
		z-index: 1;
	}
</style>
</html>