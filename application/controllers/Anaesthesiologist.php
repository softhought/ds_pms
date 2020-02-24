<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Anaesthesiologist extends CI_Controller {

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
            $page = 'dashboard/admin_dashboard/anaesthesiologist/anaesthesiologist_list.php';
            
           
            $result['anaesthesiologistList']=$this->commondatamodel->getAllDropdownData('anaesthesiologist_master');
           
            $header = "";
            createbody_method($result, $page, $header, $session);
        }else{
            redirect('login','refresh');
        }
    }

     public function addAnaesthesiologist()
    {
        $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
            if($this->uri->rsegment(3) == NULL)
            {
                $result['mode'] = "ADD";
                $result['btnText'] = "Save";
                $result['btnTextLoader'] = "Saving...";
                $anaesthID = 0;
                $result['anaestheEditdata'] = [];
                
                //getAllRecordWhereOrderBy($table,$where,$orderby)
                
                
            
            }
            else
            {
                $result['mode'] = "EDIT";
                $result['btnText'] = "Update";
                $result['btnTextLoader'] = "Updating...";
                $anaesthID = $this->uri->segment(3);
                
            
                $where = [
                    'anaesthesiologist_master.id' => $anaesthID
                ];

                // getSingleRowByWhereCls(tablename,where params)
                 $result['anaestheEditdata'] = $this->commondatamodel->getSingleRowByWhereCls('anaesthesiologist_master',$where); 

              

                //  pre($result['medicineEditdata']);exit;
  
            }
              $result['anaesthID']=$anaesthID;
           
            $header = "";
           
         // pre($result['medicineCategoryList']);
         
            
             $page = 'dashboard/admin_dashboard/anaesthesiologist/anaesthesiologist_add_edit';
            createbody_method($result, $page, $header,$session);
        }
        else
        {
            redirect('login','refresh');
        }
    }


public function anaesthesiologist_action() {

        $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
            $json_response = array();
            $formData = $this->input->post('formDatas');
            parse_str($formData, $dataArry);
            
        
            $anaesthID = trim(htmlspecialchars($dataArry['anaesthID']));
            $mode = trim(htmlspecialchars($dataArry['mode']));
            $name = trim(htmlspecialchars($dataArry['name']));
            $degree = trim(htmlspecialchars($dataArry['degree']));
            
        
            if($name!="")
            {
    
                
                
                if($anaesthID>0 && $mode=="EDIT")
                {
                    /*  EDIT MODE
                     *  -----------------
                    */

                     $upd_array = array(
                                        'name' => $name,
                                        'degree'=>$degree,
                                        'is_active' => 'Y'
                                                                                
                                     );
                      $upd_where = array('anaesthesiologist_master.id' => $anaesthID);

                     $update = $this->commondatamodel->updateSingleTableData('anaesthesiologist_master',$upd_array,$upd_where);
                    
                    
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

            
                      $insert_array = array(
                                          'name' => $name,
                                          'degree'=>$degree,
                                           'is_active' => 'Y'
                                         );

                         $insertData = $this->commondatamodel->insertSingleTableData('anaesthesiologist_master',$insert_array);

                    

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
                "anaesthesiologist_master.id" => $updID
                );
            
            
        
            $update = $this->commondatamodel->updateSingleTableData('anaesthesiologist_master',$update_array,$where);
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