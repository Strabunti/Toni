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
        <?php include 'sidebars/user-sidebar.php'; ?>

        <div class="main-content">
            <div class="recensioni">
                <div id="title">Tutte le mie Recensioni</div>
                <a id="all-comments-link" href="comments-all.php">All Comments</a>

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
                            include 'cards/comment-card.php';
                        }
                    } else {
                    }
                } else {
                    // Redirect to a login page or display an access denied message
                    echo "Access denied. Please log in as an admin.";
                }
                ?>
            <div  class="comment-card">
            <form class="new-comment-form" action="add-comment-form.php" method="post">
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
