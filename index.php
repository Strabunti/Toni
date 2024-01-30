<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="tramezzini, panini, hamburger, fast-food, gourmet, cucina, Padova, Portello">
    <meta name="description" content="TONI'S TRAMEZZINERIA! I migliori panini, hamburger e tramezzini di Padova! Vieni a provare la cucina di Tommy in zona Portello">
    <title>Home - TONI'S TRAMEZZINERIA</title>
</head>

<?php
header("Location: /toni/home.php");
exit();
?>

<?php
http_response_code(404);
include('/toni/404.php');
?>
