
    
		<tr id="rowpreopMedicine_<?php echo $rowno; ?>"  >
		
		    
				<td  style="font-size: 15px;"> 

					<input type="hidden" name="preopmedicine[]" id="preopmedicine_<?php echo $rowno; ?>" value="<?php  echo $medicineID; ?>">
                   <input type="hidden" name="preopOthermedicine[]" id="preopOthermedicine_<?php echo $rowno; ?>" value="<?php if($checkother == 'Others'){ echo $medicine; }else{ echo ''; } ?>">
				   <input type="hidden" name="preopmedicine_time[]" id="preopmedicine_time_<?php echo $rowno; ?>" value="<?php echo $medicine_time; ?>">
				    <input type="hidden" name="preoperationdate[]" id="preoperationdate_<?php echo $rowno; ?>" value="<?php echo $operationdate; ?>">
						        
                   To take <?php echo $medicine;?> at <?php echo $medicine_time; ?> on <?php echo $operationdate; ?>

							        
				</td>

			
				<td style="vertical-align: middle;text-align: center;">
							<?php 
                  if ($rowno!=0) {
                  
              ?> 
			<a href="javascript:;" class="delpreopRow" id="delDocRow_<?php echo $rowno; ?>" title="Delete">
				<i class="material-icons thmdarkTxtcolor">delete</i>
            <?php } ?> 

				</a>
			</td>				
				
		
		</tr>