<?php
  require_once('validateSession.php');


  if($_POST) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = authenticate($username, $password);

    if($user) {

      //introduces the user with username and password into the active session
      session_start();
      $_SESSION['user'] = $user;

      if ($user['role'] === 'admin') {
        header('Location: ../../pages/admin/categoryCRUD.php');
      } else {
        header('Location: ../../allUsers/myCover.php?id=' . $user['id'] . '');
      }
      
    } else {
      //if there is no user in the database with those credentials, an error message appears
      header('Location: ../../pages/allUsers/loginPage.php?error=El usuario o la clave son incorrectos');
    }
  }