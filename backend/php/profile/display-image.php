<?php
// Database connection (same as upload_process.php)

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT name, data FROM images WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        header("Content-type: image/jpeg");
        echo $row['data'];
    } else {
        echo "Image not found.";
    }
}

$conn->close();
?>