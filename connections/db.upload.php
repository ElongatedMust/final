<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish a database connection
    $conn = new mysqli("localhost", "root", "", "finals");

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the data from the form
    $title = $_POST["title"];
    $text = $_POST["text"];

    // Upload the image file
    $image = $_FILES["image"];
    $imagePath = "images/" . $image["name"];
    move_uploaded_file($image["tmp_name"], $imagePath);

    // Insert data into the "contentbox" table
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
            echo "Data inserted successfully.";
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
