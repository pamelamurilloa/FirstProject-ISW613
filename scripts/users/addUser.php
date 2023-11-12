<?php

include_once('usersManager.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user['firstName'] = $_POST["firstName"];
    $user['lastName'] = $_POST['lastName'];
    $user['password'] = $_POST['password'];
    $user['passwordConfirm'] = $_POST['passwordConfirm'];
    $user['userName'] = $_POST['userName'];
    $user['email'] = $_POST['email'];
    $user['cellphone'] = $_POST['cellphone'];

  if ($saveUser($user)) {
    header("Location: ../../pages/allUsers/loginPage.php");
  } else {
    header("Location: ../../pages/allUsers/registerPage.php?error=unable-to-register");
  }

}