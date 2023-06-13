<?php

  session_start();


  require_once "/usr/local/lib/php/vendor/autoload.php";
  

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id_cientifico'];

    header("Location: index.php");

    require_once "bd.php";
    $conexion = Conexion::getInstance();
    $conexion->eliminarCientifico($id);
    $conexion->cerrarConexion();

    exit();

  }

   

?>
