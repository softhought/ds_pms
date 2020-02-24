<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Patientcase extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('commondatamodel','commondatamodel',TRUE);
         $this->load->model('Patientcasemodel','patientcasemodel',TRUE);
         $this->load->model('Medicinecmodel','medicinecmodel',TRUE);
         $this->load->model('Preoperationmodel','preoperationmodel',TRUE);
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
           // $clinic_id=$session['clinic_id'];    
            $page = 'dashboard/admin_dashboard/case/select_treatment_view';
             $result['genderList']=$this->commondatamodel->getAllDropdownData('gender_master');
             $result['bloodGroupList']=$this->commondatamodel->getAllDropdownData('blood_group');
             $majorgroup = 'Obstetrics';
            $result['allCaseList']=$this->patientcasemodel->getAllCaseDetailsgroupwise($majorgroup);
             //$result['allCaseList']=$this->patientcasemodel->getAllCaseDetails();
             //$result['allCaseList']=$this->patientcasemodel->getAllCaseDetailsByClinic($clinic_id);
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
            // $bloodgroup = trim(htmlspecialchars($dataArry['bloodgroup']));
            // $husband_bloodgroup = trim(htmlspecialchars($dataArry['husband_bloodgroup']));
            $address = trim(htmlspecialchars($dataArry['address']));
          
            $module = 'Antenatel';
            $method = 'Patientcase/casegenetate_action';

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
                       $doctor_id = $session['doctor_id'];
                       $serial_type = 'NEWCASE';
                       $currentYear = date('Y');
                     // add new code in this method by anil 27-09-2019  
                     
                      if($majorgroup == 'Obstetrics'){
                         $majorgrouptext = 'O';
                         $casetype = 'OB';
                       }
                       else if($majorgroup == 'Gynaccology'){
                        $majorgrouptext = 'G';
                        $casetype = 'GY';
                       }
                       else if($majorgroup == 'Infertility'){
                        $majorgrouptext = 'I';
                        $casetype = 'IN';
                       }
                      //add new parameters casetype in function call by anil 27-09-2019
                    
                       $serial= $this->patientcasemodel->getLatestSerialNumberClinic($serial_type,$currentYear,$clinic_id,$casetype);

                       $where_clinic = array('clinic_id' => $clinic_id );
                       $clinicData = $this->commondatamodel->getSingleRowByWhereCls('clinic_master',$where_clinic);

                       $clinic_code =  $clinicData->cliniccode;
                       

                       $yearsmall = date('y');
                       $caseno = $clinic_code.'/'.$majorgrouptext.'/'.$serial.'/'.$yearsmall;
                      //print_r($caseno);exit;
                  
                       $patient_master_array = array(
                                          'reg_date' => date('Y-m-d'),       
                                          'selfmobile' => $selfmobile,       
                                          'alternate_mobile' => $alternate_mobile,       
                                          'patientname' => $patientname,       
                                          'patientage' => $patientage,       
                                          'patientgender' => $patientgender,       
                                          'bloodgroup' => NULL,            
                                          'husband_bloodgroup' => NULL,            
                                          'address' => $address,            
                                          'created_on' => date('Y-m-d H:i:s'),       
                                         );
                         
                         $insertData = $this->commondatamodel->insertSingleTableData('patient_master',$patient_master_array);

                         $action = 'insert';
                         $activitytable = 'patient_master';

                         $this->activity_log($module,$insertData,$action,$method,$activitytable);
                          

                         $case_master_array = array(
                                                     'case_no' => $caseno,
                                                     'patient_id' => $insertData,
                                                     'clinic_id' => $clinic_id,
                                                     'major_group' => $majorgroup,
                                                     'patient_reg_type' => $patient_reg_type,
                                                     'created_on' => date('Y-m-d'),
                                                     'doctor_id' => $doctor_id,
                                                      );

                          $case_master_id = $this->commondatamodel->insertSingleTableData('case_master',$case_master_array);

                          $action = 'insert';
                          $activitytable = 'case_master';

                         $this->activity_log($module,$case_master_id,$action,$method,$activitytable);
                 
                    

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
            // $bloodgroup = trim(htmlspecialchars($dataArry['extpbloodgroup']));
            // $husband_bloodgroup = trim(htmlspecialchars($dataArry['extphusband_bloodgroup']));
            $extpaddress = trim(htmlspecialchars($dataArry['extpaddress']));

          //  pre($session);

            $module = 'Antenatel';
            $method = 'Patientcase/existingpatient_casegenetate';



           

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
                       $doctor_id = $session['doctor_id'];
                       $serial_type = 'NEWCASE';
                       $currentYear = date('Y');

                       if($majorgroup == 'Obstetrics'){
                         $majorgrouptext = 'O';
                         $casetype = 'OB';
                       }
                       else if($majorgroup == 'Gynaccology'){
                        $majorgrouptext = 'G';
                        $casetype = 'GY';
                       }
                       else if($majorgroup == 'Infertility'){
                        $majorgrouptext = 'I';
                        $casetype = 'IN';
                       }
                       
                       $serial= $this->patientcasemodel->getLatestSerialNumberClinic($serial_type,$currentYear,$clinic_id,$casetype);

                       $where_clinic = array('clinic_id' => $clinic_id );
                       $clinicData = $this->commondatamodel->getSingleRowByWhereCls('clinic_master',$where_clinic);

                       $clinic_code =  $clinicData->cliniccode;
                      

                       $yearsmall = date('y');
                       $caseno = $clinic_code.'/'.$majorgrouptext.'/'.$serial.'/'.$yearsmall;

           

                         $case_master_array = array(
                                                     'case_no' => $caseno,
                                                     'patient_id' => $patient_id,
                                                     'clinic_id' => $clinic_id,
                                                     'major_group' => $majorgroup,
                                                     'patient_reg_type' => $patient_reg_type,
                                                     'previous_case_id' => $previous_case_id,
                                                     'created_on' => date('Y-m-d'),
                                                     'doctor_id' => $doctor_id,
                                                      );
                        //print_r($case_master_array);exit;
                          $case_master_id = $this->commondatamodel->insertSingleTableData('case_master',$case_master_array);

                          $action = 'insert';
                          $activitytable = 'case_master';
                          $insertId = $case_master_id;

                          $this->activity_log($module,$insertId,$action,$method,$activitytable);

                             $update_array  = array(
     
                                          'selfmobile' => $selfmobile,       
                                          'alternate_mobile' => $alternate_mobile,       
                                          'patientname' => $patientname,       
                                          'patientage' => $patientage,       
                                          'patientgender' => $patientgender,       
                                          'bloodgroup' => NUll,             
                                          'husband_bloodgroup' => NUll,             
                                          'address' => $extpaddress,             
                                          'last_modified' => date('Y-m-d H:i:s'),    
                                    );
                              
                          $where_patient_master = array(
                              "patient_master.patient_id" => $patient_id
                              );
                          
                          
                      
                          $update = $this->commondatamodel->updateSingleTableData('patient_master',$update_array,$where_patient_master);

                          $action = 'update';
                          $activitytable = 'patient_master';

                         $this->activity_log($module,$update,$action,$method,$activitytable);

                    

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
            $result['callfrom'] = '';
            if($this->uri->rsegment(3) == NULL)
            {
                $result['mode'] = "ADD";
                $result['btnText'] = "Save";
                $result['btnTextLoader'] = "Saving...";
                $caseID = 0;
                $result['patientCaseEditdata'] = [];
                $result['callfrom'] = $this->uri->segment(4);
                
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
                $result['callfrom'] = $this->uri->segment(4);
            
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
                 //pre($result['antenantalCaseEditdata']);exit;

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
                 
  
               }  $result['tryingforDropDown'] = array('< 1','1','2','3','4','5','6','7','8','9','10','Others');
                  $result['OnetoOtherDropDown'] = array('1','2','3','4','5','6','7','8','9','10','Others');
                  $result['ZerotoTenDropDown'] = array('0','1','2','3','4','5','6','7','8','9','10');
                  $result['OnetoTenDropDown'] = array('1','2','3','4','5','6','7','8','9','10');
                  $result['ZerotoTwentyDropDown'] = array('0','1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20');
                  $result['fourtoTwelveDropDown'] = array('4','5','6','7','8','9','10','11','12');
                  $result['zerotoSevenDropDown'] = array('0','1','2','3','4','5','6','7');
                  $result['seventeentotwentyfourDropDown'] = array('17','18','19','20','21','22','23','24');

                //add new array 20-09-2019 by anil
                
                  $result['tweveltofourtytwoDropDown'] = array('12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31','32','33','34','35','36','37','38','39','40','41','42');

                  
                //  pre( $result['OnetoOtherDropDown']);exit;
                  $result['genderList']=$this->commondatamodel->getAllDropdownData('gender_master');
                  $result['bloodGroupList']=$this->commondatamodel->getAllDropdownData('blood_group');  
                 // comment by anil for get ascending order data 
                  // $result['occupationList']=$this->commondatamodel->getAllDropdownData('occupation_master');

                   $result['occupationList']=$this->patientcasemodel->getAlloccupation();  
                 
                  // comment by anil for get ascending order data 
                  // $result['educationList']=$this->commondatamodel->getAllDropdownData('education_qualification');

                   $result['educationList']=$this->patientcasemodel->getAlleducation();

                  $result['mensuMedList']=$this->patientcasemodel->getMenstrualLastMedecineDetails($caseID);
                  $result['previousChildBirthList']=$this->patientcasemodel->getPreviousChildBirthDetails($caseID);
                 // $result['complicationList']=$this->commondatamodel->getAllDropdownData('complication_master');
                   $result['complicationList']=$this->commondatamodel->getAllRecordWhereOrderBy('complication_master',[],'complication_name');
                 // $result['medicalProblemList']=$this->commondatamodel->getAllDropdownData('medical_problem');
                   $result['medicalProblemList']=$this->commondatamodel->getAllRecordWhereOrderBy('medical_problem',[],'problem');
                   //pre($result['medicalProblemList']);exit;
                  $result['genderList']=$this->commondatamodel->getAllDropdownData('gender_master');

                  $result['deliveryType'] = array('CS' => 'CS','ND' => 'ND','SE' => 'S/E','Spontaneous Expulsion'=>'Spontaneous Expulsion');

                  $result['menstrualCycleType'] = array('Regular','Irregular');
                  $result['menstrualCycleFlow'] = array('Average','Moderate','Severe');
                  $result['thalassemiascreening'] = array('Beta Thalassemia Major','Beta Thalassemia Minor','Normal','Others');

                  $result['diseasesList']=$this->commondatamodel->getAllRecordWhereOrderBy('diseases_master',[],'diseases_name');
                //  $result['surgeryList']=$this->commondatamodel->getAllDropdownData('surgery_master');


                    $result['surgeryList']=$this->patientcasemodel->getSurgeryDetails($caseID);

                    $result['familyComponentList']=$this->patientcasemodel->getFamilyComponentDetails($caseID);
                    
                    $result['vaccinationList']=$this->commondatamodel->getAllDropdownData('vaccination_master');
                    $result['highriskList']=$this->commondatamodel->getAllRecordWhereOrderBy('high_risk_master',[],'risk_type');
                    $result['regularMedicineList']=$this->patientcasemodel->getRegularMedecineDetails($caseID);

                    $result['pallor'] = array('Nil','Mild','Mod','Severe' );
                    $result['oedema'] = array('Nil','Mild','Mod','Severe' );
                    $result['icterus'] = array('Nil','Present');
                    $result['ntscanrisk'] = array("Down's",'Edward','Patau');

                    $result['examinationLatestData']=$this->patientcasemodel->getExaminationLatestByCase($caseID);
                    
                    $result['examinationAllData']=$this->patientcasemodel->getAllExaminationLatestByCase($caseID);
                    $result['investigationLatestData']=$this->patientcasemodel->getInvestigationLatestByCase($caseID);
                   

                    $result['clinicList']=$this->commondatamodel->getAllDropdownData('clinic_master');// need to be removed

                    $result['investigationAllData']=$this->patientcasemodel->getAllInvestigationByCase($caseID);

                    $result['placentaList']=$this->commondatamodel->getAllDropdownData('placenta_master');

                  //  $result['medicineList']=$this->commondatamodel->getAllDropdownData('medicine_master');
                    $result['medicineList']=$this->commondatamodel->getAllRecordWhereOrderBy('medicine_master',[],'medicine_name');


                    $result['dosageList'] = array('0.5','1','1.5','2','2.5','5','7.5','10');
                    $result['frequencyList'] = array('OD','BD','TDS','HS');
                     $result['testList']=$this->commondatamodel->getAllRecordWhereOrderBy('investigation_component',[],'inv_component_name');


                      $where_panel_inv = array('case_type'=>'OB');

                      $result['paneltestList']=$this->commondatamodel->getAllRecordWhere('investigation_panel',$where_panel_inv);

                      // $result['paneltestList']=$this->commondatamodel->getAllDropdownData('investigation_panel');

                      //print_r( $result['paneltestList']);exit;

                   $result['prescriptionLatestData']=$this->patientcasemodel->getPrescriptionLatestByCase($caseID);

                   if ($result['prescriptionLatestData']) {
                     $prescriptionID=$result['prescriptionLatestData']->prescription_id;

                      $result['prescriptionMedicineList']=$this->patientcasemodel->getMedicineDetailsByPrescriptionId($prescriptionID);

                      $result['prescriptionInvestigationList']=$this->patientcasemodel->getInvestigationDetailsByPrescriptionId($prescriptionID);

                    $result['prescriptionInvestigationpanel'] = $this->patientcasemodel->getInvestigationpanelDetailsByPrescriptionId($prescriptionID);


                   }else{
                    $result['prescriptionMedicineList']=[];
                    $result['prescriptionInvestigationList']=[];
                    $result['prescriptionInvestigationpanel'] = [];
                   }

                   //pre($result['prescriptionInvestigationpanel']);exit;

                   $result['prescriptioAllData']=$this->patientcasemodel->getAllPrescriptionByCase($caseID);
                   $result['clinicalExaminationData']=$this->patientcasemodel->getClinicalExaminationDetails($caseID);
                 

                   $where_medicine_type=[];
                   $orderby='medicine_type.medicine_type';
                   
                   $result['medicineTypeList']=$this->commondatamodel->getAllRecordWhereOrderBy('medicine_type',$where_medicine_type,$orderby);
                   $orderbyCat='medicine_category.category';
                   $result['medicineCategoryList']=$this->commondatamodel->getAllRecordWhereOrderBy('medicine_category',[],$orderbyCat);
                  // pre($result['medicineCategoryList']);exit;
       
                   $result['presentation'] = array('Cephalic','Breech','Transverse lie','Oblique lie');
                   $result['liquor'] = array('Adequate','Inadequate','more than adequate');

                   $result['reactivenonrective'] = array('Reactive','Nonreactive');


                   $result['adviceMasterData']=$this->patientcasemodel-> getAdviceMasterData();


                   $result['adviceDetailsLatestData']=$this->patientcasemodel->getAdviceDetailsData($caseID);

                    $casemaster = array('case_master_id'=>$caseID);                  
                    $result['patientDieases']=$this->commondatamodel->getAllRecordWhere('patient_dieases',$casemaster);
                    $result['DaysList']=$this->commondatamodel->getAllDropdownData('day_master');

                    $result['diagnosisList']=$this->patientcasemodel->getDiagnosisDetails($caseID);
                 

                    //pre($result['diagnosisList']);exit;

                    //$result['diagnosisdetails']=$this->commondatamodel->getAllRecordWhere('diagnosis_details',$casemaster);
                    //pre($result['diagnosisdetails']);exit;

                  // $result['medicineCategoryList']=$this->commondatamodel->getAllDropdownData('medicine_category');


                  // pre($result['adviceDetailsLatestData']);

                   //exit;


                  

                //    foreach ($result['adviceMasterData'] as $value) {
                      
                //      //  pre($value['advType']);
                //      echo $value['advType']->advice_type;
                //      echo "<br>";
                //      foreach ($value['adviceList'] as $advlistrow) {
                //         pre($advlistrow);
                //      }
                //    }


                //    exit;



                  // pre($result['investigationLatestData']);exit;
                   
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
            // $bloodgroup = trim(htmlspecialchars($dataArry['bloodgroup']));
            // $husband_bloodgroup = trim(htmlspecialchars($dataArry['husband_bloodgroup']));
            $address = trim(htmlspecialchars($dataArry['address']));

            $module = 'Antenatel';
            $method = 'Patientcase/updatePatientBasicInfo';
            
            $update_array  = array(
     
                                          'selfmobile' => $selfmobile,       
                                          'alternate_mobile' => $alternate_mobile,       
                                          'patientname' => $patientname,       
                                          'patientage' => $patientage,       
                                          'patientgender' => $patientgender,       
                                          'bloodgroup' => NUll,             
                                          'husband_bloodgroup' => NUll,             
                                          'address' => $address,             
                                          'last_modified' => date('Y-m-d H:i:s'),    
                                    );
                
            $where = array(
                "patient_master.patient_id" => $patientID
                );
            
            
        
            $update = $this->commondatamodel->updateSingleTableData('patient_master',$update_array,$where);

            $action = 'update';
            $activitytable = 'patient_master';

            $this->activity_log($module,$patientID,$action,$method,$activitytable);

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
        {   $dataArry=[];
            $json_response = array();
            $formData = $this->input->post('formDatas');
            parse_str($formData, $dataArry);

            $module = 'Antenatel';
            $method = 'Patientcase/antenantalinfo_action';

       
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

            $is_married_others = $dataArry['isOtherMarried'];

            if($is_married_others == 'Y'){

              $marriedforothers = $dataArry['marriedforother'];
            }
            else{
              $marriedforothers = "";
            }

            $is_trying_others = $dataArry['isOtherTrying'];

             if($is_trying_others == 'Y'){

              $tryingforother = $dataArry['tryingforother'];
            }
            else{
              $tryingforother = "";
            }



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


            // if (isset($dataArry['procedure_concieve'])) {
            //     $procedure_concieve = '';
            //     foreach ($dataArry['procedure_concieve'] as  $value) {
            //       $procedure_concieve.=$value.',';
            //     }
            //     $procedure_concieve = substr($procedure_concieve, 0, -1);
            //     $procedure_concieve;
            // }else{
            //     $procedure_concieve = '';
            // }
            if (isset($dataArry['procedure_concieve'])) {
                $procedure_concieve = $dataArry['procedure_concieve'];
            }else{
                $procedure_concieve='';
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

            if ($dataArry['seleddbyusg_date']!='') {
                $seleddbyusg_date = date('Y-m-d', strtotime($dataArry['seleddbyusg_date']));
            }else{
               $seleddbyusg_date = NULL; 
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
             $cycle_days_pm = $dataArry['cycle_days_pm'];
             $cycle_plusminusdays = $dataArry['cycle_plusminusdays'];


           // comment by anil on 25-11-2019 and new on 

             // $sel_diseasesValues = $dataArry['sel_diseasesValues'];
             // $isOtherDiseases = $dataArry['isOtherDiseases'];
             // $other_diseases = $dataArry['other_diseases'];
             // if ($isOtherDiseases=='N') {
             //  $other_diseases=NULL;
             // }


         // Start Add diseases data in new table  
         
   $wheredise = array('case_master_id'=>$caseID);     
   $deleteRegularMedicineDetails=$this->commondatamodel->deleteTableData('patient_dieases',$wheredise);

   $action = 'delete & insert';
   $activitytable = 'patient_dieases';
   $insertId = NULL;

   $this->activity_log($module,$insertId,$action,$method,$activitytable);


                        if(isset($dataArry['diseasesID']) ) {
                          
                           for ($i=0; $i < count($dataArry['diseasesID']) ; $i++) { 
                             $diseasesID = $dataArry['diseasesID'];
                             $dieseasesYer = $dataArry['dieseasesYer'];
                             $otherdiseases = $dataArry['otherdiseases'];
                            
                           

                            $diseases_dtl_array = array(
                                                        'case_master_id' => $caseID ,
                                                        'diseases_id' => $diseasesID[$i] ,
                                                        'other_diseases' => $otherdiseases[$i] ,
                                                        'diseases_years' => $dieseasesYer[$i] ,
                                                                                                                
                                                       );
                           
                            $insertdiseases=$this->commondatamodel->insertSingleTableData('patient_dieases',$diseases_dtl_array);
                         }

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



               if ($dataArry['tt1_taken_on']!='') {
                $tt1_taken_on = date('Y-m-d', strtotime($dataArry['tt1_taken_on']));
               }else{
                    $tt1_taken_on = NULL; 
               }

               if ($dataArry['tt1_tobe_taken_on']!='') {
                $tt1_tobe_taken_on = date('Y-m-d', strtotime($dataArry['tt1_tobe_taken_on']));
               }else{
                    $tt1_tobe_taken_on = NULL; 
               }

               if ($dataArry['tt2_taken_on']!='') {
                $tt2_taken_on = date('Y-m-d', strtotime($dataArry['tt2_taken_on']));
               }else{
                    $tt2_taken_on = NULL; 
               }

               if ($dataArry['tt2_tobe_taken_on']!='') {
                $tt2_tobe_taken_on = date('Y-m-d', strtotime($dataArry['tt2_tobe_taken_on']));
               }else{
                    $tt2_tobe_taken_on = NULL; 
               }

                if ($dataArry['tdap_taken_on']!='') {
                    $tdap_taken_on = date('Y-m-d', strtotime($dataArry['tdap_taken_on']));
                }else{
                        $tdap_taken_on = NULL; 
                }

                if ($dataArry['tdap_tobe_taken_on']!='') {
                    $tdap_tobe_taken_on = date('Y-m-d', strtotime($dataArry['tdap_tobe_taken_on']));
                }else{
                        $tdap_tobe_taken_on = NULL; 
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
      $exam_cvs = $dataArry['exam_cvs'];
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

$action = 'delete & insert';
$activitytable = 'examination_master';
$insertId = NULL;

$this->activity_log($module,$insertId,$action,$method,$activitytable);
       
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
                                     'exam_cvs' => $exam_cvs,                                  
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

      $urine_re_notes = $dataArry['urine_re_notes'];//created by anil 24-09-2019

      $urine_re_result = $dataArry['urine_re_result'];
      $urine_re_others = $dataArry['urine_re_others'];
      if ($dataArry['urine_re_date']!='') {
      $urine_re_date = date("Y-m-d", strtotime($dataArry['urine_re_date']));
      }else{ $urine_re_date=NULL; }

      $cs_sensitive_to_result = $dataArry['cs_sensitive_to_result'];
      $cs_sensitive_others = $dataArry['cs_sensitive_others'];
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

      /* comment by anil 20-09-2019 as user require */

      /*$combined_test_result = $dataArry['combined_test_result'];
      if ($dataArry['combined_test_date']!='') {
      $combined_test_date = date("Y-m-d", strtotime($dataArry['combined_test_date']));
      }else{ $combined_test_date=NULL; }*/

     
      
      
     $thalassemia_other = $dataArry['thalassemia_other'];
      $thalassemia_result = $dataArry['thalassemia_screening_result'];
      if ($dataArry['thalassemia_date']!='') {
      $thalassemia_date = date("Y-m-d", strtotime($dataArry['thalassemia_date']));
      }else{ $thalassemia_date=NULL; }

      $usg_scan_date = $dataArry['usg_scan_date'];
      if ($dataArry['usg_scan_date']!='') {
      $usg_scan_date = date("Y-m-d", strtotime($dataArry['usg_scan_date']));
      }else{ $usg_scan_date=NULL; }

      $usg_slf_week = $dataArry['usg_slf_week'];
      $usg_slf_day = $dataArry['usg_slf_day'];
      
      //Modify nt _scan data by anil 30-10-2019 
      $nt_scan = $dataArry['nt_scan'];
      
      if ($dataArry['nt_scan_date']!='') {
      $nt_scan_date = date("Y-m-d", strtotime($dataArry['nt_scan_date']));
      }else{ $nt_scan_date=NULL; }

       if ($dataArry['double_marker_date']!='') {
      $double_marker_date = date("Y-m-d", strtotime($dataArry['double_marker_date']));
      }else{ $double_marker_date=NULL; }

    //  $nt_scan_lowerrisk = $dataArry['nt_scan_lowerrisk'];

      if (isset($dataArry['nt_scan_lowerrisk'])) {
        $nt_scan_lowerrisk = '';
        foreach ($dataArry['nt_scan_lowerrisk'] as  $value) {
          $nt_scan_lowerrisk.=$value.',';
        }
        $nt_scan_lowerrisk = substr($nt_scan_lowerrisk, 0, -1);
        
         }else{
         $nt_scan_lowerrisk = '';
       }
    //  $nt_scan_highrisk = $dataArry['nt_scan_highrisk'];

      if (isset($dataArry['nt_scan_highrisk'])) {
        $nt_scan_highrisk = '';
        foreach ($dataArry['nt_scan_highrisk'] as  $value) {
          $nt_scan_highrisk.=$value.',';
        }
        $nt_scan_highrisk = substr($nt_scan_highrisk, 0, -1);
        
         }else{
         $nt_scan_highrisk = '';
       }



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
      $growth_presentation = $dataArry['growth_presentation'];
      $growth_afi = $dataArry['growth_afi'];
      $growth_liquor = $dataArry['growth_liquor'];

      if ($dataArry['doppler_scan_date']!='') {
        $doppler_scan_date = date("Y-m-d", strtotime($dataArry['doppler_scan_date']));
        }else{ $doppler_scan_date=NULL; }
      $doppler_slf_week = $dataArry['doppler_slf_week'];
      $doppler_slf_day = $dataArry['doppler_slf_day'];
      $doppler_presentation = $dataArry['doppler_presentation'];
      $doppler_afi = $dataArry['doppler_afi'];
      $doppler_liquor = $dataArry['doppler_liquor'];

        if(isset($dataArry['doppler_checkbox'])){
            $doppler_checkbox = $dataArry['doppler_checkbox'];
        }else{
            $doppler_checkbox=null;  
        }

     $umbilical_artery_pi = $dataArry['umbilical_artery_pi'];
     $mca_pi = $dataArry['mca_pi'];
     $cp_ratio = $dataArry['cp_ratio'];
     $doppler_parameters_others = $dataArry['doppler_parameters_others'];
     $others_investigation = $dataArry['others_investigation'];

     if ($dataArry['others_investigation_date']!='') {
        $others_investigation_date = date("Y-m-d", strtotime($dataArry['others_investigation_date']));
        }else{ $others_investigation_date=NULL; }






/* insert into investigation_record */

  if ($ischangeInvestigation=='Y') {

    $where_investigation_record = array(
                             'case_master_id' => $caseID,
                             'created_on' => date('Y-m-d')
                           );

    /* delete today data data*/
$deleteTodayInvestigation=$this->commondatamodel->deleteTableData('investigation_record_master',$where_investigation_record);

$action = 'delete & insert';
$activitytable = 'investigation_record_master';
$insertId = NULL;

$this->activity_log($module,$insertId,$action,$method,$activitytable);
   

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
                                  'thalassemia_screening_result' => $thalassemia_result, 
                                    'thalassemia_date' => $thalassemia_date, 
                                    'usg_scan_date' => $usg_scan_date, 
                                    'usg_slf_week' => $usg_slf_week, 
                                    'usg_slf_day' => $usg_slf_day, 
                                    'nt_scan' => $nt_scan, 
                                    'nt_scan_date' => $nt_scan_date, 
                                    'double_marker_date' => $double_marker_date, 
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
                                    'growth_presentation' => $growth_presentation, 
                                    'growth_afi' => $growth_afi, 
                                    'growth_liquor' => $growth_liquor,
                                    'doppler_scan_date' => $doppler_scan_date,
                                    'doppler_slf_week' => $doppler_slf_week,
                                    'doppler_slf_day' => $doppler_slf_day,
                                    'doppler_presentation' => $doppler_presentation,
                                    'doppler_afi' => $doppler_afi,
                                    'doppler_liquor' => $doppler_liquor,
                                    'doppler_checkbox' => $doppler_checkbox,
                                    'umbilical_artery_pi' => $umbilical_artery_pi,
                                    'mca_pi' => $mca_pi,
                                    'cp_ratio' => $cp_ratio,
                                    'doppler_parameters_others' => $doppler_parameters_others,
                                    'others_investigation' => $others_investigation,
                                    'others_investigation_date' => $others_investigation_date,
                                    'urine_re_notes' => $urine_re_notes,
                                    'thalassemia_other' =>$thalassemia_other,
                                    'urine_re_others' =>$urine_re_others,
                                    'cs_sensitive_others' =>$cs_sensitive_others,
                                    );

  //pre($investigation_record_array);exit;

$insertInvestigation=$this->commondatamodel->insertSingleTableData('investigation_record_master',$investigation_record_array);


}


$doctor_note = trim($dataArry['doctor_note']);
$weekdays = trim($dataArry['weekdays']);
$weeksmobile = trim($dataArry['weeksmobile']);
$pretimefrom = trim($dataArry['pretimefrom']);
$ischangePrescription = $dataArry['ischangePrescription'];

//comment by anil on 26-11-2019

// if ($dataArry['next_checkup_date']!='') {
      
//     $next_checkup_date = date("Y-m-d", strtotime($dataArry['next_checkup_date']));

// }else{ $next_checkup_date=NULL; }




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

//creted on 23-09-2019 
$deleteTodayPrespanelInves=$this->commondatamodel->deleteTableData('prescription_investigation_panel_details',$where_pres_mst);

   
/* delete master data*/
$deleteTodayPrescription=$this->commondatamodel->deleteTableData('prescription_master',$where_prescription);
   // pre($todayPresData);

}





//Note remove next chekup date from prescription by anil


/* insert into prescription_master */  
  $prescription_master = array(
                                'case_master_id' => $caseID, 
                                'created_on' => date('Y-m-d H:i:s'),
                                'doctor_note' => $doctor_note, 
                                'entry_date' => date('Y-m-d'),
                                'prescription_weekdays'=>$weekdays,
                                'premobile_no'=> $weeksmobile,
                                'prescription_time'=>$pretimefrom
                               );


  $insertPrescriptionID=$this->commondatamodel->insertSingleTableData('prescription_master',$prescription_master);

  
  if(isset($dataArry['presMedID'])) {

    $presMedID = $dataArry['presMedID'];
    //$presdosage = $dataArry['presdosage'];
   // $presfrequency = $dataArry['presfrequency'];
    $presdays = $dataArry['presdays'];
    $presInstruction = $dataArry['presInstruction'];
    $presInstructionothers = $dataArry['presInstructionothers'];

    for ($i=0; $i <count($dataArry['presMedID']) ; $i++) { 
     

        $pres_med_arr = array(
                              'prescription_mst_id' => $insertPrescriptionID, 
                              'medicine_id' => $presMedID[$i], 
                             // 'dosage' => $presdosage[$i], 
                             // 'frequency' => $presfrequency[$i], 
                              'days' => $presdays[$i],
                              'med_instruction' => $presInstruction[$i],
                              'med_instruction_other' => $presInstructionothers[$i],
                              'created_on' => date('Y-m-d'), 
                            );

         $insertPresMedicine=$this->commondatamodel->insertSingleTableData('prescription_medicine_dtl',$pres_med_arr);
    }

  }

  /* Investigation Panel details */

  if(isset($dataArry['presinvestigationPanelID']) ) {
     $presinvestigationPanelID = $dataArry['presinvestigationPanelID'];
     $presinvestigationpanel = $dataArry['presinvestigationpanel'];

     for ($i=0; $i < count($dataArry['presinvestigationPanelID']); $i++) { 


             //created by anil for prescription investigation panel deatils 23-09-2019
           
           $presinvestigationpanel_arr = array(
                                   'prescription_mst_id' => $insertPrescriptionID,
                                   'master_panel_id' => $presinvestigationPanelID[$i],
                                   'panel_investigation_details' => $presinvestigationpanel[$i],
                                   'created_on' => date('Y-m-d'), 
                                  );


          
           //created by anil for prescription investigation panel deatils 23-09-2019

            $insertPresInvestigationpanel=$this->commondatamodel->insertSingleTableData('prescription_investigation_panel_details',$presinvestigationpanel_arr);


      
     }
     

   }


  /* Investigation Details */



   if(isset($dataArry['presinvestigationID']) ) {
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



   /* Advice dta */




if(isset($dataArry['advice'])) {

    $where_adv_dtl = array(
        'case_master_id' => $caseID,
        'created_on' => date('Y-m-d')
      );

/* delete today data data*/
$deleteTodayAdvice=$this->commondatamodel->deleteTableData('advice_details',$where_adv_dtl);

$advice = $dataArry['advice'];
$advice_type = $dataArry['advice_type'];
$is_advice_option = $dataArry['is_advice_option'];
$advice_options = $dataArry['advice_options'];

    for ($i=0; $i < count($dataArry['advice']); $i++) { 
       
        $advice_array = array(
                                'case_master_id' => $caseID,
                                'created_on' => date('Y-m-d'),
                                'advice_type' => $advice_type[$i],
                                'advice' => $advice[$i],
                                'is_advice_option' => $is_advice_option[$i],
                                'advice_options' => $advice_options[$i],
                             );
        $insertAdvice=$this->commondatamodel->insertSingleTableData('advice_details',$advice_array);
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
                                                        'medicine_mst_id' => $mensumedicine[$i], 
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
                           $babyweight = $dataArry['babyweight'];
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
                                                      'baby_weight' => $babyweight[$i],
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
                             $regularmedicinefrequency = $dataArry['regularmedicinefrequency'];
                             $regularmedforYear = $dataArry['regularmedforYear'];
                             $regularmedforMonth = $dataArry['regularmedforMonth'];
                           

                            $regularmedicine_dtl_array = array(
                                                        'case_master_id' => $caseID ,
                                                        'medicine_mst_id' => $regularmedicine[$i] ,
                                                        'medicine_dose' => $regularmedicinedose[$i] ,
                                                        'medicine_frequency' => $regularmedicinefrequency[$i] ,
                                                        'for_year' => $regularmedforYear[$i] ,
                                                        'for_month' => $regularmedforMonth[$i] ,
                                                        
                                                       );
                           
                            $insertRegularMedicine=$this->commondatamodel->insertSingleTableData('regular_medicines_details',$regularmedicine_dtl_array);
                         }

                      }


  /* Diagnosis Summary data delete and insert */

        $where_caseId = array('case_master_id' => $caseID);

        $isDignosisChange = $dataArry['isDignosisChange'];

               if($isDignosisChange == 'Y'){


                     $deleteDignosis=$this->commondatamodel->deleteTableData('diagnosis_details',$where_caseId);

                      if(isset($dataArry['dignosisdetail'])) {
                        
                         $dignosisdetail = $dataArry['dignosisdetail'];
                         $dignosis_checkvalue = $dataArry['dignosis_checkvalue'];
                         $otherdiagnosis = $dataArry['otherdiagnosis'];
                         
                        // print_r($dignosisdetail);
                        // print_r($dignosis_checkvalue);
                        // print_r($otherdiagnosis);
                        // exit;
                          for ($i=0; $i < count($dataArry['dignosisdetail']); $i++) { 
                           
                           $diagnosis_array = array(
                                                        'case_master_id' => $caseID, 
                                                        'diagnosis_master_id' => $dignosisdetail[$i], 
                                                        'is_diagnosis' => $dignosis_checkvalue[$i], 
                                                        'otherdiagnosis' => $otherdiagnosis[$i] 
                                                      );

                          $insertMesMed=$this->commondatamodel->insertSingleTableData('diagnosis_details',$diagnosis_array);

                          }
                       
                      }


            }



         /* insert into clinical examination detail data */

         if(isset($dataArry['examination_date'])) {

            $deleteClinicalExaminationDetails=$this->commondatamodel->deleteTableData('clinical_examination_details',$where_caseId);
            $examination_date = $dataArry['examination_date'];
            $weeks_by_lmp = $dataArry['weeks_by_lmp'];
            $days_by_lmp = $dataArry['days_by_lmp'];
            $weeks_by_usg = $dataArry['weeks_by_usg'];
            $days_by_usg = $dataArry['days_by_usg'];
            $cliexm_weight = $dataArry['cliexm_weight'];
            $cliexm_bp_s = $dataArry['cliexm_bp_s'];
            $cliexm_bp_d = $dataArry['cliexm_bp_d'];
            $cliexm_pallor = $dataArry['cliexm_pallor'];
            $cliexm_oedema = $dataArry['cliexm_oedema'];
            $fundal_height = $dataArry['fundal_height'];
            $cliexm_sfh = $dataArry['cliexm_sfh'];
            $cliexm_fsh = $dataArry['cliexm_fsh'];
            $cliexm_appointment_date = $dataArry['cliexm_appointment_date'];
            $cliexm_after_week = $dataArry['cliexm_after_week'];
            $cliexm_after_days = $dataArry['cliexm_after_days'];
 

            for ($i=0; $i < count($dataArry['examination_date']) ; $i++) { 

                if($cliexm_appointment_date[$i]!=''){
                    $appcliexmDate=date("Y-m-d", strtotime($cliexm_appointment_date[$i]));
                }else{
                    $appcliexmDate=NULL;
                }

                if($examination_date[$i]!=''){
                    $cliexmDate=date("Y-m-d", strtotime($examination_date[$i]));
                }else{
                    $cliexmDate=NULL;
                }
               

                $clinicalexam_dtl_array = array(
                    'case_master_id' => $caseID ,
                    'examination_date' => $cliexmDate,
                    'weeks_by_lmp' => $weeks_by_lmp[$i],
                    'days_by_lmp' => $days_by_lmp[$i],
                    'weeks_by_usg' => $weeks_by_usg[$i],
                    'days_by_usg' => $days_by_usg[$i],
                    'cliexm_weight' => $cliexm_weight[$i],
                    'cliexm_bp_s' => $cliexm_bp_s[$i],
                    'cliexm_bp_d' => $cliexm_bp_d[$i],
                    'cliexm_pallor' => $cliexm_pallor[$i],
                    'cliexm_oedema' => $cliexm_oedema[$i],
                    'fundal_height' => $fundal_height[$i],
                    'cliexm_sfh' => $cliexm_sfh[$i],
                    'cliexm_fsh' => $cliexm_fsh[$i],
                    'cliexm_appointment_date' => $appcliexmDate,
                    'cliexm_after_week' => $cliexm_after_week[$i],
                    'cliexm_after_days' => $cliexm_after_days[$i],
                    'entry_date' => date('Y-m-d'),
                   
                   );

$insertClinicalExamination=$this->commondatamodel->insertSingleTableData('clinical_examination_details',$clinicalexam_dtl_array);

              

                
            }

          

         }

        //  exit;










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
                                          'seleddbyusg_date' => $seleddbyusg_date,       
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
                                          'cycle_days_pm' => $cycle_days_pm,       
                                          'cycle_plusminusdays' => $cycle_plusminusdays, 
                                          'any_allergy' => $any_allergy,       
                                          'vaccination_ids' => $vaccination,       
                                          'highrisk_ids' => $highriskValues,       
                                          'is_highrisk_others' => $isOtherHighrisk,       
                                          'highrisk_others' => $highrisk_others,       
                                          'tt1_taken_on' => $tt1_taken_on,  
                                          'tt2_taken_on' => $tt2_taken_on,  
                                          'tt1_tobe_taken_on' => $tt1_tobe_taken_on,  
                                          'tt2_tobe_taken_on' => $tt2_tobe_taken_on,  
                                          'tdap_taken_on' => $tdap_taken_on,        
                                          'tdap_tobe_taken_on' => $tdap_tobe_taken_on,
                                          'married_for_others' => $marriedforothers,
                                          'is_married_others' =>$is_married_others,
                                          'trying_for_others' => $tryingforother,
                                          'is_trying_others' => $is_trying_others
        
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
                                          'seleddbyusg_date' => $seleddbyusg_date,         
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
                                          'cycle_days_pm' => $cycle_days_pm,       
                                          'cycle_plusminusdays' => $cycle_plusminusdays,  
                                          'any_allergy' => $any_allergy,       
                                          'vaccination_ids' => $vaccination,       
                                          'highrisk_ids' => $highriskValues,       
                                          'is_highrisk_others' => $isOtherHighrisk,       
                                          'highrisk_others' => $highrisk_others, 
                                          'tt1_taken_on' => $tt1_taken_on, 
                                          'tt2_taken_on' => $tt2_taken_on,  
                                          'tt1_tobe_taken_on' => $tt1_tobe_taken_on,  
                                          'tt2_tobe_taken_on' => $tt2_tobe_taken_on,  
                                          'tdap_taken_on' => $tdap_taken_on,        
                                          'tdap_tobe_taken_on' => $tdap_tobe_taken_on,
                                          'married_for_others' => $marriedforothers,
                                          'is_married_others' =>$is_married_others,
                                          'trying_for_others' => $tryingforother,
                                          'is_trying_others' => $is_trying_others
        
                                                
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
            $selmens_medicine = $this->input->post('selmens_medicine');
            $data['medicine_duration'] = $this->input->post('selmens_medicine_duration');


            $where_medicine= array('medicine_id' => $selmens_medicine );
            $medicineData = $this->commondatamodel->getSingleRowByWhereCls('medicine_master',$where_medicine);
            //pre($medicineData);exit;

            $data['medicineID'] = $selmens_medicine;
            $data['medicine'] = $medicineData->medicine_name;

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
          //  $data['complicationList']=$this->commondatamodel->getAllDropdownData('complication_master');
            $data['complicationList']=$this->commondatamodel->getAllRecordWhereOrderBy('complication_master',[],'complication_name');
           // $data['medicalProblemList']=$this->commondatamodel->getAllDropdownData('medical_problem');
            $data['medicalProblemList']=$this->commondatamodel->getAllRecordWhereOrderBy('medical_problem',[],'problem');


            $data['genderList']=$this->commondatamodel->getAllDropdownData('gender_master');

            $data['deliveryType'] = array(
                                  'CS' => 'CS',
                                  'ND' => 'ND',
                                  'SE' => 'S/E',
                                  'Spontaneous Expulsion'=>'Spontaneous Expulsion'
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
            $medicineID = $this->input->post('medicine');
            $data['dose'] = $this->input->post('dose');
            $data['year'] = $this->input->post('year');
            $data['month'] = $this->input->post('month');
            $data['frequency'] = $this->input->post('frequency');

            $where_medicine= array('medicine_id' => $medicineID );
            $medicineData = $this->commondatamodel->getSingleRowByWhereCls('medicine_master',$where_medicine);

            $data['regularmedicinerowno'] = $row_no;
            $data['medicineID'] = $medicineID;
            $data['medicine'] = $medicineData->medicine_name;
            $data['DaysList']=$this->commondatamodel->getAllDropdownData('day_master');
            $data['dosageList'] = array('0.5','1','1.5','2','2.5','5','7.5','10');
            
           
             $page = 'dashboard/admin_dashboard/case/regular_medicines_partial_view';
            $viewTemp = $this->load->view($page,$data,TRUE);
            echo $viewTemp;
        }
        else
        {
            redirect('login','refresh');
        }
    }

    public function addClinicalExaminationdetail()
    {
        if($this->session->userdata('user_data'))
        {
            $session = $this->session->userdata('user_data');
        

            $row_no = $this->input->post('rowNo');
            $data['cliexmrowno'] = $row_no;
            $data['DaysList']=$this->commondatamodel->getAllDropdownData('day_master');
            $data['pallor'] = array('Nil','Mild','Mod','Severe' );
            $data['oedema'] = array('Nil','Mild','Mod','Severe' );
            
           
             $page = 'dashboard/admin_dashboard/case/clinical_examination_partial_view';
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
              $selectMonth = date('M', strtotime($lmpdate));
             

              if($selectMonth=='Jan' || $selectMonth=='Feb' || $selectMonth=='Mar'){

                $this->janToMarEDDCalculation($lmpdate);

              }else{
                 $this->aprToDecEDDCalculation($lmpdate);
              }
          // echo "<br>";
          //   echo $next_due_date = date('l d M Y', strtotime($lmpdate. ' +280 days'));
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
              $seleddbyusg_date = $this->input->post('seleddbyusg_date');
              $edd_week = $this->input->post('edd_week');
              $edd_days = $this->input->post('edd_days');

              //$addDays=280  -($edd_week*7+$edd_days);

              $totalDays=($edd_week*7+$edd_days);

         $lmpdate=date('l d M Y', strtotime($seleddbyusg_date. ' +-'.$totalDays.' days'));
        // echo "<br>";

              $selectMonth = date('M', strtotime($lmpdate));

                if($selectMonth=='Jan' || $selectMonth=='Feb' || $selectMonth=='Mar'){

                $this->janToMarEDDCalculation($lmpdate);

              }else{
                 $this->aprToDecEDDCalculation($lmpdate);
              }
           // echo "<br>";


           //  echo $next_due_date = date('l d M Y', strtotime($seleddbyusg_date. ' +'.$addDays.' days'));
        }
        else
        {
            redirect('login','refresh');
        }
    }


    public function weekDaysCalculationByLmp()
    {
        if($this->session->userdata('user_data'))
        {
            $days=0;$weeks=0;
               $lmp_date = date('Y-m-d', strtotime($this->input->post('lmp_date')));
               $cliexmDate = date('Y-m-d', strtotime($this->input->post('cliexmDate'))); 
              

                // Declare two dates 
                $start_date = strtotime($lmp_date); 
                $end_date = strtotime($cliexmDate); 
                
                // Get the difference and divide into  
                // total no. seconds 60/60/24 to get  
                // number of days 
                 $daysCount= ($end_date - $start_date)/60/60/24; 

                    if($daysCount<7){
                        $days=$daysCount;
                        $weeks=0;

                    }else{
                        $weeks = floor($daysCount/7);
                        $days = $daysCount%7;
                    }

                    echo $weeks_days=$weeks.'_'.$days;
            

           
        }
        else
        {
            redirect('login','refresh');
        }
    }


    public function weekDaysCalculationByUsg()
    {
        if($this->session->userdata('user_data'))
        {
            $days=0;$weeks=0;
               //$seleddbyusg_date = date('Y-m-d', strtotime($this->input->post('seleddbyusg_date')));


              $seleddbyusg_date = $this->input->post('seleddbyusg_date');
              $edd_week = $this->input->post('edd_week');
              $edd_days = $this->input->post('edd_days');

              $totalDays=($edd_week*7+$edd_days);

              $lmpdatebyusg=date('Y-m-d', strtotime($seleddbyusg_date. ' +-'.$totalDays.' days'));

               $cliexmDate = date('Y-m-d', strtotime($this->input->post('cliexmDate'))); 
              

                // Declare two dates 
                $start_date = strtotime($lmpdatebyusg); 
                $end_date = strtotime($cliexmDate); 
                
                // Get the difference and divide into  
                // total no. seconds 60/60/24 to get  
                // number of days 
                 $daysCount= ($end_date - $start_date)/60/60/24; 

                    if($daysCount<7){
                        $days=$daysCount;
                        $weeks=0;

                    }else{
                        $weeks = floor($daysCount/7);
                        $days = $daysCount%7;
                    }

                    echo $weeks_days=$weeks.'_'.$days;
            

           
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
             $medicine_category_id=$medicineData->category_id;
             $where_catagory = array('medicine_category.med_cat_id' => $medicine_category_id );

            $categoryData = $this->commondatamodel->getSingleRowByWhereCls('medicine_category',$where_catagory);
            if($categoryData){
                $data['category']=$categoryData ->category;
            }else{
                $data['category']=''; 
            }
           
            $data['rowno'] = $row_no;
            $data['medicineID'] = $medicineID;
            $data['medicine'] = $medicineData->medicine_name;
             //commented on 18.11.2019
           // $data['dosage'] = $this->input->post('dosage');
           // $data['frequency'] = $this->input->post('frequency');
            $data['days'] = $this->input->post('days');
            $data['medinstruction'] = $this->input->post('medinstruction');
            $data['othermedinstruction'] = $this->input->post('othermedinstruction');
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
            $data['invData']=[];

            $row_no = $this->input->post('rowNo');
            $investigationID = $this->input->post('investigation');

            for ($i=0; $i < count($investigationID); $i++) { 
             
             $where_investigation= array('investigation_comp_id' => $investigationID[$i] );
                       $investigationData = $this->commondatamodel->getSingleRowByWhereCls('investigation_component',$where_investigation);

             $inv_component_name=$investigationData->inv_component_name;

             $investigationName[] = array(
                                          'investigationName' => $inv_component_name, 
                                          'investigationID' => $investigationID[$i], 
                                          'rowno' => $row_no++, 
                                        );
            }

            $data['invData']=$investigationName;
           // pre($data['invData']);exit; 

           // print_r($investigationID);
          //  $investigationID=1;


            
                      // pre($medicineData);exit;

            // $data['rowno'] = $row_no;
            // $data['investigationID'] = $investigationID;
            // $data['investigation'] = $investigationData->inv_component_name;
        
           
            
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

            $prescription_id=$inv_record_id;

            $where_prescription = array('prescription_id' => $prescription_id);

            $prescriptionData = $this->commondatamodel->getSingleRowByWhereCls('prescription_master',$where_prescription);
           
            $case_master_id=$prescriptionData->case_master_id;
            $entry_date= date("Y-m-d", strtotime($prescriptionData->entry_date));
           

            $result['medicineRowData'] = $this->patientcasemodel->getMedicineDetailsByPrescriptionId($inv_record_id);
           
            $result['investigationRowData'] = $this->patientcasemodel->getInvestigationDetailsByPrescriptionId($inv_record_id);
            //pre($result['investigationRowData']);exit;
      //create new investigation panel by anil 23-09-2019
      
          $result['investigationpanelRowData'] = $this->patientcasemodel->getInvestigationpanelDetailsByPrescriptionId($inv_record_id);


            $adviceData=$this->patientcasemodel->getAdviceDetailsDataByDate($case_master_id,$entry_date);

           // pre($result['adviceData']);

            $adviceDetails=[];

            foreach ($adviceData as $value) {
                          if($value['advType']->advice_type=="I"){
                              $advice_type= 'I-General';
                          }else if($value['advType']->advice_type=="III"){
                              $advice_type= 'III-Optional';
                          }else{
                             $advice_type= $value['advType']->advice_type;
                          }

                           foreach ($value['adviceList'] as $advlistrow) {

                            $adviceDetails[] = array(
                                                    'advType' => $advice_type,
                                                    'advicedtl' => $advlistrow->advice

                                                   );
                           }

            }

           // pre($adviceDetails);

            //comment by anil 23-09-2019
            /*$json_response = array(
                                    'medicine' => $result['medicineRowData'], 
                                    'investigation' => $result['investigationRowData'], 
                                    'advice' => $adviceDetails, 
                                  );*/
           // created by anil 23-09-2019
            $json_response = array(
                                    'medicine' => $result['medicineRowData'], 
                                    'investigation' => $result['investigationRowData'],
                                    'investigationpanel' => $result['investigationpanelRowData'], 
                                    'advice' => $adviceDetails, 
                                  );
             //pre($json_response);exit;

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
          $result['LastSuctionEvacatuion']=[];
          $result['total_parity']='';
          $result['total_cesarean']='';
          $result['total_suction']='';
          $result['total_ND'] = '';
          $parity_term_delivery=0;
          $parity_preterm=0;
          $parity_abortion=0;
          $parity_issue=0;
          $result['slfbldgrp']='';
          $result['husbldgrp']='';
          $result['tt1_taken']='';
          $result['tt1_tobetaken']='';
          $result['tt2_taken']='';
          $result['tt2_tobetaken']='';
          $result['tdap_taken']='';
          $result['tdap_tobetaken']='';
          $result['clinicalExaminationLatestData']=[];
          $result['familyCompData']='N';
          $result['anomalyPlacentaInv']='';
          $result['diagnosisList'] = [];

          $where_dr = array('doctor_master.doctor_id' =>$session['doctor_id']);
          $result['drRegNo']=$this->commondatamodel->getSingleRowByWhereCls('doctor_master',$where_dr)->dr_reg_no;

       

          if($this->uri->rsegment(3) == NULL)
            {
                $caseID = 0;
                 $html="";
            
            }
            else
            {

                $caseID = $this->uri->segment(3);
                

               // $clinic_id=$session['clinic_id']; //comment by anil 24-09-2019
              $where_case_master = [
                    'case_master.case_id' => $caseID
                ];

                $result['patientCaseData'] = $this->commondatamodel->getSingleRowByWhereCls('case_master',$where_case_master); 

                $clinic_id=$result['patientCaseData']->clinic_id;

                $doctor_id=$session['doctor_id'];

                $where_clinic_master = [
                    'clinic_master.clinic_id' => $clinic_id
                ];

                $result['clinicData'] = $this->commondatamodel->getSingleRowByWhereCls('clinic_master',$where_clinic_master);
                
              
                $where_doctor = [
                    'doctor_master.doctor_id' => $doctor_id
                ];

                $result['doctorData'] = $this->commondatamodel->getSingleRowByWhereCls('doctor_master',$where_doctor);

                 
            

                

                $result['patientmasterData'] = $this->patientcasemodel->getPatientBasicInfo($result['patientCaseData']->patient_id); 

              
                 $where_antenatel_master = [
                    'antenantal_master.case_master_id' => $caseID
                 ];

                // getSingleRowByWhereCls(tablename,where params)
                 $result['antenantalCaseData'] = $this->commondatamodel->getSingleRowByWhereCls('antenantal_master',$where_antenatel_master);

                // pre($result['antenantalCaseData']);exit;
                if ($result['antenantalCaseData']) {

                $result['slfbldgrp']=$this->patientcasemodel->getBloodGroupById($result['antenantalCaseData']->wife_bloodgroup);
                $result['husbldgrp']=$this->patientcasemodel->getBloodGroupById($result['antenantalCaseData']->husband_bloodgroup);
                  
                
                  if ($result['antenantalCaseData']->parity_term_delivery!='') {
                    $parity_term_delivery=$result['antenantalCaseData']->parity_term_delivery;
                  }

                  if ($result['antenantalCaseData']->parity_preterm!='') {
                    $parity_preterm=$result['antenantalCaseData']->parity_preterm;
                  }
                
                 if ($result['antenantalCaseData']->parity_abortion!='') {
                   $parity_abortion=$result['antenantalCaseData']->parity_abortion;
                 }
                  
                  if ($result['antenantalCaseData']->parity_issue!='') {
                     $parity_issue=$result['antenantalCaseData']->parity_issue;
                  }

                  if($result['antenantalCaseData']->tt1_taken_on!=''){
                    $result['tt1_taken']= date('d-m-Y', strtotime($result['antenantalCaseData']->tt1_taken_on));}

                  if($result['antenantalCaseData']->tt1_tobe_taken_on!=''){
                    $result['tt1_tobetaken']= date('d-m-Y', strtotime($result['antenantalCaseData']->tt1_tobe_taken_on));}

                  if($result['antenantalCaseData']->tt2_taken_on!=''){
                    $result['tt2_taken']= date('d-m-Y', strtotime($result['antenantalCaseData']->tt2_taken_on));}

                  if($result['antenantalCaseData']->tt2_tobe_taken_on!=''){
                    $result['tt2_tobetaken']= date('d-m-Y', strtotime($result['antenantalCaseData']->tt2_tobe_taken_on));}

                 if($result['antenantalCaseData']->tdap_taken_on!=''){
                    $result['tdap_taken']= date('d-m-Y', strtotime($result['antenantalCaseData']->tdap_taken_on));}

                if($result['antenantalCaseData']->tdap_tobe_taken_on!=''){
                    $result['tdap_tobetaken']= date('d-m-Y', strtotime($result['antenantalCaseData']->tdap_tobe_taken_on));}

                 
                 


                

                 $result['total_parity'] =($parity_term_delivery+$parity_preterm+$parity_abortion+1);

                 $result['total_cesarean'] = $this->patientcasemodel->getTotalCesareanByCase($caseID);
                 //created by anil 24-10-2019
                 $result['total_suction'] = $this->patientcasemodel->getTotalSuctionByCase($caseID);
                 $result['LastSuctionEvacatuion'] = $this->patientcasemodel->getLastSectionEvacatuionByCase($caseID);
               

                 $result['total_ND'] = $this->patientcasemodel->getTotalNdByCase($caseID);

                 $result['lastchildBirth'] = $this->patientcasemodel->getLastChildBirthByCase($caseID);
                 $result['previousChildHistory'] = $this->patientcasemodel->getAllPreviousChildHistory($caseID);
                //pre($result['lastchildBirth']);exit;

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
                                            'med_prob_other' => $previouschild->medicalproblem_other,
                                            'delevery_type'=>$previouschild->delevery_type,
                                            'babygender'=>$previouschild->gender,
                                            'baby_weight'=>$previouschild->baby_weight,
                                             );
                 }

                 $result['previousChild']=$previousChild;

             //  pre($result['previousChild']);exit;

                 $diseases_ids = explode (",", $result['antenantalCaseData']->diseases_ids);
                 $diseasesData=$this->patientcasemodel->getDiseasesByIds($diseases_ids);
                 $diseases='';
                  foreach ($diseasesData as $diseasesrow) {
                    $diseases.=$diseasesrow->diseases_name.',';
                  }
               $result['diseases']=rtrim($diseases,',');

                if ($result['antenantalCaseData']->is_other_diseases=="Y") {

               $result['diseases']=rtrim($result['diseases'],'Others')."".$result['antenantalCaseData']->other_diseases;
                }
               

                $result['Alldiseasesdata'] = $this->patientcasemodel->getAlldiseasebycaseId($caseID);
                //pre($result['Alldiseasesdata']);exit;
                


                $result['surgicaData']=$this->patientcasemodel->getAllSurgicaRecordByCase($caseID);
               // pre($result['surgicaData']);exit;


                $result['familyComponentList']=$this->patientcasemodel->getFamilyComponentDetails($caseID);

               //pre($result['familyComponentList']);exit;

               

                foreach ($result['familyComponentList'] as $familycomponentrow) {

                    if ($familycomponentrow->is_father=='Y' || $familycomponentrow->is_mother=='Y') {
                        $result['familyCompData']='Y';
                    }

                }
                    
            

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

             // pre($result['inveltdata']);exit;
            
              if (count($result['inveltdata']) > 0 && $result['inveltdata']->anomaly_placenta!='') {
                  $anomalyPlacenta_ids = explode (",", $result['inveltdata']->anomaly_placenta);
                  $anomalyPlacentaData=$this->patientcasemodel->getPlacentaByIds($anomalyPlacenta_ids);
                  $anomalyPla='';

                  foreach ($anomalyPlacentaData as $anoplakrow) {
                      $anomalyPla.=$anoplakrow->placenta_name.',';
                  }
                 
                  $result['anomalyPlacentaInv']=rtrim($anomalyPla,',');

              }

          
              
           $result['examinationFirstData']=$this->patientcasemodel->getFirstExaminationDataByCase($caseID);
           $result['examinationLatestData']=$this->patientcasemodel->getExaminationLatestByCase($caseID);
           $result['clinicalExaminationLatestData']=$this->patientcasemodel->getClinicalExaminationLatestByCase($caseID);

         //pre($result['examinationLatestData']);
        // exit;
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
                     // created by anil 24-09-2019
                      $result['prescriptionInvestigationpanel'] = $this->patientcasemodel->getInvestigationpanelDetailsByPrescriptionId($prescriptionID);

                       //print_r($result['prescriptionInvestigationpanel']);exit;
                       $where_prescription_id = array('prescription_id' => $prescriptionID);

                       $result['diagnosisList']=$this->patientcasemodel->getDiagnosisDetails($caseID);

                       //pre($result['diagnosisList']);exit;

                      $prescriptionData = $this->commondatamodel->getSingleRowByWhereCls('prescription_master',$where_prescription_id);
           
                      
                      $pres_entry_date= date("Y-m-d", strtotime($prescriptionData->entry_date));
                      $adviceData=$this->patientcasemodel->getAdviceDetailsDataByDate($caseID,$pres_entry_date);
                       //  pre($adviceData);
                          $adviceDetails=[];

                          foreach ($adviceData as $value) {
                            $advicedtl="";
                                        if($value['advType']->advice_type=="I"){
                                            $advice_type= 'I-General';
                                        }else if($value['advType']->advice_type=="III"){
                                            $advice_type= 'III-Optional';
                                        }else{
                                           $advice_type= $value['advType']->advice_type;
                                        }

                                         foreach ($value['adviceList'] as $advlistrow) {

                                          if ($advOption=$advlistrow->is_advice_option=='Y') {
                                           $advOption=$advlistrow->advice_options;
                                           $advOption=str_replace(',','/',$advOption);
                                          }else{
                                            $advOption="";
                                          }
                                          $advicedtl=$advlistrow->advice." ".$advOption;

                                          if ($advlistrow->is_advice_option=='Y') {
                                           
                                                if ($advOption!='') {
                                                    $adviceDetails[] = array(
                                                                  'advType' => $advice_type,
                                                                  'advicedtl' => $advicedtl,
                                                                  'advopt' => $advlistrow->is_advice_option

                                                                 );
                                                }

                                          }else{

                                               $adviceDetails[] = array(
                                                                  'advType' => $advice_type,
                                                                  'advicedtl' => $advicedtl,
                                                                  'advopt' => $advlistrow->is_advice_option

                                                                 );
                                          }

                                         

                                         }

                          }

                          $result['adviceDetailsData']=$adviceDetails;

                       // pre($result['adviceDetailsData']);
           
                       // exit;


                   }else{
                    $result['prescriptionMedicineList']=[];
                    $result['prescriptionInvestigationList']=[];
                    $result['prescriptionInvestigationpanel']=[];
                    $result['adviceDetailsData']=[];
                   }




                    }// end of if block antenantal case data

//echo $prescriptionID;




        
         //pre($result['clinicalExaminationLatestData']); exit;

              
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


    public function checkPatientMobile() {
        $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {

           $json_response = [];
           $selfmobile = $this->input->post("selfmobile");
           $majorgroup = $this->input->post("majorgroup");
           //comment by anil 27-09-2019
           
           // $where = [
           //     "patient_master.selfmobile" => $selfmobile,

           // ];
           // $isExist = $this->commondatamodel->duplicateValueCheck("patient_master",$where);
           
           // created by anil 27-09-2019
           $isExist = $this->patientcasemodel->duplicatemobileNumberCheck($selfmobile,$majorgroup);

           if($isExist) {
                $json_response = [
                    "msg_status" => 1,
                    "msg_data" => "This mobile no already registered.Please go for existing patient.",
                    
                ];
           }
           else{
                $json_response = [
                    "msg_status" => 0,
                    "msg_data" => "",
                  
                ];
           }

           header('Content-Type: application/json');
           echo json_encode( $json_response );
           exit;

        }else{
            redirect('login','refresh');
        }
  }







   public function resetPrescriptionMedDropdown()
  {
      if($this->session->userdata('user_data'))
      {
        $result['medicineList']=$this->medicinecmodel->getAllMedicineList();
        ?>
         <select name="prescription_medicine" id="prescription_medicine" class="form-control selpres show-tick"  data-live-search="true" tabindex="-98">
                         <option value="0"> &nbsp; </option>
                         <?php 

                         foreach ($result['medicineList'] as $medicinelist) {  ?>
                         <option value="<?php echo $medicinelist->medicine_id;?>"

                          ><?php echo $medicinelist->medicine_name;?></option>
                          <?php     } ?>
                                                   
                          </select> 
        <?php


      }
      else
      {
          redirect('login','refresh');
      }
  }


  public function resetMensuMedDropdown()
  {
      if($this->session->userdata('user_data'))
      {
        $result['medicineList']=$this->medicinecmodel->getAllMedicineList();
        ?>
         <select name="selmens_medicine" id="selmens_medicine" class="form-control selpres show-tick"  data-live-search="true" tabindex="-98">
                         <option value="0"> &nbsp; </option>
                         <?php 

                         foreach ($result['medicineList'] as $medicinelist) {  ?>
                         <option value="<?php echo $medicinelist->medicine_id;?>"

                          ><?php echo $medicinelist->medicine_name;?></option>
                          <?php     } ?>
                                                   
                          </select> 
        <?php


      }
      else
      {
          redirect('login','refresh');
      }
  }



  
  public function resetRegularMedDropdown()
  {
      if($this->session->userdata('user_data'))
      {
        $result['medicineList']=$this->medicinecmodel->getAllMedicineList();
        ?>
         <select name="selregular_medicine" id="selregular_medicine" class="form-control selpres show-tick"  data-live-search="true" tabindex="-98">
                         <option value="0"> &nbsp; </option>
                         <?php 

                         foreach ($result['medicineList'] as $medicinelist) {  ?>
                         <option value="<?php echo $medicinelist->medicine_id;?>"

                          ><?php echo $medicinelist->medicine_name;?></option>
                          <?php     } ?>
                                                   
                          </select> 
        <?php


      }
      else
      {
          redirect('login','refresh');
      }
  }


  public function resetAdviceData()
  {
      if($this->session->userdata('user_data'))
      {
      
       $seleddbyusg_date = $this->input->post("seleddbyusg_date");
       $edd_week = $this->input->post("edd_week");
       $edd_days = $this->input->post("edd_days");
       $weeks=0;
     

       if ($seleddbyusg_date!='') {

          $seleddbyusg_date = date('Y-m-d', strtotime($this->input->post('seleddbyusg_date')));
          $today_date=date('Y-m-d');
        
       
         // Declare two dates 
                $start_date = strtotime($seleddbyusg_date); 
                $end_date = strtotime($today_date); 
                
                // Get the difference and divide into  
                // total no. seconds 60/60/24 to get  
                // number of days 
                $daysCount= ($end_date - $start_date)/60/60/24; 

                $daysCount+=$edd_days+($edd_week*7);

                    if($daysCount<7){
                        $days=$daysCount;
                        $weeks=0;

                    }else{
                        $weeks = floor($daysCount/7);
                        $days = $daysCount%7;
                    }

            }

            $data['weeks']=$weeks;

 //echo "<br>weeks".$weeks;
// echo "<br>";
       
        $data['adviceMasterData']=$this->patientcasemodel-> getAdviceMasterData();

       // pre($data['adviceMasterData']);


       
        $page = 'dashboard/admin_dashboard/case/advice_master_data_pertial_view';
        $viewTemp = $this->load->view($page,$data,TRUE);
        echo $viewTemp;
       
      }
      else
      {
          redirect('login','refresh');
      }
  }


  public function resetPresMedicineDropdownByCategory()
  {
      if($this->session->userdata('user_data'))
      {
        $medicine_category = $this->input->post("medicine_category");
        $result['medicineList']=$this->medicinecmodel->getAllMedicineListbyCategory($medicine_category);
        ?>
         <select name="prescription_medicine" id="prescription_medicine" class="form-control selpres show-tick"  data-live-search="true" tabindex="-98">
                         <option value="0"> &nbsp; </option>
                         <?php 

                         foreach ($result['medicineList'] as $medicinelist) {  ?>
                         <option value="<?php echo $medicinelist->medicine_id;?>"

                          ><?php echo $medicinelist->medicine_name;?></option>
                          <?php     } ?>
                                                   
                          </select> 
        <?php


      }
      else
      {
          redirect('login','refresh');
      }
  }


  public function getMedicineInstruction()
  {
      if($this->session->userdata('user_data'))
      {
        $medicineID= $this->input->post("prescription_medicine");
      
        if($medicineID!=0){
            $where_medicine= array('medicine_id' => $medicineID );
            echo $instruction = $this->commondatamodel->getSingleRowByWhereCls('medicine_master',$where_medicine)->instruction;
        }else{
            echo "";
        }
       

      }
      else
      {
          redirect('login','refresh');
      }
  }



  public function janToMarEDDCalculation($lmpdate){
    // echo "Jan-Mar";
    // echo "<br>";
    $add7days = date('d-m-Y', strtotime($lmpdate.'+7 days'));
    echo $add9month = date('l d M Y', strtotime($add7days.'+9 months'));

   

   // $lmpdate;
  }

  public function aprToDecEDDCalculation($lmpdate){
     //echo "Apr-Dec";
     // echo "<br>";
     // echo $sub3month = date('d-m-Y', strtotime($lmpdate.'+-3 months'));
     // echo "<br>";
     // echo $add7month = date('d-m-Y', strtotime($sub3month.'+7 days'));

     // echo "<br>";
     // echo $add1year = date('l d M Y', strtotime($add7month.'+1 years'));

     $add7days = date('d-m-Y', strtotime($lmpdate.'+7 days'));
     $sub3month = date('d-m-Y', strtotime($add7days.'+-3 months'));
     echo $add1year = date('l d M Y', strtotime($sub3month.'+1 years'));

    // $lmpdate;
  }


    public function CalculateTT2tobetakenOnTT1tobetaken()
    {
        if($this->session->userdata('user_data'))
        {
             $tt1_tobe_taken_on = $this->input->post('tt1_tobe_taken_on');
           
          // echo "<br>";

             if ($tt1_tobe_taken_on!='') {
                echo $tt2_tobe_taken_on = date('l d M Y', strtotime($tt1_tobe_taken_on. ' +1 months'));
             }else{
                echo $tt1_tobe_taken_on='';
             }
           
        }
        else
        {
            redirect('login','refresh');
        }
    }



  public function resetInvestigationDropdown()
  {
      if($this->session->userdata('user_data'))
      {
        

  $investigationItem = $this->input->post('investigationItem');


        // $result['testList']=$this->commondatamodel->getAllDropdownData('investigation_component');
         $result['testList']=$this->patientcasemodel->getInvestigationComponentWhereNotIn($investigationItem);
        ?>
         <select name="prescription_investigation[]" id="prescription_investigation" class="form-control selpres show-tick addcss"  data-live-search="true" tabindex="-98"  multiple data-selected-text-format="count">
                        
                            <?php 

                         foreach ($result['testList'] as $testlist) {  ?>
                         <option value="<?php echo $testlist->investigation_comp_id;?>"

                          ><?php echo $testlist->inv_component_name;?></option>
                          <?php     } ?>
                                          
                                                   
                          </select> 
        <?php


      }
      else
      {
          redirect('login','refresh');
      }
  }

function dateDMY($dt){

   if($dt!=""){
      $dt = ' on '.date("d-m-Y",strtotime($dt));
        }
      else{
           $dt = NULL;
                
       }

       return $dt;

}

//creted for invetsigation panel 23-09-2019 by anil 

 public function addPrescriptionTestDetailspanel()
    {
        if($this->session->userdata('user_data'))
        {
            $session = $this->session->userdata('user_data');
            $data['invData']=[];

            $row_no = $this->input->post('rowNo');
            $panelID = $this->input->post('panel');

            

             for ($i=0; $i < count($panelID); $i++) { 
             
             $where_investigation_panel= array('id' => $panelID[$i] );

             $investigationData = $this->commondatamodel->getSingleRowByWhereCls('investigation_panel',$where_investigation_panel);
              
             $inv_component_id=$investigationData->investigation;
              
             $inv_id = explode(',', $inv_component_id);

            $investigation_name = $this->patientcasemodel->getInvestigationpanelComponentWhereIn($inv_id);
             //print_r($investigation_name);exit;

             $investigationpaneldetails[] = array(
                                          'investigationName' => $investigation_name, 
                                          'panelID' => $panelID[$i], 
                                          'panel_name'=>$investigationData->panel_name,
                                          'rowno' => $row_no++, 
                                        );
             


             
         //  print_r($investigationpaneldetails);
             
            }
             
            $data['invData']=$investigationpaneldetails;
          

           // print_r($investigationID);
          //  $investigationID=1;


            
                      // pre($medicineData);exit;

            // $data['rowno'] = $row_no;
            // $data['investigationID'] = $investigationID;
            // $data['investigation'] = $investigationData->inv_component_name;
        
           
            
      $page = 'dashboard/admin_dashboard/case/add_prescription_test_partial_view_withpanel.php';
      $viewTemp = $this->load->view($page,$data,TRUE);
      echo $viewTemp;
        }
        else
        {
            redirect('login','refresh');
        }
    }

public function resetInvestigationpanelDropdown()
  {
      if($this->session->userdata('user_data'))
      {
        

      $investigationpanelItem = $this->input->post('investigationpanelItem');
      
       //print_r($investigationpanelItem);
        // $result['testList']=$this->commondatamodel->getAllDropdownData('investigation_component');
         $result['paneltestList']=$this->patientcasemodel->getInvestigationpanelComponentWhereNotIn($investigationpanelItem);
         //print_r($result['paneltestList']);
        ?>
        <select name="prescription_investigationpanel[]" id="prescription_investigationpanel" class="form-control selpres show-tick"  data-live-search="true" tabindex="-98"  multiple data-selected-text-format="count">
                                  
                                  <?php 

                                  foreach ($result['paneltestList'] as $paneltestList) {  ?>
                                  <option value="<?php echo $paneltestList->id;?>"

                                    ><?php echo $paneltestList->panel_name;?></option>

                                    <?php     } ?>
                                                            
                                    </select> 
        <?php


      }
      else
      {
          redirect('login','refresh');
      }
  }

public function loadTreatmentView(){

    $result['mode'] = "ADD";
    $result['caseID']=0;
    $majorgroup = $this->input->post('majorgroup');
   
    $result['genderList']=$this->commondatamodel->getAllDropdownData('gender_master');
    $result['bloodGroupList']=$this->commondatamodel->getAllDropdownData('blood_group');
    $result['allCaseList']=$this->patientcasemodel->getAllCaseDetailsgroupwise($majorgroup);

    
     $result['majorgroup'] = $majorgroup;
    //print_r($result['allCaseList']);exit;
     $page = 'dashboard/admin_dashboard/case/select_treatment_gnccology.php';
     $viewTemp = $this->load->view($page,$result,TRUE);
      echo $viewTemp;
       
}


public function addusgdatingscan()
    {
        if($this->session->userdata('user_data'))
        {
              $seleddbyusg_date = $this->input->post('seleddbyusg_date');
              $edd_week = $this->input->post('edd_week');
              $edd_days = $this->input->post('edd_days');
              $caseID = $this->input->post('caseID');

              $where = array('case_master_id'=>$caseID);

              $getinvrecord = $this->commondatamodel->getSingleRowByWhereCls('investigation_record_master',$where);


              //$addDays=280  -($edd_week*7+$edd_days);

              $totalDays=($edd_week*7+$edd_days);

         $lmpdate=date('l d M Y', strtotime($seleddbyusg_date. ' +-'.$totalDays.' days'));
        // echo "<br>";

              $selectMonth = date('M', strtotime($lmpdate));

                if($selectMonth=='Jan' || $selectMonth=='Feb' || $selectMonth=='Mar'){

               $add7days = date('d-m-Y', strtotime($lmpdate.'+7 days'));
               if(empty($getinvrecord)){
               echo $add9month = date('l d M Y', strtotime($add7days.'+9 months'));
                }else{
                   echo '0'; 
                }

              }else{
                  $add7days = date('d-m-Y', strtotime($lmpdate.'+7 days'));
                  $sub3month = date('d-m-Y', strtotime($add7days.'+-3 months'));
                  if(empty($getinvrecord)){
                    echo $add1year = date('l d M Y', strtotime($sub3month.'+1 years'));
                  }else{
                   echo '0';
                  }
                  
              }
           // echo "<br>";


           //  echo $next_due_date = date('l d M Y', strtotime($seleddbyusg_date. ' +'.$addDays.' days'));
        }
        else
        {
            redirect('login','refresh');
        }
    }

// by anil 25-11-2019 for diseases details

public function addDiseasesDetail(){

     if($this->session->userdata('user_data'))
        {
            $session = $this->session->userdata('user_data');
        

            $row_no = $this->input->post('rowNo');
            $diseasesID = $this->input->post('diseasesID');
         
            $data['diseases_years'] = $this->input->post('diseases_years');
            $data['other_diseases'] = $this->input->post('otherdiseases');
            

           
            $where_diseases= array('diseases_id' => $diseasesID );
            $diseasesData = $this->commondatamodel->getSingleRowByWhereCls('diseases_master',$where_diseases);

            $data['diseasesrowno'] = $row_no;
            $data['diseasesID'] = $diseasesID;
            if($diseasesData->diseases_name == 'Others'){

              $data['diseasesname'] = $data['other_diseases'];

            }else{
              $data['diseasesname'] = $diseasesData->diseases_name;
            }
            

           
           
            
           
             $page = 'dashboard/admin_dashboard/case/diseases_partial_view';
            $viewTemp = $this->load->view($page,$data,TRUE);
            echo $viewTemp;
        }
        else
        {
            redirect('login','refresh');
        }
}  


 public function pre_print_prescription(){
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
          $result['LastSuctionEvacatuion']=[];
          $result['total_parity']='';
          $result['total_cesarean']='';
          $result['total_suction']='';
          $result['total_ND'] = '';
          $parity_term_delivery=0;
          $parity_preterm=0;
          $parity_abortion=0;
          $parity_issue=0;
          $result['slfbldgrp']='';
          $result['husbldgrp']='';
          $result['tt1_taken']='';
          $result['tt1_tobetaken']='';
          $result['tt2_taken']='';
          $result['tt2_tobetaken']='';
          $result['tdap_taken']='';
          $result['tdap_tobetaken']='';
          $result['clinicalExaminationLatestData']=[];
          $result['familyCompData']='N';
          $result['anomalyPlacentaInv']='';
          $result['diagnosisList'] = [];

          $where_dr = array('doctor_master.doctor_id' =>$session['doctor_id']);
          $result['drRegNo']=$this->commondatamodel->getSingleRowByWhereCls('doctor_master',$where_dr)->dr_reg_no;

       

          if($this->uri->rsegment(3) == NULL)
            {
                $caseID = 0;
                 $html="";
            
            }
            else
            {

                $caseID = $this->uri->segment(3);
                

               // $clinic_id=$session['clinic_id']; //comment by anil 24-09-2019
              $where_case_master = [
                    'case_master.case_id' => $caseID
                ];

                $result['patientCaseData'] = $this->commondatamodel->getSingleRowByWhereCls('case_master',$where_case_master); 

                $clinic_id=$result['patientCaseData']->clinic_id;

                $doctor_id=$session['doctor_id'];

                $where_clinic_master = [
                    'clinic_master.clinic_id' => $clinic_id
                ];

                $result['clinicData'] = $this->commondatamodel->getSingleRowByWhereCls('clinic_master',$where_clinic_master);
                
              
                $where_doctor = [
                    'doctor_master.doctor_id' => $doctor_id
                ];

                $result['doctorData'] = $this->commondatamodel->getSingleRowByWhereCls('doctor_master',$where_doctor);

                 

                $result['patientmasterData'] = $this->patientcasemodel->getPatientBasicInfo($result['patientCaseData']->patient_id); 

              
                 $where_antenatel_master = [
                    'antenantal_master.case_master_id' => $caseID
                 ];

                // getSingleRowByWhereCls(tablename,where params)
                 $result['antenantalCaseData'] = $this->commondatamodel->getSingleRowByWhereCls('antenantal_master',$where_antenatel_master);


                if ($result['antenantalCaseData']) {

                $result['slfbldgrp']=$this->patientcasemodel->getBloodGroupById($result['antenantalCaseData']->wife_bloodgroup);
                $result['husbldgrp']=$this->patientcasemodel->getBloodGroupById($result['antenantalCaseData']->husband_bloodgroup);
                  
                
                  if ($result['antenantalCaseData']->parity_term_delivery!='') {
                    $parity_term_delivery=$result['antenantalCaseData']->parity_term_delivery;
                  }

                  if ($result['antenantalCaseData']->parity_preterm!='') {
                    $parity_preterm=$result['antenantalCaseData']->parity_preterm;
                  }
                
                 if ($result['antenantalCaseData']->parity_abortion!='') {
                   $parity_abortion=$result['antenantalCaseData']->parity_abortion;
                 }
                  
                  if ($result['antenantalCaseData']->parity_issue!='') {
                     $parity_issue=$result['antenantalCaseData']->parity_issue;
                  }

                  if($result['antenantalCaseData']->tt1_taken_on!=''){
                    $result['tt1_taken']= date('d-m-Y', strtotime($result['antenantalCaseData']->tt1_taken_on));}

                  if($result['antenantalCaseData']->tt1_tobe_taken_on!=''){
                    $result['tt1_tobetaken']= date('d-m-Y', strtotime($result['antenantalCaseData']->tt1_tobe_taken_on));}

                  if($result['antenantalCaseData']->tt2_taken_on!=''){
                    $result['tt2_taken']= date('d-m-Y', strtotime($result['antenantalCaseData']->tt2_taken_on));}

                  if($result['antenantalCaseData']->tt2_tobe_taken_on!=''){
                    $result['tt2_tobetaken']= date('d-m-Y', strtotime($result['antenantalCaseData']->tt2_tobe_taken_on));}

                 if($result['antenantalCaseData']->tdap_taken_on!=''){
                    $result['tdap_taken']= date('d-m-Y', strtotime($result['antenantalCaseData']->tdap_taken_on));}

                if($result['antenantalCaseData']->tdap_tobe_taken_on!=''){
                    $result['tdap_tobetaken']= date('d-m-Y', strtotime($result['antenantalCaseData']->tdap_tobe_taken_on));}

                 
                 


                

                 $result['total_parity'] =($parity_term_delivery+$parity_preterm+$parity_abortion+1);

                 $result['total_cesarean'] = $this->patientcasemodel->getTotalCesareanByCase($caseID);
                 //created by anil 24-10-2019
                 $result['total_suction'] = $this->patientcasemodel->getTotalSuctionByCase($caseID);
                 $result['LastSuctionEvacatuion'] = $this->patientcasemodel->getLastSectionEvacatuionByCase($caseID);
               

                 $result['total_ND'] = $this->patientcasemodel->getTotalNdByCase($caseID);

                 $result['lastchildBirth'] = $this->patientcasemodel->getLastChildBirthByCase($caseID);
                 $result['previousChildHistory'] = $this->patientcasemodel->getAllPreviousChildHistory($caseID);
                //pre($result['lastchildBirth']);exit;

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
                                            'med_prob_other' => $previouschild->medicalproblem_other,
                                            'delevery_type'=>$previouschild->delevery_type,
                                            'babygender'=>$previouschild->gender,
                                            'baby_weight'=>$previouschild->baby_weight,
                                             );
                 }

                 $result['previousChild']=$previousChild;

             //  pre($result['previousChild']);exit;

                 $diseases_ids = explode (",", $result['antenantalCaseData']->diseases_ids);
                 $diseasesData=$this->patientcasemodel->getDiseasesByIds($diseases_ids);
                 $diseases='';
                  foreach ($diseasesData as $diseasesrow) {
                    $diseases.=$diseasesrow->diseases_name.',';
                  }
               $result['diseases']=rtrim($diseases,',');

                if ($result['antenantalCaseData']->is_other_diseases=="Y") {

               $result['diseases']=rtrim($result['diseases'],'Others')."".$result['antenantalCaseData']->other_diseases;
                }
               

                $result['Alldiseasesdata'] = $this->patientcasemodel->getAlldiseasebycaseId($caseID);
                //pre($result['Alldiseasesdata']);exit;
                


                $result['surgicaData']=$this->patientcasemodel->getAllSurgicaRecordByCase($caseID);
               // pre($result['surgicaData']);exit;


                $result['familyComponentList']=$this->patientcasemodel->getFamilyComponentDetails($caseID);

               //pre($result['familyComponentList']);exit;

               

                foreach ($result['familyComponentList'] as $familycomponentrow) {

                    if ($familycomponentrow->is_father=='Y' || $familycomponentrow->is_mother=='Y') {
                        $result['familyCompData']='Y';
                    }

                }
                    
            



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

             // pre($result['inveltdata']);exit;
            
              if (count($result['inveltdata']) > 0 && $result['inveltdata']->anomaly_placenta!='') {
                  $anomalyPlacenta_ids = explode (",", $result['inveltdata']->anomaly_placenta);
                  $anomalyPlacentaData=$this->patientcasemodel->getPlacentaByIds($anomalyPlacenta_ids);
                  $anomalyPla='';

                  foreach ($anomalyPlacentaData as $anoplakrow) {
                      $anomalyPla.=$anoplakrow->placenta_name.',';
                  }
                 
                  $result['anomalyPlacentaInv']=rtrim($anomalyPla,',');

              }

          
              
           $result['examinationFirstData']=$this->patientcasemodel->getFirstExaminationDataByCase($caseID);
           $result['examinationLatestData']=$this->patientcasemodel->getExaminationLatestByCase($caseID);
           $result['clinicalExaminationLatestData']=$this->patientcasemodel->getClinicalExaminationLatestByCase($caseID);

         //pre($result['examinationLatestData']);
        // exit;
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
                     // created by anil 24-09-2019
                      $result['prescriptionInvestigationpanel'] = $this->patientcasemodel->getInvestigationpanelDetailsByPrescriptionId($prescriptionID);

                       //print_r($result['prescriptionInvestigationpanel']);exit;
                       $where_prescription_id = array('prescription_id' => $prescriptionID);

                       $result['diagnosisList']=$this->patientcasemodel->getDiagnosisDetails($caseID);

                       //pre($result['diagnosisList']);exit;

                      $prescriptionData = $this->commondatamodel->getSingleRowByWhereCls('prescription_master',$where_prescription_id);
           
                      
                      $pres_entry_date= date("Y-m-d", strtotime($prescriptionData->entry_date));
                      $adviceData=$this->patientcasemodel->getAdviceDetailsDataByDate($caseID,$pres_entry_date);
                       //  pre($adviceData);
                          $adviceDetails=[];

                          foreach ($adviceData as $value) {
                            $advicedtl="";
                                        if($value['advType']->advice_type=="I"){
                                            $advice_type= 'I-General';
                                        }else if($value['advType']->advice_type=="III"){
                                            $advice_type= 'III-Optional';
                                        }else{
                                           $advice_type= $value['advType']->advice_type;
                                        }

                                         foreach ($value['adviceList'] as $advlistrow) {

                                          if ($advOption=$advlistrow->is_advice_option=='Y') {
                                           $advOption=$advlistrow->advice_options;
                                           $advOption=str_replace(',','/',$advOption);
                                          }else{
                                            $advOption="";
                                          }
                                          $advicedtl=$advlistrow->advice." ".$advOption;

                                          if ($advlistrow->is_advice_option=='Y') {
                                           
                                                if ($advOption!='') {
                                                    $adviceDetails[] = array(
                                                                  'advType' => $advice_type,
                                                                  'advicedtl' => $advicedtl,
                                                                  'advopt' => $advlistrow->is_advice_option

                                                                 );
                                                }

                                          }else{

                                               $adviceDetails[] = array(
                                                                  'advType' => $advice_type,
                                                                  'advicedtl' => $advicedtl,
                                                                  'advopt' => $advlistrow->is_advice_option

                                                                 );
                                          }

                                         

                                         }

                          }

                          $result['adviceDetailsData']=$adviceDetails;

                       // pre($result['adviceDetailsData']);
           
                       // exit;


                   }else{
                    $result['prescriptionMedicineList']=[];
                    $result['prescriptionInvestigationList']=[];
                    $result['prescriptionInvestigationpanel']=[];
                    $result['adviceDetailsData']=[];
                   }




                    }// end of if block antenantal case data

//echo $prescriptionID;




        
         //pre($result['clinicalExaminationLatestData']); exit;

              
              $page = 'dashboard/admin_dashboard/case/pre_print_prescription';
               
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


public function view_preop(){

   $session = $this->session->userdata('user_data');
       if($this->session->userdata('user_data'))
        {

         
######################################-- Start PreOp Part--################################################

           $caseID = $this->input->post('caseID');

           $where_preop = array('case_master_id'=>$caseID); 

           $result['preoperationEditdata'] = $this->commondatamodel->getSingleRowByWhereCls('preopration_record_master',$where_preop);

           $result['preoperationptmedicinedtl'] = $this->preoperationmodel->getdayofopmedicine($caseID);

          //pre($result['preoperationptmedicinedtl']);exit;

           if(empty($result['preoperationEditdata'])){
  
                $result['mode'] = "ADD";
                $result['btnText'] = "Save";
                $result['btnTextLoader'] = "Saving...";
                

           }else{

                $result['mode'] = "EDIT";
                $result['btnText'] = "Update";
                $result['btnTextLoader'] = "Updating...";
               
          

           }

                  #####################--- Start history summary---####################

                    $result['total_suction'] = '';
                    $result['total_cesarean'] = '';
                    $result['total_ND'] = '';
                    $result['total_parity'] = '';
                    $result['highrisk'] = '';
                    $result['anomalyPlacentaInv'] = '';
                    $result['lastprescriptiondate'] = '';
                    $result['familyCompData']='N';
                    $parity_term_delivery=0;
                    $parity_preterm=0;
                    $parity_abortion=0;
                    $parity_issue=0;

                    $result['lastchildBirth'] = [];
                    $result['previousChildHistory'] = [];
                    $result['previouschild'] = [];
                    $result['Alldiseasesdata'] = [];
                    $result['surgicaData'] = [];
                    $result['familyComponentList'] = [];
                    $result['regularMedicineList'] = [];
                    $result['inveltdatapre'] = [];
                    $result['prescriptionMedicineList']=[];
                    $result['patientCaseEditdata'] = [];
                    $result['antenantalCaseEditdata']=[];

                    
                     $result['occupation'] = $this->input->post('occupation');
                     $result['bloodgroup'] = $this->input->post('bloodgroup');
                     $result['caseID'] = $caseID;

                     $where_case_master = [
                                            'case_master.case_id' => $caseID
                                        ];
                     $result['patientCaseEditdata'] = $this->commondatamodel->getSingleRowByWhereCls('case_master',$where_case_master); 

                      

                       $where_patient_master = [
                          'patient_master.patient_id' =>  $result['patientCaseEditdata']->patient_id
                      ];                   

                   
                     $where_antenatel_master = [
                    'antenantal_master.case_master_id' => $caseID
                       ];

                     $result['patientmasterEditdata'] = $this->commondatamodel->getSingleRowByWhereCls('patient_master',$where_patient_master); 
                     //pre( $result['patientmasterEditdata']);exit;

                     $result['antenantalCaseEditdata'] = $this->commondatamodel->getSingleRowByWhereCls('antenantal_master',$where_antenatel_master); 

                     //pre($result['antenantalCaseEditdata']);exit;

                    $result['total_suction'] = $this->patientcasemodel->getTotalSuctionByCase($caseID);
                    $result['total_cesarean'] = $this->patientcasemodel->getTotalCesareanByCase($caseID);
                    $result['total_ND'] = $this->patientcasemodel->getTotalNdByCase($caseID);
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
                                            'med_prob_other' => $previouschild->medicalproblem_other,
                                            'delevery_type'=>$previouschild->delevery_type,
                                            'babygender'=>$previouschild->gender,
                                            'baby_weight'=>$previouschild->baby_weight,
                                             );
                 }

                $result['previousChildpre']=$previousChild;

                //pre($result['previousChild']);exit;

                $result['Alldiseasesdata'] = $this->patientcasemodel->getAlldiseasebycaseId($caseID);
                $result['surgicaData']=$this->patientcasemodel->getAllSurgicaRecordByCase($caseID);
                $result['familyComponentList']=$this->patientcasemodel->getFamilyComponentDetails($caseID);

                 foreach ($result['familyComponentList'] as $familycomponentrow) {

                    if ($familycomponentrow->is_father=='Y' || $familycomponentrow->is_mother=='Y') {
                        $result['familyCompData']='Y';
                    }

                }
                  if(!empty($result['antenantalCaseEditdata'])){

                  if ($result['antenantalCaseEditdata']->parity_term_delivery!='') {
                    $parity_term_delivery=$result['antenantalCaseEditdata']->parity_term_delivery;
                  }

                  if ($result['antenantalCaseEditdata']->parity_preterm!='') {
                    $parity_preterm=$result['antenantalCaseEditdata']->parity_preterm;
                  }
                
                 if ($result['antenantalCaseEditdata']->parity_abortion!='') {
                   $parity_abortion=$result['antenantalCaseEditdata']->parity_abortion;
                 }
                  
                  if ($result['antenantalCaseEditdata']->parity_issue!='') {
                     $parity_issue=$result['antenantalCaseEditdata']->parity_issue;
                 }

                $result['total_parity'] =($parity_term_delivery+$parity_preterm+$parity_abortion+1);

              }

                if(!empty($result['antenantalCaseEditdata'])){

                 $highrisk_ids = explode (",", $result['antenantalCaseEditdata']->highrisk_ids);



                 $highriskData=$this->patientcasemodel->getHighRiskByIds($highrisk_ids);
                 $highrisk='';
                  foreach ($highriskData as $highriskrow) {
                    $highrisk.=$highriskrow->risk_type.',';
                  }


               $result['highrisk']=rtrim($highrisk,',');
               $result['regularMedicineList']=$this->patientcasemodel->getRegularMedecineDetails($caseID);

             }
                
                 #####################--- End history summary---####################

               ######################---Start Investigation---######################

                $result['inveltdatapre']=$this->patientcasemodel->getInvestigationLatestByCase($caseID);

               // pre( $result['inveltdatapre']);exit;
              if (count($result['inveltdatapre']) > 0 && $result['inveltdatapre']->anomaly_placenta!='') {
                  $anomalyPlacenta_ids = explode (",", $result['inveltdatapre']->anomaly_placenta);
                  $anomalyPlacentaData=$this->patientcasemodel->getPlacentaByIds($anomalyPlacenta_ids);
                  $anomalyPla='';

                  foreach ($anomalyPlacentaData as $anoplakrow) {
                      $anomalyPla.=$anoplakrow->placenta_name.',';
                  }
                 
                  $result['anomalyPlacentaInv']=rtrim($anomalyPla,',');

              }
               

              ######################---- Start last prescription----##################

              $result['prescriptionLatestData']=$this->patientcasemodel->getPrescriptionLatestByCase($caseID);

                   if ($result['prescriptionLatestData']) {
                     $prescriptionID=$result['prescriptionLatestData']->prescription_id;

                      $result['prescriptionMedicineList']=$this->patientcasemodel->getMedicineDetailsByPrescriptionId($prescriptionID);
                      if(!empty($result['prescriptionMedicineList'])){

                       $result['lastprescriptiondate'] = $result['prescriptionMedicineList'][0]->created_on;
                      }


                   }else{
                    $result['prescriptionMedicineList']=[];
                     $result['lastprescriptiondate'] = '';
                   
                   }

                   //pre($result['lastprescriptiondate']);exit;

                  $result['drpDownPerposedOper'] = array('LUCS','Suction Evacuation','Cerclage'); 
                  $result['drpDownEnoxapapin'] = array('Lonopin','Clexane'); 


  ######################################--Start Patient In Preop--#################################### 

         $orderbyCat='medicine_category.category';
         $wheremed=array('is_preop'=>'Y');
         $result['preopmedicineCategoryList']=$this->commondatamodel->getAllRecordWhereOrderBy('medicine_category',$wheremed,$orderbyCat);
        
         $result['dayofoperwith'] = array("RL","RS"); 
         $result['fluidstarthour'] = array("4 hr","6 hr"); 

         $result['injectiondrpdown'] = array("Injection Xone 1gm","Injection Monocef 1gm","Others"); 
         $result['injectiondrpdown1'] = array("Rantac","Pan IV");
         



          $page = 'dashboard/admin_dashboard/case/preoperation/pre_operation_view';
          $this->load->view($page,$result);

        }

        else {
            redirect('login', 'refresh');
        }


}


