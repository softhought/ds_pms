<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('commondatamodel','commondatamodel',TRUE);
        $this->load->model('dashboardmodel','dashboardmodel',TRUE);
       
    }
  public function index(){

    $session = $this->session->userdata('user_data');
    if($this->session->userdata('user_data'))
    {
      header("Access-Control-Allow-Origin: *");
      $session = $this->session->userdata('user_data');      
      $page = 'dashboard/admin_dashboard/home/dashboard-home';
      $result=[];
      $header = "";
      $result['clinicCount']=$this->commondatamodel->rowcount('clinic_master');
      $result['caseCount']=$this->commondatamodel->rowcount('case_master');
      $where_prescription = array('entry_date' => date('Y-m-d') );

       $prescriptionData=$this->commondatamodel-> getAllRecordWhere('prescription_master',$where_prescription);

       $result['todayVisit']=count($prescriptionData);

       //$where_dat = array('created_on'=>date('Y-m-d'));

       $result['todaypreop'] = $this->dashboardmodel->getNoOfPreopration();

       $result['todaydischarge'] = $this->dashboardmodel->getNoOfDischarge();

      //print_r($result['todaypreop']);exit;

      $where_clinic = array('clinic_master.clinic_id' => $session['clinic_id'] );

      $result['clinicName']=$this->commondatamodel->getSingleRowByWhereCls('clinic_master',$where_clinic)->clinic_name;
      
    

      createbody_method($result, $page, $header, $session);
      }
    else
    {
      redirect('login','refresh');
    }
  }
  
  public function groupByList()
  {
    $session = $this->session->userdata('user_data');
    if($this->session->userdata('user_data'))
    {
      header("Access-Control-Allow-Origin: *");
      $view=$this->input->post("viewname");
      if($view=="Studentlist")
      {
        $data['Studentlist']=$this->dashboardmodel->getStudentListGroupByClassName($session['school_id'],$session['acd_session_id']);
       
      }
      $this->load->view('dashboard/admin_dashboard/ds-home/list_partial_view', $data); 
    }else{
      redirect('login','refresh');
    }
  }


//Added by anil for today visit listing on 29-11-2019

  public function getAlltodayVisit(){

     $session = $this->session->userdata('user_data');

    if($this->session->userdata('user_data'))
    {

      $session = $this->session->userdata('user_data');      
      $page = 'dashboard/admin_dashboard/home/today_visit_list';
      $result=[];
      $header = "";
    
       $result['from_dt'] = date('Y-m-d');
       $result['to_dt'] = date('Y-m-d');
       $where = 'prescription_master.entry_date';
       $result['todayVisitdata']=$this->dashboardmodel-> getAllRecordtodayVisit($where,$result['from_dt'],$result['to_dt']);

       $result['visittype'] = array('Visit','Rgistration');

       //pre($result['todayVisitdata']);


       createbody_method($result, $page, $header, $session);


      }else{
      redirect('login','refresh');
    }

}

    public function getvisitandregisterdata(){

            $session = $this->session->userdata('user_data');

          if($this->session->userdata('user_data'))
          {
            
             $page = 'dashboard/admin_dashboard/home/today_visit_partial_view';

             $from_dt =date('Y-m-d',strtotime($this->input->post('from_dt')));
             $to_date =date('Y-m-d',strtotime($this->input->post('to_date')));
             $visitype =$this->input->post('visitype');

             if($visitype == 'Visit'){

              $where = 'prescription_master.entry_date';

              $result['todayVisitdata']=$this->dashboardmodel-> getAllRecordtodayVisit($where,$from_dt,$to_date);

             }else{

              //$where = 'patient_master.reg_date';

              $result['todayVisitdata']=$this->dashboardmodel-> getallregistraiondata($from_dt,$to_date);
             }

             //pre($result['todayVisitdata']);
          
             $this->load->view($page,$result);

      
         }else{
            redirect('login','refresh');
          }
}

public function getAlltodayPreop(){

     $session = $this->session->userdata('user_data');

    if($this->session->userdata('user_data'))
    {

      $session = $this->session->userdata('user_data');      
      $page = 'dashboard/admin_dashboard/home/todaypreop/today_preoplist';
      $result=[];
      $header = "";
    
       $result['from_dt'] = date('Y-m-d');
       $result['to_dt'] = date('Y-m-d');
      
       $result['todayPreopdata']=$this->dashboardmodel->getAllRecordTodayPreop($result['from_dt'],$result['to_dt']);

       
         //pre($result['todayPreopdata']);exit;


       createbody_method($result, $page, $header, $session);


      }else{
      redirect('login','refresh');
    }

}

public function getpreofromdatepdata(){

            $session = $this->session->userdata('user_data');

          if($this->session->userdata('user_data'))
          {
            
             $page = 'dashboard/admin_dashboard/home/todaypreop/today_preop_partial_view';

             $from_dt =date('Y-m-d',strtotime($this->input->post('from_dt')));
             $to_date =date('Y-m-d',strtotime($this->input->post('to_date')));
            


            $result['todayPreopdata']=$this->dashboardmodel->getAllRecordTodayPreop($from_dt,$to_date);

                       
             
          
             $this->load->view($page,$result);

      
         }else{
            redirect('login','refresh');
          }
}

  
public function getAlldischargelist(){

     $session = $this->session->userdata('user_data');

    if($this->session->userdata('user_data'))
    {

      $session = $this->session->userdata('user_data');      
      $page = 'dashboard/admin_dashboard/home/todaydischarge/today_discharge_list';
      $result=[];
      $header = "";
    
       $result['from_dt'] = date('Y-m-d');
       $result['to_dt'] = date('Y-m-d');
      
       $result['dischargelist']=$this->dashboardmodel->getAlldischargelist($result['from_dt'],$result['to_dt']);

       
         //pre($result['todayPreopdata']);exit;


       createbody_method($result, $page, $header, $session);


      }else{
      redirect('login','refresh');
    }

}   

public function getpartialdischargelist(){

            $session = $this->session->userdata('user_data');

          if($this->session->userdata('user_data'))
          {
            
             $page = 'dashboard/admin_dashboard/home/todaydischarge/discharge_partial_list_view';

             $from_dt =date('Y-m-d',strtotime($this->input->post('from_dt')));
             $to_date =date('Y-m-d',strtotime($this->input->post('to_date')));
            


            $result['dischargelist']=$this->dashboardmodel->getAlldischargelist($from_dt,$to_date);

                       
             
          
             $this->load->view($page,$result);

      
         }else{
            redirect('login','refresh');
          }
}  



}/* end of class */
