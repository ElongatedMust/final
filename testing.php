<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styling/testing.css">
</head>
<body>
    
</body>
</html>
<?php
require('header.php');
require('connections/db.connect.php');

if (isset($_GET['id'])) {
    $content_id = $_GET['id'];

    $db = new Database;
    $pdo = $db->getPDO();

    $sql = "SELECT images.id AS image_id, images.path_image, contentbox.id AS content_id, contentbox.title, contentbox.text
            FROM images
            INNER JOIN contentbox ON images.content_id = contentbox.id
            WHERE contentbox.id = ?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$content_id]);
    $content = $stmt->fetchAll();

    if (empty($content)) {
        echo 'No data found for this content ID.';
    } else {
        foreach ($content as $row) {
            echo '<div class="image">';
            echo '<img class="image" src="' . $row['path_image'] . '">';
            echo '</div>';

            echo '<div class="info">';
            echo 'Content ID: ' . $row['content_id'] . '</br>';
            echo 'Title: ' . $row['title'] . '</br>';
            echo '<div class="description">';
                echo 'Description: ' . $row['text'];
            echo '</div>';

            echo '</div>';
        }
    }
} else {
    echo 'No content ID provided.';
}
?>
