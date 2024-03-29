<!DOCTYPE html>

<html lang="it" xmlns="http://www.w3.org/1999/xhtml" xml:lang="it">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="tramezzini, panini, hamburger, fast-food, gourmet, cucina, Padova, Portello, recensioni, visualizza, modifica, amministratore">
    <meta name="description" content="Qui puoi vedere tutte le recensioni che hanno lasciato gli utenti, e anche eliminarle.">
    <link rel="stylesheet" type="text/css" href="styles/stylesHeader.css"/>
    <link rel="stylesheet" type="text/css" href="styles/stylesFooter.css"/>
    <link rel="stylesheet" type="text/css" href="styles/stylesBody.css"/>
    <link rel="stylesheet" type="text/css" href="styles/page-style.css">
    <link rel="stylesheet" type="text/css" href="styles/sidebar-style.css">
    <link rel="stylesheet" type="text/css" href="styles/popup-style.css">
    <link rel="stylesheet" type="text/css" href="styles/card-style.css">
    <title>Admin Page - Comments - TONI'S TRAMEZZINERIA</title>
    <script src="user/cards/popup/popup.js"></script>
</head>
<body>

    <!-- HEADER -->
    <?php include 'templates/header.html' ?>


    <!-- MAIN SECTION -->
    <section id="mainSection">
        <div class="rectangle" id="titleRectangle" aria-labelledby="mainSectionHeading"><h1 id="mainSectionHeading">RECENSIONI</h1></div>
    </section>

    <section id="recensioniSection">
    <?php include 'user/session/auth.php'; ?>

<?php
// Include your authentication file
session_start();

// Check if the user is an admin
// Continue with the admin page content

// Include your database connection file or establish a connection here
include 'user/backend/comment-manager.php';

// Query to retrieve comments with the highest rates
$bestComments = getBestComments(-1);

// Check if the query was successful
if ($bestComments) {
    // Fetch and display comments
    foreach ($bestComments as $comment) {
        include 'user/cards/comment-card.php';
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
    </section>

    <?php include 'user/cards/popup/popup.php'; ?>
    <script src="user/cards/card.js"></script>

    <!-- FOOTER -->
    <?php include 'templates/footer.html' ?>

    <script src="scripts/scriptHeader.js"></script>
</body>
</html>
