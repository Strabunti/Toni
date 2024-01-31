<!DOCTYPE html>

<html lang="it" xmlns="http://www.w3.org/1999/xhtml" xml:lang="it">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="tramezzini, panini, hamburger, fast-food, gourmet, cucina, Padova, Portello, pagina, utente">
    <meta name="description" content="Benvenuto, utente, nella tua dashboard! Qui puoi rivedere le recensioni degli altri utenti e le tue, potendole anche rimuovere se desideri farlo.">
    <link rel="stylesheet" type="text/css" href="styles/page-style.css">
    <link rel="stylesheet" type="text/css" href="styles/dashboard-style.css">
    <link rel="stylesheet" type="text/css" href="styles/card-style.css">
    <link rel="stylesheet" type="text/css" href="styles/popup-style.css">
    <link rel="stylesheet" type="text/css" href="styles/sidebar-style.css">
    <title>User Dashboard - TONI'S TRAMEZZINERIA</title>
    <script src="user/cards/popup/popup.js"></script>
</head>
<body>
    <?php
        include 'user/session/auth.php';
        session_start();
        if(!isset($_SESSION['username'])){
            header("Location: login.php");
            exit();
        }
    ?>

    <div class="content">
        <?php include 'user/sidebars/user-sidebar.php'; ?>

        <div class="main-content">
            <div class="recensioni">
                <div id="title" class="title">Tutte le mie Recensioni</div>
                <a id="all-comments-link" class="link-to-page" href="comments-all.php">Tutti i commenti</a>

                <?php

                // Check if the user is an admin
                if (isset($_SESSION['username'])) {

                    // Include your database connection file or establish a connection here
                    include 'user/backend/comment-manager.php';

                    // Query to retrieve comments with the highest rates
                    $bestComments = getMyComments($_SESSION['username']);

                    // Check if the query was successful
                    if ($bestComments) {
                        // Fetch and display comments
                        foreach ($bestComments as $comment) {
                            include 'user/cards/comment-card.php';
                        }
                    } else {
                    }
                } else {
                    // Redirect to a login page or display an access denied message
                    echo "Access denied. Please log in as an admin.";
                }
                ?>
            <div class="card">
                <form class="new-comment-form" action="add-comment-form.php" method="post">
                    <button class="new-comment-button" type="submit">+
                        <span class="new-comment-button-description">Aggiungi un nuovo commento</span>
                    </button>
                </form>
            </div>
            <?php include 'user/cards/popup/popup.php'; ?>
        </div>
        </div>
    </div>
    <script src="../cards/card.js"></script>


</body>
</html>
