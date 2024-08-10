<?php
// dbconfig.php
try {
    $dsn = 'mysql:host=localhost;dbname=php-assignment3'; // Update this to match your database name
    $username = 'root'; // Your MySQL username
    $password = ''; // Your MySQL password
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];

    // Create a new PDO instance
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    // If there is an error connecting to the database, output the error message
    die('Database connection failed: ' . $e->getMessage());
}
?>
