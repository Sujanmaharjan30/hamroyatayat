<?php
require_once './pageComponents/header.php';
require_once './pageComponents/navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Bus Ticket Form</title>\\\\
</head>
<body>
    <h2>Bus Reservation Form</h2>
    <form action="./actions/process_reservation.php" method="post" enctype="multipart/form-data">
        <label for="image">Upload Image:</label>
        <input type="file" id="image" name="image" accept="image/*" required><br><br>

        <label for="location">Location:</label>
        <input type="text" id="location" name="location" placeholder="Enter location" required><br><br>

        <label for="departure_time">Departure Time:</label>
        <input type="time" id="departure_time" name="departure_time" required><br><br>

        <label for="bus_availability">Bus Availability:</label>
        <select id="bus_availability" name="bus_availability" required>
            <option value="available">Available</option>
            <option value="full">Full</option>
            <option value="limited">Limited</option>
        </select><br><br>

        <label for="seats">Number of Seats:</label>
        <input type="number" id="seats" name="seats" min="1"max="2" onchange="validateSeats()" required><br><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>

