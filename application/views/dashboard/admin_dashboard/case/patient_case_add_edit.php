 <script src="<?php echo(base_url());?>assets/js/adm_scripts/case_addedit.js"></script>

 <!-- <style>

.width18{
    width: 23% !important;

}
.table tbody tr td, .table tbody tr th {
   
border-top: 1px solid #f0c7f9;

border-bottom: 1px solid #f0c7f9;
}

@media (max-width: 767px) {
    .table-responsive .dropdown-menu {
        position: static !important;
    }
}
@media (min-width: 768px) {
    .table-responsive {
        overflow: visible;
    }
}

.gridtable tbody tr td, .gridtable tbody tr th {
   
border-top: 0px solid #fff !important;

border-bottom: 0px solid #fff !important;
}


</style> -->

<style>
  .inner{
  max-height: 230px !important;
}
.dropdown-menu > li > a {

    white-space: inherit;

}
.form-control{

  z-index: unset !important;

}
</style>


<div id="patientCaseManagment">



  <input type="hidden" name="mode" id="mode" value="<?php echo $bodycontent['mode']; ?>" />
   <input type="hidden" name="caseID" id="caseID" value="<?php echo $bodycontent['caseID']; ?>" />
          <?php echo $bodycontent['patientmasterEditdata']->patientname; ?>     

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

                                        <!-- Commented on 29.08.2019
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-1 topcol">
                                            <button type="button" class="btn btn-block  waves-effect tabbtn" id="antenantalbtn">Antenantal</button> 	
                                        </div>

                                        <div class="col-sm-1 topcol">
                                            <button type="button" class="btn btn-block waves-effect tabbtn tabtnnonclck" id="preopbtn">Pre op</button> 	
                                        </div>

                                        <div class="col-sm-1 topcol">
                                            <button type="button" class="btn btn-block  waves-effect tabbtn tabtnnonclck" id="postopbtn">Post op</button> 	
                                        </div>

                                        <div class="col-sm-1 topcol">
                                            <button type="button" class="btn btn-block  waves-effect tabbtn tabtnnonclck" id="dischargebtn">Discharge</button> 	
                                        </div> -->
                                      

                                        <!-- <button type="button" class="btn btn-block  waves-effect tabbtn" id="antenantalbtn">Antenantal</button>
                                        <button type="button" class="btn btn-block waves-effect tabbtn tabtnnonclck" id="preopbtn">Pre op</button> 
                                        <button type="button" class="btn btn-block  waves-effect tabbtn tabtnnonclck" id="postopbtn">Post op</button>	 	
                                        <button type="button" class="btn btn-block  waves-effect tabbtn tabtnnonclck" id="dischargebtn">Discharge</button> 	 -->


                                        <ul class="nav nav-tabs thmcolor" role="tablist">
                                          <li role="presentation" class="active">
                                              <!-- <a href="#home_with_icon_title" data-toggle="tab" aria-expanded="true">
                                                  <i class="material-icons">home</i> HOME
                                              </a> -->
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
                                      </ul>

                                    </div> <!-- end of trearment stage -->


