<?php

  session_start();

  header("Location: " . $_SERVER['HTTP_REFERER']);
 

  require_once "/usr/local/lib/php/vendor/autoload.php";
  require_once "bd.php";

  $conexion = Conexion::getInstance();

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_foto = $_POST['id_foto'];
    $conexion->eliminarFoto($id_foto);

  }

  $conexion->cerrarConexion();
  exit();

?>
