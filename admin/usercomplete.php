<?php
session_start();
include '../utils/db.php';

$sql = "SELECT * FROM bookings where status='completed' ORDER BY id DESC";
$result = $conn->query($sql);
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
        <h2>User Complete</h2>
<?php
if ($result->num_rows > 0) {
  echo "<table border='1'>
  <tr>
  <th>ID</th>
  <th>Name</th>
  <th>Phone</th>
  <th>Location From</th>
  <th>Location To</th>
  <th>Shift</th>
  <th>Date</th>
  <th>Time</th>
  <th>Seats</th>
  <th>Status</th>
  <th>Bus</th>
  <th>Total Price</th>
</tr>";
  // Fetch and display the results row by row
  while($row = $result->fetch_assoc()) {
    echo "<tr>
    <td>" . htmlspecialchars($row['id']) . "</td>
    <td>" . htmlspecialchars($row['username']) . "</td>
    <td>" . htmlspecialchars($row['phone']) . "</td>
    <td>" . htmlspecialchars($row['location_from']) . "</td>
    <td>" . htmlspecialchars($row['location_to']) . "</td>
    <td>" . htmlspecialchars($row['d_shift']) . "</td>
    <td>" . htmlspecialchars($row['d_date']) . "</td>
    <td>" . htmlspecialchars($row['d_time']) . "</td>
    <td>" . htmlspecialchars($row['seats']) . "</td>
    <td>" . htmlspecialchars($row['status']) . "</td>
    <td>" . htmlspecialchars($row['Bus']) . "</td>
    <td>" . htmlspecialchars($row['totalprice']) . "</td>
    </tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
?>
        
    </div>
</body>
</html>