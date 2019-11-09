<script src="<?php echo(base_url());?>assets/js/adm_scripts/case_addedit.js"></script>
  <script src="<?php echo(base_url());?>assets/js/adm_scripts/gynccology_addedit.js"></script>

<style>
	.allymdlabel{
		top:-13px ! important;
	}

  .marginall{
    
    margin-bottom: 13px;
  }
  .zindexregular{
  	top:-17px !important;
  }	

</style>


 <div id="patientCaseManagment">



  <input type="hidden" name="mode" id="mode" value="<?php echo $bodycontent['mode']; ?>" />
   <input type="hidden" name="caseID" id="caseID" value="<?php echo $bodycontent['caseID']; ?>" />
          <!--<?php echo $bodycontent['patientmasterEditdata']->patientname; ?> -->     

    <section class="content mainSectionPCasecard" >
        <div class="container-fluid">
            <div class="row clearfix">
                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header thmcolor">

                                <img src="<?php echo base_url(); ?>assets/images/mother.png" class="cardIcon whitebg" alt="Patient" />

                                <!-- <h2 class="head_title" id="patient_case_title">
                                	<button type="button" class="btn bg-indigo btn-sm waves-effect">&nbsp;&nbsp;&nbsp;&nbsp;Patient : <?php echo $bodycontent['patientmasterEditdata']->patientname; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                                  <button type="button" class="btn bg-purple btn-sm waves-effect">&nbsp;&nbsp;&nbsp;Case No : <?php echo $bodycontent['patientCaseEditdata']->case_no;?>&nbsp;&nbsp;&nbsp;</button>
                                </h2>       -->
                                <div id="patient_primary_info">
                                  <p> <?php echo $bodycontent['patientmasterEditdata']->patientname; ?></p>
                                  <p> Case No : <?php echo $bodycontent['patientCaseEditdata']->case_no;?></p>
                                </div>
                                
                         
                            </div> <!-- End of header -->

                            <!-- <hr class="customhr" style="width:40%;"> -->

                            <div class="body" id="patientcase_body">
                                <div class="demo-masked-input">
   
                                 <div class="row clearfix stageStepSection"><!-- start of trearment stage -->

                                        
                                        <!-- <ul class="nav nav-tabs thmcolor" role="tablist">
                                          <li role="presentation" class="active">
                                             
                                              <button type="button" class="btn btn-block  waves-effect tabbtn" id="antenantalbtn"><i class="material-icons">home</i> Antenantal</button>
                                          </li>
                                          <li role="presentation" class="">
                                            

                                              <button type="button" class="btn btn-block waves-effect tabbtn tabtnnonclck" id="preopbtn"><i class="material-icons">pregnant_woman</i> Pre op</button>

                                          </li>
                                          <li role="presentation" class="">
                                             
                                              <button type="button" class="btn btn-block  waves-effect tabbtn tabtnnonclck" id="postopbtn"> <i class="material-icons">assignment_ind</i> Post op</button>	 	

                                          </li>
                                          <li role="presentation" class="">

                                          <button type="button" class="btn btn-block  waves-effect tabbtn tabtnnonclck" id="dischargebtn"> <i class="material-icons">local_hotel</i> Discharge</button>

                                            
                                          </li>
                                      </ul> -->

                                    </div> <!-- end of trearment stage -->
                                    <section class="treatmentsection" id="gynccology_section">
                                    <div class="row clearfix" style="#border: 1px solid gray;"> <!--start of info body -->

                                   <div class="col-sm-2 leftmenuPatientCase">
                                    		
                                    <button type="button" class="btn btn-block btn-xs waves-effect tab_lf_btn" id="antenantal_left_tab_menu_1"><span><i class="material-icons">assignment_ind</i></span>&nbsp;Patient Info</button>
                                     <button type="button" class="btn btn-block btn-xs waves-effect tab_lf_btn changecss"  id="antenantal_left_tab_menu_4"><span><i class="material-icons">receipt</i></span>Chief Complaints</button>
                                     <button type="button" class="btn btn-block btn-xs waves-effect tab_lf_btn changecss"  id="antenantal_left_tab_menu_6"><span><i class="material-icons">today</i></span>Other Relevant History</button>
                                     <button type="button" class="btn btn-block btn-xs waves-effect tab_lf_btn"  id="antenantal_left_tab_menu_5"><span><i class="material-icons">looks_one</i></span>Chief Complaint 
                                     Deatils</button>
                                    
                                   
                                     <!-- <button type="button" class="btn btn-block btn-xs waves-effect tab_lf_btn prescription_menu_btn"  id="antenantal_left_tab_menu_7"><span><i class="material-icons">note</i></span>&nbsp;Prescription</button>

                                    <button type="button" class="btn btn-block btn-xs waves-effect 
                                    tab_lf_btn"  id="antenantal_left_tab_menu_8"><span><i class="material-icons">print</i></span>&nbsp;Print</button> -->
                                </div>

                            <!-- start of right side content-->

                           <div class="col-sm-10 rightContentBlock" style="border: 0px solid #eeecec;">
                           <section class="antenantalDataSection patientBlockSection" id="antenantal_left_tab_menu_1_section">
                                <center class="headingtitile_patient"><h5 class="title_head">&#9733; Patient Info </h5></center>
          			                <br>


                          <div id="basic_patient_info_div"><!-- start of basic_patient_info_div -->
                                
                                <form class="form-area" name="gynccologypatientBasicForm" id="gynccologypatientBasicForm" >
                                    <input type="hidden" name="mode" id="mode" value="<?php echo $bodycontent['mode']; ?>" />
                                  
                                    <input type="hidden" name="caseID" id="caseID" value="<?php echo $bodycontent['caseID']; ?>" />
                                    <input type="hidden" name="patientID" id="patientID" value="<?php echo $bodycontent['patientmasterEditdata']->patient_id; ?>" />
                                                            <div class="demo-masked-input">
                                                            <div class="row clearfix">
                                                              <!--<div class="col-sm-2"></div>-->
                                                                        <div class="col-sm-4">

                                                                            <div class="form-group form-float">
                                                                                <div class="form-line">
                                                                                    <input type="text" class="form-control" name="selfmobile" id="selfmobile" autocomplete="off"  onKeyUp="numericFilter(this);" maxlength="10" value="<?php echo $bodycontent['patientmasterEditdata']->selfmobile; ?>" >
                                                                                    <label class="form-label"> Self Mobile No</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-4">
                                                                            <div class="form-group form-float">
                                                                                <div class="form-line">
                                                                                    <input type="text" class="form-control" name="alternate_mobile" id="alternate_mobile" autocomplete="off"  onKeyUp="numericFilter(this);" maxlength="10" value="<?php echo $bodycontent['patientmasterEditdata']->alternate_mobile; ?>" >
                                                                                    <label class="form-label">Husband /Guardian Mobile</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                              </div>

                                                            <div class="row clearfix">
                                                              <!-- <div class="col-sm-2"></div> -->
                                                                        <div class="col-sm-4">
                                                                            <div class="form-group form-float">
                                                                                <div class="form-line">
                                                                                    <input type="text" class="form-control" name="patientname" id="patientname" autocomplete="off" value="<?php echo $bodycontent['patientmasterEditdata']->patientname; ?>" >
                                                                                    <label class="form-label">Name</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-4">
                                                                            <div class="form-group form-float">
                                                                                <div class="form-line">
                                                                                    <input type="text" class="form-control" name="patientage" id="patientage" autocomplete="off" value="<?php echo $bodycontent['patientmasterEditdata']->patientage; ?>" >
                                                                                    <label class="form-label">Age</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                                                
                                                                                                            
                                                            </div>

                                                          <div class="row clearfix">
                                                            <!-- <div class="col-sm-2"></div> -->
                                                            <div class="col-sm-4">
                                                                <div class="form-group form-float">
                                                                <label class="form-label selectlabel">Gender</label>
                                                              <select name="gender" id="gender" class="form-control show-tick" data-live-search="true" tabindex="-98">
                                                              
                                                                <?php 

                                                                foreach ($bodycontent['genderList'] as $value) {  ?>
                                                                  <option value="<?php echo $value->id;?>"
                                                                    
                                                                      <?php if(($bodycontent['mode']=="EDIT") && $value->id==$bodycontent['patientmasterEditdata']->patientgender){echo "selected";}else{echo "";} ?>    
                                                                  

                                                                        ><?php echo $value->gender?></option>
                                                                <?php     } ?>
                                                                  
                                                              </select> 
                                                                            </div>
                                                                        </div>

                                                                                             
                                                                                                            
                                                        </div>

                                                          <div class="row clearfix">
                                                             
                                                          <div class="col-sm-8">
                                                                            <div class="form-group form-float">
                                                                                <div class="form-line">
                                                                                    <textarea rows="1" name="address" id="address" class="form-control no-resize"  style="overflow: hidden; overflow-wrap: break-word; height: 32px;" autocomplete="off"
                                                                                      ><?php if($bodycontent['mode']=="EDIT"){echo $bodycontent['patientmasterEditdata']->address;} ?></textarea>
                                                                                    <label class="form-label">Address</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                            </div> 



                                                            </div><!-- end of demo-masked-input-->

                                                            <div class="row clearfix">
                                                              <div class="col-sm-12">
                                                              <p id="caseregmsg" class="form_error"></p>
                                                              </div>
                                                            </div>

                                                            <div class="row clearfix">
                                                                
                                                                <div class="col-sm-8 colcenter">
                                                                  
                                                                  <button type="submit" class="btn bg-pink waves-effect patientupdButton" id="gynpatientbasicsavebtn"><i class="material-icons">cached</i> 
                                                                    <span><?php echo $bodycontent['btnText']; ?></span>
                                                                  </button> 

               

                                                                  <span class="btn bg-pink waves-effect loaderbtn" id="gynpatientloaderbtn" style="display:none;"><?php echo $bodycontent['btnTextLoader']; ?></span>
                                                                        
                                                                </div>
                                                                
                                                                <div class="col-sm-4"></div>
                                                            </div>

                                                                  

                                                                      </form>

                                                            

                                                        
                                    	
                            </div><!-- end of basic_patient_info_div -->

                             </section>

       <form class="form-area" name="GynccologyBasicRecordForm" id="GynccologyBasicRecordForm" >
         <input type="hidden" name="ifchiefChangedata" id="ifchiefChangedata" value="N">
         <input type="hidden" name="caseID" id="caseID" value="<?php echo $bodycontent['caseID']; ?>" />
   <!-- <input type="hidden" name="GynccologyBasicInfoMode" id="GynccologyBasicInfoMode" value="" /> --> 

            <section class="antenantalDataSection patientBlockSection customAccordian" id="antenantal_left_tab_menu_4_section">

          <center class="headingtitile_patient"><h5 class="title_head">&#9733; Chief Complaints</h5></center>

   
       

            <!-- Multiple Items To Be Open -->
   <div class="row clearfix formgap">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
         <div class="row clearfix">
             <div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
               <div class="panel-group" id="accordion_19" role="tablist" aria-multiselectable="true">
                 <div class="panel panel-col-teal">
                 <div class="panel-heading" role="tab" id="headingOne_19">
                 <h4 class="panel-title">
                  <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne_19" aria-expanded="true" aria-controls="collapseOne_19">
                     <i class="material-icons">av_timer</i>
                     <!-- <i class="more-less glyphicon glyphicon-plus"></i> -->
                     Chief Complaints
                  </a>
                  </h4>
                 </div>
                 <div id="collapseOne_19" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_19">
                 <div class="panel-body">

                  <div class="row clearfix">
                     <div class="col-sm-3"><label class="form-label"><u>Complaints</u></label>  </div>
                      <div class="col-sm-offset-3 col-sm-5"><label class="form-label"><u>Duration</u></label>  </div>
                       
                                                                     
                                                                          
                   </div>  

                   <?php
                    $i=1;$j=0;
                    
                    if(!empty($bodycontent['chiefcomplaintsdetails'])){
                    	$isDatachiefcomplaint = 'Y';
                    }
                    else{
                          $isDatachiefcomplaint = 'N';	
                    }

                    foreach ($bodycontent['AllchiefComplaints'] as $AllchiefComplaints) {
                   	//pre($AllchiefComplaints['chiefcompalintsparrentData']);exit;
                   	if(empty($AllchiefComplaints['chiefcompalintschildData'])){
                   ?>
                    <div class="row clearfix">

                            <div class="col-sm-3" style="margin-top: 24px;">
                            	<div class="form-group form-group">
	                                 <div class="input-group">
                         <input type="hidden" name="gynccology_insertedID[]" id="gynccology_insertedID_<?php echo $i; ?>" value="<?php if($isDatachiefcomplaint == 'Y'){ echo $bodycontent['chiefcomplaintsdetails'][$j]->id; } else{ echo '0'; } ?>">
	                     <input type="hidden" name="is_check[]" id="is_check_<?php echo $i; ?>" value="<?php if($isDatachiefcomplaint == 'Y'){ if($bodycontent['chiefcomplaintsdetails'][$j]->is_check=='Y'){echo 'Y';}else{ echo 'N';  } }?>">
                         <input type="hidden" name="complaint_id[]" id="complaint_id_<?php echo $i; ?>" value="<?php echo $AllchiefComplaints['chiefcompalintsparrentData']->id; ?>">  	
                         
                       
                         <input type="checkbox" name="chief_complaints[]" id="complaints_checkbox_<?php echo $i; ?>" data-check = is_check_<?php echo $i; ?> data-year="year_<?php echo $i; ?>" data-month="month_<?php echo $i; ?>" data-day = "day_<?php echo $i; ?>" data-select = "complainttype_<?php echo $i; ?>" data-complaint-id = "<?php echo $i; ?>" data-insert-id = "gynccology_insertedID_<?php echo $i; ?>" class="filled-in chk-col-deep-purple inputreadonly" <?php if($isDatachiefcomplaint == 'Y'){ if($bodycontent['chiefcomplaintsdetails'][$j]->is_check == 'Y'){ ?> checked <?php } } ?> >
                          <label for="complaints_checkbox_<?php echo $i; ?>"><?php echo $AllchiefComplaints['chiefcompalintsparrentData']->complaint_name; ?></label>

                            	
                            	
                            	</div>  
	                          </div>
                           


                           </div>
                
                  	<div class="col-sm-2">
                  		<label>YEAR</label>
                         <div class="form-group form-float">
                	    <div class="form-line input-group">
                	 
                        <select name="year[]" id="year_<?php echo $i; ?>" class="form-control show-tick obsthist ischangechiefcomplaint yearvalueCarryforward"  data-live-search="true" tabindex="-98" <?php if($isDatachiefcomplaint == 'Y'){ if($bodycontent['chiefcomplaintsdetails'][$j]->is_check == 'N'){ ?> disabled <?php } } else{ ?> disabled <?php } ?> >
                               <option value=""> &nbsp; </option>
                            <?php  
                                for($year=1;$year<=80;$year++) { ?>
                                	   
                                      <option <?php if($isDatachiefcomplaint == 'Y'){ if($bodycontent['chiefcomplaintsdetails'][$j]->year == $year){ ?> selected <?php } } ?> value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                 <?php   } ?>
                                                          
                                  </select>





                                                          
                                
                     </div>
                  </div>
                        
                      </div>

                     <div class="col-sm-2">
                     	<label>MONTH</label>
                         <div class="form-group form-float">
                	    <div class="form-line input-group">

                	    	 <select name="month[]" id="month_<?php echo $i; ?>" class="form-control show-tick obsthist ischangechiefcomplaint monthvalueCarryforward"  data-live-search="true" tabindex="-98" <?php if($isDatachiefcomplaint == 'Y'){ if($bodycontent['chiefcomplaintsdetails'][$j]->is_check == 'N'){ ?> disabled <?php } } else{ ?> disabled <?php } ?>>
                               <option value=""> &nbsp; </option>
                            <?php  
                                foreach ($bodycontent['Onetotwelvedropdown'] as $Onetotwelvedropdown) { ?>
                                	   
                                      <option <?php if($isDatachiefcomplaint == 'Y'){ if($bodycontent['chiefcomplaintsdetails'][$j]->month == $Onetotwelvedropdown){ ?> selected <?php } } ?> value="<?php echo $Onetotwelvedropdown; ?>"><?php echo $Onetotwelvedropdown; ?></option>
                                 <?php   } ?>
                                                          
                                  </select>
                	    	    
                	    	                            
                     </div>
                  </div>
                        
                      </div>
                      	<div class="col-sm-2">
                      		<label>DAY</label>
                         <div class="form-group form-float">
                	    <div class="form-line input-group">
                	    	                     	    	      
                                 <input type="text" class="form-control ischangechiefcomplaint dayvalueCarryforward" placeholder="" name="day[]" id="day_<?php echo $i; ?>" autocomplete="off" value="<?php if($isDatachiefcomplaint == 'Y'){ echo $bodycontent['chiefcomplaintsdetails'][$j]->day; } ?>" onKeyUp="numericFilter(this);" <?php if($isDatachiefcomplaint == 'Y'){ if($bodycontent['chiefcomplaintsdetails'][$j]->is_check == 'N'){ ?> readonly <?php } } else{ ?> readonly <?php } ?>>
                           
                                
                     </div>
                  </div>
                        
                      </div>



                      <div class="col-sm-3" style="margin-top: 19px;">
                         <div class="form-group form-float">
                            <div class="input-group">
                                
                                <select name="complainttype[]" id="complainttype_<?php echo $i; ?>" class="form-control show-tick obsthist ischangechiefcomplaint"  data-live-search="true" tabindex="-98" <?php if($isDatachiefcomplaint == 'Y'){ if($bodycontent['chiefcomplaintsdetails'][$j]->is_check == 'N'){ ?> disabled <?php } } else{ ?> disabled <?php } ?>>
                               <option value="">Select</option>
                            <?php $complaint = array('occassional'=>'Occassional','recurrent'=>'Recurrent');
                                foreach ($complaint as $key => $value) { ?>
                                	
                                      <option <?php if($isDatachiefcomplaint == 'Y'){ if($bodycontent['chiefcomplaintsdetails'][$j]->complaint_type == $key){ ?> selected <?php } } ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                 <?php   } ?>
                                                          
                                  </select>   
                              </div>
                           </div>
                        
                      </div>
                    
                  </div>
                <?php } else{  ?>
                        <!-- <div style="border: 1px solid red;"> -->
                	     <div class="row clearfix">

                            <div class="col-sm-3">
                         
                          
                          
                            	<label class="form-label"><u><?php echo $AllchiefComplaints['chiefcompalintsparrentData']->complaint_name; ?></u></label>
                                                
                           </div>
                       </div>
                     <?php  
                          foreach ($AllchiefComplaints['chiefcompalintschildData'] as $chiefcompalintschildData) {
                      ?>
                      <div class="row clearfix">
                        
                            <div class="col-sm-3" style="margin-top: 24px;">

                            	<div class="form-group form-group">
	                                 <div class="input-group" style="text-indent: 10px;">

                         <input type="hidden" name="gynccology_insertedID[]" id="gynccology_insertedID_<?php echo $i; ?>" value="<?php if($isDatachiefcomplaint == 'Y'){ echo $bodycontent['chiefcomplaintsdetails'][$j]->id; } else{ echo '0'; } ?>">
	                    <input type="hidden" name="is_check[]" id="is_check_<?php echo $i; ?>" value="<?php if($isDatachiefcomplaint == 'Y'){ if($bodycontent['chiefcomplaintsdetails'][$j]->is_check=='Y'){echo 'Y';}else{ echo 'N';  }  } ?>">             	
                         <input type="hidden" name="complaint_id[]" id="complaint_id_<?php echo $i; ?>" value="<?php echo $chiefcompalintschildData->id; ?>">  	
                         
                       
                         <input type="checkbox" name="chief_complaints[]" id="complaints_checkbox_<?php echo $i; ?>" data-check = is_check_<?php echo $i; ?> data-year="year_<?php echo $i; ?>" data-month="month_<?php echo $i; ?>" data-day = "day_<?php echo $i; ?>" data-select = "complainttype_<?php echo $i; ?>" data-complaint-id = "<?php echo $i; ?>" data-insert-id = "gynccology_insertedID_<?php echo $i; ?>" class="filled-in chk-col-deep-purple inputreadonly menstrualcheck" <?php if($isDatachiefcomplaint == 'Y'){ if($bodycontent['chiefcomplaintsdetails'][$j]->is_check == 'Y'){ ?> checked <?php } } ?> >
                          <label for="complaints_checkbox_<?php echo $i; ?>"><?php echo $chiefcompalintschildData->complaint_name; ?></label>

                            	
                            	
                            	</div>  
	                          </div>
                                                    
                                                
                           </div>

                     	<div class="col-sm-2">
                     		<label>YEAR</label>
                         <div class="form-group form-float">
                	    <div class="form-line input-group">
                	    	      <select name="year[]" id="year_<?php echo $i; ?>" class="form-control show-tick obsthist ischangechiefcomplaint"  data-live-search="true" tabindex="-98" <?php if($isDatachiefcomplaint == 'Y'){ if($bodycontent['chiefcomplaintsdetails'][$j]->is_check == 'N'){ ?> disabled <?php } } else{ ?> disabled <?php } ?>>
                               <option value=""> &nbsp; </option>
                            <?php 
                                for($year=1;$year<=80;$year++) { ?>
                                	   
                                      <option <?php if($isDatachiefcomplaint == 'Y'){ if($bodycontent['chiefcomplaintsdetails'][$j]->year == $year){ ?> selected <?php } } ?> value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                 <?php   } ?>
                                                          
                                  </select>
                                                          
                                
                     </div>
                  </div>
                        
                      </div>

                     <div class="col-sm-2">
                     	 <label>MONTH</label>
                         <div class="form-group form-float">
                	    <div class="form-line input-group">
                	    	   
                	    	    <select name="month[]" id="month_<?php echo $i; ?>" class="form-control show-tick obsthist ischangechiefcomplaint"  data-live-search="true" tabindex="-98" <?php if($isDatachiefcomplaint == 'Y'){ if($bodycontent['chiefcomplaintsdetails'][$j]->is_check == 'N'){ ?> disabled <?php } } else{ ?> disabled <?php } ?>>
                               <option value=""> &nbsp; </option>
                            <?php
                                foreach ($bodycontent['Onetotwelvedropdown'] as $Onetotwelvedropdown) { ?>
                                	   
                                      <option <?php if($isDatachiefcomplaint == 'Y'){ if($bodycontent['chiefcomplaintsdetails'][$j]->month == $Onetotwelvedropdown){ ?> selected <?php } } ?> value="<?php echo $Onetotwelvedropdown; ?>"><?php echo $Onetotwelvedropdown; ?></option>
                                 <?php   } ?>
                                                          
                                  </select>                        
                     </div>
                  </div>
                        
                      </div>
                      	<div class="col-sm-2">
                      		<label>DAY</label>
                         <div class="form-group form-float">
                	    <div class="form-line input-group">
                	    	                     	    	      
                                 <input type="text" class="form-control ischangechiefcomplaint" placeholder="" name="day[]" id="day_<?php echo $i; ?>" autocomplete="off" value="<?php if($isDatachiefcomplaint == 'Y'){ echo $bodycontent['chiefcomplaintsdetails'][$j]->day; } ?>" onKeyUp="numericFilter(this);" <?php if($isDatachiefcomplaint == 'Y'){ if($bodycontent['chiefcomplaintsdetails'][$j]->is_check == 'N'){ ?> readonly <?php } } else{ ?> readonly <?php } ?>>
                           
                                
                     </div>
                  </div>
                        
                      </div>



                      <div class="col-sm-3" style="margin-top: 19px;">
                         <div class="form-group form-float">
                            <div class="input-group " id="">
                                
                                <select name="complainttype[]" id="complainttype_<?php echo $i; ?>" class="form-control show-tick obsthist ischangechiefcomplaint"  data-live-search="true" tabindex="-98" <?php if($isDatachiefcomplaint == 'Y'){ if($bodycontent['chiefcomplaintsdetails'][$j]->is_check == 'N'){ ?> disabled <?php } } else{ ?> disabled <?php } ?>>
                               <option value="">Select</option>
                                <?php 
                                     foreach ($complaint as $key => $value) { ?>
                                	
                                      <option <?php if($isDatachiefcomplaint == 'Y'){ if($bodycontent['chiefcomplaintsdetails'][$j]->complaint_type == $key){ ?> selected <?php } } ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                 <?php   } ?>
                                                          
                                  </select>   
                              </div>
                           </div>
                        
                      </div>
                  </div>
             

                    <?php $j++; $i++;  } $i--; $j--;} ?>
                     <!-- </div> -->
                <?php $j++; $i++; } ?>
                      

                                                  
                  </div>




						              </div>
						            </div>

           </div>
         </div>
       </div>
     </div>
   </div>
   <div class="row clearfix">
                           <div class="col-sm-4"></div>                                     
                        <div class="col-sm-8 colcenter">
                                                                  
                          <button type="submit" class="btn bg-pink waves-effect gynccologysavebtn" id="gynccologysavebtn"><i class="material-icons">cached</i> 
                                  <span><?php echo $bodycontent['gynccologybtnText']; ?></span>
                                         </button> 
                          <span class="btn bg-pink waves-effect loaderbtn gynccologyloaderbtn" id="gynccologyloaderbtn" style="display:none;"><?php echo $bodycontent['gynccologybtnTextLoader']; ?></span>
                                                                        
                          </div>
                                                                
                            
                       </div>
 </section>

          <section class="antenantalDataSection patientBlockSection customAccordian" id="antenantal_left_tab_menu_6_section">

          <center class="headingtitile_patient"><h5 class="title_head">&#9733; Other Relevant History</h5></center>  
           <div class="row clearfix formgap">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
           <div class="row clearfix">
               <div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
                 <div class="panel-group" id="accordion_19" role="tablist" aria-multiselectable="true">         
              
               <div class="panel panel-col-teal">

               <div class="panel-heading" role="tab" id="headingTwo_19">
                <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" href="#collapseTwo_19" aria-expanded="false" aria-controls="collapseTwo_19">
                 <i class="material-icons">low_priority</i>
                 Menstrual History </a> </h4>
                </div>
                 <div id="collapseTwo_19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_19">
                 <div class="panel-body"><!-- start of menstrual_history body  -->

                <input type="hidden" name="gynccologyID" id="gynccologyID" value="<?php if($bodycontent['isgynccologydata'] == 'Y'){ echo $bodycontent['gynccologyID']; }else{echo '0';} ?>">

                   <div class="row clearfix">
                      <div class="col-sm-3">
                      <div class="form-group form-float">
                        <div class="input-group" id="menstrual_menracheerr">
                          <label class="form-label selectlabel zindex3">Menarche</label>
                          <select name="menstrual_menarche" id="menstrual_menarche" class="form-control show-tick"  data-live-search="true" tabindex="-98">
                          <option value="0">Select Years</option>
                          <?php 

                          foreach ($bodycontent['Onetotwentydropdown'] as $menarchdropdown) {  ?>
                          <option value="<?php echo $menarchdropdown;?>"

                          <?php if($bodycontent['isgynccologydata'] == 'Y'){ if($bodycontent['gynccologymasterdetails']->menstrual_menarche == $menarchdropdown){ ?> selected <?php } } ?>

                            ><?php echo $menarchdropdown;?></option>
                            <?php     } ?>
                                                    
                            </select>   
                        </div>
                      </div>
                      
                    </div>

                     <div class="col-sm-3">
                      <div class="form-group form-float">
                        <div class="input-group" id="menstrual_lmp_daterr">
                          <label class="form-label selectlabel zindex3">LMP Date</label>
                         <input type="text" class="form-control datepicker"  name="menstrual_lmp_date" id="menstrual_lmp_date" placeholder="Select Date" autocomplete="off" value="<?php if($bodycontent['isgynccologydata'] == 'Y' && $bodycontent['gynccologymasterdetails']->menstrual_lmp_date != ""){ echo date('l d M Y',strtotime($bodycontent['gynccologymasterdetails']->menstrual_lmp_date)); } ?>">  
                        </div>
                      </div>
                      
                    </div>
                   </div>

                    <div class="row clearfix">
                
                    <div class="col-sm-3" style="text-align: right;">
                     
                       
                          <label>Cycle Type:</label>
                            
                       
                    </div>


                      <div class="col-sm-3">
                         <div class="form-group form-float">
                           <div class="form-line">
                            <input type="text" class="form-control txtsamelevel nomarginTop" name="menstrual_cycle_days" id="menstrual_cycle_days" autocomplete="off" value="30" >
                               <label class="form-label">Cycle Days</label>
                            </div>
                          </div>
                     </div>

                     <div class="col-sm-3">
                        <div class="form-group form-float">
                          <div class="input-group" id="menstrual_floweerr">
                            <label class="form-label selectlabel zindex3">plus/minus</label>
                            <select name="cycle_days_pm" id="cycle_days_pm" class="form-control show-tick"  data-live-search="true" tabindex="-98">
                            <option value="P"

                             <?php if($bodycontent['isgynccologydata'] == 'Y'){ if($bodycontent['gynccologymasterdetails']->cycle_days_pm == 'P'){ ?> selected <?php } } ?>

                            > +</option>
                            <option value="M" <?php if($bodycontent['isgynccologydata'] == 'Y'){ if($bodycontent['gynccologymasterdetails']->cycle_days_pm == 'M'){ ?> selected <?php } } ?> > -</option>                           
                            </select>   
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-3">
                         <div class="form-group form-float">
                           <div class="form-line">
                            <input type="text" class="form-control txtsamelevel nomarginTop" name="cycle_plusminusdays" id="cycle_plusminusdays" autocomplete="off" value="<?php if($bodycontent['isgynccologydata'] == 'Y'){ echo $bodycontent['gynccologymasterdetails']->cycle_plusminusdays; } ?>" >
                               <label class="form-label">Days</label>
                            </div>
                          </div>
                     </div>
    
                  </div>
               
                  <div class="row clearfix">
                       <div class="col-sm-3"></div>

                    <div class="col-sm-3">
                      <div class="form-group form-float">
                        <div class="input-group" id="menstrual_cycle_typeerr1">
                          <select name="menstrual_cycle_type1" id="menstrual_cycle_type1" class="form-control show-tick"  data-live-search="true" tabindex="-98">
                          <option value="0"> Select </option>
                          <?php 

                          foreach ($bodycontent['menstrualCycleType1'] as $cycletyperow1) {  ?>
                          <option value="<?php echo $cycletyperow1;?>"

                         <?php if($bodycontent['isgynccologydata'] == 'Y'){ if($bodycontent['gynccologymasterdetails']->menstrual_cycle_type1 == $cycletyperow1){ ?> selected <?php } } ?>

                            ><?php echo $cycletyperow1;?></option>
                            <?php  } ?>
                                                    
                            </select>   
                        </div>
                      </div>
                      
                    </div>

                    <div class="col-sm-3">
                      <div class="form-group form-float">
                        <div class="input-group" id="menstrual_cycle_typeerr2">
                          <select name="menstrual_cycle_type2" id="menstrual_cycle_type2" class="form-control show-tick"  data-live-search="true" tabindex="-98">
                          <option value="0"> Select </option>
                          <?php 

                          foreach ($bodycontent['menstrualCycleType2'] as $cycletyperow2) {  ?>
                          <option value="<?php echo $cycletyperow2;?>"

                           <?php if($bodycontent['isgynccologydata'] == 'Y'){ if($bodycontent['gynccologymasterdetails']->menstrual_cycle_type2 == $cycletyperow2){ ?> selected <?php } } ?>

                            ><?php echo $cycletyperow2;?></option>
                            <?php     } ?>
                                                    
                            </select>   
                        </div>
                      </div>
                      
                    </div>

                    <div class="col-sm-3">
                      <div class="form-group form-float">
                        <div class="input-group" id="menstrual_cycle_typeerr3">
                          <select name="menstrual_cycle_type3" id="menstrual_cycle_type3" class="form-control show-tick"  data-live-search="true" tabindex="-98">
                          <option value="0"> Select </option>
                          <?php 

                          foreach ($bodycontent['menstrualCycleType3'] as $cycletyperow3) {  ?>
                          <option value="<?php echo $cycletyperow3;?>"

                         <?php if($bodycontent['isgynccologydata'] == 'Y'){ if($bodycontent['gynccologymasterdetails']->menstrual_cycle_type3 == $cycletyperow3){ ?> selected <?php } } ?>

                            ><?php echo $cycletyperow3;?></option>
                            <?php     } ?>
                                                    
                            </select>   
                        </div>
                      </div>
                      
                    </div>

                    </div>

                <div class="row clearfix">
                  <div class="col-sm-3"></div>

                    <div class="col-sm-3">
                         <div class="form-group form-float">
                           <div class="form-line">
                            <input type="text" class="form-control txtsamelevel nomarginTop" name="menstrual_duration_days" id="menstrual_duration_days" autocomplete="off" value="<?php if($bodycontent['isgynccologydata'] == 'Y'){ echo $bodycontent['gynccologymasterdetails']->menstrual_duration_days; } ?>" >
                               <label class="form-label">Duration Days</label>
                            </div>
                          </div>
                     </div>
          	

                    <div class="col-sm-3">
                      <div class="form-group form-float">
                        <div class="input-group" id="menstrual_floweerr">
                            <label class="form-label selectlabel zindex3">Flow</label>
                            <select name="menstrual_flow" id="menstrual_flow" class="form-control show-tick"  data-live-search="true" tabindex="-98">
                            <option value="0"> &nbsp; </option>
                            <?php 

                            foreach ($bodycontent['menstrualCycleFlow'] as $flowrow) {  ?>
                            <option value="<?php echo $flowrow;?>"

                             <?php if($bodycontent['isgynccologydata'] == 'Y'){ if($bodycontent['gynccologymasterdetails']->menstrual_flow == $flowrow){ ?> selected <?php } } ?>                                                         
                                                          

                              ><?php echo $flowrow;?></option>
                              <?php     } ?>
                                                      
                              </select>   
                        </div>
                      </div>
                      
                    </div>

                    <div class="col-sm-3">
                      <div class="form-group form-float">
                        <div class="input-group" id="menstrual_painerr">
                            <label class="form-label selectlabel zindex3">Pain</label>
                            <select name="menstrual_pain" id="menstrual_pain" class="form-control show-tick"  data-live-search="true" tabindex="-98">
                            <option value="0"> &nbsp; </option>
                            <?php 

                            foreach ($bodycontent['menstrualCyclePain'] as $Painrow) {  ?>
                            <option value="<?php echo $Painrow;?>"

                             <?php if($bodycontent['isgynccologydata'] == 'Y'){ if($bodycontent['gynccologymasterdetails']->menstrual_pain == $Painrow){ ?> selected <?php } } ?> 
                                                            
                                                          

                              ><?php echo $Painrow;?></option>
                              <?php     } ?>
                                                      
                              </select>   
                        </div>
                      </div>
                      
                    </div>
                	
                </div> 	
                <div class="row clearfix">

                	 <div class="col-sm-3" style="text-align: right;">
                      
                          <label>Previous Dates:</label>
                        
                      </div>
                	<div class="col-sm-3">
                      <div class="form-group form-float">
                        <div class="input-group" id="menstrual_cycle_pre_dateerr">
                          <label class="form-label selectlabel zindex3">Date</label>
                         <input type="text" class="form-control datepicker"  name="menstrual_cycle_pre_date1" id="menstrual_cycle_pre_date1" placeholder="Select Date" autocomplete="off" value="<?php if($bodycontent['isgynccologydata'] == 'Y' && $bodycontent['gynccologymasterdetails']->menstrual_cycle_pre_date1 != ""){ echo date('l d M Y',strtotime($bodycontent['gynccologymasterdetails']->menstrual_cycle_pre_date1)); } ?>">  
                        </div>
                      </div>
                      
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group form-float">
                        <div class="input-group" id="menstrual_cycle_pre_dateerr2">
                          <label class="form-label selectlabel zindex3">Date</label>
                         <input type="text" class="form-control datepicker"  name="menstrual_cycle_pre_date2" id="menstrual_cycle_pre_date2" placeholder="Select Date" autocomplete="off" value="<?php if($bodycontent['isgynccologydata'] == 'Y' && $bodycontent['gynccologymasterdetails']->menstrual_cycle_pre_date2 != ""){ echo date('l d M Y',strtotime($bodycontent['gynccologymasterdetails']->menstrual_cycle_pre_date2)); } ?>">  
                        </div>
                      </div>
                      
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group form-float">
                        <div class="input-group" id="menstrual_cycle_pre_dateerr3">
                          <label class="form-label selectlabel zindex3">Date</label>
                         <input type="text" class="form-control datepicker"  name="menstrual_cycle_pre_date3" id="menstrual_cycle_pre_date3" placeholder="Select Date" autocomplete="off" value="<?php if($bodycontent['isgynccologydata'] == 'Y' && $bodycontent['gynccologymasterdetails']->menstrual_cycle_pre_date3 != ""){ echo date('l d M Y',strtotime($bodycontent['gynccologymasterdetails']->menstrual_cycle_pre_date3)); } ?>">  
                        </div>
                      </div>
                      
                    </div>
                                   	
                </div>
                 <div class="row clearfix">
                 	<div class="col-sm-3"></div>
                 	 <div class="col-sm-3">
                      <div class="form-group form-float">
                        <div class="input-group" id="menstrual_cycle_pre_dateerr4">
                          <label class="form-label selectlabel zindex3">Date</label>
                         <input type="text" class="form-control datepicker"  name="menstrual_cycle_pre_date4" id="menstrual_cycle_pre_date4" placeholder="Select Date" autocomplete="off" value="<?php if($bodycontent['isgynccologydata'] == 'Y' && $bodycontent['gynccologymasterdetails']->menstrual_cycle_pre_date4 != ""){ echo date('l d M Y',strtotime($bodycontent['gynccologymasterdetails']->menstrual_cycle_pre_date4)); } ?>">  
                        </div>
                      </div>
                      
                    </div>
                </div>
                <div class="row clearfix">

                    <div class="col-sm-6">
                      
                          <label>Menopause attained how many years back:</label>
                        
                      </div>

                      <div class="col-sm-3">
                      <div class="form-group form-float">
                        <div class="input-group" id="menopause_yearbackerr">
                           
                            <select name="menopause_year_back" id="menopause_year_back" class="form-control show-tick"  data-live-search="true" tabindex="-98">
                            <option value="0"> &nbsp; </option>
                            <?php 

                            foreach ($bodycontent['Onetotwentydropdown'] as $Onetotwentydropdown) {  ?>
                            <option value="<?php echo $Onetotwentydropdown;?>"

                               <?php if($bodycontent['isgynccologydata'] == 'Y'){ if($bodycontent['gynccologymasterdetails']->menopause_year_back == $Onetotwentydropdown){ ?> selected <?php } } ?>                     

                              ><?php echo $Onetotwentydropdown;?></option>
                              <?php     } ?>
                                                      
                              </select>   
                        </div>

                      
                 </div>
             </div>
           </div>
           <div class="rows clearfix">
             <div class="col-sm-3">
                      
                          <label>Notes:</label>
                        
                      </div>
                  <div class="col-sm-6">
                   <div class="form-group form-float">
                       <div class="form-line focused">
                         <textarea rows="1" name="menopause_notes" id="menopause_notes" class="form-control no-resize" style="overflow: hidden; overflow-wrap: break-word; height: 32px;" autocomplete="off"><?php if($bodycontent['isgynccologydata'] == 'Y'){ echo $bodycontent['gynccologymasterdetails']->menopause_notes; } ?>
                         		
                         	</textarea>
                             <!-- <label class="form-label">Notes</label> -->
                       </div>
                      </div>
                   </div>
                </div>

                   
    




                                                   
                  </div><!-- end of menstrual_history body  -->
             </div>
         </div>



               <div class="panel panel-col-teal">
               <div class="panel-heading" role="tab" id="headingThree_19">
                <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" href="#collapseThree_19" aria-expanded="false" aria-controls="collapseThree_19">
                 <i class="material-icons">chrome_reader_mode</i>
                 Obstetric History </a> </h4>
                </div>
                 <div id="collapseThree_19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree_19">
                 <div class="panel-body"><!-- start of Obstetrics History body  -->

                  <div class="row clearfix">
                     <div class="col-sm-2"><label class="form-label">Parity :</label>  </div>
                     
                      <div class="col-sm-3">
                         <div class="form-group form-float">
                            <div class="input-group termdeliveryerr" id="termdeliveryerr">
                                <label class="form-label selectlabel zindex3">Term Delivery</label>
                                <select name="termdelivery" id="termdelivery" class="form-control show-tick obsthist"  data-live-search="true" tabindex="-98">
                                <option value=""> &nbsp; </option>
                                <?php 

                                foreach ($bodycontent['ZerotoTenDropDown'] as $termdelivery) {  ?>
                                <option value="<?php echo $termdelivery;?>"

                                 <?php if($bodycontent['isgynccologydata'] == 'Y'){ if($bodycontent['gynccologymasterdetails']->obstetric_term_delivery == $termdelivery){ ?> selected <?php } } ?>                                                              
                                                              

                                  ><?php echo $termdelivery;?></option>
                                  <?php     } ?>
                                                          
                                  </select>   
                              </div>
                           </div>
                        
                      </div>

                       <div class="col-sm-2">
                       <div class="form-group form-float marginall">
                         <div class="input-group paritypretermerr" id="paritypretermerr">
                         <label class="form-label selectlabel zindex3">Preterm</label>
                         <select name="paritypreterm" id="paritypreterm" class="form-control show-tick obsthist"  data-live-search="true" tabindex="-98">
                         <option value=""> &nbsp; </option>
                         <?php 

                         foreach ($bodycontent['ZerotoTenDropDown'] as $paritypretermrow) {  ?>
                         <option value="<?php echo $paritypretermrow;?>"

                            <?php if($bodycontent['isgynccologydata'] == 'Y'){ if($bodycontent['gynccologymasterdetails']->obstetric_preterm == $paritypretermrow){ ?> selected <?php } } ?>                                                  

                          ><?php echo $paritypretermrow;?></option>
                          <?php     } ?>
                                                   
                          </select>   
                           </div>
                           </div>
                      </div>

                    <div class="col-sm-2">
                      <div class="form-group form-float marginall">
                         <div class="input-group " id="parityabortionerr">
                         <label class="form-label selectlabel zindex3">Abortion</label>
                         <select name="parityabortion" id="parityabortion" class="form-control show-tick obsthist"  data-live-search="true" tabindex="-98">
                         <option value=""> &nbsp; </option>
                         <?php 

                         foreach ($bodycontent['ZerotoTenDropDown'] as $parityabortionrow) {  ?>
                         <option value="<?php echo $parityabortionrow;?>"

                             <?php if($bodycontent['isgynccologydata'] == 'Y'){ if($bodycontent['gynccologymasterdetails']->obstetric_aboration == $parityabortionrow){ ?> selected <?php } } ?>                                                   
                                                      

                          ><?php echo $parityabortionrow;?></option>
                          <?php     } ?>
                                                   
                          </select>   
                           </div>
                        </div>
                    </div>

                  <div class="col-sm-3">
                  <div class="form-group form-float marginall">
                         <div class="input-group " id="parityissueerr">
                         <label class="form-label selectlabel zindex3">Living Issue</label>
                         <select name="parityissue" id="parityissue" class="form-control show-tick"  data-live-search="true" tabindex="-98">
                         <option value=""> &nbsp; </option>
                         <?php 

                         foreach ($bodycontent['ZerotoTenDropDown'] as $parityissuerow) {  ?>
                         <option value="<?php echo $parityissuerow;?>"
                        
                          <?php if($bodycontent['isgynccologydata'] == 'Y'){ if($bodycontent['gynccologymasterdetails']->obstetric_living_issue == $parityissuerow){ ?> selected <?php } } ?> 
                                                                              

                          ><?php echo $parityissuerow;?></option>
                          <?php     } ?>
                                                   
                          </select>   
                           </div>
                         </div>
                        
                    </div>
                                        
                                                                         
                                                                          
                   </div>

                       <div class="row clearfix">
                                       
                       <div class="col-sm-2"></div>

                       <div class="col-sm-3">
                        <div class="form-group form-float" >
                         <div class="form-line">
                           <input type="text" class="form-control" name="no_of_lucs" id="no_of_lucs" autocomplete="off" value="<?php if($bodycontent['isgynccologydata'] == 'Y'){ echo $bodycontent['gynccologymasterdetails']->obstetric_no_of_lucs;  } ?>" >
                               <label class="form-label">No. Of LUCS</label>
                            </div>

                           </div>
                         
                       </div>
                       
                        <div class="col-sm-3">
                        <div class="form-group form-float" >
                         <div class="form-line">
                            <input type="text" class="form-control" name="no_of_suction" id="no_of_suction" autocomplete="off" value="<?php if($bodycontent['isgynccologydata'] == 'Y'){ echo $bodycontent['gynccologymasterdetails']->obstetric_no_of_suction;  } ?>">
                               <label class="form-label">No. Of Suction</label>
                            </div>

                           </div>
                         
                       </div>
                       
                       <div class="col-sm-4">
                         <div class="form-group form-float">
                           <div class="form-line">
                            <input type="text" class="form-control" name="spontaneous_abortion" id="spontaneous_abortion" autocomplete="off" value="<?php if($bodycontent['isgynccologydata'] == 'Y'){ echo $bodycontent['gynccologymasterdetails']->obs_spontaneous_abortion;  } ?>" >
                               <label class="form-label">Number of spontaneous abortion</label>
                            </div>
                          </div>
                       </div>

                       
    
                       </div>

                       <div class="row clearfix">

                       	<div class="col-sm-5">
                        <div class="form-group form-float">
                        <div class="input-group" id="menstrual_cycle_pre_dateerr4">
                          <label class="form-label selectlabel zindex3">Last Child Birth As On</label>
                         <input type="text" class="form-control datepicker"  name="lastchild_birth" id="lastchild_birth" placeholder="Select Date" autocomplete="off" value="<?php if($bodycontent['isgynccologydata'] == 'Y' && $bodycontent['gynccologymasterdetails']->last_child_birth != ''){ echo date('l d M Y',strtotime($bodycontent['gynccologymasterdetails']->last_child_birth));  } ?>">  
                        </div>
                      </div>
                      
                    </div>

                       	 
                        <div class="col-sm-4">
                        <div class="form-group form-float" >
                         <div class="form-line">
                            <input type="text" class="form-control" name="years_ago" id="years_ago" autocomplete="off" value="<?php if($bodycontent['isgynccologydata'] == 'Y'){ echo $bodycontent['gynccologymasterdetails']->years_ago;  } ?>">
                               <label class="form-label">Years Ago</label>
                            </div>

                           </div>
                         
                       </div>
                 <div class="col-sm-3">
                     <div class="form-group form-float">
                         <div class="input-group " id="any_molar_pregnancyerr">
                         <label class="form-label selectlabel zindex3">Any Molar Pregnancy</label>
                         <select name="any_molar_pregnancy" id="any_molar_pregnancy" class="form-control show-tick"  data-live-search="true" tabindex="-98">
                       <option value=""> &nbsp; </option> 
                         <?php 

                         foreach ($bodycontent['YesorNo'] as $YesorNo) {  ?>
                         <option value="<?php echo $YesorNo;?>"

                          <?php if($bodycontent['isgynccologydata'] == 'Y'){ if($bodycontent['gynccologymasterdetails']->molar_pregnancy == $YesorNo){ ?> selected <?php } } ?>                                                 

                          ><?php echo $YesorNo;?></option>
                          <?php     } ?>
                                                   
                          </select>   
                           </div>
                         </div>
                        
                    </div>
                       	
                       </div>
                       <?php if($bodycontent['isgynccologydata'] == 'Y' && $bodycontent['gynccologymasterdetails']->molar_pregnancy == 'Yes'){
                          
                          $hmbdisplay = 'display: block'; 

                        }else{
                        	$hmbdisplay = 'display: none';
                        }  ?>

                       <div class="row clearfix" id="how_many_back" style="<?php echo $hmbdisplay; ?>">

                       	<div class="col-sm-3">
                       
                               <label class="form-label">How Many Back:</label>
                          

                           </div>
                         
                       <div class="col-sm-3">
                        <div class="form-group form-float" >
                         <div class="form-line">
                            <input type="text" class="form-control" name="back_years" id="back_years" autocomplete="off" value="<?php if($bodycontent['isgynccologydata'] == 'Y'){ echo $bodycontent['gynccologymasterdetails']->pregnancy_years_back;  } ?>">
                               <label class="form-label">Years</label>
                            </div>

                           </div>
                         
                       </div>
                     
                      <div class="col-sm-3">
                        <div class="form-group form-float" >
                         <div class="form-line">
                            <input type="text" class="form-control" name="back_months" id="back_months" autocomplete="off" value="<?php if($bodycontent['isgynccologydata'] == 'Y'){ echo $bodycontent['gynccologymasterdetails']->pregnancy_months_back;  } ?>">
                               <label class="form-label">Months</label>
                            </div>

                           </div>
                         
                       </div>

                       	<div class="col-sm-3">
                        <div class="form-group form-float" >
                         <div class="form-line">
                            <input type="text" class="form-control" name="back_days" id="back_days" autocomplete="off" value="<?php if($bodycontent['isgynccologydata'] == 'Y'){ echo $bodycontent['gynccologymasterdetails']->pregnancy_days_back;  } ?>">
                               <label class="form-label">Days</label>
                            </div>

                           </div>
                         
                       </div>

                       	

                       

                      </div>

                       <div class="row clearfix">
                       	
                       	<div class="col-sm-3">
                       
                               <label class="form-label">Notes:</label>
                          

                           </div>
                  <div class="col-sm-6">
                   <div class="form-group form-float">
                       <div class="form-line focused">
                         <textarea rows="1" name="obstetric_history_notes" id="obstetric_history_notes" class="form-control no-resize" style="overflow: hidden; overflow-wrap: break-word; height: 32px;" autocomplete="off"><?php if($bodycontent['isgynccologydata'] == 'Y'){ echo $bodycontent['gynccologymasterdetails']->obstetric_history_notes;  } ?>

                         </textarea>
                            <!--  <label class="form-label">Notes</label> -->
                       </div>
                      </div>
                   </div>
                       	
                       </div>                           
                  </div><!-- end  of Obstetrics History body  -->
             </div>
         </div>

         <div class="panel panel-col-teal">
             <div class="panel-heading" role="tab" id="headingFour_19">
              <h4 class="panel-title">
             <a class="collapsed" role="button" data-toggle="collapse" href="#collapseFour_19" aria-expanded="false" aria-controls="collapseFour_19">
               <i class="material-icons">colorize</i>
               Others History </a> </h4>
                 </div>
               <div id="collapseFour_19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour_19">
                <div class="panel-body customLabel" style="font-weight:600;"><!-- start of others history body -->

                      

                 
                  <div class="row clearfix">
                                       
                  <div class="col-sm-2"><label class="form-label">Marrid Status:</label>  </div>
                     
                      <div class="col-sm-3">
                         <div class="form-group form-float">
                            <div class="input-group">
                              <!-- <label class="form-label selectlabel zindex3">Term Delivery</label> -->
                                <select name="married_status" id="married_status" class="form-control show-tick obsthist"  data-live-search="true" tabindex="-98">
                                <option value=""> &nbsp; </option> 
                                <?php 

                                foreach ($bodycontent['marriedfordropdown'] as $marriedfordropdown) {  ?>
                                <option value="<?php echo $marriedfordropdown;?>"

                                 <?php if($bodycontent['isgynccologydata'] == 'Y'){ if($bodycontent['gynccologymasterdetails']->others_married_status == $marriedfordropdown){ ?> selected <?php } } ?>                                                               
                                                              

                                  ><?php echo $marriedfordropdown;?></option>
                                  <?php     } ?>
                                                          
                                  </select>   
                              </div>
                           </div>
                        
                      </div>
                      <?php if($bodycontent['isgynccologydata'] == 'Y' && $bodycontent['gynccologymasterdetails']->others_married_status == 'Married' ){
                        
                         $marriedyearsdisp = 'display:block';
                       }else{
                        
                        $marriedyearsdisp = 'display:none';
                       } ?>
                  
                    <div class="col-sm-3" id="marriedyears" style="<?php echo $marriedyearsdisp; ?>">
                        <div class="form-group form-float" >
                         <div class="form-line">
                            <input type="text" class="form-control" name="married_years" id="married_years" autocomplete="off" value="<?php if($bodycontent['isgynccologydata'] == 'Y'){ echo $bodycontent['gynccologymasterdetails']->married_years;  } ?>">
                               <label class="form-label">Married Years</label>
                            </div>

                           </div>
                         
                       </div>
                 
             
    
                 </div>

               

             <div class="row clearfix">
             	<div class="col-sm-2"><label class="form-label">Trying For Pregnancy:</label>  </div>
                     
                      <div class="col-sm-3">
                         <div class="form-group form-float">
                            <div class="input-group">
                              <!-- <label class="form-label selectlabel zindex3">Term Delivery</label> -->
                                <select name="trying_for_pregnancy" id="trying_for_pregnancy" class="form-control show-tick obsthist"  data-live-search="true" tabindex="-98">
                                <option value=""> &nbsp; </option> 
                                <?php 

                                foreach ($bodycontent['YesorNo'] as $YesorNo) {  ?>
                                <option value="<?php echo $YesorNo;?>"

                                   <?php if($bodycontent['isgynccologydata'] == 'Y'){ if($bodycontent['gynccologymasterdetails']->trying_for_pregnancy == $YesorNo){ ?> selected <?php } } ?>                                                             
                                                              

                                  ><?php echo $YesorNo;?></option>
                                  <?php     } ?>
                                                          
                                  </select>   
                              </div>
                           </div>
                        
                      </div>

                       <?php if($bodycontent['isgynccologydata'] == 'Y' && $bodycontent['gynccologymasterdetails']->trying_for_pregnancy == 'Yes' ){
                        
                         $monthsyearsdisp = 'display:block';
                       }else{
                        
                        $monthsyearsdisp = 'display:none';
                       } ?>

                       
                        <div class="col-sm-3" id="homanyyears" style="<?php echo $monthsyearsdisp; ?>">
                        <div class="form-group form-float" >
                         <div class="form-line">
                            <input type="text" class="form-control" name="how_many_years" id="how_many_years" autocomplete="off" value="<?php if($bodycontent['isgynccologydata'] == 'Y'){ echo $bodycontent['gynccologymasterdetails']->how_many_years;  } ?>">
                               <label class="form-label">How Many Years</label>
                            </div>

                           </div>
                         
                       </div>



                       <div class="col-sm-3" id="homanymonths" style="<?php echo $monthsyearsdisp; ?>">
                        <div class="form-group form-float" >
                         <div class="form-line">
                            <input type="text" class="form-control" name="how_many_months" id="how_many_months" autocomplete="off" value="<?php if($bodycontent['isgynccologydata'] == 'Y'){ echo $bodycontent['gynccologymasterdetails']->how_many_months;  } ?>">
                               <label class="form-label">How Many Months</label>
                            </div>

                           </div>
                         
                       </div>

                      
             	
             </div>
                 </div><!-- End of others history body -->
               </div>
              </div> 
        
              <div class="panel panel-col-teal">
            <div class="panel-heading" role="tab" id="headingFive_19">
                <h4 class="panel-title">
                   <a class="collapsed" role="button" data-toggle="collapse" href="#collapseFive_19" aria-expanded="false" aria-controls="collapseFive_19">
                    <i class="material-icons">local_pharmacy</i>
                     Previous Surgery
                                                       
                 </a>
             </h4>
            </div>
          <div id="collapseFive_19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive_19">
            <div class="panel-body"><!-- start of Previous Surgery body -->
             
              <div class="row clearfix" style="">
                         <div class="col-sm-3">

                          <div class="form-group form-float searchableDesign marginall">
                              <div class="input-group " id="previous_surgeryerr">
                              <label class="form-label selectlabel" style="top: -17px;" >Surgery Name</label>
                              <div id="previous_surgerydrp">
                              <select name="surgeryID" id="surgeryID" class="form-control selpres show-tick changezindex" data-live-search="true" tabindex="-98">
                              	<option value="0"> &nbsp; </option>
                                        <?php 
                                            foreach ($bodycontent['surgeryList']  as $surgeryList ) { 
                                        ?>
                                          <option value="<?php echo $surgeryList->surgery_id;?>"

                                             
                                            ><?php echo $surgeryList->surgery_name;?></option>
                                        <?php
                                          }
                                        ?>
                                      
                        </select> 
                                </div>
                                
                                </div>
                          </div>


                        
                        </div>

                       <div class="col-sm-3">
                      <div class="form-group form-float marginall">
                        <div class="input-group">
                          <label class="form-label selectlabel" style="top: -17px;">Date</label>
                         <input type="text" class="form-control datepicker" style="z-index: unset;"  name="surgery_date" id="surgery_date" placeholder="Select Date" autocomplete="off" value="">  
                        </div>
                      </div>
                      
                    </div>
             
                    

                      <div class="col-sm-2">
                          <div class="form-group">
                            <!-- <label class="form-label upText">Action</label>  -->
                            <div class="icon-button-demo">
                                <button type="button" class="btn bg-pink waves-effect addPreviousSurgery">
                                    <i class="material-icons">add</i>
                                </button>
                            </div>
                           </div>
                      </div>
                          
                  </div>
                  <br>



              
             
             <!-- Previous Surgery Details -->


             
             <div class="row clearfix">
                                      
             <div class="col-sm-1"></div>

             <div class="col-sm-8">
              <div  id="detail_previousSurgery" class="customeTblDesign1" style="#border: 1px solid #e49e9e;">
                    <div class="table-responsive">
                           <?php
                          $surgeryrowno=0;
                                                   

                          // For Table style Purpose
                          if($bodycontent['isgynccologydata'] == 'Y')
                          {
                            $style_var = "display:block;width:100%;";
                          }
                          else
                          {
                            $style_var = "display:none;width:100%;";
                          }
                        ?>

                    
                    <table class="table  no-footer" style="<?php echo $style_var; ?>">
                        <thead>
                   <input type="hidden" name="rowno" id="rowno" value="0">      
                          
                        </thead>
                        <tbody>

                            <?php

                if($bodycontent['isgynccologydata'] == 'Y' && $bodycontent['gynccologymasterdetails']->pre_surgery_id != '')
                {
                	$array = $bodycontent['surgeryList']; 
                $allsurgery = explode(',', $bodycontent['gynccologymasterdetails']->pre_surgery_id);
              $allurgerydate = explode(',', $bodycontent['gynccologymasterdetails']->pre_surgery_date); 
                  for($i=0;$i<count($allsurgery);$i++) 
                  {

                    $surgeryrowno++;

                    foreach ($bodycontent['surgeryList'] as $value) {
                    	if($value->surgery_id == $allsurgery[$i]){

                    		$surgeryname = $value->surgery_name;
                    	}
                    }
                    
                ?>
                
           <tr id="rowprevious_surgery_<?php echo $surgeryrowno; ?>" class="row clearfix" >
    
    <td style="width:37%;text-align: left;"> 
						       <input type="hidden" name="surgeryID[]" class="PreviousSurgeryIDcls" id="surgeryID_<?php echo $surgeryrowno; ?>" value="<?php echo $allsurgery[$i]; ?>">   
                   <?php echo $surgeryname;  ?>       
							        
    </td>

    <td style="width:55%;text-align: left;"> 
						<input type="hidden" name="surgerydate[]" id="surgerydate_<?php echo $surgeryrowno; ?>" value="<?php if($allurgerydate[$i] != '*'){ echo date('Y-m-d',strtotime($allurgerydate[$i])); } else{ echo '*'; }?>">   
                   <?php if($allurgerydate[$i] != '*'){ echo date('l d M Y',strtotime($allurgerydate[$i])); } ?>    
							        
    </td>

     

						<td style="vertical-align: middle;">
							<?php 
                  if ($surgeryrowno!=0) {
                  
              ?> 
			<a href="javascript:;" class="delPreviousSurgery" id="delSurgeryRow_<?php echo $surgeryrowno; ?>" title="Delete">
					<i class="material-icons thmdarkTxtcolor">delete</i>
            <?php } ?> 

				</a>
			</td>				
				
		
		</tr>


              <?php   
                  }
                }

                  ?>
                    <input type="hidden" name="surgeryrowno" id="surgeryrowno" value="<?php echo $surgeryrowno;?>">      
                    
                        </tbody>
                    </table>
                        
                    </div>
                  
                    
                  </div>


                </div>
              </div>


                                                    
              </div><!-- End of Previous Surgery body -->
             </div>
           </div>




             <div class="panel panel-col-teal">
            <div class="panel-heading" role="tab" id="headingSix_19">
                <h4 class="panel-title">
                   <a class="collapsed" role="button" data-toggle="collapse" href="#collapseSix_19" aria-expanded="false" aria-controls="collapseSix_19">
                    <i class="material-icons">assignment_ind</i>
                     Surgery Planned
                                                       
                 </a>
             </h4>
            </div>
          <div id="collapseSix_19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix_19">
            <div class="panel-body"><!-- start of Surgery Planned body -->
             
              <div class="row clearfix" style="">
                         <div class="col-sm-3">

                          <div class="form-group form-float searchableDesign marginall">
                              <div class="input-group " id="surgery_plannederr">
                              <label class="form-label selectlabel" style="top: -17px;">Surgery Name</label>
                              <div id="surgery_planneddrp">
                              <select  name="surgeryPlannedID" id="surgeryPlannedID" class="form-control show-tick changezindex" data-live-search="true" tabindex="-98" >
                              	<option value="0"> &nbsp; </option>
                                        <?php 
                                            foreach ($bodycontent['surgeryList']  as $surgeryList ) { 
                                        ?>
                                          <option value="<?php echo $surgeryList->surgery_id;?>"

                                             
                                            ><?php echo $surgeryList->surgery_name;?></option>
                                        <?php
                                          }
                                        ?>
                                      
                        </select> 
                                </div>
                                
                                </div>
                          </div>

                        </div>

                       <div class="col-sm-3">
                      <div class="form-group form-float marginall">
                        <div class="input-group">
                          <label class="form-label selectlabel" style="top: -17px;">Date</label>
                         <input type="text" class="form-control datepicker" style="z-index: unset;"  name="surgery_planned_date" id="surgery_planned_date" placeholder="Select Date" autocomplete="off" value="">  
                        </div>
                      </div>
                      
                    </div>
             
                    

                      <div class="col-sm-2">
                          <div class="form-group">
                            <!-- <label class="form-label upText">Action</label>  -->
                            <div class="icon-button-demo">
                                <button type="button" class="btn bg-pink waves-effect addSurgeryPlanned">
                                    <i class="material-icons">add</i>
                                </button>
                            </div>
                           </div>
                      </div>
                          
                  </div>
                  <br>



              
             
             <!-- -Surgery Planned Details -->


             
             <div class="row clearfix">
                                      
             <div class="col-sm-1"></div>

             <div class="col-sm-8">
              <div  id="detail_PlannedSurgery" class="customeTblDesign1" style="#border: 1px solid #e49e9e;">
                    <div class="table-responsive">
                           <?php
                          $surgeryplannedrowno=0;
                                                   

                          // For Table style Purpose
                          if($bodycontent['isgynccologydata'] == 'Y')
                          {
                            $style_var = "display:block;width:100%;";
                          }
                          else
                          {
                            $style_var = "display:none;width:100%;";
                          }
                        ?>

                    
                    <table class="table  no-footer" style="<?php echo $style_var; ?>">
                        <thead>
                   <input type="hidden" name="rowno" id="rowno" value="0">      
                          
                        </thead>
                        <tbody>

                            <?php

                if($bodycontent['isgynccologydata'] == 'Y' && $bodycontent['gynccologymasterdetails']->planned_surgery_id != '')
                {
                	$array = $bodycontent['surgeryList']; 
                $allplannedsurgery = explode(',', $bodycontent['gynccologymasterdetails']->planned_surgery_id);
                $allplandedsurgerydate = explode(',', $bodycontent['gynccologymasterdetails']->planned_surgery_date); 
                  for($i=0;$i<count($allplannedsurgery);$i++) 
                  {

                    $surgeryplannedrowno++;

                    foreach ($bodycontent['surgeryList'] as $value) {
                    	if($value->surgery_id == $allplannedsurgery[$i]){

                    		$Plannedsurgeryname = $value->surgery_name;
                    	}
                    }
                    
                ?>
                
           <tr id="rowplanned_surgery_<?php echo $surgeryplannedrowno; ?>" class="row clearfix" >
    
    <td style="width:37%;text-align: left;"> 
						       <input type="hidden" name="surgeryplaID[]" class="SurgeryPlannedIDcls" id="surgeryplaID_<?php echo $surgeryplannedrowno; ?>" value="<?php echo $allplannedsurgery[$i];?>">   
                   <?php echo $Plannedsurgeryname;?>       
							        
    </td>

    <td style="width:55%;text-align: left;"> 
						       <input type="hidden" name="surgeryPladate[]" id="surgeryPladate_<?php echo $surgeryplannedrowno; ?>" value="<?php if($allplandedsurgerydate[$i] != '*'){ echo date('Y-m-d',strtotime($allplandedsurgerydate[$i])); } else{ echo '*'; } ?>">   
                  <?php if($allplandedsurgerydate[$i] != '*'){  echo date('l d M Y',strtotime($allplandedsurgerydate[$i])); } ?>       
							        
    </td>

     

						<td style="vertical-align: middle;">
							<?php 
                  if ($surgeryplannedrowno!=0) {
                  
              ?> 
			<a href="javascript:;" class="delPlannedSurgery" id="delplasurgeryRow_<?php echo $surgeryplannedrowno; ?>" title="Delete">
					<i class="material-icons thmdarkTxtcolor">delete</i>
            <?php } ?> 

				</a>
			</td>				
				
		
		</tr>


              <?php   
                  }
                }

                  ?>
                    <input type="hidden" name="surgeryplannedrowno" id="surgeryplannedrowno" value="<?php echo $surgeryplannedrowno;?>">      
                    
                        </tbody>
                    </table>
                        
                    </div>
                  
                    
                  </div>


                </div>
              </div>


                                                    
              </div><!-- End of Surgery Planned body -->
             </div>
           </div>




                                                
               

              

              <div class="panel panel-col-teal">
            <div class="panel-heading" role="tab" id="headingSeven_19">
                <h4 class="panel-title">
                   <a class="collapsed" role="button" data-toggle="collapse" href="#collapseSeven_19" aria-expanded="false" aria-controls="collapseSeven_19">
                    <i class="material-icons">add_box</i>
                     Regular Medicines
                                                       
                 </a>
             </h4>
            </div>
          <div id="collapseSeven_19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven_19">
            <div class="panel-body"><!-- start of regular medicine body -->
             <input type="hidden" name="isChangeRgularMedicine" id="isChangeRgularMedicine" value="N">
              <div class="row clearfix" style="">
                         <div class="col-sm-2">

                          <div class="form-group form-float searchableDesign marginall">
                              <div class="input-group " id="regular_medicineerr">
                              	
                              <label class="form-label upText selectlabel zindexregular">Medicine</label>
                              <div id="regular_medicinedrp">
                              <select name="selregular_medicine" id="selregular_medicine" class="form-control gynccologyselpres show-tick"  data-live-search="true" tabindex="-98">
                              <option value="0"> &nbsp; </option>
                              <?php 

                              foreach ($bodycontent['medicineList'] as $medicinelist) {  ?>
                              <option value="<?php echo $medicinelist->medicine_id;?>"

                                ><?php echo $medicinelist->medicine_name;?></option>
                                <?php     } ?>
                                                        
                                </select> 
                                </div>
                                
                                </div>
                          </div>


                        
                        </div>

                        <div class="col-sm-2">

                          <div class="form-group form-float searchableDesign marginall">
                            <div class="input-group" >
                              <label class="form-label upText selectlabel zindexregular">Dose</label>
                              <select name="selregular_dose" id="selregular_dose"  class="form-control gynccologyselpres show-tick"  data-live-search="true" tabindex="-98">
                                <option value=""> &nbsp; </option>
                                <?php 

                                foreach ($bodycontent['dosageList'] as $dosagelist) {  ?>
                                <option value="<?php echo $dosagelist;?>"

                                  ><?php echo $dosagelist;?></option>
                                  <?php     } ?>
                                                        
                              </select> 
                            </div>
                          </div>


                        </div>

                          <div class="col-sm-2">
                          <div class="form-group form-float searchableDesign marginall">
                            <div class="input-group " >
                                <label class="form-label upText selectlabel zindexregular">Frequency</label>
                                <select name="selregular_frequency" id="selregular_frequency" class="form-control gynccologyselpres show-tick"  data-live-search="true" tabindex="-98">
                                <option value=""> &nbsp; </option>
                                <?php 

                                foreach ($bodycontent['frequencyList'] as $frequencylist) {  ?>
                                <option value="<?php echo $frequencylist;?>"

                                  ><?php echo $frequencylist;?></option>
                                  <?php     } ?>
                                                          
                                  </select> 
                            </div>
                          </div>



                           
                         </div>

                        <div class="col-sm-2">
                        <div class="form-group form-float searchableDesign marginall">
                            <div class="input-group" >
                              <label class="form-label upText selectlabel zindexregular">For Last Yr.</label>
                              <select name="selregularmed_year" id="selregularmed_year" class="form-control gynccologyselpres show-tick" data-live-search="true" tabindex="-98">
                                      <option value="">&nbsp;</option>
                                        <?php
                                            for ($i=0; $i <= 30; $i++) {     
                                        ?>
                                          <option value="<?php echo $i;?>"
                                          
                                            ><?php echo $i;?></option>
                                        <?php
                                          }
                                        ?>
                                      
                              </select> 
                            </div>
                        </div>


                        </div>

                        <div class="col-sm-3">

                        <div class="form-group form-float searchableDesign marginall">
                          <div class="input-group" >
                          <label class="form-label upText selectlabel zindexregular">For Last (month)</label>

                          <select name="selregularmed_month" id="selregularmed_month" class="form-control show-tick gynccologyselpres" data-live-search="true" tabindex="-98">
                                  <option value="">&nbsp;</option>
                                    <?php
                                        for ($i=0; $i <= 30; $i++) {     
                                    ?>
                                      <option value="<?php echo $i;?>"
                                        ><?php echo $i;?></option>
                                    <?php
                                      }
                                    ?>
                                  
                                </select> 
                          </div>
                        </div>

                        </div>
                   

                   
                    

                      <div class="col-sm-1">
                          <div class="form-group">
                            <!-- <label class="form-label upText">Action</label>  -->
                            <div class="icon-button-demo">
                                <button type="button" class="btn bg-pink waves-effect addRegularMedicines">
                                    <i class="material-icons">add</i>
                                </button>
                            </div>
                           </div>
                      </div>
                          
                  </div>
                  <br>



              
             
             <!-- -------------------------- Regular Medicines Details-------------------------- -->


             
             <div class="row clearfix">
                                      
             <div class="col-sm-1"></div>

             <div class="col-sm-8">
              <div  id="detail_regularmedicine" class="customeTblDesign1" style="#border: 1px solid #e49e9e;">
                    <div class="table-responsive">
                           <?php
                          $regularmedicinerowno=0;
                          $detailCount = 0;
                         

                          // For Table style Purpose
                          if($bodycontent['regularMedicineEditdata'] == 'Y')
                          {
                            $style_var = "display:block;width:100%;";
                          }
                          else
                          {
                            $style_var = "display:none;width:100%;";
                          }
                        ?>

                    
                    <table class="table  no-footer" style="<?php echo $style_var; ?>">
                        <thead>
                   <input type="hidden" name="rowno" id="rowno" value="1">      
                          
                        </thead>
                        <tbody>

                            <?php

                if($bodycontent['regularMedicineEditdata'] == 'Y')
                {
                  foreach ($bodycontent['regularMedicineList'] as $key => $value) 
                  {
                    $regularmedicinerowno++;
                    
                ?>
                
           <tr id="rowRegularMedicine_<?php echo $regularmedicinerowno; ?>" class="row clearfix">


         

            <td style="width:40%;text-align: left;"> 
						       <input type="hidden" name="regularmedicine[]" id="regularmedicine_<?php echo $regularmedicinerowno; ?>" value="<?php echo $value->medicine_mst_id;?>">   
                   <?php echo $value->medicine_name;?>       
							        
    </td>

    <td style="width:20%;text-align: left;"> 
						       <input type="hidden" name="regularmedicinedose[]" id="regularmedicinedose_<?php echo $regularmedicinerowno; ?>" value="<?php echo $value->medicine_dose;?>">   
                   <?php echo $value->medicine_dose;?>      
							        
    </td>
    <td style="width:20%;text-align: left;"> 
                   <input type="hidden" name="regularmedicinefrequency[]" id="regularmedicinefrequency_<?php echo $regularmedicinerowno; ?>" value="<?php echo $value->medicine_frequency;?>">   
                  <?php echo $value->medicine_frequency;?>       
                      
    </td>

    <td style="width:20%;text-align: left;"> 
						       <input type="hidden" name="regularmedforYear[]" id="regularmedforYearerr_<?php echo $regularmedicinerowno; ?>" value="<?php echo $value->for_year;?>">   
                   <?php echo $value->for_year;?>     
							        
    </td>

    <td style="width:20%;text-align: center;"> 
						       <input type="hidden" name="regularmedforMonth[]" id="regularmedforMonth_<?php echo $regularmedicinerowno; ?>" value="<?php echo $value->for_month;?>">   
                   <?php echo $value->for_month;?>       
							        
    </td>
      

         

            <td style="vertical-align: middle;">
              <?php 
                  if ($regularmedicinerowno != 0) {
                  
              ?> 
      <a href="javascript:;" class="delRegularMedicine gynccologyselpres" id="delDocRow_<?php echo $regularmedicinerowno; ?>" title="Delete">
          <i class="material-icons thmdarkTxtcolor" >delete</i>
          <?php } ?> 

        </a>
      </td> 

      
          </tr>


              <?php   
                  }
                }

                  ?>
                    <input type="hidden" name="regularmedicinerowno" id="regularmedicinerowno" value="<?php echo $regularmedicinerowno;?>">      
                    
                        </tbody>
                    </table>
                        
                    </div>
                  
                    
                  </div>


                </div>
              </div>


                                                    
              </div><!-- End of regular medicine body -->
             </div>
           </div>


           <div class="panel panel-col-teal">
             <div class="panel-heading" role="tab" id="headingEight_19">
              <h4 class="panel-title">
             <a class="collapsed" role="button" data-toggle="collapse" href="#collapseEight_19" aria-expanded="false" aria-controls="collapseEight_19">
               <i class="material-icons">today</i>
              Previous Disease History </a> </h4>
                 </div>
               <div id="collapseEight_19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEight_19">
                <div class="panel-body customLabel" style="font-weight:600;"><!-- start of Previous disease body -->

                      

                 
                  <div class="row clearfix">
                                       
                  <div class="col-sm-4">


                      <div class="form-group form-float">
                        <div class="input-group" id="sel_diseaseserr">
                          <label class="form-label selectlabel zindex3">Diseases</label>
                          <select name="sel_diseases" id="sel_diseases" class="form-control show-tick sel_diseases"  data-live-search="true" tabindex="-98" multiple  data-selected-text-format="count">
                          <!--  <option value="0"> &nbsp; </option> -->
                          <?php 

                          foreach ($bodycontent['diseasesList'] as $diseaseslist) {  ?>
                          <option value="<?php echo $diseaseslist->diseases_id;?>"

                            <?php
                              if($bodycontent['isgynccologydata'] == 'Y'){
                                $selected_diseases=explode(",",(string)$bodycontent['gynccologymasterdetails']->previous_disease_id);
                                      if (in_array($diseaseslist->diseases_id, $selected_diseases)) {
                                            echo 'selected';
                                        }

                                    }

                            ?>
                                                          
                                                        

                            ><?php echo $diseaseslist->diseases_name;?></option>
                            <?php     } ?>
                                                    
                            </select>
                        <input type="hidden" name="sel_diseasesValues" id="sel_diseasesValues" value="<?php if($bodycontent['isgynccologydata'] == 'Y'){ echo $bodycontent['gynccologymasterdetails']->previous_disease_id; } ?>">     
                        <input type="hidden" name="isOtherDiseases" id="isOtherDiseases" value="<?php if($bodycontent['isgynccologydata'] == 'Y'){ echo $bodycontent['gynccologymasterdetails']->is_other_dieases;  }else{ echo 'N'; } ?>">
                          
                        </div>
                      </div>

                      
                 </div>

                    <?php if($bodycontent['isgynccologydata'] == 'Y' && $bodycontent['gynccologymasterdetails']->is_other_dieases == 'Y'){

                    	$disp_oth_dis='display:block;';
                    }else{
                    	$disp_oth_dis='display:none;';
                    }

                    ?>
                     <div class="col-sm-2" id="other_diseases_col" style="<?php echo $disp_oth_dis;?>" >
                      <div class="input-group" >
                      <label>Others Diseases</label>
                         <div class="form-line">
                         <input type="text" class="form-control" name="other_diseases" id="other_diseases" autocomplete="off"  placeholder="Others" value="<?php if($bodycontent['isgynccologydata'] == 'Y'){ echo $bodycontent['gynccologymasterdetails']->previous_other_disease;  } ?>" > 
                        </div> 
                    </div>  

                  </div>
                 
             
    
                 </div>

               

            
                 </div><!-- End of Previous Disease History body -->
               </div>
              </div>




        
						         </div>
						      </div>
					       </div>
					     </div>
					   </div>
					   <div class="row clearfix">
                           <div class="col-sm-4"></div>                                     
                        <div class="col-sm-8 colcenter">
                                                                  
                          <button type="submit" class="btn bg-pink waves-effect gynccologysavebtn" id="gynccologysavebtn"><i class="material-icons">cached</i> 
                                  <span><?php echo $bodycontent['gynccologybtnText']; ?></span>
                                         </button> 
                          <span class="btn bg-pink waves-effect loaderbtn gynccologyloaderbtn" id="gynccologyloaderbtn" style="display:none;"><?php echo $bodycontent['gynccologybtnTextLoader']; ?></span>
                                                                        
                          </div>
                                                                
                            
                       </div>
                   </section>


              <section class="antenantalDataSection patientBlockSection customAccordian" id="antenantal_left_tab_menu_5_section">


         <center class="headingtitile_patient"><h5 class="title_head">&#9733;Chief Complaint Details</h5></center>

   <?php $displayblock = "display:block;"; $displaynone = "display:none;"; ?>

              
            <!-- start of Pain Lower Abdomen  body  -->

   <div class="row clearfix formgap">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
         <div class="row clearfix">
             <div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
               <div class="panel-group" id="accgyn_19" role="tablist" aria-multiselectable="true">
                 <div class="panel panel-col-teal" id="complaint_1" style="<?php echo $displaynone; ?>" >
                 <div class="panel-heading" role="tab" id="headingNine_19">
                 <h4 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseNine_19" aria-expanded="true" aria-controls="collapseNine_19">
                     <i class="material-icons">chrome_reader_mode</i>
                     <!-- <i class="more-less glyphicon glyphicon-plus"></i> -->
                     Pain lower Abdomen
                  </a>
                  </h4>
                 </div>
                 <div id="collapseNine_19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingNine_19">
                 <div class="panel-body">
                 <?php if(!empty($bodycontent['AllpainLowerData'])){ $painEditdata = 'Y'; }else{ $painEditdata = 'N'; } ?>
                
                  <input type="hidden" name="paininsertedID" id="paininsertedID" value="<?php if($painEditdata == 'Y'){ echo($bodycontent['AllpainLowerData']->pain_lower_id); }else{ echo '0'; } ?>">
                  <input type="hidden" name="isChangeData" id="isChangeData" value="N">


                 
                  <div class="row clearfix">
                  	 <div class="col-sm-3" style="text-align: right;">
                                                             
                        

                          <label>Duration:</label>
                                                                        
                          </div>

                       <div class="col-sm-3">
                        <div class="form-group form-float">
                         <div class="form-line">
                           <input type="text" class="form-control paindata dtl_years_1" name="pain_duration_years" id="pain_duration_years" autocomplete="off" value="<?php if($painEditdata == 'Y'){ echo($bodycontent['AllpainLowerData']->duration_years); } ?>" >
                               <label class="form-label">Years</label>
                            </div>

                           </div>
                         
                       </div> 
                       <div class="col-sm-3">
                        <div class="form-group form-float">
                         <div class="form-line">
                           <input type="text" class="form-control paindata dtl_months_1" name="pain_duration_months" id="pain_duration_months" autocomplete="off" value="<?php if($painEditdata == 'Y'){ echo($bodycontent['AllpainLowerData']->duration_months); } ?>" >
                               <label class="form-label">Months</label>
                            </div>

                           </div>
                         
                       </div> 

                         <div class="col-sm-3">
                        <div class="form-group form-float" >
                         <div class="form-line">
                           <input type="text" class="form-control paindata dtl_days_1" name="pain_duration_days" id="pain_duration_days" autocomplete="off" value="<?php if($painEditdata == 'Y'){ echo($bodycontent['AllpainLowerData']->duration_days); } ?>" >
                               <label class="form-label">Days</label>
                            </div>

                           </div>
                         
                       </div>

                       

                        

                  </div>
                  <div class="row clearfix">
                  <div class="col-sm-3"></div>
                   <div class="col-sm-3">
                     <div class="form-group form-float">
                         <div class="input-group " id="parityissueerr">
                         <label class="form-label selectlabel zindex3">Severity</label>
                         <select name="pain_severity" id="pain_severity" class="form-control show-tick paindata"  data-live-search="true" tabindex="-98">
                         <option value=""> &nbsp; </option> 
                         <?php 

                         foreach ($bodycontent['severitydropdown'] as $severitydropdown) {  ?>
                         <option value="<?php echo $severitydropdown;?>"
                        
                           <?php if($painEditdata == 'Y'){ if($bodycontent['AllpainLowerData']->severty == $severitydropdown){ ?> selected <?php } } ?> 
                                                                              

                          ><?php echo $severitydropdown;?></option>
                          <?php     } ?>
                                                   
                          </select>   
                           </div>
                         </div>
                        
                    </div>
                 </div> 
                  <div class="row clearfix">
                   <div class="col-sm-3" style="text-align: right;">
                                                             
                            <label>Associted With:</label>
                                                                        
                          </div>

                   <div class="col-sm-3">
                     <div class="form-group form-float">
                         <div class="input-group " id="parityissueerr">
                         <label class="form-label selectlabel zindex3">Dysuria</label>
                         <select name="dysuria" id="dysuria" class="form-control show-tick paindata"  data-live-search="true" tabindex="-98">
                         <option value=""> &nbsp; </option> 
                         <?php 

                         foreach ($bodycontent['YesorNo'] as $YesorNo) {  ?>
                         <option value="<?php echo $YesorNo;?>"
                        
                          <?php if($painEditdata == 'Y'){ if($bodycontent['AllpainLowerData']->associte_dysuria == $YesorNo){ ?> selected <?php } } ?>
                                                                              

                          ><?php echo $YesorNo;?></option>
                          <?php     } ?>
                                                   
                          </select>   
                           </div>
                         </div>
                        
                    </div>
  
                 <div class="col-sm-3">
                     <div class="form-group form-float">
                         <div class="input-group " >
                         <label class="form-label selectlabel zindex3">Frequency Of Wination</label>
                         <select name="freq_of_wination" id="freq_of_wination" class="form-control show-tick paindata"  data-live-search="true" tabindex="-98">
                         <option value=""> &nbsp; </option> 
                         <?php 

                         foreach ($bodycontent['YesorNo'] as $YesorNo) {  ?>
                         <option value="<?php echo $YesorNo;?>"
                        
                           <?php if($painEditdata == 'Y'){ if($bodycontent['AllpainLowerData']->asso_frequency_wination == $YesorNo){ ?> selected <?php } } ?>
                                                                              

                          ><?php echo $YesorNo;?></option>
                          <?php     } ?>
                                                   
                          </select>   
                           </div>
                         </div>
                        
                    </div>

                    <div class="col-sm-3">
                     <div class="form-group form-float">
                         <div class="input-group ">
                         <label class="form-label selectlabel zindex3">Period Related Pain </label>
                         <select name="period_rel_pain" id="period_rel_pain" class="form-control show-tick"  data-live-search="true" tabindex="-98">
                         <option value=""> &nbsp; </option> 
                         <?php 

                         foreach ($bodycontent['YesorNo'] as $YesorNo) {  ?>
                         <option value="<?php echo $YesorNo;?>"
                        
                           <?php if($painEditdata == 'Y'){ if($bodycontent['AllpainLowerData']->period_pain == $YesorNo){ ?> selected <?php } } ?>
                                                                              

                          ><?php echo $YesorNo;?></option>
                          <?php     } ?>
                                                   
                          </select>  
                          <input type="hidden" name="isPeriodrelPain" id="isPeriodrelPain" value="<?php if($painEditdata == 'Y'){ echo($bodycontent['AllpainLowerData']->is_period_pain); }else{ echo 'N'; } ?>"> 
                           </div>
                         </div>
                        
                    </div>
                  	
                  </div>
 
                 <div class="row clearfix">
            <div class="col-sm-3"></div>
               <?php
                if($painEditdata == 'Y' && $bodycontent['AllpainLowerData']->is_period_pain == 'Y'){ 
               	$paindrpdisplay = "display:block;"; 
               }
               else{
               	$paindrpdisplay = "display:none;";
               }

                  ?>                     
                  <div class="col-sm-3" id="painDrp" style="<?php echo $paindrpdisplay; ?>">


                      <div class="form-group form-float">
                        <div class="input-group" >
                          <label class="form-label selectlabel zindex3">Pain</label>
                          <select name="sel_period_pain" id="sel_period_pain" class="form-control show-tick sel_period_pain"  data-live-search="true" tabindex="-98" multiple  data-selected-text-format="count">
                         <option value=""> &nbsp; </option>
                          <?php 

                          foreach ($bodycontent['paindropdown'] as $paindropdown) {  ?>
                          <option value="<?php echo $paindropdown;?>"

                                                                                      
                             <?php
                              if($painEditdata == 'Y'){
                                $selected_pain=explode(",",(string)$bodycontent['AllpainLowerData']->pain_name);
                                      if (in_array($paindropdown, $selected_pain)) {
                                            echo 'selected';
                                        }

                                    }

                            ?>                           

                            ><?php echo $paindropdown;?></option>
                            <?php     } ?>
                                                    
                            </select>
                        <input type="hidden" name="sel_painValues" id="sel_painValues" value="<?php if($painEditdata == 'Y'){ echo($bodycontent['AllpainLowerData']->pain_name); }else{ echo 'N'; } ?>">     
                        <input type="hidden" name="isOtherPain" id="isOtherPain" value="<?php if($painEditdata == 'Y'){ echo($bodycontent['AllpainLowerData']->is_others_pain); }else{ echo 'N'; } ?>">
                          
                        </div>
                      </div>

                      
                 </div>


                 <?php
                if($painEditdata == 'Y' && $bodycontent['AllpainLowerData']->is_others_pain == 'Y'){ 
               	$disp_oth_dis='display:block;';
               }
               else{
               	$disp_oth_dis='display:none;';
               }

                  ?>  
                    
                     <div class="col-sm-3" id="other_pain_col" style="<?php echo $disp_oth_dis;?>" >
                      <div class="form-group form-float">
                      
                      <label class="form-label selectlabel zindex3">Others Pain</label>
                         <div class="form-line">
                         <input type="text" class="form-control paindata" name="other_pain" id="other_pain" autocomplete="off"  placeholder="Others" value="<?php if($painEditdata == 'Y'){ echo($bodycontent['AllpainLowerData']->others_pain); } ?>" > 
                        </div> 
                    </div>  

                  
                 
             </div>

            

             
                    <div class="col-sm-3">
                     <div class="form-group form-float">
                         <div class="input-group " id="parityissueerr">
                         <label class="form-label selectlabel zindex3">Pain Character</label>
                         <select name="pain_character" id="pain_character" class="form-control show-tick paindata"  data-live-search="true" tabindex="-98">
                         <option value=""> &nbsp; </option> 
                         <?php 

                         foreach ($bodycontent['painCharacterdropdown'] as $painCharacterdropdown) {  ?>
                         <option value="<?php echo $painCharacterdropdown;?>"
                        
                           <?php if($painEditdata == 'Y'){ if($bodycontent['AllpainLowerData']->pain_charcter == $painCharacterdropdown){ ?> selected <?php } } ?> 
                                                                              

                          ><?php echo $painCharacterdropdown;?></option>
                          <?php     } ?>
                                                   
                          </select>   
                           </div>
                         </div>
                        
                    </div>
                   <div class="col-sm-3" id="othersdesign" style="<?php echo $disp_oth_dis;?>"></div>
                    <div class="col-sm-3">
                      <div class="form-group form-float">
                      
                      <label class="form-label selectlabel zindex3">Others</label>
                         <div class="form-line">
                         <input type="text" class="form-control paindata" name="pain_lowerothers" id="other" autocomplete="off"  placeholder="Others" value="<?php if($painEditdata == 'Y'){ echo($bodycontent['AllpainLowerData']->others); } ?>" > 
                        </div> 
                    </div>  

                  
                 
             </div>
    
                 </div> 

                       

                                                  
                  </div>
				                  </div>
				               </div>

 <!--  start Dysuria Block -->

   <?php if(!empty($bodycontent['AlldysuriaData'])){

     $isDysuria = 'Y';

   }else{
   	$isDysuria = 'N';
   } ?>

                 <div class="panel panel-col-teal" id="complaint_2" style="<?php echo $displaynone; ?>">
                 <div class="panel-heading" role="tab" id="headingTen_19">
                 <h4 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" href="#collapseTen_19" aria-expanded="false" aria-controls="collapseTen_19">
                     <i class="material-icons">chrome_reader_mode</i>
                     <!-- <i class="more-less glyphicon glyphicon-plus"></i> -->
                     Dysuria
                  </a>
                  </h4>
                 </div>
                 <div id="collapseTen_19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTen_19">
                 <div class="panel-body">

                  <div class="row clearfix">
                   <div class="col-sm-3">
                                                             
                            <label>Associted With:</label>
                                                                        
                          </div>

                   <div class="col-sm-3">
                     <div class="form-group form-float">
                         <div class="input-group " id="parityissueerr">
                         <label class="form-label selectlabel zindex3">Frequency Of Micturition</label>
                         <select name="freq_of_micturition" id="freq_of_micturition" class="form-control show-tick paindata"  data-live-search="true" tabindex="-98">
                         <option value=""> &nbsp; </option> 
                         <?php 

                         foreach ($bodycontent['YesorNo'] as $YesorNo) {  ?>
                         <option value="<?php echo $YesorNo;?>"
                        
                          <?php if($isDysuria == 'Y'){ if($bodycontent['AlldysuriaData']->freq_of_micturition == $YesorNo){ ?> selected <?php } } ?>
                                                                              

                          ><?php echo $YesorNo;?></option>
                          <?php     } ?>
                                                   
                          </select>   
                           </div>
                         </div>
                        
                    </div>
  
                 <div class="col-sm-3">
                     <div class="form-group form-float">
                         <div class="input-group " id="parityissueerr">
                         <label class="form-label selectlabel zindex3">Pain Abdomen</label>
                         <select name="pain_abdomen" id="pain_abdomen" class="form-control show-tick paindata"  data-live-search="true" tabindex="-98">
                         <option value=""> &nbsp; </option> 
                         <?php 

                         foreach ($bodycontent['YesorNo'] as $YesorNo) {  ?>
                         <option value="<?php echo $YesorNo;?>"
                        
                           <?php if($isDysuria == 'Y'){ if($bodycontent['AlldysuriaData']->pain_abdomen == $YesorNo){ ?> selected <?php } } ?>
                                                                              

                          ><?php echo $YesorNo;?></option>
                          <?php     } ?>
                                                   
                          </select>   
                           </div>
                         </div>
                        
                    </div>

                    <div class="col-sm-3">
                     <div class="form-group form-float">
                         <div class="input-group ">
                         <label class="form-label selectlabel zindex3">Fever</label>
                         <select name="dysuria_fever" id="dysuria_fever" class="form-control show-tick paindata"  data-live-search="true" tabindex="-98">
                         <option value=""> &nbsp; </option> 
                         <?php 

                         foreach ($bodycontent['YesorNo'] as $YesorNo) {  ?>
                         <option value="<?php echo $YesorNo;?>"
                        
                          <?php if($isDysuria == 'Y'){ if($bodycontent['AlldysuriaData']->dysuria_fever == $YesorNo){ ?> selected <?php } } ?>
                                                                              

                          ><?php echo $YesorNo;?></option>
                          <?php     } ?>
                                                   
                          </select>  
                         
                           </div>
                         </div>
                        
                    </div>
                  </div>
                  <div class="row clearfix">
                    <div class="col-sm-3"></div>
                     <div class="col-sm-3">
                     <div class="form-group form-float">
                         <div class="input-group ">
                         <label class="form-label selectlabel zindex3">Burning Sensation</label>
                         <select name="burning_sensation" id="burning_sensation" class="form-control show-tick paindata"  data-live-search="true" tabindex="-98">
                         <option value=""> &nbsp; </option> 
                         <?php 

                         foreach ($bodycontent['YesorNo'] as $YesorNo) {  ?>
                         <option value="<?php echo $YesorNo;?>"
                        
                           <?php if($isDysuria == 'Y'){ if($bodycontent['AlldysuriaData']->burining_sensation == $YesorNo){ ?> selected <?php } } ?>
                                                                              

                          ><?php echo $YesorNo;?></option>
                          <?php     } ?>
                                                   
                          </select>  
                          
                           </div>
                         </div>
                        
                    </div>
                  	
                  </div>
 
                 

                       

                                                  
                  </div>
				                  </div>
				               </div>

        <!-- Start Menstrual Problem Block  -->
 <!-- <?php $menstrual = 'N';
  foreach ($bodycontent['allchiefcomplaitID'] as $value) {
  if($value->is_parrent == 'C' && $value->is_check == 'Y'){

     $menstrual = 'Y';
      }
  } 
     if(!empty($bodycontent['AllMenstrualProblemData'])){

     $isMenstrualProblem = 'Y';

   }else{
   	$isMenstrualProblem = 'N';
   } ?> -->
 
			<div class="panel panel-col-teal" id="menstralProblem" style="<?php echo $displaynone; ?>">
                 <div class="panel-heading" role="tab" id="headingEleven_19">
                 <h4 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" href="#collapseEleven_19" aria-expanded="false" aria-controls="collapseEleven_19">
                     <i class="material-icons">chrome_reader_mode</i>
                     <!-- <i class="more-less glyphicon glyphicon-plus"></i> -->
                    Menstrual Problem
                  </a>
                  </h4>
                 </div>
                 <div id="collapseEleven_19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEleven_19">
                 <div class="panel-body">

                <!-- start oligomenorrhoea block -->

                  <div class="row clearfix" id="complaint_3" style="<?php echo $displaynone; ?>">
                   <div class="col-sm-5">
                                                             
                            <label>Anything Required In Oligomenorrhoea To Be Mentioned:</label>
                                                                        
                          </div>

                   <div class="col-sm-5">
                     <div class="form-group form-float">
                         <div class="input-group ">
                          <textarea rows="1" name="oligomenorrhoea_notes" id="oligomenorrhoea_notes" class="form-control no-resize" style="overflow: hidden; overflow-wrap: break-word; height: 32px;" autocomplete="off"><?php if(!empty($bodycontent['AllOligomenorrhoeaData'])){ echo $bodycontent['AllOligomenorrhoeaData']->notes;   } ?>
                         		
                         	</textarea>	
                        
                            
                           </div>
                         </div>
                        
                    </div>
                       
                  	
                  </div>

  <!-- End oligomenorrhoea block -->

   <!-- start Secondary amenorrhoea block -->

                  <div class="row clearfix" id="complaint_4" style="<?php echo $displaynone; ?>">
                   <div class="col-sm-5">
                                                             
                            <label>Anything Required In Secondary Amenorrhoea To Be Mentioned:</label>
                                                                        
                          </div>

                   <div class="col-sm-5">
                     <div class="form-group form-float">
                         <div class="input-group ">
                          <textarea rows="1" name="sec_amenorrhea_notes" id="sec_amenorrhea_notes" class="form-control no-resize" style="overflow: hidden; overflow-wrap: break-word; height: 32px;" autocomplete="off"><?php if(!empty($bodycontent['AllSecamenorrhoeaData'])){ echo $bodycontent['AllSecamenorrhoeaData']->notes;   } ?>
                         		
                         	</textarea>	
                        
                            
                           </div>
                         </div>
                        
                    </div>
                       
                  	
                  </div>

            <!-- End Secondary amenorrhoea block --> 

             <!-- Start Menorrhagia block -->      

                  <div class="row clearfix" id="complaint_5" style="<?php echo $displaynone; ?>">
                   <div class="col-sm-5">
                                                             
                            <label>Anything Required In Menorrhagia To Be Mentioned:</label>
                                                                        
                          </div>

                   <div class="col-sm-5">
                     <div class="form-group form-float">
                         <div class="input-group ">
                          <textarea rows="1" name="menorrhagia_notes" id="menorrhagia_notes" class="form-control no-resize" style="overflow: hidden; overflow-wrap: break-word; height: 32px;" autocomplete="off"><?php if(!empty($bodycontent['AllMenorrhagiaData'])){ echo $bodycontent['AllMenorrhagiaData']->notes;   } ?>
                         		
                         	</textarea>	
                        
                            
                           </div>
                         </div>
                        
                    </div>
                       
                  	
                  </div>
               <!-- End Menorrhagia block -->

                <!-- Start polymenorrhea block  -->  

                  <div class="row clearfix" id="complaint_6" style="<?php echo $displaynone; ?>">
                   <div class="col-sm-5">
                                                             
                            <label>Anything Required In Polymenorrhea To Be Mentioned:</label>
                                                                        
                          </div>

                   <div class="col-sm-5">
                     <div class="form-group form-float">
                         <div class="input-group ">
                          <textarea rows="1" name="polymenorrhea_notes" id="polymenorrhea_notes" class="form-control no-resize" style="overflow: hidden; overflow-wrap: break-word; height: 32px;" autocomplete="off"><?php if(!empty($bodycontent['AllPolymenorrheaData'])){ echo $bodycontent['AllPolymenorrheaData']->notes;   } ?>
                         		
                         	</textarea>	
                        
                            
                           </div>
                         </div>
                        
                    </div>
                       
                  	
                  </div>

                  <!-- End polymenorrhea block  -->
                
                <!-- Start Hypomenorrhoea block  -->          

                  <div class="row clearfix" id="complaint_7" style="<?php echo $displaynone; ?>">
                   <div class="col-sm-5">
                                                             
                            <label>Anything Required In Hypomenorrhoea  To Be Mentioned:</label>
                                                                        
                          </div>

                   <div class="col-sm-5">
                     <div class="form-group form-float">
                         <div class="input-group ">
                          <textarea rows="1" name="hypomenorrhoea_notes" id="hypomenorrhoea_notes" class="form-control no-resize" style="overflow: hidden; overflow-wrap: break-word; height: 32px;" autocomplete="off"><?php if(!empty($bodycontent['AllHypomenorrhoeaData'])){ echo $bodycontent['AllHypomenorrhoeaData']->notes;   } ?>
                         		
                         	</textarea>	
                        
                            
                           </div>
                         </div>
                        
                    </div>
                       
                  	
                  </div>
 
  <!-- End  Hypomenorrhoea block  --> 
                                          
                  </div>
				                  </div>
				               </div>


		 <!-- End Menstrual Problem Block  -->		               


         <!-- Start White discharge --> 
  <?php if(!empty($bodycontent['AllWhiteDischargeData'])){

     $isWhiteDischarge = 'Y';

   }else{
   	$isWhiteDischarge = 'N';
   } ?>
                       
            <div class="panel panel-col-teal" id="complaint_8" style="<?php echo $displaynone; ?>">
                 <div class="panel-heading" role="tab" id="headingTwelve_19">
                 <h4 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" href="#collapseTwelve_19" aria-expanded="false" aria-controls="collapseTwelve_19">
                     <i class="material-icons">chrome_reader_mode</i>
                     <!-- <i class="more-less glyphicon glyphicon-plus"></i> -->
                   White Discharge
                  </a>
                  </h4>
                 </div>
                 <div id="collapseTwelve_19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwelve_19">
                 <div class="panel-body">
                   <div class="row clearfix">
                  	 <div class="col-sm-3">
                                                             
                        

                          <label>Duration:</label>
                                                                        
                          </div>

                        <div class="col-sm-3">
                        <div class="form-group form-float" >
                         <div class="form-line">
                           <input type="text" class="form-control paindata dtl_months_8" name="discharge_duration_months" id="discharge_duration_months" autocomplete="off" value="<?php if($isWhiteDischarge == 'Y'){ echo $bodycontent['AllWhiteDischargeData']->duration_months;   } ?>" >
                               <label class="form-label">Months</label>
                            </div>

                           </div>
                         
                       </div>  

                         <div class="col-sm-3">
                        <div class="form-group form-float" >
                         <div class="form-line">
                           <input type="text" class="form-control paindata dtl_days_8" name="discharge_duration_days" id="discharge_duration_days" autocomplete="off" value="<?php if($isWhiteDischarge == 'Y'){ echo $bodycontent['AllWhiteDischargeData']->duration_days;   } ?>" >
                               <label class="form-label">Days</label>
                            </div>

                           </div>
                         
                       </div>

                        

                        <!--  <div class="col-sm-3">
                        <div class="form-group form-float" >
                         <div class="form-line">
                           <input type="text" class="form-control paindata" name="discharge_duration_years" id="discharge_duration_years" autocomplete="off" value="" >
                               <label class="form-label">Years</label>
                            </div>

                           </div>
                         
                       </div>  -->

                  </div>

                  <div class="row clearfix">

                  	 <div class="col-sm-3">
                  	 	<label>Associted With:</label>
                  	 </div>
                  	 <div class="col-sm-3">


                      <div class="form-group form-float">
                        <div class="input-group" >
                          <!-- <label class="form-label selectlabel zindex3">Pain</label> -->
                          <select name="white_discharge_assoc" id="white_discharge_assoc" class="form-control show-tick white_dicharge"  data-live-search="true" tabindex="-98" multiple  data-selected-text-format="count">
                          <!--  <option value=""> &nbsp; </option> -->
                          <?php 

                          foreach ($bodycontent['dischargeAssociteDrp'] as $dischargeAssociteDrp) {  ?>
                          <option value="<?php echo $dischargeAssociteDrp;?>"

                          	 <?php
                              if($isWhiteDischarge == 'Y'){
                                $selected_whitedischarge = explode(",",$bodycontent['AllWhiteDischargeData']->associted_with);
                                      if (in_array($dischargeAssociteDrp, $selected_whitedischarge)) { ?>
                                            selected
                                      <?php   }

                                    }

                            ?>

                                                                                    
                                                    

                            ><?php echo $dischargeAssociteDrp;?></option>
                            <?php     } ?>
                                                    
                            </select>
                        
                        <input type="hidden" name="whiteDischargeValues" id="whiteDischargeValues" value=" <?php if($isWhiteDischarge == 'Y'){ echo $bodycontent['AllWhiteDischargeData']->associted_with;  } ?>">
                          
                        </div>
                      </div>
                   </div>
                   	<div class="col-sm-3">
                    <div class="form-group form-float">
                        <div class="input-group" >
                         <label class="form-label selectlabel zindex3">Previous Episode</label> 
                          <select name="white_previous_episode" id="white_previous_episode" class="form-control show-tick"  data-live-search="true" tabindex="-98">
                           <option value="0"> &nbsp; </option>
                          <?php 

                          foreach ($bodycontent['YesorNo'] as $YesorNo) {  ?>
                          <option value="<?php echo $YesorNo;?>"

                           <?php if($isWhiteDischarge == 'Y'){ if($bodycontent['AllWhiteDischargeData']->previous_episode == $YesorNo){ ?> selected <?php } } ?>                                                         
                                                    

                            ><?php echo $YesorNo;?></option>
                            <?php     } ?>
                                                    
                            </select>

                         <input type="hidden" name="ispreviousEpisode" id="ispreviousEpisode" value="<?php if($isWhiteDischarge == 'Y'){ echo $bodycontent['AllWhiteDischargeData']->is_previous_episode;   }else{ echo 'N'; } ?>">
                        
                          
                        </div>
                      </div>
                  </div>
               
                 <?php if($isWhiteDischarge == 'Y' && $bodycontent['AllWhiteDischargeData']->is_previous_episode == 'Y'){ $isepisodedisp = 'display:block;'; }else{ $isepisodedisp = 'display:none;'; } ?>
                 

                 <div class="col-sm-3" id="episode_pre" style="<?php echo $isepisodedisp; ?>">
                    <div class="form-group form-float">
                        <div class="input-group" >
                         <!-- <label class="form-label selectlabel zindex3">Previous Episode</label>  -->
                          <select name="previous_episode" id="previous_episode" class="form-control show-tick"  data-live-search="true" tabindex="-98">
                           <option value="">Select</option>
                          <?php 

                          foreach ($bodycontent['dischargePreviousEpisodeDrp'] as $episodetime) {  ?>
                          <option value="<?php echo $episodetime;?>"

                             <?php if($isWhiteDischarge == 'Y'){ if($bodycontent['AllWhiteDischargeData']->episode_previous_sel == $episodetime){ ?> selected <?php } } ?>                                                        
                                                    

                            ><?php echo $episodetime;?></option>
                            <?php     } ?>
                                                    
                            </select>
                        
                       
                          
                        </div>
                      </div>
                  </div>
                

                  </div>
 
                                                                  
                  </div>
				                  </div>
				               </div>


         <!-- End White Discharge -->

          <!-- Start Unwanted Pregnancy --> 
   <?php if(!empty($bodycontent['AllUnwantedPregnancyData'])){

     $isUnwantedPregnancy = 'Y';

   }else{
   	$isUnwantedPregnancy = 'N';
   } ?>
                       
            <div class="panel panel-col-teal" id="complaint_9" style="<?php echo $displaynone; ?>" >
                 <div class="panel-heading" role="tab" id="headingThirteen_19">
                 <h4 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" href="#collapseThirteen_19" aria-expanded="false" aria-controls="collapseThirteen_19">
                     <i class="material-icons">chrome_reader_mode</i>
                     <!-- <i class="more-less glyphicon glyphicon-plus"></i> -->
                   Unwanted Pregnancy
                  </a>
                  </h4>
                 </div>
                 <div id="collapseThirteen_19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThirteen_19">
                 <div class="panel-body">

                  <div class="row clearfix">
                   <div class="col-sm-3">
                                                             
                            <label>Urine For Pregnancy test On:</label>
                                                                        
                          </div>

                    <div class="col-sm-3">
                      <div class="form-group form-float">
                        <div class="input-group">
                          <label class="form-label selectlabel zindex3">Date</label>
                         <input type="text" class="form-control datepicker"  name="urine_test_date" id="urine_test_date" placeholder="Select Date" autocomplete="off" value="<?php if($isUnwantedPregnancy == 'Y' && $bodycontent['AllUnwantedPregnancyData']->urine_test_date != NULL ){ echo date('l d M Y',strtotime($bodycontent['AllUnwantedPregnancyData']->urine_test_date));} ?>">  
                        </div>
                      </div>
                      
                    </div> 
                       

                     <div class="col-sm-3">
                                                             
                            <label>Wants Termination Because:</label>
                                                                        
                          </div>
                   <div class="col-sm-3">
                     <div class="form-group form-float">
                         <div class="input-group">
                        <!--  <label class="form-label selectlabel zindex3">Frequency Of Micturition</label> -->
                         <select name="wants_termination" id="wants_termination" class="form-control show-tick wantsterminationchange"  data-live-search="true" tabindex="-98" multiple  data-selected-text-format="count">
                         <option value=""> &nbsp; </option> 
                         <?php 

                         foreach ($bodycontent['unwantedPregnancyTermination'] as $unwantedPregnancyTermination) {  ?>
                         <option value="<?php echo $unwantedPregnancyTermination;?>"
                        
                         <?php 

                          if($isUnwantedPregnancy == 'Y'){ 

                          $selected_termination = explode(',',$bodycontent['AllUnwantedPregnancyData']->wants_termination); 
                            if(in_array($unwantedPregnancyTermination, $selected_termination)){ ?> selected <?php } } ?>
                                                                                                       

                          ><?php echo $unwantedPregnancyTermination;?></option>
                          <?php     } ?>
                                                   
                          </select> 
                          <input type="hidden" name="WantsterminationValues" id="WantsterminationValues" value="<?php if($isUnwantedPregnancy == 'Y'){ echo $bodycontent['AllUnwantedPregnancyData']->wants_termination; } ?>"> 
                          <input type="hidden" name="isWantOthers" id="isWantOthers" value="<?php if($isUnwantedPregnancy == 'Y'){ echo $bodycontent['AllUnwantedPregnancyData']->isWantOthers; }else{ echo "N"; } ?>"> 
                           </div>
                         </div>
                        
                    </div>

                     
                                  	
                  </div>


                  <div class="row clearfix">
                    

                     <?php if($isUnwantedPregnancy == 'Y' && $bodycontent['AllUnwantedPregnancyData']->isWantOthers == 'Y'){
                     
                       $terminationdisp = "display:block;";

                     }else{

                        $terminationdisp = "display:none;";
                     }

                       ?>
  
                   <div class="col-sm-3" id="terminationOther" style="<?php echo $terminationdisp; ?>">
                      <div class="form-group form-float">
                        <div class="form-line">
                          <label class="form-label selectlabel zindex3">Others</label>
                         <input type="text" class="form-control"  name="wantterminationOther" id="wantterminationOther" placeholder="" autocomplete="off" value="<?php if($isUnwantedPregnancy == 'Y'){ echo $bodycontent['AllUnwantedPregnancyData']->wantterminationOther; } ?>">  
                        </div>
                      </div>
                      
                    </div>

                  	 <div class="col-sm-3">
                                                             
                            <label>Wants Termination By:</label>
                                                                        
                          </div>

                     <div class="col-sm-3">
                     <div class="form-group form-float">
                         <div class="input-group">
                        <!--  <label class="form-label selectlabel zindex3">Frequency Of Micturition</label> -->
                         <select name="termination_by" id="termination_by" class="form-control show-tick paindata"  data-live-search="true" tabindex="-98">
                         <option value=""> &nbsp; </option> 
                         <?php 

                         foreach ($bodycontent['unwantedPregnancyTerminationBY'] as $unwantedPregnancyTerminationBY) {  ?>
                         <option value="<?php echo $unwantedPregnancyTerminationBY;?>"
                        
                          <?php if($isUnwantedPregnancy == 'Y'){ if($bodycontent['AllUnwantedPregnancyData']->termination_by == $unwantedPregnancyTerminationBY){ ?> selected <?php } } ?>                                                                           

                          ><?php echo $unwantedPregnancyTerminationBY;?></option>
                          <?php     } ?>
                                                   
                          </select> 
                          
 
                         <input type="hidden" name="isSurgicalMethod" id="isSurgicalMethod" value="<?php if($isUnwantedPregnancy == 'Y'){ echo $bodycontent['AllUnwantedPregnancyData']->isSurgicalMethod;}else{ echo 'N'; } ?>">

                           </div>
                         </div>
                        
                    </div> 

                    <?php if($isUnwantedPregnancy == 'Y' && $bodycontent['AllUnwantedPregnancyData']->isSurgicalMethod == 'Y'){ $surgicaldisp = 'display:block;'; }else{ $surgicaldisp = 'display:none;'; }  ?> 

                     <div class="col-sm-3" id="AllsurgicalMethod" style="<?php echo $surgicaldisp; ?>">
                     <div class="form-group form-float">
                         <div class="input-group">
                         <label class="form-label selectlabel zindex3">Surgical Method By</label>
                         <select name="surgical_method_with" id="surgical_method_with" class="form-control show-tick paindata"  data-live-search="true" tabindex="-98">
                         <option value=""> &nbsp; </option> 
                         <?php 

                         foreach ($bodycontent['AllsurgicalMethod'] as $AllsurgicalMethod) {  ?>
                         <option value="<?php echo $AllsurgicalMethod;?>"
                        
                          <?php if($isUnwantedPregnancy == 'Y'){ if($bodycontent['AllUnwantedPregnancyData']->surgical_method == $AllsurgicalMethod){ ?> selected <?php } } ?>                                                                              

                          ><?php echo $AllsurgicalMethod;?></option>
                          <?php     } ?>
                                                   
                          </select>   
                           </div>
                         </div>
                        
                    </div>   
                  </div>
 
                                                                  
                  </div>
				                  </div>
				               </div>


         <!-- End Unwanted Pregnancy -->

         <!-- Start Incident USG Finding Block -->
  <?php if(!empty($bodycontent['AllincidentalUSGData'])){

     $isincidentalUSG = 'Y';

   }else{
   	$isincidentalUSG = 'N';
   } ?>       
                       
            <div class="panel panel-col-teal" id="complaint_10" style="<?php echo $displaynone; ?>">
                 <div class="panel-heading" role="tab" id="headingFourteen_19">
                 <h4 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" href="#collapseFourteen_19" aria-expanded="false" aria-controls="collapseFourteen_19">
                     <i class="material-icons">chrome_reader_mode</i>
                     <!-- <i class="more-less glyphicon glyphicon-plus"></i> -->
                   Incidental USG Finding
                  </a>
                  </h4>
                 </div>
                 <div id="collapseFourteen_19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFourteen_19">
                 <div class="panel-body">
                 	<div class="row clearfix">
                 		 <div class="col-sm-3">
                                                             
                            <label>Fibroid:</label>
                                                                        
                          </div>

                     <div class="col-sm-3">
                      <div class="form-group form-float">
                      
                          <label class="form-label selectlabel zindex3">Size</label>
                         <input type="text" class="form-control"  name="fibroid_size" id="fibroid_size" placeholder="" autocomplete="off" value="<?php if($isincidentalUSG == 'Y'){ echo $bodycontent['AllincidentalUSGData']->fibroid_size; } ?>">  
                       
                      </div>
                      
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group form-float">
                      
                          <label class="form-label selectlabel zindex3">No.</label>
                         <input type="text" class="form-control"  name="fibroid_no" id="fibroid_no" placeholder="" autocomplete="off" value="<?php if($isincidentalUSG == 'Y'){ echo $bodycontent['AllincidentalUSGData']->fibroid_no; } ?>">  
                       
                      </div>
                      
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group form-float">
                      
                          <label class="form-label selectlabel zindex3">Location</label>
                         <input type="text" class="form-control"  name="fibroid_location" id="fibroid_location" placeholder="" autocomplete="off" value="<?php if($isincidentalUSG == 'Y'){ echo $bodycontent['AllincidentalUSGData']->fibroid_location; } ?>">  
                       
                      </div>
                      
                    </div>
                 	</div>
                 	<div class="row clearfix">
                 		 
                <div class="col-sm-3">
                              <label>Endometrial Cyst:</label>                                        
                          </div>

                          <div class="col-sm-3">
                      <div class="form-group form-float">
                      
                          <label class="form-label selectlabel zindex3">Lt Ovary-Size</label>
                         <input type="text" class="form-control"  name="lt_ovary_size" id="lt_ovary_size" placeholder="" autocomplete="off" value="<?php if($isincidentalUSG == 'Y'){ echo $bodycontent['AllincidentalUSGData']->lt_ovary_size; } ?>">  
                       
                      </div>
                      
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group form-float">
                      
                          <label class="form-label selectlabel zindex3">RT.Overay-Size</label>
                         <input type="text" class="form-control"  name="rt_ovary_size" id="rt_ovary_size" placeholder="" autocomplete="off" value="<?php if($isincidentalUSG == 'Y'){ echo $bodycontent['AllincidentalUSGData']->rt_ovary_size; } ?>">  
                       
                      </div>
                      
                    </div>
                 
                  <div class="col-sm-3">       
  
                  <div class="form-group form-group">
                         <div class="input-group" >
                                       
                             <input type="checkbox" name="pcos" id="pcos" class="filled-in chk-col-deep-purple" <?php if($isincidentalUSG == 'Y' && $bodycontent['AllincidentalUSGData']->pcos == 'Y'){ ?> checked <?php   } ?> > 
                             <label for="pcos">PCOS</label>
                            <input type="hidden" name="pcosvalues" id="pcosvalues" value="<?php if($isincidentalUSG == 'Y'){ echo $bodycontent['AllincidentalUSGData']->pcos; }else{ echo "N"; } ?>">
                              
                          </div>  
                  </div>
               </div>


                 	</div>
                 	<div class="row clearfix">
                 		 <div class="col-sm-3">
                              <div class="form-group form-float">                                      
                           <label class="form-label selectlabel zindex3">Endometrial Thickness</label>
                         <input type="text" class="form-control"  name="endometrial_thickness" id="endometrial_thickness" placeholder="" autocomplete="off" value="<?php if($isincidentalUSG == 'Y'){ echo $bodycontent['AllincidentalUSGData']->endometrial_thickness; } ?>">
                        </div>                                 
                            
                                                                        
                          </div>
                       <div class="col-sm-3">
                      <div class="form-group form-float">
                        <div class="input-group" id="menstrual_lmp_daterr">
                          <label class="form-label selectlabel zindex3">USG Date</label>
                         <input type="text" class="form-control datepicker"  name="usg_date" id="usg_date" placeholder="Select Date" autocomplete="off" value="<?php if($isincidentalUSG == 'Y' && $bodycontent['AllincidentalUSGData']->usg_date != NULL){ echo date('l d M Y',strtotime($bodycontent['AllincidentalUSGData']->usg_date)); } ?>">  
                        </div>
                      </div>
                      
                    </div> 
                    <div class="col-sm-6">
                   <div class="form-group form-float">
                       <div class="form-line focused">
                         <textarea rows="1" name="incidental_notes" id="incidental_notes" class="form-control no-resize" style="overflow: hidden; overflow-wrap: break-word; height: 32px;" autocomplete="off"><?php if($isincidentalUSG == 'Y'){ echo $bodycontent['AllincidentalUSGData']->incidental_notes; } ?>
                         		
                         	</textarea>
                            <label class="form-label">Notes</label> 
                       </div>
                      </div>
                   </div>   
                 	</div>


 
                                                                  
                  </div>
				                  </div>
				               </div>


         <!-- End Incident USG Finding Block -->

         <!-- Start Stich line Problem Block --> 

  <?php if(!empty($bodycontent['AllStichlineProblemData'])){

     $isStichlineProblem = 'Y';

   }else{
   	$isStichlineProblem = 'N';
   } ?>
                       
            <div class="panel panel-col-teal" id="complaint_11" style="<?php echo $displaynone; ?>">
                 <div class="panel-heading" role="tab" id="headingFifteen_19">
                 <h4 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" href="#collapseFifteen_19" aria-expanded="false" aria-controls="collapseFifteen_19">
                     <i class="material-icons">chrome_reader_mode</i>
                     <!-- <i class="more-less glyphicon glyphicon-plus"></i> -->
                   Stich Line Problem
                  </a>
                  </h4>
                 </div>
                 <div id="collapseFifteen_19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFifteen_19">
                 <div class="panel-body">

                  <div class="row clearfix">
                   <div class="col-sm-3">
                                                             
                            <label>H/O Operation:</label>
                                                                        
                          </div>

                    <div class="col-sm-3">
                      <div class="form-group form-float">
                        <div class="input-group">
                          <label class="form-label selectlabel zindex3">Date</label>
                         <input type="text" class="form-control datepicker"  name="operation_date" id="operation_date" placeholder="Select Date" autocomplete="off" value="<?php if($isStichlineProblem == 'Y' && $bodycontent['AllStichlineProblemData']->operation_date != NULL){ echo date('l d M Y',strtotime($bodycontent['AllStichlineProblemData']->operation_date)); } ?>">  
                        </div>
                      </div>
                      
                    </div>

                     <div class="col-sm-3">
                      <div class="form-group form-float">
                      
                          <label class="form-label selectlabel zindex3">Hospital Name</label>
                         <input type="text" class="form-control"  name="hospital_name" id="hospital_name" placeholder="" autocomplete="off" value="<?php if($isStichlineProblem == 'Y'){ echo $bodycontent['AllStichlineProblemData']->hospital_name; } ?>">  
                       
                      </div>
                      
                    </div>

                    <div class="col-sm-3">
                      <div class="form-group form-float">
                       
                          <label class="form-label selectlabel zindex3">Place</label>
                         <input type="text" class="form-control"  name="hospital_place" id="hospital_place" placeholder="" autocomplete="off" value="<?php if($isStichlineProblem == 'Y'){ echo $bodycontent['AllStichlineProblemData']->place; } ?>">  
                       
                      </div>
                      
                    </div>

                      
                    </div>
                    <div class="row clearfix">  
                    <div class="col-sm-3"></div>   

                   <div class="col-sm-3">
                     <div class="form-group form-float">
                         <div class="input-group ">
                         <label class="form-label selectlabel zindex3">Name Of Operation</label>
                         <select name="operation_name" id="operation_name" class="form-control show-tick paindata"  data-live-search="true" tabindex="-98">
                         <option value=""> &nbsp; </option> 
                         <?php 

                         foreach ($bodycontent['stichlineOprationName'] as $stichlineOprationName) {  ?>
                         <option value="<?php echo $stichlineOprationName;?>"
                        
                            <?php if($isStichlineProblem == 'Y'){ if($bodycontent['AllStichlineProblemData']->operation_name == $stichlineOprationName){ ?> selected <?php } } ?>                                                                            

                          ><?php echo $stichlineOprationName;?></option>
                          <?php     } ?>
                                                   
                          </select>   
                           </div>
                         </div>
                        
                    </div>
  
                     <!-- <div class="col-sm-3">
                     <div class="form-group form-float">
                         <div class="input-group ">
                         <label class="form-label selectlabel zindex3">Lap Ovarian Cystectomy</label>
                         <select name="lap_ovarian_cystectomy" id="lap_ovarian_cystectomy" class="form-control show-tick paindata"  data-live-search="true" tabindex="-98">
                         <option value=""> &nbsp; </option> 
                         <?php 

                         foreach ($bodycontent['stichlineProblemCommDrp'] as $stichlineProblemCommDrp) {  ?>
                         <option value="<?php echo $stichlineProblemCommDrp;?>"
                        
                          <?php if($isStichlineProblem == 'Y'){ if($bodycontent['AllStichlineProblemData']->lap_ovarian_cystectomy == $stichlineProblemCommDrp){ ?> selected <?php } } ?>                                                                            

                          ><?php echo $stichlineProblemCommDrp;?></option>
                          <?php     } ?>
                                                   
                          </select>   
                           </div>
                         </div>
                        
                    </div>
                    <div class="col-sm-3">
                     <div class="form-group form-float">
                         <div class="input-group ">
                         <label class="form-label selectlabel zindex3">Lap Ovariectomy</label>
                         <select name="lap_ovariectomy" id="lap_ovariectomy" class="form-control show-tick paindata"  data-live-search="true" tabindex="-98">
                         <option value=""> &nbsp; </option> 
                         <?php 

                         foreach ($bodycontent['stichlineProblemCommDrp'] as $stichlineProblemCommDrp) {  ?>
                         <option value="<?php echo $stichlineProblemCommDrp;?>"
                        
                          <?php if($isStichlineProblem == 'Y'){ if($bodycontent['AllStichlineProblemData']->lap_ovariectomy == $stichlineProblemCommDrp){ ?> selected <?php } } ?>                                                                             

                          ><?php echo $stichlineProblemCommDrp;?></option>
                          <?php     } ?>
                                                   
                          </select>   
                           </div>
                         </div>
                        
                    </div>
                </div>
                    <div class="row clearfix">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-3">
                     <div class="form-group form-float">
                         <div class="input-group ">
                         <label class="form-label selectlabel zindex3">Open Ovarian Cystectomy</label>
                         <select name="open_ovarian_cystectomy" id="open_ovarian_cystectomy" class="form-control show-tick"  data-live-search="true" tabindex="-98">
                         <option value=""> &nbsp; </option> 
                         <?php 

                         foreach ($bodycontent['stichlineProblemCommDrp'] as $stichlineProblemCommDrp) {  ?>
                         <option value="<?php echo $stichlineProblemCommDrp;?>"
                        
                           <?php if($isStichlineProblem == 'Y'){ if($bodycontent['AllStichlineProblemData']->open_ovarian_cystectomy == $stichlineProblemCommDrp){ ?> selected <?php } } ?>                                                                             

                          ><?php echo $stichlineProblemCommDrp;?></option>
                          <?php     } ?>
                                                   
                          </select>   
                           </div>
                         </div>
                        
                    </div>
                    <div class="col-sm-3">
                     <div class="form-group form-float">
                         <div class="input-group ">
                         <label class="form-label selectlabel zindex3">Open Ovariectomy</label>
                         <select name="open_ovariectomy" id="open_ovariectomy" class="form-control show-tick paindata"  data-live-search="true" tabindex="-98">
                         <option value=""> &nbsp; </option> 
                         <?php 

                         foreach ($bodycontent['stichlineProblemCommDrp'] as $stichlineProblemCommDrp) {  ?>
                         <option value="<?php echo $stichlineProblemCommDrp;?>"
                        
                           <?php if($isStichlineProblem == 'Y'){ if($bodycontent['AllStichlineProblemData']->open_ovariectomy == $stichlineProblemCommDrp){ ?> selected <?php } } ?>                                                                             

                          ><?php echo $stichlineProblemCommDrp;?></option>
                          <?php     } ?>
                                                   
                          </select>   
                           </div>
                         </div>
                        
                    </div> -->

                    <div class="col-sm-3">
                      <div class="form-group form-float">
                       
                          <label class="form-label selectlabel zindex3">Others</label>
                         <input type="text" class="form-control"  name="stich_others" id="stich_others" placeholder="" autocomplete="off" value="<?php if($isStichlineProblem == 'Y'){ echo $bodycontent['AllStichlineProblemData']->others; } ?>">  
                       
                      </div>
                      
                    </div>
                                  	
                  </div>
 
                                                                  
                  </div>
				                  </div>
				               </div>


         <!-- End Stich line Problem Block -->

         <!-- Start Somthing Comming Down P/V Block --> 
   <?php if(!empty($bodycontent['AllSomthingCommingdownData'])){

     $isSomthingCommingdown = 'Y';

   }else{
   	$isSomthingCommingdown = 'N';
   } ?>
                       
            <div class="panel panel-col-teal" id="complaint_12" style="<?php echo $displaynone; ?>">
                 <div class="panel-heading" role="tab" id="headingSixteen_19">
                 <h4 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" href="#collapseSixteen_19" aria-expanded="false" aria-controls="collapseSixteen_19">
                     <i class="material-icons">chrome_reader_mode</i>
                     <!-- <i class="more-less glyphicon glyphicon-plus"></i> -->
                   Somthing Comming Down P/V
                  </a>
                  </h4>
                 </div>
                 <div id="collapseSixteen_19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSixteen_19">
                 <div class="panel-body">

                  <div class="row clearfix">
                  	 <div class="col-sm-3">
                                                             
                        

                          <label>Somthing Coming Down P/V:</label>
                                                                        
                          </div>

                      <div class="col-sm-3">
                        <div class="form-group form-float" >
                         <div class="form-line">
                           <input type="text" class="form-control dtl_years_12" name="somthing_duration_years" id="somthing_duration_years" autocomplete="off" value="<?php if($isSomthingCommingdown == 'Y'){ echo $bodycontent['AllSomthingCommingdownData']->duration_years; } ?>" >
                               <label class="form-label">Years</label>
                            </div>

                           </div>
                         
                       </div>

                        <div class="col-sm-3">
                        <div class="form-group form-float" >
                         <div class="form-line">
                           <input type="text" class="form-control dtl_months_12" name="somthing_duration_months" id="somthing_duration_months" autocomplete="off" value="<?php if($isSomthingCommingdown == 'Y'){ echo $bodycontent['AllSomthingCommingdownData']->duration_months; } ?>" >
                               <label class="form-label">Months</label>
                            </div>

                           </div>
                         
                       </div>

                         

                       <div class="col-sm-3">
                     <div class="form-group form-float">
                         <div class="input-group ">
                         <label class="form-label selectlabel zindex3">With Stress Incontinence</label>
                         <select name="stress_incontinence" id="stress_incontinence" class="form-control show-tick paindata"  data-live-search="true" tabindex="-98">
                         <option value=""> &nbsp; </option> 
                         <?php 

                         foreach ($bodycontent['YesorNo'] as $YesorNo) {  ?>
                         <option value="<?php echo $YesorNo;?>"
                        
                           <?php if($isSomthingCommingdown == 'Y'){ if($bodycontent['AllSomthingCommingdownData']->stress_incontinence == $YesorNo){ ?> selected <?php } } ?>                                                                            

                          ><?php echo $YesorNo;?></option>
                          <?php     } ?>
                                                   
                          </select>   
                           </div>
                         </div>
                        
                    </div>
                    </div>
                    <div class="row clearfix"> 
                    <div class="col-sm-3">
                     <div class="form-group form-float">
                         <div class="input-group ">
                         <label class="form-label selectlabel zindex3">Difficulty In Defection</label>
                         <select name="diff_in_defection" id="diff_in_defection" class="form-control show-tick paindata"  data-live-search="true" tabindex="-98">
                         <option value=""> &nbsp; </option> 
                         <?php 

                         foreach ($bodycontent['YesorNo'] as $YesorNo) {  ?>
                         <option value="<?php echo $YesorNo;?>"
                        
                         <?php if($isSomthingCommingdown == 'Y'){ if($bodycontent['AllSomthingCommingdownData']->diff_in_defection == $YesorNo){ ?> selected <?php } } ?>                                                                              

                          ><?php echo $YesorNo;?></option>
                          <?php     } ?>
                                                   
                          </select>   
                           </div>
                         </div>
                        
                    </div> 
                     <div class="col-sm-3">
                     <div class="form-group form-float">
                         <div class="input-group ">
                         <label class="form-label selectlabel zindex3">Associted With Discharge</label>
                         <select name="assoc_with_discharge" id="assoc_with_discharge" class="form-control show-tick paindata"  data-live-search="true" tabindex="-98">
                         <option value=""> &nbsp; </option> 
                         <?php 

                         foreach ($bodycontent['YesorNo'] as $YesorNo) {  ?>
                         <option value="<?php echo $YesorNo;?>"
                        
                        <?php if($isSomthingCommingdown == 'Y'){ if($bodycontent['AllSomthingCommingdownData']->assoc_with_discharge == $YesorNo){ ?> selected <?php } } ?>
                                                                                                       

                          ><?php echo $YesorNo;?></option>
                          <?php     } ?>
                                                   
                          </select>   
                           </div>
                         </div>
                        
                    </div> 
                     <div class="col-sm-4">
                     <div class="form-group form-float">
                         <div class="input-group ">
                         <label class="form-label selectlabel zindex3">Associted With Chronic Cough</label>
                         <select name="assoc_chronic_cough" id="assoc_chronic_cough" class="form-control show-tick paindata"  data-live-search="true" tabindex="-98">
                         <option value=""> &nbsp; </option> 
                         <?php 

                         foreach ($bodycontent['YesorNo'] as $YesorNo) {  ?>
                         <option value="<?php echo $YesorNo;?>"
                        
                          <?php if($isSomthingCommingdown == 'Y'){ if($bodycontent['AllSomthingCommingdownData']->assoc_chronic_cough == $YesorNo){ ?> selected <?php } } ?>                                                                              

                          ><?php echo $YesorNo;?></option>
                          <?php     } ?>
                                                   
                          </select>   
                           </div>
                         </div>
                        
                    </div> 
                </div>
                <div class="row clearfix">
                     <div class="col-sm-4">
                     <div class="form-group form-float">
                         <div class="input-group ">
                         <label class="form-label selectlabel zindex3">Associted With Constipation</label>
                         <select name="assoc_constipation" id="assoc_constipation" class="form-control show-tick paindata"  data-live-search="true" tabindex="-98">
                         <option value=""> &nbsp; </option> 
                         <?php 

                         foreach ($bodycontent['YesorNo'] as $YesorNo) {  ?>
                         <option value="<?php echo $YesorNo;?>"
                        
                         <?php if($isSomthingCommingdown == 'Y'){ if($bodycontent['AllSomthingCommingdownData']->assoc_constipation == $YesorNo){ ?> selected <?php } } ?>                                                                              

                          ><?php echo $YesorNo;?></option>
                          <?php     } ?>
                                                   
                          </select>   
                           </div>
                         </div>
                        
                    </div> 

                  </div>
 
                                                                  
                  </div>
				                  </div>
				               </div>


         <!-- End Somthing Comming Down P/V Block -->

         <!-- Start Post menopausal bleeding Block --> 

   <?php if(!empty($bodycontent['AllPostmenopausalbleedingData'])){

     $isPostmenopausal = 'Y';

   }else{
   	$isPostmenopausal = 'N';
   } ?>

                       
            <div class="panel panel-col-teal" id="complaint_13" style="<?php echo $displaynone; ?>">
                 <div class="panel-heading" role="tab" id="headingSeventeen_19">
                 <h4 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" href="#collapseSeventeen_19" aria-expanded="false" aria-controls="collapseSeventeen_19">
                     <i class="material-icons">chrome_reader_mode</i>
                     <!-- <i class="more-less glyphicon glyphicon-plus"></i> -->
                   Post menopausal bleeding
                  </a>
                  </h4>
                 </div>
                 <div id="collapseSeventeen_19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeventeen_19">
                 <div class="panel-body">

                  <div class="row clearfix">
                  
                   <div class="col-sm-3">
                     <div class="form-group form-float">
                         <div class="input-group ">
                         <label class="form-label selectlabel zindex3">Episode</label>
                         <select name="menopausal_episode" id="menopausal_episode" class="form-control show-tick "  data-live-search="true" tabindex="-98">
                         <option value=""> &nbsp; </option> 
                         <?php 

                         foreach ($bodycontent['postMenopausalAllEpisode'] as $postMenopausalAllEpisode) {  ?>
                         <option value="<?php echo $postMenopausalAllEpisode;?>"
                        
                           <?php if($isPostmenopausal == 'Y'){ if($bodycontent['AllPostmenopausalbleedingData']->menopausal_episode == $postMenopausalAllEpisode){ ?> selected <?php } } ?>                                                                            

                          ><?php echo $postMenopausalAllEpisode;?></option>
                          <?php     } ?>
                                                   
                          </select>   
                           </div>
                         </div>
                        
                    </div>
                     <div class="col-sm-3">
                     <div class="form-group form-float">
                         <div class="input-group ">
                         <label class="form-label selectlabel zindex3">Amount Of Bleeding</label>
                         <select name="bleeding" id="bleeding" class="form-control show-tick"  data-live-search="true" tabindex="-98">
                         <option value=""> &nbsp; </option> 
                         <?php 

                         foreach ($bodycontent['postMenopausalbleeding'] as $postMenopausalbleeding) {  ?>
                         <option value="<?php echo $postMenopausalbleeding;?>"
                        
                          <?php if($isPostmenopausal == 'Y'){ if($bodycontent['AllPostmenopausalbleedingData']->bleeding == $postMenopausalbleeding){ ?> selected <?php } } ?>                                                                              

                          ><?php echo $postMenopausalbleeding;?></option>
                          <?php     } ?>
                                                   
                          </select>   
                           </div>
                         </div>
                        
                    </div>

                    <div class="col-sm-3">
                      <div class="form-group form-float">
                       
                         <label class="form-label selectlabel zindex3">Bleeding Continuing For Days</label>
                         <input type="text" class="form-control"  name="bleeding_continue_days" id="bleeding_continue_days" placeholder="" autocomplete="off" value="<?php if($isPostmenopausal == 'Y'){ echo $bodycontent['AllPostmenopausalbleedingData']->bleeding_continue_days;  } ?>">  
                        </div>
                      
                      
                    </div>
                      <div class="col-sm-3">
                      <div class="form-group form-float">
                       
                         <label class="form-label selectlabel zindex3">Bleeding Stopped After Days</label>
                         <input type="text" class="form-control"  name="bleeding_after_days" id="bleeding_after_days" placeholder="" autocomplete="off" value="<?php if($isPostmenopausal == 'Y'){ echo $bodycontent['AllPostmenopausalbleedingData']->bleeding_after_days;  } ?>">  
                        </div>
                      
                      
                    </div>
  
                                  	
                  </div>
                  <div class="row clearfix">

                     <div class="col-sm-3">
                     <div class="form-group form-float">
                         <div class="input-group ">
                        <!--  <label class="form-label selectlabel zindex3">Amount Of Bleeding</label> -->
                         <select name="stopbleedingby" id="stopbleedingby" class="form-control show-tick"  data-live-search="true" tabindex="-98">
                         <option value="">Select</option> 
                         <?php 

                         foreach ($bodycontent['poststopbleedingdrp'] as $poststopbleedingdrp) {  ?>
                         <option value="<?php echo $poststopbleedingdrp;?>"
                        
                         <?php if($isPostmenopausal == 'Y'){ if($bodycontent['AllPostmenopausalbleedingData']->stop_bleeding_by == $poststopbleedingdrp){ ?> selected <?php } } ?>
                                                                                                     

                          ><?php echo $poststopbleedingdrp;?></option>
                          <?php     } ?>
                                                   
                          </select> 
                          <input type="hidden" name="isStopBleeding" id="isStopBleeding" value="N">  
                           </div>
                         </div>
                        
                    </div>
                     <?php 
                    if($isPostmenopausal == 'Y' && $bodycontent['AllPostmenopausalbleedingData']->isStopBleeding == 'Y'){

                       $bleedingmeddisp = "display:block;"; 
                    }else{

                      $bleedingmeddisp = "display:none;"; 
                    }

                      ?>
                      <div class="col-sm-3" id="stopbleedingmed" style="<?php echo $bleedingmeddisp; ?>">
                     <div class="form-group form-float">
                         <div class="input-group">
                         <label class="form-label selectlabel zindex3">Medicine</label>
                         <select name="bleedig_stop_medicine" id="bleedig_stop_medicine" class="form-control show-tick medicineforstop"  data-live-search="true" tabindex="-98" multiple  data-selected-text-format="count" >
                         <option value=""> &nbsp; </option> 
                         <?php 

                         foreach ($bodycontent['medicineList'] as $medicineList) {  ?>
                         <option value="<?php echo $medicineList->medicine_id;?>"
                        
                          <?php 

                          if($isPostmenopausal == 'Y'){ 

                          $stopbleeding_medicine = explode(',',$bodycontent['AllPostmenopausalbleedingData']->stop_bleeding_medicine); 
                            if(in_array($medicineList->medicine_id, $stopbleeding_medicine)){ ?> selected <?php } } ?>                                                                               

                          ><?php echo $medicineList->medicine_name;?></option>
                          <?php     } ?>
                                                   
                          </select> 

                          <input type="hidden" name="stopbleedingmedValues" id="stopbleedingmedValues" value="<?php if($isPostmenopausal == 'Y'){ echo $bodycontent['AllPostmenopausalbleedingData']->stop_bleeding_medicine;  } ?>">  
                           </div>
                         </div>
                        
                    </div>


                  	 <div class="col-sm-6">
                   <div class="form-group form-float">
                       <div class="form-line focused">
                         <textarea rows="1" name="post_menopausual_notes" id="post_menopausual_notes" class="form-control no-resize" style="overflow: hidden; overflow-wrap: break-word; height: 32px;" autocomplete="off"><?php if($isPostmenopausal == 'Y'){ echo $bodycontent['AllPostmenopausalbleedingData']->post_menopausual_notes;  } ?>
                         		
                         	</textarea>
                             <label class="form-label">Notes</label>
                       </div>
                      </div>
                   </div>

                  </div>
 
                                                                  
                  </div>
				                  </div>
				               </div>


         <!-- End Post menopausal bleeding Block -->

         <!-- Start Urinary incontinence Block --> 
        
  <?php if(!empty($bodycontent['AllUrinaryIncontinenceData'])){

     $isUrinaryIn = 'Y';

   }else{
   	$isUrinaryIn = 'N';
   } ?>

            <div class="panel panel-col-teal" id="complaint_14" style="<?php echo $displaynone; ?>">
                 <div class="panel-heading" role="tab" id="headingEighteen_19">
                 <h4 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" href="#collapseEighteen_19" aria-expanded="false" aria-controls="collapseEighteen_19">
                     <i class="material-icons">chrome_reader_mode</i>
                     <!-- <i class="more-less glyphicon glyphicon-plus"></i> -->
                   Urinary incontinence
                  </a>
                  </h4>
                 </div>
                 <div id="collapseEighteen_19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEighteen_19">
                 <div class="panel-body">

                  <div class="row clearfix">
                   

                   <div class="col-sm-3">
                     <div class="form-group form-float">
                         <div class="input-group">
                         <!-- <label class="form-label selectlabel zindex3">Frequency Of Micturition</label> -->
                         <select name="urinary_incontinence" id="urinary_incontinence" class="form-control show-tick"  data-live-search="true" tabindex="-98">
                         <option value=""> Select </option> 
                         <?php 

                         foreach ($bodycontent['urinaryinDrpDown'] as $urinaryinDrpDown) {  ?>
                         <option value="<?php echo $urinaryinDrpDown;?>"
                        
                          <?php if($isUrinaryIn == 'Y'){ if($bodycontent['AllUrinaryIncontinenceData']->urinary_incontinence == $urinaryinDrpDown){ ?> selected <?php } } ?>                                                                              

                          ><?php echo $urinaryinDrpDown;?></option>
                          <?php     } ?>
                                                   
                          </select>   
                           </div>
                         </div>
                        
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group form-float">
                       
                         <label class="form-label selectlabel zindex3">Years</label>
                         <input type="text" class="form-control dtl_years_14"  name="urinary_incontinence_years" id="urinary_incontinence_years" placeholder="" autocomplete="off" value="<?php if($isUrinaryIn == 'Y'){ echo $bodycontent['AllUrinaryIncontinenceData']->urinary_incontinence_years;  } ?>">  
                        </div>
                      
                      
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group form-float">
                       
                         <label class="form-label selectlabel zindex3">Months</label>
                         <input type="text" class="form-control dtl_months_14"  name="urinary_incontinence_months" id="urinary_incontinence_months" placeholder="" autocomplete="off" value="<?php if($isUrinaryIn == 'Y'){ echo $bodycontent['AllUrinaryIncontinenceData']->urinary_incontinence_months;  } ?>">  
                        </div>
                      
                      
                    </div>

                     <div class="col-sm-3">
                      <div class="form-group form-float">
                       
                         <label class="form-label selectlabel zindex3">Days</label>
                         <input type="text" class="form-control dtl_days_14"  name="urinary_incontinence_days" id="urinary_incontinence_days" placeholder="" autocomplete="off" value="<?php if($isUrinaryIn == 'Y'){ echo $bodycontent['AllUrinaryIncontinenceData']->urinary_incontinence_days;  } ?>">  
                        </div>
                      
                      
                    </div>
                    
                    
                </div>
                <div class="row clearfix">

                    <div class="col-sm-3">
                     <div class="form-group form-float">
                         <div class="input-group">
                         <label class="form-label selectlabel zindex3">Treated With</label>
                         <select name="treated_with_medicine" id="treated_with_medicine" class="form-control show-tick treatmentmedicine"  data-live-search="true" tabindex="-98" multiple  data-selected-text-format="count" >
                         <option value=""> &nbsp; </option> 
                         <?php 

                         foreach ($bodycontent['medicineList'] as $medicineList) {  ?>
                         <option value="<?php echo $medicineList->medicine_id;?>"
                        
                          <?php 

                          if($isUrinaryIn == 'Y'){ 

                          $selected_medicine = explode(',',$bodycontent['AllUrinaryIncontinenceData']->treated_with_medicine); 
                          	if(in_array($medicineList->medicine_id, $selected_medicine)){ ?> selected <?php } } ?>                                                                               

                          ><?php echo $medicineList->medicine_name;?></option>
                          <?php     } ?>
                                                   
                          </select> 

                          <input type="hidden" name="treatedmedicine" id="treatedmedicine" value="<?php if($isUrinaryIn == 'Y'){ echo $bodycontent['AllUrinaryIncontinenceData']->treated_with_medicine;  } ?>">  
                           </div>
                         </div>
                        
                    </div>
                     <div class="col-sm-3">
                     <div class="form-group form-float">
                         <div class="input-group">
                         <label class="form-label selectlabel zindex3">Episode</label>
                         <select name="urinary_episode" id="urinary_episode" class="form-control show-tick "  data-live-search="true" tabindex="-98">
                         <option value=""> &nbsp; </option> 
                         <?php 

                         foreach ($bodycontent['UrinaryIncosistancyAllEpisode'] as $UrinaryIncosistancyAllEpisode) {  ?>
                         <option value="<?php echo $UrinaryIncosistancyAllEpisode;?>"
                        
                         <?php if($isUrinaryIn == 'Y'){ if($bodycontent['AllUrinaryIncontinenceData']->urinary_episode == $UrinaryIncosistancyAllEpisode){ ?> selected <?php } } ?>                                                                              

                          ><?php echo $UrinaryIncosistancyAllEpisode;?></option>
                          <?php     } ?>
                                                   
                          </select>  
                          <input type="hidden" name="isurinaryepisode" id="isurinaryepisode" value="<?php if($isUrinaryIn == 'Y'){ echo $bodycontent['AllUrinaryIncontinenceData']->isurinaryepisode;  }else{ echo "N"; } ?>"> 
                           </div>
                         </div>
                        
                    </div>

                    <?php
                             if($isUrinaryIn == 'Y' && $bodycontent['AllUrinaryIncontinenceData']->isurinaryepisode == 'Y'){

                               $yearMonthdisp ="display:block;";
                             }else{

                               $yearMonthdisp ="display:none;";
                             }

                      ?>
                    <div class="col-sm-3 recurrentyermon" style="<?php echo $yearMonthdisp ?>">
                      <div class="form-group form-float">
                       
                         <label class="form-label selectlabel zindex3">Years</label>
                         <input type="text" class="form-control"  name="episode_years" id="episode_years" placeholder="" autocomplete="off" value="<?php if($isUrinaryIn == 'Y'){ echo $bodycontent['AllUrinaryIncontinenceData']->episode_years;  } ?>">  
                        </div>
                      
                      
                    </div>
                     <div class="col-sm-3 recurrentyermon" style="<?php echo $yearMonthdisp ?>">
                      <div class="form-group form-float">
                       
                         <label class="form-label selectlabel zindex3">Months</label>
                         <input type="text" class="form-control"  name="episode_months" id="episode_months" placeholder="" autocomplete="off" value="<?php if($isUrinaryIn == 'Y'){ echo $bodycontent['AllUrinaryIncontinenceData']->episode_months;  } ?>">  
                        </div>
                      
                      
                    </div>

                   <!--  <?php $continuesdisp = "display:none;"; ?>
                     
                   <div class="col-sm-3 continousyermon" style="<?php echo $continuesdisp; ?>">
                      <div class="form-group form-float">
                       
                         <label class="form-label selectlabel zindex3">Continous Years</label>
                         <input type="text" class="form-control"  name="continous_years" id="continous_years" placeholder="" autocomplete="off" value="<?php if($isUrinaryIn == 'Y'){ echo $bodycontent['AllUrinaryIncontinenceData']->continous_years;  } ?>">  
                        </div>
                      
                      
                    </div>
                     <div class="col-sm-3 continousyermon" style="<?php echo $continuesdisp; ?>">
                      <div class="form-group form-float">
                       
                         <label class="form-label selectlabel zindex3">Continous Months</label>
                         <input type="text" class="form-control"  name="continous_months" id="continous_months" placeholder="" autocomplete="off" value="<?php if($isUrinaryIn == 'Y'){ echo $bodycontent['AllUrinaryIncontinenceData']->continous_months;  } ?>">  
                        </div>
                       
                      
                    </div>  -->
             	
                  </div>
                  <div class="row clearfix">
                  	
                     

                  	 <div class="col-sm-6">
                   <div class="form-group form-float">
                       <div class="form-line focused">
                         <textarea rows="1" name="urinary_notes" id="urinary_notes" class="form-control no-resize" style="overflow: hidden; overflow-wrap: break-word; height: 32px;" autocomplete="off"><?php if($isUrinaryIn == 'Y'){ echo $bodycontent['AllUrinaryIncontinenceData']->urinary_notes;  } ?>
                         		
                         	</textarea>
                             <label class="form-label">Notes</label>
                       </div>
                      </div>
                   </div>
                  	
                  </div>
 
                                                                  
                  </div>
				                  </div>
				               </div>


         <!-- End Urinary incontinence -->

         <!-- Start Lump lower abdomen Block --> 
  <?php if(!empty($bodycontent['AllLumplowerAbdomenData'])){

     $isLumplower = 'Y';

   }else{
   	$isLumplower = 'N';
   } ?>              
            <div class="panel panel-col-teal" id="complaint_15" style="<?php echo $displaynone; ?>">
                 <div class="panel-heading" role="tab" id="headingNineteen_19">
                 <h4 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" href="#collapseNineteen_19" aria-expanded="false" aria-controls="collapseNineteen_19">
                     <i class="material-icons">chrome_reader_mode</i>
                     <!-- <i class="more-less glyphicon glyphicon-plus"></i> -->
                   Lump lower abdomen
                  </a>
                  </h4>
                 </div>
                 <div id="collapseNineteen_19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingNineteen_19">
                 <div class="panel-body">

                  <div class="row clearfix">
                   <div class="col-sm-3">
                                                             
                            <label>Lump lower abdomen for:</label>
                                                                        
                          </div>
                       <div class="col-sm-3">
                      <div class="form-group form-float">
                       
                         <label class="form-label selectlabel zindex3">Years</label>
                         <input type="text" class="form-control dtl_years_15"  name="lump_lower_years" id="lump_lower_years" placeholder="" autocomplete="off" value="<?php if($isLumplower == 'Y'){ echo $bodycontent['AllLumplowerAbdomenData']->lump_lower_years;  } ?>">  
                        </div>
                      
                      
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group form-float">
                       
                         <label class="form-label selectlabel zindex3">Months</label>
                         <input type="text" class="form-control dtl_months_15"  name="lump_lower_months" id="lump_lower_months" placeholder="" autocomplete="off" value="<?php if($isLumplower == 'Y'){ echo $bodycontent['AllLumplowerAbdomenData']->lump_lower_months;  } ?>">  
                        </div>
                      
                      
                    </div>
                      <div class="col-sm-3">
                      <div class="form-group form-float">
                       
                         <label class="form-label selectlabel zindex3">Days</label>
                         <input type="text" class="form-control dtl_days_15"  name="lump_lower_days" id="lump_lower_days" placeholder="" autocomplete="off" value="<?php if($isLumplower == 'Y'){ echo $bodycontent['AllLumplowerAbdomenData']->lump_lower_days;  } ?>">  
                        </div>
                      
                      
                    </div>
                    
                         
                  </div>
                  <div class="row clearfix">
                  	<div class="col-sm-3">
                                                             
                            <label>Urinary Problem:</label>
                                                                        
                          </div>
                  
                   <div class="col-sm-3">
                     <div class="form-group form-float">
                         <div class="input-group">
                         <label class="form-label selectlabel zindex3">Retenion</label>
                         <select name="retanion" id="retanion" class="form-control show-tick"  data-live-search="true" tabindex="-98">
                         <option value=""> &nbsp; </option> 
                         <?php 

                         foreach ($bodycontent['YesorNo'] as $YesorNo) {  ?>
                         <option value="<?php echo $YesorNo;?>"
                        
                         <?php if($isLumplower == 'Y'){ if($bodycontent['AllLumplowerAbdomenData']->retanion == $YesorNo){ ?> selected <?php } } ?>                                                                              

                          ><?php echo $YesorNo;?></option>
                          <?php     } ?>
                                                   
                          </select>   
                           </div>
                         </div>
                        
                    </div>
                    <div class="col-sm-3">
                     <div class="form-group form-float">
                         <div class="input-group">
                         <label class="form-label selectlabel zindex3">Dysuria</label>
                         <select name="lump_dysuria" id="lump_dysuria" class="form-control show-tick"  data-live-search="true" tabindex="-98">
                         <option value=""> &nbsp; </option> 
                         <?php 

                         foreach ($bodycontent['YesorNo'] as $YesorNo) {  ?>
                         <option value="<?php echo $YesorNo;?>"
                        
                          <?php if($isLumplower == 'Y'){ if($bodycontent['AllLumplowerAbdomenData']->lump_dysuria == $YesorNo){ ?> selected <?php } } ?>                                                                              

                          ><?php echo $YesorNo;?></option>
                          <?php     } ?>
                                                   
                          </select>   
                           </div>
                         </div>
                        
                    </div>
                    <div class="col-sm-3">
                     <div class="form-group form-float">
                         <div class="input-group">
                         <label class="form-label selectlabel zindex3">Weight Loss</label>
                         <select name="weight_loss" id="weight_loss" class="form-control show-tick"  data-live-search="true" tabindex="-98">
                         <option value=""> &nbsp; </option> 
                         <?php 

                         foreach ($bodycontent['YesorNo'] as $YesorNo) {  ?>
                         <option value="<?php echo $YesorNo;?>"
                        
                        <?php if($isLumplower == 'Y'){ if($bodycontent['AllLumplowerAbdomenData']->weight_loss == $YesorNo){ ?> selected <?php } } ?>                                                                               

                          ><?php echo $YesorNo;?></option>
                          <?php     } ?>
                                                   
                          </select>   
                           </div>
                         </div>
                        
                    </div>

                 </div>
                 <div class="row clearfix">
                  <div class="col-sm-3"></div>
                 	 <div class="col-sm-3">
                      <div class="form-group form-float">
                       
                         <label class="form-label selectlabel zindex3">Others</label>
                         <input type="text" class="form-control"  name="lump_lower_others" id="lump_lower_others" placeholder="" autocomplete="off" value="<?php if($isLumplower == 'Y'){ echo $bodycontent['AllLumplowerAbdomenData']->others;  } ?>">  
                        </div>
                      
                      
                    </div>

                   <div class="col-sm-3">
                     <div class="form-group form-float">
                         <div class="input-group">
                         <label class="form-label selectlabel zindex3">Pain Abdomen</label>
                         <select name="lump_pain_abdomen" id="lump_pain_abdomen" class="form-control show-tick"  data-live-search="true" tabindex="-98">
                         <option value=""> &nbsp; </option> 
                         <?php 

                         foreach ($bodycontent['YesorNo'] as $YesorNo) {  ?>
                         <option value="<?php echo $YesorNo;?>"
                        
                         <?php if($isLumplower == 'Y'){ if($bodycontent['AllLumplowerAbdomenData']->lump_pain_abdomen == $YesorNo){ ?> selected <?php } } ?>
                                                                                                       

                          ><?php echo $YesorNo;?></option>
                          <?php     } ?>
                                                   
                          </select>   
                           </div>
                         </div>
                        
                    </div>

                                  	
                  </div>
 
                                                                  
                  </div>
				                  </div>
				               </div>


         <!-- End Lump lower abdomen -->

         <!-- Start Wants family planning Block --> 

        <?php if(!empty($bodycontent['AllWantsfamilyPlanningData'])){

     $isWantsfamilyPlanning = 'Y';

   }else{
   	$isWantsfamilyPlanning = 'N';
   } ?>               
            <div class="panel panel-col-teal" id="complaint_16" style="<?php echo $displaynone; ?>" >
                 <div class="panel-heading" role="tab" id="headingTwenty_19">
                 <h4 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" href="#collapseTwenty_19" aria-expanded="false" aria-controls="collapseTwenty_19">
                     <i class="material-icons">chrome_reader_mode</i>
                     <!-- <i class="more-less glyphicon glyphicon-plus"></i> -->
                   Wants family planning
                  </a>
                  </h4>
                 </div>
                 <div id="collapseTwenty_19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwenty_19">
                 <div class="panel-body">

                  <div class="row clearfix">
                   

                   <div class="col-sm-3">
                     <div class="form-group form-float">
                         <div class="input-group">
                         <label class="form-label selectlabel zindex3">Permanent</label>
                         <select name="permanent" id="permanent" class="form-control show-tick"  data-live-search="true" tabindex="-98">
                         <option value=""> &nbsp; </option> 
                         <?php 

                         foreach ($bodycontent['genderdrpdown'] as $genderdrpdown) {  ?>
                         <option value="<?php echo $genderdrpdown;?>"
                        
                          <?php if($isWantsfamilyPlanning == 'Y'){ if($bodycontent['AllWantsfamilyPlanningData']->permanent == $genderdrpdown){ ?> selected <?php } } ?>                                                                               

                          ><?php echo $genderdrpdown;?></option>
                          <?php     } ?>
                                                   
                          </select>   
                           </div>
                         </div>
                        
                    </div>

                    <div class="col-sm-3">
                     <div class="form-group form-float">
                         <div class="input-group">
                         <label class="form-label selectlabel zindex3">Temporary</label>
                         <select name="temporary" id="temporary" class="form-control show-tick"  data-live-search="true" tabindex="-98">
                         <option value=""> &nbsp; </option> 
                         <?php 

                         foreach ($bodycontent['familyplanningtemporary'] as $familyplanningtemporary) {  ?>
                         <option value="<?php echo $familyplanningtemporary;?>"
                        
                          <?php if($isWantsfamilyPlanning == 'Y'){ if($bodycontent['AllWantsfamilyPlanningData']->temporary == $familyplanningtemporary){ ?> selected <?php } } ?>                                                                              

                          ><?php echo $familyplanningtemporary;?></option>
                          <?php     } ?>
                                                   
                          </select>   
                           </div>
                         </div>
                        
                    </div>
  
                                  	
                  </div>
 
                                                                  
                  </div>
				                  </div>
				               </div>


         <!-- End Wants family planning Block -->

         <!-- Start Lump in breast Block --> 

   <?php if(!empty($bodycontent['AllLumpInBreastData'])){

     $isLumpInBreast = 'Y';

   }else{
   	$isLumpInBreast = 'N';
   } ?>
                       
            <div class="panel panel-col-teal" id="complaint_17" style="<?php echo $displaynone; ?>">
                 <div class="panel-heading" role="tab" id="headingTwentyone_19">
                 <h4 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" href="#collapseTwentyone_19" aria-expanded="false" aria-controls="collapseTwentyone_19">
                     <i class="material-icons">chrome_reader_mode</i>
                     <!-- <i class="more-less glyphicon glyphicon-plus"></i> -->
                   Lump in breast
                  </a>
                  </h4>
                 </div>
                 <div id="collapseTwentyone_19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwentyone_19">
                 <div class="panel-body">

                  <div class="row clearfix">
                   <div class="col-sm-3">
                                                             
                            <label>Lump In Breast For:</label>
                                                                        
                          </div>
                    <div class="col-sm-3">
                      <div class="form-group form-float">
                       
                         <label class="form-label selectlabel zindex3">Years</label>
                         <input type="text" class="form-control dtl_years_17"  name="lump_breast_years" id="lump_breast_years" placeholder="" autocomplete="off" value="<?php if($isLumpInBreast == 'Y'){ echo $bodycontent['AllLumpInBreastData']->lump_breast_years;  } ?>">  
                        </div>
                      
                      
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group form-float">
                       
                         <label class="form-label selectlabel zindex3">Months</label>
                         <input type="text" class="form-control dtl_months_17"  name="lump_breast_months" id="lump_breast_months" placeholder="" autocomplete="off" value="<?php if($isLumpInBreast == 'Y'){ echo $bodycontent['AllLumpInBreastData']->lump_breast_months;  } ?>">  
                        </div>
                      
                      
                    </div>
                      <div class="col-sm-3">
                      <div class="form-group form-float">
                       
                         <label class="form-label selectlabel zindex3">Days</label>
                         <input type="text" class="form-control dtl_days_17"  name="lump_breast_days" id="lump_breast_days" placeholder="" autocomplete="off" value="<?php if($isLumpInBreast == 'Y'){ echo $bodycontent['AllLumpInBreastData']->lump_breast_days;  } ?>">  
                        </div>
                      
                      
                    </div>
                    
                    
                    </div>
                    <div class="row clearfix">
                    <div class="col-sm-3">
                                                             
                            <label>Associted With:</label>
                                                                        
                          </div>         

                   <div class="col-sm-3">
                     <div class="form-group form-float">
                         <div class="input-group">
                         <label class="form-label selectlabel zindex3">Pain</label>
                         <select name="lump_breast_pain" id="lump_breast_pain" class="form-control show-tick"  data-live-search="true" tabindex="-98">
                         <option value=""> &nbsp; </option> 
                         <?php 

                         foreach ($bodycontent['YesorNo'] as $YesorNo) {  ?>
                         <option value="<?php echo $YesorNo;?>"
                        
                         <?php if($isLumpInBreast == 'Y'){ if($bodycontent['AllLumpInBreastData']->lump_breast_pain == $YesorNo){ ?> selected <?php } } ?>                                                                              

                          ><?php echo $YesorNo;?></option>
                          <?php     } ?>
                                                   
                          </select>   
                           </div>
                         </div>
                        
                    </div>

                    <div class="col-sm-3">
                     <div class="form-group form-float">
                         <div class="input-group">
                         <label class="form-label selectlabel zindex3">Nipple Discharge</label>
                         <select name="nipple_discharge" id="nipple_discharge" class="form-control show-tick"  data-live-search="true" tabindex="-98">
                         <option value=""> &nbsp; </option> 
                         <?php 

                         foreach ($bodycontent['YesorNo'] as $YesorNo) {  ?>
                         <option value="<?php echo $YesorNo;?>"
                        
                         <?php if($isLumpInBreast == 'Y'){ if($bodycontent['AllLumpInBreastData']->nipple_discharge == $YesorNo){ ?> selected <?php } } ?>                                                                              

                          ><?php echo $YesorNo;?></option>
                          <?php     } ?>
                                                   
                          </select>   
                           </div>
                         </div>
                        
                    </div>

                                   	
                  </div>
                  <div class="row clearfix">
                  	<div class="col-sm-3">
                                                             
                            <label>Notes:</label>
                                                                        
                          </div>
                  	 <div class="col-sm-6">
                   <div class="form-group form-float">
                       <div class="form-line focused">
                         <textarea rows="1" name="lump_breast_notes" id="lump_breast_notes" class="form-control no-resize" style="overflow: hidden; overflow-wrap: break-word; height: 32px;" autocomplete="off"><?php if($isLumpInBreast == 'Y'){ echo $bodycontent['AllLumpInBreastData']->lump_breast_notes;  } ?>
                         		
                         	</textarea>
                             <!-- <label class="form-label">Notes</label> -->
                       </div>
                      </div>
                   </div>
                  </div>
 
                                                                  
                  </div>
				                  </div>
				               </div>


         <!-- End Lump in breast Block -->

         <!-- Start Congested breast Block --> 

      <?php if(!empty($bodycontent['AllbreastcongestionData'])){

     $isbreastcongestion = 'Y';

   }else{
   	$isbreastcongestion = 'N';
   } ?>    
                       
            <div class="panel panel-col-teal" id="complaint_18" style="<?php echo $displaynone; ?>">
                 <div class="panel-heading" role="tab" id="headingTwentytwo_19">
                 <h4 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" href="#collapseTwentytwo_19" aria-expanded="false" aria-controls="collapseTwentytwo_19">
                     <i class="material-icons">chrome_reader_mode</i>
                     <!-- <i class="more-less glyphicon glyphicon-plus"></i> -->
                   Congested breast
                  </a>
                  </h4>
                 </div>
                 <div id="collapseTwentytwo_19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwentytwo_19">
                 <div class="panel-body">

                  <div class="row clearfix">
                   <div class="col-sm-3">
                                                             
                            <label>Breast Congestion For:</label>
                                                                        
                          </div>
                   <div class="col-sm-3">
                      <div class="form-group form-float">
                       
                         <label class="form-label selectlabel zindex3">Months</label>
                         <input type="text" class="form-control dtl_months_18"  name="breast_congestion_months" id="breast_congestion_months" placeholder="" autocomplete="off" value="<?php if($isbreastcongestion == 'Y'){ echo $bodycontent['AllbreastcongestionData']->breast_congestion_months;  } ?>">  
                        </div>
                     
                    </div>
                   <div class="col-sm-3">
                      <div class="form-group form-float">
                       
                         <label class="form-label selectlabel zindex3">Days</label>
                         <input type="text" class="form-control dtl_days_18"  name="breast_congestion_days" id="breast_congestion_days" placeholder="" autocomplete="off" value="<?php if($isbreastcongestion == 'Y'){ echo $bodycontent['AllbreastcongestionData']->breast_congestion_days;  } ?>">  
                        </div>
                      
                      
                    </div>
                      


                   <div class="col-sm-3">
                     <div class="form-group form-float">
                         <div class="input-group">
                         <label class="form-label selectlabel zindex3">Breastfeeding</label>
                         <select name="breast_feeding" id="breast_feeding" class="form-control show-tick"  data-live-search="true" tabindex="-98">
                         <option value=""> &nbsp; </option> 
                         <?php 

                         foreach ($bodycontent['YesorNo'] as $YesorNo) {  ?>
                         <option value="<?php echo $YesorNo;?>"
                        
                         <?php if($isbreastcongestion == 'Y'){ if($bodycontent['AllbreastcongestionData']->breastfeeding == $YesorNo){ ?> selected <?php } } ?>                                                                              

                          ><?php echo $YesorNo;?></option>
                          <?php     } ?>
                                                   
                          </select>   
                           </div>
                         </div>
                        
                    </div>
  
                                  	
                  </div>
                  <div class="row clearfix">
                  	 <div class="col-sm-3">
                                                             
                            <label>Age Of Baby:</label>
                                                                        
                          </div>
                     <div class="col-sm-3">
                      <div class="form-group form-float">
                       
                         <label class="form-label selectlabel zindex3">Years</label>
                         <input type="text" class="form-control"  name="baby_age_years" id="baby_age_years" placeholder="" autocomplete="off" value="<?php if($isbreastcongestion == 'Y'){ echo $bodycontent['AllbreastcongestionData']->baby_age_years;  } ?>">  
                        </div>
                      
                      
                    </div>
                     <div class="col-sm-3">
                      <div class="form-group form-float">
                       
                         <label class="form-label selectlabel zindex3">Months</label>
                         <input type="text" class="form-control"  name="baby_age_months" id="baby_age_months" placeholder="" autocomplete="off" value="<?php if($isbreastcongestion == 'Y'){ echo $bodycontent['AllbreastcongestionData']->baby_age_months;  } ?>">  
                        </div>
                      
                      
                    </div>
                            
                  </div>
                  <div class="row clearfix">
                  	 <div class="col-sm-3">
                                                             
                            <label>Notes:</label>
                                                                        
                          </div>
                  	<div class="col-sm-6">
                   <div class="form-group form-float">
                       <div class="form-line focused">
                         <textarea rows="1" name="breast_congestion_notes" id="breast_congestion_notes" class="form-control no-resize" style="overflow: hidden; overflow-wrap: break-word; height: 32px;" autocomplete="off"><?php if($isbreastcongestion == 'Y'){ echo $bodycontent['AllbreastcongestionData']->breast_congestion_notes;  } ?>
                         		
                         	</textarea>
                            <!--  <label class="form-label">Notes</label> -->
                       </div>
                      </div>
                   </div>
                  </div>
 
                                                                  
                  </div>
				                  </div>
				               </div>


         <!-- End Congested breast Block -->

   
        <!-- Start Pain in breast Block --> 

    <!-- comment by anil 12-10-2019 because using jquery for form display --> 

   <!-- <?php if($chiefgynccology == 'Y'){ if($bodycontent['allchiefcomplaitID'][18]->is_check == 'Y'){ echo $displayblock; } else{ echo $displaynone; } } else{ echo $displaynone; } ?> -->

  
     <?php if(!empty($bodycontent['AllpainInbreastData'])){

     $ispainInbreast = 'Y';

   }else{
   	$ispainInbreast = 'N';
   } ?>
                       
            <div class="panel panel-col-teal" id="complaint_19" style=" <?php echo $displaynone; ?>">
                 <div class="panel-heading" role="tab" id="headingeTwentythree_19">
                 <h4 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" href="#collapseTwentythree_19" aria-expanded="false" aria-controls="collapseTwentythree_19">
                     <i class="material-icons">chrome_reader_mode</i>
                     <!-- <i class="more-less glyphicon glyphicon-plus"></i> -->
                   Pain in breast
                  </a>
                  </h4>
                 </div>
                 <div id="collapseTwentythree_19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwentythree_19">
                 <div class="panel-body">

                  <div class="row clearfix">
                  
                   <div class="col-sm-3">
                     <div class="form-group form-float">
                         <div class="input-group">
                         <label class="form-label selectlabel zindex3">Pain In Breast</label>
                         <select name="pain_in_breast" id="pain_in_breast" class="form-control show-tick"  data-live-search="true" tabindex="-98">
                         <option value=""> &nbsp; </option> 
                         <?php 

                         foreach ($bodycontent['stichlineProblemCommDrp'] as $stichlineProblemCommDrp) {  ?>
                         <option value="<?php echo $stichlineProblemCommDrp;?>"
                        
                        <?php if($ispainInbreast == 'Y'){ if($bodycontent['AllpainInbreastData']->pain_in_breast == $stichlineProblemCommDrp){ ?> selected <?php } } ?>                                                                               

                          ><?php echo $stichlineProblemCommDrp;?></option>
                          <?php     } ?>
                                                   
                          </select>   
                           </div>
                         </div>
                        
                    </div>
                     <div class="col-sm-3">
                     <div class="form-group form-float">
                         <div class="input-group">
                         <label class="form-label selectlabel zindex3">Lymphnode</label>
                         <select name="lymphnode" id="lymphnode" class="form-control show-tick"  data-live-search="true" tabindex="-98">
                         <option value=""> &nbsp; </option> 
                         <?php 

                         foreach ($bodycontent['YesorNo'] as $YesorNo) {  ?>
                         <option value="<?php echo $YesorNo;?>"
                        
                         <?php if($ispainInbreast == 'Y'){ if($bodycontent['AllpainInbreastData']->lymphnode == $YesorNo){ ?> selected <?php } } ?>
                                                                                                       

                          ><?php echo $YesorNo;?></option>
                          <?php     } ?>
                                                   
                          </select>   
                           </div>
                         </div>
                        
                    </div>
                     <div class="col-sm-3">
                     <div class="form-group form-float">
                         <div class="input-group">
                         <label class="form-label selectlabel zindex3">Nipple Discharge</label>
                         <select name="breast_nipple_discharge" id="breast_nipple_discharge" class="form-control show-tick"  data-live-search="true" tabindex="-98">
                         <option value=""> &nbsp; </option> 
                         <?php 

                         foreach ($bodycontent['YesorNo'] as $YesorNo) {  ?>
                         <option value="<?php echo $YesorNo;?>"
                        
                         <?php if($ispainInbreast == 'Y'){ if($bodycontent['AllpainInbreastData']->breast_nipple_discharge == $YesorNo){ ?> selected <?php } } ?>                                                                              

                          ><?php echo $YesorNo;?></option>
                          <?php     } ?>
                                                   
                          </select>   
                           </div>
                         </div>
                        
                    </div>
                
                   <div class="col-sm-3">
                     <div class="form-group form-float">
                         <div class="input-group">
                         <label class="form-label selectlabel zindex3">O|E Lump Felt</label>
                         <select name="lump_felt" id="lump_felt" class="form-control show-tick"  data-live-search="true" tabindex="-98">
                         <option value=""> &nbsp; </option> 
                         <?php 

                         foreach ($bodycontent['YesorNo'] as $YesorNo) {  ?>
                         <option value="<?php echo $YesorNo;?>"
                        
                         <?php if($ispainInbreast == 'Y'){ if($bodycontent['AllpainInbreastData']->lump_felt == $YesorNo){ ?> selected <?php } } ?>                                                                              

                          ><?php echo $YesorNo;?></option>
                          <?php     } ?>
                                                   
                          </select>   
                           </div>
                           <input type="hidden" name="islumpFelt" id="islumpFelt" value="<?php if($ispainInbreast == 'Y'){ echo $bodycontent['AllpainInbreastData']->is_lump_felt; } ?>">
                         </div>
                        
                    </div>
               	
                  </div>
                 <?php if($ispainInbreast == 'Y' && $bodycontent['AllpainInbreastData']->is_lump_felt == 'Y'){ 
                 	$lumpfeltYesdisp = 'display:block;'; 
                 	$lumpfeltNodisp = 'display:none;'; 
                   }
                  else if($ispainInbreast == 'Y' && $bodycontent['AllpainInbreastData']->is_lump_felt == 'N'){
                    $lumpfeltYesdisp = 'display:none;'; 
                 	$lumpfeltNodisp = 'display:block;';
                 }else{

                 	$lumpfeltYesdisp = 'display:none;'; 
                 	$lumpfeltNodisp = 'display:none;';
                 } 
                  ?>

                  <div class="row clearfix" id="lump_felt_yes" style="<?php echo $lumpfeltYesdisp; ?>">
                  	
                <div class="col-sm-3">
                                                             
                            <label>Consistency:</label>
                                                                        
                          </div>

                    <div class="col-sm-3">	


                      <div class="form-group form-float  noborder_radio">
                       	 <input name="consistency" type="radio" class="with-gap" id="firm" value="firm" 
                         <?php if($ispainInbreast == 'Y' && $bodycontent['AllpainInbreastData']->cosistency == 'firm'){ ?> checked <?php } ?> >
                       <label for="firm">Firm</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input name="consistency" type="radio" class="with-gap" id="hard" value="hard" 
                       <?php if($ispainInbreast == 'Y' && $bodycontent['AllpainInbreastData']->cosistency == 'hard'){ ?> checked <?php } ?> >
                        <label for="hard">Hard</label>
                      	
                                              
                         </div>
               
                </div>
                 <div class="col-sm-3">
                                                             
                            <label>Mobility:</label>
                                                                        
                          </div>
                <div class="col-sm-3">	


                      <div class="form-group form-float  noborder_radio">
                       	 <input name="mobility" type="radio" class="with-gap" id="mobile" value="Mobile" 
                        <?php if($ispainInbreast == 'Y' && $bodycontent['AllpainInbreastData']->mobility == 'Mobile'){ ?> checked <?php } ?>  >
                       <label for="mobile">Mobile</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input name="mobility" type="radio" class="with-gap" id="not_mobile" value="Notmobile" 
                        <?php if($ispainInbreast == 'Y' && $bodycontent['AllpainInbreastData']->mobility == 'Notmobile'){ ?> checked <?php } ?> >
                        <label for="not_mobile">Not Mobile</label>
                      	
                                              
                         </div>
               
                </div>
                <div class="col-sm-3">       
  
                  <div class="form-group form-group">
                         <div class="input-group" >
                                       
                             <input type="checkbox" name="right_breast" id="right_breast" class="filled-in chk-col-deep-purple" <?php if($ispainInbreast == 'Y' && $bodycontent['AllpainInbreastData']->right_breast == 'Y'){ ?> checked <?php } ?>> 
                             <label for="right_breast">Right Breast</label>
                            <input type="hidden" name="rightBreastvalues" id="rightBreastvalues" value="<?php if($ispainInbreast == 'Y') { echo $bodycontent['AllpainInbreastData']->right_breast;}else{ echo 'N'; } ?>">
                              
                          </div>  
                  </div>
               </div>
               <div class="col-sm-3">       
  
                  <div class="form-group form-group">
                         <div class="input-group" >
                                       
                             &nbsp;&nbsp;<input type="checkbox" name="left_breast" id="left_breast" class="filled-in chk-col-deep-purple" <?php if($ispainInbreast == 'Y' && $bodycontent['AllpainInbreastData']->left_breast == 'Y'){ ?> checked <?php } ?>> 
                             <label for="left_breast">Left Breast</label>
                              <input type="hidden" name="leftBreastvalues" id="leftBreastvalues" value="<?php if($ispainInbreast == 'Y') { echo $bodycontent['AllpainInbreastData']->left_breast;}else{ echo 'N'; } ?>">
                              
                          </div>  
                  </div>
               </div>
                <div class="col-sm-3">
                      <div class="form-group form-float">
                       
                         <label class="form-label selectlabel zindex3">Location</label>
                         <input type="text" class="form-control"  name="lump_felt_location" id="lump_felt_location" placeholder="" autocomplete="off" value="<?php if($ispainInbreast == 'Y') { echo $bodycontent['AllpainInbreastData']->lump_felt_location;} ?>">  
                        </div>
                      
                      
                    </div>
                     <div class="col-sm-3">
                      <div class="form-group form-float">
                       
                         <label class="form-label selectlabel zindex3">Size</label>
                         <input type="text" class="form-control"  name="lump_felt_size" id="lump_felt_size" placeholder="" autocomplete="off" value="<?php if($ispainInbreast == 'Y') { echo $bodycontent['AllpainInbreastData']->lump_felt_size;} ?>">  
                        </div>
                      
                      
                    </div>

                  </div>
                  <div class="row clearfix" id="lump_felt_no" style="<?php echo $lumpfeltNodisp; ?>">
                  	 <div class="col-sm-3">
                     <div class="form-group form-float">
                         <div class="input-group">
                         <label class="form-label selectlabel zindex3">With Nodularity</label>
                         <select name="with_nodularity" id="with_nodularity" class="form-control show-tick"  data-live-search="true" tabindex="-98">
                         <option value=""> &nbsp; </option> 
                         <?php 

                         foreach ($bodycontent['YesorNo'] as $YesorNo) {  ?>
                         <option value="<?php echo $YesorNo;?>"
                        
                         <?php if($ispainInbreast == 'Y'){ if($bodycontent['AllpainInbreastData']->with_nodularity == $YesorNo){ ?> selected <?php } } ?>                                                                              

                          ><?php echo $YesorNo;?></option>
                          <?php     } ?>
                                                   
                          </select>   
                           </div>
                         </div>
                        
                    </div>
                  </div>
                  <div class="row clearfix">
                  	 <div class="col-sm-3">
                                                             
                            <label>Notes:</label>
                                                                        
                          </div>
                  	<div class="col-sm-6">
                   <div class="form-group form-float">
                       <div class="form-line focused">
                         <textarea rows="1" name="pain_in_breast_notes" id="pain_in_breast_notes" class="form-control no-resize" style="overflow: hidden; overflow-wrap: break-word; height: 32px;" autocomplete="off"><?php if($ispainInbreast == 'Y') { echo $bodycontent['AllpainInbreastData']->notes;} ?>
                         		
                         	</textarea>
                            <!--  <label class="form-label">Notes</label> -->
                       </div>
                      </div>
                   </div>
                  </div>
 
                                                                  
                  </div>
				                  </div>
				               </div>


         <!-- End Pain in breast Block -->


				           </div>
				       </div>

				   </div>
				   
				</div>
				
		     </div>
		     
               <div class="row clearfix">
                           <div class="col-sm-4"></div>                                     
                        <div class="col-sm-8 colcenter">
                                                                  
                          <button type="submit" class="btn bg-pink waves-effect gynccologysavebtn" id="gynccologysavebtn"><i class="material-icons">cached</i> 
                                  <span><?php echo $bodycontent['gynccologybtnText']; ?></span>
                                         </button> 
                          <span class="btn bg-pink waves-effect loaderbtn gynccologyloaderbtn" id="gynccologyloaderbtn" style="display:none;"><?php echo $bodycontent['gynccologybtnTextLoader']; ?></span>
                                                                        
                          </div>
                                                                
                            
                       </div>
		     
		</section>

                

                        </form>
					
					
                    

                         	




                         </div> <!-- End of right side content-->
               
                           <!-- ============ end of antenantal_left_tab_menu_1_section ========= -->

                            </div>
                        </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            
                  </div>
               </div>
            </div>
        </section>
    </div>               