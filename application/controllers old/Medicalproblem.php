<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Medicalproblem extends CI_Controller {

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
            $page = 'dashboard/admin_dashboard/medical_problem/medical_problem_list.php';
            
            
            $result['medicalProblemList']=$this->commondatamodel->getAllDropdownData('medical_problem');
            //pre( $result['DaysList']);
            $header = "";
            createbody_method($result, $page, $header, $session);
        }else{
            redirect('login','refresh');
        }
    }


    public function addMedicalProblem()
    {
        $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
            if($this->uri->rsegment(3) == NULL)
            {
                $result['mode'] = "ADD";
                $result['btnText'] = "Save";
                $result['btnTextLoader'] = "Saving...";
                $medicalproblemID = 0;
                $result['complicationEditdata'] = [];
                
                //getAllRecordWhereOrderBy($table,$where,$orderby)
                
                
            
            }
            else
            {
                $result['mode'] = "EDIT";
                $result['btnText'] = "Update";
                $result['btnTextLoader'] = "Updating...";
                $medicalproblemID = $this->uri->segment(3);
                
            
                $where_medical_problem = [
                    'medical_problem.medicle_problem_id' => $medicalproblemID
                ];

                // getSingleRowByWhereCls(tablename,where params)
                 $result['medicalproblemEditdata'] = $this->commondatamodel->getSingleRowByWhereCls('medical_problem',$where_medical_problem); 

              

                //  pre($result['complicationEditdata']);exit;
  
            }

            $result['medicalproblemID']=$medicalproblemID;

            $header = "";
 
             $page = 'dashboard/admin_dashboard/medical_problem/medical_problem_add_edit';
            createbody_method($result, $page, $header,$session);
        }
        else
        {
            redirect('login','refresh');
        }
    }



        public function medicalproblem_action() {

        $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
            $json_response = array();
            $formData = $this->input->post('formDatas');
            parse_str($formData, $dataArry);
            
        
            $medicalproblemID = trim(htmlspecialchars($dataArry['medicalproblemID']));
            $mode = trim(htmlspecialchars($dataArry['mode']));
            $medicalproblem = trim(htmlspecialchars($dataArry['medicalproblem']));
          
        
            
            


            if($medicalproblem!="")
            {
    
                
                
                if($medicalproblemID>0 && $mode=="EDIT")
                {
                    /*  EDIT MODE
                     *  -----------------
                    */

                     $upd_array = array(
                                        'problem' => $medicalproblem,
                                     );
                      $upd_where = array('medical_problem.medicle_problem_id' => $medicalproblemID);

                     $update = $this->commondatamodel->updateSingleTableData('medical_problem',$upd_array,$upd_where);
                    
                    
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

            
                      $med_array = array(
                                          'problem' => $medicalproblem,     
                                         );

                         $insertData = $this->commondatamodel->insertSingleTableData('medical_problem',$med_array);

                    

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
                "medical_problem.medicle_problem_id" => $updID
                );
            
            
        
            $update = $this->commondatamodel->updateSingleTableData('medical_problem',$update_array,$where);
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

}// end of class