<?php
  include "include/Config.php";
  include "include/Database.php";
 ?>


          <!-- Delete House Cleaning Booking -->
          <?php
            error_reporting( error_reporting() & ~E_NOTICE );
            $db = new Database();
            $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
            date_default_timezone_set('Asia/Dhaka');

            if(isset($_GET['house_cleaning_booking_id']))
            {
              $house_cleaning_booking_id = $_GET['house_cleaning_booking_id'];

              $sql = "DELETE FROM tb_house_cleaning_booking WHERE house_cleaning_booking_id = $house_cleaning_booking_id";
              $delete_row = $db->delete($sql);
              if($delete_row)
              {
                ?>

                <script type="text/javascript">

                  window.location='Booking_table_house_cleaner.php';

                </script>

                <?php
              }
              else
              {
                $msg = '<div class="alert alert-danger alert-dismissible fade show w-75 m-auto"><strong>Error!</strong> Something went wrong.</div><br />';
                echo $msg;
                return false;
              }
            }
            ?>



            <!-- Delete Vehicle Cleaning Booking -->
            <?php
              error_reporting( error_reporting() & ~E_NOTICE );
              $db = new Database();
              $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
              date_default_timezone_set('Asia/Dhaka');

              if(isset($_GET['vehicle_cleaning_booking_id']))
              {
                $vehicle_cleaning_booking_id = $_GET['vehicle_cleaning_booking_id'];

                $sql = "DELETE FROM tb_vehicle_cleaning_booking WHERE vehicle_cleaning_booking_id = $vehicle_cleaning_booking_id";
                $delete_row = $db->delete($sql);
                if($delete_row)
                {
                  ?>

                  <script type="text/javascript">

                    window.location='Booking_table_vehicle_cleaner.php';

                  </script>

                  <?php
                }
                else
                {
                  $msg = '<div class="alert alert-danger alert-dismissible fade show w-75 m-auto"><strong>Error!</strong> Something went wrong.</div><br />';
                  echo $msg;
                  return false;
                }
              }
              ?>



              <!-- Delete Office Cleaning Booking (User)-->
              <?php
                error_reporting( error_reporting() & ~E_NOTICE );
                $db = new Database();
                $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
                date_default_timezone_set('Asia/Dhaka');

                if(isset($_GET['office_cleaning_booking_id']))
                {
                  $office_cleaning_booking_id = $_GET['office_cleaning_booking_id'];

                  $sql = "DELETE FROM tb_office_cleaning_booking WHERE office_cleaning_booking_id = $office_cleaning_booking_id";
                  $delete_row = $db->delete($sql);
                  if($delete_row)
                  {
                    ?>

                    <script type="text/javascript">

                      window.location='OfficeCleanerBooking_table.php';

                    </script>

                    <?php
                  }
                  else
                  {
                    $msg = '<div class="alert alert-danger alert-dismissible fade show w-75 m-auto"><strong>Error!</strong> Something went wrong.</div><br />';
                    echo $msg;
                    return false;
                  }
                }
                ?>
