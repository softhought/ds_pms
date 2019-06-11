
    

		<tr id="rowMenMedicine_<?php echo $rowno; ?>" class="row clearfix" >


						<td style="width: 40%"> 
             <div class="input-group fromToerr" >
              <div class="form-group form-float inpsamelevel">
                <div class="form-line" id="mensumedicineerr_<?php echo $rowno; ?>">
                    <input type="text" class="form-control mensumedicinecls" name="mensumedicine[]" id="mensumedicine_<?php echo $rowno; ?>" autocomplete="off" placeholder="Medicine">
                              <label class="form-label">Medicine </label>
                </div>
              </div>
            </div>                        
						</td>


						<td style="width: 40%"> 
             <div class="input-group fromToerr" id="mensumedicinedurationerr_<?php echo $rowno; ?>">
              <div class="form-group form-float inpsamelevel">
                <div class="form-line">
                    <input type="text" class="form-control" name="mensumedicineduration[]" id="mensumedicineduration_<?php echo $rowno; ?>" autocomplete="off"  placeholder="Duration">
                              <label class="form-label">Duration </label>
                </div>
              </div>
            </div>                        
            </td>

						<td style="vertical-align: middle;">
							<?php 
                  if ($rowno!=0) {
                  
              ?> 
			<a href="javascript:;" class="delMenMedicine" id="delDocRow_<?php echo $rowno; ?>" title="Delete">
					<i class="material-icons">delete</i>
            <?php } ?> 

				</a>
			</td>				
				
		
		</tr>