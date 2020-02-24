<script src="<?php echo(base_url());?>assets/js/admin.js"></script>  
<script src="<?php echo(base_url());?>assets/js/adm_scripts/discharge.js"></script>
 

<style>
	.labelfont{
		font-size: 16px;
	}
	.spancolor{
         color: black;
	}
</style>

  

                  <!-- <center><h3> Discharge section </h3></center> -->
                  <!-- <div class="dropzone dz-clickable">
                        <div class="dz-message">
                            <div class="drag-icon-cph">
                              <i class="material-icons thmTxtcolor2">local_hotel</i>
                            </div>
                            <h3 class="txtColorGrey">Discharge Section</h3>
                            <em class="txtColorGrey">(Upcoming section)</em>
                        </div>
                  </div> -->

<div class="row clearfix" style="#border: 1px solid gray;"> 
	  <div class="col-sm-2 leftmenuPatientCase">
                                        
                <button type="button" class="btn btn-block btn-xs waves-effect tab_lf_btn" id="discharge_left_tab_menu_1"><span><i class="material-icons">assignment_ind</i></span>&nbsp;Discharge Info</button>
                 
                  <button type="button" class="btn btn-block btn-xs waves-effect tab_lf_btn"  id="discharge_left_tab_menu_2"><span><i class="material-icons">print</i></span>&nbsp;Print</button>
                                    
                                     
         </div>

  <div class="col-sm-10 rightContentBlock" style="border: 1px solid #eeecec;">

    <form class="form-area" name="dischargeform" id="dischargeform" >                             
                                   
   <section class="antenantalDataSection dishBlockSection" id="discharge_left_tab_menu_1_section">
    <center class="headingtitile_patient"><h5 class="title_head">&#9733; Discharge Info </h5></center>
       <br>


      <div class="demo-masked-input">
                           <div class="row clearfix" style="font-size: 16px;">
                                <input type="hidden" name="caseID" id="caseID" value="<?php echo $caseID; ?>">
                             <input type="hidden" name="dischargeId" id="dischargeId" value="<?php if($mode == 'EDIT'){echo  $dischargeEditdata->id; }else {echo 0; } ?>">
                                                            
                                     <div class="col-sm-4">
                                                                               
                                    <label class="form-label labelfont">Name : </label>
                                      <span  class="spancolor"><?php echo $patientmasterEditdata->patientname; ?></span>
                                                         
                                                   </div>

                                    <div class="col-sm-2">
                                       <label class="form-label labelfont">Age : </label>
                                       <span class="spancolor"><?php echo $patientmasterEditdata->patientage; ?> </span>
                                                        
                                            </div>
                                           
                                  
                                  <!--   <div class="col-sm-2">
                                       
                                         <label class="form-label" style="font-size: 16px;">Blood Group : </label>
                                         <span style="color: #555;"><?php echo $bloodgroup; ?></span>
                                                      
                                            </div> -->       
                                                                                                           
                                       </div>

       </div>

       <div class="row clearfix">
       	<div class="col-sm-4">
       		
                                
              <label class="form-label labelfont">Date of Admission :</label>
              <span  class="spancolor"><?php if(!empty($preoperationEditdata)){ if($preoperationEditdata->preposed_operation_date != ''){ echo date('d-m-Y',strtotime($preoperationEditdata->preposed_operation_date));  } } ?></span>
                    
       	</div>
       	<div class="col-sm-3">
       		 <div class="form-group form-float">
                      <div class="form-line input-group">
                                 <input type="text" class="form-control datepicker" placeholder="select date" name="discharge_date" id="discharge_date" autocomplete="off" value="<?php if($mode == 'EDIT' && $dischargeEditdata->discharge_date != NULL){ echo date('d-m-Y',strtotime($dischargeEditdata->discharge_date)); } ?>" >
                                 <label class="form-label selectlabel">Date Of Discharge</label>
                     </div>
                  </div>
       	</div>
       </div>

       <div class="row clearfix">
       	<div class="col-sm-12">
       		<label class="form-label labelfont">
       			Diagnosis:
       		</label>

       		

       <span class="spancolor"><?php   $antenantalCaseData = $antenantalCaseEditdata;
       		 if($antenantalCaseData){ ?>
          &nbsp;G&nbsp;<sub style="font-size: 7px;"><?php echo $total_parity; ?></sub>&nbsp;P&nbsp;<sub style="font-size: 7px;"><?php echo $antenantalCaseData->parity_term_delivery.' + '.$antenantalCaseData->parity_preterm.' + '.$antenantalCaseData->parity_abortion.' + '.$antenantalCaseData->parity_issue; ?></sub>
                    &nbsp;at term pregnancy
                <?php } ?>
                 <span id="dis_preg_wks"><?php if(!empty($preoperationEditdata) && $preoperationEditdata->disterm_pregnancy_wks != ''){ echo $preoperationEditdata->disterm_pregnancy_wks.' wks '; } ?></span><span id="dis_preg_days"><?php if(!empty($preoperationEditdata) && $preoperationEditdata->disterm_pregnancy_days != ''){ echo $preoperationEditdata->disterm_pregnancy_days.' days '; } ?></span>

                 <?php if($total_cesarean != 0){ echo " with previous LUCS(".$total_cesarean.")"; } ?> 
            </span> 
       	</div>

       
       </div>
      
       

       <div class="row clearfix">
       
       	<div class="col-sm-4" style="margin-top: 8px;">
       		<label class="form-label labelfont">Management : </label><span class="spancolor"> Elective LUCS done under </span>

       	</div>



       		<div class="col-sm-2">

       		<div class="form-group form-float">
                  <div class="input-group">
                           
                          <select name="dislucs_done" id="dislucs_done" class="form-control show-tick" data-live-search="true" tabindex="-98">
                            <option value=""> &nbsp;</option>
                              <?php

                                 foreach ($lucsdoneunder as $lucsdoneunder) {  ?>
                                   <option value="<?php echo $lucsdoneunder;?>"
                                  
                                        <?php if($mode == 'EDIT' && $lucsdoneunder == $dischargeEditdata->dislucs_done){ echo  'selected'; } ?>

                                        ><?php echo $lucsdoneunder; ?></option>
                                 <?php     } ?>
                                   
                               </select> 
                    </div>
          </div>
      </div>

      	<?php  if(!empty($preoperationEditdata)){

       if($preoperationEditdata->preposed_operation_date != ''){  ?>

      <div class="col-sm-2" style="margin-top: 8px;">

       		<span class="spancolor"> on <?php echo date('d-m-Y',strtotime($preoperationEditdata->preposed_operation_date)).'.'; ?> </span>
       	</div>
       	 <?php } } ?>
       </div>
  
