
<script src="<?php echo(base_url());?>assets/js/adm_scripts/advice.js"></script>

<style>
.width18{
    width: 23% !important;

}
.table tbody tr td, .table tbody tr th {
   
    border-top: 1px solid #f0c7f9;
border-bottom: 1px solid #f0c7f9;
}

@media (max-width: 767px) {
    .table-responsive .dropdown-menu {
        position: static !important;
    }
}
@media (min-width: 768px) {
    .table-responsive {
        overflow: visible;
    }
}


</style>
 <form class="form-area" name="adviceForm" id="adviceForm">
  <input type="hidden" name="mode" id="mode" value="<?php echo $bodycontent['mode']; ?>" />
   <input type="hidden" name="adviceID" id="adviceID" value="<?php echo $bodycontent['adviceID']; ?>" />
                        
    <section class="content smallContainerCenter">
        <div class="container-fluid">
            <div class="row clearfix">
                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2 class="head_title">Add Advice
                                   <a href="<?php echo base_url(); ?>advice/" class="">
                                <button type="button" class="btn bg-deep-purple waves-effect" style="float: right;">List </button></a>

                                </h2>                           
                         
                            </div>
                            <div class="body">
                            <div class="demo-masked-input">
                            <div class="row clearfix">

                            <div class="col-sm-12">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <textarea rows="1" name="advice" id="advice" class="form-control no-resize auto-growth"  style="overflow: hidden; overflow-wrap: break-word; height: 32px;" autocomplete="off"
                                                      ><?php if($bodycontent['mode']=="EDIT"){echo $bodycontent['adviceEditdata']->advice;}?></textarea>
                                                    <label class="form-label">Advice Note</label>
                                                </div>
                                            </div>
                                        </div>  
                            </div>


                             <div class="row clearfix">
                              <div class="col-sm-6">
                              <div class="form-group form-float">
                              <div class="input-group medtypeerr" id="medtypeerr">
                                <!--    <label class="form-label">Medicine Type</label> -->
                               <select name="advice_type" id="advice_type" class="form-control show-tick" data-live-search="true" tabindex="-98">
                                <option value="0"> Select Type</option>
                                 <?php 

                                 foreach ($bodycontent['adviceType'] as $key => $advicetype) {
                                    
                               ?>
                                   <option value="<?php echo $key;?>"
                                        
                                        <?php if(($bodycontent['mode']=="EDIT") && $key==$bodycontent['adviceEditdata']->advice_type){echo "selected";}else{echo "";} ?>

                                        ><?php echo $advicetype?></option>
                                 <?php     } ?>
                                   
                               </select>   
                               <input type="hidden" id="old_advice_type" name="old_advice_type" value="<?php if($bodycontent['mode']=="EDIT"){echo  $bodycontent['adviceEditdata']->advice_type;}?>">
                           </div>  
                            </div>
                             </div>
                             
                             <div class="col-sm-1">	  </div>
                            <div class="col-sm-4">	     
                                <div class="form-group form-group">
                                   
                                    <div class="input-group">
                                            <input type="checkbox" name="need_adv_opt" id="need_adv_opt" class="filled-in chk-col-deep-purple" value="Y" 
                                            <?php if($bodycontent['mode']=="EDIT" && $bodycontent['adviceEditdata']->is_advice_option=="Y"){echo "checked";}?> >
                                            <label for="need_adv_opt">If Need advice Options</label> &nbsp;&nbsp;
                                        <input type="hidden" id="chk_option" value="<?php if($bodycontent['mode']=="EDIT"){echo  $bodycontent['adviceEditdata']->is_advice_option;}else{ echo "N";}?>">
                                        </div>  
                                </div>
                           </div>
                           
                                                                             
                             </div>


                             <div class="row clearfix optionrow" style="display:none"> 
                             <div class="col-sm-12">
                             <label class="form-label">Options For advice</label> 
                             <div class="form-group demo-tagsinput-area">
                                <div class="form-line">
                                    <input type="text" name="advice_options" class="form-control" data-role="tagsinput" value="<?php if($bodycontent['mode']=="EDIT"){echo $bodycontent['adviceEditdata']->advice_options;}?>">
                                </div>
                            </div>
                             </div>
                                 
                            </div>


             


                   





                       <!--  <input type="text" class="form-control selecttime" placeholder="Time"> -->
                   

                                     <p id="advicemsg" class="form_error"></p>
                                    <br>
                                    <div class="row clearfix">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="margin-left: 36%;">
                                            
                                              <button type="submit" class="btn btn-block btn-lg btn-primary waves-effect" id="advicesavebtn"><?php echo $bodycontent['btnText']; ?></button> 

                                                 <span class="btn btn-block btn-lg btn-primary waves-effect loaderbtn" id="loaderbtn" style="display:none;"> <?php echo $bodycontent['btnTextLoader']; ?></span>
                                        </div>


                  
                                    </div>

                                </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
