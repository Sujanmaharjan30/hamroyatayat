<?php

require_once './pageComponents/header.php';
require_once './pageComponents/navbar.php';
include_once './utils/db.php';

$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
$userid = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = $_GET['id'];
    $status = $_GET['status'];

    // Cancel validation 1
    function validateBookingDate($approveDate) {
        $bookingDate = new DateTime($approveDate);
        $currentDate = new DateTime();

        // Get the difference in seconds
        $diff = $currentDate->getTimestamp() - $bookingDate->getTimestamp();

        // One minute difference in seconds
        $oneMinuteDiff = 3600;

        // Check if the current date is more than one minute ahead of booking date
        return $diff <= $oneMinuteDiff;
    }

    // Fetch the approve_date from the database
    $sql = "SELECT approve_date FROM bookings WHERE u_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $ap_date = $result->fetch_assoc();
    $databaseApproveDate = $ap_date['approve_date'];
    $stmt->close(); 

    // Prepare the query to update the status
    $query = "";
    if ($status == 'cancel') {
        $query = "UPDATE bookings SET status = 'cancel' WHERE id = ?";
    } elseif ($status == 'request' && validateBookingDate($databaseApproveDate)) {
        $query = "UPDATE bookings SET status = 'request' WHERE id = ?";
    }

    // Execute the query if it is set
    if (!empty($query)) {
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            if ($status == 'cancel') {
                echo "<script>alert('The booking has been canceled.');</script>";
            } elseif ($status == 'request') {
                echo "<script>alert('The booking request was successful.');</script>";
            }
            echo "<script>window.location.href='index.php';</script>";
            exit;
        } else {
            echo "<script>alert('Something went wrong. Please try again.');</script>";
        }
        $stmt->close();
    } else {
        echo "<script>alert('You can only request booking 1 day before the booking date.');</script>";
    }
}

?>

<style>
  .card-container {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr)); /* 4 columns */
    gap: 20px; /* Adjust the gap between each card */
  }

  .card {
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

  /* Style individual card elements as needed */
  .card h2 {
    font-size: 18px;
    margin-bottom: 10px;
  }

  .card p {
    margin-bottom: 8px;
  }

  .card a {
    display: inline-block;
    background-color: #007bff;
    color: #fff;
    padding: 8px 16px;
    text-decoration: none;
    border-radius: 4px;
    transition: background-color 0.3s ease;
  }

  .card a:hover {
    background-color: #0056b3;
  }
</style>

<?php 
if (isset($_GET['fail'])) {
    echo '<script>alert("Something went wrong.");</script>';
}
if (isset($_GET['success'])) {
    echo '<script>alert("Success");</script>';
}
?>

<div class="hero-section">
    <div id="hmrodiv">
        <h1 id="hmro">Hamro Yatayat</h1>
    </div>

    <div class="card-container">
        <?php
        // Fetch data from the database
        $sql = "SELECT * FROM details"; // Replace 'details' with your actual table name
        $result = $conn->query($sql);

        // Check if there are rows returned
        if ($result->num_rows > 0) {
            $sno = 1; 
            // Loop through each row and create a card for each record
            while ($row = $result->fetch_assoc()) {
                // Extract data from the current row
                $did = $row['d_id'];
                $from = $row['location_from'];
                $to = $row['location_to'];
                $date = $row['d_date'];
                $time = $row['d_time'];
                $shift = $row['d_shift'];
                $busno = $row['d_busno'];

                // Output the card HTML with data from the current row
                echo '<div class="card">';
                echo '<h2>S.N: ' .  $sno  . '</h2>';
                echo '<p><strong>From:</strong> ' . $from . '</p>';
                echo '<p><strong>To:</strong> ' . $to . '</p>';
                echo '<p><strong>Date:</strong> ' . $date . '</p>';
                echo '<p><strong>Time:</strong> ' . $time . '</p>';
                echo '<p><strong>Busno:</strong> ' . $busno . '</p>';
                echo '<p><strong>Shift:</strong> ' . $shift . '</p>';
               if($userid){
                echo '<a href="./choose.php?d_shift=' . $shift . '&username=' . $username . '&userid=' . $userid . '&date=' . $date . '&detailid=' . $did . '">';

                echo ucfirst($shift) . '</a>';
               }
                echo '</div>';
                $sno++; 
            }
        }
        ?>
    </div>
</div>

<script src="date.js"></script>
<script>
  const form = document.getElementById('searchForm');

  form.addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission
    
    const selectedValue = document.getElementById('time').value;
    let redirectPage = '';
    
    // Determine redirect page based on selected value
    if (selectedValue === 'morning') {
      redirectPage = 'morning.php'; // Redirect to morning page
    } else if (selectedValue === 'night') {
      redirectPage = 'night.php'; // Redirect to night page
    }
    
    // Redirect the user
    window.location.href = redirectPage;
  });
</script>

<?php
require_once './pageComponents/footer.php';
?>
