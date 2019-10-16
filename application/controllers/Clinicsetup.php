<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Clinicsetup extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('commondatamodel','commondatamodel',TRUE);
         $this->load->model('Clinicmodel','clinicmodel',TRUE);
         
    }


    public function index()
    {
        $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
            $session = $this->session->userdata('user_data');      
            $page = 'dashboard/admin_dashboard/clinic_setup/clinic_list.php';
            $result['headerText']="Setup Your Clinic Details";
            $result['DaysList']=$this->commondatamodel->getAllDropdownData('day_master');
            $result['clinicList']=$this->commondatamodel->getAllDropdownData('clinic_master');
            //pre( $result['DaysList']);
            $header = "";
            createbody_method($result, $page, $header, $session);
        }else{
            redirect('login','refresh');
        }
    }



    public function addClinic()
    {
        $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
            if($this->uri->rsegment(3) == NULL)
            {
                $result['mode'] = "ADD";
                $result['btnText'] = "Save";
                $result['btnTextLoader'] = "Saving...";
                $clinicID = 0;
                $result['clinicEditdata'] = [];
                
                //getAllRecordWhereOrderBy($table,$where,$orderby)
                
                
            
            }
            else
            {
                $result['mode'] = "EDIT";
                $result['btnText'] = "Update";
                $result['btnTextLoader'] = "Updating...";
                $clinicID = $this->uri->segment(3);
                
            
                $result['clinicEditdata'] = [];

                $where_clinic_master = [
                    'clinic_master.clinic_id' => $clinicID
                ];

                // getSingleRowByWhereCls(tablename,where params)
                 $result['clinicEditdata'] = $this->commondatamodel->getSingleRowByWhereCls('clinic_master',$where_clinic_master); 

                 $details_array = array('clinic_details.clinic_master_id' => $clinicID, );


                 $result['clinicDetailsEditdata'] = $this->commondatamodel->getAllRecordWhere('clinic_details',$details_array); 

                //  pre($result['clinicDetailsEditdata']);exit;
  
            }

            $result['clinicID']=$clinicID;

            $header = "";
             $result['headerText']="Setup Your Clinic Details";
            $result['DaysList']=$this->commondatamodel->getAllDropdownData('day_master');
         
            
             $page = 'dashboard/admin_dashboard/clinic_setup/clinic_setup';
            createbody_method($result, $page, $header,$session);
        }
        else
        {
            redirect('login','refresh');
        }
    }


    public function ClinicList()
    {
        $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
            // $session = $this->session->userdata('user_data');      
            // $page = 'dashboard/admin_dashboard/clinic_setup/clinic_setup';
            // $result['headerText']="Setup Your Clinic Details";
            // $header = "";
            // createbody_method($result, $page, $header, $session);
        }else{
            redirect('login','refresh');
        }
    }


