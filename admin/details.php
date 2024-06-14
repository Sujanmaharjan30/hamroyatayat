<?php
session_start();
include '../utils/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/details.css">
    <style>
        /* You can add your custom CSS styles here */
    </style>
</head>
<body>
    <div class="sidebar">
        <ul>
            <li><a href="./dashboard.php">Dashboard</a></li>
            <li><a href="./booking.php">Bookings</a></li>
            <li><a href="./details.php">Add Details</a></li>
            
            <?php
            if(isset($_SESSION['user_id'])){
                echo '
                <li><a href="./adminlogout.php">Logout</a></li>
                ';
            }
            ?>
        </ul>
    </div>

    <div class="hero-section">
    <div id="hmrodiv">
        <h1 id="hmro">Hamro Yatayat</h1>
        <form id="searchForm" action="../actions/details_action.php" class="form_container" method="POST">

            <div class="form_content">
                <div class="content">
                    <label for="from">From</label>
                    <input type="text" name="from" id="from" placeholder="eg: From Kathmandu">
                    
                </div>
                <div class="content">
                    <label for="to">To</label>
                    <input type="text" name="to" id="to" placeholder="eg: To Pokhara">
                </div>
                <div class="content">
                    <label for="date">Date</label>
                    <input type="date" name="date" id="date" min="<?= date('Y-m-d'); ?>">
                </div>
                <div class="content">
                    <label for="time">time</label>
                    <input type="time" name="time" id="time">
                </div>
                <div class="content">
                    <label for="shift">Day/Night</label>
                    <select name="shift" id="shift">
                        <option value="morning">Morning</option>
                        <option value="night">Night</option>
                    </select>
                </div>
                <div class="content">
                   <label for="busno">Busno</label>
                   <input type="number" name="busno" id="busno">
                </div>
                <button type="submit" name="submit">Submit</button>
            </div>
        </form>
    </div>
    </div>
</body>
</html>
<script src="date.js"></script>
