<?php 
session_start();
$pageTitle = "Motorcycle Search";
require_once('template.php');
require_once('header.php');

?>

<div class="contentbox1">

    <h1>Bike Database</h1>
    <div class="form-container">
        <form id="api-form">
            <label for="make">Brand:</label>
            <input type="text" id="make" name="make" value="kawasaki">
            <br>
            <label for="model">Model:</label>
            <input type="text" id="model" name="model" value="ninja">
            <br>
            <button type="button" id="fetch-button">Search</button>
            <button type="button" id="reset-button">Reset</button>
        </form>
    </div>
    <div id="result"></div>
</div>

<script src="js/bikelibrary.js"></script>
<script>
    import { JellyTriangle } from '@uiball/loaders'

<JellyTriangle 
 size={60}
 speed={1.75} 
 color="black" 
/>
</script>
</body>
</html>
