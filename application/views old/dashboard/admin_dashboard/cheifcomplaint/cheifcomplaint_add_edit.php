
<script src="<?php echo(base_url());?>assets/js/adm_scripts/gynaccologycomplaints.js"></script>

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
 <form class="form-area" name="gyncomplaintForm" id="gyncomplaintForm">
  <input type="hidden" name="mode" id="mode" value="<?php echo $bodycontent['mode']; ?>" />
   <input type="hidden" name="gynComplaintID" id="gynComplaintID" value="<?php echo $bodycontent['gynComplaintID']; ?>" />
                        
    <section class="content smallContainerCenter">
        <div class="container-fluid">
            <div class="row clearfix">
                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                              <?php if($bodycontent['mode'] == 'EDIT'){ ?>
                                <h2 class="head_title">Edit Gynaccology Chief Complaints

                              <?php } else{ ?>
                                <h2 class="head_title">Add Gynaccology Chief Complaints
                                <?php } ?>
                                   <a href="<?php echo base_url(); ?>chiefcomplaint/" class="">
                                <button type="button" class="btn bg-deep-purple waves-effect" style="float: right;">List </button></a>

                                </h2>                           
                         
                            </div>
                            <div class="body">
                            <div class="demo-masked-input">
                            <div class="row clearfix">

                            <div class="col-sm-12">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" name="complaintsname" id="complaintsname" class="form-control no-resize auto-growth"  style="overflow: hidden; overflow-wrap: break-word; height: 32px;" autocomplete="off"
                                                    value="<?php if($bodycontent['mode'] == 'EDIT'){
                                                       echo $bodycontent['gyncomplaintEditdata']->complaint_name;
                                                      } ?>" >
                                                  <label class="form-label">Chief Complaints Name</label>
                                                </div>
                                            </div>
                                        </div>  
                            </div>


                             <div class="row clearfix">
                              
                              <div class="col-sm-4">       
                                <div class="form-group form-group">
                                   
                                    <div class="input-group">
                                     
                                         <label class="form-label">Is Parrent</label>
                                             
                                        
                                        </div>  
                                </div>
                           </div>
                             
                            <div class="col-sm-8">       
                                <div class="form-group form-group">
                                   
                                    <div class="input-group">
                                      
                                         <select name="is_parrent" id="is_parrent">

                                          <?php $parr = array("p"=>'Parrent',"C"=>'Child');
                                          foreach ($parr as $key => $value) {
                                           
                                          
                                           ?>
                                           
                                            <option<?php if($bodycontent['mode'] == 'EDIT'){ if($bodycontent['gyncomplaintEditdata']->is_parrent == $key){ ?> selected <?php } } ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                           
                                           <?php } ?>
                                                </select>
                                             
                                        
                                        </div>  
                                </div>
                           </div>
                           
                                                                             
                             </div>
                             
                       <?php if($bodycontent['mode'] == 'EDIT' && $bodycontent['gyncomplaintEditdata']->is_parrent == 'C'){

                         ?>

                      <div class="row clearfix optionrow"> 

                       <?php  } else {  ?>

                      <div class="row clearfix optionrow" style="display:none"> 
                        
                      <?php }  ?>

                             
                             <div class="col-sm-4">
                             
                              <div class="input-group">
                                <label class="form-label">Complaint Name</label> 
                            </div>
                             </div>
                             <div class="col-sm-8">
                            
                             <div class="input-group">
                                <select name="pname" id="pname">
                                  <option value="0">Select Parrent Name</option>
                                  <?php foreach ($bodycontent['allcomplaints'] as $allcomplaints) {  ?>
                                    <option <?php if($bodycontent['mode'] == 'EDIT'){ if ($bodycontent['gyncomplaintEditdata']->is_parrent == 'C' && $bodycontent['gyncomplaintEditdata']->parrent_id == $allcomplaints->id ) { ?>
                                      selected
                                   <?php  } } ?>
                                      value="<?php echo $allcomplaints->id; ?>"><?php echo $allcomplaints->complaint_name; ?></option>
                                  <?php } ?>
                                </select>
                            </div>
                             </div>
                                 
                            </div>


             

                                     <p id="gyncomplaintmsg" class="form_error"></p>
                                    <br>
                                    <div class="row clearfix">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="margin-left: 36%;">
                                            
                                              <button type="submit" class="btn btn-block btn-lg btn-primary waves-effect" id="gyncomplaintsavebtn"><?php echo $bodycontent['btnText']; ?></button> 

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
