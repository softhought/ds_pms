<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Createnewusewmodel extends CI_Model{


  public function getUserRole(){

  $data = [];

  	 $query = $this->db->select('*')
                ->from('user_role_master')
                ->order_by('role_id','desc')
                ->limit(2)
                ->get();
    
        
        if($query->num_rows()>0){
             
             foreach ($query->result() as $rows) {

             	$data[] =$rows;
             }
         }
        
        return $data;
  }


  public function checkusername($username){


      $data = [];
      $where = array('username'=>$username);

     $query = $this->db->select('*')
                ->from('user_master')
                ->where($where)
                ->get();
    
        
        if($query->num_rows()>0){
             
             foreach ($query->result() as $rows) {

              $data[] =$rows;
             }
         }
        
        return $data;

  }



}