<?php
require_once './pageComponents/header.php';
require_once './pageComponents/navbar.php';

// Include your database connection file
include_once 'utils/db.php';

// Check if the form is submitted
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     // Retrieve form data and sanitize it
//     $location_from =  $_POST['from'];
//     $location_to = $_POST['to'];
//     $d_date = $_POST['date']; // Assuming the date format is correct
//     $d_time = $_POST['time']; // Assuming the time format is correct
//     $d_shift =  $_POST['shift'];
  // echo $d_shift;
// }

  ?>

<?php
if(isset($_GET['d_shift'])){
  $shift = $_GET['d_shift'];
  echo '<a href="./tourist_seat_arrangement.php?d_shift='.$shift.'">Touristbus</a>';
} else {
  // Provide a default value or handle the case where $shift is not set
  echo "Shift is not set.";
}
if(isset($_GET['username'])){
  $username = $_GET['username'];
}
if(isset($_GET['userid'])){
  $userid = $_GET['userid'];
}
?>
<div id="cards-gallery">
<?php
// Define an array with bus information including discounts
$busData = array(
  array("name" => "Bus A", "location" => "Pokhara, Gandaki", "seats" => 20, "time" => "10:00 AM", "discount" => "5%"),
  array("name" => "Bus B", "location" => "Pokhara, Gandaki", "seats" => 15, "time" => "11:00 AM", "discount" => "8%"),
  array("name" => "Bus C", "location" => "Pokhara, Gandaki", "seats" => 18, "time" => "4:00 AM", "discount" => "5%"),
  array("name" => "Bus D", "location" => "Pokhara, Gandaki", "seats" => 18, "time" => "5:00 AM", "discount" => "5%"),
  array("name" => "Bus E", "location" => "Pokhara, Gandaki", "seats" => 13, "time" => "6:00 AM", "discount" => "2%"),
  array("name" => "Bus F", "location" => "Pokhara, Gandaki", "seats" => 12, "time" => "7:00 AM", "discount" => "5%"),
  array("name" => "Bus G", "location" => "Pokhara, Gandaki", "seats" => 10, "time" => "8:00 AM", "discount" => "7%"),
  array("name" => "Bus H", "location" => "Pokhara, Gandaki", "seats" => 5, "time" => "9:00 AM", "discount" => "5%"),
);

// Loop through each bus and display its information including discounts
foreach ($busData as $bus) {
?>
  <div id="card">
    <img id="card-img" src="images/pkr.jpg" alt="Bus Thumbnail">
    <h2 id="card-heading"><?php echo $bus['name']; ?></h2>
    <p id="card-paragraph">Location: <?php echo $bus['location']; ?></p>
    <p id="card-paragraph">Seats Available: <?php echo $bus['seats']; ?></p>
    <p id="card-paragraph">Departure Time: <?php echo $bus['time']; ?></p>
    <p id="card-paragraph">Discount: <?php echo $bus['discount']; ?></p> 
    <a href="choose.php?d_shift=<?php echo $shift?>&username=<?php echo $username?>&userid=<?php echo $userid?>" class="book-button">View Bus</a> 
    <div class="seats" style="display: none;">
      <?php for ($i = 1; $i <= $bus['seats']; $i++) { ?>
        <span style="color: green;"><?php echo $i; ?></span> 
      <?php } ?>
    </div>
  </div>
<?php
}

?>
</div>
<!-- <a href="seat_bus.php?type=tourist" class="book-button">Tourist Bus</a>
<a href="seat_bus.php?type=vip" class="book-button">VIP Bus</a>
<a href="seat_bus.php?type=van" class="book-button">Van</a> -->
<script>
// JavaScript code for toggling seats display (same as before)
d<script>
document.addEventListener('DOMContentLoaded', function() {
  const bookButtons = document.querySelectorAll('.book-button');

  bookButtons.forEach(function(button) {
    button.addEventListener('click', function() {
      const seatsDiv = this.nextElementSibling;
      seatsDiv.style.display = seatsDiv.style.display === 'none' ? 'block' : 'none';
      
      // Hide the numbers inside seatsDiv
      const seats = seatsDiv.querySelectorAll('span');
      seats.forEach(function(seat) {
        seat.style.display = 'none';
      });
    });
  });
});
</script>


<?php
require_once './pageComponents/footer.php';
?>
