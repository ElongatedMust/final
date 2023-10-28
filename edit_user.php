<?php
require('header.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_POST['listing_id']; 

    
    $sql = "SELECT * FROM users WHERE id = :userId"; 
    $statement = $pdo->prepare($sql);
    $statement->bindParam(':userId', $userId, PDO::PARAM_INT); 
    $statement->execute();
    $usersData = $statement->fetch(PDO::FETCH_ASSOC);

    
    ?>
    <form action="useredit.php" method="POST">
        
        <label for="email">email:</label>
        <input type="text" id="email" name="email" value="<?php echo $usersData['email']; ?>" required>

        <label for="username">username:</label>
        <input type="text" id="username" name="username" value="<?php echo $usersData['username']; ?>" required>

        <label for="password">password:</label>
        <input type="password" id="password" name="password" value="<?php echo $usersData['password']; ?>" required>

        <button type="submit">Save Changes</button>
    </form>
    <?php
}
?>

<link rel="stylesheet" href="styling/edit.css">
