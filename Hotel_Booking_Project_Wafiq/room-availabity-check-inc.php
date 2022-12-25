<?php
// require('connect-db.php');
// $query = "SELECT * FROM rooms";
// $result = $conn->query($query);



// while ($row = $result->fetch_assoc()) {
//   $startDate = $row["check_in_date"];
//   $endDate = $row["check_out_date"];
//   $numRooms = $row["no_of_rooms"];

//   if ($requestedStartDate >= $startDate && $requestedEndDate <= $endDate ) {
//     // The room is available for the requested dates
//         echo "These rooms are available for ";
//   } else {
//     // The room is not available for the requested dates
//   }
// }


?>


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

    $requestedStartDate = $_GET['check-in-date'];
    $requestedEndDate = $_GET['check-out-date'];
    $requestedrooms = $_GET['rooms'];
    $requestedguests = $_GET['guests'];
echo $requestedrooms;
    $requestedrooms = stripcslashes($requestedrooms);       
    $requestedrooms = mysqli_real_escape_string($con, $requestedrooms);        
    $sql = "SELECT * from `rooms` where available_rooms >= '$requestedrooms' and  max_guests >= '$requestedguests' ";
    $result = mysqli_query($con, $sql);  
    // $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);     
        if($count >= 1){

            echo 'found';

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
          echo "<h1> 404 NOT FOUND</h1>";
      }


        
?>

