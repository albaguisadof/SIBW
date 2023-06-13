<?

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
    $id = $_POST['id'];
    $texto = $_POST['text'];

    if (!empty($id) && !empty($texto)) {
        $conexion->modificarComentario($id, $texto);
    }
    $comentario = $conexion->getComentario($id);
}

$id = (isset($_GET['id'])) ? $_GET['id'] : -1;
if($id != -1){
    $comentario = $conexion->getComentario($id);
}

$conexion->cerrarConexion();

echo $twig->render('modificarComentario.html', ['comentario' => $comentario, 'user' => $user]);

?>