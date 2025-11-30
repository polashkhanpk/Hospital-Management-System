<?php
session_start();
include 'Database/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['email'] = $user['email'];

        header("Location: dashboard.php");
        exit();
    } else {
        echo "<script>alert('Invalid email or password');</script>";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="lstyle.css">
</head>
<body>
    <div class="container">

        <div class="logo-container">
            <img src="Hospital Logo.png" alt="logo" class="logo">
        </div>

        <div class="login-form">
            <h2>Log In</h2>
            <form id="loginForm" action="login.php" method="POST">
                <input type="text" id="email" name="email" placeholder="Email">
                <input type="password" id="password" name="password" placeholder="Password">
                <button type="submit" class="button" name="login">Login</button>
            </form>

            
            <a href="Signin.php" class="button">Create New Account</a>
        </div>
    </div>

</body>
</html>
