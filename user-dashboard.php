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
    <div class="content">
        <!-- Dashboard Section -->
        <div class="dashboard">
            <image src="resources/images/reverse-logo.png" alt="Logo" class="logo">
            <div class="dashboard-item">
                <a href="user-dashboard.php" class="dashboard-item-link">
                    <img src="resources/images/dash-board.png" alt="DashBoard Image" class="dashboard-item-image">
                    <p>Dashboard</p>
                </a>
            </div>
            <div class="dashboard-item">
                <a href="comments.php" class="dashboard-item-link">
                    <img src="resources/images/comment.png" alt="Comment Image" class="dashboard-item-image">
                    <p>Tutte Le Recensioni</p>
                </a>
            </div>
            <div class="dashboard-item">
                <a href="user-page.php" class="dashboard-item-link">
                    <img src="resources/images/user.png" alt="User Image" class="dashboard-item-image">
                    <p>User Info</p>
                </a>
            </div>
            <!-- Add more dashboard items as needed -->
        </div>

        <div class="main-content">
            <div class="recensioni">
                <div id="title">Tutte le mie Recensioni</div>
                <a id="all-comments-link" href="comments.php">All Comments</a>

                <?php
                // Include your authentication file
                include 'backend/php/access/auth.php';
                session_start();
                error_log("Admin page");
                error_log(print_r($_SESSION, true));

                // Check if the user is an admin
                if (isset($_SESSION['username'])) {
                    // Continue with the admin page content

                    // Include your database connection file or establish a connection here
                    include 'backend/php/access/comment-manager.php';

                    // Query to retrieve comments with the highest rates
                    $bestComments = getMyComments($_SESSION['username']);

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
                                    echo '<form method="post" action="delete-comment.php">';
                                        echo '<input type="hidden" name="comment_id" value="' . $comment['comment_id'] . '">';
                                        echo '<button type="submit" class="comment-delete" onclick="return confirm(\'Are you sure you want to delete this comment?\')">
                                            <img src="resources/images/trash-bin.png" alt="Trash can to remove comment" class="button-image"></button>';
                                    echo '</form>';
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
                } else {
                    // Redirect to a login page or display an access denied message
                    echo "Access denied. Please log in as an admin.";
                }
                ?>
            <div  class="comment-card">
            <form class="new-comment-form" action="add-comment.php" method="post">
                <button class="new-comment-button" type="submit">+</button>
            </form>
            </div>
            <div id="popup-container" class="popup-container">
                <div class="popup-content" id="popup-content">
                    <!-- Content will be dynamically filled using JavaScript -->
                </div>
                <span class="close-btn" onclick="closePopup()">&times;</span>
            </div>
        </div>
        </div>
    </div>

</body>
</html>
