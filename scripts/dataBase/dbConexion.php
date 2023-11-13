<?php

// Establishes the conexion with the database

function getConexion() {
  $conexion = new mysqli("localhost:3306", "root", "rootmySQL", "my_cover");
  if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
  }

  return $conexion;
}


function selectFromDB($sql) {
  $conexion = getConexion();

  $result = $conexion->query($sql);

  // Check if the query was successful
  if ($result === false) {
    die("Error in SQL query: " . $conexion->error);
  }

  $results = $result->fetch_array();

  $conexion->close();
  return $results;
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


