<?php
require_once './pageComponents/header.php';
require_once './pageComponents/navbar.php';

// Get the bus type from the URL parameter
$type = $_GET['type'];

// Include the corresponding seating arrangement based on the bus type
if ($type === "tourist") {
    include 'tourist_seat_arrangement.php';
} elseif ($type === "vip") {
    include 'vip_seat_arrangement.php';
} elseif ($type === "van") {
    include 'van_seat_arrangement.php';
} else {
    // Handle unknown bus types
    echo "Invalid bus type.";
}

require_once './pageComponents/footer.php';
?>
