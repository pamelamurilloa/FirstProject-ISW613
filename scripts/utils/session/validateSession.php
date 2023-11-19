<?php

$root = dirname(dirname(__FILE__));


    require_once($root . '\..\users\usersManager.php');
    require_once($root . '\dataBase\dbConexion.php');


    function confirmLogin () {
        session_start();
        if ( empty($_SESSION['user']) ) {
            header("Location: http://".$_SERVER['HTTP_HOST']."/FinalProject-ISW613/scripts/utils/session/logout.php");
            exit();
        } else {
            $user = $_SESSION['user'];
            return $user;
        }
    }

    function authenticate($username, $password){
        $user = getUserByUsernamePassword($username, $password);
        return $user;
    }