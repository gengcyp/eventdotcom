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
		$column = "(type, fname, lname, address, phoneno, email, pwd, uname, ustatus, confirmcode)";
		// value get from data as a form
		$confirmcode = rand();

		echo $confirmcode;

		$value = "("."'".$data['type']."',". "'".$data['fname']."',". "'".$data['lname']."'," ."'".$data['address']."',". "'".$data['phoneno']."'," ."'".$data['email']."'," ."'".password_hash($data['pwd'], PASSWORD_DEFAULT)."',"."'".$data['uname']."',".'1,'.$confirmcode.")";

		// insert into users table
		$signup = $connection->insert('users', $column, $value);

		echo $signup;

	 	if ($signup == 1){

	 		// get userid to verify
	 		// $user = $connection->select('userid', 'users', 'WHERE users.uname='."'".$data['uname']."'");
	 		// $uid=$user[0]['userid'];

	 		// // email part
	 		// $msg = 'Thank you for signing up with us, you almost there just Click the link below to activate your accout:
	 		// http://localhost/Web_tech/Project1/emailconfirm.php?uid=$uid&cc=$confirmcode
	 		// Come&Join with US';

	 		// mail($data['email'], 'Verify Your E-mail to Eventdotcom', $msg, 'From: admin@eventdotcom.com');

	 		echo "SUCCESSFUL SIGNUP PLEASE CONFIRM YOUR EMAIL";
	 	}
	?>

</body>
</html>