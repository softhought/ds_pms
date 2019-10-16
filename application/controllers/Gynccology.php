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
                $result['dischargeAssociteDrp'] = array('Itching','Bad Smell','Profuse Flow','Fever Yes','Fever No','Pain Abdomen Yes','Pain Abdomen No');
                $result['dischargePreviousEpisodeDrp'] = array('Once','Twice','Few Times','Recurrent');

                $result['unwantedPregnancyTermination'] = array('Contraception','Medical Problem','Others');
                $result['unwantedPregnancyTerminationBY'] = array('Medical Method','Surgical Method');
                $result['AllsurgicalMethod'] = array('With IUCD','With Ligation','Without IUCD','Without Ligation');
                $result['stichlineOprationName'] = array('LUCS','TLH','TAH','BSO','PTO');
                $result['stichlineProblemCommDrp'] = array('Right','Left','Both');
                $result['postMenopausalAllEpisode'] = array('First Episode','Second Episode','Recurrent');
                $result['postMenopausalbleeding'] = array('Spotting','Scanty Bleeding','Profuse Bleeding');
                $result['urinaryinDrpDown'] = array('Stress','Huge','Mixed');
                $result['genderdrpdown'] = array('Male','Female');
                $result['familyplanningtemporary'] = array('OCP','ICUD CUT','ICUD Mirena','DMPA','Sevista');




                $result['surgeryList']=$this->commondatamodel->getAllDropdownData('surgery_master');
                //$result['surgeryList']=$this->patientcasemodel->getSurgeryDetails($caseID);
                $result['diseasesList']=$this->commondatamodel->getAllDropdownData('diseases_master');
                
                /* start regular medicine */

              $result['medicineList']=$this->commondatamodel->getAllDropdownData('medicine_master');
              $result['dosageList'] = array('0.5','1','1.5','2','2.5','5','7.5','10');
              $result['frequencyList'] = array('OD','BD','TDS','HS');
              $result['regularMedicineList']=$this->patientcasemodel->getRegularMedecineDetails($caseID);

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

               //pre($result['chiefcomplaintsdetails']);exit;

             
               
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
                               'is_other_dieases'=>$isOtherDiseases

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


  if($gynccologyID == true || $updategyncoology == true)
                    {
                        $json_response = array(
                            "msg_status" => 1,
                            "msg_data" => "Status Updated",
                            "gynccologyID" =>$gynccologyID,
                            "AllchiefcomplaintId" =>$allLastinsertId,
                                                     
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
                       'wants_termination'=>trim($dataArry['wants_termination']),
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
                       'lap_ovarian_cystectomy'=>trim($dataArry['lap_ovarian_cystectomy']),
                       'lap_ovariectomy'=>trim($dataArry['lap_ovariectomy']),
                       'open_ovarian_cystectomy'=>trim($dataArry['open_ovarian_cystectomy']),
                       'open_ovariectomy'=>trim($dataArry['open_ovariectomy'])
                                                                     
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
                       'episode_months'=>trim($dataArry['episode_months']),
                       'episode_years'=>trim($dataArry['episode_years']),
                       'continous_months'=>trim($dataArry['continous_months']),
                       'continous_years'=>trim($dataArry['continous_years']),
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



}
