<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";


  if(!isset($_SESSION['user_name']))
  {
    header('location:../../../Admin_Login.php');
  }
 ?>


 <!-- Total HCB count -->
 <?php
   $db   = new Database();
   $sql  = "SELECT * FROM tb_house_cleaning_booking";
   $read1 = $db->select($sql);
   if($read1)
   {
     $total_HCB = $read1->num_rows;
   }
   else
   {
     $total_HCB = 0;
   }
  ?>

  <!-- Total New HCB count -->
  <?php
    $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
    date_default_timezone_set('Asia/Dhaka');
    $db   = new Database();
    $sql  = "SELECT * FROM tb_house_cleaning_booking WHERE entry_time = '$current_datetime'";
    $read_current_date_HCB = $db->select($sql);
    if($read_current_date_HCB)
    {
      $total_HCB_curDate = $read_current_date_HCB->num_rows;
    }
    else
    {
      $total_HCB_curDate = 0;
    }
   ?>

  <!-- Total OCB count -->
  <?php
    $db   = new Database();
    $sql  = "SELECT * FROM tb_office_cleaning_booking";
    $read2 = $db->select($sql);
    if($read2)
    {
      $total_OCB = $read2->num_rows;
    }
    else
    {
      $total_OCB = 0;
    }
   ?>

   <!-- Total New OCB count -->
   <?php
     $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
     date_default_timezone_set('Asia/Dhaka');
     $db   = new Database();
     $sql  = "SELECT * FROM tb_office_cleaning_booking WHERE entry_time = '$current_datetime'";
     $read_current_date_OCB = $db->select($sql);
     if($read_current_date_OCB)
     {
       $total_OCB_curDate = $read_current_date_OCB->num_rows;
     }
     else
     {
       $total_OCB_curDate = 0;
     }
    ?>

   <!-- Total VCB count -->
   <?php
     $db   = new Database();
     $sql  = "SELECT * FROM tb_vehicle_cleaning_booking";
     $read3 = $db->select($sql);
     if($read3)
     {
       $total_VCB = $read3->num_rows;
     }
     else
     {
       $total_VCB = 0;
     }
    ?>

    <!-- Total New VCB count -->
    <?php
      $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
      date_default_timezone_set('Asia/Dhaka');
      $db   = new Database();
      $sql  = "SELECT * FROM tb_vehicle_cleaning_booking WHERE entry_time = '$current_datetime'";
      $read_current_date_VCB = $db->select($sql);
      if($read_current_date_VCB)
      {
        $total_VCB_curDate = $read_current_date_VCB->num_rows;
      }
      else
      {
        $total_VCB_curDate = 0;
      }
     ?>

    <!-- Total User count -->
    <?php
      $db   = new Database();
      $sql  = "SELECT * FROM tb_user";
      $read4 = $db->select($sql);
      if($read4)
      {
        $total_user = $read4->num_rows;
      }
      else
      {
        $total_user = 0;
      }
     ?>

     <!-- Total Staff count -->
     <?php
       $db   = new Database();
       $sql  = "SELECT * FROM tb_staff";
       $read5 = $db->select($sql);
       if($read5)
       {
         $total_staff = $read5->num_rows;
       }
       else
       {
         $total_staff = 0;
       }
      ?>



