<?php
// require_once '../pageComponents/header.php';
// require_once '../pageComponents/navbar.php';
?>
<link rel="stylesheet" href="../css/adminlogin.css">
<div class="login-container">
    <h2>Admin Login</h2>
    <form method="post" action="../actions/adminlogin_action.php">
        <div class="form-group">
            <label for="email">email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Login</button>
    </form>
    <?php if(isset($error_message)) { echo '<p class="error">' . $error_message . '</p>'; } ?>
</div>
</body>
</html>
