<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login_model extends CI_Model{
     public function checkLogin($user_name,$password,$clinic_id)
    {
        
       
        $userId="";
        $where_arr =["username"=>$this->db->escape_str($user_name),
                     "password"   =>md5($this->db->escape_str($password)),
                     "clinic_id"   =>$this->db->escape_str($clinic_id),
                     "is_active"=>'Y'
            ];
       $query= $this->db->select("user_master.*")
                ->where($where_arr)
                ->get("user_master");
                #q();
       if($query->num_rows()>0)
       {
           $rows = $query->row();
           $userId = $rows->user_id;
       }
       return $userId;
    }
    public function get_user($user_id)
    {
        $user="";
        $query=$this->db->select("user_master.*")
                ->where("user_master.user_id",$user_id)
                ->get("user_master");
        if($query->num_rows()>0){
            $user = $query->row();
        }
        return $user;
    }
    public function userLoginUpdate($userId, $userData)
    {
        $this->db->where("id",$userId);
        $this->db->update("users",$userData);
    }
    
    //****************************User************************//
    //********************************************************//
    
    public function getUserList($hospitalId)
    {
        $user="";
        $query = $this->db->select("users.*,employee_master.employee_name,"
                . "employee_master.employee_status,department_master.department_name,employee_master.employee_code,employee_master.employee_email")
                ->from("users")
                ->join("employee_master","users.employee_id = employee_master.employee_id","left")
                ->join("department_master","users.department_id = department_master.department_id","left")
                ->where("users.hospital_id",$hospitalId)
                ->order_by ("users.username")->get();

        
        if($query->num_rows()>0){
            foreach($query->result() as $row){
                $user[]=$row;
            }
        }
        return $user;
    }
    
    public function updateStatus($userId,$status){
        
        $update = ["users.is_active"=>$status];
        $this->db->where("users.user_id",$userId);
        $this->db->update("users",$update);
        
    }
 
 
    public function getAllClinic(){
    $data=array();   
    $query = $this->db->select("*")
                ->from("clinic_master")
             ->get();
       
        if($query->num_rows()>0){
            foreach($query->result() as $row){
                $data[]=$row;
            }
        }
        return $data;
    }

    public function getAllAcademinSession(){
    $data=array();   
    $query = $this->db->select("*")
                ->from("academic_session_master")
             ->get();
       
        if($query->num_rows()>0){
            foreach($query->result() as $row){
                $data[]=$row;
            }
        }
        return $data;
    }
    
   
    
}
