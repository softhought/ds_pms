<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Prescription</title>

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
        border:1px solid;
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
        border:1px solid #C0C0C0;
        padding:2px;
    }
.demo_font{
        font-family:Verdana, Geneva, sans-serif;
        font-size:10px; 
     }

.spanhead{
            text-decoration: underline;

        }

@page {
  /* switch to landscape */
  size: Portrait;
  /* set page margins */
  margin: 1cm;
  /* Default footers */
  @bottom-left {
    content: "";
  }
  @bottom-right {
    content: counter(page) " of " counter(pages);
  }
}

</style>

</head>
    

<body>

 <div class='header'>

     
    <table width="100%" class="demo_font" >
        <tr>
            <td width="10%" rowspan="2">
                <?php
                    if ($clinicData->logo!='') {
                    
                ?>
                <img src="<?php echo base_url();?>assets/documentation/clinic_logo/<?php
            echo $clinicData->logo;?>" width="70" height="60" class="logo_pic" alt="">
        <?php }?>
        </td>
            <td width="50%" > <span style="font-family:Verdana, Geneva, sans-serif; font-size:18px;font-weight: bold;color: gray; "><?php echo $clinicData->clinic_name;?><br>
                <p><i style="font-size: 11px;"><?php echo $doctorData->doctor_name;?></i></p>
            </span></td>
            <td width="20%" ><span style="font-family:Verdana, Geneva, sans-serif; font-size:10px;">Phone: <?php echo $clinicData->phno;?><br>
                Address: <?php echo $clinicData->address;?>
                
            </span></td>
        </tr>
        <tr style="font-size: 10px;">
            <td style="color: gray;">Reg No: <?php echo $drRegNo;?> </td>
            <td>Print Dt:<?php  echo date('d-m-Y');?></td>
          
                
        </tr>
    </table>
 </div>

    <hr>
 
    <div style="text-align:right;font-size:10px;"><span >Case No:<?php
                            if($patientCaseData){
                                    echo $patientCaseData->case_no;
                                    
                            }

                            if($prescriptionLatestData){
                                if ($prescriptionLatestData->created_on!='') {
                                    echo "<br>Visiting Dt:";
                                   echo date('d-m-Y', strtotime($prescriptionLatestData->created_on));
                                 } }
    ?></span></div>
    <div class="custom-page-start" style="padding:3px 0;height:22.5cm;#border:1px solid gray;  ">
        
        <span class="spanhead">Patient Particulars</span>
        <?php
                if ($patientmasterData) {
                 
        ?>

        <table width="100%"   class="demo_font" style="margin-left: 40px;margin-top: 10px;" >
            <tr>
                <td width="7%">Name : </td>
                <td width="35%"><?php echo $patientmasterData->patientname;?></td>
                <td width="40%">Age : <?php echo $patientmasterData->patientage." years";?>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gender : <?php echo $patientmasterData->gender;?>
                </td>
                
    
            </tr>
            
           
            <tr>
                <td width="15%">Self Mobile :</td>
                <td><?php echo $patientmasterData->selfmobile;?></td>
                <td width="15%">Husband Mobile  :&nbsp;&nbsp;<?php echo $patientmasterData->alternate_mobile;?></td>

            </tr>
            <tr>
                <td width="15%">Address :</td>
                <td colspan="1"><?php echo $patientmasterData->address;?></td>
               <?php if($marriedStatus != ''){ ?>
                <td>Status : <?php echo $marriedStatus; ?>
                <?php if($marriedStatus == 'Married'){ ?>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Years : <?php echo $marriedYears; ?>
                   <?php } ?> 
                   </td>
                   <?php } ?>
            </tr>
           
                       
        </table>
    <?php }?>
         <?php if(!empty($chiefComplaintdetail)){ ?>
        <br>
        <div style="#border: 1px solid green; min-height: 200px;"><!--  start of Chief Complaint -->
        <span class="spanhead">Complainting Of Chief Complaint:</span>
        <table width="100%"   class="demo_font" style="margin-left: 40px;margin-top: 10px;" >
            <tr>
                <td><u><b>Complaint</b></u></td>
                <td><u><b>Years</b></u></td>
                <td><u><b>Months</b></u></td>
                <td><u><b>Days</b></u></td>
            </tr>
            <?php foreach($chiefComplaintdetail as $chiefComplaintdetail){ 

              if($chiefComplaintdetail->year != '' || $chiefComplaintdetail->month != '' || $chiefComplaintdetail->day != ''){
            ?>

            <tr>
                <td><?php echo $chiefComplaintdetail->complaint_name; ?></td>
                 <td><?php echo $chiefComplaintdetail->year; ?></td>
                  <td><?php echo $chiefComplaintdetail->month; ?></td>
                   <td><?php echo $chiefComplaintdetail->day; ?></td>
            </tr>
            <?php } } ?>

        </table>
        </div>
       <?php } ?>
                 

     <br>
        <div style="#border: 1px solid green; min-height: 200px;"><!--  start of Menstrual History -->
        <?php if(!empty($gynccologymasterdetail)){ ?>    
        <span class="spanhead">History Summary :</span>
        <?php } ?>     
        <table width="100%"   class="demo_font" style="margin-left: 40px;margin-top:0px;" >
          <?php if($mestruallmp_date != ''){  ?>
         <tr>
            <td>
                 LMP Date : <?php echo date('d-m-Y',strtotime($mestruallmp_date)); ?>
             </td>
            
         </tr>
          <?php } ?>

         <?php if($menstrualcycletype1 != ''){  ?>
         <tr>
            <td>
                 Menstrual Cycle : <?php echo $menstrualcycletype1; ?> <?php if($cycleplusminusdays != ''){ ?> with average duration 30 <?php if($cycledayspm == 'p'){ echo '+'; }else{ echo '-';} ?>  <?php echo $cycleplusminusdays; ?> days. <?php } ?>
             </td>
            
         </tr>
          <?php } ?>

           <?php if($menstrualflow != ''){  ?>
         <tr>
            <td>
                 Flow : <?php echo $menstrualflow; ?>
             </td>
            
         </tr>
          <?php } ?>

          <?php if($menstrualpain != ''){  ?>
         <tr>
            <td>
                 Pain : <?php echo $menstrualpain; ?>
             </td>
            
         </tr>
          <?php } ?>

        <?php if($menstrualpredate1 != '' || $menstrualpredate2 != '' || $menstrualpredate3 != '' || $menstrualpredate4 != ''){  ?>
         <tr>
            <td>
                 Previous Date : 
                 <?php echo date('d-m-Y',strtotime($menstrualpredate1)); 
                 if($menstrualpredate2 != ''){ echo ' | '; echo date('d-m-Y',strtotime($menstrualpredate2)); } if($menstrualpredate3 != ''){  echo ' | '; echo date('d-m-Y',strtotime($menstrualpredate3)); }  if($menstrualpredate4 != ''){ echo ' | '; echo date('d-m-Y',strtotime($menstrualpredate4)); } ?>
             </td>
            
         </tr>
          <?php } ?>  

           <?php if(!empty($regularmedicinesdetails)){  ?>
         <tr>
            <td>
                 Having Regular Medicine : <?php

            foreach ($regularmedicinesdetails as $regularmedicinerow) {

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


                echo "<br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;";

            } ?>
             </td>
            
         </tr>
          <?php } ?>
            <?php if(!empty($plannedsurgeryname)){ ?>
          <tr>
            <td>Surgery Planned : <?php  $i=0;

                foreach($plannedsurgeryname as $plannedsurgeryname){

                echo $plannedsurgeryname->surgery_name;
                echo "&emsp;&emsp;&emsp;&emsp;Date : ";
                echo date('d-m-Y',strtotime($plannedsurgerydate[$i]));
            
            $i++; 
               
              echo "<br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;";
          }
              ?>
             
            </td>
          </tr>
          <?php } ?>
                 
        </table>

