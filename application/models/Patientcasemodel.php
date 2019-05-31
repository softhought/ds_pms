<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Patientcasemodel extends CI_Model{

 public function getCaseDetailsById($case_master_id)
    {
     $data = [];
      $where = [
                "case_master.case_id" => $case_master_id
            ];
            $query = $this->db->select("*")
                    ->from('case_master')
                    ->where($where)
                    ->get();
                
                if($query->num_rows()> 0)
                {
                  
                        $data[] = $rows;
                  
                     
                }
                
                return $data;
    
    }


        public function getLatestSerialNumberClinic($type,$year,$clinic_id){
        $lastnumber = (int)(0);
        $serialno="";
        $sql="SELECT *
            FROM serial_master
            WHERE serial_master.type='".$type."' 
            AND serial_master.year='".$year."'
            AND serial_master.clinic_id='".$clinic_id."'
            LOCK IN SHARE MODE";
        $query = $this->db->query($sql);
        #q();
        if ($query->num_rows() > 0) {
              $row = $query->row(); 
              $lastnumber = $row->next_serial_no;
              $serialID = $row->id;
        }
        $digit = (int)(log($lastnumber,10)+1) ; 
      
       
        if($digit==4){
            $serialno ="0".$lastnumber;
        }
        elseif($digit==3){
              $serialno = "00".$lastnumber;
        }
        elseif($digit==2){
            $serialno = "000".$lastnumber;
        }
        elseif($digit==1){
            $serialno = "0000".$lastnumber;
        }
       
        $lastnumber = $lastnumber + 1;
        
        //update
        $upddata = [
            'serial_master.next_serial_no' => $lastnumber,
        ];
        $where = [
            'serial_master.id' => $serialID
            ];
        $this->db->where($where); 
        $this->db->update('serial_master', $upddata);
        return $serialno;
    }

} // end of class