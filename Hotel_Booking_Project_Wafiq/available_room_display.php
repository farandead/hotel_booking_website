<head>
    <link rel="stylesheet" href="css/rooms_display_page.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">

</head>
<?php 
    include 'header.php'
?>

<div class="main-room-display-container">
    <div class="main-banner-container" style=" background-image: url(img/background_img.jpg);">
        <div class="main-banner-heading">Luxirous Comfort </div>
        <div class="main-banner-sub-heading"> Warm Contemporary Design</div>
    </div>
    <div class="main-banner-information-container">
        <div class="sub-heading-infomation">ACCOMMODATION</div>
        <div class="sub-main-heading-infomation">Rooms Overview
        </div>
        <div class="sub-main-paragraph-infomation">
            Paradise-Continental Hotel features a variety of 190 guestrooms, 64 Standard Rooms 88 Deluxe Rooms, 23
            Executive Rooms,2 Junior suites, 3Executive suites,6 Duplex suites, 2 Deluxe Suites, 1Royal Suite and 1
            Presidential Suite." to "Paradise-Continental Hotel features a variety of 194 guestrooms, 65 Standard
            Rooms, 91 Deluxe Rooms, 23 Executive Rooms, 2 Junior suites, 3 Executive suites, 6 Duplex suites, 2 Deluxe
            Suites, 1 Royal Suite and 1 Presidential Suite
        </div>
    </div>

    <form action="room_page_loading_inc.php" method="get">
        <div class="main-devices-display-container">
            <div class="main-devices-sub-container">
                <?php
                $host = "localhost";
                $user = "root";
                $password = '';
                $db_name = "wafiq_project";

                $con = mysqli_connect($host, $user, $password, $db_name);
                if (mysqli_connect_errno()) {
                    die("Failed to connect with MySQL: " . mysqli_connect_error());
                }
                $requestedStartDate = $_GET['check-in-date'];
                $requestedEndDate = $_GET['check-out-date'];
                $requestedrooms = $_GET['rooms'];
                $requestedguests = $_GET['guests'];
                $requestedrooms = stripcslashes($requestedrooms);       
                $requestedrooms = mysqli_real_escape_string($con, $requestedrooms);   
                $sql = "SELECT * from `rooms` where available_rooms >= '$requestedrooms' and  max_guests >= '$requestedguests' ";
                $result = mysqli_query($con, $sql);
                // $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
                $count = mysqli_num_rows($result);


                if ($count >= 1) {
                    for ($x = 1; $x <= $count; $x++) {
                        $row = mysqli_fetch_assoc($result);
                        $room_id =  $row["room_id"];
                        $room_type =  $row["room_type"];
                        $bed_type =  $row["bed_type"];
                        $room_size =  $row["room_size"];
                        $max_guests =  $row["max_guests"];
                        $price_per_night =  $row["price_per_night"];
                        $room_desc =  $row["room_desc"];
                        $features =  $row["features"];
                        $no_of_rooms =  $row["available_rooms"];
                        $room_img = $row["room_img"];

                        echo '
                        <div class="main-room-sub-container" style="margin-top:10vmax">
                        <div class="room-img"><img src="img/'.$room_img.'" alt=""></div>
                        <div class="room-details-container">
                            <div class="room-title" style="font-size:1.5vmax"> '.$room_type.'</div>
                            <div class="room-description">'.$room_desc.'</div>
                            <div class="room-information-tabs">
                                <div class="info-tab">
                                    <label for="room_size">Room Size</label>
                                    <p id="room_size">'.$room_size.' sqft
                                    </p>
                                </div>
                                <div class="info-tab">
                                    <label for="bed-size">Bed Size</label>
                                    <p id="bed-size">'.$bed_type.'
                                    </p>
                                </div>
                                <div class="info-tab">
                                    <label for="view-side">Max Guest</label>
                                    <p id="view-side">'.$max_guests.'</p>
                                </div>
                            </div>
                            <div class="room-description-buttons">
                                <button name="room" value="'.$room_id.'">View Details</button>
                            </div>
                        </div>
                    </div>';
                    }
                } else {
                    echo "<h1>THERE ARE NO ROOMS AVAILABLE FOR THESE SPECIFICATIONS</h1>";
                }






                ?>
    </form>
    <!-- <div class="main-room-container">
        <div class="main-room-sub-container">
            <div class="room-img"><img src="/img/room1.jpg" alt=""></div>
            <div class="room-details-container">
                <div class="room-title"> Standard</div>
                <div class="room-description">With its warm and cozy interior, the Standard Room welcomes guests to a
                    relaxed and comfortable stay.</div>
                <div class="room-information-tabs">
                    <div class="info-tab">
                        <label for="room_size">Room Size</label>
                        <p id="room_size">419 Sq feet
                        </p>
                    </div>
                    <div class="info-tab">
                        <label for="bed-size">Bed Size</label>
                        <p id="bed-size">1 King/Queen or Twin
                        </p>
                    </div>
                    <div class="info-tab">
                        <label for="view-side">View</label>
                        <p id="view-side">Hotel Surroundings</p>
                    </div>
                </div>
                <div class="room-description-buttons">
                    <button>View Details</button>
                    <button> Details</button>
                </div>
            </div>
        </div>
    </div> -->


</div>