public function addVisitingDaydetail()
    {
        if($this->session->userdata('user_data'))
        {
            $session = $this->session->userdata('user_data');
        

            $row_no = $this->input->post('rowNo');
            $data['rowno'] = $row_no;
            $data['DaysList']=$this->commondatamodel->getAllDropdownData('day_master');
            
            $page = 'dashboard/admin_dashboard/clinic_setup/add_visiting_day_partial_view';
            $viewTemp = $this->load->view($page,$data,TRUE);
            echo $viewTemp;
        }
        else
        {
            redirect('login','refresh');
        }
    }



        public function clinic_action() {

        $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {

        //echo  $dir = APPPATH . 'ds_pms/assets/documentation/clinic_logo';

         $dir = $_SERVER['DOCUMENT_ROOT'].'/pms/assets/documentation/clinic_logo';  //server
          $is_logo = trim(htmlspecialchars($this->input->post('islogo')));
            $imagefile="";
          if($is_logo == 'Y'){

          

                $config = array(
                    'upload_path' => $dir,
                    'allowed_types' => 'gif|jpg|png|jpeg',
                    //allowed max file size. 0 means unlimited file size
                    'max_size' => '0',
                    //max file name size
                    'max_filename' => '255',
                    //whether file name should be encrypted or not
                    'encrypt_name' => TRUE
                        //store image info once uploaded
                );
                
             $this->load->library('upload', $config);

          //   $this->upload->initialize($config);
             
              if ($this->upload->do_upload('imagefile')) {

                $file_detail = $this->upload->data();
                //pre($file_detail);exit; 
                $imagefile = $file_detail['file_name'];
                }
                else{
                     $json_response = array(
                            "msg_status" => 0,
                            "msg_data" => "Image Uploading Problem.."
                        );
         
                }

               // echo $this->upload->display_errors();exit;
        }
        else{
            $json_response = array(
                            "msg_status" => 0,
                            "msg_data" => "Image File is Empty"
                        );
        }


            $clinicID = trim(htmlspecialchars($this->input->post('clinicID')));
            $mode = trim(htmlspecialchars($this->input->post('mode')));

            $clinicname = trim(htmlspecialchars($this->input->post('clinicname')));
            $contactno = trim(htmlspecialchars($this->input->post('contactno')));
            $cliniccode = strtoupper(trim(htmlspecialchars($this->input->post('cliniccode')))) ;
            $address = trim(htmlspecialchars($this->input->post('address')));

             

        

            $selectDay = $this->input->post('selectDay');
            $byAppointment = $this->input->post('byAppoint');
            $timefrom = $this->input->post('timefrom');
            $timeto = $this->input->post('timeto');
          
   
         
                
                
                if($clinicID>0 && $mode=="EDIT")
                {
                    /*  EDIT MODE
                     *  -----------------
                    */
                       if($is_logo == 'Y'){

                        $upd_mst_array = array(
                                        'clinic_name' => $clinicname,
                                        'phno' => $contactno,
                                        'address' => $address,
                                        'logo' =>$imagefile,
                                        'is_logo_uploaded'=>$is_logo,
                                        
                                     );
                       }
                       else{
                         $upd_mst_array = array(
                                        'clinic_name' => $clinicname,
                                        'phno' => $contactno,
                                        'address' => $address,
                                        
                                     );
                       }
                      
                      $mst_where = array('clinic_master.clinic_id' => $clinicID );

                     $update_mst = $this->commondatamodel->updateSingleTableData('clinic_master',$upd_mst_array,$mst_where);

                     $delete_where = array('clinic_details.clinic_master_id' => $clinicID);

                     $deleteDetails= $this->commondatamodel->deleteTableData('clinic_details',$delete_where);


                          for ($i=0; $i < count($selectDay); $i++) { 

                        if ($byAppointment[$i]=='Y') {
                            $from_time=null;
                            $to_time=null;
                        }else{
                            $from_time=$timefrom[$i];
                            $to_time=$timeto[$i];

                        }

                       $clinic_details = array(
                                                'clinic_master_id' => $clinicID, 
                                                'day_id' => $selectDay[$i], 
                                                'is_by_appointment' => $byAppointment[$i], 
                                                'from_time' => $from_time, 
                                                'to_time' => $to_time, 
                                              );

                         $insertData = $this->commondatamodel->insertSingleTableData('clinic_details',$clinic_details);

                    }
                 

                    

                   
                    
                    
                    if($update_mst)
                    {
                        $json_response = array(
                            "msg_status" => 1,
                            "msg_data" => "Updated successfully",
                            "mode" => "EDIT"
                        );
                    }
                    else
                    {
                        $json_response = array(
                            "msg_status" => 0,
                            "msg_data" => "There is some problem while updating ...Please try again."
                        );
                    }



                } // end if mode
                else
                {
                    /*  ADD MODE
                     *  -----------------
                    */


            
                   $insert_array = array(
                                        'clinic_name' => $clinicname,
                                        'phno' => $contactno,
                                        'cliniccode' => $cliniccode,
                                        'address' => $address,
                                        'is_active' => 'Y',
                                        'logo' =>$imagefile,
                                        'is_logo_uploaded'=>$is_logo,
                                     );
                 

                $insertID = $this->commondatamodel->insertSingleTableData('clinic_master',$insert_array);


                   /* insert into serial master for generate case no */
                   //add for loop for creating case type for each year
                   for($j=0;$j < 3; $j++){
                        if($j==0){
                           $case_type = 'OB'; 
                        }
                        else if($j==1){
                            $case_type = 'GY'; 
                        }
                        else{
                            $case_type = 'IN'; 
                        }

                   for ($i=0; $i < 5; $i++) {

                        

                        $serial_master_array = array(
                                            'next_serial_no' => 1,
                                            'type' => 'NEWCASE',
                                            'year' =>  date('Y', strtotime('+'.$i.' year')),
                                            'clinic_id' => $insertID,
                                            'case_type' =>$case_type
                                           );
                        
                      $this->commondatamodel->insertSingleTableData('serial_master',$serial_master_array);

                      } 
                      
                       

                   }

                  



                    for ($i=0; $i < count($selectDay); $i++) { 

                        if ($byAppointment[$i]=='Y') {
                            $from_time=null;
                            $to_time=null;
                        }else{
                            $from_time=$timefrom[$i];
                            $to_time=$timeto[$i];

                        }

                       $clinic_details = array(
                                                'clinic_master_id' => $insertID, 
                                                'day_id' => $selectDay[$i], 
                                                'is_by_appointment' => $byAppointment[$i], 
                                                'from_time' => $from_time, 
                                                'to_time' => $to_time, 
                                              );

                         $insertData = $this->commondatamodel->insertSingleTableData('clinic_details',$clinic_details);

                    }
                    

                    

                    if($insertData)
                    {
                        $json_response = array(
                            "msg_status" => 1,
                            "msg_data" => "Saved successfully",
                            "mode" => "ADD"
                        );
                    }
                    else
                    {
                        $json_response = array(
                            "msg_status" => 1,
                            "msg_data" => "There is some problem.Try again"
                        );
                    }

                } // end add mode ELSE PART



            header('Content-Type: application/json');
            echo json_encode( $json_response );
            exit;

            

        }
        else
        {
            redirect('adminpanel','refresh');
        }
    }



    public function setStatus(){
        $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
            $updID = trim($this->input->post('uid'));
            $setstatus = trim($this->input->post('setstatus'));
            
            $update_array  = array(
                "is_active" => $setstatus
                );
                
            $where = array(
                "clinic_master.clinic_id" => $updID
                );
            
            
        
            $update = $this->commondatamodel->updateSingleTableData('clinic_master',$update_array,$where);
            if($update)
            {
                $json_response = array(
                    "msg_status" => 1,
                    "msg_data" => "Status updated"
                );
            }
            else
            {
                $json_response = array(
                    "msg_status" => 0,
                    "msg_data" => "Failed to update"
                );
            }


        header('Content-Type: application/json');
        echo json_encode( $json_response );
        exit;

        }
        else
        {
            redirect('login','refresh');
        }
    }


    public function getClinicDetailRow()
    {
        $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
            $json_response = array();
            $clinic_master_id = $this->input->get("clinicId");
           

            $result['clinicdetailslist'] = $this->clinicmodel->getClinicTimingDetailsById($clinic_master_id);

            $json_response = $result['clinicdetailslist'];

            header('Content-Type: application/json');
            echo json_encode( $json_response );
            exit;
        }
        else
        {
            redirect('administratorpanel','refresh');
        }
    }


        public function checkClinicCode() {
        $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {

           $json_response = [];
           $cliniccode = $this->input->post("cliniccode");
           $where = [
               "clinic_master.cliniccode" => trim($cliniccode)
           ];
           $isExist = $this->commondatamodel->duplicateValueCheck("clinic_master",$where);
           if($isExist) {
                $json_response = [
                    "msg_status" => 1,
                    "msg_data" => "This Project Code already exist.Please check...",
                    
                ];
           }
           else{
                $json_response = [
                    "msg_status" => 0,
                    "msg_data" => "",
                  
                ];
           }

           header('Content-Type: application/json');
           echo json_encode( $json_response );
           exit;

        }else{
            redirect('login','refresh');
        }
    }



}/* end of class */