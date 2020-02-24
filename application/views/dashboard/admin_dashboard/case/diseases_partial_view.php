
    

    <tr id="rowpre_diseases_<?php echo $diseasesrowno; ?>" class="row clearfix" >
    	<input type="hidden" name="otherdiseases[]" id="otherdiseases_<?php echo $diseasesrowno; ?>" value="<?php echo $other_diseases; ?>">
    
    <td style="width:37%;text-align: left;"> 
						       <input type="hidden" name="diseasesID[]" class="diseasesIDcls" id="diseasesID_<?php echo $diseasesrowno; ?>" value="<?php echo $diseasesID;?>">   
                   <?php echo $diseasesname;?>  

							        
    </td>

    <td style="width:55%;text-align: left;"> 
						       <input type="hidden" name="dieseasesYer[]" id="dieseasesYer_<?php echo $diseasesrowno; ?>" value="<?php echo $diseases_years ?>"> <?php echo $diseases_years ?> 
                       
							        
    </td>

     

						<td style="vertical-align: middle;">
							<?php 
                  if ($diseasesrowno!=0) {
                  
              ?> 
			<a href="javascript:;" class="delPrediseases" id="deldiseasesRow_<?php echo $diseasesrowno; ?>" title="Delete">
					<i class="material-icons thmdarkTxtcolor">delete</i>
            <?php } ?> 

				</a>
			</td>				
				
		
		</tr>