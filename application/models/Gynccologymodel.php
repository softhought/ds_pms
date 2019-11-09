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
		$query = $this->db->select("gynaccology_chief_complaints.*,gynccology_chief_complaints_details.*")
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

   public function getGynogenralExamination($caseID){

  $data = array();
  
   $where_case_id = array('case_master_id'=>$caseID);
  // $where = array('gynaccology_chief_complaints.is_parrent'=>'P');		
		$query = $this->db->select("*")
				          ->from('gynaecology_genral_examination')
				          ->where($where_case_id)
				          ->order_by("id",'desc')
				          ->limit(1)
				          ->get();
		
		if($query->num_rows() > 0) 
		   {
				foreach($query->result() as $rows)
				{
					$data = $rows;
				}
		   }
		   return $data;

  }

  public function getInvestigationpanelDetails($caseID)
    {
     $data = [];
      $where = [
                "case_master_id" => $caseID
            ];
            $query = $this->db->select("gynaecology_investigation_panel_detail.*,investigation_panel.panel_name")
                    ->from('gynaecology_investigation_panel_detail')
                     ->join('investigation_panel','gynaecology_investigation_panel_detail.master_panel_id = investigation_panel.id','INNER')
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

   public function getInvestigationpanelComponentWhereNotIn($ignorarray)
    {  
        $data = array();
         $where_panel_inv = array('case_type'=>'GY');
        $this->db->select("*")
                ->from('investigation_panel')
                ->where($where_panel_inv)
                ->where_not_in('id',$ignorarray);
        $query = $this->db->get();
        #echo $this->db->last_query();

        if($query->num_rows()> 0)
        {
            foreach ($query->result() as $rows)
            {
                $data[] = $rows;
            }
            return $data;
             
        }
        else
        {
             return $data;
         }
    } 

public function getInvestigationDetails($caseID)
    {
     $data = [];
      // $where = [
      //           "prescription_investigation_dtl.prescription_mst_id" => $prescription_id
      //       ];
     $where = ["gynaecology_investigation_dtl.case_master_id"=>$caseID];
            $query = $this->db->select("gynaecology_investigation_dtl.*,investigation_component.inv_component_name")
                    ->from('gynaecology_investigation_dtl')
                    ->join('investigation_component','investigation_component.investigation_comp_id = gynaecology_investigation_dtl.investigation_comp_id','LEFT')
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

     public function getPrescriptionLatestByCase($case_master_id)
    {
        $data = array();
        $where = [
                "case_master_id" => $case_master_id
            ];
        $this->db->select("*")
                ->from('prescription_master')
                ->where($where)
                ->order_by("prescription_master.prescription_id", "DESC")
                ->limit(1);
        $query = $this->db->get();
        
        #echo $this->db->last_query();
        
        if($query->num_rows()> 0)
        {
           $row = $query->row();
           return $data = $row;
             
        }
        else
        {
            return $data;
        }
    }

public function getPreviousSurgeryWhereIn($surgeryIDs){

  	$data = array();
		
		
		$query = $this->db->select("*")
				          ->from('surgery_master')
				          ->where_in('surgery_id',$surgeryIDs)
		                  ->get();
		#echo $this->db->last_query();
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