<?php
session_start();
$pageTitle = "admin panel";
require_once("template.php");
require_once("header.php");
require("connections/db.connect.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="Styling/adminpage.css">
</head>
<body>

<div class="dashboard">
    <div class="panel1" >
        <?php
        $sql = "SELECT * FROM users ";
        $db = new Database;
        $pdo = $db->getPDO();
        $users = $pdo->query($sql);
        $userResult = $users->fetchAll();

        if (!$userResult) {
            echo '<p>No user listings found.</p>';
        } else {
            echo '<table class="user-table">
                    <tr class="table1">
                        <th>ID</th>
                        <th>email</th>
                        <th>username</th>
                        <th>password</th>
                        <th>is_admin</th>
                        <th>Actions</th>
                    </tr>';
            foreach ($userResult as $user) {
                echo '<tr>
                        <td>' . $user['id'] . '</td>
                        <td>' . $user['email'] . '</td>
                        <td>' . $user['username'] . '</td>
                        <td>' . $user['password'] . '</td>
                        <td>' . $user['is_admin'] . '</td>
                        <td>
                            <form action="deletions/delete_user.php" method="post">
                                <input type="hidden" name="user_id" value="' . $user['id'] . '">
                                <input type="submit" name="delete" value="Delete">
                            </form>
                            <form action="edit_user.php" method="post">
                                <input type="hidden" name="user_id" value="' . $user['id'] . '">
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
