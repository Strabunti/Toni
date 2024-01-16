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
    <?php
        include 'backend/php/access/auth.php';
        session_start();
        if(!isset($_SESSION['username']) || !AuthFunctions::is_admin()){
            header("Location: login.html");
            exit();
        }
    ?>
    <div class="content">
        
        <?php include 'sidebars/admin-sidebar.php'; ?>

        <div class="main-content">
            <div class="recensioni">
                <div id="title">Recensioni</div>
                <a id="all-comments-link" href="comments-all.php">All Comments</a>

                <?php
                    // Continue with the admin page content

                    // Include your database connection file or establish a connection here
                    include 'backend/php/access/comment-manager.php';

                    // Query to retrieve comments with the highest rates
                    $bestComments = getBestComments(3);

                    // Check if the query was successful
                    if ($bestComments) {
                        // Fetch and display comments
                        foreach ($bestComments as $comment) {
                            include 'cards/comment-card.php';
                        }
                    } else {
                        // Display an error message if the query fails
                        echo "No comments found";
                    }
                ?>
            </div>
        <div class="menu">
        <div id="title">Menu</div>
            <a id="all-comments-link" href="menu.php">All Dishes</a>

            <?php

                // Include your database connection file or establish a connection here
                include 'backend/php/access/menu.php';

                // Query to retrieve comments with the highest rates
                $burgers = getBurger(3);

                // Check if the query was successful
                if ($burgers) {
                    // Fetch and display comments
                    foreach ($burgers as $dish) {
                        include 'cards/dish-card.php';
                    }
                } else {
                    // Display an error message if the query fails
                    echo "Error: No dish found.";
                }
            ?>

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
