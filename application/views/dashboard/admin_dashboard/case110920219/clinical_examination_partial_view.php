 <style type="text/css">
table.gridtable td {
padding: 2px;
}
table.gridtable th {
padding: 2px;
}
table.gridtable
{
  margin-bottom:10px;
  border-bottom:3px solid #b54d30;
}



</style>
 
    <div id="rowClinicalExam_<?php echo $cliexmrowno; ?>" class="row clearfix" >

      <table class="table  no-footer" class="gridtable" style="display:block;width:100%;font-size: 10px;">

		<tr >


     <!-- <td> <b>Sl.</b><label class="form-label" style="margin-top: 12px;" > <?php echo $cliexmrowno; ?>.</label></td> -->
     <td style="width: 10%;"> 
               <b>Date</b>
               <div class="input-group examination_dateerr" id="examination_dateerr_<?php echo $cliexmrowno; ?>">
              
               <div class="form-line">
                <input type="text" name="examination_date[]" id="examination_date_<?php echo $cliexmrowno; ?>" class="form-control datepicker2 cliexmDate" placeholder="" style="margin-top: 5px;" >
                 </div>
                </div>
                                      
     </td>
     <td> 
               <b>LMP(Weeks)</b>
               <div class="input-group weeks_by_lmperr" id="weeks_by_lmperr_<?php echo $cliexmrowno; ?>">
              
               <div class="form-line">
                <input type="text" name="weeks_by_lmp[]" id="weeks_by_lmp_<?php echo $cliexmrowno; ?>" class="form-control" placeholder="" style="margin-top: 5px;" readonly>
                 </div>
                </div>
                                      
     </td>
     <td> 
               <b>LMP(Days)</b>
               <div class="input-group days_by_lmperr" id="days_by_lmperr_<?php echo $cliexmrowno; ?>">
              
               <div class="form-line">
                <input type="text" name="days_by_lmp[]" id="days_by_lmp_<?php echo $cliexmrowno; ?>" class="form-control" placeholder="" style="margin-top: 5px;" readonly>
                 </div>
                </div>
                                      
     </td>



     <td> 
               <b>USG(Weeks)</b>
               <div class="input-group weeks_by_usgerr" id="weeks_by_usgerr_<?php echo $cliexmrowno; ?>">
              
               <div class="form-line">
                <input type="text" name="weeks_by_usg[]" id="weeks_by_usg_<?php echo $cliexmrowno; ?>" class="form-control" placeholder="" style="margin-top: 5px;" readonly>
                 </div>
                </div>
                                      
     </td>
     <td> 
               <b>USG(Days)</b>
               <div class="input-group days_by_usgerr" id="days_by_usgerr_<?php echo $cliexmrowno; ?>">
              
               <div class="form-line">
                <input type="text" name="days_by_usg[]" id="days_by_usg_<?php echo $cliexmrowno; ?>" class="form-control" placeholder="" style="margin-top: 5px;" readonly>
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
               <b>BP(S)</b>
               <div class="input-group " id="cliexm_bp_serr_<?php echo $cliexmrowno; ?>">
              
               <div class="form-line">
                <input type="text" name="cliexm_bp_s[]" id="cliexm_bp_s_<?php echo $cliexmrowno; ?>" class="form-control" placeholder="" style="margin-top: 5px;" >
                 </div>
                </div>
                                      
     </td>

     <td> 
               <b>BP(D)</b>
               <div class="input-group " id="cliexm_bp_derr_<?php echo $cliexmrowno; ?>">
              
               <div class="form-line">
                <input type="text" name="cliexm_bp_d[]" id="cliexm_bp_d_<?php echo $cliexmrowno; ?>" class="form-control" placeholder="" style="margin-top: 5px;" >
                 </div>
                </div>
                                      
     </td>
     <td></td>
     </tr>
     <tr style="border-bottom: 3px solid #ff9600;">

     <td> 
               <b>Pallor</b>
               <select name="cliexm_pallor[]" id="cliexm_pallor_<?php echo $cliexmrowno; ?>" class="form-control"   data-live-search="true" tabindex="-98" placeholder="test"
                    >              <option value="">&nbsp;</option>
                                  <?php
                                      foreach ($pallor as $pallor) { 
                                   ?>
                                     <option value="<?php echo $pallor;?>"
                                      ><?php echo $pallor;?></option>
                                   <?php
                                    }
                                   ?>
                               </select>  
                                      
     </td>

     <td> 
               <b>Oedema</b>
               <select name="cliexm_oedema[]" id="cliexm_oedema_<?php echo $cliexmrowno; ?>" class="form-control"   data-live-search="true" tabindex="-98" placeholder="test"
                    >              <option value="">&nbsp;</option>
                                  <?php
                                      foreach ($oedema as $oedema) { 
                                   ?>
                                     <option value="<?php echo $oedema;?>"
                                      ><?php echo $oedema;?></option>
                                   <?php
                                    }
                                   ?>
                               </select> 
               
                                      
     </td>

     <td style="width: 9%;"> 
              <div class="input-group " id="fundal_heighterr_<?php echo $cliexmrowno; ?>">
              <label>Fundal Height</label>
                               <select name="fundal_height[]" id="fundal_height_<?php echo $cliexmrowno; ?>" class="form-control show-tick  selectYear" data-live-search="true" tabindex="-98">
                                <option value="">&nbsp;</option>
                                <option value="NP">NP</option>
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
               <b>FHS(/min)</b>
               <div class="input-group " id="cliexm_fsherr_<?php echo $cliexmrowno; ?>">
              
               <div class="form-line">
                <input type="text" name="cliexm_fsh[]" id="cliexm_fsh_<?php echo $cliexmrowno; ?>" class="form-control" placeholder="" style="margin-top: 5px;" >
                 </div>
                </div>
                                      
     </td>

     <td style="width: 10%;"> 
               <b>Appointment</b>
               <div class="input-group " id="cliexm_appointment_dateerr_<?php echo $cliexmrowno; ?>">
              
               <div class="form-line">
                <input type="text" name="cliexm_appointment_date[]" id="cliexm_appointment_date_<?php echo $cliexmrowno; ?>" class="form-control datepicker2" placeholder="" style="margin-top: 5px;" >
                 </div>
                </div>
                                      
     </td>

     <td> 
               <b>After(Weeks)</b>
               <div class="input-group " id="cliexm_after_weekerr_<?php echo $cliexmrowno; ?>">
              
               <div class="form-line">
                <input type="text" name="cliexm_after_week[]" id="cliexm_after_week_<?php echo $cliexmrowno; ?>" class="form-control" placeholder="" style="margin-top: 5px;" >
                 </div>
                </div>
                                      
     </td>

     <td> 
               <b>After(Days)</b>
               <div class="input-group " id="cliexm_after_dayserr_<?php echo $cliexmrowno; ?>">
              
               <div class="form-line">
                <input type="text" name="cliexm_after_days[]" id="cliexm_after_days_<?php echo $cliexmrowno; ?>" class="form-control" placeholder="" style="margin-top: 5px;" >
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

    </table>

    </div>