
    

		<tr id="rowPrescriptionMedicine_<?php echo $rowno; ?>" class="row clearfix" >

						<td style="width:36%;text-align: left;"> 
						       <input type="hidden" name="presMedID[]" id="presMedID_<?php echo $rowno; ?>" value="<?php echo $medicineID?>">   
                   <?php echo $medicine;?>       
							        
						</td>
						
						<td style="width:18%;text-align: center;"> 
						 
               <input type="hidden" name="presdosage[]" id="presdosage_<?php echo $rowno; ?>" value="<?php echo $dosage?>">   
                   <?php echo $dosage;?>                

						</td>	
						  <td style="width:18%;text-align: center;"> 
             
               <input type="hidden" name="presfrequency[]" id="presfrequency_<?php echo $rowno; ?>" value="<?php echo $frequency?>">   
                   <?php echo $frequency;?>                

            </td> 
						 <td style="width:20%;text-align: center;"> 
             
               <input type="hidden" name="presdays[]" id="presdays_<?php echo $rowno; ?>" value="<?php echo $days?>">   
                   <?php echo $days;?>                

            </td>

						<td style="width:10%;vertical-align: middle;">
							<?php 
                  if ($rowno!=0) {
                  
              ?> 
			<a href="javascript:;" class="delPresMed" id="delDocRow_<?php echo $rowno; ?>" title="Delete">
					<i class="material-icons" style="color: red;">clear</i>
            <?php } ?> 

				</a>
			</td>				
				
		
		</tr>