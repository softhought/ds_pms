 <script src="<?php echo(base_url());?>assets/js/adm_scripts/dashboard.js"></script>
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
                                List of  <span id="todaytext">Today's Visit(s)</span>
                               
                            </h2>
                        
                         
                        </div><br>
                         <div class="row clearfix" id="visitlist">
                            <div class="col-sm-2"></div>
                               <div class="col-sm-2">
                                  <div class="form-group form-float">
                                    <div class="form-group">
                                    <label class="form-label labelvis">&nbsp;From Date</label> 
                                      <input type="text" class="form-control datepicker2" placeholder="" name="from_dt" id="from_dt" autocomplete="off" value="<?php echo date('d-m-Y',strtotime($bodycontent['from_dt'])); ?>" >  
                                          
                                    </div>
                                  </div>
                                 </div>
                                 <div class="col-sm-2">
                                  <div class="form-group form-float">
                                    <div class="form-group">
                                    <label class="form-label labelvis">&nbsp;To Date</label> 
                                      <input type="text" class="form-control datepicker2" placeholder="" name="to_date" id="to_date" autocomplete="off" value="<?php echo date('d-m-Y',strtotime($bodycontent['to_dt'])); ?>" >  
                                          
                                    </div>
                                  </div>
                                 </div>

                                 <div class="col-sm-2">
                                  <div class="form-group form-float">
                                    <div class="form-group">
                                    <label class="form-label labelvis">&nbsp;Type</label> 
                                     <select name="visitype" id="visitype" class="form-control">
                                            <!-- <option value="0"> &nbsp; </option> -->
                                            <?php 

                                            foreach ($bodycontent['visittype'] as $Visittype) {  ?>
                                            <option value="<?php echo $Visittype; ?>"> <?php echo $Visittype;?></option>

                                             <?php } ?>
                                                                      
                                              </select>
                                          
                                    </div>
                                  </div>
                                 </div>


                                 <div class="col-sm-2">
                                  <div class="form-group form-float" style="margin-top: 21px;">
                                    <div class="form-group">
                                    <label class="form-label labelvis">&nbsp;</label> 
                                     <button type="submit" class="btn bg-pink" id="visitView" >
                                           View
                                           </button> 
                                          
                                    </div>
                                  </div>
                                 </div>


                                  


                           
                           </div>
                        
                        <div class="body" >

                           <div style="display: none;text-align: center;" id="todayloader">
                                      <img src="<?php echo base_url(); ?>assets/images/verify_logo.gif">
                                    </div>

                            <div class="table-responsive" id="visitdata">
                               
                                    <table  class="table table-bordered table-striped dataTables display"  style="border-collapse: collapse !important;">
                                    <thead>
                                        <th style="width: 3%">Sl.No</th>
                                        <th style="width:15%"> Case No.</th>
                                        <th style="width:10%"> Name</th>
                                        <th style="width:10%">Mobile No.</th>
                                        <th style="width:10%"> Case Type</th>
                                        <th style="width:10%">Registration Date</th>
                                        <th style="width:10%">Last Visit Date</th>
                                        <th style="width: 5%"> Action</th>
                                    </thead>
                                    
                                                                      
                                    <tbody>
                                  
                                        
                                      <?php
                                       $sl=1;
                                      foreach ($bodycontent['todayVisitdata'] as $todayVisitdata) 
                                      {

                                        
                                      ?>  
                                    <tr>
                                            <td ><?php echo $sl++;?></td>
                                            <td ><?php echo $todayVisitdata['case_no'];?></td>
                                            <td ><?php echo $todayVisitdata['patientname'];?></td>
                                          
                                            <td ><?php echo $todayVisitdata['selfmobile'];?></td>
                                            <td ><?php echo $todayVisitdata['major_group'];?></td>
                                            <td ><?php echo date('d-m-Y',strtotime($todayVisitdata['reg_date']));?></td>
                                            <td ><?php  if($todayVisitdata['last_visit_date'] != ''){    echo date('d-m-Y',strtotime($todayVisitdata['last_visit_date'])); ?> <span id="circledrw"><?php echo $todayVisitdata['no_of_visit']; ?></span><?php } ?></td>
                                          
                                          
                                            <td>
                                               <?php if($todayVisitdata['major_group'] == 'Obstetrics'){ ?>

                                               <a href="<?php echo base_url(); ?>patientcase/addPatientCase/<?php echo $todayVisitdata['case_master_id']; ?>" class="btn btn-primary btn-xs" data-title="Edit">

                                              <?php }elseif($todayVisitdata['major_group'] = 'Gynaccology'){ ?>

                                                <a href="<?php echo base_url(); ?>gynccology/addEdit/<?php echo $todayVisitdata['case_master_id']; ?>" class="btn btn-primary btn-xs" data-title="Edit">
                                              
                                              <?php }else{  ?>

                                               <a href="<?php echo base_url(); ?>patientcase/addPatientCase/<?php echo $todayVisitdata['case_master_id']; ?>" class="btn btn-primary btn-xs" data-title="Edit">

                                              <?php } ?>  
 
                                            <span class="viewsty">view</span>
                                          </a>
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