<script src="<?php echo(base_url());?>assets/js/adm_scripts/anaesthesiologist.js"></script>
<style type="text/css">
    
</style>


<section class="content">
        <div class="container-fluid">
           
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2 class="head_title">
                                List of Anaesthesiologist(s)
                                <a href="<?php echo base_url(); ?>anaesthesiologist/addAnaesthesiologist" class="">
                                <button type="button" class="btn bg-deep-purple waves-effect" style="float: right;">Add</button></a>
                            </h2>

                         
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                               
                                    <table  class="table table-bordered table-striped dataTables display"  style="border-collapse: collapse !important;">
                                    <thead>
                                        <th style="width: 3%">Sl.No</th>
                                        <th style="width:15%"> Name</th>
                                        <th style="width:5%"> Degree</th>
                                                                         
                                        <th style="width: 10%"> Status</th>
                                        <th style="width: 5%"> Action</th>
                                    </thead>
                                   
                                    <tbody>
                                        <?php $i=1;
                                          foreach ($bodycontent['anaesthesiologistList'] as $key => $value) { 

                                       
                                         $status = "";
                    if($value->is_active=="Y")
                    {
                      $status = '<div class="status_dv "><span class="btn btn-xs bg-light-green waves-effect anethstatus" data-setstatus="N" data-anethid="'.$value->id.'"><span class="glyphicon glyphicon-ok"></span> Active&nbsp;&nbsp;</span></div>';
                    }
                    else
                    {
                      $status = '<div class="status_dv"><span class=" btn btn-xs bg-red waves-effect anethstatus" data-setstatus="Y" 
                      data-anethid="'.$value->id.'"><span class="glyphicon glyphicon-remove"></span> Inactive</span></div>';
                    }
                                   


                                            ?>
                                        <tr>
                                             <td><?php echo $i++; ?></td>
                                             <td><?php echo $value->name; ?></td>
                                             <td><?php echo $value->degree; ?></td>
                                            <td><?php echo $status;?></td>
                                             <td> <a href="<?php echo base_url(); ?>anaesthesiologist/addAnaesthesiologist/<?php echo $value->id; ?>" class="btn btn-primary btn-xs" data-title="Edit">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                          </a></td>
                                        </tr>
                                           
                                            
                                        <?php } ?>
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