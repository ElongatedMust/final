<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="Styling/header.css">
    <link rel="stylesheet" href="Styling/motorcycles.css">
    <link rel="stylesheet" href="Styling/register.css">
    <link rel="stylesheet" href="Styling/homepage.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <?php $isAdmin = isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1;?>
</head>
<body>


