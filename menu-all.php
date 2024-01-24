<!DOCTYPE html>
<html lang="it">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="tramezzini, panini, hamburger, fast-food, gourmet, cucina, Padova, Portello, menu, dashboard, amministratore">
    <meta description="Visualizza il menu attuale e modifica, aggiungi e rimuovi i piatti a tuo piacere.">
    <meta name="description" content="Visualizza il menu attuale e modifica, aggiungi e rimuovi i piatti a tuo piacere.">
    <link id="style" rel="stylesheet" href="styles/page-style.css">
    <link id="style" rel="stylesheet" href="styles/dashboard-style.css">
    <link id="style" rel="stylesheet" href="styles/sidebar-style.css">
    <link id="style" rel="stylesheet" href="styles/popup-style.css">
    <link id="style" rel="stylesheet" href="styles/card-style.css">
    <title>Admin Page - Menu - TONI'S TRAMEZZINERIA</title>
    <script src="user/cards/popup/popup.js"></script>
</head>
<body>
    <div class="content">
            
    <?php include 'user/sidebars/admin-sidebar.php'; ?>

    <div class="main-content">
        <div class="recensioni">
            <div id="title">Tutti i piatti</div>

            <?php
            // Include your authentication file
            include 'user/session/auth.php';
            session_start();
            if(!isset($_SESSION['username']) && !AuthFunctions::is_admin()){
                header("Location: login.php");
                exit();
            }
            
            // Include your database connection file or establish a connection here
            include 'user/backend/dish-manager.php';
            include 'user/backend/menu-manager.php';

            // Check if the query was successful
            $burgers = getAllDishes();

            // Check if the query was successful
            if ($burgers) {
                // Fetch and display comments
                foreach ($burgers as $dish) {
                    include 'user/cards/dish-card.php';
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

            <?php include 'user/cards/popup/popup.php'; ?>
        </div>
    </div>
    </div>
    <script src="user/cards/card.js"></script>

</body>
</html>
