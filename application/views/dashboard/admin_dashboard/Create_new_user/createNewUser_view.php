
<script src="<?php echo(base_url());?>assets/js/adm_scripts/createnewuser.js"></script>


<style>
.width18{
    width: 23% !important;

}
.table tbody tr td, .table tbody tr th {
   
    border-top: 1px solid #f0c7f9;
border-bottom: 1px solid #f0c7f9;
}

@media (max-width: 767px) {
    .table-responsive .dropdown-menu {
        position: static !important;
    }
}
@media (min-width: 768px) {
    .table-responsive {
        overflow: visible;
    }


}
.svemsg{
  text-align: center;
  color:#6a8434;
  font-size: 15px;
}

</style>
 <form class="form-area" name="createNewUserForm" id="createNewUserForm">
 	
                          
    <section class="content smallContainerCenter">
        <div class="container-fluid">
            <div class="row clearfix">
                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2 class="head_title">Create New User
                                  
                                </h2>                           
                         
                            </div>
                            <div class="body">
                                <div class="demo-masked-input">
                                    <div class="row clearfix">
                                        <div class="col-sm-10" style="margin-right: -29px;">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    

                                                    <input type="text" class="form-control" name="name" id="name" autocomplete="off">
                                                    <label class="form-label">Name</label>
                                                    
                                                  </div>
                                                   </div>
                                                   </div>

                                                  <div class="col-sm-2">

                                                         <span class="glyphicon glyphicon-ok showtrue" aria-hidden="true" style="display: none;color: green;"></span>

                                                   
                                                   </div>

                                                    </div>

                                           <div class="row clearfix">
                                        <div class="col-sm-10" style="margin-right: -29px;">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    

                                                    <input type="text" class="form-control" name="user_name" id="user_name" autocomplete="off" style="text-transform: lowercase;">
                                                    <label class="form-label">UserName</label>
                                                    
                                                  </div>
                                                   </div>
                                                   </div>

                                                  <div class="col-sm-2">

                                                         <span class="glyphicon glyphicon-ok showtrue" aria-hidden="true" style="display: none;color: green;"></span>

                                                   
                                                   </div>

                                                    </div>         
                                      
                                       <div class="row clearfix">
                                        <div class="col-sm-10" style="margin-right: -29px;">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                      
                                                    <input type="Password" class="form-control" name="userpassword" id="userpassword" autocomplete="off">
                                                    <label class="form-label">Password</label>
                                                    
                                                       </div>
                                                       </div>
                                                    </div>
                                                 
                                                    </div>

                                        <div class="row clearfix">
                                          <div class="col-sm-10">
                                                <div class="form-group form-float">
                                                    <div class="input-group">
                                                     <label class="form-label">User Type</label>
                                                         <select name="user_type" id="user_type" class="form-control show-tick" data-live-search="true" tabindex="-98">
                                                          <option value="">&nbsp;</option>
                                                          
                                                          <?php foreach ($bodycontent['userrole'] as $userrole) {  ?>

                                                               <option value="<?php echo $userrole->role_id; ?>"><?php echo $userrole->role; ?></option>
                                                            
                                                         <?php } ?>
                                                             
                                                         </select>   
                                                 
                                                       </div>  
                                                    </div>
                                                  </div>
                                              </div> 

                                         <div class="row clearfix" id="drregno" style="display: none;">
                                        <div class="col-sm-10" style="margin-right: -29px;">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                      
                                                    <input type="text" class="form-control" name="dr_reg_no" id="dr_reg_no" autocomplete="off">
                                                    <label class="form-label">Registration No.</label>
                                                    
                                                       </div>
                                                       </div>
                                                    </div>
                                                 
                                                    </div>                      
                                   
                               

                                <p id="newcreationusermsg" class="form_error"></p>

                                    <div class="row clearfix">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="margin-left: 36%;">
                                            
                                              <button type="submit" class="btn btn-block btn-lg btn-primary waves-effect" id="savebtn" >Save</button> 

                                                </div>


                  
                                    </div>

                                  <div class="row clearfix" id="crenewuser" style="display: none;">
                                    <div class="col-sm-12">
                                      <p id="datasavemsg" class="svemsg"></p>
                                    </div>
                                  </div>  

                                </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
