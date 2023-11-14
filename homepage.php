<?php
session_start();
$pageTitle = "Downshift";
require_once('connections/db.connect.php');
require_once('template.php');
require_once('header.php');

if (!isset($_SESSION['user_id'])) {
    // The user is not logged in, so redirect them to the login page
    header('Location: login.php');
    exit;
}

$isAdmin = isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1;
?>

<div class="banner">
    <!-- Banner content -->
</div>

<div class="article">
    <?php
    // Create a new database instance
    $db = new Database;
    $pdo = $db->getPDO();

    // Define your SQL query to retrieve content data
    $sql = "SELECT contentbox.id, contentbox.title, contentbox.text, images.path_image
            FROM contentbox
            INNER JOIN images ON contentbox.id = images.content_id";

    // Execute the SQL query
    $content = $pdo->query($sql);

    // Check if any rows were returned
    if ($content) {
        echo '<div class="card-container">';
        while ($item = $content->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="card">';
            echo '<a href="testing.php?id=' . $item['id'] . '" class="links">'; // Link to testing.php with the content ID
            echo '<div class="imagecap">';
            echo '<img src="' . $item['path_image'] . '" alt="' . $item['title'] . '">';
            echo '</div>';

            echo '<div class="info">';
            echo '<h2 class="title">' . $item['title'] . '</h2>';
            echo '<p class="text">' . $item['text'] . '</p>';
            echo '</div>';
            echo '</a>';
            echo '</div>';
        }
        echo '</div>';
    } else {
        echo '<p>No listings found.</p>';
    }
    ?>
</div>
</body>
</html>
