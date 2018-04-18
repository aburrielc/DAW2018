<?php

class Pelicula{
	
    private $id_pelicula;
    private $imagen;
    private $linkPagina;
	private $titulo;
	private $posicion;
    private $rating;
    private $reparto;
    private $voto;
    private $anno;
    
    public function __construct($id_pelicula, $imagen, $linkPagina, $titulo, $posicion, $rating, $reparto, $voto, $anno){
        $this->id_pelicula = $id_pelicula;
		$this->imagen = $imagen;
		$this->linkPagina = $linkPagina;
        $this->titulo = $titulo;
        $this->posicion = $posicion;
        $this->rating = $rating;
        $this->reparto = $reparto;
        $this->voto = $voto;
        $this->anno = $anno;
    }
    
    public function getIdPelicula(){
		return $this->id_pelicula;
	}
    
    public function getImagen(){
		return $this->imagen;
	}
    
    public function getLinkPagina(){
		return $this->linkPagina;
	}
    
    public function getTitulo(){
		return $this->titulo;
	}
    
    public function getPosicion(){
		return $this->posicion;
	}
    public function getRating(){
		return $this->rating;
	}
    
	public function getReparto(){
		return $this->reparto;
	}
    
    public function getVoto(){
		return $this->voto;
	}
    
    public function getAnno(){
		return $this->anno;
	}
}
?>