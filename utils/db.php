<?php
// Database configuration
$host = 'localhost'; 
$dbname = 'hamro_yatayat'; 
$user = 'root'; 
$pass = ''; 

// Establish a connection to the database
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
