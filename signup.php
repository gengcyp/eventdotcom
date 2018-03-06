<!DOCTYPE html>
<html>
<head>
	<title>Confirm status of the sign up</title>
</head>
<body>
	<?php  

		include 'DBconnect.php';
		// data come in as [] use key
		$data = $_POST;

		// connect DB
		$connection = new DBconnect(
			'eventdotcom',
		 	'tk', 'Working24');

		// column of the users table that we donna insert to
		$column = "(type, fname, lname, address, phoneno, email, pwd, uname, ustatus)";
		// value get from data as a form
		$value = "("."'".$data['type']."',". "'".$data['fname']."',". "'".$data['lname']."'," ."'".$data['address']."',". "'".$data['phoneno']."'," ."'".$data['email']."'," ."'".$data['pwd']."',"."'".$data['uname']."',".'0'.")";

		// insert into users table
		$signup = $connection->insert('users', $column, $value);

	 	if ($signup == 1){
	 		echo "SUCCESSFUL SIGNUP PLEASE CONFIRM YOUR EMAIL";
	 	}
	?>

</body>
</html>