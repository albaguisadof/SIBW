<?php

  session_start();

  require_once "/usr/local/lib/php/vendor/autoload.php";
  
  $loader = new \Twig\Loader\FilesystemLoader('templates');
  $twig = new \Twig\Environment($loader);

  require_once "bd.php";
  $conexion = Conexion::getInstance();

  if (isset($_SESSION['nombreUsuario'])) {
      $user = $conexion->getUser($_SESSION['nombreUsuario']);
  }

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $fecha_muerte = $_POST['fecha_muerte'];
    $lugar_nacimiento = $_POST['lugar_nacimiento'];
    $lugar_muerte = $_POST['lugar_muerte'];
    $texto = $_POST['texto'];
    $link_wiki = $_POST['link_wiki'];
    $hastag = $_POST['hastags'];
    $publicado = (int)$_POST['publicado'];
  
    $target_dir = "imgs/";
    $imagen_name = $_FILES['imagen']['name']; 
    $target_file = $target_dir . basename($imagen_name);
    
    if ($_FILES['imagen']['error'] == 0) {
        if (!file_exists($target_file)) {
            if (move_uploaded_file($_FILES['imagen']['tmp_name'], $target_file)) {
                $imagen = $target_file;
            } else {
                echo "Lo siento, hubo un error al cargar tu archivo.";
            }
        } else {
            echo "Lo siento, el archivo ya existe.";
        }
    } else {
        echo "Lo siento, hubo un error al cargar tu archivo.";
    }
    
  
    if (!empty($texto)) {
      $id = $conexion->nuevoCientifico($nombre, $fecha_nacimiento, $fecha_muerte, $lugar_nacimiento,
       $lugar_muerte, $texto, $link_wiki, $imagen, $publicado);
      $conexion->insertarHashtags($hastag, $id);
    }

    $imagenes = array();
    $numero_imagenes = count($_FILES['galeria']['name']);

    for($i=0; $i<$numero_imagenes; $i++) {
        if ($_FILES['galeria']['error'][$i] == 0) {
          $target_file = $target_dir . basename($_FILES['galeria']['name'][$i]);

            if (!file_exists($target_file)) {
                if (move_uploaded_file($_FILES['galeria']['tmp_name'][$i], $target_file)) {
                    $conexion->nuevaFoto($_FILES['galeria']['name'][$i],$target_file, $id); 
                } else {
                    echo "Lo siento, hubo un error al cargar tu archivo.";
                }
            } else {
                echo "Lo siento, el archivo ya existe.";
            }
        } else {
            echo "Lo siento, hubo un error al cargar tu archivo.";
        }
    }

    
  }


  $conexion->cerrarConexion();

  echo $twig->render('nuevoCientifico.html', ['user' => $user]);

?>
