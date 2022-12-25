<?php 



$server = "localhost";
$username = "root";
$password = "";


$con = mysqli_connect($server,$username,$password);

if(!$con){
    die("Connection to the database failed due to".
    mysqli_connect_error());
}
    


$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
$phoneNo = $_POST['phoneNo'];



$firstname = mysqli_real_escape_string($con, $_POST['firstname']);
$lastname = mysqli_real_escape_string($con, $_POST['lastname']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$password = mysqli_real_escape_string($con, $_POST['password']);

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

 
$sql= "INSERT INTO `wafiq_project`.`customers` (`customer_id`, `first_name`, `last_name`, `email`, `phone_number`, `password`) VALUES (NULL, '$firstname', '$lastname', '$email', '$phoneNo', '$hashedPassword');";

if($con->query($sql) == true){
    echo "<script>alert('You Have Successfully Signed In')</script>";
   include 'index.php';
}
else{
    // echo "Error L: $sql <br> $con->error";
    echo "<script>alert('Please enter correct details')</script>";
    include 'sign_page.php';
    
}
$con->close();

?>


