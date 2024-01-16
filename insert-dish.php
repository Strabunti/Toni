<?php
// Include your database connection file or establish a connection here
include 'backend\php\access\comment-manager.php';
session_start();

if (!isset($_SESSION['username']) && !AuthFunctions::is_admin()) {
    // Redirect to a login page or display an access denied message
    header("Location: login.html"); // Change 'login.php' to your actual login page
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $description = $_POST['description'];
    $ingredients = $_POST['ingredients'];
    $price = $_POST['price'];
    $type = $_POST['type'];
    $bestseller = isset($_POST['bestseller']) ? 1 : 0;
    $bestMonth = isset($_POST['best_month']) ? 1 : 0;

    // Perform any necessary validation on the data

    // Check if a dish is already marked as a bestseller
    if ($bestseller) {
        $updateBestsellerQuery = "UPDATE dish SET bestseller = 0 WHERE bestseller = 1";
        DataBase::runQuery($updateBestsellerQuery);
    }

    // Check if a dish is already marked as the best of the month
    if ($bestMonth) {
        $updateBestMonthQuery = "UPDATE dish SET best_month = 0 WHERE best_month = 1";
        DataBase::runQuery($updateBestMonthQuery);
    }

    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $image = file_get_contents($_FILES['image']['tmp_name']);
    }

    // Insert the new dish into the database
    $insertQuery = "INSERT INTO dish (name, description, ingredients, image, price, type, bestseller, best_month) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $inserted = DataBase::runQuery($insertQuery, $name, $description, $ingredients, $image, $price, $type, $bestseller, $bestMonth);

    if ($inserted) {
        // Dish inserted successfully, you may redirect or display a success message
        header("Location: admin-dashboard.php");
        exit();
    } else {
        // Display an error message if the insertion fails
        header("Location: add-dish-form.php");
    }

}else{
    // Handle the case when the request method is not POST
    header("Location: add-dish-form.php");
}
?>