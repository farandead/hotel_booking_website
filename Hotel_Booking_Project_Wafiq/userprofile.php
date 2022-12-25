<?php

error_reporting(E_ALL ^ E_NOTICE);
session_start();

?>
<?php
include 'header.php'

?>

<head>
    <link rel="stylesheet" href="css/userprofile.css">
</head>

<div class="user-profile-main-container">
    <div class="user-profile-icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="40" fill="currentColor" class="bi bi-file-person" viewBox="0 0 16 16">
            <path d="M12 1a1 1 0 0 1 1 1v10.755S12 11 8 11s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h8zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z" />
            <path d="M8 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
        </svg>

    </div>
    <div class="user-profile-details">
        <div class="details-field">
            <div class="details-field-title">First Name</div>
            <div class="details-field-description" style="text-transform:capitalize ;"> <?php
                                                                                        if (isset($_SESSION['firstname'])) {
                                                                                            echo $_SESSION['firstname'];
                                                                                        } else {
                                                                                            echo "notFound";
                                                                                        } ?> </div>
        </div>
        <div class="details-field">
            <div class="details-field-title">Last Name</div>
            <div class="details-field-description" style="text-transform:capitalize ;"><?php
                                                                                        if (isset($_SESSION['lastname'])) {
                                                                                            echo $_SESSION['lastname'];
                                                                                        } else {
                                                                                            echo "notFound";
                                                                                        } ?></div>
        </div>
        <div class="details-field">
            <div class="details-field-title">Email</div>
            <div class="details-field-description"><?php
                                                    if (isset($_SESSION['email'])) {
                                                        echo $_SESSION['email'];
                                                    } else {
                                                        echo "notFound";
                                                    } ?></div>
        </div>
        <div class="details-field">
            <div class="details-field-title">Phone Number</div>
            <div class="details-field-description"><?php
                                                    if (isset($_SESSION['phone_number'])) {
                                                        echo $_SESSION['phone_number'];
                                                    } else {
                                                        echo "notFound";
                                                    } ?></div>
        </div>

    </div>
    <div class="user-orders-details">
        <P>Bookings</P>
        <table>
            <tr>
                <th>Room </th>
                <th>Check-in-Date </th>
                <th>Check-out-Date</th>
                <th>Number of Guests</th>
                <th>Number of Rooms</th>
                <th>Status</th>
            </tr>
            <?php
            $host = "localhost";
            $user = "root";
            $password = '';
            $db_name = "wafiq_project";

            $con = mysqli_connect($host, $user, $password, $db_name);
            if (mysqli_connect_errno()) {
                die("Failed to connect with MySQL: " . mysqli_connect_error());
            }
            $customer = $_SESSION['email'];
            $customer = stripcslashes($customer);
            $customer = mysqli_real_escape_string($con, $customer);
            $sql_order = "SELECT * from `bookings`  where customer_id = '$customer'";

            $result_order = mysqli_query($con, $sql_order);
            // $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
            $count_order = mysqli_num_rows($result_order);

            if ($count_order > 0) {


                for ($x = 1; $x <= $count_order; $x++) {
                    $row_order = mysqli_fetch_assoc($result_order);

                    $room_id = $row_order["room_id"];
                   
                    

                        $sql = "SELECT * FROM `rooms`  where room_id = '$room_id' ";
                        $result = mysqli_query($con, $sql);

                        $row = mysqli_fetch_assoc($result);
                        $row["room_type"];
                        $row_order["check_in_date"];
                        $row_order["check_out_date"];
                        echo  "
                        <tr>
                        <td>" . $row["room_type"] . "</td>
                        <td>" . $row_order['check_in_date'] . "</td>
                        <td>" . $row_order['check_out_date'] . "</td>
                        <td>" . $row_order['number_of_guests'] . "</td>
                        <td>" . $row_order['number_of_rooms'] . "</td>
                        <td>" . $row_order['status'] . "</td>
                        </tr>
                        ";
                    

                }
            } else {
                echo "";
            }  ?>

        </table>

    </div>
    <div class="log-out-button">
        <a href="log_out_func.php"><button>LOG OUT</button></a>
    </div>

</div>
<footer><?php
include 'footer.php'

?></footer>
