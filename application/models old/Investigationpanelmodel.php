<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Investigationpanelmodel extends CI_Model{

    public function getAllInvestioncomp()
    {
     $data = [];
      
            $query = $this->db->select("*")
                    ->from('investigation_component')
                    ->order_by('inv_component_name')
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

    public function getallInvestigationpanel(){
         $data = [];

        $sql=$this->db->select('*')
                     ->from('investigation_panel')
                     ->get();
           if($sql->num_rows() > 0){

            foreach($sql->result() as $rows){
                $data[] = $rows;
            }

           }
           return $data;          
    }


    
}// end of class