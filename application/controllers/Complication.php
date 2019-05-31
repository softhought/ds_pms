<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Complication extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('commondatamodel','commondatamodel',TRUE);
        $this->load->model('Complicationcmodel','complicationcmodel',TRUE);
    }


    public function index()
    {
        $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
            $session = $this->session->userdata('user_data');      
            $page = 'dashboard/admin_dashboard/complication/complication_list.php';
            
            
            $result['complicationList']=$this->complicationcmodel->getAllComplicationList();
            //pre( $result['DaysList']);
            $header = "";
            createbody_method($result, $page, $header, $session);
        }else{
            redirect('login','refresh');
        }
    }


    public function addComplication()
    {
        $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
            if($this->uri->rsegment(3) == NULL)
            {
                $result['mode'] = "ADD";
                $result['btnText'] = "Save";
                $result['btnTextLoader'] = "Saving...";
                $complicationID = 0;
                $result['complicationEditdata'] = [];
                
                //getAllRecordWhereOrderBy($table,$where,$orderby)
                
                
            
            }
            else
            {
                $result['mode'] = "EDIT";
                $result['btnText'] = "Update";
                $result['btnTextLoader'] = "Updating...";
                $complicationID = $this->uri->segment(3);
                
            
                $where_complication_master = [
                    'complication_master.complication_id' => $complicationID
                ];

                // getSingleRowByWhereCls(tablename,where params)
                 $result['complicationEditdata'] = $this->commondatamodel->getSingleRowByWhereCls('complication_master',$where_complication_master); 

              

                //  pre($result['complicationEditdata']);exit;
  
            }

            $result['complicationID']=$complicationID;

            $header = "";
 
             $page = 'dashboard/admin_dashboard/complication/complication_add_edit';
            createbody_method($result, $page, $header,$session);
        }
        else
        {
            redirect('login','refresh');
        }
    }



        public function complication_action() {

        $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
            $json_response = array();
            $formData = $this->input->post('formDatas');
            parse_str($formData, $dataArry);
            
        
            $complicationID = trim(htmlspecialchars($dataArry['complicationID']));
            $mode = trim(htmlspecialchars($dataArry['mode']));
            $complication_name = trim(htmlspecialchars($dataArry['complicationname']));
          
        
            
            


            if($complication_name!="")
            {
    
                
                
                if($complicationID>0 && $mode=="EDIT")
                {
                    /*  EDIT MODE
                     *  -----------------
                    */

                     $upd_array = array(
                                        'complication_name' => $complication_name,
                                     );
                      $upd_where = array('complication_master.complication_id' => $complicationID);

                     $update = $this->commondatamodel->updateSingleTableData('complication_master',$upd_array,$upd_where);
                    
                    
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
                                          'complication_name' => $complication_name,       
                                         );

                         $insertData = $this->commondatamodel->insertSingleTableData('complication_master',$med_array);

                    

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
                "complication_master.complication_id" => $updID
                );
            
            
        
            $update = $this->commondatamodel->updateSingleTableData('complication_master',$update_array,$where);
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