<?php
// Include your authentication file
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to a login page or display an access denied message
    header("Location: login.php"); // Change 'login.php' to your actual login page
    exit();
}

// Include your database connection file or establish a connection here
include 'backend\php\access\user-manager.php';

// Retrieve updated information from the form
$email = $_POST['email'];

// Upload profile picture
$profile_pic = null;
if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] == 0) {
    $profile_pic = file_get_contents($_FILES['profile_pic']['tmp_name']);
}

$username = $_POST['username'];

$password = $_POST['password'];

// Update user information in the database
$changed = user_manager::change_user($_SESSION['username'], $username, $email, $password, $profile_pic);

if ($changed) {
    // User profile updated successfully, you may redirect or display a success message
    header("Location: login.html");
    exit();
} else {
    // Display an error message if the update fails
    header("Location: user-page.php");
}
?>