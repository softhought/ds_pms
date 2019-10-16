<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Surgery extends CI_Controller {

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
            $page = 'dashboard/admin_dashboard/surgery/surgery_list.php';
            
            
            $result['surgeryList']=$this->commondatamodel->getAllDropdownData('surgery_master');
            //pre( $result['DaysList']);
            $header = "";
            createbody_method($result, $page, $header, $session);
        }else{
            redirect('login','refresh');
        }
    }

    public function surgery_check(){
       
    $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
          
            $surgery = trim($this->input->post('surgery'));
            
            
            $where_surgery_master = array(
                           'surgery_master.surgery_name'=>$surgery

                          );

            $surgerydata = $this->commondatamodel->getSingleRowByWhereCls('surgery_master',$where_surgery_master);
           
            //print_r($orgsurgeryname);exit;
            if(!empty($surgerydata)){

              
               $json_response = array(
                            "msg_status" => 1,
                            "msg_data" => "This Surgery aleady exists..."
                        );
            

            }
            else{
                 $json_response = array(
                            "msg_status" => 0,
                            "msg_data" => "This Surgery aleady exists..."
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


public function addsurgery()
    {
        $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
            if($this->uri->rsegment(3) == NULL)
            {
                $result['mode'] = "ADD";
                $result['btnText'] = "Save";
                $result['btnTextLoader'] = "Saving...";
                $surgeryID = 0;
                $result['surgeryEditdata'] = [];
                
                //getAllRecordWhereOrderBy($table,$where,$orderby)
                
                
            
            }
            else
            {
                $result['mode'] = "EDIT";
                $result['btnText'] = "Update";
                $result['btnTextLoader'] = "Updating...";
                $surgeryID = $this->uri->segment(3);
                
            $where_medicine_category = [
                    'surgery_master.surgery_id' => $surgeryID
                ];

                // getSingleRowByWhereCls(tablename,where params)
            $result['surgeryEditdata'] = $this->commondatamodel->getSingleRowByWhereCls('surgery_master',$where_medicine_category);   
            //pre($result['medicineEditdata']);exit;
  
            }
            $result['surgeryID']=$surgeryID;
            $header = "";
                            
          
                 
            $page = 'dashboard/admin_dashboard/surgery/surgery_add_edit.php';
            createbody_method($result, $page, $header,$session);
        }
        else
        {
            redirect('login','refresh');
        }
    }

    public function surgeryaction() {

        $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
            $json_response = array();
            $formData = $this->input->post('formDatas');
            parse_str($formData, $dataArry);
            
        
            $surgeryID = trim(htmlspecialchars($dataArry['surgeryID']));
            $mode = trim(htmlspecialchars($dataArry['mode']));
            $surgeryname = trim(htmlspecialchars($dataArry['surgeryname']));
            
        
            if($surgeryname!="")
            {
    
                
                
                if($surgeryID>0 && $mode=="EDIT")
                {
                    /*  EDIT MODE
                     *  -----------------
                    */

                     $upd_array = array(
                                        'surgery_name' => $surgeryname

                                                                                
                                     );
                      $upd_where = array('surgery_master.surgery_id' => $surgeryID);

                     $update = $this->commondatamodel->updateSingleTableData('surgery_master',$upd_array,$upd_where);
                    
                    
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

            
                      $surgery_array = array(
                                           'surgery_name' => $surgeryname,
                                           'is_textfield'=>'N'
                                          
                                         );

                         $insertData = $this->commondatamodel->insertSingleTableData('surgery_master',$surgery_array);

                    

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

   } 