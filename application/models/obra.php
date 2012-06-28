<?php

class Obra extends CI_Model {
    private $_id;
    private $_autor;
    private $_director;
    private $_nombre;
    private $_reseña;
    private $_puntos;
    private $_likes;
    private $_lugar;
    private $_fechaHora;
    private $_temporada; 
    private $_precio;

    public function __construct($_id="", $_autor="", $_director="", $_nombre="", $_reseña="", $_puntos="", $_likes="", $_lugar="", $_fechaHora="", $_temporada="", $_precio="") {
        $this->_id = $_id;
        $this->_autor = $_autor;
        $this->_director = $_director;
        $this->_nombre = $_nombre;
        $this->_reseña = $_reseña;
        $this->_puntos = $_puntos;
        $this->_likes = $_likes;
        $this->_lugar = $_lugar;
        $this->_fechaHora = $_fechaHora;
        $this->_temporada = $_temporada;
        $this->_precio = $_precio;
    }
    
    public function getId() {
        return $this->_id;
    }

    public function getAutor() {
        return $this->_autor;
    }

    public function getDirector() {
        return $this->_director;
    }

    public function getNombre() {
        return $this->_nombre;
    }

    public function getReseña() {
        return $this->_reseña;
    }
    
    public function getPuntos() {
        return $this->_puntos;
    }

    public function getLikes() {
        return $this->_likes;
    }

    public function getLugar() {
        return $this->_lugar;
    }

    public function getFechaHora() {
        return $this->_fechaHora;
    }

    public function getTemporada() {
        return $this->_temporada;
    }

    public function getPrecio() {
        return $this->_precio;
    }


    public function listarObras(){
        $query = $this->db->get("obras");
        $lista = $query->result();
        $listaObras = array();
        foreach($lista as $obra){
            $id = $obra->obraId;
            $autor = $obra->autor;   
            $director = $obra->director;
            $nombre = $obra->nombre;
            $reseña = $obra->reseña;
            
            $puntos = $obra->puntos;
            $likes = $obra->likes;
            $lugar = $obra->lugar;
            $fechaHora = $obra->fechaHora;
            $temporada = $obra->temporada;
            $precio = $obra->precio;
            
            $listaObras[] = new Obra($id, $autor, $director, $nombre, $reseña, $puntos, $likes, $lugar, $fechaHora, $temporada, $precio); 
        }
        return $listaObras;
    }
    
   
    
    public function crearObra(Obra $obra){
        $data=array(
            'obraId'=>$obra->getId(),
            'autor'=>$obra->getAutor(),
            'director'=>$obra->getdirector(),
            'nombre'=>$obra->getNombre(),
            'reseña'=>$obra->getReseña(),
            'puntos'=>$obra->getPuntos(),
            'likes'=>$obra->getLikes(),
            'lugar'=>$obra->getLugar(),
            'fechaHora'=>$obra->getFechaHora(),
            'temporada'=>$obra->getTemporada(),
            'precio'=>$obra->getPrecio(),         
        );
        $this->db->insert('obras',$data);
    }
    

    public function modificarObra(Obra $obra){
         $data=array(
            'autor'=>$obra->getAutor(),
            'director'=>$obra->getdirector(),
            'nombre'=>$obra->getNombre(),
            'reseña'=>$obra->getReseña(),
            'puntos'=>$obra->getPuntos(),
            'likes'=>$obra->getLikes(),
            'lugar'=>$obra->getLugar(),
            'fechaHora'=>$obra->getFechaHora(),
            'temporada'=>$obra->getTemporada(),
            'precio'=>$obra->getPrecio(),         
        );
         $this->db->where('obraId',$obra->getId());
        $this->db->update('obras',$data);
    }
    
    public function eliminarObra($id){
        $this->db->where('obraId',$id);
        $this->db->delete("obras");
    }
    
    public function getObraById($id){
        $obras = $this->listarObras();
        foreach($obras as $obra){
            if($obra->getId() == $id)
                return $obra;
        }
        return false;
    }
}


?>
