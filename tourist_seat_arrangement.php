<?php
require_once './pageComponents/header.php';
require_once './pageComponents/navbar.php';
require_once 'utils/db.php';
session_start();

$pricePerSeat = 2000;

$bus = "Tourist";
$shift = "";
$date = "";
if(isset($_GET['d_shift']) && isset($_GET['date']) && isset($_GET['detailid'])){
  $shift = $_GET['d_shift'];
  $date = $_GET['date'];
  $detailid = $_GET['detailid'];
}

// if(isset($_GET['username'])){
//   $username = $_GET['username'];
// }
// Fetching user details
if (isset($_GET['userid'])) {
  $userid = $_GET['userid'];

  // Prepare SQL statement to fetch user details
  $sql = "SELECT username, phone, email, password FROM users WHERE id = $userid";

  // Execute the query
  $result = $conn->query($sql);

  // Check if the query was successful
  if ($result) {
      // Check if any rows were returned
      if ($result->num_rows > 0) {
          // Fetch user details
          $row = $result->fetch_assoc();

          // Store user details in variables
          $username = $row['username'];
          $phone = $row['phone'];
          $email = $row['email'];
          $password = $row['password'];

          // Free the result set
          $result->free();
      }
  } 

  // Close the database connection - This is causing the issue

} 




$sql = $sql ="SELECT seats FROM bookings WHERE d_shift = '$shift' AND d_date = '$date' AND bus_id = '$detailid' AND status <> 'cancel'";

$result = $conn->query($sql);

if (!$result) {
    die("Error fetching booked seats: " . $conn->error);
}

$bookedSeats = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $bookedSeats[] = $row['seats'];
    }
}



function isSeatBooked($seatCode, $bookedSeats) {
  foreach ($bookedSeats as $booked) {
      $seats = explode(',', $booked);
      if (in_array($seatCode, $seats)) {
          return true;
      }
  }
  return false;
}
function getLabelStyle($seatCode, $bookedSeats) {
  return isSeatBooked($seatCode, $bookedSeats) ? 'style="visibility: hidden;"' : '';
}
 
?>




<div class="content">

  <div class="container">
    <div class="card">
      <?php
    $sql = "SELECT * FROM details WHERE d_id = '$detailid'";
    $result = $conn->query($sql);
    
    $details = array(); // Initialize an array to store details
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Store each row of data in the $details array
            $details[] = $row;
        }
    }
    
    // Output the details
    foreach ($details as $detail) {
        $from = $detail['location_from'];
        $to = $detail['location_to'];
        $date = $detail['d_date'];
        $time = $detail['d_time'];
        
       
    }
      ?>

        
    <form action="./actions/booking_action.php" method="POST" enctype="multipart/form-data" >   
        <div class="grid-container">
            
            
        <input type="checkbox" id="bus1" name="bus[]" value="D1" onclick="toggleTick('bus1')" <?php echo isSeatBooked('D1', $bookedSeats) ? 'disabled' : ''; ?>>
<label for="bus1" class="label" <?php echo getLabelStyle('D1', $bookedSeats); ?> id="label1">D1</label>

            <input type="checkbox" id="bus2" name="bus[]" value="D2" onclick="toggleTick('bus2')" <?php echo isSeatBooked('D2', $bookedSeats) ? 'disabled' : ''; ?>>
            <label for="bus2" class="label"  <?php echo getLabelStyle('D2', $bookedSeats); ?> id="label2">D2</label>
            
            <input type="checkbox" id="box" name="" value="" >
            <label for="" class="no-border"  id=""></label>

            <input type="checkbox" id="bus3" name="bus[]" value="D3" onclick="toggleTick('bus3')"  <?php echo isSeatBooked('D3', $bookedSeats) ? 'disabled' : ''; ?>>
            <label for="bus3" class="label"  <?php echo getLabelStyle('D3', $bookedSeats); ?> id="label3">D3</label>
            
            <input type="checkbox" id="bus4" name="bus[]" value="D4" onclick="toggleTick('bus4')"  <?php echo isSeatBooked('D4', $bookedSeats) ? 'disabled' : ''; ?>>
        <label for="bus4" class="label"  <?php echo getLabelStyle('D4', $bookedSeats); ?> id="label4">D4</label>

        <input type="checkbox" id="bus5" name="bus[]" value="D5" onclick="toggleTick('bus5')"<?php echo isSeatBooked('D5', $bookedSeats) ? 'disabled' : ''; ?>>
        <label for="bus5" class="label" <?php echo getLabelStyle('D5', $bookedSeats); ?> id="label5">D5</label>

        <input type="checkbox" id="bus6" name="bus[]" value="D6" onclick="toggleTick('bus6')" <?php echo isSeatBooked('D6', $bookedSeats) ? 'disabled' : ''; ?>>
