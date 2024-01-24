<?php
header("Location: /toni/home.php"); // Replace "/home" with the actual URL of your home page
exit();
?>

<?php
http_response_code(404);
include('/toni/404.php');
?>