<!-- ============================================start of antenantalbtn_section=========================================== -->

                                   <section class="treatmentsection" id="antenantalbtn_section">
                                    <div class="row clearfix" style="#border: 1px solid gray;"> <!--start of info body -->

                                   <div class="col-sm-2 leftmenuPatientCase">
                                    		
                                    <button type="button" class="btn btn-block btn-xs waves-effect tab_lf_btn" id="antenantal_left_tab_menu_1"><span><i class="material-icons">assignment_ind</i></span>&nbsp;Patient Info</button>
                                    <button type="button" class="btn btn-block btn-xs waves-effect tab_lf_btn" id="antenantal_left_tab_menu_2"><span><i class="material-icons">receipt</i></span>&nbsp;Basic Record</button>
                                    <button type="button" class="btn btn-block btn-xs waves-effect tab_lf_btn" id="antenantal_left_tab_menu_3"><span><i class="material-icons">pregnant_woman</i></span>&nbsp;Previous Child Birth</button>
                                    <button type="button" class="btn btn-block btn-xs waves-effect tab_lf_btn"  id="antenantal_left_tab_menu_4"><span><i class="material-icons">today</i></span>&nbsp;History</button>
                                    <button type="button" class="btn btn-block btn-xs waves-effect tab_lf_btn"  id="antenantal_left_tab_menu_5"><span><i class="material-icons">looks_one</i></span>&nbsp;First Examination</button>
                                    <button type="button" class="btn btn-block btn-xs waves-effect tab_lf_btn"  id="antenantal_left_tab_menu_9"><span><i class="material-icons">note_add</i></span>&nbsp;Clinical Examination</button>
                                     <button type="button" class="btn btn-block btn-xs waves-effect tab_lf_btn"  id="antenantal_left_tab_menu_6"><span><i class="material-icons">local_pharmacy</i></span>&nbsp;Investigation</button> 
                                   
                                     <button type="button" class="btn btn-block btn-xs waves-effect tab_lf_btn prescription_menu_btn"  id="antenantal_left_tab_menu_7"><span><i class="material-icons">note</i></span>&nbsp;Prescription</button>

                                    <button type="button" class="btn btn-block btn-xs waves-effect 
                                    tab_lf_btn"  id="antenantal_left_tab_menu_8"><span><i class="material-icons">print</i></span>&nbsp;Print</button>
                                     
                                      



                               
                                      
                                      <!--
                                      <button type="button" class="btn btn-block btn-xs waves-effect tab_lf_btn"  id="antenantal_left_tab_menu_9"><span>➤</span>&nbsp;XXXXXXXXX</button>

                                    		-->
                                    	</div>
                                    	<!-- start of right side content-->
                                    	<div class="col-sm-10 rightContentBlock" style="border: 0px solid #eeecec;">


                            <!-- ======= start of antenantal_left_tab_menu_1_section ============ -->
                            <section class="antenantalDataSection patientBlockSection" id="antenantal_left_tab_menu_1_section">
                                <center class="headingtitile_patient"><h5 class="title_head">&#9733; Patient Info </h5></center>
          			                <br>


                          <div id="basic_patient_info_div"><!-- start of basic_patient_info_div -->
                                
                                <form class="form-area" name="patientBasicForm" id="patientBasicForm" >
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

                                                          <!--  <div class="col-sm-2">
                                                              <div class="form-group form-float">
                                                              <div class="input-group bloodgrpeerr" id="bloodgrpeerr">
                                                                  <label class="form-label">Blood Group</label> 
                                                              <select name="bloodgroup" id="bloodgroup" class="form-control show-tick" data-live-search="true" tabindex="-98">
                                                                <option value="0"> Select </option>
                                                                <?php 

                                                                foreach ($bodycontent['bloodGroupList'] as $value) {  ?>
                                                                  <option value="<?php echo $value->id;?>"

                                                                    <?php if(($bodycontent['mode']=="EDIT") && $value->id==$bodycontent['patientmasterEditdata']->bloodgroup){echo "selected";}else{echo "";} ?>
                                                                        
                                                                      

                                                                        ><?php echo $value->bld_group_code?></option>
                                                                <?php     } ?>
                                                                  
                                                              </select>   
                                                          </div>  
                                                            </div>
                                                            </div> 

                                                            <div class="col-sm-2">
                                                              <div class="form-group form-float">
                                                              <div class="input-group bloodgrpeerr" id="husbandbloodgrpeerr">
                                                                  <label class="form-label">Husband Blood Group</label> 
                                                              <select name="husband_bloodgroup" id="husband_bloodgroup" class="form-control show-tick" data-live-search="true" tabindex="-98">
                                                                <option value="0"> Select </option>
                                                                <?php 

                                                                foreach ($bodycontent['bloodGroupList'] as $value) {  ?>
                                                                  <option value="<?php echo $value->id;?>"
                                                                      <?php if(($bodycontent['mode']=="EDIT") && $value->id==$bodycontent['patientmasterEditdata']->husband_bloodgroup){echo "selected";}else{echo "";} ?>   
                                                                      

                                                                        ><?php echo $value->bld_group_code?></option>
                                                                <?php     } ?>
                                                                  
                                                              </select>   
                                                          </div>  
                                                            </div>
                                                            </div> -->                                      
                                                                                                            
                                                        </div>

                                                          <div class="row clearfix">
                                                              <!-- <div class="col-sm-2"></div> -->
                                                          <div class="col-sm-8">
                                                                            <div class="form-group form-float">
                                                                                <div class="form-line">
                                                                                    <textarea rows="1" name="address" id="address" class="form-control no-resize auto-growth"  style="overflow: hidden; overflow-wrap: break-word; height: 32px;" autocomplete="off"
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
                                                                  
                                                                  <button type="submit" class="btn bg-pink waves-effect patientupdButton" id="patientbasicsavebtn"><i class="material-icons">cached</i> 
                                                                    <span><?php echo $bodycontent['btnText']; ?></span>
                                                                  </button> 

               

                                                                  <span class="btn bg-pink waves-effect loaderbtn" id="loaderbtn" style="display:none;"><?php echo $bodycontent['btnTextLoader']; ?></span>
                                                                        
                                                                </div>
                                                                
                                                                <div class="col-sm-4"></div>
                                                            </div>

                                                                  

                                                                      </form>

                                                            

                                                        
                                    	
                            </div><!-- end of basic_patient_info_div -->

                         	</section>
               
                           <!-- ============ end of antenantal_left_tab_menu_1_section ========= -->

                          
                           <!-- ======= start of antenantal_left_tab_menu_2_section ============ -->

           <form class="form-area" name="antinatalBasicRecordForm" id="antinatalBasicRecordForm" >
           <input type="hidden" name="antenantalID" id="antenantalID" value="<?php echo $bodycontent['antenantalID']; ?>" />
           <input type="hidden" name="caseID" id="caseID" value="<?php echo $bodycontent['caseID']; ?>" />
           <input type="hidden" name="antenantalmode" id="antenantalmode" value="<?php echo $bodycontent['antenantalmode']; ?>" />
            <section class="antenantalDataSection patientBlockSection" id="antenantal_left_tab_menu_2_section">

            <center class="headingtitile_patient"><h5 class="title_head">&#9733; Basic Record</h5></center>
            <br>

          			     

          			     	
              <div class="demo-masked-input formgap basicCustomFormDesign"><!-- start of demo-masked-input -->
              

                <div class="row clearfix formrowgap"><!-- start of first row -->
                    <div class="col-sm-3">
                    <div class="form-group form-float">
                      <div class="input-group wifebloodgrpeerr" id="wifebloodgrpeerr">
                          <label class="form-label selectlabel">Blood Group</label> 
                    <select name="wifebloodgroup" id="wifebloodgroup" class="form-control show-tick"  data-live-search="true" tabindex="-98">
                    <option value="0"> &nbsp; </option>
                    <?php 

                    foreach ($bodycontent['bloodGroupList'] as $value) {  ?>
                    <option value="<?php echo $value->id;?>"

                    <?php if(($bodycontent['antenantalmode']=="EDIT") && $value->id==$bodycontent['antenantalCaseEditdata']->wife_bloodgroup){echo "selected";}else{echo "";} ?>
                                                    
                                                  

                    ><?php echo $value->bld_group_code?></option>
                      <?php     } ?>
                                              
                    </select>   
                      </div>  
                  </div>
              </div> 





               <div class="col-sm-3">
	                <div class="form-group form-float">
	                   <div class="input-group wifeoccupationerr" id="wifeoccupationerr">
		                     <label class="form-label selectlabel">Occupation</label> 
					         <select name="wifeoccupation" id="wifeoccupation" class="form-control show-tick"  data-live-search="true" tabindex="-98">
					         <option value="0"> &nbsp; </option>
					         <?php 

					         foreach ($bodycontent['occupationList'] as $value) {  ?>
					         <option value="<?php echo $value->occupation_id;?>"

					         <?php if(($bodycontent['antenantalmode']=="EDIT") && $value->occupation_id==$bodycontent['antenantalCaseEditdata']->wife_occupation){echo "selected";}else{echo "";} ?>
					                                        
					                                      

					          ><?php echo $value->occupation?></option>
					          <?php     } ?>
					                                   
					          </select>   
	                    </div>  
	                </div>
                </div> 

                <div class="col-sm-3">
	                <div class="form-group form-float">
	                   <div class="input-group wifeeducationerr" id="wifeeducationerr">
		                     <label class="form-label selectlabel">Education</label> 
					         <select name="wifeeducation" id="wifeeducation" class="form-control show-tick"  data-live-search="true" tabindex="-98">
					         <option value="0"> &nbsp; </option>
					         <?php 

					         foreach ($bodycontent['educationList'] as $value) {  ?>
					         <option value="<?php echo $value->qualification_id;?>"

					         <?php if(($bodycontent['antenantalmode']=="EDIT") && $value->qualification_id==$bodycontent['antenantalCaseEditdata']->wife_education){echo "selected";}else{echo "";} ?>
					                                        
					                                      

					          ><?php echo $value->qualification?></option>
					          <?php     } ?>
					                                   
					          </select>   
	                    </div>  
	                </div>
                </div>                       
                </div><!-- end of first row -->


              <div class="row clearfix formrowgap"><!-- end of second row -->                     
  			   
  			        <div class="col-sm-3">
	                <div class="form-group form-float">
	                   <div class="input-group husbloodgrpeerr" id="husbloodgrpeerr">
		                     <label class="form-label selectlabel">Husband Blood Group</label> 
					         <select name="husbandbloodgroup" id="husbandbloodgroup" class="form-control show-tick"  data-live-search="true" tabindex="-98">
					         <option value="0"> &nbsp; </option>
					         <?php 

					         foreach ($bodycontent['bloodGroupList'] as $value) {  ?>
					         <option value="<?php echo $value->id;?>"

					         <?php if(($bodycontent['antenantalmode']=="EDIT") && $value->id==$bodycontent['antenantalCaseEditdata']->husband_bloodgroup){echo "selected";}else{echo "";} ?>
					                                        
					                                      

					          ><?php echo $value->bld_group_code?></option>
					          <?php     } ?>
					                                   
					          </select>   
	                    </div>  
	                </div>
                </div> 
  			    <div class="col-sm-3">
	                <div class="form-group form-float">
	                   <div class="input-group husoccupationerr" id="husoccupationerr">
		                     <label class="form-label selectlabel">Husband Occupation</label> 
					         <select name="husbandoccupation" id="husbandoccupation" class="form-control show-tick"  data-live-search="true" tabindex="-98">
					         <option value="0"> &nbsp; </option>
					         <?php 

					         foreach ($bodycontent['occupationList'] as $value) {  ?>
					         <option value="<?php echo $value->occupation_id;?>"

					         <?php if(($bodycontent['antenantalmode']=="EDIT") && $value->occupation_id==$bodycontent['antenantalCaseEditdata']->husband_occupation){echo "selected";}else{echo "";} ?>
					                                        
					                                      

					          ><?php echo $value->occupation?></option>
					          <?php     } ?>
					                                   
					          </select>   
	                    </div>  
	                </div>
                </div> 





               <div class="col-sm-3">
	                <div class="form-group form-float">
	                   <div class="input-group huseducationerr" id="huseducationerr">
		                     <label class="form-label selectlabel">Husband Education</label> 
					         <select name="husbandeducation" id="husbandeducation" class="form-control show-tick"  data-live-search="true" tabindex="-98">
					         <option value="0"> &nbsp; </option>
					         <?php 

					         foreach ($bodycontent['educationList'] as $value) {  ?>
					         <option value="<?php echo $value->qualification_id;?>"

					         <?php if(($bodycontent['antenantalmode']=="EDIT") && $value->qualification_id==$bodycontent['antenantalCaseEditdata']->husband_education){echo "selected";}else{echo "";} ?>
					                                        
					                                      

					          ><?php echo $value->qualification?></option>
					          <?php     } ?>
					                                   
					          </select>   
	                    </div>  
	                </div>
                </div> 
	  
			    </div><!-- end of second row --> 

			    <div class="row clearfix formrowgap"><!-- start of third row-->
                                       
              

                <div class="col-sm-3">
	                <div class="form-group form-group searchableDesign">
	                   <div class="input-group marriedforyearerr" id="marriedforyearerr">
		                     <label class="form-label selectlabel">Married For (years)</label> 
					         <select name="marriedforyear" id="marriedforyear" class="form-control show-tick"  data-live-search="true" tabindex="-98">
					         <option value="0"> &nbsp; </option>
					         <?php 

					         foreach ($bodycontent['OnetoOtherDropDown'] as $marriedyear) {  ?>
					         <option value="<?php echo $marriedyear;?>"

					         <?php if(($bodycontent['antenantalmode']=="EDIT") && $marriedyear==$bodycontent['antenantalCaseEditdata']->married_for_year){echo "selected";}else{echo "";} ?>
					                                        
					                                      

					          ><?php echo $marriedyear?></option>
					          <?php     } ?>
					                                   
					          </select>   
	                    </div>  
	                </div>
                </div>
                 <!-- add column created by anil 20-09-2019 -->

                 <?php if(($bodycontent['antenantalmode']=="EDIT") && $bodycontent['antenantalCaseEditdata']->is_married_others == 'Y'){ 

                  $marr_display = "display: block;";

                }
                 else{ 
                        $marr_display = "display: none;";
                 } ?>

                <div class="col-sm-3" id="othermarried" style="<?php echo $marr_display; ?>">
                  <div class="form-group form-group searchableDesign">
                     <div class="input-group marriedforothererr" id="marriedforothererr">
                         <label class="form-label selectlabel">Married For Others</label> 
                   <input type="text" class="form-control" name="marriedforother" id="marriedforother" autocomplete="off"  value="<?php if($bodycontent['antenantalmode']=="EDIT"){ echo $bodycontent['antenantalCaseEditdata']->married_for_others; } ?>">  
                      </div> 
                       <input type="hidden" name="isOtherMarried" id="isOtherMarried" value="<?php if($bodycontent['antenantalmode']=="EDIT"){ echo $bodycontent['antenantalCaseEditdata']->is_married_others; } ?>"> 
                  </div>
                </div>

                <!-- end of the column 20-09-2019-->


                <div class="col-sm-3">
	                <div class="form-group form-group searchableDesign">
	                   <div class="input-group tryingforrerr" id="tryingforrerr">
		                     <label class="form-label selectlabel">Trying For (years)</label> 
					         <select name="tryingfor" id="tryingfor" class="form-control show-tick"  data-live-search="true" tabindex="-98">
					         <option value="0"> &nbsp; </option>
					         <?php 

					         foreach ($bodycontent['OnetoOtherDropDown'] as $tryingyear) {  ?>
					         <option value="<?php echo $tryingyear;?>"

					         <?php if(($bodycontent['antenantalmode']=="EDIT") && $tryingyear==$bodycontent['antenantalCaseEditdata']->trying_for_year){echo "selected";}else{echo "";} ?>
					                                        
					                                      

					          ><?php echo $tryingyear;?></option>
					          <?php     } ?>
					                                   
					          </select>   
	                    </div>  
	                </div>
                </div>  

             <!-- add of new column created by anil 20-09-2019-->  

              <?php if(($bodycontent['antenantalmode']=="EDIT") && $bodycontent['antenantalCaseEditdata']->is_trying_others == 'Y'){ 

                  $tra_display = "display: block;";

                }
                 else{ 
                        $tra_display = "display: none;";
                 } ?>

             

                <div class="col-sm-3" id="othertrying" style="<?php echo $tra_display; ?>;">
                  <div class="form-group form-group searchableDesign">
                     <div class="input-group tryingforothererr" id="tryingforothererr">
                         <label class="form-label selectlabel">Trying For Others</label> 
                      <input type="text" class="form-control" name="tryingforother" id="tryingforother" autocomplete="off"  value="<?php if($bodycontent['antenantalmode']=="EDIT"){ echo $bodycontent['antenantalCaseEditdata']->trying_for_others; } ?>"> 
                      </div> 
                       <input type="hidden" name="isOtherTrying" id="isOtherTrying" value="<?php if($bodycontent['antenantalmode']=="EDIT"){ echo $bodycontent['antenantalCaseEditdata']->is_trying_others; } ?>"> 
                  </div>
                </div> 

             

            

	  
	            </div><!-- end of third row-->

              

	            <div class="row clearfix formrowgap"><!-- start of fourth row-->
                                       
                

                <div class="col-sm-3"> 
                <label class="form-label customLabel">Any Medicine required to concieve </label> &nbsp;
                </div>
                <div class="col-sm-6">	     

                <?php 
                		if ($bodycontent['antenantalmode']=="EDIT") {
                		$medicine_concieve_array = explode (",", $bodycontent['antenantalCaseEditdata']->medicine_concieve); 
                		}
                ?>         
	            <div class="form-group form-group">
	                   <div class="input-group" >
		                   
		                     <input type="checkbox" name="medicine_concieve[]" id="clomiphene_checkbox" class="filled-in chk-col-deep-purple" value="Clomiphene" 
		                     <?php if ($bodycontent['antenantalmode']=="EDIT") {
                		  	 if(in_array("Clomiphene" ,$medicine_concieve_array)){ echo "checked";} }?> 
                		   		> <label for="clomiphene_checkbox">Clomiphene</label> &nbsp;&nbsp;

		                     <input type="checkbox" name="medicine_concieve[]" id="letrozole_checkbox" class="filled-in chk-col-deep-purple" value="Letrozole" 
		                      <?php if ($bodycontent['antenantalmode']=="EDIT") {
                		  	 if(in_array("Letrozole" ,$medicine_concieve_array)){ echo "checked";} }?> >
		                     <label for="letrozole_checkbox">Letrozole</label> &nbsp;&nbsp;

		                     <input type="checkbox" name="medicine_concieve[]" id="gonadotropins_checkbox" class="filled-in chk-col-deep-purple" value="Gonadotropins" 
		                      <?php if ($bodycontent['antenantalmode']=="EDIT") {
                		  	 if(in_array("Gonadotropins" ,$medicine_concieve_array)){ echo "checked";} }?>>
		                     <label for="gonadotropins_checkbox">Gonadotropins</label> &nbsp;&nbsp;
					    
	                    </div>  
	            </div>
                </div>
	  
	            </div><!-- start of fourth row-->

	            <div class="row clearfix formrowgap"><!-- start of Fifth row-->
                                       
    		 
    		    <div class="col-sm-3"> 
                <label class="form-label customLabel">Any Procedure required to concieve </label> &nbsp;
                </div>
                  <div class="col-sm-2">	


                      <div class="form-group form-float demo-radio-button noborder_radio">
                       	 <input name="procedure_concieve" type="radio" class="with-gap" id="procedure_concieve_1" value="IUI" 
                          <?php
                          if($bodycontent['antenantalCaseEditdata']){
                          if($bodycontent['antenantalCaseEditdata']->procedure_concieve=='IUI'){echo "checked";} }
                           ?>>
                       <label for="procedure_concieve_1">IUI</label>
                        <input name="procedure_concieve" type="radio" class="with-gap" id="procedure_concieve_2" value="IVF-FET" 
                        <?php 
                        if($bodycontent['antenantalCaseEditdata']){
                        if($bodycontent['antenantalCaseEditdata']->procedure_concieve=='IVF-FET'){echo "checked";} }
                        ?>>
                        <label for="procedure_concieve_2">IVF->FET</label>
                      	<input name="procedure_concieve" type="radio" class="with-gap" id="procedure_concieve_3" value="IVF-ET" 
                        <?php
                        if($bodycontent['antenantalCaseEditdata']){
                         if($bodycontent['antenantalCaseEditdata']->procedure_concieve=='IVF-ET'){echo "checked";}} ?>>
                        <label for="procedure_concieve_3">IVF->ET</label>
                                              
                         </div>
               
                       

                </div>
                <div class="col-sm-3">
                	<div class="form-group form-float">
                	    <div class="form-line input-group">
                                 <input type="text" class="form-control datepicker" placeholder="select date" name="procedure_date" id="procedure_date" autocomplete="off" value="<?php 
                                 if($bodycontent['antenantalmode']=="EDIT" && $bodycontent['antenantalCaseEditdata']->procedure_date!=''){
                                 echo date('l d M Y', strtotime($bodycontent['antenantalCaseEditdata']->procedure_date));}

                                 ?>" 
                               
                                 >
                                 <label class="form-label dateLabel">Select Date</label>
                     </div>
                  </div>
                	
                </div>
	  
              </div><!-- end of Fifth  row-->
              

             <div class="row clearfix formrowgap">
                                       
             
             <div class="col-sm-4">
              <i><label class="form-label customLabel">&#xbb; Any Medicine taken from last Menstrual Period </label></i><br>
              <label class="form-label newMedAdd " style="text-decoration: underline;cursor: pointer;font-weight:700;" data-callfrom="mensmedicine"  
              data-toggle="modal" data-target="#prescription_newmedmodel"  data-backdrop="static" data-keyboard="false"> &#x2b; Add New Medicine</label>
             </div>
             <div class="col-sm-3">
                <!-- <button type="button" class="btn btn-sm btn-warning addMensuMedicine">
                 <span class="glyphicon glyphicon-plus" style="margin-top: 0px;"></span> Add Details
                  </button> -->
                 
                   </div>
    
             </div>
           

             <div class="row clearfix" style="#border: 1px solid red;">
                        
                         <div class="col-sm-4">

                         <div class="form-group form-group searchableDesign">

                            <div class="input-group" id="selmens_medicineerr">
                            <label class="form-label upText selectlabel">Medicine</label>
                            <div id="selmens_medicinedrp">
                            <select name="selmens_medicine" id="selmens_medicine" class="form-control selpres show-tick"  data-live-search="true" tabindex="-98">
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
                   

                   
                      <div class="col-sm-3">
                          <div class="form-group form-float">
                           <div class="form-line">
                            <input type="text" class="form-control selpres" name="selmens_medicine_duration" id="selmens_medicine_duration" autocomplete="off" placeholder="" value="" >
                              <label class="form-label upText">Duration</label>
                           </div>
                           </div>
                      </div>

                      <div class="col-sm-2">
                          <!-- <div class="form-group">
                              <label class="form-label upText"></label> 
                              <div class="icon-button-demo">
                                  <button type="button" class="btn btn-xs bg-light-green addMensuMedicine">
                                  <span class="glyphicon glyphicon-plus" style="margin-top: 0px;"></span> 
                                    ADD
                                  </button>
                              
                              </div>
                          </div> -->

                          <button type="button" class="btn bg-pink waves-effect addMensuMedicine">
                                    <i class="material-icons">add</i>
                          </button>
                      </div>
                          
                  </div>












             <!-- -------------------------- Medicine Details-------------------------- -->


           
             <div class="row clearfix formrowgap customeTblDesign1">
                                      
         

             <div class="col-sm-8">
              <div  id="detail_timeslot" style="#border: 1px solid #e49e9e;">
                    <div class="table-responsive">
                           <?php
                          $rowno=0;
                          $detailCount = 0;
                          if($bodycontent['antenantalmode']=="EDIT")
                          {
                           $detailCount = sizeof($bodycontent['mensuMedList']);
                          // $detailCount = 0;
                          }

                          // For Table style Purpose
                          if($bodycontent['antenantalmode']=="EDIT" && $detailCount>0)
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
                           
                        </thead>
                        <tbody>

                            <?php

                if($detailCount>0)
                {
                  foreach ($bodycontent['mensuMedList'] as $key => $value) 
                  {
                    $rowno++;
                    
                ?>
                
           <tr id="rowMenMedicine_<?php echo $rowno; ?>" class="row clearfix">

            <td style="width:53%;text-align: left;"> 
						       <input type="hidden" name="mensumedicine[]" id="mensumedicine_<?php echo $rowno; ?>" value=" <?php echo $value->medicine_mst_id;?>">   
                   <?php echo $value->medicine_name;?>      
							        
            </td>

              <td style="width:39%;text-align: center;"> 
                            <input type="hidden" name="mensumedicineduration[]" id="mensumedicineduration_<?php echo $rowno; ?>" value="<?php echo $value->medicine_duration;?>">   
                            <?php echo $value->medicine_duration;?>       
                                
              </td>

            <!-- <td style="width: 40%"> 
             <div class="input-group fromToerr" >
              <div class="form-group form-float inpsamelevel">
                <div class="form-line" id="mensumedicineerr_<?php echo $rowno; ?>">
                    <input type="text" class="form-control mensumedicinecls" name="mensumedicine[]" id="mensumedicine_<?php echo $rowno; ?>" autocomplete="off" placeholder="Medicine" value="<?php echo $value->medicine_name;?>" >
                            
                </div>
              </div>
            </div>                        
            </td>


            <td style="width: 40%"> 
             <div class="input-group fromToerr" id="mensumedicinedurationerr_<?php echo $rowno; ?>">
              <div class="form-group form-float inpsamelevel">
                <div class="form-line">
                    <input type="text" class="form-control" name="mensumedicineduration[]" id="mensumedicineduration_<?php echo $rowno; ?>" autocomplete="off"  placeholder="Duration" value="<?php echo $value->medicine_duration;?>" >
                              
                </div>
              </div>
            </div>                        
            </td> -->

        <td style="vertical-align: middle;">
          <a href="javascript:;" class="delMenMedicine" id="delDocRow_<?php echo $rowno; ?>" title="Delete">
            <i class="material-icons" style="color: #323232; font-weight:700;">clear</i>
          </a>
      </td> 
      
                </tr>


              <?php   
                  }
                }

                  ?>
                    <input type="hidden" name="rowno" id="rowno" value="<?php echo $rowno;?>">      
                    
                        </tbody>
                    </table>
                        
                    </div> <!-- end of responsive medicine detail div class -->
                  
                    
                  </div>


                </div>
              </div>


             <!-- ------------------------------------------------------------------------------------------------------ -->


                 <div class="row clearfix formrowgap">
                                       
               
                    <div class="col-sm-3">
                       <div class="form-group form-float">
                         <div class="input-group " id="cigarette_addictionerr" >
                              <label class="form-label selectlabel">Cigarette Addiction</label> 
                               <select name="cigarette_addiction" id="cigarette_addiction" class="form-control show-tick" data-live-search="true" tabindex="-98">
                                 <option value="No" 
                                 <?php if ($bodycontent['antenantalmode']=="ADD"){echo "Selected";}?>
                                 <?php if ($bodycontent['antenantalmode']=="EDIT" && $bodycontent['antenantalCaseEditdata']->cigarette_addiction=='No') { echo "Selected"; }?> > No</option>
                                <option value="Yes" <?php if ($bodycontent['antenantalmode']=="EDIT" && $bodycontent['antenantalCaseEditdata']->cigarette_addiction=='Yes') { echo "Selected"; }?> > Yes</option>
                               
   
                               </select>   
                           </div>  
                       </div>
                     </div>  
                     <?php

                        if($bodycontent['antenantalmode']=="EDIT" && $bodycontent['antenantalCaseEditdata']->cigarette_addiction=='Yes')
                          {
                            $style_var = "display:block;";
                          }
                          else
                          {
                            $style_var = "display:none;";
                          }

                     ?>

                      <div class="col-sm-2" id="cigarette_per_day_div"  style="<?php echo $style_var; ?>">
                       <div class="form-group form-float">
                           <div class="form-line">

                              <input type="text" class="form-control nomarginTop" name="cigarette_per_day" id="cigarette_per_day" autocomplete="off" value="<?php if($bodycontent['antenantalmode']=="EDIT"){echo $bodycontent['antenantalCaseEditdata']->cigarette_per_day;}?>" >
                               <label class="form-label">Cigarette per day</label>
                              </div> 
                       </div>
                     </div>  

                     <div class="col-sm-3">
                       <div class="form-group form-float">
                         <div class="input-group " id="alcohol_addictionerr" >
                              <label class="form-label selectlabel">Alcohol Addiction</label> 
                               <select name="alcohol_addiction" id="alcohol_addiction" class="form-control show-tick" data-live-search="true" tabindex="-98">
                                
                                <option value="Never" <?php if ($bodycontent['antenantalmode']=="EDIT" && $bodycontent['antenantalCaseEditdata']->alcohol_addiction=='Never') { echo "Selected"; }?> >Never</option>
                                <option value="Occasional" <?php if ($bodycontent['antenantalmode']=="EDIT" && $bodycontent['antenantalCaseEditdata']->alcohol_addiction=='Occasional') { echo "Selected"; }?> >Occasional</option>
                                <option value="Regular" <?php if ($bodycontent['antenantalmode']=="EDIT" && $bodycontent['antenantalCaseEditdata']->alcohol_addiction=='Regular') { echo "Selected"; }?> >Regular</option>
   
                               </select>   
                           </div>  
                       </div>
                     </div>

                      <div class="col-sm-3">
                          <div class="form-group form-float">
                              <div class="form-line">
                                <input type="text" class="form-control nomarginTop" name="other_addiction" id="other_addiction" autocomplete="off" value="<?php if($bodycontent['antenantalmode']=="EDIT"){echo $bodycontent['antenantalCaseEditdata']->other_addiction;}?>" >
                                   <label class="form-label">Other Addiction</label>
                                    </div>
                             </div>
                     </div> 


    
                 </div>


                <div class="row clearfix formrowgap"><!-- start row of LMP -->
                                       
             

                  <div class="col-sm-4">
                  <div class="form-group form-float"> 
                   
                    <div class="input-group">
                                  <label class="form-label selectlabel">LMP Date</label>
                                  <input type="text" class="form-control datepicker"  name="lmp_date" id="lmp_date" placeholder="select Date" autocomplete="off" value="<?php 
                                  if($bodycontent['antenantalmode']=="EDIT" && $bodycontent['antenantalCaseEditdata']->lmp_date!=''){
                                  echo date('l d M Y', strtotime($bodycontent['antenantalCaseEditdata']->lmp_date));}

                                  ?>" 
                                  >
                                 
                      </div>
                     </div>
                  
                </div>

                <div class="col-sm-3">
                  <div class="form-group form-float"> 
                  <div class="form-line input-group">
                                 <input type="text" class="form-control"  name="edd_date" id="edd_date" placeholder=" Date" autocomplete="off" value="<?php 
                                 if($bodycontent['antenantalmode']=="EDIT" && $bodycontent['antenantalCaseEditdata']->edd_date!=''){
                                 echo date('l d M Y', strtotime($bodycontent['antenantalCaseEditdata']->edd_date));}

                                 ?>" readonly
                                 >
                                 <label class="form-label dateLabel">EDD Date</label>           
                     </div>
                     </div>
                  
                </div>

    
                </div><!-- end row of LMP -->

                <div class="row clearfix formrowgap"> <!-- start of usg row -->
                           
                <div class="col-sm-3">
                  <div class="form-group form-float"> 
                          <div class="form-line input-group">
                                    <input type="text" class="form-control datepicker"  name="seleddbyusg_date" id="seleddbyusg_date" placeholder="select Date" autocomplete="off" value="<?php 
                                    if($bodycontent['antenantalmode']=="EDIT" && $bodycontent['antenantalCaseEditdata']->seleddbyusg_date!=''){
                                    echo date('l d M Y', strtotime($bodycontent['antenantalCaseEditdata']->seleddbyusg_date));}

                                    ?>" 
                                    >
                          <label class="form-label dateLabel">On Date USG</label>          
                        </div>
                     </div>
                </div>
                

                <div class="col-sm-2">
                  <div class="form-group form-float"> 
                    <div class="form-line">
                      <input type="text" class="form-control" name="edd_week" id="edd_week" placeholder="no of week" autocomplete="off" 
                      value="<?php if($bodycontent['antenantalmode']=="EDIT"){
                                  echo $bodycontent['antenantalCaseEditdata']->usg_week;} ?>" 
                                 onKeyup="numericFilter(this);" >
                        <label class="form-label">No. of weeks</label>          
                    </div>
                  </div>
                </div>

                  <div class="col-sm-2">
                      <div class="form-group form-float"> 
                          <div class="form-line">
                                <input type="text" class="form-control" name="edd_days" id="edd_days" placeholder="no of day" autocomplete="off" value="<?php if($bodycontent['antenantalmode']=="EDIT" ){
                                    echo $bodycontent['antenantalCaseEditdata']->usg_days;} ?>" onKeyup="numericFilter(this);" >
                              <label class="form-label">No of days</label>
                          </div>
                      </div>
                  </div>





                <div class="col-sm-3">
                    <div class="form-group form-float"> 
                    <div class="form-line input-group">
                               <input type="text" class="form-control" name="usg_date" id="usg_date" placeholder="select Date" autocomplete="off" value="<?php 
                                 if($bodycontent['antenantalmode']=="EDIT" && $bodycontent['antenantalCaseEditdata']->usg_date!=''){
                                 echo date('l d M Y', strtotime($bodycontent['antenantalCaseEditdata']->usg_date));}

                                 ?>" readonly
                                 >
                                 <label class="form-label dateLabel">EDD By USG</label>   
                     </div>
                     </div>
                  
                </div>
    
                </div><!-- end of usg row -->
    
    
                   				

	            <div class="row clearfix formrowgap"><!-- start of save and error row-->
               
                  <div class="col-sm-12">
                    <p id="antenatelmsg" class="form_error"></p>
                  </div>
                  
              </div><!-- start of save and error row-->
              



              <div class="row clearfix formrowgap"><!-- start of save and error row-->
               
                  <div class="col-sm-12 colcenter">
                                      
                    <button type="submit" class="btn bg-pink waves-effect antenatelbasicsavebtn patientupdButton" id="savebtn_basic_record" >
                      <span><?php echo $bodycontent['antenantalbtnText']; ?></span>
                    </button> 

                    <span class="btn bg-pink waves-effect loaderbtn" id="loaderbtn" style="display:none;"> <?php echo $bodycontent['antenantalbtnTextLoader']; ?></span>
                                            
                  </div>
	            </div><!-- start of save and error row-->

                               

               </div><!-- start of demo-masked-input --> 
			  </section>
			
               
           <!-- ============ end of antenantal_left_tab_menu_2_section ========= -->





                           <!-- ======= start of antenantal_left_tab_menu_3_section ============ -->
                            <section class="antenantalDataSection patientBlockSection" id="antenantal_left_tab_menu_3_section">
                              <center class="headingtitile_patient"><h5 class="title_head">&#9733; Previous Child Birth History</h5></center>
                            <br>

                            <div class="row clearfix formgap">          
                           <!--  <div class="col-sm-1"></div>  -->
                             <div class="col-sm-3">
                                <button type="button" class="btn btn-sm btn-warning addPreChildDtl darkthmButton" >
                                 <span class="glyphicon glyphicon-plus" style="margin-top: 0px;"></span> Add Details
                                  </button>
                             </div>
                             </div>



      <!-- ---------------------------------- Previous Child edit  Details data -------------------------- -->


             
             <div class="row clearfix formgap">
                                      
            <!--  <div class="col-sm-1"></div> -->

             <div class="col-sm-12">
              <div id="detail_childHistory" class="customeTblDesign1">
                    <div class="table-responsive" style="min-height: 500px;">
                           <?php
                          $childdtlrowno=0;
                          $detailCountchilddtl = 0;
                          if($bodycontent['antenantalmode']=="EDIT")
                          {
                           $detailCountchilddtl = sizeof($bodycontent['previousChildBirthList']);
                        //   $detailCountchilddtl = 0;
                          }

                          // For Table style Purpose
                          if($bodycontent['antenantalmode']=="EDIT" && $detailCountchilddtl>0)
                          {
                            $style_var = "display:block;width:100%;";
                          }
                          else
                          {
                            $style_var = "display:none;width:100%;";
                          }
                        ?>

                    
                    <table class="table no-footer alternate" style="<?php echo $style_var; ?>">
                        <thead>
                           
                        </thead>
                        <tbody>

                            <?php

                if($detailCountchilddtl>0)
                {
                  foreach ($bodycontent['previousChildBirthList'] as $key => $previouschilsrow) 
                  {
                    $childdtlrowno++;
                    
                ?>
                
           <tr id="rowChildPreviousBirth_<?php echo $childdtlrowno; ?>" class="row clearfix">

                <!-- <td> <b>Sl.</b><label class="form-label" style="margin-top: 12px;" > <?php echo $childdtlrowno; ?>.</label></td> -->

                <td style="width:100px;"> 
                    <label>Place</label>
                    <div class="input-group birthplaceerr" id="birthplaceerr_<?php echo $childdtlrowno; ?>">
                    <!--  <span class="input-group-addon"><i class="material-icons">place</i> </span> -->
                      <div class="form-line">
                        <input type="text" name="birthplace[]" id="birthplace_<?php echo $childdtlrowno; ?>" class="form-control" placeholder="" value="<?php echo $previouschilsrow->birthplace;?>" >
                      </div>
                    </div>
                                            
                </td>

                  <td style="width:100px;"> 
                    <div class="input-group selectyearerr" id="selectyearerr_<?php echo $childdtlrowno; ?>">
                    <label>Year</label>
                                    <select name="selectYear[]" id="selectYear_<?php echo $childdtlrowno; ?>" class="form-control show-tick  selectYear" data-live-search="true" tabindex="-98">
                                      <option value="">&nbsp;</option>
                                        <?php
                                            for ($i=2000; $i <= date('Y'); $i++) {     
                                        ?>
                                          <option value="<?php echo $i;?>"
                                            <?php
                                            if ($previouschilsrow->year==$i) {
                                            echo "selected";
                                            }

                                            ?>
                                            ><?php echo $i;?></option>
                                        <?php
                                          }
                                        ?>
                                      
                                    </select>   
                                </div>                               
                  </td>

                <td style="width:100px;"> 
                    <div class="input-group complicationerr" id="complicationerr_<?php echo $childdtlrowno; ?>">
                    <label>Complication(s)</label>
                                    <select name="complicationChild[]" id="complicationChild_<?php echo $childdtlrowno; ?>" class="form-control show-tick complicationChild" data-live-search="true" tabindex="-98" multiple data-selected-text-format="count">
                                        <?php
                                            foreach ($bodycontent['complicationList']  as $complication ) { 
                                        ?>
                                          <option value="<?php echo $complication->complication_id;?>"
                                            <?php
                                            $selected_comp=explode(",",(string)$previouschilsrow->complication);
                                          
                                          
                                            if (in_array($complication->complication_id, $selected_comp)) {
                                                echo 'selected';
                                            }

                                            ?>

                                            ><?php echo $complication->complication_name;?></option>
                                        <?php
                                          }
                                        ?>
                                      
                        </select>   
                          <input type="hidden" name="complicationChildValues[]" id="complicationChildValues_<?php echo $childdtlrowno; ?>" value="<?php echo $previouschilsrow->complication;?>"> 

                    </div>                           
                  </td>

              <td style="width:100px;"> 
                    <div class="input-group medicalproblemerr" id="medicalproblemerr_<?php echo $childdtlrowno; ?>">
                    <label>Medical Problem(s)</label>
                      <select name="medicalproblem[]" id="medicalproblem_<?php echo $childdtlrowno; ?>" class="form-control show-tick medicalproblem"   data-live-search="true" tabindex="-98"
                        multiple data-selected-text-format="count" >
                                        <?php
                                            foreach ($bodycontent['medicalProblemList'] as $medicalproblem) { 
                                        ?>
                                          <option value="<?php echo $medicalproblem->medicle_problem_id;?>"

                                            <?php

                                          $selected_medpro=explode(",",(string)$previouschilsrow->medicalproblem);
                                          if (in_array($medicalproblem->medicle_problem_id, $selected_medpro)) {
                                                echo 'selected';
                                            }

                                            ?>

                                            ><?php echo $medicalproblem->problem;?></option>
                                        <?php
                                          }
                                        ?>
                                      
                                    </select>  
                                      <input type="hidden" name="medicalproblemValues[]" id="medicalproblemValues_<?php echo $childdtlrowno; ?>" value="<?php echo $previouschilsrow->medicalproblem;?>"> 
                                </div>                      
                  </td>

                <td style="width:100px;"> 
                  <?php 

                  if ($previouschilsrow->is_othermedprob=='Y') {
                  $disp_other_prob="display: block;";
                  }else{
                  $disp_other_prob="display: none;";
                  }

                  ?>
                  <div class="input-group othersproblemerr" id="othersproblemerr_<?php echo $childdtlrowno; ?>" style="<?php echo $disp_other_prob;?>">
                    <label>Oth. Prob.</label>
                      <div class="form-line">
                      <input type="text" class="form-control" name="othersproblem[]" id="othersproblem_<?php echo $childdtlrowno; ?>" autocomplete="off"  placeholder="Others" value="<?php echo $previouschilsrow->medicalproblem_other;?>"> 
                      </div> 
                  </div>  

                  <input type="hidden" name="isOtherProblem[]" id="isOtherProblem_<?php echo $childdtlrowno; ?>" value="<?php echo $previouschilsrow->is_othermedprob;?>">       
                  </td>

                <td> 
                    <div class="input-group deleveryerr" id="deleveryerr_<?php echo $childdtlrowno; ?>">
                    <label>Delivery</label>
                                    <select name="deleveryType[]" id="deleveryType_<?php echo $childdtlrowno; ?>" class="form-control show-tick"   data-live-search="true" tabindex="-98">
                                        <?php
                                            foreach ($bodycontent['deliveryType'] as $key => $value) { 
                                        ?>
                                          <option value="<?php echo $key;?>"
                                            <?php if ($key== $previouschilsrow->delevery_type) {
                                            echo "selected";
                                            }?>><?php echo $value;?></option>
                                        <?php
                                          }
                                        ?>
                                      
                                    </select>   
                                </div>                
                            
                  </td>

                 <!-- added by anil baby weight -->

                 <td style="width:100px;"> 
                    <div class="input-group babyweight" id="babyweight_<?php echo $childdtlrowno; ?>">
                    <label>Baby Weight</label>
                      <div class="form-line">
                      <input type="text" class="form-control" name="babyweight[]" id="babyweight_<?php echo $childdtlrowno; ?>" autocomplete="off"  placeholder="" value="<?php echo $previouschilsrow->baby_weight;?>"> 
                      </div> 
                  </div>               
                            
                  </td>



                  <td style="width:100px;"> 
                    <div class="input-group babygendererr" id="babygendererr_<?php echo $childdtlrowno; ?>">
                    <label>Gender</label>
                                    <select name="babygender[]" id="babygender_<?php echo $childdtlrowno; ?>" class="form-control show-tick"   data-live-search="true" tabindex="-98">                             
                                        <?php 
                                      foreach ($bodycontent['genderList'] as $value) {  ?>
                                        <option value="<?php echo $value->id;?>"
                                          <?php
                                          if ($value->id == $previouschilsrow->babygender) {
                                            echo "selected";
                                            }

                                          ?>
                                              ><?php echo $value->gender?></option>
                                      <?php     } ?>                               
                                    </select>   
                                </div>                
                            
                  </td>

                  <td style="width:100px;"> 
                    <label>Age</label>
                    <div class="input-group babyageerr" id="babyageerr_<?php echo $childdtlrowno; ?>">
                    <span class="input-group-addon"><i class="material-icons"></i> </span>
                    <div class="form-line">
                      <input type="text" name="babyage[]" id="babyage_<?php echo $childdtlrowno; ?>" class="form-control" placeholder="" style="margin-top: 5px;" value="<?php echo $previouschilsrow->babyage;?>" >
                      </div>
                      </div>
                                            
                  </td>

                  <td style="vertical-align: middle;">
                    <?php 
                        if ($childdtlrowno!=0) {
                        
                    ?> 
            <a href="javascript:;" class="delChildBirthHistory" id="delchildRow_<?php echo $childdtlrowno; ?>" title="Delete">
                <i class="material-icons">delete</i>
                  <?php } ?> 

              </a>
            </td>  

         
      
            </tr>


              <?php   
                  }
                }

                  ?>
                    <input type="hidden" name="childdtlrowno" id="childdtlrowno" value="<?php echo $childdtlrowno;?>">      
                    
                        </tbody>
                    </table>
                        
                    </div>
                  
                    
                  </div>


                </div>
              </div>


     <!-- ---------------------------------- Previous Child edit  Details data -------------------------- -->


              <div class="row clearfix"><!-- start of save and error row-->
              <div class="col-sm-2"></div>
              <div class="col-sm-6">
              <p id="antenatelmsg" class="form_error"></p>
              </div>
              <div class="col-sm-2">
                                  
                <button type="submit" class="btn bg-pink waves-effect antenatelbasicsavebtn" id="savebtn_previous_birth" ><?php echo $bodycontent['antenantalbtnText']; ?></button> 

                <span class="btn bg-pink waves-effect loaderbtn" id="loaderbtn" style="display:none;"> <?php echo $bodycontent['antenantalbtnTextLoader']; ?></span>
                                         
              </div>
              </div><!-- start of save and error row-->


             <!-- ------------------------------------------------------------------------------------------------------ -->



           	</section>

           
               
                           <!-- ============ end of antenantal_left_tab_menu_3_section ========= -->

                           <!-- ======= start of antenantal_left_tab_menu_4_section ============ -->
                            <section class="antenantalDataSection patientBlockSection customAccordian" id="antenantal_left_tab_menu_4_section">

          			         	<center class="headingtitile_patient"><h5 class="title_head">&#9733; History</h5></center>



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
                     <i class="material-icons">chrome_reader_mode</i>
                     <!-- <i class="more-less glyphicon glyphicon-plus"></i> -->
                     Obstetrics History
                  </a>
                  </h4>
                 </div>
                 <div id="collapseOne_19" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_19">
                 <div class="panel-body"><!-- start of Obstetrics History body  -->

                  <div class="row clearfix">
                     <div class="col-sm-2"><label class="form-label">Parity :</label>  </div>
                     
                      <div class="col-sm-3">
                         <div class="form-group form-float">
                            <div class="input-group termdeliveryerr" id="termdeliveryerr">
                                <label class="form-label selectlabel zindex3">Term Delivery</label>
                                <select name="termdelivery" id="termdelivery" class="form-control show-tick obsthist"  data-live-search="true" tabindex="-98">
                                <!-- <option value=""> &nbsp; </option> -->
                                <?php 

                                foreach ($bodycontent['ZerotoTenDropDown'] as $termdelivery) {  ?>
                                <option value="<?php echo $termdelivery;?>"

                                <?php if(($bodycontent['antenantalmode']=="EDIT") && $termdelivery==$bodycontent['antenantalCaseEditdata']->parity_term_delivery){echo "selected";}else{echo "";} ?>
                                                                
                                                              

                                  ><?php echo $termdelivery;?></option>
                                  <?php     } ?>
                                                          
                                  </select>   
                              </div>
                           </div>
                        
                      </div>

                       <div class="col-sm-2">
                       <div class="form-group form-float">
                         <div class="input-group paritypretermerr" id="paritypretermerr">
                         <label class="form-label selectlabel zindex3">Preterm</label>
                         <select name="paritypreterm" id="paritypreterm" class="form-control show-tick obsthist"  data-live-search="true" tabindex="-98">
                        <!--  <option value=""> &nbsp; </option> -->
                         <?php 

                         foreach ($bodycontent['ZerotoTenDropDown'] as $paritypretermrow) {  ?>
                         <option value="<?php echo $paritypretermrow;?>"

                         <?php if(($bodycontent['antenantalmode']=="EDIT") && $paritypretermrow==$bodycontent['antenantalCaseEditdata']->parity_preterm){echo "selected";}else{echo "";} ?>
                                                        
                                                      

                          ><?php echo $paritypretermrow;?></option>
                          <?php     } ?>
                                                   
                          </select>   
                           </div>
                           </div>
                      </div>

                    <div class="col-sm-2">
                      <div class="form-group form-float">
                         <div class="input-group " id="parityabortionerr">
                         <label class="form-label selectlabel zindex3">Abortion</label>
                         <select name="parityabortion" id="parityabortion" class="form-control show-tick obsthist"  data-live-search="true" tabindex="-98">
                       <!--   <option value=""> &nbsp; </option> -->
                         <?php 

                         foreach ($bodycontent['ZerotoTenDropDown'] as $parityabortionrow) {  ?>
                         <option value="<?php echo $parityabortionrow;?>"

                         <?php if(($bodycontent['antenantalmode']=="EDIT") && $parityabortionrow==$bodycontent['antenantalCaseEditdata']->parity_abortion){echo "selected";}else{echo "";} ?>
                                                        
                                                      

                          ><?php echo $parityabortionrow;?></option>
                          <?php     } ?>
                                                   
                          </select>   
                           </div>
                        </div>
                    </div>

                  <div class="col-sm-2">
                  <div class="form-group form-float">
                         <div class="input-group " id="parityissueerr">
                         <label class="form-label selectlabel zindex3">Living Issue</label>
                         <select name="parityissue" id="parityissue" class="form-control show-tick"  data-live-search="true" tabindex="-98">
                        <!--  <option value=""> &nbsp; </option> -->
                         <?php 

                         foreach ($bodycontent['ZerotoTenDropDown'] as $parityissuerow) {  ?>
                         <option value="<?php echo $parityissuerow;?>"

                         <?php if(($bodycontent['antenantalmode']=="EDIT") && $parityissuerow==$bodycontent['antenantalCaseEditdata']->parity_issue){echo "selected";}else{echo "";} ?>
                                                        
                                                      

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
                            <input type="text" class="form-control" name="gravida_parity" id="gravida_parity" autocomplete="off" 
                            value="<?php if($bodycontent['antenantalmode']=="EDIT"){echo $bodycontent['antenantalCaseEditdata']->gravida_parity;}?>" readonly >
                               <label class="form-label">Gravida</label>
                            </div>

                           </div>
                         
                       </div>

                       <div class="col-sm-4">
                         <div class="form-group form-float">
                           <div class="form-line">
                            <input type="text" class="form-control" name="spontaneous_abortion" id="spontaneous_abortion" autocomplete="off" value="<?php if($bodycontent['antenantalmode']=="EDIT"){echo $bodycontent['antenantalCaseEditdata']->spontaneous_abortion;}?>" >
                               <label class="form-label">Number of spontaneous abortion</label>
                            </div>
                          </div>
                       </div>
    
                       </div>

                                                  
                  </div><!-- end  of Obstetrics History body  -->
                  </div>
               </div>
          <div class="panel panel-col-teal">
               <div class="panel-heading" role="tab" id="headingTwo_19">
                <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" href="#collapseTwo_19" aria-expanded="false" aria-controls="collapseTwo_19">
                 <i class="material-icons">av_timer</i> 
                 Menstrual Cycle </a> </h4>
                </div>
                 <div id="collapseTwo_19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_19">
                 <div class="panel-body"><!-- start of menstrual_cycle body  -->

                 <div class="row clearfix">
                                       
                  <!-- <div class="col-sm-2"></div> -->

                    <div class="col-sm-2">
                      <div class="form-group form-float">
                        <div class="input-group" id="menstrual_cycle_typeerr">
                          <label class="form-label selectlabel zindex3">Cycle Type</label>
                          <select name="menstrual_cycle_type" id="menstrual_cycle_type" class="form-control show-tick"  data-live-search="true" tabindex="-98">
                          <option value="0"> &nbsp; </option>
                          <?php 

                          foreach ($bodycontent['menstrualCycleType'] as $cycletyperow) {  ?>
                          <option value="<?php echo $cycletyperow;?>"

                          <?php if(($bodycontent['antenantalmode']=="EDIT") && $cycletyperow==$bodycontent['antenantalCaseEditdata']->menstrual_cycle_type){echo "selected";}else{echo "";} ?>
                                                          
                                                        

                            ><?php echo $cycletyperow;?></option>
                            <?php     } ?>
                                                    
                            </select>   
                        </div>
                      </div>
                      
                    </div>

                    <div class="col-sm-2">
                      <div class="form-group form-float">
                        <div class="input-group" id="menstrual_floweerr">
                            <label class="form-label selectlabel zindex3">Flow</label>
                            <select name="menstrual_flow" id="menstrual_flow" class="form-control show-tick"  data-live-search="true" tabindex="-98">
                            <option value="0"> &nbsp; </option>
                            <?php 

                            foreach ($bodycontent['menstrualCycleFlow'] as $flowrow) {  ?>
                            <option value="<?php echo $flowrow;?>"

                            <?php if(($bodycontent['antenantalmode']=="EDIT") && $flowrow==$bodycontent['antenantalCaseEditdata']->menstrual_flow){echo "selected";}else{echo "";} ?>
                                                            
                                                          

                              ><?php echo $flowrow;?></option>
                              <?php     } ?>
                                                      
                              </select>   
                        </div>
                      </div>
                      
                    </div>

                    <div class="col-sm-2">
                         <div class="form-group form-float">
                           <div class="form-line">
                            <input type="text" class="form-control txtsamelevel nomarginTop" name="menstrual_duration_days" id="menstrual_duration_days" autocomplete="off" value="<?php if($bodycontent['antenantalmode']=="EDIT"){echo $bodycontent['antenantalCaseEditdata']->menstrual_duration_days;}?>" onKeyUp="numericFilter(this);">
                               <label class="form-label">Duration Days</label>
                            </div>
                          </div>
                     </div>

                      <div class="col-sm-2">
                         <div class="form-group form-float">
                           <div class="form-line">
                            <input type="text" class="form-control txtsamelevel nomarginTop" name="menstrual_cycle_days" id="menstrual_cycle_days" autocomplete="off" value="30" onKeyUp="numericFilter(this);">
                               <label class="form-label">Cycle Days</label>
                            </div>
                          </div>
                     </div>

                     <div class="col-sm-2">
                        <div class="form-group form-float">
                          <div class="input-group" id="menstrual_floweerr">
                            <label class="form-label selectlabel zindex3">plus/minus</label>
                            <select name="cycle_days_pm" id="cycle_days_pm" class="form-control show-tick"  data-live-search="true" tabindex="-98">
                            <option value="P"
                            <?php if(($bodycontent['antenantalmode']=="EDIT") && 'P'==$bodycontent['antenantalCaseEditdata']->cycle_days_pm){echo "selected";}else{echo "";} ?>
                            > +</option>
                            <option value="M"  <?php if(($bodycontent['antenantalmode']=="EDIT") && 'M'==$bodycontent['antenantalCaseEditdata']->cycle_days_pm){echo "selected";}else{echo "";} ?>> -</option>                           
                            </select>   
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-1">
                         <div class="form-group form-float">
                           <div class="form-line">
                            <input type="text" class="form-control txtsamelevel nomarginTop" name="cycle_plusminusdays" id="cycle_plusminusdays" autocomplete="off" value="<?php if($bodycontent['antenantalmode']=="EDIT"){echo $bodycontent['antenantalCaseEditdata']->cycle_plusminusdays;}?>" onKeyUp="numericFilter(this);">
                               <label class="form-label">Days</label>
                            </div>
                          </div>
                     </div>
    
                  </div>
    




                                                   
                  </div><!-- end of menstrual_cycle body  -->
             </div>
         </div>

         <div class="panel panel-col-teal">
           <div class="panel-heading" role="tab" id="headingThree_19">
               <h4 class="panel-title">
               <a class="collapsed" role="button" data-toggle="collapse" href="#collapseThree_19" aria-expanded="false" aria-controls="collapseThree_19">
               <i class="material-icons">low_priority</i> 
               Medical History   </a> </h4>
           </div>
          <div id="collapseThree_19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree_19">
            <div class="panel-body"><!-- start of medical history body -->

            <div class="row clearfix">
                                       
             <!-- <div class="col-sm-2"></div> -->

              <div class="col-sm-4">


                      <div class="form-group form-float">
                        <div class="input-group" id="sel_diseaseserr">
                          <label class="form-label selectlabel zindex3">Diseases</label>
                          <select name="sel_diseases" id="sel_diseases" class="form-control show-tick sel_diseases"  data-live-search="true" tabindex="-98" multiple data-selected-text-format="count" >
                          <!--  <option value="0"> &nbsp; </option> -->
                          <?php 

                          foreach ($bodycontent['diseasesList'] as $diseaseslist) {  ?>
                          <option value="<?php echo $diseaseslist->diseases_id;?>"

                            <?php
                              if($bodycontent['antenantalmode']=="EDIT"){
                                $selected_diseases=explode(",",(string)$bodycontent['antenantalCaseEditdata']->diseases_ids);
                                      if (in_array($diseaseslist->diseases_id, $selected_diseases)) {
                                            echo 'selected';
                                        }

                                    }

                            ?>
                                                          
                                                        

                            ><?php echo $diseaseslist->diseases_name;?></option>
                            <?php     } ?>
                                                    
                            </select> 

                            <input type="hidden" name="sel_diseasesValues" id="sel_diseasesValues" value="<?php if($bodycontent['antenantalmode']=="EDIT"){ echo $bodycontent['antenantalCaseEditdata']->diseases_ids;}?>">  
                              <input type="hidden" name="isOtherDiseases" id="isOtherDiseases" value="<?php  if($bodycontent['antenantalmode']=="EDIT"){echo $bodycontent['antenantalCaseEditdata']->is_other_diseases;}else{ echo "N";}?>">
                        </div>
                      </div>

                      
                 </div>
                 <?php

                 if(($bodycontent['antenantalmode']=="EDIT") && $bodycontent['antenantalCaseEditdata']->is_other_diseases=='Y'){$disp_oth_dis='display:block;';}else{$disp_oth_dis='display:none;';}

                 ?>

                 <div class="col-sm-2" id="other_diseases_col" style="<?php echo $disp_oth_dis;?>" >
                      <div class="input-group" >
                      <label>Others Diseases</label>
                         <div class="form-line">
                         <input type="text" class="form-control" name="other_diseases" id="other_diseases" autocomplete="off"  placeholder="Others" value="<?php if($bodycontent['antenantalmode']=="EDIT"){ echo $bodycontent['antenantalCaseEditdata']->other_diseases;}?>" > 
                        </div> 
                    </div>  

                  </div>
    
            </div>

              <div class="row clearfix">
                <!-- <div class="col-sm-2"> </div>                       -->
                <div class="col-sm-2"> <label style="text-decoration: underline;font-weight:700;">Surgery Name</label> </div>
               
                <div class="col-sm-3"><label style="text-decoration: underline;font-weight:700;">How Many Years Back</label></div>
                <div class="col-sm-3">  </div>
              </div>
    
                <?php 
                  foreach ($bodycontent['surgeryList'] as $surgerylist) {  ?>

                    <input type="hidden" name="surgery_id[]"  value="<?php echo $surgerylist->surgery_id;?>"> 
                  <div class="row clearfix" style="margin-bottom: 6px;">
                                            
                  <!-- <div class="col-sm-2"></div> -->
                  <div class="col-sm-2"><label class="txtsamelevel"><?php echo $surgerylist->surgery_name;?></label></div>
            

                    <div class="col-sm-2">
                           <div class="form-group form-float">
                              <div class="input-group termdeliveryerr" id="termdeliveryerr">
                              <!--  <label>How Many</label> -->
                              <select name="yearback[]"  class="form-control show-tick"  data-live-search="true" tabindex="-98">
                              <option value=""> &nbsp; </option>
                              <?php 

                              foreach ($bodycontent['ZerotoTwentyDropDown'] as $zerotwenty) {  ?>
                              <option value="<?php echo $zerotwenty;?>"
                                <?php
                                if ($surgerylist->yearback==$zerotwenty) {
                                  
                                  echo "selected";
                                }
                                ?>
                                

                                ><?php echo $zerotwenty;?></option>
                                <?php     } ?>
                                                        
                                </select>   
                                </div>
                                </div>
                              
                      </div>
                <?php if($surgerylist->is_textfield=='Y'){ 
                        $disp_surgery_name="display: block;";
                }else{
                      $disp_surgery_name="display: none;";
                }
                ?>
                  <div class="col-sm-3" style="<?php echo $disp_surgery_name;?>">

                      <div class="form-group form-float">
                          <div class="form-line ">
                           <input type="text" class="form-control" name="other_surgery_name[]"  autocomplete="off"  placeholder="" value="<?php echo $surgerylist->other_surgery_name;?>" > 
                           <label class="form-label">Others surgery name</label>
                          </div> 
                         
                      </div>
                  </div>
                

          
                  </div>

          <?php } ?>

              <div class="row clearfix">
                                       
              <div class="col-sm-2"></div>
               <div class="col-sm-6">
                   <div class="form-group form-float">
                       <div class="form-line">
                         <textarea rows="1" name="any_allergy" id="any_allergy" class="form-control no-resize auto-growth"  style="overflow: hidden; overflow-wrap: break-word; height: 32px;" autocomplete="off"
                               ><?php if($bodycontent['antenantalmode']=="EDIT"){echo $bodycontent['antenantalCaseEditdata']->any_allergy;}?></textarea>
                             <label class="form-label">Any allergy</label>
                       </div>
                      </div>
                   </div>   
    
               </div>
    
    
    


                                                
            </div><!-- end of medical history body -->
           </div>
        </div>

         <div class="panel panel-col-teal">
            <div class="panel-heading" role="tab" id="headingFive_19">
                <h4 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" href="#collapseFive_19" aria-expanded="false" aria-controls="collapseFive_19">
                    <i class="material-icons">colorize</i>
                     Vaccination History
                  </a>
             </h4>
            </div>
          <div id="collapseFive_19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive_19">
            <div class="panel-body"><!-- start of vaccination history body -->
              <br><br>
                  <div class="row clearfix">
                                       
                  <!-- <div class="col-sm-2"></div> -->
                  <div class="col-sm-10">       

                <?php 
                    if ($bodycontent['antenantalmode']=="EDIT") {
                    $vaccination_array = explode (",", $bodycontent['antenantalCaseEditdata']->vaccination_ids); 
                    }
                ?>         
              <div class="form-group form-group">
                     <div class="input-group" >
                      <?php
                      $vacItm=1;
                        foreach ($bodycontent['vaccinationList'] as $vaccinationlist) {
                      ?>                      
                         <input type="checkbox" name="vaccination[]" id="vaccination_checkbox_<?php echo $vacItm;?>" class="filled-in chk-col-deep-purple" value="<?php echo $vaccinationlist->vaccination_id;?>" 
                         <?php if ($bodycontent['antenantalmode']=="EDIT") {
                         if(in_array($vaccinationlist->vaccination_id ,$vaccination_array)){ echo "checked";} 
                       }?> 
                          > <label for="vaccination_checkbox_<?php echo $vacItm;?>"><?php echo $vaccinationlist->vaccination_name;?></label> &nbsp;&nbsp;&nbsp;&nbsp;
                        <?php 
                          $vacItm++;
                      } ?>
                      </div>  
              </div>


             </div>
    
                 </div>

                 <div class="row clearfix">

                <!-- <div class="col-sm-2"></div> -->
                  <div class="col-sm-3">
                          <div class="form-group form-float"> 
                              <div class="form-line input-group">
                                            <input type="text" class="form-control datepicker"  name="tt1_tobe_taken_on" id="tt1_tobe_taken_on" placeholder="Select Date" autocomplete="off" value="<?php 
                                            if($bodycontent['antenantalmode']=="EDIT" && $bodycontent['antenantalCaseEditdata']->tt1_tobe_taken_on!=''){
                                            echo date('l d M Y', strtotime($bodycontent['antenantalCaseEditdata']->tt1_tobe_taken_on));}

                                            ?>" 
                                            >
                                  <label class="form-label selectlabel zindex3">TT1 To be Taken on</label>       
                                </div>
                            </div>
                  </div>

                  <div class="col-sm-3">
                          <div class="form-group form-float"> 
                              <div class="form-line input-group">
                                            <input type="text" class="form-control datepicker"  name="tt1_taken_on" id="tt1_taken_on" placeholder="Select Date" autocomplete="off" value="<?php 
                                            if($bodycontent['antenantalmode']=="EDIT" && $bodycontent['antenantalCaseEditdata']->tt1_taken_on!=''){
                                            echo date('l d M Y', strtotime($bodycontent['antenantalCaseEditdata']->tt1_taken_on));}
                                        ?>" 
                                            >
                                  <label class="form-label selectlabel zindex3">TT1 Taken on</label>      
                              </div>
                          </div>
                  </div>



                </div>

                <div class="row clearfix">
                <!-- <div class="col-sm-2"></div> -->
                 <div class="col-sm-3">
                          <div class="form-group form-float"> 
                              <div class="form-line input-group">
                                            <input type="text" class="form-control datepicker"  name="tt2_tobe_taken_on" id="tt2_tobe_taken_on" placeholder="Select Date" autocomplete="off" value="<?php 
                                            if($bodycontent['antenantalmode']=="EDIT" && $bodycontent['antenantalCaseEditdata']->tt2_tobe_taken_on!=''){
                                            echo date('l d M Y', strtotime($bodycontent['antenantalCaseEditdata']->tt2_tobe_taken_on));}
                                           ?>" 
                                            >
                                            <label class="form-label selectlabel zindex3">TT2 To be Taken on</label>
                               </div>
                          </div>
                  </div>
                <div class="col-sm-3">
                          <div class="form-group form-float"> 
                                <div class="form-line input-group">
                                            <input type="text" class="form-control datepicker"  name="tt2_taken_on" id="tt2_taken_on" placeholder="Select Date" autocomplete="off" value="<?php 
                                            if($bodycontent['antenantalmode']=="EDIT" && $bodycontent['antenantalCaseEditdata']->tt2_taken_on!=''){
                                            echo date('l d M Y', strtotime($bodycontent['antenantalCaseEditdata']->tt2_taken_on));}

                                            ?>" 
                                            >
                                  <label class="form-label selectlabel zindex3">TT2 Taken on</label>       
                                </div>
                          </div>
                  </div>
                 
                </div>




                <div class="row clearfix">
                <!-- <div class="col-sm-2"></div> -->
                <div class="col-sm-3">
                          <div class="form-group form-float"> 
                             
                              <div class="form-line input-group">
                                            <input type="text" class="form-control datepicker"  name="tdap_tobe_taken_on" id="tdap_tobe_taken_on" placeholder="Select Date" autocomplete="off" value="<?php 
                                            if($bodycontent['antenantalmode']=="EDIT" && $bodycontent['antenantalCaseEditdata']->tdap_tobe_taken_on!=''){
                                            echo date('l d M Y', strtotime($bodycontent['antenantalCaseEditdata']->tdap_tobe_taken_on));}

                                            ?>" 
                                            >
                                            <label class="form-label selectlabel zindex3">Tdap To be Taken on</label>        
                              </div>
                          </div>
                </div>

                <div class="col-sm-3">
                          <div class="form-group form-float"> 
                            <div class="form-line input-group">
                                          <input type="text" class="form-control datepicker"  name="tdap_taken_on" id="tdap_taken_on" placeholder="Select Date" autocomplete="off" value="<?php 
                                          if($bodycontent['antenantalmode']=="EDIT" && $bodycontent['antenantalCaseEditdata']->tdap_taken_on!=''){
                                          echo date('l d M Y', strtotime($bodycontent['antenantalCaseEditdata']->tdap_taken_on));}

                                          ?>" 
                                          >
                                <label class="form-label selectlabel zindex3">Tdap Taken on</label>        
                            </div>
                          </div>
                </div>
            

                </div>


                
                
                <br>

                 
    


                                                    
              </div><!-- start of vaccination history body -->
             </div>
           </div>

          <div class="panel panel-col-teal">
             <div class="panel-heading" role="tab" id="headingFour_19">
              <h4 class="panel-title">
             <a class="collapsed" role="button" data-toggle="collapse" href="#collapseFour_19" aria-expanded="false" aria-controls="collapseFour_19">
               <i class="material-icons">assignment_ind</i> 
               Family History </a> </h4>
                 </div>
               <div id="collapseFour_19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour_19">
                <div class="panel-body customLabel" style="font-weight:600;"><!-- start of family history body -->

                      

                  <?php
                      $famicom=1;
                        foreach ($bodycontent['familyComponentList'] as $familycomponent) {
                      ?> 
                  <div class="row clearfix">
                                       
                  <!-- <div class="col-sm-2"></div> -->
                  <div class="col-sm-3" style=""><b><?php echo $familycomponent->component_name;?></b>
                    <?php

                    if ($familycomponent->is_textfield=='Y') {
                      $disp_fmlycopmtext='display:block;';
                    }else{
                      $disp_fmlycopmtext='display:none;';
                    }

                    ?>
                    <div class="form-group " style="<?php echo $disp_fmlycopmtext;?>">
                     <div class="input-group" >
                   
                         <div class="form-line" >
                         <input type="text" class="form-control" name="other_component_name[]"  autocomplete="off"  placeholder="Any Others" value="<?php echo $familycomponent->othercomptext;?>" style="border: 1px solid #ddd; width: 100%; margin-top: 5px; border-radius: 5px;"> 

                         <!-- <label class="form-label">Any Others</label> -->
                        </div> 
                    </div>
                    </div>


                  </div>
                   <!-- <div class="col-sm-1">
                    
                   </div> -->
                  <div class="col-sm-2">       
  
                  <div class="form-group form-group">
                         <div class="input-group" >
                         <input type="hidden" name="familycomponent[]" value="<?php echo $familycomponent->family_component_id;?>" >                   
                             <input type="checkbox" name="fatherhistory[]" id="fatherhistory_checkbox_<?php echo $famicom;?>" class="filled-in chk-col-deep-purple fmlycmpfather" 
                                  <?php if ($bodycontent['antenantalmode']=="EDIT") {
                                 if($familycomponent->is_father=='Y'){ echo "checked";} }?> 

                              > <label for="fatherhistory_checkbox_<?php echo $famicom;?>">Father</label> &nbsp;&nbsp;&nbsp;&nbsp;
                              <input type="hidden" name="ischeckfatherhist[]" id="ischeckfatherhist_<?php echo $famicom;?>" value="<?php if ($bodycontent['antenantalmode']=="EDIT") {
                                 if($familycomponent->is_father==''){ echo "N";}else{ echo $familycomponent->is_father;} }?>">
                          </div>  
                  </div>
               </div>
                <div class="col-sm-2">       
  
                  <div class="form-group form-group">
                         <div class="input-group" >                   
                               <input type="checkbox" name="motherhistory[]" id="motherhistory_checkbox_<?php echo $famicom;?>" class="filled-in chk-col-deep-purple fmlycmpmother" 
                                <?php if ($bodycontent['antenantalmode']=="EDIT") {
                                 if($familycomponent->is_mother=='Y'){ echo "checked";} }?> 
                          
                              > <label for="motherhistory_checkbox_<?php echo $famicom;?>">Mother</label> 
                               <input type="hidden" name="ischeckmotherhist[]" id="ischeckmotherhist_<?php echo $famicom;?>" value="<?php if ($bodycontent['antenantalmode']=="EDIT") {
                                 if($familycomponent->is_mother==''){ echo "N";}else{ echo $familycomponent->is_mother;} }?>">
                           
                          </div>  
                  </div>
               </div>
    
                 </div>

                  <?php 
                          $famicom++;
                      } ?>
                      <br>
        
                       <div class="row clearfix">
 
                      <!-- <div class="col-sm-2"> </div> -->

                      
                       <div class="col-sm-3">
                        <div class="form-group form-float">
                          <div class="input-group highriskerr" id="highriskerr_<?php echo $childdtlrowno; ?>">
                              <label class="form-label selectlabel zindex3">Higher risk for </label>
                            <select name="highrisk" id="highrisk" class="form-control show-tick highrisk"   data-live-search="true" tabindex="-98"
                              multiple  >
                                  <?php
                                      foreach ($bodycontent['highriskList'] as $highrisklist) { 
                                   ?>
                                     <option value="<?php echo $highrisklist->high_risk_id;?>"

                                      <?php
                                       if ($bodycontent['antenantalmode']=="EDIT") {
                                    $selected_highrisk=explode(",",(string)$bodycontent['antenantalCaseEditdata']->highrisk_ids);
                                     if (in_array($highrisklist->high_risk_id, $selected_highrisk)) {
                                          echo 'selected';
                                      }
                                    }

                                      ?>

                                      ><?php echo $highrisklist->risk_type;?></option>
                                   <?php
                                    }
                                   ?>
                                
                               </select>  
                                 <input type="hidden" name="highriskValues" id="highriskValues" value="<?php if ($bodycontent['antenantalmode']=="EDIT") { echo $bodycontent['antenantalCaseEditdata']->highrisk_ids;}?>"> 
                           </div>  
                           </div>

                        </div>
                        <?php 
                                if ($bodycontent['antenantalmode']=="EDIT") {
                                     if($bodycontent['antenantalCaseEditdata']->is_highrisk_others=='Y'){
                                      $disp_other_highrisk='display:block;';
                                    }else{
                                       $disp_other_highrisk='display:none;';
                                    } 

                                }else{
                                   $disp_other_highrisk='display:none;';
                                }?> 
                       <input type="hidden" name="isOtherHighrisk" id="isOtherHighrisk" value="<?php if($bodycontent['antenantalmode']=="EDIT" && $bodycontent['antenantalCaseEditdata']->is_highrisk_others!=''){ echo $bodycontent['antenantalCaseEditdata']->is_highrisk_others;}else{ echo "N";}?>">
                        <div class="col-sm-2"> 
                         <div class="input-group othersriskerr" id="othersriskerr" style="<?php echo $disp_other_highrisk;?>">
                        <label>Highrisk Others </label>
                           <div class="form-line">
                           <input type="text" class="form-control" name="highrisk_others" id="highrisk_others" autocomplete="off"  placeholder="Others" value="<?php  if ($bodycontent['antenantalmode']=="EDIT") {echo $bodycontent['antenantalCaseEditdata']->highrisk_others;}?>"> 
                          </div> 
                      </div> 
                      </div>
                     </div>


                                                
                </div><!-- start of family history body -->
               </div>
              </div>

            <div class="panel panel-col-teal">
            <div class="panel-heading" role="tab" id="headingSix_19">
                <h4 class="panel-title">
                   <a class="collapsed" role="button" data-toggle="collapse" href="#collapseSix_19" aria-expanded="false" aria-controls="collapseSix_19">
                    <i class="material-icons">add_box</i>
                     Regular Medicines
                                                       
                 </a>
             </h4>
            </div>
          <div id="collapseSix_19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix_19">
            <div class="panel-body"><!-- start of regular medicine body -->
              
             <div class="row clearfix">
                                       
             <div class="col-sm-3">
                <button type="button" class="btn btn-sm btn-warning newMedAdd darkthmButton" data-callfrom="regularmedicine"  data-toggle="modal" data-target="#prescription_newmedmodel"  data-backdrop="static" data-keyboard="false">
                 <span class="glyphicon glyphicon-plus" style="margin-top: 0px;cursor: pointer;"></span> Add Medicine
                  </button>

                 
                   </div>
             </div>



             <div class="row clearfix" style="">
                         <div class="col-sm-2">

                          <div class="form-group form-float searchableDesign">
                              <div class="input-group " id="regular_medicineerr">
                              <label class="form-label upText selectlabel" style="z-index: 100;">Medicine</label>
                              <div id="regular_medicinedrp">
                              <select name="selregular_medicine" id="selregular_medicine" class="form-control selpres show-tick"  data-live-search="true" tabindex="-98">
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

                        <div class="col-sm-1">

                          <div class="form-group form-float searchableDesign">
                            <div class="input-group" >
                              <label class="form-label upText selectlabel" style="z-index: 100;">Dose</label>
                              <select name="selregular_dose" id="selregular_dose"  class="form-control selpres show-tick"  data-live-search="true" tabindex="-98">
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
                          <div class="form-group form-float searchableDesign">
                            <div class="input-group " >
                                <label class="form-label upText selectlabel" style="z-index: 100;">Frequency</label>
                                <select name="selregular_frequency" id="selregular_frequency" class="form-control selpres show-tick"  data-live-search="true" tabindex="-98">
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
                        <div class="form-group form-float searchableDesign">
                            <div class="input-group" >
                              <label class="form-label upText selectlabel" style="z-index: 100;">For Last Yr.</label>
                              <select name="selregularmed_year" id="selregularmed_year" class="form-control show-tick" data-live-search="true" tabindex="-98">
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

                        <div class="form-group form-float searchableDesign">
                          <div class="input-group" >
                          <label class="form-label upText selectlabel zindex3">For Last (month)</label>

                          <select name="selregularmed_month" id="selregularmed_month" class="form-control show-tick" data-live-search="true" tabindex="-98">
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
                   

                   
                    

                      <div class="col-sm-2">
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
                          if($bodycontent['antenantalmode']=="EDIT")
                          {
                           $detailCount = sizeof($bodycontent['regularMedicineList']);
                          // $detailCount = 0;
                          }

                          // For Table style Purpose
                          if($bodycontent['antenantalmode']=="EDIT" && $detailCount>0)
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
                   
                          
                        </thead>
                        <tbody>

                            <?php

                if($detailCount>0)
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
                  if ($regularmedicinerowno!=0) {
                  
              ?> 
      <a href="javascript:;" class="delRegularMedicine" id="delDocRow_<?php echo $regularmedicinerowno; ?>" title="Delete">
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


             <!-- ------------------------------------------------------------------------------------------------------ -->



                                                    
              </div><!-- start of regular medicine body -->
             </div>
           </div>


                 </div>
              </div>
          </div>         
       </div>
   </div>
            <!-- #END# Multiple Items To Be Open -->

               <div class="row clearfix"><!-- start of save and error row-->
              <div class="col-sm-2"></div>
              <div class="col-sm-6">
              <p id="antenatelmsg" class="form_error"></p>
              </div>
              <div class="col-sm-2">
                                  
                <button type="submit" class="btn bg-pink waves-effect antenatelbasicsavebtn" id="savebtn_history" ><?php echo $bodycontent['antenantalbtnText']; ?></button> 

                <span class="btn bg-pink waves-effect loaderbtn" id="loaderbtn" style="display:none;"> <?php echo $bodycontent['antenantalbtnTextLoader']; ?></span>
                                         
              </div>
              </div><!-- start of save and error row-->


                          </section>

                           
               
                           <!-- ============ end of antenantal_left_tab_menu_4_section ========= -->



                           <!-- ======= start of antenantal_left_tab_menu_5_section ============ -->
                <section class="antenantalDataSection patientBlockSection " id="antenantal_left_tab_menu_5_section">
                    <center class="headingtitile_patient"><h5 class="title_head">&#9733; First Examination</h5></center><hr>
                      <?php
                       if ($bodycontent['examinationLatestData']) {
                     $isDataExam='Y';
                    }else{
                       $isDataExam='N';
                    }

                      ?>
            
                    <div class="formgap">
                       <div class="row clearfix">
 
                        <div class="col-sm-2">
                          <div class="form-group form-float">
                           <div class="form-line">
                            <input type="text" class="form-control inpexam hwbmi" name="exam_height" id="exam_height" autocomplete="off" placeholder="" value="<?php
                             if($isDataExam=='Y'){echo $bodycontent['examinationLatestData']->exam_height;}?>" >
                             <label class="form-label">Height(cm)</label>
                           </div>
                           </div>
                         </div>

                         <div class="col-sm-2">
                          <div class="form-group form-float">
                           <div class="form-line">
                            <input type="text" class="form-control inpexam hwbmi" name="exam_weight" id="exam_weight" autocomplete="off" placeholder="" value="<?php
                             if($isDataExam=='Y'){echo $bodycontent['examinationLatestData']->exam_weight;}?>" >
                             <label class="form-label">Weight(kg.)</label>
                           </div>
                           </div>
                         </div>

                          <div class="col-sm-2">
                          <div class="form-group form-float">
                           <div class="form-line exam_bmi_focus">
                            <input type="text" class="form-control inpexam" name="exam_bmi" id="exam_bmi" autocomplete="off" placeholder="" value="<?php
                             if($isDataExam=='Y'){echo $bodycontent['examinationLatestData']->exam_bmi;}?>" >
                             <label class="form-label">BMI</label>
                           </div>
                           </div>
                         </div>

                          <div class="col-sm-2">
                          <div class="form-group form-float">
                           <div class="form-line">
                            <input type="text" class="form-control inpexam" name="exam_pluse" id="exam_pluse" autocomplete="off" placeholder="" value="<?php
                             if($isDataExam=='Y'){echo $bodycontent['examinationLatestData']->exam_pluse;}?>" >
                             <label class="form-label">Pulse/min</label>
                           </div>
                           </div>
                         </div>

                         <div class="col-sm-2">
                          <div class="form-group form-float">
                           <div class="form-line">
                            <input type="text" class="form-control inpexam" name="exam_bp_systolic" id="exam_bp_systolic" autocomplete="off" placeholder="" value="<?php
                             if($isDataExam=='Y'){echo $bodycontent['examinationLatestData']->exam_bp_systolic;}?>" >
                             <label class="form-label">BP(s)/mm of Hg</label>
                           </div>
                           </div>
                         </div>

                         <div class="col-sm-2">
                          <div class="form-group form-float">
                           <div class="form-line">
                            <input type="text" class="form-control inpexam" name="exam_bp_diastolic" id="exam_bp_diastolic" autocomplete="off" placeholder="" value="<?php
                             if($isDataExam=='Y'){echo $bodycontent['examinationLatestData']->exam_bp_diastolic;}?>" >
                             <label class="form-label">BP(D)/mm of Hg</label>
                           </div>
                           </div>
                         </div>

                     </div> <!-- end of row 1 -->

                      <br>
                      <div class="row clearfix">
 
                      <div class="col-sm-2">

                    <div class="form-group form-float">
                        <div class="input-group">
                          <label class="form-label selectlabel zindex3">Pallor </label>
                            <select name="exam_pallor" id="exam_pallor" class="form-control show-tick selexam"   data-live-search="true" tabindex="-98" placeholder="test"
                             >
                                  <?php
                                      foreach ($bodycontent['pallor'] as $pallor) { 
                                   ?>
                                     <option value="<?php echo $pallor;?>"
                                      <?php
                                      if($pallor =='Mild'){  echo "selected";}
                                      if($isDataExam=='Y'){
                                        if ($bodycontent['examinationLatestData']->exam_pallor==$pallor) {
                                         echo "selected";
                                        }
                                      }
                                      ?>

                                      ><?php echo $pallor;?></option>
                                   <?php
                                    }
                                   ?>
                               </select>        
                        </div>  
                    </div>


                      </div>

                      <div class="col-sm-2">

                      <div class="form-group form-float">
                       <div class="input-group">
                          <label class="form-label selectlabel zindex3">Icterus </label>
                            <select name="exam_icterus" id="exam_icterus" class="form-control show-tick selexam"   data-live-search="true" tabindex="-98" placeholder="test"
                            >
                                  <?php
                                      foreach ($bodycontent['icterus'] as $icterus) { 
                                   ?>
                                     <option value="<?php echo $icterus;?>"
                                       <?php
                                        if($icterus =='Nil'){  echo "selected";}
                                      if($isDataExam=='Y'){
                                        if ($bodycontent['examinationLatestData']->exam_icterus==$icterus) {
                                         echo "selected";
                                        }
                                      }
                                      ?>
                                      ><?php echo $icterus;?></option>
                                   <?php
                                    }
                                   ?>
                            </select>        
                           </div>  
                         </div>



                        </div>

                          <div class="col-sm-4">
                            <div class="form-group form-float"> 
                                
                              <div class="form-line">
                                <input type="text" class="form-control inpexam" name="exam_thyroid" id="exam_thyroid" autocomplete="off" placeholder="" value="<?php
                                if($isDataExam=='Y'){echo $bodycontent['examinationLatestData']->exam_thyroid;}else{echo 'Normal';}?>" >
                                <label class="form-label">Thyroid</label>
                              </div>
                            </div>
                          </div>

                          <div class="col-sm-4">
                            <div class="form-group form-float"> 
                            <div class="form-line">
                              <input type="text" class="form-control inpexam" name="exam_teeth" id="exam_teeth" autocomplete="off" placeholder="" value="<?php
                              if($isDataExam=='Y'){echo $bodycontent['examinationLatestData']->exam_teeth;}else{echo 'Normal';}?>" >
                              <label class="form-label">Teeth</label>
                            </div>
                            </div>
                          </div>
                     </div>

                      <div class="row clearfix">
 
                        <div class="col-sm-4">
                          <div class="form-group form-float">
                           <div class="form-line">
                            <input type="text" class="form-control inpexam" name="exam_cvs" id="exam_cvs" autocomplete="off" placeholder="" value="<?php
                             if($isDataExam=='Y'){echo $bodycontent['examinationLatestData']->exam_cvs;}else{echo 'Normal';}?>" >
                             <label class="form-label">CVS</label>
                           </div>
                           </div>
                        </div>

                        <div class="col-sm-4">
                          <div class="form-group form-float"> 
                            <div class="form-line">
                              <input type="text" class="form-control inpexam" name="exam_chest" id="exam_chest" autocomplete="off" placeholder="" value="<?php
                              if($isDataExam=='Y'){echo $bodycontent['examinationLatestData']->exam_chest;}else{echo 'Normal';}?>" >
                              <label class="form-label">Chest</label>
                            </div>
                           </div>
                        </div>

                         <input type="hidden" name="ischangeExamination" id="ischangeExamination" value="N">
                      </div>
                     <br>
                <div class="row clearfix"><!-- start of save and error row-->
                <div class="col-sm-2">
                  <?php if ($bodycontent['examinationAllData']) { ?>
                  <button type="button" class="btn bg-deep-purple waves-effect" id="examallshowbtn" style="display:none;">
                                    
                                      <span id="spanexamallshow">Show All Record</span>
                                  </button>
                                  <?php }?>
                </div>
                <div class="col-sm-6">
                <p id="antenatelmsg" class="form_error"></p>
                </div>
                <div class="col-sm-2">
                                    
                  <button type="submit" class="btn bg-pink waves-effect antenatelbasicsavebtn" id="savebtn_examination" ><?php echo $bodycontent['antenantalbtnText']; ?></button> 

                  <span class="btn bg-pink waves-effect loaderbtn" id="loaderbtn" style="display:none;"> <?php echo $bodycontent['antenantalbtnTextLoader']; ?></span>
                                          
                </div>
              </div><!-- start of save and error row-->



  <br>
                  
                 
                   
                      <div id="examdataall" style="padding: 10px;display: none;">
                        <table class="table table-striped rowexpandTable" style="width: 95%">
                          <tbody><tr class="expandrowDetails">
                            <th style="width:10%;">Date</th>
                            <th style="">Height(cm) </th>
                            <th style="">Weight(kg)</th>
                            <th style="">BMI</th>
                            <th style="">Pulse/min</th>
                            <th style="">BP(S)</th>
                            <th style="">BP(D)</th>
                            <th style="">Pallor</th>
                            <th style="">Icterus </th>
                            <th style="">Thyroid </th>
                            <th style="">Teeth </th>
                            <th style="">Cus </th>
                            <th style="">Chest </th>
                          </tr>
                              <?php
                                  foreach ($bodycontent['examinationAllData'] as $allexamdatarow) {
                                  
                              ?>
                            <tr>
                             
                              <td><?php echo date("d-m-Y", strtotime($allexamdatarow->created_on));?></td>
                              <td><?php echo $allexamdatarow->exam_height;?></td>
                              <td><?php echo $allexamdatarow->exam_weight;?></td>
                              <td><?php echo $allexamdatarow->exam_bmi;?></td>
                              <td><?php echo $allexamdatarow->exam_pluse;?></td>
                              <td><?php echo $allexamdatarow->exam_bp_systolic;?></td>
                              <td><?php echo $allexamdatarow->exam_bp_diastolic;?></td>
                              <td><?php echo $allexamdatarow->exam_pallor;?></td>
                              <td><?php echo $allexamdatarow->exam_icterus;?></td>
                              <td><?php echo $allexamdatarow->exam_thyroid;?></td>
                              <td><?php echo $allexamdatarow->exam_teeth;?></td>
                              <td><?php echo $allexamdatarow->exam_cvs;?></td>
                              <td><?php echo $allexamdatarow->exam_chest;?></td>
                            
                            </tr>
                              <?php }?>
                            

                          </tbody>
                        </table>
                      </div>
                   
 
                  </div><!-- end of first examination wrapper -->  

               
 

                         	</section>

                          
               
                           <!-- ============ end of antenantal_left_tab_menu_5_section ========= -->

                           <!-- ======= start of antenantal_left_tab_menu_6_section ============ -->
                  <section class="antenantalDataSection patientBlockSection" id="antenantal_left_tab_menu_6_section">

          			     	<center class="headingtitile_patient"><h5 class="title_head">&#9733; Investigation Record</h5></center>
                       <div class="row clearfix formgap">
                          <div class="col-sm-2" style="float: right;"> 
                            <button type="button" class="btn btn-block btn-xs btn-danger waves-effect reset_btn" name="resetinvestigation" id="resetinvestigation"  ><i class="material-icons">cached</i> Clear</button>
                          </div>
                     </div>
                     
                      

                       <?php
                       if ($bodycontent['investigationLatestData']) {
                         $isDatainvestigation='Y';
                        }else{
                           $isDatainvestigation='N';
                        }

                      ?>

                      <div class="formgap">

                       <div class="row clearfix formrowgap">
 
                      <div class="col-sm-3">
                          <div class="form-group form-float">
                           <div class="form-line ">
                              <input type="text" class="form-control  inpinve" name="inve_hb" id="inve_hb" autocomplete="off" placeholder="" value="<?php
                              if($isDatainvestigation=='Y'){echo $bodycontent['investigationLatestData']->hb_result;}?>" >
                              <label class="form-label upText">Hb(gm/dl)</label> 
                           </div>
                          </div>
                         </div>
                 <!--   <div class="col-sm-1"><label class="form-label txtsamelevel">on Date</label></div> -->

                      <div class="col-sm-3">
                            <div class="form-group form-float">
                              <div class="form-line">
                                  <input type="text" class="form-control selinve datepicker2" placeholder="" name="inve_hb_date" id="inve_hb_date" autocomplete="off" value="<?php 
                                  if($isDatainvestigation=='Y' && $bodycontent['investigationLatestData']->hb_date!=''){
                                  echo date('d-m-Y', strtotime($bodycontent['investigationLatestData']->hb_date));}?>" 
                                  >
                                  <label class="form-label selectlabel upText">Hb Test Date</label>        
                              </div>
                            </div>
                      </div>

                     <div class="col-sm-3">
                          <div class="form-group form-float">
                           <div class="form-line">
                            <input type="text" class="form-control  inpinve" name="inve_tc" id="inve_tc" autocomplete="off" placeholder="" value="<?php
                             if($isDatainvestigation=='Y'){echo $bodycontent['investigationLatestData']->tc_result;}?>" >
                             <label class="form-label upText">TC(mcl of blood)</label>
                           </div>
                           </div>
                         </div>

                   <div class="col-sm-3">
                      <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control selinve datepicker2" placeholder="" name="inve_tc_date" id="inve_tc_date" autocomplete="off" value="<?php 
                            if($isDatainvestigation=='Y' && $bodycontent['investigationLatestData']->tc_date!=''){
                            echo date('d-m-Y', strtotime($bodycontent['investigationLatestData']->tc_date));}
                            ?>" > 
                            <label class="form-label selectlabel upText">TC Test Date</label>       
                        </div>
                      </div>
                    </div>


                     </div>

                  <div class="row clearfix formrowgap">
 
                    <div class="col-sm-3">
                        <div class="form-group form-float">
                          <div class="form-line">
                            <input type="text" class="form-control  inpinve" name="inve_dc" id="inve_dc" autocomplete="off" placeholder="" value="<?php
                             if($isDatainvestigation=='Y'){echo $bodycontent['investigationLatestData']->dc_result;}?>" >
                            <label class="form-label upText">DC(mcl of blood)</label>
                          </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                      <div class="form-group form-float">
                        <div class="form-line">
                          <input type="text" class="form-control selinve datepicker2" placeholder="" name="inve_dc_date" id="inve_dc_date" autocomplete="off" value="<?php if($isDatainvestigation=='Y' && $bodycontent['investigationLatestData']->dc_date!=''){
                            echo date('d-m-Y', strtotime($bodycontent['investigationLatestData']->dc_date));}?>" >        
                            <label class="form-label selectlabel upText">DC Test Date</label>
                        </div>
                      </div>
                    </div>

                      <div class="col-sm-3">
                          <div class="form-group form-float">
                           <div class="form-line ">
                            <input type="text" class="form-control inpinve" name="inve_fbs" id="inve_fbs" autocomplete="off" placeholder="" value="<?php
                             if($isDatainvestigation=='Y'){echo $bodycontent['investigationLatestData']->fbs_result;}?>" >
                            <label class="form-label upText">FBS(gm/dl)</label>
                           </div>
                           </div>
                    </div>


                  <div class="col-sm-3">
                      <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control selinve datepicker2" placeholder="" name="inve_fbs_date" id="inve_fbs_date" autocomplete="off" value="<?php 
                            if($isDatainvestigation=='Y' && $bodycontent['investigationLatestData']->fbs_date!=''){
                            echo date('d-m-Y', strtotime($bodycontent['investigationLatestData']->fbs_date));} ?>">        
                            <label class="form-label selectlabel upText">FBS Test Date</label>
                        </div>
                      </div>
                    </div>

                 </div>

                  <div class="row clearfix formrowgap">

                     <div class="col-sm-3">
                          <div class="form-group form-float">
                           <div class="form-line ">
                            <input type="text" class="form-control  inpinve" name="ppbs_result" id="ppbs_result" autocomplete="off" placeholder="" value="<?php
                             if($isDatainvestigation=='Y'){echo $bodycontent['investigationLatestData']->ppbs_result;}?>" >
                             <label class="form-label upText">PPBS(gm/dl)</label>
                           </div>
                           </div>
                    </div>

                  <div class="col-sm-3">
                      <div class="form-group form-float">
                          <div class="form-line">
                            <input type="text" class="form-control selinve datepicker2" placeholder="" name="ppbs_date" id="ppbs_date" autocomplete="off" value="<?php 
                            if($isDatainvestigation=='Y' && $bodycontent['investigationLatestData']->ppbs_date!=''){
                              echo date('d-m-Y', strtotime($bodycontent['investigationLatestData']->ppbs_date));}?>" > 
                            <label class="form-label selectlabel upText">PPBS Test Date</label>       
                          </div>
                      </div>
                    </div>

                    <div class="col-sm-3">
                          <div class="input-group form-float">
                          <!--  comment by anil at 30-10-2019 and create option select -->
                              <!-- <input type="text" class="form-control  inpinve" name="vdrl_result" id="vdrl_result" autocomplete="off" placeholder="" value="<?php
                              if($isDatainvestigation=='Y'){echo $bodycontent['investigationLatestData']->vdrl_result;}?>" > -->    

                  <label class="form-label upText selectlabel">VDRL</label>
                         <select name="vdrl_result" id="vdrl_result" class="form-control show-tick selinve "  data-live-search="true" tabindex="-98">
                       <option value=""> &nbsp; </option> 
                         <?php 

                         foreach ($bodycontent['reactivenonrective'] as $reactivenonrective) {  ?>
                         <option value="<?php echo $reactivenonrective;?>"

                             <?php if(($isDatainvestigation=='Y') && $reactivenonrective==$bodycontent['investigationLatestData']->vdrl_result){echo "selected";}else{echo "";} ?>                            
                                                      

                          ><?php echo $reactivenonrective;?></option>
                          <?php     } ?>
                                                   
                          </select> 
                            
                          </div>
                    </div>

                 <div class="col-sm-3">
                      <div class="form-group form-float">
                      <div class="form-line">

                        <input type="text" class="form-control selinve datepicker2" placeholder="" name="vdrl_date" id="vdrl_date" autocomplete="off" value="<?php 
                         if($isDatainvestigation=='Y' && $bodycontent['investigationLatestData']->vdrl_date!=''){
                           echo date('d-m-Y', strtotime($bodycontent['investigationLatestData']->vdrl_date));}

                           ?>" 
                           >   
                           <label class="form-label selectlabel upText">VDRL Test Date</label>     
                         </div>
                         </div>
                    </div>
                 </div>

                  <div class="row clearfix formrowgap">
                    <div class="col-sm-3">
                          <div class="input-group form-float">
                           
                           <!--  <input type="text" class="form-control  inpinve" name="hiv_one_result" id="hiv_one_result" autocomplete="off" placeholder="" value="<?php
                             if($isDatainvestigation=='Y'){echo $bodycontent['investigationLatestData']->hiv_one_result;}?>" > -->
                            <label class="form-label upText selectlabel">HIV 1</label>

                             <select name="hiv_one_result" id="hiv_one_result" class="form-control show-tick selinve "  data-live-search="true" tabindex="-98">
                                 <option value=""> &nbsp; </option> 
                         <?php 

                         foreach ($bodycontent['reactivenonrective'] as $reactivenonrective) {  ?>
                         <option value="<?php echo $reactivenonrective;?>"

                             <?php if(($isDatainvestigation=='Y') && $reactivenonrective==$bodycontent['investigationLatestData']->hiv_one_result){echo "selected";}else{echo "";} ?>                            
                                                      

                          ><?php echo $reactivenonrective;?></option>
                          <?php     } ?>
                                                   
                          </select> 
                           
                           </div>
                    </div>

                   <div class="col-sm-3">
                      <div class="form-group form-float">
                      <div class="form-line">

                        <input type="text" class="form-control selinve datepicker2" placeholder="" name="hiv_one_date" id="hiv_one_date" autocomplete="off" value="<?php 
                         if($isDatainvestigation=='Y' && $bodycontent['investigationLatestData']->hiv_one_date!=''){
                           echo date('d-m-Y', strtotime($bodycontent['investigationLatestData']->hiv_one_date));}

                           ?>" 
                           >  
                           <label class="form-label selectlabel upText">HIV 1 Test Date</label>      
                         </div>
                         </div>
                    </div>

                     <div class="col-sm-3">
                          <div class="input-group form-float">
                          
                            <!-- <input type="text" class="form-control inpinve" name="hiv_two_result" id="hiv_two_result" autocomplete="off" placeholder="" value="<?php
                             if($isDatainvestigation=='Y'){echo $bodycontent['investigationLatestData']->hiv_two_result;}?>" > -->
                            <label class="form-label upText selectlabel">HIV 2</label>
                            <select name="hiv_two_result" id="hiv_two_result" class="form-control show-tick selinve "  data-live-search="true" tabindex="-98">
                                 <option value=""> &nbsp; </option> 
                         <?php 

                         foreach ($bodycontent['reactivenonrective'] as $reactivenonrective) {  ?>
                         <option value="<?php echo $reactivenonrective;?>"

                             <?php if(($isDatainvestigation=='Y') && $reactivenonrective==$bodycontent['investigationLatestData']->hiv_two_result){echo "selected";}else{echo "";} ?>                            
                                                      

                          ><?php echo $reactivenonrective;?></option>
                          <?php     } ?>
                                                   
                          </select> 

                           
                           </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group form-float">
                        <div class="form-line">

                          <input type="text" class="form-control selinve datepicker2" placeholder="" name="hiv_two_date" id="hiv_two_date" autocomplete="off" value="<?php 
                          if($isDatainvestigation=='Y' && $bodycontent['investigationLatestData']->hiv_two_date!=''){
                            echo date('d-m-Y', strtotime($bodycontent['investigationLatestData']->hiv_two_date));}

                            ?>" 
                            >
                            <label class="form-label selectlabel upText">HIV 2 Test Date</label> 

                        </div>
                      </div>
                    </div>

                   
                 </div>

                  <div class="row clearfix formrowgap">

                    <div class="col-sm-3">
                          <div class="input-group form-float">
                          
                            <!-- <input type="text" class="form-control inpinve" name="hbsag_result" id="hbsag_result" autocomplete="off" placeholder="" value="<?php
                             if($isDatainvestigation=='Y'){echo $bodycontent['investigationLatestData']->hbsag_result;}?>" > -->

                             <label class="form-label upText selectlabel zindex3">Hbs Ag</label>

                              <select name="hbsag_result" id="hbsag_result" class="form-control show-tick selinve "  data-live-search="true" tabindex="-98">
                                 <option value=""> &nbsp; </option> 
                         <?php 

                         foreach ($bodycontent['reactivenonrective'] as $reactivenonrective) {  ?>
                         <option value="<?php echo $reactivenonrective;?>"

                             <?php if(($isDatainvestigation=='Y') && $reactivenonrective==$bodycontent['investigationLatestData']->hbsag_result){echo "selected";}else{echo "";} ?>                            
                                                      

                          ><?php echo $reactivenonrective;?></option>
                          <?php     } ?>
                                                   
                          </select> 
                           
                           </div>
                    </div>

                   <div class="col-sm-3">
                      <div class="form-group form-float">
                      <div class="form-line">

                        <input type="text" class="form-control selinve datepicker2" placeholder="" name="hbsag_date" id="hbsag_date" autocomplete="off" value="<?php 
                         if($isDatainvestigation=='Y' && $bodycontent['investigationLatestData']->hbsag_date!=''){
                           echo date('d-m-Y', strtotime($bodycontent['investigationLatestData']->hbsag_date));}

                           ?>" 
                           >  
                           <label class="form-label selectlabel upText">Hbs Ag Test Date</label>

                         </div>
                         </div>
                    </div>
                     <div class="col-sm-3">
                          <div class="input-group form-float">
                          <!-- 
                            <input type="text" class="form-control inpinve" name="antihcv_result" id="antihcv_result" autocomplete="off" placeholder="" value="<?php
                             if($isDatainvestigation=='Y'){echo $bodycontent['investigationLatestData']->antihcv_result;}?>" > -->

                            <label class="form-label upText selectlabel">Anti HCV</label>
                            <select name="antihcv_result" id="antihcv_result" class="form-control show-tick selinve "  data-live-search="true" tabindex="-98">
                                 <option value=""> &nbsp; </option> 
                         <?php 

                         foreach ($bodycontent['reactivenonrective'] as $reactivenonrective) {  ?>
                         <option value="<?php echo $reactivenonrective;?>"

                             <?php if(($isDatainvestigation=='Y') && $reactivenonrective==$bodycontent['investigationLatestData']->antihcv_result){echo "selected";}else{echo "";} ?>                            
                                                      

                          ><?php echo $reactivenonrective;?></option>
                          <?php     } ?>
                                                   
                          </select>
                           
                          </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group form-float">
                      
                        <div class="form-line">
                          <input type="text" class="form-control selinve datepicker2" placeholder="" name="antihcv_date" id="antihcv_date" autocomplete="off" value="<?php 
                          if($isDatainvestigation=='Y' && $bodycontent['investigationLatestData']->antihcv_date!=''){
                            echo date('d-m-Y', strtotime($bodycontent['investigationLatestData']->antihcv_date));}?>" >  
                            <label class="form-label selectlabel upText">Anti HCV Test Date</label>      
                        </div>

                      </div>
                    </div>
                 </div>

                <div class="row clearfix formrowgap">
                    <div class="col-sm-3">
                          <div class="form-group form-float">
                              <div class="form-line ">
                                <input type="text" class="form-control inpinve" name="urine_re_result" id="urine_re_result" autocomplete="off" placeholder="" value="<?php
                                if($isDatainvestigation=='Y'){echo $bodycontent['investigationLatestData']->urine_re_result;}?>" >
                              <label class="form-label upText">Urine R/E</label>
                              </div>
                          </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group form-float">
                        
                        <div class="form-line">
                          <input type="text" class="form-control selinve datepicker2" placeholder="" name="urine_re_date" id="urine_re_date" autocomplete="off" value="<?php 
                          if($isDatainvestigation=='Y' && $bodycontent['investigationLatestData']->urine_re_date!=''){
                           echo date('d-m-Y', strtotime($bodycontent['investigationLatestData']->urine_re_date));}?>" >        
                           <label class="form-label selectlabel upText">Urine R/E Date</label>
                        </div>
                      </div>
                    </div>
                    <!-- new column creted for R/E Notes by anil 23-09-2019 -->
                     <div class="col-sm-3">
                          <div class="form-group form-float">
                           <div class="form-line ">
                            <input type="text" class="form-control inpinve" name="urine_re_notes" id="urine_re_notes" autocomplete="off" placeholder="" value="<?php
                             if($isDatainvestigation=='Y'){echo $bodycontent['investigationLatestData']->urine_re_notes;}?>" >
                            <label class="form-label upText">Urine R/E Notes</label>
                           </div>
                          </div>
                     </div>

                      <div class="col-sm-3">
                          <div class="form-group form-float">
                           <div class="form-line ">
                            <input type="text" class="form-control inpinve" name="urine_re_others" id="urine_re_others" autocomplete="off" placeholder="" value="<?php
                             if($isDatainvestigation=='Y'){echo $bodycontent['investigationLatestData']->urine_re_others;}?>" >
                            <label class="form-label upText">Urine R/E Others</label>
                           </div>
                          </div>
                     </div>


               
               </div>
               <!-- created new row for Urine C/S by anil 23-09-2019 -->

               <div class="row clearfix formrowgap">
                   <div class="col-sm-3">
                          <div class="form-group form-float">
                           <div class="form-line">
                            <input type="text" class="form-control inpinve" name="cs_sensitive_to_result" id="cs_sensitive_to_result" autocomplete="off" placeholder="" value="<?php
                             if($isDatainvestigation=='Y'){echo $bodycontent['investigationLatestData']->cs_sensitive_to_result;}?>" >
                            <label class="form-label upText">Urine C/S</label>
                           </div>
                           </div>
                    </div>

                    <div class="col-sm-3">
                      <div class="form-group form-float">
                        <div class="form-line">
                          <input type="text" class="form-control selinve datepicker2" placeholder="" name="cs_sensitive_date" id="cs_sensitive_date" autocomplete="off" value="<?php 
                         if($isDatainvestigation=='Y' && $bodycontent['investigationLatestData']->cs_sensitive_date!=''){
                           echo date('d-m-Y', strtotime($bodycontent['investigationLatestData']->cs_sensitive_date));}?>" >  
                          <label class="form-label selectlabel upText">Urine C/S Date</label>      
                        </div>
                      </div>
                    </div>

                  <div class="col-sm-3">
                          <div class="form-group form-float">
                           <div class="form-line">
                            <input type="text" class="form-control inpinve" name="cs_sensitive_others" id="cs_sensitive_others" autocomplete="off" placeholder="" value="<?php
                             if($isDatainvestigation=='Y'){echo $bodycontent['investigationLatestData']->cs_sensitive_others;}?>" >
                            <label class="form-label upText">Urine C/S Others</label>
                           </div>
                           </div>
                    </div> 
             </div>

               <div class="row clearfix formrowgap">

                    <div class="col-sm-3">
                          <div class="form-group form-float">
                           <div class="form-line ">
                            <input type="text" class="form-control inpinve" name="stsh_result" id="stsh_result" autocomplete="off" placeholder="" value="<?php
                             if($isDatainvestigation=='Y'){echo $bodycontent['investigationLatestData']->stsh_result;}?>" >
                            <label class="form-label upText">STSH(mIU/ml)</label>
                           </div>
                          </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group form-float">
                        <div class="form-line">
                          <input type="text" class="form-control selinve datepicker2" placeholder="" name="stsh_date" id="stsh_date" autocomplete="off" value="<?php 
                         if($isDatainvestigation=='Y' && $bodycontent['investigationLatestData']->stsh_date!=''){
                           echo date('d-m-Y', strtotime($bodycontent['investigationLatestData']->stsh_date));}

                           ?>" 
                           >  
                           <label class="form-label selectlabel upText">STSH Date</label>      
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-3">
                          <div class="form-group form-float">
                           <div class="form-line">
                            <input type="text" class="form-control inpinve" name="s_urea_result" id="s_urea_result" autocomplete="off" placeholder="" value="<?php
                             if($isDatainvestigation=='Y'){echo $bodycontent['investigationLatestData']->s_urea_result;}?>" >
                            <label class="form-label upText">S urea(mg/dl)</label>
                           </div>
                          </div>
                    </div>

                     <div class="col-sm-3">
                      <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control selinve datepicker2" placeholder="" name="s_urea_date" id="s_urea_date" autocomplete="off" value="<?php 
                          if($isDatainvestigation=='Y' && $bodycontent['investigationLatestData']->s_urea_date!=''){
                            echo date('d-m-Y', strtotime($bodycontent['investigationLatestData']->s_urea_date));}

                            ?>" 
                            >
                            <label class="form-label selectlabel upText">S urea Date</label>        
                        </div>
                      </div>
                    </div>
               </div>

               <div class="row clearfix formrowgap">
                  <div class="col-sm-3">
                          <div class="form-group form-float">
                            <div class="form-line ">
                              <input type="text" class="form-control inpinve" name="s_creatinine_result" id="s_creatinine_result" autocomplete="off" placeholder="" value="<?php
                              if($isDatainvestigation=='Y'){echo $bodycontent['investigationLatestData']->s_creatinine_result;}?>" >
                                <label class="form-label upText">S creatinine(mg/dl)</label>
                            </div>
                          </div>
                  </div>

                  <div class="col-sm-3">
                      <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control selinve datepicker2" placeholder="" name="s_creatinine_date" id="s_creatinine_date" autocomplete="off" value="<?php 
                          if($isDatainvestigation=='Y' && $bodycontent['investigationLatestData']->s_creatinine_date!=''){
                            echo date('d-m-Y', strtotime($bodycontent['investigationLatestData']->s_creatinine_date));}

                            ?>" 
                            >
                            <label class="form-label selectlabel upText">S creatinine Date</label>        
                        </div>
                      </div>
                  </div>
                    <!-- comment by anil 20-09-2019 as per user requirement -->

                   <!-- <div class="col-sm-3">
                          <div class="form-group form-float">
                           <div class="form-line ">
                            <input type="text" class="form-control inpinve" name="combined_test_result" id="combined_test_result" autocomplete="off" placeholder="" value="<?php
                             if($isDatainvestigation=='Y'){echo $bodycontent['investigationLatestData']->combined_test_result;}?>" >
                            <label class="form-label upText">Combined Test</label>
                           </div>
                           </div>
                  </div>-->
                 <!-- <div class="col-sm-3">
                      <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control selinve datepicker2" placeholder="" name="combined_test_date" id="combined_test_date" autocomplete="off" value="<?php 
                          if($isDatainvestigation=='Y' && $bodycontent['investigationLatestData']->combined_test_date!=''){
                            echo date('d-m-Y', strtotime($bodycontent['investigationLatestData']->combined_test_date));}?>" >
                            <label class="form-label upText">Combined Test Date</label>        
                        </div>
                      </div>
                  </div>  -->
                 
               </div>

                <div class="row clearfix formrowgap">
                  <!--  <div class="col-sm-4">
                          <div class="form-group form-float">
                           <div class="form-line">
                            <input type="text" class="form-control inpinve" name="thalassemia_result" id="thalassemia_result" autocomplete="off" placeholder="" value="<?php
                             if($isDatainvestigation=='Y'){echo $bodycontent['investigationLatestData']->thalassemia_result;}?>" >
                            <label class="form-label upText">Thalassemia HPLC | Electrophoresis</label>
                           </div>
                          </div>
                    </div> -->

                   <div class="col-sm-3">
                         <div class="input-group form-float" id="usg_slf_weekerr">
                         <label class="form-label selectlabel zindex3">Thalassemia Screening</label>
                         <select name="thalassemia_screening_result" id="thalassemia_screening_result" class="form-control selinve show-tick"  data-live-search="true" tabindex="-98">
                         <option value=""> &nbsp; </option>
                         <?php 

                         foreach ($bodycontent['thalassemiascreening'] as $thalassemiascreening) {  ?>
                         <option value="<?php echo $thalassemiascreening;?>"

                         <?php if(($isDatainvestigation=='Y') && $thalassemiascreening==$bodycontent['investigationLatestData']->thalassemia_screening_result){echo "selected";}else{echo "";} ?>
                                                        
                                                      

                          ><?php echo $thalassemiascreening;?></option>
                          <?php     } ?>
                                                   
                          </select> 
                           
                           </div>
                        
                    </div>

                     <!-- new column added for thalssemia others by anil 24-09-2019 --> 
                    <?php 

                     if($isDatainvestigation == 'Y' && $bodycontent['investigationLatestData']->thalassemia_screening_result == 'Others'){

                        $dispthalother = "display:block;";

                      }
                      else{
                             $dispthalother = "display:none;";

                      }

                     ?>
                  
                    <div class="col-sm-3" id="thalassemiaOther" style="<?php echo $dispthalother; ?>">
                          <div class="form-group form-float">
                           <div class="form-line ">
                            <input type="text" class="form-control inpinve" name="thalassemia_other" id="thalassemia_other" autocomplete="off" placeholder="" value="<?php
                             if($isDatainvestigation=='Y'){echo $bodycontent['investigationLatestData']->thalassemia_other; }?>" >
                            <label class="form-label upText">Others</label>
                           </div>
                          </div>
                     </div>

                    <div class="col-sm-3">
                      <div class="form-group form-float">
                        <div class="form-line">
                          <input type="text" class="form-control selinve datepicker2" placeholder="" name="thalassemia_date" id="thalassemia_date" autocomplete="off" value="<?php 
                          if($isDatainvestigation=='Y' && $bodycontent['investigationLatestData']->thalassemia_date!=''){
                            echo date('d-m-Y', strtotime($bodycontent['investigationLatestData']->thalassemia_date));}?>" >        
                            <label class="form-label selectlabel upText">Thalassemia Date</label>
                        </div>
                      </div>
                    </div>
                  
                </div>
                  
                
                
                 <div class="row clearfix formrowgap">

                    <div class="col-sm-3">
                      <div class="form-group form-float">
                        <div class="form-line">
                          <input type="text" class="form-control selinve datepicker2" placeholder="" name="usg_scan_date" id="usg_scan_date" autocomplete="off" value="<?php 
                          if($isDatainvestigation=='Y' && $bodycontent['investigationLatestData']->usg_scan_date!=''){
                           echo date('d-m-Y', strtotime($bodycontent['investigationLatestData']->usg_scan_date));}?>" >
                          <label class="form-label selectlabel upText">USG dating scan Date</label> 

                           

                         </div>
                      </div>
                    </div>

                   <div class="col-sm-3">
                         <div class="input-group form-float" id="usg_slf_weekerr">
                         <label class="form-label selectlabel zindex3">USG SLF of Week</label>
                         <select name="usg_slf_week" id="usg_slf_week" class="form-control selinve show-tick"  data-live-search="true" tabindex="-98">
                         <option value=""> &nbsp; </option>
                         <?php 

                         foreach ($bodycontent['fourtoTwelveDropDown'] as $fourtotwelverow) {  ?>
                         <option value="<?php echo $fourtotwelverow;?>"

                         <?php if(($isDatainvestigation=='Y') && $fourtotwelverow==$bodycontent['investigationLatestData']->usg_slf_week){echo "selected";}else{echo "";} ?>
                                                        
                                                      

                          ><?php echo $fourtotwelverow;?></option>
                          <?php     } ?>
                                                   
                          </select> 
                           
                           </div>
                        
                    </div>

                    <div class="col-sm-3">
                         <div class="input-group form-float" id="usg_slf_dayerr">
                          <label class="form-label selectlabel zindex3">USG SLF of Day</label>
                          <select name="usg_slf_day" id="usg_slf_day" class="form-control selinve show-tick"  data-live-search="true" tabindex="-98">
                          <option value=""> &nbsp; </option>
                          <?php 

                          foreach ($bodycontent['zerotoSevenDropDown'] as $zerotosevenrow) {  ?>
                          <option value="<?php echo $zerotosevenrow;?>"

                          <?php if(($isDatainvestigation=='Y') && $zerotosevenrow==$bodycontent['investigationLatestData']->usg_slf_day){echo "selected";}else{echo "";} ?>
                                                          
                                                        

                            ><?php echo $zerotosevenrow;?></option>
                            <?php     } ?>
                                                    
                            </select> 
                           
                           </div>
                        
                    </div>      
               </div>

               <div class="row clearfix formrowgap">

                 <div class="col-sm-3">
                      <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control selinve" placeholder="" name="nt_scan" id="nt_scan" autocomplete="off" value="<?php 
                            if($isDatainvestigation=='Y'){ echo $bodycontent['investigationLatestData']->nt_scan; } ?>" onKeyUp="numericFilter(this);">
                            <label class="form-label upText">NT scan (in cm)</label>        
                        </div>
                      </div>
                  </div>

                   <div class="col-sm-3">
                      <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control selinve datepicker2" placeholder="" name="nt_scan_date" id="nt_scan_date" autocomplete="off" value="<?php 
                            if($isDatainvestigation=='Y' && $bodycontent['investigationLatestData']->nt_scan_date!=''){
                            echo date('d-m-Y', strtotime($bodycontent['investigationLatestData']->nt_scan_date));} ?>" >
                            <label class="form-label selectlabel upText">NT scan Date</label>        
                        </div>
                      </div>
                  </div>

                <div class="col-sm-3">
                      <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control selinve datepicker2" placeholder="" name="double_marker_date" id="double_marker_date" autocomplete="off" value="<?php 
                            if($isDatainvestigation=='Y' && $bodycontent['investigationLatestData']->double_marker_date!=''){
                            echo date('d-m-Y', strtotime($bodycontent['investigationLatestData']->double_marker_date));} ?>" >
                            <label class="form-label selectlabel upText">Double marker Date</label>        
                        </div>
                      </div>
                  </div>
                </div>
                <div class="row clearfix">

                     <div class="col-sm-4">
                         <div class="input-group form-float" id="usg_slf_dayerr">
                          <label class="form-label upText selectlabel">1st Trimester Screening Low Risk For</label>
                          <select name="nt_scan_lowerrisk[]" id="nt_scan_lowerrisk" class="form-control selinve show-tick"  data-live-search="true" tabindex="-98"  multiple data-selected-text-format="count">
                          <!--  <option value=""> &nbsp; </option> -->
                          <?php 

                          foreach ($bodycontent['ntscanrisk'] as $ntscanrisk) {  ?>
                          <option value="<?php echo $ntscanrisk;?>"

                          <?php if(($isDatainvestigation=='Y'))
                          {
                            $selected_lowrisk=explode(",",(string)$bodycontent['investigationLatestData']->nt_scan_lowerrisk);          
                            if (in_array($ntscanrisk, $selected_lowrisk)) { echo 'selected';}
    
                          } ?>
                                                          
                                                        

                            ><?php echo $ntscanrisk;?></option>
                            <?php     } ?>
                                                    
                            </select> 
                          </div>
                        
                    </div> 
                        <div class="col-sm-4">
                         <div class="input-group form-float" id="nt_scan_highriskerr">
                         <label class="form-label upText selectlabel">1st Trimester Screening High Risk For</label>
                         <select name="nt_scan_highrisk[]" id="nt_scan_highrisk" class="form-control show-tick selinve"  data-live-search="true" tabindex="-98" multiple data-selected-text-format="count">
                        <!--  <option value=""> &nbsp; </option> -->
                         <?php 

                         foreach ($bodycontent['ntscanrisk'] as $ntscanrisk) {  ?>
                         <option value="<?php echo $ntscanrisk;?>"

                        <?php if(($isDatainvestigation=='Y'))
                         {
                          $selected_highrisk=explode(",",(string)$bodycontent['investigationLatestData']->nt_scan_highrisk);          
                          if (in_array($ntscanrisk, $selected_highrisk)) { echo 'selected';}
  
                         } ?>
                                                        
                                                      

                          ><?php echo $ntscanrisk;?></option>
                          <?php     } ?>
                                                   
                          </select> 
                           
                           </div>
                        
                    </div> 
                    </div>

                    <div class="row clearfix formrowgap">

                    <div class="col-sm-3">
                      <div class="form-group form-float">
                          <label class="form-label upText selectlabel">Anomaly scan Date</label>
                          <div class="form-line">
                              <input type="text" class="form-control selinve datepicker2" placeholder="" name="anomaly_scan_date" id="anomaly_scan_date" autocomplete="off" value="<?php 
                            if($isDatainvestigation=='Y' && $bodycontent['investigationLatestData']->anomaly_scan_date!=''){
                              echo date('d-m-Y', strtotime($bodycontent['investigationLatestData']->anomaly_scan_date));}?>" >        
                          </div>
                      </div>
                    </div>

                         <div class="col-sm-3">
                         <div class="input-group form-float" id="usg_slf_weekerr">
                          <label class="form-label selectlabel zindex3">Anomaly SLF of Week</label>
                          <select name="anomaly_slf_week" id="anomaly_slf_week" class="form-control selinve show-tick"  data-live-search="true" tabindex="-98">
                          <option value=""> &nbsp; </option>
                          <?php 

                          foreach ($bodycontent['seventeentotwentyfourDropDown'] as $seventeentotwentyfour) {  ?>
                          <option value="<?php echo $seventeentotwentyfour;?>"

                          <?php if(($isDatainvestigation=='Y') && $seventeentotwentyfour==$bodycontent['investigationLatestData']->anomaly_slf_week){echo "selected";}else{echo "";} ?>
                                                          
                                                        

                            ><?php echo $seventeentotwentyfour;?></option>
                            <?php     } ?>
                                                    
                            </select> 
                           
                          </div>
                        
                    </div>

                    <div class="col-sm-3">
                         <div class="input-group form-float" id="usg_slf_dayerr">
                          <label class="form-label selectlabel zindex3">Anomaly SLF of Day</label>
                          <select name="anomaly_slf_day" id="anomaly_slf_day" class="form-control selinve show-tick"  data-live-search="true" tabindex="-98">
                            <option value=""> &nbsp; </option>
                            <?php 

                            foreach ($bodycontent['zerotoSevenDropDown'] as $zerotosevenrow) {  ?>
                            <option value="<?php echo $zerotosevenrow;?>"

                            <?php if(($isDatainvestigation=='Y') && $zerotosevenrow==$bodycontent['investigationLatestData']->anomaly_slf_day){echo "selected";}else{echo "";} ?>>
                            <?php echo $zerotosevenrow;?></option>
                            <?php     } ?>
                          </select> 
                          </div>
                        
                    </div>                 
               </div>

                <div class="row clearfix formrowgap">
 
                 <div class="col-sm-2">
                         <div class="input-group form-float" id="anomaly_placentaerr">
                         <label class="form-label upText selectlabel">Placenta</label>
                          <select name="anomaly_placenta[]"  class="form-control show-tick selinve anomalyplacenta" data-live-search="true" tabindex="-98" multiple data-selected-text-format="count">
                                  <?php
                                      foreach ($bodycontent['placentaList']  as $placentalist ) { 
                                   ?>
                                     <option value="<?php echo $placentalist->placenta_id;?>"
                                      <?php

                                      if($isDatainvestigation=='Y'){
                                      $selected_placenta=explode(",",(string)$bodycontent['investigationLatestData']->anomaly_placenta);
                                     
                                    
                                      if (in_array($placentalist->placenta_id, $selected_placenta)) {
                                          echo 'selected';
                                      }

                                    }

                                      ?>

                                      ><?php echo $placentalist->placenta_name;?></option>
                                   <?php
                                    }
                                   ?>
                                
                            </select> 
                           
                           </div>
                        
                    </div>
                  <div class="col-sm-2">       

                <?php 
                    // if ($bodycontent['antenantalmode']=="EDIT") {
                    // $medicine_concieve_array = explode (",", $bodycontent['antenantalCaseEditdata']->medicine_concieve); 
                    // }
                ?>         
              <div class="form-group form-group"> <label class="form-label upText">&nbsp;</label>
                     <div class="input-group" style="margin-top: -9px;" >
                       
                         <input type="checkbox" name="no_anomaly_seen" id="no_anomaly_seen" class="filled-in chk-col-deep-purple selinve noanomalyckbx" value="Y" 
                         <?php 
                         
                         if ($isDatainvestigation=='Y') {
                         if($bodycontent['investigationLatestData']->is_no_anomaly_seen=='Y'){ echo "checked";} }
                         ?> 
                          > <label for="no_anomaly_seen">No anomaly seen</label> &nbsp;&nbsp;

                          <input type="hidden" name="is_no_anomaly_seen" id="is_no_anomaly_seen" value="<?php
                           if ($isDatainvestigation=='Y') {
                            echo $bodycontent['investigationLatestData']->is_no_anomaly_seen;
                          }else{
                            echo 'N';
                          }
                          ?>">


                      
              
                      </div>  
              </div>
                </div>

                   <div class="col-sm-2">       
        
              <div class="form-group form-group"> <label class="form-label upText">&nbsp;</label>
                     <div class="input-group" style="margin-top: -9px;">
                         &nbsp;&nbsp; <input type="checkbox" name="other_anomaly" id="other_anomaly" class="filled-in chk-col-deep-purple selinve otheranomalyckbx" value="Y" 
                         <?php 
                         if ($isDatainvestigation=='Y') {
                         if($bodycontent['investigationLatestData']->is_other_anomaly=='Y'){ echo "checked";} }
                       
                         ?> 
                          > <label for="other_anomaly">Other</label> &nbsp;&nbsp;

                          <input type="hidden" name="is_other_anomaly" id="is_other_anomaly" value="<?php
                           if ($isDatainvestigation=='Y') {
                            echo $bodycontent['investigationLatestData']->is_other_anomaly;
                          }else{
                            echo 'N';
                          }
                          ?>">

                         
              
                      </div>  
              </div>
                </div>
                <?php
                          $disp_other_anomaly='display:none;';

                           if ($isDatainvestigation=='Y' && $bodycontent['investigationLatestData']->is_other_anomaly=='Y') {

                             $disp_other_anomaly='display:block;';

                          
                          }?>


                  <div class="col-sm-3" id="other_annomaly_div" style="<?php echo $disp_other_anomaly;?>">
                          <div class="form-group form-float">
                            <div class="form-line ">
                               <input type="text" class="form-control selinve inpinve other_anomaly_text" name="other_anomaly" id="other_anomaly" autocomplete="off" placeholder="Others anomaly" value="<?php
                             if($isDatainvestigation=='Y'){echo $bodycontent['investigationLatestData']->other_anomaly;}?>" >
                            <label class="form-label upText">Others</label>
                            </div>
                          </div>
                </div>



               <!--  <div class="col-sm-3" id="other_annomaly_div" style="<?php echo $disp_other_anomaly;?>">
                          <div class="form-group form-group">
                           <div class="form-line ">
                           &nbsp;&nbsp; <input type="text" class="form-control selinve inpinve other_anomaly_text" name="other_anomaly" id="other_anomaly" autocomplete="off" placeholder="Others anomaly" value="<?php
                             if($isDatainvestigation=='Y'){echo $bodycontent['investigationLatestData']->other_anomaly;}?>" >
                           
                           </div>
                           </div>
                  </div> -->
               </div>

                <div class="row clearfix formrowgap">
                   <div class="col-sm-3">
                      <div class="form-group form-float">
                        <div class="form-line">
                          <input type="text" class="form-control selinve datepicker2" placeholder="" name="growth_date" id="growth_date" autocomplete="off" value="<?php 
                          if($isDatainvestigation=='Y' && $bodycontent['investigationLatestData']->growth_date!=''){
                            echo date('d-m-Y', strtotime($bodycontent['investigationLatestData']->growth_date));}?>" >   
                            <label class="form-label selectlabel upText">Growth scan Date</label>     
                        </div>
                      </div>
                  </div>

                    <div class="col-sm-3">
                         <div class="input-group form-float">
                         <label class="form-label selectlabel zindex3">Growth SLF of Week</label>
                         <select name="growth_slf_week" id="growth_slf_week" class="form-control selinve show-tick"  data-live-search="true" tabindex="-98">
                         <option value=""> &nbsp; </option>
                         <?php 
                      /* seventeentotwentyfourDropDown replace by tweveltofourtytwoDropDown by anil 20-09-2019 */

                         foreach ($bodycontent['tweveltofourtytwoDropDown'] as $tweveltofourtytwoDropDown) {  ?>
                         <option value="<?php echo $tweveltofourtytwoDropDown;?>"

                         <?php if(($isDatainvestigation=='Y') && $tweveltofourtytwoDropDown==$bodycontent['investigationLatestData']->growth_slf_week){echo "selected";}else{echo "";} ?>
                                                        
                                                      

                          ><?php echo $tweveltofourtytwoDropDown;?></option>
                          <?php     } ?>
                                                   
                          </select> 
                           
                           </div>
                        
                    </div>

                    <div class="col-sm-3">
                         <div class="input-group form-float">
                         <label class="form-label selectlabel zindex3">Growth SLF of Day</label>
                         <select name="growth_slf_day" id="growth_slf_day" class="form-control selinve show-tick"  data-live-search="true" tabindex="-98">
                         <option value=""> &nbsp; </option>
                         <?php 

                         foreach ($bodycontent['zerotoSevenDropDown'] as $zerotosevenrow) {  ?>
                         <option value="<?php echo $zerotosevenrow;?>"

                         <?php if(($isDatainvestigation=='Y') && $zerotosevenrow==$bodycontent['investigationLatestData']->growth_slf_day){echo "selected";}else{echo "";} ?>
                                                        
                                                      

                          ><?php echo $zerotosevenrow;?></option>
                          <?php     } ?>
                                                   
                          </select> 
                           
                          </div>
                        
                    </div> 
                  </div>


                  <div class="row clearfix formrowgap">
                      <div class="col-sm-3">
                         <div class="input-group form-float">
                         <label class="form-label upText selectlabel">Presentation</label>
                         <select name="growth_presentation" id="growth_presentation" class="form-control selinve show-tick"  data-live-search="true" tabindex="-98">
                         <option value=""> &nbsp; </option>
                         <?php 

                         foreach ($bodycontent['presentation'] as $presentationrow) {  ?>
                         <option value="<?php echo $presentationrow;?>"
                         <?php if(($isDatainvestigation=='Y') && $presentationrow==$bodycontent['investigationLatestData']->growth_presentation){echo "selected";}else{echo "";} ?>
                          ><?php echo $presentationrow;?></option>
                          <?php     } ?>                                                  
                          </select>   
                          </div>                       
                    </div> 

                    <div class="col-sm-3">
                         <div class="input-group form-float">
                         <label class="form-label upText selectlabel">AFI</label>
                         <select name="growth_afi" id="growth_afi" class="form-control selinve show-tick"  data-live-search="true" tabindex="-98">
                         <option value=""> &nbsp; </option>
                         <?php 
                         for ($groafi=0; $groafi <=30 ; $groafi++) { 
                            ?>
                         <option value="<?php echo $groafi;?>"
                         <?php if(($isDatainvestigation=='Y') && $groafi==$bodycontent['investigationLatestData']->growth_afi){echo "selected";}else{echo "";} ?>
                          ><?php echo $groafi;?></option>
                          <?php     } ?>                                                   
                          </select>                           
                           </div>                       
                    </div> 

                    <div class="col-sm-3">
                         <div class="input-group form-float">
                         <label class="form-label upText selectlabel zindex3">Liquor</label>
                         <select name="growth_liquor" id="growth_liquor" class="form-control selinve show-tick"  data-live-search="true" tabindex="-98">
                         <option value=""> &nbsp; </option>
                         <?php 

                         foreach ($bodycontent['liquor'] as $liquorrow) {  ?>
                         <option value="<?php echo $liquorrow;?>"
                         <?php if(($isDatainvestigation=='Y') && $liquorrow==$bodycontent['investigationLatestData']->growth_liquor){echo "selected";}else{echo "";} ?>
                          ><?php echo $liquorrow;?></option>
                          <?php     } ?>                                                  
                          </select>   
                          </div>                       
                    </div>
                  
                </div>

                <hr>
                
                <div class="row clearfix formrowgap">
                   <div class="col-sm-3">
                      <div class="form-group form-float">
                          <div class="form-line">
                            <input type="text" class="form-control selinve datepicker2" placeholder="" name="doppler_scan_date" id="doppler_scan_date" autocomplete="off" value="<?php 
                            if($isDatainvestigation=='Y' && $bodycontent['investigationLatestData']->doppler_scan_date!=''){
                              echo date('d-m-Y', strtotime($bodycontent['investigationLatestData']->doppler_scan_date));}?>"> 
                            <label class="form-label selectlabel upText">Doppler scan Date</label>       
                          </div>
                      </div>
                  </div>

                  <div class="col-sm-3">
                        <div class="input-group form-float">
                          <label class="form-label  selectlabel zindex3">Doppler SLF of Week</label>
                          <select name="doppler_slf_week" id="doppler_slf_week" class="form-control selinve show-tick"  data-live-search="true" tabindex="-98">
                          <option value=""> &nbsp; </option>
                          <?php 
                          /* seventeentotwentyfourDropDown replace by tweveltofourtytwoDropDown by anil 20-09-2019 */
                          foreach ($bodycontent['tweveltofourtytwoDropDown'] as $tweveltofourtytwoDropDown) {  ?>
                          <option value="<?php echo $tweveltofourtytwoDropDown;?>"

                          <?php if(($isDatainvestigation=='Y') && $tweveltofourtytwoDropDown==$bodycontent['investigationLatestData']->doppler_slf_week){echo "selected";}else{echo "";} ?>
                                                          
                                                        

                            ><?php echo $tweveltofourtytwoDropDown;?></option>
                            <?php     } ?>
                                                    
                            </select>          
                        </div>  
                    </div>


                    <div class="col-sm-3">
                         <div class="input-group form-float">
                         <label class="form-label selectlabel zindex3">Doppler SLF of Day</label>
                         <select name="doppler_slf_day" id="doppler_slf_day" class="form-control selinve show-tick"  data-live-search="true" tabindex="-98">
                         <option value=""> &nbsp; </option>
                         <?php 

                         foreach ($bodycontent['zerotoSevenDropDown'] as $zerotosevenrow) {  ?>
                         <option value="<?php echo $zerotosevenrow;?>"

                         <?php if(($isDatainvestigation=='Y') && $zerotosevenrow==$bodycontent['investigationLatestData']->doppler_slf_day){echo "selected";}else{echo "";} ?>
                                                        
                                                      

                          ><?php echo $zerotosevenrow;?></option>
                          <?php     } ?>
                                                   
                          </select> 
                           
                           </div>
                        
                    </div> 
                  </div>

                    <div class="row clearfix formrowgap">
                    <div class="col-sm-3">
                         <div class="input-group form-float" >
                         <label class="form-label upText selectlabel">Presentation</label>
                         <select name="doppler_presentation" id="doppler_presentation" class="form-control selinve show-tick"  data-live-search="true" tabindex="-98">
                         <option value=""> &nbsp; </option>
                         <?php 

                         foreach ($bodycontent['presentation'] as $presentationrow) {  ?>
                         <option value="<?php echo $presentationrow;?>"
                         <?php if(($isDatainvestigation=='Y') && $presentationrow==$bodycontent['investigationLatestData']->doppler_presentation){echo "selected";}else{echo "";} ?>
                          ><?php echo $presentationrow;?></option>
                          <?php     } ?>                                                  
                          </select>   
                          </div>                       
                    </div> 

                    <div class="col-sm-3">
                         <div class="input-group form-float">
                         <label class="form-label upText selectlabel">AFI</label>
                         <select name="doppler_afi" id="doppler_afi" class="form-control selinve show-tick"  data-live-search="true" tabindex="-98">
                         <option value=""> &nbsp; </option>
                         <?php 
                         for ($dropafi=0; $dropafi <=30 ; $dropafi++) { 
                            ?>
                         <option value="<?php echo $dropafi;?>"
                         <?php if(($isDatainvestigation=='Y') && $dropafi==$bodycontent['investigationLatestData']->doppler_afi){echo "selected";}else{echo "";} ?>
                          ><?php echo $dropafi;?></option>
                          <?php     } ?>                                                   
                          </select>                           
                           </div>                       
                    </div> 

                    <div class="col-sm-3">
                         <div class="input-group form-float">
                         <label class="form-label upText selectlabel">Liquor</label>
                         <select name="doppler_liquor" id="doppler_liquor" class="form-control selinve show-tick"  data-live-search="true" tabindex="-98">
                         <option value=""> &nbsp; </option>
                         <?php 

                         foreach ($bodycontent['liquor'] as $liquorrow) {  ?>
                         <option value="<?php echo $liquorrow;?>"
                         <?php if(($isDatainvestigation=='Y') && $liquorrow==$bodycontent['investigationLatestData']->doppler_liquor){echo "selected";}else{echo "";} ?>
                          ><?php echo $liquorrow;?></option>
                          <?php     } ?>                                                  
                          </select>   
                          </div>                       
                    </div>


                  </div>
                    <br>
                  <div class="row clearfix formrowgap">
                  <label class="form-label">&nbsp;&nbsp;&nbsp;&nbsp;Doppler parameters </label>
                  <br>
                  <div class="col-sm-2">
                  <div class="form-group form-group"> <label class="form-label upText">&nbsp;</label>
                     <div class="input-group" >
                       
                         <input type="checkbox" name="doppler_checkbox" id="doppler_checkbox" class="filled-in chk-col-deep-purple selinve " value="Normal" 
                         <?php 
                         
                         if ($isDatainvestigation=='Y') {
                         if($bodycontent['investigationLatestData']->doppler_checkbox=='Normal'){ echo "checked";} }else{ echo "checked";}
                         ?> 
                          > <label for="doppler_checkbox">Within normal limit</label> &nbsp;&nbsp;

                        

                      </div>  
                      </div>
                  </div>

                  <div class="col-sm-2">
                          <div class="form-group form-float">
                            <div class="form-line ">
                              <input type="text" class="form-control inpinve" name="umbilical_artery_pi" id="umbilical_artery_pi" autocomplete="off" placeholder="" value="<?php
                              if($isDatainvestigation=='Y'){echo $bodycontent['investigationLatestData']->umbilical_artery_pi;}?>" onKeyUp="numericFilter(this);" >
                              <label class="form-label upText">Umbilical artery PI</label>
                            </div>
                          </div>
                  </div>

                  <div class="col-sm-2">
                          <div class="form-group form-float">
                           <div class="form-line ">
                            <input type="text" class="form-control inpinve" name="mca_pi" id="mca_pi" autocomplete="off" placeholder="" value="<?php
                             if($isDatainvestigation=='Y'){echo $bodycontent['investigationLatestData']->mca_pi;}?>" onKeyUp="numericFilter(this);" >
                            <label class="form-label upText">MCA PI</label>
                           </div>
                           </div>
                  </div>

                  <div class="col-sm-2">
                          <div class="form-group form-float">
                           <div class="form-line ">
                            <input type="text" class="form-control inpinve" name="cp_ratio" id="cp_ratio" autocomplete="off" placeholder="" value="<?php
                             if($isDatainvestigation=='Y'){echo $bodycontent['investigationLatestData']->cp_ratio;}?>" onKeyUp="numericFilter(this);" >
                            <label class="form-label upText">CP Ratio</label>
                           </div>
                          </div>
                  </div>

                  <div class="col-sm-2">
                          <div class="form-group form-float">
                            <div class="form-line ">
                              <input type="text" class="form-control inpinve" name="doppler_parameters_others" id="doppler_parameters_others" autocomplete="off" placeholder="" value="<?php
                              if($isDatainvestigation=='Y'){echo $bodycontent['investigationLatestData']->doppler_parameters_others;}?>" >
                            <label class="form-label upText">Others</label>
                            </div>
                          </div>
                  </div>

                  </div>
                  <br>

                  <div class="row clearfix formrowgap">

                  <div class="col-sm-3">
                          <div class="form-group form-float">
                           <div class="form-line ">
                            <input type="text" class="form-control inpinve" name="others_investigation" id="others_investigation" autocomplete="off" placeholder="" value="<?php
                             if($isDatainvestigation=='Y'){echo $bodycontent['investigationLatestData']->others_investigation;}?>" >
                           <label class="form-label upText">Others Investigation</label>
                           </div>
                           </div>
                  </div>

                  <div class="col-sm-3">
                      <div class="form-group form-float">
                        <div class="form-line">
                          <input type="text" class="form-control selinve datepicker2" placeholder="" name="others_investigation_date" id="others_investigation_date" autocomplete="off" value="<?php 
                          if($isDatainvestigation=='Y' && $bodycontent['investigationLatestData']->others_investigation_date!=''){
                           echo date('d-m-Y', strtotime($bodycontent['investigationLatestData']->others_investigation_date));}?>" > 
                           <label class="form-label selectlabel upText">Others Investigation Date</label>       
                        </div>
                      </div>
                  </div>
                  
                  </div>



                    <input type="hidden" name="ischangeInvestigation" id="ischangeInvestigation" value="N">    
                      <br>

               

                  <br>
                <div class="row clearfix"><!-- start of save and error row-->
              <div class="col-sm-2">
                 <button type="button" class="btn bg-deep-purple waves-effect" id="investallshowbtn">
                                  
                                    <span id="spaninvestallshow">Show All Record</span>
                                </button>
              </div>
              <div class="col-sm-6">
              <p id="antenatelmsg" class="form_error"></p>
              </div>
              <div class="col-sm-2">
                                  
                <button type="submit" class="btn bg-pink waves-effect antenatelbasicsavebtn" id="savebtn_investigation" ><?php echo $bodycontent['antenantalbtnText']; ?></button> 

                <span class="btn bg-pink waves-effect loaderbtn" id="loaderbtn" style="display:none;"> <?php echo $bodycontent['antenantalbtnTextLoader']; ?></span>
                                         
              </div>
              </div><!-- start of save and error row-->


                <div id="investdataall" style="padding: 0px;display: none;" >
                  <!-- -----------------------xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx------------------- -->


                   <div class="table-responsive customeTblDesign1">
                               
                                    <table id="investallTable" class="table table-bordered table-striped dataTables display dataTblDetailCls datatbl_style"  style="border-collapse: collapse !important;width: 100%">
                                    <thead>
                                        <th style="width: 3%"></th>
                                        <th style="display: none;"> Clinic Id</th>
                                        <th>Investigation Entry</th>
                                        <th>Hb(gm/dl)</th>
                                        <th>TC</th>
                                        <th>DC</th>
                                        <th>FBS</th>
                                        <th>PPBS</th>
                                        
                                       
                                      
                                    </thead>
                                   
                                    <tbody>
                                        
   
                                        
                                      <?php
                                        $i = 1;
                                      foreach ($bodycontent['investigationAllData'] as $key => $investigationrow) 
                                      {

                      
                                      ?>  
                            <tr id="row_<?php echo $i;?>">
                              <td ></td>
                               <td style="display: none;"><?php echo $investigationrow->inv_record_id;?></td>
                               <td ><?php echo date('l d M Y', strtotime($investigationrow->created_on));?></td>
                               <td><?php echo $investigationrow->hb_result;?></td>
                               <td><?php echo $investigationrow->tc_result;?></td>
                               <td><?php echo $investigationrow->dc_result;?></td>
                               <td><?php echo $investigationrow->fbs_result;?></td>
                               <td><?php echo $investigationrow->ppbs_result;?></td>
                                           
                                          
                                            
                                            
                                           
                                        </tr>
                                    <?php 
                                      $i++;
                                }?>
                                    </tbody>
                                </table>
                           
                     

                           </div>
                  <!-- -----------------------xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx------------------- -->
                  
                </div>

                </div><!-- End of investigation blocks-->

                </section>

                         
               
                           <!-- ============ end of antenantal_left_tab_menu_6_section ========= -->

                           <!-- ======= start of antenantal_left_tab_menu_7_section ============ -->
                <section class="antenantalDataSection patientBlockSection" id="antenantal_left_tab_menu_7_section">

                       <center class="headingtitile_patient"><h5 class="title_head">&#9733;  Prescription</h5></center>
                       
                       <div class="formgap prescriptionAdvice">
                     

                       <div class="row clearfix">
                       <div class="col-sm-10"> 
                          <h5><u>Advice</u>:</h5>
                        </div>
                        <div class="col-sm-2" style="float: right;"> 
                          <button type="button" class="btn btn-block btn-xs btn-danger  waves-effect reset_btn" name="resetAdvice" id="resetAdvice"><i class="material-icons">cached</i> Reset </button>
                        </div>
                       </div>
                       <!--   ^^^^^^^^^^^^^^^^^^^^^^^^^^^^ START OF ADVICE ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^  -->
                              <?php
                             $cntAdvLatestData= count($bodycontent['adviceDetailsLatestData']);

                               if($cntAdvLatestData!=0){
                                  $adviceData=$bodycontent['adviceDetailsLatestData'];
                                  $adneedsl='N';

                               }else{
                                 $adviceData=$bodycontent['adviceMasterData'];
                                 $adneedsl='Y';
                               }

                             
                              ?>
                  <div class="advice_area">

                  
                        <?php
                          
                           foreach ($adviceData as $value) {
                             
                            $advsl=1;
                            
                        ?>
                       <label class="form-label upText"><?php 
                      
                          if($value['advType']->advice_type=="I"){
                              echo 'I-General';
                          }else if($value['advType']->advice_type=="III"){
                              echo 'III-Optional';
                          }else{
                              echo $value['advType']->advice_type;
                          }
                       
                       ?>:</label>
                       <?php

                        foreach ($value['adviceList'] as $advlistrow) {


                       ?>
                       
                              <div class="row clearfix" >
                             
                              <div class="col-sm-1"></div>
                                    <div class="col-sm-10">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">    
                                                        <!-- <input type="text" class="form-control selpres" name="gen_advice[]" id="gen_advice" autocomplete="off" placeholder="" value="" >        -->
                                          <textarea   name="advice[]"  class="form-control no-resize auto-growth"  style="width:100%" autocomplete="off"
                                          ><?php if($adneedsl=='Y'){echo $advsl++.". ";}
                                          echo $advlistrow->advice;?></textarea>  
                                                      </div>
                                                    </div>
                                      </div>  
                                      
                                </div>

                                <input type="hidden" id="advice_type[]" name="advice_type[]" value="<?php echo $advlistrow->advice_type;?>">
                                <input type="hidden" id="is_advice_option[]" name="is_advice_option[]" value="<?php echo $advlistrow->is_advice_option;?>">

                           
                        <?php if($advlistrow->is_advice_option=="Y"){?>
                            <div class="row clearfix" >
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10" style="margin-bottom: 0px;">
                                  <div class="form-group demo-tagsinput-area">
                                    <div class="form-line">
                                        <input class="advoptiontag" style="overflow: hidden;" type="text" name="advice_options[]" class="form-control" data-role="tagsinput" value="<?php echo $advlistrow->advice_options;?>">
                                    </div>
                                  </div>

                                  </div>
                            </div>
                        
                        <?php }else{?>
                          <input type="hidden" class="advoptiontag" name="advice_options[]"  value="<?php echo $advlistrow->advice_options;?>">
                        <?php
                              }

                                   }
                               }
                        ?>
                   
                        

               </div><!-- end of advice div -->








                       <!--   ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^eND OF ADVICE ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^  -->


                       <br>
                       <hr>
                     <br>

                       <?php
                       if ($bodycontent['prescriptionLatestData']) {
                         $isDataprescription='Y';
                        }else{
                           $isDataprescription='N';
                        }

                      ?>
                       <div class="row clearfix">
 
              <div class="col-sm-12" >
                 <label class="form-label newMedAdd " style="text-decoration: underline;cursor: pointer;" data-callfrom="prescription"  data-toggle="modal" data-target="#prescription_newmedmodel"  data-backdrop="static" data-keyboard="false">Add New Medicine</label>
                 <!-- <button type="button" class="btn btn-default waves-effect" data-toggle="modal" data-target="#prescription_newmedmodel">Add Medicine</button> -->
                  <br>
                  

                 <div class="medicineadd_block">
                 <div class="row clearfix formrowgap" style="#border: 1px solid red;">
                 <div class="col-sm-3">
                        <div class="form-group form-float">
                            <div class="input-group">
                              <label class="form-label upText selectlabel zindex3">Medicine Category</label>
                              <select name="medicine_category" id="medicine_category" class="form-control selpres show-tick"  data-live-search="true" tabindex="-98">
                              <option value="0"> &nbsp; </option>
                              <?php 

                              foreach ($bodycontent['medicineCategoryList'] as $medicinecat) {  ?>
                              <option value="<?php echo $medicinecat->med_cat_id;?>"

                                ><?php echo $medicinecat->category;?></option>
                                <?php     } ?>
                                                        
                                </select> 
                            </div>
                        </div>
                 </div>

                        
                         <div class="col-sm-3">
                            <div class="form-group form-float">
                              <div class="input-group" id="prescription_medicineerr">
                              <label class="form-label upText selectlabel" style="z-index:100;">Medicine</label>
                              <div id="prescription_medicinedrp">
                              <select name="prescription_medicine" id="prescription_medicine" class="form-control selpres show-tick"  data-live-search="true" tabindex="-98">
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

                        <div class="col-sm-6">
                          <div class="form-group form-float">
                           <div class="form-line ">
                            <input type="text" class="form-control selpres" name="medinstruction" id="medinstruction" autocomplete="off" placeholder="" value="" style="font-size:11px;">
                            <label class="form-label upText">Instruction</label>
                           </div>
                           </div>
                           
                      </div>
                      </div>

                      <div class="row clearfix" style="#border: 1px solid red;">
                        <div class="col-sm-3">
                          <div class="form-group form-float">
                          <div class="input-group">
                            <label class="form-label upText selectlabel zindex3">Dosage</label>
                            <select name="pres_medicine_dosage" id="pres_medicine_dosage" class="form-control selpres show-tick"  data-live-search="true" tabindex="-98">
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

                        <div class="col-sm-3">

                          <div class="form-group form-float">
                            <div class="input-group " >
                              <label class="form-label upText selectlabel zindex3">Frequency</label>
                              <select name="pres_medicine_frequency" id="pres_medicine_frequency" class="form-control selpres show-tick"  data-live-search="true" tabindex="-98">
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



                      <div class="col-sm-3">
                          <div class="form-group form-float">
                            <div class="form-line ">
                              <input type="text" class="form-control selpres" name="pres_medicine_days" id="pres_medicine_days" autocomplete="off" placeholder="" value="" >
                              <label class="form-label upText">Days</label>
                            </div>
                          </div>
                      </div>

                     

                      <div class="col-sm-2">
                          <div class="form-group">
                            <!-- <label class="form-label upText">Action</label> -->
                           <div class="icon-button-demo">
                            <button type="button" class="btn btn-xs bg-light-green darkthmButton" id="addPresMedicine">
                              <span class="glyphicon glyphicon-plus" style="margin-top: 0px;"></span> Add
                            </button>

                              
                           </div>
                           </div>
                      </div>
                          
                  </div>
                </div>

                <br>
                  <!-- 333333333333333333333333333333333333333333333333333-->
                     <div id="detail_presmed" class="customeTblDesign1">
                    <div class="table-responsive" >
                           <?php
                          $presmedrow=0;
                          $detailPresMedCount = 0;
                          if($isDataprescription=='Y')
                          {
                           $detailPresMedCount = sizeof($bodycontent['prescriptionMedicineList']);
                          }

                          // For Table style Purpose
                          if($isDataprescription=='Y' && $detailPresMedCount>0)
                          {
                            $style_varmed = "display:block;width:100%;";
                          }
                          else
                          {
                            $style_varmed = "display:none;width:100%;";
                          }
                        ?>

                    
                    <table  class="table  no-footer display" id="pres_med_table" style="<?php echo $style_varmed; ?>" >
                        <thead>
                          <tr>
                          <th style="width:10%">Category</th>
                          <th style="width:10%">Medicine</th>
                          <th style="width:45%;text-align: center;">Instruction</th>
                          <th style="width:5%;text-align: center;">Dos.</th>
                          <th style="width:5%;text-align: center;">Freq.</th>
                          <th style="width:5%;text-align: center;">Days</th>
                         
                          <th style="width:5%;align: right;">&nbsp;</th>
                        </tr>
                  
                        </thead>
                        <tbody>
                            <?php

                            foreach ($bodycontent['prescriptionMedicineList'] as $key => $prescriptionmedicine) {?>

                           <tr id="rowPrescriptionMedicine_<?php echo $presmedrow; ?>" >

                          
         <td  class="presmedTd"> 
                    
                   <?php echo $prescriptionmedicine->category;?>       
                      
          </td>

           <td  class="presmedTd"> 
                   <input type="hidden" name="presMedID[]" id="presMedID_<?php echo $presmedrow; ?>" value="<?php echo $prescriptionmedicine->medicine_id;?>">   
                   <?php echo $prescriptionmedicine->medicine_name;?>       
                      
            </td>

            <td  class="presmedTd"> 
             
             <input type="hidden" name="presInstruction[]" id="presInstruction_<?php echo $rowno; ?>" value="<?php echo $prescriptionmedicine->med_instruction;?>">   
             <?php echo $prescriptionmedicine->med_instruction;?>               
      
             </td>
            
            <td class="presmedTd" style="text-align: center;"> 
             
               <input type="hidden" name="presdosage[]" id="presdosage_<?php echo $presmedrow; ?>" value="<?php echo $prescriptionmedicine->dosage;?>">   
                   <?php echo $prescriptionmedicine->dosage;?>                

            </td> 
                            <td style="text-align: center;" class="presmedTd"> 
                          
                            <input type="hidden" name="presfrequency[]" id="presfrequency_<?php echo $presmedrow; ?>" value="<?php echo $prescriptionmedicine->frequency;?>">   
                                <?php echo $prescriptionmedicine->frequency;?>                

                            </td> 
                            <td style="text-align: center;" class="presmedTd"> 
                            
                              <input type="hidden" name="presdays[]" id="presdays_<?php echo $presmedrow; ?>" value="<?php echo $prescriptionmedicine->days;?>">   
                                  <?php echo $prescriptionmedicine->days;?>                

                            </td>

           

                          <td style="vertical-align: middle;text-align: center;" class="presmedTd">
                              <a href="javascript:;" class="delPresMed" id="delDocRow_<?php echo $presmedrow; ?>" title="Delete">
                                  <i class="material-icons thmdarkTxtcolor">delete</i>
                              </a>
                          </td>
                            
                           </tr>
                            <?php
                            $presmedrow++;
                            }

                            ?>

                            <input type="hidden" name="presmedrow" id="presmedrow" value="<?php echo $presmedrow;?>">      
                    
                        </tbody>
                    </table>
                        
                    </div>
                  
                    
                  </div>
                   <!-- end of detail_timeslot -->
                  <!-- 333333333333333333333333333333333333333333333333333-->
                      </div>
                      </div>
                      

                      <!-- creted for panel investigation 23-09-2019 by anil -->
                         
                         <div class="row clearfix">

                          <div class="col-sm-5">

                          <div class="form-group form-float">
                              <div class="input-group" id="prescription_investigationerr">
                                  <label class="form-label selectlabel" style="top:-17px !important;">Investigation Panel</label>
                                  <div id="prescription_investigationpaneldrp">
                                  <select name="prescription_investigationpanel[]" id="prescription_investigationpanel" class="form-control selpres show-tick"  data-live-search="true" tabindex="-98"  multiple data-selected-text-format="count">
                                  
                                  <?php 

                                  foreach ($bodycontent['paneltestList'] as $paneltestList) {  ?>
                                  <option value="<?php echo $paneltestList->id;?>"

                                    ><?php echo $paneltestList->panel_name;?></option>
                                    <?php     } ?>
                                                            
                                    </select> 
                                    </div>
                                </div>
                          </div>
                         
                        </div>
                          <!-- <div class="col-sm-1">
                          <div class="form-group"><label class="form-label upText">Action</label>
                           <div class="icon-button-demo">
                            <button type="button" class="btn bg-purple btn-circle waves-effect waves-circle waves-float selpres" id="addPresTest">
                                    <i class="material-icons">add_circle</i>
                                </button>
                           
                           </div>
                           </div>
                         </div> -->


                        

                           <div class="col-sm-7">
                          <div class="form-group">
                            <!-- <label class="form-label upText">Action</label> -->
                           <div class="icon-button-demo">
                           <!-- create investigation panel add button 23-09-2019 -->
                            <button type="button" class="btn bg-pink waves-effect" id="addPresPanelTest">
                              <span class="glyphicon glyphicon-plus" style="margin-top: 0px;"></span>
                            </button>

                            
                           
                           </div>
                           </div>
                      </div>
                            

                          </div>

                     <div class="row clearfix">
                      <div class="col-sm-12">


                     <!--Created by anil new investigation panel 23-09-2019 -->   

                    <div id="detail_presTestpanel">
                    <div class="table-responsive" style="overflow: hidden;">
                           <?php
                          $presTestrowpanel=0;
                          $detailCountPresInv = 0;
                          
                        ?>

                    <div class="customeTblDesign1"> 
                    <table class="table  no-footer">
                        <thead>
                        
                           
                        </thead>

                        <tbody>
                      <?php
                          
                           foreach ($bodycontent['prescriptionInvestigationpanel'] as $key => $prescriptionInvestigationpanel) {
                         
                                    ?>

                                  <tr id="rowPrescriptionInvestigationpanel_<?php echo $presTestrowpanel; ?>" class="row clearfix">
                                      <td style="width: 10%;font-size: 16px;"> 
                                    <input type="hidden" class="presinvestigationIDPanelCls" name="presinvestigationPanelID[]" id="presinvestigationPanelID_<?php echo $presTestrowpanel; ?>" value="<?php echo $prescriptionInvestigationpanel->master_panel_id?>">

                                     <span><b><?php  echo $prescriptionInvestigationpanel->panel_name; ?></b></span>
                                </td>
                                <td>
                                     <textarea class="form-control no-resize auto-growth" rows="4" id="presinvestigationpanel_<?php echo $presTestrowpanel; ?>" name = "presinvestigationpanel[]"><?php  echo $prescriptionInvestigationpanel->panel_investigation_details; ?>
                                     </textarea>       
                                  </td>
                                          
                                     <td style="width: 6%;text-align: center;">
                                    
                                    <a href="javascript:;" class="delPresInvestigationpanel" id="delDocRow_<?php echo $presTestrowpanel; ?>" title="Delete">
                                        <i class="material-icons thmdarkTxtcolor" style="color: red;">delete</i>
                                         

                                      </a>
                                    </td>       
                                      
                                  
                                  </tr>  
                               
                       <?php
                               $presTestrowpanel++;   } 
                            ?>

                    <input type="hidden" name="presTestrowpanel" id="presTestrowpanel" value="<?php echo $presTestrowpanel;?>"> 

                        </tbody>
                    </table>
                    </div>
                        
                    </div>
                  
                    
                  </div>

                        
                      </div>
                       

                     </div>
                  <!-- End Investigation Panel -->

                   <div class="row clearfix">
                      
                        <div class="col-sm-6" >
                           <!-- <label class="form-label " style="text-decoration: underline;">Add Test</label> -->
                          <label class="form-label " style="text-decoration: underline;"></label>
                          <div class="row clearfix">

                          <div class="col-sm-10">

                            <!-- comment new modification for panel investigation 23-09-2019 by anil -->

                          <div class="form-group form-float">
                              <div class="input-group" id="prescription_investigationerr">
                                  <label class="form-label selectlabel" style="top:-17px !important;">Investigation</label>
                                  <div id="prescription_investigationdrp">
                                  <select name="prescription_investigation[]" id="prescription_investigation" class="form-control selpres show-tick"  data-live-search="true" tabindex="-98"  multiple data-selected-text-format="count">
                                  
                                  <?php 

                                  foreach ($bodycontent['testList'] as $testlist) {  ?>
                                  <option value="<?php echo $testlist->investigation_comp_id;?>"

                                    ><?php echo $testlist->inv_component_name;?></option>
                                    <?php     } ?>
                                                            
                                    </select> 
                                    </div>
                                </div>
                          </div>
                        </div>

                         <div class="col-sm-2">
                          <div class="form-group">
                            <!-- <label class="form-label upText">Action</label> -->
                           <div class="icon-button-demo">
                            <!--  comment by anil 23-09-2019 -->
                            <button type="button" class="btn bg-pink waves-effect" id="addPresTest">
                              <span class="glyphicon glyphicon-plus" style="margin-top: 0px;"></span>
                            </button>
                          </div>
                        </div>
                      </div>
                      </div>
                     
                     <div class="row clearfix">
                      <div class="col-sm-12">
                      <div id="detail_presTest" >
                    <div class="table-responsive" style="overflow: hidden;">
                           <?php
                          $presTestrow=0;
                          $detailCountPresInv = 0;
                          if($isDataprescription=='Y')
                          {
                           $detailCountPresInv = sizeof($bodycontent['prescriptionInvestigationList']);
                          }

                          // For Table style Purpose
                          if($isDataprescription=='Y' && $detailCountPresInv>0)
                          {
                            $style_var_presinv = "display:block;width:100%;";
                          }
                          else
                          {
                            $style_var_presinv = "display:none;width:100%;";
                          }
                        ?>

                    <div class="customeTblDesign1"> 
                    <table class="table  no-footer" style="<?php echo $style_var_presinv; ?>">
                        <thead>
                        
                           
                        </thead>

                        <tbody>
                          <?php
                           foreach ($bodycontent['prescriptionInvestigationList'] as $key => $prescriptionInvestigation) {
                                    ?>
                        <tr id="rowPrescriptionInvestigation_<?php echo $presTestrow; ?>" class="row clearfix">

                            
                                  
                        <td style="width:90%;text-align: left;"> 
                              <input type="hidden" class="presinvestigationIDCls"  name="presinvestigationID[]" id="presinvestigationID_<?php echo $presTestrow; ?>" value="<?php echo $prescriptionInvestigation->investigation_comp_id?>">   
                              <?php echo $prescriptionInvestigation->inv_component_name;?>       
                                  
                        </td>
            
            
        
        

                        <td style="width:10%;vertical-align: middle;">
                              
                        <a href="javascript:;" class="delPresInvestigation" id="delDocRow_<?php echo $presTestrow; ?>" title="Delete">
                            <i class="material-icons thmdarkTxtcolor" >delete</i>
                            

                          </a>
                        </td> 


                                 
                           </tr>
                             <?php
                               $presTestrow++;   }
                            ?>

                    <input type="hidden" name="presTestrow" id="presTestrow" value="<?php echo $presTestrow;?>">      
                    
                        </tbody>
                    </table>
                    </div>
                        
                    </div>
                  
                    
                  </div>
                </div>
              </div>

                        
                  
                     



                   <!-- end of detail_timeslot -->
                  <!-- 333333333333333333333333333333333333333333333333333-->
                    
                        </div>



                     </div>

                    <div class="row clearfix">
                        <div class="col-sm-8">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <textarea rows="1" name="doctor_note" id="doctor_note" class="form-control no-resize auto-growth selpres"  style="overflow: hidden; overflow-wrap: break-word; height: 32px;" autocomplete="off"
                                                      ><?php if($isDataprescription=='Y'){echo $bodycontent['prescriptionLatestData']->doctor_note;
                                                    }?></textarea>
                                                    <label class="form-label">Note</label>
                                                </div>
                                            </div>
                           </div>

                   <div class="col-sm-3">
                      <div class="form-group form-float">
                     
                      <div class="form-line">

                        <input type="text" class="form-control selpres datepicker2" placeholder="Next Checkup Date" name="next_checkup_date" id="next_checkup_date" autocomplete="off" value=""  >  
                           <label class="form-label">Next Checkup Date</label>      
                         </div>
                         </div>
                  </div>
 
                   
                   </div>
           <input type="hidden" name="ischangePrescription" id="ischangePrescription" value="N">
                      <br>
                <div class="row clearfix"><!-- start of save and error row-->
              <div class="col-sm-2">
                 <button type="button" class="btn bg-deep-purple waves-effect" id="prescallshowbtn">
                                  
                                    <span id="spanprescriptionallshow">Show All Record</span>
                                </button>
              </div>
              <div class="col-sm-6">
              <p id="antenatelmsg" class="form_error"></p>
              </div>
              <div class="col-sm-2">
                                  
                <button type="submit" class="btn bg-pink waves-effect antenatelbasicsavebtn" id="savebtn_prescription" ><?php echo $bodycontent['antenantalbtnText']; ?></button> 

                <span class="btn bg-pink waves-effect loaderbtn" id="loaderbtn" style="display:none;"> <?php echo $bodycontent['antenantalbtnTextLoader']; ?></span>
                                         
              </div>
              </div><!-- start of save and error row-->

                 <div id="presdataall" class="customeTblDesign1" style="padding: 0px;display: none;">
                  <!-- -----------------------xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx------------------- -->


                   <div class="table-responsive">
                               
                                    <table id="pressallTable" class="table table-bordered table-striped dataTables display dataTblDetailCls datatbl_style"  style="border-collapse: collapse !important;width: 100%">
                                    <thead>
                                        <th style="width: 3%"></th>
                                        <th style="width: 3%;display: none;"> Clinic Id</th>
                                        <th style="width: 10%">Prescription Date</th>
                                        <th style="width: 60%">Doctor Note</th>
                                        <th style="width: 10%">Next Checkup</th>
                                         <th style="width: 10%">Print</th>
                                       
                                        
                                       
                                      
                                    </thead>
                                   
                                    <tbody>
                                        
   
                                        
                                      <?php
                                        $i = 1;
                                      foreach ($bodycontent['prescriptioAllData'] as $key => $prescriptioallrow) 
                                      {

                      
                                      ?>  
                            <tr id="row_<?php echo $i;?>">
                              <td ></td>
                               <td style="display: none;"><?php echo $prescriptioallrow->prescription_id;?></td>
                               <td ><?php echo date('l d M Y', strtotime($prescriptioallrow->created_on));?></td>
                               <td  style="width: 60%"><?php echo $prescriptioallrow->doctor_note;?></td>
                               <td><?php 
                               if ($prescriptioallrow->next_checkup_dt!='') {
                                 echo date('d-m-Y', strtotime($prescriptioallrow->next_checkup_dt));
                               }
                              
                               ?></td>
                          <td style="text-align: center;vertical-align:middle">

                              <a href="<?php echo base_url(); ?>patientcase/print_prescription/<?php echo $bodycontent['caseID']; ?>/<?php echo $prescriptioallrow->prescription_id?>" data-title="Print" target="_blank">          
                              <button type="button" class="btn bg-pink waves-effect">
                                <i class="material-icons">print</i></button> </a>
                         </td>
                              
                                           
                                          
                                            
                                            
                                           
                                        </tr>
                                    <?php 
                                      $i++;
                                }?>
                                    </tbody>
                                </table>
                           
                     

                           </div>
                  <!-- -----------------------xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx------------------- -->
                  
                </div>
 
                              </div><!-- End of advice section full block -->
                         	</section>
                
                           <!-- ============ end of antenantal_left_tab_menu_7_section ========= -->

                           <!-- ======= start of antenantal_left_tab_menu_8_section ============ -->
                            <section class="antenantalDataSection patientBlockSection" id="antenantal_left_tab_menu_8_section">

                              <center class="headingtitile_patient">
                                <h5 class="title_head">&#9733; Print</h5>
                              </center>

       

                         <!-- <button type="button" class="btn bg-deep-purple waves-effect prescriptionprint" target="_blank">
                                  
                                   Print Prescription
                                </button>   -->
                                <div class="formgap">
                                        
                                    <!-- <button type="button" class="btn bg-deep-purple waves-effect">
                                      <i class="material-icons">print</i>&nbsp;Print Prescription
                                    </button>  -->


                                  
                                    <div class="dropzone dz-clickable">
                                        <div class="dz-message">
                                            <a href="<?php echo base_url(); ?>patientcase/print_prescription/<?php echo $bodycontent['caseID']; ?>" data-title="Print" target="_blank">  
                                                <div class="drag-icon-cph">
                                                    <i class="material-icons">print</i>
                                                </div>
                                                <h3>Click to print prescription.</h3>
                                            </a>
                                        </div>
                                    </div>
                            

                            
















                                </div>

                                

                         	</section>
               
                           <!-- ============ end of antenantal_left_tab_menu_8_section ========= -->

                           <!-- ======= start of antenantal_left_tab_menu_9_section ============ -->
                            <section class="antenantalDataSection patientBlockSection " id="antenantal_left_tab_menu_9_section">
                            <center class="headingtitile_patient"><h5 class="title_head">&#9733; Clinical Examination</h5></center>
                            <br>

                            <div class="row clearfix">
                                <div class="col-sm-3">
                                  <button type="button" class="btn btn-sm btn-warning addClicinalExam darkthmButton">
                                    <span class="glyphicon glyphicon-plus" style="margin-top: 0px;"></span> Add Details
                                  </button>
                                </div>
                                         <!-- <div class="col-sm-6">
                                          <center><h4>  Clinical Examination</h4></center>
                                         </div> -->
                            </div>


                        <!-- -------------------------- clinical Details-------------------------- -->


           
                            <div class="row clearfix formgap">
                                      
                                      <!-- <div class="col-sm-2"></div> -->
                         
                                      <div class="col-sm-12">
                                       <div   class="customeTblDesign1 clinicalTableDesign" style="#border: 1px solid #e49e9e;">
                                             <div class="table-responsive" id="detail_clinical_exam" style="min-height: 450px;">
                                                    <?php
                                                   $cliexmrowno=0;
                                                   $detailCountClinical = 0;
                                                   if($bodycontent['antenantalmode']=="EDIT")
                                                   {
                                                    $detailCountClinical = sizeof($bodycontent['clinicalExaminationData']);
                                                  
                                                   }
                         
                                                   // For Table style Purpose
                                                   if($bodycontent['antenantalmode']=="EDIT" && $detailCountClinical>0)
                                                   {
                                                     $style_var = "display:block;width:100%;";
                                                   }
                                                   else
                                                   {
                                                     $style_var = "display:none;width:100%;";
                                                   }
                                                 ?>
                         
                                        
                                             
                         
                                                     <?php
                         
                                         if($detailCountClinical>0)
                                         {
                                           foreach ($bodycontent['clinicalExaminationData'] as $key => $value) 
                                           {
                                             $cliexmrowno++;
                                             
                                         ?>

                                          <div id="rowClinicalExam_<?php echo $cliexmrowno; ?>" class="row clearfix" > 

                                         <table class="table  no-footer" class="gridtable" style="<?php echo $style_var; ?> font-size: 10px;">
                                                 <thead>
                                                    
                                                 </thead>
                                                 <tbody>
                                         
                                    <tr >
                         
                                    <td style="width: 10%;"> 
                                          <label>Date</label>
                                          <div class="input-group " >
                                          
                                          <div class="form-line">
                                            <input type="text" name="examination_date[]" id="examination_date_<?php echo $cliexmrowno; ?>" class="form-control datepicker2 cliexmDate" style="margin-top: 5px;" value="<?php 
                                          if($value->examination_date!=''){
                                          echo date('d-m-Y', strtotime($value->examination_date));} ?>"  >
                                            </div>
                                            </div>
                                                                  
                                </td>
                                <td> 
                                 <label>LMP(Weeks)</label>
                                  <div class="input-group weeks_by_lmperr" id="weeks_by_lmperr_<?php echo $cliexmrowno; ?>">
                                    <div class="form-line">
                                      <input type="text" name="weeks_by_lmp[]" id="weeks_by_lmp_<?php echo $cliexmrowno; ?>" class="form-control" placeholder="" style="margin-top: 5px;" readonly value="<?php echo $value->weeks_by_lmp; ?>" >
                                    </div>
                                  </div>
                                      
                                </td>
     <td> 
               <label>LMP(Days)</label>
               <div class="input-group days_by_lmperr" id="days_by_lmperr_<?php echo $cliexmrowno; ?>">
              
               <div class="form-line">
                <input type="text" name="days_by_lmp[]" id="days_by_lmp_<?php echo $cliexmrowno; ?>" class="form-control" placeholder="" style="margin-top: 5px;" readonly value="<?php echo $value->days_by_lmp; ?>" >
                 </div>
                </div>
                                      
     </td>



     <td> 
               <label>USG(Weeks)</label>
               <div class="input-group weeks_by_usgerr" id="weeks_by_usgerr_<?php echo $cliexmrowno; ?>">
              
               <div class="form-line">
                <input type="text" name="weeks_by_usg[]" id="weeks_by_usg_<?php echo $cliexmrowno; ?>" class="form-control" placeholder="" style="margin-top: 5px;" readonly value="<?php echo $value->weeks_by_usg; ?>" >
                 </div>
                </div>
                                      
     </td>
     <td> 
               <label>USG(Days)</label>
               <div class="input-group days_by_usgerr" id="days_by_usgerr_<?php echo $cliexmrowno; ?>">
              
               <div class="form-line">
                <input type="text" name="days_by_usg[]" id="days_by_usg_<?php echo $cliexmrowno; ?>" class="form-control" placeholder="" style="margin-top: 5px;" readonly value="<?php echo $value->days_by_usg; ?>" >
                 </div>
                </div>
                                      
     </td>



     <td> 
               <label>Weight</label>
               <div class="input-group cliexm_weighterr" id="cliexm_weighterr_<?php echo $cliexmrowno; ?>">
              
               <div class="form-line">
                <input type="text" name="cliexm_weight[]" id="cliexm_weight_<?php echo $cliexmrowno; ?>" class="form-control" placeholder="" style="margin-top: 5px;"  value="<?php echo $value->cliexm_weight; ?>" >
                 </div>
                </div>
                                      
     </td>

     <td> 
               <label>BP(S)</label>
               <div class="input-group " id="cliexm_bp_serr_<?php echo $cliexmrowno; ?>">
              
               <div class="form-line">
                <input type="text" name="cliexm_bp_s[]" id="cliexm_bp_s_<?php echo $cliexmrowno; ?>" class="form-control" placeholder="" style="margin-top: 5px;" value="<?php echo $value->cliexm_bp_s; ?>" onKeyUp="numericFilter(this);">
                 </div>
                </div>
                                      
     </td>

     <td> 
               <label>BP(D)</label>
               <div class="input-group " id="cliexm_bp_derr_<?php echo $cliexmrowno; ?>">
              
               <div class="form-line">
                <input type="text" name="cliexm_bp_d[]" id="cliexm_bp_d_<?php echo $cliexmrowno; ?>" class="form-control" placeholder="" style="margin-top: 5px;" value="<?php echo $value->cliexm_bp_d; ?>" onKeyUp="numericFilter(this);">
                 </div>
                </div>
                                      
     </td>
     <td></td>
      </tr>
   
     <tr style="border-bottom: 0px solid #ff9600;">

     <td> 
               <label>Pallor</label>
               <select name="cliexm_pallor[]" id="cliexm_pallor_<?php echo $cliexmrowno; ?>" class="form-control"   data-live-search="true" tabindex="-98" placeholder="test"
                    >              <option value="">&nbsp;</option>
                                  <?php
                                      foreach ($bodycontent['pallor'] as $pallor) { 
                                   ?>
                                     <option value="<?php echo $pallor;?>" <?php if($value->cliexm_pallor==$pallor){ echo "selected";}?>
                                      ><?php echo $pallor;?></option>
                                   <?php
                                    }
                                   ?>
                               </select>  
                                      
     </td>

     <td> 
               <label>Oedema</label>
               <select name="cliexm_oedema[]" id="cliexm_oedema_<?php echo $cliexmrowno; ?>" class="form-control"   data-live-search="true" tabindex="-98" placeholder="test"
                    >              <option value="">&nbsp;</option>
                                  <?php
                                      foreach ($bodycontent['oedema'] as $oedema) { 
                                   ?>
                                     <option value="<?php echo $oedema;?>"
                                     <?php if($value->cliexm_oedema==$oedema){ echo "selected";}?>
                                      ><?php echo $oedema;?></option>
                                   <?php
                                    }
                                   ?>
                               </select> 
                                      
     </td>

     <td style="width: 11%;"> 
              <div class="input-group " id="fundal_heighterr_<?php echo $cliexmrowno; ?>">
              <label>Fundal Height</label>
                               <select name="fundal_height[]" id="fundal_height_<?php echo $cliexmrowno; ?>" class="form-control show-tick  selectYear" data-live-search="true" tabindex="-98">
                                <option value="">&nbsp;</option>
                                <option value="NP"   <?php if($value->fundal_height=='NP'){ echo "selected";}?>>NP</option>
                                  <?php
                                      for ($i=12; $i <= 36; $i+=2) {     
                                   ?>
                                     <option value="<?php echo $i;?>"  <?php if($value->fundal_height==$i){ echo "selected";}?> ><?php echo $i;?></option>
                                   <?php
                                    }
                                   ?>
                                
                               </select>   
                           </div>                               
            </td>

            
     <td> 
               <label>SFH(cm)</label>
               <div class="input-group " id="cliexm_sfherr_<?php echo $cliexmrowno; ?>">
              
               <div class="form-line">
                <input type="text" name="cliexm_sfh[]" id="cliexm_sfh_<?php echo $cliexmrowno; ?>" class="form-control" placeholder="" style="margin-top: 5px;" value="<?php echo $value->cliexm_sfh; ?>" >
                 </div>
                </div>
                                      
     </td>

     <td> 
               <label>FHS(/min)</label>
               <div class="input-group " id="cliexm_fsherr_<?php echo $cliexmrowno; ?>">
              
               <div class="form-line">
                <input type="text" name="cliexm_fsh[]" id="cliexm_fsh_<?php echo $cliexmrowno; ?>" class="form-control" placeholder="" style="margin-top: 5px;" value="<?php echo $value->cliexm_fsh; ?>" >
                 </div>
                </div>
                                      
     </td>

     <td style="width: 10%;"> 
               <label>Appointment</label>
               <div class="input-group " id="cliexm_appointment_dateerr_<?php echo $cliexmrowno; ?>">
              
               <div class="form-line">
                <input type="text" name="cliexm_appointment_date[]" id="cliexm_appointment_date_<?php echo $cliexmrowno; ?>" class="form-control datepicker2" placeholder="" style="margin-top: 5px;" value="<?php 
                                          if($value->cliexm_appointment_date!=''){
                                          echo date('d-m-Y', strtotime($value->cliexm_appointment_date));} ?>" >
                 </div>
                </div>
                                      
     </td>

     <td> 
               <label>After(Weeks)</label>
               <div class="input-group " id="cliexm_after_weekerr_<?php echo $cliexmrowno; ?>">
              
               <div class="form-line">
                <input type="text" name="cliexm_after_week[]" id="cliexm_after_week_<?php echo $cliexmrowno; ?>" class="form-control" placeholder="" style="margin-top: 5px;" value="<?php echo $value->cliexm_after_week; ?>" onKeyUp="numericFilter(this);">
                 </div>
                </div>
                                      
     </td>

     <td> 
               <label>After(Days)</label>
               <div class="input-group " id="cliexm_after_dayserr_<?php echo $cliexmrowno; ?>">
              
               <div class="form-line">
                <input type="text" name="cliexm_after_days[]" id="cliexm_after_days_<?php echo $cliexmrowno; ?>" class="form-control" placeholder="" style="margin-top: 5px;" value="<?php echo $value->cliexm_after_days; ?>" onKeyUp="numericFilter(this);">
                 </div>
                </div>
                                      
     </td>


					

						<td style="vertical-align: middle;">
							<?php 
                  if ($cliexmrowno!=0) {
                  
              ?> 
			          <a href="javascript:;" class="delClinicalExam" id="delDocRow_<?php echo $cliexmrowno; ?>" title="Delete">
					        <i class="material-icons thmdarkTxtcolor">delete</i>
                  <?php } ?> </a>
			      </td>				
                               
          </tr>
                  </tbody>
                                             </table>
                                             </div>  
                         
                         
                                       <?php   
                                           }
                                         }
                         
                                           ?>
                                             <input type="hidden" name="cliexmrowno" id="cliexmrowno" value="<?php echo $cliexmrowno;?>">      
                                             
                                                
                                             
                                                 
                                             </div>
                                           
                                             
                                           </div>
                         
                         
                                         </div>
                                       </div>

                    
                    
                               
                         
                         
    <!-- ------------------------------------------------------------------------------------------------------ -->

                              <br>
                                          <div class="row clearfix"><!-- start of save and error row-->
                                        <div class="col-sm-2"> </div>
                                        <div class="col-sm-6">
                                        <p id="antenatelmsg" class="form_error"></p>
                                        </div>
                                        <div class="col-sm-2">
                                                            
                                          <button type="submit" class="btn bg-pink waves-effect antenatelbasicsavebtn" id="savebtn_clinical_examination" ><?php echo $bodycontent['antenantalbtnText']; ?></button> 

                                          <span class="btn bg-pink waves-effect loaderbtn" id="loaderbtn" style="display:none;"> <?php echo $bodycontent['antenantalbtnTextLoader']; ?></span>
                                                                  
                                        </div>
                                        </div><!-- start of save and error row-->
                            <br>

                           </section>
                           
                           </form>
               
                           <!-- ============ end of antenantal_left_tab_menu_9_section ========= -->


                                    		



                                    	</div><!-- start of right side content-->
                                    	
                                    </div> <!-- end of info body -->
                                </section>

