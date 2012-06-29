<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Obra extends CI_Controller {

	public function index()
	{

	}
	
	function detalle_obra_teatral($id)
    {
    	$this->load->model('obra_model');
    	$data['obra'] = $this->obra_model->getObraById($id);
        $this->load->view('detalle_obra_teatral.php', $data);
    }
    function votar($obraId, $tipo)
    {
    	// if($this->session->userdata('is_logged')) {
    	// 	$this->load->model('obra_model');
    	// 	$userId = $this->session->userdata('id');
    	// 	$this->obra_model->votar($obraId, $userId, $tipo);
    	// } else { redirect('home?action=like&obraId='.$obraId); }	
    	$this->load->model('obra_model');
		$userId = 1;
		$this->obra_model->votar($obraId, $userId, $tipo);
		redirect('home?action=like&obraId='.$obraId);
    }

}

/* End of file Controllername.php */
/* Location: ./application/controllers/Controllername.php */