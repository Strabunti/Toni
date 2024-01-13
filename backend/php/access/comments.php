<?php
require_once('db.php');
function getBestComments($numberOfCOmments = 4){
    if($numberOfCOmments < 0){
        $query = "SELECT users.username, email, rating, title, review_date, comment_id, comment AS short_comment FROM comments, users WHERE users.username = comments.username ORDER BY rating DESC";
        return DataBase::runQuery($query);
    }else{
        $query = "SELECT users.username, email, rating, title, review_date, comment_id, comment AS short_comment FROM comments, users WHERE users.username = comments.username ORDER BY rating DESC LIMIT ?";
        return DataBase::runQuery($query, $numberOfCOmments);
    }
}

function displayStars($rating) {
    $starCount = round($rating); // Round the rating to the nearest whole number
    $stars = str_repeat('★', $starCount); // Display full stars
    $emptyStars = str_repeat('☆', 5 - $starCount); // Display empty stars

    return $stars . $emptyStars;
}

function deleteComment($comment_id){
    $query = "DELETE FROM comments WHERE comment_id = ?";
    return DataBase::runQuery($query, $comment_id);
}

?>