<!-- ======================================= end of antenantalbtn_section ============================================== -->











<!-- ======================================= start of preopbtn_section ============================================== -->
          <section class="treatmentsection" id="preopbtn_section">

                  <!-- <center><h3> Pre Operation Section </h3></center> -->
                  
                  <div class="dropzone dz-clickable">
                        <div class="dz-message">
                            <div class="drag-icon-cph">
                              <i class="material-icons thmTxtcolor2">pregnant_woman</i>
                            </div>
                            <h3 class="txtColorGrey">Pre Operation Section</h3>
                            <em class="txtColorGrey">(Upcoming section)</em>
                        </div>
                  </div>



          </section>

<!-- ======================================= end of preopbtn_section ============================================== -->






<!-- ======================================= start of postopbtn_section ============================================== -->
          <section class="treatmentsection" id="postopbtn_section">

          				<!-- <center><h3> Post Operation section </h3></center> -->
                  <div class="dropzone dz-clickable">
                        <div class="dz-message">
                            <div class="drag-icon-cph">
                              <i class="material-icons thmTxtcolor2">assignment_ind</i>
                            </div>
                            <h3 class="txtColorGrey">Post Operation Section</h3>
                            <em class="txtColorGrey">(Upcoming section)</em>
                        </div>
                  </div>
          </section>

