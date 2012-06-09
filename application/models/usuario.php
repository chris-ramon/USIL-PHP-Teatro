<?php

class Usuario extends CI_Model{
    private $_id;
    private $_user_id;
    private $_username;
    private $_email;
    private $_password;
    private $_nombre;
    private $_foto;
    private $_logged;
    
    public function __construct($id="",$user_id="",$username="",$email="",$password="",$nombre="",$foto="",$logged="") {
        parent::__construct();
        $this->_id=$id;
        $this->_user_id=$user_id;
        $this->_username=$username;
        $this->_email=$email;
        $this->_password=$password;
        $this->_nombre=$nombre;
        $this->_foto=$foto;
        $this->_logged=$logged;
    }
    public function getId() { return $this->_id;}
    public function getUser_id() { return $this->_user_id;}
    public function getUsername() { return $this->_username;}
    public function getEmail() { return $this->_email;}
    public function getPassword() { return $this->_password;}
    public function getNombre() { return $this->_nombre;}
    public function getFoto() { return $this->_foto;}
    public function getLogged() { return $this->_logged;}

    public function getAllUsers(){
        $query = $this->db->get("usuarios");
        $lista = $query->result();
        $listaUsuarios = array();
        foreach($lista as $usuario){
            $id = $usuario->userId;
            $user_id = $usuario->user_id;
            $username = $usuario->username;
            $email = $usuario->email;
            $password = $usuario->password;
            $nombre = $usuario->nombre;
            $foto = $usuario->foto;
            $logged = $usuario->logged;
            $listaUsuarios[] = new Usuario($id, $user_id, $username, $email, $password, $nombre, $foto, $logged);
        }
        return $listaUsuarios;
    }
    
    public function getUserByUser_Id($user_id){
        $usuarios = $this->getAllUsers();
        foreach($usuarios as $user){
            if($user->getUser_id() == $user_id)
                return $user;
        }
        return false;
    }
    
    public function getUserByEmail($email){
        $usuarios = $this->getAllUsers();
        foreach($usuarios as $user){
            if($user->getEmail() == $email)
                return $user;
        }
        return false;
    }
    
    public function login($email,$password) {
        $user=$this->getUserByEmail($email);
        if($user!=null){
            if($user->getPassword()==$password)
                return $user;
            else{
                return false;
            }
        }else{
            return false;
        }
    }
    
    public function insertUserFb($userId,$username,$email,$password,$nombre,$foto){
        $data = array(
            'userId'=>null,
           'user_id' => $userId,
           'username' => $username,
           'email' => $email,
           'password' => $password,
           'nombre' => $nombre,
           'foto' => $foto,
           'logged' => 'Fb'
        );
        $this->db->insert('usuarios', $data);
    }
    public function insertUserTw($userId,$username,$email,$password,$nombre,$foto){
        $data = array(
           'userId'=>null,
           'user_id' => $userId,
           'username' => $username,
           'email' => $email,
           'password' => $password,
           'nombre' => $nombre,
           'foto' => $foto,
           'logged' => 'Tw'
        );
        $this->db->insert('usuarios', $data);
    }
    
}

?>
