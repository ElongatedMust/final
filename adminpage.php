<?php
session_start();

// User Authentication and Authorization
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== 1) {
    header('Location: login.php');
    exit;
}

$pageTitle = "admin panel";
require_once("template.php");
require_once("header.php");
require("connections/db.connect.php");

// Prevent caching
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styling/adminpage.css">
</head>
<body>

<div class="dashboard">
    <div class="panel1">
        <?php
        $sql = "SELECT id, email, username, is_admin FROM users"; // Removed password from selection
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
                        <th>Email</th>
                        <th>Username</th>
                        <th>Is Admin</th>
                        <th>Actions</th>
                    </tr>';
            foreach ($userResult as $user) {
                echo '<tr>
                        <td>' . htmlspecialchars($user['id']) . '</td>
                        <td>' . htmlspecialchars($user['email']) . '</td>
                        <td>' . htmlspecialchars($user['username']) . '</td>
                        <td>' . htmlspecialchars($user['is_admin']) . '</td>
                        <td>
                            <form action="deletions/delete_user.php" method="post">
                                <input type="hidden" name="user_id" value="' . htmlspecialchars($user['id']) . '">
                                <input type="submit" name="delete" value="Delete">
                            </form>
                            <form action="useredit.php" method="post">
                                <input type="hidden" name="user_id" value="' . htmlspecialchars($user['id']) . '">
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
