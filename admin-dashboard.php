<!DOCTYPE html>

<html lang="it" xmlns="http://www.w3.org/1999/xhtml" xml:lang="it">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="tramezzini, panini, hamburger, fast-food, gourmet, cucina, Padova, Portello, pagina, amministratore">
    <meta name="description" content="Benvenuto, amministratore, nella tua dashboard! Qui puoi rivedere le recensioni degli utenti, aggiungere, rimuovere o modificare i piatti!">
    <link rel="stylesheet" type="text/css" href="styles/page-style.css">
    <link rel="stylesheet" type="text/css" href="styles/dashboard-style.css">
    <link rel="stylesheet" type="text/css" href="styles/card-style.css">
    <link rel="stylesheet" type="text/css" href="styles/popup-style.css">
    <link rel="stylesheet" type="text/css" href="styles/sidebar-style.css">
    <title>Admin Dashboard - TONI'S TRAMEZZINERIA</title>
    <script src="user/cards/popup/popup.js"></script>
</head>
<body>
    <?php
        include 'user/session/auth.php';
        session_start();
        if(!isset($_SESSION['username']) || !AuthFunctions::is_admin()){
            header("Location: login.php");
            exit();
        }
    ?>
    <div class="content">
        
        <?php include 'user/sidebars/admin-sidebar.php'; ?>

        <div class="main-content">
            <div class="recensioni">
                <div id="title">Recensioni</div>
                <a id="all-comments-link" class="link-to-page" href="comments-all.php">All Comments</a>
                <?php
                    // Include your database connection file or establish a connection here
                    include 'user/backend/comment-manager.php';

                    // Query to retrieve comments with the highest rates
                    $bestComments = getBestComments(3);

                    // Check if the query was successful
                    if ($bestComments) {
                        // Fetch and display comments
                        foreach ($bestComments as $comment) {
                            include 'user/cards/comment-card.php';
                        }
                    } else {
                        // Display an error message if the query fails
                        echo "No comments found";
                    }
                ?>
            </div>
            <div class="menu">
                <div id="title">Menu</div>
                <a id="all-dish-link" class="link-to-page" href="menu-all.php">All Dishes</a>   
                <?php
                    // Include your database connection file or establish a connection here
                    include 'user/backend/menu-manager.php';

                    // Query to retrieve comments with the highest rates
                    $burgers = getDishes(3);

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
                ?>

                <?php include 'user/cards/popup/popup.php'; ?>
            </div>
        </div>
    </div>
    <script src="user/cards/card.js"></script>

</body>
</html>
