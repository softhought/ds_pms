<?php// pre($bodycontent['DaysList']); ?>
<script src="<?php echo(base_url());?>assets/js/adm_scripts/complication.js"></script>

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
 <form class="form-area" name="complicationForm" id="complicationForm">
  <input type="hidden" name="mode" id="mode" value="<?php echo $bodycontent['mode']; ?>" />
   <input type="hidden" name="complicationID" id="complicationID" value="<?php echo $bodycontent['complicationID']; ?>" />
                        
    <section class="content smallContainerCenter">
        <div class="container-fluid">
            <div class="row clearfix">
                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2 class="head_title">Add Complication
                                   <a href="<?php echo base_url(); ?>complication/" class="">
                                <button type="button" class="btn bg-deep-purple waves-effect" style="float: right;">List </button></a>

                                </h2>                           
                         
                            </div>
                            <div class="body">
                                <div class="demo-masked-input">
                                    <div class="row clearfix">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-8">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="complicationname" id="complicationname" autocomplete="off" value="<?php if($bodycontent['mode']=="EDIT"){echo $bodycontent['complicationEditdata']->complication_name;}?>" >
                                                    <label class="form-label">Complication</label>
                                                </div>
                                            </div>
                                        </div>

                                                                 
                                                                             
                             </div>

                   

                                     <p id="complicationmsg" class="form_error"></p>

                                    <div class="row clearfix">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="margin-left: 36%;">
                                            
                                              <button type="submit" class="btn btn-block btn-lg btn-primary waves-effect" id="complicationsavebtn"><?php echo $bodycontent['btnText']; ?></button> 

                                                 <span class="btn btn-block btn-lg btn-primary waves-effect loaderbtn" id="loaderbtn" style="display:none;"> <?php echo $bodycontent['btnTextLoader']; ?></span>
                                        </div>


                  
                                    </div>

                               

                                </div> 

                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
