
<script src="<?php echo(base_url());?>assets/js/adm_scripts/investigationpanel.js"></script> 

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

.addinstructbtn{
    float: right;
}
.delbtn{
    float: right;
    margin-top: -24px;
    cursor: pointer;
}
.btn-default{
    display: none !important;
}

</style>
 <form class="form-area" name="invpanelForm" id="invpanelForm">
  <input type="hidden" name="mode" id="mode" value="<?php echo $bodycontent['mode']; ?>" />
   <input type="hidden" name="inpanelID" id="inpanelID" value="<?php echo $bodycontent['inpanelID']; ?>" />

                        
    <section class="content smallContainerCenter">
        <div class="container-fluid">
            <div class="row clearfix">
                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2 class="head_title">Add Investigation Panel
                                   <a href="<?php echo base_url(); ?>Investigationpanel" class="">
                                <button type="button" class="btn bg-deep-purple waves-effect" style="float: right;">List </button></a>

                                </h2>                           
                         
                            </div>
                            <div class="body">
                                <div class="demo-masked-input">
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                        	<div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" name="panelname" id="panelname" class="form-control no-resize auto-growth"  style="overflow: hidden; overflow-wrap: break-word; height: 32px;" autocomplete="off"
                                                    value="<?php if($bodycontent['mode'] == 'EDIT'){
                                                       echo $bodycontent['investpanelEditdata']->panel_name;
                                                      } ?>" >
                                                  <label class="form-label">Panel Name</label>
                                                </div>
                                            </div>
                                            
                                        </div>

                                                                 
                                                                             
                             </div>

                             <div class="row clearfix">
                              <div class="col-sm-12">
                               <div class="form-group form-float">
                             
                                <label>Investigation</label>

                             
                            <div class="demo">
                            <select name="investigation[]" id="investigation" class="form-control show-tick" data-live-search="true" tabindex="-98" multiple style="display:none">
                                
                                 <?php 

                                 foreach ($bodycontent['investigation'] as $investigationdata) {
                                    
                               ?>
                                   <option value="<?php echo $investigationdata->investigation_comp_id;?>"
                                        
                                        <?php if($bodycontent['mode']=="EDIT"){
                                            
                                    $invest = explode(',', $bodycontent['investpanelEditdata']->investigation);
                                      for ($i=0; $i <count($invest) ; $i++) { 
                                           
                                           if($investigationdata->investigation_comp_id == $invest[$i]){
                                               echo "selected";
                                           }
                                       } 
                                         }
                                            ?>

                                        ><?php echo $investigationdata->inv_component_name; ?></option>
                                 <?php     } ?>
                                   
                               </select> 
                              <!-- && $key==$bodycontent['investpanelEditdata']->investigation_comp_id){echo "selected";}else{echo "";} --> 
                           </div>  
                            </div>
                             </div>
                         </div>
                             <!--  <div class="row clearfix">
                             
                             <div class="col-sm-4">      
                                <div class="form-group form-group">
                                   
                                    <div class="input-group">

                                            <input type="checkbox" name="need_instruct" id="need_instruct" class="filled-in chk-col-deep-purple"                                     <?php if($bodycontent['mode']=="EDIT" && $bodycontent['investpanelEditdata']->is_instruction=="Y"){ echo "checked"; } ?> >
                                            <label for="need_instruct">Is Instruction</label> &nbsp;&nbsp;
                                        <input type="hidden" id="chk_option" name="chk_option" value="<?php if($bodycontent['mode']=="EDIT"){echo  $bodycontent['investpanelEditdata']->is_instruction;}else{ echo "N";}?>">
                                        </div>  
                                </div>
                           </div>
                       </div> -->
                          <!--  <?php if($bodycontent['mode']=="EDIT" && $bodycontent['investpanelEditdata']->is_instruction=="Y"){
                            ?>
                           <div class="row clearfix optionrow">

                        <?php } else{ ?>

                            <div class="row clearfix optionrow" style="display:none">

                      <?php   } ?>
                             
                             
                             <div class="col-sm-12">
                             <label class="form-label">Options For instruction</label> <button type="button" class="btn btn-sm btn-warning addinstructbtn add_field_button addPreChildDtl" name="addinstructbtn" id="addinstructbtn"><span class=" glyphicon glyphicon-plus" style="margin-top: 0px;"></span>Add Instruction</button>
                             <div class="form-group demo-tagsinput-area">

                               <div class="input_fields_wrap">
                                 
                                  <?php if($bodycontent['mode']=="EDIT" && $bodycontent['investpanelEditdata']->is_instruction=="Y"){

                                    $instruct = explode('*', $bodycontent['investpanelEditdata']->instruction);
                                    for ($i=0; $i < count($instruct); $i++) {
                                      ?>
                                    <div class="form-line">
                                    <textarea cols="1" rows="1" name="instruct_option[]" class="form-control instruct" style="width: 95%;"><?php echo $instruct[$i]; ?></textarea>
                                    <?php if($i>0){ ?>
                                     <i class="remove_field delbtn material-icons" aria-hidden="true">delete</i>
                                   <?php } ?>
                                    </div>

                                 <?php  } 

                                  } else{ ?>

                                    <div class="form-line">
                                    <textarea cols="1" rows="1" name="instruct_option[]" class="form-control instruct" style="width: 95%;"></textarea>
                                    
                                    </div>
                                <?php } ?>
                                 
                                  </div>
                               
                            </div>
                             </div>
                                 
                            </div> -->                                               
                                           
                                     <p id="investigationpanelmsg" class="form_error"></p>

                                    <div class="row clearfix">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="margin-left: 36%;">
                                            
                                              <button type="submit" class="btn btn-block btn-lg btn-primary waves-effect" id="invepanelsavebtn"><?php echo $bodycontent['btnText']; ?></button> 

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