<div style="#border: 1px solid green; min-height: 200px;"><!--  start of Obstetric History -->

    <?php if($obstermdelivery != '' OR $obspreterm != '' OR $obsaboration != '' OR $obslivingissue != '' OR $obsno_of_lucs != '' OR $obsno_of_suction != ''-0){ ?>
        <span class="spanhead">Obstetric History :</span>
        <?php } ?>
       

        <table width="100%"   class="demo_font" style="margin-left: 40px;margin-top:0px;" >
           

          <?php if($obstermdelivery != ''){  ?>
         <tr>
            <td>
                 Term Delivery : <?php echo $obstermdelivery; ?>
             </td>
            
         </tr>
          <?php } ?>

          <?php if($obspreterm != ''){  ?>
         <tr>
            <td>
                 Preterm : <?php echo $obspreterm; ?>
             </td>
            
         </tr>
          <?php } ?>

          <?php if($obsaboration != ''){  ?>
         <tr>
            <td>
                 Abortion : <?php echo $obsaboration; ?>
             </td>
            
         </tr>
          <?php } ?>

          <?php if($obslivingissue != ''){  ?>
         <tr>
            <td>
                 Living Issue : <?php echo $obslivingissue; ?>
             </td>
            
         </tr>
          <?php } ?>

           <?php if($obsno_of_lucs != ''){  ?>
         <tr>
            <td>
                 Number Of LUCS  : <?php echo $obsno_of_lucs; ?>
             </td>
            
         </tr>
          <?php } ?>

           <?php if($obsno_of_suction != ''){  ?>
         <tr>
            <td>
                 Number Of Suction : <?php echo $obsno_of_suction; ?>
             </td>
            
         </tr>
          <?php } ?>


   </table>
