<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";

 ?>

<!--USER REGISTRATION PART-->
<?php
  error_reporting( error_reporting() & ~E_NOTICE );
  $db = new Database();
  $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
  date_default_timezone_set('Asia/Dhaka');

  if(isset($_POST['submit']))
  {
    if(checkEmail())
    {
      if(checkUsername())
      {
        if(matchPassword())
        {
          $name      = $_POST['name'];
          $phone     = $_POST['phone'];
          $email     = $_POST['email'];
          $address   = $_POST['address'];
          $user_name = $_POST['user_name'];
          $password  = $_POST['password'];

          $sql = "INSERT INTO          tb_user(name,phone,email,address,user_name,password,entry_time)values('$name','$phone','$email','$address','$user_name','$password','$current_datetime')";
          $insert_row = $db->insert($sql);

          if($insert_row)
          {
            $msg = '<div class="alert alert-success w-50 m-auto"><strong>Registration Successfull.</strong> Thank You!</div><br />';

          }
          else {
            $msg = '<div class="alert alert-danger w-50 m-auto"><strong>Error!</strong> Something went wrong!</div><br />';
          }
        }
      }
    }
  }
  function checkEmail()
  {
    $db     = new Database();
    $sql    = "SELECT * FROM tb_user WHERE email='".$_POST['email']."'";
    $result = $db->link->query($sql) or die($this->link->error.__LINE__);
    if($result->num_rows > 0)
    {
      $msg = '<div class="alert alert-warning alert-dismissable w-50 m-auto" id="flash-msg"><strong>Warning!</strong>Email already Exist!</div><br />';
      echo $msg;
      return false;
    }
    else
    {
      return true;
    }
  }
  function checkUsername()
  {
    $db     = new Database();
    $sql    = "SELECT * FROM tb_user WHERE user_name='".$_POST['user_name']."'";
    $result = $db->link->query($sql) or die($this->link->error.__LINE__);
    if($result->num_rows > 0)
    {
      $msg = '<div class="alert alert-warning alert-dismissable w-50 m-auto" id="flash-msg"><strong>Warning!</strong>Username already Exist!</div><br />';
      echo $msg;
      return false;
    }
    else
    {
      return true;
    }
  }
  function matchPassword(){
    if($_POST['password'] !== $_POST['confirm_pass'])
    {
      $msg = '<div class="alert alert-warning alert-dismissable w-50 m-auto" id="flash-msg"><strong>Warning!</strong>Password and Confirm password should match!</div><br />';
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
    <link rel="stylesheet" href="css/UserSignUp.css">
    <title>User Sign up</title>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light main-header sticky-top">
      <div class="container-fluid">
          <a class="navbar-brand logo" href="index.php">Cleaning Crew</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto our-primary-menu">
                  <li><a href="index.php">Home</a></li>
                  <li><a href="aboutUs.php">About us</a></li>
                  <li><a href="service.php">Services  </a>
                      <!-- <ul>
                          <li><a href="HouseCleaningService.html">House Cleaning</a></li>
                          <li><a href="OfficeCleaningService.html">Office Cleaning</a></li>
                          <li><a href="VehicleWashingService.html">Vechicle Wash</a></li>
                      </ul> -->
                  </li>
                  <li><a href="contact.php">Contact</a></li>
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
                          Login
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="Admin_Login.php">Admin</a>
                            <a class="dropdown-item" href="Userlogin.php">User</a>
                        </div>
                  </div>
                  <a href="UserSignup.php" class="btn btn-danger">Sign up</a>
              </div>
          </div>
      </div>
  </nav>

<?php echo $msg; ?>
    <div class="container">
        <div class="sign-in-form">
            <div class="sign-in-title">
                <h2>Sign up!</h2>
            </div>
            <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="inputName" class="form-label">Full Name</label>
                            <input type="name" name="name" class="form-control" placeholder="Full Name" required>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="inputPhone" class="form-label">Phone Number</label>
                            <input type="number" name="phone" class="form-control" placeholder="Phone Number" required>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="inputEmail" class="form-label">E-mail</label>
                            <input type="email" name="email" class="form-control" placeholder="info@gmail.com" required>
                        </div>
                    </div>

                      <div class="col-12">
                        <div class="form-group">
                            <label for="inputAddress" class="form-label">Address</label>
                            <input type="text" name="address" class="form-control" id="inputAddress" placeholder="" required>
                        </div>
                      </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="name" name="user_name" class="form-control" placeholder="User Name" required>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="password" name="confirm_pass" class="form-control" placeholder="Confirm Password" required>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="send-btn">
                            <input class="btn btn-danger" type="submit" name="submit" value="Sign Up">
                        </div>
                        <br>
                        <span>Already a registered user? <a href="Userlogin.php">Login!</a></span>
                    </div>
                </div>
            </form>
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
</body>

</html>
