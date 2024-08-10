<?php


?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Sharing Network</title>
    <link rel="stylesheet" type="text/css" href="CSS/styles.css"> <!-- Link to your CSS file -->
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon -->
    <!-- Additional CSS files or frameworks -->
    <!-- <link rel="stylesheet" href="path-to-bootstrap.css"> -->
    <!-- Additional JavaScript files -->
    <!-- <script src="path-to-your-script.js" defer></script> -->
</head>
<body>
<div id="container">
<header id="banner">
    <h1>Recipe Sharing Network</h1>
    <h3>Share Your Favorite Recipes</h3>
</header>
<div id="nav">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="member.php">Member</a></li>
        <?php if (isset($_SESSION['user'])): ?>
            <li><a href="logout.php">Logout</a></li>
        <?php else: ?>
            <li><a href="register.php">Register</a></li>
        <?php endif; ?>
        <li><a href="contact.php">Contact</a></li>
    </ul>
</div>
<div class="main-content">


