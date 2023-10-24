<?php
session_start();
 require_once("template.php");
 require_once("header.php");
 require ("connections/db.connect.php");
?>

<!-- <div class="adminCard">
<?php
// // Create a new database instance
// $db = new Database;
// $pdo = $db->getPDO();

// // Define your SQL query
// $sql = "SELECT DISTINCT contentbox.id, contentbox.title, contentbox.text, images.path_image
//         FROM contentbox
//         INNER JOIN images ON contentbox.id = images.content_id"; // Fixed the JOIN condition

// // Execute the SQL query
// $content = $pdo->query($sql);

// // Check if any rows were returned
// if (!$content) {
//     echo '<p>No listings found.</p>';
// } else {
//     echo '<div class="card-container">';
//     while ($item = $content->fetch(PDO::FETCH_ASSOC)) {
//         echo '<div class="card">
//             <a href="admin.php" class="links">
//             <div class="imagecap">
//                 <img src="' . $item['path_image'] . '" alt="' . $item['title'] . '">
//             </div>
            

//             <div class="info">
//                 <h2 class="title">' . $item['title'] . '</h2>
//                 <p class="text">' . $item['text'] . '</p>
//             </div>
//             </a>
//         </div>';
//     }
//     echo '</div>';
// }
?>  
</div> -->

<div class="">

</div>
    
</body>
</html>