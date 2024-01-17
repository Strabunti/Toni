<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link id="style" rel="stylesheet" href="../styles/admin-style.css">
    <link id="style" rel="stylesheet" href="../styles/form-style.css">
    <title>Add New Dish</title>
</head>
<body>
    <div class="content">
        <?php include '../sidebars/admin-sidebar.php'; ?>
        <div class="form-new-dish">
            <h2>AGGIUNGI UN NUOVO PIATTO</h2>
            <form action="../backend/add-dish.php" method="post" enctype="multipart/form-data">
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