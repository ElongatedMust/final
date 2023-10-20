<?php 
session_start();
$pageTitle = "Downshift";
require ('connections/db.connect.php');
require_once('template.php');
require_once('header.php');
if (!isset($_SESSION['user_id'])) {
    // The user is not logged in, so you can redirect them to the login page
    header('Location: login.php');
    exit; }
$isAdmin = isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1;
?>

<div class="content">
    <?php
    $sql = "SELECT * FROM contentbox";
    $db = new Database;
    $pdo = $db->getPDO();
    $content = $pdo->query($sql);
    $result = $content->fetchAll();

    if (!$result) {
        echo '<p>No listings found.</p>';
    } else {
        echo '<div class="card-container">';
        foreach ($result as $item) {
            echo '<div class="card">
            <a href="register.php"> 
                <div class="imagecap">
                    <img src="' . $item['path_image'] . '" alt="' . $item['title'] . '">
                </div>
                <div class="info">
                    <h2 class="title">' . $item['title'] . '</h2>
                    <p class="text">' . $item['text'] . '</p>
                </div>
            </a>
            </div>';
        }
        echo '</div>';
        echo '<br>';
    }
    ?>
    <a href="logout.php">Logout</a>
</div>

    
</body>
</html>