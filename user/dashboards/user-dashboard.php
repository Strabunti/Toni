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
    <title>Admin Page - Comments</title>
    <script src="../cards/popup/popup.js"></script>
</head>
<body>
    <?php
        include '../session/auth.php';
        session_start();
        if(!isset($_SESSION['username'])){
            header("Location: ../view/login.html");
            exit();
        }
    ?>

    <div class="content">
        <?php include '../sidebars/user-sidebar.php'; ?>

        <div class="main-content">
            <div class="recensioni">
                <div id="title">Tutte le mie Recensioni</div>
                <a id="all-comments-link" href="../view/comments-all.php">All Comments</a>

                <?php
                session_start();

                // Check if the user is an admin
                if (isset($_SESSION['username'])) {

                    // Include your database connection file or establish a connection here
                    include '../backend/comment-manager.php';

                    // Query to retrieve comments with the highest rates
                    $bestComments = getMyComments($_SESSION['username']);

                    // Check if the query was successful
                    if ($bestComments) {
                        // Fetch and display comments
                        foreach ($bestComments as $comment) {
                            include '../cards/comment-card.php';
                        }
                    } else {
                    }
                } else {
                    // Redirect to a login page or display an access denied message
                    echo "Access denied. Please log in as an admin.";
                }
                ?>
            <div  class="card">
                <form class="new-comment-form" action="../forms/add-comment-form.php" method="post">
                    <button class="new-comment-button" type="submit">+
                        <p class="new-comment-button-description">Aggiungi un nuovo commento</p>
                    </button>
                </form>
            </div>
            <?php include '../cards/popup/popup.php'; ?>
        </div>
        </div>
    </div>
    <script src="../cards/card.js"></script>


</body>
</html>