<br>
   <div class="row clearfix">
   	<div class="col-sm-3">
   		<label class="form-label labelfont">
   			OT Note:
   		</label>
   	</div>
   	<div class="col-sm-6">
   		<div class="form-group form-float">
                <div class="form-line">
                    <textarea rows="1" name="dis_ot_note" id="dis_ot_note" class="form-control no-resize auto-growth"  style="overflow: hidden; overflow-wrap: break-word; height: 32px;" autocomplete="off"
                      ><?php if($mode == 'EDIT'){ echo $dischargeEditdata->dis_ot_note; } ?></textarea>
                   <!--  <label class="form-label"></label> -->
                        </div>
                </div>
   	</div>
   </div>



   <div class="row clearfix">

     <?php if($doctorData->doctor_name != ''){ ?>

     <div class="col-sm-3">
     	<label class="form-label labelfont">
     		Surgeon : 
     	</label>
     	<span class="spancolor"><?php echo $doctorData->doctor_name; ?></span>
     </div>
    
   <?php } ?>

     <div class="col-sm-3">
       	<!--  <div class="form-group form-float">
                      <div class="form-line input-group">
                                 <input type="text" class="form-control" placeholder="" name="anaesthesiologist" id="anaesthesiologist" autocomplete="off" value="<?php if($mode == 'EDIT'){ echo $dischargeEditdata->anaesthesiologist; } ?>" >
                                 <label class="form-label selectlabel">Anaesthesiologist</label>
                     </div>
                  </div> -->
      
          <div class="form-group form-float">
                  <div class="input-group">
                            <label class="form-label selectlabel" style="top: -17px;">Anaesthesiologist</label>
                          <select name="anaesthesiologist" id="anaesthesiologist" class="form-control show-tick" data-live-search="true" tabindex="-98">
                            <option value=""> &nbsp;</option>
                              <?php

                                 foreach ($anaesthesiologistlist as $anaesthesiologistlist) {  ?>
                                   <option value="<?php echo $anaesthesiologistlist->id;?>"
                                  
                                        <?php if($mode == 'EDIT' && $anaesthesiologistlist->id == $dischargeEditdata->anaesthesiologist){ echo  'selected'; } ?>

                                        ><?php echo $anaesthesiologistlist->name; ?></option>
                                 <?php     } ?>
                                   
                               </select> 
                    </div>
          </div>


     	
     </div>
     <div class="col-sm-3">
       	 <!-- <div class="form-group form-float">
                      <div class="form-line input-group">
                                 <input type="text" class="form-control" placeholder="" name="paediatrician" id="paediatrician" autocomplete="off" value="<?php if($mode == 'EDIT' ){ echo $dischargeEditdata->paediatrician; } ?>" >
                                 <label class="form-label selectlabel">Paediatrician</label>
                     </div>
                  </div> -->

        <div class="form-group form-float">
                  <div class="input-group">
                            <label class="form-label selectlabel" style="top: -17px;">Paediatrician</label>
                          <select name="paediatrician" id="paediatrician" class="form-control show-tick" data-live-search="true" tabindex="-98">
                            <option value=""> &nbsp;</option>
                              <?php

                                 foreach ($paediatricianlist as $paediatricianlist) {  ?>
                                   <option value="<?php echo $paediatricianlist->id;?>"
                                  
                                        <?php if($mode == 'EDIT' && $paediatricianlist->id == $dischargeEditdata->paediatrician){ echo  'selected'; } ?>

                                        ><?php echo $paediatricianlist->name; ?></option>
                                 <?php     } ?>
                                   
                               </select> 
                    </div>
          </div>

     	
     </div>
    </div>

    <div class="row clearfix">
    	<div class="col-sm-3">
    		<label class="form-label labelfont">Baby Note :</label>
    	</div>
    	<div class="col-sm-3">
    		<label class="form-label">
    			Date : 
    		</label>
    		<?php if(!empty($preoperationEditdata)){ ?>
    		<span class="spancolor"><?php echo date('d-m-Y',strtotime($preoperationEditdata->preposed_operation_date)); ?></span>
    	<?php } ?>
    	</div>
    	<div class="col-sm-2">
    		<label class="form-label">Birth Time :</label>
    	</div>
    	<div class="col-sm-2">
    		 <div class="input-group">
                             <span class="input-group-addon">
                              <i class="material-icons">access_time</i>
                               </span>
                             <div class="form-line">
                               <input type="text" name="birth_time" id="birth_time" class="form-control timepicker2" placeholder="Ex:11:59 pm" value="<?php if($mode == 'EDIT'){ echo $dischargeEditdata->birth_time; } ?>">
                                 </div>
                    </div>
    	</div>
    	  <div class="col-sm-1">
                  <button type="button" class="btn bg-deep-purple waves-effect resetTime" data-id='birth_time' style="background-color: #9f0f6e !important;">
                                  
                                    <i class="material-icons">cached</i>
                                </button>
                </div>
    </div>

    <div class="row clearfix">
    	<div class="col-sm-3"></div>
    	<div class="col-sm-1">
    		<label class="form-label">Sex :</label>
    		
    	</div>
    	<div class="col-sm-2">
    		   <div class="form-group form-float">
                  <div class="input-group">
                        <select name="dishbaby_gender" id="dishbaby_gender" class="form-control show-tick" data-live-search="true" tabindex="-98">
                            <option value=""> &nbsp;</option>
                              <?php   
                                    $baby ='&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';

                                 foreach ($dishgenderlist as $dishgenderlist) {  

                                       
                                 	?>
                                   <option value="<?php echo $dishgenderlist->id;?>"
                                  
                                        <?php if($mode == 'EDIT' && $dishgenderlist->id == $dischargeEditdata->dishbaby_gender){ echo  'selected'; 
                                          
                                          if($dishgenderlist->gender == 'Male'){

                                          	 $baby = 'Boy';
                                          }else if($dishgenderlist->gender == 'Female'){

                                          	 $baby = 'Girl';

                                          }else if($dishgenderlist->gender == 'Other') {

                                          	$baby = 'Other';
                                          }else if($dishgenderlist->gender == 'Not Known'){

                                          	$baby = 'Not Known';
                                          }

                                        } ?>

                                        ><?php echo $dishgenderlist->gender; ?></option>
                                 <?php     } ?>
                                   
                               </select> 
                    </div>
          </div>
    	</div>
    <div class="col-sm-2">
    	<label class="form-label">
    		Birth Weight :
    	</label>
    </div>

    <div class="col-sm-2">
    	 <div class="form-group form-float">
                      <div class="form-line input-group">
                                 <input type="text" class="form-control" placeholder="" name="dish_birth_weight" id="dish_birth_weight" autocomplete="off" value="<?php if($mode == 'EDIT'){ echo $dischargeEditdata->dish_birth_weight; } ?>" onKeyUp="numericFilter(this);">
                                <!--  <label class="form-label selectlabel">Date</label> -->
                     </div>
                  </div>
    </div>

    </div>
    <br>

   

    <div class="row clearfix">
    	<div class="col-sm-1">
    		<label class="form-label labelfont">Procedure:</label>
    	</div>
    	<div class="col-sm-11" style="padding-top: 3px;">
    		<span class="spancolor"> Under all aseptic and antiseptic procedures bladder catheterized with Foley's catheter.Abdominal wall painted with betadine solution and proper draping done.Abdomen opened with Pfannenstiel incision in layers.Uterus opened over lower uterine segment by transverse incision,liquor was clear.A <span id="babygender"><?php  echo $baby;  ?></span> baby delivered by vertex.Baby cried at birth.Placenta and membranes expelled.Uterus closed in 2 layers.After securing proper haemostasis and after taking meticulous count abdomen closed in layers.Skin closed with 2-0 vicryl subcut suture.</span>
    	</div>
    </div>

    <div class="row clearfix">
    	<div class="col-sm-4">
    		<label class="form-label labelfont">Post Op Period :</label>
            <span class="spancolor">Uneventful</span>
          	</div>
    </div>
    <div class="row clearfix">
    	<div class="col-sm-4">
    		<label class="form-label labelfont">Stich Line :</label>
    		<span class="spancolor">Healthy</span>
    	</div>
    </div>
    <div class="row clearfix">
    	<div class="col-sm-12">
    		<label class="form-label labelfont">Blood Group Of Mother :</label>
    		<span class="spancolor"><?php echo $bloodgroup; ?></span>
    	</div>
    </div>