<label for="bus6" class="label" <?php echo getLabelStyle('D6', $bookedSeats); ?> id="label6">D6</label>

        <input type="checkbox" id="" name="" value="">
            <label for=""  class="no-border" id=""></label>

        <input type="checkbox" id="bus7" name="bus[]" value="D7" onclick="toggleTick('bus7')" <?php echo isSeatBooked('D7', $bookedSeats) ? 'disabled' : ''; ?>>
        <label for="bus7" class="label" <?php echo getLabelStyle('D7', $bookedSeats); ?> id="label7">D7</label>

        <input type="checkbox" id="bus8" name="bus[]" value="D8" onclick="toggleTick('bus8')" <?php echo isSeatBooked('D8', $bookedSeats) ? 'disabled' : ''; ?>>
        <label for="bus8" class="label" <?php echo getLabelStyle('D8', $bookedSeats); ?> id="label8">D8</label>

        <input type="checkbox" id="bus9" name="bus[]" value="D9" onclick="toggleTick('bus9')" <?php echo isSeatBooked('D9', $bookedSeats) ? 'disabled' : ''; ?>>
        <label for="bus9" class="label" <?php echo getLabelStyle('D9', $bookedSeats); ?> id="label9">D9</label>

        <input type="checkbox" id="bus10" name="bus[]" value="D10" onclick="toggleTick('bus10')" <?php echo isSeatBooked('D10', $bookedSeats) ? 'disabled' : ''; ?>>
        <label for="bus10" class="label" <?php echo getLabelStyle('D10', $bookedSeats); ?>  id="label10">D10</label>
        
        <input type="checkbox" id="" name="" value="">
            <label for=""  class="no-border" id=""></label>

        <input type="checkbox" id="bus11" name="bus[]"  value="D11" onclick="toggleTick('bus11')" <?php echo isSeatBooked('D11', $bookedSeats) ? 'disabled' : ''; ?>>
        <label for="bus11" class="label" <?php echo getLabelStyle('D11', $bookedSeats); ?>  id="label11">D11</label>
        
        <input type="checkbox" id="bus12" name="bus[]" value="D12" onclick="toggleTick('bus12')" >
        <label for="bus12" class="label" <?php echo getLabelStyle('D12', $bookedSeats); ?>  id="label12">D12</label>
        
        <input type="checkbox" id="bus13" name="bus[]" value="D13" onclick="toggleTick('bus13')" <?php echo isSeatBooked('D13', $bookedSeats) ? 'disabled' : ''; ?>>
        <label for="bus13" class="label" <?php echo getLabelStyle('D13', $bookedSeats); ?> id="label13">D13</label>

        <input type="checkbox" id="bus14" name="bus[]" value="D14" onclick="toggleTick('bus14')" <?php echo isSeatBooked('D14', $bookedSeats) ? 'disabled' : ''; ?>>
        <label for="bus14" class="label" <?php echo getLabelStyle('D14', $bookedSeats); ?>  id="label14">D14</label>

        <input type="checkbox" id="" name="" value="">
            <label for=""  class="no-border" id=""></label>

        <input type="checkbox" id="bus15" name="bus[]" value="D15" onclick="toggleTick('bus15')" <?php echo isSeatBooked('D15', $bookedSeats) ? 'disabled' : ''; ?>>
        <label for="bus15" class="label" <?php echo getLabelStyle('D15', $bookedSeats); ?>  id="label15">D15</label>
        
        <input type="checkbox" id="bus16" name="bus[]" value="D16" onclick="toggleTick('bus16')" <?php echo isSeatBooked('D16', $bookedSeats) ? 'disabled' : ''; ?>>
        <label for="bus16" class="label" <?php echo getLabelStyle('D16', $bookedSeats); ?>  id="label16">D16</label>
        
        <input type="checkbox" id="bus17" name="bus[]" value="D17" onclick="toggleTick('bus17')" <?php echo isSeatBooked('D17', $bookedSeats) ? 'disabled' : ''; ?>>
        <label for="bus17" class="label" <?php echo getLabelStyle('D17', $bookedSeats); ?>  id="label17">D17</label>
        
        <input type="checkbox" id="bus18" name="bus[]" value="D18" onclick="toggleTick('bus18')" <?php echo isSeatBooked('D18', $bookedSeats) ? 'disabled' : ''; ?>>
        <label for="bus18" class="label" <?php echo getLabelStyle('D18', $bookedSeats); ?>  id="label18">D18</label>
        
        <input type="checkbox" id="" name="" value="">
            <label for=""  class="no-border" id=""></label>

        <input type="checkbox" id="bus19" name="bus[]" value="D19" onclick="toggleTick('bus19')" <?php echo isSeatBooked('D19', $bookedSeats) ? 'disabled' : ''; ?>>
        <label for="bus19" class="label" <?php echo getLabelStyle('D19', $bookedSeats); ?> id="label19">D19</label>
        
        <input type="checkbox" id="bus20" name="bus[]" value="D20" onclick="toggleTick('bus20')" <?php echo isSeatBooked('D20', $bookedSeats) ? 'disabled' : ''; ?>>
        <label for="bus20" class="label" <?php echo getLabelStyle('D20', $bookedSeats); ?> id="label20">D20</label>

        <input type="checkbox" id="bus21" name="bus[]" value="D21" onclick="toggleTick('bus21')" <?php echo isSeatBooked('D21', $bookedSeats) ? 'disabled' : ''; ?>>
        <label for="bus21" class="label" <?php echo getLabelStyle('D21', $bookedSeats); ?>  id="label21">D21</label>

        <input type="checkbox" id="bus22" name="bus[]" value="D22" onclick="toggleTick('bus22')" <?php echo isSeatBooked('D22', $bookedSeats) ? 'disabled' : ''; ?>>
        <label for="bus22" class="label" <?php echo getLabelStyle('D22', $bookedSeats); ?>  id="label22">D22</label>
        
 

        <input type="checkbox" id="bus23" name="bus[]" value="D23" onclick="toggleTick('bus23')" <?php echo isSeatBooked('D23', $bookedSeats) ? 'disabled' : ''; ?>>
        <label for="bus23" class="label" <?php echo getLabelStyle('D23', $bookedSeats); ?>  id="label23">D23</label>
        
        <input type="checkbox" id="bus24" name="bus[]" value="D24" onclick="toggleTick('bus24')" <?php echo isSeatBooked('D24', $bookedSeats) ? 'disabled' : ''; ?>>
        <label for="bus24" class="label"  <?php echo getLabelStyle('D24', $bookedSeats); ?> id="label24">D24</label>
        
        <input type="checkbox" id="bus25" name="bus[]" value="D25" onclick="toggleTick('bus25')" <?php echo isSeatBooked('D25', $bookedSeats) ? 'disabled' : ''; ?>>
        <label for="bus25" class="label"  <?php echo getLabelStyle('D25', $bookedSeats); ?> id="label25">D25</label>
       
        
        
        
        

       
    <input type="hidden" name="from" value="<?php echo $from; ?>">
    <input type="hidden" name="to" value="<?php echo $to; ?>">
    <input type="hidden" name="date" value="<?php echo $date; ?>">
    <input type="hidden" name="time" value="<?php echo $time; ?>">
    <input type="hidden" name="shift" value="<?php echo $shift; ?>">
    <input type="hidden" name="name" value="<?php echo $username; ?>">
    <input type="hidden" name="phone" value="<?php echo $phone; ?>">
    <input type="hidden" name="id" value="<?php echo $userid; ?>">
    <input type="hidden" name="busname" value="<?php echo $bus; ?>">
    <input type="hidden" name="busid" value="<?php echo $detailid; ?>">
    <input type="hidden" name="total_price" id="totalPriceInput">

    </div>
    <div id="citizen">
    <label for="Citizen" class="no-border">CitizenShip</label>
    <input type="file" name="Citizen" id="Citizen">
    <input type="submit" value="Submit">
    </div>
    <div id="totalPrice"></div>

