<?php
require_once('db.php');
class user_manager
{

    public static function get_password($users)
    {
        return DataBase::runQuery('SELECT password FROM users WHERE username = ?', $users);
    }
    public static function get_by_mail($mail)
    {
        return DataBase::runQuery('SELECT * FROM users WHERE mail = ?', $mail);
    }
    public static function get_by_username($users)
    {
        return DataBase::runQuery('SELECT * FROM users WHERE username = ?', $users);
    }   
    public static function get()
    {
        return DataBase::runQuery('SELECT * FROM users');
    }
    public static function get_admin($username)
    {
        return DataBase::runQuery('SELECT * FROM admin WHERE username = ?', $username);
    }
    public static function update()
    {
    }
    public static function get_username($mail)
    {
        return DataBase::runQuery('SELECT username FROM users WHERE mail = ?', $mail);
    }
    public static function get_mail($username)
    {
        return DataBase::runQuery('SELECT mail FROM users WHERE username = ?', $username);
    }
    public static function add($mail = null, $username = null, $password = null)
    {
        DataBase::runQuery("INSERT INTO users (username, mail, password) VALUES (?,?,?);", $mail, $username, $password);
    }
    public static function delete($username = null)
    {
        DataBase::runQuery("DELETE FROM users WHERE username = ?;", $username);
    }
    public static function change_username($olduser, $username)
    {
        $all_user = DataBase::runQuery("SELECT username FROM users;");
        if (strtoupper($olduser) === strtoupper($username)){
            return true;
        }
        foreach ($all_user as $key => $value) {
            if (strtoupper($username) === strtoupper($value['username'])){
                return false;
            }
        }
        DataBase::runQuery("UPDATE users SET username = ? WHERE username = ?;", $username, $olduser);
        return true;
    }
    public static function change_mail($username, $mail)
    {
        DataBase::runQuery("UPDATE users SET email = ? WHERE username = ?;", $mail, $username);
    }
    public static function change_password($username, $password)
    {
        DataBase::runQuery("UPDATE users SET password = ? WHERE username = ?;", $password, $username);
    }
    public static function change_profile_pic($username, $profile_pic)
    {
        DataBase::runQuery("UPDATE users SET profile_pic = ? WHERE username = ?;", $profile_pic, $username);
    }
    public static function change_user($olduser, $username, $mail, $password, $profile_pic)
    {
        user_manager::change_mail($olduser, $mail);
        user_manager::change_password($olduser, $password);
        user_manager::change_profile_pic($olduser, $profile_pic);
        return user_manager::change_username($olduser, $username);
    }
    public static function displayProfilePic($username) {
        $sql = "SELECT profile_pic FROM users WHERE username = ?";
        $result = DataBase::runQuery($sql, $username);
        error_log(print_r($result, true));
        if($result){
            if($result[0]['profile_pic'] == null){
                return "resources/images/default-profile-pic.png";
            }else{
                $encodedImage = base64_encode($result[0]['profile_pic']);
                return "data:image/jpeg;base64," . $encodedImage;
            }
        }else{
            return "resources/images/default-profile-pic.png";
        }
    }
    
}
?>