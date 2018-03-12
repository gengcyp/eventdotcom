<?php
	// session_start();  
?>

<!DOCTYPE html>
<meta charset="utf-8">

<!-- check login -->
<?php  
	include 'header.php';

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
				// $result = $selected[0]['fname'] .' ' . $selected[0]['lname'];

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
		// case not found in DB
		else{
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
		<h2 align="center">Come To Join US :)</h2>
	</header>

	<div align="center">
		<table>
			<tr>
				<!-- part sign in -->
				<td width="250px;">
					<!-- login -->
					<div id='in' class="s-box">
						<h3 align="center" hidden="true">SIGN IN</h3>
						<form id="sign-in"  action="" onsubmit="return checkEmpty('sign-in')" method="post">
							<br><br><br><br><br><br><br><br><br><br><br>
							<div align="center">Username: <input type="text" name="uname"></div>
							<br>
							<div align="center">Password: <input type="password" name="pwd"></div>
							
							<br>
							<?php echo $result; ?>
							<br>
							<div align="center"><input type="submit" name="signin" value="Sign In"></div>
						</form>
					</div>
				</td>
				<td>
					<!-- sign up -->
					<div id='up' class="s-box">
						<h3 align="center" hidden="true">SIGN UP</h3>
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
										Password: <input type="password" name="pwd">	
									</td>
									<td>
										Confirm Password: <input type="password" name="cpwd">
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
										<label>Gender: </label><br>
										<input type="radio" name="gender" value="male">Male
										<input type="radio" name="gender" value="female">Female
									</td>
									<td>
										<label>Birthday</label>
										<input type="date" name="bday">
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
										<br>
										E-mail: <input type="text" name="email">
									</td>
								</tr>
							</table>
							<br>
							<div align="center"><input type="submit" value="Sign Up"></div>					
									
						</form>
					</div>
				</td>
			</tr>
		</table>
	</div>

	<script>

		// load page
		$(document).ready(function(){

			// first start with show sign in hide sign up
			var state = 'in';

			// hide
			$('#sign-up').hide();
			$('#up').css("background-color", "#FF9999");
			$('#up > h3').show();

			// show hide depend on which element was mouse over
			$('.s-box').mouseover(function(){
				// check & fill mouse point element
				// == false mean no one got point
				if (checkStateIU($(this)) == false){
					// sent the last element that was point to show
					checkStateIU($('#'+state))
				}
				else {
					// this element was point so set the last point is current
					state = $(this).attr('id');
				}
			});

			if ("<?php echo $status ;?>" == "YES"){
				window.location.href = "index.php";
			}
		});

		// show element that mouse over & hide other element
		// also check case that mouse is not over any element
		// parameter is element that mouse was over 
		// 				case no element mouse was on will become last element that was show
		function checkStateIU(selected){
			// c = count time that find element that mouse was ove
			let c = 0;
			// i = count loop -> case no one got mouse i is the last and never pass element that mouse was on
			let i = 1;
			$('.s-box').each(function(){
				// this element in s-box was point 
				if ($(this).is(selected)){
					
					// show form
					$(this).find('h3').hide();
					$(this).find('form').show();
					$(this).css("background-color", "white");
					c++;
				}
				// no one got point
				else if (c == 0 && i == $('.s-box').length){	
					return false;
				}
				else {
					// not point hide form			
					$(this).find('form').hide();
					$(this).find('h3').show();
					$(this).css("background-color", "#FF9999");					
				}
				i++;
				
			});
		}

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
	.s-box{
		height: 500px;
		width: 350px;
	}
</style>
</html>