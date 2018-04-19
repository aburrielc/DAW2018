<?php
require_once('BD.class.php');
require_once("funciones.php");

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
    
}else if($accion =="ordenarPeliculas"){
    
    $radio = $_POST['radio'];
    
    if($radio == 'titulo'){
        $resultado = BD::obtenerPeliculasOrdenadasTitulo();
    }else if ($radio == 'fecha'){
        $resultado = BD::obtenerPeliculasOrdenadasFecha();
    }else{
        $resultado = BD::obtenerPeliculasOrdenadasPuntuacion();
    }
}else if($accion == "enviarCorreo"){
    
    $emailOrigen = $_POST['email'];
    $nombreOrigen = $_POST['nombre'];
    $asunto = $_POST['asunto'];
    $cuerpo = $_POST['mensaje'];
    
    enviarMail($emailOrigen,$nombreOrigen,$asunto,$cuerpo);
	
}

?>