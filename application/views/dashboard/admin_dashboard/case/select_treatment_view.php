<?php// pre($bodycontent['DaysList']); ?>
<script src="<?php echo(base_url());?>assets/js/adm_scripts/patientcase.js"></script>

<style>
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


</style>


                        
    <section class="content mediumContainerCenter">
        <div class="container-fluid">
            <div class="row clearfix">
                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">

                        	 <div class="header">
                                <h2 class="head_title">Treatment Details
                                  <!--  <a href="<?php echo base_url(); ?>clinicsetup/" class="">
                                <button type="button" class="btn bg-deep-purple waves-effect" style="float: right;">List </button></a> -->

                                </h2>                           
                           
                            </div>
                            <div class="body">
                                <div class="demo-masked-input">
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <div class="form-group form-float demo-radio-button" id="treatment_div">
                                            	 &nbsp; 
                                            	&nbsp;<input name="treat" type="radio" class="with-gap" id="treat_1" value="Obstetrics">
                                            	<label for="treat_1">Obstetrics</label>
                                            	<input name="treat" type="radio" class="with-gap" id="treat_2" value="Gynecologic" >
                                            	<label for="treat_2">Gynecologic</label>
                                            	<input name="treat" type="radio" class="with-gap" id="treat_3" value="Infertility">
                                            	<label for="treat_3">Infertility</label>
                                              
                                            </div>
                                        </div>
                                      
                                    </div>

                               <div id="case_div">
                               <div class="row clearfix">
                       				 <div class="col-sm-3">
                       				 <button type="button" class="btn btn-block btn-lg  waves-effect tabbtn" id="newcasebtn">New Case</button> 	
                       				 </div>

                       				 <div class="col-sm-3">
                       				 <button type="button" class="btn btn-block btn-lg  waves-effect tabbtn tabtnnonclck" id="undtreatbtn">Under Treatmentt</button> 	
                       				 </div>
                       				
                       			</div>


                       		<div id="btn_tab_content">

                       		 <section class="newundertreatsec" id="newcasebtn_section"><!-- start of new case section -->

                       		 	<div class="row clearfix" id="patient_type_div" >
                                        <div class="col-sm-12">
                                          <div class="form-group form-float demo-radio-button" id="treatment_div_stage">
                                            	 &nbsp; 
                                            	<input name="patient_type" class="with-gap" type="radio"  id="patient_type_1" value="New">
                                            	<label for="patient_type_1">New Patient</label>
                                            	<input name="patient_type" class="with-gap" type="radio"  id="patient_type_2" value="Existing">
                                            	<label for="patient_type_2">Existing Patient</label>
                                            	
                                            	
                                              
                                            </div>
                                        </div>
                                      
                                    </div>


                          <div id="new_patient_div"><!-- start of new Patient new Case-->


                    
   <form class="form-area" name="newcaseForm" id="newcaseForm" >

   <input type="hidden" name="majorgroup" id="majorgroup" value="" />
   <input type="hidden" name="mode" id="mode" value="<?php echo $bodycontent['mode']; ?>" />
   <input type="hidden" name="patient_reg_type" id="patient_reg_type" value="New" />
   <input type="hidden" name="caseID" id="caseID" value="<?php echo $bodycontent['caseID']; ?>" />
                            <div class="demo-masked-input">
                             <div class="row clearfix">
                             	<div class="col-sm-2"></div>
                                        <div class="col-sm-4">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="selfmobile" id="selfmobile" autocomplete="off" value="" onKeyUp="numericFilter(this);" maxlength="10">
                                                    <label class="form-label"> Self Mobile No</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="alternate_mobile" id="alternate_mobile" autocomplete="off" value="" onKeyUp="numericFilter(this);" maxlength="10">
                                                    <label class="form-label">Husband /Guardian Mobile</label>
                                                </div>
                                            </div>
                                        </div>

                                                                 
                                                                             
                                </div>

                            <div class="row clearfix">
                             	<div class="col-sm-2"></div>
                                        <div class="col-sm-4">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="patientname" id="patientname" autocomplete="off" value="" >
                                                    <label class="form-label">Name</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="patientage" id="patientage" autocomplete="off" value="" >
                                                    <label class="form-label">Age</label>
                                                </div>
                                            </div>
                                        </div>

                                                                 
                                                                             
                            </div>

                           <div class="row clearfix">
                           	<div class="col-sm-2"></div>
                             <div class="col-sm-4">
                                <div class="form-group form-float">
                                <label class="form-label">Sex</label>
                               <select name="gender" id="gender" class="form-control show-tick" data-live-search="true" tabindex="-98">
                              
                                 <?php 

                                 foreach ($bodycontent['genderList'] as $value) {  ?>
                                   <option value="<?php echo $value->id;?>"
                                        
                                      <?php if($value->id=='2'){ echo "selected";}?>

                                        ><?php echo $value->gender?></option>
                                 <?php     } ?>
                                   
                               </select> 
                                            </div>
                                        </div>

                              <div class="col-sm-4">
                              <div class="form-group form-float">
                              <div class="input-group bloodgrpeerr" id="bloodgrpeerr">
                                   <label class="form-label">Blood Group</label> 
                               <select name="bloodgroup" id="bloodgroup" class="form-control show-tick" data-live-search="true" tabindex="-98">
                                <option value="0"> Select </option>
                                 <?php 

                                 foreach ($bodycontent['bloodGroupList'] as $value) {  ?>
                                   <option value="<?php echo $value->id;?>"
                                        
                                      

                                        ><?php echo $value->bld_group_code?></option>
                                 <?php     } ?>
                                   
                               </select>   
                           </div>  
                            </div>
                             </div>                                       
                                                                             
                        </div>



                            </div><!-- end of demo-masked-input-->

                            <div class="row clearfix">
                           	<div class="col-sm-2"></div>
                             <div class="col-sm-8">
                             <p id="caseregmsg" class="form_error"></p>
                             </div>
                             </div>

                                    <div class="row clearfix">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="margin-left: 36%;">
                                            
                                              <button type="submit" class="btn btn-block btn-lg btn-primary waves-effect" id="caseregsavebtn">Save</button> 

                                                 <span class="btn btn-block btn-lg btn-primary waves-effect loaderbtn" id="loaderbtn" style="display:none;">Saving...</span>
                                        </div>


                  
                                    </div>

                                      </form>

                             

                        
                                    	
                            </div><!-- end of new Patient new Case -->

                      <div id="existing_patient_div"><!-- start of existing patient new Case -->
                                    	existing_patient_div
                      </div><!-- end of existing patient new Case -->




                      </section><!-- end of new case section -->



                              
                             <section class="newundertreatsec" id="undtreatbtn_section"><!-- start of new under treatment section -->



                                   
                             </section><!-- start of new under treatment section -->

                             </div>


                

                             </div><!-- end of case_div -->      
                            </div><!-- end of demo-masked-input -->
                           </div><!-- end of body class -->

                            


             





                   

                               

                             

                               

                                </div>
                            </div>
                        </div>
                    </div>
        </section>
       


