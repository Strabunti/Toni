<?php
require_once('db.php');
class user_manager
{
    public static function get_password($user)
    {
        return DataBase::runQuery('SELECT password FROM user WHERE username = ?', $user);
    }
    public static function get_by_mail($mail)
    {
        return DataBase::runQuery('SELECT * FROM user WHERE mail = ?', $mail);
    }
    public static function get_by_username($user)
    {
        return DataBase::runQuery('SELECT * FROM user WHERE username = ?', $user);
    }   
    public static function get()
    {
        return DataBase::runQuery('SELECT * FROM user');
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
        return DataBase::runQuery('SELECT username FROM user WHERE mail = ?', $mail);
    }
    public static function get_mail($username)
    {
        return DataBase::runQuery('SELECT mail FROM user WHERE username = ?', $username);
    }
    public static function add($mail = null, $username = null, $password = null)
    {
        DataBase::runQuery("INSERT INTO user (username, mail, password) VALUES (?,?,?);", $mail, $username, $password);
    }
    public static function delete($username = null)
    {
        DataBase::runQuery("DELETE FROM user WHERE username = ?;", $username);
    }
    public static function change_username($olduser, $username)
    {
        $all_user = DataBase::runQuery("SELECT username FROM user;");
        foreach ($all_user as $key => $value) {
            if (strtoupper($username) === strtoupper($value['username'])){
                return false;
            }
        }
        DataBase::runQuery("UPDATE user SET username = ? WHERE username = ?;", $username, $olduser);
        return true;
    }
}
?>