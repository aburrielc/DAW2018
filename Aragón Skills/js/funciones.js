//Función para obtener los parámetros de la URL.
function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

//Ajax para actualizar los datos de una película.
function actualizarPelicula(id_pelicula){
    
    var posicion = document.getElementById("inputPosRanking").value;
    var puntuacion = document.getElementById("inputPuntuacion").value;
    var anno = document.getElementById("inputAnno").value;
    var reparto = document.getElementById("textReparto").value;
    
    //Comprobamos campos vacíos.
    if(posicion == "" || puntuacion == "" || anno == "" || reparto == ""){
       alert('Usted se ha dejado campos por rellenar.');
    }else{
        //Crear objeto
        var peticion_http;		
        if (window.XMLHttpRequest){
            peticion_http=new XMLHttpRequest();	
        }else if(window.ActiveXObject){
            peticion_http=new ActiveXObject("Microsoft.XMLHTTP")
        }else{
            alert("Su navegador no soporta Ajax")
        }

        function procesaRespuesta(){
            if(peticion_http.readyState==4){//tengo respuesta completa
                if(peticion_http.status==200){//todo ha ido bien
                    alert('Película actualizada.');
                }
            }
        }

        //Asignar la funcion de procesamiento.
        peticion_http.onreadystatechange=procesaRespuesta;

        //Preaparar la petición.
        peticion_http.open("POST","includes/procesar.php?accion=actualizarPelicula",true);   //Asíncrono
        peticion_http.setRequestHeader("Content-Type","application/x-www-form-urlencoded"); //Porque esta adjuntado por método post.

        //Enviar la petición.
        var aux="id_pelicula=";
        aux+=id_pelicula;
        aux+="&posicion=";
        aux+=document.getElementById("inputPosRanking").value;
        aux+="&puntuacion=";
        aux+=document.getElementById("inputPuntuacion").value;
        aux+="&anno=";
        aux+=document.getElementById("inputAnno").value;
        aux+="&reparto=";
        aux+=document.getElementById("textReparto").value;
        peticion_http.send(aux);
    }
}

function ordenarPeliculas(){
    
    var radio = document.getElementsByName("optradio").value;
    
    //Crear objeto
    var peticion_http;		
    if (window.XMLHttpRequest){
        peticion_http=new XMLHttpRequest();	
    }else if(window.ActiveXObject){
        peticion_http=new ActiveXObject("Microsoft.XMLHTTP")
    }else{
        alert("Su navegador no soporta Ajax")
    }

    function procesaRespuesta(){
        if(peticion_http.readyState==4){//tengo respuesta completa
            if(peticion_http.status==200){//todo ha ido bien
                alert('Ordenada.');
            }
        }
    }

    //Asignar la funcion de procesamiento
    peticion_http.onreadystatechange=procesaRespuesta;

    //Preaparar la petición.
    peticion_http.open("POST","includes/procesar.php?accion=ordenarPeliculas",true);   //Asíncrono
    peticion_http.setRequestHeader("Content-Type","application/x-www-form-urlencoded"); //Porque esta adjuntado por método post.

    //Enviar la petición.
    var aux="radio=";
    aux+=radio;
    peticion_http.send(aux);
}
