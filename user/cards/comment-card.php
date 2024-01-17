<!-- comment-card.php -->
<div id='<?php echo $comment['comment_id']; ?>' class="card" tabindex=0 onclick="showPopup(<?php echo json_encode($comment['comment_id']); ?>)">
    <div class="card-header">
        <div class="card-main-info">
            <div class='card-profile-pic'>
                <img id="profile-pic" class='profile-pic' src='<?php echo user_manager::displayProfilePic($comment['username']); ?>' alt='Profile picture of the user' class='comment-user-image'>
            </div>
            <div class="card-profile">
                <p id="comment-user" class="card-name"><?php echo htmlspecialchars($comment['username']); ?></p>
                <p id="comment-date" class="card-date"><?php echo $comment['review_date']; ?></p>
            </div>
        </div>
        <?php if (AuthFunctions::is_admin() || $comment['username'] == $_SESSION['username']) : ?>
            <form method="post" action="../backend/delete-comment.php">
                <input type="hidden" name="comment_id" value="<?php echo $comment['comment_id']; ?>">
                <button type="submit" class="card-button" onclick="return confirm('Are you sure you want to delete this comment?')">
                    <img src="../resources/images/trash-bin.png" alt="Trash can to remove comment" class="button-image">
                </button>
            </form>
        <?php endif; ?>
    </div>
    <a href="#" id="comment-title" class="card-title" onclick="showPopup(<?php echo json_encode($comment['comment_id']); ?>)">
        <?php echo htmlspecialchars($comment['title']); ?>
    </a>
    <p id="comment-rating" class="card-rating"><?php echo displayStars($comment['rating']); ?></p>
    <p id="comment-text" class="card-text"><?php echo htmlspecialchars($comment['short_comment']); ?></p>
    <div class="fade-out-overlay"></div>
</div>