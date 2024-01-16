<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link id="style" rel="stylesheet" href="styles/admin-style.css">
    <link id="style" rel="stylesheet" href="styles/form-style.css">
    <title>User Profile</title>
</head>
<body>

    <div class="content">
        <?php include 'sidebars/user-sidebar.php'; ?>
        <?php
        session_start();

        // Check if the user is logged in
        if (!isset($_SESSION['username'])) {
            // Redirect to a login page or display an access denied message
            header("Location: login.php"); // Change 'login.php' to your actual login page
            exit();
        }

        // Include your database connection file or establish a connection here
        include 'backend/php/access/user-manager.php';

        // Retrieve user information from the database
        $username = $_SESSION['username'];
        $user = user_manager::get_by_username($username);
        ?>

        <form action="update-profile.php" method="post" enctype="multipart/form-data">
            <h2>User Profile</h2>

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user[0]['username']); ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user[0]['email']); ?>" required>

            <label for="profile_pic">Profile Picture:</label>
            <img src="<?php echo user_manager::displayProfilePic($user[0]['username']); ?>" alt="Profile picture of the user" class="profile-pic">
            <input type="file" id="profile_pic" name="profile_pic" accept="image/*">

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="<?php echo htmlspecialchars($user[0]['password']); ?>" required>

            <button type="submit">Update Profile</button>
        </form>
    </div>
</body>
</html>
