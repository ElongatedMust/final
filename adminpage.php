<?php
session_start();
$pageTitle = "admin panel";
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

<div class="dashboard">
    <div class="panel1">
        <?php 
             $sql = "SELECT * FROM users ";
             $db = new Database;
             $pdo = $db->getPDO();
             $cars = $pdo->query($sql);
             $result = $cars->fetchAll();
     
             if (!$result) {
                echo '<p>No car listings found.</p>';
            } else {
                echo '<table>
                        <tr>
                            <th>ID</th>
                            <th>email</th>
                            <th>username</th>
                            <th>password</th>
                            <th>is_admin</th>
                            <th>Actions</th>
                        </tr>';
                foreach ($result as $item) {
                    echo '<tr>
                            <td>' . $item['id'] . '</td>
                            <td>' . $item['email'] . '</td>
                            <td>' . $item['username'] . '</td>
                            <td>' . $item['password'] . '</td>
                            <td>' . $item['is_admin'] . '</td>
                            <td>
                                <form action="deletions/delete_listing.php" method="post">
                                    <input type="hidden" name="listing_id" value="' . $item['id'] . '">
                                    <input type="submit" name="delete" value="Delete">
                                </form>
                                <form action="edit_carlisting.php" method="post">
                                    <input type="hidden" name="listing_id" value="' . $item['id'] . '">
                                    <input type="submit" name="edit" value="Edit">
                                </form>
                            </td>
                        </tr>';
                }
                echo '</table>';
            }
        ?>
    </div>
</div>
    
</body>
</html>