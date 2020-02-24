<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('createbody_method'))
{
    function createbody_method($body_content_data = '',$body_content_page = '',$body_content_header='',$data,$heared_menu_content='')
    {
      
	  
	  $CI =& get_instance();
	  
	
	 $CI->load->model('menumodel','',TRUE);
	 $CI->load->model('login_model','',TRUE);
	 $CI->load->library('template');
	 $CI->load->library('session');
     $CI->load->model('commondatamodel','commondatamodel',TRUE);
	 /* leftmenu */
	
	 $left_menu = $CI->menumodel->getAllAdministrativeMenu('menu_master');


	 $data['bodyview'] = $body_content_page;
	 $data['leftmenusidebar'] = '';
	 $data['headermenu'] = $body_content_header;
     $session = $CI->session->userdata('user_data');
     $whereId = array('user_id'=>$session['userid']);
     $data['userrole'] = $CI->commondatamodel->getSingleRowByWhereCls('user_master',$whereId)->user_role;

     if($data['userrole'] == 5){


     	$data['username'] = $CI->commondatamodel->getSingleRowByWhereCls('user_master',$whereId)->user_name;
     	
     }else{

     	$wheredocId = array('doctor_id'=>$session['userid']); 
     	$data['username'] = $CI->commondatamodel->getSingleRowByWhereCls('doctor_master',$wheredocId)->doctor_name;

     }

	
	 $CI->template->setHeader($heared_menu_content);
	 $CI->template->setBody($body_content_data);
	 $CI->template->setLeftmenu($left_menu);
	
	 
	 //$CI->template->view('default_layout', array('body'=>$body_content_page,'leftmenu'=>'leftmenu_view'), $data);
	   $CI->template->view('default_view', array('body'=>$body_content_page), $data);
		
	
    }   
}