<link rel="stylesheet" href="css/booking-recipt.css">
<?php
include 'header.php';

?>
<div class="orderconfirmation-maincontainer">
        <div class="confirmationContainer ">
            <div class="confirmation-icon">
                <div class="confirmation-img">
                    <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor" style="color:green" class="bi bi-check-circle text-success" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                    </svg>
                </div>
            </div>
            <div class="confirmation-text">

                <h1>HEY <span id="confirmation-name"><?php
                                                        if (isset($_SESSION['booking-name'])) {
                                                            echo $_SESSION['booking-name'];
                                                        } else {
                                                            echo " NOT FOUND";
                                                        } ?></span> ! YOUR ROOM HAVE BEEN BOOKED </h1>


            </div>
        </div>

        <div class="confirmationContainer-2">

            <h2>Your tickets have been booked, your booking total amount is <span id="booking-number"><?php
                                                                                               if(isset($_SESSION['booking-total-amount'])){
                                                                                                echo $_SESSION['booking-total-amount'];
                                                                                               }   ?>£ </span></h2>
            <h3>Your booking details have been sent to this email: <span id="booking-email"><?php
                                                                                            if (isset($_SESSION['booking-email'])) {
                                                                                                echo $_SESSION['booking-email'];
                                                                                            } else {
                                                                                                echo " NOT FOUND";
                                                                                            } ?></span></h3>
        </div>

        <div class="confirmationButton">

            <a href="index.php" class="link">
                <button class="confirmationButton-button">Home</button>
            </a>

        </div>
    </div>

    <?php
include 'footer.php';

?>