</div>

<?php if(!empty($GeneralExamination)){ ?>

<div style="#border: 1px solid green; min-height: 200px;"><!--  start of  Genaral Examination -->
        <span class="spanhead">Genaral Examination :</span>

        <table width="100%"   class="demo_font" style="margin-left: 40px;margin-top:0px;" >

      
           <?php foreach($GeneralExamination as $GeneralExamination){ ?>
               <tr> <td>
                <b>Date :</b>
                <?php echo date('d-m-Y',strtotime($GeneralExamination->gen_exam_date));  ?>
               </td>
              </tr>
              <tr>
                  <?php if($GeneralExamination->gen_exam_pulse != ""){ ?>

                  <td>&emsp;&emsp;&emsp;&nbsp;Pulse/min :&ensp;<?php  echo $GeneralExamination->gen_exam_pulse; ?></td>

                  <?php } ?>

                  <?php if($GeneralExamination->gen_exam_pallor != ""){ ?>

                   <td>&emsp;&emsp;&emsp;&nbsp;Pallor :&ensp;<?php  echo $GeneralExamination->gen_exam_pallor; ?></td>

                   <?php } ?>

                   <?php if($GeneralExamination->gen_exam_sbp != ""){ ?>

                   <td>&emsp;&emsp;&emsp;&nbsp;SBP/m of Hg :&ensp;<?php  echo $GeneralExamination->gen_exam_sbp; ?></td>
                   <?php } ?>

                   <?php if($GeneralExamination->gen_exam_dbp != ""){ ?>

                   <td>&emsp;&emsp;&emsp;&nbsp;DBP/m of Hg :&ensp;<?php  echo $GeneralExamination->gen_exam_dbp; ?></td>

                    <?php } ?>

                   <?php if($GeneralExamination->gen_exam_oeadema != ""){ ?>

                   <td>&emsp;&emsp;&emsp;&nbsp;Oeadema :&ensp;<?php  echo $GeneralExamination->gen_exam_oeadema; ?></td>

                    <?php } ?>
              </tr>
              <tr>
                 <?php if($GeneralExamination->weight != ""){ ?>

                  <td>&emsp;&emsp;&emsp;&nbsp;Weight  :&ensp;<?php  echo $GeneralExamination->weight ; ?></td>

                  <?php } ?>

                   <?php if($GeneralExamination->height != ""){ ?>

                   <td>&emsp;&emsp;&emsp;&nbsp;Height  :&ensp;<?php  echo $GeneralExamination->height ; ?></td>

                   <?php } ?>

                    <?php if($GeneralExamination->gen_exam_bmi != ""){ ?>

                   <td>&emsp;&emsp;&emsp;&nbsp;BMI :&ensp;<?php  echo $GeneralExamination->gen_exam_bmi; ?></td>

                   <?php } ?>
                   <?php if($GeneralExamination->chest != ""){ ?>

                   <td>&emsp;&emsp;&emsp;&nbsp;Chest :&ensp;<?php  echo $GeneralExamination->chest; ?></td>

                   <?php } ?>
                   <?php if($GeneralExamination->gen_exam_cvs != ""){ ?>

                   <td>&emsp;&emsp;&emsp;&nbsp;CVS  :&ensp;<?php  echo $GeneralExamination->gen_exam_cvs; ?></td>
                  <?php } ?>
              </tr>
              <tr>
                <?php if($GeneralExamination->gen_exam_notes != ""){ ?> 

                  <td colspan="5" style="text-align: justify;">Notes :<?php  echo $GeneralExamination->gen_exam_notes; ?><td>
                    <?php } ?>
              </tr>

       
        <?php  } ?>

</table>
</div>

<?php } ?>



