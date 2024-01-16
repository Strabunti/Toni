<!-- comment-card.php -->
<div id='<?php echo $comment['comment_id']; ?>' class="comment-card" onclick="showPopup(<?php echo json_encode($comment['comment_id']); ?>)">
    <div class="comment-header">
        <div class="comment-user-container">
            <div class='comment-profile-pic'>
                <img class='profile-pic' src='<?php echo user_manager::displayProfilePic($comment['username']); ?>' alt='Profile picture of the user' class='comment-user-image'>
            </div>
            <div class="comment-profile">
                <p id="comment-user" class="comment-user"><?php echo htmlspecialchars($comment['username']); ?></p>
                <p id="review-date" class="comment-date"><?php echo $comment['review_date']; ?></p>
            </div>
        </div>
        <?php if (AuthFunctions::is_admin() || $comment['username'] == $_SESSION['username']) : ?>
            <form method="post" action="delete-comment.php">
                <input type="hidden" name="comment_id" value="<?php echo $comment['comment_id']; ?>">
                <button type="submit" class="comment-delete" onclick="return confirm('Are you sure you want to delete this comment?')">
                    <img src="resources/images/trash-bin.png" alt="Trash can to remove comment" class="button-image">
                </button>
            </form>
        <?php endif; ?>
    </div>
    <p id="comment-title" class="comment-title"><?php echo htmlspecialchars($comment['title']); ?></p>
    <p class="comment-rating"><?php echo displayStars($comment['rating']); ?></p>
    <p class="comment-text"><?php echo htmlspecialchars($comment['short_comment']); ?></p>
    <div class="fade-out-overlay"></div>
</div>