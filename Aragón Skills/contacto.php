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
    <link rel="stylesheet" href="css/estilos_contacto.css">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    
    <!-- Fuentes -->
    <link href="https://fonts.googleapis.com/css?family=Berkshire+Swash|Roboto:400,700" rel="stylesheet">
    
    <!-- Iconos -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    
    <!-- jQuery -->
    <script src="libs/jquery-3.1.1.min.js"></script>
    
    <title>Contacto</title>
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
                    <li class="breadcrumb-item active">Contactar</li>
                </ul>
            </nav>
        </div>
        
        <div id="content">
            <div id="contenedor_contacto">
                <h1><i class="fa fa-envelope-o" aria-hidden="true"></i>Contacto</h1>
                <!-- <hr> -->
                <form id="contacto" action="javascript:void(0)" method="post">
                    <div class="input_contacto">
                        <label for="nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" placeholder="Nombre" required>
                    </div>
                    <div class="input_contacto">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" placeholder="Email" required>
                        <span id="compruebaEmail" class="respuestas"></span>
                    </div>
                    <div class="input_contacto">
                        <label>Mensaje:</label>
                        <input type="text" id="asunto" name="asunto" placeholder="Asunto del mensaje" required>
                        <textarea id="mensaje" name="mensaje" placeholder="Escriba su mensaje aquí..." required></textarea>
                    </div>

                    <input type="submit" id="submit" value="Enviar" onclick="enviarCorreo()">
                    <?php
                        if(isset($_GET['respuesta'])){
                            if($_GET['respuesta'] == "correoEnviado"){
                                echo "<span class='respuesta_envio'>";
                                echo 'El mensaje se ha enviado con éxito.';
                                echo "</span>";
                            }
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
        
        //Comprobamos que que todos los datos son correctos, es decir, no hay avisos. Y si es asi, procederemos a enviar el correo.
        function enviarCorreo(){
            var asunto = document.getElementById('asunto').value;
            var mensaje = document.getElementById('mensaje').value;

            var nombre = document.getElementById('nombre').value;
            var email = document.getElementById('email').value;

            if (nombre == "" || email == "" || mensaje == "Escriba su mensaje aquí..." || asunto == "Asunto del mensaje"){
                alert('Debe rellenar todos los datos correctamente.' + 
                     '\nAsunto: ' + asunto +
                     '\nMensaje: ' + mensaje +
                     '\nNombre: ' + nombre +
                     '\nEmail: ' + email);
            }else{
                contacto.action="includes/procesar.php?accion=enviarCorreo"; //Establecemos un valor al atributo *action* del formulario para poder enviar la informacion
            }
        }
    </script>
    
</body>
</html>