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
    $connection  = new DBconnect();
    $result = $connection->select('*','users','');
    $delete = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST["del"])){
         
          $uid = $_POST['id'];
          $delete=$connection->delete('users','WHERE users.userid='.'"'.$uid.'"');
           header( "Location: userManage.php" );
           echo "<script type='text/javascript'>alert('Delete Account Success.');</script>";
          // echo"<script type='text/javascript'> location.reload(true);</script>";
          // echo "<script type='text/javascript'>alert('Success.');</script>";

        }


      }
     
    ?>

  </head>

  <body>

  <script type="text/javascript">
    var x
  function deleteRow(r) {
    var i = r.parentNode.parentNode.rowIndex;
    x = document.getElementById("myTable").rows[i].cells[0];
    document.getElementById("myTable").deleteRow(i);
    }
  </script>

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
                  <h5 class="centered">EVENTDOTCOM ADMIN</h5>
                  <li class="sub-menu">
                      <a class="active" href="javascript:;" >
                          <i class="fa fa-th"></i>
                          <span>Users</span>
                      </a>
                      <ul class="sub">
                          <li class="active"><a  href="userManage.php">User Management</a></li>
                          <li ><a  href="addUser.php">Create User</a></li>
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
            <h2><i class="fa fa-angle-right"></i> Users Management</h2>
            <div class="form-group">
                <h3><label class="col-sm-3 col-sm-1 control-label">Search</label></h3>
                <div class="col-sm-7">
                    <input type="text"  class="form-control" name="lname" placeholder="Lastname">
                </div>
            </div>
            <br>
              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          
                            <h4><i class="fa fa-angle-right"></i> Users</h4>
                            <hr>
                              <!-- <thead> -->

                         
                              <table class="table table-striped table-advance table-hover" id = "myTable">
                                  <tr>
                                      <th> ID</th>
                                      <th><i class="fa fa-bullhorn"></i> Firstname</th>
                                      <th class="hidden-phone"></i> Lastname</th>
                                      <th> Phone Number</th>
                                      <th><i ></i> Role</th>
                                      <th></th>
                                  </tr>
                                  <!-- </thead> -->
                                  <tbody>
                                   
                                    <?php foreach ($result as $row) {  ?>
                                    <form method ="POST" >
                                        <tr>
                                          <td>
                                            <input hidden=true name='id' value="<?php echo $row['userid']?>"> <?php echo $row['userid'] ?> 
                                          </td>
                                          <td><?php echo $row['fname'] ?></td>
                                          <td><?php echo $row['lname'] ?></td>
                                          <td><?php echo $row['phoneno'] ?></td>
                                          <td><?php echo $row['type'] ?></td>

                                          <td>
                                            <button class="btn btn-primary btn-xs" type="submit" name="edit" formaction ="editUser.php"><i class="fa fa-pencil" ></i>
                                            </button>
                                            <button class="btn btn-danger btn-xs" type="submit" name="del" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" ><i class="fa fa-trash-o "></i>
                                            </button>
                                          </td>
                                      </tr>
                                </form>
                                    <?php  } ?>
                                 
                              
                                  </tbody>
                              </table>
                          
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->

    </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
     <!--  <footer class="site-footer">
          <div class="text-center">
              2014 - Alvarez.is
              <a href="basic_table.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer> -->
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
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
