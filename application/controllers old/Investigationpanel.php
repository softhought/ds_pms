<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Investigationpanel extends CI_Controller {
    public $IN = NULL;

	 public function __construct() {


        parent::__construct();
        $this->load->library('session');
        $this->load->model('commondatamodel','commondatamodel',TRUE);
        $this->load->model('Investigationpanelmodel','Investigationpanelmodel',TRUE);
        $this->IN = & get_instance();
       
    }

  public function index()
    {
        $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
            $session = $this->session->userdata('user_data');      
            $page = 'dashboard/admin_dashboard/investigation_panel/investigation_panel_list.php';
            
            
            $result['investigationpanel']=$this->Investigationpanelmodel->getallInvestigationpanel();;
            
            $header = "";
            createbody_method($result, $page, $header, $session);
        }else{
            redirect('login','refresh');
        }
    }


    public function addInvestigationPanel()
    {
        $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
            if($this->uri->rsegment(3) == NULL)
            {
                $result['mode'] = "ADD";
                $result['btnText'] = "Save";
                $result['btnTextLoader'] = "Saving...";
                $inpanelID = 0;
                $result['investpanelEditdata'] = [];
                
                //getAllRecordWhereOrderBy($table,$where,$orderby)
                
                
            
            }
            else
            {
                $result['mode'] = "EDIT";
                $result['btnText'] = "Update";
                $result['btnTextLoader'] = "Updating...";
                $inpanelID = $this->uri->segment(3);
                
            $where_investigation_panel = [
                    'investigation_panel.id' => $inpanelID
                ];

                // getSingleRowByWhereCls(tablename,where params)
            $result['investpanelEditdata'] = $this->commondatamodel->getSingleRowByWhereCls('investigation_panel',$where_investigation_panel);   
            //pre($result['medicineEditdata']);exit;
  
            }
            $result['inpanelID']=$inpanelID;
            $header = "";
             
            $result['investigation'] = $this->Investigationpanelmodel->getAllInvestioncomp();                
          
              //print_r($result['investigation']);   
            $page = 'dashboard/admin_dashboard/investigation_panel/investigationpanel_add_edit';
            createbody_method($result, $page, $header,$session);
        }
        else
        {
            redirect('login','refresh');
        }
    }

    public function investigationpanel_action() {

        $session = $this->session->userdata('user_data');
        if($this->session->userdata('user_data'))
        {
            $json_response = array();
            $formData = $this->input->post('formDatas');
            parse_str($formData, $dataArry);
            
            //pre($dataArry);exit;
            $inpanelID = trim(htmlspecialchars($dataArry['inpanelID']));
            $mode = trim(htmlspecialchars($dataArry['mode']));
            $panelname = trim(htmlspecialchars($dataArry['panelname']));

           
            
            $investigation = $dataArry['investigation'];
            $length = count($investigation);
            $investigationdata ="";
            for ($i=0; $i < $length ; $i++) { 
                
                 if($i>0){
                $investigationdata = $investigationdata.",".$investigation[$i];
                }
                else{
                    $investigationdata = $investigation[$i];
                }
                
            }

             //do not require in this time
             
        //     $need_instruct = trim(htmlspecialchars($dataArry['chk_option']));

        //     $intructiondt ="";
        //     if($need_instruct == 'Y'){

        //     $instruct_option = $dataArry['instruct_option'];
            
        //     $instructlength = count($instruct_option);
            
        //     for ($j=0; $j < $instructlength ; $j++) { 
                
        //          if($j>0){
        //         $intructiondt = $intructiondt."*".$instruct_option[$j];
        //         }
        //         else{
        //             $intructiondt = $instruct_option[$j];
        //         }
                
        //     }
        // }
             
            if($panelname!="")
            {
    
                
                
                if($inpanelID>0 && $mode=="EDIT")
                {
                    /*  EDIT MODE
                     *  -----------------
                    */

                     // $upd_array = array(
                     //                    'panel_name' => $panelname,
                     //                       'investigation' => $investigationdata,
                     //                       'is_instruction'=>$need_instruct,
                     //                       'instruction'=>$intructiondt
                                      
                     //                 );
                      $upd_array = array(
                                        'panel_name' => $panelname,
                                           'investigation' => $investigationdata
                                      
                                     );
                      $upd_where = array('investigation_panel.id' => $inpanelID);

                     $update = $this->commondatamodel->updateSingleTableData('investigation_panel',$upd_array,$upd_where);
                    
                    
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

            
                      // $investi_panel_array = array(
                      //                     'panel_name' => $panelname,
                      //                      'investigation' => $investigationdata,
                      //                      'is_instruction'=>$need_instruct,
                      //                      'instruction'=>$intructiondt
                      //                    );
                      $investi_panel_array = array(
                                          'panel_name' => $panelname,
                                           'investigation' => $investigationdata
                                           
                                         );
                       //pre($occu_array);exit();
                         $insertData = $this->commondatamodel->insertSingleTableData('investigation_panel',$investi_panel_array);

                    

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

    public function getinvestigation($data){

        

        $arrdata = explode(',', $data);

        for ($i=0; $i < count($arrdata) ; $i++) { 

            $where = array('investigation_comp_id'=>$arrdata[$i]
                          );

            $investgationname[] = $this->commondatamodel->getSingleRowByWhereCls('investigation_component',$where);
            //exit;
        }
       return $investgationname; 
       //pre($investgationname);
     }


}