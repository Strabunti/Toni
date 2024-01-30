<!DOCTYPE html>

<html lang="it" xmlns="http://www.w3.org/1999/xhtml" xml:lang="it">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="tramezzini, panini, hamburger, fast-food, gourmet, cucina, Padova, Portello, registrati">
    <meta name="description" content="Registrati su TONI'S TRAMEZZINERIA!">
    <link rel="stylesheet" href="styles/login-styles.css">
    <script src="user/session/validate.js" defer></script>
    <title>Registrati - TONI'S TRAMEZZINERIA</title>
</head>
<body>
    <div id="login-container">
        <a href="home.php" id="back-home">
            <div id="logo">
                <img src="resources/images/logo.webp" alt="Toni's Logo">
            </div>
        </a>
        <div class="title"><h1>Registrati</h1></div>
        <form action = "user/backend/add-user.php" method = "post" onsubmit="return validateSignup()">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" placeholder="username" onblur="return validateUsername()" required>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" placeholder="password" required minlength="8" onblur="return validatePassword()">
            <label id="password-error" class="error-label"></label>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="email" required oninput="return validateEmail()">

            <button type="submit">Registrati</button>
        </form>
        <p>Hai già un account? <a href="login.php">Esegui l'accesso qui</a></p>
    </div>
</body>
</html>