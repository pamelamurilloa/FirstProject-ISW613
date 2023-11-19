<?php

// Establishes the conexion with the database

function getConexion() {
  $conexion = new mysqli("localhost:3306", "root", "", "my_cover");
  if ($conexion->connect_error) {
    echo "Error de conexión: " . $conexion->connect_error;
  }

  return $conexion;
}


function selectFromDB($sql) {
  $conexion = getConexion();

  $result = $conexion->query($sql);

  // Check if the query was successful
  if ($result === false) {
    echo "Error in SQL query: " . $conexion->error;
    die();
  }

  $conexion->close();
  return $result;
}

function makeQueryOnly($sql) {
  $conexion = getConexion();

  $result = $conexion->query($sql);
  
  if ($result === false) {
    echo "Error in SQL query: " . $conexion->error;
    $conexion->close();
    return false;
  }
  
  $conexion->close();
  return true;
}


