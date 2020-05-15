<?php
$pageTitle = "New User Registration";
require 'inc/header.inc.php';
require_once 'inc/db_connect.inc.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $db->real_escape_string($_POST['username']);
    $email = $db->real_escape_string($_POST['email']);
    $first_name = $db->real_escape_string($_POST['first_name']);
    $last_name = $db->real_escape_string($_POST['last_name']);
    $password = hash('sha512', $db->real_escape_string($_POST['password']));

    $sql = "INSERT INTO gallery (username,email,first_name,last_name,password) 
                    VALUES('$username','$email','$first_name','$last_name','$password')";

    // echo $sql;
    $result = $db->query($sql);

    if (!$result) {
        echo "<div>There was a problem registering your account</div>";
    } else {
        // checking to see if folder exists. If not, make it
        if (!is_dir($username)) {
            mkdir($username);
        }
        header('location: login.php');
        echo "<div>You are now ready to go!</div>";
    }
}
?>

<!-- <h1>Register</h1>
<form action="register.php" method="POST">
    <label for="username">Username</label>
    <input type="text" id="username" required name="username">
    <br><br>
    <label for="email">Email</label>
    <input type="email" id="email" required name="email">
    <br><br>
    <label for="password">Password</label>
    <input type="password" id="password" required name="password">
    <br><br>
    <label for="first_name">First Name</label>
    <input type="text" id="first_name" required name="first_name">
    <br><br>
    <label for="last_name">Last Name</label>
    <input type="text" id="last_name" required name="last_name">
    <br><br>
    <input type="submit" value="Register">
</form> -->


<section id="cover" class="min-vh-100">
    <div id="cover-caption">
        <div class="container">
            <div class="row text-white">
                <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
                    <h1 class="display-4 py-2 text-truncate">Register</h1>
                    <div class="px-2">
                        <form action="register.php" method="POST" class="justify-content-center">
                            <div class="form-group">
                                <label for="username" class="sr-only">Username</label>
                                <input type="username" name="username" id="username" required class="form-control" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                            </div>

                            <div class="form-group">
                                <label for="first_name" class="sr-only">First Name</label>
                                <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name">
                            </div>
                            <div class="form-group">
                                <label for="last_name" class="sr-only">Last Name</label>
                                <input type="last_name" name="last_name" id="last_name" class="form-control" placeholder="Last Name">
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg" value="Login">Submit</button>
                            <br>
                            <br>
                            <p>Already a user? <a href="login.php">Login</a></p>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php require 'inc/footer.inc.php'; ?>