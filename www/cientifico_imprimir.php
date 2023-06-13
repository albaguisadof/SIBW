<?php
    require_once "/usr/local/lib/php/vendor/autoload.php";
    require_once "bd.php";

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    $scId = (isset($_GET['scid'])) ? $_GET['scid'] : -1;

    $conexion = Conexion::getInstance();

    $cientifico = $conexion->obtenerCientifico($scId);
    $fotos = $conexion->obtenerFotos($scId);

    $conexion->cerrarConexion();

    echo $twig->render('cientifico_imprimir.html', ['cientifico' => $cientifico, 'fotos' => $fotos]);
?>