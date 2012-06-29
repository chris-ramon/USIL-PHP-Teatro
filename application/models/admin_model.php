<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model { 
    function validate(){
        $this->db->select('userId, rol');        
        $this->db->where('username', $this->input->post('username'));
        $this->db->where('password', md5($this->input->post('pwd')));
        $query = $this->db->get('usuarios');
        if($query->num_rows == 1){
            $r = $query->result();
            return $r[0];
        }
        else{ return 0; }
    }
}