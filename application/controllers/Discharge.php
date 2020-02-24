<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Discharge extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('commondatamodel','commondatamodel',TRUE);
        $this->load->model('Patientcasemodel','patientcasemodel',TRUE);
        $this->load->model('Medicinecmodel','medicinecmodel',TRUE);
        $this->load->model('Preoperationmodel','preoperationmodel',TRUE);
        
    }

public function discharge_action(){

	 $session = $this->session->userdata('user_data');
       if($this->session->userdata('user_data'))
        {

            $json_response = array();
            $formData = $this->input->post('formDatas');
            parse_str($formData, $dataArry);

           //pre($dataArry);exit;
                       
            $caseID = trim(htmlspecialchars($dataArry['caseID']));
            $dischargeId = trim(htmlspecialchars($dataArry['dischargeId']));
            
             if($dataArry['discharge_date'] != ''){
            
              $discharge_date = date('Y-m-d',strtotime($dataArry['discharge_date']));
            }else{

               $discharge_date = NULL;   
            }
            
            $dislucs_done = trim(htmlspecialchars($dataArry['dislucs_done']));
            $dis_ot_note = trim(htmlspecialchars($dataArry['dis_ot_note']));
            $anaesthesiologist = trim(htmlspecialchars($dataArry['anaesthesiologist']));
            $paediatrician = trim(htmlspecialchars($dataArry['paediatrician']));
            $birth_time = trim(htmlspecialchars($dataArry['birth_time']));
            $dishbaby_gender = trim(htmlspecialchars($dataArry['dishbaby_gender']));
            $dish_birth_weight = trim(htmlspecialchars($dataArry['dish_birth_weight']));
        
            $module = 'discharge';
            $method = 'Discharge/discharge_action';

            $dis_array = array('case_master_id'=>$caseID,
                               'discharge_date'=>$discharge_date,
                               'dislucs_done'=>$dislucs_done,
                               'dis_ot_note'=>$dis_ot_note,
                               'anaesthesiologist'=>$anaesthesiologist,
                               'paediatrician'=>$paediatrician,
                               'birth_time'=>$birth_time,
                               'dishbaby_gender'=>$dishbaby_gender,
                               'dish_birth_weight'=>$dish_birth_weight
                                );
             //pre($dis_array);exit;

            if($dischargeId == 0){

            	
               $insertdis = $this->commondatamodel->insertSingleTableData('discharge_record_master',$dis_array);

              $insertId = $insertdis;

              $action = 'insert';
              $activitytable ='discharge_record_master';

             $this->activity_log($module,$insertId,$action,$method,$activitytable);
            }else{

            	$upd_where = array('id'=>$dischargeId);

                $insertdis = $this->commondatamodel->updateSingleTableData('discharge_record_master',$dis_array,$upd_where);

                $insertId = $dischargeId; 
                 $action = 'update';
                  $activitytable ='discharge_record_master';
                 $this->activity_log($module,$insertId,$action,$method,$activitytable);
            }

               if( $insertdis){

               	 $json_response = array(
                        "msg_status" =>1,
                        "msg_data" => "Save Successfully",
                        "insertId"=>$insertId
                    );
               }else{

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


public function print_discharge(){

    $session = $this->session->userdata('user_data');
       if($this->session->userdata('user_data'))
        {

        	$result['dischargeEditdata'] = [];

          $where_dr = array('doctor_master.doctor_id' =>$session['doctor_id']);
          $result['drRegNo']=$this->commondatamodel->getSingleRowByWhereCls('doctor_master',$where_dr)->dr_reg_no;

             if($this->uri->rsegment(3) == NULL)
            {
                 $caseID = 0;
                 $html="";
            
            }
            else
            {

            	 $parity_term_delivery=0;
                 $parity_preterm=0;
                 $parity_abortion=0;
                 $parity_issue=0;

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

                  $result['antenantalCaseData'] = $this->commondatamodel->getSingleRowByWhereCls('antenantal_master',$where_antenatel_master);

                  if(!empty($result['antenantalCaseData'])){

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
               }
                  $result['total_parity'] =($parity_term_delivery+$parity_preterm+$parity_abortion+1);

                 $result['total_cesarean'] = $this->patientcasemodel->getTotalCesareanByCase($caseID);

                  $result['slfbldgrp']=$this->patientcasemodel->getBloodGroupById($result['antenantalCaseData']->wife_bloodgroup);


                   //pre($result['antenantalCaseData']);exit;

                  $where_casemasid = array('case_master_id'=>$caseID);

                  $result['preoperationEditdata'] = $this->commondatamodel->getSingleRowByWhereCls('preopration_record_master',$where_casemasid);

                  
                   $result['dischargeEditdata'] = $this->commondatamodel->getSingleRowByWhereCls('discharge_record_master',$where_casemasid);
                    $result['anaesthesiologist'] = '';
                    $result['paediatrician'] = '';

                   if(!empty($result['dischargeEditdata'])){

                   	if($result['dischargeEditdata']->anaesthesiologist != ''){
                      
                      $anethID = array('id'=>$result['dischargeEditdata']->anaesthesiologist);
                      $result['anaesthesiologist'] = $this->commondatamodel->getSingleRowByWhereCls('anaesthesiologist_master',$anethID)->name;

                   	}

                   	 	if($result['dischargeEditdata']->paediatrician != ''){

                   	    $paedID = array('id'=>$result['dischargeEditdata']->paediatrician);
                   	     $result['paediatrician'] = $this->commondatamodel->getSingleRowByWhereCls('paediatrician_master',$anethID)->name;

                   	 	}
                                      
                   

                   }
                    $result['babygender']  = '';
                   if(!empty($result['dischargeEditdata']) && $result['dischargeEditdata']->dishbaby_gender != ''){

                   $where_genid = array('id'=>$result['dischargeEditdata']->dishbaby_gender);

                   $result['babygender'] = $this->commondatamodel->getSingleRowByWhereCls('gender_master',$where_genid)->gender;
                  }
                  //pre($result['babygender']);exit;



         
               $page = 'dashboard/admin_dashboard/case/discharge/print_discharge';
               
               $html = $this->load->view($page, $result, true);

             }

                $this->load->library('Pdf');
                $pdf = $this->pdf->load();
                ini_set('memory_limit', '256M'); 
       
                $pdf->SetHeader('Document Title');
                // render the view into HTML
                $pdf->WriteHTML($html); 
                $output = 'Discharge' . date('Y_m_d_H_i_s') . '_.pdf'; 
                $pdf->Output("$output", 'I');
                exit();    


        	}
        else {
            redirect('login', 'refresh');
        } 


}


public function pre_print_discharge(){


	$session = $this->session->userdata('user_data');
       if($this->session->userdata('user_data'))
        {
          $where_dr = array('doctor_master.doctor_id' =>$session['doctor_id']);
          $result['drRegNo']=$this->commondatamodel->getSingleRowByWhereCls('doctor_master',$where_dr)->dr_reg_no;

             if($this->uri->rsegment(3) == NULL)
            {
                 $caseID = 0;
                 $html="";
            
            }
            else
            {

            	 $parity_term_delivery=0;
                 $parity_preterm=0;
                 $parity_abortion=0;
                 $parity_issue=0;

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

                  $result['antenantalCaseData'] = $this->commondatamodel->getSingleRowByWhereCls('antenantal_master',$where_antenatel_master);

                  if(!empty($result['antenantalCaseData'])){

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

              }

                  $result['total_parity'] =($parity_term_delivery+$parity_preterm+$parity_abortion+1);

                 $result['total_cesarean'] = $this->patientcasemodel->getTotalCesareanByCase($caseID);

                  $result['slfbldgrp']=$this->patientcasemodel->getBloodGroupById($result['antenantalCaseData']->wife_bloodgroup);


                   //pre($result['antenantalCaseData']);exit;

                  $where_casemasid = array('case_master_id'=>$caseID);

                  $result['preoperationEditdata'] = $this->commondatamodel->getSingleRowByWhereCls('preopration_record_master',$where_casemasid);

                  
                   $result['dischargeEditdata'] = $this->commondatamodel->getSingleRowByWhereCls('discharge_record_master',$where_casemasid);

                  $result['anaesthesiologist'] = '';
                    $result['paediatrician'] = '';

                   if(!empty($result['dischargeEditdata'])){

                   	if($result['dischargeEditdata']->anaesthesiologist != ''){
                      
                      $anethID = array('id'=>$result['dischargeEditdata']->anaesthesiologist);
                      $result['anaesthesiologist'] = $this->commondatamodel->getSingleRowByWhereCls('anaesthesiologist_master',$anethID)->name;

                   	}

                   	 	if($result['dischargeEditdata']->paediatrician != ''){

                   	    $paedID = array('id'=>$result['dischargeEditdata']->paediatrician);
                   	     $result['paediatrician'] = $this->commondatamodel->getSingleRowByWhereCls('paediatrician_master',$anethID)->name;

                   	 	}

                   }	 	


                    $result['babygender']  = '';
                   if(!empty($result['dischargeEditdata']) && $result['dischargeEditdata']->dishbaby_gender != ''){

                   $where_genid = array('id'=>$result['dischargeEditdata']->dishbaby_gender);

                   $result['babygender'] = $this->commondatamodel->getSingleRowByWhereCls('gender_master',$where_genid)->gender;
                   }
                  //pre($result['babygender']);exit;



         
               $page = 'dashboard/admin_dashboard/case/discharge/pre_print_discharge';
               
               $html = $this->load->view($page, $result, true);

             }

                $this->load->library('Pdf');
                $pdf = $this->pdf->load();
                ini_set('memory_limit', '256M'); 
       
                $pdf->SetHeader('Document Title');
                // render the view into HTML
                $pdf->WriteHTML($html); 
                $output = 'Discharge' . date('Y_m_d_H_i_s') . '_.pdf'; 
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



}    