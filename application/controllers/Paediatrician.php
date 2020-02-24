<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Paediatrician extends CI_Controller {

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
            $page = 'dashboard/admin_dashboard/paediatrician/paediatrician_list.php';
            
            
          
           $result['paediatricianList']=$this->commondatamodel->getAllDropdownData('paediatrician_master');
            //pre( $result['DaysList']);
            $header = "";
            createbody_method($result, $page, $header, $session);
        }else{
            redirect('login','refresh');
        }
    }

    public function addPaediatrician()
    {
        $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
            if($this->uri->rsegment(3) == NULL)
            {
                $result['mode'] = "ADD";
                $result['btnText'] = "Save";
                $result['btnTextLoader'] = "Saving...";
                $paediaID = 0;
                $result['paediatricianEditdata'] = [];
                
                //getAllRecordWhereOrderBy($table,$where,$orderby)
                
                
            
            }
            else
            {
                $result['mode'] = "EDIT";
                $result['btnText'] = "Update";
                $result['btnTextLoader'] = "Updating...";
                $paediaID = $this->uri->segment(3);
                
            
                $where = [
                    'paediatrician_master.id' => $paediaID
                ];

                // getSingleRowByWhereCls(tablename,where params)
                 $result['paediatricianEditdata'] = $this->commondatamodel->getSingleRowByWhereCls('paediatrician_master',$where); 
              

                 
            }

           $result['paediaID']=$paediaID;
           $header='';
                 
            
             $page = 'dashboard/admin_dashboard/paediatrician/paediatrician_add_edit';
            createbody_method($result, $page, $header,$session);
        }
        else
        {
            redirect('login','refresh');
        }
    }

public function paediatrician_action() {

        $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
            $json_response = array();
            $formData = $this->input->post('formDatas');
            parse_str($formData, $dataArry);
            
        
            $paediaID = trim(htmlspecialchars($dataArry['paediaID']));
            $mode = trim(htmlspecialchars($dataArry['mode']));
            $name = trim(htmlspecialchars($dataArry['name']));
            $degree = trim(htmlspecialchars($dataArry['degree']));
            
        
            if($name!="")
            {
    
                
                
                if($paediaID>0 && $mode=="EDIT")
                {
                    /*  EDIT MODE
                     *  -----------------
                    */

                     $upd_array = array(
                                        'name' => $name,
                                        'degree'=>$degree,
                                        'is_active' => 'Y'
                                                                                
                                     );
                      $upd_where = array('paediatrician_master.id' => $paediaID);

                     $update = $this->commondatamodel->updateSingleTableData('paediatrician_master',$upd_array,$upd_where);
                    
                    
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



                         $insertData = $this->commondatamodel->insertSingleTableData('paediatrician_master',$insert_array);

                    

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
                "paediatrician_master.id" => $updID
                );
            
            
        
            $update = $this->commondatamodel->updateSingleTableData('paediatrician_master',$update_array,$where);
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