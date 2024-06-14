<?php
session_start();
include '../utils/db.php';

$totalBuses = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM details"))['total'];
$totalUser = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM users"))['total'];
$totalPendingBookings = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM bookings WHERE status = 'pending'"))['total'];
$totalConfirmedBookings = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM bookings WHERE status = 'confirm'"))['total'];
$totalCompletedBookings = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM bookings WHERE status = 'completed'"))['total'];
$totalCancelBookings = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM bookings WHERE status = 'cancel'"))['total'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/dashboard.css">
    <style>
        .content {
            margin-left: 250px;
            padding: 20px;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .card {
            flex: 0 1 calc(33.33% - 20px); /* Adjust according to your needs */
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }

        .card h3 {
            margin-bottom: 10px;
        }
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
 <li> <a href="./adminlogout.php">Logout</a></li>
  ';
}
?>
        </ul>
    </div>
    <div class="content">
        <h2>Welcome to Admin Dashboard</h2>
        <div class="card-container">
            <!-- Card 1: Total Buses -->
            <div class="card">
                <a href="./totalbus.php">
                <h3>Bus</h3>
                <p>Total Buses: <?php echo $totalBuses; ?></p>
            </div>
            <!-- Card 2: Total Seats -->
            <div class="card">
                <a href="./userlist.php">
                    <h3>User</h3>
                    <p>Total User: <?php echo $totalUser; ?></p>
                </a>
            </div>
            <!-- Card 3: Pending Bookings -->
            <div class="card">
            <a href="./userpending.php">
                <h3>Pending</h3>
                <p>Pending Bookings: <?php echo $totalPendingBookings; ?></p>
            </div>
            <!-- Card 4: Confirmed Bookings -->
            <div class="card">
            <a href="./userconfirm.php">
                <h3>Confirm</h3>
                <p>Confirmed Bookings: <?php echo $totalConfirmedBookings; ?></p>
            </div>
            <div class="card">
            <a href="./usercomplete.php">
                <h3>Complete</h3>
                <p>Completed Bookings: <?php echo $totalCompletedBookings; ?></p>
            </div>
            <div class="card">
            <a href="./usercancel.php">
                <h3>Cancel</h3>
                <p>Cancel Bookings: <?php echo $totalCancelBookings; ?></p>
            </div>
            <!-- Additional cards can be added for more information -->
        </div>
    </div>
</body>
</html>