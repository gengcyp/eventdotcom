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
	
	function showEvent($type_event){
		$connection = new PDO(
			'mysql:host=localhost:3306;dbname=eventdotcom;charset=utf8mb4',
			'chanidapa',
			'1234'
			);

		$countStartRow = 0;
		$outputShowEvent = '';

		// $instrucQuery = ' select * from events inner join eventdetail on Events.eventid = Eventdetail.eventid where Eventdetail.type = "'. $type_event .'";';
		// foreach($connection->query($instrucQuery) as $row){
		foreach($connection->query('SELECT * FROM events') as $row) {
			$countStartRow += 1;
			if($countStartRow == 1){
				$outputShowEvent .= '
				<li>
					<div layout="row">
						<div>
							
							<img style="width: 325px; height: 250px;" src="images/story/img-2.jpg" alt="">
							<p style="color: black">' . $row['started'] . ' - ' . $row['finished'] . '</p>
						</div>
				';
			}
			// <img style="width: 325px; height: 250px;" src="'. $row['profilepic'] .'" alt="">
			else if($countStartRow == 3){
				$countStartRow = 0;
				$outputShowEvent .= '
						<div>
							<img style="width: 325px; height: 250px;" src="images/story/img-2.jpg" alt="">
							<p style="color: black">' . $row['started'] . ' - ' . $row['finished'] . '</p>
						</div>	
					</div>
				</li>
				';
			}
			else{
				$outputShowEvent .= '
						<div>
							<img style="width: 325px; height: 250px;" src="images/story/img-2.jpg" alt="">
							<p style="color: black">' . $row['started'] . ' - ' . $row['finished'] . '</p>
						</div>	
				';			
			}
		}
		return $outputShowEvent;
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
								<li><div class="search-panel">
									<form action="" id="nino-header-search">
										<input type="search" placeholder="Search..." id="masthead-search-search"/>
									</form>
								</div></li>
								<li><a href="#" class="nino-search"><i class="mdi mdi-magnify nino-icon"></i></a></li>
							</ul>

					</div>
				</div><!-- /.container-fluid -->
			</nav>

			<section id="nino-slider" class="carousel slide container" data-ride="carousel">

				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					<div class="item active">
						<a href="#" class=""><img src="images/event-head/s2o.jpg"></a>
					</div>

					<?php foreach($connection->query('SELECT * FROM users') as $row) { ?>
						<div class="item">
						<a href="#" class=""><img src="images/event-head/<?php echo  $row['userid'] . '.jpg'; ?>"></a>
								</div>
					<?php } ?>
				</div>

				<!-- Indicators -->
				<ol class="carousel-indicators clearfix">
					<li data-target="#nino-slider" data-slide-to="0" class="active">
						<div class="inner">
							<span class="number">01</span> Event1
						</div>
					</li>
					<li data-target="#nino-slider" data-slide-to="1">
						<div class="inner">
							<span class="number">02</span> Event2
						</div>
					</li>
					<li data-target="#nino-slider" data-slide-to="2">
						<div class="inner">
							<span class="number">03</span> Event3
						</div>
					</li>
					<li data-target="#nino-slider" data-slide-to="3">
						<div class="inner">
							<span class="number">04</span> Event4
						</div>
					</li>
				</ol>
			</section>
		</div>
	</header><!--/#header-->

	<!-- Event entertainment
    ================================================== -->
	<section class="nino-testimonial" id="nino-entertainment">
		<div class="container">
			<h2 class="nino-sectionHeading">
				<span class="nino-subHeading">Mode</span>
				Entertainment
			</h2>	
		</div>
    	<div class="container">
    		<div class="nino-testimonialSlider">
				<ul>
					<?php echo showEvent("entertainment") ?>
				</ul>
			</div>
    	</div>
	</section><!--/#nino-testimonial-entertainment-->

	<!-- Event music
    ================================================== -->
	<section class="nino-testimonial" id="nino-music">
		<div class="container">
			<h2 class="nino-sectionHeading">
				<span class="nino-subHeading">Mode</span>
				Music
			</h2>	
		</div>
    	<div class="container">
    		<div class="nino-testimonialSlider">
				<ul>
					<?php echo showEvent("music") ?>
				</ul>
			</div>
    	</div>
	</section><!--/#nino-testimonial-music-->

	<!-- Counting
    ================================================== -->
    <section id="nino-counting">
    	<div class="container">
    		<div layout="row" class="verticalStretch">
    			<div class="item">
    				<div class="number">42</div>
    				<div class="text">Web Design Projects</div>
    			</div>
    			<div class="item">
    				<div class="number">123</div>
    				<div class="text">happy client</div>
    			</div>
    			<div class="item">
    				<div class="number">15</div>
    				<div class="text">award winner</div>
    			</div>
    			<div class="item">
    				<div class="number">99</div>
    				<div class="text">cup of coffee</div>
    			</div>
    			<div class="item">
    				<div class="number">24</div>
    				<div class="text">members</div>
    			</div>
    		</div>
    	</div>
    </section><!--/#nino-counting-->

   
    <!-- Latest Blog
    ================================================== -->
    <!-- <section id="nino-latestBlog">
    	<div class="container">
    		<h2 class="nino-sectionHeading">
				<span class="nino-subHeading">Our stories</span>
				Latest Blog
			</h2>
			<div class="sectionContent">
				<div class="row">
					<div class="col-md-4 col-sm-4">
						<article>
							<div class="articleThumb">
								<a href="#"><img src="images/our-blog/img-1.jpg" alt=""></a>
								<div class="date">
									<span class="number">15</span>
									<span class="text">Jan</span>
								</div>
							</div>
							<h3 class="articleTitle"><a href="">Lorem ipsum dolor sit amet</a></h3>
							<p class="articleDesc">
								Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
							</p>
							<div class="articleMeta">
								<a href="#"><i class="mdi mdi-eye nino-icon"></i> 543</a>
								<a href="#"><i class="mdi mdi-comment-multiple-outline nino-icon"></i> 15</a>
							</div>
						</article>
					</div>
					<div class="col-md-4 col-sm-4">
						<article>
							<div class="articleThumb">
								<a href="#"><img src="images/our-blog/img-2.jpg" alt=""></a>
								<div class="date">
									<span class="number">14</span>
									<span class="text">Jan</span>
								</div>
							</div>
							<h3 class="articleTitle"><a href="">sed do eiusmod tempor</a></h3>
							<p class="articleDesc">
								Adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
							</p>
							<div class="articleMeta">
								<a href="#"><i class="mdi mdi-eye nino-icon"></i> 995</a>
								<a href="#"><i class="mdi mdi-comment-multiple-outline nino-icon"></i> 42</a>
							</div>
						</article>
					</div>
					<div class="col-md-4 col-sm-4">
						<article>
							<div class="articleThumb">
								<a href="#"><img src="images/our-blog/img-3.jpg" alt=""></a>
								<div class="date">
									<span class="number">12</span>
									<span class="text">Jan</span>
								</div>
							</div>
							<h3 class="articleTitle"><a href="">incididunt ut labore et dolore</a></h3>
							<p class="articleDesc">
								Elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
							</p>
							<div class="articleMeta">
								<a href="#"><i class="mdi mdi-eye nino-icon"></i> 1264</a>
								<a href="#"><i class="mdi mdi-comment-multiple-outline nino-icon"></i> 69</a>
							</div>
						</article>
					</div>
				</div>
			</div>
    	</div>
	</section> -->
	<!--/#nino-latestBlog-->

    <!-- Map
    ================================================== -->
    <section id="nino-map">
    	<div class="container">
    		<h2 class="nino-sectionHeading">
    			<i class="mdi mdi-map-marker nino-icon"></i>
    			<span class="text">Open map</span>
    			<span class="text" style="display: none;">Close map</span>
    		</h2>
    		<div class="mapWrap">
	    		<iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d79466.26604960626!2d-0.19779784176715043!3d51.50733004537892!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2sLondon%2C+UK!3m2!1d51.5073509!2d-0.1277583!5e0!3m2!1sen!2s!4v1469206441744" width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
	    	</div>
    	</div>
    </section><!--/#nino-map-->

    <!-- Footer
    ================================================== -->
    <footer id="footer">
        <div class="container">
        	<div class="row">
        		<div class="col-md-4">
        			<div class="colInfo">
	        			<div class="footerLogo">
	        				<a href="#" >Develop by CodeHere</a>
	        			</div>
	        			<p>
	        				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
	        			</p>

	        			<form action="" class="nino-subscribeForm">
	        				<div class="input-group input-group-lg">
								<input type="email" class="form-control" placeholder="Your Email" required>
								<span class="input-group-btn">
									<button class="btn btn-success" type="submit">Subscribe</button>
								</span>
							</div>
	        			</form>
        			</div>
        		</div>
        		<div class="col-md-4 col-sm-6">
        			<div class="colInfo">
	        			<h3 class="nino-colHeading">Team</h3>
	        			<ul class="listArticles">
	        				<li layout="row" class="verticalCenter">
	        					<a class="articleThumb fsr" href="#"><img src="images/our-blog/img-4.jpg" alt=""></a>
	        					<div class="info">
	        						<h3 class="articleTitle"><a href="#">Praewa Jidpakdee</a></h3>
	        						<div class="date">5710400572</div>
	        					</div>
	        				</li>
	        				<li layout="row" class="verticalCenter">
	        					<a class="articleThumb fsr" href="#"><img src="images/our-blog/img-5.jpg" alt=""></a>
	        					<div class="info">
	        						<h3 class="articleTitle"><a href="#">Chanidapa Nitipittayapakrit</a></h3>
	        						<div class="date">5710404306</div>
	        					</div>
	        				</li>
	        				<li layout="row" class="verticalCenter">
	        					<a class="articleThumb fsr" href="#"><img src="images/our-blog/img-6.jpg" alt=""></a>
	        					<div class="info">
	        						<h3 class="articleTitle"><a href="#">Panward</a></h3>
	        						<div class="date">5710404454</div>
	        					</div>
	        				</li>
	        			</ul>
        			</div>
        		</div>
        		<div class="col-md-4 col-sm-6">
              <div class="colInfo">
	        			<h3 class="nino-colHeading">Team</h3>
	        			<ul class="listArticles">
	        				<li layout="row" class="verticalCenter">
	        					<a class="articleThumb fsr" href="#"><img src="images/our-blog/img-4.jpg" alt=""></a>
	        					<div class="info">
	        						<h3 class="articleTitle"><a href="#">เก่ง</a></h3>
	        						<div class="date">5710404</div>
	        					</div>
	        				</li>
	        				<li layout="row" class="verticalCenter">
	        					<a class="articleThumb fsr" href="#"><img src="images/our-blog/img-5.jpg" alt=""></a>
	        					<div class="info">
	        						<h3 class="articleTitle"><a href="#">แทน</a></h3>
	        						<div class="date">5710404</div>
	        					</div>
	        				</li>
	        				<li layout="row" class="verticalCenter">
	        					<a class="articleThumb fsr" href="#"><img src="images/our-blog/img-6.jpg" alt=""></a>
	        					<div class="info">
	        						<h3 class="articleTitle"><a href="#">โอ้ต</a></h3>
	        						<div class="date">57104</div>
	        					</div>
	        				</li>
	        			</ul>
        			</div>
        		</div>
        	</div>
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

	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<!-- css3-mediaqueries.js for IE less than 9 -->
	<!--[if lt IE 9]>
	    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->

</body>
</html>




