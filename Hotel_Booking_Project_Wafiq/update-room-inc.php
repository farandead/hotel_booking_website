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
    


$room_id = $_POST['room_id'];
$room_img = $_POST['room_img'];
$room_type = $_POST['room_type'];
$bed_type = $_POST['bed_type'];
$room_size = $_POST['room_size'];
$price_per_night = $_POST['price_per_night'];
$features = $_POST['features'];
$room_desc = $_POST['room_desc'];
$max_guests = $_POST['max_guests'];
$available_rooms = $_POST['available_rooms'];




 
$sql= "UPDATE `rooms` SET room_id = '$room_id', room_img = '$room_img', room_type = '$room_type', bed_type = '$bed_type', room_size = '$room_size', max_guests = '$max_guests' , price_per_night = '$price_per_night' , features = '$features', room_desc = '$room_desc', available_rooms = '$available_rooms'  WHERE room_id = $room_id;";

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