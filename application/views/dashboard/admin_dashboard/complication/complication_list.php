<style type="text/css">
    
</style>

<script src="<?php echo(base_url());?>assets/js/adm_scripts/complication.js"></script>
<section class="content">
        <div class="container-fluid">
           
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2 class="head_title">
                                List of complication(s)
                                <a href="<?php echo base_url(); ?>complication/addComplication" class="">
                                <button type="button" class="btn bg-deep-purple waves-effect" style="float: right;">Add</button></a>
                            </h2>

                         
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                               
                                    <table  class="table table-bordered table-striped dataTables display"  style="border-collapse: collapse !important;">
                                    <thead>
                                        <th style="width: 3%">Sl.No</th>
                                        <th style=""> Complication</th>
                                    
                                  
                                        <th style="width: 10%"> Status</th>
                                        <th style="width: 5%"> Action</th>
                                    </thead>
                                   
                                    <tbody>
                                        
   
                                        
                                      <?php
                                        $i = 1;$sl=1;
                                      foreach ($bodycontent['complicationList'] as $key => $value) 
                                      {

                                         $status = "";
                    if($value->is_active=="Y")
                    {
                      $status = '<div class="status_dv "><span class="btn btn-xs bg-light-green waves-effect complicationstatus" data-setstatus="N" data-complicationid="'.$value->complication_id.'"><span class="glyphicon glyphicon-ok"></span> Active&nbsp;&nbsp;</span></div>';
                    }
                    else
                    {
                      $status = '<div class="status_dv"><span class=" btn btn-xs bg-red waves-effect complicationstatus" data-setstatus="Y" 
                      data-complicationid="'.$value->complication_id.'"><span class="glyphicon glyphicon-remove"></span> Inactive</span></div>';
                    }
                                      ?>  
                                    <tr id="row_<?php echo $i;?>">
                                            <td ><?php echo $sl++;?></td>
                                            <td ><?php echo $value->complication_name;?></td>
                                          
                                          
                                          
                                            <td><?php echo $status;?></td>
                                            <td>
                                        <a href="<?php echo base_url(); ?>complication/addComplication/<?php echo $value->complication_id; ?>" class="btn btn-primary btn-xs" data-title="Edit">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                          </a>
                                            </td>
                                           
                                        </tr>
                                    <?php 
                                      $i++;
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