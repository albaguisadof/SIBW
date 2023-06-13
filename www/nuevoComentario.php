<?php

  session_start();

  require_once "/usr/local/lib/php/vendor/autoload.php";
  
  $loader = new \Twig\Loader\FilesystemLoader('templates');
  $twig = new \Twig\Environment($loader);



  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $texto = $_POST['texto'];
    $hora = date('H:i:s');
    $fecha = date('Y-m-d');
    $cientifico_id = $_POST['id'];

    header("Location: " . $_SERVER['HTTP_REFERER']);

    require_once "bd.php";
    $conexion = Conexion::getInstance();


    if (isset($_SESSION['nombreUsuario'])) {
        $user = $conexion->getUser($_SESSION['nombreUsuario']);
    }

    $nombre = $user['nombre'];
    $email = $user['correo'];

    if (!empty($texto)) {
      $conexion->nuevoComentario($texto, $nombre, $email, $hora, $fecha, $cientifico_id);
    }else{
        echo '<script>alert("Error: Es necesario rellenar el campo.");</script>';

    }


  $conexion->cerrarConexion();
  }

 
  exit();

?>
