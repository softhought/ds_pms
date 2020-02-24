<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Preoperation extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('commondatamodel','commondatamodel',TRUE);
        $this->load->model('Patientcasemodel','patientcasemodel',TRUE);
        $this->load->model('Medicinecmodel','medicinecmodel',TRUE);
        $this->load->model('Preoperationmodel','preoperationmodel',TRUE);
        
    }

public function preopration_action(){

       $session = $this->session->userdata('user_data');
       if($this->session->userdata('user_data'))
        {

            $json_response = array();
            $formData = $this->input->post('formDatas');
            parse_str($formData, $dataArry);

                       
            $caseID = trim(htmlspecialchars($dataArry['caseID']));
            $preoprationId = trim(htmlspecialchars($dataArry['preoprationId']));
            $preopnotes = trim(htmlspecialchars($dataArry['preopnotes']));
            $preposedop = trim(htmlspecialchars($dataArry['preposedop']));
            $enoxapapinValue = trim(htmlspecialchars($dataArry['enoxapapinValue']));
            $enoxapapinselect = trim(htmlspecialchars($dataArry['enoxapapinselect']));
           
            if($dataArry['enoxapapin_date'] != ''){
            
              $enoxapapin_date = date('Y-m-d',strtotime($dataArry['enoxapapin_date']));
            }else{

               $enoxapapin_date = NULL;   
            }

            $enoxapapintime = trim(htmlspecialchars($dataArry['enoxapapintime']));

            $ecosprinValue = trim(htmlspecialchars($dataArry['ecosprinValue']));

            if($dataArry['ecosprin_date'] != ''){
            
              $ecosprin_date = date('Y-m-d',strtotime($dataArry['ecosprin_date']));
            }else{

               $ecosprin_date = NULL;   
            }
           
            $ecosprintime = trim(htmlspecialchars($dataArry['ecosprintime']));
            
            $preopOthers = trim(htmlspecialchars($dataArry['preopOthers']));

            if($dataArry['preposed_operation_date'] != ''){
            
              $preposed_operation_date = date('Y-m-d',strtotime($dataArry['preposed_operation_date']));
            }else{

               $preposed_operation_date = NULL;   
            }

           
            $preposed_operation_time = trim(htmlspecialchars($dataArry['preposed_operation_time']));

             if($dataArry['admit_date'] != ''){
            
              $admit_date = date('Y-m-d',strtotime($dataArry['admit_date']));
            }else{

               $admit_date = NULL;   
            }

            
            $admit_time = trim(htmlspecialchars($dataArry['admit_time']));

            if($dataArry['nilorally_date'] != ''){
            
              $nilorally_date = date('Y-m-d',strtotime($dataArry['nilorally_date']));
            }else{

               $nilorally_date = NULL;   
            }
           
            $nilorally_time = trim(htmlspecialchars($dataArry['nilorally_time']));
            $medicine_cat_id = trim(htmlspecialchars($dataArry['medicine_cat_id']));
           
            $patient_specialinstruct = trim(htmlspecialchars($dataArry['patient_specialinstruct']));
            $fluidstart_time = trim(htmlspecialchars($dataArry['fluidstart_time']));
            $fluidstart_with = trim(htmlspecialchars($dataArry['fluidstart_with']));
            $fluid_hour = trim(htmlspecialchars($dataArry['fluid_hour']));
            $give_inj = trim(htmlspecialchars($dataArry['give_inj']));
            $inj_time = trim(htmlspecialchars($dataArry['inj_time']));
            $zofer_inj_time = trim(htmlspecialchars($dataArry['zofer_inj_time']));
            $injbeforeshift = trim(htmlspecialchars($dataArry['injbeforeshift']));
            $other_injbeforeshift = trim(htmlspecialchars($dataArry['other_injbeforeshift']));
            $hospita_specialinstruct = trim(htmlspecialchars($dataArry['hospita_specialinstruct']));
            $disterm_pregnancy_wks = trim(htmlspecialchars($dataArry['disterm_pregnancy_wks']));
            $disterm_pregnancy_days = trim(htmlspecialchars($dataArry['disterm_pregnancy_days']));
           
            $module = 'preop';
            $method = 'Preoperation/preopration_action';
            
              $preop_array = array(
                                    'case_master_id'=>$caseID,
                                    'preoperation_notes'=>$preopnotes,
                                    'preposed_operation'=>$preposedop,
                                    'enoxaparin'=>$enoxapapinValue,
                                    'enoxaparin_select'=>$enoxapapinselect,
                                    'enoxaparin_date'=>$enoxapapin_date,
                                    'enenoxaparin_time'=>$enoxapapintime,
                                    'ecosprin'=>$ecosprinValue,
                                    'ecosprin_date'=>$ecosprin_date,
                                    'ecosprin_time'=>$ecosprintime,
                                    'preopOthers'=>$preopOthers,
                                    'preposed_operation_date'=>$preposed_operation_date,
                                    'preposed_operation_time'=>$preposed_operation_time,
                                    'admit_date'=>$admit_date,                                    
                                    'admit_time'=>$admit_time,
                                    'nilorally_date'=>$nilorally_date,                                    
                                    'nilorally_time'=>$nilorally_time,
                                    'medicine_cat_id'=>$medicine_cat_id,
                                    'patient_specialinstruct'=>$patient_specialinstruct,
                                    'hospital_fluidstart_time'=>$fluidstart_time,
                                    'fluidstart_with'=>$fluidstart_with,
                                    'fluid_hour'=>$fluid_hour,
                                    'give_inj'=>$give_inj,
                                    'inj_time'=>$inj_time,
                                    'zofer_inj_time'=>$zofer_inj_time,
                                    'injbeforeshift'=>$injbeforeshift,
                                    'other_injbeforeshift'=>$other_injbeforeshift,
                                    'hospita_specialinstruct'=>$hospita_specialinstruct,
                                    'disterm_pregnancy_wks'=>$disterm_pregnancy_wks,
                                    'disterm_pregnancy_days'=>$disterm_pregnancy_days
                                  
                                  );

    if($preoprationId == 0){

    $insertuppreop = $this->commondatamodel->insertSingleTableData('preopration_record_master',$preop_array);

      $insertId = $insertuppreop; 

      $action = 'insert';
      $activitytable = 'preopration_record_master';

      $this->activity_log($module,$insertId,$action,$method,$activitytable);

     }else{

        $upd_where = array('pre_op_id'=>$preoprationId);

        $insertuppreop = $this->commondatamodel->updateSingleTableData('preopration_record_master',$preop_array,$upd_where);

        $insertId = $preoprationId; 
        $action = 'update';
        $activitytable = 'preopration_record_master';
        $this->activity_log($module,$insertId,$action,$method,$activitytable);


     }

   //patient medicine to take on day of operation
   $where_caseId = array('case_master_id'=>$caseID,'created_on'=>date('Y-m-d'));   
   $deletemedicine=$this->commondatamodel->deleteTableData('preop_patient_medicine_dtl',$where_caseId);

   if(isset($dataArry['preopmedicine'])){

   
   /* delete master data*/
   
  
   
    $preopmedicine = $dataArry['preopmedicine'];
    $preopOthermedicine = $dataArry['preopOthermedicine'];
    $preopmedicine_time = $dataArry['preopmedicine_time'];
    $preoperationdate = $dataArry['preoperationdate'];

    for ($i=0; $i < count($preopmedicine) ; $i++) { 

          $data = array( 'case_master_id'=>$caseID,
                         'preop_record_id'=>$insertId,
                         'medicine_id'=>$preopmedicine[$i],
                         'other_medicine'=>$preopOthermedicine[$i],
                         'medicine_time'=>$preopmedicine_time[$i],
                         'preoperation_date'=>date('Y-m-d',strtotime($preoperationdate[$i])),
                         'created_on'=>date('Y-m-d')
                        );

         
            $insert = $this->commondatamodel->insertSingleTableData('preop_patient_medicine_dtl',$data);

        
        }

    
    }



      
    



        if($insertuppreop){

             $json_response = array(
                        "msg_status" =>1,
                        "msg_data" => "Save Successfully",
                        "insertId"=>$insertId
                    );
        } else{

            $json_response = array(
                        "msg_status" =>1,
                        "msg_data" => "There is some problem,try again",
                        "insertId"=>0
                    );

        }               
           
           
           
            header('Content-Type: application/json');
            echo json_encode( $json_response );
            exit;



        }
        else {
            redirect('login', 'refresh');
        }


  }
  

  public function getmedicineBycat(){

   $session = $this->session->userdata('user_data');
       if($this->session->userdata('user_data'))
        {

             $catId = $this->input->post('catId');
             $caseID = $this->input->post('caseID');
             // $where_med = array('category_id'=>$catId);
             // $orderbyCat='medicine_master.medicine_name';
             $medicebycat = $this->preoperationmodel->getmedicineflowprescription($caseID,$catId);
             //pre($medicebycat);exit;

             ?>             
         
                          <select name="medicine" id="medicine" class="form-control show-tick enoxa" data-live-search="true" tabindex="-98">
                            <option value="" id="defaultsel"> &nbsp;</option>
                              <?php

                                 foreach ($medicebycat as $value) {  ?>
                                   <option value="<?php echo $value->medicine_id;?>"
                                  
                                        
                                        ><?php echo $value->medicine_name; ?></option>
                                 <?php     } ?>
                                   
                               </select> 
                  
       <?php  }
        else {
            redirect('login', 'refresh');
        }

  }


   public function addOperationMedicineDetails()
    {
        if($this->session->userdata('user_data'))
        {
            $session = $this->session->userdata('user_data');
        

            $row_no = $this->input->post('rowNo');

            $medcatvalue = $this->input->post('medcatvalue');
            $other_medicine = $this->input->post('other_medicine');
            $medicineID = $this->input->post('medicine');
            $medicine_time = $this->input->post('medicine_time');
            $operationdate = $this->input->post('operationdate');

            if($medcatvalue == 'Others'){

                $data['medicine'] = $other_medicine;
                

            }else{

             

             $where_medicine= array('medicine_id' => $medicineID );
             $medicineData = $this->commondatamodel->getSingleRowByWhereCls('medicine_master',$where_medicine);
             $data['medicine'] = $medicineData->medicine_name;
           

            }

            $data['checkother'] = $medcatvalue;            
            $data['rowno'] = $row_no;
            $data['medicine_time'] = $medicine_time;
            $data['operationdate'] = $operationdate;
            $data['medicineID'] = $medicineID;
            
            
           
                       
            $page = 'dashboard/admin_dashboard/case/preoperation/preop_patient_medicine_partial_vie';
            $viewTemp = $this->load->view($page,$data,TRUE);
            echo $viewTemp;
        }
        else
        {
            redirect('login','refresh');
        }
    }


    public function print_preop(){

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
          $result['occupation'] = '';  
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
                $result['from'] = $this->uri->segment(4);

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

                

                 if($result['antenantalCaseData']->wife_occupation != 0){

                    $where_id = array('occupation_id'=>$result['antenantalCaseData']->wife_occupation);

                    $result['occupation'] = $this->commondatamodel->getSingleRowByWhereCls('occupation_master',$where_id)->occupation;

                 }
                
                

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

                    if($this->uri->rsegment(5) == NULL)
                    {
                     $prescriptionID=$result['prescriptionLatestData']->prescription_id;
                    }else{
                       $prescriptionID= $this->uri->segment(5);
                       $result['prescriptionLatestData']=$this->patientcasemodel->getPrescriptionDetailsById($prescriptionID);
                    }
                     

                      $result['prescriptionMedicineList']=$this->patientcasemodel->getMedicineDetailsByPrescriptionId($prescriptionID);

                      //pre($result['prescriptionMedicineList']);exit; 

                      $result['prescriptionInvestigationList']=$this->patientcasemodel->getInvestigationDetailsByPrescriptionId($prescriptionID);
                     // created by anil 24-09-2019
                      $result['prescriptionInvestigationpanel'] = $this->patientcasemodel->getInvestigationpanelDetailsByPrescriptionId($prescriptionID);

                       //print_r($result['prescriptionInvestigationpanel']);exit;
                       $where_prescription_id = array('prescription_id' => $prescriptionID);

                       $result['diagnosisList']=$this->patientcasemodel->getDiagnosisDetails($caseID);

                       //pre($result['diagnosisList']);exit;

                      $prescriptionData = $this->commondatamodel->getSingleRowByWhereCls('prescription_master',$where_prescription_id);                
 
                }else{
                    $result['prescriptionMedicineList']=[];
                    $result['prescriptionInvestigationList']=[];
                                        
                   }
               }

                $preop_caseId = array('case_master_id'=>$caseID);
               $result['preoperationdata'] = $this->commondatamodel->getSingleRowByWhereCls('preopration_record_master',$preop_caseId);
               $result['preopmedicinedtldata'] = $this->preoperationmodel->getdayofopmedicine($caseID);
               //pre($result['preopmedicinedtldata']);exit; 
              
         

             //pre($result['from']);exit;

               $page = 'dashboard/admin_dashboard/case/preoperation/print_preop';
               
               $html = $this->load->view($page, $result, true);


            }   

                $this->load->library('Pdf');
                $pdf = $this->pdf->load();
                ini_set('memory_limit', '256M'); 
       
                $pdf->SetHeader('Document Title');
                // render the view into HTML
                $pdf->WriteHTML($html); 
                $output = 'Preop' . date('Y_m_d_H_i_s') . '_.pdf'; 
                $pdf->Output("$output", 'I');
                exit();


        }
         else {
            redirect('login', 'refresh');
        }

    }


 public function pre_print_preop(){


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
          $result['occupation'] = ''; 
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
                $result['from'] = $this->uri->segment(4);

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

                 $result['occupation'] = '';  

                 if($result['antenantalCaseData']->wife_occupation != 0){

                    $where_id = array('occupation_id'=>$result['antenantalCaseData']->wife_occupation);

                    $result['occupation'] = $this->commondatamodel->getSingleRowByWhereCls('occupation_master',$where_id)->occupation;

                 }
                
                

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

                    if($this->uri->rsegment(5) == NULL)
                    {
                     $prescriptionID=$result['prescriptionLatestData']->prescription_id;
                    }else{
                       $prescriptionID= $this->uri->segment(5);
                       $result['prescriptionLatestData']=$this->patientcasemodel->getPrescriptionDetailsById($prescriptionID);
                    }
                     

                      $result['prescriptionMedicineList']=$this->patientcasemodel->getMedicineDetailsByPrescriptionId($prescriptionID);

                      //pre($result['prescriptionMedicineList']);exit; 

                      $result['prescriptionInvestigationList']=$this->patientcasemodel->getInvestigationDetailsByPrescriptionId($prescriptionID);
                     // created by anil 24-09-2019
                      $result['prescriptionInvestigationpanel'] = $this->patientcasemodel->getInvestigationpanelDetailsByPrescriptionId($prescriptionID);

                       //print_r($result['prescriptionInvestigationpanel']);exit;
                       $where_prescription_id = array('prescription_id' => $prescriptionID);

                       $result['diagnosisList']=$this->patientcasemodel->getDiagnosisDetails($caseID);

                       //pre($result['diagnosisList']);exit;

                      $prescriptionData = $this->commondatamodel->getSingleRowByWhereCls('prescription_master',$where_prescription_id);                
 
                }else{
                    $result['prescriptionMedicineList']=[];
                    $result['prescriptionInvestigationList']=[];
                                        
                   }
               }

                $preop_caseId = array('case_master_id'=>$caseID);
               $result['preoperationdata'] = $this->commondatamodel->getSingleRowByWhereCls('preopration_record_master',$preop_caseId);
               $result['preopmedicinedtldata'] = $this->preoperationmodel->getdayofopmedicine($caseID);
               //pre($result['preopmedicinedtldata']);exit; 
              
         

             //pre($result['from']);exit;

               $page = 'dashboard/admin_dashboard/case/preoperation/pre_print_preop';
               
               $html = $this->load->view($page, $result, true);


            }   

                $this->load->library('Pdf');
                $pdf = $this->pdf->load();
                ini_set('memory_limit', '256M'); 
       
                $pdf->SetHeader('Document Title');
                // render the view into HTML
                $pdf->WriteHTML($html); 
                $output = 'Preop' . date('Y_m_d_H_i_s') . '_.pdf'; 
                $pdf->Output("$output", 'I');
                exit();


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


 function dateDMY($dt){

   if($dt!=""){
      $dt = ' on '.date("d-m-Y",strtotime($dt));
        }
      else{
           $dt = NULL;
                
       }

       return $dt;

}



}