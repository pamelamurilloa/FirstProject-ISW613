<?php

require_once('../dataBase/dbConexion.php');

function confirmLogin (){
    session_start();
    if ( empty($_SESSION['user']) ) {
        header("Location: logout.php");
        exit();
    } else {
        $user = $_SESSION['user'];
        return $user['role'];
    }
}

function authenticate($username, $password){
    $user = getUserByUsernamePassword($username, $password);
    
    return $user;
  }