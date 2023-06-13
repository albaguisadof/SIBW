<?php
    session_start();

    require_once "/usr/local/lib/php/vendor/autoload.php";
    require_once "bd.php";

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);


    $scId = (isset($_GET['scid'])) ? $_GET['scid'] : -1;


    $conexion = Conexion::getInstance();

    $cientifico = $conexion->obtenerCientifico($scId);
    $comentarios = $conexion->obtenerComentarios($scId);
    $fotos = $conexion->obtenerFotos($scId);
    $sitiosInteres = $conexion->obtenerSitiosInteres($scId);
    $prohibidas = $conexion->obtenerProhibidas();
    $prohibidas = json_encode($prohibidas);
    $hastags = $conexion->obtenerHashtags($scId);

    $user=null;

    if (isset($_SESSION['nombreUsuario'])) {
        $user = $conexion->getUser($_SESSION['nombreUsuario']);
    }

    $conexion->cerrarConexion();

    echo $twig->render('cientifico.html', ['cientifico' => $cientifico, 'comentarios' => $comentarios, 'fotos' => $fotos, 'sitiosInteres'=> $sitiosInteres, 
    'prohibidas' => $prohibidas, 'user' => $user, 'hastags' => $hastags]);

?>

