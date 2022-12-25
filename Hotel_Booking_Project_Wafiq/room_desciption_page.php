<head>
    <link rel="stylesheet" href="css/room_description_page.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

    <link rel="stylesheet" href="css/flikity.css">
</head>
<script>
    function changeButton1() {
        var button1 = document.getElementById("button1")

        var container1 = document.getElementById("container1")
        var container2 = document.getElementById("container2")
        var container3 = document.getElementById("container3")


        container1.style.display = "block"
        container2.style.display = "none"
        container3.style.display = "none"

    }

    function changeButton2() {


        var container1 = document.getElementById("container1")
        var container2 = document.getElementById("container2")
        var container3 = document.getElementById("container3")


        container1.style.display = "none"
        container2.style.display = "block"
        container3.style.display = "none"

    }

    function changeButton3() {


        var container1 = document.getElementById("container1")
        var container2 = document.getElementById("container2")
        var container3 = document.getElementById("container3")


        container1.style.display = "none"
        container2.style.display = "none"
        container3.style.display = "block"

    }
</script>

<?php
include 'header.php'

?>
<style>
    .carousel-cell img {
        width: 50vmax;
    }
</style>
<div class="main-room-descitption-page">
    <div class="main-room-title">
        <?php
        if (isset($row['room_type'])) {
            echo $row['room_type'];
        } else {
            echo "notFound";
        } ?> ROOM
    </div>
    <div class="main-room-gallery">
        <div class="carousel" data-flickity='{ "fullscreen": true }'>
            <?php
            if (isset($row['room_img'])) {
                $dir = "img/room1/";

                $files = scandir($dir);

                echo '<div class="carousel-cell"><img src="img/' . $row['room_img'] . '" alt=""></div>';
                echo '<div class="carousel-cell"><img src="https://source.unsplash.com/random/1000%C3%971000/?hotelroom" alt=""></div>';
                echo '<div class="carousel-cell"><img src="https://source.unsplash.com/random/?hotelroom" alt=""></div>';
                echo '<div class="carousel-cell"><img src="https://source.unsplash.com/random/?hotel" alt=""></div>';
            } else {
                echo "notFound";
            } ?>


        </div>

    </div>
    <div class="room-features-container">
        <div class="room-feature-heading" style="margin-bottom:4vmax">
            <span><?php
                    if (isset($row['room_type'])) {
                        echo $row['room_type'];
                    } else {
                        echo "notFound";
                    } ?> ROOM AMENITIES</span>
        </div>
        <div class="room-feature-information">
            <ul style="background-color: rgb(227, 226, 226);">
                <?php
                if (isset($row['features'])) {
                    $string = $row['features'];

                    $pieces = explode(",", $string);



                    for ($i = 0; $i < count($pieces) - 1; $i++) {
                        echo '<li style="text-align:left"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                        <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
                      </svg>' . $pieces[$i] . '</li>';
                    }
                } else {
                    echo "notFound";
                } ?>
            </ul>
        </div>
    </div>
    <div class="room-poilicy-information-container">
        <div class="info-control-buttons">
            <button id="button1" onclick="changeButton1()">Room Description</button>
            <button id="button2" onclick="changeButton2()">Room Policies</button>
            <button id="button3" onclick="changeButton3()">Room Special Offers</button>
        </div>
        <div class="room-discription-container" id="container1">
            The Standard Room comprises of 1 Double Bed or 2 Twin Beds, 2 Bedside Tables, a Desk & Chair. The room is
            furnished with wall to wall carpeting, trendy furnishings and a balcony. Our ultramodern glass bathroom is
            equipped with hairdryer, magnifying shaving and make up mirror as well as all the amenities you could
            possible need during your stay.
            A Complimentary Bottle of Wine, Fresh Fruit and Mineral Water, are provided on arrival. Electric current:
            220 Volts. Smoking rooms & inter-connecting rooms are also available.
        </div>
        <div class="room-discription-container" id="container2" style="display: none;">
            Guests may cancel or modify their reservations up to 48 hours before their scheduled arrival date without incurring any fees.
            Cancellations or modifications made within 48 hours of the scheduled arrival date will incur a fee equal to the cost of one night's stay.
            No-shows will be charged the full cost of the reservation.
            Special events, holidays, and peak travel periods may have different cancellation and modification policies, which will be clearly stated at the time of booking.
        </div>
        <div class="room-discription-container" id="container3" style="display: none;">
            Special offers are subject to availability and may not be available on all dates or room types.
            Special offers cannot be combined with other discounts or promotions, unless otherwise specified.
            Special offers are non-transferable and may not be redeemed for cash.
            Any additional charges or fees, such as taxes, resort fees, or incidentals, are not included in the special offer rate and must be paid separately.
            Special offers may have different cancellation and modification policies, which will be clearly stated at the time of booking.
        </div>
    </div>
</div>
<form action="booking-page.php" method="GET">
    <center>

    <div class="booking-form-container">
        <p id="booking-form-heading"><?php
        if (isset($row['room_type'])) {
            echo $row['room_type'];
        } else {
            echo "notFound";
        } ?> ROOM</p>
        <div class="input-container">
            <p>Check In Date</p>
            <input type="date" name = "check-in-date">
        </div>
        <div class="input-container">
            <p>Check Out Date</p>
            <input type="date" name="check-out-date">
        </div>
        <div class="input-container">
            <p>Price/Night</p>
            <p> <?php
        if (isset($row['price_per_night'])) {
            echo $row['price_per_night'];
        } else {
            echo "notFound";
        } ?> $</p>
        </div>
        <div class="input-container">
            <p>Guests</p>
            <input name="no-of-guests" class="number-input" max="<?php
        if (isset($row['max_guests'])) {
            echo $row['max_guests'];
        } else {
            echo "notFound";
        } ?>" type="number"> <span id="span-guests">Max Allowed: <?php
        if (isset($row['max_guests'])) {
            echo $row['max_guests'];
        } else {
            echo "notFound";
        } ?></span>
        </div>
        <div class="input-container">
            <p>Rooms</p>
            <input name="no-of-rooms" class="number-input" max="<?php
        if (isset($row['available_rooms'])) {
            echo $row['available_rooms'];
        } else {
            echo "notFound";
        } ?>" type="number"> <span id="span-guests">Available: <?php
        if (isset($row['available_rooms'])) {
            echo $row['available_rooms'];
        } else {
            echo "notFound";
        } ?></span>
        </div>
        <?php
        if (isset($row['available_rooms'])) {
            if ($row['available_rooms'] <= 0){
                echo ' <button style="background-color:red;" Disabled name="room" value="' . $row['room_id'] . '">SOLD OUT</button>';
            }else
                echo '<button  name="room" value="' . $row['room_id'] . '">BOOK NOW</button>';

            }   
         else {
            echo "notFound";
        } ?>
    </div>
</center>

</form>
<?php
include 'footer.php'

?>