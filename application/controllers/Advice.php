<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Advice extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('commondatamodel','commondatamodel',TRUE);
        $this->load->model('Medicinecmodel','medicinecmodel',TRUE);
        $this->load->model('Advicemodel','advicemodel',TRUE);
    }


    public function index()
    {
        $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
            $session = $this->session->userdata('user_data');      
            $page = 'dashboard/admin_dashboard/advice/advice_list.php';
            
            
            $result['adviceList']=$this->advicemodel->getAllAdviceList();
            //pre( $result['DaysList']);
            $header = "";
            createbody_method($result, $page, $header, $session);
        }else{
            redirect('login','refresh');
        }
    }


    public function addAdvice()
    {
        $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
            if($this->uri->rsegment(3) == NULL)
            {
                $result['mode'] = "ADD";
                $result['btnText'] = "Save";
                $result['btnTextLoader'] = "Saving...";
                $adviceID = 0;
                $result['adviceEditdata'] = [];
                
                //getAllRecordWhereOrderBy($table,$where,$orderby)
                
                
            
            }
            else
            {
                $result['mode'] = "EDIT";
                $result['btnText'] = "Update";
                $result['btnTextLoader'] = "Updating...";
                $adviceID = $this->uri->segment(3);
                
            
                $where_advice_master = [
                    'advice_master.advice_id' => $adviceID
                ];

                // getSingleRowByWhereCls(tablename,where params)
                 $result['adviceEditdata'] = $this->commondatamodel->getSingleRowByWhereCls('advice_master',$where_advice_master); 

              

                //  pre($result['adviceEditdata']);exit;
  
            }

            $result['adviceID']=$adviceID;

            $header = "";
            $result['adviceType'] = array(
                                            'I' => 'I-General',
                                            'II' => 'II',
                                            'III' => 'III-Optional'
                                         );

         //   pre($result['adviceType']);
         
            
             $page = 'dashboard/admin_dashboard/advice/advice_add_edit';
            createbody_method($result, $page, $header,$session);
        }
        else
        {
            redirect('login','refresh');
        }
    }



     public function advice_action() {

        $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
            $json_response = array();
            $formData = $this->input->post('formDatas');
            parse_str($formData, $dataArry);
            
        
            $adviceID = trim(htmlspecialchars($dataArry['adviceID']));
            $mode = trim(htmlspecialchars($dataArry['mode']));
            $advice = trim(htmlspecialchars($dataArry['advice']));
            $advice_type = trim(htmlspecialchars($dataArry['advice_type']));
            $advice_options = trim(htmlspecialchars($dataArry['advice_options']));
            $old_advice_type = trim(htmlspecialchars($dataArry['old_advice_type']));
            $min_week = trim(htmlspecialchars($dataArry['min_week']));
            $max_week = trim(htmlspecialchars($dataArry['max_week']));

            if(isset($dataArry['need_adv_opt'])){
                $need_adv_opt = $dataArry['need_adv_opt'];
            }else{
                $need_adv_opt='N'; 
                $advice_options='';
            }

            if(isset($dataArry['need_week_opt'])){
                $need_week_opt = $dataArry['need_week_opt'];
            }else{
                $need_week_opt='N'; 
                $min_week=NULL;
                $max_week=NULL;
            }


            

           
 
                if($adviceID>0 && $mode=="EDIT")
                {
                    /*  EDIT MODE
                     *  -----------------
                    */

                     $upd_array = array(
                                        'advice' => $advice,        
                                        'is_advice_option' => $need_adv_opt,        
                                        'advice_options' => $advice_options,        
                                        'is_week_check' => $need_week_opt,        
                                        'min_week' => $min_week,        
                                        'max_week' => $max_week,        
                                        'created_on' => date('Y-m-d'), 
                                     );

                    if($old_advice_type!=$advice_type){

                        $lastslno = $this->advicemodel->getLastSlByType($advice_type);
                        $nextslno=$lastslno+1;

                        $upd_array = array(
                            'sl_no' => $nextslno,
                            'advice_type' => $advice_type,        
                            'advice' => $advice,        
                            'is_advice_option' => $need_adv_opt,        
                            'advice_options' => $advice_options,
                            'is_week_check' => $need_week_opt,        
                            'min_week' => $min_week,        
                            'max_week' => $max_week,         
                            'created_on' => date('Y-m-d'), 
                         );



                    }
                      $upd_where = array('advice_master.advice_id' => $adviceID);

                     $update = $this->commondatamodel->updateSingleTableData('advice_master',$upd_array,$upd_where);
                    
                    
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

                    $lastslno = $this->advicemodel->getLastSlByType($advice_type);
                    $nextslno=$lastslno+1;

                      $med_array = array(
                                          'sl_no' => $nextslno,
                                          'advice_type' => $advice_type,        
                                          'advice' => $advice,        
                                          'is_advice_option' => $need_adv_opt,
                                          'advice_options' => $advice_options, 
                                          'is_week_check' => $need_week_opt,        
                                          'min_week' => $min_week,        
                                          'max_week' => $max_week,         
                                          'created_on' => date('Y-m-d'),        
                                          'is_active' => 'Y',        
                                         );

                         $insertData = $this->commondatamodel->insertSingleTableData('advice_master',$med_array);

                    

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
                "advice_master.advice_id" => $updID
                );
            
            
        
            $update = $this->commondatamodel->updateSingleTableData('advice_master',$update_array,$where);
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