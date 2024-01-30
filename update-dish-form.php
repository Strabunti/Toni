<!DOCTYPE html>

<html lang="it" xmlns="http://www.w3.org/1999/xhtml" xml:lang="it">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="tramezzini, panini, hamburger, fast-food, gourmet, cucina, Padova, Portello, aggiungi, rimuovi, modifica, piatto, amministratore">
    <meta name="description" content="Aggiungi, rimuovi o modifica un piatto nel tuo menu!">
    <link rel="stylesheet" type="text/css" href="styles/page-style.css">
    <link rel="stylesheet" type="text/css" href="styles/sidebar-style.css">
    <link rel="stylesheet" type="text/css" href="styles/form-style.css">
    <title>Add New Dish - TONI'S TRAMEZZINERIA</title>
</head>
<body>
    <div class="content">
        <?php include 'user/sidebars/admin-sidebar.php'; ?>
        
        <?php
        session_start();

        // Check if the user is logged in
        if (!isset($_SESSION['username']) && !AuthFunctions::is_admin()) {
            // Redirect to a login page or display an access denied message
            header("Location: login.php"); // Change 'login.php' to your actual login page
            exit();
        }

        // Include your database connection file or establish a connection here
        include 'user/backend/dish-manager.php';

        $dish = dish_manager::get_by_id($_POST['id_dish']);
        $dishId = $dish[0]['id_dish'];
        $name = $dish[0]['name'];
        $description = $dish[0]['description'];
        $ingredients = $dish[0]['ingredients'];
        $price = $dish[0]['price'];
        $type = $dish[0]['type'];
        $bestseller = $dish[0]['bestseller'];
        $bestMonth = $dish[0]['best_month'];
        
        ?>
        <!-- Form to edit the dish -->
        <div class="form-edit-dish">
            <h2 class="form-title">MODIFY DISH</h2>
            <form action="user/backend/update-dish.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="dish_id" value="<?php echo $dishId; ?>">

                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo $name; ?>" required maxlength="100"><br>

                <label for="description">Description:</label>
                <input type="text" id="description" name="description" value="<?php echo $description; ?>" required maxlength="250"><br>

                <label for="ingredients">Ingredients:</label>
                <input type="text" id="ingredients" name="ingredients" value="<?php echo $ingredients; ?>" required maxlength="250"><br>
                
                <label for="image">Profile Picture:</label>
                <img src="<?php echo dish_manager::displayPic($dishId); ?>" alt="Profile picture of the dish" class="profile-pic">
                <input type="file" id="image" name="image" accept="image/*">

                <label for="price">Price:</label>
                <input type="text" id="price" name="price" value="<?php echo $price; ?>" required><br>

                <label for="type">Type:</label>
                <select id="type" name="type" required>
                    <option value="Burger" <?php if ($type == 'Burger') echo 'selected'; ?>>Burger</option>
                    <option value="Tramezzini" <?php if ($type == 'Tramezzini') echo 'selected'; ?>>Tramezzini</option>
                    <option value="Panini" <?php if ($type == 'Panini') echo 'selected'; ?>>Panini</option>
                </select><br>

                <label for="bestseller">Bestseller:</label>
                <input type="checkbox" id="bestseller" name="bestseller" <?php if ($bestseller == 1) echo 'checked'; ?>><br>

                <label for="best_month">Best of the Month:</label>
                <input type="checkbox" id="best_month" name="best_month" <?php if ($bestMonth == 1) echo 'checked'; ?>><br>

                <button type="submit">Update Dish</button>
            </form>
        </div>
    </div>
</body>
</html>
</html>