<div style="#border: 1px solid green; min-height: 200px;"><!--  start of  Genaral Examination -->

     <?php if($lumpsize != '' OR $lumpconsistancy != '' OR $lumpmobility != '' OR $prevaginalposition != '' OR $perspeculamexam != ''){ ?>
        <span class="spanhead">Others Examination :</span>
    <?php } ?>
        <table width="100%"   class="demo_font" style="margin-left: 40px;margin-top:0px;" >
          
          <tr> 
            <td>
                <?php if($lumpsize != ''){ ?>
               Lump : <?php echo $lumpsize;  echo "<br>"; ?>
               <?php } ?>
             <?php if($lumpconsistancy != ''){ ?>

               Consistency : <?php echo $lumpconsistancy;  echo "<br>"; ?>
             <?php } ?>

             <?php if($lumpmobility != ''){ ?>
               Mobility : <?php echo $lumpmobility; echo "<br>";  ?>

                <?php } ?>

               <?php if($pervaginalexam != ''){ ?>
               Pervaginal : <?php echo $pervaginalexam; echo "<br>";  ?>

                <?php } ?>

                <?php if($prevaginalposition != ''){ ?>
               Pervaginal Position : <?php echo $prevaginalposition; echo "<br>";  ?>

                <?php } ?>

                <?php if($perspeculamexam != ''){ ?>
               Perspeculum Cervix : <?php echo $perspeculamexam; if($perspeculamexam == 'Growth Seen' && $speculamgrowthseen != ''){ echo " which "; echo $speculamgrowthseen; } echo "<br>";  ?>

                <?php } ?>

                
              


          </td>
         </tr>
        
</table>
</div>






    </div>

</div>

 <hr>
 <p class="demo_font" style="text-align: center;bottom: 0px;">
    In case emergency to call 9874746006 /Techno Global Emergency number 9073943772
</p>

<div class="custom-page-start" style="page-break-before: always;"></div>

