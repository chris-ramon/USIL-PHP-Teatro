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
                $this->load->model('Obra','',true);
                $obras = $this->Obra->listarObras();
                $datos['obras'] = $obras;
		$this->load->view('panel/index.php', $datos);
	}

	function nueva_obra_teatral()
	{
                $this->load->model('Obra','',true);
                $_autor = $this->input->post('autor');
                $_director =  $this->input->post('director');
                $_nombre = $this->input->post('nombre');
                $_reseña =  $this->input->post('resena');
                $_puntos =  0;
                $_likes =  0;
                $_lugar =  $this->input->post('sala');
                $date = date_create($this->input->post('horarios'));
                $_fechaHora = date_format($date, 'Y-m-d H:i:s');
                $_temporada =  $this->input->post('temporada');
                $_precio =  $this->input->post('precio');
                
                if($_autor!=null&& $_director!=null&&$_nombre!=null){
                $obra = new Obra(null, $_autor, $_director, $_nombre, $_reseña, $_puntos, $_likes, $_lugar, $_fechaHora, $_temporada, $_precio);
                $this->Obra->crearObra($obra);
                $id = $this->db->insert_id(); 
                
                
                $config['upload_path'] = "./upload_files/img";
                $config['allowed_types'] = 'png';
                $config['file_name'] = $id."";
                $this->load->library('upload', $config);
                $this->upload->do_upload();
                        
             
                redirect('../panel/panel/index.php', 'refresh');
                
                }
                
		$this->load->view('panel/nueva_obra_teatral.php');
                
	}
        
        function mod_obra_teatral(){
                $this->load->model('Obra','',true);
                $id =  $this->input->post('idObra');
                $obra = $this->Obra->getObraById($id);
                $datos['obra'] = $obra; 
                $this->load->view('panel/mod_obra_teatral', $datos);       
        }
        
        function edit_obra_teatral(){
              $this->load->model('Obra','',true);
                $_id = $this->input->post('idObra');
                $_autor = $this->input->post('autor');
                $_director =  $this->input->post('director');
                $_nombre = $this->input->post('nombre');
                $_reseña =  $this->input->post('resena');
                $_puntos =  0;
                $_likes =  0;
                $_lugar =  $this->input->post('sala');
                $date = date_create($this->input->post('horarios'));
                $_fechaHora = date_format($date, 'Y-m-d H:i:s');
                $_temporada =  $this->input->post('temporada');
                $_precio =  $this->input->post('precio');
                
                if($_autor!=null&& $_director!=null&&$_nombre!=null){
                $obra = new Obra($_id, $_autor, $_director, $_nombre, $_reseña, $_puntos, $_likes, $_lugar, $_fechaHora, $_temporada, $_precio);
                $this->Obra->modificarObra($obra);
                
                $config['upload_path'] = "./upload_files/img";
                $config['allowed_types'] = 'png';
                $config['overwrite'] = TRUE;
                $config['file_name'] = $_id."";
                $this->load->library('upload', $config);
                $this->upload->do_upload();
                        
             
                redirect('../panel/panel/index.php', 'refresh');
                }
                $this->load->view('panel/mod_obra_teatral.php');
        }
        
        function del_obra_teatral(){
            $this->load->model('Obra','',true);
            $id =  $this->input->post('idObra');
            $this->Obra->eliminarObra($id);
            unlink('./upload_files/img/'.$id.".png");
            redirect('../panel/panel/index.php', 'refresh');
        }
        
        
        

}