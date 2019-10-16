<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Educationmodel extends CI_Model{

	public function getallEducation(){
		 $data = [];

		$sql=$this->db->select('*')
		             ->from('education_qualification')
		             ->get();
		   if($sql->num_rows() > 0){

		   	foreach($sql->result() as $rows){
		   		$data[] = $rows;
		   	}

		   }
		   return $data;          
	}

}