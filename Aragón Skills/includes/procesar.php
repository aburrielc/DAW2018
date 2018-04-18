<?php
require_once('BD.class.php');

$accion=$_GET["accion"];

//Borramos película.
if ($accion == "borrarPelicula"){
	
	$id_pelicula=$_GET["id"];
    
    $resultado= BD::eliminarPelicula($id_pelicula);
    
    if($resultado != 0){
        $respuesta ="borrado";
    }
    
    header("Location: ../index.php?respuesta=".$respuesta);
    
}else if($accion =="actualizarPelicula"){
    
    if(isset($_POST["id_pelicula"])){
        $id_pelicula = $_POST["id_pelicula"];
        $posicion = $_POST["posicion"];
        $puntuacion = $_POST["puntuacion"];
        $anno = $_POST["anno"];
        $reparto = $_POST["reparto"];
    }
    
    $resultado = BD::actulizarPelicula($id_pelicula, $posicion, $puntuacion, $anno, $reparto);
}

?>