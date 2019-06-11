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
            $page = 'dashboard/admin_dashboard/case/case_add_edit';
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
            $page = 'dashboard/admin_dashboard/case/select_treatment_view';
             $result['genderList']=$this->commondatamodel->getAllDropdownData('gender_master');
             $result['bloodGroupList']=$this->commondatamodel->getAllDropdownData('blood_group');
             $result['allCaseList']=$this->patientcasemodel->getAllCaseDetails();
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
            $patientgender = trim(htmlspecialchars($dataArry['gender']));
            $bloodgroup = trim(htmlspecialchars($dataArry['bloodgroup']));

          //  pre($session);





           

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


                       /* generate new case number */


                       $clinic_id = $session['clinic_id'];
                       $serial_type = 'NEWCASE';
                       $currentYear = date('Y');
                       $serial= $this->patientcasemodel->getLatestSerialNumberClinic($serial_type,$currentYear,$clinic_id);

                       $where_clinic = array('clinic_id' => $clinic_id );
                       $clinicData = $this->commondatamodel->getSingleRowByWhereCls('clinic_master',$where_clinic);

                       $clinic_code =  $clinicData->cliniccode;

                       $yearsmall = date('y');
                       $caseno = $clinic_code.'/'.$serial.'/'.$yearsmall;

           
                       $patient_master_array = array(
                                          'reg_date' => date('Y-m-d'),       
                                          'selfmobile' => $selfmobile,       
                                          'alternate_mobile' => $alternate_mobile,       
                                          'patientname' => $patientname,       
                                          'patientage' => $patientage,       
                                          'patientgender' => $patientgender,       
                                          'bloodgroup' => $bloodgroup,            
                                          'created_on' => date('Y-m-d H:i:s'),       
                                         );

                         $insertData = $this->commondatamodel->insertSingleTableData('patient_master',$patient_master_array);


                         $case_master_array = array(
                                                     'case_no' => $caseno,
                                                     'patient_id' => $insertData,
                                                     'clinic_id' => $clinic_id,
                                                     'major_group' => $majorgroup,
                                                     'patient_reg_type' => $patient_reg_type,
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



/* New case generate of existing patient */
      public function existingpatient_casegenetate() {

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
            $previous_case_id = trim(htmlspecialchars($dataArry['previous_case_id']));
            $patient_id = trim(htmlspecialchars($dataArry['patient_id']));
            $selfmobile = trim(htmlspecialchars($dataArry['extpselfmobile']));
            $alternate_mobile = trim(htmlspecialchars($dataArry['extpalternate_mobile']));
            $patientname = trim(htmlspecialchars($dataArry['extppatientname']));
            $patientage = trim(htmlspecialchars($dataArry['extppatientage']));
            $patientgender = trim(htmlspecialchars($dataArry['extpgender']));
            $bloodgroup = trim(htmlspecialchars($dataArry['extpbloodgroup']));

          //  pre($session);





           

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


                       /* generate new case number */


                       $clinic_id = $session['clinic_id'];
                       $serial_type = 'NEWCASE';
                       $currentYear = date('Y');
                       $serial= $this->patientcasemodel->getLatestSerialNumberClinic($serial_type,$currentYear,$clinic_id);

                       $where_clinic = array('clinic_id' => $clinic_id );
                       $clinicData = $this->commondatamodel->getSingleRowByWhereCls('clinic_master',$where_clinic);

                       $clinic_code =  $clinicData->cliniccode;

                       $yearsmall = date('y');
                       $caseno = $clinic_code.'/'.$serial.'/'.$yearsmall;

           

                         $case_master_array = array(
                                                     'case_no' => $caseno,
                                                     'patient_id' => $patient_id,
                                                     'clinic_id' => $clinic_id,
                                                     'major_group' => $majorgroup,
                                                     'patient_reg_type' => $patient_reg_type,
                                                     'previous_case_id' => $previous_case_id,
                                                     'created_on' => date('Y-m-d'),
                                                      );

                          $case_master_id = $this->commondatamodel->insertSingleTableData('case_master',$case_master_array);

                             $update_array  = array(
     
                                          'selfmobile' => $selfmobile,       
                                          'alternate_mobile' => $alternate_mobile,       
                                          'patientname' => $patientname,       
                                          'patientage' => $patientage,       
                                          'patientgender' => $patientgender,       
                                          'bloodgroup' => $bloodgroup,             
                                          'last_modified' => date('Y-m-d H:i:s'),    
                                    );
                              
                          $where_patient_master = array(
                              "patient_master.patient_id" => $patient_id
                              );
                          
                          
                      
                          $update = $this->commondatamodel->updateSingleTableData('patient_master',$update_array,$where_patient_master);

                    

                    if($case_master_id)
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

                echo "Add block";
                
                exit;
            
            }
            else
            {
                $result['mode'] = "EDIT";
                $result['btnText'] = "Update";
                $result['btnTextLoader'] = "Updating...";
                $caseID = $this->uri->segment(3);
                $result['antenantalCaseEditdata']=[];
            
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

                 $where_antenatel_master = [
                    'antenantal_master.case_master_id' => $caseID
                 ];

                // getSingleRowByWhereCls(tablename,where params)
                 $result['antenantalCaseEditdata'] = $this->commondatamodel->getSingleRowByWhereCls('antenantal_master',$where_antenatel_master); 

                // pre( $result['antenantalCaseEditdata']);exit;

                         if ($result['antenantalCaseEditdata']) {
                            $result['antenantalmode'] = "EDIT";
                            $result['antenantalbtnText'] = "Update";
                            $result['antenantalbtnTextLoader'] = "Updating...";
                            $result['antenantalID']=$result['antenantalCaseEditdata']->antenantal_id;
                            
                         }else{
                            $result['antenantalmode'] = "ADD";
                            $result['antenantalbtnText'] = "Save";
                            $result['antenantalbtnTextLoader'] = "Saving...";
                            $result['antenantalID'] = 0;

                         }
                 
  
               }
                  $result['OnetoOtherDropDown'] = array('1','2','3','4','5','6','7','8','9','10','Others');
                  $result['OnetoTenDropDown'] = array('1','2','3','4','5','6','7','8','9','10');
                  $result['ZerotoTwentyDropDown'] = array('0','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20');
                  
                //  pre( $result['OnetoOtherDropDown']);exit;
                  $result['genderList']=$this->commondatamodel->getAllDropdownData('gender_master');
                  $result['bloodGroupList']=$this->commondatamodel->getAllDropdownData('blood_group');  
                  $result['occupationList']=$this->commondatamodel->getAllDropdownData('occupation_master');  
                  $result['educationList']=$this->commondatamodel->getAllDropdownData('education_qualification');
                  $result['mensuMedList']=$this->patientcasemodel->getMenstrualLastMedecineDetails($caseID);
                  $result['previousChildBirthList']=$this->patientcasemodel->getPreviousChildBirthDetails($caseID);
                  $result['complicationList']=$this->commondatamodel->getAllDropdownData('complication_master');
                  $result['medicalProblemList']=$this->commondatamodel->getAllDropdownData('medical_problem');
                  $result['genderList']=$this->commondatamodel->getAllDropdownData('gender_master');

                  $result['deliveryType'] = array('CS' => 'CS','ND' => 'ND','SE' => 'S/E',);

                  $result['menstrualCycleType'] = array('Regular','Irregular');
                  $result['menstrualCycleFlow'] = array('Average','Moderate','Severe');

                  $result['diseasesList']=$this->commondatamodel->getAllDropdownData('diseases_master');
                //  $result['surgeryList']=$this->commondatamodel->getAllDropdownData('surgery_master');


                    $result['surgeryList']=$this->patientcasemodel->getSurgeryDetails($caseID);
                    $result['familyComponentList']=$this->patientcasemodel->getFamilyComponentDetails($caseID);
                    $result['vaccinationList']=$this->commondatamodel->getAllDropdownData('vaccination_master');
                    $result['highriskList']=$this->commondatamodel->getAllDropdownData('high_risk_master');
                    $result['regularMedicineList']=$this->patientcasemodel->getRegularMedecineDetails($caseID);

                    $result['pallor'] = array('Nil','Mild','Mod','Severe' );
                    $result['icterus'] = array('Nil','Present');

                    $result['examinationLatestData']=$this->patientcasemodel->getExaminationLatestByCase($caseID);
                    $result['examinationAllData']=$this->patientcasemodel->getAllExaminationLatestByCase($caseID);
                    $result['investigationLatestData']=$this->patientcasemodel->getInvestigationLatestByCase($caseID);

                    $result['clinicList']=$this->commondatamodel->getAllDropdownData('clinic_master');// need to be removed

                    $result['investigationAllData']=$this->patientcasemodel->getAllInvestigationByCase($caseID);



                   
                  // $arrd=explode(",",'.$test.');
                  //                     pre($arrd);
                                    
                  //                     if (in_array(5, $arrd)) {
                  //                         echo 'selected';
                  //                     }

                  // exit;

          //  pre($result['examinationAllData']);exit;

            $result['caseID']=$caseID;

            $header = "";
 
             $page = 'dashboard/admin_dashboard/case/patient_case_add_edit.php';
            createbody_method($result, $page, $header,$session);
        }
        else
        {
            redirect('login','refresh');
        }
    }



