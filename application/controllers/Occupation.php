<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Occupation extends CI_Controller {

	 public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('commondatamodel','commondatamodel',TRUE);
        $this->load->model('Occupationmodel','occupationmodel',TRUE);
    }

  public function index()
    {
        $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
            $session = $this->session->userdata('user_data');      
            $page = 'dashboard/admin_dashboard/occupation/occupation_list.php';
            
            
            $result['occupationlist']=$this->occupationmodel->getallOccupation();
            //pre( $result['DaysList']);
            $header = "";
            createbody_method($result, $page, $header, $session);
        }else{
            redirect('login','refresh');
        }
    }

public function occupation_check(){
       
    $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
          
            $occupation = trim($this->input->post('occupation'));
            
            $where_occupation_master = array(
                           'occupation_master.occupation'=>$occupation

                          );

            $occupationdata = $this->commondatamodel->getSingleRowByWhereCls('occupation_master',$where_occupation_master);
           

            if(!empty($occupationdata)){
               
               $json_response = array(
                            "msg_status" => 1,
                            "msg_data" => "This occupation aleady exists..."
                        );
            
            }
            else{
                 $json_response = array(
                            "msg_status" => 0,
                            "msg_data" => "This occupation aleady exists..."
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


public function addOccupation()
    {
        $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
            if($this->uri->rsegment(3) == NULL)
            {
                $result['mode'] = "ADD";
                $result['btnText'] = "Save";
                $result['btnTextLoader'] = "Saving...";
                $occupationID = 0;
                $result['occupationEditdata'] = [];
                
                //getAllRecordWhereOrderBy($table,$where,$orderby)
                
                
            
            }
            else
            {
                $result['mode'] = "EDIT";
                $result['btnText'] = "Update";
                $result['btnTextLoader'] = "Updating...";
                $occupationID = $this->uri->segment(3);
                
            $where_occupation_master = [
                    'occupation_master.occupation_id' => $occupationID
                ];

                // getSingleRowByWhereCls(tablename,where params)
            $result['occupationEditdata'] = $this->commondatamodel->getSingleRowByWhereCls('occupation_master',$where_occupation_master);   
            //pre($result['medicineEditdata']);exit;
  
            }
            $result['occupationID']=$occupationID;
            $header = "";
                            
          
                 
            $page = 'dashboard/admin_dashboard/occupation/occupation_add_edit';
            createbody_method($result, $page, $header,$session);
        }
        else
        {
            redirect('login','refresh');
        }
    }


 public function occupation_action() {

        $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
            $json_response = array();
            $formData = $this->input->post('formDatas');
            parse_str($formData, $dataArry);
            
        
            $occupationID = trim(htmlspecialchars($dataArry['occupationID']));
            $mode = trim(htmlspecialchars($dataArry['mode']));
            $occupationename = trim(htmlspecialchars($dataArry['occupationename']));
            
        
            if($occupationename!="")
            {
    
                
                
                if($occupationID>0 && $mode=="EDIT")
                {
                    /*  EDIT MODE
                     *  -----------------
                    */

                     $upd_array = array(
                                        'occupation' => $occupationename,
                                        'is_active' => 'Y'
                                                                                
                                     );
                      $upd_where = array('occupation_master.occupation_id' => $occupationID);

                     $update = $this->commondatamodel->updateSingleTableData('occupation_master',$upd_array,$upd_where);
                    
                    
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

            
                      $occu_array = array(
                                          'occupation' => $occupationename,
                                           'is_active' => 'Y'
                                         );

                         $insertData = $this->commondatamodel->insertSingleTableData('occupation_master',$occu_array);

                    

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
                "occupation_master.occupation_id" => $updID
                );
            
            
        
            $update = $this->commondatamodel->updateSingleTableData('occupation_master',$update_array,$where);
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