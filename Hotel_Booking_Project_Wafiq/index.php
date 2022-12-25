<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/index.css">
</head>
<style>
    .main-search-bar {
        box-shadow: 1px 1px 10px var(--shadow);
        display: flex;
        align-content: center;
        justify-content: space-around;
        min-width: 70vmax;
        max-width: fit-content;
        margin: auto;
        background-color: white;
        border-radius: 5px;
    }

    input[type="number"] {
        -webkit-appearance: textfield;
        -moz-appearance: textfield;
        appearance: textfield;
    }

    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
    }

    .number-input {
        border: 0;
        display: inline-flex;
    }

    .number-input,
    .number-input * {
        box-sizing: border-box;
    }

    .number-input button {
        outline: none;
        -webkit-appearance: none;
        background-color: transparent;
        border: none;
        align-items: center;
        justify-content: center;
        width: 3rem;
        height: 3rem;
        cursor: pointer;
        margin: 0;
        position: relative;
        box-shadow: 0px 0px 1px #474747;
        border-radius: 50%;
    }


    .number-input button:before,
    .number-input button:after {
        display: inline-block;
        position: absolute;
        content: '';
        width: 1rem;
        height: 2px;
        background-color: #212121;
        transform: translate(-50%, -50%);
    }

    .number-input button.plus:after {
        transform: translate(-50%, -50%) rotate(90deg);
    }

    .number-input input[type=number] {
        font-family: sans-serif;
        max-width: 5rem;
        padding: .5rem;
        border: none;
        border-width: 0 2px;
        font-size: 1rem;
        height: 3rem;
        font-weight: bold;
        text-align: center;
        color: #212121;
    }
</style>

<script>
    var button = document.getElementById('form-dis-button');

    // Add a click event listener to the button
    button.addEventListener('onclick', function(event) {
        // Prevent the form from being submitted
        event.preventDefault();
    });
</script>

<?php
include 'header.php'
?>
<section class="mainpage-banner">
    <div class="mainpage-banner-image">
        <img src="img/banner_image.jpg" alt="">
    </div>

    <div class="mainpage-banner-text">
        <h1>Get the Same Feeling !</h1>
        <p>Make you stay with us <span style="font-family: 'Dancing Script', cursive;">COMFY</span> </p>
    </div>
</section>
<form action="available_room_display.php" method="get">
    <section class="main-search-bar">
        <div class="main-search-bar-container main-search-bar-destination">
            <p>DESTINATION</p>
            <h2>A PLACE</h2>
        </div>
        <div class="main-search-bar-container main-search-bar-checkin">
            <p>GUESTS</p>
            <div class="number-input">

                <input name="guests" class="quantity" min="0" max="10" name="quantity" value="1" type="number">

            </div>
        </div>
        <div class="main-search-bar-container main-search-bar-checkin">
            <p>ROOMS</p>
            <div class="number-input">
                <input name="rooms" class="quantity" min="0" max="10" name="quantity" value="1" type="number">

            </div>
        </div>
        <div class="main-search-bar-container main-search-bar-checkin">
            <p>CHECK IN</p>
            <input type="date" name="check-in-date" id="date">
        </div>
        <div class="main-search-bar-container main-search-bar-checkout">
            <p>CHECK OUT</p>
            <input type="date" name="check-out-date" id="date2">
        </div>
        <div class="main-search-bar-container main-search-bar-booknow">
            <button>CHECK AVAILABITY</button>
        </div>


    </section>
</form>


<div class="information-container">
    <div class="information-container-sub-container">
        <div class="information-container-sub-container-sub">
            <div class="information-container-heading">
                <p>Welcome to <span>Paradise-Continental</span> Hotel</p>
            </div>
            <div class="information-container-heading-details">
                Welcome to Paradise Continental Hotel, a luxurious and elegantly designed hotel that offers the ultimate in comfort and relaxation. Nestled in a prime location, our hotel provides easy access to all the major attractions and landmarks of the city. Our spacious and well-appointed guest rooms and suites are equipped with all the modern amenities you need for a comfortable and enjoyable stay. From our delicious dining options to our comprehensive list of recreational facilities, we have everything you need to make your stay with us truly memorable. We look forward to welcoming you to Paradise Continental Hotel.
            </div>
        </div>
        <div class="information-container-sub-container-sub" id="asdf">
            <img src="img/welcome_page.jpg" alt="">
        </div>
    </div>
    <div class="information-container-sub-container" id="accomdation-information" style="margin-top:10vmax">
        <div class="information-accomodation-heading">
            <h2>ACCOMDATION</h2>
        </div>
        <div class="informaion-accomdation-details">
            <div class="information-accomdation-inner-heading">
                <h2>
                    LUXURY ROOMS
                </h2>
            </div>
            <div class="information-accomdation-inner-heading-paragraph">
                Our luxurious rooms are the epitome of comfort and sophistication. Each room is spacious and
                elegantly appointed, featuring high-end finishes and luxurious amenities such as plush bedding,
                marble bathrooms, and state-of-the-art technology. Many of our rooms offer breathtaking views of the
                city or natural surroundings, providing the perfect backdrop for a relaxing and rejuvenating stay.
                As a guest in one of our luxury rooms, you can expect top-notch service from our dedicated hotel
                staff, who are committed to ensuring that your stay is as comfortable and enjoyable as possible.
                Whether you're in need of a romantic getaway or simply want to treat yourself to the very best, our
                luxury rooms are the perfect choice.
            </div>

        </div>
        <div class="information-slider-images">

            <form action="room_page_loading_inc.php" method="get">
                <div class="main-devices-display-container" style="display: flex;flex-direction:column" >
                    
                <div class="information-extra-container" style="display:flex;align-items:center;align-content:center">
                <?php
                $host = "localhost";
                $user = "root";
                $password = '';
                $db_name = "wafiq_project";

                $con = mysqli_connect($host, $user, $password, $db_name);
                if (mysqli_connect_errno()) {
                    die("Failed to connect with MySQL: " . mysqli_connect_error());
                }
                $sql = "SELECT * from `rooms`";
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
                        $available_rooms =  $row["available_rooms"];
                        $room_img = $row["room_img"];

                        echo ' <div class="information-slider-image-container" style="overflow:hidden">
                        <img src="img/' . $room_img . '" alt="">
                        <div class="information-slider-description">
                            <h2>' . $room_type . '</h2>
                            <p style="font-size:0.7vmax">' . $room_desc . '</p>
                        </div>
                    </div>';
                    }
                } else {
                    echo "<h1> 404 NOT FOUND</h1>";
                }






                ?>

        
            </form>
            
           
            
               
            </div>
        </div>
    </div>
    
    <div class="information-details-button">
   <a href="rooms_display_page.php"><button>
        DETAILS
    </button></a>
    
    </div>
    </div>
</div>
</div>




<script>
    $('#date').val(new Date().toJSON().slice(0, 10));
    $('#date2').val(new Date().toJSON().slice(0, 10));
</script>



<?php
include 'footer.php'
?>

</body>

</html>