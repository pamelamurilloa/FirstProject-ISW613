<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
  <header>
      <h1>My news Cover</h1>
  </header>
  <div class="main-content">
    <h1>User Registration</h1>

    <form method="post" action="../../scripts/users/addUser.php">

      <div class="form-group">
        <label for="first-name">First Name</label>
        <input id="first-name" class="form-control" type="text" name="firstName">
      </div>

      <div class="form-group">
        <label for="last-name">Last Name</label>
        <input id="last-name" class="form-control" type="text" name="lastName" required>
      </div>

      <div class="form-group">
        <label for="user-name">Username</label>
        <input id="user-name" class="form-control" type="text" name="userName" required>
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input id="password" class="form-control" type="password" name="password" required>
      </div>

      <!-- <div class="form-group">
        <label for="passwordConfirm">Confirm Password</label>
        <input id="passwordConfirm" class="form-control" type="password" name="passwordConfirm" required>
      </div> -->

      <div class="form-group">
        <label for="email">Email Address</label>
        <input id="email" class="form-control" type="email" name="email" required>
      </div>

      <div class="form-group">
        <label for="cellphone">Cellphone Number</label>
        <input id="cellphone" class="form-control" type="tel" pattern="[0-9]{8}" name="cellphone" placeholder="8 digit phone number" required >
      </div>

      <div class="register-options">
        <button type="submit" class="btn btn-primary">Register</button>
        <a class="btn" href="loginPage.php">Return to Login</a>
      </div>
    </form>
  </div>

  <footer class="footer-content">
        <h2>Pamela Murillo Anchia</h2>
        <h3>Universidad Tecnica Nacional</h3>
    </footer>
</body>
</html>