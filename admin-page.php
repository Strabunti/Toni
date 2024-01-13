<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link id="style" rel="stylesheet" href="styles/admin-style.css">
    <title>Admin Page - Comments</title>
    <script src="backend/js/comment-popup.js"></script>
</head>
<body>

    <div id="title">Comments</div>
    <a id="all-comments-link" href="comments.php">All Comments</a>

    <?php
    // Include your authentication file
    include 'backend/php/access/auth.php';
    session_start();
    error_log("Admin page");
    error_log(print_r($_SESSION, true));

    // Check if the user is an admin
    if (AuthFunctions::is_admin()) {
        // Continue with the admin page content

        // Include your database connection file or establish a connection here
        include 'backend/php/access/comments.php';

        // Query to retrieve comments with the highest rates
        $bestComments = getBestComments(4);

        // Check if the query was successful
        if ($bestComments) {
            // Fetch and display comments
            foreach ($bestComments as $comment) {
                echo '<div id=\''. $comment['comment_id'] .'\' class="comment-card" onclick="showPopup(' . json_encode($comment['comment_id']) . ')">';
                echo '<form method="post" action="delete_comment.php">';
                echo '<input type="hidden" name="comment_id" value="' . $comment['comment_id'] . '">';
                echo '<div class="comment-header">';
                echo '<div class="comment-user-container">';
                echo '<p id="comment-user" class="comment-user">' . htmlspecialchars($comment['username']) . '</p> ';
                echo '<p id="review-date" class="comment-date">' . $comment['review_date'] . '</p>';
                echo '</div>';
                echo '<button type="submit" class="comment-delete" onclick="return confirm(\'Are you sure you want to delete this comment?\')">
                    <img src="resources/images/trash-bin.png" alt="Trash can to remove comment" class="button-image"></button>';
                echo '</div>';
                echo '</form>';
                echo '<p id="comment-title" class="comment-title"><strong>Email:</strong> ' . htmlspecialchars($comment['title']) . '</p>';
                echo '<p class="comment-rating"><strong>Rating:</strong> ' . displayStars($comment['rating']) . '</p>';
                echo '<p class="comment-text"> ' . htmlspecialchars($comment['short_comment']) . '</p>';
                echo '<div class="fade-out-overlay"></div>';
                echo '</div>';
            }
        } else {
            // Display an error message if the query fails
            echo "Error: No comments found.";
        }
    } else {
        // Redirect to a login page or display an access denied message
        echo "Access denied. Please log in as an admin.";
    }

    function getScreenWidthInPixels($screenWidth) {
        // Extract the numerical part of the screen width from the user agent string
        preg_match('/\d+/', $screenWidth, $matches);
        return isset($matches[0]) ? (int)$matches[0] : 0;
    }
    ?>

    <div id="popup-container" class="popup-container">
        <div class="popup-content" id="popup-content">
            <!-- Content will be dynamically filled using JavaScript -->
        </div>
        <span class="close-btn" onclick="closePopup()">&times;</span>
    </div>

</body>
</html>
