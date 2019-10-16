
<?php
/* create a new page for inavestion panel by anil 23-09-2019*/
		foreach ($invData as $invDatarow) {							
?>
		<tr id="rowPrescriptionInvestigation_<?php echo $invDatarow['rowno']; ?>" class="row clearfix">

        <td style="width: 10%;font-size: 16px;"> 
	    <input type="hidden" class="presinvestigationIDCls" name="presinvestigationID[]" id="presinvestigationID_<?php echo $invDatarow['rowno']; ?>" value="<?php echo $invDatarow['panelID']?>">

       <span><b><?php  echo $invDatarow['panel_name']; ?></b></span>
	</td>
	<td>
	     <textarea class="form-control no-resize auto-growth" rows="4" id="presinvestigationpanel_<?php echo $invDatarow['rowno']; ?>" name = "presinvestigationpanel[]"><?php $i=1;
             foreach ($invDatarow['investigationName'] as $value) { 

        	  if($i != count($invDatarow['investigationName'])){
        	 echo  $value->inv_component_name .',';
        	}
        	else{
        		echo  $value->inv_component_name;
        	}
      $i++; }?>  
       </textarea>       
		</td>
						
	     <td style="width: 6%;text-align: center;">
		  <?php 
                  if ($invDatarow['rowno']!=0) {
                  
              ?> 
			<a href="javascript:;" class="delPresInvestigationpanel" id="delDocRow_<?php echo $invDatarow['rowno']; ?>" title="Delete">
					<i class="material-icons thmdarkTxtcolor" style="color: red;">delete</i>
            <?php } ?> 

				</a>
			</td>				
				
		
		</tr>

		<?php } ?>