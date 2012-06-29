<?php 
/**
* 
*/
class Panel extends CI_Controller
{

	function index()
	{
        if($this->session->userdata('is_logged') && $this->session->userdata('rol') == 'admin'){
            $this->load->model('obra_model','',true);
            $obras = $this->obra_model->listarObras();
            $datos['obras'] = $obras;
            $this->load->view('panel/index.php', $datos);
        } else { redirect('admin/login'); }
	}

	function nueva_obra_teatral()
    {
                $this->load->model('obra_model','',true);
                $_puntos =  0;
                $_likes =  0;

                $_id = $this->obra_model->getLastInsertId();
                $_id += 1;
                $_nombre = $this->input->post('nombre');
                $_estreno =  $this->input->post('estreno');
                $_autor = $this->input->post('autor');
                $_director =  $this->input->post('director');
                $_resena =  $this->input->post('resena');
                $_lugar =  $this->input->post('lugar');
                $_temporada =  $this->input->post('temporada');
                $_funciones =  $this->input->post('funciones');
                $_informacion_adicional =  $this->input->post('informacionadicional');
                $_precio =  $this->input->post('precio');
                
                if($_autor!=null&& $_director!=null&&$_nombre!=null){
                
                $config['upload_path'] = "./upload_files/img";
                $config['allowed_types'] = 'png|jpg|jpeg';
                $this->load->library('upload', $config);
                $this->upload->do_upload();
                $file_data = $this->upload->data();
                $_afiche = $_id."_".$file_data['file_name'];
                chmod($file_data['full_path'], 0775);
                rename($file_data['full_path'], $file_data['file_path'].$_afiche);

                $obra = new Obra_model($_id, $_nombre, $_estreno, $_autor, $_director, 
                $_resena, $_lugar,  $_temporada, $_funciones, $_informacion_adicional,  
                $_precio, $_afiche, $_puntos, $_likes);
                $this->obra_model->crearObra($obra);
                        
                redirect('../panel/panel/index.php', 'refresh');
                
                }
                
		$this->load->view('panel/nueva_obra_teatral.php');
                
	}
        
        function mod_obra_teatral(){
                $this->load->model('obra_model','',true);
                $id =  $this->input->post('idObra');
                $obra = $this->obra_model->getObraById($id);
                $datos['obra'] = $obra; 
                $this->load->view('panel/mod_obra_teatral', $datos);       
        }
        
        function edit_obra_teatral(){
              $this->load->model('obra_model','',true);
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

                $config['upload_path'] = "./upload_files/img";
                $config['allowed_types'] = 'png|jpg|jpeg';
                $config['overwrite'] = TRUE;
                
                $this->load->library('upload', $config);
                $this->upload->do_upload();
                $file_data = $this->upload->data();
                $_afiche = $_id."_".$file_data['file_name'];
                rename($file_data['full_path'], $file_data['file_path'].$_afiche);
                        
                $obra = new obra_model($_id, $_autor, $_director, $_nombre, $_reseña, $_afiche, $_puntos, $_likes, $_lugar, $_fechaHora, $_temporada, $_precio);
                $this->obra_model->modificarObra($obra);


                redirect('../panel/panel/index.php', 'refresh');
                }
                $this->load->view('panel/mod_obra_teatral.php');
        }
        
        function del_obra_teatral(){
            $this->load->model('obra_model','',true);
            $id =  $this->input->post('idObra');
            $this->obra_model->eliminarObra($id);
            // unlink('./upload_files/img/'.$);
            redirect('../panel/panel/index.php', 'refresh');
        }
        
        
        

}