<!-- ======================================= end of postopbtn_section ============================================== -->




<!-- ======================================= start of dischargebtn_section ============================================== -->
          <section class="treatmentsection" id="dischargebtn_section">

                  <!-- <center><h3> Discharge section </h3></center> -->
                  <div class="dropzone dz-clickable">
                        <div class="dz-message">
                            <div class="drag-icon-cph">
                              <i class="material-icons thmTxtcolor2">local_hotel</i>
                            </div>
                            <h3 class="txtColorGrey">Discharge Section</h3>
                            <em class="txtColorGrey">(Upcoming section)</em>
                        </div>
                  </div>

          	</section>

<!-- ======================================= end of dischargebtn_section ============================================== -->



                               
                                          
                             </div>

                   

                                     <p id="patientinfomsg" class="form_error"></p>

                               <!--      <div class="row clearfix">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="margin-left: 36%;">
                                            
                                              <button type="submit" class="btn btn-block btn-lg btn-primary waves-effect" id="complicationsavebtn"><?php echo $bodycontent['btnText']; ?></button> 

                                                 <span class="btn btn-block btn-lg btn-primary waves-effect loaderbtn" id="loaderbtn" style="display:none;"> <?php echo $bodycontent['btnTextLoader']; ?></span>
                                        </div>


                  
                                    </div> -->

                              

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>









