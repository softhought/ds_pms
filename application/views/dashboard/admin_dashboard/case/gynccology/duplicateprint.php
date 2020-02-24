<body>

  <div id="page-container">
    <div id="content-wrap">  

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
                                if ($prescriptionLatestData->created_on != '') {
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
          
            <?php foreach($chiefComplaintdetail as $chiefComplaintdetail){ 

              if($chiefComplaintdetail->year != '' || $chiefComplaintdetail->month != '' || $chiefComplaintdetail->day != ''){
            ?>

            <tr>
                <td><?php echo $chiefComplaintdetail->complaint_name;
                   
                   if($chiefComplaintdetail->year != ''){

                        echo ' for last '.$chiefComplaintdetail->year.' years ';

                   }
                   if($chiefComplaintdetail->month != ''){


                   if($chiefComplaintdetail->year != ''){

                       echo $chiefComplaintdetail->month.' months ';
                   }else{
                     echo ' for last '.$chiefComplaintdetail->month.' months ';
                   }
                    }
                   if($chiefComplaintdetail->day != ''){


                   if($chiefComplaintdetail->month != '' || $chiefComplaintdetail->year != ''){
                      
                       echo $chiefComplaintdetail->day.' days ';
                   }else{
                     echo ' for last '.$chiefComplaintdetail->day.' days ';
                   }
                   }

                 ?></td>
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
                 <?php echo date('d-m-Y',strtotime($mestruallmp_date)); ?>
             
          <?php } ?>

         <?php if($menstrualcycletype1 != ''){  ?>
        
                 Menstrual Cycle is  <?php echo $menstrualcycletype1; ?> <?php if($cycleplusminusdays != ''){ ?> with average duration   <?php 
                 
                  if($cycledayspm == 'M'){
                      
                       echo 30 - $cycleplusminusdays.' days';
                  }else{

                    echo 30 + $cycleplusminusdays.' days';

                  }
         
                 } ?>
             
          <?php } ?>

           <?php if($menstrualflow != ''){  ?>
        
                 with <?php echo $menstrualflow.' flow '; ?>
            
          <?php } ?>

          <?php if($menstrualpain != ''){  ?>
         
                 and <?php echo $menstrualpain.' pain '; ?>
             </td>
            
         </tr>
          <?php } ?>



        <?php if($menstrualpredate1 != '' || $menstrualpredate2 != '' || $menstrualpredate3 != '' || $menstrualpredate4 != ''){  ?>
         <tr>
            <td>
                 Her previous dates were 
                 <?php echo date('d-m-Y',strtotime($menstrualpredate1)); 
                 if($menstrualpredate2 != ''){ echo ' | '; echo date('d-m-Y',strtotime($menstrualpredate2)); } if($menstrualpredate3 != ''){  echo ' | '; echo date('d-m-Y',strtotime($menstrualpredate3)); }  if($menstrualpredate4 != ''){ echo ' | '; echo date('d-m-Y',strtotime($menstrualpredate4)); } ?>
             </td>
            
         </tr>
          <?php } ?>  

           <tr>
            <td>&nbsp;G&nbsp;<sub style="font-size: 9px;"><?php echo $total_parity; ?></sub>&nbsp;P&nbsp;<sub style="font-size: 7px;"><?php echo $gynccologymasterdetail->obstetric_term_delivery.' + '.$gynccologymasterdetail->obstetric_preterm.' + '.$gynccologymasterdetail->obstetric_aboration.' + '.$gynccologymasterdetail->obstetric_living_issue; ?></sub>
                      
           


           <?php if($obsno_of_lucs != ''){  ?>
       
                with  <?php echo $obsno_of_lucs.' LUCS'; ?>
             
          <?php } ?>

           <?php if($obsno_of_suction != ''){

              if($obsno_of_lucs != ''){

                echo ' and '.$obsno_of_suction.' suction evacuation ';

              }else{
                echo 'with '.$obsno_of_suction.' suction evacuation ';
              }

            }

             ?>
         
                
             </td>
            
         </tr>

           <?php if(!empty($regularmedicinesdetails)){  ?>
         <tr>
            <td>
                 On Medication : <?php

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


                echo "<br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;";

            } ?>
             </td>
            
         </tr>
          <?php } ?>

          <?php if(!empty($previoussurgery)){ ?>
          <tr>
            <td> <?php  $i=0;

                foreach($previoussurgery as $previoussurgery){
                if($i == 0){
                   echo "Had ";
                 }else{
                  echo " and ";
                 }
               
                  if($previoussurgery->surgery_mst_id == '6'){
                    echo $previoussurgery->other_surgery_name;
                  }else{
                    echo $previoussurgery->surgery_name;
                  }
                
                echo ' surgery ';
                if($previoussurgery->surgery_date != ''){
                  echo "on ".date('d-m-Y',strtotime($previoussurgery->surgery_date));
                }
                
            
            $i++; 
               
             
          }
              ?>
             
            </td>
          </tr>
          <?php } ?>



            <?php if(!empty($plannedsurgery)){ ?>
          <tr>
            <td> <?php  $i=0;

                foreach($plannedsurgery as $plannedsurgery){
                  if($i == 0){

                    echo "Planned for ";
                  }else{

                    echo ' and ';
                  }
                
               if($plannedsurgery->surgery_mst_id == '6'){

                 echo $plannedsurgery->other_surgery_name;

               }else{
                 echo $plannedsurgery->surgery_name;
               }

               
                echo ' surgery ';
                if($plannedsurgery->surgery_date != ''){
                  echo "on ".date('d-m-Y',strtotime($plannedsurgery->surgery_date));
                }
                
            
            $i++; 
               
             
          }
              ?>
             
            </td>
          </tr>
          <?php } ?>

          
                 
        </table>



<?php if(!empty($GeneralExamination)){ ?>

<div style="#border: 1px solid green; min-height: 200px;"><!--  start of  Genaral Examination -->
        <span class="spanhead">Genaral Examination :</span>

        <table width="100%"   class="demo_font" style="margin-left: 40px;margin-top:0px;" >

      
           <?php foreach($GeneralExamination as $GeneralExamination){ ?>
               <!-- <tr> <td>
                <b>Date :</b>
                <?php echo date('d-m-Y',strtotime($GeneralExamination->gen_exam_date));  ?>
               </td>
              </tr> -->
              <tr>
                <td width="11%">Date</td>
                <td width="7%" align="center">Pulse</td>
               
                <td width="7%">Weight</td>
                <td width="7%" align="center">BMI</td>
                <td width="8%" align="center">Pallor</td>
                <td width="9%" align="center">Chest</td>
                <td width="13%" align="center">BP(mm of Hg)</td>
                <td width="7%" align="center">Height</td>
                <td width="7%" align="center">Oeadema</td>
                <td width="10%" align="center">CVS</td>
              </tr>
              <tr>
                <td>
                  <?php if($GeneralExamination->gen_exam_date != ''){

                    echo date('d-m-Y',strtotime($GeneralExamination->gen_exam_date));

                   } ?>
                </td>

                  <td align="center">
                    <?php 

                     if($GeneralExamination->gen_exam_pulse != ""){

                       echo $GeneralExamination->gen_exam_pulse; 

                         }

                       ?>
                        </td>

                  <td align="center"><?php  

                      if($GeneralExamination->weight != ""){  

                        echo $GeneralExamination->weight ; 

                      } ?>
                          
                       </td>

                  
                   <td align="center"><?php  

                      if($GeneralExamination->gen_exam_bmi != ""){

                        echo $GeneralExamination->gen_exam_bmi; }

                        ?>
                        </td>

                   <td align="center">
                    <?php
                        if($GeneralExamination->gen_exam_pallor != ""){ 

                          echo $GeneralExamination->gen_exam_pallor;
                         }

                        ?>
                 </td>

                  

                    <?php  ?>

                   <td align="center"><?php 

                       if($GeneralExamination->chest != ""){

                         if($GeneralExamination->chest == 'Other'){
                           echo $GeneralExamination->chest_other; 
                         }else{
                           echo $GeneralExamination->chest; 
                         }

                            
                           }

                             ?>
                         
                       </td>

                   <td align="center"><?php 

                   if($GeneralExamination->gen_exam_sbp != "" && $GeneralExamination->gen_exam_dbp != ""){

                      echo $GeneralExamination->gen_exam_sbp.'/'.$GeneralExamination->gen_exam_dbp; 
                  
                      }

                      ?>
                        

                      </td>
                  
                    <?php  ?>

                   <td align="center"><?php 
                        if($GeneralExamination->height != ""){

                         echo $GeneralExamination->height ; 

                         }

                         ?>
                           

                         </td>

                
                   <?php  ?>

                   <td align="center"><?php  
                      if($GeneralExamination->gen_exam_oeadema != ""){

                         if($GeneralExamination->gen_exam_oeadema == 'M'){
                          echo '-';
                         }else if($GeneralExamination->gen_exam_oeadema == 'P'){
                            echo '+';
                         }else{
                           echo '++';
                         }

                           }

                            ?>
                          
                           </td>

                  

                     <?php  ?>

                   <td align="center"><?php 
                   if($GeneralExamination->gen_exam_cvs != ""){

                      if($GeneralExamination->gen_exam_cvs == 'Other'){

                        echo $GeneralExamination->gen_exam_cvs_other;
                      }else{
                          echo $GeneralExamination->gen_exam_cvs; 
                      }
                    
                    } ?></td>
                  
              </tr>
              
              <tr>
                <?php if($GeneralExamination->gen_exam_notes != ""){ ?> 

                  <td colspan="9" style="text-align: justify;">Notes :<?php  echo $GeneralExamination->gen_exam_notes; ?><td>
                    <?php } ?>
              </tr>
              <tr><td colspan="9"></td></tr>


       
        <?php  } ?>

</table>
</div>

<?php } ?>



<div style="#border: 1px solid green; min-height: 200px;"><!--  start of  Others Examination -->

     <?php if($lumpsize != '' OR $lumpconsistancy != '' OR $lumpmobility != '' OR $prevaginalposition != '' OR $perspeculamexam != ''){ ?>
        <span class="spanhead">Others Examination :</span>
    <?php } ?>
        <table width="100%"   class="demo_font" style="margin-left: 40px;margin-top:0px;" >
          
          <tr> 
            <td>
                <?php if($lumpsize != ''){ ?>
                <?php echo $lumpsize.' wks lump,';   ?>
               <?php } ?>
             <?php if($lumpconsistancy != ''){ ?>

               <?php echo $lumpconsistancy;   ?>
             <?php } ?>

             <?php if($lumpmobility != ''){ ?>
                 <?php echo ' '.$lumpmobility;   ?>

                <?php } ?>

               <?php if($pervaginalexam != ''){ ?>
               & pervaginal <?php echo $pervaginalexam.' ';   ?>

                <?php } ?>

                <?php if($prevaginalposition != ''){ ?>
                <?php echo $prevaginalposition; echo "<br>";  ?>

                <?php } ?>

                <?php if($perspeculamexam != ''){ ?>
               Perspeculum Cervix  <?php echo $perspeculamexam; if($perspeculamexam == 'Growth Seen' && $speculamgrowthseen != ''){ echo " which "; echo $speculamgrowthseen; } echo "<br>";  ?>

                <?php } ?>

                
              


          </td>
         </tr>
        
</table>
</div>

  

    
 
    <br>
    

               <?php
  /*----------------------------------------------- Start Investigation ----------------------------------------------*/             
                if ($inveltdata) {
                    
                   //pre($inveltdata);exit;
                ?>
           
<span class="spanhead">Investigation :</span>
                        <div style="margin-left:120px;word-wrap: break-word;font-size: 13px;margin-top: -15px;text-align: justify;">
                        
                        <?php if($inveltdata->inv_urine_test!=''){

                            if($inveltdata->inv_urine_test_date != ''){
                               echo "Urine test for pregnancy : "; echo $inveltdata->inv_urine_test;
                             }else{

                               echo "Urine test for pregnancy : "; echo $inveltdata->inv_urine_test.' | ';
                             }                          
                             
                            if($inveltdata->inv_urine_test_date != ''){

                              echo ' on '.date('d-m-Y',strtotime($inveltdata->inv_urine_test_date))." | "; 
                            }
                            
                                 
                          
                        }

                          if($inveltdata->hb_result!=''){  

                            if($inveltdata->hb_date != ''){

                               echo "Hb : "; echo $inveltdata->hb_result.' gm/dl';

                            }else{
                                echo "Hb : "; echo $inveltdata->hb_result.' gm/dl'.' | ';
                            }

                            if($inveltdata->hb_date != ''){

                             echo ' on '.date('d-m-Y',strtotime($inveltdata->hb_date))." | ";

                            }
                        

                        }

                        if($inveltdata->tc_result!=''){ 

                           if($inveltdata->tc_date != ''){
                             echo "TC : "; echo $inveltdata->tc_result.' mcl of blood'.' on '.date('d-m-Y',strtotime($inveltdata->tc_date))." | ";
                           }else{

                             echo "TC : "; echo $inveltdata->tc_result.' mcl of blood'.' | ';
                           }
                          
                        }

                        if($inveltdata->dc_result!=''){ 

                          if($inveltdata->dc_date != ''){

                            echo "DC : "; echo $inveltdata->dc_result.' mcl of blood'.' on '.date('d-m-Y',strtotime($inveltdata->dc_date))." | ";
                          }else{
                            echo "DC : "; echo $inveltdata->dc_result.' mcl of blood'.' | ';
                          }
                        }

                        if($inveltdata->fbs_result!=''){ 

                           if($inveltdata->fbs_date != ''){

                            echo "FBS : "; echo $inveltdata->fbs_result.' gm/dl'.' on '.date('d-m-Y',strtotime($inveltdata->fbs_date))." | ";
                          }else{
                               echo "FBS : "; echo $inveltdata->fbs_result.' gm/dl'.' | ';
                          }
                            
                        } 

                        if($inveltdata->esr_result!=''){
                          if($inveltdata->esr_date != ''){

                            echo "ESR : "; echo $inveltdata->esr_result.' gm/dl'.' on '.date('d-m-Y',strtotime($inveltdata->esr_date))." | ";
                          }else{
                               echo "ESR : "; echo $inveltdata->esr_result.' gm/dl'.' | ';
                          }
                         
                        } 

                        if($inveltdata->ppbs_result!=''){

                           if($inveltdata->ppbs_date != ''){

                             echo "PPBS : "; echo $inveltdata->ppbs_result.' gm/dl'.' on '.date('d-m-Y',strtotime($inveltdata->ppbs_date))." | ";
                           }else{
                             echo "PPBS : "; echo $inveltdata->ppbs_result.' gm/dl'.' | ';
                           }
                        
                        } 

                        if($inveltdata->vdrl_result!=''){ 

                           if($inveltdata->vdrl_date != ''){

                              echo "VDRL : "; echo $inveltdata->vdrl_result.' on '.date('d-m-Y',strtotime($inveltdata->vdrl_date))." | ";
                           }else{
                              echo "VDRL : "; echo $inveltdata->vdrl_result.' | ';
                           }
                           
                        } 

                        if($inveltdata->hiv_one_result!=''){ 
                           if($inveltdata->hiv_one_date != ''){
                             echo "HIV 1 : "; echo $inveltdata->hiv_one_result.' on '.date('d-m-Y',strtotime($inveltdata->hiv_one_date))." | ";
                           }else{
                              echo "HIV 1 : "; echo $inveltdata->hiv_one_result.' | ';
                           }
                           
                        }

                        if($inveltdata->hiv_two_result!=''){
                          if($inveltdata->hiv_two_date != ''){

                             echo "HIV 2 : "; echo $inveltdata->hiv_two_result.' on '.date('d-m-Y',strtotime($inveltdata->hiv_two_date))." | ";
                          }else{
                             echo "HIV 2 : "; echo $inveltdata->hiv_two_result.' | ';
                          }
                        
                        }

                        if($inveltdata->hbsag_result!=''){ 
                          if($inveltdata->hbsag_date != ''){

                            echo "Hbs Ag : "; echo $inveltdata->hbsag_result.' on '.date('d-m-Y',strtotime($inveltdata->hbsag_date))." | ";
                          }else{
                            echo "Hbs Ag : "; echo $inveltdata->hbsag_result.' | '; 
                          }
                        }

                        if($inveltdata->antihcv_result!=''){
                          if($inveltdata->antihcv_date != ''){

                            echo "Anti HCV : "; echo $inveltdata->antihcv_result.' on '.date('d-m-Y',strtotime($inveltdata->antihcv_date))." | ";
                          }else{
                              echo "Anti HCV : "; echo $inveltdata->antihcv_result.' | ';
                          }
                         
                        }

                        if($inveltdata->urine_re_result!=''){
                          if($inveltdata->urine_re_date != ''){
                             echo "Urine R/E : "; echo $inveltdata->urine_re_result.' on '.date('d-m-Y',strtotime($inveltdata->urine_re_date))." | ";
                           }else{
                                echo "Urine R/E : "; echo $inveltdata->urine_re_result.' | ';
                           }
                        
                        }

                         if($inveltdata->urine_re_result!=''){
                          if($inveltdata->urine_re_date != ''){
                            echo "Urine R/E : "; echo $inveltdata->urine_re_result.' on '.date('d-m-Y',strtotime($inveltdata->urine_re_date))." | ";
                          }else{
                             echo "Urine R/E : "; echo $inveltdata->urine_re_result.' | ';
                          }
                         
                        }
 

                        if($inveltdata->abo_rh_result!=''){ 
                          if($inveltdata->abo_rh_date != ''){

                            echo "Abo & Rh : "; echo $inveltdata->abo_rh_result.' on '.date('d-m-Y',strtotime($inveltdata->abo_rh_date))." | ";
                          }else{
                                 echo "Abo & Rh : "; echo $inveltdata->abo_rh_result.' | ';
                          }
                        } 

                        if($inveltdata->s_urea_result!=''){
                          if($inveltdata->s_urea_date != ''){
                           echo "S urea : "; echo $inveltdata->s_urea_result.' on '.date('d-m-Y',strtotime($inveltdata->s_urea_date))." | ";   
                          }
                         else{
                          echo "S urea : "; echo $inveltdata->s_urea_result.' | ';
                         }
                        }

                       if($inveltdata->s_creatinine_result!=''){ 
                        if($inveltdata->s_creatinine_date != ''){
                           echo "S creatinine : "; echo $inveltdata->s_creatinine_result.' on '.date('d-m-Y',strtotime($inveltdata->s_creatinine_date))." | ";
                         }else{

                           echo "S creatinine : "; echo $inveltdata->s_creatinine_result.' | ';
                         }
                       

                        }

                        if($inveltdata->hba1c_result!=''){ 
                          if($inveltdata->hba1c_date != ''){
                            echo "HbA1C : "; echo $inveltdata->hba1c_result.' on '.date('d-m-Y',strtotime($inveltdata->hba1c_date))." | ";
                          }else{
                             echo "HbA1C : "; echo $inveltdata->hba1c_result.' | ';
                          }
                        

                        }

                         if($inveltdata->lft_result!=''){
                            if($inveltdata->lft_date != ''){
                              echo "LFT : "; echo $inveltdata->lft_result.' on '.date('d-m-Y',strtotime($inveltdata->lft_date))." | ";
                            }else{
                               echo "LFT : "; echo $inveltdata->lft_result.' | ';
                            }
                        

                        }

                        if($inveltdata->pt_result!=''){ 

                          if($inveltdata->lft_date != ''){
                             echo "PT : "; echo $inveltdata->pt_result.' on '.date('d-m-Y',strtotime($inveltdata->lft_date))." | ";
                           }else{
                            echo "PT : "; echo $inveltdata->pt_result.' | ';
                           }
                       

                        }

                        if($inveltdata->inr_result != ''){ 
                          if($inveltdata->inr_date != ''){

                             echo "INR : "; echo $inveltdata->inr_result.' on '.date('d-m-Y',strtotime($inveltdata->inr_date))." | ";
                          }else{
                              echo "INR : "; echo $inveltdata->inr_result.' | ';
                          }
                       

                        }

                        if($inveltdata->aptt_result != ''){ 

                          if($inveltdata->aptt_date != ''){

                             echo "APTT : "; echo $inveltdata->aptt_result.' on '.date('d-m-Y',strtotime($inveltdata->aptt_date))." | ";
                          }else{
                            echo "APTT : "; echo $inveltdata->aptt_result.' | ';
                          }
                       

                        }

                        if($inveltdata->ecg_result!=''){ 

                          if($inveltdata->ecg_date != ''){
                             echo "ECG in all leads : "; echo $inveltdata->ecg_result.' on '.date('d-m-Y',strtotime($inveltdata->ecg_date))." | ";
                           }else{
                             echo "ECG in all leads : "; echo $inveltdata->ecg_result.' | ';
                           }
                       

                        }

                        if($inveltdata->chest_xray_result!=''){ 
                          if($inveltdata->chest_xray_date != ''){

                             echo "Chest x-ray P/A view : "; echo $inveltdata->chest_xray_result.' on '.date('d-m-Y',strtotime($inveltdata->chest_xray_date))." | ";
                          }else{
                              echo "Chest x-ray P/A view : "; echo $inveltdata->chest_xray_result.' | ';
                          }
                       

                        }

                        if($inveltdata->echocardiography_result!=''){

                        if($inveltdata->echocardiography_date != ''){

                           echo "Echocardiography : "; echo $inveltdata->echocardiography_result.' on '.date('d-m-Y',strtotime($inveltdata->echocardiography_date))." | ";
                        }else{
                           echo "Echocardiography : "; echo $inveltdata->echocardiography_result.' | ';
                        } 
                       

                        }

                         if($inveltdata->serum_ca_result!=''){ 
                          if($inveltdata->serum_ca_date != ''){
                             echo "Serum CA 125 : "; echo $inveltdata->serum_ca_result.' on '.date('d-m-Y',strtotime($inveltdata->serum_ca_date))." | ";
                           }else{
                              echo "Serum CA 125 : "; echo $inveltdata->serum_ca_result.' | ';
                           }
                       

                        }

                         if($inveltdata->serum_bhch_result!=''){ 

                           if($inveltdata->serum_bhch_date != ''){

                             echo "Serum BHCH : "; echo $inveltdata->serum_bhch_result.' on '.date('d-m-Y',strtotime($inveltdata->serum_bhch_date))." | ";
                           }else{
                              echo "Serum BHCH : "; echo $inveltdata->serum_bhch_result.' | ';
                           }
                       

                        }

                         if($inveltdata->serum_afp_result!=''){ 
                          if($inveltdata->serum_afp_date != ''){
                            echo "Serum AFP : "; echo $inveltdata->serum_afp_result.' on '.date('d-m-Y',strtotime($inveltdata->serum_afp_date))." | ";
                          }else{
                            echo "Serum AFP : "; echo $inveltdata->serum_afp_result.' | ';
                          }
                        

                        }

                         if($inveltdata->usg_abdomen_result!=''){ 
                          if($inveltdata->usg_abdomen_date = ''){
                            echo "USG Of Lower Abdomen : "; echo $inveltdata->usg_abdomen_result.' on '.date('d-m-Y',strtotime($inveltdata->usg_abdomen_date))." | ";
                          }else{
                              echo "USG Of Lower Abdomen : "; echo $inveltdata->usg_abdomen_result.' | ';
                          }
                        

                        }

                        if($inveltdata->mri_abdomen_result!=''){ 
                          if($inveltdata->mri_abdomen_date != ''){
                             echo "MRI Of Whole Abdomen : "; echo $inveltdata->mri_abdomen_result.' on '.date('d-m-Y',strtotime($inveltdata->mri_abdomen_date))." | ";
                           }else{
                             echo "MRI Of Whole Abdomen : "; echo $inveltdata->mri_abdomen_result.' | ';
                           }
                       

                        }

                        if($inveltdata->endometril_result!=''){ 
                          if($inveltdata->endometril_date != ''){
                            echo "USG Of Lower Abdomen With Endrometrial Thickness(TVS) : "; echo $inveltdata->endometril_result.' on '.date('d-m-Y',strtotime($inveltdata->endometril_date))." | ";
                          }else{
                               echo "USG Of Lower Abdomen With Endrometrial Thickness(TVS) : "; echo $inveltdata->endometril_result.' | ';
                          }
                        

                        }

                        if($inveltdata->pap_smear_result!=''){ 

                          if($inveltdata->pap_smear_date != ''){
                            
                              echo "Pap Smear : "; echo $inveltdata->pap_smear_result.' on '.date('d-m-Y',strtotime($inveltdata->pap_smear_date))." | ";
                          }else{
                              echo "Pap Smear : "; echo $inveltdata->pap_smear_result.' | ';
                          }
                      

                        }

                         if($inveltdata->usg_breast_result!=''){ 
                          if($inveltdata->usg_breast_date != ''){
                             echo "USG Of Breast : "; echo $inveltdata->usg_breast_result.' on '.date('d-m-Y',strtotime($inveltdata->usg_breast_date))." | ";
                           }else{
                              echo "USG Of Breast : "; echo $inveltdata->usg_breast_result.' | ';
                           }
                       

                        }

                         if($inveltdata->memmography_result!=''){ 
                          if($inveltdata->memmography_date != ''){
                             echo "Mammography Of Left And Right Breast : "; echo $inveltdata->memmography_result.' on '.date('d-m-Y',strtotime($inveltdata->memmography_date))." | ";
                           }else{
                             echo "Mammography Of Left And Right Breast : "; echo $inveltdata->memmography_result.' | ';
                           }
                       

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
 <div style="margin-left:120px;word-wrap: break-word;font-size:13px;margin-top:-15px;">
     <?php
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



<br>
<?php  if ($prescriptionInvestigationpanel || $prescriptionInvestigationList) { ?>
<span class="spanhead">Suggested Investigation :</span>&nbsp;

<table style="margin-top: -18px;">
       <tr>
           <td style="font-size: 13px;margin-left: 110px; padding-left: 190px;"> <?php 
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
<table style="margin-top: -18px;">

    <tr>
        <td style="font-size: 13px;margin-left: 50px; padding-left: 95px;">
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
</div>
  
</div>

<footer id="footer"><hr>
 <p class="demo_font" style="text-align: center">
    In case of emergency to call 9874746006 /Techno Global Emergency number 9073943772</p></footer>
 </div> 
<?php
//             if($dysuriaprdata->complaintyear != ''){

//               echo 'for '.$dysuriaprdata->complaintyear.' years ';

//             }

//             if($dysuriaprdata->complaintmonth != ''){

//               if($dysuriaprdata->complaintyear != ''){

//                 echo $dysuriaprdata->complaintmonth.' months ';

//                }else{

//                   echo 'for '.$dysuriaprdata->complaintmonth.' months ';
//                }
//             }

//             if($dysuriaprdata->complaintday != ''){

//               if($dysuriaprdata->complaintyear != '' || $dysuriaprdata->complaintmonth != ''){
//                 echo  $dysuriaprdata->complaintday.' days ';
//               }else{

//                  echo 'for '.$dysuriaprdata->complaintday.' days ';
//               }
//             }

// //frequnecy of micturiation content

//             if($dysuriaprdata->freq_of_micturition != ''){

//                if($dysuriaprdata->freq_of_micturition == 'Yes'){

//                  echo 'associted with frequency of micturition ';

//                }else{
             
//                  echo ' not associted with frequency of micturition ';
           
//                }

//           }

// //pain abdomen content


//           if($dysuriaprdata->pain_abdomen != ''){

//             if($dysuriaprdata->freq_of_micturition != ''){

//               if($dysuriaprdata->freq_of_micturition == 'Yes'){

//                   if($dysuriaprdata->pain_abdomen == 'Yes'){
//                      echo ' and pain abdomen ';
//                    }else{
//                       echo ' and not associted with pain abdomen ';
//                    }
                

//               }else{

//                 if($dysuriaprdata->pain_abdomen == 'Yes'){

//                    echo ' and associted with pain abdomen ';

//                  }else{

//                   echo ' and pain abdomen ';

//                  }
//               }


//             }else{


//                  if($dysuriaprdata->pain_abdomen == 'Yes'){

//                    echo ' associted with pain abdomen ';

//                  }else{

//                   echo ' not associted with pain abdomen ';

//                  }
//             }

           
//           }

//       //fever display content

//           if($dysuriaprdata->dysuria_fever != ''){

//             if($dysuriaprdata->freq_of_micturition != ''){

//               if($dysuriaprdata->pain_abdomen != ''){

//               if($dysuriaprdata->freq_of_micturition == 'Yes'){

//                 if($dysuriaprdata->pain_abdomen == 'Yes'){

//                    if($dysuriaprdata->dysuria_fever == 'Yes'){

//                     echo 'and fever ';

//                     }else{
//                       echo 'and not associted with fever ';
//                     }

//                 }else{

//                       if($dysuriaprdata->dysuria_fever == 'Yes'){

//                            echo 'and associted with fever ';
//                       }else{
//                         echo 'and fever ';
//                       }
//                 }


//               }else{

//                if($dysuriaprdata->pain_abdomen == 'Yes'){

//                    if($dysuriaprdata->dysuria_fever == 'Yes'){

//                     echo 'and fever ';

//                     }else{
//                       echo 'and not associted with fever ';
//                     }

//                 }else{

//                       if($dysuriaprdata->dysuria_fever == 'Yes'){

//                            echo 'and associted with fever ';
//                       }else{
//                         echo 'and fever ';
//                       }
//                 }
              
//           }

//             }else{

//                  if($dysuriaprdata->freq_of_micturition == 'Yes'){

//                     if($dysuriaprdata->dysuria_fever == 'Yes'){
//                       echo 'and fever ';
//                     }else{
//                       echo 'and not associted with fever ';
//                     }
//                  }else{

//                    if($dysuriaprdata->dysuria_fever == 'Yes'){
//                       echo 'and associted with fever ';
//                     }else{
//                       echo 'and fever ';
//                     }

//                  }


//               }

//           }else{

//               if($dysuriaprdata->pain_abdomen != ''){

//               if($dysuriaprdata->freq_of_micturition == 'Yes'){

//                 if($dysuriaprdata->pain_abdomen == 'Yes'){

//                    if($dysuriaprdata->dysuria_fever == 'Yes'){

//                     echo 'and fever ';

//                     }else{
//                       echo 'and not associted with fever ';
//                     }

//                 }else{

//                       if($dysuriaprdata->dysuria_fever == 'Yes'){

//                            echo 'and associted with fever ';
//                       }else{
//                         echo 'and fever ';
//                       }
//                 }


//               }else{

//                if($dysuriaprdata->pain_abdomen == 'Yes'){

//                    if($dysuriaprdata->dysuria_fever == 'Yes'){

//                     echo 'and fever ';

//                     }else{
//                       echo 'and not associted with fever ';
//                     }

//                 }else{

//                       if($dysuriaprdata->dysuria_fever == 'Yes'){

//                            echo 'and associted with fever ';
//                       }else{
//                         echo 'and fever ';
//                       }
//                 }
              
//           }

//             }else{

//                  if($dysuriaprdata->freq_of_micturition == 'Yes'){

//                     if($dysuriaprdata->dysuria_fever == 'Yes'){
//                       echo 'and fever ';
//                     }else{
//                       echo 'and not associted with fever ';
//                     }
//                  }else{

//                    if($dysuriaprdata->dysuria_fever == 'Yes'){
//                       echo 'and associted with fever ';
//                     }else{
//                       echo 'and fever ';
//                     }

//                  }


//               }

                 
//           }

//       }

// //burning sensation


//       if($dysuriaprdata->burining_sensation != ''){

//             if($dysuriaprdata->freq_of_micturition != ''){

//                 if($dysuriaprdata->pain_abdomen != ''){

//                     if($dysuriaprdata->dysuria_fever != ''){

//                        if($dysuriaprdata->freq_of_micturition == 'Yes'){

//                          if($dysuriaprdata->pain_abdomen == 'Yes'){

//                             if($dysuriaprdata->dysuria_fever == 'Yes'){

//                                 if($dysuriaprdata->burining_sensation == 'Yes'){

//                                   echo ' and burning sensation ';
//                                  }else{
//                                   echo ' and not associted with burning sensation ';
//                                 }

//                             }else{

//                                 if($dysuriaprdata->burining_sensation == 'Yes'){

//                                   echo ' and associted with burning sensation ';
//                                  }else{
//                                   echo ' and burning sensation ';
//                                 }

//                             }

//                          }else{

//                                 if($dysuriaprdata->dysuria_fever == 'Yes'){

//                                 if($dysuriaprdata->burining_sensation == 'Yes'){

//                                   echo ' and burning sensation ';
//                                  }else{
//                                   echo ' and not associted with burning sensation ';
//                                 }

//                             }else{

//                                 if($dysuriaprdata->burining_sensation == 'Yes'){

//                                   echo ' and associted with burning sensation ';
//                                  }else{
//                                   echo ' and burning sensation ';
//                                 }

//                             }      

//                          }

//                        }else{

//                             if($dysuriaprdata->pain_abdomen == 'Yes'){

//                             if($dysuriaprdata->dysuria_fever == 'Yes'){

//                                 if($dysuriaprdata->burining_sensation == 'Yes'){

//                                   echo ' and burning sensation ';
//                                  }else{
//                                   echo ' and not associted with burning sensation ';
//                                 }

//                             }else{

//                                 if($dysuriaprdata->burining_sensation == 'Yes'){

//                                   echo ' and associted with burning sensation ';
//                                  }else{
//                                   echo ' and burning sensation ';
//                                 }

//                             }

//                          }else{

//                                 if($dysuriaprdata->dysuria_fever == 'Yes'){

//                                 if($dysuriaprdata->burining_sensation == 'Yes'){

//                                   echo ' and burning sensation ';
//                                  }else{
//                                   echo ' and not associted with burning sensation ';
//                                 }

//                             }else{

//                                 if($dysuriaprdata->burining_sensation == 'Yes'){

//                                   echo ' and associted with burning sensation ';
//                                  }else{
//                                   echo ' and burning sensation ';
//                                 }

//                             }      

//                          }

                             
//                        }

//                     }else{

//                        if($dysuriaprdata->pain_abdomen == 'Yes'){

//                            if($dysuriaprdata->burining_sensation == 'Yes'){

//                                   echo ' and burning sensation ';
//                                  }else{
//                                   echo ' and not associted with burning sensation ';
//                                 }

                          

//                          }else{

//                                 if($dysuriaprdata->dysuria_fever == 'Yes'){

//                                 if($dysuriaprdata->burining_sensation == 'Yes'){

//                                   echo ' and burning sensation ';
//                                  }else{
//                                   echo ' and not associted with burning sensation ';
//                                 }

//                             }else{

//                                 if($dysuriaprdata->burining_sensation == 'Yes'){

//                                   echo ' and associted with burning sensation ';
//                                  }else{
//                                   echo ' and burning sensation ';
//                                 }

//                             }      

//                          }


//                     }


//                 }else{


//                      if($dysuriaprdata->freq_of_micturition == 'Yes'){

//                          if($dysuriaprdata->pain_abdomen == 'Yes'){

//                             if($dysuriaprdata->dysuria_fever == 'Yes'){

//                                 if($dysuriaprdata->burining_sensation == 'Yes'){

//                                   echo ' and burning sensation ';
//                                  }else{
//                                   echo ' and not associted with burning sensation ';
//                                 }

//                             }else{

//                                 if($dysuriaprdata->burining_sensation == 'Yes'){

//                                   echo ' and associted with burning sensation ';
//                                  }else{
//                                   echo ' and burning sensation ';
//                                 }

//                             }

//                          }else{

//                                 if($dysuriaprdata->dysuria_fever == 'Yes'){

//                                 if($dysuriaprdata->burining_sensation == 'Yes'){

//                                   echo ' and burning sensation ';
//                                  }else{
//                                   echo ' and not associted with burning sensation ';
//                                 }

//                             }else{

//                                 if($dysuriaprdata->burining_sensation == 'Yes'){

//                                   echo ' and associted with burning sensation ';
//                                  }else{
//                                   echo ' and burning sensation ';
//                                 }

//                             }      

//                          }

//                        }else{

//                             if($dysuriaprdata->pain_abdomen == 'Yes'){

//                             if($dysuriaprdata->dysuria_fever == 'Yes'){

//                                 if($dysuriaprdata->burining_sensation == 'Yes'){

//                                   echo ' and burning sensation ';
//                                  }else{
//                                   echo ' and not associted with burning sensation ';
//                                 }

//                             }else{

//                                 if($dysuriaprdata->burining_sensation == 'Yes'){

//                                   echo ' and associted with burning sensation ';
//                                  }else{
//                                   echo ' and burning sensation ';
//                                 }

//                             }

//                          }else{

//                                 if($dysuriaprdata->dysuria_fever == 'Yes'){

//                                 if($dysuriaprdata->burining_sensation == 'Yes'){

//                                   echo ' and burning sensation ';
//                                  }else{
//                                   echo ' and not associted with burning sensation ';
//                                 }

//                             }else{

//                                 if($dysuriaprdata->burining_sensation == 'Yes'){

//                                   echo ' and associted with burning sensation ';
//                                  }else{
//                                   echo ' and burning sensation ';
//                                 }

//                             }      

//                          }

                             
//                        }

//                 }


//             }else{

                

//             }
//       }

 

</body>