<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";


  if(!isset($_SESSION['user_name']))
  {
    header('location:Userlogin.php');
  }
 ?>

 <!-- Bed Room Amount Calculation-->
 <?php
   error_reporting( error_reporting() & ~E_NOTICE );
   $db   = new Database();
   $sql  = "SELECT amount FROM tb_house_cleaning WHERE service_name = 'Bed Room'";
   $read = $db->select($sql);

   while($getData = $read->fetch_assoc())
   {
     $bedroom_amt = $getData['amount'];
   }

   ?>

     <script type="text/javascript">
       function myChangeFunction1(no_of_bedroom,a) {
         var badroom_amount = document.getElementById('badroom_amount');
         var a = document.getElementById('a');
         badroom_amount.value = a.value*no_of_bedroom.value;
       }
    </script>

   <?php

  ?>

  <!-- Kitchen Room Amount Calculation-->
  <?php
    error_reporting( error_reporting() & ~E_NOTICE );
    $db   = new Database();
    $sql  = "SELECT amount FROM tb_house_cleaning WHERE service_name = 'Kitchen Room'";
    $read = $db->select($sql);

    while($getData = $read->fetch_assoc())
    {
      $kitchenroom_amt = $getData['amount'];
    }

    ?>

      <script type="text/javascript">
        function myChangeFunction2(no_of_kitchen,b) {
          var kitchenroom_amount = document.getElementById('kitchenroom_amount');
          var b = document.getElementById('b');
          kitchenroom_amount.value = b.value*no_of_kitchen.value;
        }
      </script>

    <?php

   ?>


   <!-- Living Room Amount Calculation-->
   <?php
     error_reporting( error_reporting() & ~E_NOTICE );
     $db   = new Database();
     $sql  = "SELECT amount FROM tb_house_cleaning WHERE service_name = 'Living Room'";
     $read = $db->select($sql);

     while($getData = $read->fetch_assoc())
     {
       $livingroom_amt = $getData['amount'];
     }

     ?>

       <script type="text/javascript">
         function myChangeFunction3(no_of_livingroom,c) {
           var livingroom_amount = document.getElementById('livingroom_amount');
           var c = document.getElementById('c');
           livingroom_amount.value = c.value*no_of_livingroom.value;
         }
       </script>

     <?php

    ?>


    <!-- Bath Room Amount Calculation-->
    <?php
      error_reporting( error_reporting() & ~E_NOTICE );
      $db   = new Database();
      $sql  = "SELECT amount FROM tb_house_cleaning WHERE service_name = 'Bath Room'";
      $read = $db->select($sql);

      while($getData = $read->fetch_assoc())
      {
        $bathroom_amt = $getData['amount'];
      }

      ?>

        <script type="text/javascript">
          function myChangeFunction4(no_of_bathroom,d) {
            var bathroom_amount = document.getElementById('bathroom_amount');
            var d = document.getElementById('d');
            bathroom_amount.value = d.value*no_of_bathroom.value;
          }
        </script>

      <?php

     ?>


     <!-- Carpet Amount Calculation-->
     <?php
       error_reporting( error_reporting() & ~E_NOTICE );
       $db   = new Database();
       $sql  = "SELECT amount FROM tb_house_cleaning WHERE service_name = 'Carpet'";
       $read = $db->select($sql);

       while($getData = $read->fetch_assoc())
       {
         $carpet_amt = $getData['amount'];
       }

       ?>

         <script type="text/javascript">
           function myChangeFunction5(no_of_carpet,e) {
             var carpet_amount = document.getElementById('carpet_amount');
             var e = document.getElementById('e');
             carpet_amount.value = e.value*no_of_carpet.value;
           }
         </script>

       <?php

      ?>


 <!-- House Cleaning Booking -->
 <?php
   $user_name = $_SESSION['user_name'];
   error_reporting( error_reporting() & ~E_NOTICE );
   $db = new Database();
   $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
   date_default_timezone_set('Asia/Dhaka');

   if(isset($_POST['submit']))
   {
     if(checkPhone())
     {
       $name               = $_POST['name'];
       $phone              = $_POST['phone'];
       $email              = $_POST['email'];
       $address            = $_POST['address'];
       $city               = $_POST['city'];
       $postcode           = $_POST['postcode'];
       $no_of_bedroom      = $_POST['no_of_bedroom'];
       $badroom_amount     = $_POST['badroom_amount'];
       $no_of_kitchen      = $_POST['no_of_kitchen'];
       $kitchenroom_amount = $_POST['kitchenroom_amount'];
       $no_of_livingroom   = $_POST['no_of_livingroom'];
       $livingroom_amount  = $_POST['livingroom_amount'];
       $no_of_bathroom     = $_POST['no_of_bathroom'];
       $bathroom_amount    = $_POST['bathroom_amount'];
       $no_of_carpet       = $_POST['no_of_carpet'];
       $carpet_amount      = $_POST['carpet_amount'];
       $cleaning_product   = $_POST['cleaning_product'];
       $time               = $_POST['time'];
       $date               = $_POST['date'];
       $total_amount       = $_POST['total_amount'];
       $user_name          = $user_name;

       $sql = "INSERT INTO          tb_house_cleaning_booking(name,phone,email,address,city,postcode,no_of_bedroom,badroom_amount,no_of_kitchen,kitchenroom_amount,no_of_livingroom,livingroom_amount,no_of_bathroom,bathroom_amount,no_of_carpet,carpet_amount,cleaning_product,time,date,total_amount,user_name,entry_time)values('$name','$phone','$email','$address','$city','$postcode','$no_of_bedroom','$badroom_amount','$no_of_kitchen','$kitchenroom_amount','$no_of_livingroom','$livingroom_amount','$no_of_bathroom','$bathroom_amount','$no_of_carpet','$carpet_amount','$cleaning_product','$time','$date','$total_amount','$user_name','$current_datetime')";
       $insert_row = $db->insert($sql);

       if($insert_row)
       {
       ?>

       <script type="text/javascript">

         window.location='houseCleanerBooking_table.php';

       </script>

       <?php
       }
       else
       {
         $msg = '<div class="alert alert-danger alert-dismissable w-75 m-auto" id="flash-msg"><strong>Error!</strong> Something went wrong! Data not added.</div><br />';
         echo $msg;
         return false;
       }
     }
   }

   function checkPhone(){
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
                <title>House Cleaner Booking</title>
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
                            <h2>House Cleaner Booking!</h2>
                        </div>
                        <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="name" name="name" class="form-control" placeholder="Full Name" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="number" name="phone" class="form-control" placeholder="Phone Number" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="E-mail" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="inputAddress" class="form-label">Address</label>
                                        <input type="text" name="address" class="form-control" id="inputAddress" placeholder="" required>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="inputCity" class="form-label">City</label>
                                        <input type="text" name="city" class="form-control" id="inputCity" required>

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="inputZip" class="form-label">Postal Code</label>
                                        <input type="text" name="postcode" class="form-control" id="inputZip" required>

                                    </div>
                                </div>
                            </div>
                            <div class="row">


                              <div>
                                  <div class="form-group">
                                      <input type="hidden" id="a" name="a" class="form-control" placeholder="Amount" value="<?php echo $bedroom_amt; ?>" required>
                                  </div>
                              </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="number" id="no_of_bedroom" name="no_of_bedroom" class="form-control" onchange="myChangeFunction1(this)" placeholder="No of Bedroom" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="number" id="badroom_amount" name="badroom_amount" class="form-control" placeholder="Amount">
                                    </div>
                                </div>


                                <div>
                                    <div class="form-group">
                                        <input type="hidden" id="b" name="b" class="form-control" placeholder="Amount" value="<?php echo $kitchenroom_amt; ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="number" id="no_of_kitchen" name="no_of_kitchen" class="form-control" onchange="myChangeFunction2(this)" placeholder="No of Kitchen" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="number" id="kitchenroom_amount" name="kitchenroom_amount" class="form-control" placeholder="Amount">
                                    </div>
                                </div>


                                <div>
                                    <div class="form-group">
                                        <input type="hidden" id="c" name="c" class="form-control" placeholder="Amount" value="<?php echo $livingroom_amt; ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="number" id="no_of_livingroom" name="no_of_livingroom" class="form-control" onchange="myChangeFunction3(this)" placeholder="No of Living Room" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="number" id="livingroom_amount" name="livingroom_amount" class="form-control" placeholder="Amount">
                                    </div>
                                </div>


                                <div>
                                    <div class="form-group">
                                        <input type="hidden" id="d" name="d" class="form-control" placeholder="Amount" value="<?php echo $bathroom_amt; ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="number" id="no_of_bathroom" name="no_of_bathroom" class="form-control" onchange="myChangeFunction4(this)" placeholder="No of Bathroom" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="number" id="bathroom_amount" name="bathroom_amount" class="form-control" placeholder="Amount">
                                    </div>
                                </div>


                                <div>
                                    <div class="form-group">
                                        <input type="hidden" id="e" name="e" class="form-control" placeholder="Amount" value="<?php echo $carpet_amt; ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="number" id="no_of_carpet" name="no_of_carpet" class="form-control" onchange="myChangeFunction5(this)" placeholder="No of Carpet" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="number" id="carpet_amount" name="carpet_amount" class="form-control" placeholder="Amount">
                                    </div>
                                </div>


                                <div class="col-12 mt-4">
                                    <div class="form-group">
                                        <label for="inputCleaningProducts" class="form-label">Cleaning Products</label>
                                        <p style="font-size: 13px;">-Includes sprays and cloths. Your Housekeeper cannot bring a vacuum, mop or bucket</p>
                                        <select id="inputCleaningProducts" class="form-select" name="cleaning_product" required>
                                            <option selected>Choose...</option>
                                            <option>I will Provide</option>
                                            <option>Bring Cleaning Products (+200 taka)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 mt-4">
                                    <div class="form-group">
                                        <label for="inputCleaningProducts" class="form-label">Time</label>
                                        <select id="inputCleaningProducts" class="form-select" name="time" required>
                                            <option selected>Select time</option>
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
                            <input id="datepicker" width="276" name="date"  required/>

                            <div>
                                <div class="form-group">
                                    <input type="button" class="btn btn-success mt-4" onclick="Calculate()" value="Calculate Total Amount">
                                </div>
                            </div>

                            <div class="row mt-4 mb-4">
                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <label for="inputState" class="form-label text-danger">Total Amount : </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="number" class="form-control" id="total_amount" name="total_amount" required>
                                    </div>
                                </div>

                            </div>
                            <input type="submit" class="btn btn-danger" name="submit" value="Book Now">

                            <script type="text/javascript">

                            function Calculate() {
                                var badroom_amount     = document.getElementById("badroom_amount").value;
                                var kitchenroom_amount = document.getElementById("kitchenroom_amount").value;
                                var livingroom_amount  = document.getElementById("livingroom_amount").value;
                                var bathroom_amount    = document.getElementById("bathroom_amount").value;
                                var carpet_amount      = document.getElementById("carpet_amount").value;
                                var total_amount_calculate = parseInt(badroom_amount) + parseInt(kitchenroom_amount) + parseInt(livingroom_amount) + parseInt(bathroom_amount) + parseInt(carpet_amount);

                                var total_amount = document.getElementById('total_amount');
                                total_amount.value = parseInt(total_amount_calculate);

                                //document.getElementById("test").innerHTML = parseInt(total_amount_calculate);
                            }

                            </script>
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
