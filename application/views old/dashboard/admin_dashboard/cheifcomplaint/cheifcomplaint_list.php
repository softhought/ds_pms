<style type="text/css">
   
</style>

<script src="<?php echo(base_url());?>assets/js/adm_scripts/gynaccologycomplaints.js"></script>
<section class="content">
        <div class="container-fluid">
           
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2 class="head_title">
                                List of Gynaccology Chief Complaints(s)
                                <a href="<?php echo base_url(); ?>chiefcomplaint/addComplaint" class="">
                                <button type="button" class="btn bg-deep-purple waves-effect" style="float: right;">Add</button></a>
                            </h2>

                         
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                               
                                    <table  class="table table-bordered table-striped dataTables display"  style="border-collapse: collapse !important;">
                                    <thead>
                                        <th style="width: 3%">Sl.No</th>
                                        <th style="width:15%">Complaints</th>
                                                                                                             
                                         <th style="width:15%">Parrent Name</th>
                                        <th style="width: 5%"> Action</th>
                                    </thead>
                                   
                                    <tbody>
                                     <?php  $i=1;
                                      foreach ($bodycontent['gyncomplaintslist'] as $gyncomplaintslist) {  ?>
                                      <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $gyncomplaintslist->complaint_name; ?></td>
                                        <td><?php if($gyncomplaintslist->is_parrent =='C'){
                                           $parrent = $this->GY->parrentname($gyncomplaintslist->parrent_id);
                                           echo $parrent->complaint_name;
                                        } ?>
                                            
                                        </td>
                                        <td> <a href="<?php echo base_url(); ?>chiefcomplaint/addComplaint/<?php echo $gyncomplaintslist->id; ?>" class="btn btn-primary btn-xs" data-title="Edit">
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