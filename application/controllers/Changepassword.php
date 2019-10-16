<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Changepassword extends CI_Controller {

	 public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('commondatamodel','commondatamodel',TRUE);
       
    }

 public function index()
    {
        $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
            $session = $this->session->userdata('user_data');      
            $page = 'dashboard/admin_dashboard/changepassword/changepassword.php';
            $result ='';
            $header = "";
            createbody_method($result, $page, $header, $session);
        }else{
            redirect('login','refresh');
        }
    }

   public function checkCurrentpassword(){

       $session = $this->session->userdata('user_data');

        if($this->session->userdata('user_data'))
        {
        
        $currpassword = md5($this->input->post('currpassword'));

        $where = array(
        	           'password'=>$currpassword,
                       );

       $checkpassword = $this->commondatamodel->getSingleRowByWhereCls('user_master',$where);
        
        if(!empty($checkpassword)){

        	$json_response = array(
                            "msg_status" => 1,
                            );
            
            }
            else{
                 $json_response = array(
                            "msg_status" => 0,
                            );
        }
            header('Content-Type: application/json');
            echo json_encode( $json_response );
            exit;
       

        
        }else{
            redirect('login','refresh');
        } 	

   }


   public function addnewpassword(){

   	  $session = $this->session->userdata('user_data');

        if($this->session->userdata('user_data'))
        {

          $currpassword = md5($this->input->post('currpassword'));
          $newpassword = md5($this->input->post('newpassword'));
         $where = array(
        	           'password'=>$currpassword,
                       );

         $checkpassword = $this->commondatamodel->getSingleRowByWhereCls('user_master',$where);

         if(!empty($checkpassword)){

            $where_user_master = array(
                                        'user_id'=>$session['userid'],

                                     );

            $data = array(
            	           'password'=>$newpassword,
                          );

           $update = $this->commondatamodel->updateSingleTableData('user_master',$data,$where_user_master);

           if($update){

           	$json_response = array(
                            "msg_status" => 1,
                            );
           }

           else{

           	 $json_response = array(
                            "msg_status" => 0,
                            );

           }

         }
         else{

         	$json_response = array(
                            "msg_status" => 0,
                            );
         }

         header('Content-Type: application/json');
            echo json_encode( $json_response );
            exit;

       } 
        else{
            redirect('login','refresh');
        }	
   } 

}