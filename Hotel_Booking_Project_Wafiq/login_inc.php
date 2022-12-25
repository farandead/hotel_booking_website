

<?php

session_start();
$host = "localhost";
$user = "root";
$password = '';
$db_name = "wafiq_project";

$con = mysqli_connect($host, $user, $password, $db_name);
if (mysqli_connect_errno()) {
    die("Failed to connect with MySQL: " . mysqli_connect_error());
}

$email = $_GET['email'];
$password = $_GET['password'];

$email = stripcslashes($email);
$password = stripcslashes($password);
$email = mysqli_real_escape_string($con, $email);
$password = mysqli_real_escape_string($con, $password);

$sql = "SELECT * from `customers`  where email = '$email' ";
$result = mysqli_query($con, $sql);
// $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
$count = mysqli_num_rows($result);

$user = mysqli_fetch_assoc($result);



    if (password_verify($password, $user['password'])) {
        // The passwords match, so start a new session and store a session variable
        session_start();
        $_SESSION['logged_in'] = true;
        $_SESSION['firstname'] =  $user["first_name"];
        $_SESSION['lastname'] =  $user["last_name"];
        $_SESSION['email'] =  $user["email"];
        $_SESSION['phone_number'] =  $user["phone_number"];
        $_SESSION['user_type'] =  $user["user_type"];
       
        
        // Redirect to the protected page
        header('Location: userprofile.php');
        exit;
    } else {
    }

    









?> 

