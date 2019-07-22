<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Advicemodel extends CI_Model{

    public function getAllAdviceList()
    {
     $data = [];
      
            $query = $this->db->select("
                                           advice_master.*
                                       

                                        ")
                    ->from('advice_master')
                    ->order_by('advice_type,sl_no')
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


    public function getLastSlByType($advice_type)
	{
        $data = 0;
        $where = array('advice_master.advice_type' =>$advice_type);
		$this->db->select("*")
				->from('advice_master')
                ->where($where)
                ->order_by("advice_id","desc")
				->limit(1);
		$query = $this->db->get();
		
		#echo $this->db->last_query();
		
		if($query->num_rows()> 0)
		{
           $row = $query->row();
           return $data = $row->sl_no;
             
        }
		else
		{
            return $data;
        }
	}

}// end of class