
<script src="<?php echo(base_url());?>assets/js/adm_scripts/chnagepassword.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

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


</style>
 <form class="form-area" name="passwordForm" id="passwordForm">
 	
                          
    <section class="content smallContainerCenter">
        <div class="container-fluid">
            <div class="row clearfix">
                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2 class="head_title">Change Password
                                  
                                </h2>                           
                         
                            </div>
                            <div class="body">
                                <div class="demo-masked-input">
                                    <div class="row clearfix">
                                        <div class="col-sm-10" style="margin-right: -29px;">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    

                                                    <input type="Password" class="form-control" name="currpassword" id="currpassword" autocomplete="off">
                                                    <label class="form-label">Current Password</label>
                                                    
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
                                                    

                                                    <input type="Password" class="form-control" name="newpassword" id="newpassword" autocomplete="off">
                                                    <label class="form-label">New Password</label>
                                                    
                                                  </div>
                                                   </div>
                                                   </div>

                                                 
                                                    </div>
                                   
                                           <div class="row clearfix">
                                           <div class="col-sm-10" style="margin-right: -29px;">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    

                                                    <input type="Password" class="form-control" name="repeatpassword" id="repeatpassword" autocomplete="off">
                                                    <label class="form-label">Repeat Password</label>
                                                    
                                                  </div>
                                                   </div>
                                                   </div>

                                                   </div>
                                                  

                                                                 
                                                                             
                            

                                <p id="passwordmsg" class="form_error"></p>

                                    <div class="row clearfix">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="margin-left: 36%;">
                                            
                                              <button type="submit" class="btn btn-block btn-lg btn-primary waves-effect" id="savebtn" disabled="true">Save</button> 

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
