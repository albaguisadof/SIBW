<?php
    session_start();

    require_once "/usr/local/lib/php/vendor/autoload.php";
    require_once "bd.php";

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    $conexion = Conexion::getInstance();

    $cientificos = $conexion->obtenerCientificos(); 
    $sitiosInteres = $conexion->obtenerSitiosInteres(1);

    $user=null;

    if (isset($_SESSION['nombreUsuario'])) {
        $user = $conexion->getUser($_SESSION['nombreUsuario']);
    }

    $conexion->cerrarConexion();

    echo $twig->render('portada.html', ['cientificos' => $cientificos, 'sitiosInteres' => $sitiosInteres, 'user' => $user]);

?>