<?php
require_once './pageComponents/header.php';
require_once './pageComponents/navbar.php';
?>

<?php
if(isset($_GET['d_shift']) && isset($_GET['date']) && isset($_GET['detailid'])){
  $shift = $_GET['d_shift'];
  $date = $_GET['date'];
  $detailid = $_GET['detailid'];
} 

if(isset($_GET['username'])){
  $username = $_GET['username'];
}
if(isset($_GET['userid'])){
  $userid = $_GET['userid'];
}
?>
<!-- Content -->
<div class="content">
  <div class="container">
    <div class="card">
      <img src="./images/1.jpg" alt="tourist">
      <br><a href="tourist_seat_arrangement.php?d_shift=<?php echo $shift?>&username=<?php echo $username?>&userid=<?php echo $userid?>&date=<?php echo $date ?>&detailid=<?php echo $detailid?>" class="link-button">Tourist Bus</a></br>
    </div>\
    <div class="card">
      <img src="./images/2.jpg" alt="Luxury">
      <br><a href="vip_seat_arrangement.php?d_shift=<?php echo $shift?>&username=<?php echo $username?>&userid=<?php echo $userid?>&date=<?php echo $date ?>&detailid=<?php echo $detailid?>" class="link-button">Luxury Bus</a></br>
    </div>
    <div class="card">
      <img src="./images/3.jpg" alt="Van">
      <br><a href="van_seat_arrangement.php?d_shift=<?php echo $shift?>&username=<?php echo $username?>&userid=<?php echo $userid?>&date=<?php echo $date ?>&detailid=<?php echo $detailid?>" class="link-button">Micro Bus</a></br>
    </div>
  </div>
</div>


