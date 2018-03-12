<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>DASHGUM - Bootstrap Admin Template</title>

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
    include 'DBconnect.php';
    // include 'reportPDF.php';
   
    $connection  = new DBconnect();
    $lstorg = $connection->select('*','users','WHERE users.type = "organizer" order by fname');
    $lstloc = $connection->select('distinct location','eventdetail',' order by location');
    $lstatt = $connection->select('distinct attendeeslimit','eventdetail',' order by attendeeslimit');


    // echo $lstorg[0];



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
            <a href="index.html" class="logo"><b>DASHGUM FREE</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    <!-- settings start -->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                            <i class="fa fa-tasks"></i>
                            <span class="badge bg-theme">4</span>
                        </a>
                        <ul class="dropdown-menu extended tasks-bar">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green">You have 4 pending tasks</p>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <div class="task-info">
                                        <div class="desc">DashGum Admin Panel</div>
                                        <div class="percent">40%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <div class="task-info">
                                        <div class="desc">Database Update</div>
                                        <div class="percent">60%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <div class="task-info">
                                        <div class="desc">Product Development</div>
                                        <div class="percent">80%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <div class="task-info">
                                        <div class="desc">Payments Sent</div>
                                        <div class="percent">70%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                                            <span class="sr-only">70% Complete (Important)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="external">
                                <a href="#">See All Tasks</a>
                            </li>
                        </ul>
                    </li>
                    <!-- settings end -->
                    <!-- inbox dropdown start-->
                    <li id="header_inbox_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                            <i class="fa fa-envelope-o"></i>
                            <span class="badge bg-theme">5</span>
                        </a>
                        <ul class="dropdown-menu extended inbox">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green">You have 5 new messages</p>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <span class="photo"><img alt="avatar" src="assets/img/ui-zac.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Zac Snider</span>
                                    <span class="time">Just now</span>
                                    </span>
                                    <span class="message">
                                        Hi mate, how is everything?
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <span class="photo"><img alt="avatar" src="assets/img/ui-divya.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Divya Manian</span>
                                    <span class="time">40 mins.</span>
                                    </span>
                                    <span class="message">
                                     Hi, I need your help with this.
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <span class="photo"><img alt="avatar" src="assets/img/ui-danro.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Dan Rogers</span>
                                    <span class="time">2 hrs.</span>
                                    </span>
                                    <span class="message">
                                        Love your new Dashboard.
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <span class="photo"><img alt="avatar" src="assets/img/ui-sherman.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Dj Sherman</span>
                                    <span class="time">4 hrs.</span>
                                    </span>
                                    <span class="message">
                                        Please, answer asap.
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">See all messages</a>
                            </li>
                        </ul>
                    </li>
                    <!-- inbox dropdown end -->
                </ul>
                <!--  notification end -->
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="login.html">Logout</a></li>
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
                  <h5 class="centered">Marcel Newman</h5>
                  <li class="sub-menu">
                      <a  href="javascript:;" >
                          <i class="fa fa-th"></i>
                          <span>Users</span>
                      </a>
                      <ul class="sub">
                          <li ><a  href="userManage.php">User Management</a></li>
                          <li><a  href="addUser.php">Create User</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a class="active" href="javascript:;" >
                          <i class=" fa fa-bar-chart-o"></i>
                          <span>Reports</span>
                      </a>
                      <ul class="sub">
                          <li class="active"><a  href="rptDaily.php">รายงานการจัดอีเว้นท์และการอบรมประจำวัน</a></li>
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
          	<h3><i class="fa fa-angle-right"></i> รายงานการจัดอีเว้นท์และการอบรม</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> รายงานการจัดอีเว้นท์และการอบรมประจำวัน</h4>
                      <form class="form-horizontal style-form" method="POST" action="testpdf.php">        
    
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">วันที่จัดงาน</label>
                              <div class="col-sm-4">
                                  <input class="form-control" type="date" name="edate" >
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">ผู้จัดงาน</label>
                              <div class="col-sm-4">
                                    <select class="form-control" name = "forg">
                                       <option value =""></option>
                                      <?php foreach ($lstorg as $row){ ?>
                                        <option value="<?php echo $row['fname'] ?>"><?php echo $row['fname']." ".$row['lname']?></option>
                                      <?php } ?>
                                     </select>
                              </div>

                               <label class="col-sm-4 col-sm-1 control-label">ถึง</label>
                              <div class="col-sm-4">
                                    <select class="form-control" name = "torg">
                                       <option value =""></option>
                                      <?php foreach ($lstorg as $row){ ?>
                                        <option value="<?php echo $row['fname'] ?>"><?php echo $row['fname']." ".$row['lname']?></option>
                                      <?php } ?>
                                     </select>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">สถานที่จัดงาน</label>
                              <div class="col-sm-4">

                                    <select class="form-control" name = "floc">
                                          <option value =""></option>
                                      <?php foreach ($lstloc as $row){   
                                        ?>
                                        <option value="<?php echo $row['location'] ?>"><?php echo $row['location'] ?></option>
                                      <?php } ?>
                                     </select>
                              </div>

                               <label class="col-sm-4 col-sm-1 control-label">ถึง</label>
                              <div class="col-sm-4">
                                    <select class="form-control" name = "tloc">
                                           <option value =""></option>
                                      <?php foreach ($lstloc as $row){   
                                        ?>
                                        <option value="<?php echo $row['location'] ?>"><?php echo $row['location'] ?></option>
                                      <?php } ?>
                                     
                                     </select>
                              </div>
                          </div>

                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">จำวนวผู้เข้าชม</label>
                                   <div class="col-sm-4">
                                    <select class="form-control" name = "fatt">
                                             <option value =""></option>
                                      <?php foreach ($lstatt as $row){   
                                        ?>
                                        <option value="<?php echo $row['attendeeslimit'] ?>"><?php echo $row['attendeeslimit'] ?></option>
                                      <?php } ?>
                                     </select>
                              </div>

                               <label class="col-sm-4 col-sm-1 control-label">ถึง</label>
                              <div class="col-sm-4">
                                    <select class="form-control" name = "tatt">
                                             <option value =""></option>
                                      <?php foreach ($lstatt as $row){   
                                      ?>
                                        <option value="<?php echo $row['attendeeslimit'] ?>"><?php echo $row['attendeeslimit'] ?></option>
                                      <?php } ?>
                                     </select>
                              </div>
                          </div>

                          
                          <center><p>
                            <button  class="btn btn-primary btn-lg" type="submit" name="submit">Create Report</button>&nbsp;&nbsp;&nbsp;
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