public function viewdischarge(){

  $session = $this->session->userdata('user_data');
       if($this->session->userdata('user_data'))
        {

          $result['caseID'] = $this->input->post('caseID');
          $caseID = $result['caseID'];
          $result['bloodgroup'] = $this->input->post('bloodgroup');

          $where_casemasid = array('case_master_id'=>$caseID); 
          /*Discharge master data*/

          $result['dischargeEditdata'] = $this->commondatamodel->getSingleRowByWhereCls('discharge_record_master',$where_casemasid);

          if(!empty($result['dischargeEditdata'])){

           $result['mode'] = "EDIT";
           $result['btnText'] = "Update";
           $result['btnTextLoader'] = "Updating...";

          }else{

           $result['mode'] = "ADD";
           $result['btnText'] = "Save";
           $result['btnTextLoader'] = "Saving...";

          }
         

           

             $where_case_master = [
                                            'case_master.case_id' => $caseID
                                        ];
            $result['patientCaseEditdata'] = $this->commondatamodel->getSingleRowByWhereCls('case_master',$where_case_master); 

           $doctor_id = $session['doctor_id'];

            $where_doctor = [
                    'doctor_master.doctor_id' => $doctor_id
                ];

              $result['doctorData'] = $this->commondatamodel->getSingleRowByWhereCls('doctor_master',$where_doctor);       

             
             $where_patient_master = [
                          'patient_master.patient_id' =>  $result['patientCaseEditdata']->patient_id
                      ];                   

                   
            $where_antenatel_master = [
                    'antenantal_master.case_master_id' => $caseID
                       ];

            $result['patientmasterEditdata'] = $this->commondatamodel->getSingleRowByWhereCls('patient_master',$where_patient_master); 


           $result['antenantalCaseEditdata'] = $this->commondatamodel->getSingleRowByWhereCls('antenantal_master',$where_antenatel_master); 

           if(!empty($result['antenantalCaseEditdata'])){

             if ($result['antenantalCaseEditdata']->parity_term_delivery!='') {
                    $parity_term_delivery=$result['antenantalCaseEditdata']->parity_term_delivery;
                  }

                  if ($result['antenantalCaseEditdata']->parity_preterm!='') {
                    $parity_preterm=$result['antenantalCaseEditdata']->parity_preterm;
                  }
                
                 if ($result['antenantalCaseEditdata']->parity_abortion!='') {
                   $parity_abortion=$result['antenantalCaseEditdata']->parity_abortion;
                 }
                  
                  if ($result['antenantalCaseEditdata']->parity_issue!='') {
                     $parity_issue=$result['antenantalCaseEditdata']->parity_issue;
                 }

                $result['total_parity'] =($parity_term_delivery+$parity_preterm+$parity_abortion+1);

              }

                 $result['total_cesarean'] = $this->patientcasemodel->getTotalCesareanByCase($caseID);
                 //pre($result['total_cesarean']);exit;

                $result['dishgenderlist'] = $this->commondatamodel->getAllDropdownData('gender_master');
                // pre($result['dishgenderlist']);exit;

             /* preop master data */

             

           $result['preoperationEditdata'] = $this->commondatamodel->getSingleRowByWhereCls('preopration_record_master',$where_casemasid);

           $where_active = array('is_active' =>'Y');


           $result['paediatricianlist'] = $this->commondatamodel->getAllRecordWhereOrderBy('paediatrician_master',$where_active,'name');
           $result['anaesthesiologistlist'] = $this->commondatamodel->getAllRecordWhereOrderBy('anaesthesiologist_master',$where_active,'name');

          

            // pre($result['dischargeEditdata']);exit;

           $result['lucsdoneunder'] = array('SA','IGA');

            //pre($result['patientmasterEditdata']);exit;  
          
          $page = 'dashboard/admin_dashboard/case/discharge/discharge_view';
          $this->load->view($page,$result);

          
          }

        else {
            redirect('login', 'refresh');
        }




}

private function activity_log($module,$insertId,$action,$method,$activitytable){

   $session = $this->session->userdata('user_data');
       if($this->session->userdata('user_data'))
        {
            

         $activity_arr = array( 
                         'activity_module'=>$module,
                         'module_master_id'=>$insertId,
                         'action'=>$action,
                         'from_method'=>$method,
                         'table_name'=>$activitytable,
                         'user_id'=>$session['userid'],
                         'ip_address'=>getUserIPAddress(),
                         'user_browser'=>getUserBrowserName(),
                         'user_platform'=>getUserPlatform()

                        );


         $insert = $this->commondatamodel->insertSingleTableData('activity_log',$activity_arr);
          

       }
         else {
            redirect('login', 'refresh');
        }

}



}// end of class
