<?php
session_start();
$pageTitle = "post image";
 require_once("template.php");
 require_once("header.php");
 require ("connections/db.connect.php");
?>

<div class="container">
    <div class="form-container">    
        <form method="post" enctype="multipart/form-data" class="images">
            <input type="text" name="car_listing_id" placeholder="Id of car">
            <input type="file" name="image" accept="image/*">
            <input type="submit" value="upload">
        </form>
    </div>
</div>

</body>
</html>