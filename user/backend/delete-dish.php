<?php
// Include your database connection file or establish a connection here
include 'comment-manager.php';
session_start();

if (!isset($_SESSION['username']) && !AuthFunctions::is_admin()) {
    // Redirect to a login page or display an access denied message
    header("Location: ../view/login.html"); // Change 'login.php' to your actual login page
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve dish ID from the form
    $dishId = $_POST['id_dish'];

    // Perform any necessary validation on the data

    // Delete the dish from the database
    $deleteQuery = "DELETE FROM dish WHERE id_dish = ?";
    
    $deleted = DataBase::runQuery($deleteQuery, $dishId);

    if ($deleted) {
        // Dish deleted successfully, you may redirect or display a success message
        header("Location: ../view/menu-all.php");
        exit();
    } else {
        // Display an error message if the deletion fails
        header("Location: ../dashboards/admin-dashboard.php");
    }

} else {
    // Handle the case when the request method is not POST
    header("Location: ../dashboards/admin-dashboard.php");
}
?>