<?php
require "auth.php";
session_start();
AuthFunctions::connectToDB();
error_log("Login attempt");
if (!empty($_POST)) {
    $result = AuthFunctions::login($_POST["username"], $_POST["password"]);
    if ($result === true) {
        $_SESSION['error-login'] = null;
        if (AuthFunctions::is_admin()){
            header("Location: ../../admin-dashboard.php");
        }else
            header("Location: ../../user-dashboard.php");
    }else{
        error_log("Login failed");
        $_SESSION['error-login'] = $result;
        header("Location: ../../login.php");
    }
}
?>