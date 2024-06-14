<?php
// Initialize error variables
// $usernameErr = $emailErr = $passwordErr = $password2Err = "";
require_once '../utils/db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    function emptyInput(){
        global $username, $phone, $password;
        $result = true;
        if(empty($username) || empty($phone) || empty($password)){
            $result = false;
        } 
        return $result;
    }

    function invalidEmail(){
        global $email;
        $result = true;
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $result = false;
        }
        return $result;
    }
  
    function signup(){
        global $conn, $username, $email, $phone, $hashed_password;
        if(emptyInput() == false){
            $error_message = urlencode("All fields are required.");
            header("Location: /HamroYatayat/register.php?message=$error_message");
            exit();
        }
        if(invalidEmail() == false){
            $error_message = urlencode("Invalid email format.");
            header("Location: /HamroYatayat/register.php?message=$error_message");
            exit();
        }
        // Insert user data into the database
        $sql = "INSERT INTO users (username, email, phone, password) VALUES ('$username', '$email', '$phone', '$hashed_password')";
        if ($conn->query($sql) === TRUE) {
            // Redirect to success page
            header("Location: /HamroYatayat/login.php");
            exit();
        } else {
            // Redirect to error page
            $error_message = "Failed to insert user record";
            header("Location: /HamroYatayat/register.php?message=$error_message");
            exit();
        }
        // Close database connection
        $conn->close();
    }

    // Call the signup function
    signup();
} else {
    // Redirect to error page if not a POST request
    $error_message = urlencode("Invalid request method.");
    header("Location: /HamroYatayat/register.php?message=$error_message");
    exit();
}
?>
