<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link id="style" rel="stylesheet" href="styles/admin-style.css">
    <link id="style" rel="stylesheet" href="styles/form-style.css">
    <title>Add New Dish</title>
</head>
<body>
    <div class="content">
        <!-- Dashboard Section -->
        <div class="dashboard">
            <image src="resources/images/reverse-logo.png" alt="Logo" class="logo">
            <div class="dashboard-item">
                <a href="admin-dashboard.php" class="dashboard-item-link">
                    <img src="resources/images/dash-board.png" alt="DashBoard Image" class="dashboard-item-image">
                    <p>Dashboard</p>
                </a>
            </div>
            <div class="dashboard-item">
                <a href="comments.php" class="dashboard-item-link">
                    <img src="resources/images/comment.png" alt="Comment Image" class="dashboard-item-image">
                    <p>Recensioni</p>
                </a>
            </div>
            <div class="dashboard-item">
                <a href="menu.php" class="dashboard-item-link">
                    <img src="resources/images/burgher.png" alt="Burger Image" class="dashboard-item-image">
                    <p>Menu</p>
                </a>
            </div>
            <div class="dashboard-item">
                <a href="add-dish-form.php" class="dashboard-item-link">
                    <img src="resources/images/add-dish.png" alt="Add dish Image" class="dashboard-item-image">
                    <p>Add Dish</p>
                </a>
            </div>
            <!-- Add more dashboard items as needed -->
        </div>
        <div class="form-new-dish">
            <h2>AGGIUNGI UN NUOVO PIATTO</h2>
            <form action="add_dish.php" method="post" enctype="multipart/form-data">
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