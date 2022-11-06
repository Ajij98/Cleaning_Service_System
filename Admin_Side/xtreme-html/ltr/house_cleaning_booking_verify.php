<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";

  if(!isset($_SESSION['user_name']))
  {
    header('location:../../../Admin_Login.php');
  }
 ?>



  <!--Booking VERIFICATION PART-->
  <?php
   $db = new Database();

     if(isset($_GET['house_cleaning_booking_id']))
     {
       $house_cleaning_booking_id = $_GET['house_cleaning_booking_id'];

       $sql = "SELECT booking_status FROM tb_house_cleaning_booking WHERE booking_status = 0 AND house_cleaning_booking_id = '$house_cleaning_booking_id' LIMIT 1";

       $result = $db->link->query($sql) or die($this->link->error.__LINE__);

       if($result->num_rows == 1)
       {
         $sql = "UPDATE tb_house_cleaning_booking SET booking_status = 1 WHERE house_cleaning_booking_id = '$house_cleaning_booking_id' LIMIT 1";

         $update = $db->link->query($sql) or die($this->link->error.__LINE__);

         if($update)
         {
           ?>
           <script type="text/javascript">

             window.location='Booking_table_house_cleaner.php';

           </script>
           <?php
         }
         else
         {
           echo $db->link->error;
         }
       }
       else
       {
         $msg = '<br /><br /><br /><div class="alert alert-danger w-50 m-auto text-center">Something went wrong!</div><br />';
         echo $msg;
       }
     }
     else
     {
       die("Something went wrong!");
     }
   ?>
