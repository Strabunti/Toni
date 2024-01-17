<!-- dish-card.php -->
<div id='dish-<?php echo $dish['id_dish']; ?>' class="comment-card" onclick="showDishPopup(<?php echo json_encode($dish['id_dish']); ?>)">
    <div class="comment-header">
        <div class="comment-user-container">
            <div class='comment-profile-pic'>
                <img class='profile-pic' src='<?php echo displayDishImage($dish['id_dish']); ?>' alt='Profile picture of the dish' class='comment-user-image'>
            </div>
            <div class="comment-profile">
                <p id="comment-user" class="comment-user"><?php echo htmlspecialchars($dish['name']); ?></p>
                <p id="review-date" class="dish-price"> € <?php echo $dish['price']; ?></p>
            </div>
        </div>
        <div class="right-side-div">
            <form method="post" action="../forms/update-dish-form.php">
                <input type="hidden" name="id_dish" value="<?php echo $dish['id_dish']; ?>">
                <button type="submit" class="comment-delete">
                    <img src="../resources/images/edit.png" alt="edit the dish" class="button-image">
                </button>
            </form>
            <form method="post" action="../backend/delete-dish.php">
                <input type="hidden" name="id_dish" value="<?php echo $dish['id_dish']; ?>">
                <button type="submit" class="comment-delete" onclick="return confirm('Are you sure you want to delete this dish?')">
                    <img src="../resources/images/trash-bin.png" alt="Trash can to remove dish" class="button-image">
                </button>
            </form>
        </div>
    </div>
    <p class="comment-title"><?php echo htmlspecialchars($dish['description']); ?></p>
    <p class="comment-text"><?php echo htmlspecialchars($dish['ingredients']); ?></p>
    <div class="fade-out-overlay"></div>
</div>