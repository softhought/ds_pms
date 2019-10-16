<style type="text/css">
   .invest{
    padding: 5px 22px 5px 22px;
    font-size: 14PX;
    border: none;
    cursor: auto;
    margin-bottom: 5px;
    white-space: unset;
   } 
</style>

<script src="<?php echo(base_url());?>assets/js/adm_scripts/investigationpanel.js"></script>
<section class="content">
        <div class="container-fluid">
           
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2 class="head_title">
                                List of Investigation Panel(s)
                                <a href="<?php echo base_url(); ?>Investigationpanel/addInvestigationPanel" class="">
                                <button type="button" class="btn bg-deep-purple waves-effect" style="float: right;">Add</button></a>
                            </h2>

                         
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                               
                                    <table  class="table table-bordered table-striped dataTables display"  style="border-collapse: collapse !important;">
                                    <thead>
                                        <th style="width: 3%">Sl.No</th>
                                        <th style="width:15%"> Panel</th>
                                        <th style="width:15%"> Investigation</th>
                                        <!--  <th style="width: 10%">Instruction</th> -->                                
                                        
                                        <th style="width: 5%"> Action</th>
                                    </thead>
                                   
                                    <tbody>
                                      <?php 
                                      $i=1;
                                      foreach ($bodycontent['investigationpanel'] as $investigationpanel) { 

                                     $investigat = $this->IN->getinvestigation($investigationpanel->investigation);
                                         

                                        ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $investigationpanel->panel_name; ?></td>
                                <td><?php
                                 foreach ($investigat as $investigat) {


                                   
                                    ?>
                            <button class="label label-warning invest"><?php echo $investigat->inv_component_name; ?></button> 

                             <?php   }  ?></td>
                                            
                                            <!-- <td>
                                                <?php if(!empty($investigationpanel->instruction)){
                                                 $vardata = explode('*', $investigationpanel->instruction);
                                                
                                                $m=1;

                                                for ($j=0; $j < count($vardata) ; $j++) { 
                                                    
                                                    echo $m.".".  $vardata[$j];
                                                    echo "<br>";
                                              $m++;  } }
                                                 ?>
                                                    
                                                </td> -->
                                            <td> <a href="<?php echo base_url(); ?>Investigationpanel/addInvestigationPanel/<?php echo $investigationpanel->id; ?>" class="btn btn-primary btn-xs" data-title="Edit">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                          </a></td>
                                        </tr>
                                         
                                    <?php   } ?>  
   
                                      
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