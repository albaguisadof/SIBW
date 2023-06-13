<?php

  session_start();

  require_once "/usr/local/lib/php/vendor/autoload.php";
  

  $loader = new \Twig\Loader\FilesystemLoader('templates');
  $twig = new \Twig\Environment($loader);

  require_once "bd.php";
  $conexion = Conexion::getInstance();

  $user=null;

  if (isset($_SESSION['nombreUsuario'])) {
      $user = $conexion->getUser($_SESSION['nombreUsuario']);
  }


  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];
    $tipo = "registrado";

    $nombreActual = $_SESSION['nombreUsuario'];

    
    if(!empty($nombre)&& !empty($contraseña)&& !empty($correo)){
      $conexion->modificarUsuario($nombreActual, $nombre,$contraseña,$correo, $tipo);
      $_SESSION['nombreUsuario'] = $nombre;
      $user = $conexion->getUser($nombre);
    }else{
        echo '<script>alert("Error: Rellene todos los campos");</script>';

    }
  }

  $conexion->cerrarConexion();
 

  echo $twig->render('gestionUsuario.html', ['user' => $user]);
?>
