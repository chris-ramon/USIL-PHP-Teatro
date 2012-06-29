<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

   public function login()
   {
        $username = $this->input->post('username');
        $pwd = $this->input->post('pwd');        
        if(empty($username) OR empty($pwd)){
          $this->load->view('panel/login.php');
        } 
        else{
            $this->load->model('admin_model');
            $q = $this->admin_model->validate();
            if($q){               
                $data = array(
                    'username' =>  $this->input->post('username'),                    
                    'id' => $q->userId,
                    'is_logged' => true,
                    'rol' => $q->rol
                );
                $this->session->set_userdata($data);
                redirect('/panel');
            }
            else{
                redirect('/panel');
            }
        }  
   }

   function logout()
   {
        $this->session->sess_destroy();
        redirect('/admin/login');
    }

}

/* End of file Controllername.php */
/* Location: ./application/controllers/Controllername.php */