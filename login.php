<?php
require_once('template.php');
require('connections/db.login.php');
require('header.php');
?>





    <div id="container">
        <form method="post" class="log" onsubmit="return validateForm();">
            <div>
                <label>Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <br>
            <div>
                <label>Mot de passe:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <br>
            <button type="submit" name="submit" class="click">Connexion</button>
            <a href="register.php" class="accountcreation">no account ? click here </a>
        </form>  
    </div>
</body>
</html>
