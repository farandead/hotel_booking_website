<?php 
   
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
        if($count == 1){  
            
            $row = mysqli_fetch_assoc($result);
            $_SESSION["room_id"] =  $row["room_id"];
            $_SESSION["room_type"] =  $row["room_type"];
            $_SESSION["bed_type"] =  $row["bed_type"];
            $_SESSION["max_guests"] =  $row["max_guests"];
            $_SESSION["price_per_night"] =  $row["price_per_night"];
            $_SESSION["room_desc"] =  $row["room_desc"];
            $_SESSION["features"] =  $row["features"];
            $_SESSION["room_img"] =  $row["room_img"];
    $_SESSION['available_rooms'] = $row["available_rooms"]; 
         
            include 'room_desciption_page.php';     
        }  
        else{  
            echo "<h1> 404 NOT FOUND</h1>";  
        } 
?>

