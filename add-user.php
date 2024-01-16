<?php
session_start();

// Include your database connection file or establish a connection here
include 'backend/php/access/user-manager.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Perform any necessary validation on the data

    // Check if the username is already taken
    $checkUsernameQuery = "SELECT * FROM users WHERE username = ?";
    $existingUser = DataBase::runQuery($checkUsernameQuery, $username);


    if ($existingUser) {
        // Username already taken, display an error message
        $error_message = "Username already taken. Please choose a different username.";
    } else {
        $inserted = user_manager::add($username, $password, $email);
        header("Location: login.html");
        exit();
    }
}
header("Location: register-form.php");
?>