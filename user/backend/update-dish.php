<?php
// Include your authentication file
include '..\session\auth.php';
include 'dish-manager.php';
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username']) && !AuthFunctions::is_admin()) {
    // Redirect to a login page or display an access denied message
    header("Location: ..\login.php"); // Change 'login.php' to your actual login page
    exit();
}

// Retrieve updated information from the form
$id = $_POST['dish_id'];
$name = $_POST['name'];
$description = $_POST['description'];
$ingredients = $_POST['ingredients'];
$price = $_POST['price'];
$type = $_POST['type'];
$bestseller = isset($_POST['bestseller']) ? 1 : 0;
$best_month = isset($_POST['best_month']) ? 1 : 0;

// Upload profile picture
$image = null;
if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $image = file_get_contents($_FILES['image']['tmp_name']);
}


// Update user information in the database
$changed = dish_manager::change_dish($id, $name, $description, $ingredients, $image, $price, $type, $bestseller, $best_month);

if ($changed) {
    // User profile updated successfully, you may redirect or display a success message
    header("Location: ../dashboards/admin-dashboard.php");
    exit();
} else {
    // Display an error message if the update fails
    header("Location: ../dashboards/admin-dashboard.php");
}
?>