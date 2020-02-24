<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Preop</title>

<style>
  .demo {
    border:1px solid #C0C0C0;
    border-collapse:collapse;
    padding:5px;
  }
  .demo th {
    border:1px solid #C0C0C0;
    padding:5px;
    background:#F0F0F0;
    font-family:Verdana, Geneva, sans-serif;
    font-size:12px;
    font-weight:bold;
  }
  .demo td {
    border:1px solid #C0C0C0;
    padding:5px;
    font-family:Verdana, Geneva, sans-serif;
    font-size:11px;   
    
  }
 .small_demo {
    border:1px solid;
    padding:2px;
  }
  .small_demo td {
  
    padding:2px;
                width: auto;
                font-family:Verdana, Geneva, sans-serif; 
                font-size:11px; font-weight:bold;
  }

         
        
  .headerdemo {
    border:1px solid #C0C0C0;
    padding:2px;
  }
  
  .headerdemo td {
    //border:1px solid #C0C0C0;
    padding:2px;
  }
.demo_font{
            font-family:Verdana, Geneva, sans-serif;
           font-size:13px;  
}

.spanhead{
          text-decoration: underline;
            font-size: 16px;

        }

@page :first {
    margin: 1cm 1cm 3cm 1cm;
}


@page {
  /* switch to landscape */
  size: Portrait;
  /* set page margins */
  margin:   4cm 1cm 3cm 1cm;
  /* Default footers */
  @bottom-left {
    content: "";
  }
  @bottom-right {
    content: counter(page) " of " counter(pages);
  }
}



#page-container {
  position: relative;
  min-height: 100vh;
}

#content-wrap {
  padding-bottom: 2.5rem;    /* Footer height */
}
#footer {
  position: absolute;
  bottom: 20px;
  width: 90%;
  height: 2.5rem;            /* Footer height */
}
</style>

</head>
   

<body>

  <div id="page-container">
    
     <div id="content-wrap">   

       <div class='header'>
<?php

    $CI =& get_instance();
    

