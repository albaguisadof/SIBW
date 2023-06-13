<?php

    require_once "bd.php";
    $conexion = Conexion::getInstance();
    $cientificos = $conexion->obtenerCientificos();
    

    if (array_key_exists("textBuscar", $_GET)) {
        $textoBusqueda = $_GET["textBuscar"];
    } else if (array_key_exists("textBuscar", $_POST)) {
        $textoBusqueda = $_POST["textBuscar"];
    }else{
        $textoBusqueda="";
    }

    $resultados = array();
    $hastags = array();

    foreach ($cientificos as $cientifico) {
        $hastag = $conexion->obtenerHashtags($cientifico['id']);
        if (stripos($cientifico['nombre'], $textoBusqueda) !== false) {
                $resultados[] = $cientifico;
                $hastags[] = $hastag;
        }else if (stripos($hastag, $textoBusqueda) !== false) {
            $resultados[] = $cientifico;
            $hastags[] = $hastag;
    }
    }
    $conexion->cerrarConexion();
    

    echo json_encode(['resultados' => $resultados, 'hastags' => $hastags]);

?>
