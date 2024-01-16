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

function getAllDishes(){
    $query = "SELECT * FROM dish";
    return DataBase::runQuery($query);
}

function displayDishImage($idDish) {
    $sql = "SELECT image FROM dish WHERE id_dish = ?";
    $result = DataBase::runQuery($sql, $idDish);
    error_log(print_r($result, true));
    if($result){
        if($result[0]['image'] == null){
            return "resources/images/default-dish-pic.png";
        }else{
            $encodedImage = base64_encode($result[0]['image']);
            return "data:image/jpeg;base64," . $encodedImage;
        }
    }else{
        return "resources/images/burgher.png";
    }
}

?>