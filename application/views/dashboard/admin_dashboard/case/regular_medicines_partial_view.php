
    

		<tr id="rowRegularMedicine_<?php echo $regularmedicinerowno; ?>" class="row clearfix" >


						<td> 
             <div class="input-group fromToerr" >
              <div class="form-group form-float "> <label class="form-label">Medicine </label>
                <div class="form-line " id="mensumedicineerr_<?php echo $regularmedicinerowno; ?>">
                    <input type="text" class="form-control regularmedicinecls" name="regularmedicine[]" id="regularmedicine_<?php echo $regularmedicinerowno; ?>" autocomplete="off" placeholder="">
                             
                </div>
              </div>
            </div>                        
						</td>


						<td> 
             <div class="input-group fromToerr" id="mensumedicinedurationerr_<?php echo $regularmedicinerowno; ?>">
              <div class="form-group form-float"><label class="form-label">Dose </label>
                <div class="form-line">
                    <input type="text" class="form-control " name="regularmedicinedose[]" id="regularmedicinedose_<?php echo $regularmedicinerowno; ?>" autocomplete="off"  placeholder="">
                              
                </div>
              </div>
            </div>                        
            </td>

              <td> 
             <div class="input-group regularmedforYearerr" id="regularmedforYearerr_<?php echo $regularmedicinerowno; ?>">
              <label>for last(year)</label>
                               <select name="regularmedforYear[]" id="regularmedforYear_<?php echo $regularmedicinerowno; ?>" class="form-control show-tick" data-live-search="true" tabindex="-98">
                                <option value="0">&nbsp;</option>
                                  <?php
                                      for ($i=0; $i <= 30; $i++) {     
                                   ?>
                                     <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                   <?php
                                    }
                                   ?>
                                
                               </select>   
                           </div>                        
            </td>

               <td> 
             <div class="input-group regularmedforMontherr" id="regularmedforMontherr_<?php echo $regularmedicinerowno; ?>">
              <label>for last(month)</label>
                               <select name="regularmedforMonth[]" id="regularmedforMonth_<?php echo $regularmedicinerowno; ?>" class="form-control show-tick" data-live-search="true" tabindex="-98">
                                <option value="0">select month&nbsp;</option>
                                  <?php
                                      for ($i=0; $i <= 11; $i++) {     
                                   ?>
                                     <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                   <?php
                                    }
                                   ?>
                                
                               </select>   
                           </div>                        
            </td>

						<td style="vertical-align: middle;">
							<?php 
                  if ($regularmedicinerowno!=0) {
                  
              ?> 
			<a href="javascript:;" class="delRegularMedicine" id="delDocRow_<?php echo $regularmedicinerowno; ?>" title="Delete">
					<i class="material-icons">delete</i>
            <?php } ?> 

				</a>
			</td>				
				
		
		</tr>