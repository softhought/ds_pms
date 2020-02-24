 <script src="<?php echo(base_url());?>assets/js/adm_scripts/dashboard.js"></script>
 <script src="<?php echo(base_url());?>assets/js/adm_scripts/case_addedit.js"></script>

<style>
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
                                      foreach ($todayPreopdata as $todayPreopdata) 
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
                           
                     

                          