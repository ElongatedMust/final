<?php
require('connections/db.connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    

    // Sanitize the form inputs
    $email = sanitizeInput($_POST['email']);
    $username = sanitizeInput($_POST['username']);
    $password = sanitizeInput($_POST['password']);
    
    $listingId = $_POST['listing_id']; 

    // Update the contact form data in the database
    $sql = "UPDATE car_listing SET email = :email, username = :username, password = :password WHERE id = :listingId"; // Remove the comma after :km
    $statement = $pdo->prepare($sql);
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->bindParam(':username', $username, PDO::PARAM_STR);
    $statement->bindParam(':password', $password, PDO::PARAM_INT);


    try {
        if ($statement->execute()) {
            
            echo 'Data updated successfully!';
            header('Location: adminpage.php');
            exit;
        } else {
            
            echo 'Error updating data.';
        }
    } catch (PDOException $e) {
        // Error handling for database errors
        echo 'Error: ' . $e->getMessage();
    }
}

// Function to sanitize user input
function sanitizeInput($input) {
    return htmlspecialchars(trim($input));
}
?>
