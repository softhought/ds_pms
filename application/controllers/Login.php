<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model("Login_model", "login");
        
        
    }
    public function index(){
       $this->load->helper('form');
       $this->load->library('form_validation');
       $schoolList['cliniclist']= $this->login->getAllClinic();
      // $schoolList['acdsessionList']= $this->login->getAllAcademinSession();
     
       $page="login/login.php";
       $this->load->view($page,$schoolList);
    }
    
    public function check_login() 
    {  
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('clinic_id', 'Clinic', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('userpassword', 'Password', 'required');
      
        $this->form_validation->set_error_delimiters('<div class="error-login">', '</div>');
        
        if ($this->form_validation->run() == FALSE)
           {
                   //redirect('login');
                      $schoolList['cliniclist']= $this->login->getAllClinic();
                   
                    $page="login/login";
                    $this->load->view($page,$schoolList);    
           }
           else
           {
                $username = $this->input->post('username');
                $clinic_id = $this->input->post('clinic_id');
                $password = $this->input->post('userpassword');
              
               $user_id = $this->login->checkLogin($username,$password,$clinic_id);

                //exit;

                if($user_id!=""){
                    $user = $this->login->get_user($user_id);
                    $user_session = [
                    "userid"=>$user->user_id,
                    "username"=>$user->username, 
                    "doctor_id"=>$user->doctor_id, 
                    "clinic_id"=>$clinic_id 
                    
                ];
                 $this->setSessionData($user_session);
                 redirect('dashboard');
                    
                }else{
                     $this->session->set_flashdata('msg','<div class="error-login">Invalid username or password</div>');
                    // redirect('login');
                      $cliniclist['cliniclist']= $this->login->getAllClinic();
                   
                    $page="login/login";
                    $this->load->view($page,$cliniclist);    

                }
                       //echo('success');
           }
    }
    
    private function setSessionData($result = NULL) {

        if ($result) {
            $this->session->set_userdata("user_data", $result);
        }
    }
}
