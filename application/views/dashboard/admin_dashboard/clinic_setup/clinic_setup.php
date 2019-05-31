<?php// pre($bodycontent['DaysList']); ?>
<script src="<?php echo(base_url());?>assets/js/adm_scripts/clinic_setup.js"></script>

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
 <form class="form-area" name="ClinicForm" id="ClinicForm" enctype="multipart/form-data">
  <input type="hidden" name="mode" id="mode" value="<?php echo $bodycontent['mode']; ?>" />
   <input type="hidden" name="clinicID" id="clinicID" value="<?php echo $bodycontent['clinicID']; ?>" />
              
    <section class="content mediumContainerCenter">
        <div class="container-fluid">
            <div class="row clearfix">
                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2 class="head_title">Clinic Details
                                   <a href="<?php echo base_url(); ?>clinicsetup/" class="">
                                <button type="button" class="btn bg-deep-purple waves-effect" style="float: right;">List </button></a>

                                </h2>                           
                              <!--   <ul class="header-dropdown m-r--5">
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                                            <i class="material-icons">list</i>
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="<?php echo base_url(); ?>clinicsetup" class=" waves-effect waves-block">List</a></li>
                                            
                                        </ul>
                                    </li>
                                </ul> -->
                            </div>
                            <div class="body">   
                                <div class="demo-masked-input">
                                    <div class="row clearfix">
                                        <div class="col-sm-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="clinicname" id="clinicname" autocomplete="off" value="<?php if($bodycontent['mode']=="EDIT"){echo $bodycontent['clinicEditdata']->clinic_name;}?>" >
                                                    <label class="form-label">Clinic Name</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="contactno" id="contactno" autocomplete="off" onKeyUp="numericFilter(this);" 
                                                    value="<?php if($bodycontent['mode']=="EDIT"){echo $bodycontent['clinicEditdata']->phno;}?>">
                                                    <label class="form-label">Contact Number</label>
                                                </div>
                                            </div>
                                        </div>     
                                         <div class="col-sm-3">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="cliniccode" id="cliniccode" autocomplete="off" 
                                                    value="<?php if($bodycontent['mode']=="EDIT"){echo $bodycontent['clinicEditdata']->cliniccode;}?>" maxlength="3"  style="text-transform:uppercase" <?php if($bodycontent['mode']=="EDIT"){echo 'readonly';}?>>
                                                    <label class="form-label">Clinic Code </label>
                                                </div>
                                            </div>
                                        </div>                                    
                                        <div class="col-sm-12">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <textarea rows="1" name="address" id="address" class="form-control no-resize auto-growth"  style="overflow: hidden; overflow-wrap: break-word; height: 32px;" autocomplete="off"
                                                      > <?php if($bodycontent['mode']=="EDIT"){echo $bodycontent['clinicEditdata']->address;}?></textarea>
                                                    <label class="form-label">Clinic Address</label>
                                                </div>
                                            </div>
                                        </div>                                        
                                    </div>


             


                        <div  style="padding: 5px;">
                <!-- ---------------------------------start add time slot ------------------------------------- -->

                <div class="row">
                              
                               <div class="col-md-6 col-sm-12 col-xs-12" style="margin-bottom: 10px;">
                                 <button type="button" class="btn btn-sm btn-warning addVisitingDay">
                                   <span class="glyphicon glyphicon-plus" style="margin-top: 0px;"></span> Add Visiting Day
                                 </button>
                               </div>
                      </div>  
                 
                  <div id="detail_timeslot" style="#border: 1px solid #e49e9e;">
                    <div class="table-responsive">
                           <?php
                          $rowno=0;
                          $detailCount = 0;
                          if($bodycontent['mode']=="EDIT")
                          {
                           $detailCount = sizeof($bodycontent['clinicDetailsEditdata']);
                          }

                          // For Table style Purpose
                          if($bodycontent['mode']=="EDIT" && $detailCount>0)
                          {
                            $style_var = "display:block;width:100%;";
                          }
                          else
                          {
                            $style_var = "display:none;width:100%;";
                          }
                        ?>

                    
                    <table class="table  no-footer" style="<?php echo $style_var; ?>">
                        <thead>
                           
                        </thead>
                        <tbody>

                            <?php

                if($detailCount>0)
                {
                  foreach ($bodycontent['clinicDetailsEditdata'] as $key => $value) 
                  {
                    $rowno++;
                    
                ?>
                
                <tr id="rowDocument_<?php echo $rowno; ?>" class="row clearfix">

                        <td> 
                            <div class="input-group selectdayerr" id="selectdayerr_<?php echo $rowno; ?>">
                            <label>Visiting Day</label>
                               <select name="selectDay[]" id="selectDay_<?php echo $rowno; ?>" class="form-control show-tick  selectDay" data-live-search="true" tabindex="-98">
                                <option value="0"> Select Day</option>
                                 <?php foreach ($bodycontent['DaysList'] as $daylist) {  ?>
                                    <option value="<?php echo $daylist->day_id?>"
                                        
                                        <?php if(($bodycontent['mode']=="EDIT") && $value->day_id==$daylist->day_id){echo "selected";}else{echo "";} ?>

                                        ><?php echo $daylist->day_name?></option>
                                 <?php     } ?>
                               </select>   
                           </div>                
                                    
                        </td>

                         <td style="width:20%;text-align: center;"> 
                         <div class="1demo-checkbox">
                         <label >By Appointment&nbsp;</label>  <br>
                           <input type="checkbox" name="basic_checkbox[]" id="basic_checkbox_<?php echo $rowno; ?>" class="chk" <?php if(($bodycontent['mode']=="EDIT") && $value->is_by_appointment=='Y'){echo "checked";}else{echo "";} ?> >

                              <label for="basic_checkbox_<?php echo $rowno; ?>"></label>  
                             </div>  
                              

                        </td> 

                         <td> <input type="hidden" name="byAppoint[]" id="byAppoint_<?php echo $rowno; ?>" value="<?php if($bodycontent['mode']=="EDIT"){echo $value->is_by_appointment;}?>" >
                             
                          <b>Time Form</b>
                           <div class="input-group fromTimeerr" id="fromTimeerr_<?php echo $rowno; ?>">
                             <span class="input-group-addon">
                              <i class="material-icons">access_time</i>
                               </span>
                             <div class="form-line">
                               <input type="text" name="timefrom[]" id="timefrom_<?php echo $rowno; ?>" class="form-control selecttime" placeholder="Ex:11:59 pm" value="<?php if($bodycontent['mode']=="EDIT"){echo $value->from_time;}?>">
                                 </div>
                             </div>
                                      
                        </td>

                    <td>
                     <b>Time To</b>
                  <div class="input-group fromToerr" id="fromToerr_<?php echo $rowno; ?>">
                    <span class="input-group-addon">
                     <i class="material-icons">access_time</i>  </span>
                  <div class="form-line">
                  <input type="text" name="timeto[]" id="timeto_<?php echo $rowno; ?>" class="form-control selecttime" placeholder="Ex:11:59 pm" value="<?php if($bodycontent['mode']=="EDIT"){echo $value->to_time;}?>">
                   </div>
                    </div>
                        </td>  
                 
             
                </tr>


              <?php   
                  }
                }

                  ?>
                    <input type="hidden" name="rowno" id="rowno" value="<?php echo $rowno;?>">      
                    
                        </tbody>
                    </table>
                        
                    </div>
                  
                    
                  </div>
                   <!-- end of detail_timeslot -->
                <!-- ---------------------------------end add time slot---------------------------------------- -->
                </div>





                <!--   <div class="row clearfix">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Visiting Day</label>
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
                                                                         
                                            <button type="button" class="btn btn-danger  btn-circle waves-effect waves-circle waves-float">
                                                <i class="material-icons">remove</i>
                                            </button>
                                        </div>
                                    </div>
 -->

                       <!--  <input type="text" class="form-control selecttime" placeholder="Time"> -->
                   

                                     <p id="clinicmsg" class="form_error"></p>

                                    <div class="row clearfix">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="margin-left: 36%;">
                                            
                                              <button type="submit" class="btn btn-block btn-lg btn-primary waves-effect" id="clinicsavebtn"><?php echo $bodycontent['btnText']; ?></button> 

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
