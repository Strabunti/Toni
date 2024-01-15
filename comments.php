<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link id="style" rel="stylesheet" href="styles/admin-style.css">
    <title>Admin Page - Comments</title>
    <script src="backend/js/popup.js"></script>
</head>
<body>

    <div id="title">Recensioni</div>

    <?php
    // Include your authentication file
    include 'backend/php/access/auth.php';
    session_start();
    error_log("Admin page");
    error_log(print_r($_SESSION, true));

    // Check if the user is an admin
    // Continue with the admin page content

    // Include your database connection file or establish a connection here
    include 'backend/php/access/comment-manager.php';

    // Query to retrieve comments with the highest rates
    $bestComments = getBestComments(-1);

    // Check if the query was successful
    if ($bestComments) {
        // Fetch and display comments
        foreach ($bestComments as $comment) {
            echo '<div id=\''. $comment['comment_id'] .'\' class="comment-card" onclick="showPopup(' . json_encode($comment['comment_id']) . ')">';
                echo '<div class="comment-header">';
                    echo '<div class="comment-user-container">';
                        echo "<div class='comment-profile-pic'><img class='profile-pic' src='" . user_manager::displayProfilePic($comment['username']) . "' alt='Profile picture of the user' class='comment-user-image'></div>";
                        echo '<div class="comment-profile">';
                            echo '<p id="comment-user" class="comment-user">' . htmlspecialchars($comment['username']) . '</p> ';
                            echo '<p id="review-date" class="comment-date">' . $comment['review_date'] . '</p>';
                        echo '</div>';
                    echo '</div>';
                    if(AuthFunctions::is_admin()){
                        echo '<form method="post" action="delete_comment.php">';
                            echo '<input type="hidden" name="comment_id" value="' . $comment['comment_id'] . '">';
                            echo '<button type="submit" class="comment-delete" onclick="return confirm(\'Are you sure you want to delete this comment?\')">
                                <img src="resources/images/trash-bin.png" alt="Trash can to remove comment" class="button-image"></button>';
                        echo '</form>';
                    }
                echo '</div>';
                echo '<p id="comment-title" class="comment-title">' . htmlspecialchars($comment['title']) . '</p>';
                echo '<p class="comment-rating">' . displayStars($comment['rating']) . '</p>';
                echo '<p class="comment-text"> ' . htmlspecialchars($comment['short_comment']) . '</p>';
                echo '<div class="fade-out-overlay"></div>';
            echo '</div>';
        }
    } else {
        // Display an error message if the query fails
        echo "Error: No comments found.";
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
