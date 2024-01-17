<?php
// Include your authentication file
include '../session/auth.php';
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to a login page or display an access denied message
    error_log("Access denied. Please log in as an admin.");
    header("Location: ../view/login.html"); // Change 'login.php' to your actual login page
    exit();
}

// Include your database connection file or establish a connection here
include 'comment-manager.php';

// Check if the comment_id is set and is a valid integer
if (isset($_POST['comment_id']) && filter_var($_POST['comment_id'], FILTER_VALIDATE_INT)) {
    $commentId = $_POST['comment_id'];

    // Check if the user is an admin or the owner of the comment
    if (AuthFunctions::is_admin() || getComment($commentId)[0]['username'] == $_SESSION['username']) {
        // Delete the comment
        $result = deleteComment($commentId);
        if ($result) {
            // Comment deleted successfully, you may redirect or display a success message
            echo "Comment deleted successfully!";
        } else {
            // Display an error message if the deletion fails
            echo "Error: Unable to delete the comment.";
        }
    } else {
        // Redirect to a login page or display an access denied message
        echo "Access denied. Please log in as an admin.";
    }
} else {
    // Handle the case when comment_id is not set or not a valid integer
    echo "Invalid comment ID.";
}

if (AuthFunctions::is_admin()) header("Location: ../dashboards/admin-dashboard.php"); // Change 'admin_page.php' to your actual admin page
else header("Location: ../dashboards/user-dashboard.php");
exit();
?>