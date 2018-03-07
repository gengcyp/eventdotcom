<?php
	session_start();  
?>

<!DOCTYPE html>
<meta charset="utf-8">

<!-- check login -->
<?php  
	include 'DBconnect.php';
	// connect to DB
	$connection = new DBconnect(
		'eventdotcom',
		 'tk', 'Working24');
	// $login_statement = $connection->prepare('Select * From users' );
	$result = "";
	$selected = "";
	$status = "NO";
	// case sign in button was submit
	if(isset($_POST['signin'])){ //check if form was submitted
		// go check email and password from DB
		$selected = $connection->select('*', 'users', "WHERE users.uname=".'"'.$_POST['uname'].'"'."AND users.ustatus=1");
		if (sizeof($selected) > 0){
			if (password_verify($_POST['pwd'], $selected[0]['pwd'])){
				$result = $selected[0]['fname'] .' ' . $selected[0]['lname'];

				// set login seession
				$_SESSION["uid"] = $selected[0]['userid'];
				// update last activity time stamp
				$_SESSION['LAST_ACTIVITY'] = time(); 

				// check type of user
				// case admin
				if ($selected[0]['type'] == "admin"){
					$status = "ADMIN";
				}
				else {
					$status = "YES";
				}				
			}


		}
		// foreach($connection->query("SELECT * FROM users WHERE users.email=".'"'.$_POST['uname'].'"'."AND users.pwd=".'"'.$_POST['pwd'].'"' ) as $row) {
	 //    	$result.= $row['fname'] . ' ' . $row['lname'];
		// }
		// $result = $login_statement->execute()->fetchAll(PDO::FETCH_OBJ);
		// case not found in DB
		if ($result==""){
	  		$result = "You enter wrong email or password, Please check again !";
		}
	} 
?>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<title></title>
</head>
<body>

	<header>
		<h2>Sign In</h2>
	</header>

	<table>
		<tr>
			<!-- part sign in -->
			<td width="500px;">
				<!-- login -->
				<form id="sign-in"  action="" onsubmit="return checkEmpty('sign-in')" method="post">
					Username: <input type="text" name="uname">
					<br>
					<br>
					Password: <input type="text" name="pwd">
					<br>
					<?php echo $result; ?>
					<br>
					<div align="center"><input type="submit" name="signin" value="Sign In"></div>
				</form>
			</td>
			<td>
				<!-- sign up -->
				<form id="sign-up" action="signup.php" onsubmit="return checkEmpty('sign-up')" method="post">
					<table>
						<tr>
							<td>
								Username: <input type="text" name="uname">
							</td>
							<td>
								<select id = "type" name="type">
									<option selected="selected" value="attendant">Attendant</option>
									<option value="organizer">Event Organizer</option>
								</select>								
							</td>
						</tr>
						<tr>
							<td>
								Password: <input type="text" name="pwd">	
							</td>
							<td>
								Confirm Password: <input type="text" name="cpwd">
							</td>
						</tr>
						<tr>
							<td>
								Infomation
							</td>
							
						</tr>
						<tr>
							<td>
								First Name: <input type="text" name="fname">
							</td>
							<td>
								Last Name: <input type="text" name="lname">
							</td>
						</tr>
						<tr>
							<td>
								Address: <input type="text" name="address">
							</td>
						</tr>
						<tr>
							<td>
								Phone No.: <input type="text" name="phoneno">
							</td>
							<td>
								E-mail: <input type="text" name="email">
							</td>
						</tr>
					</table>
					<br>
					<div align="center"><input type="submit" value="Sign Up"></div>					
							
				</form>
			</td>
		</tr>
	</table>

	<script>

		// load page
		$(document).ready(function(){

			if ("<?php echo $status ;?>" == "YES"){
				window.location.href = "index.php";
			}
		});

		// check empty before send form
		function checkEmpty(id){
			let breakout = false;
			$('#'+id+' :input').each(function(){
				if ($(this).val() == ''){
					if ($(this).attr("type") == 'text'){
						alert('Please Enter ' + $(this).attr("name"));
					}
					else if ($(this).attr("type") == 'radio'){
						alert('Please Select the ' + $(this).attr("name"));
					}
					
					breakout = true;
					return false;
				}
			});	
			if (breakout == true){
				breakout = false;
				return false;
			}
		}
	</script>

</body>
<style>
	tr {
		height: 50px;
	}
</style>
</html>