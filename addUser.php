<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>EVENTDOTCOM</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php
    include 'DBconnect01.php';
   
    // $connection  = new DBconnect();

    $fnameErr = $addrErr = $emailErr = $phonenoErr = $usernameErr= $pwdErr = $typeErr ='' ;
    $fname = $lname = $addr = $phoneno = $email = $username= $pwd = $type = '';

    $check = 1;
    // echo "<script type='text/javascript'>alert('Success1.');</script>";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      // echo "<script type='text/javascript'>alert('Success2.');</script>";


      // if ($fnameErr != '' && $addr != '' && $email !='' && $phoneno !='' && $username != ''&& $pwd != '' && $typeErr != '') {
      if(isset($_POST["submit"])){
        $data = $_POST;
         $connection  = new DBconnect();

        $column = "(type, fname, lname, address, phoneno, email, pwd, uname, ustatus)";
       

        $value = "("."'".$data['role']."',". "'".$data['fname']."',". "'".$data['lname']."'," ."'".$data['addr']."',". "'".$data['phoneno']."'," ."'".$data['email']."'," ."'".password_hash($data['password'], PASSWORD_DEFAULT)."',"."'".$data['username']."',".'1'.")";
        $signup = $connection->insert('users', $column, $value);
        echo "<script type='text/javascript'>alert('Adding Account Success.');</script>";
      }



    }

    

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    // if(isset($_POST["submit"])){
    //   global $db;
    //     // $db = new DBMS();
    //     // if($_POST["pw"] != $_POST["rpw"]){
    //     //     echo "<script type='text/javascript'>alert('Pw not match.');</script>";
    //     // }
    //     // else{
    //         echo "adddd";
    //         echo "<script type='text/javascript'>alert('KKKKK.');</script>";
    //         $db->addUser($_POST["id"],$_POST["role"] ,$_POST["fname"], $_POST["lname"], $_POST["addr"], $_POST["phoneno"],$_POST["password"]);
    //         echo "<script type='text/javascript'>alert('Success.');</script>";
    //     // }
    // }
     ?> 
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
    <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.html" class="logo"><b>EVENTDOTCOM ADMIN</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
            </div>
            <div class="top-menu">
                <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="logout.php">Logout</a></li>
                </ul>
            </div>
  </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
  <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
                  <p class="centered"><a href="profile.html"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
                  <h5 class="centered">EVENTDOTCOM ADMIN</h5>
                  <li class="sub-menu">
                      <a class="active" href="javascript:;" >
                          <i class="fa fa-th"></i>
                          <span>Users</span>
                      </a>
                      <ul class="sub">
                          <li ><a  href="userManage.php">User Management</a></li>
                          <li class="active"><a  href="addUser.php">Create User</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a  href="javascript:;" >
                          <i class=" fa fa-bar-chart-o"></i>
                          <span>Reports</span>
                      </a>
                      <ul class="sub">
                          <li ><a  href="rptDaily.php">รายงานประจำวัน</a></li>
                          <li><a  href="rptMonthly.php">รายงานประจำเดือน</a></li>
                          <li ><a  href="rptYearly.php">รายงานประจำปี</a></li>
                          <!-- <li><a  href="chartjs.html">Chartjs</a></li> -->
                      </ul>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
  
 </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Create User</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> User Information</h4>
                        <form class="form-horizontal style-form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        
                         
               
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Firstname</label>
                            <div class="col-sm-10">
                                <input type="text"  class="form-control" name="fname" placeholder="Firstname" required="required">
                            </div>
                            <span class="col-sm-2 col-sm-2 col-sm-10 "></span>
                            <span class="col-sm-10 error" style="color: rgb(255,0,0);"><?php echo $fnameErr; ?></span>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Lastname</label>
                            <div class="col-sm-10">
                                <input type="text"  class="form-control" name="lname" placeholder="Lastname">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Address</label>
                            <div class="col-sm-10">
                                <input type="text"  class="form-control" name="addr" placeholder="Address" required="required">
                            </div>
                             <span class="col-sm-2 col-sm-2 col-sm-10 "></span>
                            <span class="col-sm-10 error" style="color: rgb(255,0,0);"><?php echo $addrErr; ?></span>
                        </div>

                         <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Phone Number</label>
                            <div class="col-sm-10">
                                <input type="text"  class="form-control" name="phoneno" placeholder="Phone Number" required="required">
                            </div>
                             <span class="col-sm-2 col-sm-2 col-sm-10 "></span>
                            <span class="col-sm-10 error" style="color: rgb(255,0,0);"><?php echo $phonenoErr; ?></span>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">E-Mail</label>
                            <div class="col-sm-10">
                                <input type="email"  class="form-control" name="email" placeholder="email@example.com" required="required">
                            </div>
                             <span class="col-sm-2 col-sm-2 col-sm-10 "></span>
                            <span class="col-sm-10 error" style="color: rgb(255,0,0);"><?php echo $emailErr; ?></span>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text"  class="form-control" name="username" placeholder="username" required="required">
                            </div>
                             <span class="col-sm-2 col-sm-2 col-sm-10 "></span>
                            <span class="col-sm-10 error" style="color: rgb(255,0,0);"><?php echo $usernameErr; ?></span>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password"  class="form-control" placeholder="password" name="password" required="required">
                            </div>
                             <span class="col-sm-2 col-sm-2 col-sm-10 "></span>
                            <span class="col-sm-10 error" style="color: rgb(255,0,0);"><?php echo $pwdErr; ?></span>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 col-sm-3 control-label">Role</label>
                            <label>
                              <input type="radio" name="role" id="radio1" value="admin" >Admin
                            </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                             <label>
                              <input type="radio" name="role" id="radio2" value="organizer" >Organizer
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                             <label>
                              <input type="radio" name="role" id="radio3" value="attendant" >Attendant
                            </label>
                            <br>

                             <span class="col-sm-2 col-sm-2 col-sm-10 "></span>
                            <span class="col-sm-10 error" style="color: rgb(255,0,0);"><?php echo $typeErr; ?></span>
                        </div>
                        <br>
                        <center><p>
                          <button  class="btn btn-primary btn-lg" type="submit" name="submit">Create Account</button>&nbsp;&nbsp;&nbsp;
                          <button  class="btn btn-default btn-lg" type="reset" name="reset">Cancle</button>
                        </p></center>


  
                    </form>
                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row --> 
     
    
          
						
						
						
						
					
          		
         
          	
          	
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
           <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

	<!--custom switch-->
	<script src="assets/js/bootstrap-switch.js"></script>
	
	<!--custom tagsinput-->
	<script src="assets/js/jquery.tagsinput.js"></script>
	
	<!--custom checkbox & radio-->
	
	<script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>
	
	<script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
	
	
	<script src="assets/js/form-component.js"></script>    
    
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
