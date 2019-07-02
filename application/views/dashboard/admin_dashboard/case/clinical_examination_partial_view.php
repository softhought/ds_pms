
    

		<tr id="rowClinicalExam_<?php echo $cliexmrowno; ?>" class="row clearfix" >


     <!-- <td> <b>Sl.</b><label class="form-label" style="margin-top: 12px;" > <?php echo $cliexmrowno; ?>.</label></td> -->
     <td style="width: 9%;"> 
               <b>Date</b>
               <div class="input-group examination_dateerr" id="examination_dateerr_<?php echo $cliexmrowno; ?>">
              
               <div class="form-line">
                <input type="text" name="examination_date[]" id="examination_date_<?php echo $cliexmrowno; ?>" class="form-control datepicker2 cliexmDate" placeholder="" style="margin-top: 5px;" >
                 </div>
                </div>
                                      
     </td>
     <td> 
               <b>By LMP</b>
               <div class="input-group weeks_by_lmperr" id="weeks_by_lmperr_<?php echo $cliexmrowno; ?>">
              
               <div class="form-line">
                <input type="text" name="weeks_by_lmp[]" id="weeks_by_lmp_<?php echo $cliexmrowno; ?>" class="form-control" placeholder="Weeks" style="margin-top: 5px;" >
                 </div>
                </div>
                                      
     </td>
     <td> 
               <b>By LMP</b>
               <div class="input-group days_by_lmperr" id="days_by_lmperr_<?php echo $cliexmrowno; ?>">
              
               <div class="form-line">
                <input type="text" name="days_by_lmp[]" id="days_by_lmp_<?php echo $cliexmrowno; ?>" class="form-control" placeholder="Days" style="margin-top: 5px;" >
                 </div>
                </div>
                                      
     </td>



     <td> 
               <b>By USG</b>
               <div class="input-group weeks_by_usgerr" id="weeks_by_usgerr_<?php echo $cliexmrowno; ?>">
              
               <div class="form-line">
                <input type="text" name="weeks_by_usg[]" id="weeks_by_usg_<?php echo $cliexmrowno; ?>" class="form-control" placeholder="Weeks" style="margin-top: 5px;" >
                 </div>
                </div>
                                      
     </td>
     <td> 
               <b>By USG</b>
               <div class="input-group days_by_usgerr" id="days_by_usgerr_<?php echo $cliexmrowno; ?>">
              
               <div class="form-line">
                <input type="text" name="days_by_usg[]" id="days_by_usg_<?php echo $cliexmrowno; ?>" class="form-control" placeholder="Days" style="margin-top: 5px;" >
                 </div>
                </div>
                                      
     </td>



     <td> 
               <b>Weight</b>
               <div class="input-group cliexm_weighterr" id="cliexm_weighterr_<?php echo $cliexmrowno; ?>">
              
               <div class="form-line">
                <input type="text" name="cliexm_weight[]" id="cliexm_weight_<?php echo $cliexmrowno; ?>" class="form-control" placeholder="" style="margin-top: 5px;" >
                 </div>
                </div>
                                      
     </td>

     <td> 
               <b>BP</b>
               <div class="input-group cliexm_bperr" id="cliexm_bperr_<?php echo $cliexmrowno; ?>">
              
               <div class="form-line">
                <input type="text" name="cliexm_bp[]" id="cliexm_bp_<?php echo $cliexmrowno; ?>" class="form-control" placeholder="" style="margin-top: 5px;" >
                 </div>
                </div>
                                      
     </td>

     <td> 
               <b>Pallor</b>
               <div class="input-group cliexm_pallorerr" id="cliexm_pallorerr_<?php echo $cliexmrowno; ?>">
              
               <div class="form-line">
                <input type="text" name="cliexm_pallor[]" id="cliexm_pallor_<?php echo $cliexmrowno; ?>" class="form-control" placeholder="" style="margin-top: 5px;" >
                 </div>
                </div>
                                      
     </td>

     <td> 
               <b>Oedema</b>
               <div class="input-group " id="cliexm_oedemaerr_<?php echo $cliexmrowno; ?>">
              
               <div class="form-line">
                <input type="text" name="cliexm_oedema[]" id="cliexm_oedema_<?php echo $cliexmrowno; ?>" class="form-control" placeholder="" style="margin-top: 5px;" >
                 </div>
                </div>
                                      
     </td>

     <td style="width: 9%;"> 
              <div class="input-group " id="fundal_heighterr_<?php echo $cliexmrowno; ?>">
              <label>Fundal Height</label>
                               <select name="fundal_height[]" id="fundal_height_<?php echo $cliexmrowno; ?>" class="form-control show-tick  selectYear" data-live-search="true" tabindex="-98">
                                <option value="">&nbsp;</option>
                                  <?php
                                      for ($i=12; $i <= 36; $i+=2) {     
                                   ?>
                                     <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                   <?php
                                    }
                                   ?>
                                
                               </select>   
                           </div>                               
            </td>

            
     <td> 
               <b>SFH(cm)</b>
               <div class="input-group " id="cliexm_sfherr_<?php echo $cliexmrowno; ?>">
              
               <div class="form-line">
                <input type="text" name="cliexm_sfh[]" id="cliexm_sfh_<?php echo $cliexmrowno; ?>" class="form-control" placeholder="" style="margin-top: 5px;" >
                 </div>
                </div>
                                      
     </td>

     <td> 
               <b>FSH(/min)</b>
               <div class="input-group " id="cliexm_fsherr_<?php echo $cliexmrowno; ?>">
              
               <div class="form-line">
                <input type="text" name="cliexm_fsh[]" id="cliexm_fsh_<?php echo $cliexmrowno; ?>" class="form-control" placeholder="" style="margin-top: 5px;" >
                 </div>
                </div>
                                      
     </td>

     <td> 
               <b>Appointment</b>
               <div class="input-group " id="cliexm_appointment_dateerr_<?php echo $cliexmrowno; ?>">
              
               <div class="form-line">
                <input type="text" name="cliexm_appointment_date[]" id="cliexm_appointment_date_<?php echo $cliexmrowno; ?>" class="form-control" placeholder="Date" style="margin-top: 5px;" >
                 </div>
                </div>
                                      
     </td>

     <td> 
               <b>After</b>
               <div class="input-group " id="cliexm_after_weekerr_<?php echo $cliexmrowno; ?>">
              
               <div class="form-line">
                <input type="text" name="cliexm_after_week[]" id="cliexm_after_week_<?php echo $cliexmrowno; ?>" class="form-control" placeholder="Weeks" style="margin-top: 5px;" >
                 </div>
                </div>
                                      
     </td>

     <td> 
               <b>After</b>
               <div class="input-group " id="cliexm_after_dayserr_<?php echo $cliexmrowno; ?>">
              
               <div class="form-line">
                <input type="text" name="cliexm_after_days[]" id="cliexm_after_days_<?php echo $cliexmrowno; ?>" class="form-control" placeholder="days" style="margin-top: 5px;" >
                 </div>
                </div>
                                      
     </td>


					

						<td style="vertical-align: middle;">
							<?php 
                  if ($cliexmrowno!=0) {
                  
              ?> 
			<a href="javascript:;" class="delClinicalExam" id="delDocRow_<?php echo $cliexmrowno; ?>" title="Delete">
					<i class="material-icons">delete</i>
            <?php } ?> 

				</a>
			</td>				
				
		
		</tr>