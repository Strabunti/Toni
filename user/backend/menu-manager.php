<?php 
require_once('db-manager.php');
function getDishes($numberOfBurgers = 4){
    if($numberOfBurgers < 0){
        $query = "SELECT * FROM dish";
        return DataBase::runQuery($query);
    }else{
        $query = "SELECT * FROM dish LIMIT ?";
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
    if($result){
        if($result[0]['image'] == null){
            return "resources/images/default-dish-pic.webp";
        }else{
            $encodedImage = base64_encode($result[0]['image']);
            return "data:image/jpeg;base64," . $encodedImage;
        }
    }else{
        return "resources/images/burgher.webp";
    }
}

function getBestSellerDish(){
    $query = "SELECT * FROM dish WHERE bestseller = 1";
    $result = DataBase::runQuery($query);
    if($result){
        return $result[0];
    }else{
        return null;
    }
}

function getBestMonthDish(){
    $query = "SELECT * FROM dish WHERE best_month = 1";
    $result = DataBase::runQuery($query);
    if($result){
        return $result[0];
    }else{
        return null;
    }
}

?>