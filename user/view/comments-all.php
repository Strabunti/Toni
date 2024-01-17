<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link id="style" rel="stylesheet" href="../styles/page-style.css">
    <link id="style" rel="stylesheet" href="../styles/sidebar-style.css">
    <link id="style" rel="stylesheet" href="../styles/popup-style.css">
    <link id="style" rel="stylesheet" href="../styles/card-style.css">
    <title>Admin Page - Comments</title>
    <script src="../cards/popup/popup.js"></script>
</head>
<body>

    <div id="title">Recensioni</div>

    <?php include '../session/auth.php'; ?>

    <?php
    // Include your authentication file
    session_start();

    // Check if the user is an admin
    // Continue with the admin page content

    // Include your database connection file or establish a connection here
    include '../backend/comment-manager.php';

    // Query to retrieve comments with the highest rates
    $bestComments = getBestComments(-1);

    // Check if the query was successful
    if ($bestComments) {
        // Fetch and display comments
        foreach ($bestComments as $comment) {
            include '../cards/comment-card.php';
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

    <?php include '../cards/popup/popup.php'; ?>
    <script src="../cards/card.js"></script>


</body>
</html>
