<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Investigationcomponentmodel extends CI_Model{

    public function getAllInvestigationList()
    {
     $data = [];
      
            $query = $this->db->select("*")
                    ->from('investigation_component')
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