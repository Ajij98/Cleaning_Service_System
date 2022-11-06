<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";


  if(!isset($_SESSION['user_name']))
  {
    header('location:Userlogin.php');
  }
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
    <link rel="stylesheet" href="css/VehicleWashingService.css">
    <title>Vehicle Washing Service</title>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light main-header sticky-top">
      <div class="container-fluid">
          <a class="navbar-brand logo" href="user_home.php">Cleaning Crew</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto our-primary-menu">
                  <li><a href="user_home.php">Home</a></li>
                  <li><a href="user_about_us.php">About us</a></li>
                  <li><a href="#">Services <i class="fas fa-chevron-down"></i> </a>
                  <ul>
                      <li><a href="HouseCleaningService.php">House Cleaning</a></li>
                      <li><a href="OfficeCleaningService.php">Office Cleaning</a></li>
                      <li><a href="VehicleWashingService.php">Vechicle Wash</a></li>
                  </ul>
              </li>
              <li><a href="User_contact_page.php">Contact</a></li>
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
                      <i class="fas fa-user"></i>
                      </button>
                      <div class="dropdown-menu">
                          <a href="logout_user.php" class="dropdown-item" onclick="return confirm('Are You sure you want to logout?');"><i class="fa fa-sign-out"></i> Logout</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </nav>

    <!-- Page title area -->
<div class="page-title-area item-bg-4">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-title-content">
                    <h2>Vehicle Washing Service</h2>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li>Vehicle Washing Service</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- Service Section -->
<section class="services-section grybg py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="finix-text text-center">
                        <a href="vehicleWashingBookingForm.php" class="btn btn-primary m-4"> Book Now </a>
                        <a href="VehicleCleanerBooking_table.php" class="btn btn-primary m-4"> My Booking </a>
                        <h2>Only the best professional services</h2>
                        <p class="w-75 m-auto">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. </p>
                    </div>
                </div>
            </div>
        </div>
</section>




    <!-- Optional JavaScript -->
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
    </script>
</body>

</html>