<!--  models -->


            <!-- Small Size -->
            <div class="modal fade" id="prescription_newmedmodel" tabindex="-1" role="dialog" style="margin-top:120px;">
                <div class="modal-dialog modal-sm" role="document" data-keyboard="false" data-backdrop="static">
                    <div class="modal-content">
                    <form class="form-area" name="medicineForm" id="medicineForm">
                    <input type="hidden" name="mode" id="mode" value="ADD" />
                    <input type="hidden" name="medicineID" id="medicineID" value="0" />
                    <input type="hidden" name="medicinemodelcallfrom" id="medicinemodelcallfrom" value="" />
                        <div class="modal-header">
                            <h4 class="modal-title head_title" >Add Medicine</h4>
                        </div>
                        <div class="modal-body">
<!-- ------------------------------------------------------------------------------------------------   -->

                                <br>
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="medicinename" id="medicinename" autocomplete="off" value="" >
                                                    <label class="form-label">Medicine Name</label>
                                                </div>
                                            </div>
                                        </div>
                                   </div>

                                      
                                   <br>
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <div class="form-group form-float">
                                                <div class="input-group">
                                                <select name="medicine_category" id="medicine_category" class="form-control show-tick" data-live-search="true" tabindex="-98">
                                <option value="0"> Select Category</option>
                                 <?php 

                                 foreach ($bodycontent['medicineCategoryList'] as $value) {  ?>
                                   <option value="<?php echo $value->med_cat_id;?>"
                                        
                                      

                                        ><?php echo $value->category?></option>
                                 <?php     } ?>
                                   
                               </select> 
                                                </div>
                                            </div>
                                        </div>
                                   </div>
                                   <br>

                                   <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <div class="form-group form-float">
                                                <div class="input-group">
                                                <select name="medicine_type" id="medicine_type" class="form-control show-tick" data-live-search="true" tabindex="-98">
                               
                                 <?php 

                                 foreach ($bodycontent['medicineTypeList'] as $value) {  ?>
                                   <option value="<?php echo $value->medicine_type_id;?>"
                                    <?php if($value->medicine_type_id=='2'){echo "Selected";}?>
                                        ><?php echo $value->medicine_type?></option>
                                 <?php     } ?>
                                   
                               </select>
                                                </div>
                                            </div>
                                        </div>
                                   </div>
                                   <br>

                                   <div class="row clearfix">

                                    <div class="col-sm-12">
                                                  <div class="form-group form-float">
                                                      <div class="form-line">
                                                          <textarea rows="1" name="instruction" id="instruction" class="form-control no-resize auto-growth"  style="overflow: hidden; overflow-wrap: break-word; height: 32px;" autocomplete="off"
                                                            ></textarea>
                                                          <label class="form-label">Medicine Instruction</label>
                                                      </div>
                                                  </div>
                                              </div>

                                    </div>

                                      
                                     


<!-- ------------------------------------------------------------------------------------------------   -->
                      <br>
                        <p id="medicinemsg" class="form_error"></p>
                           
                        </div>
                       
                        
                        <div class="modal-footer">
                            <button type="button" class="btn  btn-sm btn-danger waves-effect" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn  btn-sm btn-primary waves-effect medicinesavebtn">Save</button>
                            <button type="submit" class="btn  btn-sm btn-primary waves-effect loademedicinesavebtnn"  style="display:none;">Saving..</button>
                           
                            
                        </div>
                      </form>
                    </div>
                </div>
            </div>

</div> <!-- end of patientCaseManagment -->