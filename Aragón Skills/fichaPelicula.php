<!DOCTYPE html>
<html>
<?php
    require_once('includes/BD.class.php');
    require_once('includes/Pelicula.class.php');
?>
    
<?php
    
    if (isset($_GET['id_pelicula'])){
        $id_pelicula = $_GET['id_pelicula']; //Recogemos el ID de la película a consultar.
        $_SESSION['pelicula'] = $id_pelicula; //Le asginamos a la Sesion el ID de la película a consultar.
    }

    //Guardamos la película consultada por si el Usuario quiere volver. 
    if (isset($_POST['id_pelicula'])){
        $id_pelicula = $_POST['id_pelicula']; //Recogemos el ID de la película a consultar.
        $_SESSION['pelicula'] = $id_pelicula; //Le asginamos a la Sesion el ID de la película a consultar.
    }else{
        $id_pelicula = $_SESSION['pelicula'];//Sino se ha enviado la informacion de la película recogemos la guardada en la sesión.
    }
    
	$resultadoBD  = BD::obtenerPelicula($id_pelicula);
    
    $pelicula = null;
	$pelicula = new Pelicula($resultadoBD[0]['id_pelicula'], $resultadoBD[0]['imagen'], $resultadoBD[0]['link'], $resultadoBD[0]['titulo'], $resultadoBD[0]['posicion'], $resultadoBD[0]['rating'], $resultadoBD[0]['reparto'], $resultadoBD[0]['voto'], $resultadoBD[0]['anno']);
    
?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- CSS -->
    <link rel="stylesheet" href="css/mainstyle.css">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    
    <!-- Fuentes -->
    <link href="https://fonts.googleapis.com/css?family=Berkshire+Swash|Roboto:400,700" rel="stylesheet">
    
    <!-- jQuery -->
    <script src="libs/jquery-3.1.1.min.js"></script>
    
    <title>Ficha - <?php print_r($pelicula->getTitulo()); ?></title>
</head>
<body>
    
    <div id="wrapper">
        <div id="header">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <h1 class="navbar-brand">Aragón Skills</h1>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    
                    <!-- Menú de navegación -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Inicio</a> 
                        </li>
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Películas
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#" target="_blank">En el cine</a>
                                <a class="dropdown-item" href="#" target="_blank">Próximos estrenos</a>
                                <a class="dropdown-item" href="#" target="_blank">Películas mejor valoradas</a>
                            </div>
                        </li>
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Eventos y noticias
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#" target="_blank">Noticias de cine</a>
                                <a class="dropdown-item" href="#" target="_blank">Noticias de TV</a>
                                <a class="dropdown-item" href="#" target="_blank">Noticias de famosos</a>
                                <a class="dropdown-item" href="#" target="_blank">Encuestas</a>
                            </div>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contactar</a> 
                        </li>
                    </ul>
                    
                </div>
            </nav>
        </div>
        
        <!-- Breadcrumb -->
        <div id="migas">
            <nav aria-label="breadcrumb navbar">
                <ul class="breadcrumb m-3">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="#">Películas</a></li>
                    <li class="breadcrumb-item active">Ficha</li>
                </ul>
            </nav>
        </div>
        
        <div id="content">
            <h2><?php print_r($pelicula->getTitulo()); ?></h2>
            <div class="container">
                <form id="formFichaPelicula" class="row" action="javascript:void(0)" method="post">
                    <div class="col-12 col-md-6 col-lg-4 text-center mb-4">
                        <img class="img-fluid rounded" src="<?php print_r($pelicula->getImagen()); ?>" alt="<?php print_r($pelicula->getTitulo()); ?>">  
                    </div>
                    <div class="form-group col-12 col-md-6 col-lg-8">
                        <label for="inputPosRanking">Posición Ranking</label>
                        <input type="number" class="form-control" id="inputPosRanking" placeholder="<?php print_r($pelicula->getPosicion()); ?>">
                        <label for="inputPuntuacion">Puntuación</label>
                        <input type="number" class="form-control" id="inputPuntuacion" placeholder="<?php print_r($pelicula->getRating()); ?>">
                        <label for="inputAnno">Año</label>
                        <input type="number" class="form-control" id="inputAnno" placeholder="<?php print_r($pelicula->getAnno()); ?>">
                        <label for="textReparto">Reparto</label>
                        <textarea class="form-control" rows="5" id="textReparto"><?php print_r($pelicula->getReparto()); ?></textarea>
                        <button type="button" class="btn btn-primary ml-2 my-4" onclick="window.location.href='https://www.imdb.com/<?php print_r($pelicula->getLinkPagina()); ?>'">Ver ficha en IMDB</button>
                        <button type="submit" class="btn btn-primary ml-2 my-4" onclick="actualizarPelicula(<?php print_r($pelicula->getIdPelicula()); ?>)">Actualizar</button>
                        <button type="submit" class="btn btn-primary ml-2 my-4" onclick="compruebaBorrado()">Borrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script>
        
        function compruebaBorrado(){
            var borrar = confirm("¿Desea usted borrar la ficha de la película?");
            if (borrar) {
                formFichaPelicula.action="includes/procesar.php?accion=borrarPelicula&id=<?php print_r($pelicula->getIdPelicula()); ?>";
            }
        }
        /*
        $(document).ready(function(){
            $('#addJugador').submit(function(){
                var equipo = $('#equipo').val();
                var nombre = $('#nombre').val();

                $.ajax({
                    url:"procesarAjax.php",
                    method:"POST",
                    data:{accion:"addJugador",equipo:equipo,nombre:nombre},
                    cache:"false",
                    beforeSend:function(){

                    },
                    success:function(data){

                        $('#jugadoresEquipo').append(data);
                    }
                });

            });
        });	
        */
    
    </script>
    
    <!-- Optional JavaScript -->
    <script src="js/funciones.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
</body>
</html>