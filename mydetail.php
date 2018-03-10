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
		$cevents = "";
		$hevents = "";

		$myinfo = "";

		// check user that had been login 
		// if someone login get an id
		if (checkSession()){
			$user = $_SESSION['uid'];
			$status = "YES";
			// get login user
			$myinfo = $connection->select('*', 'users', 'WHERE users.userid='.'"'.$user.'"');
			// get event that in current duration
			$cevents = $connection->select('*', 'eventdetail INNER JOIN events ON eventdetail.eventid=events.eventid ', "WHERE eventdetail.eventown=".'"'.$user.'"'. "AND events.started>=CURDATE()");
			// get event that already pass
			$hevents = $connection->select('*', 'eventdetail INNER JOIN events ON eventdetail.eventid=events.eventid ', "WHERE eventdetail.eventown=".'"'.$user.'"'. "AND events.started<CURDATE()");
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
				// $('#defaultOpen').click();
				 // get myevents
				 var cevents = <?php echo json_encode($cevents); ?>;
				 var hevents = <?php echo json_encode($hevents); ?>;

				 // show all myevents
				 // current events
				 for (var i = 0; i < cevents.length; i++) {

				 	$("#current").append("<div class=c-events id="+i+">"+ "EventID: " + cevents[i][0]+ ", Name of Event: " + cevents[i][1] + ", Description: " + cevents[i][2] +"</div>");
				 }

				 // pass events
				 for (var i = 0; i < hevents.length; i++) {

				 	$("#history").append("<div class=h-events id="+i+">"+ "EventID: " + hevents[i][0]+ ", Name of Event: " + hevents[i][1] + ", Description: " + hevents[i][2] +"</div>");
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