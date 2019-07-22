
                  
                        <?php
						$adviceData=$adviceMasterData;
                          
                         foreach ($adviceData as $value) {
                             
                            $advsl=1;
                        ?>
                       <label class="form-label upText"><?php 
                      
                          if($value['advType']->advice_type=="I"){
                              echo 'I-General';
                          }else if($value['advType']->advice_type=="III"){
                              echo 'III-Optional';
                          }else{
                              echo $value['advType']->advice_type;
                          }
                       
                       ?>:</label>
                       <?php

                        foreach ($value['adviceList'] as $advlistrow) {
                       ?>
                       
                              <div class="row clearfix" >
                             
                              <div class="col-sm-1"></div>
                                    <div class="col-sm-10">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">    
                                                        <!-- <input type="text" class="form-control selpres" name="gen_advice[]" id="gen_advice" autocomplete="off" placeholder="" value="" >        -->
                                    <textarea rows="1" name="advice[]"  class="form-control no-resize auto-growth"  style=" width:90%" autocomplete="off"
                                          ><?php echo $advsl++;echo ". ".$advlistrow->advice;?></textarea>  
                                                      </div>
                                                    </div>
                                      </div>  
                                      
                                </div>

                                <input type="hidden" id="advice_type[]" name="advice_type[]" value="<?php echo $advlistrow->advice_type;?>">
                                <input type="hidden" id="is_advice_option[]" name="is_advice_option[]" value="<?php echo $advlistrow->is_advice_option;?>">

                           
                        <?php if($advlistrow->is_advice_option=="Y"){?>
                            <div class="row clearfix" >
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10" style="margin-bottom: 0px;">
                                  <div class="form-group demo-tagsinput-area">
                                    <div class="form-line">
                                        <input class="advoptiontag" style="overflow: hidden;" type="text" name="advice_options[]" class="form-control" data-role="tagsinput" value="<?php echo $advlistrow->advice_options;?>">
                                    </div>
                                </div>

                                  </div>
                            </div>
                        
                        <?php }else{?>
                          <input type="hidden" name="advice_options[]"  value="<?php echo $advlistrow->advice_options;?>">
                        <?php
                              }

                                   }
                               }
                        ?>
                   
                        

             