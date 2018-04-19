<!DOCTYPE html>
<html>
<?php
    require_once('includes/BD.class.php');
?>
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- CSS -->
    <link rel="stylesheet" href="css/mainstyle.css">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    
    <!-- Fuentes -->
    <link href="https://fonts.googleapis.com/css?family=Berkshire+Swash|Roboto:400,700" rel="stylesheet">
    
    <!-- Iconos -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    
    <!-- jQuery -->
    <script src="libs/jquery-3.1.1.min.js"></script>
    
    <title>Lista de películas</title>
</head>
<body>
    
    <?php
        //BD::obtenerDatosJSON();
    ?>
    
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
                            <a class="nav-link" href="contacto.php">Contactar</a>  
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
                    <li class="breadcrumb-item active">Películas mejor valoradas</li>
                </ul>
            </nav>
        </div>
        
        <div id="content">
            <h2>Películas mejor valoradas</h2>
            
            <div id="carouselPeliculas" class="carousel slide mx-auto" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                      <img class="d-block img-fluid m-auto" src="https://ia.media-imdb.com/images/M/MV5BM2RjMmU3ZWItYzBlMy00ZmJkLWE5YzgtNTVkODdhOWM3NGZhXkEyXkFqcGdeQXVyNDA5Mjg5MjA@._V1_UX182_CR0,0,182,268_AL_.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid m-auto" src="https://ia.media-imdb.com/images/M/MV5BM2RjMmU3ZWItYzBlMy00ZmJkLWE5YzgtNTVkODdhOWM3NGZhXkEyXkFqcGdeQXVyNDA5Mjg5MjA@._V1_UX182_CR0,0,182,268_AL_.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid m-auto" src="https://ia.media-imdb.com/images/M/MV5BM2RjMmU3ZWItYzBlMy00ZmJkLWE5YzgtNTVkODdhOWM3NGZhXkEyXkFqcGdeQXVyNDA5Mjg5MjA@._V1_UX182_CR0,0,182,268_AL_.jpg" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselPeliculas" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Anterior</span>
                </a>
                <a class="carousel-control-next" href="#carouselPeliculas" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Siguiente</span>
                </a>
            </div>
            
            <div id="busqueda">
                <!-- Búsqueda -->
                <form class="form-inline ml-5 mb-3">
                    <div class="input-group" id="adv-search">
                        <input type="text" class="form-control" placeholder="Busca películas">
                        <div class="input-group-btn">
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-primary p-0"><span class="fas fa-search" aria-hidden="true"></span></button>
                            </div>
                        </div>
                    </div>
                    <br>
                </form>
                
                <form class="ml-5 mb-4">
                    <span>Ordenar por:</span>
                    <label class="radio-inline ml-2"><input type="radio" name="optradio" value="titulo" onchange="ordenarPeliculas()">Título</label>
                    <label class="radio-inline ml-2"><input type="radio" name="optradio" value="fecha" onchange="ordenarPeliculas()">Fecha de estreno</label>
                    <label class="radio-inline ml-2"><input type="radio" name="optradio" value="puntuacion" onchange="ordenarPeliculas()" checked>Puntuación</label>
                </form>
            </div>
            
            <div class="container">
                <form class="row" action="fichaPelicula.php" method="post">
                    <!-- Generamos la lista de películas -->
                    <?php 
                        //$resultadoPeliculas = BD::obtenerPeliculas();
                        $resultadoPeliculas = BD::obtenerPeliculasOrdenadasPuntuacion();
                        $arrayProblemas = null;
                        for ($i = 0; $i < sizeof($resultadoPeliculas); $i++){
                            echo '<div class="col-12 col-lg-4 col-md-6">';
                            echo '<div class="card mb-4">';
                            echo '<h3 class="card-header text-uppercase">'.$resultadoPeliculas[$i]['titulo'].'</h3>';
                            echo '<img class="card-img-top img-fluid rounded" src="'.$resultadoPeliculas[$i]['imagen'].'" alt="'.$resultadoPeliculas[$i]['titulo'].'">';
                            echo '<p class="card-footer mb-0">Año: '.$resultadoPeliculas[$i]['anno'].' <br> Puntuación: '.$resultadoPeliculas[$i]['rating'].'</p>';
                            echo '<button type="submit" class="cardPelicula col-12 col-lg-4 col-md-6 m-auto" name="id_pelicula" value="'.$resultadoPeliculas[$i]['id_pelicula'].'">Ver ficha</button>';
                            echo '</div>';
                            echo '</div>';
                        }
                    ?>
                    
                </form>
            </div>     
        </div>
    </div>
    
    <!-- Optional JavaScript -->
    <script src="js/funciones.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    
    
    <script>
        var respuestaBorrado = getParameterByName('respuesta');
        
        if(respuestaBorrado == 'borrado'){
           alert('La película ha sido eliminada con éxito.');
        }
    </script>
</body>
</html>