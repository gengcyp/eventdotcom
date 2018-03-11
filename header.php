<?php
	
	include 'DBconnect.php';
    include 'checker.php';
    
	$connection = new DBconnect('eventdotcom','root','');

	$user_type = 'guest';
	$me = "";
	
	if(checkSession()){
		$user = $_SESSION['uid'];

		$me = $connection->select('*', 'users', 'WHERE users.userid='.'"'.$user.'"');
		$user_type = $me[0]["type"];
	}else{
		$user_type = 'guest';
	}

	function userLogin($user_type){
		global $me;
		global $connection;

		$outputUserLogin = '';
		if($user_type === 'guest'){
			$outputUserLogin .= '
				<li><a href="">Guest</a></li>
				<a href="login.php" class="nino-btn" name="submit">Signin</a>
			';
		}
		else if($user_type === 'organizer'){
			$outputUserLogin .= '
				<a href="mydetail.php" class="aboutMe">';
			
			$outputUserLogin .= $me[0]['fname'] . " / About me";
			$outputUserLogin .= '
				</a>
			';
			$outputUserLogin .= '<a href="logout.php" class="nino-btn">SignOut</a>';
		}
		else if($user_type === 'attendant'){
			$outputUserLogin .= '
				<a href="mydetail.php">';
			
			$outputUserLogin .= $me[0]['fname'] . " / About me";
			$outputUserLogin .= '
				</a>
				<a href="scanqrcode.php">Scan</a>
			';
			$outputUserLogin .= '<a href="logout.php" class="nino-btn">SignOut</a>';
		}
		else if($user_type === 'admin'){
			$outputUserLogin .= '
				<a href="mydetail.php">';
			
			$outputUserLogin .= $me[0]['fname'] . " / About me";
			$outputUserLogin .= '
				</a>
			';
			$outputUserLogin .= '<a href="logout.php" class="nino-btn">SignOut</a>';
		}
		return $outputUserLogin;
	}
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="ninodezign.com, ninodezign@gmail.com">
	<meta name="copyright" content="ninodezign.com">
	<title>Eventdotcom</title>

	<!-- favicon -->
    <link rel="shortcut icon" href="images/ico/favicon.jpg">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

	<!-- css -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="css/materialdesignicons.min.css" />
	<link rel="stylesheet" type="text/css" href="css/jquery.mCustomScrollbar.min.css" />
	<link rel="stylesheet" type="text/css" href="css/prettyPhoto.css" />
	<link rel="stylesheet" type="text/css" href="css/unslider.css" />
	<link rel="stylesheet" type="text/css" href="css/template.css" />

</head>

<body data-target="#nino-navbar" data-spy="scroll">

	<!-- Header
    ================================================== -->
	<header id="nino-header">
		<div id="nino-headerInner">
			<nav id="nino-navbar" class="navbar navbar-default" role="navigation">
				<div class="container">

					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nino-navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a href="index.php" class="navbar-brand">Eventdotcom</a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="nino-menuItem pull-right">
						<div class="collapse navbar-collapse pull-left" id="nino-navbar-collapse">
							<ul class="nav navbar-nav">
								<a href="index.php">Home <span class="sr-only">(current)</span></a>
								<?php echo userLogin($user_type)?>
							</ul>
							
                        </div>
					</div>
				</div><!-- /.container-fluid -->
			</nav>
		</div>
	</header><!--/#header-->

    <!-- Scroll to top
    ================================================== -->
	<a href="#" id="nino-scrollToTop">Go to Top</a>

</body>
</html>




