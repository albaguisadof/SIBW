<?
  session_start();

  require_once "/usr/local/lib/php/vendor/autoload.php";

  $loader = new \Twig\Loader\FilesystemLoader('templates');
  $twig = new \Twig\Environment($loader);

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];
    $tipo = "registrado";

    header("Location: index.php");
    require_once "bd.php";
    $conexion = Conexion::getInstance();

    // Comprobar si el nombre de usuario ya existe
    if ($conexion->existeUsuario($nombre)) {
      echo '<script>alert("Error: El usuario con ese nombre ya existe, no se ha podido registrar.");</script>';
    }else{
      if (!empty($nombre) && !empty($contraseña) && !empty($correo)) {
        $conexion->registrarUsuario($nombre, $correo, $contraseña, $tipo);

        if ($conexion->checkLogin($nombre, $contraseña)) {
            $_SESSION['nombreUsuario'] = $nombre;
        }

        $conexion->cerrarConexion();
        exit();
      }else{
        echo '<script>alert("Error: Es necesario rellenar todos los campos.");</script>';

      }
    }     
  }

  echo $twig->render('registro.html', []);
?>