 <script src="<?php echo(base_url());?>assets/js/adm_scripts/case_addedit.js"></script>

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
                                    <button type="button" class="btn btn-block btn-xs waves-effect tab_lf_btn" id="antenantal_left_tab_menu_3">Previous Child Birth</button>
                                    <button type="button" class="btn btn-block btn-xs waves-effect tab_lf_btn"  id="antenantal_left_tab_menu_4">History</button>
                                   <!--  <button type="button" class="btn btn-block btn-xs waves-effect tab_lf_btn"  id="antenantal_left_tab_menu_5">Obstetrics History</button>

                                     <button type="button" class="btn btn-block btn-xs waves-effect tab_lf_btn"  id="antenantal_left_tab_menu_6">Medical History</button> -->

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
                                    
                                     	<?php if(($bodycontent['mode']=="EDIT") && $value->id==$bodycontent['patientmasterEditdata']->patientgender){echo "selected";}else{echo "";} ?>    
                                  

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

           <form class="form-area" name="antinatalBasicRecordForm" id="antinatalBasicRecordForm" >
           <input type="hidden" name="antenantalID" id="antenantalID" value="<?php echo $bodycontent['antenantalID']; ?>" />
           <input type="hidden" name="caseID" id="caseID" value="<?php echo $bodycontent['caseID']; ?>" />
           <input type="hidden" name="antenantalmode" id="antenantalmode" value="<?php echo $bodycontent['antenantalmode']; ?>" />
            <section class="antenantalDataSection" id="antenantal_left_tab_menu_2_section">

          	<center><h3 class="title_head"> Basic Record</h3></center><hr><br>

          			     

          			     	
          	  <div class="demo-masked-input"><!-- start of demo-masked-input -->
                <div class="row clearfix"><!-- start of first row -->
                                       
                <div class="col-sm-2"></div>
                <div class="col-sm-3">
	               <div class="form-group form-float">
	                 <div class="input-group wifebloodgrpeerr" id="wifebloodgrpeerr">
	                    <label class="form-label">Wife Blood Group</label> 
				        <select name="wifebloodgroup" id="wifebloodgroup" class="form-control show-tick"  data-live-search="true" tabindex="-98">
				        <option value="0"> Select </option>
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
		                     <label class="form-label">Wife Occupation</label> 
					         <select name="wifeoccupation" id="wifeoccupation" class="form-control show-tick"  data-live-search="true" tabindex="-98">
					         <option value="0"> Select </option>
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
		                     <label class="form-label">Wife Education</label> 
					         <select name="wifeeducation" id="wifeeducation" class="form-control show-tick"  data-live-search="true" tabindex="-98">
					         <option value="0"> Select </option>
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


                <div class="row clearfix"><!-- end of second row -->                     
  			    <div class="col-sm-2"></div>
  			                    <div class="col-sm-3">
	                <div class="form-group form-float">
	                   <div class="input-group husbloodgrpeerr" id="husbloodgrpeerr">
		                     <label class="form-label">Husband Blood Group</label> 
					         <select name="husbandbloodgroup" id="husbandbloodgroup" class="form-control show-tick"  data-live-search="true" tabindex="-98">
					         <option value="0"> Select </option>
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
		                     <label class="form-label">Husband Occupation</label> 
					         <select name="husbandoccupation" id="husbandoccupation" class="form-control show-tick"  data-live-search="true" tabindex="-98">
					         <option value="0"> Select </option>
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
		                     <label class="form-label">Husband Education</label> 
					         <select name="husbandeducation" id="husbandeducation" class="form-control show-tick"  data-live-search="true" tabindex="-98">
					         <option value="0"> Select </option>
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

			    <div class="row clearfix"><!-- start of third row-->
                                       
                <div class="col-sm-2"></div>

                <div class="col-sm-3">
	                <div class="form-group form-group">
	                   <div class="input-group marriedforyearerr" id="marriedforyearerr">
		                     <label class="form-label">Married For (years)</label> 
					         <select name="marriedforyear" id="marriedforyear" class="form-control show-tick"  data-live-search="true" tabindex="-98">
					         <option value="0"> Select </option>
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


                <div class="col-sm-3">
	                <div class="form-group form-group">
	                   <div class="input-group tryingforrerr" id="tryingforrerr">
		                     <label class="form-label">Trying For (years)</label> 
					         <select name="tryingfor" id="tryingfor" class="form-control show-tick"  data-live-search="true" tabindex="-98">
					         <option value="0"> Select </option>
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



	  
	            </div><!-- end of third row-->

	            <div class="row clearfix"><!-- start of fourth row-->
                                       
                <div class="col-sm-2"></div>

                <div class="col-sm-3"> 
                <label class="form-label">Any Medicine required to concieve </label> &nbsp;
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
                		   		> <label for="clomifene_checkbox">Clomiphene</label> &nbsp;&nbsp;

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

	            <div class="row clearfix"><!-- start of fifth row-->
                                       
    		    <div class="col-sm-2"></div>
    		    <div class="col-sm-3"> 
                <label class="form-label">Any Procedure required to concieve </label> &nbsp;
                </div>
                  <div class="col-sm-4">	     

                 <?php 
                		if ($bodycontent['antenantalmode']=="EDIT") {
                		$procedure_concieve_array = explode (",", $bodycontent['antenantalCaseEditdata']->procedure_concieve); 
                		}
                ?>         
	            <div class="form-group">
	                   <div class="input-group" >
		                   
		                     <input type="checkbox" name="procedure_concieve[]" id="iui_checkbox" class="filled-in chk-col-deep-purple" value="IUI" 
		                     <?php if ($bodycontent['antenantalmode']=="EDIT") {
                		  	 if(in_array("IUI" ,$procedure_concieve_array)){ echo "checked";} }?> 
                		   		> <label for="iui_checkbox">IUI</label> &nbsp;&nbsp;&nbsp;

                		   	<input type="checkbox" name="procedure_concieve[]" id="ivffet_checkbox" class="filled-in chk-col-deep-purple" value="IVF->FET" 
		                     <?php if ($bodycontent['antenantalmode']=="EDIT") {
                		  	 if(in_array("IVF->FET" ,$procedure_concieve_array)){ echo "checked";} }?> 
                		   		> <label for="ivffet_checkbox">IVF -> FET</label> &nbsp;&nbsp;&nbsp;

                		   	<input type="checkbox" name="procedure_concieve[]" id="et_checkbox" class="filled-in chk-col-deep-purple" value="ET" 
		                     <?php if ($bodycontent['antenantalmode']=="EDIT") {
                		  	 if(in_array("ET" ,$procedure_concieve_array)){ echo "checked";} }?> 
                		   		> <label for="et_checkbox">ET</label> &nbsp;&nbsp;&nbsp;
                		   		on Date
                		   	
 
	                    </div>  
	            </div>
                </div>
                <div class="col-sm-2">
                	<div class="form-group">
                	<div class="form-line input-group">
                                 <input type="text" class="datepicker"  name="procedure_date" id="procedure_date" autocomplete="off" value="<?php 
                                 if($bodycontent['antenantalmode']=="EDIT" && $bodycontent['antenantalCaseEditdata']->procedure_date!=''){
                                 echo date('l d M Y', strtotime($bodycontent['antenantalCaseEditdata']->procedure_date));}

                                 ?>" 
                                 >
                                 
                     </div>
                     </div>
                	
                </div>
	  
	            </div><!-- end of fifth row-->

             <div class="row clearfix">
                                       
             <div class="col-sm-2"></div>
             <div class="col-sm-4">
              <label class="form-label">Any Medicine taken from last Menstrual Period </label>
             </div>
             <div class="col-sm-3">
                <button type="button" class="btn btn-sm btn-warning addMensuMedicine">
                 <span class="glyphicon glyphicon-plus" style="margin-top: 0px;"></span> Add Details
                  </button>
                   </div>
    
             </div>

             <!-- -------------------------- Medicine Details-------------------------- -->


             
             <div class="row clearfix">
                                      
             <div class="col-sm-2"></div>

             <div class="col-sm-8">
              <div  id="detail_timeslot" style="#border: 1px solid #e49e9e;">
                    <div class="table-responsive">
                           <?php
                          $rowno=0;
                          $detailCount = 0;
                          if($bodycontent['mode']=="EDIT")
                          {
                           $detailCount = sizeof($bodycontent['mensuMedList']);
                          // $detailCount = 0;
                          }

                          // For Table style Purpose
                          if($bodycontent['mode']=="EDIT" && $detailCount>0)
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

            <td> 
             <div class="input-group fromToerr" >
              <div class="form-group form-float ">
                <div class="form-line" id="mensumedicineerr_<?php echo $rowno; ?>">
                    <input type="text" class="form-control mensumedicinecls" name="mensumedicine[]" id="mensumedicine_<?php echo $rowno; ?>" autocomplete="off" placeholder="Medicine" value="<?php echo $value->medicine_name;?>" >
                            
                </div>
              </div>
            </div>                        
            </td>


            <td> 
             <div class="input-group fromToerr" id="mensumedicinedurationerr_<?php echo $rowno; ?>">
              <div class="form-group form-float">
                <div class="form-line">
                    <input type="text" class="form-control" name="mensumedicineduration[]" id="mensumedicineduration_<?php echo $rowno; ?>" autocomplete="off"  placeholder="Duration" value="<?php echo $value->medicine_duration;?>" >
                              
                </div>
              </div>
            </div>                        
            </td>

        <td style="vertical-align: middle;">
            
      <a href="javascript:;" class="delMenMedicine" id="delDocRow_<?php echo $rowno; ?>" title="Delete">
          <i class="material-icons">delete</i>
            

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
                        
                    </div>
                  
                    
                  </div>


                </div>
              </div>


             <!-- ------------------------------------------------------------------------------------------------------ -->


                 <div class="row clearfix">
                                       
                 <div class="col-sm-2"></div>
                    <div class="col-sm-2">
                       <div class="form-group form-float">
                         <div class="input-group " id="cigarette_addictionerr" >
                              <label class="form-label">Cigarette Addiction</label> 
                               <select name="cigarette_addiction" id="cigarette_addiction" class="form-control show-tick" data-live-search="true" tabindex="-98">
                                <option value="0"> Select </option>
                                <option value="Yes" <?php if ($bodycontent['antenantalmode']=="EDIT" && $bodycontent['antenantalCaseEditdata']->cigarette_addiction=='Yes') { echo "Selected"; }?> > Yes</option>
                                <option value="No" <?php if ($bodycontent['antenantalmode']=="EDIT" && $bodycontent['antenantalCaseEditdata']->cigarette_addiction=='No') { echo "Selected"; }?> > No</option>
   
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

                              <input type="text" class="form-control" name="cigarette_per_day" id="cigarette_per_day" autocomplete="off" value="<?php if($bodycontent['mode']=="EDIT"){echo $bodycontent['antenantalCaseEditdata']->cigarette_per_day;}?>" >
                               <label class="form-label">Cigarette per day</label>
                              </div> 
                       </div>
                     </div>  

                     <div class="col-sm-2">
                       <div class="form-group form-float">
                         <div class="input-group " id="alcohol_addictionerr" >
                              <label class="form-label">Alcohol Addiction</label> 
                               <select name="alcohol_addiction" id="alcohol_addiction" class="form-control show-tick" data-live-search="true" tabindex="-98">
                                <option value="0"> Select </option>
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
                                <input type="text" class="form-control" name="other_addiction" id="other_addiction" autocomplete="off" value="<?php if($bodycontent['antenantalmode']=="EDIT"){echo $bodycontent['antenantalCaseEditdata']->other_addiction;}?>" >
                                   <label class="form-label">Other Addiction</label>
                                    </div>
                             </div>
                     </div> 


    
                 </div>


                <div class="row clearfix"><!-- start row of LMP -->
                                       
                 <div class="col-sm-2"></div>

                  <div class="col-sm-3">
                  <div class="form-group"> <label class="form-label">LMP Date</label>
                  <div class="form-line input-group">
                                 <input type="text" class="datepicker"  name="lmp_date" id="lmp_date" placeholder="select Date" autocomplete="off" value="<?php 
                                 if($bodycontent['antenantalmode']=="EDIT" && $bodycontent['antenantalCaseEditdata']->lmp_date!=''){
                                 echo date('l d M Y', strtotime($bodycontent['antenantalCaseEditdata']->lmp_date));}

                                 ?>" 
                                 >
                                 
                     </div>
                     </div>
                  
                </div>

                <div class="col-sm-3">
                  <div class="form-group"> <label class="form-label">EDD Date</label>
                  <div class="form-line input-group">
                                 <input type="text" class=""  name="edd_date" id="edd_date" placeholder=" Date" autocomplete="off" value="<?php 
                                 if($bodycontent['antenantalmode']=="EDIT" && $bodycontent['antenantalCaseEditdata']->edd_date!=''){
                                 echo date('l d M Y', strtotime($bodycontent['antenantalCaseEditdata']->edd_date));}

                                 ?>" readonly
                                 >
                                 
                     </div>
                     </div>
                  
                </div>

    
                </div><!-- end row of LMP -->

                <div class="row clearfix"> <!-- start of usg row -->
                                       
                <div class="col-sm-2"></div>
                      <div class="col-sm-2">
                  <div class="form-group"> <label class="form-label">EDD By USG of</label>
                  <div class="form-line input-group">
                    <input type="text"  name="edd_week" id="edd_week" placeholder="no of week" autocomplete="off" 
                    value="<?php if($bodycontent['antenantalmode']=="EDIT"){
                                 echo $bodycontent['antenantalCaseEditdata']->usg_week;} ?>" 
                                 >
                                 
                     </div>
                     
                     </div>
                  
                </div>

                  <div class="col-sm-2">
                  <div class="form-group"> <label class="form-label"></label>
                 
                      <div class="form-line input-group">

                                  <input type="text"  name="edd_days" id="edd_days" placeholder="no of day" autocomplete="off" value="<?php if($bodycontent['antenantalmode']=="EDIT"){
                                 echo $bodycontent['antenantalCaseEditdata']->usg_days;} ?>" style="margin-top: 5px;" ></div>
                     </div>
                  
                </div>





      <div class="col-sm-2">
                  <div class="form-group"> <label class="form-label">on Date</label>
                  <div class="form-line input-group">

                                 <input type="text" "  name="usg_date" id="usg_date" placeholder="select Date" autocomplete="off" value="<?php 
                                 if($bodycontent['antenantalmode']=="EDIT" && $bodycontent['antenantalCaseEditdata']->usg_date!=''){
                                 echo date('l d M Y', strtotime($bodycontent['antenantalCaseEditdata']->usg_date));}

                                 ?>" readonly
                                 >
                                 
                     </div>
                     </div>
                  
                </div>
    
                </div><!-- end of usg row -->
    
    
                   				

	            <div class="row clearfix"><!-- start of save and error row-->
	           	<div class="col-sm-2"></div>
	            <div class="col-sm-6">
	            <p id="antenatelmsg" class="form_error"></p>
	            </div>
	            <div class="col-sm-2">
	                           		  
		            <button type="submit" class="btn btn-block btn-lg btn-primary waves-effect antenatelbasicsavebtn" ><?php echo $bodycontent['antenantalbtnText']; ?></button> 

		            <span class="btn btn-block btn-lg btn-primary waves-effect loaderbtn" id="loaderbtn" style="display:none;"> <?php echo $bodycontent['antenantalbtnTextLoader']; ?></span>
	                                       
	            </div>
	            </div><!-- start of save and error row-->

                               

               </div><!-- start of demo-masked-input --> 
			  </section>
			
               
           <!-- ============ end of antenantal_left_tab_menu_2_section ========= -->





                           <!-- ======= start of antenantal_left_tab_menu_3_section ============ -->
                            <section class="antenantalDataSection" id="antenantal_left_tab_menu_3_section">

          			          	<center><h3>Previous Child Birth History</h3></center><br><hr>

                            <div class="row clearfix">          
                           <!--  <div class="col-sm-1"></div>  -->
                             <div class="col-sm-3">
                                <button type="button" class="btn btn-sm btn-warning addPreChildDtl">
                                 <span class="glyphicon glyphicon-plus" style="margin-top: 0px;"></span> Add Details
                                  </button>
                             </div>
                             </div>



      <!-- ---------------------------------- Previous Child edit  Details data -------------------------- -->


             
             <div class="row clearfix">
                                      
            <!--  <div class="col-sm-1"></div> -->

             <div class="col-sm-12">
              <div  id="detail_childHistory" style="#border: 1px solid #e49e9e;">
                    <div class="table-responsive">
                           <?php
                          $childdtlrowno=0;
                          $detailCount = 0;
                          if($bodycontent['mode']=="EDIT")
                          {
                           $detailCountchilddtl = sizeof($bodycontent['previousChildBirthList']);
                        //   $detailCountchilddtl = 0;
                          }

                          // For Table style Purpose
                          if($bodycontent['mode']=="EDIT" && $detailCountchilddtl>0)
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

                if($detailCountchilddtl>0)
                {
                  foreach ($bodycontent['previousChildBirthList'] as $key => $previouschilsrow) 
                  {
                    $childdtlrowno++;
                    
                ?>
                
           <tr id="rowChildPreviousBirth_<?php echo $childdtlrowno; ?>" class="row clearfix">

                       <td> <b>Sl.</b><label class="form-label" style="margin-top: 12px;" > <?php echo $childdtlrowno; ?>.</label></td>

           <td > 
               <b>Place</b>
               <div class="input-group birthplaceerr" id="birthplaceerr_<?php echo $childdtlrowno; ?>">
              <!--  <span class="input-group-addon"><i class="material-icons">place</i> </span> -->
               <div class="form-line">
                <input type="text" name="birthplace[]" id="birthplace_<?php echo $childdtlrowno; ?>" class="form-control" placeholder="" style="margin-top: 5px;" value="<?php echo $previouschilsrow->birthplace;?>" >
                 </div>
                </div>
                                      
          </td>

            <td> 
              <div class="input-group selectyearerr" id="selectyearerr_<?php echo $childdtlrowno; ?>">
              <label>Year</label>
                               <select name="selectYear[]" id="selectYear_<?php echo $childdtlrowno; ?>" class="form-control show-tick  selectYear" data-live-search="true" tabindex="-98">
                                <option value="0">&nbsp;</option>
                                  <?php
                                      for ($i=1970; $i <= date('Y'); $i++) {     
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

           <td> 
              <div class="input-group complicationerr" id="complicationerr_<?php echo $childdtlrowno; ?>">
              <label>Complication</label>
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

        <td> 
              <div class="input-group medicalproblemerr" id="medicalproblemerr_<?php echo $childdtlrowno; ?>">
              <label>Medical Problem</label>
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

           <td> 
            <?php 

            if ($previouschilsrow->is_othermedprob=='Y') {
             $disp_other_prob="display: block;";
            }else{
             $disp_other_prob="display: none;";
            }

            ?>
            <div class="input-group othersproblemerr" id="othersproblemerr_<?php echo $childdtlrowno; ?>" style="<?php echo $disp_other_prob;?>">
              <label>Others Problem</label>
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

            <td> 
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

             <td> 
               <b>Age</b>
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
                                  
                <button type="submit" class="btn btn-block btn-lg btn-primary waves-effect antenatelbasicsavebtn" ><?php echo $bodycontent['antenantalbtnText']; ?></button> 

                <span class="btn btn-block btn-lg btn-primary waves-effect loaderbtn" id="loaderbtn" style="display:none;"> <?php echo $bodycontent['antenantalbtnTextLoader']; ?></span>
                                         
              </div>
              </div><!-- start of save and error row-->


             <!-- ------------------------------------------------------------------------------------------------------ -->



           	</section>

           
               
                           <!-- ============ end of antenantal_left_tab_menu_3_section ========= -->

                           <!-- ======= start of antenantal_left_tab_menu_4_section ============ -->
                            <section class="antenantalDataSection" id="antenantal_left_tab_menu_4_section">

          			         	<center><h3> History</h3></center>



            <!-- Multiple Items To Be Open -->
   <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
         <div class="row clearfix">
             <div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
               <div class="panel-group" id="accordion_19" role="tablist" aria-multiselectable="true">
                 <div class="panel panel-col-teal">
                 <div class="panel-heading" role="tab" id="headingOne_19">
                 <h4 class="panel-title">
                  <a role="button" data-toggle="collapse" href="#collapseOne_19" aria-expanded="true" aria-controls="collapseOne_19">
                 <i class="material-icons">view_day</i>  Obstetrics History
                  </a>
                  </h4>
                 </div>
                 <div id="collapseOne_19" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_19">
                 <div class="panel-body"><!-- start of Obstetrics History body  -->

                  <div class="row clearfix">
                     <div class="col-sm-2"><label class="form-label">Parity :</label>  </div>
                     
                      <div class="col-sm-2">
                         <div class="input-group termdeliveryerr" id="termdeliveryerr">
                         <label>Termdelivery</label>
                         <select name="termdelivery" id="termdelivery" class="form-control show-tick"  data-live-search="true" tabindex="-98">
                         <option value="0"> Select </option>
                         <?php 

                         foreach ($bodycontent['OnetoTenDropDown'] as $termdelivery) {  ?>
                         <option value="<?php echo $termdelivery;?>"

                         <?php if(($bodycontent['antenantalmode']=="EDIT") && $termdelivery==$bodycontent['antenantalCaseEditdata']->parity_term_delivery){echo "selected";}else{echo "";} ?>
                                                        
                                                      

                          ><?php echo $termdelivery;?></option>
                          <?php     } ?>
                                                   
                          </select>   
                           </div>
                        
                      </div>

                       <div class="col-sm-2">
                         <div class="input-group paritypretermerr" id="paritypretermerr">
                         <label>Preterm</label>
                         <select name="paritypreterm" id="paritypreterm" class="form-control show-tick"  data-live-search="true" tabindex="-98">
                         <option value="0"> Select </option>
                         <?php 

                         foreach ($bodycontent['OnetoTenDropDown'] as $paritypretermrow) {  ?>
                         <option value="<?php echo $paritypretermrow;?>"

                         <?php if(($bodycontent['antenantalmode']=="EDIT") && $paritypretermrow==$bodycontent['antenantalCaseEditdata']->parity_preterm){echo "selected";}else{echo "";} ?>
                                                        
                                                      

                          ><?php echo $paritypretermrow;?></option>
                          <?php     } ?>
                                                   
                          </select>   
                           </div>
                        
                      </div>

                    <div class="col-sm-2">
                         <div class="input-group " id="parityabortionerr">
                         <label>Abortion</label>
                         <select name="parityabortion" id="parityabortion" class="form-control show-tick"  data-live-search="true" tabindex="-98">
                         <option value="0"> Select </option>
                         <?php 

                         foreach ($bodycontent['OnetoTenDropDown'] as $parityabortionrow) {  ?>
                         <option value="<?php echo $parityabortionrow;?>"

                         <?php if(($bodycontent['antenantalmode']=="EDIT") && $parityabortionrow==$bodycontent['antenantalCaseEditdata']->parity_abortion){echo "selected";}else{echo "";} ?>
                                                        
                                                      

                          ><?php echo $parityabortionrow;?></option>
                          <?php     } ?>
                                                   
                          </select>   
                           </div>
                        
                    </div>

                  <div class="col-sm-2">
                         <div class="input-group " id="parityissueerr">
                         <label>Issue</label>
                         <select name="parityissue" id="parityissue" class="form-control show-tick"  data-live-search="true" tabindex="-98">
                         <option value="0"> Select </option>
                         <?php 

                         foreach ($bodycontent['OnetoTenDropDown'] as $parityissuerow) {  ?>
                         <option value="<?php echo $parityissuerow;?>"

                         <?php if(($bodycontent['antenantalmode']=="EDIT") && $parityissuerow==$bodycontent['antenantalCaseEditdata']->parity_issue){echo "selected";}else{echo "";} ?>
                                                        
                                                      

                          ><?php echo $parityissuerow;?></option>
                          <?php     } ?>
                                                   
                          </select>   
                           </div>
                        
                    </div>
                                        
                                                                         
                                                                          
                   </div>

                       <div class="row clearfix">
                                       
                       <div class="col-sm-2"></div>

                       <div class="col-sm-4">
                         <div class="form-group form-float">
                           <div class="form-line">
                            <input type="text" class="form-control" name="gravida_parity" id="gravida_parity" autocomplete="off" value="<?php if($bodycontent['antenantalmode']=="EDIT"){echo $bodycontent['antenantalCaseEditdata']->gravida_parity;}?>" >
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
                 <i class="material-icons">view_day</i> Menstrual Cycle </a> </h4>
                </div>
                 <div id="collapseTwo_19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_19">
                 <div class="panel-body"><!-- start of menstrual_cycle body  -->

                 <div class="row clearfix">
                                       
                  <div class="col-sm-2"></div>

                    <div class="col-sm-2">

                       <div class="input-group " id="menstrual_cycle_typeerr">
                         <label>Cycle Type</label>
                         <select name="menstrual_cycle_type" id="menstrual_cycle_type" class="form-control show-tick"  data-live-search="true" tabindex="-98">
                         <option value="0"> Select </option>
                         <?php 

                         foreach ($bodycontent['menstrualCycleType'] as $cycletyperow) {  ?>
                         <option value="<?php echo $cycletyperow;?>"

                         <?php if(($bodycontent['antenantalmode']=="EDIT") && $cycletyperow==$bodycontent['antenantalCaseEditdata']->menstrual_cycle_type){echo "selected";}else{echo "";} ?>
                                                        
                                                      

                          ><?php echo $cycletyperow;?></option>
                          <?php     } ?>
                                                   
                          </select>   
                           </div>
                      
                    </div>

                        <div class="col-sm-2">

                       <div class="input-group " id="menstrual_floweerr">
                         <label>Flow</label>
                         <select name="menstrual_flow" id="menstrual_flow" class="form-control show-tick"  data-live-search="true" tabindex="-98">
                         <option value="0"> Select </option>
                         <?php 

                         foreach ($bodycontent['menstrualCycleFlow'] as $flowrow) {  ?>
                         <option value="<?php echo $flowrow;?>"

                         <?php if(($bodycontent['antenantalmode']=="EDIT") && $flowrow==$bodycontent['antenantalCaseEditdata']->menstrual_flow){echo "selected";}else{echo "";} ?>
                                                        
                                                      

                          ><?php echo $flowrow;?></option>
                          <?php     } ?>
                                                   
                          </select>   
                           </div>
                      
                    </div>

                    <div class="col-sm-2">
                         <div class="form-group form-float">
                           <div class="form-line">
                            <input type="text" class="form-control inpsamelevel" name="menstrual_duration_days" id="menstrual_duration_days" autocomplete="off" value="<?php if($bodycontent['antenantalmode']=="EDIT"){echo $bodycontent['antenantalCaseEditdata']->menstrual_duration_days;}?>" >
                               <label class="form-label">Duration Days</label>
                            </div>
                          </div>
                     </div>

                      <div class="col-sm-2">
                         <div class="form-group form-float">
                           <div class="form-line">
                            <input type="text" class="form-control inpsamelevel" name="menstrual_cycle_days" id="menstrual_cycle_days" autocomplete="off" value="<?php if($bodycontent['antenantalmode']=="EDIT"){echo $bodycontent['antenantalCaseEditdata']->menstrual_cycle_days;}?>" >
                               <label class="form-label">Cycle Days</label>
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
               <i class="material-icons">view_day</i> Medical History   </a> </h4>
           </div>
          <div id="collapseThree_19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree_19">
            <div class="panel-body"><!-- start of medical history body -->

            <div class="row clearfix">
                                       
             <div class="col-sm-2"></div>

              <div class="col-sm-3">

                       <div class="input-group " id="sel_diseaseserr">
                         <label>Diseases</label>
                         <select name="sel_diseases" id="sel_diseases" class="form-control show-tick sel_diseases"  data-live-search="true" tabindex="-98" multiple data-selected-text-format="count" >
                         <option value="0"> Select </option>
                         <?php 

                         foreach ($bodycontent['diseasesList'] as $diseaseslist) {  ?>
                         <option value="<?php echo $diseaseslist->diseases_id;?>"

                          <?php

                              $selected_diseases=explode(",",(string)$bodycontent['antenantalCaseEditdata']->diseases_ids);
                                     if (in_array($diseaseslist->diseases_id, $selected_diseases)) {
                                          echo 'selected';
                                      }

                           ?>
                                                        
                                                      

                          ><?php echo $diseaseslist->diseases_name;?></option>
                          <?php     } ?>
                                                   
                          </select> 

                           <input type="hidden" name="sel_diseasesValues" id="sel_diseasesValues" value="<?php echo $bodycontent['antenantalCaseEditdata']->diseases_ids;?>">  
                            <input type="hidden" name="isOtherDiseases" id="isOtherDiseases" value="<?php  if($bodycontent['antenantalmode']=="EDIT"){echo $bodycontent['antenantalCaseEditdata']->is_other_diseases;}else{ echo "N";}?>">
                           </div>
                      
                 </div>
                 <?php

                 if(($bodycontent['antenantalmode']=="EDIT") && $bodycontent['antenantalCaseEditdata']->is_other_diseases=='Y'){$disp_oth_dis='display:block;';}else{$disp_oth_dis='display:none;';}

                 ?>

                 <div class="col-sm-2" id="other_diseases_col" style="<?php echo $disp_oth_dis;?>" >
                      <div class="input-group" >
                      <label>Others Diseases</label>
                         <div class="form-line">
                         <input type="text" class="form-control" name="other_diseases" id="other_diseases" autocomplete="off"  placeholder="Others" value="<?php echo $bodycontent['antenantalCaseEditdata']->other_diseases;?>" > 
                        </div> 
                    </div>  

                  </div>
    
            </div>

                <div class="row clearfix">
                 <div class="col-sm-2"> </div>                      
                <div class="col-sm-3"> <label style="text-decoration: underline;">Surgery Name</label> </div>
               
                <div class="col-sm-3"><label style="text-decoration: underline;">How Many Years back</label></div>
                <div class="col-sm-3">  </div>
                   </div>
    
                    <?php 

            foreach ($bodycontent['surgeryList'] as $surgerylist) {  ?>

               <input type="hidden" name="surgery_id[]"  value="<?php echo $surgerylist->surgery_id;?>"> 
            <div class="row clearfix">
                                       
             <div class="col-sm-2"></div>
             <div class="col-sm-3"><label class="txtsamelevel"><?php echo $surgerylist->surgery_name;?></label></div>
       

              <div class="col-sm-2">
                         <div class="input-group termdeliveryerr" id="termdeliveryerr">
                        <!--  <label>How Many</label> -->
                         <select name="yearback[]"  class="form-control show-tick"  data-live-search="true" tabindex="-98">
                         <option value=""> Select </option>
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
          <?php if($surgerylist->is_textfield=='Y'){ 
                   $disp_surgery_name="display: block;";
          }else{
                 $disp_surgery_name="display: none;";
          }
          ?>
            <div class="col-sm-3" style="<?php echo $disp_surgery_name;?>">
                  <div class="input-group" >
                   
                         <div class="form-line">
                         <input type="text" class="form-control" name="other_surgery_name[]"  autocomplete="off"  placeholder="Others surgery name" value="<?php echo $surgerylist->other_surgery_name;?>" > 
                        </div> 
                  </div> 
             </div>
          

    
            </div>

          <?php } ?>

              <div class="row clearfix">
                                       
              <div class="col-sm-2"></div>
               <div class="col-sm-8">
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
                    <i class="material-icons">view_day</i> Vaccination History
                                                       
                 </a>
             </h4>
            </div>
          <div id="collapseFive_19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive_19">
            <div class="panel-body"><!-- start of vaccination history body -->
              <br><br>
                  <div class="row clearfix">
                                       
                  <div class="col-sm-2"></div>
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
    


                                                    
              </div><!-- start of vaccination history body -->
             </div>
           </div>

          <div class="panel panel-col-teal">
             <div class="panel-heading" role="tab" id="headingFour_19">
              <h4 class="panel-title">
             <a class="collapsed" role="button" data-toggle="collapse" href="#collapseFour_19" aria-expanded="false" aria-controls="collapseFour_19">
               <i class="material-icons">folder_shared</i> Family History </a> </h4>
                 </div>
               <div id="collapseFour_19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour_19">
                <div class="panel-body"><!-- start of family history body -->

                        <br><br>

                  <?php
                      $famicom=1;
                        foreach ($bodycontent['familyComponentList'] as $familycomponent) {
                      ?> 
                  <div class="row clearfix">
                                       
                  <div class="col-sm-2"></div>
                  <div class="col-sm-3"><b><?php echo $familycomponent->component_name;?></b></div>
                  <div class="col-sm-2">       
  
                  <div class="form-group form-group">
                         <div class="input-group" >                   
                             <input type="checkbox" name="fatherhistory[]" id="fatherhistory_checkbox_<?php echo $famicom;?>" class="filled-in chk-col-deep-purple" value="<?php echo $familycomponent->family_component_id;?>" 
                              > <label for="fatherhistory_checkbox_<?php echo $famicom;?>">Father</label> &nbsp;&nbsp;&nbsp;&nbsp;
                              <input type="hidden" name="ischeckfather[]" id="ischeckfather_<?php echo $famicom;?>" value="N">
                          </div>  
                  </div>
               </div>
                <div class="col-sm-2">       
  
                  <div class="form-group form-group">
                         <div class="input-group" >                   
                               <input type="checkbox" name="motherhistory[]" id="motherhistory_checkbox_<?php echo $famicom;?>" class="filled-in chk-col-deep-purple" value="<?php echo $familycomponent->family_component_id;?>" 
                          
                              > <label for="motherhistory_checkbox_<?php echo $famicom;?>">Mother</label> 
                               <input type="hidden" name="ischeckmother[]" id="ischeckmother_<?php echo $famicom;?>" value="N">
                           
                          </div>  
                  </div>
               </div>
    
                 </div>

                  <?php 
                          $famicom++;
                      } ?>


                                                
                </div><!-- start of family history body -->
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
                                  
                <button type="submit" class="btn btn-block btn-lg btn-primary waves-effect antenatelbasicsavebtn" ><?php echo $bodycontent['antenantalbtnText']; ?></button> 

                <span class="btn btn-block btn-lg btn-primary waves-effect loaderbtn" id="loaderbtn" style="display:none;"> <?php echo $bodycontent['antenantalbtnTextLoader']; ?></span>
                                         
              </div>
              </div><!-- start of save and error row-->


                          </section>

                            </form>
               
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

                              

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
