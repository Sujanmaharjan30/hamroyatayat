<?php
session_start();
include '../utils/db.php';

if(isset($_GET['id']) && isset($_GET['status'])){
  $id = $_GET['id'];
  $status = $_GET['status'];
  
  // Execute the query to update the status to 'confirm'
  if($status == 'confirmed') {
    $query = "UPDATE bookings SET status = 'confirm' WHERE id = $id ";
    if ($conn->query($query) === TRUE) {
      // Redirect back to the same page after updating
      header("Location: booking.php?status=confirmed");
      exit();
    } else {
      // Redirect with error message if query execution fails
      header("Location: booking.php?error=update_failed");
      exit();
    }
  } elseif($status == 'cancel') {
    $query = "UPDATE bookings SET status = 'cancel' WHERE id = $id ";
    if ($conn->query($query) === TRUE) {
      // Redirect back to the same page after updating
      header("Location: booking.php?status=cancel");
      exit();
    } else {
      // Redirect with error message if query execution fails
      header("Location: booking.php?error=update_failed");
      exit();
    }
  }
  elseif($status == 'completed') {
    $query = "UPDATE bookings SET status = 'completed' WHERE id = $id ";
    if ($conn->query($query) === TRUE) {
      // Redirect back to the same page after updating
      header("Location: booking.php?status=completed");
      exit();
    } else {
      // Redirect with error message if query execution fails
      header("Location: booking.php?error=update_failed");
      exit();
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>
    <div class="sidebar">
        <ul>
            <li><a href="./dashboard.php">Dashboard</a></li>
            <li><a href="./booking.php">Bookings</a></li>
            <li><a href="./details.php">Add Details</a></li>
            
            <?php
            if(isset($_SESSION['user_id'])){
                echo '<li><a href="./adminlogout.php">Logout</a></li>';
            }
            ?>
        </ul>
    </div>
    <div class="tabular">
        <h3 class="main_title">Pending Bookings</h3>
        <div class="table_container">
            <table>
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Bus</th>
                        <th>Location From</th>
                        <th>Location To</th>
                        <th>Shift</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Seats</th>
                        <th>Image Path</th>
                        <th>Status</th>
                        <th>TotalPrice</th>
                        <th>Approve Date</th>
                        <th>Action</th> <!-- New column for action -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                       $success = isset($_GET['success']) ? $_GET['success'] : '';

                    // Query to fetch pending bookings
                    $sql = "SELECT * FROM bookings ORDER BY id DESC";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['username'] . "</td>";
                            echo "<td>" . $row['phone'] . "</td>";
                            echo "<td>" . $row['Bus'] . "</td>";
                            echo "<td>" . $row['location_from'] . "</td>";
                            echo "<td>" . $row['location_to'] . "</td>";
                            echo "<td>" . $row['d_shift'] . "</td>";
                            echo "<td>" . $row['d_date'] . "</td>";
                            echo "<td>" . $row['d_time'] . "</td>";
                            echo "<td>" . $row['seats'] . "</td>";
                            echo "<td>" . $row['image_path'] . "</td>";
                            echo "<td>" . $row['status'] . "</td>";
                            echo "<td>" . $row['totalprice'] . "</td>";

                            echo "<td>" . $row['approve_date'] . "</td>";
                            // echo "<td><a href='./booking.php?id=" . $row['id'] . "'>Confirm</a></td>"; // Link to confirm booking
                            if ($row['status'] == 'Pending') {
                                echo "<td><a href='./booking.php?id=" . $row['id'] . "&status=confirmed'>Confirm</a></td>";

                            } elseif ($row['status'] == 'confirm') {
                                echo "<td><a href='./booking.php?id=" . $row['id'] . "&status=completed'>Completed</a></td>";
                            } 
                            elseif ($row['status'] == 'request') {
                                echo "<td><a href='./booking.php?id=" . $row['id'] . "&status=cancel'>Cancel</a></td>";
                            }
                            else {
                                // Handle other status values if needed
                                echo "<td></td>";
                            }
                            
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='12'>No pending bookings found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
