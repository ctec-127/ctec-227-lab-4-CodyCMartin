<?php
// login.php
session_start();
$pageTitle = 'Login';
require 'inc/header.inc.php';
require_once 'inc/db_connect.inc.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $db->real_escape_string($_POST['username']);
    $password = hash('sha512', $db->real_escape_string($_POST['password']));

    $sql = "SELECT * FROM gallery WHERE username='$username' AND password='$password'";


    $result = $db->query($sql);
    if ($result->num_rows == 1) {

        $_SESSION['loggedin'] = 1;
        $_SESSION['username'] = $username;


        $row = $result->fetch_assoc();
        $_SESSION['first_name'] = $row['first_name'];

        header('location: gallery.php');
    } else {
        echo '<p>Incorrect combination please try again</p>';
    }
}

?>

<form action="login.php" method="POST">
    <label for="username">Username</label>
    <br><br>
    <input type="username" name="username" id="username" required>
    <br><br>
    <label for="password">Password</label>
    <span id="showPassword" onclick="showPassword();">Show Password</span>
    <br><br>
    <input type="password" name="password" id="password" required>
    <br><br>
    <input type="submit" value="Login">
</form>

<script src="js/script.js"></script>

<?php require 'inc/footer.inc.php'; ?>