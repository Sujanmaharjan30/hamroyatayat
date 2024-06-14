<?php
require_once './pageComponents/header.php';
require_once './pageComponents/navbar.php';
?>

<form action="book.php" method="post">
    <label for="bus_name">Bus Name:</label>
    <input type="text" id="bus_name" name="bus_name">

    <label for="user_name">Your Name:</label>
    <input type="text" id="user_name" name="user_name">

    <button type="submit">Book</button>
</form>
