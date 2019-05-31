<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Patientcase extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('commondatamodel','commondatamodel',TRUE);
         $this->load->model('Patientcasemodel','patientcasemodel',TRUE);
    }


    public function index()
    {
        $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
            $session = $this->session->userdata('user_data');      
            $page = 'dashboard/admin_dashboard/Case/case_add_edit';
            $result['headerText']="Setup Your Clinic Details";
            $result['DaysList']=$this->commondatamodel->getAllDropdownData('day_master');
            $result['clinicList']=$this->commondatamodel->getAllDropdownData('clinic_master');
            //pre( $result['DaysList']);
            $header = "";
            createbody_method($result, $page, $header, $session);
        }else{
            redirect('login','refresh');
        }
    }



    public function selecttreatment()
    {
        $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
            $session = $this->session->userdata('user_data');      
            $page = 'dashboard/admin_dashboard/Case/select_treatment_view';
             $result['genderList']=$this->commondatamodel->getAllDropdownData('gender_master');
             $result['bloodGroupList']=$this->commondatamodel->getAllDropdownData('blood_group');
             $result['mode'] = "ADD";
             $result['caseID']=0;
          
            //pre( $result['DaysList']);
            $header = "";
            createbody_method($result, $page, $header, $session);
        }else{
            redirect('login','refresh');
        }
    }


/* New case generate of new patient and existing patient */
      public function casegenetate_action() {

        $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
            $json_response = array();
            $formData = $this->input->post('formDatas');
            parse_str($formData, $dataArry);
            
        
            $caseID = trim(htmlspecialchars($dataArry['caseID']));
            $mode = trim(htmlspecialchars($dataArry['mode']));
            $majorgroup = trim(htmlspecialchars($dataArry['majorgroup']));
            $patient_reg_type = trim(htmlspecialchars($dataArry['patient_reg_type']));
            $selfmobile = trim(htmlspecialchars($dataArry['selfmobile']));
            $alternate_mobile = trim(htmlspecialchars($dataArry['alternate_mobile']));
            $patientname = trim(htmlspecialchars($dataArry['patientname']));
            $patientage = trim(htmlspecialchars($dataArry['patientage']));
            $bloodgroup = trim(htmlspecialchars($dataArry['bloodgroup']));

          //  pre($session);

           $clinic_id = $session['clinic_id'];
           $serial_type = 'NEWCASE';
           $currentYear = date('Y');
           $serial= $this->patientcasemodel->getLatestSerialNumberClinic($serial_type,$currentYear,$clinic_id);

           $where_clinic = array('clinic_id' => $clinic_id );
           $clinicData = $this->commondatamodel->getSingleRowByWhereCls('clinic_master',$where_clinic);

           $clinic_code =  $clinicData->cliniccode;

           $yearsmall = date('y');
           $caseno = $clinic_code.'/'.$serial.'/'.$yearsmall;



           

            if($selfmobile!="")
            {
    
                
                
                if($caseID>0 && $mode=="EDIT")
                {
                    /*  EDIT MODE
                     *  -----------------
                    */

                     $update=1;
                    
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

           
                      $patient_master_array = array(
                                          'reg_date' => date('Y-m-d'),       
                                          'selfmobile' => $selfmobile,       
                                          'alternate_mobile' => $alternate_mobile,       
                                          'patientname' => $patientname,       
                                          'patientage' => $patientage,       
                                          'bloodgroup' => $bloodgroup,       
                                          'patient_reg_type' => $patient_reg_type,       
                                          'created_on' => date('Y-m-d H:i:s'),       
                                         );

                         $insertData = $this->commondatamodel->insertSingleTableData('patient_master',$patient_master_array);


                         $case_master_array = array(
                                                     'case_no' => $caseno,
                                                     'patient_id' => $insertData,
                                                     'clinic_id' => $clinic_id,
                                                     'major_group' => $majorgroup,
                                                     'created_on' => date('Y-m-d'),
                                                      );

                          $case_master_id = $this->commondatamodel->insertSingleTableData('case_master',$case_master_array);

                    

                    if($insertData)
                    {
                        $json_response = array(
                            "msg_status" => 1,
                            "msg_data" => "Saved successfully",
                            "mode" => "ADD",
                            "case_master_id" => $case_master_id
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




    public function addPatientCase()
    {
        $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
            if($this->uri->rsegment(3) == NULL)
            {
                $result['mode'] = "ADD";
                $result['btnText'] = "Save";
                $result['btnTextLoader'] = "Saving...";
                $caseID = 0;
                $result['patientCaseEditdata'] = [];
                
                //getAllRecordWhereOrderBy($table,$where,$orderby)
                
                
            
            }
            else
            {
                $result['mode'] = "EDIT";
                $result['btnText'] = "Update";
                $result['btnTextLoader'] = "Updating...";
                $caseID = $this->uri->segment(3);
                
            
                $where_case_master = [
                    'case_master.case_id' => $caseID
                ];

                // getSingleRowByWhereCls(tablename,where params)
                 $result['patientCaseEditdata'] = $this->commondatamodel->getSingleRowByWhereCls('case_master',$where_case_master); 



                 $where_patient_master = [
                    'patient_master.patient_id' =>  $result['patientCaseEditdata']->patient_id
                ];

                // getSingleRowByWhereCls(tablename,where params)
                 $result['patientmasterEditdata'] = $this->commondatamodel->getSingleRowByWhereCls('patient_master',$where_patient_master); 

               //  pre($result['patientmasterEditdata']); exit;

                 
  
            }

                  $result['genderList']=$this->commondatamodel->getAllDropdownData('gender_master');
                  $result['bloodGroupList']=$this->commondatamodel->getAllDropdownData('blood_group');  
           // pre($result['patientCaseEditdata']);

            $result['caseID']=$caseID;

            $header = "";
 
             $page = 'dashboard/admin_dashboard/Case/patient_case_add_edit.php';
            createbody_method($result, $page, $header,$session);
        }
        else
        {
            redirect('login','refresh');
        }
    }


}// end of class
