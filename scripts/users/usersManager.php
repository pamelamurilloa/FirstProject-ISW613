<?php

require_once("../dataBase/dbConexion.php");

// Registers an user in the database

function saveUser($user){

    $firstName = $user['firstName'];
    $lastName = $user['lastName'];
    $username = $user['userName'];
    $password = $user['password'];
    $passwordConfirm = $user['passwordConfirm'];
    $email = $user['email'];
    $cellphone = $user['cellphone'];

    if ($passwordConfirm !== $password) {
        return 'faulty password';
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (firstname, lastname, password, username, email, cellphone) VALUES('$firstName', '$lastName', '$password', '$username', '$email', '$cellphone');";

    return makeQueryOnly($sql);
}

// Updates an user in the database

function updateUser($user){

    $userID = $user['id'];
    $firstName = $user['firstName'];
    $lastName = $user['lastName'];
    $username = $user['userName'];
    $password = $user['password'];
    $email = $user['email'];
    $cellphone = $user['cellphone'];

    $sql = "UPDATE users SET firstname = '$firstName', lastname = '$lastName', password = '$password', username = '$username', email = '$email', cellphone = '$cellphone' WHERE id = $userID";

    return makeQueryOnly($sql);
}


// Deletes an user from the database

function deleteUser($id){
    $sql = "DELETE FROM users WHERE id = $id";
    return makeQueryOnly($sql);
}

// This will confirm if an user exists, and returns it if it does

function getUserByUsernamePassword($username, $password) {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password';";
    return selectFromDB($sql);
}

function getUserByID($id) {
    $sql = "SELECT * FROM users WHERE id = '$id';";
    return selectFromDB($sql);
}