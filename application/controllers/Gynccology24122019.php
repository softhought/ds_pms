<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Gynccology extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('commondatamodel','commondatamodel',TRUE);
        $this->load->model('gynccologymodel','gynccologymodel',TRUE);
        $this->load->model('Patientcasemodel','patientcasemodel',TRUE);
         
        
    }


    public function addEdit()
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
                   
                  $result['chiefcomplaintsdetails']=$this->gynccologymodel->getAllchiefcomplaintsdetails($caseID);

                  $where_gynccology = array('case_master_id'=>$caseID);  

                  $result['gynccologymasterdetails']=$this->commondatamodel->getSingleRowByWhereCls('gynccology_master',$where_gynccology);
                  
                    if (empty($result['chiefcomplaintsdetails']) || empty($result['gynccologymasterdetails'])) {
                            $result['gynccologybtnText'] = "Save";
                            $result['gynccologybtnTextLoader'] = "Saving...";
                            $result['isgynccologydata'] = 'N';
                                                        
                         }
                    else{
                         $result['gynccologyID']=$result['gynccologymasterdetails']->gynccology_id;
                         $result['isgynccologydata'] = 'Y';
                         $result['gynccologybtnText'] = "Update";
                         $result['gynccologybtnTextLoader'] = "Updating...";
                    }     
                                 
  
               }
               $result['Onetotwentydropdown'] = array('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20'); 
               $result['Onetotwelvedropdown'] = array('1','2','3','4','5','6','7','8','9','10','11','12');
                $result['ZerotoTenDropDown'] = array('0','1','2','3','4','5','6','7','8','9','10');
                $result['YesorNo']=array('Yes','No');
                $result['marriedfordropdown'] = array('Married','Unmarried','Separated');
               $result['AllchiefComplaints'] = $this->gynccologymodel->getAllchiefComplaints();

               $result['genderList']=$this->commondatamodel->getAllDropdownData('gender_master');
               $result['menstrualCycleType1'] = array('Regular','Irregular');
                $result['menstrualCycleType2'] = array('Polymenorrhea','Oligomenorrhea','Menometrorrhagia');
               $result['menstrualCycleType3'] = array('Irregular Spotting','Irregular Bleeding');
               $result['menstrualCycleFlow'] = array('Scanty','Average','Moderate','Heavy');
                $result['menstrualCyclePain'] = array('Mild','Moderate','Severe','Occassional','None');
                $result['severitydropdown'] = array('Mild','Moderate','Severe','Occassional','Cyclical','Off And On');
                $result['paindropdown'] = array('Mid Cycle Pain','Before And After Period','During Period','After Period','Others');
                $result['painCharacterdropdown'] = array('Dull Aching','Colicky','Mild','Off And On');
                $result['dischargeAssociteDrp'] = array('Itching','Bad Smell','Profuse Flow','With Fever','Without Fever','Pain Abdomen Yes','Pain Abdomen No');
                $result['dischargePreviousEpisodeDrp'] = array('Once','Twice','Few Times','Recurrent');

                $result['unwantedPregnancyTermination'] = array('Contraception','Medical Problem','Others');
                $result['unwantedPregnancyTerminationBY'] = array('Medical Method','Surgical Method');
                $result['AllsurgicalMethod'] = array('With IUCD','With Ligation','Without IUCD','Without Ligation');
                $result['stichlineOprationName'] = array('LUCS','TLH','TAH + BSO','Lap Ovarian Cystectomy Right','Lap Ovarian Cystectomy Left','Lap Ovarian Cystectomy Both','Lap Ovariectomy Right','Lap Ovariectomy Left','Lap Ovariectomy Both','Open Ovarian Cystectomy Right','Open Ovarian Cystectomy Left','Open Ovarian Cystectomy Both','Open Ovariectomy Right','Open Ovariectomy Left','Open Ovariectomy Both');
                $result['stichlineProblemCommDrp'] = array('Right','Left','Both');
                $result['postMenopausalAllEpisode'] = array('First Episode','Second Episode','Recurrent');
                $result['UrinaryIncosistancyAllEpisode'] = array('First Episode','Second Episode','Recurrent','Continous');
                $result['postMenopausalbleeding'] = array('Spotting','Scanty Bleeding','Profuse Bleeding');
                $result['urinaryinDrpDown'] = array('Stress','Urge','Mixed');
                $result['genderdrpdown'] = array('Male','Female');
                $result['familyplanningtemporary'] = array('OCP','ICUD CUT','ICUD Mirena','DMPA','Sevista');

                $result['poststopbleedingdrp'] = array('Of Its Own','On Medication');
                $result['pallor'] = array('Mild','Mod','Severe');
                $result['oeadema'] = array('M'=>'-','P'=>'+','PP'=>'++');
                $result['examChest'] = array('B/L Clear','Other');
                $result['examCVS'] = array('S1 S2 Normal','Other');
                $result['abdominalDrpdown'] = array('Soft Non Tenders No Organomegaly','Tender','Lump','Ascites');
                $result['abdominallumpDrpdown'] = array('12','14','16','18','20','24','28','30','32','34','36');
                $result['ConsistancyDrpdown'] = array('Cystic','Firm','Hard');
                $result['MobilityDrpdown'] = array('Mobile From Side To Side','Not Mobile');
                $result['AscitesDrpdown'] = array('Mild','Moderate','Tense');
                $result['pervaginalDrpdown'] = array('Normal Size','Uterus Size','Bullky','10 Weeks','12 Weeks','14 Weeks','16 Weeks','18 Weeks','20 Weeks','22 Weeks','24 Weeks','26 Weeks','28 Weeks','30 Weeks','32 Weeks','34 Weeks','36 Weeks');
                $result['prevaginalMobiltydrp'] = array('Mobile','Adherent');
                $result['prevaginalPositiondrp'] = array('Anteverted','Retroverted','Midposition');
                $result['prespeculamCervixdrp'] = array('Healthy','Unhealthy','Erosion +','Erosion ++','Erosion +++','Growth Seen','Polyp Seen');
              $result['speculamgrowthseendrp'] = array('Bleeds To Touch','No Bleeding To Touching');
              $result['speculamPolpyseendrp'] = array('Proternding From OS','Hanging From Lip');
              $result['speculamwhitedischargedrp1'] = array('Watery','Thick Curdy');
              $result['speculamwhitedischargedrp2'] = array('With Foul Smell','Without Foul Smell');
              $result['vaginadrpdown'] = array('Healthy looking','Reddish');
              $result['vulvadrpdown'] = array('Lesions','Growth Seen','Normal');
              $result['Urinetestdrpdown'] = array('+ve','-ve','Faintly +ve');
               $result['reactivenonrective'] = array('Reactive','Nonreactive');
               $result['Usgbreast'] = array('Right','Left','Right & Left');



                $result['surgeryList']=$this->commondatamodel->getAllDropdownData('surgery_master');
                //$result['surgeryList']=$this->patientcasemodel->getSurgeryDetails($caseID);
                $result['diseasesList']=$this->commondatamodel->getAllDropdownData('diseases_master');
                
                /* start regular medicine */

              $result['medicineList']=$this->commondatamodel->getAllDropdownData('medicine_master');
              $result['dosageList'] = array('0.5','1','1.5','2','2.5','5','7.5','10');
              $result['frequencyList'] = array('OD','BD','TDS','HS');
              $result['regularMedicineList']=$this->patientcasemodel->getRegularMedecineDetails($caseID);
             // pre($result['regularMedicineList']);exit;
               $orderbyCat='medicine_category.category';
                   $result['medicineCategoryList']=$this->commondatamodel->getAllRecordWhereOrderBy('medicine_category',[],$orderbyCat);

              if(empty($result['regularMedicineList'])){
                $result['regularMedicineEditdata'] = 'N';

              }else{
                $result['regularMedicineEditdata'] = 'Y';
              }

              
              /* end regular medicine */
              
              $where_case_id = array('case_master_id'=>$caseID);

               //comment by anil 12-10-2019 because using jquery for desplay the form
               
               //$result['allchiefcomplaitID'] = $this->gynccologymodel->getAllChiefComplaintId($caseID);
               
               //pre($result['allchiefcomplaitID']);exit;
               $result['AllpainLowerData'] = $this->commondatamodel->getSingleRowByWhereCls('pain_lower_abdomen',$where_case_id);
               $result['AlldysuriaData'] = $this->commondatamodel->getSingleRowByWhereCls('dysuria',$where_case_id);
               // $result['AllMenstrualProblemData'] = $this->commondatamodel->getSingleRowByWhereCls('menstrual_problem',$where_case_id);
               
               $result['AllOligomenorrhoeaData'] = $this->commondatamodel->getSingleRowByWhereCls('oligomenorrhoea',$where_case_id);
               $result['AllSecamenorrhoeaData'] = $this->commondatamodel->getSingleRowByWhereCls('secondary_amenorrhoea',$where_case_id);
               $result['AllMenorrhagiaData'] = $this->commondatamodel->getSingleRowByWhereCls('menorrhagia',$where_case_id);
               $result['AllPolymenorrheaData'] = $this->commondatamodel->getSingleRowByWhereCls('polymenorrhea',$where_case_id);
               $result['AllHypomenorrhoeaData'] = $this->commondatamodel->getSingleRowByWhereCls('hypomenorrhoea',$where_case_id);

               $result['AllWhiteDischargeData'] = $this->commondatamodel->getSingleRowByWhereCls('white_discharge',$where_case_id);

               $result['AllUnwantedPregnancyData'] = $this->commondatamodel->getSingleRowByWhereCls('unwanted_pregnancy',$where_case_id);

               $result['AllincidentalUSGData'] = $this->commondatamodel->getSingleRowByWhereCls('incidental_usg_finding',$where_case_id);

               $result['AllStichlineProblemData'] = $this->commondatamodel->getSingleRowByWhereCls('stich_line_problem',$where_case_id);
               
               $result['AllSomthingCommingdownData'] = $this->commondatamodel->getSingleRowByWhereCls('somthing_comming_down',$where_case_id);

               $result['AllPostmenopausalbleedingData'] = $this->commondatamodel->getSingleRowByWhereCls('post_menopausal_bleeding',$where_case_id);

               $result['AllUrinaryIncontinenceData'] = $this->commondatamodel->getSingleRowByWhereCls('urinary_incontinence',$where_case_id);

               $result['AllLumplowerAbdomenData'] = $this->commondatamodel->getSingleRowByWhereCls('lump_lower_abdomen',$where_case_id);

               $result['AllWantsfamilyPlanningData'] = $this->commondatamodel->getSingleRowByWhereCls('wants_family_planning',$where_case_id);

               $result['AllLumpInBreastData'] = $this->commondatamodel->getSingleRowByWhereCls('lump_in_breast',$where_case_id);

               $result['AllbreastcongestionData'] = $this->commondatamodel->getSingleRowByWhereCls('breast_congestion',$where_case_id);

               $result['AllpainInbreastData'] = $this->commondatamodel->getSingleRowByWhereCls('pain_in_breast',$where_case_id);

               $result['GeneralExamination'] = $this->gynccologymodel->getGynogenralExamination($caseID);

               $result['AllExaminationdata'] = $this->commondatamodel->getSingleRowByWhereCls('gynaecology_examination_master',$where_case_id);

               $result['AllGynInvestigation'] = $this->commondatamodel->getSingleRowByWhereCls('gynaaecology_investigation',$where_case_id);

                $where_panel_inv = array('case_type'=>'GY');

               $result['paneltestList']=$this->commondatamodel->getAllRecordWhere('investigation_panel',$where_panel_inv);

                // $result['prescriptionInvestigationpanel'] = $this->gynccologymodel->getInvestigationpanelDetails($caseID);

                 $result['testList']=$this->commondatamodel->getAllDropdownData('investigation_component');

                 // $result['prescriptionInvestigationList']=$this->gynccologymodel->getInvestigationDetails($caseID);

                 // $result['prescriptionLatestData']=$this->gynccologymodel->getPrescriptionLatestByCase($caseID);
                 $result['prescriptionMedicineList'] ="";
                 $result['prescriptionInvestigationList'] ="";
                 $result['prescriptionInvestigationpanel'] ="";

                  $result['prescriptionLatestData']=$this->patientcasemodel->getPrescriptionLatestByCase($caseID);

                   if (!empty($result['prescriptionLatestData'])) {

                   
                     $prescriptionID=$result['prescriptionLatestData']->prescription_id;

                      $result['prescriptionMedicineList']=$this->patientcasemodel->getMedicineDetailsByPrescriptionId($prescriptionID);

                     $result['prescriptionInvestigationList']=$this->patientcasemodel->getInvestigationDetailsByPrescriptionId($prescriptionID);
                     // created by anil 24-09-2019
                    $result['prescriptionInvestigationpanel'] = $this->patientcasemodel->getInvestigationpanelDetailsByPrescriptionId($prescriptionID);

                    }
                   
                 

                  
              // pre($result['prescriptionLatestData']);exit;

             
               
              //pre($result['allchiefcomplaitID']);exit; 
          
            $result['caseID']=$caseID;

            $header = "";
 
            $page = 'dashboard/admin_dashboard/case/gynccology/gynccology_add_edit';
            createbody_method($result, $page, $header,$session);
        }
        else
        {
            redirect('login','refresh');
        }
 
    }

    public function gynccologyinfo_action(){

         $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
           $dataArry=[];
            $json_response = array();
            $formData = $this->input->post('formDatas');
            parse_str($formData, $dataArry);

       
            $caseID = trim(htmlspecialchars($dataArry['caseID']));
            $ifchiefChangedata = trim(htmlspecialchars($dataArry['ifchiefChangedata']));


        /* start get and store chief complaints data in database */

            $is_check = $dataArry['is_check'];
            $year = $dataArry['year'];
            $month = $dataArry['month'];
            $day = $dataArry['day'];
            $complainttype= $dataArry['complainttype'];

            $complaint_id = $dataArry['complaint_id'];
            $gynccology_insertedID = $dataArry['gynccology_insertedID'];

            $count = count($complaint_id);
           
          
        //print_r($dataArry['isPeriodPain']);exit;
          
                   
         $where_dtl = array(
        'case_master_id' => $caseID,
         );
         /* delete previous data */
        //$deleteTodayAdvice=$this->commondatamodel->deleteTableData('gynccology_chief_complaints_details',$where_dtl);
            for($i=0;$i<$count;$i++){

                if($is_check[$i] == 'Y'){


                
            
               $data = array(
                               'case_master_id'=>$caseID,
                               'chief_complaint_id'=>$complaint_id[$i],
                               'year'=>$year[$i],
                               'month'=>$month[$i],
                               'day'=>$day[$i],
                               'complaint_type'=>$complainttype[$i],
                               'is_check'=>$is_check[$i],
                               'created_on'=>date('Y-m-d'),

                              );
  
                 if($gynccology_insertedID[$i] == '0'){

                   $type ='insert'; 
                   
                   $insert= $this->commondatamodel->insertSingleTableData('gynccology_chief_complaints_details',$data);
 
                   $allLastinsertId[] = $insert;
               $this->storeComplaintelaborationdata($insert,$complaint_id[$i],$caseID,$dataArry, $type);  

                }else{
              $type ='update';

              $where_gynccology_master_details = array('id'=>$gynccology_insertedID[$i]);
            
              $updategyncoologydetails= $this->commondatamodel->updateSingleTableData('gynccology_chief_complaints_details',$data,$where_gynccology_master_details);

               $allLastinsertId[] = $gynccology_insertedID[$i];

               $this->storeComplaintelaborationdata($gynccology_insertedID[$i],$complaint_id[$i],$caseID,$dataArry,$type);



                }



                }
                else{
                         $data = array(
                               'case_master_id'=>$caseID,
                               'chief_complaint_id'=>$complaint_id[$i],
                               'year'=>NULL,
                               'month'=>NULL,
                               'day'=>NULL,
                               'complaint_type'=>NULL,
                               'is_check'=>'N',
                               'created_on'=>date('Y-m-d'),

                              );

               if($gynccology_insertedID[$i] == '0'){
                   
                   $insert= $this->commondatamodel->insertSingleTableData('gynccology_chief_complaints_details',$data);
 
                   $allLastinsertId[] = $insert;
                   $this->deleterespectivedata($caseID,$complaint_id[$i],$insert); 
              
                }else{

                     $where_gynccology_master_details = array('id'=>$gynccology_insertedID[$i]);
            
                     $updategyncoologydetails= $this->commondatamodel->updateSingleTableData('gynccology_chief_complaints_details',$data,$where_gynccology_master_details);

                     $allLastinsertId[] = $gynccology_insertedID[$i];
                     $this->deleterespectivedata($caseID,$complaint_id[$i],$gynccology_insertedID[$i]); 
                }


                      

                        
                
                }
             
                
              
        

            }
       


     /* End of the chief complaint data */





/* insert into regular medicine detail data */
            $isChangeRgularMedicine = $dataArry['isChangeRgularMedicine'];     
                
                if($isChangeRgularMedicine == 'Y'){
                    
                 $where_caseId = array('case_master_id'=>$caseID);

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

     }


  /* start Menstrual History gynccology master  */
   
   $gynccologyID = $dataArry['gynccologyID'];  
  //pre($gynccologyID);exit;

   $menstrual_cycle_type1 = $dataArry['menstrual_cycle_type1'];
   $menstrual_cycle_type2 = $dataArry['menstrual_cycle_type2'];
   $menstrual_cycle_type3 = $dataArry['menstrual_cycle_type3'];
   $menstrual_duration_days = $dataArry['menstrual_duration_days'];
   $menstrual_cycle_days = $dataArry['menstrual_cycle_days'];
   $cycle_days_pm = $dataArry['cycle_days_pm'];
   $cycle_plusminusdays = $dataArry['cycle_plusminusdays'];
   $menstrual_menarche = $dataArry['menstrual_menarche'];

   if($dataArry['menstrual_lmp_date'] != ''){
    $menstrual_lmp_date = date('Y-m-d',strtotime($dataArry['menstrual_lmp_date']));
   } else{
     $menstrual_lmp_date = NULL;
   }
   
   $menstrual_flow = $dataArry['menstrual_flow'];
   $menstrual_pain = $dataArry['menstrual_pain'];

   if($dataArry['menstrual_cycle_pre_date1'] != ''){
    $menstrual_cycle_pre_date1 = date('Y-m-d',strtotime($dataArry['menstrual_cycle_pre_date1']));
   } else{
     $menstrual_cycle_pre_date1 = NULL;
   }
   
   if($dataArry['menstrual_cycle_pre_date2'] != ''){
    $menstrual_cycle_pre_date2 = date('Y-m-d',strtotime($dataArry['menstrual_cycle_pre_date2']));
   } else{
     $menstrual_cycle_pre_date2 = NULL;
   }

   if($dataArry['menstrual_cycle_pre_date3'] != ''){
    $menstrual_cycle_pre_date3 = date('Y-m-d',strtotime($dataArry['menstrual_cycle_pre_date3']));
   } else{
     $menstrual_cycle_pre_date3 = NULL;
   }

   if($dataArry['menstrual_cycle_pre_date4'] != ''){
    $menstrual_cycle_pre_date4 = date('Y-m-d',strtotime($dataArry['menstrual_cycle_pre_date4']));
   } else{
     $menstrual_cycle_pre_date4 = NULL;
   }
  
   
   
   $menopause_year_back = $dataArry['menopause_year_back'];
   $menopause_notes = $dataArry['menopause_notes'];
   /* End Menstrual History */   

  /* Obstetric History data */

   $termdelivery = $dataArry['termdelivery'];
   $paritypreterm = $dataArry['paritypreterm'];
   $parityabortion = $dataArry['parityabortion'];
   $parityissue = $dataArry['parityissue'];
   $no_of_lucs = $dataArry['no_of_lucs'];
   $spontaneous_abortion = $dataArry['spontaneous_abortion'];
   $no_of_suction = $dataArry['no_of_suction'];
   if($dataArry['lastchild_birth'] != ''){
    $lastchild_birth = date('Y-m-d',strtotime($dataArry['lastchild_birth']));
    }else{
        $lastchild_birth = NULL;
    }
   
   $years_ago = $dataArry['years_ago'];
   $any_molar_pregnancy = $dataArry['any_molar_pregnancy'];
   $back_days = $dataArry['back_days'];
   $back_months = $dataArry['back_months'];
   $back_years = $dataArry['back_years'];
   $obstetric_history_notes = $dataArry['obstetric_history_notes'];

   
   
  /* End Obstetric History*/

  /* Others History*/

     $married_status = $dataArry['married_status'];
     $married_years = $dataArry['married_years'];
     $trying_for_pregnancy = $dataArry['trying_for_pregnancy'];
     $how_many_months = $dataArry['how_many_months'];
     $how_many_years = $dataArry['how_many_years'];
 


  /* end others  */

/* start Previous Surgery */


if($dataArry['surgeryID'] != '0'){
    //pre($dataArry['surgeryID']);exit;

$surgeryname = implode(',',$dataArry['surgeryID']);
 }else{
    $surgeryname = NULL;
 }
 if(isset($dataArry['surgerydate'])){
    $surgery_date = implode(',',$dataArry['surgerydate']);
}else{
    $surgery_date = NULL;
}


/* End Of the previous surgery*/

/* start Planned Surgery */

if(isset($dataArry['surgeryplaID'])){

$surgeryplannid = implode(',',$dataArry['surgeryplaID']);
 }else{
    $surgeryplannid = NULL;
 }
 if(isset($dataArry['surgeryPladate'])){
    $surgery_planned_date = implode(',',$dataArry['surgeryPladate']);
}else{
    $surgery_planned_date = NULL;
}


/* End Of the Planned surgery*/

/* Previous Disease */

             $sel_diseasesValues = $dataArry['sel_diseasesValues'];
             $isOtherDiseases = $dataArry['isOtherDiseases'];
             $other_diseases = $dataArry['other_diseases'];
             if ($isOtherDiseases=='N') {
              $other_diseases=NULL;
             }
/* End Previous Diease */

/* Start Vaccinattion History */

  if ($dataArry['tt_taken_on']!='') {
                $tt_taken_on = date('Y-m-d', strtotime($dataArry['tt_taken_on']));
               }else{
                    $tt_taken_on = NULL; 
               }
 if ($dataArry['tt_tobe_taken_on']!='') {
                $tt_tobe_taken_on = date('Y-m-d', strtotime($dataArry['tt_tobe_taken_on']));
               }else{
                    $tt_tobe_taken_on = NULL; 
               }
 if ($dataArry['hpv_taken_on']!='') {
                $hpv_taken_on = date('Y-m-d', strtotime($dataArry['hpv_taken_on']));
               }else{
                    $hpv_taken_on = NULL; 
               }
   if ($dataArry['hpv_tobe_taken_on']!='') {
                $hpv_tobe_taken_on = date('Y-m-d', strtotime($dataArry['hpv_tobe_taken_on']));
               }else{
                    $hpv_tobe_taken_on = NULL; 
               }
   if ($dataArry['mmr_taken_on']!='') {
                $mmr_taken_on = date('Y-m-d', strtotime($dataArry['mmr_taken_on']));
               }else{
                    $mmr_taken_on = NULL; 
               }
   if ($dataArry['mmr_tobe_taken_on']!='') {
                $mmr_tobe_taken_on = date('Y-m-d', strtotime($dataArry['mmr_tobe_taken_on']));
               }else{
                    $mmr_tobe_taken_on = NULL; 
               }
   if ($dataArry['chickenpox_taken_on']!='') {
                $chickenpox_taken_on = date('Y-m-d', strtotime($dataArry['chickenpox_taken_on']));
               }else{
                    $chickenpox_taken_on = NULL; 
               }                                                    
  if ($dataArry['chickenpox_tobe_taken_on']!='') {
                $chickenpox_tobe_taken_on = date('Y-m-d', strtotime($dataArry['chickenpox_tobe_taken_on']));
               }else{
                    $chickenpox_tobe_taken_on = NULL; 
               }
/* End Vaccinattion History */



    $gynccology_master = array(
                               'case_master_id'=>$caseID,
                               'menstrual_cycle_type1'=>$menstrual_cycle_type1,
                               'menstrual_cycle_type2'=>$menstrual_cycle_type2,
                               'menstrual_cycle_type3'=>$menstrual_cycle_type3,
                               'menstrual_duration_days'=>$menstrual_duration_days,
                               'menstrual_cycle_days'=>$menstrual_cycle_days,
                               'cycle_days_pm'=>$cycle_days_pm,
                               'cycle_plusminusdays'=>$cycle_plusminusdays,
                               'menstrual_menarche'=>$menstrual_menarche,
                               'menstrual_lmp_date'=>$menstrual_lmp_date,
                               'menstrual_flow'=>$menstrual_flow,
                               'menstrual_pain'=>$menstrual_pain,
                               'menstrual_cycle_pre_date1'=>$menstrual_cycle_pre_date1,
                               'menstrual_cycle_pre_date2'=>$menstrual_cycle_pre_date2,
                               'menstrual_cycle_pre_date3'=>$menstrual_cycle_pre_date3,
                               'menstrual_cycle_pre_date4'=>$menstrual_cycle_pre_date4,
                               'menopause_year_back'=>$menopause_year_back,
                               'menopause_notes'=>$menopause_notes,
                               'obstetric_term_delivery'=>$termdelivery,
                               'obstetric_preterm'=>$paritypreterm,
                               'obstetric_aboration'=>$parityabortion,
                               'obstetric_living_issue'=>$parityissue,
                               'obstetric_no_of_lucs'=>$no_of_lucs,
                               'obstetric_no_of_suction'=>$no_of_suction,
                               'obs_spontaneous_abortion'=>$spontaneous_abortion,
                               'last_child_birth'=>$lastchild_birth,
                               'years_ago'=>$years_ago,
                               'molar_pregnancy'=>$any_molar_pregnancy,
                               'pregnancy_days_back'=>$back_days,
                               'pregnancy_months_back'=>$back_months,
                               'pregnancy_years_back'=>$back_years,
                               'obstetric_history_notes'=>$obstetric_history_notes,
                               'others_married_status'=>$married_status,
                               'married_years'=>$married_years,
                               'trying_for_pregnancy'=>$trying_for_pregnancy,
                               'how_many_months'=>$how_many_months,
                               'how_many_years'=>$how_many_years,
                               'pre_surgery_id'=>$surgeryname,
                               'pre_surgery_date'=>$surgery_date,
                               'planned_surgery_id'=>$surgeryplannid,
                               'planned_surgery_date'=>$surgery_planned_date,
                               'previous_disease_id'=>$sel_diseasesValues,
                               'previous_other_disease'=>$other_diseases,
                               'is_other_dieases'=>$isOtherDiseases,
                               'tt_taken_on'=>$tt_taken_on,
                               'tt_tobe_taken_on'=>$tt_tobe_taken_on,
                               'hpv_taken_on'=>$hpv_taken_on,
                               'hpv_tobe_taken_on'=>$hpv_tobe_taken_on,
                               'mmr_taken_on'=>$mmr_taken_on,
                               'mmr_tobe_taken_on'=>$mmr_tobe_taken_on,
                               'chickenpox_taken_on'=>$chickenpox_taken_on,
                               'chickenpox_tobe_taken_on'=>$chickenpox_tobe_taken_on

                              );


    //pre($gynccology_master);exit;

       if($gynccologyID == 0){
        /* insert the data*/

           $gynccologyID= $this->commondatamodel->insertSingleTableData('gynccology_master',$gynccology_master);
           
         
         }else{
       
          /* update data */
            $where_gynccology_master = array('gynccology_id'=>$gynccologyID,'case_master_id'=>$caseID);
            
             $updategyncoology= $this->commondatamodel->updateSingleTableData('gynccology_master',$gynccology_master,$where_gynccology_master);
          }
           

//pre($gynccology_master);exit;

//Start Examination data 

 // Start General Examination

 $isGeneralDataChange = trim($dataArry['isGeneralDataChange']);         

if($dataArry['gen_exe_date'] != ""){
    $gen_exem_date = date('Y-m-d',strtotime($dataArry['gen_exe_date']));
}else{
    $gen_exem_date = NULL;
}



 $gen_exam_pluse = trim($dataArry['gen_exam_pluse']);
 $gen_exam_pallor = trim($dataArry['gen_exam_pallor']);
 $gen_exam_bp_systolic = trim($dataArry['gen_exam_bp_systolic']);
 $gen_exam_bp_diastolic = trim($dataArry['gen_exam_bp_diastolic']);
 $exam_oeadema = trim($dataArry['exam_oeadema']);
 $exam_weight = trim($dataArry['exam_weight']);
 $exam_height = trim($dataArry['exam_height']);
 $gen_exam_bmi = trim($dataArry['gen_exam_bmi']);
 $exam_chest = trim($dataArry['exam_chest']);
 $exam_chest_other = trim($dataArry['exam_chest_other']);
 $exam_cvs = trim($dataArry['exam_cvs']);
 $exam_cvs_other = trim($dataArry['exam_cvs_other']);
 $gen_exe_notes = trim($dataArry['gen_exe_notes']);


 $general_examination = array(
                               'case_master_id'=>$caseID,
                               'gen_exam_date'=>$gen_exem_date,
                               'gen_exam_pulse'=>$gen_exam_pluse,
                               'gen_exam_pallor'=>$gen_exam_pallor,
                               'gen_exam_sbp'=>$gen_exam_bp_systolic,
                               'gen_exam_dbp'=>$gen_exam_bp_diastolic,
                               'gen_exam_oeadema'=>$exam_oeadema,
                               'weight'=>$exam_weight,
                               'height'=>$exam_height,
                               'gen_exam_bmi'=>$gen_exam_bmi,
                               'chest'=>$exam_chest,
                               'chest_other'=>$exam_chest_other,
                               'gen_exam_cvs'=>$exam_cvs,
                               'gen_exam_cvs_other'=>$exam_cvs_other,
                               'gen_exam_notes'=>$gen_exe_notes,
                                );

$where_gen_exam = array('case_master_id'=>$caseID,'gen_exam_date'=>$gen_exem_date);

$getExistsdata = $this->commondatamodel->getSingleRowByWhereCls('gynaecology_genral_examination',$where_gen_exam); 


if($isGeneralDataChange == 'Y'){

  if(empty($getExistsdata)){

   $examination= $this->commondatamodel->insertSingleTableData('gynaecology_genral_examination',$general_examination);
   }
   else{

      $updategyncoology= $this->commondatamodel->updateSingleTableData('gynaecology_genral_examination',$general_examination,$where_gen_exam);

   }

}


//End General Examintaion   

//start abdominal Examination



$exam_master_id = trim($dataArry['examination_master_id']);
$isChangeExamdata = trim($dataArry['isChangeExamdata']);

$abdominal_exam = trim($dataArry['abdominal_exam']);
 $abdominal_ascites = trim($dataArry['abdominal_ascites']);
//pre($dataArry);

 // for($i=1;$i<=9;$i++){

 //  if(isset($dataArry['tender_'.$i])){
 //    $tender_.$i = trim($dataArry['tender_'.$i]);
 //   }else{
 //    $tender_.$i = 'N';
 //    }
 // }

 if(isset($dataArry['tender_1'])){
  $tender_1 = trim($dataArry['tender_1']);
}else{
 $tender_1 = 'N';
}
if(isset($dataArry['tender_2'])){
  $tender_2= trim($dataArry['tender_2']);
}else{
   $tender_2 = 'N';
}
if(isset($dataArry['tender_3'])){
  $tender_3 = trim($dataArry['tender_3']);
}else{
  $tender_3 = 'N';
}
if(isset($dataArry['tender_4'])){
  $tender_4 = trim($dataArry['tender_4']);
}else{
  $tender_4 = 'N';
}
if(isset($dataArry['tender_5'])){
  $tender_5 = trim($dataArry['tender_5']);
}else{
  $tender_5 = 'N';
}
if(isset($dataArry['tender_6'])){
  $tender_6 = trim($dataArry['tender_6']);
}else{
  $tender_6 = 'N';
}
if(isset($dataArry['tender_7'])){
  $tender_7 = trim($dataArry['tender_7']);
}else{
  $tender_7 = 'N';
}

if(isset($dataArry['tender_8'])){
  $tender_8 = trim($dataArry['tender_8']);
}else{
  $tender_8= 'N';
}
if(isset($dataArry['tender_9'])){
  $tender_9 = trim($dataArry['tender_9']);
}else{
  $tender_9 = 'N';
}


 $abdominal_lump_size = trim($dataArry['abdominal_lump_size']);
 $abdominal_consistancy = trim($dataArry['abdominal_consistancy']);
 $abdominal_mobility = trim($dataArry['abdominal_mobility']);


 //start prevaginal examination

$pervaginal_exam = trim($dataArry['pervaginal_exam']);
 $prevaginal_mobility = trim($dataArry['prevaginal_mobility']);
 $prevaginal_position = trim($dataArry['prevaginal_position']);


//Start Pre Speculum Examination

 $per_speculam_exam = trim($dataArry['per_speculam_exam']);
 $speculam_growth_seen = trim($dataArry['speculam_growth_seen']);
 $speculam_polyp = trim($dataArry['speculam_polyp']);
 $speculam_white_discharge = trim($dataArry['speculam_white_discharge']);
 $white_discharge_synonyms = trim($dataArry['white_discharge_synonyms']);

//vagina Examination
 $vagina_exam = trim($dataArry['vagina_exam']);

 //vulva Examination
$vulva_exam = trim($dataArry['vulva_exam']);
$vulva_growth_notes = trim($dataArry['vulva_growth_notes']);
$vulva_notes = trim($dataArry['vulva_notes']);




 $gynaecology_exam_master = array(
                                   'case_master_id'=>$caseID,
                                   'abdominal_exam'=>$abdominal_exam,
                                   'tender_one'=>$tender_1,
                                   'tender_two'=>$tender_2,
                                   'tender_three'=>$tender_3,
                                   'tender_four'=>$tender_4,
                                   'tender_five'=>$tender_5,
                                   'tender_six'=>$tender_6,
                                   'tender_seven'=>$tender_7,
                                   'tender_eight'=>$tender_8,
                                   'tender_nine'=>$tender_9,
                                   'lump_size'=>$abdominal_lump_size,
                                   'lump_consistancy'=>$abdominal_consistancy,
                                   'lump_mobility'=>$abdominal_mobility,
                                   'abdominal_ascites'=>$abdominal_ascites,
                                   'pervaginal_exam'=>$pervaginal_exam,
                                   'prevaginal_mobility'=>$prevaginal_mobility,
                                   'prevaginal_position'=>$prevaginal_position,
                                   'per_speculam_exam'=>$per_speculam_exam,
                                   'speculam_growth_seen'=>$speculam_growth_seen,
                                   'speculam_polyp'=>$speculam_polyp,
                                   'speculam_white_discharge'=>$speculam_white_discharge,
                                   'white_discharge_synonyms'=>$white_discharge_synonyms,
                                   'vagina_exam'=>$vagina_exam,
                                   'vulva_exam'=>$vulva_exam,
                                   'vulva_growth_notes'=>$vulva_growth_notes,
                                   'vulva_notes'=>$vulva_notes,
                                   );

//pre($gynaecology_exam_master);exit;

if($isChangeExamdata == 'Y'){

if($exam_master_id == '0'){

 $examinationId= $this->commondatamodel->insertSingleTableData('gynaecology_examination_master',$gynaecology_exam_master);

 $exam_master_id = $examinationId;

}else{

  $where_gyn_exam = array('case_master_id'=>$caseID,'id'=>$exam_master_id);

   $updategyncoology= $this->commondatamodel->updateSingleTableData('gynaecology_examination_master',$gynaecology_exam_master,$where_gyn_exam);

}

}
 

//End Examination data  


//Start Investigation  

$isChangeInvestigation = trim($dataArry['isChangeInvestigation']);
$investigationId = trim($dataArry['gyn_investigation_id']);

if($dataArry['inv_urine_test_date'] != ""){
    $inv_urine_test_date = date('Y-m-d',strtotime($dataArry['inv_urine_test_date']));
}else{
    $inv_urine_test_date = NULL;
}

$inv_urine_test = trim($dataArry['inv_urine_test']);

$inve_hb = trim($dataArry['inve_hb']);
if($dataArry['inve_hb_date'] != ""){
    $inve_hb_date = date('Y-m-d',strtotime($dataArry['inve_hb_date']));
}else{
    $inve_hb_date = NULL;
}

$inve_tc = trim($dataArry['inve_tc']);
if($dataArry['inve_tc_date'] != ""){
    $inve_tc_date = date('Y-m-d',strtotime($dataArry['inve_tc_date']));
}else{
    $inve_tc_date = NULL;
}

$inve_dc = trim($dataArry['inve_dc']);
if($dataArry['inve_dc_date'] != ""){
    $inve_dc_date = date('Y-m-d',strtotime($dataArry['inve_dc_date']));
}else{
    $inve_dc_date = NULL;
}

$inve_fbs = trim($dataArry['inve_fbs']);
if($dataArry['inve_fbs_date'] != ""){
    $inve_fbs_date = date('Y-m-d',strtotime($dataArry['inve_fbs_date']));
}else{
    $inve_fbs_date = NULL;
}

$inve_esr = trim($dataArry['inve_esr']);
if($dataArry['inve_esr_date'] != ""){
    $inve_esr_date = date('Y-m-d',strtotime($dataArry['inve_esr_date']));
}else{
    $inve_esr_date = NULL;
}

$inve_abo_rh = trim($dataArry['inve_abo_rh']);
if($dataArry['inve_abo_rh_date'] != ""){
    $inve_abo_rh_date = date('Y-m-d',strtotime($dataArry['inve_abo_rh_date']));
}else{
    $inve_abo_rh_date = NULL;
}

$ppbs_result = trim($dataArry['ppbs_result']);
if($dataArry['ppbs_date'] != ""){
    $ppbs_date = date('Y-m-d',strtotime($dataArry['ppbs_date']));
}else{
    $ppbs_date = NULL;
}

$ppbs_result = trim($dataArry['ppbs_result']);
if($dataArry['ppbs_date'] != ""){
    $ppbs_date = date('Y-m-d',strtotime($dataArry['ppbs_date']));
}else{
    $ppbs_date = NULL;
}

$vdrl_result = trim($dataArry['vdrl_result']);

if($dataArry['vdrl_date'] != ""){
    $vdrl_date = date('Y-m-d',strtotime($dataArry['vdrl_date']));
}else{
    $vdrl_date = NULL;
}

$hiv_one_result = trim($dataArry['hiv_one_result']);

if($dataArry['hiv_one_date'] != ""){
    $hiv_one_date = date('Y-m-d',strtotime($dataArry['hiv_one_date']));
}else{
    $hiv_one_date = NULL;
}

$hiv_two_result = trim($dataArry['hiv_two_result']);

if($dataArry['hiv_two_date'] != ""){
    $hiv_two_date = date('Y-m-d',strtotime($dataArry['hiv_two_date']));
}else{
    $hiv_two_date = NULL;
}

$hbsag_result = trim($dataArry['hbsag_result']);

if($dataArry['hbsag_date'] != ""){
    $hbsag_date = date('Y-m-d',strtotime($dataArry['hbsag_date']));
}else{
    $hbsag_date = NULL;
}

$antihcv_result = trim($dataArry['antihcv_result']);

if($dataArry['antihcv_date'] != ""){
    $antihcv_date = date('Y-m-d',strtotime($dataArry['antihcv_date']));
}else{
    $antihcv_date = NULL;
}

$urine_re_result = trim($dataArry['urine_re_result']);
$urine_re_notes = trim($dataArry['urine_re_notes']);

if($dataArry['urine_re_date'] != ""){
    $urine_re_date = date('Y-m-d',strtotime($dataArry['urine_re_date']));
}else{
    $urine_re_date = NULL;
}

$inve_hba1c = trim($dataArry['inve_hba1c']);

if($dataArry['inve_hba1c_date'] != ""){
    $inve_hba1c_date = date('Y-m-d',strtotime($dataArry['inve_hba1c_date']));
}else{
    $inve_hba1c_date = NULL;
}

$inve_lft = trim($dataArry['inve_lft']);

if($dataArry['inve_lft_date'] != ""){
    $inve_lft_date = date('Y-m-d',strtotime($dataArry['inve_lft_date']));
}else{
    $inve_lft_date = NULL;
}

$stsh_result = trim($dataArry['stsh_result']);

if($dataArry['stsh_date'] != ""){
    $stsh_date = date('Y-m-d',strtotime($dataArry['stsh_date']));
}else{
    $stsh_date = NULL;
}

$s_urea_result = trim($dataArry['s_urea_result']);

if($dataArry['s_urea_date'] != ""){
    $s_urea_date = date('Y-m-d',strtotime($dataArry['s_urea_date']));
}else{
    $s_urea_date = NULL;
}


$s_creatinine_result = trim($dataArry['s_creatinine_result']);

if($dataArry['s_creatinine_date'] != ""){
    $s_creatinine_date = date('Y-m-d',strtotime($dataArry['s_creatinine_date']));
}else{
    $s_creatinine_date = NULL;
}


$pt_result = trim($dataArry['pt_result']);

if($dataArry['pt_date'] != ""){
    $pt_date = date('Y-m-d',strtotime($dataArry['pt_date']));
}else{
    $pt_date = NULL;
}

$inr_result = trim($dataArry['inr_result']);

if($dataArry['inr_date'] != ""){
    $inr_date = date('Y-m-d',strtotime($dataArry['inr_date']));
}else{
    $inr_date = NULL;
}

$aptt_result = trim($dataArry['aptt_result']);

if($dataArry['aptt_date'] != ""){
    $aptt_date = date('Y-m-d',strtotime($dataArry['aptt_date']));
}else{
    $aptt_date = NULL;
}

$ecg_result = trim($dataArry['ecg_result']);

if($dataArry['ecg_date'] != ""){
    $ecg_date = date('Y-m-d',strtotime($dataArry['ecg_date']));
}else{
    $ecg_date = NULL;
}

$chest_xray_result = trim($dataArry['chest_xray_result']);

if($dataArry['chest_xray_date'] != ""){
    $chest_xray_date = date('Y-m-d',strtotime($dataArry['chest_xray_date']));
}else{
    $chest_xray_date = NULL;
}

$echocardiography_result = trim($dataArry['echocardiography_result']);

if($dataArry['echocardiography_date'] != ""){
    $echocardiography_date = date('Y-m-d',strtotime($dataArry['echocardiography_date']));
}else{
    $echocardiography_date = NULL;
}

$serum_ca_result = trim($dataArry['serum_ca_result']);

if($dataArry['serum_ca_date'] != ""){
    $serum_ca_date = date('Y-m-d',strtotime($dataArry['serum_ca_date']));
}else{
    $serum_ca_date = NULL;
}

$serum_bhch_result = trim($dataArry['serum_bhch_result']);

if($dataArry['serum_bhch_date'] != ""){
    $serum_bhch_date = date('Y-m-d',strtotime($dataArry['serum_bhch_date']));
}else{
    $serum_bhch_date = NULL;
}

$serum_afp_result = trim($dataArry['serum_afp_result']);

if($dataArry['serum_afp_date'] != ""){
    $serum_afp_date = date('Y-m-d',strtotime($dataArry['serum_afp_date']));
}else{
    $serum_afp_date = NULL;
}

$usg_abdomen_result = trim($dataArry['usg_abdomen_result']);

if($dataArry['usg_abdomen_date'] != ""){
    $usg_abdomen_date = date('Y-m-d',strtotime($dataArry['usg_abdomen_date']));
}else{
    $usg_abdomen_date = NULL;
}

$mri_abdomen_result = trim($dataArry['mri_abdomen_result']);

if($dataArry['mri_abdomen_date'] != ""){
    $mri_abdomen_date = date('Y-m-d',strtotime($dataArry['mri_abdomen_date']));
}else{
    $mri_abdomen_date = NULL;
}

$endometril_result = trim($dataArry['endometril_result']);

if($dataArry['endometril_date'] != ""){
    $endometril_date = date('Y-m-d',strtotime($dataArry['endometril_date']));
}else{
    $endometril_date = NULL;
}


$pap_smear_result = trim($dataArry['pap_smear_result']);

if($dataArry['pap_smear_date'] != ""){
    $pap_smear_date = date('Y-m-d',strtotime($dataArry['pap_smear_date']));
}else{
    $pap_smear_date = NULL;
}

$usg_breast_result = trim($dataArry['usg_breast_result']);

if($dataArry['usg_breast_date'] != ""){
    $usg_breast_date = date('Y-m-d',strtotime($dataArry['usg_breast_date']));
}else{
    $usg_breast_date = NULL;
}

$memmography_result = trim($dataArry['memmography_result']);

if($dataArry['memmography_date'] != ""){
    $memmography_date = date('Y-m-d',strtotime($dataArry['memmography_date']));
}else{
    $memmography_date = NULL;
}




$gyninvestigation = array(
                        'case_master_id'=>$caseID,
                        'inv_urine_test_date'=>$inv_urine_test_date,
                        'inv_urine_test'=>$inv_urine_test,
                        'hb_result'=>$inve_hb,
                        'hb_date'=>$inve_hb_date,
                        'tc_result'=>$inve_tc,
                        'tc_date'=>$inve_tc_date,
                        'dc_result'=>$inve_dc,
                        'dc_date'=>$inve_dc_date,
                        'fbs_result'=>$inve_fbs,
                        'fbs_date'=>$inve_fbs_date,
                        'esr_result'=>$inve_esr,
                        'esr_date'=>$inve_esr_date,
                        'abo_rh_result'=>$inve_abo_rh,
                        'abo_rh_date'=>$inve_abo_rh_date,
                        'ppbs_result'=>$ppbs_result,
                        'ppbs_date'=>$ppbs_date,
                        'vdrl_result'=>$vdrl_result,
                        'vdrl_date'=>$vdrl_date,
                        'hiv_one_result'=>$hiv_one_result,
                        'hiv_one_date'=>$hiv_one_date,
                        'hiv_two_result'=>$hiv_two_result,
                        'hiv_two_date'=>$hiv_two_date,
                        'hbsag_result'=>$hbsag_result,
                        'hbsag_date'=>$hbsag_date,
                        'antihcv_result'=>$antihcv_result,
                        'antihcv_date'=>$antihcv_date,
                        'urine_re_result'=>$urine_re_result,
                        'urine_re_date'=>$urine_re_date,
                        'urine_re_notes'=>$urine_re_notes,
                        'hba1c_result'=>$inve_hba1c,
                        'hba1c_date'=>$inve_hba1c_date,
                        'lft_result'=>$inve_lft,
                        'lft_date'=>$inve_lft_date,
                        'stsh_result'=>$stsh_result,
                        'stsh_date'=>$stsh_date,
                        's_urea_result'=>$s_urea_result,
                        's_urea_date'=>$s_urea_date,
                        's_creatinine_result'=>$s_creatinine_result,
                        's_creatinine_date'=>$s_creatinine_date,
                        'pt_result'=>$pt_result,
                        'pt_date'=>$pt_date,
                        'inr_result'=>$inr_result,
                        'inr_date'=>$inr_date,
                        'aptt_result'=>$aptt_result,
                        'aptt_date'=>$aptt_date,
                        'ecg_result'=>$ecg_result,
                        'ecg_date'=>$ecg_date,
                        'chest_xray_result'=>$chest_xray_result,
                        'chest_xray_date'=>$chest_xray_date,
                        'echocardiography_result'=>$echocardiography_result,
                        'echocardiography_date'=>$echocardiography_date,
                        'serum_ca_result'=>$serum_ca_result,
                        'serum_ca_date'=>$serum_ca_date,
                        'serum_bhch_result'=>$serum_bhch_result,
                        'serum_bhch_date'=>$serum_bhch_date,
                        'serum_afp_result'=>$serum_afp_result,
                        'serum_afp_date'=>$serum_afp_date,
                        'usg_abdomen_result'=>$usg_abdomen_result,
                        'usg_abdomen_date'=>$usg_abdomen_date,
                        'mri_abdomen_result'=>$mri_abdomen_result,
                        'mri_abdomen_date'=>$mri_abdomen_date,
                        'endometril_result'=>$endometril_result,
                        'endometril_date'=>$endometril_date,
                        'pap_smear_result'=>$pap_smear_result,
                        'pap_smear_date'=>$pap_smear_date,
                        'usg_breast_result'=>$usg_breast_result,
                        'usg_breast_date'=>$usg_breast_date,
                        'memmography_result'=>$memmography_result,
                        'memmography_date'=>$memmography_date,
                         );

if($isChangeInvestigation == 'Y'){

if($investigationId == '0'){

 $investigationId= $this->commondatamodel->insertSingleTableData('gynaaecology_investigation',$gyninvestigation);

 $investigationId = $investigationId;

}else{

  $where_investigation = array('case_master_id'=>$caseID,'id'=>$investigationId);

   $updategyncoology= $this->commondatamodel->updateSingleTableData('gynaaecology_investigation',$gyninvestigation,$where_investigation);

}

}



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

$deleteTodayPrespanelInves=$this->commondatamodel->deleteTableData('prescription_investigation_panel_details',$where_pres_mst);

   
/* delete master data*/
$deleteTodayPrescription=$this->commondatamodel->deleteTableData('prescription_master',$where_prescription);
}

