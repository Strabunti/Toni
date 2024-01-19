<!-- comment-card.php -->
<div id='<?php echo $comment['comment_id']; ?>' class="card" tabindex=0 onclick="showPopup(<?php echo json_encode($comment['comment_id']); ?>)">
    <div class="card-header">
        <div class="card-main-info">
            <div class='card-profile-pic'>
                <img id="profile-pic" class='profile-pic' src='<?php echo user_manager::displayProfilePic($comment['username']); ?>' alt='Profile picture of the user' class='comment-user-image'>
            </div>
            <div class="card-profile">
                <h1 id="comment-user" class="card-name"><?php echo htmlspecialchars($comment['username']); ?></h1>
                <p id="comment-date" class="card-date"><?php echo $comment['review_date']; ?></p>
            </div>
        </div>
        <?php if (isset($_SESSION['username']) && (AuthFunctions::is_admin() || $comment['username'] == $_SESSION['username'])) : ?>
            <form method="post" action="user/backend/delete-comment.php">
                <input type="hidden" name="comment_id" value="<?php echo $comment['comment_id']; ?>">
                <button type="submit" class="card-button" onclick="return confirm('Are you sure you want to delete this comment?')">
                    <img src="resources/images/trash-bin.webp" alt="Trash can to remove comment" class="button-image">
                </button>
            </form>
        <?php endif; ?>
    </div>
    <p id="comment-title" class="card-title">
        <?php echo htmlspecialchars($comment['title']); ?>
    </p>
    <p id="comment-rating" class="card-rating"><?php echo displayStars($comment['rating']); ?></p>
    <p id="comment-text" class="card-text"><?php echo htmlspecialchars($comment['short_comment']); ?></p>
    <div class="fade-out-overlay"></div>
</div>