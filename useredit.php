<?php
// Check if ID is provided
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    // Database connection
    require("connections/db.connect.php");

    // Fetch the existing data
    $stmt = $conn->prepare("SELECT title, text FROM contentbox WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    if ($data) {
        $title = $data['title'];
        $text = $data['text'];
        // ... (continue with form HTML and prefill the form fields)
    } else {
        echo "No record found.";
    }
} else {
    echo "No ID provided.";
}
?>
<!-- HTML form for editing -->
<form action="update_info_card.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="text" name="title" value="<?php echo htmlspecialchars($title); ?>">
    <textarea name="text"><?php echo htmlspecialchars($text); ?></textarea>
    <input type="submit" value="Update">
</form>
