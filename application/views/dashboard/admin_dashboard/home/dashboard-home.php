    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">CLINIC</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $bodycontent['clinicCount']?>" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">more</i>
                        </div>
                        <div class="content">
                            <div class="text">CASE</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $bodycontent['caseCount']?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                            <div class="text">TODAY VISIT</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $bodycontent['todayVisit']?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">child_care</i>
                        </div>
                        <div class="content">
                            <div class="text">BABY BORN</div>
                            <div class="number count-to" data-from="0" data-to="00" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
         
         
<div class="jumbotron" style="text-align: center;">
 
  <p style="color: #f44336;">Clinic: <?php echo $bodycontent['clinicName'];?></p>
</div>
       
        </div>
    </section>