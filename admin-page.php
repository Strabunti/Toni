<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link id="style" rel="stylesheet" href="css/admin-style.css">
    <title>Admin Page - Comments</title>
</head>
<body>

    <div id="title">Comments</div>
    <a id="all-comments-link" href="comments.php">All Comments</a>

    <?php
    // Include your database connection file or establish a connection here
    include 'backend/php/access/db.php';
    include 'backend/php/access/comments.php';

    // Query to retrieve comments with the highest rates
    $bestComments = getBestComments(4);

    // Check if the query was successful
    if ($bestComments) {
        // Fetch and display comments
        foreach ($bestComments as $comment) {
            echo '<div class="comment-card">';
            echo '<strong>Username:</strong> ' . htmlspecialchars($row['username']) . '<br>';
            echo '<strong>Email:</strong> ' . htmlspecialchars($row['email']) . '<br>';
            echo '<strong>Comment:</strong> ' . htmlspecialchars($row['short_comment']) . '<br>';
            echo '</div>';
        }
    } else {
        // Display an error message if the query fails
        echo "Error: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
    ?>

</body>
</html>
