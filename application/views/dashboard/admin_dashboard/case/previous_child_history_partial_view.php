
    

    <tr id="rowChildPreviousBirth_<?php echo $childdtlrowno; ?>" class="row clearfix" >

           <!-- <td> <b>Sl.</b><label class="form-label" style="margin-top: 12px;" > <?php echo $childdtlrowno; ?>.</label></td> -->

          <td style="width:100px;"> 
               <label>Place</label>
               <div class="input-group birthplaceerr" id="birthplaceerr_<?php echo $childdtlrowno; ?>">
               <!-- <span class="input-group-addon"><i class="material-icons">place</i> </span> -->
               <div class="form-line">
                <input type="text" name="birthplace[]" id="birthplace_<?php echo $childdtlrowno; ?>" class="form-control" placeholder="" style="margin-top: 5px;" >
                 </div>
                </div>
          </td>

            <td style="width:100px;"> 
              <div class="input-group selectyearerr" id="selectyearerr_<?php echo $childdtlrowno; ?>">
              <label>Year</label>
                               <select name="selectYear[]" id="selectYear_<?php echo $childdtlrowno; ?>" class="form-control show-tick  selectYear" data-live-search="true" tabindex="-98">
                                <option value="">&nbsp;</option>
                                  <?php
                                      for ($i=2000; $i <= date('Y'); $i++) {     
                                   ?>
                                     <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                   <?php
                                    }
                                   ?>
                                
                               </select>   
                           </div>                               
            </td>

           <td style="width:100px;"> 
              <div class="input-group complicationerr" id="complicationerr_<?php echo $childdtlrowno; ?>">
              <label>Complication(s)</label>
                               <select name="complicationChild[]" id="complicationChild_<?php echo $childdtlrowno; ?>" class="form-control show-tick complicationChild" data-live-search="true" tabindex="-98" multiple data-selected-text-format="count">
                                  <?php
                                      foreach ($complicationList as $complication ) { 
                                   ?>
                                     <option value="<?php echo $complication->complication_id;?>"><?php echo $complication->complication_name;?></option>
                                   <?php
                                    }
                                   ?>
                                
                  </select>   
                     <input type="hidden" name="complicationChildValues[]" id="complicationChildValues_<?php echo $childdtlrowno; ?>" value=""> 

              </div>                           
            </td>

        <td style="width:100px;"> 
              <div class="input-group medicalproblemerr" id="medicalproblemerr_<?php echo $childdtlrowno; ?>">
              <label>Medical Problem(s)</label>
                 <select name="medicalproblem[]" id="medicalproblem_<?php echo $childdtlrowno; ?>" class="form-control show-tick medicalproblem"   data-live-search="true" tabindex="-98"
                   multiple data-selected-text-format="count" >
                                  <?php
                                      foreach ($medicalProblemList as $medicalproblem) { 
                                   ?>
                                     <option value="<?php echo $medicalproblem->medicle_problem_id;?>"><?php echo $medicalproblem->problem;?></option>
                                   <?php
                                    }
                                   ?>
                                
                               </select>  
                                 <input type="hidden" name="medicalproblemValues[]" id="medicalproblemValues_<?php echo $childdtlrowno; ?>" value=""> 
                           </div>                      
            </td>

           <td style="width:100px;"> 
            <div class="input-group othersproblemerr" id="othersproblemerr_<?php echo $childdtlrowno; ?>" style="display: none">
              <label>Oth. Prob.</label>
                 <div class="form-line">
                 <input type="text" class="form-control" name="othersproblem[]" id="othersproblem_<?php echo $childdtlrowno; ?>" autocomplete="off"  placeholder="Others"> 
                </div> 
            </div>  

             <input type="hidden" name="isOtherProblem[]" id="isOtherProblem_<?php echo $childdtlrowno; ?>" value="N">       
            </td>

          <td style="width:100px;"> 
              <div class="input-group deleveryerr" id="deleveryerr_<?php echo $childdtlrowno; ?>">
              <label>Delivery</label>
                               <select name="deleveryType[]" id="deleveryType_<?php echo $childdtlrowno; ?>" class="form-control show-tick"   data-live-search="true" tabindex="-98">
                                  <?php
                                      foreach ($deliveryType as $key => $value) { 
                                   ?>
                                     <option value="<?php echo $key;?>"
                                      <?php if ($key=='CS') {
                                       echo "selected";
                                      }?>><?php echo $value;?></option>
                                   <?php
                                    }
                                   ?>
                                
                               </select>   
                           </div>                
                      
            </td>

            <td style="width:100px;"> 
                    <div class="input-group babyweighterr" id="babyweighterr_<?php echo $childdtlrowno; ?>">
                    <label>Baby Weight</label>
                      <div class="form-line">
                      <input type="text" class="form-control" name="babyweight[]" id="babyweight_<?php echo $childdtlrowno; ?>" autocomplete="off"  placeholder="" value=""> 
                      </div> 
                  </div>               
                            
                  </td>

            <td style="width:100px;"> 
              <div class="input-group babygendererr" id="babygendererr_<?php echo $childdtlrowno; ?>">
              <label>Gender</label>
                               <select name="babygender[]" id="babygender_<?php echo $childdtlrowno; ?>" class="form-control show-tick"   data-live-search="true" tabindex="-98">                             
                                  <?php 
                                 foreach ($genderList as $value) {  ?>
                                   <option value="<?php echo $value->id;?>"
                                    <?php
                                    if ($value->id == 2) {
                                       echo "selected";
                                      }

                                    ?>
                                        ><?php echo $value->gender?></option>
                                 <?php     } ?>                               
                               </select>   
                           </div>                
                      
            </td>

             <td style="width:100px;"> 
               <label>Age</label>
               <div class="input-group babyageerr" id="babyageerr_<?php echo $childdtlrowno; ?>">
               <span class="input-group-addon"><i class="material-icons"></i> </span>
               <div class="form-line">
                <input type="text" name="babyage[]" id="babyage_<?php echo $childdtlrowno; ?>" class="form-control" placeholder="" style="margin-top: 5px;" >
                 </div>
                </div>
                                      
            </td>

            <td style="vertical-align: middle;">
              <?php 
                  if ($childdtlrowno!=0) {
                  
              ?> 
      <a href="javascript:;" class="delChildBirthHistory" id="delchildRow_<?php echo $childdtlrowno; ?>" title="Delete">
          <i class="material-icons">delete</i>
            <?php } ?> 

        </a>
      </td>       
        
    
    </tr>