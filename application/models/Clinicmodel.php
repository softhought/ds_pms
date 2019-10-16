<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Clinicmodel extends CI_Model{

    public function getClinicTimingDetailsById($clinic_master_id)
    {
     $data = [];
      $where = [
                "clinic_details.clinic_master_id" => $clinic_master_id
            ];
            $query = $this->db->select("
                                        clinic_details.*,
                                        day_master.day_name

                                        ")
                    ->from('clinic_details')
                    ->join('day_master','day_master.day_id=clinic_details.day_id','INNER')
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