</form>


</div>
  </div>
</div>
<?php
$conn->close();
?>
<script>
function toggleTick(id) {
    console.log('Toggling checkbox: ' + id);
    var checkbox = document.getElementById(id);
    var label = document.getElementById('label' + id.substr(3));
    console.log('Checkbox: ', checkbox);
    console.log('Label: ', label);
    if (checkbox.checked) {
        label.style.backgroundColor = "#ccc"; 
    } else if (checkbox.disabled) {
        console.log('Checkbox is disabled');
        label.style.display = "none"; // Hide the label if checkbox is disabled
    } else {
        label.style.backgroundColor = ""; // Clear the background color if checkbox is neither checked nor disabled
        label.style.display = "inline"; // Show the label if checkbox is enabled
    }
}

function calculateTotalPrice() {
    var selectedLabels = document.querySelectorAll('.label.checked');
    var totalPrice = selectedLabels.length * <?php echo $pricePerSeat; ?>;
    document.getElementById('totalPrice').innerText = 'Total Price: Rs ' + totalPrice.toFixed(2);
    
    // Update the value of the hidden input field
    document.getElementById('totalPriceInput').value = totalPrice.toFixed(2);
}

// Add event listeners to labels
var labels = document.querySelectorAll('.label');
labels.forEach(function(label) {
    label.addEventListener('click', function() {
        label.classList.toggle('checked'); // Toggle the 'checked' class on click
        calculateTotalPrice(); // Recalculate total price after label click
    });
});

// Initial calculation on page load
calculateTotalPrice();
</script>

<?php

?>
