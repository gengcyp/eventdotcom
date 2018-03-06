<?php
	$connection = new PDO(
	'mysql:host=localhost:3306;dbname=eventdotcom;charset=utf8mb4',
	'chanidapa',
	'1234'
	);

	$status = 'guest';

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
		$type = $_POST["type"];
		$status = $type;
	}

	function userLogin($status){
		
		$connection = new PDO(
			'mysql:host=localhost:3306;dbname=eventdotcom;charset=utf8mb4',
			'chanidapa',
			'1234'
			);

		$outputUserLogin = '';
		if($status === 'guest'){
			$outputUserLogin .= '
				<li><a href="">Guest</a></li>
				<a href="login.php" class="nino-btn" name="submit">เข้าสู่ระบบ</a>
				
			';
		}
		else if($status === 'organizer'){
			$outputUserLogin .= '
				<li><a href="">';
			
			foreach($connection->query('SELECT * FROM users WHERE type="organizer"') as $row) {
				$outputUserLogin .= $row['fname'] . " (organizer)";
			}
			$outputUserLogin .= '
				</a></li>
				<a href="#" class="nino-btn" id="logout">ออกสู่ระบบ</a>
			';
		}
		else if($status === 'attendees'){
			$outputUserLogin .= '
				<li><a href="">';
			
			foreach($connection->query('SELECT * FROM users WHERE type="attendant"') as $row) {
				$outputUserLogin .= $row['fname'] . " (attendand)";
			}
			$outputUserLogin .= '
				</a></li>
				<a href="#" class="nino-btn" id="logout">ออกสู่ระบบ</a>
			';
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
						<a class="navbar-brand">Eventdotcom</a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="nino-menuItem pull-right">
						<div class="collapse navbar-collapse pull-left" id="nino-navbar-collapse">
						
							<ul class="nav navbar-nav">
								<li class="active"><a href="#nino-header">Home <span class="sr-only">(current)</span></a></li>
								<li><a href="#nino-entertainment">Entertainment</a></li>
								<li><a href="#nino-music">Music</a></li>
								
								<?php echo userLogin($status)?>
							</ul>
							
							<ul class="nino-iconsGroup nav navbar-nav">
								<li><a href="#" class="nino-search"><i class="mdi mdi-magnify nino-icon"></i></a></li>
							</ul>

					</div>
				</div><!-- /.container-fluid -->
			</nav>

		</div>
	</header><!--/#header-->

	<!-- content
    ================================================== -->
	<section class="content">
		
	</section><!--/content-->
   
    <!-- Footer
    ================================================== -->
    <footer id="footer">
        <div class="container">
			<div class="nino-copyright">Copyright &copy; 2016 <a target="_blank" href="http://www.ninodezign.com/" title="Ninodezign.com - Top quality open source resources for web developer and web designer">Ninodezign.com</a>. All Rights Reserved. <br/> MoGo free PSD template by <a href="https://www.behance.net/laaqiq">Laaqiq</a></div>
        </div>
    </footer><!--/#footer-->

    <!-- Search Form - Display when click magnify icon in menu
    ================================================== -->
    <form action="" id="nino-searchForm">
    	<input type="text" placeholder="Search..." class="form-control nino-searchInput">
    	<i class="mdi mdi-close nino-close"></i>
    </form><!--/#nino-searchForm-->

    <!-- Scroll to top
    ================================================== -->
	<a href="#" id="nino-scrollToTop">Go to Top</a>

	<!-- javascript -->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/isotope.pkgd.min.js"></script>
	<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.hoverdir.js"></script>
	<script type="text/javascript" src="js/modernizr.custom.97074.js"></script>
	<script type="text/javascript" src="js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script type="text/javascript" src="js/unslider-min.js"></script>
	<script type="text/javascript" src="js/template.js"></script>

</body>
</html>




