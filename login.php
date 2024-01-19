<?php
session_start();

// Check if a session is already active
if(isset($_SESSION['username'])){
    if($_SESSION['is_admin']){
        header("Location: admin-dashboard.php");
        exit();
    } else {
        header("Location: user-dashboard.php");
        exit();
    }
}

// If session is not active, proceed with the login page
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/login-styles.css">
    <script src="user/session/validate.js" defer></script>
    <title>Login Page</title>
</head>
<body>
    <div id="login-container">
        <a href="home.php" id="back-home">
            <div id="logo">
                <img src="resources/images/logo.webp" alt="Toni's Logo">
            </div>
        </a>
        <div class="title"><h1>Login</h1></div>
        <form action="user/session/auth_handler.php" method="post">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" placeholder="username" onblur="return validateUsername()" required>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" placeholder="password" onblur="return validatePassword()" required>
            <button type="submit">Accedi</button>
        </form>
        <p>Don't have an account? <a href="register-form.php">Register here</a></p>
        <hr>
    </div>
</body>
</html>