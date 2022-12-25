<?php

// Set the start and end dates
$start = new DateTime('2022-01-01');
$end = new DateTime('2022-01-31');

// Find the difference between the two dates
$difference = $start->diff($end);

// Display the number of days
echo $difference->days;
?>