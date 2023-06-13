<?php
session_start();

require_once "/usr/local/lib/php/vendor/autoload.php";
require_once "bd.php";

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader);

$conexion = Conexion::getInstance();

$user = null;

if (isset($_SESSION['nombreUsuario'])) {
    $user = $conexion->getUser($_SESSION['nombreUsuario']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];
    $tipo = $_POST['tipo'];
    $nombreActual = $_POST['id'];

    // Verificar si el usuario a modificar es de tipo 'super'
    $usuarioActual = $conexion->getUser($nombreActual);
    if ($usuarioActual['tipo'] === 'super' && $tipo !== 'super') {
        $cantidadSuper = $conexion->obtenerUsuariosTipo('super');
        if ($cantidadSuper == 1) {
            echo '<script>alert("Error: No se puede cambiar el tipo de usuario, debe haber al menos un usuario de tipo \'super\'.");</script>';
        } else {
            if (!empty($nombre) && !empty($contraseña) && !empty($correo)) {
                $conexion->modificarUsuario($nombreActual, $nombre, $contraseña, $correo, $tipo);
            }
        }
    }
}

$usuarios = $conexion->obtenerTodosUsuarios();

$conexion->cerrarConexion();

echo $twig->render('listadoUsuarios.html', ['usuarios' => $usuarios, 'user' => $user]);
?>

