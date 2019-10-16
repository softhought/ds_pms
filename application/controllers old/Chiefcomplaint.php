<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Chiefcomplaint extends CI_Controller {
    public $GY = NULL;
    
	 public function __construct() {


        parent::__construct();
        $this->load->library('session');
        $this->load->model('commondatamodel','commondatamodel',TRUE);
        $this->GY = & get_instance();
       
       
    }

  public function index()
    {
        $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
            $session = $this->session->userdata('user_data');      
            $page = 'dashboard/admin_dashboard/cheifcomplaint/cheifcomplaint_list';
            
            $result['gyncomplaintslist']= $this->commondatamodel->getAllDropdownData('gynaccology_chief_complaints');
                      
            $header = "";
            createbody_method($result, $page, $header, $session);
        }else{
            redirect('login','refresh');
        }
    }

    public function complaintname_check(){
       
    $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
          
            $complaintname = trim($this->input->post('complaintname'));
            
            $where_complaint = array(
                           'gynaccology_chief_complaints.complaint_name'=>$complaintname

                          );

            $complaintdata = $this->commondatamodel->getSingleRowByWhereCls('gynaccology_chief_complaints',$where_complaint);
           

            if(!empty($complaintdata)){
               
               $json_response = array(
                            "msg_status" => 1,
                            "msg_data" => "This Name aleady exists..."
                        );
            
            }
            else{
                 $json_response = array(
                            "msg_status" => 0,
                            "msg_data" => "This Name aleady exists..."
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

    public function addComplaint()
    {
        $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
            if($this->uri->rsegment(3) == NULL)
            {
                $result['mode'] = "ADD";
                $result['btnText'] = "Save";
                $result['btnTextLoader'] = "Saving...";
                $gynComplaintID = 0;
                $result['gyncomplaintEditdata'] = [];
                
                //getAllRecordWhereOrderBy($table,$where,$orderby)
                
                
            
            }
            else
            {
                $result['mode'] = "EDIT";
                $result['btnText'] = "Update";
                $result['btnTextLoader'] = "Updating...";
                $gynComplaintID = $this->uri->segment(3);
                
            $where_gynaccology_complaints = [
                    'gynaccology_chief_complaints.id' => $gynComplaintID
                ];

                // getSingleRowByWhereCls(tablename,where params)
            $result['gyncomplaintEditdata'] = $this->commondatamodel->getSingleRowByWhereCls('gynaccology_chief_complaints',$where_gynaccology_complaints);   
           
  
            }
            $result['gynComplaintID']=$gynComplaintID;
            $header = "";
               $where = array('is_parrent'=>'P');             
            $result['allcomplaints'] = $this->commondatamodel->getAllRecordWhere('gynaccology_chief_complaints',$where);
                 
            $page = 'dashboard/admin_dashboard/cheifcomplaint/cheifcomplaint_add_edit';
            createbody_method($result, $page, $header,$session);
        }
        else
        {
            redirect('login','refresh');
        }
    }

    public function addEditaction() {

        $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
            $json_response = array();
            $formData = $this->input->post('formDatas');
            parse_str($formData, $dataArry);
            
        
            $gynComplaintID = trim(htmlspecialchars($dataArry['gynComplaintID']));
            $mode = trim(htmlspecialchars($dataArry['mode']));
            $complaintsname = trim(htmlspecialchars($dataArry['complaintsname']));
            $is_parrent = trim(htmlspecialchars($dataArry['is_parrent']));
            
            $created_on = date('Y-m-d');

            if($is_parrent == 'C'){

               $parrent_id = trim(htmlspecialchars($dataArry['pname']));
            }
            else{
                $parrent_id='';
            }

           
            
            
        
            if($complaintsname!="")
            {
    
                
                
                if($gynComplaintID>0 && $mode=="EDIT")
                {
                    /*  EDIT MODE
                     *  -----------------
                    */

                     $upd_array = array(
                                        'complaint_name' => $complaintsname,
                                        'is_parrent'=> $is_parrent,
                                        'parrent_id'=> $parrent_id,
                                        'is_active' => 'Y'
                                        
                                                                                
                                     );
                      $upd_where = array('gynaccology_chief_complaints.id' => $gynComplaintID);

                     $update = $this->commondatamodel->updateSingleTableData('gynaccology_chief_complaints',$upd_array,$upd_where);
                    
                    
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

            
                      $gyncomp_array = array(
                                        'complaint_name' => $complaintsname,
                                        'is_parrent'=> $is_parrent,
                                        'parrent_id'=> $parrent_id,
                                        'is_active' => 'Y',
                                        'created_on'=>$created_on
                                         );

                         $insertData = $this->commondatamodel->insertSingleTableData('gynaccology_chief_complaints',$gyncomp_array);

                    

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

    public function parrentname($parrent_id){

        $where = array('id'=>$parrent_id);

            $parrent = $this->commondatamodel->getSingleRowByWhereCls('gynaccology_chief_complaints',$where);
      return $parrent;
    }
}