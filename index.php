<?php
	
	include 'DBconnect.php';
	
	$connection = new DBconnect('eventdotcom','root','');
	include 'search.php';

	$user_type = 'guest';
	$me = "";
	
	include 'checker.php';

	if(checkSession()){
		$user = $_SESSION['uid'];

		$me = $connection->select('*', 'users', 'WHERE users.userid='.'"'.$user.'"');
		$user_type = $me[0]["type"];
	}else{
		$user_type = 'guest';
	}

	function showEvent($type_event){
		global $connection;

		$countStartRow = 0;
		$outputShowEvent = '';

		$instrucQuery = $connection->select('*', 'eventdetail', 'where type = "'. $type_event .'" AND Eventdetail.started>=CURDATE()');
		
		foreach($instrucQuery as $row){
			$countStartRow += 1;

			if($row["profilepic"] === "profile-pic"){
				$pictureShow = "images/story/img-2.jpg";
			}
			else{
				$pictureShow = $row["profilepic"];
			}

			if($countStartRow == 1){

				$s_date = (string)$row['started'];
				$start_date = date_create($s_date);
        		$newformatStart = date_format($start_date,"M d,Y h:i a");

				$f_date = (string)$row['finished'];
				$finish_date = date_create($f_date);
        		$newformatFinish = date_format($finish_date,"M d,Y h:i a");

				$outputShowEvent .= '
				<li>
					<div layout="row">
						<div class="container-event">
							<img src="' . $pictureShow . '" alt="picevent" class="image">
						
							<div class="middle">
								<a href="event.php?id=' . $row["eventid"] . '"><button class="btn btn-success">Buy ticket</button></a>  
							</div>
							<p class="nameEvent">'. $row["eventname"] .'</p>
							<p>' . $newformatStart . ' - ' . $newformatFinish . '</p>
						</div>
				';
			}
			else if($countStartRow == 3){
				$newformatStart = date('M d,Y h:i a',strtotime($row['started']));
				$newformatFinish = date('M d,Y h:i a',strtotime($row['finished']));
				
				$countStartRow = 0;
				$outputShowEvent .= '
						<div class="container-event">
							<img src="' . $pictureShow . '" alt="picevent" class="image">
						
							<div class="middle">
								<a href="event.php?id=' . $row["eventid"] . '"><button class="btn btn-success">Buy ticket</button></a>  
							</div>
							<p class="nameEvent">'. $row["eventname"] .'</p>
							<p>' . $newformatStart . ' - ' . $newformatStart . '</p>
						</div>
					</div>
				</li>
				';
			}
			else{
				$newformatStart = date('M d,Y h:i a',strtotime($row['started']));
				$newformatFinish = date('M d,Y h:i a',strtotime($row['finished']));
				
				$outputShowEvent .= '
						<div class="container-event">
							<img src="' . $pictureShow . '" alt="picevent" class="image">
							<div class="middle">
								<a href="event.php?id=' . $row["eventid"] . '"><button class="btn btn-success">Buy ticket</button></a>  
							</div>
							<p class="nameEvent">'. $row["eventname"] .'</p>
							<p style="color: black">' . $newformatStart . ' - ' . $newformatStart . '</p>
						</div>
				';			
			}
		}
		return $outputShowEvent;
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
								<li class="active"><a href="#nino-header">Home <span class="sr-only">(current)</span></a></li>
								<li><a href="#nino-entertainment">Entertainment</a></li>
								<li><a href="#nino-music">Music</a></li>
								<li><a href="#nino-others">Others</a></li>
								<?php echo userLogin($user_type)?>
							</ul>
							
							<ul class="nino-iconsGroup nav navbar-nav">
								<li><a href="#nino-searching" class="nino-search"><i class="mdi mdi-magnify nino-icon"></i></a></li>
							</ul>

					</div>
				</div><!-- /.container-fluid -->
			</nav>

			<div style="position: absolute; left: 100px; z-index: 1;" id="google_translate_element"> 
			</div> 
			<script type="text/javascript"> 
				function googleTranslateElementInit() { 
				new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element'); 
			} 
			</script> 
			<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

			<section id="nino-slider" class="carousel slide container" data-ride="carousel">

				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					<?php 
						$countEventHead = 0;
						$instrucQuery = $connection->select('*', 'eventdetail', ' order by started AND Eventdetail.started>=CURDATE()');								

						foreach($instrucQuery as $row){

								if($row["profilepic"] === "profile-pic"){
									$pictureHeadShow = "images/story/img-2.jpg";
								}
								else{
									$pictureHeadShow = $row["profilepic"];
								}
					
								$countEventHead += 1;

								if($countEventHead == 1){
							?>
									<div class="item active">
										<a href="event.php?id=<?php echo $row["eventid"] ?>" class="headerSlidePic"><img style="width: 375px; height: 300px;"src="<?php echo $pictureHeadShow ?>"></a>
									</div>	
						<?php
								}
								else if($countEventHead >=2 && $countEventHead < 5){
						?>
									<div class="item">
										<a href="event.php?id=<?php echo $row["eventid"] ?>" class="headerSlidePic"><img style="width: 375px; height: 300px;" src="<?php echo $pictureHeadShow ?>"></a>
									</div>
						<?php 	} 
						}
					?>
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
		<?php 
			if($user_type === 'organizer'){
		?>
			<div class="create-event">
				<a href="newevent.php"><button class="btn btn-success">create event</button></a>
			</div>
		<?php
			}
		?>
		
		<div class="container">
			<h2 class="nino-sectionHeading">
				<span class="nino-subHeading">Mode</span>
				Entertainment
			</h2>	
		</div>
    	<div class="container">
    		<div class="nino-testimonialSlider">
				<ul>
					<?php echo showEvent("entertainm") ?>
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


	<!-- Event others
    ================================================== -->
	<section class="nino-testimonial" id="nino-others">
		<div class="container">
			<h2 class="nino-sectionHeading">
				<span class="nino-subHeading">Mode</span>
				Others
			</h2>	
		</div>
    	<div class="container">
    		<div class="nino-testimonialSlider">
				<ul>
					<?php echo showEvent("other") ?>
				</ul>
			</div>
    	</div>
	</section><!--/#nino-testimonial-others-->

	<!-- Searching
    ================================================== -->
    <section id="nino-searching">
    	<div class="container">
				<form action="" method="post">
					<div>
						Type filter : 
						&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" name="filter" value="name_event" <?php if (isset($filter) && $filter=="name_event") echo "checked";?>>&nbsp;name event
						&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" name="filter" value="name_organizer" <?php if (isset($filter) && $filter=="name_organizer") echo "checked";?>>&nbsp;organizer
						&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" name="filter" value="name_place" <?php if (isset($filter) && $filter=="name_place") echo "checked";?>>&nbsp;place
						&nbsp;&nbsp;&nbsp;&nbsp;
						<!-- <input type="radio" name="filter" value="date_search" >&nbsp;date -->
					</div>
					<div>
						Search 
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="text" name="searchtext">
						<input type="submit" name="search" href="#nino-searching" class="btn btn-danger" value="search">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</div>
					<p>Your search is : <?php echo $searchtext; ?></p>
				</form>

				<div>
					<?php echo $results ; ?>
				</div>
    	</div>
    </section><!--/#nino-searching-->

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
	    		<iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d79466.26604960626!2d-0.19779784176715043!3d51.50733004537892!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2sLondon%2C+UK!3m2!1dz.5073509!2d-0.1277583!5e0!3m2!1sen!2s!4v1469206441744" width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
				
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
	        			</div>.
	        			<p>
	        				Project in Web Technology.
	        			</p>

						<div class="scanqrcode">
							<?php 
								if($user_type === 'organizer'){
							?>
									<a href="scanqrcode.php"><img style="width: 200px; height: 200px" src="images/qrcode/scanqrcode.png" alt=""></a>
							<?php
								}
							?>
						</div>
        			</div>
        		</div>
        		<div class="col-md-4 col-sm-6">
        			<div class="colInfo">
	        			<h3 class="nino-colHeading">Team</h3>
	        			<ul class="listArticles">
	        				<li layout="row" class="verticalCenter">
	        					<div class="info">
	        						<h3 class="articleTitle">Praewa Jidpakdee</h3>
	        						<div class="date">5710400572</div>
	        					</div>
	        				</li>
	        				<li layout="row" class="verticalCenter">
	        					<div class="info">
	        						<h3 class="articleTitle">Chanidapa Nitipittayapakrit</h3>
	        						<div class="date">5710404306</div>
	        					</div>
	        				</li>
	        				<li layout="row" class="verticalCenter">
	        					<div class="info">
	        						<h3 class="articleTitle">Panward Khumdang</h3>
	        						<div class="date">5710404454</div>
	        					</div>
	        				</li>
	        			</ul>
        			</div>
        		</div>
        		<div class="col-md-4 col-sm-6">
              <div class="colInfo">
	        			<h3 class="nino-colHeading">.</h3>
	        			<ul class="listArticles">
	        				<li layout="row" class="verticalCenter">
	        					<div class="info">
	        						<h3 class="articleTitle">Chayapol Poltha</h3>
	        						<div class="date">5710404314</div>
	        					</div>
	        				</li>
	        				<li layout="row" class="verticalCenter">
	        					<div class="info">
	        						<h3 class="articleTitle">Chatchawat Pitanpitayarat</h3>
	        						<div class="date">5710400521</div>
	        					</div>
	        				</li>
	        				<li layout="row" class="verticalCenter">
	        					<div class="info">
	        						<h3 class="articleTitle">Ekachai Srivanna</h3>
	        						<div class="date">5710451606</div>
	        					</div>
	        				</li>
	        			</ul>
        			</div>
        		</div>
        	</div>
			<div class="nino-copyright">Copyright &copy; 2016 <a target="_blank" href="http://www.ninodezign.com/" title="Ninodezign.com - Top quality open source resources for web developer and web designer">Ninodezign.com</a>. All Rights Reserved. <br/> MoGo free PSD template by <a href="https://www.behance.net/laaqiq">Laaqiq</a></div>
        </div>
    </footer><!--/#footer-->

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




