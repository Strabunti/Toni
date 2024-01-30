<!DOCTYPE html>

<html lang="it" xmlns="http://www.w3.org/1999/xhtml" xml:lang="it">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="tramezzini, panini, hamburger, fast-food, gourmet, cucina, Padova, Portello, aggiungi, recensione, utenti">
    <meta name="description" content="Raccontaci la tua esperienza da TONI'S TRAMEZZINERIA! Aggiungi una recensione!">
    <link rel="stylesheet" rel="stylesheet" href="styles/page-style.css">
    <link rel="stylesheet" rel="stylesheet" href="styles/sidebar-style.css">
    <link rel="stylesheet" rel="stylesheet" href="styles/form-style.css">
    <title>Add New Comment - TONI'S TRAMEZZINERIA</title>
</head>
<body>
<div class="content">

    <?php
    session_start();

    // Check if the user is logged in
    if (!isset($_SESSION['username'])) {
        // Redirect to a login page or display an access denied message
        header("Location: login.php"); // Change 'login.php' to your actual login page
        exit();
    }
    ?>
        
    <?php include 'user/sidebars/user-sidebar.php'; ?>

    <form action="user/backend/add-comment.php" method="post">
        <h2 class="form-title">Add New Comment</h2>

        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required maxlength="100">

        <label for="comment">Comment:</label>
        <textarea id="comment" name="comment" rows="4" required maxlength="500"></textarea>

        <label for="rating">Rating:</label>
        <select id="rating" name="rating" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>

        <button type="submit">Submit Comment</button>
    </form>
</div>

</body>
</html>