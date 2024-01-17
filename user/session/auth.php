<?php
require_once dirname(__DIR__) . "../backend/user-manager.php";

class AuthFunctions
{
    public static function is_session_active()
    {
        // Check if the session is active
        return isset($_SESSION['user_id']);
    }

    public static function is_admin()
    {
        // Check if the user is an admin
        return isset($_SESSION['is_admin']) && $_SESSION['is_admin'];
    }

    public static function is_user($commentId)
    {
        // Check if the user is an admin
        $user_info = user_manager::get_by_username($_SESSION['username']);
        return $user_info[0]['id'] == $commentId;
    }

    public static function connectToDB($hostname = "localhost", $username = "toni", $password = "admin", $database = "toni")
    {
        DataBase::connect($hostname, $username, $password, $database);
    }

    public static function login($username, $password)
    {
        // Check if the user is an admin
        $admin_info = user_manager::get_admin($username);
        //log the admin info
        if ($admin_info) {

            // Example: Set admin-specific session variable
            $_SESSION['is_admin'] = true;
        }else {
            $_SESSION['is_admin'] = false;
        }

        // Regular user login logic
        $user_info = user_manager::get_by_username($username);
        if ($user_info && $password == $user_info[0]['password']) {
            // Valid login, set session variables
            $_SESSION['username'] = $user_info[0]['username'];
            error_log("Login successful by auth.php");
            return true;
        }

        return false;
    }

    public static function get_session_user()
    {
        // Return session user information
        return isset($_SESSION['user_id']) ? $_SESSION['username'] : null;
    }

    public static function register_user($mail, $username, $password)
    {
        // Check if the username or email already exists
        $existing_user = user_manager::get_by_username($username);
        $existing_mail = user_manager::get_by_mail($mail);

        if ($existing_user || $existing_mail) {
            // User or email already exists
            return false;
        }

        // Add the new user to the database
        user_manager::add($mail, $username, password_hash($password, PASSWORD_DEFAULT));

        return true;
    }
}
?>