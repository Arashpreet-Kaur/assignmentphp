<?php
session_start(); // Ensure session_start() is at the top
include 'config/dbconfig.php';
include 'templates/header.php';

// Handle login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $stmt = $pdo->prepare("SELECT * FROM members WHERE email = :email");
            $stmt->execute(['email' => $email]);

            if ($stmt->rowCount() == 1) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                if (password_verify($password, $user['password'])) {
                    $_SESSION['user'] = $user;
                    $_SESSION['success'] = "Login successful! Welcome, " . htmlspecialchars($user['First Name']) . ".";
                    header("Location: member.php");
                    exit;
                } else {
                    $_SESSION['error'] = "Incorrect password.";
                }
            } else {
                $_SESSION['error'] = "No user found with that email address.";
            }
        } else {
            $_SESSION['error'] = "Invalid email format.";
        }
    } else {
        $_SESSION['error'] = "All fields are required.";
    }
}
?>

<h2>Welcome to the Recipe Sharing Network</h2>
<p>Share and discover new recipes from around the world.</p>

<?php if (isset($_SESSION['success'])): ?>
    <p style="color: green;"><?php echo htmlspecialchars($_SESSION['success']); ?></p>
    <?php unset($_SESSION['success']); // Clear the success message after displaying ?>
<?php endif; ?>

<?php if (isset($_SESSION['error'])): ?>
    <p style="color: red;"><?php echo htmlspecialchars($_SESSION['error']); ?></p>
    <?php unset($_SESSION['error']); // Clear the error message after displaying ?>
<?php endif; ?>

<?php if (!isset($_SESSION['user'])): ?>
    <form method="POST" action="index.php" class="login-form">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <input type="submit" value="Login">
    </form>
<?php endif; ?>

<?php include 'templates/footer.php'; ?>
