<?php
$title = "Toni's Tramezzineria - I migliori panini di Padova";
$page = "index";
$description = "Toni's Tramezzineria è un locale di Padova che offre i migliori panini della città.";
$keywords = "panini, tramezzini, padova, toni, tramezzineria, locale, bar, ristorante, paninoteca, panino, tramezzino, paninoteca";

include "php/template/header.php";
/*$content = "";*/
$htmlContent = file_get_contents('html/home.html');
echo ($htmlContent);
include "php/template/footer.php";
?>