/* Update patient basic information*/



    public function updatePatientBasicInfo(){
        $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {

            $json_response = array();
            $formData = $this->input->post('formDatas');
            parse_str($formData, $dataArry);

            $patientID = trim(htmlspecialchars($dataArry['patientID']));
            $mode = trim(htmlspecialchars($dataArry['mode']));
            $selfmobile = trim(htmlspecialchars($dataArry['selfmobile']));
            $alternate_mobile = trim(htmlspecialchars($dataArry['alternate_mobile']));
            $patientname = trim(htmlspecialchars($dataArry['patientname']));
            $patientage = trim(htmlspecialchars($dataArry['patientage']));
            $patientgender = trim(htmlspecialchars($dataArry['gender']));
            $bloodgroup = trim(htmlspecialchars($dataArry['bloodgroup']));
            
            $update_array  = array(
     
                                          'selfmobile' => $selfmobile,       
                                          'alternate_mobile' => $alternate_mobile,       
                                          'patientname' => $patientname,       
                                          'patientage' => $patientage,       
                                          'patientgender' => $patientgender,       
                                          'bloodgroup' => $bloodgroup,             
                                          'last_modified' => date('Y-m-d H:i:s'),    
                                    );
                
            $where = array(
                "patient_master.patient_id" => $patientID
                );
            
            
        
            $update = $this->commondatamodel->updateSingleTableData('patient_master',$update_array,$where);
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





    /* save and update antenatel information */



    /* New case generate of new patient and existing patient */
      public function antenantalinfo_action() {

        $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
            $json_response = array();
            $formData = $this->input->post('formDatas');
            parse_str($formData, $dataArry);

       
            $caseID = trim(htmlspecialchars($dataArry['caseID']));
            $antenantalID = $dataArry['antenantalID'];
            $antenantalmode = $dataArry['antenantalmode'];
            $wifebloodgroup = $dataArry['wifebloodgroup'];
            $wifeoccupation = $dataArry['wifeoccupation'];
            $wifeeducation = $dataArry['wifeeducation'];

            $husbandbloodgroup = $dataArry['husbandbloodgroup'];
            $husbandoccupation = $dataArry['husbandoccupation'];
            $husbandeducation = $dataArry['husbandeducation'];
            $marriedforyear = $dataArry['marriedforyear'];
            $tryingfor = $dataArry['tryingfor'];

            if (isset($dataArry['medicine_concieve'])) {
                $medicine_concieve = '';
                foreach ($dataArry['medicine_concieve'] as  $value) {
                  $medicine_concieve.=$value.',';
                }
                $medicine_concieve = substr($medicine_concieve, 0, -1);
                 $medicine_concieve;
            }else{
                 $medicine_concieve = '';
            }


            if (isset($dataArry['procedure_concieve'])) {
                $procedure_concieve = '';
                foreach ($dataArry['procedure_concieve'] as  $value) {
                  $procedure_concieve.=$value.',';
                }
                $procedure_concieve = substr($procedure_concieve, 0, -1);
                $procedure_concieve;
            }else{
                $procedure_concieve = '';
            }

            if ($dataArry['procedure_date']!='') {
                 $procedure_date = date('Y-m-d', strtotime($dataArry['procedure_date']));
            }else{
                $procedure_date = NULL; 
            }



            $cigarette_addiction = $dataArry['cigarette_addiction'];
            $cigarette_per_day = $dataArry['cigarette_per_day'];
            $alcohol_addiction = $dataArry['alcohol_addiction'];
            $other_addiction = $dataArry['other_addiction'];

            if ($dataArry['lmp_date']!='') {
                 $lmp_date = date('Y-m-d', strtotime($dataArry['lmp_date']));
            }else{
                $lmp_date = NULL; 
            }

            if ($dataArry['edd_date']!='') {
                 $edd_date = date('Y-m-d', strtotime($dataArry['edd_date']));
            }else{
                $edd_date = NULL; 
            }

            $edd_week = $dataArry['edd_week'];
            $edd_days = $dataArry['edd_days'];

            if ($dataArry['usg_date']!='') {
                 $usg_date = date('Y-m-d', strtotime($dataArry['usg_date']));
            }else{
                $usg_date = NULL; 
            }

             $termdelivery = $dataArry['termdelivery'];
             $paritypreterm = $dataArry['paritypreterm'];
             $parityabortion = $dataArry['parityabortion'];
             $parityissue = $dataArry['parityissue'];
             $gravida_parity = $dataArry['gravida_parity'];
             $spontaneous_abortion = $dataArry['spontaneous_abortion'];

             $menstrual_cycle_type = $dataArry['menstrual_cycle_type'];
             $menstrual_flow = $dataArry['menstrual_flow'];
             $menstrual_duration_days = $dataArry['menstrual_duration_days'];
             $menstrual_cycle_days = $dataArry['menstrual_cycle_days'];

             $sel_diseasesValues = $dataArry['sel_diseasesValues'];
             $isOtherDiseases = $dataArry['isOtherDiseases'];
             $other_diseases = $dataArry['other_diseases'];
             if ($isOtherDiseases=='N') {
              $other_diseases=NULL;
             }


               $surgery_id = $dataArry['surgery_id'];
               $yearback = $dataArry['yearback'];
               $other_surgery_name = $dataArry['other_surgery_name'];

               $any_allergy = $dataArry['any_allergy'];

               if (isset($dataArry['vaccination'])) {
                $vaccination = '';
                foreach ($dataArry['vaccination'] as  $value) {
                  $vaccination.=$value.',';
                }
                $vaccination = substr($vaccination, 0, -1);
                
                 }else{
                 $vaccination = '';
               }

     $familycomponent = $dataArry['familycomponent'];
     $other_component_name = $dataArry['other_component_name'];
     $ischeckfatherhist = $dataArry['ischeckfatherhist'];
     $ischeckmotherhist = $dataArry['ischeckmotherhist'];

     

     $highriskValues = $dataArry['highriskValues'];
     $isOtherHighrisk = $dataArry['isOtherHighrisk'];
     $highrisk_others = $dataArry['highrisk_others'];
     if ($isOtherHighrisk=='N') {
       $highrisk_others='';
     }


      $exam_height = $dataArry['exam_height'];
      $exam_weight = $dataArry['exam_weight'];
      $exam_bmi = $dataArry['exam_bmi'];
      $exam_pluse = $dataArry['exam_pluse'];
      $exam_bp_systolic = $dataArry['exam_bp_systolic'];
      $exam_bp_diastolic = $dataArry['exam_bp_diastolic'];
      $exam_pallor = $dataArry['exam_pallor'];
      $exam_icterus = $dataArry['exam_icterus'];
      $exam_thyroid = $dataArry['exam_thyroid'];
      $exam_teeth = $dataArry['exam_teeth'];
      $exam_cus = $dataArry['exam_cus'];
      $exam_chest = $dataArry['exam_chest'];
      $ischangeExamination = $dataArry['ischangeExamination'];



/* ----------------------------------- Details data insert only -------------------------------*/

/* insert into examination */
        if ($ischangeExamination=='Y') {
       
       $mensumedicine_array = array(
                                     'case_master_id' => $caseID,                                  
                                     'exam_height' => $exam_height,                                  
                                     'exam_weight' => $exam_weight,                                  
                                     'exam_bmi' => $exam_bmi,                                  
                                     'exam_pluse' => $exam_pluse,                                  
                                     'exam_bp_systolic' => $exam_bp_systolic,                                  
                                     'exam_bp_diastolic' => $exam_bp_diastolic,                                  
                                     'exam_pallor' => $exam_pallor,                                  
                                     'exam_icterus' => $exam_icterus,                                  
                                     'exam_thyroid' => $exam_thyroid,                                  
                                     'exam_teeth' => $exam_teeth,                                  
                                     'exam_cus' => $exam_cus,                                  
                                     'exam_chest' => $exam_chest,                                  
                                     'created_on' => date('Y-m-d'), 
                                     );

                           $insertExamination=$this->commondatamodel->insertSingleTableData('examination_master',$mensumedicine_array);


                          }


      $ischangeInvestigation = $dataArry['ischangeInvestigation'];
      $inve_hb = $dataArry['inve_hb'];
      if ($dataArry['inve_hb_date']!='') {
        $hb_date = date("Y-m-d", strtotime($dataArry['inve_hb_date']));
      }else{
        $hb_date=NULL;
      }
     
      $inve_tc = $dataArry['inve_tc'];
      if ($dataArry['inve_tc_date']!='') {
      $tc_date = date("Y-m-d", strtotime($dataArry['inve_tc_date']));
      }else{ $tc_date=NULL; }

      $inve_dc = $dataArry['inve_dc'];
      if ($dataArry['inve_dc_date']!='') {
      $inve_dc_date = date("Y-m-d", strtotime($dataArry['inve_dc_date']));
      }else{ $inve_dc_date=NULL; }

      $inve_fbs = $dataArry['inve_fbs'];
      if ($dataArry['inve_fbs_date']!='') {
      $inve_fbs_date = date("Y-m-d", strtotime($dataArry['inve_fbs_date']));
      }else{ $inve_fbs_date=NULL; }

      $ppbs_result = $dataArry['ppbs_result'];
      if ($dataArry['ppbs_date']!='') {
      $ppbs_date = date("Y-m-d", strtotime($dataArry['ppbs_date']));
      }else{ $ppbs_date=NULL; }

      $vdrl_result = $dataArry['vdrl_result'];
      if ($dataArry['vdrl_date']!='') {
      $vdrl_date = date("Y-m-d", strtotime($dataArry['vdrl_date']));
      }else{ $vdrl_date=NULL; }


/* insert into investigation_record */

  if ($ischangeInvestigation=='Y') {

$investigation_record_array = array(
                                    'case_master_id' => $caseID, 
                                    'created_on' => date('Y-m-d'), 
                                    'hb_result' => $inve_hb, 
                                    'hb_date' => $hb_date, 
                                    'tc_result' => $inve_tc, 
                                    'tc_date' => $tc_date, 
                                    'dc_result' => $inve_dc, 
                                    'dc_date' => $inve_dc_date, 
                                    'fbs_result' => $inve_fbs, 
                                    'fbs_date' => $inve_fbs_date, 
                                    'ppbs_result' => $ppbs_result, 
                                    'ppbs_date' => $ppbs_date, 
                                    'vdrl_result' => $vdrl_result, 
                                    'vdrl_date' => $vdrl_date, 
                                    );

 $insertInvestigation=$this->commondatamodel->insertSingleTableData('investigation_record_master',$investigation_record_array);

}





/* ----------------------------------- Details data delete then insert -------------------------------*/

  $where_caseId = array('case_master_id' => $caseID);


                       // insert menstrual_medecine_details data

                     

                     $deleteMesMed=$this->commondatamodel->deleteTableData('menstrual_medecine_details',$where_caseId);

                      if(isset($dataArry['mensumedicine'])) {

                         $mensumedicine = $dataArry['mensumedicine'];
                         $mensumedicineduration = $dataArry['mensumedicineduration'];

                         

                          for ($i=0; $i < count($dataArry['mensumedicine']); $i++) { 
                           
                           $mensumedicine_array = array(
                                                        'medicine_name' => $mensumedicine[$i], 
                                                        'medicine_duration' => $mensumedicineduration[$i], 
                                                        'case_master_id' => $caseID, 
                                                        'created_on' => date('Y-m-d'), 
                                                      );

                           $insertMesMed=$this->commondatamodel->insertSingleTableData('menstrual_medecine_details',$mensumedicine_array);

                          }
                       
                      }


                      /* insert value into child previous birth history */

                       
                        $deleteMesMed=$this->commondatamodel->deleteTableData('previous_child_birth_history',$where_caseId);
                         if(isset($dataArry['complicationChildValues'])) {

                           $birthplace = $dataArry['birthplace'];
                           $selectYear = $dataArry['selectYear'];
                           $complicationChildValues = $dataArry['complicationChildValues'];
                           $medicalproblemValues = $dataArry['medicalproblemValues'];
                           $othersproblem = $dataArry['othersproblem'];
                           $deleveryType = $dataArry['deleveryType'];
                           $babygender = $dataArry['babygender'];
                           $babyage = $dataArry['babyage'];
                           $isOtherProblem = $dataArry['isOtherProblem'];
                          

                             for ($i=0; $i < count($dataArry['birthplace']); $i++) { 

                               if ($isOtherProblem[$i]=='N') {
                                $othersproblem[$i]=NULL;
                               }

                             $child_history_array = array(
                                                      'case_master_id' => $caseID,
                                                      'birthplace' => $birthplace[$i],
                                                      'year' => $selectYear[$i],
                                                      'complication' => $complicationChildValues[$i],
                                                      'medicalproblem' => $medicalproblemValues[$i],
                                                      'is_othermedprob' => $isOtherProblem[$i],
                                                      'medicalproblem_other' => $othersproblem[$i],
                                                      'delevery_type' => $deleveryType[$i],
                                                      'babygender' => $babygender[$i],
                                                      'babyage' => $babyage[$i],
                                                      'created_on' => date('Y-m-d H:i:s'), 
                                                       );

                              $insertChildHistory=$this->commondatamodel->insertSingleTableData('previous_child_birth_history',$child_history_array);




                           }

                         }


                       /* insert into surgery detail data */

                           $deleteSurgery=$this->commondatamodel->deleteTableData('surgery_details',$where_caseId);

                          if(isset($dataArry['surgery_id'])) {
                           for ($i=0; $i < count($dataArry['surgery_id']) ; $i++) { 
                            if ($yearback[$i]=='') {
                              $yearback[$i]=NULL;
                            }

                            $surgery_dtl_array = array(
                                                        'case_master_id' => $caseID ,
                                                        'surgery_mst_id' => $surgery_id[$i] ,
                                                        'other_surgery_name' => $other_surgery_name[$i] ,
                                                        'yearback' =>  $yearback[$i],
                                                       );
                            $insertSurgery=$this->commondatamodel->insertSingleTableData('surgery_details',$surgery_dtl_array);
                         }

                      }



                       /* insert into family history detail data */

                           $deletefamilyHistory=$this->commondatamodel->deleteTableData('family_history_details',$where_caseId);

                          if(isset($dataArry['familycomponent'])) {
                             for ($i=0; $i < count($dataArry['familycomponent']) ; $i++) { 
                             

                              $familyhistory_dtl_array = array(
                                                          'case_master_id' => $caseID ,
                                                          'family_comp_mst_id' => $familycomponent[$i] ,
                                                          'othercomptext' => $other_component_name[$i] ,
                                                          'is_father' =>  $ischeckfatherhist[$i],
                                                          'is_mother' =>  $ischeckmotherhist[$i],
                                                         );
                             
                              $insertFamilyHistory=$this->commondatamodel->insertSingleTableData('family_history_details',$familyhistory_dtl_array);
                           }
                        }



                      /* insert into regular medicine detail data */

                           $deleteRegularMedicineDetails=$this->commondatamodel->deleteTableData('regular_medicines_details',$where_caseId);

                        if(isset($dataArry['regularmedicine'])) {
                           for ($i=0; $i < count($dataArry['regularmedicine']) ; $i++) { 
                             $regularmedicine = $dataArry['regularmedicine'];
                             $regularmedicinedose = $dataArry['regularmedicinedose'];
                             $regularmedforYear = $dataArry['regularmedforYear'];
                             $regularmedforMonth = $dataArry['regularmedforMonth'];
                           

                            $regularmedicine_dtl_array = array(
                                                        'case_master_id' => $caseID ,
                                                        'medicine_name' => $regularmedicine[$i] ,
                                                        'medicine_dose' => $regularmedicinedose[$i] ,
                                                        'for_year' => $regularmedforYear[$i] ,
                                                        'for_month' => $regularmedforMonth[$i] ,
                                                        
                                                       );
                           
                            $insertRegularMedicine=$this->commondatamodel->insertSingleTableData('regular_medicines_details',$regularmedicine_dtl_array);
                         }

                      }








/* --------------------------------------- end of Details data -------------------------------------*/



                if($antenantalID>0 && $antenantalmode=="EDIT")
                {
                    /*  EDIT MODE
                     *  -----------------
                    */

                    $upd_array_antenantal = array(
                                          'case_master_id' => $caseID,       
                                          'wife_bloodgroup' => $wifebloodgroup,       
                                          'husband_bloodgroup' => $husbandbloodgroup,       
                                          'wife_occupation' => $wifeoccupation,       
                                          'husband_occupation' => $husbandoccupation,       
                                          'wife_education' => $wifeeducation,       
                                          'husband_education' => $husbandeducation,       
                                          'married_for_year' => $marriedforyear,       
                                          'trying_for_year' => $tryingfor,       
                                          'medicine_concieve' => $medicine_concieve,       
                                          'procedure_concieve' => $procedure_concieve,       
                                          'procedure_date' => $procedure_date,       
                                          'cigarette_addiction' => $cigarette_addiction,       
                                          'cigarette_per_day' => $cigarette_per_day,       
                                          'alcohol_addiction' => $alcohol_addiction,       
                                          'other_addiction' => $other_addiction,       
                                          'lmp_date' => $lmp_date,       
                                          'edd_date' => $edd_date,       
                                          'usg_week' => $edd_week,       
                                          'usg_days' => $edd_days,       
                                          'usg_date' => $usg_date,       
                                          'parity_term_delivery' => $termdelivery,       
                                          'parity_preterm' => $paritypreterm,       
                                          'parity_abortion' => $parityabortion,       
                                          'parity_issue' => $parityissue,       
                                          'gravida_parity' => $gravida_parity,       
                                          'spontaneous_abortion' => $spontaneous_abortion,       
                                          'menstrual_cycle_type' => $menstrual_cycle_type,       
                                          'menstrual_flow' => $menstrual_flow,       
                                          'menstrual_duration_days' => $menstrual_duration_days,       
                                          'menstrual_cycle_days' => $menstrual_cycle_days,       
                                          'diseases_ids' => $sel_diseasesValues,       
                                          'is_other_diseases' => $isOtherDiseases,       
                                          'other_diseases' => $other_diseases,       
                                          'any_allergy' => $any_allergy,       
                                          'vaccination_ids' => $vaccination,       
                                          'highrisk_ids' => $highriskValues,       
                                          'is_highrisk_others' => $isOtherHighrisk,       
                                          'highrisk_others' => $highrisk_others,       
                                     );
                     $upd_where = array('antenantal_master.antenantal_id' => $antenantalID);

                     $update = $this->commondatamodel->updateSingleTableData('antenantal_master',$upd_array_antenantal,$upd_where);


                     $where_caseId = array('case_master_id' => $caseID);








                  



                    
                    if($update)
                    {
                        $json_response = array(
                            "msg_status" => 1,
                            "msg_data" => "Updated successfully",
                            "mode" => "EDIT",
                            "antenantalID" => $antenantalID
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


 
           
                       $antenantal_master_array = array(
                                          'case_master_id' => $caseID,       
                                          'wife_bloodgroup' => $wifebloodgroup,       
                                          'husband_bloodgroup' => $husbandbloodgroup,       
                                          'wife_occupation' => $wifeoccupation,       
                                          'husband_occupation' => $husbandoccupation,       
                                          'wife_education' => $wifeeducation,       
                                          'husband_education' => $husbandeducation,       
                                          'married_for_year' => $marriedforyear,       
                                          'trying_for_year' => $tryingfor,       
                                          'medicine_concieve' => $medicine_concieve,       
                                          'procedure_concieve' => $procedure_concieve,       
                                          'procedure_date' => $procedure_date,       
                                          'cigarette_addiction' => $cigarette_addiction,       
                                          'cigarette_per_day' => $cigarette_per_day,       
                                          'alcohol_addiction' => $alcohol_addiction,       
                                          'other_addiction' => $other_addiction,       
                                          'lmp_date' => $lmp_date,       
                                          'edd_date' => $edd_date,       
                                          'usg_week' => $edd_week,       
                                          'usg_days' => $edd_days,       
                                          'usg_date' => $usg_date,       
                                          'parity_term_delivery' => $termdelivery,       
                                          'parity_preterm' => $paritypreterm,       
                                          'parity_abortion' => $parityabortion,       
                                          'parity_issue' => $parityissue,       
                                          'gravida_parity' => $gravida_parity,       
                                          'spontaneous_abortion' => $spontaneous_abortion,       
                                          'menstrual_cycle_type' => $menstrual_cycle_type,       
                                          'menstrual_flow' => $menstrual_flow,       
                                          'menstrual_duration_days' => $menstrual_duration_days,       
                                          'menstrual_cycle_days' => $menstrual_cycle_days,       
                                          'diseases_ids' => $sel_diseasesValues,       
                                          'is_other_diseases' => $isOtherDiseases,       
                                          'other_diseases' => $other_diseases,       
                                          'any_allergy' => $any_allergy,       
                                          'vaccination_ids' => $vaccination,       
                                          'highrisk_ids' => $highriskValues,       
                                          'is_highrisk_others' => $isOtherHighrisk,       
                                          'highrisk_others' => $highrisk_others,         
                                                
                                         );

                         $insertData = $this->commondatamodel->insertSingleTableData('antenantal_master',$antenantal_master_array);


                       $antenantalID = $insertData;
                    

                    if($insertData)
                    {
                        $json_response = array(
                            "msg_status" => 1,
                            "msg_data" => "Saved successfully",
                            "mode" => "EDIT",
                            "antenantalID" => $antenantalID
                           
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


    public function addLastMenstrualMedicinedetail()
    {
        if($this->session->userdata('user_data'))
        {
            $session = $this->session->userdata('user_data');
        

            $row_no = $this->input->post('rowNo');
            $data['rowno'] = $row_no;
            $data['DaysList']=$this->commondatamodel->getAllDropdownData('day_master');
            
           
             $page = 'dashboard/admin_dashboard/case/menstrual_medicine_partial_view';
            $viewTemp = $this->load->view($page,$data,TRUE);
            echo $viewTemp;
        }
        else
        {
            redirect('login','refresh');
        }
    }

   public function addPreviousChildHistoryDetail()
    {
        if($this->session->userdata('user_data'))
        {
            $session = $this->session->userdata('user_data');
        

            $row_no = $this->input->post('rowNo');
            $data['childdtlrowno'] = $row_no;
            $data['complicationList']=$this->commondatamodel->getAllDropdownData('complication_master');
            $data['medicalProblemList']=$this->commondatamodel->getAllDropdownData('medical_problem');
            $data['genderList']=$this->commondatamodel->getAllDropdownData('gender_master');

            $data['deliveryType'] = array(
                                  'CS' => 'CS',
                                  'ND' => 'ND',
                                  'SE' => 'S/E',
                                   );
            
           
             $page = 'dashboard/admin_dashboard/case/previous_child_history_partial_view';
            $viewTemp = $this->load->view($page,$data,TRUE);
            echo $viewTemp;
        }
        else
        {
            redirect('login','refresh');
        }
    }


    public function addRegularMedicinesDetail()
    {
        if($this->session->userdata('user_data'))
        {
            $session = $this->session->userdata('user_data');
        

            $row_no = $this->input->post('rowNo');
            $data['regularmedicinerowno'] = $row_no;
            $data['DaysList']=$this->commondatamodel->getAllDropdownData('day_master');
            
           
             $page = 'dashboard/admin_dashboard/case/regular_medicines_partial_view';
            $viewTemp = $this->load->view($page,$data,TRUE);
            echo $viewTemp;
        }
        else
        {
            redirect('login','refresh');
        }
    }


    public function eddDateCalculation()
    {
        if($this->session->userdata('user_data'))
        {
              $lmpdate = $this->input->post('lmpdate');

             echo $next_due_date = date('l d M Y', strtotime($lmpdate. ' +259 days'));
        }
        else
        {
            redirect('login','refresh');
        }
    }


    public function eddUsgDateCalculation()
    {
        if($this->session->userdata('user_data'))
        {
              $lmpdate = $this->input->post('lmpdate');
              $edd_week = $this->input->post('edd_week');
              $edd_days = $this->input->post('edd_days');

             $addDays=260-($edd_week*7+$edd_days);


             echo $next_due_date = date('l d M Y', strtotime($lmpdate. ' +'.$addDays.' days'));
        }
        else
        {
            redirect('login','refresh');
        }
    }



    public function existingPatientBasicDetail()
    {
        if($this->session->userdata('user_data'))
        {
            $session = $this->session->userdata('user_data');
            $json_response = array();
           

           $caseID = $this->input->post('caseid');


             $where_case_master = [
                    'case_master.case_id' => $caseID
                ];

                // getSingleRowByWhereCls(tablename,where params)
                 $result['patientCaseEditdata'] = $this->commondatamodel->getSingleRowByWhereCls('case_master',$where_case_master); 



                 $where_patient_master = [
                    'patient_master.patient_id' =>  $result['patientCaseEditdata']->patient_id
                ];

                // getSingleRowByWhereCls(tablename,where params)
                 $patientmasterEditdata = $this->commondatamodel->getSingleRowByWhereCls('patient_master',$where_patient_master); 

         

                     if($patientmasterEditdata)
                    {
                        $json_response = array(
                            "msg_status" => 1,
                            "pdata" => $patientmasterEditdata,
                           
                           
                        );
                    }
                    else
                    {
                        $json_response = array(
                            "msg_status" => 0,
                            "msg_data" => "There is some problem.Try again"
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



  public function getInvestigationDetailRow()
    {
        $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
            $json_response = array();
            $inv_record_id = $this->input->get("inv_record_id");
           

            $result['investigationRowData'] = $this->patientcasemodel->getInvestigationRecordDetailsById($inv_record_id);

            $json_response = $result['investigationRowData'];

            header('Content-Type: application/json');
            echo json_encode( $json_response );
            exit;
        }
        else
        {
            redirect('administratorpanel','refresh');
        }
    }

}// end of class
