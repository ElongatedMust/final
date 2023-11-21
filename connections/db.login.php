<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require('connections/db.connect.php'); // Include your database connection here

    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Handle invalid email
        header('Location: login.php?error=invalid_email');
        exit;
    }

    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        // User not found
        header('Location: login.php?error=user_not_found');
        exit;
    }

    if (password_verify($_POST['password'], $user['password'])) {
        session_regenerate_id(); // Prevent session fixation
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['is_admin'] = $user['is_admin'];

        $redirectPage = $_SESSION['is_admin'] == 1 ? 'adminpage.php' : 'homepage.php';
        header('Location: ' . $redirectPage);
        exit;
    } else {
        // Invalid password
        header('Location: login.php?error=invalid_password');
        exit;
    }
}
?>
