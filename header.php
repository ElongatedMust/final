<?php 
$pageTitle = "header";
require_once('template.php');
?>
<main>
    <nav>
        <div class="L">
            <a href="homepage.php"><img src="./images/logo.png" alt="logo" id="logo"></a>
        </div>
        <ul>
            <li><a href="motorcycles.php">Motorcycles</a></li>
            <!-- <li><a href="register.php">Register</a></li> -->
            <li> <?php if ($isAdmin) { echo '<a href="adminpage.php">dashboard</a>';} ?> </li>
            <li> <?php if ($isAdmin) { echo '<a href="uploads.php">upload</a>';} ?> </li>
            <li><?php if ($isLoggedIn){echo '<a href="logout.php">Logout</a>';}
                else {echo'<a href="login.php">Login</a>';}
            ?></li>
        </ul>
        
    </nav>
</main>
    
</body>
</html>