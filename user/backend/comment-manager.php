<?php
require_once('db-manager.php');
function getBestComments($numberOfCOmments = 4){
    if($numberOfCOmments < 0){
        $query = "SELECT users.username, email, rating, title, review_date, comment_id, comment AS short_comment FROM comments, users WHERE users.username = comments.username ORDER BY rating DESC";
        return DataBase::runQuery($query);
    }else{
        $query = "SELECT users.username, email, rating, title, review_date, comment_id, comment AS short_comment FROM comments, users WHERE users.username = comments.username ORDER BY rating DESC LIMIT ?";
        return DataBase::runQuery($query, $numberOfCOmments);
    }
}

function getMyComments($username){
    $query = "SELECT users.username, email, rating, title, review_date, comment_id, comment AS short_comment FROM comments, users WHERE users.username = comments.username AND users.username = ? ORDER BY rating DESC";
    return DataBase::runQuery($query, $username);
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

function insertComment($username, $title, $comment, $rating, $date){
    $query = "INSERT INTO comments (username, title, comment, rating, review_date) VALUES (?, ?, ?, ?, ?)";
    return DataBase::runQuery($query, $username, $title, $comment, $rating, $date);
}

function getComment($comment_id){
    $query = "SELECT * FROM comments WHERE comment_id = ?";
    return DataBase::runQuery($query, $comment_id);
}

?>
