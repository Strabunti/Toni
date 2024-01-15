<?php
require "backend/php/access/auth.php";
session_start();
AuthFunctions::connectToDB();
if (!empty($_POST)) {
    //log to the php log file the POST data
    error_log(print_r($_POST, true));
    //log to the php log file the session data
    error_log(print_r($_SESSION, true));
    $result = AuthFunctions::login($_POST["username"], $_POST["password"]);
    error_log("trying to login");
    if ($result === true) {
        error_log("Login successful");
        $_SESSION['error-login'] = null;
        if (AuthFunctions::is_admin()){
            error_log("Login successful as admin");
            header("Location: admin-dashboard.php");
        }else
            header("Location: user-dashboard.php");
    }else{
        error_log("Login failed");
        $_SESSION['error-login'] = $result;
        header("Location: login.html");
    }
}
?>