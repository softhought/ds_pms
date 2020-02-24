<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Preoperationmodel extends CI_Model{

 public function getmedicineflowprescription($caseID,$med_cat_id){

 	$data = array();
    
    $where = array('prescription_master.case_master_id' =>$caseID,
                   'medicine_master.category_id'=>$med_cat_id
                   );
        $this->db->select("medicine_master.*")
                ->from('prescription_master')
                ->join('prescription_medicine_dtl','prescription_master.prescription_id=prescription_medicine_dtl.prescription_mst_id','INNER')
                ->join('medicine_master','prescription_medicine_dtl.medicine_id = medicine_master.medicine_id','INNER')
                ->where($where)
                ->group_by('medicine_master.medicine_id');

        $query = $this->db->get();
        
        //echo $this->db->last_query();exit;
        
        if($query->num_rows()> 0)
                {
                  
                 foreach ($query->result() as $rows)
                    {
                        $data[] = $rows;
                    }
                  
                     
                }
                
                return $data;
   

 }


 public function getdayofopmedicine($caseID){

 	$data = array();

 	  $where = array('preop_patient_medicine_dtl.case_master_id' =>$caseID,
                        );

 	 $this->db->select("preop_patient_medicine_dtl.*,medicine_master.medicine_name")
                ->from('preop_patient_medicine_dtl')
                ->join('medicine_master','preop_patient_medicine_dtl.medicine_id=medicine_master.medicine_id','LEFT')
                ->where($where)
                ->where('preop_patient_medicine_dtl.created_on = (SELECT created_on FROM preop_patient_medicine_dtl ORDER BY created_on DESC LIMIT 1)');
             

        $query = $this->db->get();
        
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


}