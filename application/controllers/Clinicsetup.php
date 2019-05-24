<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Clinicsetup extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('commondatamodel','commondatamodel',TRUE);
        // $this->load->model('dashboardmodel','dashboardmodel',TRUE);
    }


    public function index()
    {
        $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
            $session = $this->session->userdata('user_data');      
            $page = 'dashboard/admin_dashboard/clinic_setup/clinic_setup';
            $result['headerText']="Setup Your Clinic Details";
            $result['DaysList']=$this->commondatamodel->getAllDropdownData('day_master');
            //pre( $result['DaysList']);
            $header = "";
            createbody_method($result, $page, $header, $session);
        }else{
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






}/* end of class */