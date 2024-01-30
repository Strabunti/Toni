<!DOCTYPE html>

<html lang="it" xmlns="http://www.w3.org/1999/xhtml" xml:lang="it">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="tramezzini, panini, hamburger, fast-food, gourmet, cucina, Padova, Portello, aggiungi, piatto, amministratore">
    <meta name="description" content="L'amministratore del sito può aggiungere un nuovo piatto da far comparire nel menù di TONI'S TRAMEZZINERIA!">
    <link rel="stylesheet" type="text/css" href="styles/page-style.css">
    <link rel="stylesheet" type="text/css" href="styles/sidebar-style.css">
    <link rel="stylesheet" type="text/css" href="styles/form-style.css">
    <title>Add New Dish - TONI'S TRAMEZZINERIA</title>
</head>
<body>
    <?php
        include 'user/session/auth.php';
        session_start();
        if(!isset($_SESSION['username']) || !AuthFunctions::is_admin()){
            header("Location: login.php");
            exit();
        }
    ?>
    <div class="content">
        <?php include 'user/sidebars/admin-sidebar.php'; ?>
        <div class="form-new-dish">
            <h2 class="form-title">AGGIUNGI UN NUOVO PIATTO</h2>
            <form action="user/backend/add-dish.php" method="post" enctype="multipart/form-data">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required maxlength="100"><br>

                <label for="description">Description:</label>
                <input type="text" id="description" name="description" required maxlength="250"><br>

                <label for="ingredients">Ingredients:</label>
                <input type="text" id="ingredients" name="ingredients" required maxlength="250"><br>

                <label for="image">Image:</label>
                <input type="file" id="image" name="image" accept="image/*"><br>

                <label for="price">Price:</label>
                <input type="text" id="price" name="price" required><br>

                <label for="type">Type:</label>
                <select id="type" name="type" required>
                    <option value="" disabled selected hidden>Seleziona...</option>
                    <option value="Burger">Burger</option>
                    <option value="Tramezzini">Tramezzini</option>
                    <option value="Panini">Panini</option>
                </select><br>

                <label for="bestseller">Bestseller:</label>
                <input type="checkbox" id="bestseller" name="bestseller"><br>

                <label for="best_month">Best of the Month:</label>
                <input type="checkbox" id="best_month" name="best_month"><br>

                <button type="submit">Add Dish</button>
            </form>
        </div>
    </div>
</body>
</html>