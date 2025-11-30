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
