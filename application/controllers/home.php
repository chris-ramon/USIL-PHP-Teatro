<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
 
    function __construct(){
        parent::__construct();
        //Load FACEBOOK app
        $fb_config = array('appId'  => '322082054533122','secret' => 'ec54fd7f37045f8ec7ccafc5215dd2b5');
        $this->load->library('facebook', $fb_config);
        
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
                    $username = "usariosFB";
                else
                    $username=$fb_data['user']['username'];
                $this->loginFb($fb_data['user']['id'],$username,$fb_data['user']['email'],"passwordgenerado",$fb_data['user']['name'],"https://graph.facebook.com/".$fb_data['user']['id']."/picture");
                $this->session->set_userdata('fb_data', $fb_data);
            }
            $data['fb_data']=$fb_data;
            
        $this->load->view('index',$data);
    }
    
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


    function loginFb($user_id,$username,$email,$password,$nombre,$foto){
        if($this->Usuario->getUserByUser_Id($user_id)==null){
            $this->Usuario->insertUserFb($user_id,$username,$email,$password,$nombre,$foto);
        }
    }
    function loginTw(){
        $this->usuario->insertUserTw();
    }
    function logout(){
        unset($_COOKIE['fbsr_322082054533122']);
        unset($_SESSION['fbsr_322082054533122']);
        $this->session->set_userdata('fb_data', null);
        redirect('../index.php');
    }
    
    function detalle_obra_teatral($id)
    {
            $this->load->view('detalle_obra_teatral.php');
    }
}
