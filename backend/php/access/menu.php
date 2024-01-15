<?php 
require_once('db.php');
function getBurger($numberOfBurgers = 4){
    if($numberOfBurgers < 0){
        $query = "SELECT * FROM dish WHERE type = 'burger'";
        return DataBase::runQuery($query);
    }else{
        $query = "SELECT * FROM dish WHERE type = 'burger' LIMIT ?";
        return DataBase::runQuery($query, $numberOfBurgers);
    }
}

function displayDishImage($dishName) {
    $sql = "SELECT profile_pic FROM users WHERE username = ?";
    $result = DataBase::runQuery($sql, $dishName);
    error_log(print_r($result, true));
    if($result){
        if($result[0]['image'] == null){
            return "resources/images/burgher.png";
        }else{
            $encodedImage = base64_encode($result[0]['image']);
            return "data:image/jpeg;base64," . $encodedImage;
        }
    }else{
        return "resources/images/burgher.png";
    }
}

?>