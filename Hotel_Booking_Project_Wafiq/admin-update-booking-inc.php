<?php



$server = "localhost";
$username = "root";
$password = "";
$db_name = 'wafiq_project';


$con = mysqli_connect($server,$username,$password,$db_name);

if(!$con){
    die("Connection to the database failed due to".
    mysqli_connect_error());
}
    


$booking_status = $_GET['booking-type'];
$booking_id = $_GET['edit-booking'];


 
$sql= "UPDATE `bookings` SET status = '$booking_status' WHERE booking_id = $booking_id;";

if($con->query($sql) == true){
    echo "<script>alert('You Have Successfully changed Details')</script>";
   include 'main-admin.php';
}
else{
    // echo "Error L: $sql <br> $con->error";
    echo "<script>alert('The Details weren't updated')</script>";
    include 'main-admin.php';
    
}
$con->close();

?>