<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link id="style" rel="stylesheet" href="styles/admin-style.css">
    <link id="style" rel="stylesheet" href="styles/form-style.css">
    <title>Add New Comment</title>
    
</head>
<body>
<div class="content">
        <!-- Dashboard Section -->
        <div class="dashboard">
            <image src="resources/images/reverse-logo.png" alt="Logo" class="logo">
            <div class="dashboard-item">
                <a href="user-dashboard.php" class="dashboard-item-link">
                    <img src="resources/images/dash-board.png" alt="DashBoard Image" class="dashboard-item-image">
                    <p>Dashboard</p>
                </a>
            </div>
            <div class="dashboard-item">
                <a href="comments.php" class="dashboard-item-link">
                    <img src="resources/images/comment.png" alt="Comment Image" class="dashboard-item-image">
                    <p>Tutte Le Recensioni</p>
                </a>
            </div>
            <div class="dashboard-item">
                <a href="user-page.php" class="dashboard-item-link">
                    <img src="resources/images/user.png" alt="User Image" class="dashboard-item-image">
                    <p>User Info</p>
                </a>
            </div>
            <!-- Add more dashboard items as needed -->
        </div>

    <form action="insert-comment.php" method="post">
        <h2>Add New Comment</h2>

        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>

        <label for="comment">Comment:</label>
        <textarea id="comment" name="comment" rows="4" required></textarea>

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