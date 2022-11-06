<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";


  if(!isset($_SESSION['user_name']))
  {
    header('location:Userlogin.php');
  }
 ?>

 <!--Select vehicle-->
  <?php
    $db      = new Database();
    $sql     = "SELECT vehicle FROM tb_vehicle_cleaning_booking";
    $vehicle_data = $db->select($sql);
   ?>


 <!-- Select Vehicle Cleaning Booking -->
 <?php
   error_reporting( error_reporting() & ~E_NOTICE );
   $db = new Database();
   $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
   date_default_timezone_set('Asia/Dhaka');

   if(isset($_GET['vehicle_cleaning_booking_id']))
   {
       $vehicle_cleaning_booking_id = $_GET['vehicle_cleaning_booking_id'];

       $sql    = "SELECT * FROM tb_vehicle_cleaning_booking WHERE vehicle_cleaning_booking_id = $vehicle_cleaning_booking_id";

       $result = $db->select($sql);

       while($getData = $result->fetch_assoc())
       {

         $name               = $getData['name'];
         $phone              = $getData['phone'];
         $email              = $getData['email'];
         $address            = $getData['address'];
         $city               = $getData['city'];
         $postcode           = $getData['postcode'];
         $vehicle            = $getData['vehicle'];
         $amount             = $getData['amount'];
         $cleaning_product   = $getData['cleaning_product'];
         $time               = $getData['time'];
         $date               = $getData['date'];
         $total_amount       = $getData['total_amount'];

       }
     }
    ?>


    <!--Update Vehicle Cleaning Booking -->
    <?php
     $user_name = $_SESSION['user_name'];
      error_reporting( error_reporting() & ~E_NOTICE );
      $db = new Database();
      $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
      date_default_timezone_set('Asia/Dhaka');

     if(isset($_POST['update']))
     {
       if(checkPhone())
       {
         $vehicle_cleaning_booking_id = $_GET['vehicle_cleaning_booking_id'];

         $name               = $_POST['name'];
         $phone              = $_POST['phone'];
         $email              = $_POST['email'];
         $address            = $_POST['address'];
         $city               = $_POST['city'];
         $postcode           = $_POST['postcode'];
         $vehicle            = $_POST['vehicle'];
         $amount             = $_POST['amount'];
         $cleaning_product   = $_POST['cleaning_product'];
         $time               = $_POST['time'];
         $date               = $_POST['date'];
         $total_amount       = $_POST['total_amount'];
         $user_name          = $user_name;

         $sql = "UPDATE tb_vehicle_cleaning_booking SET name='$name',phone='$phone',email='$email',address='$address',city='$city',postcode='$postcode',vehicle='$vehicle',amount='$amount',cleaning_product='$cleaning_product',time='$time',date='$date',total_amount='$total_amount',user_name='$user_name',entry_time='$current_datetime' WHERE vehicle_cleaning_booking_id = $vehicle_cleaning_booking_id";

         $update_row = $db->update($sql);

         if($update_row)
         {
         ?>
         <script type="text/javascript">

           window.location='VehicleCleanerBooking_table.php';

         </script>
         <?php
         }
         else
         {
           ?>
           <script type="text/javascript">

             window.alert("Warning! Something went wrong.");

           </script>
           <?php
           return false;
         }
       }
     }

   function checkPhone()
   {
     if(strlen($_POST['phone']) != 11)
     {
       $msg = '<div class="alert alert-warning alert-dismissable w-50 m-auto" id="flash-msg"><strong>Warning!</strong> Mobile Number should be 11 digits.</div><br />';
       echo $msg;
     }
     else
     {
       return true;
     }
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
                <!--Date Picker-->
                <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
                <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
                <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
                <link rel="stylesheet" href="css/houseCleanerBooking.css">
                <title>Update Vehicle Cleaner Booking</title>
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

                <div class="container">
                    <div class="houseclean-form">
                        <div class="Houseclean-title">
                            <h2>Update Now!</h2>
                        </div>
                        <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="name" name="name" class="form-control" value="<?php echo $name; ?>" placeholder="Full Name">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="number" name="phone" class="form-control" value="<?php echo $phone; ?>" placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="name" name="email" class="form-control" value="<?php echo $email; ?>" placeholder="E-mail">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="inputAddress" class="form-label">Address</label>
                                        <input type="text" name="address" class="form-control" value="<?php echo $address; ?>" id="inputAddress" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="inputCity" class="form-label">City</label>
                                        <input type="text" name="city" class="form-control" value="<?php echo $city; ?>" id="inputCity">

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="inputZip" class="form-label">Postal Code</label>
                                        <input type="text" name="postcode" class="form-control" value="<?php echo $postcode; ?>" id="inputZip">

                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-12 mt-4">
                                    <div class="form-group">
                                        <label for="inputCleaningProducts" class="form-label">Select Vehicle</label>
                                        <select id="inputCleaningProducts" class="form-select" name="vehicle">
                                            <option selected><?php echo $vehicle; ?></option>
                                            <?php while($getData = $vehicle_data->fetch_assoc()){ ?>
                                            <option><?php echo $getData['vehicle']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" name="amount" value="<?php echo $amount; ?>" placeholder="Amount">
                                    </div>
                                </div>
                                <div class="col-12 mt-4">
                                    <div class="form-group">
                                        <label for="inputCleaningProducts" class="form-label">Cleaning Products</label>
                                        <p style="font-size: 13px;">-Includes sprays and cloths. Your Housekeeper cannot bring a vacuum, mop or bucket</p>
                                        <select id="inputCleaningProducts" class="form-select" name="cleaning_product">
                                            <option selected><?php echo $cleaning_product; ?></option>
                                            <option>I will Provide</option>
                                            <option>Bring Cleaning Products (+200 taka)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 mt-4">
                                    <div class="form-group">
                                        <label for="inputCleaningProducts" class="form-label">Time</label>
                                        <select id="inputCleaningProducts" class="form-select" name="time">
                                            <option selected><?php echo $time; ?></option>
                                            <option>10 a.m</option>
                                            <option>11 a.m</option>
                                            <option>12 a.m</option>
                                            <option>1 p.m</option>
                                            <option>2 p.m</option>
                                            <option>3 p.m</option>
                                            <option>4 p.m</option>
                                            <option>5 p.m</option>
                                            <option>6 p.m</option>
                                            <option>7 p.m</option>
                                            <option>8 p.m</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <label for="inputCleaningProducts" class="form-label">Date</label>
                            <input id="datepicker" width="276" name="date" value="<?php echo $date; ?>" />

                            <div class="row mt-4 mb-4">
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label for="inputState" class="form-label" >Total Amount</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" name="total_amount" value="<?php echo $total_amount; ?>" placeholder="">
                                    </div>
                                </div>

                            </div>
                            <input type="submit" class="btn btn-danger" name="update" value="Update">
                        </form>

                        <script>
                        $('#datepicker').datepicker({
                        uiLibrary: 'bootstrap4'
                        });
                        </script>
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
