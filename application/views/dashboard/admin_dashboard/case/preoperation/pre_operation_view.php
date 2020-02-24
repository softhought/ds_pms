<script src="<?php echo(base_url());?>assets/js/admin.js"></script>   
<script src="<?php echo(base_url());?>assets/js/adm_scripts/preoperation.js"></script>   

 

<?php
    $CI =& get_instance();
   
?>
<style>
  .disp{
    display: block;
  }
  .errcl{
     border-bottom: 2px solid red;
  }
</style>

  



                  <!-- <center><h3> Pre Operation Section </h3></center> -->
                  
                  <!-- <div class="dropzone dz-clickable">
                        <div class="dz-message">
                            <div class="drag-icon-cph">
                              <i class="material-icons thmTxtcolor2">pregnant_woman</i>
                            </div>
                            <h3 class="txtColorGrey">Pre Operation Section</h3>
                            <em class="txtColorGrey">(Upcoming section)</em>
                        </div>
                  </div> -->

  <div class="row clearfix" style="#border: 1px solid gray;"> 
          <div class="col-sm-2 leftmenuPatientCase">
                                        
                <button type="button" class="btn btn-block btn-xs waves-effect tab_lf_btn" id="preop_left_tab_menu_1"><span><i class="material-icons">assignment_ind</i></span>&nbsp;Basic Info</button>
                  <button type="button" class="btn btn-block btn-xs waves-effect tab_lf_btn" id="preop_left_tab_menu_2"><span><i class="material-icons">assignment_ind</i></span>&nbsp;For Patient</button>
                  <button type="button" class="btn btn-block btn-xs waves-effect tab_lf_btn" id="preop_left_tab_menu_3"><span><i class="material-icons">assignment_ind</i></span>&nbsp;For Hospital</button>
                   <button type="button" class="btn btn-block btn-xs waves-effect tab_lf_btn"  id="preop_left_tab_menu_4"><span><i class="material-icons">print</i></span>&nbsp;Print</button>
                                    
                                     
         </div>

  <div class="col-sm-10 rightContentBlock" style="border: 1px solid #eeecec;">
       <form class="form-area" name="preopForm" id="preopForm" >                             
                                   <!-- ======= start of preop_left_tab_menu_1_section ============ -->
   <section class="antenantalDataSection PreBlockSection" id="preop_left_tab_menu_1_section">
    <center class="headingtitile_patient"><h5 class="title_head">&#9733; Basic Info </h5></center>
                                <br>
        <input type="hidden" name="disterm_pregnancy_wks" id="disterm_pregnancy_wks" value="<?php if($mode == 'EDIT'){ echo $preoperationEditdata->disterm_pregnancy_wks; } ?>">
          <input type="hidden" name="disterm_pregnancy_days" id="disterm_pregnancy_days" value="<?php if($mode == 'EDIT'){ echo $preoperationEditdata->disterm_pregnancy_days; } ?>">

          <div id="basic_patient_info_div">
                                
                  
                         <div class="demo-masked-input">
                                   <div class="row clearfix" style="font-size: 16px;">
                                <input type="hidden" name="caseID" id="caseID" value="<?php echo $caseID; ?>">
                                <input type="hidden" name="preoprationId" id="preoprationId" value="<?php if($mode == 'EDIT'){echo  $preoperationEditdata->pre_op_id; }else {echo 0; } ?>">
                                                            
                                     <div class="col-sm-4">
                                                                               
                                    <label class="form-label" style="font-size: 16px;">Name : </label>
                                      <span style="color: #555;"><?php echo $patientmasterEditdata->patientname; ?></span>
                                                         
                                                   </div>

                                    <div class="col-sm-2">
                                       <label class="form-label" style="font-size: 16px;">Age : </label>
                                       <span style="color: #555;"><?php echo $patientmasterEditdata->patientage; ?> </span>
                                                        
                                            </div>
                                           
                                    <div class="col-sm-4">
                                       
                                         <label class="form-label" style="font-size: 16px;">Occupation : </label>
                                         <span style="color: #555;"><?php echo $occupation; ?></span>
                                                      
                                            </div>

                                    <div class="col-sm-2">
                                       
                                         <label class="form-label" style="font-size: 16px;">Blood Group : </label>
                                         <span style="color: #555;"><?php echo $bloodgroup; ?></span>
                                                      
                                            </div>       
                                                                                                           
                                       </div>   
                   
                   <div class="row clearfix">
                    <div class="col-sm-12">
                      <div style="color: black;">
                        <?php 
                              $antenantalCaseData = $antenantalCaseEditdata;
                              
                         if(!empty($antenantalCaseData)){ ?>    
                      <span class="spanhead" style="color: #c81b9d !important;"><b>History Summary :</b></span>
                    
                      <table width="100%"   class="demo_font" style="margin-left: 40px;margin-top: 10px;font-size: 15px;" >
                            
                           
                             <tr>
                            <?php if($antenantalCaseData->lmp_date!=""){ ?>    
                          
                            <td>LMP Date :  <?php echo date('d-m-Y',strtotime($antenantalCaseData->lmp_date)); ?>&emsp;&emsp;</td>
                               
                           
                            <?php } ?>

                             <?php if($antenantalCaseData->edd_date!=""){ ?>    
                            
                                <td>EDD Date :  <?php echo date('d-m-Y',strtotime($antenantalCaseData->edd_date)); ?>&emsp;&emsp;</td>
                               
                            
                            <?php } ?>
                             
                            <?php if($antenantalCaseData->usg_date!=""){ ?>    
                           
                                <td colspan="2">EDD BY USG :  <?php echo date('d-m-Y',strtotime($antenantalCaseData->usg_date));
                                if($antenantalCaseData->usg_week !="0"){ echo  '(by USG done at '.$antenantalCaseData->usg_week.' wks ';if($antenantalCaseData->usg_days =="0"){echo ' )'; } }if($antenantalCaseData->usg_days !="0"){ echo '& ';echo $antenantalCaseData->usg_days.' days)'; }?></td>
                                <td> </td>
                            
                            <?php } ?>
                            </tr>

                            <tr>
                                <?php 
                                 if($antenantalCaseData){ ?>
                          <td>&nbsp;G&nbsp;<sub style="font-size: 9px;"><?php echo $total_parity; ?></sub>&nbsp;P&nbsp;<sub style="font-size: 9px;"><?php echo $antenantalCaseData->parity_term_delivery.' + '.$antenantalCaseData->parity_preterm.' + '.$antenantalCaseData->parity_abortion.' + '.$antenantalCaseData->parity_issue; ?></sub>
                                    &emsp;&emsp;</td>
                                <?php } ?>
                                                      

                                 <?php 
                            if($antenantalCaseData){
                                if($antenantalCaseData->spontaneous_abortion!='' && $antenantalCaseData->spontaneous_abortion!='0'){
                            ?>
                           
                                <td>No.Of Spontaneous Abortion:  <?php echo $antenantalCaseData->spontaneous_abortion;?>&emsp;&emsp;</td>
                               

                            <?php }} ?>

                           <?php  

                            if($total_suction!=0){ 
                            if(!empty($LastSuctionEvacatuion)){

                            if($LastSuctionEvacatuion->year != ''){
                                $curyear = date("Y"); 
                             $backyear =  $curyear - $LastSuctionEvacatuion->year;
                             $backyte = '('. $backyear.' years back)';
                         }else{

                            $backyte = '';
                         }
                       }else{
                               $backyte = '';
                       }

                             

                            ?> 

                                <td>No. Of  Previous Suction Evacuation :  <?php echo $total_suction.$backyte;?></td>
                                           
                            <?php } ?>

                                      
                        </tr>

                            <tr>

                             <?php 
                              if($total_cesarean!=0){ ?>    
                           
                                <td>No. Of  Previous CS :  <?php echo $total_cesarean;?>&emsp;&emsp;</td>
                               
                            
                            <?php } ?>

                             <?php 
                              if($total_ND!=0){ ?>    
                           
                                <td>No. Of  Previous ND :  <?php echo $total_ND;?>&emsp;&emsp;</td>
                               
                            
                            <?php } ?>

                            

                            </tr>
                            
                                      
                            
                            <?php  
                              if(!empty($lastchildBirth)){
                                   if ($lastchildBirth->year!='') {
                                       
                                     
                                               
                            ?>
                        <tr>
                          <td>Last child birth :  <?php 
                          $currentYear=date('Y');
                          $lastBirthYear=$lastchildBirth->year;
                          $yearDiff=($currentYear-$lastBirthYear);

                          echo $yearDiff." years back.";

                          ?></td>
                          <td> </td>
                        </tr>
                        <?php
                              } }
                            ?>
                            
                            <?php if($antenantalCaseData){

                                if($antenantalCaseData->procedure_concieve!=''){
                                ?>
                        <tr>
                          <td colspan="2">Concieved after infertility treatment  <?php

                          
                           echo $antenantalCaseData->procedure_concieve;

                            if ($antenantalCaseData->procedure_date!='') {
                              echo '  on '.date('d-m-Y', strtotime($antenantalCaseData->procedure_date));
                            }

                                }

                          ?></td>
                          <td> </td>
                            </tr>
                            <?php }?>

                                       
                            <?php  
                            if (!empty($previousChildHistory)) {
                            ?>

                        <tr>
                          <td colspan="2">Previous Obstetric History :  </td>
                          
                            </tr>
                            <?php } ?>

                      </table>
                        
                <?php



                    if ($previousChildHistory) { ?>
                             <div style="margin-left:230px;word-wrap: break-word;font-size:15px;margin-top:-19px;">
                        <?php $count = 1; 
                              //$previouschild = $bodycontent['previouschild'];

                                foreach ($previousChildpre as $previouschildrow) {
                               
                                 if($count == 1){

                                    $pregnancycount = $count."<span><sup>st</sup> pregnancy </span>"; 
                                 }elseif($count == 2){

                                   $pregnancycount = $count."<span><sup>nd</sup> pregnancy </span>";
                                 }elseif($count == 3){
                                   $pregnancycount = $count."<span><sup>rd</sup> pregnancy </span>";
                                 }else{
                                    $pregnancycount = $count."<span><sup>th</sup> pregnancy </span>";
                                 }
                                        
                              if ($previouschildrow['complications']!='') {

                                 $childComplications="had ".$previouschildrow['complications'];
                             }else{
                                 $childComplications="";
                             } 

                             if ($previouschildrow['year']!='') { $childYear= ' done in '.$previouschildrow['year']; }else{ $childYear="";  }

                            

                             if ($previouschildrow['med_prob']!='') {
                                $childMedProb=" suffered from ".rtrim($previouschildrow['med_prob'],",Others");
                                $hasMedProwithoutOther=rtrim($previouschildrow['med_prob'],",Others");
                             }else{
                                 $childMedProb="";
                                 $hasMedProwithoutOther="";
                             }
                                                
                             if ($previouschildrow['med_prob_other']!='') {
                                  if ($hasMedProwithoutOther!='') {
                                    $childOtherProb=" & ".$previouschildrow['med_prob_other'];
                                  }else{
                                    $childOtherProb=$previouschildrow['med_prob_other'];
                                  }
                                
                             }else{
                                 $childOtherProb=""; 
                             }

                             if ($previouschildrow['delevery_type']!='') {

                                
                                $deleverytype=$previouschildrow['delevery_type'];
                                             
                             }else{
                                 $deleverytype=""; 
                             }

                             if($previouschildrow['baby_weight'] != ''){

                                $babywt = ' of '.$previouschildrow['baby_weight'].'kg';
                             }else{

                                $babywt = '';
                             }

                             if($previouschildrow['babygender']!='' and ($previouschildrow['delevery_type'] == 'CS' || $previouschildrow['delevery_type'] == 'ND')){
                                $babygen = '';
                               

                                if($previouschildrow['babygender'] == 'Male'){
                                 
                                 $babygen = '( delivered a baby boy '.$babywt.' )';
                                }
                                else if($previouschildrow['babygender'] == 'Female'){
                                 
                                 $babygen = '( delivered a baby girl '.$babywt.' )';
                                }
                                else if($previouschildrow['babygender'] == 'Other'){
                                 
                                 $babygen = '( delivered a Other '.$babywt.' )';
                                }
                                else if($previouschildrow['babygender'] == 'Not Known'){
                                 
                                 $babygen = '( delivered a Not Known '.$babywt.' )';
                                }
                                 
                             }else{

                                 $babygen = '';
                             }

                             
                                                
                             echo $pregnancycount.$childComplications.$childMedProb.$childOtherProb.', '.$deleverytype.$childYear.$babygen. "<br>";

                               $count++; }?>
                                 </div>
                                <?php

                                }?>
                               

                      <table width="100%"   class="demo_font" style="margin-left: 40px;margin-top: 0px;font-size: 15px;" >
                        

                              
                            <tr>
                          <td> <?php 
                           if(!empty($Alldiseasesdata) || !empty($surgicaData)){ ?>Known case of <?php } ?> 
                               <?php $countdise = 1;
                                  if(!empty($Alldiseasesdata)){ 

                               foreach ($Alldiseasesdata as $Alldiseasesdata) {
                                if($Alldiseasesdata->diseases_years != ''){

                                 $disesyear = $Alldiseasesdata->diseases_years.' years back';
                                }else{
                                   $disesyear = '';
                                }
                                if($Alldiseasesdata->other_diseases == ''){

                                  if($countdise == 1){

                                     echo $Alldiseasesdata->diseases_name.' '.$disesyear; 
                                  }else{
                                     echo ', '.$Alldiseasesdata->diseases_name.' '.$disesyear; 
                                  }

                                 

                                }else{
                                  if($countdise == 1){

                                     echo $Alldiseasesdata->other_diseases.' '.$disesyear; 
                                  }else{

                                    echo ', '.$Alldiseasesdata->other_diseases.' '.$disesyear;
                                  }

                                  
                                }

                               $countdise++; } } ?>
                            <?php
                               if($countdise > 1){
                                $surfonttext = '| ';
                               }else{ 
                                
                                $surfonttext = '';
                               } 
                                    $surgicalCount=count($surgicaData);
                                if (!empty($surgicaData)) { ?>
                                 
                                 <?php   $surcount = 1;

                                    foreach ($surgicaData as $surgicadatarow) {
                                        $surgicalCount--;
                                        if ($surcount==1) {echo $surfonttext; }

                                        if ($surgicadatarow->other_surgery_name!='') {

                                            echo $surgicadatarow->other_surgery_name;
                                        }else{   
                                            echo $surgicadatarow->surgery_name;
                                        }

                                        echo ' '.$surgicadatarow->yearback.' years back ';
                                        if ($surgicalCount!=0) {echo " and "; }
                                       
                                    $surcount++; }
                             

                                ?>

                                 
                                <?php }?>

                                </td>
                          <td>  </td>
                        </tr>
                            
                            

                      </table>
                         
                         

                        <table width="100%"   class="demo_font" style="margin-left: 40px;margin-top:0px;font-size: 15px;" >
                          
                          <?php 
                           if($antenantalCaseData){

                            if($antenantalCaseData->any_allergy!=''){
                          ?>
                            <tr>
                                <td>With allergy of : <?php 
                               
                                 echo $antenantalCaseData->any_allergy;
                                
                                ?></td>
                                <td>  </td>
                            </tr>
                            <?php 
                                } }

                                
                                if ($familyCompData=='Y') {

                            ?>
                            <tr>
                                <td colspan="2">   
                                </td>
                                
                            </tr>  
                                <?php } ?>  
                        </table>

                  
                        <?php
                                if ($familyCompData=='Y') {?>
                             <div style="margin-left:44px;word-wrap: break-word;font-size:15px;margin-top:-5px;">
                                <?php 
                                    $familyCompCount=0;
                                    foreach ($familyComponentList as $familycomponentrow) {
                                        $familyCompCount++;
                                 if ($familycomponentrow->is_father=='Y' || $familycomponentrow->is_mother=='Y') {
                                        if ($familyCompCount>1) {echo " and ";}
                                         if ($familycomponentrow->othercomptext!='') {
                                             $component =  $familycomponentrow->othercomptext;
                                         }else{
                                             $component = $familycomponentrow->disp_comp_name;
                                         }

                                        if ($familycomponentrow->is_father=='Y' && $familycomponentrow->is_mother=='Y') {
                                                     echo 'Her father and mother both are '.$component;
                                        }else if($familycomponentrow->is_father=='Y'){
                                            foreach ($familyComponentList as $value) {
                                               if($value->is_father =='Y' && $value->is_mother == 'Y'){
                                                echo 'father has '.$component;
                                                break;
                                            }else{
                                                   echo 'Father has '.$component;
                                                   break;
                                             }
                                            }
                                                 
                                        }else if($familycomponentrow->is_mother=='Y'){
                                                 foreach ($familyComponentList as $value) {
                                               if($value->is_father =='Y' && $value->is_mother == 'Y'){
                                                 echo 'mother has '.$component;
                                                break;
                                            }else{
                                                    echo 'Mother has '.$component;
                                                   break;
                                             }
                                                 
                                        }

                                        }

                                          }

                                     }


                              ?>
                                        </div>
                                <?php    
                                }?>

                                


                        <table width="100%"   class="demo_font" style="margin-left: 40px; font-size: 15px;">
                            <?php 
                            if($antenantalCaseData){
                                if($highrisk!=''){
                            ?>
                            <tr>
                                <td>She is high risk for <?php 
                                echo $highrisk;
                                ?></td>
                                <td>  </td>
                            </tr>
                            <?php
                            }}
                            ?>
                             <?php if ($regularMedicineList) {?>
                             <tr>
                                <td>On medication : </td>
                                <td>  </td>
                            </tr>
                             <?php } ?>

                        </table>
                        <?php  
                          if ($regularMedicineList) { ?>
                        <div style="margin-left:180px;word-wrap: break-word;font-size:15px;margin-top:-15px;">
                        <?php $i=1;
                            foreach ($regularMedicineList as $regularmedicinerow) {
                               
                               if($i==1){
                                  echo 'She is on ';
                               }else{
                                  echo 'and ';
                               }

                               echo $regularmedicinerow->medicine_name.",";

                                if($regularmedicinerow->medicine_dose!=''){
                                    echo " (dose:".$regularmedicinerow->medicine_dose.") ,";
                                }

                                
                                if($regularmedicinerow->medicine_frequency=="OD"){
                                      echo "once a day ";
                                }else if($regularmedicinerow->medicine_frequency=="BD"){
                                      echo "twice a day ";
                                }else if($regularmedicinerow->medicine_frequency=="TDS"){
                                     echo "thrice a day ";
                                }else if($regularmedicinerow->medicine_frequency=="HS"){
                                     echo"at bedtime ";
                                }

                                if ($regularmedicinerow->for_year!='' || $regularmedicinerow->for_month!='') {
                                    if ($regularmedicinerow->for_year!='') {
                                         echo "for last ".$regularmedicinerow->for_year." years ";
                                    }else{
                                        echo "for last ";
                                    }

                                    if ($regularmedicinerow->for_month!='') {
                                        echo $regularmedicinerow->for_month." months ";
                                    }

                                  
                                }


                                echo "<br>";

                           $i++; } ?>
                        </div>
                                
                         <?php
                         } } ?>
                         

                </div>
                   </div>
                      </div>

                    <!--  End of history summery -->  
      <!--  -------------------------------- Start Investigation------------------  -->

                   <div class="row clearfix">
                     <div class="col-sm-12">

   

                       <?php  $inveltdata = $inveltdatapre;
             
                if ($inveltdata) {
                    

                ?>

         
         <span class="spanhead" style="color: #c81b9d !important;"><b>Investigation(as on last prescription dated on <?php echo date('d-m-Y',strtotime($inveltdata->created_on)); ?>) :</b></span><br>
             <div style="margin-left:40px;word-wrap: break-word;font-size: 15px; color: black;margin-top: 10px;">
                        
                        <?php if($inveltdata->hb_result!=''){                          
                          echo "Hb : "; echo $inveltdata->hb_result.' gm/dl'.$CI->dateDMY($inveltdata->hb_date)." | ";       
                        }

                        if($inveltdata->tc_result!=''){ 
                            echo "TC : "; echo $inveltdata->tc_result.' mcl of blood'.$CI->dateDMY($inveltdata->tc_date)." | ";
                        }

                        if($inveltdata->dc_result!=''){ 
                            echo "DC : "; echo $inveltdata->dc_result.''.$CI->dateDMY($inveltdata->dc_date)." | ";
                        }

                        if($inveltdata->fbs_result!=''){ 
                            echo "FBS : "; echo $inveltdata->fbs_result.' gm/dl'.$CI->dateDMY($inveltdata->fbs_date)." | ";
                        } 

                        if($inveltdata->ppbs_result!=''){
                         echo "PPBS : "; echo $inveltdata->ppbs_result.' gm/dl'.$CI->dateDMY($inveltdata->ppbs_date)." | ";
                        } 

                        if($inveltdata->vdrl_result!=''){ 
                            echo "VDRL : "; echo $inveltdata->vdrl_result.$CI->dateDMY($inveltdata->vdrl_date)." | ";
                        } 

                        if($inveltdata->hiv_one_result!=''){ 
                            echo "HIV 1 : "; echo $inveltdata->hiv_one_result.$CI->dateDMY($inveltdata->hiv_one_date)." | ";
                        }

                        if($inveltdata->hiv_two_result!=''){
                         echo "HIV 2 : "; echo $inveltdata->hiv_two_result.$CI->dateDMY($inveltdata->hiv_two_date)." | ";
                        }

                        if($inveltdata->hbsag_result!=''){ 
                            echo "Hbs Ag : "; echo $inveltdata->hbsag_result.$CI->dateDMY($inveltdata->hbsag_date)." | ";
                        }

                        if($inveltdata->antihcv_result!=''){
                         echo "Anti HCV : "; echo $inveltdata->antihcv_result.$CI->dateDMY($inveltdata->antihcv_date)." | ";
                        }

                        if($inveltdata->urine_re_result!=''){
                         echo "Urine R/E : "; echo $inveltdata->urine_re_result.$CI->dateDMY($inveltdata->urine_re_date)." | ";
                        }
                        if($inveltdata->urine_re_notes!=''){
                         echo "Urine R/E Notes: "; echo $inveltdata->urine_re_notes." | ";
                        }

                        if($inveltdata->urine_re_others!=''){
                         echo "Urine R/E Others: "; echo $inveltdata->urine_re_others." | ";
                        }

                        if($inveltdata->cs_sensitive_to_result!=''){ 
                            echo "Urine C/S Others : "; echo $inveltdata->cs_sensitive_to_result." | ";
                        } 

                        if($inveltdata->cs_sensitive_others!=''){ 
                            echo "Urine C/S : "; echo $inveltdata->cs_sensitive_others.$CI->dateDMY($inveltdata->cs_sensitive_date)." | ";
                        } 

                        if($inveltdata->stsh_result!=''){ 
                            echo "STSH : "; echo $inveltdata->stsh_result.' mIU/ml'.$CI->dateDMY($inveltdata->stsh_date)." | ";
                        } 

                        if($inveltdata->s_urea_result!=''){
                         echo "S urea : "; echo $inveltdata->s_urea_result.' mg/dl'.$CI->dateDMY($inveltdata->s_urea_date)." | ";
                        }

                       if($inveltdata->s_creatinine_result!=''){ 
                        echo "S creatinine : "; echo $inveltdata->s_creatinine_result.' mg/dl'.$CI->dateDMY($inveltdata->s_creatinine_date)." | ";

                        }

                        // if($inveltdata->combined_test_result!=''){
                        //  echo "Combined Test : "; echo $inveltdata->combined_test_result.$CI->dateDMY($inveltdata->combined_test_date)." | ";
                        // }

                        if($inveltdata->thalassemia_screening_result!=''){
                          echo "Thalassemia Screening : "; echo $inveltdata->thalassemia_screening_result.$CI->dateDMY($inveltdata->thalassemia_date)." | ";
                        } 

                        if($inveltdata->thalassemia_other!=''){
                          echo "Thalassemia Others : "; echo $inveltdata->thalassemia_other.$CI->dateDMY($inveltdata->thalassemia_date)." | ";
                        } 

                         if($inveltdata->usg_scan_date!=''){
                          echo "USG dating scan Date:".$CI->dateDMY($inveltdata->usg_scan_date)." | ";
                        } 


                        if($inveltdata->usg_slf_week!='' || $inveltdata->usg_slf_day!=''){

                               echo "USG dating scan : SLF of "; 
                                if ($inveltdata->usg_slf_week!='' & $inveltdata->usg_slf_week!='0') {
                                    echo $inveltdata->usg_slf_week.' week ';
                                }

                                if ($inveltdata->usg_slf_day!='' && $inveltdata->usg_slf_day!='0') {
                                    echo $inveltdata->usg_slf_day.' day ';
                                }

                               echo " | ";

                            
                          }

                        if($inveltdata->nt_scan!=''){
                          echo "NT scan:".$inveltdata->nt_scan.' mm'.$CI->dateDMY($inveltdata->nt_scan_date)." | ";
                        } 

                        if($inveltdata->double_marker_date!=''){
                          echo "Double marker Date:".$CI->dateDMY($inveltdata->double_marker_date)." | ";
                        } 

                    if($inveltdata->nt_scan_lowerrisk!='' || $inveltdata->nt_scan_highrisk!=''){ 
                           
                             if ($inveltdata->nt_scan_lowerrisk!='' && $inveltdata->nt_scan_lowerrisk!='0') {
                                echo '1st Trimester Screening Low Risk For :'.$inveltdata->nt_scan_lowerrisk;
                                echo " | ";
                             }

                             if ($inveltdata->nt_scan_highrisk!='' && $inveltdata->nt_scan_highrisk!='0') {
                                 echo '  1st Trimester Screening High Risk For :'.$inveltdata->nt_scan_highrisk;
                             }
                              echo " | ";
                            
                           
                   }

                     if($inveltdata->anomaly_scan_date!=''){
                          echo "Anomaly scan Date:".$CI->dateDMY($inveltdata->anomaly_scan_date)." | ";
                        }
                          

                    if($inveltdata->anomaly_slf_week!='' || $inveltdata->anomaly_slf_day!=''){ 

                        // echo "Anomaly scan : ";
                          echo "Anomaly : ";

                         if ($inveltdata->anomaly_slf_week!='') {
                            echo 'SLF of '.$inveltdata->anomaly_slf_week.' weeks ';
                         }

                         if ($inveltdata->anomaly_slf_day!='') {
                           echo $inveltdata->anomaly_slf_day.' days '; 
                         }

                          echo " | ";

                          
                    }
                       
                    if ($anomalyPlacentaInv!='') {
                             echo "Placenta: ".$anomalyPlacentaInv." | ";
                        }

                        if ($inveltdata->is_no_anomaly_seen=='Y') {
                         echo "No anomaly seen | ";
                        }

                        if ($inveltdata->other_anomaly!='') {
                         echo "Other anomaly : ".$inveltdata->other_anomaly." | ";
                    }


                      if($inveltdata->growth_date!=''){
                          echo "Growth scan Date:".$CI->dateDMY($inveltdata->growth_date)." | ";
                        
                         } 
                    if($inveltdata->growth_slf_week!='' || $inveltdata->growth_slf_day!=''){ 

                        //echo "Growth scan : "; 
                      if($inveltdata->growth_date==''){
                        echo "Growth: ";
                      }
                        
                        if ($inveltdata->growth_slf_week!='') {
                            echo 'SLF of '.$inveltdata->growth_slf_week.' weeks ';
                        }
                        if ($inveltdata->growth_slf_day!='') {
                         echo $inveltdata->growth_slf_day.' days '; 
                        }

                         echo " | ";

                     }

                    if($inveltdata->growth_presentation!=''){
                      if($inveltdata->growth_slf_week =='' && $inveltdata->growth_slf_day=='' && $inveltdata->growth_date==''){
                      
                        echo "Growth "; 
                        echo "Presentation: ".$inveltdata->growth_presentation." | ";
                      }else{

                        echo "Presentation: ".$inveltdata->growth_presentation." | ";
                      }
                      

                    } 

                    if($inveltdata->growth_afi!=''){

                      if($inveltdata->growth_slf_week =='' && $inveltdata->growth_slf_day=='' && $inveltdata->growth_date=='' && $inveltdata->growth_presentation==''){
                      
                        echo "Growth "; 
                        echo  "AFI(".$inveltdata->growth_afi.")  | ";
                      }else{
                        echo  "AFI(".$inveltdata->growth_afi.")  | ";
                      }

                     
                    }

                    if($inveltdata->growth_liquor!=''){

                       if($inveltdata->growth_slf_week =='' && $inveltdata->growth_slf_day=='' && $inveltdata->growth_date=='' && $inveltdata->growth_presentation=='' && $inveltdata->growth_afi == ''){
                      
                         echo "Growth "; 
                         echo "Liquor: ".$inveltdata->growth_liquor." | ";
                       }else{

                         echo "Liquor: ".$inveltdata->growth_liquor." | ";
                       }
                    }

                  
                     if($inveltdata->doppler_scan_date!=''){
                          echo "Doppler scan Date:".$CI->dateDMY($inveltdata->doppler_scan_date)." | ";
                        }


                    if($inveltdata->doppler_slf_week!='' || $inveltdata->doppler_slf_day!=''){
                     
                         //echo "Doppler scan : "; 
                      if($inveltdata->doppler_scan_date==''){
                        echo "Doppler: ";
                      }
                          
                         if ($inveltdata->doppler_slf_week!='') {

                                echo 'SLF of '.$inveltdata->doppler_slf_week.' weeks ';
                         }
                         if ($inveltdata->doppler_slf_day!='') {
                            echo $inveltdata->doppler_slf_day.' days  ';
                         }

                         echo " | ";
                  
                    } 
                       
                    

                    if($inveltdata->doppler_presentation!=''){

                       if($inveltdata->doppler_slf_week == '' && $inveltdata->doppler_slf_day == '' && $inveltdata->doppler_scan_date==''){
                          
                          echo "Doppler ";
                          echo "Presentation: ".$inveltdata->doppler_presentation." | ";
                       }else{
                        echo "Presentation: ".$inveltdata->doppler_presentation." | ";
                       }             
                       
                    }

                    if($inveltdata->doppler_afi!=''){

                       if($inveltdata->doppler_slf_week == '' && $inveltdata->doppler_slf_day == '' && $inveltdata->doppler_scan_date=='' && $inveltdata->doppler_presentation==''){
                         
                         echo "Doppler ";
                         echo  "AFI(".$inveltdata->doppler_afi.")  | ";
                       }else{
                         echo  "AFI(".$inveltdata->doppler_afi.")  | ";
                       }
                    
                    }

                     if($inveltdata->doppler_liquor!=''){

                      if($inveltdata->doppler_slf_week == '' && $inveltdata->doppler_slf_day == '' && $inveltdata->doppler_scan_date=='' && $inveltdata->doppler_presentation=='' && $inveltdata->doppler_afi==''){
                         
                        echo "Doppler ";
                        echo "Liquor: ".$inveltdata->doppler_liquor." | ";

                      }else{
                         echo "Liquor: ".$inveltdata->doppler_liquor." | "; 
                      }
                        
                     }
                     

                     if($inveltdata->doppler_checkbox=='Normal'){

                         echo "Doppler parameters within normal limit |";
                           
                      } 

                      if($inveltdata->umbilical_artery_pi!=""){
                       
                        echo " Umbilical artery PI:".$inveltdata->umbilical_artery_pi." | ";
                      }
                      if($inveltdata->mca_pi!=""){

                         echo " MCA PI:".$inveltdata->mca_pi." | ";
                      }

                      if($inveltdata->cp_ratio!=""){
                        echo " CP Ratio:".$inveltdata->cp_ratio." | "; 
                      }

                      if($inveltdata->doppler_parameters_others!=""){
                      echo " Doppler Others:".$inveltdata->doppler_parameters_others." | ";                 
                      }

                      if($inveltdata->others_investigation!=""){
                        
                         echo "Others Investigation:".$inveltdata->others_investigation;
                         echo $CI->dateDMY($inveltdata->others_investigation_date)." | ";
                      }
                        
                     ?>
                       
                      

                   <table width="50%"   class="demo_font" style="margin-left: 0px;margin-top: 10px;font-size: 13px;" >
              <?php if (!empty($examinationLatestData)) { ?>
            <tr>
                <td> <?php if($examinationLatestData->exam_bmi != '' || $examinationLatestData->exam_weight != ''){ ?>First Visit: &nbsp; <?php  if ($examinationLatestData->exam_bmi != '') { echo "BMI :";echo $examinationLatestData->exam_bmi.' kg/m'.'<sup>2</sup>';}?></td>
               <td><span>&nbsp;&nbsp;</span> <?php  if ($examinationLatestData->exam_weight != '') { echo 'Weight :'; echo $examinationLatestData->exam_weight.' kg.'; }?></td>
            </tr>
                    <?php } }?>

            
        </table>
     
                        </div>

                <?php } ?>

                     </div>
                   </div>   
    <!--  ----------------------------------- End Investigation ----------------------------------- --> 
    
    <div class="row clearfix">
      <div class="col-sm-3">
        <label class="form-label">Notes :</label> 
      </div>

      <div class="col-sm-6">

        <div class="form-group form-float">
                <div class="form-line">
                    <textarea rows="1" name="preopnotes" id="preopnotes" class="form-control no-resize auto-growth"  style="overflow: hidden; overflow-wrap: break-word; height: 32px;" autocomplete="off"
                      ><?php if($mode == 'EDIT'){echo  $preoperationEditdata->preoperation_notes; } ?></textarea>
                   <!--  <label class="form-label"></label> -->
                        </div>
                </div>
        
      </div>

    </div>  

    <!-- --------------------------Start Presentaly on medicines----------------------  -->

    <div class="row clearfix">
     <div class="col-sm-12">

      <?php 
      if ($prescriptionMedicineList) {

?>
<br>
<span class="spanhead" style="color:#c81b9d !important; "><b>Presentaly on medicines (last prescription on <?php echo date('d-m-Y',strtotime($lastprescriptiondate)); ?>) :</b></span><br>
 <div style="margin-left:40px;word-wrap: break-word;font-size:15px;margin-top:10px; color: black;">
     <?php     $i=1;
                      foreach ($prescriptionMedicineList as $prescriptionmedicinerow) {
                             echo $i++.'. ';
                             echo $prescriptionmedicinerow->medicine_shortype." ";
                             echo $prescriptionmedicinerow->medicine_name.",";
                             echo $prescriptionmedicinerow->med_instruction." ";
                             if ($prescriptionmedicinerow->med_instruction_other!='') {
                                echo $prescriptionmedicinerow->med_instruction_other;
                             }
                           
                             
                             if ($prescriptionmedicinerow->days!='') {
                               echo " for ".$prescriptionmedicinerow->days." days.";
                             }
                             
                            
                           echo "<br>";
                       }?>
</div>
      <?php }?>
       
     </div>
     </div>   

      <!-- --------------------------End Presentaly on medicines----------------------  -->


   <div class="row clearfix">
     <div class="col-sm-3">
       <label class="form-label">Proposed Operation</label>

     </div>
     <div class="col-sm-3">

       <div class="form-group form-float">
                  <div class="input-group">
                          <select name="preposedop" id="preposedop" class="form-control show-tick" data-live-search="true" tabindex="-98">
                            <option value=""> &nbsp;</option>
                              <?php

                                 foreach ($drpDownPerposedOper as $value) {  ?>
                                   <option value="<?php echo $value;?>"
                                  
                                  <?php if($mode == 'EDIT' && $preoperationEditdata->preposed_operation == $value){ echo  'selected'; } ?>

                                        ><?php echo $value; ?></option>
                                 <?php     } ?>
                                   
                               </select> 
                    </div>
          </div>
       
     </div>
   </div>


      <div class="row clearfix">
    
    <div class="col-sm-3">

      <div class="form-group form-group">
                     <div class="input-group" >
                         <input type="checkbox" name="enoxapapin" id="enoxapapin" class="filled-in chk-col-deep-purple colrowhide" data-hideidcls='hideother' data-exnovalId ='enoxapapinValue' data-hideIdvalcls = 'enoxa' value=""  <?php if($mode == 'EDIT' && $preoperationEditdata->enoxaparin == 'Y') { ?> checked <?php  } ?> > <label for="enoxapapin">Enoxapapin</label>
                         <input type="hidden" name="enoxapapinValue"  id="enoxapapinValue" value="<?php if($mode == 'EDIT') { echo $preoperationEditdata->enoxaparin; }else{echo 'N'; } ?>">

                 </div>
             </div>             
      
    </div>

    <?php if($mode == 'EDIT' && $preoperationEditdata->enoxaparin == 'Y') { 
       
          $enoxapindisp='display:block;';

         }else{

             $enoxapindisp='display:none;';

          } ?>

        <div class="col-sm-3 hideother" style="<?php echo $enoxapindisp; ?>">

       <div class="form-group form-float">
                  <div class="input-group">
                          <select name="enoxapapinselect" id="enoxapapinselect" class="form-control show-tick enoxa" data-live-search="true" tabindex="-98">
                            <option value=""> &nbsp;</option>
                              <?php

                                 foreach ($drpDownEnoxapapin as $value) {  ?>
                                   <option value="<?php echo $value;?>"
                                  
                                        <?php if($mode == 'EDIT' && $preoperationEditdata->enoxaparin_select == $value){ echo  'selected'; } ?>

                                        ><?php echo $value; ?></option>
                                 <?php     } ?>
                                   
                               </select> 
                    </div>
          </div>
       
     </div>



     <div class="col-sm-3 hideother" style="<?php echo $enoxapindisp; ?>">
                  <div class="form-group form-float">
                      <div class="form-line input-group">
                                 <input type="text" class="form-control datepicker enoxa" placeholder="select date" name="enoxapapin_date" id="enoxapapin_date" autocomplete="off" value="<?php if($mode == 'EDIT' && $preoperationEditdata->enoxaparin_date != NULL){ echo date('d-m-Y',strtotime($preoperationEditdata->enoxaparin_date)); } ?>" >
                                 <label class="form-label selectlabel">Date</label>
                     </div>
                  </div>
                  
                </div>

             <div class="col-sm-2 hideother" style="<?php echo $enoxapindisp; ?>">
                  <div class="input-group">
                             <span class="input-group-addon">
                              <i class="material-icons">access_time</i>
                               </span>
                             <div class="form-line">
                               <input type="text" name="enoxapapintime" id="enoxapapintime" class="form-control timepicker2 enoxa" placeholder="Ex:11:59 pm" value="<?php if($mode == 'EDIT'){ echo $preoperationEditdata->enenoxaparin_time; } ?>">
                                 </div>
                    </div>
                </div>

            <div class="col-sm-1 hideother" style="<?php echo $enoxapindisp; ?>">
                <div class="form-group form-group">
                  <button type="button" class="btn bg-deep-purple waves-effect resetTime" data-id = 'enoxapapintime' style="background-color: #9f0f6e !important;">
                                  
                                    <i class="material-icons">cached</i>
                                </button>
                   </div>   
                </div>      


     <div class="col-sm-3">

      <div class="form-group form-group">
                     <div class="input-group" >
                        <input type="checkbox" name="ecosprin" id="ecosprin" class="filled-in chk-col-deep-purple colrowhide" data-hideidcls='hideotherecosprin' data-exnovalId ='ecosprinValue' data-hideIdvalcls = 'ecos' value="" <?php if($mode == 'EDIT' && $preoperationEditdata->ecosprin == 'Y') { ?> checked <?php  } ?> > 
                         <label for="ecosprin">Ecosprin</label>
                         <input type="hidden" name="ecosprinValue" id="ecosprinValue" value="<?php if($mode == 'EDIT') { echo $preoperationEditdata->ecosprin; }else{ echo 'N'; } ?>">

                 </div>
             </div>             
      
    </div>

       <?php if($mode == 'EDIT' && $preoperationEditdata->ecosprin == 'Y') { 
       
             $ecosprindisp = 'display:block';

         }else{

             $ecosprindisp = 'display:none';

          } ?>


   
     <div class="col-sm-3 hideotherecosprin" style="<?php echo $ecosprindisp; ?>">
                  <div class="form-group form-float">
                      <div class="form-line input-group">
                                 <input type="text" class="form-control datepicker ecos" placeholder="select date" name="ecosprin_date" id="ecosprin_date" autocomplete="off" value="<?php if($mode == 'EDIT' && $preoperationEditdata->ecosprin_date != NULL){ echo date('d-m-Y',strtotime($preoperationEditdata->ecosprin_date)); } ?>" >
                                 <label class="form-label selectlabel">Date</label>
                     </div>
                  </div>
                  
                </div>

       <div class="col-sm-2 hideotherecosprin" style="<?php echo $ecosprindisp; ?>">
                  <div class="input-group">
                             <span class="input-group-addon">
                              <i class="material-icons">access_time</i>
                               </span>
                             <div class="form-line">
                               <input type="text" name="ecosprintime" id="ecosprintime" class="form-control timepicker2 ecos" placeholder="Ex:11:59 pm" value="<?php if($mode == 'EDIT'){ echo $preoperationEditdata->ecosprin_time; } ?>">
                                 </div>
                    </div>
                </div>

                <div class="col-sm-1 hideotherecosprin" style="<?php echo $ecosprindisp; ?>">
                  <button type="button" class="btn bg-deep-purple waves-effect resetTime" data-id='ecosprintime' style="background-color: #9f0f6e !important;">
                                  
                                    <i class="material-icons">cached</i>
                                </button>
                </div>  
       </div>

       <div class="row clearfix">
        <div class="col-sm-2">
          <label class="form-label">Others :</label>
        </div>

        <div class="col-sm-6">

           <div class="form-group form-float">
                <div class="form-line">
                    <textarea rows="1" name="preopOthers" id="preopOthers" class="form-control no-resize auto-growth"  style="overflow: hidden; overflow-wrap: break-word; height: 32px;" autocomplete="off"
                      ><?php if($mode == 'EDIT'){ echo $preoperationEditdata->preopOthers; } ?></textarea>
                   <!--  <label class="form-label"></label> -->
                        </div>
                </div>
          
        </div>
         
       </div>


                    </div>

                    
               <div class="row clearfix">
                                                                
                        <div class="col-sm-8 colcenter">
                                                                  
                              <button type="submit" class="btn bg-pink waves-effect preoprationbtn"><i class="material-icons">cached</i> 
                                    <span><?php echo $btnText; ?></span>
                              </button> 
               
                               <span class="btn bg-pink waves-effect loaderbtn preloaderbtn" style="display:none;"><?php echo $btnTextLoader; ?></span>
                                                                        
                                    </div>
                                                                
                               <div class="col-sm-4"></div>
              </div>

                       

                                                            

                                                        
                                      
                            </div>

                          </section>

    <section class="antenantalDataSection PreBlockSection" id="preop_left_tab_menu_2_section">
    <center class="headingtitile_patient"><h5 class="title_head">&#9733; Patient </h5></center>

      <br>
      
        <div class="demo-masked-input">

        <div class="row clearfix">
          <div class="col-sm-2">
              
              <label class="form-label">Proposed Operation :</label>
            
          </div>
          <div class="col-sm-2">
          
             <div class="form-group form-float" id="preposeddateerr">
                      <div class="form-line input-group">
                                 <input type="text" class="form-control datepicker" placeholder="select date" name="preposed_operation_date" id="preposed_operation_date" autocomplete="off" value="<?php if($mode == 'EDIT' && $preoperationEditdata->preposed_operation_date != NULL){ echo date('d-m-Y',strtotime($preoperationEditdata->preposed_operation_date)); } ?>" >
                                 <label class="form-label selectlabel">Date</label>
                     </div>
                  </div>

            
          </div>


           <div class="col-sm-2">
                  <div class="input-group">
                             <span class="input-group-addon">
                              <i class="material-icons">access_time</i>
                               </span>
                             <div class="form-line">
                               <input type="text" name="preposed_operation_time" id="preposed_operation_time" class="form-control timepicker2" placeholder="Ex:11:59 pm" value="<?php if($mode == 'EDIT'){ echo $preoperationEditdata->preposed_operation_time; } ?>">
                                 </div>
                    </div>
                </div>

                <div class="col-sm-1">
                  <button type="button" class="btn bg-deep-purple waves-effect resetTime" data-id='preposed_operation_time' style="background-color: #9f0f6e !important;">
                                  
                                    <i class="material-icons">cached</i>
                                </button>
                </div>
        </div>

        <div class="row clearfix">
          <div class="col-sm-2">
              
              <label class="form-label">To Admit :</label>
            
          </div>
          <div class="col-sm-2">
          
             <div class="form-group form-float">
                      <div class="form-line input-group">
                                 <input type="text" class="form-control datepicker" placeholder="select date" name="admit_date" id="admit_date" autocomplete="off" value="<?php if($mode == 'EDIT' && $preoperationEditdata->admit_date != NULL){ echo date('d-m-Y',strtotime($preoperationEditdata->admit_date)); } ?>" >
                                 <label class="form-label selectlabel">Date</label>
                     </div>
                  </div>

            
          </div>

         
           <div class="col-sm-2">
                  <div class="input-group">
                             <span class="input-group-addon">
                              <i class="material-icons">access_time</i>
                               </span>
                             <div class="form-line">
                               <input type="text" name="admit_time" id="admit_time" class="form-control timepicker2" placeholder="Ex:11:59 pm" value="<?php if($mode == 'EDIT'){ echo $preoperationEditdata->admit_time; } ?>">
                                 </div>
                    </div>
                </div>

                <div class="col-sm-1">
                  <button type="button" class="btn bg-deep-purple waves-effect resetTime" data-id='admit_time' style="background-color: #9f0f6e !important;">
                                  
                                    <i class="material-icons">cached</i>
                                </button>
                </div>
        </div>

       <div class="row clearfix">
          <div class="col-sm-2">
              
              <label class="form-label">Nil Orally After :</label>
            
          </div>
          <div class="col-sm-2">
          
             <div class="form-group form-float">
                      <div class="form-line input-group">
                                 <input type="text" class="form-control datepicker" placeholder="select date" name="nilorally_date" id="nilorally_date" autocomplete="off" value="<?php if($mode == 'EDIT' && $preoperationEditdata->nilorally_date != NULL){ echo date('d-m-Y',strtotime($preoperationEditdata->nilorally_date)); } ?>" >
                                 <label class="form-label selectlabel">Date</label>
                     </div>
                  </div>

            
          </div>
         
     
           <div class="col-sm-2">
                  <div class="input-group">
                             <span class="input-group-addon">
                              <i class="material-icons">access_time</i>
                               </span>
                             <div class="form-line">
                               <input type="text" name="nilorally_time" id="nilorally_time" class="form-control timepicker2" placeholder="Ex:11:59 pm" value="<?php if($mode == 'EDIT'){ echo $preoperationEditdata->nilorally_time; } ?>">
                                 </div>
                    </div>
                </div>

                <div class="col-sm-1">
                  <button type="button" class="btn bg-deep-purple waves-effect resetTime" data-id='nilorally_time' style="background-color: #9f0f6e !important;">
                                  
                                    <i class="material-icons">cached</i>
                                </button>
                </div>
        </div>

        <div class="row clearfix">
          <div class="col-sm-1">
            <label class="form-label">To Take</label>
          </div>

          <div class="col-sm-3">

            <div class="form-group form-float" id="medcaterr">
                  <div class="input-group">
                           <label class="form-label selectlabel" style="top: -17px;">Medicine Category</label>
                          <select name="medicine_cat_id" id="medicine_cat_id" class="form-control show-tick" data-live-search="true" tabindex="-98">
                            <option value=""> &nbsp;</option>
                              <?php

                                 foreach ($preopmedicineCategoryList as $value) {  ?>
                                   <option value="<?php echo $value->med_cat_id;?>"
                                  
                                        <?php if($mode == 'EDIT' && $preoperationEditdata->medicine_cat_id == $value->med_cat_id){ echo  'selected'; } ?>

                                        ><?php echo $value->category; ?></option>
                                 <?php     } ?>
                                   
                               </select> 
                    </div>
          </div>
            
          </div>
          <div class="col-sm-3" id="drpmedicine">

            <div class="form-group form-float" id="medicineerr">
                  <div class="input-group">
                           <label class="form-label selectlabel" style="top: -17px;">Medicine</label>
                           <div id="medicindrp">
                          <select name="medicine" id="medicine" class="form-control show-tick" data-live-search="true" tabindex="-98">
                            <option value="" id="defaultsel"> &nbsp;</option>
                                                                
                               </select> 
                         </div>
                    </div>
          </div>
            
          </div>

          

              <div class="col-sm-3" id="othermedicine" style="display: none;">
               <div class="form-group form-float" id="othermederr">
                      <div class="form-line input-group">
                                 <input type="text" class="form-control" placeholder="" name="other_medicine" id="other_medicine" autocomplete="off" value="<?php if($mode == 'add'){ echo $preoperationEditdata->nilorally_year; } ?>" >
                                 <label class="form-label selectlabel">Other Medicine</label>
                     </div>
                  </div>
          </div>
                  
          
          <div class="col-sm-2">
                  <div class="input-group" id="premedicinetimerr">
                             <span class="input-group-addon">
                              <i class="material-icons">access_time</i>
                               </span>
                             <div class="form-line">
                               <input type="text" name="medicine_time" id="medicine_time" class="form-control timepicker2" placeholder="Ex:11:59 pm" value="">
                                 </div>
                    </div>
                </div>
                 <div class="col-sm-1" style="margin-top: 12px;">

                    <input type="text"  name="operationdate" id="operationdate" value="<?php if($mode == 'EDIT' && $preoperationEditdata->preposed_operation_date != NULL){ echo date('d-m-Y',strtotime($preoperationEditdata->preposed_operation_date)); } ?>" style="border:none;color: #c81b9d;">;
                    <label class="form-label"></label>
                  </div>

                  <div class="col-sm-1">
                  <button type="button" class="btn bg-pink waves-effect" id="addpredaymedicine">
                              <span class="glyphicon glyphicon-plus" style="margin-top: 0px;padding: 0px;"></span>
                            </button>
                </div>

                <div class="col-sm-1">
                  <button type="button" class="btn bg-deep-purple waves-effect resetTime" data-id='medicine_time' style="background-color: #9f0f6e !important;padding: 3px 10px;">
                                  
                                    <i class="material-icons">cached</i>
                                </button>
                </div>

               

                
        </div>

         <div class="row clearfix">
                      <div class="col-sm-12">

                    <div id="detail_operationdaymedine">
                    <div class="table-responsive" style="overflow: hidden;">
                           <?php
                          $preopmedrow=0;
                                                   
                        ?>

                    <div class="customeTblDesign1"> 
                    <table class="table  no-footer" style="width: 60%;">
                        <thead>
                        
                           
                        </thead>

                        <tbody>

                    <?php if($mode == 'EDIT'){ 
                  
                      if(!empty($preoperationptmedicinedtl)){

                          foreach ($preoperationptmedicinedtl as $preoperationptmedicinedtl) {
                                             
                     ?>
                 
    
                  <tr id="rowpreopMedicine_<?php echo $preopmedrow; ?>"  >
                  
                      
                      <td  style="font-size: 15px;"> 

                        <input type="hidden" name="preopmedicine[]" id="preopmedicine_<?php echo $preopmedrow; ?>" value="<?php  echo $preoperationptmedicinedtl->medicine_id; ?>">

                        <input type="hidden" name="preopOthermedicine[]" id="preopOthermedicine_<?php echo $preopmedrow; ?>" value="<?php if($preoperationptmedicinedtl->medicine_id == 0){ echo $preoperationptmedicinedtl->other_medicine; }else{ echo ''; } ?>">

                         <input type="hidden" name="preopmedicine_time[]" id="preopmedicine_time_<?php echo $preopmedrow; ?>" value="<?php echo $preoperationptmedicinedtl->medicine_time; ?>">

                          <input type="hidden" name="preoperationdate[]" id="preoperationdate_<?php echo $preopmedrow; ?>" value="<?php echo $preoperationptmedicinedtl->preoperation_date; ?>">
                                  
                                To take <?php  if($preoperationptmedicinedtl->medicine_id != 0){ echo $preoperationptmedicinedtl->medicine_name;}else{ echo $preoperationptmedicinedtl->other_medicine; } ?> at <?php echo $preoperationptmedicinedtl->medicine_time; ?> on <?php echo date('d-m-Y',strtotime($preoperationptmedicinedtl->preoperation_date)); ?>
                                     
                      </td>

                    
                      <td style="vertical-align: middle;text-align: center;">
                           
                           
                        <a href="javascript:;" class="delpreopRow" id="delDocRow_<?php echo $preopmedrow; ?>" title="Delete">
                      <i class="material-icons thmdarkTxtcolor">delete</i>

                          

                      </a>
                    </td>       
                      
                  
                  </tr>


                     <?php  $preopmedrow++; } 

                   } } ?>
                  <input type="hidden" name="preopmedrow" id="preopmedrow" value="<?php echo $preopmedrow;?>"> 

                  

                        </tbody>
                    </table>
                    </div>
                        
                    </div>
                  
                    
                  </div>

                        
                      </div>
                       

                     </div>

         <div class="row clearfix">
           <div class="col-sm-2">
            <label class="form-label">
              Special Instruction
            </label>
             
           </div>
           <div class="col-sm-6">
             <div class="form-group form-float">
                <div class="form-line">
                    <textarea rows="1" name="patient_specialinstruct" id="patient_specialinstruct" class="form-control no-resize auto-growth"  style="overflow: hidden; overflow-wrap: break-word; height: 32px;" autocomplete="off"
                      ><?php if($mode == 'EDIT'){echo  $preoperationEditdata->patient_specialinstruct; } ?></textarea>
                   <!--  <label class="form-label"></label> -->
                        </div>
                </div>
           </div>
         </div>



         <br>
   
              <div class="row clearfix">
                                                                
                        <div class="col-sm-8 colcenter">
                                                                  
                              <button type="submit" class="btn bg-pink waves-effect preoprationbtn" ><i class="material-icons">cached</i> 
                                    <span><?php echo $btnText; ?></span>
                              </button> 
               
                               <span class="btn bg-pink waves-effect loaderbtn preloaderbtn" style="display:none;"><?php echo $btnTextLoader; ?></span>
                                                                        
                                    </div>
                                                                
                               <div class="col-sm-4"></div>
              </div>


      </div>

      

              

    </section>

    <section class="antenantalDataSection PreBlockSection" id="preop_left_tab_menu_3_section">
    <center class="headingtitile_patient"><h5 class="title_head">&#9733; Hospital </h5></center>

      <br>
       <div class="demo-masked-input">

      
        <div class="row clearfix">
        <div class="col-sm-2" style="margin-top: 12px;">
            <label class="form-label">IV Fluid to start at</label>  
        </div>
        <div class="col-sm-2">
                  <div class="input-group">
                             <span class="input-group-addon">
                              <i class="material-icons">access_time</i>
                               </span>
                             <div class="form-line">
                               <input type="text" name="fluidstart_time" id="fluidstart_time" class="form-control timepicker2" placeholder="Ex:11:59 pm" value="<?php if($mode == 'EDIT'){ echo $preoperationEditdata->hospital_fluidstart_time; } ?>">
                                 </div>
                    </div>
                </div>

                <div class="col-sm-2">
              <div class="form-group form-float">
                  <div class="input-group">
                          <select name="fluidstart_with" id="fluidstart_with" class="form-control show-tick" data-live-search="true" tabindex="-98">
                            <option value=""> &nbsp;</option>
                              <?php

                                 foreach ($dayofoperwith as $value) {  ?>
                                   <option value="<?php echo $value;?>"
                                  
                                        <?php if($mode == 'EDIT' && $preoperationEditdata->fluidstart_with == $value){ echo  'selected'; } ?>

                                        ><?php echo $value; ?></option>
                                 <?php     } ?>
                                   
                               </select> 
                    </div>
               </div>
             </div>
               
               <div class="col-sm-2" style="margin-top: 12px;">
                    <label class="form-label">@ 500 ml /</label>  
                </div> 

            <div class="col-sm-2">
              <div class="form-group form-float">
                  <div class="input-group">
                          <select name="fluid_hour" id="fluid_hour" class="form-control show-tick" data-live-search="true" tabindex="-98">
                            <option value=""> &nbsp;</option>
                              <?php

                                 foreach ($fluidstarthour as $fluidstarthour) {  ?>
                                   <option value="<?php echo $fluidstarthour;?>"
                                  
                                        <?php if($mode == 'EDIT' && $preoperationEditdata->fluid_hour == $fluidstarthour){ echo  'selected'; } ?>

                                        ><?php echo $fluidstarthour; ?></option>
                                 <?php     } ?>
                                   
                               </select> 
                    </div>
          </div>
          </div> 
           <div class="col-sm-1">
                  <button type="button" class="btn bg-deep-purple waves-effect resetTime" data-id='fluidstart_time' style="background-color: #9f0f6e !important;">
                                  
                                    <i class="material-icons">cached</i>
                                </button>
                </div>
              </div>
              <div class="row clearfix">

               <div class="col-sm-1" style="margin-top: 12px;">
                    <label class="form-label">Injection</label>  
                </div> 

           <div class="col-sm-2">
              <div class="form-group form-float">
                  <div class="input-group">
                          <select name="give_inj" id="give_inj" class="form-control show-tick" data-live-search="true" tabindex="-98">
                            <option value=""> &nbsp;</option>
                              <?php

                                 foreach ($injectiondrpdown1 as $injectiondrpdown1) {  ?>
                                   <option value="<?php echo $injectiondrpdown1;?>"
                                  
                                        <?php if($mode == 'EDIT' && $preoperationEditdata->give_inj == $injectiondrpdown1){ echo  'selected'; } ?>

                                        ><?php echo $injectiondrpdown1; ?></option>
                                 <?php     } ?>
                                   
                               </select> 
                    </div>
                   </div>
                </div>

                  <div class="col-sm-3">
                    <label class="form-label">1 amp each IV to be given at</label>
                  </div>
               


                <div class="col-sm-2">
                  <div class="input-group">
                             <span class="input-group-addon">
                              <i class="material-icons">access_time</i>
                               </span>
                             <div class="form-line">
                               <input type="text" name="inj_time" id="inj_time" class="form-control timepicker2" placeholder="Ex:11:59 pm" value="<?php if($mode == 'EDIT'){ echo $preoperationEditdata->inj_time; } ?>">
                                 </div>
                    </div>
                </div> 
                 <div class="col-sm-1">
                  <button type="button" class="btn bg-deep-purple waves-effect resetTime" data-id='inj_time' style="background-color: #9f0f6e !important;">
                                  
                                    <i class="material-icons">cached</i>
                                </button>
                </div>
              </div>

              <div class="row clearfix">

               <div class="col-sm-4" style="margin-top: 12px;">
                    <label class="form-label">Injection Zofer 1 amp each IV to be given at</label>  
                </div> 

                <div class="col-sm-2">
                  <div class="input-group">
                             <span class="input-group-addon">
                              <i class="material-icons">access_time</i>
                               </span>
                             <div class="form-line">
                               <input type="text" name="zofer_inj_time" id="zofer_inj_time" class="form-control timepicker2" placeholder="Ex:11:59 pm" value="<?php if($mode == 'EDIT'){ echo $preoperationEditdata->zofer_inj_time; } ?>">
                                 </div>
                    </div>
                </div> 
                 <div class="col-sm-1">
                  <button type="button" class="btn bg-deep-purple waves-effect resetTime" data-id='zofer_inj_time' style="background-color: #9f0f6e !important;">
                                  
                                    <i class="material-icons">cached</i>
                                </button>
                </div>
              </div>

            <div class="row clearfix">
              <div class="col-sm-3">
                 <div class="form-group form-float">
                  <div class="input-group">
                          <select name="injbeforeshift" id="injbeforeshift" class="form-control show-tick selshowId" data-live-search="true" tabindex="-98" data-match="Others" data-hideshowId="injOthers" data-nullvalID="other_injbeforeshift">
                            <option value=""> &nbsp;</option>
                              <?php

                                 foreach ($injectiondrpdown as $injectiondrpdown) {  ?>
                                   <option value="<?php echo $injectiondrpdown;?>"
                                  
                                        <?php if($mode == 'EDIT' && $preoperationEditdata->injbeforeshift == $injectiondrpdown){ echo  'selected'; } ?>

                                        ><?php echo $injectiondrpdown; ?></option>
                                 <?php     } ?>
                                   
                               </select> 
                    </div>
               </div>
                
              </div>

              <?php  if($mode == 'EDIT' && $preoperationEditdata->injbeforeshift == 'Others'){

                $injdisplay="display:block;";
              }else{
                 $injdisplay="display:none;";
              }

               ?>

              <div class="col-sm-3" id="injOthers" style="<?php echo $injdisplay; ?>">
               <div class="form-group form-float">
                      <div class="form-line input-group">
                                 <input type="text" class="form-control" placeholder="" name="other_injbeforeshift" id="other_injbeforeshift" autocomplete="off" value="<?php if($mode == 'EDIT'){ echo $preoperationEditdata->other_injbeforeshift; } ?>" >
                                 <label class="form-label selectlabel">Others</label>
                     </div>
                  </div>
          </div>
           

               <div class="col-sm-6" style="margin-top: 9px;">
                    <label class="form-label">IV to be given 15 mins before shifting the patient to OT after proper skin test</label>  
                </div> 
            </div>  

           <?php if($mode == 'EDIT'){ 

              $opertime = '';

             if($preoperationEditdata->preposed_operation_date != NULL){

               if($preoperationEditdata->preposed_operation_time != '' ){
     
              $date = date("H:i:s",strtotime($preoperationEditdata->preposed_operation_time));
              $time = strtotime($date);
              $time = $time - (15 * 60);
              $opertime = date("h:i a", $time);

             } 

            ?>

            <div class="row clearfix">
              <div class="col-sm-8">
                <label class="form-label">To send the patient to OT <?php if($opertime != ''){  echo " at ".$opertime; } ?>  on <?php  if($preoperationEditdata->preposed_operation_date != NULL){ echo date('d-m-Y',strtotime($preoperationEditdata->preposed_operation_date)); }  ?>.</label>
              </div>
            </div>

          <?php } } ?>

          <div class="row clearfix">
            <div class="col-sm-2">
              <label class="form-label">Special Instruction</label>
            </div>

            <div class="col-sm-6">
               <div class="form-group form-float">
                <div class="form-line">
                    <textarea rows="1" name="hospita_specialinstruct" id="hospita_specialinstruct" class="form-control no-resize auto-growth"  style="overflow: hidden; overflow-wrap: break-word; height: 32px;" autocomplete="off"
                      ><?php if($mode == 'EDIT'){echo  $preoperationEditdata->hospita_specialinstruct; } ?></textarea>
                   <!--  <label class="form-label"></label> -->
                        </div>
                </div>
              
            </div>
          </div>


     
       <br>
      <div class="row clearfix">
                                                                
                        <div class="col-sm-8 colcenter">
                                                                  
                              <button type="submit" class="btn bg-pink waves-effect preoprationbtn" ><i class="material-icons">cached</i> 
                                    <span><?php echo $btnText; ?></span>
                              </button> 
               
                               <span class="btn bg-pink waves-effect loaderbtn preloaderbtn" style="display:none;"><?php echo $btnTextLoader; ?></span>
                                                                        
                                    </div>
                                                                
                               <div class="col-sm-4"></div>
              </div>
     
      </div>
       

    </section>

     </form>

     <!-- ------------------------------------ start Print Part----------------------------- -->

     <section class="antenantalDataSection patientBlockSection" id="preop_left_tab_menu_4_section">

                              <center class="headingtitile_patient">
                                <h5 class="title_head">&#9733; Print</h5>
                              </center>

                                 
                                </button>  
                                <div class="formgap">
                                  
                                    <div class="row clearfix">
                                    <div class="col-sm-4">
                                  
                                    <div class="dropzone dz-clickable">
                                        <div class="dz-message">
                                            <a href="<?php echo base_url(); ?>preoperation/print_preop/<?php echo $caseID; ?>/patient" data-title="Print" target="_blank">  
                                                <div class="drag-icon-cph">
                                                    <i class="material-icons">print</i>
                                                </div>
                                                <h3 style="font-size: 22px;">Click to print(Patient)</h3>
                                            </a>
                                        </div>
                                    </div>

                                 </div> 
                                  <div class="col-sm-4">

                                     <div class="dropzone dz-clickable">
                                        <div class="dz-message">
                                            <a href="<?php echo base_url(); ?>preoperation/print_preop/<?php echo $caseID; ?>/hospital" data-title="Print" target="_blank">  
                                                <div class="drag-icon-cph">
                                                    <i class="material-icons">print</i>
                                                </div>
                                                <h3 style="font-size: 22px;">Click to print(Hospital)</h3>
                                            </a>
                                        </div>
                                    </div>
                                  </div>
                                   <div class="col-sm-4">

                                     <div class="dropzone dz-clickable">
                                        <div class="dz-message">
                                            <a href="<?php echo base_url(); ?>preoperation/print_preop/<?php echo $caseID; ?>/both" data-title="Print" target="_blank">  
                                                <div class="drag-icon-cph">
                                                    <i class="material-icons">print</i>
                                                </div>
                                                <h3 style="font-size: 22px;">Click to print(Both)</h3>
                                            </a>
                                        </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-sm-4">
                                  
                                    <div class="dropzone dz-clickable">
                                        <div class="dz-message">
                                            <a href="<?php echo base_url(); ?>preoperation/pre_print_preop/<?php echo $caseID; ?>/patient" data-title="Print" target="_blank">  
                                                <div class="drag-icon-cph">
                                                    <i class="material-icons">print</i>
                                                </div>
                                                <h3 style="font-size: 22px;">Click to pre print(Patient)</h3>
                                            </a>
                                        </div>
                                    </div>

                                 </div> 
                                  <div class="col-sm-4">

                                     <div class="dropzone dz-clickable">
                                        <div class="dz-message">
                                            <a href="<?php echo base_url(); ?>preoperation/pre_print_preop/<?php echo $caseID; ?>/hospital" data-title="Print" target="_blank">  
                                                <div class="drag-icon-cph">
                                                    <i class="material-icons">print</i>
                                                </div>
                                                <h3 style="font-size: 22px;">Click to pre print(Hospital)</h3>
                                            </a>
                                        </div>
                                    </div>
                                  </div>
                                   <div class="col-sm-4">

                                     <div class="dropzone dz-clickable">
                                        <div class="dz-message">
                                            <a href="<?php echo base_url(); ?>preoperation/pre_print_preop/<?php echo $caseID; ?>/both" data-title="Print" target="_blank">  
                                                <div class="drag-icon-cph">
                                                    <i class="material-icons">print</i>
                                                </div>
                                                <h3 style="font-size: 22px;">Click to pre print(Both)</h3>
                                            </a>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                            

                                </div>



                                

                          </section>



                                   </div> 

                                </div>     



          <!-- </section> -->


  