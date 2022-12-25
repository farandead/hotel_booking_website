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

$room = $_POST['edit-room'];


$room = stripcslashes($room);

$room = mysqli_real_escape_string($con, $room);


$sql = "SELECT * from `rooms`  where room_id = '$room' ";
$result = mysqli_query($con, $sql);
// $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
$count = mysqli_num_rows($result);


if ($count >= 1) {
    $row_order = mysqli_fetch_assoc($result);
    $row_order["room_id"];
    $row_order["room_img"];
    $row_order["room_type"];
    $row_order["bed_type"];
    $row_order["room_size"];
    $row_order["max_guests"];
    $row_order["price_per_night"];
    $row_order["features"];
    $row_order["room_desc"];
    $row_order["available_rooms"];
} else {
    echo "<script>alert('Something Went Wrong')</script>";
    include 'main-admin.php';
}

?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Staatliches&display=swap');

    * {
        font-family: 'Staatliches', cursive;
        transition: 0.2s all ease-in-out;
    }

    .input-container {
        text-align: left;
    }

    .input-container input {
        width: 15vmax;
    }

    .edit-user-main-container {
        display: flex;
        align-items: center;
        align-content: center;
        justify-items: center;
        justify-content: center;
        box-shadow: 0px 0px 10px rgb(77, 76, 76);
        padding-top: 3vmax;
        padding-bottom: 3vmax;
        min-width: fit-content;
        max-width: 30vmax;
        margin: auto;
        border-radius: 12px;
        margin-top: 5vmax;
    }

    #input-container-button {
        margin-top: 2vmax;
    }

    #input-container-button button {
        width: 8vmax;
        height: 2vmax;
        border-radius: 6px;
        background-color: #0885f2;
        color: white;
        border: none;
    }

    #input-container-button button:hover {

        color: #0885f2;
        background-color: white;

    }
</style>

<div class="edit-user-main-container">
    <form action="update-room-inc.php" method="POST">
        <center>
            <div class="input-container">
                <p for="roomtype">Room Type</p>
                <input name="room_type" id="roomtype" type="text" value="<?php echo $row_order["room_type"];  ?>" placeholder="Room Type">
            </div>
            <div class="input-container">
                <p for="roomimg">Room IMG</p>
                <input name="room_img" id="roomimg" type="text" value="<?php echo $row_order["room_img"];  ?>" placeholder="Room IMG">
            </div>

            <div class="input-container">
                <p for="bed-type">Bed Type</p>
                <input name="bed_type" id="bed-type" value="<?php echo $row_order["bed_type"];  ?>" type="text" placeholder="Bed Type">
            </div>
            <div class="input-container">
                <p for="room_size">Room Size</p>
                <input name="room_size" id="room_size" type="text" value="<?php echo $row_order["room_size"];  ?>" placeholder="Room Size ">
            </div>
            <div class="input-container">
                <p for="max-guests">Max Guests</p>
                <input name="max_guests" id="max-guests" type="text" value="<?php echo $row_order["max_guests"];  ?>" placeholder="Max Guests ">
            </div>
            <div class="input-container">
                <p for="available_rooms">Available Rooms</p>
                <input name="available_rooms" id="available_rooms" type="text" value="<?php echo $row_order["available_rooms"];  ?>" placeholder="Available Rooms">
            </div>
            <div class="input-container">
                <p for="price_per_night">Price/Night</p>
                <input name="price_per_night" id="price_per_night" type="text" value="<?php echo $row_order["price_per_night"];  ?>" placeholder="Price/Night">
            </div>
            <div class="input-container">
                <p for="room_desc">Room Description</p>
                <input style="height: 8vmax;text-align:left;overflow:hidden" name="room_desc" id="room_desc" type="text" value="<?php echo $row_order["room_desc"];  ?>" placeholder="Room Description">
            </div>
            <div class="input-container">
                <p for="features">Features (Enter Seperated by commas)</p>
                <input style="height: 8vmax;text-align:left;overflow:hidden" name="features" id="features" type="text" value="<?php echo $row_order["features"];  ?>" placeholder="features">
            </div>

            <div class="input-container" id="input-container-button">
                <button name="room_id" value="<?php echo $row_order["room_id"];  ?>">Update</button>
    </form>
    <a href="main-admin.php"> <button>Back</button></a>
</div>

</center>
</div>