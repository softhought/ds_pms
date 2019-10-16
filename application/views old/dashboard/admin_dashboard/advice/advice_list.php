<style type="text/css">
    
</style>

<script src="<?php echo(base_url());?>assets/js/adm_scripts/advice.js"></script>
<section class="content">
        <div class="container-fluid">
           
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2 class="head_title">
                                List of Advice(s)
                                <a href="<?php echo base_url(); ?>advice/addAdvice" class="">
                                <button type="button" class="btn bg-deep-purple waves-effect" style="float: right;">Add</button></a>
                            </h2>

                         
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                               
                                    <table  class="table table-bordered table-striped dataTables display"  style="border-collapse: collapse !important;">
                                    <thead>
                                        <th style="width: 3%">Sl.No</th>
                                        <th style="width:40%"> Advice</th>
                                        <th style="width:10%"> Advice Type</th>
                                        <th style="width:5%"> Type Sl</th>
                                        <th style="width:20%"> Options</th>
                                  
                                        <th style="width: 5%"> Status</th>
                                        <th style="width: 5%"> Action</th>
                                    </thead>
                                   
                                    <tbody>
                                        
   
                                        
                                      <?php
                                        $i = 1;$sl=1;
                                      foreach ($bodycontent['adviceList'] as $key => $value) 
                                      {

                                         $status = "";
                    if($value->is_active=="Y")
                    {
                      $status = '<div class="status_dv "><span class="btn btn-xs bg-light-green waves-effect advstatus" data-setstatus="N" data-adviceid="'.$value->advice_id.'"><span class="glyphicon glyphicon-ok"></span> Active&nbsp;&nbsp;</span></div>';
                    }
                    else
                    {
                      $status = '<div class="status_dv"><span class=" btn btn-xs bg-red waves-effect advstatus" data-setstatus="Y" 
                      data-adviceid="'.$value->advice_id.'"><span class="glyphicon glyphicon-remove"></span> Inactive</span></div>';
                    }
                                      ?>  
                                    <tr id="row_<?php echo $i;?>">
                                            <td ><?php echo $sl++;?></td>
                                            <td ><?php echo $value->advice;?></td>
                                          
                                            <td ><?php 

                                            if($value->advice_type=="I"){
                                                echo 'I-General';
                                            }else if($value->advice_type=="III"){
                                                echo 'III-Optional';
                                            }else{
                                                echo $value->advice_type;
                                            }
                                           
                                            ?></td>
                                            <td ><?php echo $value->sl_no;?></td>
                                            <td ><?php 
                                            
                                           // echo $value->advice_options;
                                             echo str_replace(",","/",$value->advice_options);

                                        
                                            
                                            ?></td>
                                          
                                            <td><?php echo $status;?></td>
                                            <td>
                                        <a href="<?php echo base_url(); ?>advice/addAdvice/<?php echo $value->advice_id; ?>" class="btn btn-primary btn-xs" data-title="Edit">
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