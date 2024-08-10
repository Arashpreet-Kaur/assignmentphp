<?php
session_start();
include 'templates/header.php';

// Check if the user is logged in by verifying the existence of session variables
if (!isset($_SESSION['email']) || !isset($_SESSION['firstname'])) {
    // Redirect to the login page if the session variables are not set
    header('Location: login.php');
    exit;
}

?>

<h1>Welcome, <?php echo htmlspecialchars($_SESSION['firstname']); ?></h1>
<p>Email: <?php echo htmlspecialchars($_SESSION['email']); ?></p>
<p>Here are your shared recipes:</p>

<!-- Add your code to display recipes here -->

<?php include 'templates/footer.php'; ?>
