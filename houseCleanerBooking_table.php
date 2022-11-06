<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";


  if(!isset($_SESSION['user_name']))
  {
    header('location:Userlogin.php');
  }
 ?>


 <!-- House Cleaning Booking List -->
 <?php
   $user_name = $_SESSION['user_name'];
   $db   = new Database();
   $sql  = "SELECT * FROM tb_house_cleaning_booking WHERE user_name = '$user_name'";
   $read = $db->select($sql);
  ?>




<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,300;1,400;1,500&family=Rubik:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">


     <!-- ========================jquery data table query====================================== -->
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="Admin_Side/xtreme-html/ltr/css/bootstrap.min.css">
    <link rel="stylesheet" href="Admin_Side/xtreme-html/ltr/css/mdb.min.css">
    <link rel="stylesheet" href="Admin_Side/xtreme-html/ltr/css/sidenav.css">
    <link rel="stylesheet" href="Admin_Side/xtreme-html/ltr/css/style.css">
    <link rel="stylesheet" href="Admin_Side/xtreme-html/ltr/css/responsive.css">
    <link rel="stylesheet" href="Admin_Side/xtreme-html/ltr/css/datatables.min.css">
    <link rel="stylesheet" href="Admin_Side/xtreme-html/ltr/css/datatables-select.min.css">




    <link rel="stylesheet" href="css/style.css">
    <title>House Cleaner Booking table</title>
</head>

<body>

<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light main-header sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand logo" href="#">Cleaning Crew</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto our-primary-menu">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="#">About us</a></li>
                    <li><a href="#">Services <i class="fas fa-chevron-down"></i> </a>
                        <ul>
                            <li><a href="HouseCleaningService.html">House Cleaning</a></li>
                            <li><a href="OfficeCleaningService.html">Office Cleaning</a></li>
                            <li><a href="VehicleWashingService.html">Vechicle Wash</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Contact</a></li>
                </ul>
                <div class="header-info d-flex align-items-center">
                    <div class="header-search">
                        <span> <i class="fas fa-search"></i> </span>
                    </div>
                    <div class="header-call clearfix">
                        <div class="header-call-icon float-left mr-3 h-100">
                            <span> <i class="fas fa-phone-volume"></i> </span>
                        </div>
                        <div class="header-call-info">
                            <span class="d-block">Call Now</span>
                            <a class="d-block" href="tel:+01861060278">+(018) 61-060278</a>
                        </div>
                    </div>
                    <div class="header-button">
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Logout
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="LoginAdmin.html">My Profile</a>
                              <a class="dropdown-item" href="Userlogin.html">Logout</a>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </nav> -->


    <div class="container-fluid">
        <div class="row">
                    <!-- Column -->
                    <div class="pl-5 pr-5 col-lg-12 col-xlg-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <a href="HouseCleaningService.php" class="btn btn-danger mb-4">Back</a>

                                <table id="VisitorDt" class="table table-striped table-sm table-bordered" cellspacing="0" width="100%">
                                  <thead>
                                    <tr>
                                      <th class="th-sm">Booking_Id</th>
                                      <th class="th-sm">Full name</th>
                                      <th class="th-sm">Phone Number</th>
                                      <th class="th-sm">E-mail</th>
                                      <th class="th-sm">Date & Time</th>
                                      <th class="th-sm">Booking Status</th>
                                      <th class="th-sm">Make Payment</th>
                                      <th class="th-sm">Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>

                                    <?php if($read){ ?>
                                    <?php while($result = $read->fetch_assoc()){?>
                                    <tr>
                                      <td><?php echo $result['house_cleaning_booking_id']; ?></td>
                                      <td><?php echo $result['name']; ?></td>
                                      <td><?php echo $result['phone']; ?></td>
                                      <td><?php echo $result['email']; ?></td>
                                      <td><?php echo $result['date']; ?> , <?php echo $result['time']; ?></td>
                                      <td>

                                        <?php
                                          $booking_status = $result['booking_status'];

                                          if($booking_status == 1)
                                          {
                                            $msg = '<div class="m-auto bg-success text-light text-center" style="border-radius: 5px;"><strong>Confirmed</strong></div><br />';
                                            echo $msg;
                                          }
                                          else
                                          {
                                            $msg = '<div class="m-auto bg-danger text-light text-center" style="border-radius: 5px;"><strong>Pending...</strong></div><br />';
                                            echo $msg;
                                          }
                                        ?>

                                      </td>
                                      <td><a href="make_payment.php" class="btn btn-secondary btn-sm">Make Payment</a></td>

                                      <td><a href="Update_houseCleanerBooking.php?house_cleaning_booking_id=<?php echo $result['house_cleaning_booking_id']; ?>" class="btn btn-info btn-sm">Update</a> || <a href="delete_data.php?house_cleaning_booking_id=<?php echo $result['house_cleaning_booking_id']; ?>" onclick="return confirm('Are you sure you want to delete this item?')" class="btn btn-danger btn-sm">Delete</a></td>
                                    </tr>
                                    <?php } ?>
                                    <?php }else{ ?>
                                    <?php $msg = '<div class="alert alert-warning alert-dismissable w-75 m-auto" id="flash-msg">No Data Found!</div><br />';
                                      echo $msg; ?>
                                    <?php } ?>

                                  </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
    </div>



















    <!-- Optional JavaScript -->
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
    </script>



     <!-- ========================jquery data table query====================================== -->

    <script src="js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/mdb.min.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/sidebarmenu.js"></script>
<script src="js/sticky-kit.min.js"></script>
<script src="js/custom.min-2.js"></script>
<script src="js/datatables.min.js"></script>
<script src="js/datatables-select.min.js"></script>
<script src="js/custom.js"></script>
<script src="js/axios.min.js"></script>
</body>

</html>
