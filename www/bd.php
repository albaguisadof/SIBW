<?php
require_once "/usr/local/lib/php/vendor/autoload.php";
require_once "configuracion.php";

class Conexion {
  private static $intance = null;
  private $conexion;

  private function __construct() {
    $this->conexion = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if ($this->conexion->connect_errno) {
      echo ("Fallo al conectar: " . $this->conexion->connect_error);
    }
  }

  public static function getInstance() {
    if (self::$intance == null) {
      self::$intance = new Conexion();
    }

    return self::$intance;
  }

  public function getConexion() {
    return $this->conexion;
  }



  public function obtenerCientifico($scId) {

      $cientifico = array();
      $consulta = $this->conexion->prepare("SELECT * FROM cientificos WHERE id = ?");
      $consulta->bind_param("i", $scId);
      $consulta->execute();
      $resultado = $consulta->get_result();

      if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        $cientifico = $fila;
      }

      return $cientifico;

  }


  public function obtenerCientificos() {
    $cientificos = array();
    $stmt = $this->conexion->prepare("SELECT * FROM cientificos");
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
      while($fila = $resultado->fetch_assoc()) {
        $cientificos[] = $fila;
      }
    }

    return $cientificos;
}

public function obtenerComentarios($scId) {

      $comentarios = array();
      $stmt = $this->conexion->prepare("SELECT * FROM comentarios WHERE id_cientifico=?");
      $stmt->bind_param("i", $scId);
      $stmt->execute();
      $resultado = $stmt->get_result();

      if ($resultado->num_rows > 0) {
        while($fila = $resultado->fetch_assoc()) {
          $comentarios[] = $fila;
        }
      }

      return $comentarios;

}

public function obtenerFotos($scId) {

      $fotos = array();
      $stmt = $this->conexion->prepare("SELECT * FROM fotos WHERE id_cientifico=?");
      $stmt->bind_param("i", $scId);
      $stmt->execute();
      $resultado = $stmt->get_result();

      if ($resultado->num_rows > 0) {
        while($fila = $resultado->fetch_assoc()) {
          $fotos[] = $fila;
        }
      }

      return $fotos;


}

public function obtenerSitiosInteres($scId) {

      $sitios = array();
      $stmt = $this->conexion->prepare("SELECT * FROM sitiosInteres WHERE id_cientifico=?");
      $stmt->bind_param("i", $scId);
      $stmt->execute();
      $resultado = $stmt->get_result();

      if ($resultado->num_rows > 0) {
        while($fila = $resultado->fetch_assoc()) {
          $sitios[] = $fila;
        }
      }

      return $sitios;

}

public function obtenerProhibidas() {
  $prohibidas = array();
  $stmt = $this->conexion->prepare("SELECT palabra FROM prohibidas");
  $stmt->execute();
  $resultado = $stmt->get_result();

  if ($resultado->num_rows > 0) {
    while($fila = $resultado->fetch_assoc()) {
      $prohibidas[] = $fila['palabra'];
    }
  }

  return $prohibidas;
}


public function registrarUsuario($nombre, $correo, $contraseña, $tipo){

  $stmt = $this->conexion->prepare("INSERT INTO usuarios (nombre, correo, passwd , tipo) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $nombre, $correo, $contraseña, $tipo);
  $stmt->execute();

}

function checkLogin($nombre, $contraseña){
  $consulta = $this->conexion->prepare("SELECT * FROM usuarios WHERE nombre = ? AND passwd = ?");
  $consulta->bind_param("ss", $nombre, $contraseña);
  $consulta->execute();
  $resultado = $consulta->get_result();

  if ($resultado->num_rows > 0) {
    return true;
  } else {
    return false;
  }
}

public function getUser($nombre) {

    $usuario = array();
    $consulta = $this->conexion->prepare("SELECT * FROM usuarios WHERE nombre = ?");
    $consulta->bind_param("s", $nombre);
    $consulta->execute();
    $resultado = $consulta->get_result();

    if ($resultado->num_rows > 0) {
      $fila = $resultado->fetch_assoc();
      $usuario = $fila;
    }

    return $usuario;
  }


  public function modificarUsuario($nombreActual, $nombre, $contraseña, $correo, $tipo) {
    $stmt = $this->conexion->prepare("UPDATE usuarios SET nombre = ?, passwd = ?, correo = ? , tipo =? WHERE nombre = ?");
    $stmt->bind_param("sssss", $nombre, $contraseña, $correo,$tipo, $nombreActual);
    $stmt->execute();

}

public function eliminarComentario($comentarioID){
  $stmt = $this->conexion->prepare("DELETE FROM comentarios WHERE id = ?");
  $stmt->bind_param("i", $comentarioID);
  $stmt->execute();
}


public function modificarComentario($id, $texto) {
  $texto = $texto . " [Modificado por el moderador]";
  $stmt = $this->conexion->prepare("UPDATE comentarios SET comentario = ? WHERE id = ?");
  $stmt->bind_param("si", $texto, $id);
  $stmt->execute();
}

public function getComentario($id) {

  $comentario = array();
  $consulta = $this->conexion->prepare("SELECT * FROM comentarios WHERE id = ?");
  $consulta->bind_param("i", $id);
  $consulta->execute();
  $resultado = $consulta->get_result();

  if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();
    $comentario = $fila;
  }

  return $comentario;
}

public function obtenerTodosComentarios() {

  $comentarios = array();
  $stmt = $this->conexion->prepare("SELECT * FROM comentarios");
  $stmt->execute();
  $resultado = $stmt->get_result();

  if ($resultado->num_rows > 0) {
    while($fila = $resultado->fetch_assoc()) {
      $comentarios[] = $fila;
    }
  }

  return $comentarios;

}

