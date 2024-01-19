<!-- dish-card.php -->
<div id='dish-<?php echo $dish['id_dish']; ?>' class="card" tabindex=0 onclick="showDishPopup(<?php echo json_encode($dish['id_dish']); ?>)">
    <div class="card-header">
        <div class="card-main-info">
            <div class='card-profile-pic'>
                <img id="dish-pic" class='profile-pic' src='<?php echo displayDishImage($dish['id_dish']); ?>' alt='Profile picture of the dish' class='comment-user-image'>
            </div>
            <div class="card-profile">
                <h1 id="dish-name" class="card-name">
                    <?php echo htmlspecialchars($dish['name']); ?>
                </h1>
                <p id="dish-price" class="card-price"> € <?php echo $dish['price']; ?></p>
            </div>
        </div>
        <div class="card-buttons">
            <form method="post" action="update-dish-form.php">
                <input type="hidden" name="id_dish" value="<?php echo $dish['id_dish']; ?>">
                <button type="submit" class="card-button">
                    <img src="resources/images/edit.png" alt="edit the dish" class="button-image">
                </button>
            </form>
            <form method="post" action="user/backend/delete-dish.php">
                <input type="hidden" name="id_dish" value="<?php echo $dish['id_dish']; ?>">
                <button type="submit" class="card-button" onclick="return confirm('Are you sure you want to delete this dish?')">
                    <img src="resources/images/trash-bin.png" alt="Trash can to remove dish" class="button-image">
                </button>
            </form>
        </div>
    </div>
    <p id="dish-title" class="card-title"><?php echo htmlspecialchars($dish['description']); ?></p>
    <p id="dish-text" class="card-text"><?php echo htmlspecialchars($dish['ingredients']); ?></p>
    <div class="fade-out-overlay"></div>
</div>