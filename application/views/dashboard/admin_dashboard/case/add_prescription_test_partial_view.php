
    

		<tr id="rowPrescriptionInvestigation_<?php echo $rowno; ?>" class="row clearfix" >

						<td style="width:90%;text-align: left;"> 
						       <input type="hidden" name="presinvestigationID[]" id="presinvestigationID_<?php echo $rowno; ?>" value="<?php echo $investigationID?>">   
                   <?php echo $investigation;?>       
							        
						</td>
						
						
				
				

			<td style="width:10%;vertical-align: middle;">
							<?php 
                  if ($rowno!=0) {
                  
              ?> 
			<a href="javascript:;" class="delPresInvestigation" id="delDocRow_<?php echo $rowno; ?>" title="Delete">
					<i class="material-icons" style="color: red;">clear</i>
            <?php } ?> 

				</a>
			</td>				
				
		
		</tr>