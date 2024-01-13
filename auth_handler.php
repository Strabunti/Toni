<?php
require "backend/php/auth.php";
session_start();
if (!empty($_POST) && isset($_POST["submit"])) {
    $result = AuthFunctions::login($_POST["username"], $_POST["password"]);
    if ($result === true) {
        $_SESSION['error-login'] = null;
        if (AuthFunctions::is_admin())
            header("Location: admin-page.php");
        else
            header("Location: account.php");
    }
    $_SESSION['error-login'] = $result;
    header("Location: login.html");
} else {
    header("Location: login.html");
}
?>