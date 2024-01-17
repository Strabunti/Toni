<?php
require "auth.php";
session_start();
AuthFunctions::connectToDB();
if (!empty($_POST)) {
    $result = AuthFunctions::login($_POST["username"], $_POST["password"]);
    if ($result === true) {
        $_SESSION['error-login'] = null;
        if (AuthFunctions::is_admin()){
            header("Location: ../dashboards/admin-dashboard.php");
        }else
            header("Location: ../dashboards/user-dashboard.php");
    }else{
        error_log("Login failed");
        $_SESSION['error-login'] = $result;
        header("Location: ../login.html");
    }
}
?>