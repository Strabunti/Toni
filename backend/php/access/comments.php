<?php
require_once('db.php');
function getBestComments($numberOfCOmments = 4){
    $query = "SELECT username, email, SUBSTRING(comment, 1, 200) AS short_comment FROM comments ORDER BY rate DESC LIMIT ?";
    return DataBase::runQuery($query, $numberOfCOmments);
}

?>
