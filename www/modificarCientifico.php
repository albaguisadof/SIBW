<?php

session_start();

require_once "/usr/local/lib/php/vendor/autoload.php";
require_once "bd.php";

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader);

$user = null;

$conexion = Conexion::getInstance();

if (isset($_SESSION['nombreUsuario'])) {
    $user = $conexion->getUser($_SESSION['nombreUsuario']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int)$_POST['id'];
    $nombre = $_POST['nombre'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $fecha_muerte = $_POST['fecha_muerte'];
    $lugar_nacimiento = $_POST['lugar_nacimiento'];
    $lugar_muerte = $_POST['lugar_muerte'];
    $texto = $_POST['texto'];
    $link_wiki = $_POST['link_wiki'];
    $imagen = $_POST['imagen'];
    $hastag = $_POST['hastags'];
    $publicado = (int)$_POST['publicado'];


    if (!empty($id) && !empty($nombre) && !empty($fecha_nacimiento) && !empty($lugar_nacimiento) && !empty($texto) && !empty($link_wiki)) {
        $conexion->modificarCientifico($id, $nombre, $fecha_nacimiento, $fecha_muerte, $lugar_nacimiento,
        $lugar_muerte, $texto, $link_wiki, $imagen, $publicado);
    }

    $conexion->insertarHashtags($hastag, $id);

    $cientifico = $conexion->obtenerCientifico($id);
    $fotos = $conexion->obtenerFotos($id);
    $hastags = $conexion->obtenerHashtags($id);
}

$id = (isset($_GET['id'])) ? $_GET['id'] : -1;
if($id != -1){
    $cientifico = $conexion->obtenerCientifico($id);
    $fotos = $conexion->obtenerFotos($id);
    $hastags = $conexion->obtenerHashtags($id);
}

$conexion->cerrarConexion();

echo $twig->render('modificarCientifico.html', ['cientifico' => $cientifico, 'user' => $user, 'fotos' => $fotos, 'hastags' => $hastags]);

?>