<!-- <?php

      session_start();
      $host = "localhost";
      $user = "root";
      $password = '';
      $db_name = "wafiq_project";

      $con = mysqli_connect($host, $user, $password, $db_name);
      if (mysqli_connect_errno()) {
        die("Failed to connect with MySQL: " . mysqli_connect_error());
      }

      $room = $_GET['room'];
      $room = stripcslashes($room);
      $room = mysqli_real_escape_string($con, $room);
      $sql = "SELECT * from `rooms` where room_id = '$room' ";
      $result = mysqli_query($con, $sql);
      // $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
      $count = mysqli_num_rows($result);
      if ($count == 1) {

        $row = mysqli_fetch_assoc($result);
        $_SESSION["room_id"] =  $row["room_id"];
        $_SESSION["room_type"] =  $row["room_type"];


        $_SESSION["price_per_night"] =  $row["price_per_night"];

        $_SESSION["room_img"] =  $row["room_img"];
      } else {
        echo "<h1> 404 NOT FOUND</h1>";
      }



      ?> -->
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include 'header.php';


?>
<link rel="stylesheet" href="css/booking_page.css">

<style>
  .model {
    width: 71vmax;
  }

  .room {
    width: 71vmax;
    height: 30vmax
  }
  input[type=email]{
    width: 100%;
    padding: 8px 10px 10px;
    margin: 15px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
</style>

<body>
  <div class="model" style="margin-top:30.5vmax;margin-bottom:30vmax">
    <form action="booking-confirm-inc.php" method="POST">
      <div class="room" style="background: url(img/room1.jpg) center center no-repeat;">
        <div class="text-cover">
          <h1><?php
              if (isset($_SESSION['room_type'])) {
                echo $_SESSION['room_type'];
              } else {
                echo "notFound";
              } ?> Room</h1>
          <p class="price"> <?php
                            if (isset($_SESSION['price_per_night'])) {
                              echo $_SESSION['price_per_night'];
                            } else {
                              echo "notFound";
                            } ?> <span>GBP</span> / Night</p>
          <hr>
          <p><?php 
          if($_GET['no-of-rooms']>1){
            echo '' . $_GET['no-of-rooms'] . ' Rooms';
          }else{
            echo 'Entire room ';
          }
          
          ?> for <?php
                              echo $_GET['no-of-guests'];
                              ?> guest</p>
          <p><?php
              $timestamp = strtotime($_GET['check-in-date']);

              // Use the date() function to format the date
              $formatted_date = date('F d, Y', $timestamp);

              // Output the formatted date
              echo $formatted_date;

              ?> to <?php
                    $timestamp = strtotime($_GET['check-out-date']);

                    // Use the date() function to format the date
                    $formatted_date = date('F d, Y', $timestamp);

                    // Output the formatted date
                    echo $formatted_date;
                    ?></p>
        </div>
      </div>
      <div class="payment">
        <div class="receipt-box">
          <h3>Reciept Summary</h3>
          <table class="table">
            <tr>
              <td><?php
                  if (isset($_SESSION['price_per_night'])) {
                    echo $_SESSION['price_per_night'];
                  } else {
                    echo "notFound";
                  } ?> x <?php

                // Set the start and end dates
                $start = new DateTime($_GET['check-in-date']);
                $end = new DateTime($_GET['check-out-date']);

                // Find the difference between the two dates
                $difference = $start->diff($end);

                // Display the number of days
                echo $difference->days;
                ?> nights x <?php echo $_GET['no-of-rooms']
                ?> Rooms </td>
              <td><?php
                  if (isset($_SESSION['price_per_night'])) {
                    echo $_SESSION['price_per_night'] *  $difference->days*$_GET['no-of-rooms'];
                  } else {
                    echo "notFound";
                  } ?> GBP</td>
            </tr>
            <tr>
              <td>Discount</td>
              <td>0 GBP</td>
            </tr>
            <tr>
              <td>Subtotal</td>
              <td><?php
                  if (isset($_SESSION['price_per_night'])) {
                    echo $_SESSION['price_per_night'] *  $difference->days * $_GET['no-of-rooms'];
                  } else {
                    echo "notFound";
                  } ?> GBP</td>
            </tr>
            <tr>
              <td>VAT 20%</td>
              <td><?php
                  if (isset($_SESSION['price_per_night'])) {
                    echo (($_SESSION['price_per_night'] *  $difference->days *$_GET['no-of-rooms']) / 100) * 20;
                  } else {
                    echo "notFound";
                  } ?> GBP</td>
            </tr>
            <tfoot>
              <tr>
                <td>Sum</td>
                <td>£<?php
                      if (isset($_SESSION['price_per_night'])) {
                  $totalAmount = ((($_SESSION['price_per_night'] * $difference->days * $_GET['no-of-rooms']) / 100) * 20) + ($_SESSION['price_per_night'] * $difference->days * $_GET['no-of-rooms']);
                        echo $totalAmount;
                      } else {
                        echo "notFound";
                      } ?></td>
              </tr>
            </tfoot>
          </table>
        </div>
        <div class="payment-info">
          <h3>Payment Info</h3>
          <label>Email</label>
          <input type="email" name="email" value="">
          <label>Name on Credit Card</label>
          <input type="text" name="Name" value="">
          <label>Credit Card Number</label>
          <input type="text" name="Credit-Card" value="">
          <label>CVV</label>
          <input type="text" name="CVV" value="CVV">
          <br><br>
          <input class="btn" type="submit" value="Book Securly">
    </form>
  </div>
  </div>
  </div>
  <?php

  include 'footer.php';
  $_SESSION['booking-room-type'] = $_SESSION['room_type'];
  $_SESSION['booking-check-in-date'] = $_GET['check-in-date'];
  $_SESSION['booking-check-out-date'] = $_GET['check-out-date'];
  $_SESSION['booking-room-no'] =  $_GET['no-of-rooms'];
  $_SESSION['booking-guests-no'] =  $_GET['no-of-guests'];
  $_SESSION['booking-total-amount'] =  $totalAmount;
  $_SESSION['booking-room-id'] = $_SESSION["room_id"];

  ?>
</body>