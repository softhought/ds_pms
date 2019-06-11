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


        public function getLatestSerialNumberClinic($type,$year,$clinic_id){
        $lastnumber = (int)(0);
        $serialno="";
        $sql="SELECT *
            FROM serial_master
            WHERE serial_master.type='".$type."' 
            AND serial_master.year='".$year."'
            AND serial_master.clinic_id='".$clinic_id."'
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
            $query = $this->db->select("*")
                    ->from('menstrual_medecine_details')
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
     
            $query = $this->db->select("*")
                    ->from('surgery_master')
                    ->join('surgery_details',"surgery_master.surgery_id=surgery_details.surgery_mst_id and surgery_details.case_master_id='".$case_master_id."'",'LEFT')
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
            $query = $this->db->select("*")
                    ->from('regular_medicines_details')
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

} // end of class