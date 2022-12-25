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
    


$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];


$number = $_POST['number'];

$user_id = $_POST['user_id'];
$user_type = $_POST['user-type'];



 
$sql= "UPDATE `customers` SET first_name = '$firstname', last_name = '$lastname', phone_number = '$number', email = '$email', user_type = '$user_type' WHERE customer_id = $user_id;";

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