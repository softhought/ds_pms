
<script src="<?php echo(base_url());?>assets/js/adm_scripts/gynccology.js"></script>
<script src="<?php echo(base_url());?>assets/js/admin.js"></script>



                               <div class="row clearfix">
                                <div class="col-sm-1 "></div>
                               <div class="col-sm-2 topcol">

                               <button type="button" class="btn btn-block btn-md  waves-effect gyntabbtn" id="gynnewcasebtn">New Case</button>  
                               </div>

                               <div class="col-sm-2 topcol">
                               <button type="button" class="btn btn-block btn-md  waves-effect gyntabbtn gyntabtnnonclck" id="gynundtreatbtn">Under Treatment</button>   
                               </div>
                              
                            </div><br>


                          <div id="btn_tab_content">

                           <section class="gynnewundertreatsec" id="gynnewcasebtn_section"><!-- start of new case section -->

                            <div class="row clearfix" id="patient_type_div" >
                              <div class="col-sm-1"></div>
                                        <div class="col-sm-10">
                                          <div class="form-group form-float demo-radio-button" id="treatment_div_stage">
                                               &nbsp; 
                                              <input name="gyn_patient_type" class="with-gap" type="radio"  id="gyn_patient_type_1" value="New">
                                              <label for="gyn_patient_type_1">New Patient</label>
                                              <input name="gyn_patient_type" class="with-gap" type="radio"  id="gyn_patient_type_2" value="Existing">
                                              <label for="gyn_patient_type_2">Old Patient</label>
                                              
                                              
                                              
                                            </div>
                                        </div>
                                      
                                    </div>


                          <div id="gyn_new_patient_div"><!-- start of new Patient new Case-->


                    
   <form class="form-area" name="gynnewcaseForm" id="gynnewcaseForm">

   <input type="hidden" name="majorgroup" id="majorgroup" value="<?php echo $majorgroup ?>" />
   <input type="hidden" name="mode" id="mode" value="<?php echo $mode; ?>" />
   <input type="hidden" name="patient_reg_type" id="patient_reg_type" value="New" />

   <input type="hidden" name="caseID" id="caseID" value="<?php echo $caseID; ?>" />
                            <div class="demo-masked-input">
                             <div class="row clearfix">
                              <div class="col-sm-2"></div>
                                        <div class="col-sm-4">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="selfmobile" id="gynselfmobile" autocomplete="off" value="" onKeyUp="numericFilter(this);" maxlength="10">
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
                                                    <input type="text" class="form-control" name="patientname" id="gynpatientname" autocomplete="off" value="" >
                                                    <label class="form-label">Name</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="patientage" id="gynpatientage" autocomplete="off" value="" >
                                                    <label class="form-label">Age</label>
                                                </div>
                                            </div>
                                        </div>

                                                                 
                                                                             
                            </div>

                           <div class="row clearfix">
                            <div class="col-sm-2"></div>
                             <div class="col-sm-4">
                                <div class="form-group form-float">
                                <label class="form-label">Gender</label>
                               <select name="gender" id="gender" class="form-control show-tick" data-live-search="true" tabindex="-98">
                              
                                 <?php 

                                 foreach ($genderList as $value) {  ?>
                                   <option value="<?php echo $value->id;?>"
                                        
                                      <?php if($value->id=='2'){ echo "selected";}?>

                                        ><?php echo $value->gender?></option>
                                 <?php     } ?>
                                   
                               </select> 
                                            </div>
                           </div>

                        <!--       <div class="col-sm-2">
                              <div class="form-group form-float">
                              <div class="input-group bloodgrpeerr" id="bloodgrpeerr">
                                   <label class="form-label">Self Blood Group</label> 
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


                              <div class="col-sm-2">
                              <div class="form-group form-float">
                              <div class="input-group bloodgrpeerr" id="husbandbloodgrpeerr">
                                   <label class="form-label">Husband Blood Group</label> 
                               <select name="husband_bloodgroup" id="husband_bloodgroup" class="form-control show-tick" data-live-search="true" tabindex="-98">
                                <option value="0"> Select </option>
                                 <?php 

                                 foreach ($bodycontent['bloodGroupList'] as $value) {  ?>
                                   <option value="<?php echo $value->id;?>"
                                        
                                      

                                        ><?php echo $value->bld_group_code?></option>
                                 <?php     } ?>
                                   
                               </select>   
                           </div>  
                            </div>
                             </div>  -->                                    
                                                                             
                        </div>

                          <div class="row clearfix">
                              <div class="col-sm-2"></div>
                           <div class="col-sm-8">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <textarea rows="1" name="address" id="address" class="form-control no-resize auto-growth"  style="overflow: hidden; overflow-wrap: break-word; height: 32px;" autocomplete="off"
                                                      ></textarea>
                                                    <label class="form-label">Address</label>
                                                </div>
                                            </div>
                                        </div>

                            </div> 



                            </div><!-- end of demo-masked-input-->

                            <div class="row clearfix">
                            <div class="col-sm-2"></div>
                             <div class="col-sm-8">
                             <p id="gyncaseregmsg" class="form_error"></p>
                             </div>
                             </div>

                                    <div class="row clearfix">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="margin-left: 36%;">
                                            
                                              <button type="submit" class="btn btn-block btn-lg btn-primary waves-effect" id="gyncaseregsavebtn">Save</button> 

                                                 <span class="btn btn-block btn-lg btn-primary waves-effect loaderbtn" id="gynloaderbtn" style="display:none;">Saving...</span>
                                        </div>


                  
                                    </div>

                                      </form>

                             

                        
                                      
                            </div><!-- end of new Patient new Case -->

     <div id="gyn_existing_patient_div"><!-- start of existing patient new Case -->
                                      <!-- existing_patient_div -->
                                      <br>

       <div class="row clearfix">
 
           <div class="col-sm-2"> </div>
           <div class="col-sm-8"> 
                 <div class="form-group form-float">
                   <div class="input-group existing_patienterr" id="gyn_existing_patienterr">
                      <label class="form-label">Mobile or Case No </label> 
                <select name="existing_patient_sel_caseno" id="gyn_existing_patient_sel_caseno" class="form-control show-tick"  data-live-search="true" tabindex="-98">
                <option value="0"> &nbsp; </option>
                <?php 

                foreach ($allCaseList as $value) {  ?>
                <option value="<?php echo $value->case_id;?>"

                 ><?php echo $value->selfmobile.' | '.$value->case_no;?></option>
                  <?php     } ?>
                                           
                 </select>   
                   </div>  
               </div>
            </div>

           

             </div>





   <form class="form-area" name="GynnewcaseExistingPatientForm" id="GynnewcaseExistingPatientForm" >

   <input type="hidden" name="majorgroup" id="majorgroup" value="<?php echo $majorgroup ?>" />
   <input type="hidden" name="mode" id="mode" value="<?php echo $mode; ?>" />
   <input type="hidden" name="patient_reg_type" id="patient_reg_type" value="Existing" />
   <input type="hidden" name="previous_case_id" id="previous_case_id" value="" />
   <input type="hidden" name="patient_id" id="patient_id" value="" />
   <input type="hidden" name="caseID" id="caseID" value="<?php echo $caseID; ?>" />
                            <div class="demo-masked-input">
                             <div class="row clearfix">
                              <div class="col-sm-2"></div>
                                        <div class="col-sm-4">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="extpselfmobile" id="gyn_extpselfmobile" autocomplete="off" value="" onKeyUp="numericFilter(this);" maxlength="10">
                                                    <label class="form-label"> Self Mobile No</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="extpalternate_mobile" id="gyn_extpalternate_mobile" autocomplete="off" value="" onKeyUp="numericFilter(this);" maxlength="10">
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
                                                    <input type="text" class="form-control" name="extppatientname" id="gyn_extppatientname" autocomplete="off" value="" >
                                                    <label class="form-label">Name</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="extppatientage" id="gyn_extppatientage" autocomplete="off" value="" >
                                                    <label class="form-label">Age</label>
                                                </div>
                                            </div>
                                        </div>

                                                                 
                                                                             
                            </div>

                           <div class="row clearfix">
                            <div class="col-sm-2"></div>
                             <div class="col-sm-4">
                                <div class="form-group form-float">
                                <label class="form-label">Gender</label>
                               <select name="extpgender" id="gynextpgender" class="form-control show-tick" data-live-search="true" tabindex="-98">
                              
                                 <?php 
                                      
                                 foreach ($genderList as $value) { 

                                  ?>

                                   <option value="<?php echo $value->id;?>"
                                        
                                      <?php if($value->id=='2'){ echo "selected";}?>

                                        ><?php echo $value->gender?></option>
                                 <?php     } ?>
                                   
                               </select> 
                                            </div>
                                        </div>

                              <!-- <div class="col-sm-2">
                              <div class="form-group form-float">
                              <div class="input-group extpbloodgrpeerr" id="gynextpbloodgrpeerr">
                                   <label class="form-label">Self Blood Group</label> 
                               <select name="extpbloodgroup" id="extpbloodgroup" class="form-control show-tick" data-live-search="true" tabindex="-98">
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


                              <div class="col-sm-2">
                              <div class="form-group form-float">
                              <div class="input-group bloodgrpeerr" id="extphusbandbloodgrpeerr">
                                   <label class="form-label">Husband Blood Group</label> 
                               <select name="extphusband_bloodgroup" id="extphusband_bloodgroup" class="form-control show-tick" data-live-search="true" tabindex="-98">
                                <option value="0"> Select </option>
                                 <?php 

                                 foreach ($bodycontent['bloodGroupList'] as $value) {  ?>
                                   <option value="<?php echo $value->id;?>"
                                        
                                      

                                        ><?php echo $value->bld_group_code?></option>
                                 <?php     } ?>
                                   
                               </select>   
                           </div>  
                            </div>
                             </div>  -->                                       
                                                                             
                        </div>


                           <div class="row clearfix">
                              <div class="col-sm-2"></div>
                           <div class="col-sm-8">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <textarea rows="1" name="extpaddress" id="gynextpaddress" class="form-control no-resize auto-growth"  style="overflow: hidden; overflow-wrap: break-word; height: 32px;" autocomplete="off"
                                                      ></textarea>
                                                    <label class="form-label">Address</label>
                                                </div>
                                            </div>
                                        </div>

                            </div> 



                            </div><!-- end of demo-masked-input-->

                            <div class="row clearfix">
                            <div class="col-sm-2"></div>
                             <div class="col-sm-8">
                             <p id="gynextpcaseregmsg" class="form_error"></p>
                             </div>
                             </div>

                                    <div class="row clearfix">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="margin-left: 36%;">
                                            
                                              <button type="submit" class="btn btn-block btn-lg btn-primary waves-effect" id="gynextpcaseregsavebtn">Save</button> 

                                                 <span class="btn btn-block btn-lg btn-primary waves-effect loaderbtn" id="gynextploaderbtn" style="display:none;">Saving...</span>
                                        </div>


                  
                                    </div>

                                      </form>








                      </div><!-- end of existing patient new Case -->




                      </section><!-- end of new case section -->



                              
        <section class="gynnewundertreatsec" id="gynundtreatbtn_section"><!-- start of new under treatment section -->
           <br>

            <form class="form-area" name="gynviewcaseDetailsForm" id="gynviewcaseDetailsForm">
           <div class="row clearfix">
 
           <div class="col-sm-2"> </div>
           <div class="col-sm-6"> 
                 <div class="form-group form-float">
                   <div class="input-group wifebloodgrpeerr" id="wifebloodgrpeerr">
                      <label class="form-label">Case No</label> 
                <select name="gyn_sel_caseno" id="gyn_sel_caseno" class="form-control show-tick"  data-live-search="true" tabindex="-98">
                <option value="0"> Select </option>
                <?php 

                foreach ($allCaseList as $value) {  ?>
                <option value="<?php echo $value->case_id;?>"

                 ><?php echo $value->case_no.' | '.$value->patientname.' | '.$value->selfmobile;?></option>
                  <?php     } ?>
                                           
                 </select>   
                   </div>  
               </div>
            </div>

           

             </div>
              <div class="row clearfix">
                 <div class="col-sm-4"> </div>
              <div class="col-sm-2 col-xs-2">
                                            
               <button type="submit" class="btn btn-block btn-lg btn-primary waves-effect" id="gyncaseviewbtn">View Details</button> 

                <span class="btn btn-block btn-lg btn-primary waves-effect loaderbtn" id="loaderbtn" style="display:none;">loading...</span>
             </div>
              </div>
              </form>
                                   
                             </section><!-- start of new under treatment section -->

                             </div>