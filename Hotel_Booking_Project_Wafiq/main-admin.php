<?php
session_start();

?>

<head>
    <link rel="stylesheet" href="css/admin-main.css">
    <script src="js/admin-main.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        input::file-selector-button {
            color: white;
            background-color: #0885f2;
            font-family: 'Staatliches', cursive;
            border: none;
            border-radius: 6px;
        }
    </style>
</head>

<style>
    @media(max-width: 600px) {
        table {

            font-size: 0.85vmax;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

    }
</style>

<div class="admin-side-main-container">
    <div class="admin-side-sub-container admin-side-sub-container-buttons">
        <div class="admin-control-button-container">

            <Button onclick="changeToOrders()">Manage Bookings</Button>
        </div>
        <div class="admin-control-button-container">
            <button onclick="changeToCustomers()">Customers</button>
        </div>
        <div class="admin-control-button-container">
            <button onclick="changeToProducts()">Manage Rooms</button>
        </div>
        <div class="admin-control-button-container">
            <button onclick="changeToAddProducts()">Add Rooms</button>
        </div>
        <div class="admin-control-button-container">
            <button onclick="changeToRemovProducts()">Messages</button>
        </div>
        <div class="admin-control-button-container">
            <a href="index.php"> <button onclick="return confirm('Do you want to go back to Homepage?');">HOMEPAGE</button></a>

        </div>
    </div>
    <div class="admin-side-sub-container admin-side-sub-container-main-window">
        <div class="main-welcome-heading">
            <p>Hey <span><?php
                            if (isset($_SESSION['firstname'])) {
                                echo $_SESSION['firstname'];
                            } else {
                                echo "notFound";
                            }


                            ?></span> </p>
            <p>Welcome to the admin side of <span id="pc-geeks">Pearl Contentinental</span></p>
        </div>
        <form action="admin-update-booking-inc.php" method="get" onsubmit="return confirm('Confrmation of Booking Modification?');">
        <div class="main-orders-window" id="main-orders-window-1" style="display:none">
            <center>Bookings</center>
            <table>
                <tr>
                    <th>Booking ID </th>
                    <th>Customer Email </th>
                    <th>Room ID</th>
                    <th>Check In Date</th>
                    <th>Check Out Date</th>
                    <th>Number of Guests</th>
                    <th>Number of rooms</th>
                    <th>Status</th>
                    <th>Action</th>
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

                $sql_order = "SELECT * from `bookings` ";

                $result_order = mysqli_query($con, $sql_order);
                // $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
                $count_order = mysqli_num_rows($result_order);

                if ($count_order > 0) {


                    for ($x = 1; $x <= $count_order; $x++) {
                        $row_order = mysqli_fetch_assoc($result_order);





                        $row_order["booking_id"];
                        $row_order["customer_id"];
                        $row_order["room_id"];
                        $row_order["check_in_date"];
                        $row_order["check_out_date"];
                        $row_order["number_of_guests"];
                        $row_order["number_of_rooms"];
                        $row_order["status"];
                        echo  "
                             <tr>
                             <td>" .  $row_order["booking_id"] . "</td>
                             <td>" . $row_order["customer_id"] . "</td>
                             <td>" . $row_order["room_id"] . "</td>
                             <td>" . $row_order["check_in_date"] . "</td>
                             <td>" . $row_order["check_out_date"] . "</td>
                             <td>" . $row_order["number_of_guests"] . "</td>
                             <td>" . $row_order["number_of_rooms"] . "</td>
                             <td> <select name='booking-type' id='user-type' >
                             <option value='".$row_order["status"]."' disabled selected> ".$row_order["status"]."</option>
                             <option value='Complete'>Complete</option>
                             <option value='Canceled'>Canceled</option>
                             <option value='Confirmed'>Confirmed</option>
                             <option value='Ongoing'>Ongoing</option>
         
         
                         </select></td>
                         <td><button name='edit-booking' value='" . $row_order['booking_id'] . "' class='remove-button-admin'>Update</button></td>
                             </tr>
                             ";
                    }
                } else {
                    echo "";
                }  ?>

</form>
               









            </table>
        </div>
        <div class="main-customer-window" style="display:none ;">
            <form action="admin-edit-user-page.php" method="GET">
                <center>CUSTOMERS</center>

                <table>
                    <tr>
                        <th>Firstname </th>
                        <th>Lastname</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Type</th>
                        <th>Action</th>
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

                    $sql_order = "SELECT * from `customers` ";

                    $result_order = mysqli_query($con, $sql_order);
                    // $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
                    $count_order = mysqli_num_rows($result_order);

                    if ($count_order > 0) {


                        for ($x = 1; $x <= $count_order; $x++) {
                            $row_order = mysqli_fetch_assoc($result_order);




                            $row_order["customer_id"];
                            $row_order["first_name"];
                            $row_order["last_name"];
                            $row_order["phone_number"];
                            $row_order["email"];
                            $row_order["user_type"];

                            echo  "
                             <tr>
                             <td>" . $row_order["first_name"] . "</td>
                             <td>" . $row_order["last_name"] . "</td>
                             <td>" . $row_order["phone_number"] . "</td>
                             <td>" . $row_order["email"] . "</td>
                             <td>" . $row_order["user_type"] . "</td>
                             <td><button name='edit-user' value='" . $row_order['customer_id'] . "' class='remove-button-admin'>Edit</button></td>
                         
                             </tr>
                             ";
                        }
                    } else {
                        echo "";
                    }  ?>







                </table>
            </form>



        </div>
        <form action="admin-edit-room-page.php" method="post">
        <div class="main-product-window" style="display:none ;">


            <center>
                <p>Rooms</p>
            </center>
            <table>
                <tr>
                    <th>Room ID </th>
                    <th>Room Type</th>
                    <th>Bed Type</th>
                    <th>Room Size</th>
                    <th>Max Guests</th>
                    <th>Price/Night</th>
                    <th>Available Rooms</th>
                    <th>Action</th>
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

                $sql_order = "SELECT * from `rooms` ";

                $result_order = mysqli_query($con, $sql_order);
                // $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
                $count_order = mysqli_num_rows($result_order);

                if ($count_order > 0) {


                    for ($x = 1; $x <= $count_order; $x++) {
                        $row_order = mysqli_fetch_assoc($result_order);






                        $row_order["room_id"];
                        $row_order["room_type"];
                        $row_order["bed_type"];
                        $row_order["room_size"];
                        $row_order["max_guests"];
                        $row_order["price_per_night"];
                        $row_order["available_rooms"];
                        echo  "
                             <tr>
                             <td>" . $row_order["room_id"] . "</td>
                             <td>" . $row_order['room_type'] . "</td>
                             <td>" . $row_order['bed_type'] . "</td>
                             <td>" . $row_order['room_size'] . "  sqft</td>
                             <td>" .  $row_order["max_guests"] . "  </td>
                             <td>" . $row_order['price_per_night'] . "</td>
                             <td>" . $row_order['available_rooms'] . "</td>
                             <td><button name='edit-room' value='" . $row_order['room_id'] . "' class='remove-button-admin'>Edit</button></td>
                             </tr>
                             ";
                    }
                } else {
                    echo "";
                }  ?>







            </table>

            </form>



        </div>
        <img src="img/laptops/" alt="">
        <div class="main-add-products-window" onsubmit="return confirm('Confrmation of Product Addition?');" style="display:none ;">
            <form action="add-product-inc.php" method="POST" enctype="multipart/form-data">
                <div class="input-container">
                    <p>Title</p>
                    <input name="title" type="text" placeholder="Enter Title" required>
                </div>
                <div class="input-container">
                    <p>Image(Path)</p>
                    <input type="file" name="fileToUpload" id="fileToUpload">
                </div>
                <div class="input-container">
                    <p>Product Description</p>
                    <input name="product_description" type="text" placeholder="Enter Product Description" required>
                </div>
                <div class="input-container">
                    <p>Catagory</p>

                    <select name="catagory" id="catagory_select">
                        <option value="1">Desktops</option>
                        <option value="2">Laptops</option>
                        <option value="3">Keyboards</option>
                        <option value="4">Mouse</option>
                    </select>
                </div>
                <div class="input-container">
                    <p>Feature 1</p>
                    <input name="feature1" type="text" placeholder="Enter Feature" required>
                </div>
                <div class="input-container">
                    <p>Feature 2</p>
                    <input name="feature2" type="text" placeholder="Enter Feature" required>
                </div>
                <div class="input-container">
                    <p>Feature 3</p>
                    <input name="feature3" type="text" placeholder="Enter Feature" required>
                </div>
                <div class="input-container">
                    <p>Feature 4</p>
                    <input name="feature4" type="text" placeholder="Enter Feature" required>
                </div>
                <div class="input-container">
                    <p>Feature 5</p>
                    <input name="feature5" type="text" placeholder="Enter Feature" required>
                </div>

                <div class="input-container">
                    <p>Stock</p>
                    <input name="stock" type="text" placeholder="Enter Stock" required>
                </div>
                <div class="input-container">
                    <p>Price</p>
                    <input name="price" type="text" placeholder="Enter Price" required>
                </div>
                <button name="submit" id="add-product-button">ADD PRODUCT</button>

            </form>
        </div>


        <form action="remove-product-inc.php" onsubmit="return confirm('Confirmation of Product Removal');" method="GET">
            <div class="remove-product-window" style="display:none ;">
                <center>
                    <p>Messages</p>
                </center>
                <table>
                    <tr>
                        <th>Message ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
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

                    $sql_order = "SELECT * from `messages` ";

                    $result_order = mysqli_query($con, $sql_order);
                    // $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
                    $count_order = mysqli_num_rows($result_order);

                    if ($count_order > 0) {


                        for ($x = 1; $x <= $count_order; $x++) {
                            $row_order = mysqli_fetch_assoc($result_order);
                            $row_order["msg_id"];
                            $row_order["name"];
                            $row_order["email"];
                            $row_order["message"];
                            echo  "
                             <tr>
                             <td>" . $row_order["msg_id"] . "</td>
                             <td>" . $row_order['name'] . "</td>
                             <td>" . $row_order['email'] . "</td>
                             <td>" . $row_order['message'] . "</td>                         
                             </tr>
                             ";
                        }
                    } else {
                        echo "";
                    }  ?>






                </table>

            </div>
        </form>
    </div>


</div>