<br>
             




              <div class="row clearfix">
                                                                
                        <div class="col-sm-8 colcenter">
                                                                  
                              <button type="submit" class="btn bg-pink waves-effect dishchargebtn" ><i class="material-icons">cached</i> 
                                    <span><?php echo $btnText; ?></span>
                              </button> 
               
                               <span class="btn bg-pink waves-effect loaderbtn dischargeloaderbtn" style="display:none;"><?php echo $btnTextLoader; ?></span>
                                                                        
                                    </div>
                                                                
                               <div class="col-sm-4"></div>
              </div>



        </section>
        </form>

        <section class="antenantalDataSection dishBlockSection" id="discharge_left_tab_menu_2_section">
          <center class="headingtitile_patient"><h5 class="title_head">&#9733; Print Discharge </h5></center>
              <br>

              <div class="row clearfix">
              	<div class="col-sm-6">

              		 <div class="dropzone dz-clickable">
                                        <div class="dz-message">
                                            <a href="<?php echo base_url(); ?>discharge/print_discharge/<?php echo $caseID; ?>" data-title="Print" target="_blank">  
                                                <div class="drag-icon-cph">
                                                    <i class="material-icons">print</i>
                                                </div>
                                                <h3 style="font-size: 22px;">Click to print(Discharge)</h3>
                                            </a>
                                        </div>
                         </div>
              		
              	</div>
              	<div class="col-sm-6">

              		 <div class="dropzone dz-clickable">
                                        <div class="dz-message">
                                            <a href="<?php echo base_url(); ?>discharge/pre_print_discharge/<?php echo $caseID; ?>" data-title="Print" target="_blank">  
                                                <div class="drag-icon-cph">
                                                    <i class="material-icons">print</i>
                                                </div>
                                                <h3 style="font-size: 22px;">Click to pre print(Discharge)</h3>
                                            </a>
                                        </div>
                         </div>
              		
              	</div>
              </div>
      </section>
       
       </div>
     </div>                        



     