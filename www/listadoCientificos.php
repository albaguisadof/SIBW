<?php
    session_start();


    require_once "/usr/local/lib/php/vendor/autoload.php";
    require_once "bd.php";

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    $conexion = Conexion::getInstance();

    $user=null;

  if (isset($_SESSION['nombreUsuario'])) {
      $user = $conexion->getUser($_SESSION['nombreUsuario']);
  }


    $cientificos = $conexion->obtenerCientificos();

    $conexion->cerrarConexion();



    echo $twig->render('listadoCientificos.html', ['cientificos' => $cientificos, 'user' => $user]);

?>

