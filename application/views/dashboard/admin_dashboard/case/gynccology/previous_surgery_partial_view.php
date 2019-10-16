
    

    <tr id="rowprevious_surgery_<?php echo $surgeryrowno; ?>" class="row clearfix" >
    
    <td style="width:37%;text-align: left;"> 
						       <input type="hidden" name="surgeryID[]" class="PreviousSurgeryIDcls" id="surgeryID_<?php echo $surgeryrowno; ?>" value="<?php echo $surgeryID;?>">   
                   <?php echo $surgery;?>       
							        
    </td>

    <td style="width:55%;text-align: left;"> 
						       <input type="hidden" name="surgerydate[]" id="surgerydate_<?php echo $surgeryrowno; ?>" value="<?php  if($surgery_date != ''){ echo date('Y-m-d',strtotime($surgery_date)); } else{ echo '*'; } ?>">   
                   <?php if($surgery_date != ''){ echo date('l d M Y',strtotime($surgery_date)); }  ?>       
							        
    </td>

     

						<td style="vertical-align: middle;">
							<?php 
                  if ($surgeryrowno!=0) {
                  
              ?> 
			<a href="javascript:;" class="delPreviousSurgery" id="delSurgeryRow_<?php echo $surgeryrowno; ?>" title="Delete">
					<i class="material-icons thmdarkTxtcolor">delete</i>
            <?php } ?> 

				</a>
			</td>				
				
		
		</tr>