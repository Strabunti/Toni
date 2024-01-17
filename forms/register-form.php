<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/login-styles.css">
    <script src="../session/validate.js" defer></script>
    <title>Register</title>
</head>
<body>
    <div id="login-container">
        <h2>Register</h2>
        <div id="logo">
            <img src="../resources/images/logo.png" alt="Toni's Logo">
        </div>
        <form action = "../backend/add-user.php" method = "post" onsubmit="return validateSignup()">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" placeholder="username" onblur="return validateUsername()" required>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" placeholder="password" required minlength="8" onblur="return validatePassword()">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="../login.html">Login here</a></p>
    </div>
</body>
</html>