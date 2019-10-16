<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Occupationmodel extends CI_Model{

	public function getallOccupation(){
		 $data = [];

		$sql=$this->db->select('*')
		             ->from('occupation_master')
		             ->get();
		   if($sql->num_rows() > 0){

		   	foreach($sql->result() as $rows){
		   		$data[] = $rows;
		   	}

		   }
		   return $data;          
	}

}