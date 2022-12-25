<?php 



$server = "localhost";
$username = "root";
$password = "";


$con = mysqli_connect($server,$username,$password);

if(!$con){
    die("Connection to the database failed due to".
    mysqli_connect_error());
}
    


$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];




$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$message = mysqli_real_escape_string($conn, $_POST['message']);




 
$sql= "INSERT INTO `wafiq_project`.`messages` (`msg_id`, `name`, `email`, `message`) VALUES (NULL, '$name', '$email' , '$message');";

if($con->query($sql) == true){
    echo "<script>alert('Your Message has been Successfully received ')</script>";
   include 'contact_us.php';
}
else{
    // echo "Error L: $sql <br> $con->error";
    echo "<script>alert('Your Message wasn't received')</script>";
    include 'contact_us.php';
    
}
$con->close();

?>


