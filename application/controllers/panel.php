<?php 
/**
* 
*/
class Panel extends CI_Controller
{
	function login()
	{
		$this->load->view('panel/login.php');
	}

	function index()
	{
		$this->load->view('panel/index.php');
	}

	function nueva_obra_teatral()
	{
		$this->load->view('panel/nueva_obra_teatral.php');
	}

}