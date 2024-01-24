<!DOCTYPE html>
<html lang="it">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="tramezzini, panini, hamburger, fast-food, gourmet, cucina, Padova, Portello, registrati">
    <meta description="Registrati su TONI'S TRAMEZZINERIA!">
    <meta name="description" content="Registrati su TONI'S TRAMEZZINERIA!">
    <link rel="stylesheet" href="styles/login-styles.css">
    <script src="session/validate.js" defer></script>
    <title>Register - TONI'S TRAMEZZINERIA</title>
</head>
<body>
    <div id="login-container">
        <a href="home.php" id="back-home">
            <div id="logo">
                <img src="resources/images/logo.webp" alt="Toni's Logo">
            </div>
        </a>
        <div class="title"><h1>Register</h1></div>
        <form action = "user/backend/add-user.php" method = "post" onsubmit="return validateSignup()">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" placeholder="username" onblur="return validateUsername()" required>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" placeholder="password" required minlength="8" onblur="return validatePassword()">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
</body>
</html>