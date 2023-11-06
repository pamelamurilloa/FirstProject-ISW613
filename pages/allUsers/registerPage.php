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
  <div class="user-form">
    <h1>User Registration</h1>

    <form method="post" action="../signup.php">

      <div class="form-group">
        <label for="first-name">First Name</label>
        <input id="first-name" class="form-control" type="text" name="firstName">
      </div>

      <div class="form-group">
        <label for="last-name">Last Name</label>
        <input id="last-name" class="form-control" type="text" name="lastName">
      </div>

      <div class="form-group">
        <label for="user-name">Username</label>
        <input id="user-name" class="form-control" type="text" name="userName">
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input id="password" class="form-control" type="password" name="password">
      </div>

      <div class="form-group">
        <label for="passworConfirm">Confirm Password</label>
        <input id="passworConfirm" class="form-control" type="password" name="passworConfirm">
      </div>

      <div class="form-group">
        <label for="email">Email Address</label>
        <input id="email" class="form-control" type="email" name="email">
      </div>

      <div class="form-group">
        <label for="cellphone">Cellphone Number</label>
        <input id="cellphone" class="form-control" type="text" name="cellphone">
      </div>

      <div class="form-group">
        <label for="country">Country</label>
        <select id="country" class="form-control" name="country">
          <?php
          foreach($countries as $id => $country) {
            echo "<option value=\"$id\">$country</option>";
          }
          ?>
        </select>
      </div>

      <div class="register-options">
        <button type="submit" class="btn btn-primary">Register</button>
        <a class="btn" href="loginPage.php">Return to Login</a>
      </div>
    </form>
  </div>
</body>
</html>