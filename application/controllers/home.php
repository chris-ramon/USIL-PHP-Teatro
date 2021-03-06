<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct(){
        parent::__construct();
        //Load FACEBOOK app
	        $fb_config = array('appId'  => '322082054533122','secret' => 'ec54fd7f37045f8ec7ccafc5215dd2b5');
	        $this->load->library('facebook', $fb_config);
        //Load TWITTER app
	        $this->load->library('twitter');
	        $this->twitter->enable_debug(TRUE);

        $this->load->model('Usuario','',true);
    }
 
    function index(){
        // Obtenemos las últimas obras creadas.
        $this->load->model('obra_model');
        $data['obras'] = $this->obra_model->listarObras();
        // FIN (Obtenemos las últimas obras creadas.) //

        // echo $this->session->userdata('user_data');
        //Facebook Login
            $user = $this->facebook->getUser();

            $fb_data['fb_id']=$user;
            $fb_data['user']=null;
            if ($user) {
                try {
                    $fb_data['user'] = $this->facebook->api('/me');
                    $fb_data['name'] = $fb_data['user']['name'];
                } catch (FacebookApiException $e) {
                    $user = null;
                }
            }

            if ($user) {
                $fb_data['logoutUrl'] = $this->facebook->getLogoutUrl();
            } else {
                $fb_data['loginUrl'] = $this->facebook->getLoginUrl(array(
                                    'scope' => 'email,user_birthday,publish_stream,offline_access', // app permissions
                                    'redirect_uri' => 'http://190.43.11.236/USIL-PHP-Teatro/' // URL where you want to redirect your users after a successful login
                                ));
            }
            if ($fb_data['user']['name']!=null){//verificar si está logeado en facebook
                if( !isset($fb_data['user']['username']) ) { $username = "usuarioFB";} else { $username=$fb_data['user']['username'];}
                $this->session->set_userdata('fb_data',$fb_data);
                $this->session->set_userdata('user_data','facebook');
                $this->session->unset_userdata('tw_data');
                $this->loginFb($fb_data['user']['id'],$username,$fb_data['user']['email'], NULL,$fb_data['user']['name'],"https://graph.facebook.com/".$fb_data['user']['id']."/picture");
            }
            $data['fb_data']=$fb_data;
            $data['tw_data']=$this->session->userdata('tw_data');

        if($this->session->userdata('user_data')=='facebook'){
                if($this->Usuario->getUserByUser_Id($fb_data['user']['id'])->getPassword()==null){
                    $data['username']="";
                    $data['email']=$fb_data['user']['email'];
                    $data['msg']="";
                    $this->load->view('checkpwd',$data);
                }else{
                    $this->load->view('index.php',$data);
                }
        }else{
            $this->load->view('index.php',$data);
        }
    }

    function login() {
        $useremail = $this->input->post('email');
        $pass = $this->input->post('password');
        $result = $this->Usuario->login($useremail,md5($pass));
        if($result!=null){
            if($result->getLogged()=='Fb'){
                $fb_data['fb_id']=$result->getUser_id();
                $fb_data['name']=$result->getNombre();
                $fb_data['logoutUrl'] = "http://190.43.11.236/USIL-PHP-Teatro/index.php/home/logoutFb";

                $this->session->set_userdata('fb_data', $fb_data);
                $this->session->set_userdata('user_data','facebook');
                
                $data['fb_data']=$fb_data;
                $this->load->view('index',$data);
            }else{
                $tw_data['user']->profile_image_url=$result->getFoto();
                $tw_data['user']->name=$result->getNombre();

                $this->session->set_userdata('tw_data', $tw_data);
                $this->session->set_userdata('user_data','twitter');
                
                $data['tw_data']=$tw_data;
                $this->load->view('index',$data);
            }
        }else{
            $this->load->view('login');
        }
    }
    

    function loginFb($user_id,$username,$email,$password,$nombre,$foto){
        if($this->Usuario->getUserByUser_Id($user_id)==null){
            $this->Usuario->insertUserFb($user_id,$username,$email,$password,$nombre,$foto);
        }
    }
    function loginTw(){
    	//Twitter Login
	    	if ( !$this->twitter->logged_in() ){
				$this->twitter->set_callback(site_url(''));
				$this->twitter->login();
			}
			else{
				$tokens = $this->twitter->get_tokens();
				$user = $this->twitter->call('get', 'account/verify_credentials');
				$tw_data['user']=$user;
				if($this->Usuario->getUserByUser_Id($tw_data['user']->id)==null){
					$this->Usuario->insertUserTw($tw_data['user']->id,$tw_data['user']->screen_name,'email@email.com',NULL,$tw_data['user']->name,$tw_data['user']->profile_image_url);
				}
				$this->session->set_userdata('tw_data',$tw_data);
				$this->session->set_userdata('user_data','twitter');
				$this->session->unset_userdata('fb_data');
			}
			$data['tw_data']=$tw_data;
        if ($this->session->userdata('user_data')=='twitter') {
                if($this->Usuario->getUserByUser_Id($tw_data['user']->id)->getPassword()==null){
                    $data['username']=$tw_data['user']->screen_name;
                    $data['email']="";
                    $data['msg']="";
                    $this->load->view('checkpwd',$data);
                }else{
                    $this->load->view('index',$data);
                }
        }else{
            $this->load->view('index',$data);
        }
    }
    function logoutFb(){
    	$this->session->sess_destroy();
    	$this->session->unset_userdata('fb_data');
    	$this->session->unset_userdata('user_data');
        redirect('../index.php');
    }
    function logoutTw(){
    	$this->session->sess_destroy();
    	$this->session->unset_userdata('tw_data');
    	$this->session->unset_userdata('user_data');
        $this->twitter->logout();
        redirect('../index.php');
    }

    function confirm_pwd(){
        $user=null;
        if($this->input->post('username')!=null) {
            $username= $this->input->post('username');
            $user = $this->Usuario->getUserByUsername($username);
        }
        if($this->input->post('email')!=null) {
            $email= $this->input->post('email');
            $user = $this->Usuario->getUserByEmail($email);
        }
        $pass1= $this->input->post('password');
        $pass2= $this->input->post('password2');
        if (strlen($pass1)<6) {
            $data['username']=$this->input->post('username');
            $data['email']=$this->input->post('email');
            $data['msg']="La contraseña debe ser mínimo de 6 caracteres.";
            $this->load->view('checkpwd',$data);
        }elseif($pass2!=$pass1){
            $data['username']=$this->input->post('username');
            $data['email']=$this->input->post('email');
            $data['msg']="No coinciden las contraseñas ingresadas.";
            $this->load->view('checkpwd',$data);
        }else{
            $this->Usuario->updateUser($user->getId(), $user->getUser_id(), $user->getUsername(), $user->getEmail(), md5($pass1), $user->getNombre(), $user->getFoto(), $user->getLogged() );
            redirect('../index.php');
        }
    }
    
    function detalle_obra_teatral($id)
    {
        $this->load->view('detalle_obra_teatral.php');
    }
}
