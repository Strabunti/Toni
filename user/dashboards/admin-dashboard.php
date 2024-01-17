<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link id="style" rel="stylesheet" href="../styles/page-style.css">
    <link id="style" rel="stylesheet" href="../styles/dashboard-style.css">
    <link id="style" rel="stylesheet" href="../styles/card-style.css">
    <link id="style" rel="stylesheet" href="../styles/popup-style.css">
    <link id="style" rel="stylesheet" href="../styles/sidebar-style.css">
    <title>Admin Dashboard</title>
    <script src="../cards/popup/popup.js"></script>
</head>
<body>
    <?php
        include '../session/auth.php';
        session_start();
        if(!isset($_SESSION['username']) || !AuthFunctions::is_admin()){
            header("Location: ../view/login.html");
            exit();
        }
    ?>
    <div class="content">
        
        <?php include '../sidebars/admin-sidebar.php'; ?>

        <div class="main-content">
            <div class="recensioni">
                <div id="title">Recensioni</div>
                <a id="all-comments-link" href="../view/comments-all.php">All Comments</a>
                <?php
                    // Include your database connection file or establish a connection here
                    include '../backend/comment-manager.php';

                    // Query to retrieve comments with the highest rates
                    $bestComments = getBestComments(3);

                    // Check if the query was successful
                    if ($bestComments) {
                        // Fetch and display comments
                        foreach ($bestComments as $comment) {
                            include '../cards/comment-card.php';
                        }
                    } else {
                        // Display an error message if the query fails
                        echo "No comments found";
                    }
                ?>
            </div>
        <div class="menu">
        <div id="title">Menu</div>
            <a id="all-comments-link" href="../view/menu-all.php">All Dishes</a>

            <?php
                // Include your database connection file or establish a connection here
                include '../backend/menu-manager.php';

                // Query to retrieve comments with the highest rates
                $burgers = getBurger(3);

                // Check if the query was successful
                if ($burgers) {
                    // Fetch and display comments
                    foreach ($burgers as $dish) {
                        include '../cards/dish-card.php';
                    }
                } else {
                    // Display an error message if the query fails
                    echo "Error: No dish found.";
                }
            ?>

            <?php include '../cards/popup/popup.php'; ?>
        </div>
        </div>
    </div>
    <script src="../cards/card.js"></script>

</body>
</html>
