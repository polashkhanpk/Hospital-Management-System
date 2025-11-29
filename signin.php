<?php
    include("Database/connection.php");

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $sql = "INSERT INTO user (first_name, last_name, email, role, password) VALUES ('$firstName', '$lastName', '$email', '$role', '$password')";

    $run = mysqli_query($conn, $sql);

    if(!$run){
        echo "<script>alert('Error: Failed to create account');</script>";
    } else{
        "<script>alert('Account Created Successfully'); window.location='login.php';</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="lstyle.css">
</head>
<body>
    <div class="container">
        <div class="logo-container">
            <img src="Hospital Logo.png" alt="Hospital Logo" class="logo">
        </div>

        <div class="signup-form">
            <h2>Create a New Account</h2>
            <p>It's quick and easy.</p>

            <form id="signupForm" method="POST" action="Signin.php">

                <div class="name-fields">
                    <input type="text" name="firstName" placeholder="First name" required>
                    <input type="text" name="lastName" placeholder="Last name" required>
                </div>

                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>

                <label>Role</label>
                <div class="gender-options">
                    <label><input type="radio" name="role" value="Admin" required> Admin</label>
                    <label><input type="radio" name="role" value="Doctor"> Doctor</label>
                    <label><input type="radio" name="role" value="Laboratorist"> Laboratorist</label>
                    <label><input type="radio" name="role" value="Receptionist"> Receptionist</label>
                </div>

                <button type="submit" class="button">Sign Up</button>
                
                <a href="login.php" style="text-decoration: none; color:blue;">Already have an account?</a>
                

            </form>
        </div>
    </div>
</body>
</html>
