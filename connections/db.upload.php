<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish a database connection
    $conn = new mysqli("localhost", "root", "", "finals");
    mysqli_set_charset($conn, 'utf8mb4'); // Set character set

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Sanitize and validate inputs
    $title = filter_var($_POST["title"], FILTER_SANITIZE_STRING);
    $text = filter_var($_POST["text"], FILTER_SANITIZE_STRING);

    // Validate and process the uploaded file
    $image = $_FILES["image"];
    if ($image['error'] === UPLOAD_ERR_OK) {
        $imagePath = "images/" . basename($image["name"]); // Sanitize filename
        // Additional checks for file type, size, etc. should be here
        move_uploaded_file($image["tmp_name"], $imagePath);
    } else {
        // Handle file upload errors
        die("Error in file upload");
    }

    // Insert data into the "contentbox" table using prepared statement
    $contentInsertQuery = "INSERT INTO contentbox (title, text) VALUES (?, ?)";
    $stmt = $conn->prepare($contentInsertQuery);
    $stmt->bind_param("ss", $title, $text);
    $contentInserted = $stmt->execute();

    // Insert data into the "images" table
    if ($contentInserted) {
        $contentId = $stmt->insert_id;
        $imageInsertQuery = "INSERT INTO images (path_image, content_id) VALUES (?, ?)";
        $stmt = $conn->prepare($imageInsertQuery);
        $stmt->bind_param("si", $imagePath, $contentId);
        $imageInserted = $stmt->execute();

        if ($imageInserted) {
            header("Location: adminpage.php"); // Redirect to a thank-you page
            exit; // Stop the script
        } else {
            echo "Error inserting image data: " . $conn->error;
        }
    } else {
        echo "Error inserting content data: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
