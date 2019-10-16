
    

		<tr id="rowPrescriptionMedicine_<?php echo $rowno; ?>"  >
		
		     <td  class="presmedTd"> 
						       
                   <?php echo $category;?>       
							        
				</td>

				<td  class="presmedTd"> 
						       <input type="hidden" name="presMedID[]" id="presMedID_<?php echo $rowno; ?>" value="<?php echo $medicineID?>">   
                   <?php echo $medicine;?>       
							        
				</td>

				<td  class="presmedTd"> 
             
			 <input type="hidden" name="presInstruction[]" id="presInstruction_<?php echo $rowno; ?>" value="<?php echo $medinstruction?>">   
				 <?php echo $medinstruction;?>                

			 </td>
						
				<td  class="presmedTd" style="text-align: center;"> 
						 
               <input type="hidden" name="presdosage[]" id="presdosage_<?php echo $rowno; ?>" value="<?php echo $dosage?>">   
                   <?php echo $dosage;?>                

				</td>	
				<td  class="presmedTd" style="text-align: center;"> 
             
               <input type="hidden" name="presfrequency[]" id="presfrequency_<?php echo $rowno; ?>" value="<?php echo $frequency?>">   
                   <?php echo $frequency;?>                

               </td> 
			   <td  class="presmedTd" style="text-align: center;"> 
             
               <input type="hidden" name="presdays[]" id="presdays_<?php echo $rowno; ?>" value="<?php echo $days?>">   
                   <?php echo $days;?>                

			   </td>
			   
		

				<td style="vertical-align: middle;text-align: center;" class="presmedTd">
							<?php 
                  if ($rowno!=0) {
                  
              ?> 
			<a href="javascript:;" class="delPresMed" id="delDocRow_<?php echo $rowno; ?>" title="Delete">
				<i class="material-icons thmdarkTxtcolor">delete</i>
            <?php } ?> 

				</a>
			</td>				
				
		
		</tr>