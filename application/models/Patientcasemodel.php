<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Patientcasemodel extends CI_Model{
/*
 public function getCaseDetailsById($case_master_id)
    {
     $data = [];
      $where = [
                "case_master.case_id" => $case_master_id
            ];
            $query = $this->db->select("*")
                    ->from('case_master')
                    ->where($where)
                    ->get();
                
                if($query->num_rows()> 0)
                {
                  
                        $data[] = $rows;
                  
                     
                }
                
                return $data;
    
    } */


    public function getPatientBasicInfo($patientid)
    {
        $data = array();
        $where = array('patient_master.patient_id' =>$patientid);
        $this->db->select("patient_master.*,
                          
                            gender_master.gender
                            ")
                ->from('patient_master')
                
                ->join('gender_master','gender_master.id=patient_master.patientgender','INNER')
                ->where($where)
                ->limit(1);
        $query = $this->db->get();
        
        #echo $this->db->last_query();
        
        if($query->num_rows()> 0)
        {
           $row = $query->row();
           return $data = $row;
             
        }
        else
        {
            return $data;
        }
    }

    public function getAllCaseDetails()
    {
     $data = [];

            $query = $this->db->select("*")
                    ->from('case_master')
                    ->join('patient_master','patient_master.patient_id=case_master.patient_id','INNER')
                    ->get();
                
                if($query->num_rows()> 0)
                {
                  
                 foreach ($query->result() as $rows)
                    {
                        $data[] = $rows;
                    }
                  
                     
                }
                
                return $data;
    
    }

    public function getAllCaseDetailsByClinic($clinic_id)
    {
     $data = [];
     $where = array('case_master.clinic_id' => $clinic_id );

            $query = $this->db->select("*")
                    ->from('case_master')
                    ->join('patient_master','patient_master.patient_id=case_master.patient_id','INNER')
                    ->where($where)
                    ->get();
                
                if($query->num_rows()> 0)
                {
                  
                 foreach ($query->result() as $rows)
                    {
                        $data[] = $rows;
                    }
                  
                     
                }
                
                return $data;
    
    }


 //add new parameters casetype in method by anil 27-08-2019

        public function getLatestSerialNumberClinic($type,$year,$clinic_id,$casetype){
        $lastnumber = (int)(0);
        $serialno="";
        $sql="SELECT *
            FROM serial_master
            WHERE serial_master.type='".$type."' 
            AND serial_master.year='".$year."'
            AND serial_master.clinic_id='".$clinic_id."'
             AND serial_master.case_type='".$casetype."'
            LOCK IN SHARE MODE";
        $query = $this->db->query($sql);
        #q();
        if ($query->num_rows() > 0) {
              $row = $query->row(); 
              $lastnumber = $row->next_serial_no;
              $serialID = $row->id;
        }
        $digit = (int)(log($lastnumber,10)+1) ; 
      
       
        if($digit==4){
            $serialno ="0".$lastnumber;
        }
        elseif($digit==3){
              $serialno = "00".$lastnumber;
        }
        elseif($digit==2){
            $serialno = "000".$lastnumber;
        }
        elseif($digit==1){
            $serialno = "0000".$lastnumber;
        }
       
        $lastnumber = $lastnumber + 1;
        
        //update
        $upddata = [
            'serial_master.next_serial_no' => $lastnumber,
        ];
        $where = [
            'serial_master.id' => $serialID
            ];
        $this->db->where($where); 
        $this->db->update('serial_master', $upddata);
        return $serialno;
    }


    public function getMenstrualLastMedecineDetails($case_master_id)
    {
     $data = [];
      $where = [
                "case_master_id" => $case_master_id
            ];
            $query = $this->db->select("
                                        menstrual_medecine_details.*,
                                        medicine_master.medicine_name
                                        ")
                    ->from('menstrual_medecine_details')
                    ->join('medicine_master','medicine_master.medicine_id = menstrual_medecine_details.medicine_mst_id','LEFT')
                    ->where($where)
                    ->get();
                
                if($query->num_rows()> 0)
                {
                  
                       
                    foreach ($query->result() as $rows)
                    {
                        $data[] = $rows;
                    }
                    return $data;
                  
                     
                }
                
                return $data;
    
    }


    
    public function getClinicalExaminationDetails($case_master_id)
    {
     $data = [];
      $where = [
                "case_master_id" => $case_master_id
            ];
            $query = $this->db->select("*")
                    ->from('clinical_examination_details')
                    ->where($where)
                    ->get();
                
                if($query->num_rows()> 0)
                {
                  
                       
                    foreach ($query->result() as $rows)
                    {
                        $data[] = $rows;
                    }
                    return $data;
                  
                     
                }
                
                return $data;
    
    }



  public function getPreviousChildBirthDetails($case_master_id)
    {
     $data = [];
      $where = [
                "case_master_id" => $case_master_id
            ];
            $query = $this->db->select("*")
                    ->from('previous_child_birth_history')
                    ->where($where)
                    ->get();
                
                if($query->num_rows()> 0)
                {
                  
                       
                    foreach ($query->result() as $rows)
                    {
                        $data[] = $rows;
                    }
                    return $data;
                  
                     
                }
                
                return $data;
    
    }


    public function getSurgeryDetails($case_master_id)
    {
     $data = [];
         
          /* comments at 24-09-2019 */

            /*$query = $this->db->select("*")
                    ->from('surgery_master')
                    ->join('surgery_details',"surgery_master.surgery_id=surgery_details.surgery_mst_id and surgery_details.case_master_id='".$case_master_id."'",'LEFT')
                    ->get();*/

         //created at 24-09-2019
             $where = array('surgery_master.is_active'=>'Y');      
           $query = $this->db->select("*")
                    ->from('surgery_master')
                    ->join('surgery_details',"surgery_master.surgery_id=surgery_details.surgery_mst_id and surgery_details.case_master_id='".$case_master_id."'",'LEFT')
                    ->where($where)
                    ->get();         
                //q();exit;
                if($query->num_rows()> 0)
                {
                  
                       
                    foreach ($query->result() as $rows)
                    {
                        $data[] = $rows;
                    }
                    return $data;
                  
                     
                }
                
                return $data;
    
    }


    public function getFamilyComponentDetails($case_master_id)
    {
     $data = [];
     
            $query = $this->db->select("*")
                    ->from('family_history_component')
                    ->join('family_history_details',"family_history_details.family_comp_mst_id=family_history_component.family_component_id and family_history_details.case_master_id='".$case_master_id."'",'LEFT')
                    ->get();
                #q();
                if($query->num_rows()> 0)
                {
                  
                       
                    foreach ($query->result() as $rows)
                    {
                        $data[] = $rows;
                    }
                    return $data;
                  
                     
                }
                
                return $data;
    
    }


    public function getRegularMedecineDetails($case_master_id)
    {
     $data = [];
      $where = [
                "case_master_id" => $case_master_id
            ];
            $query = $this->db->select("regular_medicines_details.*, medicine_master.medicine_name")
                    ->from('regular_medicines_details')
                    ->join('medicine_master','medicine_master.medicine_id = regular_medicines_details.medicine_mst_id','LEFT')
                    ->where($where)
                    ->get();
                
                if($query->num_rows()> 0)
                {
                  
                       
                    foreach ($query->result() as $rows)
                    {
                        $data[] = $rows;
                    }
                    return $data;
                  
                     
                }
                
                return $data;
    
    }



    public function getExaminationLatestByCase($case_master_id)
    {
        $data = array();
        $where = [
                "case_master_id" => $case_master_id
            ];
        $this->db->select("*")
                ->from('examination_master')
                ->where($where)
                ->order_by("examination_master.examination_id", "DESC")
                ->limit(1);
        $query = $this->db->get();
        
        #echo $this->db->last_query();
        
        if($query->num_rows()> 0)
        {
           $row = $query->row();
           return $data = $row;
             
        }
        else
        {
            return $data;
        }
    }


    /* get clinical examination data latest */
    public function getClinicalExaminationLatestByCase($case_master_id)
    {
        $data = array();
        $where = [
                "case_master_id" => $case_master_id
            ];
        $this->db->select("*")
                ->from('clinical_examination_details')
                ->where($where)
                ->order_by("clinical_examination_details.clinical_exm_dtl_id", "DESC")
                ->limit(1);
        $query = $this->db->get();
        
        #echo $this->db->last_query();
        
        if($query->num_rows()> 0)
        {
           $row = $query->row();
           return $data = $row;
             
        }
        else
        {
            return $data;
        }
    }




    public function getAllExaminationLatestByCase($case_master_id)
    {
     $data = [];
      $where = [
                "case_master_id" => $case_master_id
            ];
            $query = $this->db->select("*")
                    ->from('examination_master')
                    ->where($where)
                    ->order_by("examination_master.examination_id", "DESC")
                    ->get();
                
                if($query->num_rows()> 0)
                {
                  
                       
                    foreach ($query->result() as $rows)
                    {
                        $data[] = $rows;
                    }
                    return $data;
                  
                     
                }
                
                return $data;
    
    }



    public function getInvestigationLatestByCase($case_master_id)
    {
        $data = array();
        $where = [
                "case_master_id" => $case_master_id
            ];
        $this->db->select("*")
                ->from('investigation_record_master')
                ->where($where)
                ->order_by("investigation_record_master.inv_record_id", "DESC")
                ->limit(1);
        $query = $this->db->get();
        
        #echo $this->db->last_query();
        
        if($query->num_rows()> 0)
        {
           $row = $query->row();
           return $data = $row;
             
        }
        else
        {
            return $data;
        }
    }


    public function getAllInvestigationByCase($case_master_id)
    {
     $data = [];
      $where = [
                "case_master_id" => $case_master_id
            ];
            $query = $this->db->select("*")
                    ->from('investigation_record_master')
                    ->where($where)
                    ->order_by("investigation_record_master.inv_record_id", "DESC")
                    ->get();
                
                if($query->num_rows()> 0)
                {
                  
                       
                    foreach ($query->result() as $rows)
                    {
                        $data[] = $rows;
                    }
                    return $data;
                  
                     
                }
                
                return $data;
    
    }


    public function getInvestigationRecordDetailsById($inv_record_id)
    {
     $data = [];
      $where = [
                "investigation_record_master.inv_record_id" => $inv_record_id
            ];
            $query = $this->db->select("*")
                    ->from('investigation_record_master')
                    ->where($where)
                    ->get();
                
                if($query->num_rows()> 0)
                {
                  foreach($query->result() as $rows)
                    {
                        $data[] = $rows;
                    }
                     
                }
                
                return $data;
    
    }



    public function getPrescriptionLatestByCase($case_master_id)
    {
        $data = array();
        $where = [
                "case_master_id" => $case_master_id
            ];
        $this->db->select("*")
                ->from('prescription_master')
                ->where($where)
                ->order_by("prescription_master.prescription_id", "DESC")
                ->limit(1);
        $query = $this->db->get();
        
        #echo $this->db->last_query();
        
        if($query->num_rows()> 0)
        {
           $row = $query->row();
           return $data = $row;
             
        }
        else
        {
            return $data;
        }
    }


    public function getPrescriptionDetailsById($prescription_id)
    {
        $data = array();
        $where = [
                "prescription_id" => $prescription_id
            ];
        $this->db->select("*")
                ->from('prescription_master')
                ->where($where)
                ->limit(1);
        $query = $this->db->get();
        
        #echo $this->db->last_query();
        
        if($query->num_rows()> 0)
        {
           $row = $query->row();
           return $data = $row;
             
        }
        else
        {
            return $data;
        }
    }

    public function getMedicineDetailsByPrescriptionId($prescription_id)
    {
     $data = [];
      $where = [
                "prescription_medicine_dtl.prescription_mst_id" => $prescription_id
            ];
            $query = $this->db->select("prescription_medicine_dtl.*,medicine_master.medicine_name,medicine_category.category,medicine_category.med_cat_id,medicine_type.medicine_type,medicine_type.medicine_shortype")
                    ->from('prescription_medicine_dtl')
                    ->join('medicine_master','medicine_master.medicine_id = prescription_medicine_dtl.medicine_id','LEFT')
                    ->join('medicine_type','medicine_type.medicine_type_id = medicine_master.medicine_type','LEFT')
                    ->join('medicine_category','medicine_category.med_cat_id=medicine_master.category_id','LEFT')
                    ->where($where)
                    ->get();
                
                if($query->num_rows()> 0)
                {
                  foreach($query->result() as $rows)
                    {
                        $data[] = $rows;
                    }
                     
                }
                
                return $data;
    
    }


 public function getInvestigationDetailsByPrescriptionId($prescription_id)
    {
     $data = [];
      $where = [
                "prescription_investigation_dtl.prescription_mst_id" => $prescription_id
            ];
            $query = $this->db->select("prescription_investigation_dtl.*,investigation_component.inv_component_name")
                    ->from('prescription_investigation_dtl')
                    ->join('investigation_component','investigation_component.investigation_comp_id = prescription_investigation_dtl.investigation_comp_id','LEFT')
                    ->where($where)
                    ->get();
                
                if($query->num_rows()> 0)
                {
                  foreach($query->result() as $rows)
                    {
                        $data[] = $rows;
                    }
                     
                }
                
                return $data;
    
    }


 public function getAllPrescriptionByCase($case_master_id)
    {
     $data = [];
      $where = [
                "case_master_id" => $case_master_id
            ];
            $query = $this->db->select("*")
                    ->from('prescription_master')
                    ->where($where)
                    ->order_by("prescription_master.prescription_id", "DESC")
                    ->get();
                
                if($query->num_rows()> 0)
                {
                  
                       
                    foreach ($query->result() as $rows)
                    {
                        $data[] = $rows;
                    }
                    return $data;
                  
                     
                }
                
                return $data;
    
    }


    public function getTotalCesareanByCase($case_master_id)
    {

        $data = '';
        $where = array(
                        'previous_child_birth_history.case_master_id' =>$case_master_id,
                        'previous_child_birth_history.delevery_type' =>'CS'
                        );
        $this->db->select("count(*) as total_cs")
                ->from('previous_child_birth_history')
                ->where($where)
                ->limit(1);
        $query = $this->db->get();
        
        #echo $this->db->last_query();
        
        if($query->num_rows()> 0)
        {
           $row = $query->row();
           return $data = $row->total_cs;
             
        }
        else
        {
            return $data;
        }
    }


    public function getLastChildBirthByCase($case_master_id)
    {
        $delevery_type = array('CS', 'ND');
        $data = [];
        $where = array(
                        'previous_child_birth_history.case_master_id' =>$case_master_id

                        );
        $this->db->select("*")
                ->from('previous_child_birth_history')
                ->where($where)
               // ->where('previous_child_birth_history.babyage >','0')
                ->where_in('delevery_type', $delevery_type )
                ->order_by("previous_child_birth_history.child_dtl_id", "DESC")
                ->limit(1);
        $query = $this->db->get();
        
    #echo $this->db->last_query();
        
        if($query->num_rows()> 0)
        {
           $row = $query->row();
           return $data = $row;
             
        }
        else
        {
            return $data;
        }
    }


    public function getAllPreviousChildHistory($case_master_id)
    {
     $data = [];
      $where = [
                "case_master_id" => $case_master_id
            ];
            $query = $this->db->select("previous_child_birth_history.*,gender_master.*")
                    ->from('previous_child_birth_history')
                    ->join('gender_master','previous_child_birth_history.babygender = gender_master.id','INEER')
                    ->where($where)
                    ->order_by("previous_child_birth_history.year", "asc")
                    ->get();
                 #echo $this->db->last_query();
                if($query->num_rows()> 0)
                {
                  
                       
                    foreach ($query->result() as $rows)
                    {
                        $data[] = $rows;
                    }
                    return $data;
                  
                     
                }
                
                return $data;
    
    }

    public function getComplicationsByIds($ids)
    {
     $data = [];

            $query = $this->db->select("*")
                    ->from('complication_master')
                    ->where_in('complication_id', $ids )
                    ->get();
                #q();
                if($query->num_rows()> 0)
                {
                  
                       
                    foreach ($query->result() as $rows)
                    {
                        $data[] = $rows;
                    }
                    return $data;
                  
                     
                }
                
                return $data;
    
    }


    public function getMedicalProblemByIds($ids)
    {
     $data = [];

            $query = $this->db->select("*")
                    ->from('medical_problem')
                    ->where_in('medicle_problem_id', $ids )
                    ->get();
                #q();
                if($query->num_rows()> 0)
                {
                  
                       
                    foreach ($query->result() as $rows)
                    {
                        $data[] = $rows;
                    }
                    return $data;
                  
                     
                }
                
                return $data;
    
    }

 public function getDiseasesByIds($ids)
    {
     $data = [];

            $query = $this->db->select("*")
                    ->from('diseases_master')
                    ->where_in('diseases_id', $ids )
                    ->get();
                #q();
                if($query->num_rows()> 0)
                {
                  
                       
                    foreach ($query->result() as $rows)
                    {
                        $data[] = $rows;
                    }
                    return $data;
                  
                     
                }
                
                return $data;
    
    }



    public function getAllSurgicaRecordByCase($case_master_id)
    {
     $data = [];
      $where = [
                "case_master_id" => $case_master_id
            ];
            $query = $this->db->select("*")
                    ->from('surgery_details')
                    ->join('surgery_master','surgery_master.surgery_id=surgery_details.surgery_mst_id','INNER')
                    ->where($where)
                    ->where('yearback IS NOT NULL', null, false)
                    ->get();
                
                if($query->num_rows()> 0)
                {
                  
                       
                    foreach ($query->result() as $rows)
                    {
                        $data[] = $rows;
                    }
                    return $data;
                  
                     
                }
                
                return $data;
    
    }


    public function getHighRiskByIds($ids)
    {
     $data = [];

            $query = $this->db->select("*")
                    ->from('high_risk_master')
                    ->where_in('high_risk_id', $ids )
                    ->get();
                #q();
                if($query->num_rows()> 0)
                {
                  
                       
                    foreach ($query->result() as $rows)
                    {
                        $data[] = $rows;
                    }
                    return $data;
                  
                     
                }
                
                return $data;
    
    }


    public function getFirstExaminationDataByCase($case_master_id)
    {
        $data = array();
        $where = [
                "case_master_id" => $case_master_id
            ];
        $this->db->select("*")
                ->from('examination_master')
                ->where($where)
                ->order_by("examination_master.examination_id", "ASC")
                ->limit(1);
        $query = $this->db->get();
        
        #echo $this->db->last_query();
        
        if($query->num_rows()> 0)
        {
           $row = $query->row();
           return $data = $row;
             
        }
        else
        {
            return $data;
        }
    }


    public function getBloodGroupById($bloodgrpid)
    {
        $data = '';
        $where = array('blood_group.id' =>$bloodgrpid);
        $this->db->select("*")
                ->from('blood_group')
                ->where($where)
                ->limit(1);
        $query = $this->db->get();
        
        #echo $this->db->last_query();
        
        if($query->num_rows()> 0)
        {
           $row = $query->row();
           return $data = $row->bld_group_code;
             
        }
        else
        {
            return $data;
        }
    }


    public function getAdviceMasterData()
    {
     $data = [];

            $query = $this->db->select("*")
                    ->from('advice_master')
                    ->group_by("advice_type")
                    ->get();
                
                if($query->num_rows()> 0)
                {
                  
                 foreach ($query->result() as $rows)
                    {
                       // $data[] = $rows;
                        $data[]=[
                            "advType"=>$rows,
                            "adviceList"=>$this->getAdvideMasterDataBYType($rows->advice_type)
  
                          ];
                    }
                  
                     
                }
                
                return $data;
    
    }


    
    public function getAdvideMasterDataBYType($advice_type)
    {
     $data = [];
     $where = array('advice_master.advice_type' => $advice_type,
                    'advice_master.is_active' => 'Y'
                     );

            $query = $this->db->select("*")
                    ->from('advice_master')
                    ->where($where)
                    ->order_by("sl_no")
                    ->get();
                #q();
                if($query->num_rows()> 0)
                {
                  
                       
                    foreach ($query->result() as $rows)
                    {
                        $data[] = $rows;
                    }
                    return $data;
                  
                     
                }
                
                return $data;
    
    }



    public function getAdviceDetailsData($case_master_id)
    {
     $data = [];
            $where = array('advice_details.case_master_id' => $case_master_id);
            $query = $this->db->select(" MAX(advice_details.created_on) AS created_on,advice_type")
                    ->from('advice_details')
                    ->where($where)
                    ->group_by("advice_type")
                    ->order_by("advice_details.created_on","desc")
                 
                    ->get();
                    #q();
                
                if($query->num_rows()> 0)
                {
                  
                 foreach ($query->result() as $rows)
                    {
                       // $data[] = $rows;
                        $data[]=[
                            "advType"=>$rows,
                            "adviceList"=>$this->getAdviceDetailsLatestDataByType($rows->advice_type,$rows->created_on,$case_master_id)
  
                          ];
                    }
                  
                     
                }
                
                return $data;
    
    }


    public function getAdviceDetailsLatestDataByType($advice_type,$created_on,$case_master_id)
    {
     $data = [];
     $where = array(
                    'advice_details.advice_type' => $advice_type,
                    'advice_details.created_on' => $created_on,
                    'advice_details.case_master_id' => $case_master_id,
                   );

            $query = $this->db->select("*")
                    ->from('advice_details')
                    ->where($where)
                    ->order_by("advice_details.advice_details_id")
                    ->get();
                #q();
                if($query->num_rows()> 0)
                {
                  
                       
                    foreach ($query->result() as $rows)
                    {
                        $data[] = $rows;
                    }
                    return $data;
                  
                     
                }
                
                return $data;
   
    }


    public function getAdviceDetailsDataByDate($case_master_id,$created_on)
    {
     $data = [];
            $where = array(
                            'advice_details.case_master_id' => $case_master_id,
                            'advice_details.created_on' => $created_on
                           );

            $query = $this->db->select("*")
                    ->from('advice_details')
                    ->where($where)
                    ->group_by("advice_type")
                    ->order_by("advice_details.created_on","desc")
                 
                    ->get();
                    #q();
                
                if($query->num_rows()> 0)
                {
                  
                 foreach ($query->result() as $rows)
                    {
                       // $data[] = $rows;
                        $data[]=[
                            "advType"=>$rows,
                            "adviceList"=>$this->getAdviceDetailsLatestDataByType($rows->advice_type,$rows->created_on,$case_master_id)
  
                          ];
                    }
                  
                     
                }
                
                return $data;
    
    }


    public function getInvestigationComponentWhereNotIn($ignorarray)
    {  
        $data = array();
        $this->db->select("*")
                ->from('investigation_component')
                ->where_not_in('investigation_comp_id',$ignorarray)
                ->order_by('inv_component_name');
        $query = $this->db->get();
        #echo $this->db->last_query();

        if($query->num_rows()> 0)
        {
            foreach ($query->result() as $rows)
            {
                $data[] = $rows;
            }
            return $data;
             
        }
        else
        {
             return $data;
         }
    }

   


    public function getPlacentaByIds($ids)
    {
     $data = [];

            $query = $this->db->select("*")
                    ->from('placenta_master')
                    ->where_in('placenta_id', $ids )
                    ->get();
                #q();
                if($query->num_rows()> 0)
                {
                  
                       
                    foreach ($query->result() as $rows)
                    {
                        $data[] = $rows;
                    }
                    return $data;
                  
                     
                }
                
                return $data;
    
    }

//started by anil 23-09-2019

 public function getInvestigationpanelComponentWhereIn($array)
    {  
        $data = array();
        $this->db->select("*")
                ->from('investigation_component')
                ->where_in('investigation_comp_id',$array);
        $query = $this->db->get();
        #echo $this->db->last_query();

        if($query->num_rows()> 0)
        {
            foreach ($query->result() as $rows)
            {
                $data[] = $rows;
            }
            return $data;
             
        }
        else
        {
             return $data;
         }
    }

    public function getInvestigationpanelDetailsByPrescriptionId($prescription_id)
    {
     $data = [];
      $where = [
                "prescription_investigation_panel_details.prescription_mst_id" => $prescription_id
            ];
            $query = $this->db->select("prescription_investigation_panel_details.*,investigation_panel.panel_name")
                    ->from('prescription_investigation_panel_details')
                     ->join('investigation_panel','prescription_investigation_panel_details.master_panel_id = investigation_panel.id','INNER')
                    ->where($where)
                    ->get();
                
                if($query->num_rows()> 0)
                {
                  foreach($query->result() as $rows)
                    {
                        $data[] = $rows;
                    }
                     
                }
                
                return $data;
    
    }


public function getInvestigationpanelComponentWhereNotIn($ignorarray)
    {  
        $data = array();
         $where_panel_inv = array('case_type'=>'OB');
        $this->db->select("*")
                ->from('investigation_panel')
                ->where($where_panel_inv)
                ->where_not_in('id',$ignorarray);
        $query = $this->db->get();
        #echo $this->db->last_query();

        if($query->num_rows()> 0)
        {
            foreach ($query->result() as $rows)
            {
                $data[] = $rows;
            }
            return $data;
             
        }
        else
        {
             return $data;
         }
    }

 public function getAllCaseDetailsgroupwise($majorgroup)
    {
     $data = [];
   $where = array('case_master.major_group'=>$majorgroup);
            $query = $this->db->select("*")
                    ->from('case_master')
                    ->join('patient_master','patient_master.patient_id=case_master.patient_id','INNER')
                    ->where($where)
                    ->get();
            #echo $this->db->last_query();
    
                if($query->num_rows()> 0)
                {
                  
                 foreach ($query->result() as $rows)
                    {
                        $data[] = $rows;
                    }
                  
                     
                }
                
                return $data;
    
    }

 public function duplicatemobileNumberCheck($selfmobile,$majorgroup){
    $where = array(
                    'patient_master.selfmobile'=>$selfmobile,
                    'case_master.major_group' =>$majorgroup
                    );

   $query = $this->db->select("*")
                     ->from('patient_master')
                     ->join('case_master','case_master.patient_id = patient_master.patient_id','INNER')
                     ->where($where)
                     ->get();
            #echo $this->db->last_query();
            if($query->num_rows()>0){
            return TRUE;
        }
        else
        {
            return FALSE;
        }
            
            
 }

 public function getTotalSuctionByCase($case_master_id)
    {

        $data = '';
        $where = array(
                        'previous_child_birth_history.case_master_id' =>$case_master_id,
                        'previous_child_birth_history.delevery_type' =>'SE'
                        );
        $this->db->select("count(*) as total_se")
                ->from('previous_child_birth_history')
                ->where($where)
                ->limit(1);
        $query = $this->db->get();
        
        #echo $this->db->last_query();
        
        if($query->num_rows()> 0)
        {
           $row = $query->row();
           return $data = $row->total_se;
             
        }
        else
        {
            return $data;
        }
    }


    public function getLastSectionEvacatuionByCase($case_master_id)
    {
        $delevery_type = array('SE');
        $data = [];
        $where = array(
                        'previous_child_birth_history.case_master_id' =>$case_master_id

                        );
        $this->db->select("*")
                ->from('previous_child_birth_history')
                ->where($where)
                ->where_in('delevery_type', $delevery_type )
                ->order_by("previous_child_birth_history.year", "DESC")
                ->limit(1);
        $query = $this->db->get();
        
   # echo $this->db->last_query();
        
        if($query->num_rows()> 0)
        {
           $row = $query->row();
           return $data = $row;
             
        }
        else
        {
            return $data;
        }
    }

 public function getTotalNdByCase($case_master_id)
    {

        $data = '';
        $where = array(
                        'previous_child_birth_history.case_master_id' =>$case_master_id,
                        'previous_child_birth_history.delevery_type' =>'ND'
                        );
        $this->db->select("count(*) as total_nd")
                ->from('previous_child_birth_history')
                ->where($where)
                ->limit(1);
        $query = $this->db->get();
        
        #echo $this->db->last_query();
        
        if($query->num_rows()> 0)
        {
           $row = $query->row();
           return $data = $row->total_nd;
             
        }
        else
        {
            return $data;
        }
    }   


 public function getAlloccupation(){

     $data = [];
     $where = array('is_active' => 'Y' );

     $this->db->select("*")
                ->from('occupation_master')
                ->where($where)
                ->order_by("occupation", "asc"); 
        $query = $this->db->get();
        
        //echo $this->db->last_query();
        
        if($query->num_rows()> 0)
        {
           foreach ($query->result() as $rows)
                    {
                        $data[] = $rows;
                    }
             return $data;
        }
        else
        {
            return $data;
        }

 }   
   

 public function getAlleducation(){

     $data = [];
     $where = array('is_active' => 'Y' );

     $this->db->select("*")
                ->from('education_qualification')
                ->where($where)
                ->order_by("qualification", "asc"); 
        $query = $this->db->get();
        
        //echo $this->db->last_query();
        
        if($query->num_rows()> 0)
        {
           foreach ($query->result() as $rows)
                    {
                        $data[] = $rows;
                    }
             return $data;
        }
        else
        {
            return $data;
        }

 }   

 public function getAlldiseasebycaseId($caseId){

     $data = [];
     $where = array('case_master_id' => $caseId );

     $this->db->select("patient_dieases.*,diseases_master.diseases_name")
                ->from('patient_dieases')
                ->join('diseases_master','patient_dieases.diseases_id = diseases_master.diseases_id','INNER')
                ->where($where);
                
        $query = $this->db->get();
        
        //echo $this->db->last_query();
        
        if($query->num_rows()> 0)
        {
           foreach ($query->result() as $rows)
                    {
                        $data[] = $rows;
                    }
             return $data;
        }
        else
        {
            return $data;
        }

 }   


 public function getDiagnosisDetails($case_master_id)
    {
     $data = [];
     
            $query = $this->db->select("*")
                    ->from('diagnosis_master')
                    ->join('diagnosis_details',"diagnosis_master.id=diagnosis_details.diagnosis_master_id and diagnosis_details.case_master_id='".$case_master_id."'",'LEFT')
                    ->get();
                #q();
                if($query->num_rows()> 0)
                {
                  
                       
                    foreach ($query->result() as $rows)
                    {
                        $data[] = $rows;
                    }
                    return $data;
                  
                     
                }
                
                return $data;
    
    }



     //end by anil



} // end of class