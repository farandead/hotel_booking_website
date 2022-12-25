<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
$server = "localhost";
$username = "root";
$password = "";
$db_name = "wafiq_project";

$con = mysqli_connect($server,$username,$password,$db_name );

if(!$con){
    die("Connection to the database failed due to".
    mysqli_connect_error());
}
    


$customer_id = $_POST['email'];
$room_id = $_SESSION['booking-room-id'];
$check_in_date =  $_SESSION['booking-check-in-date'];;
$check_out_date =   $_SESSION['booking-check-out-date'];
$number_of_guests = $_SESSION['booking-guests-no'];
$number_of_rooms = $_SESSION['booking-room-no'];
$payment_amount = $_SESSION['booking-total-amount'];
$payment_name = $_POST['Name'];
$_SESSION['booking-name'] = $payment_name;
$_SESSION['booking-email'] = $_POST['email'];


$sql = "SELECT available_rooms from rooms WHERE room_id = '$room_id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$modified_no_of_rooms = $row["available_rooms"] -$number_of_rooms ;

$sql_update = "UPDATE rooms SET available_rooms = '$modified_no_of_rooms' where room_id = '$room_id' ";
if($con->query($sql_update ) == true){
    $sql= "INSERT INTO bookings (`booking_id`, `customer_id`, `room_id`, `check_in_date`, `check_out_date`, `number_of_guests`, `number_of_rooms`,`status`) VALUES (NULL, '$customer_id', '$room_id', '$check_in_date', '$check_out_date', '$number_of_guests', '$number_of_rooms','Confirmed');";

if($con->query($sql) == true){

         $sql_payment = "INSERT INTO payments (`payment_id`, `customer_id`, `payment_amount`, `payment_date`) VALUES (NULL, '$customer_id', '$payment_amount', current_timestamp() );";
        if ($con->query($sql_payment) == true) {
            
            echo "<script>alert('Your booking has been successfull ')</script>";
           include 'booking-reciEpt.php';
        }else{
            echo "<script>alert(Your booking was  unsuccessfull')</script>";
            header('location:booking-page.php');
            
        }
    
}
else{
    // echo "Error L: $sql <br> $con->error";
    echo "<script>alert(Your booking was  unsuccessfull')</script>";
    include 'index.php';
    
}
$con->close();
   
}

