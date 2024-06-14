<?php
// Start session and include database connection
session_start();
require_once '../utils/db.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Extract form data
    $id = $_POST['id'];
    $phone = $_POST['phone'];
    $from = $_POST['from'];
    $to = $_POST['to'];
    $date = $_POST['date'];
    $time = $_POST['time']; 
    $shift = $_POST['shift'];
    $bus = isset($_POST['busname']) ? $_POST['busname'] : '';
    $selectedSeats = isset($_POST['bus']) ? $_POST['bus'] : array(); // Get all selected seats
    $username = $_POST['name'];
    $status = 'Pending'; // Default status for new bookings
    $totalprice = $_POST['total_price'];
    $busid = $_POST['busid'];

    // Ensure $selectedSeats is an array
    if (!is_array($selectedSeats)) {
        // Handle the case where $selectedSeats is not an array
        // For example, you can log an error message and redirect
        header("location: ../tourist_seat_arrangement.php?error=selected_seats_not_array");
        exit();
    }

    

    // File upload handling
    $filename = $_FILES['Citizen']['name'];
    $tempname = $_FILES['Citizen']['tmp_name'];
    $folder = "../uploads/" . $filename;
    $file = $_FILES['Citizen'];
    $fileType = mime_content_type($file['tmp_name']);
    $validImageTypes = ['image/jpeg', 'image/png'];
    $maxFileSize = 2 * 1024 * 1024; // Maximum file size in bytes (2 MB)

    // Check if the uploaded file is a valid image type
    if (!in_array($fileType, $validImageTypes)) {
            header("location: ../index.php?fail");
        exit;
    }

    // Check if the uploaded file size is within the allowed limit
    if ($file['size'] > $maxFileSize) {
            header("location: ../index.php?fail");
        exit;
    }
    // Move uploaded file to destination folder
    if (move_uploaded_file($tempname, $folder)) {
        // Implode the array to store selected seats as a comma-separated string
        $seat = implode(",", $selectedSeats);

        // Prepare and execute SQL statement to insert data into the database
        $sql = "INSERT INTO bookings (u_id,username,phone, location_from, location_to, d_shift, d_date, d_time, seats, image_path, status, Bus, totalprice, bus_id) 
                VALUES ('$id','$username','$phone','$from', '$to', '$shift', '$date', '$time', '$seat', '$folder', '$status', '$bus', '$totalprice', '$busid')";

        if ($conn->query($sql) === TRUE) {
            // Data inserted successfully
            header("location: ../index.php?success");
            exit();
        } else {
            // Error inserting data
            header("location: ../tourist_seat_arrangement.php?fail");
            exit();
        }
    } else {
        // File upload failed
        header("location: ../tourist_seat_arrangement.php?error=file_upload_failed");
        exit();
    }
} else {
    // No form submission
    header("location: ../tourist_seat_arrangement.php?error=no_form_submission");
    exit();
}
?>
