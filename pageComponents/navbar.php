<?php 
session_start();
include_once './utils/db.php';
?>

<nav class="navbar">
    <a href="./index.php" class="navbar-header">
        <img src="./images/school-bus.png" alt="">
        <h4>HamroYatayat</h4>
    </a>

    <div class="navbar-menu">
        <ul class="navbar-nav">
            <li class="active-page"><a href="<?= linkPage('./index'); ?>">Home</a></li>
            <li><a href="<?= linkPage('./aboutUs'); ?>">About</a></li>
            
            <?php if (isset($_SESSION['user_id'])) { ?>
                <li><a href="<?= linkPage('./logout'); ?>">Logout</a></li>
                <div class="dropdown" id="myBookingLink">
                    <li><a href="#" class="login">My Booking</a></li>
                </div>
            <?php } else { ?>
                <li><a href="<?= linkPage('./register'); ?>">Register</a></li>
                <li><a href="<?= linkPage('./login'); ?>">Login</a></li>
            <?php } ?>
        </ul>
    </div>
</nav>

<div id="bookingModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>My Booking</h2>
        <table>
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Username</th>
                    <th>location_from</th>
                    <th>location_to</th>
                    <th>Bus</th>
                    <th>d_shift</th>
                    <th>d_date</th>
                    <th>d_time</th>
                    <th>seats</th>
                    <th>status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_SESSION['user_id'])) {
                    $userid = $_SESSION['user_id'];
                    $sql = "SELECT * FROM bookings WHERE u_id = $userid ORDER BY id DESC";
                    $result = $conn->query($sql);

                    // Check if the query was successful
                    if (!$result) {
                        die("Query failed: " . $conn->error);
                    }

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr data-date='{$row["d_date"]}' data-time='{$row["d_time"]}'>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["username"] . "</td>";
                        echo "<td>" . $row["location_from"] . "</td>";
                        echo "<td>" . $row["location_to"] . "</td>";
                        echo "<td>" . $row["Bus"] . "</td>";
                        echo "<td>" . $row["d_shift"] . "</td>";
                        echo "<td>" . $row["d_date"] . "</td>";
                        echo "<td>" . $row["d_time"] . "</td>";
                        echo "<td>" . $row["seats"] . "</td>";
                        echo "<td>" . $row["status"] . "</td>";
                        echo "<td class='action-cell'>";
                        if ($row["status"] == "Pending") {
                            echo "<a href='" . linkPage('./index') . "?id=" . $row['id'] . "&status=cancel'>Cancel</a>";
                        } else if ($row["status"] == "confirm") {
                            echo "<a href='" . linkPage('./index') . "?id=" . $row['id'] . "&status=request' class='request-btn'>Request</a>";
                        } else if ($row["status"] == "cancel" || $row["status"] == "completed") {
                            echo "N/A";
                        }
                        echo "</td>";
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script>
var modal = document.getElementById("bookingModal");
var bookingLink = document.getElementById("myBookingLink");
var span = document.getElementsByClassName("close")[0];

let open = function () {
    modal.style.display = "block";
}
let close = function () {
    modal.style.display = "none";
}

// Check if elements exist before adding event listeners
if (bookingLink) {
    bookingLink.addEventListener('click', open);
}
if (span) {
    span.addEventListener('click', close);
}

// Close the modal when clicking outside of it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

// Check the time difference and hide "Request" buttons if necessary
document.addEventListener('DOMContentLoaded', (event) => {
    const rows = document.querySelectorAll('#bookingModal table tbody tr');
    rows.forEach(row => {
        const date = row.getAttribute('data-date');
        const time = row.getAttribute('data-time');
        const busDateTime = new Date(date + ' ' + time);
        const currentTime = new Date();
        
        const requestBtn = row.querySelector('.request-btn');
        if (requestBtn && currentTime >= busDateTime) {
            requestBtn.style.display = 'none';
        }
    });
});
</script>
