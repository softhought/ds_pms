<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Medicinecmodel extends CI_Model{

    public function getAllMedicineList()
    {
     $data = [];
      
            $query = $this->db->select("
                                        medicine_master.*,
                                        medicine_type.medicine_type,
                                        medicine_category.category
                                        ")
                    ->from('medicine_master')
                    ->join('medicine_type','medicine_type.medicine_type_id=medicine_master.medicine_type','LEFT')
                    ->join('medicine_category','medicine_category.med_cat_id=medicine_master.category_id','LEFT')
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


    public function getAllMedicineListbyCategory($category_id)
    {
     $data = [];
     $where = array('medicine_master.category_id' => $category_id );
      
            $query = $this->db->select("
                                        medicine_master.*,
                                        medicine_type.medicine_type,
                                        medicine_category.category
                                        ")
                    ->from('medicine_master')
                    ->join('medicine_type','medicine_type.medicine_type_id=medicine_master.medicine_type','INNER')
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

}// end of class