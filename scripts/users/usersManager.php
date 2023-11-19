<?php

$root = dirname(dirname(__FILE__));


require_once($root . '\dataBase\dbConexion.php');

// Registers an user in the database

function saveUser($user) {

    $firstName = $user['firstName'];
    $lastName = $user['lastName'];
    $username = $user['userName'];
    $password = $user['password'];
    // $passwordConfirm = $user['passwordConfirm'];
    $email = $user['email'];
    $cellphone = $user['cellphone'];

    // if ($passwordConfirm !== $password) {
    //     return 'faulty password';
    // }

    $password = hash('sha256', $password);
    $sql = "INSERT INTO users (firstname, lastname, password, username, email, cellphone, fk_role_id) VALUES('$firstName', '$lastName', '$password', '$username', '$email', '$cellphone', 2);";

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
    $passwordEncripted = hash('sha256', $password);

    $sql = "SELECT u.id, u.firstname, u.lastname, u.username, u.password, u.email, u.cellphone, r.name AS role FROM users AS u JOIN roles AS r ON r.id = u.fk_role_id WHERE username = '$username' AND password = '$passwordEncripted';";
    $result = selectFromDB($sql);
    $user = $result->fetch_assoc();

    return $user;
}


function getUserByID($id) {
    $sql = "SELECT * FROM users WHERE id = '$id';";
    $result = selectFromDB($sql);
    $user = $result->fetch_assoc();

    return $user;
}