public function nuevoComentario($texto, $nombre, $email, $hora, $fecha, $cientifico_id) {
  $stmt = $this->conexion->prepare("INSERT INTO comentarios (comentario, nombre, email, hora, fecha, id_cientifico) VALUES (?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("sssssi", $texto, $nombre, $email, $hora, $fecha, $cientifico_id);
  $stmt->execute();
}





public function modificarCientifico($id, $nombre, $fecha_nacimiento, $fecha_muerte, $lugar_nacimiento, $lugar_muerte, $texto, $link_wiki, $imagen, $publicado) {
  $stmt = $this->conexion->prepare("UPDATE cientificos SET nombre=?, fecha_nacimiento=?, fecha_muerte=?, lugar_nacimiento=?, lugar_muerte=?, texto=?, link_wiki=?, imagen=?, publicado=? WHERE id=?");
  $stmt->bind_param("ssssssssii", $nombre, $fecha_nacimiento, $fecha_muerte, $lugar_nacimiento, $lugar_muerte, $texto, $link_wiki, $imagen, $publicado, $id);
  $stmt->execute();
  $stmt->close();
}



public function nuevoCientifico($nombre, $fecha_nacimiento, $fecha_muerte, $lugar_nacimiento,
$lugar_muerte, $texto, $link_wiki, $imagen, $publicado) {
  $stmt = $this->conexion->prepare("INSERT INTO cientificos (nombre, fecha_nacimiento, fecha_muerte, lugar_nacimiento,
  lugar_muerte, texto, link_wiki, imagen, publicado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssssssssi", $nombre, $fecha_nacimiento, $fecha_muerte, $lugar_nacimiento,
  $lugar_muerte, $texto, $link_wiki, $imagen, $publicado);
  $stmt->execute();

  $cientificoId = $this->conexion->insert_id;
  return $cientificoId;
}

function eliminarComentariosCientifico($cientificoId) {
  $stmt = $this->conexion->prepare("DELETE FROM comentarios WHERE id_cientifico = ?");
  $stmt->bind_param("i", $cientificoId);
  $stmt->execute();
}

function eliminarFotosCientifico($cientificoId) {
  $stmt = $this->conexion->prepare("DELETE FROM fotos WHERE id_cientifico = ?");
  $stmt->bind_param("i", $cientificoId);
  $stmt->execute();
}

function eliminarSitiosInteresCientifico($cientificoId) {
  $stmt = $this->conexion->prepare("DELETE FROM sitiosInteres WHERE id_cientifico = ?");
  $stmt->bind_param("i", $cientificoId);
  $stmt->execute();
}

function eliminarHastagsCientifico($cientificoId) {
  $stmt = $this->conexion->prepare("DELETE FROM hastags WHERE id_cientifico = ?");
  $stmt->bind_param("i", $cientificoId);
  $stmt->execute();
}

public function eliminarCientifico($id){
  $this->eliminarHastagsCientifico($id);
  $this->eliminarComentariosCientifico($id);
  $this->eliminarFotosCientifico($id);
  $this->eliminarSitiosInteresCientifico($id);

  $stmt = $this->conexion->prepare("DELETE FROM cientificos WHERE id = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
}

function eliminarFotos($id) {
  $stmt = $this->conexion->prepare("DELETE FROM fotos WHERE id = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
}

function nuevaFoto($imagenNombre, $imagenRutaTemp, $id_cientifico) {
  $stmt = $this->conexion->prepare("INSERT INTO fotos (nombre, ruta, id_cientifico) VALUES (?,?,?)");
  $stmt->bind_param("ssi", $imagenNombre, $imagenRutaTemp, $id_cientifico);
  $stmt->execute();
}

public function obtenerTodosUsuarios() {

  $usuarios = array();
  $stmt = $this->conexion->prepare("SELECT * FROM usuarios");
  $stmt->execute();
  $resultado = $stmt->get_result();

  if ($resultado->num_rows > 0) {
    while($fila = $resultado->fetch_assoc()) {
      $usuarios[] = $fila;
    }
  }

  return $usuarios;

}

public function obtenerUsuariosTipo($tipo){
  $stmt = $this->conexion->prepare("SELECT COUNT(*) AS total FROM usuarios WHERE tipo = ?");
  $stmt->bind_param("s", $tipo);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();
  $total = $row['total'];
  return $total;
}

public function existeUsuario($nombreUsuario) {
  $stmt = $this->conexion->prepare("SELECT * FROM usuarios WHERE nombre = ?");
  $stmt->bind_param("s", $nombreUsuario);
  $stmt->execute();
  $stmt->store_result();
  $numRows = $stmt->num_rows;
  return $numRows > 0;
}

public function obtenerHashtags($id) {
  $stmt = $this->conexion->prepare("SELECT hastag FROM hastags WHERE id_cientifico = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $result = $stmt->get_result();

  $hashtags = [];

  while ($row = $result->fetch_assoc()) {
      $hashtags[] = $row['hastag'];
  }

  $stmt->close();

  $hashtagsString= "";

  $hashtagsString = implode(", ", $hashtags);

  return $hashtagsString;
}

public function insertarHashtags($hashtagsString, $id) {
  $this->eliminarHastagsCientifico($id);

  $hashtagsArray = explode(",", $hashtagsString);
  $hashtagsArray = array_map('trim', $hashtagsArray);
  $hashtagsArray = array_filter($hashtagsArray);

  
  foreach ($hashtagsArray as $hashtag) {
      $stmt = $this->conexion->prepare("INSERT INTO hastags (hastag, id_cientifico) VALUES (?,?)");
      $stmt->bind_param("si", $hashtag, $id);
      $stmt->execute();
      $stmt->close();
  }
}




public function cerrarConexion() {
  $this->getConexion()->close();
  }
}

?>

