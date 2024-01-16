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
            
    <?php include 'sidebars/admin-sidebar.php'; ?>

    <div class="main-content">
        <div class="recensioni">
            <div id="title">Tutti i piatti</div>

            <?php
            // Include your authentication file
            include 'backend/php/access/auth.php';
            session_start();
            error_log("Admin page");
            error_log(print_r($_SESSION, true));
            if(!isset($_SESSION['username']) && !AuthFunctions::is_admin()){
                header("Location: login.html");
                exit();
            }

            // Check if the user is an admin
            // Continue with the admin page content

            // Include your database connection file or establish a connection here
            include 'backend/php/access/dish-manager.php';
            include 'backend/php/access/menu.php';

            // Check if the query was successful
            $burgers = getAllDishes();

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
        </div>
    </div>
    </div>
</body>
</html>
