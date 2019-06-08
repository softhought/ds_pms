
    

		<tr id="rowChildPreviousBirth_<?php echo $rowno; ?>" class="row clearfix" >

						<td> 
							<div class="input-group selectdayerr" id="selectdayerr_<?php echo $rowno; ?>">
							<label>Visiting Day</label>
                               <select name="selectDay[]" id="selectDay_<?php echo $rowno; ?>" class="form-control show-tick  selectDay" data-live-search="true" tabindex="-98">
                                <option value="0"> Select Day</option>
                                 <?php foreach ($DaysList as $value) { 
                                    echo "<option value='".$value->day_id."'>".$value->day_name."</option>";
                                      } ?>
                               </select>   
                           </div>                
							        
						</td>
						
						<td style="width:20%;text-align: center;"> 
						 <div class="1demo-checkbox">
                         <label >By Appointment&nbsp;</label>  <br>
                           <input type="checkbox" name="basic_checkbox[]" id="basic_checkbox_<?php echo $rowno; ?>" class="chk" >

                              <label for="basic_checkbox_<?php echo $rowno; ?>"></label>  
                             </div>  
                              

						</td>	
						<td> <input type="hidden" name="byAppoint[]" id="byAppoint_<?php echo $rowno; ?>" value="N">
							 
                          <b>Time Form</b>
                           <div class="input-group fromTimeerr" id="fromTimeerr_<?php echo $rowno; ?>">
                             <span class="input-group-addon">
                              <i class="material-icons">access_time</i>
                               </span>
                             <div class="form-line">
                               <input type="text" name="timefrom[]" id="timefrom_<?php echo $rowno; ?>" class="form-control selecttime" placeholder="Ex:11:59 pm">
                                 </div>
                             </div>
                                      
						</td>
						<td>
						  <b>Time To</b>
                  <div class="input-group fromToerr" id="fromToerr_<?php echo $rowno; ?>">
                    <span class="input-group-addon">
                     <i class="material-icons">access_time</i>  </span>
                  <div class="form-line">
                  <input type="text" name="timeto[]" id="timeto_<?php echo $rowno; ?>" class="form-control selecttime" placeholder="Ex:11:59 pm">
                   </div>
                    </div>
						</td>

						<td style="vertical-align: middle;">
							<?php 
                  if ($rowno!=0) {
                  
              ?> 
			<a href="javascript:;" class="delTimeSlot" id="delDocRow_<?php echo $rowno; ?>" title="Delete">
					<i class="material-icons">delete</i>
            <?php } ?> 

				</a>
			</td>				
				
		
		</tr>