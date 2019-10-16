<style type="text/css">
    
</style>

<script src="<?php echo(base_url());?>assets/js/adm_scripts/clinic_setup.js"></script>
<section class="content">
        <div class="container-fluid">
           
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2 class="head_title">
                                List of Clinic(s)
                                <a href="<?php echo base_url(); ?>clinicsetup/addClinic" class="">
                                <button type="button" class="btn bg-deep-purple waves-effect" style="float: right;">Add</button></a>
                            </h2>

                          <!--   <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="<?php echo base_url(); ?>clinicsetup/addClinic" class=" waves-effect waves-block">Add Clinic</a></li>
                                       
                                    </ul>
                                </li>
                            </ul> -->
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                               
                                    <table id="example" class="table table-bordered table-striped dataTables display dataTblDetailCls datatbl_style"  style="border-collapse: collapse !important;">
                                    <thead>
                                        <th style="width: 3%"></th>
                                        <th style="display: none;"> Clinic Id</th>
                                        <th> Clinic Name</th>
                                        <th> Clinic Code</th>
                                        <th style="width: 10%"> Contact No</th>
                                        <th> Address</th>
                                        <th style="width: 10%"> Status</th>
                                        <th style="width: 5%"> Action</th>
                                    </thead>
                                   
                                    <tbody>
                                        
   
                                        
                                      <?php
                                        $i = 1;
                                      foreach ($bodycontent['clinicList'] as $key => $value) 
                                      {

                                         $status = "";
                    if($value->is_active=="Y")
                    {
                      $status = '<div class="status_dv "><span class="btn btn-xs bg-light-green waves-effect clinicstatus" data-setstatus="N" data-clinicid="'.$value->clinic_id.'"><span class="glyphicon glyphicon-ok"></span> Active&nbsp;&nbsp;</span></div>';
                    }
                    else
                    {
                      $status = '<div class="status_dv"><span class=" btn btn-xs bg-red waves-effect clinicstatus" data-setstatus="Y" 
                      data-clinicid="'.$value->clinic_id.'"><span class="glyphicon glyphicon-remove"></span> Inactive</span></div>';
                    }
                                      ?>  
                                    <tr id="row_<?php echo $i;?>">
                                            <td ><?php //echo $value->clinic_id;?></td>
                                            <td style="display: none;"><?php echo $value->clinic_id;?></td>
                                            <td ><?php echo $value->clinic_name;?></td>
                                            <td ><?php echo $value->cliniccode;?></td>
                                            <td><?php echo $value->phno;?></td>
                                            <td><?php echo $value->address;?></td>
                                            <td><?php echo $status;?></td>
                                            <td>
                                        <a href="<?php echo base_url(); ?>clinicsetup/addClinic/<?php echo $value->clinic_id; ?>" class="btn btn-primary btn-xs" data-title="Edit">
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