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
                                    'redirect_uri' => 'http://192.168.1.100/USIL-PHP-Teatro/' // URL where you want to redirect your users after a successful login
                                ));
            }
            if ($fb_data['user']['name']!=null){//verificar si está logeado en facebook
                if(!isset($fb_data['user']['username']))
                    $username = "usuarioFB";
                else
                    $username=$fb_data['user']['username'];
                $this->loginFb($fb_data['user']['id'],$username,$fb_data['user']['email'],"passwordgenerado",$fb_data['user']['name'],"https://graph.facebook.com/".$fb_data['user']['id']."/picture");
                $this->session->set_userdata('fb_data',$fb_data);
                $this->session->set_userdata('user_data','facebook');
                $this->session->unset_userdata('tw_data');
            }

            $data['fb_data']=$fb_data;
            $data['tw_data']=$this->session->userdata('tw_data');
        $this->load->view('index',$data);

    }

    /*
    function login() {
        $email = $this->input->post('email');
        $pass = $this->input->post('password');
        $result = $this->Usuario->login($email,$pass);
        if($result!=null){
            $fb_data['fb_id']=$result->getUser_id();
            $fb_data['name']=$result->getNombre();
            $fb_data['logoutUrl'] = $this->facebook->getLogoutUrl();

            $this->session->set_userdata('fb_data', $fb_data);
            
            $data['fb_data']=$fb_data;
            $this->load->view('index',$data);
        }else{
            $this->load->view('login');
        }
    }
    */

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
					$this->Usuario->insertUserTw($tw_data['user']->id,$tw_data['user']->screen_name,'email@email.com','passwordgenerado',$tw_data['user']->name,$tw_data['user']->profile_image_url);
				}
				$this->session->set_userdata('tw_data',$tw_data);
				$this->session->set_userdata('user_data','twitter');
				$this->session->unset_userdata('fb_data');
			}
			$data['tw_data']=$tw_data;
        $this->load->view('index',$data);
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
    
    function detalle_obra_teatral($id)
    {
            $this->load->view('detalle_obra_teatral.php');
    }
}
