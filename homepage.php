<?php
session_start();
$pageTitle = "Downshift";
require_once('connections/db.connect.php'); // Corrected include path
require_once('template.php');
require_once('header.php');

if (!isset($_SESSION['user_id'])) {
    // The user is not logged in, so redirect them to the login page
    header('Location: login.php');
    exit;
}

$isAdmin = isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1;
?>
<!-- <script>
    let currentSlide = 0;
    const slides = document.getElementsByClassName("carousel-slide");

    // Show the initial slide
    showSlide(currentSlide);

    function changeSlide(n) {
        showSlide(currentSlide += n);
    }

    function showSlide(n) {
        if (n >= slides.length) {
            currentSlide = 0;
        }
        if (n < 0) {
            currentSlide = slides.length - 1;
        }
        for (let i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slides[currentSlide].style.display = "block";
    }
</script> -->
<!-- <div class="carousel-container">
    
    <div class="carousel-slide">
        <img src="images/slide1.jpg" alt="Image 1">
    </div>
    <div class="carousel-slide">
        <img src="images/slide2.jpg" alt="Image 2">
    </div>
    <div class="carousel-slide">
        <img src="images/slide3.jpg" alt="Image 3">
    </div> -->

    <!-- Navigation buttons -->
    <!-- <a class="carousel-btn" onclick="changeSlide(-1)">&#10094;</a>
    <a class="carousel-btn" onclick="changeSlide(1)">&#10095;</a>
</div> -->
<div class="banner">
    
</div>
<div class="article">
  <?php
// Create a new database instance
$db = new Database;
$pdo = $db->getPDO();

// Define your SQL query
$sql = "SELECT DISTINCT contentbox.id, contentbox.title, contentbox.text, images.path_image
        FROM contentbox
        INNER JOIN images ON contentbox.id = images.content_id"; // Fixed the JOIN condition

// Execute the SQL query
$content = $pdo->query($sql);

// Check if any rows were returned
if (!$content) {
    echo '<p>No listings found.</p>';
} else {
    echo '<div class="card-container">';
    while ($item = $content->fetch(PDO::FETCH_ASSOC)) {
        echo '<div class="card">
            <a href="admin.php" class="links">
            <div class="imagecap">
                <img src="' . $item['path_image'] . '" alt="' . $item['title'] . '">
            </div>
            

            <div class="info">
                <h2 class="title">' . $item['title'] . '</h2>
                <p class="text">' . $item['text'] . '</p>
            </div>
            </a>
        </div>';
    }
    echo '</div>';
}
?>  
</div>


</div>
</body>
</html>
