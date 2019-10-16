<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Complicationcmodel extends CI_Model{

    public function getAllComplicationList()
    {
     $data = [];
      
            $query = $this->db->select("*")
                    ->from('complication_master')
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