<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link id="style" rel="stylesheet" href="../styles/admin-style.css">
    <title>Admin Page - Comments</title>
    <script src="../cards/popup/popup.js"></script>
</head>
<body>
    <div class="content">
            
    <?php include '../sidebars/admin-sidebar.php'; ?>

    <div class="main-content">
        <div class="recensioni">
            <div id="title">Tutti i piatti</div>

            <?php
            // Include your authentication file
            include '../session/auth.php';
            session_start();
            if(!isset($_SESSION['username']) && !AuthFunctions::is_admin()){
                header("Location: ../login.html");
                exit();
            }
            
            // Include your database connection file or establish a connection here
            include '../backend/dish-manager.php';
            include '../backend/menu-manager.php';

            // Check if the query was successful
            $burgers = getAllDishes();

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

            function getScreenWidthInPixels($screenWidth) {
                // Extract the numerical part of the screen width from the user agent string
                preg_match('/\d+/', $screenWidth, $matches);
                return isset($matches[0]) ? (int)$matches[0] : 0;
            }

            ?>

            <?php include '../cards/popup/popup.php'; ?>
        </div>
    </div>
    </div>
</body>
</html>
