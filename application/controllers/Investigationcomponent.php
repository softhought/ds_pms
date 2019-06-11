<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Investigationcomponent extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('commondatamodel','commondatamodel',TRUE);
        $this->load->model('Investigationcomponentmodel','invcompmodel',TRUE);
    }


    public function index()
    {
        $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
            $session = $this->session->userdata('user_data');      
            $page = 'dashboard/admin_dashboard/investigation_component/investigation_component_list.php';
            
            
            $result['investigationList']=$this->invcompmodel->getAllInvestigationList();
            //pre( $result['DaysList']);
            $header = "";
            createbody_method($result, $page, $header, $session);
        }else{
            redirect('login','refresh');
        }
    }



    public function addInvestigation()
    {
        $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
            if($this->uri->rsegment(3) == NULL)
            {
                $result['mode'] = "ADD";
                $result['btnText'] = "Save";
                $result['btnTextLoader'] = "Saving...";
                $investigationID = 0;
                $result['investigationEditdata'] = [];
                
                //getAllRecordWhereOrderBy($table,$where,$orderby)
                
                
            
            }
            else
            {
                $result['mode'] = "EDIT";
                $result['btnText'] = "Update";
                $result['btnTextLoader'] = "Updating...";
                $investigationID = $this->uri->segment(3);
                
            
                $where_investigation_component= [
                    'investigation_component.investigation_comp_id' => $investigationID
                ];

                // getSingleRowByWhereCls(tablename,where params)
                 $result['investigationEditdata'] = $this->commondatamodel->getSingleRowByWhereCls('investigation_component',$where_investigation_component); 

              

                //  pre($result['investigationEditdata']);exit;
  
            }

            $result['investigationID']=$investigationID;

            $header = "";
 
             $page = 'dashboard/admin_dashboard/investigation_component/investigation_component_add_edit';
            createbody_method($result, $page, $header,$session);
        }
        else
        {
            redirect('login','refresh');
        }
    }


 public function investigation_action() {

        $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
            $json_response = array();
            $formData = $this->input->post('formDatas');
            parse_str($formData, $dataArry);
            
        
            $investigationID = trim(htmlspecialchars($dataArry['investigationID']));
            $mode = trim(htmlspecialchars($dataArry['mode']));
            $inv_component_name = trim(htmlspecialchars($dataArry['inv_component_name']));
            $unit = trim(htmlspecialchars($dataArry['unit']));
          
        
            
            


            if($inv_component_name!="")
            {
    
                
                
                if($investigationID>0 && $mode=="EDIT")
                {
                    /*  EDIT MODE
                     *  -----------------
                    */

                     $upd_array = array(
                                        'inv_component_name' => $inv_component_name,
                                        'unit' => $unit,
                                     );
                      $upd_where = array('investigation_component.investigation_comp_id' => $investigationID);

                     $update = $this->commondatamodel->updateSingleTableData('investigation_component',$upd_array,$upd_where);
                    
                    
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

            
                      $inst_array = array(
                                           'inv_component_name' => $inv_component_name,
                                           'unit' => $unit,       
                                         );

                         $insertData = $this->commondatamodel->insertSingleTableData('investigation_component',$inst_array);

                    

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



}// end of class