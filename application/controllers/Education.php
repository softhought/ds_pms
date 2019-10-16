<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Education extends CI_Controller {

	 public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('commondatamodel','commondatamodel',TRUE);
        $this->load->model('Educationmodel','educationmodel',TRUE);
    }

  public function index()
    {
        $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
            $session = $this->session->userdata('user_data');      
            $page = 'dashboard/admin_dashboard/education/education_list.php';
            
            
            $result['educationlist']=$this->educationmodel->getallEducation();
            //pre( $result['DaysList']);
            $header = "";
            createbody_method($result, $page, $header, $session);
        }else{
            redirect('login','refresh');
        }
    }

public function education_check(){
       
    $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
          
            $education = trim($this->input->post('education'));
            
            $where_education_master = array(
                           'education_qualification.qualification'=>$education

                          );

            $education = $this->commondatamodel->getSingleRowByWhereCls('education_qualification',$where_education_master);

            if(!empty($education)){

               $json_response = array(
                            "msg_status" => 1,
                            "msg_data" => "This Education aleady exists..."
                        );

            }
            else{
                 $json_response = array(
                            "msg_status" => 0,
                            "msg_data" => "This education not exists..."
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

public function addEducation()
    {
        $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
            if($this->uri->rsegment(3) == NULL)
            {
                $result['mode'] = "ADD";
                $result['btnText'] = "Save";
                $result['btnTextLoader'] = "Saving...";
                $educationID = 0;
                $result['educationEditdata'] = [];
                
                //getAllRecordWhereOrderBy($table,$where,$orderby)
                
                
            
            }
            else
            {
                $result['mode'] = "EDIT";
                $result['btnText'] = "Update";
                $result['btnTextLoader'] = "Updating...";
                $educationID = $this->uri->segment(3);
                
            $where_education_master = [
                    'education_qualification.qualification_id' => $educationID
                ];

               
            $result['educationEditdata'] = $this->commondatamodel->getSingleRowByWhereCls('education_qualification',$where_education_master);   
           
  
            }
            $result['educationID']=$educationID;
            $header = "";
                            
          
                 
            $page = 'dashboard/admin_dashboard/education/education_add_edit';
            createbody_method($result, $page, $header,$session);
        }
        else
        {
            redirect('login','refresh');
        }
    }


 public function education_action() {

        $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
            $json_response = array();
            $formData = $this->input->post('formDatas');
            parse_str($formData, $dataArry);
            
        
            $educationID = trim(htmlspecialchars($dataArry['educationID']));
            $mode = trim(htmlspecialchars($dataArry['mode']));
            $educationname = trim(htmlspecialchars($dataArry['educationname']));
            
        
            if($educationname!="")
            {
    
                
                
                if($educationID>0 && $mode=="EDIT")
                {
                    /*  EDIT MODE
                     *  -----------------
                    */

                     $upd_array = array(
                                        'qualification' => $educationname,
                                        'is_active' => 'Y'
                                                                                
                                     );
                      $upd_where = array('education_qualification.qualification_id' => $educationID);

                     $update = $this->commondatamodel->updateSingleTableData('education_qualification',$upd_array,$upd_where);
                    
                    
                    if($update)
                    {
                        $json_response = array(
                            "msg_status" => 1,
                            "msg_data" => "Updated successfully",
                            "mode" => "EDIT"
                        );
                    }
                    else
                    {
                        $json_response = array(
                            "msg_status" => 0,
                            "msg_data" => "There is some problem while updating ...Please try again."
                        );
                    }



                } // end if mode
                else
                {
                    /*  ADD MODE
                     *  -----------------
                    */

            
                      $edu_array = array(
                                          'qualification' => $educationname,
                                           'is_active' => 'Y'
                                         );

                         $insertData = $this->commondatamodel->insertSingleTableData('education_qualification',$edu_array);

                    

                    if($insertData)
                    {
                        $json_response = array(
                            "msg_status" => 1,
                            "msg_data" => "Saved successfully",
                            "mode" => "ADD"
                        );
                    }
                    else
                    {
                        $json_response = array(
                            "msg_status" => 1,
                            "msg_data" => "There is some problem.Try again"
                        );
                    }

                } // end add mode ELSE PART
 

            }
            else
            {
                $json_response = array(
                        "msg_status" =>0,
                        "msg_data" => "All fields are required"
                    );
            }

            header('Content-Type: application/json');
            echo json_encode( $json_response );
            exit;

            

        }
        else
        {
            redirect('adminpanel','refresh');
        }
    }




  public function setStatus(){
        $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
            $updID = trim($this->input->post('uid'));
            $setstatus = trim($this->input->post('setstatus'));
            

            $update_array  = array(
                "is_active" => $setstatus
                );
                
            $where = array(
                "education_qualification.qualification_id" => $updID
                );
            
            
        
            $update = $this->commondatamodel->updateSingleTableData('education_qualification',$update_array,$where);
            if($update)
            {
                $json_response = array(
                    "msg_status" => 1,
                    "msg_data" => "Status updated"
                );
            }
            else
            {
                $json_response = array(
                    "msg_status" => 0,
                    "msg_data" => "Failed to update"
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