// //investigation panel

// $deleteTodayPrescription=$this->commondatamodel->deleteTableData('gynaecology_investigation_panel_detail',$wherecaseId);

// $deleteTodayPresInves=$this->commondatamodel->deleteTableData('gynaecology_investigation_dtl',$wherecaseId);


/* insert into prescription_master */  

$review_after_days = trim($dataArry['review_after_days']);
$review_after_weeks = trim($dataArry['review_after_weeks']);

$prescription_master = array(
                                'case_master_id' => $caseID, 
                                'created_on' => date('Y-m-d H:i:s'),
                                'doctor_note' => "", 
                                'next_checkup_dt' => "",
                                'review_after_days' =>$review_after_days,
                                'review_after_weeks' =>$review_after_weeks,
                                'entry_date' => date('Y-m-d'), 
                               );


$insertPrescriptionID=$this->commondatamodel->insertSingleTableData('prescription_master',$prescription_master);


 if(isset($dataArry['presMedID'])) {

    $presMedID = $dataArry['presMedID'];
    $presdosage = $dataArry['presdosage'];
    $presfrequency = $dataArry['presfrequency'];
    $presdays = $dataArry['presdays'];
    $presInstruction = $dataArry['presInstruction'];

    for ($i=0; $i <count($dataArry['presMedID']) ; $i++) { 
     

        $pres_med_arr = array(
                              'prescription_mst_id' => $insertPrescriptionID, 
                              'medicine_id' => $presMedID[$i], 
                              'dosage' => $presdosage[$i], 
                              'frequency' => $presfrequency[$i], 
                              'days' => $presdays[$i],
                              'med_instruction' => $presInstruction[$i],
                              'created_on' => date('Y-m-d'), 
                            );

         $insertPresMedicine=$this->commondatamodel->insertSingleTableData('prescription_medicine_dtl',$pres_med_arr);
    }

  }




