
<script src="<?php echo(base_url());?>assets/js/adm_scripts/medicine.js"></script>

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
 <form class="form-area" name="medicineForm" id="medicineForm">
  <input type="hidden" name="mode" id="mode" value="<?php echo $bodycontent['mode']; ?>" />
   <input type="hidden" name="medicineID" id="medicineID" value="<?php echo $bodycontent['medicineID']; ?>" />
                        
    <section class="content smallContainerCenter">
        <div class="container-fluid">
            <div class="row clearfix">
                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2 class="head_title">Add Medicine
                                   <a href="<?php echo base_url(); ?>medicine/" class="">
                                <button type="button" class="btn bg-deep-purple waves-effect" style="float: right;">List </button></a>

                                </h2>                           
                         
                            </div>
                            <div class="body">
                                <div class="demo-masked-input">
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="medicinename" id="medicinename" autocomplete="off" value="<?php if($bodycontent['mode']=="EDIT"){echo $bodycontent['medicineEditdata']->medicine_name;}?>" >
                                                    <label class="form-label">Medicine Name</label>
                                                </div>
                                            </div>
                                        </div>

                                                                 
                                                                             
                             </div>

                              <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="genericname" id="genericname" autocomplete="off" value="<?php if($bodycontent['mode']=="EDIT"){echo $bodycontent['medicineEditdata']->generic;}?>" >
                                                    <label class="form-label">Generic Name</label>
                                                </div>
                                            </div>
                                        </div>

                                                                 
                                                                             
                             </div>

                             <div class="row clearfix">
                             <div class="col-sm-6">
                              <div class="form-group form-float">
                              <div class="input-group medtypeerr" id="medtypeerr">
                                <!--    <label class="form-label">Medicine Type</label> -->
                               <select name="medicine_category" id="medicine_category" class="form-control show-tick" data-live-search="true" tabindex="-98">
                                <option value="0"> Select Category</option>
                                 <?php 

                                 foreach ($bodycontent['medicineCategoryList'] as $value) {  ?>
                                   <option value="<?php echo $value->med_cat_id;?>"
                                        
                                        <?php if(($bodycontent['mode']=="EDIT") && $value->med_cat_id==$bodycontent['medicineEditdata']->category_id){echo "selected";}else{echo "";} ?>

                                        ><?php echo $value->category?></option>
                                 <?php     } ?>
                                   
                               </select>   
                           </div>  
                            </div>
                             </div> 
                             <div class="col-sm-6">
                              <div class="form-group form-float">
                              <div class="input-group medtypeerr" id="medtypeerr">
                                <!--    <label class="form-label">Medicine Type</label> -->
                               <select name="medicine_type" id="medicine_type" class="form-control show-tick" data-live-search="true" tabindex="-98">
                                <option value="0"> Select Type</option>
                                 <?php 

                                 foreach ($bodycontent['medicineTypeList'] as $value) {  ?>
                                   <option value="<?php echo $value->medicine_type_id;?>"
                                        
                                        <?php if(($bodycontent['mode']=="EDIT") && $value->medicine_type_id==$bodycontent['medicineEditdata']->medicine_type){echo "selected";}else{echo "";} ?>

                                        ><?php echo $value->medicine_type?></option>
                                 <?php     } ?>
                                   
                               </select>   
                           </div>  
                            </div>
                             </div> 

                             </div>

                             <div class="row clearfix">

                             <div class="col-sm-12">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <textarea rows="1" name="instruction" id="instruction" class="form-control no-resize auto-growth"  style="overflow: hidden; overflow-wrap: break-word; height: 32px;" autocomplete="off"
                                                      ><?php if($bodycontent['mode']=="EDIT"){echo $bodycontent['medicineEditdata']->instruction;}?></textarea>
                                                    <label class="form-label">Medicine Instruction</label>
                                                </div>
                                            </div>
                                        </div>
                             
                             </div>


             


                   





                       <!--  <input type="text" class="form-control selecttime" placeholder="Time"> -->
                   

                                     <p id="medicinemsg" class="form_error"></p>

                                    <div class="row clearfix">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="margin-left: 36%;">
                                            
                                              <button type="submit" class="btn btn-block btn-lg btn-primary waves-effect" id="medicinesavebtn"><?php echo $bodycontent['btnText']; ?></button> 

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
