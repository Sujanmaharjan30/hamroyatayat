<?php
require_once './pageComponents/header.php';
require_once './pageComponents/navbar.php';

// Initialize variables to store validation error messages
$usernameErr = $passwordErr = "";
$username = $password = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate username
    if (empty($_POST["username"])) {
        $usernameErr = "Username is required";
    } else {
        $username = test_input($_POST["username"]);
    }

    // Validate password
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = test_input($_POST["password"]);
    }

    // If there are no validation errors, proceed with login action
    if (empty($usernameErr) && empty($passwordErr)) {
        // Perform login action
        // Include your login logic here, such as checking credentials in the database
        // Redirect the user to the appropriate page after successful login
        header("Location: ./actions/login_action.php");
        exit();
    }
}

// Function to sanitize and validate input data
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<div class="login-page">
  <div class="form">
    <h2>Login</h2>
    <form class="login-form" action="./actions/login_action.php" method="post">
    <input type="text" placeholder="username" name="username"/>
<input type="password" placeholder="password" name="password"/>
      <button type="submit">login</button>
      <p class="message">Not registered? <a href="register.php">Create an account</a></p>
    </form>
  </div>
</div>
  <?php
require_once './pageComponents/footer.php';
?>