<div class="page_2" >

    <div class='header'>

     
    <table width="100%" class="demo_font" >
        <tr>
            <td width="10%" rowspan="2">
                <?php
                    if ($clinicData->logo!='') {
                    
                ?>
                <img src="<?php echo base_url();?>assets/documentation/clinic_logo/<?php
            echo $clinicData->logo;?>" width="70" height="60" class="logo_pic" alt="">
        <?php }?>
        </td>
            <td width="50%" > <span style="font-family:Verdana, Geneva, sans-serif; font-size:18px;font-weight: bold;color: gray; "><?php echo $clinicData->clinic_name;?><br>
                <p><i style="font-size: 11px;"><?php echo $doctorData->doctor_name;?></i></p>
            </span></td>
            <td width="20%" ><span style="font-family:Verdana, Geneva, sans-serif; font-size:10px;">Phone: <?php echo $clinicData->phno;?><br>
                Address: <?php echo $clinicData->address;?>
                
            </span></td>
        </tr>
        <tr style="font-size: 10px;">
            <td style="color: gray;">Reg No: <?php echo $drRegNo;?> </td>
            <td>Print Dt:<?php  echo date('d-m-Y');?></td>
          
                
        </tr>
    </table>
 </div>

    <hr>
 
    <div style="text-align:right;font-size:10px;"><span >Case No:<?php
                            if($patientCaseData){
                                    echo $patientCaseData->case_no;
                                    
                            }

                            if($prescriptionLatestData){
                                if ($prescriptionLatestData->created_on!='') {
                                    echo "<br>Visiting Dt:";
                                   echo date('d-m-Y', strtotime($prescriptionLatestData->created_on));
                                 } }
    ?></span></div>
    <br>
    

               <?php
  /*----------------------------------------------- Start Investigation ----------------------------------------------*/             
                if ($inveltdata) {
                    

                ?>
           
<span class="spanhead">Investigation :</span>
                        <div style="margin-left:120px;word-wrap: break-word;font-size: 10px;margin-top: -15px;text-align: justify;">
                        
                        <?php if($inveltdata->hb_result!=''){                          
                          echo "Hb : "; echo $inveltdata->hb_result.' gm/dl'.' on '.date('d-m-Y',strtotime($inveltdata->hb_date))." | ";       
                        }

                        if($inveltdata->tc_result!=''){ 
                            echo "TC : "; echo $inveltdata->tc_result.' mcl of blood'.' on '.date('d-m-Y',strtotime($inveltdata->tc_date))." | ";
                        }

                        if($inveltdata->dc_result!=''){ 
                            echo "DC : "; echo $inveltdata->dc_result.' mcl of blood'.' on '.date('d-m-Y',strtotime($inveltdata->dc_date))." | ";
                        }

                        if($inveltdata->fbs_result!=''){ 
                            echo "FBS : "; echo $inveltdata->fbs_result.' gm/dl'.' on '.date('d-m-Y',strtotime($inveltdata->fbs_date))." | ";
                        } 

                        if($inveltdata->esr_result!=''){
                         echo "ESR : "; echo $inveltdata->esr_result.' gm/dl'.' on '.date('d-m-Y',strtotime($inveltdata->esr_date))." | ";
                        } 

                        if($inveltdata->ppbs_result!=''){
                         echo "PPBS : "; echo $inveltdata->ppbs_result.' gm/dl'.' on '.date('d-m-Y',strtotime($inveltdata->ppbs_date))." | ";
                        } 

                        if($inveltdata->vdrl_result!=''){ 
                            echo "VDRL : "; echo $inveltdata->vdrl_result.' on '.date('d-m-Y',strtotime($inveltdata->vdrl_date))." | ";
                        } 

                        if($inveltdata->hiv_one_result!=''){ 
                            echo "HIV 1 : "; echo $inveltdata->hiv_one_result.' on '.date('d-m-Y',strtotime($inveltdata->hiv_one_date))." | ";
                        }

                        if($inveltdata->hiv_two_result!=''){
                         echo "HIV 2 : "; echo $inveltdata->hiv_two_result.' on '.date('d-m-Y',strtotime($inveltdata->hiv_two_date))." | ";
                        }

                        if($inveltdata->hbsag_result!=''){ 
                            echo "Hbs Ag : "; echo $inveltdata->hbsag_result.' on '.date('d-m-Y',strtotime($inveltdata->hbsag_date))." | ";
                        }

                        if($inveltdata->antihcv_result!=''){
                         echo "Anti HCV : "; echo $inveltdata->antihcv_result.' on '.date('d-m-Y',strtotime($inveltdata->antihcv_date))." | ";
                        }

                        if($inveltdata->urine_re_result!=''){
                         echo "Urine R/E : "; echo $inveltdata->urine_re_result.' on '.date('d-m-Y',strtotime($inveltdata->urine_re_date))." | ";
                        }

                         if($inveltdata->urine_re_result!=''){
                         echo "Urine R/E : "; echo $inveltdata->urine_re_result.' on '.date('d-m-Y',strtotime($inveltdata->urine_re_date))." | ";
                        }
 

                        if($inveltdata->abo_rh_result!=''){ 
                            echo "Abo & Rh : "; echo $inveltdata->abo_rh_result.' on '.date('d-m-Y',strtotime($inveltdata->abo_rh_date))." | ";
                        } 

                        if($inveltdata->s_urea_result!=''){
                         echo "S urea : "; echo $inveltdata->s_urea_result.' on '.date('d-m-Y',strtotime($inveltdata->s_urea_date))." | ";
                        }

                       if($inveltdata->s_creatinine_result!=''){ 
                        echo "S creatinine : "; echo $inveltdata->s_creatinine_result.' on '.date('d-m-Y',strtotime($inveltdata->s_creatinine_date))." | ";

                        }

                        if($inveltdata->hba1c_result!=''){ 
                        echo "HbA1C : "; echo $inveltdata->hba1c_result.' on '.date('d-m-Y',strtotime($inveltdata->hba1c_date))." | ";

                        }

                         if($inveltdata->lft_result!=''){ 
                        echo "LFT : "; echo $inveltdata->lft_result.' on '.date('d-m-Y',strtotime($inveltdata->lft_date))." | ";

                        }

                        if($inveltdata->pt_result!=''){ 
                        echo "PT : "; echo $inveltdata->pt_result.' on '.date('d-m-Y',strtotime($inveltdata->lft_date))." | ";

                        }

                        if($inveltdata->inr_result!=''){ 
                        echo "INR : "; echo $inveltdata->inr_result.' on '.date('d-m-Y',strtotime($inveltdata->inr_date))." | ";

                        }

                        if($inveltdata->aptt_result!=''){ 
                        echo "APTT : "; echo $inveltdata->aptt_result.' on '.date('d-m-Y',strtotime($inveltdata->aptt_date))." | ";

                        }

                        if($inveltdata->ecg_result!=''){ 
                        echo "ECG in all leads : "; echo $inveltdata->ecg_result.' on '.date('d-m-Y',strtotime($inveltdata->ecg_date))." | ";

                        }

                        if($inveltdata->chest_xray_result!=''){ 
                        echo "Chest x-ray P/A view : "; echo $inveltdata->chest_xray_result.' on '.date('d-m-Y',strtotime($inveltdata->chest_xray_date))." | ";

                        }

                        if($inveltdata->echocardiography_result!=''){ 
                        echo "Echocardiography : "; echo $inveltdata->echocardiography_result.' on '.date('d-m-Y',strtotime($inveltdata->echocardiography_date))." | ";

                        }

                         if($inveltdata->serum_ca_result!=''){ 
                        echo "Serum CA 125 : "; echo $inveltdata->serum_ca_result.' on '.date('d-m-Y',strtotime($inveltdata->serum_ca_date))." | ";

                        }

                         if($inveltdata->serum_bhch_result!=''){ 
                        echo "Serum BHCH : "; echo $inveltdata->serum_bhch_result.' on '.date('d-m-Y',strtotime($inveltdata->serum_bhch_date))." | ";

                        }

                         if($inveltdata->serum_afp_result!=''){ 
                        echo "Serum AFP : "; echo $inveltdata->serum_afp_result.' on '.date('d-m-Y',strtotime($inveltdata->serum_afp_date))." | ";

                        }

                         if($inveltdata->usg_abdomen_result!=''){ 
                        echo "USG Of Lower Abdomen : "; echo $inveltdata->usg_abdomen_result.' on '.date('d-m-Y',strtotime($inveltdata->usg_abdomen_date))." | ";

                        }

                        if($inveltdata->mri_abdomen_result!=''){ 
                        echo "MRI Of Whole Abdomen : "; echo $inveltdata->mri_abdomen_result.' on '.date('d-m-Y',strtotime($inveltdata->mri_abdomen_date))." | ";

                        }

                        if($inveltdata->endometril_result!=''){ 
                        echo "USG Of Lower Abdomen With Endrometrial Thickness(TVS) : "; echo $inveltdata->endometril_result.' on '.date('d-m-Y',strtotime($inveltdata->endometril_date))." | ";

                        }

                        if($inveltdata->pap_smear_result!=''){ 
                        echo "Pap Smear : "; echo $inveltdata->pap_smear_result.' on '.date('d-m-Y',strtotime($inveltdata->pap_smear_date))." | ";

                        }

                         if($inveltdata->usg_breast_result!=''){ 
                        echo "USG Of Breast : "; echo $inveltdata->usg_breast_result.' on '.date('d-m-Y',strtotime($inveltdata->usg_breast_date))." | ";

                        }

                         if($inveltdata->memmography_result!=''){ 
                        echo "Mammography Of Left And Right Breast : "; echo $inveltdata->memmography_result.' on '.date('d-m-Y',strtotime($inveltdata->memmography_date))." | ";

                        }

                       

                       

                    

                        
                     ?>
                       
                      

                <table width="50%"   class="demo_font" style="margin-left: 0px;margin-top: 10px;" >
            

            
        </table>
     
  </div>

     
                <?php }
 /*----------------------------------------------- End Investigation ----------------------------------------------*/

                ?>
