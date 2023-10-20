<?php
require ('db.connect.php');

$errors = [];

// Define the isEmailExists function before using it in the validation checks
function isEmailExists($pdo, $email) {
    $stmt = $pdo->prepare('SELECT COUNT(*) FROM users WHERE email = :email');
    $stmt->bindValue(':email', $email);
    $stmt->execute();
    return $stmt->fetchColumn() > 0;
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (strlen($password) < 8) {
        $errors[] = 'Password must be at least 8 characters long.';
    }

    if (!preg_match('/[A-Z]/', $password)) {
        $errors[] = 'Password must contain at least one uppercase letter.';
    }

    if (!preg_match('/[a-z]/', $password)) {
        $errors[] = 'Password must contain at least one lowercase letter.';
    }

    if (!preg_match('/[0-9]/', $password)) {
        $errors[] = 'Password must contain at least one number.';
    }

    if (!preg_match('/[!@#$%^&*()\-_=+{};:,<.>]/', $password)) {
        $errors[] = 'Password must contain at least one special character.';
    }

    // Check if the email already exists
    if (isEmailExists($pdo, $email)) {
        $errors[] = 'Email already exists. Please choose a different one.';
    }

    if (!empty($errors)) {
        echo '<div class="error">';
        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
        }
        echo '</div>';
    } else {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        try {
            $statement = $pdo->prepare('INSERT INTO users(email, username, password) VALUES (:email, :username, :password)');
            $statement->bindValue(':email', $email);
            $statement->bindValue(':username', $username);
            $statement->bindValue(':password', $password_hash);
            $statement->execute();        
            echo 'User registered successfully.';
            header("Location: login.php");
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
?>
