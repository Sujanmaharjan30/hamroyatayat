<?php
// Include your database connection file
include_once '../utils/db.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data and sanitize it
    $location_from =  $_POST['from'];
    $location_to = $_POST['to'];
    $d_date = $_POST['date']; // Assuming the date format is correct
    $d_time = $_POST['time']; // Assuming the time format is correct
    $d_shift =  $_POST['shift'];
    $d_busno = $_POST['busno'];

    // Construct SQL INSERT statement
    $sql = "INSERT INTO details (location_from, location_to, d_date, d_time, d_shift, d_busno) 
            VALUES ('$location_from', '$location_to', '$d_date', '$d_time', '$d_shift', '$d_busno')";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
     
        header("location:../admin/details.php?success");
        exit();
    } else {
      header("location:../admin/details.php?fail");
      exit();
    }


    $conn->close();
}
?>
