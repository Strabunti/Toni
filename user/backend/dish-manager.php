<?php
require_once('db-manager.php');

class dish_manager{
    public static function change_dish($id, $name, $description, $ingredients, $image, $price, $type, $bestseller, $best_month){
        if ($bestseller) {
            $updateBestsellerQuery = "UPDATE dish SET bestseller = 0 WHERE bestseller = 1";
            DataBase::runQuery($updateBestsellerQuery);
        }
        if ($best_month) {
            $updateBestMonthQuery = "UPDATE dish SET best_month = 0 WHERE best_month = 1";
            DataBase::runQuery($updateBestMonthQuery);
        }
        if ($image != null) {
            $query = "UPDATE dish SET name=?, description=?, ingredients=?, image=?, price=?, type=?, bestseller=?, best_month=? WHERE id_dish=?";
            $update = DataBase::runQuery($query, $name, $description, $ingredients, $image, $price, $type, $bestseller, $best_month, $id);
            return $update;
        } else {
            $query = "UPDATE dish SET name=?, description=?, ingredients=?, price=?, type=?, bestseller=?, best_month=? WHERE id_dish=?";
            $update = DataBase::runQuery($query, $name, $description, $ingredients, $price, $type, $bestseller, $best_month, $id);
            return $update;
        }
    }

    public static function get_by_id($id){
        $query = "SELECT * FROM dish WHERE id_dish=?";
        $result = DataBase::runQuery($query, $id);
        return $result;
    }

    public static function displayPic($id){
        $query = "SELECT image FROM dish WHERE id_dish=?";
        $result = DataBase::runQuery($query, $id);
        if($result){
            if($result[0]['image'] == null){
                return "resources/images/default-dish-pic.png";
            }else{
                $encodedImage = base64_encode($result[0]['image']);
                return "data:image/jpeg;base64," . $encodedImage;
            }
        }else{
            return "resources/images/default-dish-pic.png";
        }
        return $result;
    }
}

?>