<!-- End Investigation */ -->
<br>
<div style="#border: 1px solid green; min-height: 200px;"><!--  start of  Vaccination History -->

     <?php if($tt_taken_on != '' OR $tt_tobe_taken_on != '' OR $hpv_taken_on != '' OR $hpv_tobe_taken_on != '' OR $mmr_taken_on != '' OR $mmr_tobe_taken_on != '' OR $chickenpox_taken_on != '' OR $chickenpox_tobe_taken_on != ''){ ?>
        <span class="spanhead">Vaccination History :</span>
    <?php } ?>
        <table width="100%"   class="demo_font" style="margin-left: 40px;margin-top:0px;" >
     
        <?php if($tt_taken_on != ''){ ?>
   
         <tr><td style="width:10%">
            TT last taken on&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&nbsp;&emsp;&emsp;:&ensp;&emsp;&emsp;&emsp;&emsp;<?php echo date('d-m-Y',strtotime($tt_taken_on)); ?>
         </td></tr>
          
        <?php } ?>

        <?php if($tt_tobe_taken_on != ''){ ?>
   
         <tr><td>
             TT to be taken on&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;:&emsp; &emsp;&emsp;&emsp;
             <?php echo date('d-m-Y',strtotime($tt_tobe_taken_on)); ?>
         </td></tr>
          
        <?php } ?>

         <?php if($hpv_taken_on != ''){ ?>
   
         <tr><td>
             HPV last taken on&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&nbsp;&emsp;&emsp;:&ensp;&emsp;&emsp;&emsp;&emsp;
             <?php echo date('d-m-Y',strtotime($hpv_taken_on)); ?>
         </td></tr>
          
        <?php } ?>

         <?php if($hpv_tobe_taken_on != ''){ ?>
   
         <tr><td>
             HPV to be taken on&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;:&emsp;&emsp;&ensp;&emsp;&emsp;
             <?php echo date('d-m-Y',strtotime($hpv_tobe_taken_on)); ?>
         </td></tr>
          
        <?php } ?>

        <?php if($mmr_taken_on != ''){ ?>
   
         <tr><td>
            MMR last taken on&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&emsp;&emsp;:&emsp;&ensp;&emsp;&emsp;&emsp;
            <?php echo date('d-m-Y',strtotime($mmr_taken_on)); ?>
         </td></tr>
          
        <?php } ?>

        <?php if($mmr_tobe_taken_on != ''){ ?>
   
         <tr><td>
            MMR to be taken on&emsp;&emsp;&emsp;&emsp;&ensp;&emsp;&emsp;:&ensp;&emsp;&emsp;&emsp;&emsp; 
            <?php echo date('d-m-Y',strtotime($mmr_tobe_taken_on)); ?>
         </td></tr>
          
        <?php } ?>

         <?php if($chickenpox_taken_on != ''){ ?>
   
         <tr><td>
            Chickenpox last taken on&emsp;&ensp;&nbsp;&emsp;&emsp;:&ensp;&emsp;&emsp;&emsp;&emsp;
            <?php echo date('d-m-Y',strtotime($chickenpox_taken_on)); ?>
         </td></tr>
          
        <?php } ?> 

        <?php if($chickenpox_tobe_taken_on != ''){ ?>
   
         <tr><td>
            Chickenpox to be taken on&emsp;&emsp;&emsp;:&emsp;&emsp;&emsp;&emsp;&ensp;
            <?php echo date('d-m-Y',strtotime($chickenpox_tobe_taken_on)); ?>
         </td></tr>
          
        <?php } ?>
     
  </table>
