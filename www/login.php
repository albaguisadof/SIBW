<?php
session_start();

require_once "/usr/local/lib/php/vendor/autoload.php";


$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader);



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $contraseña = $_POST['contraseña'];

    header("Location: index.php");

    require_once "bd.php";
    $conexion = Conexion::getInstance();

    if (!empty($nombre) && !empty($contraseña)) {
        if ($conexion->checkLogin($nombre, $contraseña)) {
            $_SESSION['nombreUsuario'] = $nombre;
            
        }
    }else{
        echo '<script>alert("Error: Es necesario rellenar todos los camps.");</script>';

    }

    $conexion->cerrarConexion();
   
    exit();
    
}




echo $twig->render('login.html', []);
?>
