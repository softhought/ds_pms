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
            $husband_bloodgroup = trim(htmlspecialchars($dataArry['husband_bloodgroup']));
            $address = trim(htmlspecialchars($dataArry['address']));

          

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
                                          'husband_bloodgroup' => $husband_bloodgroup,            
                                          'address' => $address,            
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
            $husband_bloodgroup = trim(htmlspecialchars($dataArry['extphusband_bloodgroup']));
            $extpaddress = trim(htmlspecialchars($dataArry['extpaddress']));

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
                                          'husband_bloodgroup' => $husband_bloodgroup,             
                                          'address' => $extpaddress,             
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
                  $result['fourtoTwelveDropDown'] = array('4','5','6','7','8','9','10','11','12');
                  $result['zerotoSevenDropDown'] = array('0','1','2','3','4','5','6','7');
                  $result['seventeentotwentyfourDropDown'] = array('17','18','19','20','21','22','23','24');
                  
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
                    $result['ntscanrisk'] = array("Down's",'Edward','Patan');

                    $result['examinationLatestData']=$this->patientcasemodel->getExaminationLatestByCase($caseID);
                    $result['examinationAllData']=$this->patientcasemodel->getAllExaminationLatestByCase($caseID);
                    $result['investigationLatestData']=$this->patientcasemodel->getInvestigationLatestByCase($caseID);

                    $result['clinicList']=$this->commondatamodel->getAllDropdownData('clinic_master');// need to be removed

                    $result['investigationAllData']=$this->patientcasemodel->getAllInvestigationByCase($caseID);

                    $result['placentaList']=$this->commondatamodel->getAllDropdownData('placenta_master');

                    $result['medicineList']=$this->commondatamodel->getAllDropdownData('medicine_master');
                    $result['dosageList'] = array('0.5','1','1.5','2','2.5','5','7.5','10');
                    $result['frequencyList'] = array('OD','BD','TDS','HS');
                     $result['testList']=$this->commondatamodel->getAllDropdownData('investigation_component');

                   $result['prescriptionLatestData']=$this->patientcasemodel->getPrescriptionLatestByCase($caseID);

                   if ($result['prescriptionLatestData']) {
                     $prescriptionID=$result['prescriptionLatestData']->prescription_id;

                      $result['prescriptionMedicineList']=$this->patientcasemodel->getMedicineDetailsByPrescriptionId($prescriptionID);

                      $result['prescriptionInvestigationList']=$this->patientcasemodel->getInvestigationDetailsByPrescriptionId($prescriptionID);


                   }else{
                    $result['prescriptionMedicineList']=[];
                    $result['prescriptionInvestigationList']=[];
                   }

                   $result['prescriptioAllData']=$this->patientcasemodel->getAllPrescriptionByCase($caseID);

                   
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
            $husband_bloodgroup = trim(htmlspecialchars($dataArry['husband_bloodgroup']));
            $address = trim(htmlspecialchars($dataArry['address']));
            
            $update_array  = array(
     
                                          'selfmobile' => $selfmobile,       
                                          'alternate_mobile' => $alternate_mobile,       
                                          'patientname' => $patientname,       
                                          'patientage' => $patientage,       
                                          'patientgender' => $patientgender,       
                                          'bloodgroup' => $bloodgroup,             
                                          'husband_bloodgroup' => $husband_bloodgroup,             
                                          'address' => $address,             
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

              $where_examination = array(
                             'case_master_id' => $caseID,
                             'created_on' => date('Y-m-d')
                           );

    /* delete today data data*/
$deleteTodayInvestigation=$this->commondatamodel->deleteTableData('examination_master',$where_examination);
       
       $examination_array = array(
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

                           $insertExamination=$this->commondatamodel->insertSingleTableData('examination_master',$examination_array);


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

      $hiv_one_result = $dataArry['hiv_one_result'];
      if ($dataArry['hiv_one_date']!='') {
      $hiv_one_date = date("Y-m-d", strtotime($dataArry['hiv_one_date']));
      }else{ $hiv_one_date=NULL; }

      $hiv_two_result = $dataArry['hiv_two_result'];
      if ($dataArry['hiv_two_date']!='') {
      $hiv_two_date = date("Y-m-d", strtotime($dataArry['hiv_two_date']));
      }else{ $hiv_two_date=NULL; }

      $hbsag_result = $dataArry['hbsag_result'];
      if ($dataArry['hbsag_date']!='') {
      $hbsag_date = date("Y-m-d", strtotime($dataArry['hbsag_date']));
      }else{ $hbsag_date=NULL; }

      $antihcv_result = $dataArry['antihcv_result'];
      if ($dataArry['antihcv_date']!='') {
      $antihcv_date = date("Y-m-d", strtotime($dataArry['antihcv_date']));
      }else{ $antihcv_date=NULL; }

      $urine_re_result = $dataArry['urine_re_result'];
      if ($dataArry['urine_re_date']!='') {
      $urine_re_date = date("Y-m-d", strtotime($dataArry['urine_re_date']));
      }else{ $urine_re_date=NULL; }

      $cs_sensitive_to_result = $dataArry['cs_sensitive_to_result'];
      if ($dataArry['cs_sensitive_date']!='') {
      $cs_sensitive_date = date("Y-m-d", strtotime($dataArry['cs_sensitive_date']));
      }else{ $cs_sensitive_date=NULL; }

      $stsh_result = $dataArry['stsh_result'];
      if ($dataArry['stsh_date']!='') {
      $stsh_date = date("Y-m-d", strtotime($dataArry['stsh_date']));
      }else{ $stsh_date=NULL; }

      $s_urea_result = $dataArry['s_urea_result'];
      if ($dataArry['s_urea_date']!='') {
      $s_urea_date = date("Y-m-d", strtotime($dataArry['s_urea_date']));
      }else{ $s_urea_date=NULL; }

      $s_creatinine_result = $dataArry['s_creatinine_result'];
      if ($dataArry['s_creatinine_date']!='') {
      $s_creatinine_date = date("Y-m-d", strtotime($dataArry['s_creatinine_date']));
      }else{ $s_creatinine_date=NULL; }

      $combined_test_result = $dataArry['combined_test_result'];
      if ($dataArry['combined_test_date']!='') {
      $combined_test_date = date("Y-m-d", strtotime($dataArry['combined_test_date']));
      }else{ $combined_test_date=NULL; }

      $thalassemia_result = $dataArry['thalassemia_result'];
      if ($dataArry['thalassemia_date']!='') {
      $thalassemia_date = date("Y-m-d", strtotime($dataArry['thalassemia_date']));
      }else{ $thalassemia_date=NULL; }

      $usg_scan_date = $dataArry['usg_scan_date'];
      if ($dataArry['usg_scan_date']!='') {
      $usg_scan_date = date("Y-m-d", strtotime($dataArry['usg_scan_date']));
      }else{ $usg_scan_date=NULL; }

      $usg_slf_week = $dataArry['usg_slf_week'];
      $usg_slf_day = $dataArry['usg_slf_day'];

      if ($dataArry['nt_scan_date']!='') {
      $nt_scan_date = date("Y-m-d", strtotime($dataArry['nt_scan_date']));
      }else{ $nt_scan_date=NULL; }

      $nt_scan_lowerrisk = $dataArry['nt_scan_lowerrisk'];
      $nt_scan_highrisk = $dataArry['nt_scan_highrisk'];

      if ($dataArry['anomaly_scan_date']!='') {
      $anomaly_scan_date = date("Y-m-d", strtotime($dataArry['anomaly_scan_date']));
      }else{ $anomaly_scan_date=NULL; }
      $anomaly_slf_week = $dataArry['anomaly_slf_week'];
      $anomaly_slf_day = $dataArry['anomaly_slf_day'];
     

        if (isset($dataArry['anomaly_placenta'])) {
                $anomaly_placenta = '';
                foreach ($dataArry['anomaly_placenta'] as  $value) {
                  $anomaly_placenta.=$value.',';
                }
                $anomaly_placenta = substr($anomaly_placenta, 0, -1);
                
                 }else{
                 $anomaly_placenta = '';
               }

             
       $is_no_anomaly_seen = $dataArry['is_no_anomaly_seen'];
       $is_other_anomaly = $dataArry['is_other_anomaly'];
       $other_anomaly = $dataArry['other_anomaly'];
       if ($is_other_anomaly=='N') {

        $other_anomaly='';
       }

      if ($dataArry['growth_date']!='') {
      $growth_date = date("Y-m-d", strtotime($dataArry['growth_date']));
      }else{ $growth_date=NULL; }
      $growth_slf_week = $dataArry['growth_slf_week'];
      $growth_slf_day = $dataArry['growth_slf_day'];


 


/* insert into investigation_record */

  if ($ischangeInvestigation=='Y') {

    $where_investigation_record = array(
                             'case_master_id' => $caseID,
                             'created_on' => date('Y-m-d')
                           );

    /* delete today data data*/
$deleteTodayInvestigation=$this->commondatamodel->deleteTableData('investigation_record_master',$where_investigation_record);
   

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
                                    'hiv_one_result' => $hiv_one_result, 
                                    'hiv_one_date' => $hiv_one_date, 
                                    'hiv_two_result' => $hiv_two_result, 
                                    'hiv_two_date' => $hiv_two_date, 
                                    'hbsag_result' => $hbsag_result, 
                                    'hbsag_date' => $hbsag_date, 
                                    'antihcv_result' => $antihcv_result, 
                                    'antihcv_date' => $antihcv_date, 
                                    'urine_re_result' => $urine_re_result, 
                                    'urine_re_date' => $urine_re_date, 
                                    'cs_sensitive_to_result' => $cs_sensitive_to_result, 
                                    'cs_sensitive_date' => $cs_sensitive_date, 
                                    'stsh_result' => $stsh_result, 
                                    'stsh_date' => $stsh_date, 
                                    's_urea_result' => $s_urea_result, 
                                    's_urea_date' => $s_urea_date, 
                                    's_creatinine_result' => $s_creatinine_result, 
                                    's_creatinine_date' => $s_creatinine_date, 
                                    'combined_test_result' => $combined_test_result, 
                                    'combined_test_date' => $combined_test_date, 
                                    'thalassemia_result' => $thalassemia_result, 
                                    'thalassemia_date' => $thalassemia_date, 
                                    'usg_scan_date' => $usg_scan_date, 
                                    'usg_slf_week' => $usg_slf_week, 
                                    'usg_slf_day' => $usg_slf_day, 
                                    'nt_scan_date' => $nt_scan_date, 
                                    'nt_scan_lowerrisk' => $nt_scan_lowerrisk, 
                                    'nt_scan_highrisk' => $nt_scan_highrisk, 
                                    'anomaly_scan_date' => $anomaly_scan_date, 
                                    'anomaly_slf_week' => $anomaly_slf_week,
                                    'anomaly_slf_day' => $anomaly_slf_day, 
                                    'anomaly_placenta' => $anomaly_placenta, 
                                    'is_no_anomaly_seen' => $is_no_anomaly_seen, 
                                    'is_other_anomaly' => $is_other_anomaly, 
                                    'other_anomaly' => $other_anomaly, 
                                    'growth_date' => $growth_date, 
                                    'growth_slf_week' => $growth_slf_week, 
                                    'growth_slf_day' => $growth_slf_day, 
                                    );

$insertInvestigation=$this->commondatamodel->insertSingleTableData('investigation_record_master',$investigation_record_array);


}


$doctor_note = trim($dataArry['doctor_note']);
$ischangePrescription = $dataArry['ischangePrescription'];
if ($dataArry['next_checkup_date']!='') {
      
    $next_checkup_date = date("Y-m-d", strtotime($dataArry['next_checkup_date']));

}else{ $next_checkup_date=NULL; }




// check prescription today data exist


$where_prescription = array(
                             'case_master_id' => $caseID,
                             'entry_date' => date('Y-m-d')
                           );


$isExistPrescription=$this->commondatamodel->duplicateValueCheck('prescription_master',$where_prescription);

if ($isExistPrescription) {


    $todayPresData=$this->commondatamodel->getSingleRowByWhereCls('prescription_master',$where_prescription);

    $oldPresId=$todayPresData->prescription_id;

    $where_pres_mst = array('prescription_mst_id' => $oldPresId);
    
    /* delete data from prescription_medicine_dtl & prescription_investigation_dtl*/

$deleteTodayPresMed=$this->commondatamodel->deleteTableData('prescription_medicine_dtl',$where_pres_mst);
$deleteTodayPresInves=$this->commondatamodel->deleteTableData('prescription_investigation_dtl',$where_pres_mst);

   
/* delete master data*/
$deleteTodayPrescription=$this->commondatamodel->deleteTableData('prescription_master',$where_prescription);
   // pre($todayPresData);

}








/* insert into prescription_master */  
  $prescription_master = array(
                                'case_master_id' => $caseID, 
                                'created_on' => date('Y-m-d H:i:s'),
                                'doctor_note' => $doctor_note, 
                                'next_checkup_dt' => $next_checkup_date,
                                'entry_date' => date('Y-m-d'), 
                               );


  $insertPrescriptionID=$this->commondatamodel->insertSingleTableData('prescription_master',$prescription_master);

  
  if(isset($dataArry['presMedID'])) {

    $presMedID = $dataArry['presMedID'];
    $presdosage = $dataArry['presdosage'];
    $presfrequency = $dataArry['presfrequency'];
    $presdays = $dataArry['presdays'];

    for ($i=0; $i <count($dataArry['presMedID']) ; $i++) { 
     

        $pres_med_arr = array(
                              'prescription_mst_id' => $insertPrescriptionID, 
                              'medicine_id' => $presMedID[$i], 
                              'dosage' => $presdosage[$i], 
                              'frequency' => $presfrequency[$i], 
                              'days' => $presdays[$i],
                              'created_on' => date('Y-m-d'), 
                            );

         $insertPresMedicine=$this->commondatamodel->insertSingleTableData('prescription_medicine_dtl',$pres_med_arr);
    }

  }

   if(isset($dataArry['presinvestigationID'])) {
     $presinvestigationID = $dataArry['presinvestigationID'];

     for ($i=0; $i < count($dataArry['presinvestigationID']); $i++) { 


          $presinvestigation_arr = array(
                                   'prescription_mst_id' => $insertPrescriptionID,
                                   'investigation_comp_id' => $presinvestigationID[$i],
                                   'created_on' => date('Y-m-d'), 
                                  );

           $insertPresInvestigation=$this->commondatamodel->insertSingleTableData('prescription_investigation_dtl',$presinvestigation_arr);
      
     }
     

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
                            "antenantalID" => $antenantalID,
                            "caseID" => $caseID
                           
                        );
                    }
                    else
                    {
                        $json_response = array(
                            "msg_status" => 1,
                            "msg_data" => "There is some problem.Try again",
                            "caseID" => $caseID
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


    public function addPrescriptionMedicineDetails()
    {
        if($this->session->userdata('user_data'))
        {
            $session = $this->session->userdata('user_data');
        

            $row_no = $this->input->post('rowNo');
            $medicineID = $this->input->post('medicine');


             $where_medicine= array('medicine_id' => $medicineID );
                       $medicineData = $this->commondatamodel->getSingleRowByWhereCls('medicine_master',$where_medicine);
                      // pre($medicineData);exit;


            $data['rowno'] = $row_no;
            $data['medicineID'] = $medicineID;
            $data['medicine'] = $medicineData->medicine_name;
            $data['dosage'] = $this->input->post('dosage');
            $data['frequency'] = $this->input->post('frequency');
            $data['days'] = $this->input->post('days');
            $data['DaysList']=$this->commondatamodel->getAllDropdownData('day_master');
            
            $page = 'dashboard/admin_dashboard/case/add_prescription_medicine_partial_view';
            $viewTemp = $this->load->view($page,$data,TRUE);
            echo $viewTemp;
        }
        else
        {
            redirect('login','refresh');
        }
    }



   public function addPrescriptionTestDetails()
    {
        if($this->session->userdata('user_data'))
        {
            $session = $this->session->userdata('user_data');
        

            $row_no = $this->input->post('rowNo');
            $investigationID = $this->input->post('investigation');


             $where_investigation= array('investigation_comp_id' => $investigationID );
                       $investigationData = $this->commondatamodel->getSingleRowByWhereCls('investigation_component',$where_investigation);
                      // pre($medicineData);exit;


            $data['rowno'] = $row_no;
            $data['investigationID'] = $investigationID;
            $data['investigation'] = $investigationData->inv_component_name;
        
            $data['DaysList']=$this->commondatamodel->getAllDropdownData('day_master');
            
            $page = 'dashboard/admin_dashboard/case/add_prescription_test_partial_view.php';
            $viewTemp = $this->load->view($page,$data,TRUE);
            echo $viewTemp;
        }
        else
        {
            redirect('login','refresh');
        }
    }


    public function getPrescriptionDetailRow()
    {
        $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
            $json_response = array();
            $inv_record_id = $this->input->get("inv_record_id");
           

            $result['medicineRowData'] = $this->patientcasemodel->getMedicineDetailsByPrescriptionId($inv_record_id);

            $result['investigationRowData'] = $this->patientcasemodel->getInvestigationDetailsByPrescriptionId($inv_record_id);

          //  $json_response = $result['medicineRowData'];
            $json_response = array(
                                    'medicine' => $result['medicineRowData'], 
                                    'investigation' => $result['investigationRowData'], 
                                  );

            header('Content-Type: application/json');
            echo json_encode( $json_response );
            exit;
        }
        else
        {
            redirect('login','refresh');
        }
    }



 public function print_item(){
       if($this->session->userdata('user_data'))
        {
       // load library
            $this->load->library('Pdf');
            $pdf = $this->pdf->load();
            ini_set('memory_limit', '256M'); 
       

     
                ini_set('memory_limit', '256M'); 
                $page = 'dashboard/admin_dashboard/case/case_add_edit';
               // $html = $this->load->view($page, $result, true);
               
                $html="Hello";
                // render the view into HTML
                $pdf->WriteHTML($html); 
                $output = 'saleBillPdf' . date('Y_m_d_H_i_s') . '_.pdf'; 
                $pdf->Output("$output", 'I');
                exit();
         }
         else {
            redirect('login', 'refresh');
        }
}


 public function print_prescription(){
      $session = $this->session->userdata('user_data');
       if($this->session->userdata('user_data'))
        {
          $result=[];
          $result['patientCaseData']=[];
          $result['patientmasterData']=[];
          $result['total_parity']=[];
          $result['lastchildBirth']=[];
          $result['previousChildHistory']=[];
          $result['previousChild']=[];
          $result['diseases']='';
          $result['surgicaData']=[];
          $result['familyComponentList']=[];
          $result['highrisk']='';
          $result['regularMedicineList']=[];
          $result['inveltdata']=[];
          $result['examinationFirstData']=[];
          $result['examinationLatestData']=[];
          $result['prescriptionLatestData']=[];
          $result['prescriptionLatestData']=[];
          $result['prescriptionMedicineList']=[];
          $result['prescriptionInvestigationList']=[];



          if($this->uri->rsegment(3) == NULL)
            {
                $caseID = 0;
                 $html="";
            
            }
            else
            {

                $caseID = $this->uri->segment(3);

                $clinic_id=$session['clinic_id'];
                $doctor_id=$session['doctor_id'];

                $where_clinic_master = [
                    'clinic_master.clinic_id' => $clinic_id
                ];

                $result['clinicData'] = $this->commondatamodel->getSingleRowByWhereCls('clinic_master',$where_clinic_master);
                $where_doctor = [
                    'doctor_master.doctor_id' => $clinic_id
                ];

                $result['doctorData'] = $this->commondatamodel->getSingleRowByWhereCls('doctor_master',$where_doctor);

                 $where_case_master = [
                    'case_master.case_id' => $caseID
                ];

                $result['patientCaseData'] = $this->commondatamodel->getSingleRowByWhereCls('case_master',$where_case_master); 

                $result['patientmasterData'] = $this->patientcasemodel->getPatientBasicInfo($result['patientCaseData']->patient_id); 

                 $where_antenatel_master = [
                    'antenantal_master.case_master_id' => $caseID
                 ];

                // getSingleRowByWhereCls(tablename,where params)
                 $result['antenantalCaseData'] = $this->commondatamodel->getSingleRowByWhereCls('antenantal_master',$where_antenatel_master);

                 if ($result['antenantalCaseData']) {
                  
                

                 $parity_term_delivery=$result['antenantalCaseData']->parity_term_delivery;
                 $parity_preterm=$result['antenantalCaseData']->parity_preterm;
                 $parity_abortion=$result['antenantalCaseData']->parity_abortion;
                 $parity_issue=$result['antenantalCaseData']->parity_issue;

                 $result['total_parity'] =($parity_term_delivery+$parity_preterm+$parity_abortion+$parity_issue);

                 $result['total_cesarean'] = $this->patientcasemodel->getTotalCesareanByCase($caseID);
                 $result['lastchildBirth'] = $this->patientcasemodel->getLastChildBirthByCase($caseID);
                 $result['previousChildHistory'] = $this->patientcasemodel->getAllPreviousChildHistory($caseID);


                 $previousChild = [];
                 foreach ($result['previousChildHistory'] as $key => $previouschild) {
                  $complications='';
                  $medicalproblem='';
                  
                 
                  $complicationids = explode (",", $previouschild->complication);
                 
                  $complicationData=$this->patientcasemodel->getComplicationsByIds($complicationids);

                  foreach ($complicationData as $complicationdata) {
                    $complications.=$complicationdata->complication_name.',';
                  }
                  $complications=rtrim($complications,',');



                  $medicalproblemids = explode (",", $previouschild->medicalproblem);
                  $medicalproblemData=$this->patientcasemodel->getMedicalProblemByIds($medicalproblemids);

                   foreach ($medicalproblemData as $medicalproblemrow) {
                    $medicalproblem.=$medicalproblemrow->problem.',';
                  }
                  $medicalproblem=rtrim($medicalproblem,',');
                 
                   $previousChild[]= array(
                                            'year' => $previouschild->year,
                                            'complications' => $complications,
                                            'med_prob' => $medicalproblem,
                                            'med_prob_other' => $previouschild->medicalproblem_other
                                             );
                 }

                 $result['previousChild']=$previousChild;

                

                 $diseases_ids = explode (",", $result['antenantalCaseData']->diseases_ids);
                 $diseasesData=$this->patientcasemodel->getDiseasesByIds($diseases_ids);
                 $diseases='';
                  foreach ($diseasesData as $diseasesrow) {
                    $diseases.=$diseasesrow->diseases_name.',';
                  }
                $result['diseases']=rtrim($diseases,',');


                $result['surgicaData']=$this->patientcasemodel->getAllSurgicaRecordByCase($caseID);


                $result['familyComponentList']=$this->patientcasemodel->getFamilyComponentDetails($caseID);



                 $highrisk_ids = explode (",", $result['antenantalCaseData']->highrisk_ids);

                 $highriskData=$this->patientcasemodel->getHighRiskByIds($highrisk_ids);
                 $highrisk='';
                  foreach ($highriskData as $highriskrow) {
                    $highrisk.=$highriskrow->risk_type.',';
                  }


               $result['highrisk']=rtrim($highrisk,',');
              
                // pre($result['familyComponentList']);

               if ($result['antenantalCaseData']->is_highrisk_others=='Y') {
                 $highrisk=rtrim($highrisk,',Others');
                 $result['highrisk']=$highrisk.','.$result['antenantalCaseData']->highrisk_others;
               }

              $result['regularMedicineList']=$this->patientcasemodel->getRegularMedecineDetails($caseID);

              //investigation Latest Data
              $result['inveltdata']=$this->patientcasemodel->getInvestigationLatestByCase($caseID);
              
           $result['examinationFirstData']=$this->patientcasemodel->getFirstExaminationDataByCase($caseID);
           $result['examinationLatestData']=$this->patientcasemodel->getExaminationLatestByCase($caseID);


           $result['prescriptionLatestData']=$this->patientcasemodel->getPrescriptionLatestByCase($caseID);

             if ($result['prescriptionLatestData']) {

                    if($this->uri->rsegment(4) == NULL)
                    {
                     $prescriptionID=$result['prescriptionLatestData']->prescription_id;
                    }else{
                       $prescriptionID= $this->uri->segment(4);
                       $result['prescriptionLatestData']=$this->patientcasemodel->getPrescriptionDetailsById($prescriptionID);
                    }
                     

                      $result['prescriptionMedicineList']=$this->patientcasemodel->getMedicineDetailsByPrescriptionId($prescriptionID);

                      $result['prescriptionInvestigationList']=$this->patientcasemodel->getInvestigationDetailsByPrescriptionId($prescriptionID);


                   }else{
                    $result['prescriptionMedicineList']=[];
                    $result['prescriptionInvestigationList']=[];
                   }




                    }// end of if block antenantal case data

//echo $prescriptionID;




        
        //pre($result['examinationFirstData']);exit;




                $page = 'dashboard/admin_dashboard/case/print_prescription';
              //  $page = 'dashboard/admin_dashboard/case/testtable';
               $html = $this->load->view($page, $result, true);
               //exit;
                
            }


            // pre($result['clinicData']);

             //exit;

                // load library
                $this->load->library('Pdf');
                $pdf = $this->pdf->load();
                ini_set('memory_limit', '256M'); 
       
                $pdf->SetHeader('Document Title');
                // render the view into HTML
                $pdf->WriteHTML($html); 
                $output = 'Prescription' . date('Y_m_d_H_i_s') . '_.pdf'; 
                $pdf->Output("$output", 'I');
                exit();
         }
         else {
            redirect('login', 'refresh');
        }
}






}// end of class
