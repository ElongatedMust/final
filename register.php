<?php 
require_once("template.php");
require_once('header.php');
require ('connections/db.register.php');

?>

    <form method="post" action="register.php">
        <div id="container">
            <div class="log">
                <div>
                    <label>Email:</label>
                    <input type="email" name="email" required>
                </div>
                <br>
                <div>
                    <label>Nom:</label>
                    <input type="text" name="username" required>
                </div>
                <br>
                <div>
                    <label>Mot de passe:</label>
                    <input type="password" name="password" required>
                </div>
                <br>
                <button type="submit" name="submit" class="click">Inscription</button>
            </div>
        </div>
    </form>
</body>
</html>


