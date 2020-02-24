 <script src="<?php echo(base_url());?>assets/js/adm_scripts/dashboard.js"></script>

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
                                        <th style="width:10%">Last Visit Date</th>
                                        <th style="width: 5%"> Action</th>
                                    </thead>
                                   
                                     <tbody>
                                  
                                        
                                      <?php
                                       $sl=1;
                                      foreach ($todayVisitdata as $todayVisitdata) 
                                      {

                                        
                                      ?>  
                                    <tr>
                                            <td ><?php echo $sl++;?></td>
                                            <td ><?php echo $todayVisitdata['case_no'];?></td>
                                            <td ><?php echo $todayVisitdata['patientname'];?></td>
                                          
                                            <td ><?php echo $todayVisitdata['selfmobile'];?></td>
                                            <td ><?php echo $todayVisitdata['major_group'];?></td>
                                            <td ><?php echo date('d-m-Y',strtotime($todayVisitdata['reg_date']));?></td>
                                            <td ><?php  if($todayVisitdata['last_visit_date'] != '') { echo date('d-m-Y',strtotime($todayVisitdata['last_visit_date']));  ?> <span id="circledrw"><?php echo $todayVisitdata['no_of_visit']; ?></span><?php } ?></td>
                                          
                                          
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
                                      $sl++;
                                }?>
                                    </tbody>
                                </table>
                           
                     

                          