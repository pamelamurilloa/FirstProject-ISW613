<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="../../style/all.css" type="text/css">
    <link rel="stylesheet" href="../../style/header.css" type="text/css">
    <link rel="stylesheet" href="../../style/footer.css" type="text/css">
    <link rel="stylesheet" href="../../style/body.css" type="text/css">

    <title>Login</title>
</head>
<body>
    <header id="header-container-index" class="sticky">
        <nav id="main-menu"  role="navigation" class="navbar">
            <h1><a class="navbar-brand" href="myCover.php">My Cover</a></h1>
        </nav>
    </header>

    <div class="main-content" id="login">
        <h2>User Login</h2>

        <form action="../../scripts/utils/session/login.php" method="POST" class="form-inline" role="form">
        <div class="form-group">
            <label class="label-form" for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Your username">
        </div>
        <div class="form-group">
            <label class="label-form" for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Your password">
        </div>

        <input type="submit" class="btn btn-primary" value="Login"></input>

        <div class="register-options">
            <p>Dont have an account? <a class="btn" href="registerPage.php">Sign Up Here</a></p>
        </div>
        
    </div>
    <footer class="footer-content">
        <h3>Pamela Murillo Anchia</h3>
        <h4>Universidad Tecnica Nacional</h4>
    </footer>
</body>
</html>