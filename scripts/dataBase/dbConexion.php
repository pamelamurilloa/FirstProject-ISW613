<?php

// Establishes the conexion with the database

function getConexion() {
  $conexion = new mysqli("localhost:3306", "root", "rootmySQL", "php_crud");
  if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
  }

  return $conexion;
}

function getUserByUsernamePassword($username, $password) {
    $conexion = getConexion();
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password';";
    $result = $conexion->query($sql);
  
    if ($conexion->connect_errno) {
      $conexion->close();
      return false;
    }
    $results = $result->fetch_array();
    $conexion->close();
    return $results;
  }