<?php
// contact.php
include 'templates/header.php';
?>

<h1>Contact Us</h1>

<form>
    <label for="fullname">Full Name:</label>
    <input type="text" id="fullname" name="fullname" required>
    <br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <br>
    <label for="message">Message:</label>
    <textarea id="message" name="message" required></textarea>
    <br>
    <button type="submit">Submit</button>
</form>

<?php include 'templates/footer.php'; ?>
