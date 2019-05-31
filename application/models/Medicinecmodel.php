<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Medicinecmodel extends CI_Model{

    public function getAllMedicineList()
    {
     $data = [];
      
            $query = $this->db->select("
                                        medicine_master.*,
                                        medicine_type.medicine_type

                                        ")
                    ->from('medicine_master')
                    ->join('medicine_type','medicine_type.medicine_type_id=medicine_master.medicine_type','INNER')
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

}