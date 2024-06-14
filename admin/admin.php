<?php
session_start();
include '../utils/db.php';

// Check if the email already exists
$query = "SELECT * FROM bookings";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/admin.css">
</head>
<body>

<header class="header">
    <div class="header-content">
      <div class="header-logo">
        <h1 class="logo">ADMIN Dashboard</h1>
        <?php
if(isset($_SESSION['user_id'])){
  echo '
  <a href="./adminlogout.php">Logout</a>
  ';
}


?>  
      </div>
 
    </div>
  </header>

  <main>
  <h2>HTML Table</h2>

<table>
  <tr>
    <th>Location</th>
    <th>departure_time</th>
    <th>bus_availability</th>
    <th>seats</th>
    <th>image_path</th>
    <th>Accept</th>
    <th>Delete</th>
  </tr>
    <?php foreach($result as $r){ ?> 
  <tr>
    <td><?php echo $r['location']; ?></td>
    <td><?php echo $r['departure_time']; ?></td>
    <td><?php echo $r['bus_availability']; ?></td>
    <td><?php echo $r['seats']; ?></td>
    <td><?php echo $r['image_path']; ?></td>
    <td class="imgCell">
   
<?php 
    // Check if image path is not empty
    if(!empty($r['image_path'])) {
        // Output image tag with correct src attribute
        echo "<img src='./".$r['image_path']."' >";
    } else {
        echo 'No Image';
    }
?>
</td>

    </td>

  
    <td><button class="acceptBtn">Accept</button></td>
    <td><button class="deleteBtn">Delete</button></td>
  </tr>
  <?php } ?>
</table>
  </main>
  <script>
document.querySelectorAll('.imgCell img').forEach(img => {
  img.addEventListener('click', function() {
    if (!document.fullscreenElement) {
      img.requestFullscreen().catch(err => {
        console.error(`Error attempting to enable full-screen mode: ${err.message}`);
      });
    } else {
      document.exitFullscreen();
    }
  });
});
</script>

</body>
</html>
