 <script src="<?php echo(base_url());?>assets/js/adm_scripts/case_addedit.js"></script>
 <form class="form-area" name="complicationForm" id="complicationForm">
  <input type="hidden" name="mode" id="mode" value="<?php echo $bodycontent['mode']; ?>" />
   <input type="hidden" name="caseID" id="caseID" value="<?php echo $bodycontent['caseID']; ?>" />
                        
    <section class="content ">
        <div class="container-fluid">
            <div class="row clearfix">
                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2 class="head_title" id="patient_case_title">
                                	<button type="button" class="btn bg-purple btn-sm waves-effect">&nbsp;Case No : <?php echo $bodycontent['patientCaseEditdata']->case_no;?>&nbsp;&nbsp;&nbsp;</button>
                                   <!-- <a href="<?php echo base_url(); ?>Patientcase/selecttreatment" class="">
                                <button type="button" class="btn bg-deep-purple waves-effect" style="float: right;">New Case </button></a> -->

                                </h2>                           
                         
                            </div>
                            <div class="body" id="patientcase_body">
                                <div class="demo-masked-input">
   
                                    <div class="row clearfix"><!-- start of trearment stage -->
                                     <div class="col-sm-3"></div>
                                    <div class="col-sm-2">
                       				 <button type="button" class="btn btn-block btn-lg  waves-effect tabbtn" id="antenantalbtn">Antenantal</button> 	
                       				 </div>

                       				  <div class="col-sm-2">
                       				 <button type="button" class="btn btn-block btn-lg  waves-effect tabbtn tabtnnonclck" id="preopbtn">Pre op</button> 	
                       				 </div>

                       				 <div class="col-sm-2">
                       				 <button type="button" class="btn btn-block btn-lg  waves-effect tabbtn tabtnnonclck" id="postopbtn">Post op</button> 	
                       				 </div>

                       				  <div class="col-sm-2">
                       				 <button type="button" class="btn btn-block btn-lg  waves-effect tabbtn tabtnnonclck" id="dischargebtn">Discharge</button> 	
                       				 </div>
                                      
                                    </div> <!-- end of trearment stage -->


