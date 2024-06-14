<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hamro_yatayat";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle image upload
    $targetDir = "../uploads/";
    $pathDir = "uploads/";
    
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true); // Create directory if it doesn't exist
    }
$uid=uniqid();
    $targetFile = $targetDir . $uid . '_' . basename($_FILES["image"]["name"]);
    $filePath = $pathDir . $uid . '_' . basename($_FILES["image"]["name"]);
    
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        // Image uploaded successfully
        // Insert form data into database
        $location = $_POST['location'];
        $departure_time = $_POST['departure_time'];
        $bus_availability = $_POST['bus_availability'];
        $seats = $_POST['seats'];

        // Prepare SQL statement
        $stmt = $conn->prepare("INSERT INTO bookings (location, departure_time, bus_availability, seats, image_path) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssis", $location, $departure_time, $bus_availability, $seats, $filePath);

        // Execute SQL statement
        if ($stmt->execute()) {
            // Data inserted successfully
            echo "Form data inserted into database and image uploaded.";
        } else {
            // Error inserting data
            echo "Error: " . $conn->error;
        }
        $stmt->close();
    } else {
        // Error uploading image
        echo "Error uploading image.";
    }
}



// Close database connection
$conn->close();
?>

