
    

    <tr id="rowplanned_surgery_<?php echo $surgeryplannedrowno; ?>" class="row clearfix" >
    
    <td style="width:37%;text-align: left;"> 
						       <input type="hidden" name="surgeryplaID[]" class="SurgeryPlannedIDcls" id="surgeryplaID_<?php echo $surgeryplannedrowno; ?>" value="<?php echo $surgeryID;?>">   
                   <?php echo $surgery;?>       
							        
    </td>

    <td style="width:55%;text-align: left;"> 
						       <input type="hidden" name="surgeryPladate[]" id="surgeryPladate_<?php echo $surgeryplannedrowno; ?>" value="<?php if($surgery_planned_date != ''){ echo date('Y-m-d',strtotime($surgery_planned_date)); } else{ echo '*'; } ?>">   
                   <?php if($surgery_planned_date != ''){  echo date('l d M Y',strtotime($surgery_planned_date)); } ?>       
							        
    </td>

     

						<td style="vertical-align: middle;">
							<?php 
                  if ($surgeryplannedrowno!=0) {
                  
              ?> 
			<a href="javascript:;" class="delPlannedSurgery" id="delplasurgeryRow_<?php echo $surgeryplannedrowno; ?>" title="Delete">
					<i class="material-icons thmdarkTxtcolor">delete</i>
            <?php } ?> 

				</a>
			</td>				
				
		
		</tr>