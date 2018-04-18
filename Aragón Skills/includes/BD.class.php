<?php
require_once('conf.inc.php');

class BD {
	
    protected static function ejecutaConsulta($sql) {
		
		global $host, $baseDeDatos, $login, $password;
		
        try{
			$opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
			$dsn = "mysql:host=$host;dbname=$baseDeDatos";
			$dwes = new PDO($dsn, $login, $password, $opc);
            
		}catch(PDOException $e){
			die("Error: " . $e->getMessage());
		}
		$resultado = null;
		if (isset($dwes)){
			$resultado = $dwes->query($sql);
		}
		
        return $resultado;
    }
    
    /* Método para obtener los datos del fichero JSON e insertarlos en la bd. */
    public static function obtenerDatosJSON(){
        
        $json_url='json/pelis.json';
        
        $str = file_get_contents($json_url);
        
        $json = json_decode($str, true);
        
        //var_dump($json);
        
        if (is_array($json) || is_object($json)){
            foreach($json as $pelicula){
                $imagen = $pelicula['images'][0];
                $link = $pelicula['link'];
                $titulo = $pelicula['movie_title'];
                $posicion = $pelicula['place'];
                $rating = $pelicula['rating'];
                $reparto = $pelicula['star_cast'];
                $voto = $pelicula['vote'];
                $anno = $pelicula['year'];

                self::insertarPelicula($imagen, $link, $titulo, $posicion, $rating, $reparto, $voto, $anno);
            }
        }
	}
    
    /* Inserción de películas. */
    public static function insertarPelicula($imagen, $link, $titulo, $posicion, $rating, $reparto, $voto, $anno){
        $sql = "INSERT INTO `pelicula`(`imagen`, `link`, `titulo`, `posicion`, `rating`, `reparto`, `voto`, `anno`) VALUES ('$imagen','$link','$titulo','$posicion','$rating','$reparto','$voto','$anno')";
        
        $resultado = self::ejecutaConsulta($sql);
        //$resultadoArray = $resultado->fetchAll(PDO::FETCH_ASSOC);
        
        //return $resultadoArray;
    }
    
    /* Obtención de datos de las películas para listarlas. */
    public static function obtenerPeliculas(){
		$sql = "SELECT id_pelicula, imagen, titulo, rating, anno FROM pelicula";
		
		$resultado = self::ejecutaConsulta($sql);
        $resultadoArray = $resultado->fetchAll(PDO::FETCH_ASSOC);
        
        return $resultadoArray;
	}
    
    /* Obtención de datos de una película en función de su id. */
    public static function obtenerPelicula($id_pelicula){
		$sql = "SELECT * FROM pelicula WHERE id_pelicula='$id_pelicula'";
		
		$resultado = self::ejecutaConsulta($sql);
        $resultadoArray = $resultado->fetchAll(PDO::FETCH_ASSOC);
        
        return $resultadoArray;
	}
    
    /* Eliminamos una película de la bd. */
    public static function eliminarPelicula($id_pelicula) {
        $sql = "DELETE FROM pelicula WHERE id_pelicula='$id_pelicula'";
		
		$resultado = self::ejecutaConsulta($sql);

		return $resultado;
    }
    
    /* Actualizamos una película de la bd*/
    public static function actulizarPelicula($id_pelicula, $posicion, $puntuacion, $anno, $reparto) {
        $sql = "UPDATE pelicula SET posicion='$posicion', rating='$puntuacion', reparto='$reparto', anno='$anno' WHERE id_pelicula='$id_pelicula'";
		
		$resultado = self::ejecutaConsulta($sql);

		return $resultado;
    }
    
    /* Películas ordenadas por título. */
    public static function obtenerPeliculasOrdenadasTitulo(){
		$sql = "SELECT * FROM pelicula ORDER BY titulo";
		
		$resultado = self::ejecutaConsulta($sql);
        $resultadoArray = $resultado->fetchAll(PDO::FETCH_ASSOC);
        
        return $resultadoArray;
	}
    
    /* Películas ordenadas por fecha. */
    public static function obtenerPeliculasOrdenadasFecha(){
		$sql = "SELECT * FROM pelicula ORDER BY anno DESC";
		
		$resultado = self::ejecutaConsulta($sql);
        $resultadoArray = $resultado->fetchAll(PDO::FETCH_ASSOC);
        
        return $resultadoArray;
	}
    
    /* Películas ordenadas por puntuación. */
    public static function obtenerPeliculasOrdenadasPuntuacion(){
		$sql = "SELECT * FROM pelicula ORDER BY rating DESC";
		
		$resultado = self::ejecutaConsulta($sql);
        $resultadoArray = $resultado->fetchAll(PDO::FETCH_ASSOC);
        
        return $resultadoArray;
	}
}
    
?>