<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 4 admin, bootstrap 4, css3 dashboard, bootstrap 4 dashboard, AdminWrap lite admin bootstrap 4 dashboard, frontend, responsive bootstrap 4 admin template, Xtreme admin lite design, Xtreme admin lite dashboard bootstrap 4 dashboard template">
    <meta name="description"
        content="Xtreme Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">

    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">

    <title>ADMIN</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/xtreme-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <!-- Custom CSS -->
    <link href="../../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../../dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="index.php">
                        <!-- Logo icon -->
                        ADMIN
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark"
                                href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a
                                    class="srh-btn"><i class="ti-close"></i></a>
                            </form>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <a href="Admin_Sign_up.php" class="btn btn-danger"> Sign Up </a>
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href=""
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                    src="../../assets/images/users/1.jpg" alt="user" class="rounded-circle"
                                    width="31"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <a class="dropdown-item" href="admin_profile.php"><i class="ti-user m-r-5 m-l-5"></i>
                                    My Profile</a>
                                <a class="dropdown-item" href="logout_admin.php" onclick=" return confirm('Are You sure you want to logout?');"><i class="fa fa-power-off m-r-5 m-l-5"></i>
                                    Logout</a>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li>
                            <!-- User Profile-->
                            <div class="user-profile d-flex no-block dropdown m-t-20">
                                <div class="user-pic"><img src="../../assets/images/users/1.jpg" alt="users"
                                        class="rounded-circle" width="40" /></div>
                                <div class="user-content hide-menu m-l-10">
                                    <a href="javascript:void(0)" class="" id="Userdd" >
                                        <h5 class="mt-2 user-name font-medium">Mhm Sohel</h5>
                                    </a>

                                </div>
                            </div>
                            <!-- End User Profile-->
                        </li>

                        <!-- User Profile-->
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="index.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                                    class="hide-menu">Dashboard</span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="admin_profile.php" aria-expanded="false"><i
                                    class="mdi mdi-account-network"></i><span class="hide-menu">Profile</span></a>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="staff_list.php" aria-expanded="false"><i class="mdi mdi-account-network"></i><span
                                    class="hide-menu">Staff</span></a></li>

                                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="house_clean_list.php" aria-expanded="false"><i class="mdi mdi-home"></i><span
                                    class="hide-menu">House Cleaning</span></a></li>

                                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="office_list.php" aria-expanded="false"><i class="mdi mdi-bank"></i><span
                                    class="hide-menu">Office Cleaning</span></a></li>

                                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="vehicle_list.php" aria-expanded="false"><i class="mdi mdi-car-wash"></i><span
                                    class="hide-menu">Vehicle</span></a></li>

                                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="user_list.php" aria-expanded="false"><i class="mdi mdi-account-network"></i><span
                                    class="hide-menu">User</span></a></li>

                                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="Booking_table_house_cleaner.php" aria-expanded="false"><i class="mdi mdi-border-all"></i><span
                                    class="hide-menu">Booking House Cleaner</span></a></li>
                                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="Booking_table_office_cleaner.php" aria-expanded="false"><i class="mdi mdi-border-all"></i><span
                                    class="hide-menu">Booking Office Cleaner</span></a></li>
                                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="Booking_table_vehicle_cleaner.php" aria-expanded="false"><i class="mdi mdi-border-all"></i><span
                                    class="hide-menu">Booking Vehicle Cleaner</span></a></li>



                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-12">
                        <h4 class="page-title">Dashboard</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- <div class="col-7">
                        <div class="text-right upgrade-btn">
                            <a href="https://wrappixel.com/templates/xtremeadmin/" class="btn btn-danger text-white"
                                target="_blank">Upgrade to Pro</a>
                        </div>
                    </div> -->
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-4 mb-3">
                  <div class="card border-info mb-3">
                      <div class="card-body bg-info text-light">
                        <p class="card-text text-left pb-0 mb-0"><i class="fa fa-arrow-down fa-fw fa-3x pb-0 mb-0" aria-hidden="true"></i></p>
                        <p class="card-text text-right py-0 my-0" style="font-size: 16px;">Total HCB: <?php echo $total_HCB; ?> <br> New Booking: <?php echo $total_HCB_curDate; ?></p>
                      </div>
                    <div class="card-footer"><a class="text-info" href="Booking_table_house_cleaner.php">View Details <i class="fa fa-arrow-right fa-fw" aria-hidden="true"></i></a></div>
                  </div>
                </div>

                <div class="col-lg-4 mb-3">
                  <div class="card border-success mb-3">
                      <div class="card-body bg-success text-light">
                        <p class="card-text text-left pb-0 mb-0"><i class="fa fa-arrow-down fa-fw fa-3x pb-0 mb-0" aria-hidden="true"></i></p>
                        <p class="card-text text-right py-0 my-0" style="font-size: 16px;">Total OFCB: <?php echo $total_OCB; ?> <br> New Booking: <?php echo $total_OCB_curDate; ?></p>
                      </div>
                    <div class="card-footer"><a class="text-info" href="Booking_table_office_cleaner.php">View Details <i class="fa fa-arrow-right fa-fw" aria-hidden="true"></i></a></div>
                  </div>
                </div>

                <div class="col-lg-4 mb-3">
                  <div class="card border-warning mb-3">
                      <div class="card-body bg-warning text-light">
                        <p class="card-text text-left pb-0 mb-0"><i class="fa fa-arrow-down fa-fw fa-3x pb-0 mb-0" aria-hidden="true"></i></p>
                        <p class="card-text text-right py-0 my-0" style="font-size: 16px;">Total VWB: <?php echo $total_VCB; ?> <br> New Booking: <?php echo $total_VCB_curDate; ?></p>
                      </div>
                    <div class="card-footer"><a class="text-info" href="Booking_table_vehicle_cleaner.php">View Details <i class="fa fa-arrow-right fa-fw" aria-hidden="true"></i></a></div>
                  </div>
                </div>

                <div class="col-lg-4 mb-3">
                  <div class="card border-warning mb-3">
                      <div class="card-body bg-primary text-light">
                        <p class="card-text text-left pb-0 mb-0"><i class="fa fa-user fa-fw fa-3x pb-0 mb-0" aria-hidden="true"></i></p>
                        <p class="card-text text-right py-0 my-0" style="font-size: 25px;"><?php echo $total_user; ?></p>
                        <p class="card-text text-right py-0 my-0" style="font-size: 16px;">Total User</p>
                      </div>
                    <div class="card-footer"><a class="text-info" href="user_list.php">View Details <i class="fa fa-arrow-right fa-fw" aria-hidden="true"></i></a></div>
                  </div>
                </div>

                <div class="col-lg-4 mb-3">
                  <div class="card border-warning mb-3">
                      <div class="card-body bg-secondary text-light">
                        <p class="card-text text-left pb-0 mb-0"><i class="fa fa-user fa-fw fa-3x pb-0 mb-0" aria-hidden="true"></i></p>
                        <p class="card-text text-right py-0 my-0" style="font-size: 25px;"><?php echo $total_staff; ?></p>
                        <p class="card-text text-right py-0 my-0" style="font-size: 16px;">Total Staff</p>
                      </div>
                    <div class="card-footer"><a class="text-info" href="staff_list.php">View Details <i class="fa fa-arrow-right fa-fw" aria-hidden="true"></i></a></div>
                  </div>
                </div>
              </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Rights Reserved by  Admin. Designed and Developed by <a
                    href="#">Mhm Sohel</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../dist/js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="../../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../../dist/js/custom.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="../../assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="../../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="../../dist/js/pages/dashboards/dashboard1.js"></script>
</body>

</html>
