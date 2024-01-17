<?php
// Include your database connection file or establish a connection here
include 'comment-manager.php';
session_start();

if (!isset($_SESSION['username'])) {
    // Redirect to a login page or display an access denied message
    header("Location: ../view/login.html"); // Change 'login.php' to your actual login page
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve comment information from the form
    $title = $_POST['title'];
    $comment = $_POST['comment'];
    $rate = $_POST['rating'];
    $username = $_SESSION['username'];
    $date = date("Y-m-d");

    // Insert comment into the database
    $inserted = insertComment($username, $title, $comment, $rate, $date);

    if ($inserted) {
        // Comment inserted successfully, you may redirect or display a success message
        header("Location: ../dashboards/user-dashboard.php");
        exit();
    } else {
        // Display an error message if the insertion fails
        header("Location: ../dashboards/user-dashboard.php");
    }
} else {
    // Handle the case when the request method is not POST
    header("Location: ../dashboards/user-dashboard.php");
}

?>