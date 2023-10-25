<?php
session_start();
$pageTitle = "post image";
 require_once("template.php");
 require_once("header.php");
 require ("connections/db.connect.php");
 require ("connections/db.upload.php");
?>


    <form  method="post" enctype="multipart/form-data" class="uploaded">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required><br>
        
        <label for="text">Text:</label>
        <textarea name="text" id="text" required></textarea><br>
        
        <label for="image">Image:</label>
        <input type="file" name="image" id="image" accept="image/*" required><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>
