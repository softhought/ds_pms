<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Medicinecategory extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('commondatamodel','commondatamodel',TRUE);
       
    }


    public function index()
    {
        $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
            $session = $this->session->userdata('user_data');      
            $page = 'dashboard/admin_dashboard/medicine_category/medicine_category_list.php';
            
            
            $result['medicineCategoryList']=$this->commondatamodel->getAllDropdownData('medicine_category');
            //pre( $result['DaysList']);
            $header = "";
            createbody_method($result, $page, $header, $session);
        }else{
            redirect('login','refresh');
        }
    }

    public function medicine_category_check(){
       
    $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
          
            $madicinecategory = trim($this->input->post('madicinecategory'));
            
            $where_medicine_category = array(
                           'medicine_category.category'=>$madicinecategory

                          );

            $madcatdata = $this->commondatamodel->getSingleRowByWhereCls('medicine_category',$where_medicine_category);
           
            //print_r($madcatdata);
            if(!empty($madcatdata)){
               
               $json_response = array(
                            "msg_status" => 1,
                            "msg_data" => "This Medicine aleady exists..."
                        );
            
            }
            else{
                 $json_response = array(
                            "msg_status" => 0,
                            "msg_data" => "This Medicine aleady exists..."
                        );
            }
            header('Content-Type: application/json');
            echo json_encode( $json_response );
            exit;
                 
           
  }
  else{
            redirect('login','refresh');
        }
}


public function addMedicineCategory()
    {
        $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
            if($this->uri->rsegment(3) == NULL)
            {
                $result['mode'] = "ADD";
                $result['btnText'] = "Save";
                $result['btnTextLoader'] = "Saving...";
                $medcatID = 0;
                $result['medcatEditdata'] = [];
                
                //getAllRecordWhereOrderBy($table,$where,$orderby)
                
                
            
            }
            else
            {
                $result['mode'] = "EDIT";
                $result['btnText'] = "Update";
                $result['btnTextLoader'] = "Updating...";
                $medcatID = $this->uri->segment(3);
                
            $where_medicine_category = [
                    'medicine_category.med_cat_id' => $medcatID
                ];

                // getSingleRowByWhereCls(tablename,where params)
            $result['medcatEditdata'] = $this->commondatamodel->getSingleRowByWhereCls('medicine_category',$where_medicine_category);   
            //pre($result['medicineEditdata']);exit;
  
            }
            $result['medcatID']=$medcatID;
            $header = "";
                            
          
                 
            $page = 'dashboard/admin_dashboard/medicine_category/medicine_category_add_edit.php';
            createbody_method($result, $page, $header,$session);
        }
        else
        {
            redirect('login','refresh');
        }
    }

    public function medicineCategoryaction() {

        $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
            $json_response = array();
            $formData = $this->input->post('formDatas');
            parse_str($formData, $dataArry);
            
        
            $medcatID = trim(htmlspecialchars($dataArry['medcatID']));
            $mode = trim(htmlspecialchars($dataArry['mode']));
            $medicinename = trim(htmlspecialchars($dataArry['medicinename']));
            
        
            if($medicinename!="")
            {
    
                
                
                if($medcatID>0 && $mode=="EDIT")
                {
                    /*  EDIT MODE
                     *  -----------------
                    */

                     $upd_array = array(
                                        'category' => $medicinename
                                                                                
                                     );
                      $upd_where = array('medicine_category.med_cat_id' => $medcatID);

                     $update = $this->commondatamodel->updateSingleTableData('medicine_category',$upd_array,$upd_where);
                    
                    
                    if($update)
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

            
                      $medcat_array = array(
                                          'category' => $medicinename
                                          
                                         );

                         $insertData = $this->commondatamodel->insertSingleTableData('medicine_category',$medcat_array);

                    

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
 

            }
            else
            {
                $json_response = array(
                        "msg_status" =>0,
                        "msg_data" => "All fields are required"
                    );
            }

            header('Content-Type: application/json');
            echo json_encode( $json_response );
            exit;

            

        }
        else
        {
            redirect('adminpanel','refresh');
        }
    }

   } 