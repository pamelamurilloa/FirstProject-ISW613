<?php
    require_once('../../scripts/utils/session/validateSession.php');

    confirmLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <header>
        <h1>My news Cover</h1>
    </header>
    <div class="user-form">
        <h1>User Login</h1>

        <form action="../utils/session/login.php" method="POST" class="form-inline" role="form">
        <div class="form-group">
            <label class="label-form" for="username">Username</label>
            <input type="text" class="form-control" name="username" placeholder="Your username">
        </div>
        <div class="form-group">
            <label class="label-form" for="password">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Your password">
        </div>

        <input type="submit" class="btn btn-primary" value="Login"></input>

        <div class="register-options">
            <p>Dont have an account? <a class="btn" href="registerPage.php">Sign Up Here</a></p>
        </div>
        
    </div>
    <footer>
        <h2>Pamela Murillo Anchia</h2>
        <h3>Universidad Tecnica Nacional</h3>
    </footer>
</body>
</html>