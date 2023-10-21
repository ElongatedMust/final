<?php
 require('db.connect.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if a file was uploaded successfully
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $targetDir = 'images/'; // Folder where you want to save the uploaded images
        $targetFile = $targetDir . basename($_FILES['image']['name']);

        // Move the uploaded file to the desired location
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            // Image was saved successfully
            $imagePath = '/' . $targetFile; // Add a forward slash to the beginning of the path

            
            $carListingId = $_POST['car_listing_id'];
            $insertSql = "INSERT INTO images (path_image, car_listing_id) VALUES (:imagePath, :carListingId)";
            $insertStmt = $pdo->prepare($insertSql);
            $insertStmt->bindParam(':imagePath', $imagePath);
            $insertStmt->bindParam(':carListingId', $carListingId, PDO::PARAM_INT);

            if ($insertStmt->execute()) {
                echo 'The file has been uploaded and the image path has been inserted into the database.';
            } else {
                echo 'There was an error inserting the image path into the database.';
            }
        } else {
            echo 'There was an error uploading the file.';
        }
    } else {
        echo 'No file was uploaded.';
    }
}

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);