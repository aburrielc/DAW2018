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
    
    public static function insertarPelicula($imagen, $link, $titulo, $posicion, $rating, $reparto, $voto, $anno){
        $sql = "INSERT INTO `pelicula`(`imagen`, `link`, `titulo`, `posicion`, `rating`, `reparto`, `voto`, `anno`) VALUES ('$imagen','$link','$titulo','$posicion','$rating','$reparto','$voto','$anno')";
        
        $resultado = self::ejecutaConsulta($sql);
        //$resultadoArray = $resultado->fetchAll(PDO::FETCH_ASSOC);
        
        //return $resultadoArray;
    }
}
    
?>