<!-- ============================================start of antenantalbtn_section=========================================== -->

                                   <section class="treatmentsection" id="antenantalbtn_section">
                                    <div class="row clearfix" style="#border: 1px solid gray;"> <!--start of info body -->

                                   <div class="col-sm-2">
                                    		
                                    <button type="button" class="btn btn-block btn-xs waves-effect tab_lf_btn" id="antenantal_left_tab_menu_1">Patient Info</button>
                                    <button type="button" class="btn btn-block btn-xs waves-effect tab_lf_btn" id="antenantal_left_tab_menu_2">Basic Record</button>
                                    <button type="button" class="btn btn-block btn-xs waves-effect tab_lf_btn" id="antenantal_left_tab_menu_3">Child Birth History</button>
                                    <button type="button" class="btn btn-block btn-xs waves-effect tab_lf_btn"  id="antenantal_left_tab_menu_4">Complication</button>
                                    <button type="button" class="btn btn-block btn-xs waves-effect tab_lf_btn"  id="antenantal_left_tab_menu_5">Obstetrics History</button>

                                     <button type="button" class="btn btn-block btn-xs waves-effect tab_lf_btn"  id="antenantal_left_tab_menu_6">Medical History</button>

                                     <button type="button" class="btn btn-block btn-xs waves-effect tab_lf_btn"  id="antenantal_left_tab_menu_7">Exmination</button>

                                      <button type="button" class="btn btn-block btn-xs waves-effect tab_lf_btn"  id="antenantal_left_tab_menu_8">Investigation Record</button>

                                      <button type="button" class="btn btn-block btn-xs waves-effect tab_lf_btn"  id="antenantal_left_tab_menu_9">Print</button>

                                    		
                                    	</div>
                                    	<!-- start of right side content-->
                                    	<div class="col-sm-10" style="border: 1px solid #eeecec;">


                            <!-- ======= start of antenantal_left_tab_menu_1_section ============ -->
                            <section class="antenantalDataSection" id="antenantal_left_tab_menu_1_section">

          			     	<center><h3 class="title_head"> Patient Info </h3></center>
          			     	<hr><br>


                          <div id="basic_patient_info_div"><!-- start of basic_patient_info_div -->


                    
   <form class="form-area" name="patientBasicForm" id="patientBasicForm" >

   <input type="hidden" name="majorgroup" id="majorgroup" value="" />
   <input type="hidden" name="mode" id="mode" value="<?php echo $bodycontent['mode']; ?>" />
  
   <input type="hidden" name="caseID" id="caseID" value="<?php echo $bodycontent['caseID']; ?>" />
   <input type="hidden" name="patientID" id="patientID" value="<?php echo $bodycontent['patientmasterEditdata']->patient_id; ?>" />
                            <div class="demo-masked-input">
                             <div class="row clearfix">
                             	<div class="col-sm-2"></div>
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
                             	<div class="col-sm-2"></div>
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

                                   	<?php if(($bodycontent['mode']=="EDIT") && $value->id==$bodycontent['patientmasterEditdata']->bloodgroup){echo "selected";}else{echo "";} ?>
                                        
                                      

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
                           
                             <div class="col-sm-6">
                             <p id="caseregmsg" class="form_error"></p>
                             </div>
                             	<div class="col-sm-2">
                           		  
                                 <button type="submit" class="btn btn-block btn-sm btn-primary waves-effect" id="patientbasicsavebtn"><?php echo $bodycontent['btnText']; ?></button> 

                                 <span class="btn btn-block btn-sm btn-primary waves-effect loaderbtn" id="loaderbtn" style="display:none;"><?php echo $bodycontent['btnTextLoader']; ?></span>
                                       
                           	</div>
                             </div>

                                   

                                      </form>

                             

                        
                                    	
                            </div><!-- end of basic_patient_info_div -->

                         	</section>
               
                           <!-- ============ end of antenantal_left_tab_menu_1_section ========= -->

                           <!-- ======= start of antenantal_left_tab_menu_2_section ============ -->
                            <section class="antenantalDataSection" id="antenantal_left_tab_menu_2_section">

          			     	<center><h3> Basic Record</h3></center>

                         	</section>
               
                           <!-- ============ end of antenantal_left_tab_menu_2_section ========= -->

                           <!-- ======= start of antenantal_left_tab_menu_3_section ============ -->
                            <section class="antenantalDataSection" id="antenantal_left_tab_menu_3_section">

          			     	<center><h3> Child Birth History</h3></center>

                         	</section>
               
                           <!-- ============ end of antenantal_left_tab_menu_3_section ========= -->

                           <!-- ======= start of antenantal_left_tab_menu_4_section ============ -->
                            <section class="antenantalDataSection" id="antenantal_left_tab_menu_4_section">

          			     	<center><h3> Complication</h3></center>

                         	</section>
               
                           <!-- ============ end of antenantal_left_tab_menu_4_section ========= -->

                           <!-- ======= start of antenantal_left_tab_menu_5_section ============ -->
                            <section class="antenantalDataSection" id="antenantal_left_tab_menu_5_section">

          			     	<center><h3> Obstetrics History</h3></center>

                         	</section>
               
                           <!-- ============ end of antenantal_left_tab_menu_5_section ========= -->

                           <!-- ======= start of antenantal_left_tab_menu_6_section ============ -->
                            <section class="antenantalDataSection" id="antenantal_left_tab_menu_6_section">

          			     	<center><h3>Medical History</h3></center>

                         	</section>
               
                           <!-- ============ end of antenantal_left_tab_menu_6_section ========= -->

                           <!-- ======= start of antenantal_left_tab_menu_7_section ============ -->
                            <section class="antenantalDataSection" id="antenantal_left_tab_menu_7_section">

          			     	<center><h3>Exmination</h3></center>

                         	</section>
               
                           <!-- ============ end of antenantal_left_tab_menu_7_section ========= -->

                           <!-- ======= start of antenantal_left_tab_menu_8_section ============ -->
                            <section class="antenantalDataSection" id="antenantal_left_tab_menu_8_section">

          			     	<center><h3>Investigation Record</h3></center>

                         	</section>
               
                           <!-- ============ end of antenantal_left_tab_menu_8_section ========= -->

                           <!-- ======= start of antenantal_left_tab_menu_9_section ============ -->
                            <section class="antenantalDataSection" id="antenantal_left_tab_menu_9_section">

          			     	<center><h3>Prescription Print</h3></center>

                         	</section>
               
                           <!-- ============ end of antenantal_left_tab_menu_9_section ========= -->


                                    		



                                    	</div><!-- start of right side content-->
                                    	
                                    </div> <!-- end of info body -->
                                </section>

<!-- ======================================= end of antenantalbtn_section ============================================== -->











<!-- ======================================= start of preopbtn_section ============================================== -->
          <section class="treatmentsection" id="preopbtn_section">

          				<center><h3> Pre Operation Section </h3></center>

          	</section>

<!-- ======================================= end of preopbtn_section ============================================== -->






<!-- ======================================= start of postopbtn_section ============================================== -->
          <section class="treatmentsection" id="postopbtn_section">

          				<center><h3> Post Operation section </h3></center>

          	</section>

<!-- ======================================= end of postopbtn_section ============================================== -->




<!-- ======================================= start of dischargebtn_section ============================================== -->
          <section class="treatmentsection" id="dischargebtn_section">

          				<center><h3> Discharge section </h3></center>

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

                                </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
