<?php
		foreach ($invData as $invDatarow) {							
?>
		<tr id="rowPrescriptionInvestigation_<?php echo $invDatarow['rowno']; ?>" class="row clearfix" >
        <td style="width:90%;text-align: left;"> 
	    <input type="hidden" class="presinvestigationIDCls" name="presinvestigationID[]" id="presinvestigationID_<?php echo $invDatarow['rowno']; ?>" value="<?php echo $invDatarow['investigationID']?>">   
        <?php echo $invDatarow['investigationName'];?>       
		</td>
						
	     <td style="width:10%;vertical-align: middle;">
		  <?php 
                  if ($invDatarow['rowno']!=0) {
                  
              ?> 
			<a href="javascript:;" class="delPresInvestigation" id="delDocRow_<?php echo $invDatarow['rowno']; ?>" title="Delete">
					<i class="material-icons" style="color: red;">clear</i>
            <?php } ?> 

				</a>
			</td>				
				
		
		</tr>

		<?php } ?>