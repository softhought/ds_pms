<?php// pre($bodycontent['DaysList']); ?>
<script src="<?php echo(base_url());?>assets/js/adm_scripts/clinic_setup.js"></script>
<style>
.width18{
    width: 23% !important;
}
</style>
    <section class="content mediumContainerCenter">
        <div class="container-fluid">
            <div class="row clearfix">
                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>Clinic Details</h2>                           
                                <ul class="header-dropdown m-r--5">
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                                            <i class="material-icons">more_vert</i>
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="<?php base_url(); ?>Clinicsetup/ClinicList" class=" waves-effect waves-block">List</a></li>
                                            
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="body">
                                <div class="demo-masked-input">
                                    <div class="row clearfix">
                                        <div class="col-sm-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control">
                                                    <label class="form-label">Clinic Name</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control">
                                                    <label class="form-label">Contact Number</label>
                                                </div>
                                            </div>
                                        </div>                                        
                                        <div class="col-sm-12">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <textarea rows="1" class="form-control no-resize auto-growth"  style="overflow: hidden; overflow-wrap: break-word; height: 32px;"></textarea>
                                                    <label class="form-label">Clinic Address</label>
                                                </div>
                                            </div>
                                        </div>                                        
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <b>Visiting Day</b>
                                                <select class="form-control show-tick" data-live-search="true" tabindex="-98">
                                                    <option></option>
                                                    <?php foreach ($bodycontent['DaysList'] as $value) { 
                                                        echo "<option value='".$value->day_id."'>".$value->day_name."</option>";
                                                     } ?>
                                                </select>   
                                            </div>
                                        </div>
                                        <div class="col-sm-2">                                            
                                            <div class="demo-checkbox">
                                                <label ></label>  
                                                <input type="checkbox" id="basic_checkbox_1" >
                                                <label for="basic_checkbox_1">By Appointment</label>  
                                            </div>
                                        </div>
                                        <div class="col-md-3 width18 demo-masked-input">
                                            <b>Time Form</b>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">access_time</i>
                                                </span>
                                                <div class="form-line">
                                                    <input type="text" class="form-control time12" placeholder="Ex:11:59 pm">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 width18 demo-masked-input">
                                            <b>Time To</b>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">access_time</i>
                                                </span>
                                                <div class="form-line">
                                                <input type="text" class="form-control time12" placeholder="Ex:11:59 pm">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1"> 
                                            <button type="button" class="btn bg-cyan  btn-circle waves-effect waves-circle waves-float">
                                                <i class="material-icons">add</i>
                                            </button>                                           
                                            <!-- <button type="button" class="btn btn-danger  btn-circle waves-effect waves-circle waves-float">
                                                <i class="material-icons">remove</i>
                                            </button> -->
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="margin-left: 36%;">
                                            <button type="button" class="btn btn-block btn-lg btn-primary waves-effect">Save</button>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
