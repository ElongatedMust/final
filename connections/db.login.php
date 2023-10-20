<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require('connections/db.connect.php'); // Include your database connection here

    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['is_admin'] = $user['is_admin'];

        if ($_SESSION['is_admin'] == 1) {
            header('Location: motorcycles.php');
        } else {
            header('Location: homepage.php');
        }
        exit;
    } else {
        // Invalid email or password
        header('Location: login.php?error=1');
        exit;
    }
}
