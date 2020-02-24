<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboardmodel extends CI_Model{
    public function rowcountWithWhere($table,$where)
    {
            
        $this->db->select('*')
                ->from($table)
                ->join('academic_details','student_master.student_id=academic_details.student_id')
                ->where($where);

        $query = $this->db->get();
        $rowcount = $query->num_rows();
        
        if($query->num_rows()>0){
            return $rowcount;
        }
        else
        {
            return 0;
        }
            
    }


    public function getStudentListGroupByClassName($school_id,$acd_session_id)
    {
        $where=[ 
            "academic_details.acdm_session_id"=>$acd_session_id,
            "academic_details.school_id"=>$school_id,  
            "student_master.is_active"=>'1'
        ];
        $data = [];
            $query = $this->db->select("student_master.*,academic_details.*,class_master.classname,section_master.section")
                    ->from('academic_details')
                    ->join('student_master','academic_details.student_id=student_master.student_id','INNER')
                    ->join('class_master','academic_details.class_id=class_master.id','LEFT')
                    ->join('section_master','academic_details.section_id=section_master.id','LEFT')
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

    
//added by anil on 29-11-2019 for today visit

  public function getAllRecordtodayVisit($where,$from_dt,$to_dt){

    // $where_prescription = array('prescription_master.entry_date' => date('Y-m-d') );

     $data = [];
            $query = $this->db->select("prescription_master.prescription_id,
                                        prescription_master.case_master_id,
                                        prescription_master.created_on,
                                        prescription_master.entry_date,
                                        case_master.patient_id,
                                        case_master.case_no,
                                        case_master.major_group,
                                        patient_master.patientname,
                                        patient_master.selfmobile,
                                        patient_master.reg_date,
                                        ")
                    ->from('prescription_master')
                    ->join('case_master','case_master.case_id=prescription_master.case_master_id','INNER')
                    ->join('patient_master','patient_master.patient_id=case_master.patient_id','INNER')
                    ->where(''.$where.' BETWEEN "'.$from_dt.'" AND "'.$to_dt.'"')
                    ->order_by('patient_master.reg_date','desc')
                    ->get();

           //echo $this->db->last_query();  exit;      
                
                if($query->num_rows()> 0)
                {
                  foreach($query->result() as $rows)
                    {
                        $data[] = array(
                                       'case_no'=> $rows->case_no,
                                       'case_master_id'=> $rows->case_master_id,
                                       'patientname'=>$rows->patientname,
                                       'selfmobile'=>$rows->selfmobile,
                                       'major_group'=>$rows->major_group,
                                       'reg_date'=>$rows->reg_date,
                                       'last_visit_date'=>$rows->created_on,
                                       'no_of_visit'=>$this->getNoOfvisitdate($rows->case_master_id)
                                     );
                    }
                     
                }
                
                return $data;


  }


  public function getallregistraiondata($from_dt,$to_date){


     $data = [];
            $query = $this->db->select("case_master.patient_id,
                                        case_master.case_no,
                                        case_master.case_id,
                                        case_master.major_group,
                                        patient_master.patientname,
                                        patient_master.reg_date,
                                        patient_master.selfmobile,
                                        ")
                    ->from('case_master')
                    ->join('patient_master','patient_master.patient_id=case_master.patient_id','INNER')
                    ->where('patient_master.reg_date BETWEEN "'.$from_dt.'" AND "'.$to_date.'"')
                    ->order_by('patient_master.reg_date','desc')
                    ->get();

           //echo $this->db->last_query();  exit;      
                
                if($query->num_rows()> 0)
                {
                  foreach($query->result() as $rows)
                    {
                        $data[] = array(
                                       'case_no'=> $rows->case_no,
                                       'case_master_id'=> $rows->case_id,
                                       'patientname'=>$rows->patientname,
                                       'selfmobile'=>$rows->selfmobile,
                                       'major_group'=>$rows->major_group,
                                       'reg_date'=>$rows->reg_date,
                                       'last_visit_date'=>$this->getlastvisitdate($rows->case_id),
                                       'no_of_visit'=>$this->getNoOfvisitdate($rows->case_id)
                                     );
                    }
                     
                }
                
                return $data;

  }  


  function getlastvisitdate($case_id){

   $data = '';

   $where = array('case_master_id'=>$case_id);

   $query = $this->db->select('created_on')
                     ->from('prescription_master')
                     ->where($where)
                     ->order_by('prescription_id','desc')
                     ->limit(1)
                     ->get();

        if($query->num_rows()> 0)
        
         {
            foreach($query->result() as $rows)
                    {
                       $data = $rows->created_on; 
                    }

                }
         
         return $data;

  }

    function getNoOfvisitdate($case_id){

   $data = '';

   $where = array('case_master_id'=>$case_id);

   $query = $this->db->select('COUNT(*) as no_of_visit')
                     ->from('prescription_master')
                     ->where($where)
                     ->get();

      // echo $this->db->last_query();  exit;               

        if($query->num_rows()> 0)
        
         {
            foreach($query->result() as $rows)
                    {
                       $data = $rows->no_of_visit; 
                    }

                }
         
         return $data;

  }

public function getNoOfPreopration(){

  $data = '';

   //$where = array('CONVERT(created_on,DATE)' => CURDATE());

   $query = $this->db->select('COUNT(*) as total_preop')
                     ->from('preopration_record_master')
                     ->where('CONVERT(created_on,DATE) = CURDATE()')
                     ->get();

       #echo $this->db->last_query();  exit;               

        if($query->num_rows()> 0)
        
            {            
                      foreach($query->result() as $rows)
                    {
                       $data = $rows->total_preop; 
                    }
                  

                }
         
         return $data;

}

public function getNoOfDischarge(){

  $data = '';

   //$where = array('CONVERT(created_on,DATE)' => CURDATE());

   $query = $this->db->select('COUNT(*) as total_discharge')
                     ->from('discharge_record_master')
                     ->where('CONVERT(discharge_date,DATE) = CURDATE()')
                     ->get();

       #echo $this->db->last_query();  exit;               

        if($query->num_rows()> 0)
        
            {            
                      foreach($query->result() as $rows)
                    {
                       $data = $rows->total_discharge; 
                    }
                  

                }
         
         return $data;

}

public function getAllRecordTodayPreop($from_dt,$to_date){

  $data = [];

   
          $query = $this->db->select('  preopration_record_master.case_master_id,
                                        preopration_record_master.created_on,
                                        preopration_record_master.preposed_operation,
                                        case_master.patient_id,
                                        case_master.case_no,
                                        case_master.major_group,
                                        patient_master.patientname,
                                        patient_master.selfmobile,
                                        patient_master.reg_date,')
                     ->from('preopration_record_master')
                     ->join('case_master','case_master.case_id=preopration_record_master.case_master_id','INNER')
                     ->join('patient_master','patient_master.patient_id=case_master.patient_id','INNER')
                     ->where('CONVERT(preopration_record_master.created_on,DATE) BETWEEN "'.$from_dt.'" AND "'.$to_date.'"')
                     ->get();

       #echo $this->db->last_query();  exit;               

        if($query->num_rows()> 0)
        
            {            
                      foreach($query->result() as $rows)
                    {
                       $data[] = $rows; 
                    }
                  

                }
         
         return $data;

}
public function getAlldischargelist($from_dt,$to_date){

  $data = [];

   
          $query = $this->db->select('  discharge_record_master.case_master_id,
                                        discharge_record_master.created_on,
                                        discharge_record_master.discharge_date,
                                        case_master.patient_id,
                                        case_master.case_no,
                                        case_master.major_group,
                                        patient_master.patientname,
                                        patient_master.selfmobile,
                                        patient_master.reg_date,')
                     ->from('discharge_record_master')
                     ->join('case_master','case_master.case_id=discharge_record_master.case_master_id','INNER')
                     ->join('patient_master','patient_master.patient_id=case_master.patient_id','INNER')
                     ->where('CONVERT(discharge_record_master.discharge_date,DATE) BETWEEN "'.$from_dt.'" AND "'.$to_date.'"')
                     ->get();

       #echo $this->db->last_query();  exit;               

        if($query->num_rows()> 0)
        
            {            
                      foreach($query->result() as $rows)
                    {
                       $data[] = $rows; 
                    }
                  

                }
         
         return $data;

}


}/* end of class */