$wherecaseId = array('case_master_id'=>$caseID);

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


//* Investigation Details */



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



  if($gynccologyID == true || $updategyncoology == true)
                    {
                        $json_response = array(
                            "msg_status" => 1,
                            "msg_data" => "Status Updated",
                            "gynccologyID" =>$gynccologyID,
                            "AllchiefcomplaintId" =>$allLastinsertId,
                            "examination_master_id" =>$exam_master_id,
                            "gyninvestigationId" =>$investigationId,
                                                     
                        );
                    }
                    else
                    {
                        $json_response = array(
                            "msg_status" => 1,
                            "msg_data" => "There is some problem.Try again",
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

public function addPreviousSurgeryDetail(){

     if($this->session->userdata('user_data'))
        {
            $session = $this->session->userdata('user_data');
        

            $row_no = $this->input->post('rowNo');
            $surgeryID = $this->input->post('surgeryID');
         
            $data['surgery_date'] = $this->input->post('surgery_date');
            

            
           
            $where_surgery= array('surgery_id' => $surgeryID );
            $surgeryeData = $this->commondatamodel->getSingleRowByWhereCls('surgery_master',$where_surgery);

            $data['surgeryrowno'] = $row_no;
            $data['surgeryID'] = $surgeryID;
            $data['surgery'] = $surgeryeData->surgery_name;

           
           
            
           
             $page = 'dashboard/admin_dashboard/case/gynccology/previous_surgery_partial_view';
            $viewTemp = $this->load->view($page,$data,TRUE);
            echo $viewTemp;
        }
        else
        {
            redirect('login','refresh');
        }
}

public function addPlannedSurgeryDetail(){

      if($this->session->userdata('user_data'))
        {
            $session = $this->session->userdata('user_data');
        

            $row_no = $this->input->post('rowNo');
            $surgeryPlannedID = $this->input->post('surgeryPlannedID');
            $data['surgery_planned_date'] = $this->input->post('surgery_planned_date');
           

            $where_surgery= array('surgery_id' => $surgeryPlannedID );
            $surgeryeData = $this->commondatamodel->getSingleRowByWhereCls('surgery_master',$where_surgery);

            $data['surgeryplannedrowno'] = $row_no;
            $data['surgeryID'] = $surgeryPlannedID;
            $data['surgery'] = $surgeryeData->surgery_name;

           
           
            
           
             $page = 'dashboard/admin_dashboard/case/gynccology/surgery_planned_partial_view';
            $viewTemp = $this->load->view($page,$data,TRUE);
            echo $viewTemp;
        }
        else
        {
            redirect('login','refresh');
        }

}

public function resetPreviousSurgeryDropdown(){

    if($this->session->userdata('user_data'))
        {
            $session = $this->session->userdata('user_data');

          $surgeryIDs = $this->input->post('surgeryIDs');

          $result['surgeryList']=$this->gynccologymodel->getPreviousSurgeryWhereNotIn($surgeryIDs);
         //pre($result['surgeryList']);exit;
        ?>


           <select name="surgeryID" id="surgeryID" class="form-control selpres show-tick changezindex" data-live-search="true" tabindex="-98">
                                <option value="0"> &nbsp; </option>
                                        <?php 
                                            foreach ($result['surgeryList']  as $surgeryList ) { 
                                        ?>
                                          <option value="<?php echo $surgeryList->surgery_id;?>"

                                             
                                            ><?php echo $surgeryList->surgery_name;?></option>
                                        <?php
                                          }
                                        ?>
                                      
                        </select> 
         <?php

        }
        else
      {
          redirect('login','refresh');
      }
}

public function resetPlannedSurgeryDropdown(){

    if($this->session->userdata('user_data'))
        {
            $session = $this->session->userdata('user_data');

          $surgeryIDs = $this->input->post('surgeryplannedIDs');

          $result['surgeryList']=$this->gynccologymodel->getPreviousSurgeryWhereNotIn($surgeryIDs);
         //pre($result['surgeryList']);exit;
        ?>


          <select name="surgeryPlannedID" id="surgeryPlannedID" class="form-control show-tick changezindex" data-live-search="true" tabindex="-98">
                                <option value="0"> &nbsp; </option>
                                        <?php 
                                            foreach ($result['surgeryList']  as $surgeryList ) { 
                                        ?>
                                          <option value="<?php echo $surgeryList->surgery_id;?>"

                                             
                                            ><?php echo $surgeryList->surgery_name;?></option>
                                        <?php
                                          }
                                        ?>
                                      
                        </select> 
         <?php

        }
        else
      {
          redirect('login','refresh');
      }
}

public function storeComplaintelaborationdata($insertId,$complaint_master_id,$caseID,$dataArry,$type){

$where = array('id'=>$complaint_master_id);    

$insertId = $insertId;

$gettableName = $this->commondatamodel->getSingleRowByWhereCls('gynaccology_chief_complaints',$where);

$tableName = $gettableName->detail_table_name;
//pre($tableName);
  /*Insert Pain lower Abdomen data */

/* Pain Lower Abdomen data */

if($tableName == 'pain_lower_abdomen'){

$insert_update['pain_lower_abdomen'] = array(
                       'case_master_id'=>$caseID,
                       'complaint_details_id'=>$insertId,
                       'duration_days'=>trim($dataArry['pain_duration_days']),
                       'duration_months'=>trim($dataArry['pain_duration_months']),
                       'duration_years'=>trim($dataArry['pain_duration_years']),
                       'associte_dysuria'=>trim($dataArry['dysuria']),
                       'asso_frequency_wination'=>trim($dataArry['freq_of_wination']),
                       'period_pain'=>trim($dataArry['period_rel_pain']),
                       'pain_name'=>trim($dataArry['sel_painValues']),
                       'is_period_pain'=>trim($dataArry['isPeriodrelPain']),
                       'others_pain'=>trim($dataArry['other_pain']),
                       'is_others_pain'=>trim($dataArry['isOtherPain']),
                       'severty'=>trim($dataArry['pain_severity']),
                       'pain_charcter'=>trim($dataArry['pain_character']),
                       'others'=>trim($dataArry['pain_lowerothers'])
                       );




}

/* dysuria data */

if($tableName == 'dysuria'){


$insert_update['dysuria'] = array(
                       'case_master_id'=>$caseID,
                       'complaint_details_id'=>$insertId,
                       'freq_of_micturition'=>trim($dataArry['freq_of_micturition']),
                       'pain_abdomen'=>trim($dataArry['pain_abdomen']),
                       'dysuria_fever'=>trim($dataArry['dysuria_fever']),
                       'burining_sensation'=>trim($dataArry['burning_sensation'])
                       
                       );


}

/* oligomenorrhoea data */

if($tableName == 'oligomenorrhoea'){


$insert_update['oligomenorrhoea'] = array(
                       'case_master_id'=>$caseID,
                       'complaint_details_id'=>$insertId,
                       'notes'=>trim($dataArry['oligomenorrhoea_notes'])
                                              
                       );


}

/* secondary_amenorrhoea data */

if($tableName == 'secondary_amenorrhoea'){


$insert_update['secondary_amenorrhoea'] = array(
                       'case_master_id'=>$caseID,
                       'complaint_details_id'=>$insertId,
                       'notes'=>trim($dataArry['sec_amenorrhea_notes'])
                                              
                       );


}
/* menorrhagia data */

if($tableName == 'menorrhagia'){


$insert_update['menorrhagia'] = array(
                       'case_master_id'=>$caseID,
                       'complaint_details_id'=>$insertId,
                       'notes'=>trim($dataArry['menorrhagia_notes'])
                                              
                       );


}
/* polymenorrhea data */

if($tableName == 'polymenorrhea'){


$insert_update['polymenorrhea'] = array(
                       'case_master_id'=>$caseID,
                       'complaint_details_id'=>$insertId,
                       'notes'=>trim($dataArry['polymenorrhea_notes'])
                                              
                       );


}
/* hypomenorrhoea data */

if($tableName == 'hypomenorrhoea'){


$insert_update['hypomenorrhoea'] = array(
                       'case_master_id'=>$caseID,
                       'complaint_details_id'=>$insertId,
                       'notes'=>trim($dataArry['hypomenorrhoea_notes'])
                                              
                       );


}

/* white_discharge data */

if($tableName == 'white_discharge'){


$insert_update['white_discharge'] = array(
                       'case_master_id'=>$caseID,
                       'complaint_details_id'=>$insertId,
                       'duration_days'=>trim($dataArry['discharge_duration_days']),
                       'duration_months'=>trim($dataArry['discharge_duration_months']),
                       'associted_with'=>trim($dataArry['whiteDischargeValues']),
                       'previous_episode'=>trim($dataArry['white_previous_episode']),
                       'is_previous_episode'=>trim($dataArry['ispreviousEpisode']),
                       'episode_previous_sel'=>trim($dataArry['previous_episode'])
                                              
                       );


}

/* unwanted_pregnancy data */

if($tableName == 'unwanted_pregnancy'){

if($dataArry['urine_test_date'] == ""){
    $testdate = NULL;
}else{
   $testdate = date('Y-m-d',strtotime($dataArry['urine_test_date']));   
}

$insert_update['unwanted_pregnancy'] = array(
                       'case_master_id'=>$caseID,
                       'complaint_details_id'=>$insertId,
                       'urine_test_date'=>$testdate,
                       'wants_termination'=>trim($dataArry['WantsterminationValues']),
                       'wantterminationOther'=>trim($dataArry['wantterminationOther']),
                       'isWantOthers'=>trim($dataArry['isWantOthers']),
                       'termination_by'=>trim($dataArry['termination_by']),
                       'surgical_method'=>trim($dataArry['surgical_method_with']),
                       'isSurgicalMethod'=>trim($dataArry['isSurgicalMethod'])
                       
                                              
                       );


}

/* incidental_usg_finding data */

if($tableName == 'incidental_usg_finding'){

if($dataArry['usg_date'] == ""){

    $usgdate = NULL;
}else{

     $usgdate = date('Y-m-d',strtotime($dataArry['usg_date']));
}

$insert_update['incidental_usg_finding'] = array(
                       'case_master_id'=>$caseID,
                       'complaint_details_id'=>$insertId,
                       'fibroid_size'=>trim($dataArry['fibroid_size']),
                       'fibroid_no'=>trim($dataArry['fibroid_no']),
                       'fibroid_location'=>trim($dataArry['fibroid_location']),
                       'pcos'=>trim($dataArry['pcosvalues']),
                       'endometrial_thickness'=>trim($dataArry['endometrial_thickness']),
                       'lt_ovary_size'=>trim($dataArry['lt_ovary_size']),
                       'rt_ovary_size'=>trim($dataArry['rt_ovary_size']),
                       'usg_date'=>$usgdate,
                       'incidental_notes'=>trim($dataArry['incidental_notes'])
                       
                                              
                       );


}

/* stich_line_problem data */

if($tableName == 'stich_line_problem'){

if($dataArry['operation_date'] == ""){

    $operdate = NULL;
}else{

     $operdate = date('Y-m-d',strtotime($dataArry['operation_date']));
}



$insert_update['stich_line_problem'] = array(
                       'case_master_id'=>$caseID,
                       'complaint_details_id'=>$insertId,
                       'hospital_name'=>trim($dataArry['hospital_name']),
                       'place'=>trim($dataArry['hospital_place']),
                       'operation_name'=>trim($dataArry['operation_name']),
                       'operation_date'=>$operdate,
                       
                       'others'=>trim($dataArry['stich_others']),
                                                                     
                       );


}

/* somthing_comming_down data */

if($tableName == 'somthing_comming_down'){


$insert_update['somthing_comming_down'] = array(
                       'case_master_id'=>$caseID,
                       'complaint_details_id'=>$insertId,
                       'duration_months'=>trim($dataArry['somthing_duration_months']),
                       'duration_years'=>trim($dataArry['somthing_duration_years']),
                       'stress_incontinence'=>trim($dataArry['stress_incontinence']),
                       'diff_in_wination'=>trim($dataArry['diff_in_wination']),
                       'diff_in_defection'=>trim($dataArry['diff_in_defection']),
                       'assoc_with_discharge'=>trim($dataArry['assoc_with_discharge']),
                       'assoc_chronic_cough'=>trim($dataArry['assoc_chronic_cough']),
                       'assoc_constipation'=>trim($dataArry['assoc_constipation'])
                       
                       
                                              
                       );


}

/* post_menopausal_bleeding data */

if($tableName == 'post_menopausal_bleeding'){


$insert_update['post_menopausal_bleeding'] = array(
                       'case_master_id'=>$caseID,
                       'complaint_details_id'=>$insertId,
                       'menopausal_episode'=>trim($dataArry['menopausal_episode']),
                       'bleeding'=>trim($dataArry['bleeding']),
                       'stop_bleeding_by'=>trim($dataArry['stopbleedingby']),
                       'isStopBleeding'=>trim($dataArry['isStopBleeding']),
                       'stop_bleeding_medicine'=>trim($dataArry['stopbleedingmedValues']),
                       'bleeding_continue_days'=>trim($dataArry['bleeding_continue_days']),
                       'bleeding_after_days'=>trim($dataArry['bleeding_after_days']),
                       'post_menopausual_notes'=>trim($dataArry['post_menopausual_notes'])
                      
                       
                       
                                              
                       );


}


/* urinary_incontinence data */

if($tableName == 'urinary_incontinence'){


$insert_update['urinary_incontinence'] = array(
                       'case_master_id'=>$caseID,
                       'complaint_details_id'=>$insertId,
                       'urinary_incontinence'=>trim($dataArry['urinary_incontinence']),
                       'urinary_incontinence_days'=>trim($dataArry['urinary_incontinence_days']),
                       'urinary_incontinence_months'=>trim($dataArry['urinary_incontinence_months']),
                       'urinary_incontinence_years'=>trim($dataArry['urinary_incontinence_years']),
                       'treated_with_medicine'=>trim($dataArry['treatedmedicine']),
                       'urinary_episode'=>trim($dataArry['urinary_episode']),
                       'isurinaryepisode'=>trim($dataArry['isurinaryepisode']),
                       'episode_months'=>trim($dataArry['episode_months']),
                       'episode_years'=>trim($dataArry['episode_years']),
                       'urinary_notes'=>trim($dataArry['urinary_notes']),
                       
                       
                                              
                       );


}

/* lump_lower_abdomen data */

if($tableName == 'lump_lower_abdomen'){


$insert_update['lump_lower_abdomen'] = array(
                       'case_master_id'=>$caseID,
                       'complaint_details_id'=>$insertId,
                       'lump_lower_days'=>trim($dataArry['lump_lower_days']),
                       'lump_lower_months'=>trim($dataArry['lump_lower_months']),
                       'lump_lower_years'=>trim($dataArry['lump_lower_years']),
                       'retanion'=>trim($dataArry['retanion']),
                       'lump_dysuria'=>trim($dataArry['lump_dysuria']),
                       'weight_loss'=>trim($dataArry['weight_loss']),
                       'others'=>trim($dataArry['lump_lower_others']),
                       'lump_pain_abdomen'=>trim($dataArry['lump_pain_abdomen'])
                       
                       
                       
                                              
                       );


}

/* wants_family_planning data */

if($tableName == 'wants_family_planning'){


$insert_update['wants_family_planning'] = array(
                       'case_master_id'=>$caseID,
                       'complaint_details_id'=>$insertId,
                       'permanent'=>trim($dataArry['permanent']),
                       'temporary'=>trim($dataArry['temporary'])
                                              
                       );


}

/* lump_in_breast data */

if($tableName == 'lump_in_breast'){


$insert_update['lump_in_breast'] = array(
                       'case_master_id'=>$caseID,
                       'complaint_details_id'=>$insertId,
                       'lump_breast_days'=>trim($dataArry['lump_breast_days']),
                       'lump_breast_months'=>trim($dataArry['lump_breast_months']),
                       'lump_breast_years'=>trim($dataArry['lump_breast_years']),
                       'lump_breast_pain'=>trim($dataArry['lump_breast_pain']),
                       'nipple_discharge'=>trim($dataArry['nipple_discharge']),
                       'lump_breast_notes'=>trim($dataArry['lump_breast_notes'])
                                              
                       );


}

/* breast_congestion data */

if($tableName == 'breast_congestion'){


$insert_update['breast_congestion'] = array(
                       'case_master_id'=>$caseID,
                       'complaint_details_id'=>$insertId,
                       'breast_congestion_days'=>trim($dataArry['breast_congestion_days']),
                       'breast_congestion_months'=>trim($dataArry['breast_congestion_months']),
                       'breastfeeding'=>trim($dataArry['breast_feeding']),
                       'baby_age_months'=>trim($dataArry['baby_age_months']),
                       'baby_age_years'=>trim($dataArry['baby_age_years']),
                       'breast_congestion_notes'=>trim($dataArry['breast_congestion_notes'])
                                              
                       );


}

/* pain_in_breast data */

if($tableName == 'pain_in_breast'){

if(!empty($dataArry['consistency'])){
    $consistency = trim($dataArry['consistency']);
}
else{
    $consistency = NULL;
}

if(!empty($dataArry['mobility'])){
    $mobility = trim($dataArry['mobility']);
}
else{
    $mobility = NULL;
}

$insert_update['pain_in_breast'] = array(
                       'case_master_id'=>$caseID,
                       'complaint_details_id'=>$insertId,
                       'pain_in_breast'=>trim($dataArry['pain_in_breast']),
                       'lymphnode'=>trim($dataArry['lymphnode']),
                       'breast_nipple_discharge'=>trim($dataArry['breast_nipple_discharge']),
                       'lump_felt'=>trim($dataArry['lump_felt']),
                       'is_lump_felt'=>trim($dataArry['islumpFelt']),
                       'cosistency'=>$consistency,
                       'mobility'=>$mobility,
                       'right_breast'=>trim($dataArry['rightBreastvalues']),
                       'left_breast'=>trim($dataArry['leftBreastvalues']),
                       'lump_felt_location'=>trim($dataArry['lump_felt_location']),
                       'lump_felt_size'=>trim($dataArry['lump_felt_size']),
                       'with_nodularity'=>trim($dataArry['with_nodularity']),
                       'notes'=>trim($dataArry['pain_in_breast_notes']),
                                              
                       );


}

$wherecaseID = array('case_master_id'=>$caseID,'complaint_details_id'=>$insertId); 

$insertdata = $this->commondatamodel->getSingleRowByWhereCls($tableName,$wherecaseID);

 

if(empty($insertdata) && $type == 'insert'){
  

  $insert= $this->commondatamodel->insertSingleTableData($tableName,$insert_update[$tableName]);

   return $pain_lower_lastID = $insert;

 }
else{

   if(empty($insertdata)){

     $insert= $this->commondatamodel->insertSingleTableData($tableName,$insert_update[$tableName]);
   }

   else{  

     $where = array('case_master_id'=>$caseID,'complaint_details_id'=>$insertId);

    $updategyncoologydetails= $this->commondatamodel->updateSingleTableData($tableName,$insert_update[$tableName],$where); 
   
      return $updategyncoologydetails;
  
    }
   }

}

public function deleterespectivedata($caseID,$complaint_id,$insertId){


 $where = array('id'=>$complaint_id);
 
 $gettableName = $this->commondatamodel->getSingleRowByWhereCls('gynaccology_chief_complaints',$where);

 $tableName = $gettableName->detail_table_name; 
 $where_caseId = array('case_master_id'=>$caseID,'complaint_details_id'=>$insertId);
  $delete = $this->commondatamodel->deleteTableData($tableName,$where_caseId);
  
  return $delete;

}

public function CheckComplaintRespectiveData(){

    $compdetailsID = $this->input->post('compdetailsID');
    $complaint_master_id = $this->input->post('complaint_master_id');
    $caseID = $this->input->post('caseID');
    //$caseID = $this->uri->segment(3);

     $where = array('id'=>$complaint_master_id);
     
     $gettableName = $this->commondatamodel->getSingleRowByWhereCls('gynaccology_chief_complaints',$where);

     $tableName = $gettableName->detail_table_name; 
  
     $where_table = array('case_master_id'=>$caseID,'complaint_details_id'=>$compdetailsID);

    $getdata = $this->commondatamodel->getSingleRowByWhereCls($tableName,$where_table);
   //print_r($where_table);exit;
    if(!empty($getdata)){

         $json_response = array(
                            "msg_status" => 1,
                            "msg_data" => "Already Data Is Exists",
                                                                                
                        );
                 }
                    else
                    {
                        $json_response = array(
                            "msg_status" => 0,
                            "msg_data" => "No Data Found",
                            );
                    }
 
   


            header('Content-Type: application/json');
            echo json_encode( $json_response );
            exit;
 

       
        
    }


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
             


             
          // print_r($investigationpaneldetails);
             
            }
             
            $data['invData']=$investigationpaneldetails;
          

           // print_r($investigationID);
          //  $investigationID=1;


            
                      // pre($medicineData);exit;

            // $data['rowno'] = $row_no;
            // $data['investigationID'] = $investigationID;
            // $data['investigation'] = $investigationData->inv_component_name;
        
           
            
      $page = 'dashboard/admin_dashboard/case/gynccology/gynaecology_add_investigation_panel.php';
      $viewTemp = $this->load->view($page,$data,TRUE);
      echo $viewTemp;
        }
        else
        {
            redirect('login','refresh');
        }
    }



    public function resetGynInvestigationpanelDropdown(){

        if($this->session->userdata('user_data'))
      {
        

      $investigationpanelItem = $this->input->post('investigationpanelItem');
      
       //print_r($investigationpanelItem);
        // $result['testList']=$this->commondatamodel->getAllDropdownData('investigation_component');
         $result['paneltestList']=$this->gynccologymodel->getInvestigationpanelComponentWhereNotIn($investigationpanelItem);
         // print_r($result['paneltestList']);exit;
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

  /* Start Informatio Leaflet */

public function imageupload(){


 if($this->session->userdata('user_data'))
      {

       $caseID = $this->input->post('caseID');
       $info_leaflet = $_FILES['info_leaflet']['name'];
       $consent_form = $_FILES['consent_form']['name'];

       $infofilename = "";
       $cosentfilename = "";
       $dir = $_SERVER['DOCUMENT_ROOT'] . '/pms/assets/gyn-document';

          $config = array(
                    'upload_path' => $dir,
                    'allowed_types' => 'gif|jpg|png|jpeg|docx|pdf|doc|xlsx|xls',
                    //allowed max file size. 0 means unlimited file size
                    'max_size' => '0',
                    //max file name size
                    'max_filename' => '255',
                    //whether file name should be encrypted or not
                    'encrypt_name' => TRUE
                        //store image info once uploaded
                );
                
             $this->load->library('upload', $config);
          
              
                if ($this->upload->do_upload('info_leaflet')) {

                $file_detail = $this->upload->data();
               // $error =  $this->upload->display_errors();
                 $infofilename = $file_detail['file_name'];
                }
             
              if ($this->upload->do_upload('consent_form')) {

                $file_details = $this->upload->data();
               // $error =  $this->upload->display_errors();
                 $cosentfilename = $file_details['file_name'];
                }   
         $where = array('case_master_id'=>$caseID);

         $infodata = array('infomation_leaflet_fileupload'=> $infofilename);
         $cosentdata = array('consent_formfile_upload'=>$cosentfilename);
        if($info_leaflet != ''){

           $updateinfoleaflet= $this->commondatamodel->updateSingleTableData('gynccology_master',$infodata,$where);
        } 
        if($consent_form != ''){

          $updateinfoleaflet= $this->commondatamodel->updateSingleTableData('gynccology_master',$cosentdata,$where);
        }
           

           $json_response = array(
                            "msg_status" => 1,
                            "msg_data" => "Successfully Update",
                           
                                                                                
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


/* End Informatio Leaflet */


public function print_prescription(){
      $session = $this->session->userdata('user_data');
       if($this->session->userdata('user_data'))
        {
          $result=[];
          $result['patientCaseData']=[];
          $result['patientmasterData']=[];
         
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

                 
               $result['prescriptionLatestData']=$this->patientcasemodel->getPrescriptionLatestByCase($caseID);
                $where_caseID = array('case_master_id' =>$caseID); 

                $result['marriedStatus'] ='';
                $result['marriedYears'] ='';
                $result['menstrualcycletype1'] ='';
                $result['cycledayspm'] ='';
                $result['cycleplusminusdays'] ='';
                $result['menstrualflow'] ='';
                $result['menstrualpain'] = '';
                $result['lumpsize'] = '';
                $result['lumpconsistancy'] = '';
                $result['lumpmobility'] = '';
                $result['prevaginalposition'] = '';
                $result['perspeculamexam'] = '';
                $result['speculamgrowthseen'] = '';
                $result['pervaginalexam'] = '';
                $result['chiefComplaintdetail'] = [];
                 $result['plannedsurgeryname'] = [];
                 $result['prescriptionMedicineList'] = [];
                 $result['prescriptionInvestigationpanel'] = [];
                 $result['prescriptionInvestigationList'] = [];
                 $result['reviewdays'] = '';
                 $result['reviewweeks'] = '';

                $result['gynccologymasterdetail']=$this->commondatamodel->getSingleRowByWhereCls('gynccology_master',$where_caseID);

                 if(!empty($result['gynccologymasterdetail'])){

                $result['marriedStatus'] = $result['gynccologymasterdetail']->others_married_status;
                $result['marriedYears'] = $result['gynccologymasterdetail']->married_years;
                $result['mestruallmp_date'] = $result['gynccologymasterdetail']->menstrual_lmp_date;
                $result['menstrualcycletype1'] = $result['gynccologymasterdetail']->menstrual_cycle_type1;
                $result['cycledayspm'] = $result['gynccologymasterdetail']->cycle_days_pm;
                $result['cycleplusminusdays'] = $result['gynccologymasterdetail']->cycle_plusminusdays;
                $result['menstrualflow'] = $result['gynccologymasterdetail']->menstrual_flow;
                $result['menstrualpain'] = $result['gynccologymasterdetail']->menstrual_pain;
                $result['menstrualpredate1'] = $result['gynccologymasterdetail']->menstrual_cycle_pre_date1;
                $result['menstrualpredate2'] = $result['gynccologymasterdetail']->menstrual_cycle_pre_date2;
                $result['menstrualpredate3'] = $result['gynccologymasterdetail']->menstrual_cycle_pre_date3;
                $result['menstrualpredate4'] = $result['gynccologymasterdetail']->menstrual_cycle_pre_date4;
                $result['obstermdelivery'] = $result['gynccologymasterdetail']->obstetric_term_delivery;
                $result['obspreterm'] = $result['gynccologymasterdetail']->obstetric_preterm;
                $result['obsaboration'] = $result['gynccologymasterdetail']->obstetric_aboration;
                $result['obslivingissue'] = $result['gynccologymasterdetail']->obstetric_living_issue;
                $result['obsno_of_lucs'] = $result['gynccologymasterdetail']->obstetric_no_of_lucs;
                $result['obsno_of_suction'] = $result['gynccologymasterdetail']->obstetric_no_of_suction;
                $result['plannedsurgeryid'] = explode(',',$result['gynccologymasterdetail']->planned_surgery_id);
                $result['plannedsurgerydate'] = explode(',',$result['gynccologymasterdetail']->planned_surgery_date);
                $result['tt_taken_on'] = $result['gynccologymasterdetail']->tt_taken_on;
                $result['tt_tobe_taken_on'] = $result['gynccologymasterdetail']->tt_tobe_taken_on;
                $result['hpv_taken_on'] = $result['gynccologymasterdetail']->hpv_taken_on;
                $result['hpv_tobe_taken_on'] = $result['gynccologymasterdetail']->hpv_tobe_taken_on;
                $result['mmr_taken_on'] = $result['gynccologymasterdetail']->mmr_taken_on;
                $result['mmr_tobe_taken_on'] = $result['gynccologymasterdetail']->mmr_tobe_taken_on;
                $result['chickenpox_taken_on'] = $result['gynccologymasterdetail']->chickenpox_taken_on;
                $result['chickenpox_tobe_taken_on'] = $result['gynccologymasterdetail']->chickenpox_tobe_taken_on;

                

               }
               
                $result['chiefComplaintdetail']=$this->gynccologymodel->getAllChiefComplaintId($caseID);
               $result['regularmedicinesdetails']=$this->patientcasemodel->getRegularMedecineDetails($caseID);
               if(!empty( $result['plannedsurgeryid'])){
               $result['plannedsurgeryname'] = $this->gynccologymodel->getPreviousSurgeryWhereIn($result['plannedsurgeryid']);
                 }
               $result['GeneralExamination'] = $this->commondatamodel->getAllRecordWhere('gynaecology_genral_examination',$where_caseID);

               $result['Examinationmasterdata'] = $this->commondatamodel->getSingleRowByWhereCls('gynaecology_examination_master',$where_caseID);

               if(!empty($result['Examinationmasterdata'])){
                
                $result['lumpsize'] = $result['Examinationmasterdata']->lump_size; 
                $result['lumpconsistancy'] = $result['Examinationmasterdata']->lump_consistancy; 
                $result['lumpmobility'] = $result['Examinationmasterdata']->lump_mobility; 
                $result['pervaginalexam'] = $result['Examinationmasterdata']->pervaginal_exam; 
                $result['prevaginalposition'] = $result['Examinationmasterdata']->prevaginal_position; 
                $result['perspeculamexam'] = $result['Examinationmasterdata']->per_speculam_exam; 
                $result['speculamgrowthseen'] = $result['Examinationmasterdata']->speculam_growth_seen; 

               }


                //investigation Latest Data
              $result['inveltdata']=$this->commondatamodel->getSingleRowByWhereCls('gynaaecology_investigation',$where_caseID);

               $result['prescriptionLatestData']=$this->patientcasemodel->getPrescriptionLatestByCase($caseID);

                if (!empty($result['prescriptionLatestData'])) {

                  $prescriptionID = $result['prescriptionLatestData']->prescription_id;

                  $result['reviewdays'] = $result['prescriptionLatestData']->review_after_days;
                  $result['reviewweeks'] = $result['prescriptionLatestData']->review_after_weeks;

                  $result['prescriptionMedicineList']=$this->patientcasemodel->getMedicineDetailsByPrescriptionId($prescriptionID);

                  $result['prescriptionInvestigationpanel'] = $this->patientcasemodel->getInvestigationpanelDetailsByPrescriptionId($prescriptionID);

                   $result['prescriptionInvestigationList']=$this->patientcasemodel->getInvestigationDetailsByPrescriptionId($prescriptionID);
                }
           
                //pre($result['prescriptionMedicineList']);exit;


                

                $result['patientmasterData'] = $this->patientcasemodel->getPatientBasicInfo($result['patientCaseData']->patient_id); 

              




                $page = 'dashboard/admin_dashboard/case/gynccology/gynaecology_print_prescription';
              //  $page = 'dashboard/admin_dashboard/case/testtable';
               $html = $this->load->view($page, $result, true);
               //exit;
                
            }

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

}
