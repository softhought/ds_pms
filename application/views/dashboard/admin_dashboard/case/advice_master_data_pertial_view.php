
                  
                        <?php
						$adviceData=$adviceMasterData;
                          $lebSl=1;
                         foreach ($adviceData as $value) {
                             
                            $advsl=1;
                            
                        ?>
                       <label class="form-label upText" id="advice_lebel_<?php echo $lebSl;?>"><?php 
                      
                          if($value['advType']->advice_type=="I"){
                              echo 'I-General';
                          }else if($value['advType']->advice_type=="III"){
                              echo 'III-Optional';
                          }else{
                              echo $value['advType']->advice_type;
                          }
                       

                       ?>:</label>
                       <?php
                       $lebelHeadCount=0;
                        foreach ($value['adviceList'] as $advlistrow) {
                          $isVisable=0;
                          
                          $is_week_check=$advlistrow->is_week_check;
                          $min_week=$advlistrow->min_week;
                          $max_week=$advlistrow->max_week;

                          if ($is_week_check=='N') {
                             $isVisable=1;
                          }else{

                              if ($weeks>=$min_week && $weeks<=$max_week) {
                                $isVisable=1;
                              }else{
                                 $isVisable=0;
                              }

                          }


                          if ($isVisable) {
                         
                          $lebelHeadCount++;


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


                                }// end of visable loop


                                   } 
                                    ?>
                                  <input type="hidden" value="<?php echo $lebelHeadCount;?>" class="advCntCls" id="advice_lebelcount_<?php echo $lebSl;?>">

                                   <?php
                                   $lebSl++;
                               }
                        ?>
                   
                        

             