?>        

      <table width="100%" class="demo_font">
        <tr>
            <!-- <td width="10%" rowspan="2">
                <?php
                    if ($clinicData->logo!='') {
                    
                ?>
                <img src="<?php echo base_url();?>assets/documentation/clinic_logo/<?php
            echo $clinicData->logo;?>" width="70" height="60" class="logo_pic" alt="">
        <?php }?>
        </td> -->
            <td width="67%" > </td>
            <td width="20%" >
              <span style="font-family:Verdana, Geneva, sans-serif; font-size:15px;font-weight: bold;color: #00805e; ">
              <?php echo $doctorData->doctor_name;?><br>
               
            </span>
             <span style="color: #00805e;">Reg No: <?php echo $drRegNo;?></span><br>

              <span style="font-family:Verdana, Geneva, sans-serif; font-size:12px;">Phone: <?php echo $clinicData->phno;?><br>
              Address: <?php echo $clinicData->address;?>
              
            </span></td>
        </tr>
        <tr style="font-size: 12px;">
            <td><!-- Reg No: <?php echo $drRegNo;?> --> </td>
            <td>Print Dt:<?php  echo date('d-m-Y');?></td>
          
                
        </tr>
    </table>

        </div>

      <hr>
      
         <div style="text-align:right;font-size:12px;"><span >Case No:<?php
                            if($patientCaseData){
                                    echo $patientCaseData->case_no;
                                    
                            }

                            if($prescriptionLatestData){
                                if ($prescriptionLatestData->created_on!='') {
                                    echo "<br>Visiting Dt:";
                                   echo date('d-m-Y', strtotime($prescriptionLatestData->created_on));
                                 } }
    ?></span></div>
    <div class="custom-page-start" style="padding:3px 0;#border:1px solid gray;  ">
      
      <span class="spanhead">Patient Particulars</span>
        <?php
                if ($patientmasterData) {
                 
        ?>

      <table width="100%"   class="demo_font" style="margin-left: 40px;margin-top: 10px;font-size: 13px;" >
        <tr>
          <td width="7%">Name : </td>
          <td width="35%"><?php echo $patientmasterData->patientname;?></td>
          <td width="40%">Age : <?php echo $patientmasterData->patientage." years";?>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gender : <?php echo $patientmasterData->gender;?>
          </td>
          
  
        </tr>
        
        <tr>
          <td >Self Blood Group :</td>
          <td><?php echo $slfbldgrp;?></td>
          <td width="40%" style="word-wrap: no-warp;">Husband Blood Group : <?php echo $husbldgrp;?></td>
          
          
          
        </tr>
        <tr>
          <td width="15%">Self Mobile :</td>
          <td><?php echo $patientmasterData->selfmobile;?></td>
          <td width="15%">Husband Mobile  :&nbsp;&nbsp;<?php echo $patientmasterData->alternate_mobile;?></td>

        </tr>
        <tr>
          <td width="15%">Address :</td>
          <td  style="word-break: break-all;"><?php echo $patientmasterData->address;?></td>
        </tr>
        <tr>
          <td width="15%">Occupation :</td>
          <td  style="word-break: break-all;"><?php echo $occupation; ?></td>
        </tr>
        <tr>
          <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
                <?php
                 if($tt1_taken!=''){
                   
                ?>
          <td width="30%">TT1 Taken on : <?php echo $tt1_taken;?></td>
                <?php
                    
                }else{
                    if($tt1_tobetaken!=''){
                ?>
                    <td width="30%">TT1 To be Taken on : <?php echo $tt1_tobetaken;?></td>
                <?php }} ?>

                <?php
                    if($tt2_taken!=''){
                  
                ?>
          <td width="30%">TT2 Taken on : <?php echo $tt2_taken;?></td>
                <?php
                   
                }else{
                    if ($tt2_tobetaken!='') {
                       
                   
                ?>
                    <td width="30%">TT2 To be Taken on : <?php echo $tt2_tobetaken;?></td>
                <?php } }?>


                <?php
                    if($tdap_taken!=''){
                    
                ?>
          <td width="30%">Tdap Taken on : <?php echo $tdap_taken;?></td>
                <?php
                    
                }else{
                    if ($tdap_tobetaken!='') {
                      
                   
                ?>
                    <td width="30%">Tdap To be Taken on : <?php echo $tdap_tobetaken;?></td>
                <?php }  }?>
          
          
        </tr>
        
      </table>
    <?php }?>

    <br>
        <div style="#border: 1px solid green; min-height: 200px;"><!--  start of history summery -->
        <?php if(!empty($antenantalCaseData)){ ?>    
      <span class="spanhead">History Summary :</span>
    <?php } ?>
      <table width="100%"   class="demo_font" style="margin-left: 40px;margin-top: 10px;font-size: 12px;" >
            
            <?php ?>

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
                <?php if($antenantalCaseData){ ?>
          <td>&nbsp;G&nbsp;<sub style="font-size: 7px;"><?php echo $total_parity; ?></sub>&nbsp;P&nbsp;<sub style="font-size: 7px;"><?php echo $antenantalCaseData->parity_term_delivery.' + '.$antenantalCaseData->parity_preterm.' + '.$antenantalCaseData->parity_abortion.' + '.$antenantalCaseData->parity_issue; ?></sub>
                    &emsp;&emsp;</td>
                <?php } ?>
            <!-- [<span>P</span><sub>A+B+C+D</sub>] -->
            <!-- [ Term Delivery : <?php if($antenantalCaseData){echo $antenantalCaseData->parity_term_delivery;}?>, 
            Preterm : <?php if($antenantalCaseData){ echo $antenantalCaseData->parity_preterm;}?>, 
            Abortion : <?php if($antenantalCaseData){echo $antenantalCaseData->parity_abortion;}?>,
            Issue : <?php if($antenantalCaseData){echo $antenantalCaseData->parity_issue;}?> ]  -->
          

                 <?php 
            if($antenantalCaseData){
                if($antenantalCaseData->spontaneous_abortion!='' && $antenantalCaseData->spontaneous_abortion!='0'){
            ?>
           
                <td>No.Of Spontaneous Abortion:  <?php echo $antenantalCaseData->spontaneous_abortion;?>&emsp;&emsp;</td>
               

            <?php }} ?>

           <?php  if($total_suction!=0){ 
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

             <?php if($total_cesarean!=0){ ?>    
           
                <td>No. Of  Previous CS :  <?php echo $total_cesarean;?>&emsp;&emsp;</td>
               
            
            <?php } ?>

             <?php if($total_ND!=0){ ?>    
           
                <td>No. Of  Previous ND :  <?php echo $total_ND;?>&emsp;&emsp;</td>
               
            
            <?php } ?>

            

            </tr>
            
                      
            
            <?php  if(!empty($lastchildBirth)){
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

                       
            <?php if (!empty($previousChildHistory)) {
            ?>

        <tr>
          <td colspan="2">Previous Obstetric History :  </td>
          
            </tr>
            <?php } ?>

      </table>
        
<?php



    if ($previousChildHistory) { ?>
             <div style="margin-left:195px;word-wrap: break-word;font-size:13px;margin-top:-19px;">
        <?php $count = 1;
                foreach ($previousChild as $previouschildrow) {
               
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
               

      <table width="100%"   class="demo_font" style="margin-left: 40px;margin-top: 0px;font-size: 13px;" >
        

              
            <tr>
          <td> <?php if(!empty($Alldiseasesdata) || !empty($surgicaData)){ ?>Known case of <?php } ?> 
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
         
         

        <table width="100%"   class="demo_font" style="margin-left: 40px;margin-top:0px;font-size: 13px;" >
          
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
             <div style="margin-left:44px;word-wrap: break-word;font-size:13px;margin-top:-5px;">
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

                


        <table width="100%"   class="demo_font" style="margin-left: 40px; font-size: 13px;">
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
        <?php   if ($regularMedicineList) { ?>
        <div style="margin-left:180px;word-wrap: break-word;font-size:13px;margin-top:-15px;">
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
         } ?>
         

</div><!--  start of history summery -->


               <?php
  /*----------------------------------------------- Start Investigation ----------------------------------------------*/             
                if ($inveltdata) {
                    

                ?>

  <br>         
<span class="spanhead">Investigation :</span>
                        <div style="margin-left:120px;word-wrap: break-word;font-size: 13px;margin-top: -15px;">
                        
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
                       
                      

                        </div>

                      



        
                <?php }
 /*----------------------------------------------- End Investigation ----------------------------------------------*/

                ?>  
<br>   
<?php if(!empty($preoperationdata)){ 

 if($preoperationdata->preoperation_notes != ''){ 

 ?>      
<span class="spanhead">Notes :</span>
                      <div style="margin-left:120px;word-wrap: break-word;font-size: 13px;margin-top: -15px;">
                        <?php echo $preoperationdata->preoperation_notes; ?>
   </div>

   <?php } } ?>


   <?php
      if ($prescriptionMedicineList) {
         
        

?>
<br>
<span class="spanhead">Prescription :</span>
 <div style="margin-left:120px;word-wrap: break-word;font-size:13px;margin-top:-15px;">
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
                             
                            
                             // commented on 18.11.2019
                            //  if($prescriptionmedicinerow->dosage!=''){
                            //  echo " (dose:".$prescriptionmedicinerow->dosage.") ";
                            //  }

                
                            // if($prescriptionmedicinerow->frequency=="OD"){
                            //       echo "once a day ";
                            // }else if($prescriptionmedicinerow->frequency=="BD"){
                            //       echo "twice a day ";
                            // }else if($prescriptionmedicinerow->frequency=="TDS"){
                            //      echo "thrice a day ";
                            // }else if($prescriptionmedicinerow->frequency=="HS"){
                            //      echo"at bedtime ";
                            // }

                           echo "<br>";
                       }?>
</div>
      <?php }?>

<?php if(!empty($preoperationdata)){  ?> 
<br>
 
 <div style="margin-left:0px;word-wrap: break-word;font-size:13px;margin-top:-15px;">

   <?php if($preoperationdata->enoxaparin == 'Y' && $preoperationdata->enoxaparin_select != '' && $preoperationdata->enoxaparin_date != ''){ ?>
    
    Enoxaparin <?php echo $preoperationdata->enoxaparin_select; ?> to be stopped on <?php  
     echo date('d-m-Y',strtotime($preoperationdata->enoxaparin_date)); ?> <?php if($preoperationdata->enenoxaparin_time != ''){ echo"at ".$preoperationdata->enenoxaparin_time; } ?>

   <?php } ?>


 </div>

 

 <div style="margin-left:0px;word-wrap: break-word;font-size:13px;margin-top:-24px;">

   <?php if($preoperationdata->ecosprin == 'Y' && $preoperationdata->ecosprin_date != ''){ ?>
<br>

    Ecosprin to be stopped on <?php  
     echo date('d-m-Y',strtotime($preoperationdata->ecosprin_date)); ?> <?php if($preoperationdata->ecosprin_time != ''){ echo"at ".$preoperationdata->ecosprin_time; } ?>

   <?php } ?>


 </div>


 <br>

 <?php if($preoperationdata->preopOthers != ''){ ?>

<span class="spanhead">Others :</span>
 <div style="margin-left:70px;word-wrap: break-word;font-size:13px;margin-top:-15px;">

   <?php echo $preoperationdata->preopOthers; ?>

 </div>

 <?php } ?>

 
 
 <?php } ?>

 <?php if($from == 'patient'){ 

  if(!empty($preoperationdata)){
 ?>
 <br>

<span class="spanhead">For Patient :</span>

<div style="margin-left:120px;word-wrap: break-word;font-size:13px;margin-top:-17px;">
  
  <?php if($preoperationdata->preposed_operation_date != ''){  

    echo "Proposed operation on ".date('d-m-Y',strtotime($preoperationdata->preposed_operation_date));
  
    if($preoperationdata->preposed_operation_time != ''){

       echo " at ".$preoperationdata->preposed_operation_time;
    } 
  }
?>

</div>

<br>
<div style="margin-left:120px;word-wrap: break-word;font-size:13px;margin-top:-17px;">
  
  <?php if($preoperationdata->admit_date != ''){  

    echo "To admit on ".date('d-m-Y',strtotime($preoperationdata->admit_date));

    if($preoperationdata->admit_time != ''){
      echo " at ".$preoperationdata->admit_time;
    } 
}

?>

</div>

<br>
<div style="margin-left:120px;word-wrap: break-word;font-size:13px;margin-top:-17px;">
  
  <?php if($preoperationdata->nilorally_date != ''){  


    echo "Nil orally ";

   if($preoperationdata->nilorally_time != ''){

    echo "after ".$preoperationdata->nilorally_time;
   }

   echo " on ".date('d-m-Y',strtotime($preoperationdata->nilorally_date));

} ?> 


</div>

<br>
<?php 
     
if(!empty($preopmedicinedtldata)){
   ?>

<span style="font-size: 14px;"><u>Preop Medicine :</u></span>
<div style="margin-left:120px;word-wrap: break-word;font-size:13px;margin-top:-17px;">
  
  <?php  

    foreach($preopmedicinedtldata as $preopmedicinedtldata){


    echo "To take ";

    if($preopmedicinedtldata->medicine_id != 0){

    echo $preopmedicinedtldata->medicine_name.' at '.$preopmedicinedtldata->medicine_time.$CI->dateDMY($preopmedicinedtldata->preoperation_date);

     }else{
       echo $preopmedicinedtldata->other_medicine.' at '.$preopmedicinedtldata->medicine_time.$CI->dateDMY($preopmedicinedtldata->preoperation_date);
      }
     echo "<br>";
 
     ?>

  <?php  } } ?> 

  </div>   

<?php if($preoperationdata->patient_specialinstruct != ''){ ?>

<br>
<span style="font-size: 14px;"><u>Special Instruction :</u></span>
<div style="margin-left:140px;word-wrap: break-word;font-size:13px;margin-top:-17px;">

  <?php echo $preoperationdata->patient_specialinstruct;  ?>

</div>


  <?php } ?>




</div>

 <?php } } ?>


 <?php if($from == 'hospital'){ 

  if(!empty($preoperationdata)){

 ?>

<br>
<span class="spanhead">For Hospital :</span>

<?php if($preoperationdata->hospital_fluidstart_time != '' && $preoperationdata->fluidstart_with != ''){  ?>

 <br>
<div style="margin-left:120px;word-wrap: break-word;font-size:13px;margin-top:-17px;">

  IV fluid to start at <?php echo $preoperationdata->hospital_fluidstart_time; ?> with <?php echo $preoperationdata->fluidstart_with;  ?> @ 500 ml / <?php echo $preoperationdata->fluid_hour; ?>


</div>

<?php } ?>

<?php if($preoperationdata->give_inj != '') { ?>

<br>
<div style="margin-left:120px;word-wrap: break-word;font-size:13px;margin-top:-17px;">

  Injection <?php echo $preoperationdata->give_inj; ?> 1 amp each IV to be given at <?php echo $preoperationdata->inj_time; ?> 

</div>

<?php } ?>



<br>
<div style="margin-left:120px;word-wrap: break-word;font-size:13px;margin-top:-17px;">

  Injection Zofer 1 amp each IV to be given <?php if($preoperationdata->zofer_inj_time != '') { ?> at <?php echo $preoperationdata->zofer_inj_time; ?> <?php } ?>


</div>
<?php 
    $injname = '';
  if($preoperationdata->injbeforeshift != 'Others'){

  $injname = $preoperationdata->injbeforeshift;

   }else{

    $injname = $preoperationdata->other_injbeforeshift;

 }

   if($injname != ''){

 ?>
<br>
<div style="margin-left:120px;word-wrap: break-word;font-size:13px;margin-top:-17px;">

  <?php echo $injname; ?> IV to be given 15 mins before shigting the patient to OT after proper skin test.


</div>
<?php }  ?>


<?php 
     $opertime = '';

  if($preoperationdata->preposed_operation_date != NULL){ 

  if($preoperationdata->preposed_operation_time != ''){

  $date = date("H:i:s",strtotime($preoperationdata->preposed_operation_time));
  $time = strtotime($date);
  $time = $time - (15 * 60);
  $opertime = date("h:i a", $time);

  }

?>

<br>
<div style="margin-left:120px;word-wrap: break-word;font-size:13px;margin-top:-17px;">

To send the patient to OT <?php if($opertime != ''){  echo " at ".$opertime; }  ?>  on <?php echo date('d-m-Y',strtotime($preoperationdata->preposed_operation_date));  ?>.

</div>

<?php } ?>

<?php if($preoperationdata->hospita_specialinstruct != ''){ ?>


<br>
<span style="font-size: 14px;"><u>Special Instruction :</u></span>
<div style="margin-left:140px;word-wrap: break-word;font-size:13px;margin-top:-17px;">

<?php echo $preoperationdata->hospita_specialinstruct; ?>

</div>

<?php } ?>

<?php } } ?>


<?php if($from == 'both'){  
   
   if(!empty($preoperationdata)){

?>


<br>

<span class="spanhead">For Patient :</span>

<div style="margin-left:120px;word-wrap: break-word;font-size:13px;margin-top:-17px;">
  
  <?php if($preoperationdata->preposed_operation_date != ''){  

    echo "Proposed operation on ".date('d-m-Y',strtotime($preoperationdata->preposed_operation_date));
  
    if($preoperationdata->preposed_operation_time != ''){

       echo " at ".$preoperationdata->preposed_operation_time;
    } 
  }
?>

</div>

<br>
<div style="margin-left:120px;word-wrap: break-word;font-size:13px;margin-top:-17px;">
  
  <?php if($preoperationdata->admit_date != ''){  

    echo "To admit on ".date('d-m-Y',strtotime($preoperationdata->admit_date));

    if($preoperationdata->admit_time != ''){
      echo " at ".$preoperationdata->admit_time;
    } 
}

?>

</div>

<br>
<div style="margin-left:120px;word-wrap: break-word;font-size:13px;margin-top:-17px;">
  
  <?php if($preoperationdata->nilorally_date != ''){  


    echo "Nil orally ";

   if($preoperationdata->nilorally_time != ''){

    echo "after ".$preoperationdata->nilorally_time;
   }

   echo " on ".date('d-m-Y',strtotime($preoperationdata->nilorally_date));

} ?> 


</div>

<br>
<?php 
     
if(!empty($preopmedicinedtldata)){
   ?>

<span style="font-size: 14px;"><u>Preop Medicine :</u></span>
<div style="margin-left:120px;word-wrap: break-word;font-size:13px;margin-top:-17px;">
  
  <?php  

    foreach($preopmedicinedtldata as $preopmedicinedtldata){


    echo "To take ";

    if($preopmedicinedtldata->medicine_id != 0){

    echo $preopmedicinedtldata->medicine_name.' at '.$preopmedicinedtldata->medicine_time.$CI->dateDMY($preopmedicinedtldata->preoperation_date);

     }else{
       echo $preopmedicinedtldata->other_medicine.' at '.$preopmedicinedtldata->medicine_time.$CI->dateDMY($preopmedicinedtldata->preoperation_date);
      }
     echo "<br>";
 
     ?>

  <?php  } } ?> 

  </div>   

<?php if($preoperationdata->patient_specialinstruct != ''){ ?>

<br>
<span style="font-size: 14px;"><u>Special Instruction :</u></span>
<div style="margin-left:140px;word-wrap: break-word;font-size:13px;margin-top:-17px;">

  <?php echo $preoperationdata->patient_specialinstruct;  ?>

</div>


  <?php } ?>




<br>
<span class="spanhead">For Hospital :</span>

<?php if($preoperationdata->hospital_fluidstart_time != '' && $preoperationdata->fluidstart_with != ''){  ?>

 <br>
<div style="margin-left:120px;word-wrap: break-word;font-size:13px;margin-top:-17px;">

  IV fluid to start at <?php echo $preoperationdata->hospital_fluidstart_time; ?> with <?php echo $preoperationdata->fluidstart_with;  ?> @ 500 ml / <?php echo $preoperationdata->fluid_hour; ?>


</div>

<?php } ?>

<?php if($preoperationdata->give_inj != '') { ?>

<br>
<div style="margin-left:120px;word-wrap: break-word;font-size:13px;margin-top:-17px;">

  Injection <?php echo $preoperationdata->give_inj; ?> 1 amp each IV to be given at <?php echo $preoperationdata->inj_time; ?> 

</div>

<?php } ?>



<br>
<div style="margin-left:120px;word-wrap: break-word;font-size:13px;margin-top:-17px;">

  Injection Zofer 1 amp each IV to be given <?php if($preoperationdata->zofer_inj_time != '') { ?> at <?php echo $preoperationdata->zofer_inj_time; ?> <?php } ?>


</div>
<?php 
    $injname = '';
  if($preoperationdata->injbeforeshift != 'Others'){

  $injname = $preoperationdata->injbeforeshift;

   }else{

    $injname = $preoperationdata->other_injbeforeshift;

 }

   if($injname != ''){

 ?>
<br>
<div style="margin-left:120px;word-wrap: break-word;font-size:13px;margin-top:-17px;">

  <?php echo $injname; ?> IV to be given 15 mins before shigting the patient to OT after proper skin test.


</div>
<?php }  ?>


<?php 
     $opertime = '';

  if($preoperationdata->preposed_operation_date != NULL){ 

  if($preoperationdata->preposed_operation_time != ''){

  $date = date("H:i:s",strtotime($preoperationdata->preposed_operation_time));
  $time = strtotime($date);
  $time = $time - (15 * 60);
  $opertime = date("h:i a", $time);

  }

?>

<br>
<div style="margin-left:120px;word-wrap: break-word;font-size:13px;margin-top:-17px;">

To send the patient to OT <?php if($opertime != ''){  echo " at ".$opertime; }  ?>  on <?php echo date('d-m-Y',strtotime($preoperationdata->preposed_operation_date));  ?>.

</div>

<?php } ?>

<?php if($preoperationdata->hospita_specialinstruct != ''){ ?>


<br>
<span style="font-size: 14px;"><u>Special Instruction :</u></span>
<div style="margin-left:140px;word-wrap: break-word;font-size:13px;margin-top:-17px;">

<?php echo $preoperationdata->hospita_specialinstruct; ?>

</div>

<?php } ?>

  
<?php } } ?>



         </div>

     </div>
   </div>
  


  </body>

</html>