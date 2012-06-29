<?php

class Obra_model extends CI_Model {
    private $_id;
    private $_nombre;
    private $_estreno;
    private $_autor;
    private $_director;
    private $_resena;
    private $_lugar;
    private $_temporada;
    private $_funciones;
    private $_informacion_adicional;
    private $_precio;
    private $_afiche;

    private $_puntos;
    private $_likes;
    

    public function __construct($_id="", $_nombre="", $_estreno="", $_autor="", $_director="", 
        $_resena="", $_lugar="",  $_temporada="", $_funciones="", $_informacion_adicional="",  
        $_precio="", $_afiche="", $_puntos="", $_likes="") {

        $this->_id = $_id;
        $this->_nombre = $_nombre;
        $this->_estreno = $_estreno;
        $this->_autor = $_autor;
        $this->_director = $_director;
        $this->_reseña = $_resena;
        $this->_lugar = $_lugar;
        $this->_temporada = $_temporada;
        $this->_funciones = $_funciones;
        $this->_informacion_adicional = $_informacion_adicional;
        $this->_precio = $_precio;
        $this->_afiche = $_afiche;
        $this->_puntos = $_puntos;
        $this->_likes = $_likes;
    }
    
    public function getId() {
        return $this->_id;
    }

    public function getNombre() {
        return $this->_nombre;
    }

    public function getEstreno() {
        return $this->_estreno;
    }

    public function getAutor() {
        return $this->_autor;
    }

    public function getDirector() {
        return $this->_director;
    }

    public function getResena() {
        return $this->_reseña;
    }

    public function getLugar() {
        return $this->_lugar;
    }

    public function getTemporada() {
        return $this->_temporada;
    }

    public function getFunciones() {
        return $this->_funciones;
    }

    public function getInformacionAdicional() {
        return $this->_informacion_adicional;
    }

    public function getPrecio() {
        return $this->_precio;
    }

    public function getAfiche() {
        return $this->_afiche;
    }
    
    public function getPuntos() {
        return $this->_puntos;
    }

    public function getLikes() {
        return $this->_likes;
    }

    public function listarObras(){
        $query = $this->db->get("obras");
        $lista = $query->result();
        $listaObras = array();
        foreach($lista as $obra){
            $id = $obra->obraId;
            $nombre = $obra->nombre;
            $estreno = $obra->estreno;
            $autor = $obra->autor;
            $director = $obra->director;
            $resena = $obra->resena;
            $lugar = $obra->lugar;
            $temporada = $obra->temporada;
            $funciones = $obra->funciones;
            $informacion_adicional = $obra->informacion_adicional;
            $precio = $obra->precio;
            $afiche = $obra->afiche;
            $puntos = $obra->puntos;
            $likes = $obra->likes;
            $listaObras[] = new Obra_model($id, $nombre, $estreno, $autor, $director, 
                $resena, $lugar,  $temporada, $funciones, $informacion_adicional,  
                $precio, $afiche, $puntos, $likes); 
        }
        return $listaObras;
    }
    
    public function crearObra(Obra_model $obra){
        $data=array(
            'obraId'=>$obra->getId(),
            'nombre'=>$obra->getNombre(),
            'estreno'=>$obra->getEstreno(),
            'autor'=>$obra->getAutor(),
            'director'=>$obra->getDirector(),
            'resena'=>$obra->getResena(),
            'lugar'=>$obra->getLugar(),
            'temporada'=>$obra->getTemporada(),
            'funciones'=>$obra->getFunciones(),
            'informacion_adicional'=>$obra->getInformacionAdicional(),
            'precio'=>$obra->getPrecio(),
            'afiche'=>$obra->getAfiche(),
            'puntos'=>$obra->getPuntos(),
            'likes'=>$obra->getLikes()
        );
        $this->db->insert('obras',$data);
    }
    

    public function modificarObra(Obra_model $obra){
         $data=array(
            'obraId'=>$obra->getId(),
            'nombre'=>$obra->getNombre(),
            'estreno'=>$obra->getEstreno(),
            'autor'=>$obra->getAutor(),
            'director'=>$obra->getDirector(),
            'resena'=>$obra->getResena(),
            'lugar'=>$obra->getLugar(),
            'temporada'=>$obra->getTemporada(),
            'funciones'=>$obra->getFunciones(),
            'informacion_adicional'=>$obra->getInformacionAdicional(),
            'precio'=>$obra->getPrecio(),
            'afiche'=>$obra->getAfiche(),
            'puntos'=>$obra->getPuntos(),
            'likes'=>$obra->getLikes()       
        );
        $this->db->where('obraId',$obra->getId());
        $this->db->update('obras',$data);
    }
    
    public function eliminarObra($id){
        $this->db->where('obraId',$id);
        $this->db->delete("obras");
    }
    
    public function getObraById($id){
        $query = $this->db->get_where('obras', array('obraId' => $id));
        $result = $query->result();
        if($result){
            $obra = $result[0];
            $id = $obra->obraId;
            $nombre = $obra->nombre;
            $estreno = $obra->estreno;
            $autor = $obra->autor;
            $director = $obra->director;
            $resena = $obra->resena;
            $lugar = $obra->lugar;
            $temporada = $obra->temporada;
            $funciones = $obra->funciones;
            $informacion_adicional = $obra->informacion_adicional;
            $precio = $obra->precio;
            $afiche = $obra->afiche;
            $puntos = $obra->puntos;
            $likes = $obra->likes;
            $_obra = new Obra_model($id, $nombre, $estreno, $autor, $director, 
                $resena, $lugar,  $temporada, $funciones, $informacion_adicional,  
                $precio, $afiche, $puntos, $likes);
            return $_obra;
        }
        else{ return false; }
    }

    public function getLastInsertId(){
        $sql = "SELECT MAX(obraId) as obraId from `obras`";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result[0]->obraId;
    }

    public function votar($obraId, $userId, $tipo)
    {
        $sql_insert = "INSERT INTO `teatro`.`votos` (`id`, `obraId`, `userId`) VALUES (NULL, '$obraId', '$userId');";
        $result_insert = $this->db->query($sql_insert);

        $sql_puntos = "SELECT `puntos` FROM `teatro`.`obras` WHERE `obraId` = $obraId;";
        $result_puntos = $this->db->query($sql_puntos);
        $aumentar_puntos_result = $result_puntos->result();
        $puntos = $aumentar_puntos_result[0]->puntos;

        if ($tipo == '1') {
            $puntos += 5;
        } else { $puntos -= 3; }

        $sql_update_puntos = "UPDATE `teatro`.`obras` SET `puntos` = $puntos WHERE `obraId` = $obraId;";
        $result_update_puntos = $this->db->query($sql_update_puntos);
    }
}












