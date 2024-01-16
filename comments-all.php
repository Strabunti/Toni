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
            include 'cards/comment-card.php';
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
