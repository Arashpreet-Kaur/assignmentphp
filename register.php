<?php
session_start();
include 'config/dbconfig.php';
include 'templates/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $stmt = $pdo->prepare('SELECT * FROM members WHERE email = ?');
    $stmt->execute([$email]);

    if ($stmt->rowCount() > 0) {
        $error = 'Email already exists.';
    } else {
        $stmt = $pdo->prepare('INSERT INTO members (`First Name`, `Last name`, email, password) VALUES (?, ?, ?, ?)');
        $stmt->execute([$firstname, $lastname, $email, $password]);

        $_SESSION['email'] = $email;
        $_SESSION['firstname'] = $firstname;
        header('Location: member.php');
        exit;
    }
}
?>

<h1>Register</h1>

<form method="POST" action="register.php">
    <label for="firstname">First Name:</label>
    <input type="text" id="firstname" name="firstname" required>
    <br>
    <label for="lastname">Last Name:</label>
    <input type="text" id="lastname" name="lastname" required>
    <br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <br>
    <button type="submit">Register</button>
</form>

<?php if (isset($error)): ?>
    <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
<?php endif; ?>

<?php include 'templates/footer.php'; ?>