</div>

<?php
      if ($prescriptionMedicineList) {
          

?>
<br>
<span class="spanhead">Prescription :</span>
 <div style="margin-left:120px;word-wrap: break-word;font-size:10px;margin-top:-15px;">
     <?php
                      foreach ($prescriptionMedicineList as $prescriptionmedicinerow) {
                      
                             echo $prescriptionmedicinerow->medicine_name.",";
                             echo $prescriptionmedicinerow->med_instruction." ";
                            

                             if($prescriptionmedicinerow->dosage!=''){
                             echo " (dose:".$prescriptionmedicinerow->dosage.") ";
                             }

                
                            if($prescriptionmedicinerow->frequency=="OD"){
                                  echo "once a day ";
                            }else if($prescriptionmedicinerow->frequency=="BD"){
                                  echo "twice a day ";
                            }else if($prescriptionmedicinerow->frequency=="TDS"){
                                 echo "thrice a day ";
                            }else if($prescriptionmedicinerow->frequency=="HS"){
                                 echo"at bedtime ";
                            }

                           echo "<br>";
                       }?>
</div>
      <?php }?>



<br>
<?php  if ($prescriptionInvestigationpanel || $prescriptionInvestigationList) { ?>
<span class="spanhead">Suggested Investigation :</span>&nbsp;

<table style="margin-top: -17px;">
       <tr>
           <td style="font-size: 10px;margin-left: 100px; padding-left: 175px;"> <?php 
                                                $chkcoma=0;
                                                //created by anil 23-09-2019 
                                                 foreach ($prescriptionInvestigationpanel as $prescriptionInvestigationpanel) {
                                                  if($chkcoma!=0){echo ",";}
                                                  echo $prescriptionInvestigationpanel->panel_investigation_details;
                                                  $chkcoma++;

                                                
                                              } 
                                              if($chkcoma != 0){
                                               echo "<br>";
                                              }
                                               $chkcoma2 = 0;
                                              foreach ($prescriptionInvestigationList as $prescriptionInvestigation) {
                                                  if($chkcoma2!=0){echo ",";}
                                                  echo $prescriptionInvestigation->inv_component_name;
                                                  $chkcoma2++;
                                              }

                                              
                                             


                                              ?></td>
       </tr>
    </table> 

 <?php } ?>
 
<br>
<?php if($reviewdays != '' OR $reviewweeks != ''){ ?>
<span class="spanhead">Review On :</span>&nbsp;
<?php } ?>
<table style="margin-top: -17px;">

    <tr>
        <td style="font-size: 10px;margin-left: 50px; padding-left: 95px;">
            <?php if($reviewweeks != ''){ 

            echo "After&ensp;"; echo $reviewweeks; echo "&ensp;weeks&nbsp;";
           } 
           if($reviewdays != ''){

            if($reviewweeks == '') {

             echo "After&ensp;"; 
             }

             echo $reviewdays; echo "&ensp;days";
            }
           ?>
        </td>
    </tr>

  </table>
    

</div>

</body>
</html>