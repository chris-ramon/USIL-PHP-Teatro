<?php 
/**
* 
*/
class Panel extends CI_Controller
{
	function login()
	{
		$this->load->view('panel/login.php');
		
		/* End of file Panel.php */
		/* Location: ./application/controllers/Panel.php */
	}

	function index()
	{
		$this->load->view('panel/index.php');
		
		/* End of file Panel.php */
		/* Location: ./application/controllers/Panel.php */
	}

	function nueva_obra_teatral(){
		$this->load->view('panel/nueva_obra_teatral.php');
		
		/* End of file Controllername.php */
		/* Location: ./application/controllers/Controllername.php */
	}
}