<?php
session_start();
include '../utils/db.php';

if(isset($_GET['id']) && isset($_GET['status'])) {
    $bookings = $_GET['id'];
    $status = $_GET['status'];

    // Update booking status based on action
    if($action == 'confirm') {
        $status = 'confirmed';
    } elseif($status == 'cancel') {
        $status = 'cancelled';
    }

    // Update booking status in the database
    $update_sql = "UPDATE bookings SET status = '$status' WHERE bookings = $bookings";
    if ($conn->query($update_sql) === TRUE) {
        // Redirect back to the booking page with a success message
        header("Location: booking.php?success=$action");
        exit();
    } else {
        // Redirect back to the booking page with an error message if update fails
        header("Location: booking.php?error=update_failed");
        exit();
    }
} else {
    // Redirect back to the booking page if booking ID or action is not provided
    header("Location: booking.php");
    exit();
}
?>
