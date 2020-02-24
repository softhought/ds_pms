<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Createnewuser extends CI_Controller {

	 public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('commondatamodel','commondatamodel',TRUE);
        $this->load->model('createnewusewmodel','createnewusewmodel',TRUE);
       
    }

 public function index()
    {
        $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
            $session = $this->session->userdata('user_data');      
            $page = 'dashboard/admin_dashboard/Create_new_user/createNewUser_view.php';
            $result ='';
            $header = "";

            $result['userrole'] = $this->createnewusewmodel->getUserRole();
            
            createbody_method($result, $page, $header, $session);
        }else{
            redirect('login','refresh');
        }
    }


 public function createNewuser_action(){

   $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
            $json_response = array();
            $formData = $this->input->post('formDatas');
            parse_str($formData, $dataArry);


             $name = trim(htmlspecialchars($dataArry['name']));
             $user_name = trim(htmlspecialchars($dataArry['user_name']));
             $userpassword = trim(htmlspecialchars($dataArry['userpassword']));
             $user_type = trim(htmlspecialchars($dataArry['user_type']));
             $dr_reg_no = trim(htmlspecialchars($dataArry['dr_reg_no']));
             
             $clinic_id  = $session['clinic_id'];

            
            
             


           if($user_type == 4){ 


              $doctor_master = array('doctor_name'=>$name,
                                     'is_active'=>'Y',
                                     'dr_reg_no'=>$dr_reg_no
                                      );

              $insertId = $this->commondatamodel->insertSingleTableData('doctor_master',$doctor_master);
           
              $usermaster = array(
                                   'username'=>$user_name,
                                   'password'=>md5($userpassword),
                                   'is_active'=>'Y',
                                   'user_role'=>$user_type,
                                   'doctor_id'=> $insertId,
                                   'clinic_id'=>$clinic_id,
                                   'user_name'=>$name,
                                   
                                 );
   
             $insertId = $this->commondatamodel->insertSingleTableData('user_master',$usermaster);
 

           }else{

             $doctor_id  = $session['doctor_id'];

               $usermaster = array(
                                   'username'=>$user_name,
                                   'password'=>md5($userpassword),
                                   'is_active'=>'Y',
                                   'user_role'=>$user_type,
                                   'doctor_id'=> $doctor_id,
                                   'clinic_id'=>$clinic_id,
                                   'user_name'=>$name
                                 );
   
             $insertId = $this->commondatamodel->insertSingleTableData('user_master',$usermaster);

           }

              if($insertId){

                 $json_response = array(
                        "msg_status" =>1,
                        "msg_data" => "Saved Successfully"
                    );
              }else{

                $json_response = array(
                        "msg_status" =>0,
                        "msg_data" => "There is some problem.Try again"
                    );
              }
           
               
           

            header('Content-Type: application/json');
            echo json_encode( $json_response );
            exit;

            

        }
        else
        {
            redirect('login','refresh');
        }  


 }


 public function check_username(){

   $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {

                $username = $this->input->post('username');

                $alreadyexists = $this->createnewusewmodel->checkusername($username);

                if(!empty($alreadyexists)){

                   $json_response = array(
                        "msg_status" =>1,
                        "msg_data" => "User Name Already Used"
                    );

                }else{

                  $json_response = array(
                        "msg_status" =>0,
                        "msg_data" => ""
                    );
                }

               

           header('Content-Type: application/json');
            echo json_encode( $json_response );
            exit;
          
    
      
        }
        else
        {
            redirect('login','refresh');
        } 
 }


}