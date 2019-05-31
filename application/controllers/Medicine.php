<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Medicine extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('commondatamodel','commondatamodel',TRUE);
        $this->load->model('Medicinecmodel','medicinecmodel',TRUE);
    }


    public function index()
    {
        $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
            $session = $this->session->userdata('user_data');      
            $page = 'dashboard/admin_dashboard/medicine/medicine_list.php';
            
            
            $result['medicineList']=$this->medicinecmodel->getAllMedicineList();
            //pre( $result['DaysList']);
            $header = "";
            createbody_method($result, $page, $header, $session);
        }else{
            redirect('login','refresh');
        }
    }


    public function addMedicine()
    {
        $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
            if($this->uri->rsegment(3) == NULL)
            {
                $result['mode'] = "ADD";
                $result['btnText'] = "Save";
                $result['btnTextLoader'] = "Saving...";
                $medicineID = 0;
                $result['medicineEditdata'] = [];
                
                //getAllRecordWhereOrderBy($table,$where,$orderby)
                
                
            
            }
            else
            {
                $result['mode'] = "EDIT";
                $result['btnText'] = "Update";
                $result['btnTextLoader'] = "Updating...";
                $medicineID = $this->uri->segment(3);
                
            
                $where_medicine_master = [
                    'medicine_master.medicine_id' => $medicineID
                ];

                // getSingleRowByWhereCls(tablename,where params)
                 $result['medicineEditdata'] = $this->commondatamodel->getSingleRowByWhereCls('medicine_master',$where_medicine_master); 

              

                //  pre($result['medicineEditdata']);exit;
  
            }

            $result['medicineID']=$medicineID;

            $header = "";
            $where_medicine_type=[];
            $orderby='medicine_type.medicine_type';
            
            $result['medicineTypeList']=$this->commondatamodel->getAllRecordWhereOrderBy('medicine_type',$where_medicine_type,$orderby);

         //   pre($result['medicineTypeList']);
         
            
             $page = 'dashboard/admin_dashboard/medicine/medicine_add_edit';
            createbody_method($result, $page, $header,$session);
        }
        else
        {
            redirect('login','refresh');
        }
    }



        public function medicine_action() {

        $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
            $json_response = array();
            $formData = $this->input->post('formDatas');
            parse_str($formData, $dataArry);
            
        
            $medicineID = trim(htmlspecialchars($dataArry['medicineID']));
            $mode = trim(htmlspecialchars($dataArry['mode']));
            $medicinename = trim(htmlspecialchars($dataArry['medicinename']));
            $medicine_type = trim(htmlspecialchars($dataArry['medicine_type']));
        
            
            


            if($medicine_type!="")
            {
    
                
                
                if($medicineID>0 && $mode=="EDIT")
                {
                    /*  EDIT MODE
                     *  -----------------
                    */

                     $upd_array = array(
                                        'medicine_name' => $medicinename,
                                        'medicine_type' => $medicine_type,
                                      
                                        
                                     );
                      $upd_where = array('medicine_master.medicine_id' => $medicineID);

                     $update = $this->commondatamodel->updateSingleTableData('medicine_master',$upd_array,$upd_where);
                    
                    
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
                                          'medicine_name' => $medicinename,
                                          'medicine_type' => $medicine_type,        
                                         );

                         $insertData = $this->commondatamodel->insertSingleTableData('medicine_master',$med_array);

                    

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
                "medicine_master.medicine_id" => $updID
                );
            
            
        
            $update = $this->commondatamodel->updateSingleTableData('medicine_master',$update_array,$where);
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