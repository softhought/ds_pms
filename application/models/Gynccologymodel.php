<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Gynccologymodel extends CI_Model{

  public function getAllchiefComplaints(){

  	//$where = array('is_parrent'=>'P');
$data = array();
		$where_Ary = array(
			"gynaccology_chief_complaints.is_parrent" => "P",
		);
		
		$this->db->select("*")
				->from('gynaccology_chief_complaints')
				->where($where_Ary)
				->order_by('gynaccology_chief_complaints.id','ASC');
		$query = $this->db->get();
		
		if ($query->num_rows() > 0) 
		   {
			  foreach($query->result() as $rows)
			  {
					$data[] = array(
							"chiefcompalintsparrentData" => $rows,
							"chiefcompalintschildData" => $this->getchiefcomplaintschild($rows->id) 
						 );
			 }
		   }
		   return $data;
  }

  public function getchiefcomplaintschild($parentID)
	{
		$data = array();
		$where_Ary = array(
			"gynaccology_chief_complaints.parrent_id" => $parentID,
			
		);
		
		$this->db->select("*")
				->from('gynaccology_chief_complaints')
				->where($where_Ary)
				->order_by('gynaccology_chief_complaints.id','ASC');
		$query = $this->db->get();
		
		if($query->num_rows() > 0) 
		   {
				foreach($query->result() as $rows)
				{
					$data[] = $rows;
				}
		   }
		   return $data;
	}

	public function getAllchiefcomplaintsdetails($caseID)
	{
		$data = array();
		$where_Ary = array(
			"gynccology_chief_complaints_details.case_master_id" => $caseID,
			
		);
		
		$this->db->select("*")
				->from('gynccology_chief_complaints_details')
				->where($where_Ary)
				->order_by('gynccology_chief_complaints_details.id','ASC');
		$query = $this->db->get();
		
		if($query->num_rows() > 0) 
		   {
				foreach($query->result() as $rows)
				{
					$data[] = $rows;
				}
		   }
		   return $data;
	}

  public function getPreviousSurgeryWhereNotIn($surgeryIDs){

  	$data = array();
		
		
		$query = $this->db->select("*")
				          ->from('surgery_master')
				          ->where_not_in('surgery_id',$surgeryIDs)
		                  ->get();
		
		if($query->num_rows() > 0) 
		   {
				foreach($query->result() as $rows)
				{
					$data[] = $rows;
				}
		   }
		   return $data;


  }
  public function getAllChiefComplaintId($caseID){

  $data = array();
  
   $where_case_id = array('case_master_id'=>$caseID);
  // $where = array('gynaccology_chief_complaints.is_parrent'=>'P');		
		$query = $this->db->select("gynaccology_chief_complaints.*,gynccology_chief_complaints_details.is_check")
				          ->from('gynaccology_chief_complaints')
				          ->join('gynccology_chief_complaints_details','gynccology_chief_complaints_details.chief_complaint_id = gynaccology_chief_complaints.id','INNER')
				          ->where($where_case_id)
				         
		                  ->get();
		
		if($query->num_rows() > 0) 
		   {
				foreach($query->result() as $rows)
				{
					$data[] = $rows;
				}
		   }
		   return $data;

  }

}