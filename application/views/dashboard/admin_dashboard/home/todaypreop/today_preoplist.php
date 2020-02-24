 <script src="<?php echo(base_url());?>assets/js/adm_scripts/dashboard.js"></script>
 <script src="<?php echo(base_url());?>assets/js/adm_scripts/case_addedit.js"></script>

<style>
    .viewsty{
        padding: 8px;
        font-size: 15px;
    }

    #visitlist .form-control{
        border: 1px solid #fdc8e3;
        border-radius: 4px;
    }
    #visitlist .form-line .form-float{
         border: 1px solid #fdc8e3;
         border-bottom: none;
    }
    #visitlist .form-group .form-control {
    text-indent: 5px;
    }
   
    .labelvis{
       
        top: 11px;
        
          }
     .errcolor{
        border-bottom-color: red; 
     }

  #circledrw {
     height: 25px;
     width: 25px;
     background-color: #E91E63;
     border-radius: 50%;
     display: inline-block;
     padding-top: 3px;
     color:white;
     margin-left: 37px;
     text-align: center;
 
  }

</style>

<section class="content">
        <div class="container-fluid">
           
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2 class="head_title">
                                List of  <span id="preoptext">Today's Preop(s)</span>
                               
                            </h2>
                        
                         
                        </div><br>
                        
                         <div class="row clearfix" id="visitlist">

                            <div class="col-sm-2"></div>
                               <div class="col-sm-2">
                                  <div class="form-group form-float">
                                    <div class="form-group">
                                    <label class="form-label labelvis">&nbsp;From Date</label> 
                                      <input type="text" class="form-control datepicker2" placeholder="" name="preop_from_dt" id="preop_from_dt" autocomplete="off" value="<?php echo date('d-m-Y',strtotime($bodycontent['from_dt'])); ?>" >  
                                          
                                    </div>
                                  </div>
                                 </div>
                                 <div class="col-sm-2">
                                  <div class="form-group form-float">
                                    <div class="form-group">
                                    <label class="form-label labelvis">&nbsp;To Date</label> 
                                      <input type="text" class="form-control datepicker2" placeholder="" name="preop_to_date" id="preop_to_date" autocomplete="off" value="<?php echo date('d-m-Y',strtotime($bodycontent['to_dt'])); ?>" >  
                                          
                                    </div>
                                  </div>
                                 </div>

                              

                                 <div class="col-sm-2">
                                  <div class="form-group form-float" style="margin-top: 21px;">
                                    <div class="form-group">
                                    <label class="form-label labelvis">&nbsp;</label> 
                                     <button type="submit" class="btn bg-pink" id="todaypreop" >
                                           View
                                           </button> 
                                          
                                    </div>
                                  </div>
                                 </div>


                                  


                           
                           </div>
                        
                        <div class="body" >

                           <div style="display: none;text-align: center;" id="todaypreoploader">
                                      <img src="<?php echo base_url(); ?>assets/images/verify_logo.gif">
                                    </div>

                            <div class="table-responsive" id="preopdata">
                               
                                    <table  class="table table-bordered table-striped dataTables display"  style="border-collapse: collapse !important;">
                                    <thead>
                                        <th style="width: 3%">Sl.No</th>
                                        <th style="width:15%"> Case No.</th>
                                        <th style="width:10%"> Name</th>
                                        <th style="width:10%">Mobile No.</th>
                                        <th style="width:10%"> Case Type</th>
                                        <th style="width:10%">Registration Date</th>
                                        <th style="width:10%">Preop Date</th>
                                        <th style="width: 5%"> Action</th>
                                    </thead>
                                    
                                                                      
                                    <tbody>
                                  
                                        
                                      <?php
                                       $sl=1;
                                      foreach ($bodycontent['todayPreopdata'] as $todayPreopdata) 
                                      {

                                        
                                      ?>  
                                    <tr>
                                            <td ><?php echo $sl++;?></td>
                                            <td ><?php echo $todayPreopdata->case_no;?></td>
                                            <td ><?php echo $todayPreopdata->patientname;?></td>
                                          
                                            <td ><?php echo $todayPreopdata->selfmobile;?></td>
                                            <td ><?php echo $todayPreopdata->major_group;?></td>
                                            <td ><?php echo date('d-m-Y',strtotime($todayPreopdata->reg_date));?></td>
                                            <td ><?php  if($todayPreopdata->created_on != ''){    echo date('d-m-Y',strtotime($todayPreopdata->created_on)); ?> <?php } ?></td>
                                          
                                          
                                            <td>
                                               <?php if($todayPreopdata->major_group == 'Obstetrics'){ ?>

                                                <button type="button" class="btn btn-primary btn-xs redirectbtn" data-url = "<?php echo base_url(); ?>patientcase/addPatientCase/<?php echo $todayPreopdata->case_master_id; ?>/preop"  style="padding: 3px 15px;">View</button> 

                                              <?php }elseif($todayPreopdata->major_group = 'Gynaccology'){ ?>

                                                <button type="button" class="btn btn-primary btn-xs redirectbtn" data-url = "<?php echo base_url(); ?>gynccology/addEdit/<?php echo $todayPreopdata->case_master_id; ?>/preop" style="padding: 3px 15px;">View</button>
                                              
                                              <?php }else{  ?>

                                              <button type="button" class="btn btn-primary btn-xs redirectbtn" data-url = "<?php echo base_url(); ?>gynccology/addEdit/<?php echo $todayPreopdata->case_master_id; ?>/preop" style="padding: 3px 15px;">View</button>

                                              <?php } ?>  
 
                                           
                                            </td>
                                           
                                        </tr>
                                    <?php 
                                      
                                }?>
                                    </tbody>
                                </table>
                           
                             

                           </div>

                            

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
          

        </div>
    </section>