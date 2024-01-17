<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link id="style" rel="stylesheet" href="../styles/page-style.css">
    <link id="style" rel="stylesheet" href="../styles/sidebar-style.css">
    <link id="style" rel="stylesheet" href="../styles/form-style.css">
    <title>Add New Comment</title>
</head>
<body>
<div class="content">

    <?php
    session_start();

    // Check if the user is logged in
    if (!isset($_SESSION['username'])) {
        // Redirect to a login page or display an access denied message
        header("Location: ../view/login.php"); // Change 'login.php' to your actual login page
        exit();
    }
    ?>
        
    <?php include '../sidebars/user-sidebar.php'; ?>

    <form action="../backend/add-comment.php" method="post">
        <h2>Add New Comment</h2>

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