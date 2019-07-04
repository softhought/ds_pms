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
		//border:1px solid;
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
		font-size:11px;	
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

/*div.header {
    display: block;
    text-align: center;
    position: running(header);
    width: 100%;
}

div.footer {

    display: block;
    text-align: center;
    position: running(footer);
    width: 100%;
}
*/


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
        	<td>Appointment No: 12345  </td>
        	<td>Sunday 4:30 PM</td>
        </tr>
    </table>
 </div>

    <hr>
 
    
    <div class="custom-page-start" style="padding:3px 0;height:23.5cm;#border:1px solid gray;  ">
    	
    	<span class="spanhead">Patient Particulars</span>
        <?php
                if ($patientmasterData) {
                 
        ?>

    	<table width="100%"   class="demo_font" style="margin-left: 40px;margin-top: 10px;" >
    		<tr>
    			<td width="7%">Name : </td>
    			<td width="35%"><?php echo $patientmasterData->patientname;?></td>
    			<td width="40%">Age : <?php echo $patientmasterData->patientage;?>
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
    			<td width="15%">Husband Mobile  :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<?php echo $patientmasterData->alternate_mobile;?></td>

    		</tr>
    		<tr>
    			<td width="15%">Address :</td>
    			<td colspan="2"><?php echo $patientmasterData->address;?></td>
    		</tr>
    		<tr>
    			<td colspan="3">&nbsp;</td>
    		</tr>
    		<tr>
    			<td width="30%">TT Taken on : <?php echo $tt_taken;?></td>
    			
    			<td width="15%">T dap Taken on : <?php echo $tdap_taken;?></td>
    		</tr>
    		
    	</table>
    <?php }?>

		<br>
    	<span class="spanhead">History Summary</span>
    	<table width="100%"   class="demo_font" style="margin-left: 40px;margin-top: 10px;" >
    		<tr>
    			<td colspan="2"><span>&#9744;&nbsp;&nbsp;</span>Parity : <?php if($antenantalCaseData){echo $total_parity;}?>&nbsp;
    				[<span>P</span><sub>A+B+C+D</sub>]
    				<!-- [ Term Delivery : <?php if($antenantalCaseData){echo $antenantalCaseData->parity_term_delivery;}?>, 
    				Preterm : <?php if($antenantalCaseData){ echo $antenantalCaseData->parity_preterm;}?>, 
    				Abortion : <?php if($antenantalCaseData){echo $antenantalCaseData->parity_abortion;}?>,
    				Issue : <?php if($antenantalCaseData){echo $antenantalCaseData->parity_issue;}?> ]  -->
    			</td>
    			
    		</tr>

    		<tr>
    			<td><span>&#9744;&nbsp;&nbsp;</span>Having previous LUCS :  <?php if($antenantalCaseData){echo $total_cesarean;}?></td>
    			<td> </td>
    		</tr>
    		<tr>
    			<td><span>&#9744;&nbsp;&nbsp;</span>Last child birth :  <?php if($lastchildBirth){echo $lastchildBirth->year;}?></td>
    			<td> </td>
    		</tr>
    		<?php

    		?>
    		<tr>
    			<td><span>&#9744;&nbsp;&nbsp;</span>Concieved after infertility treatment :  <?php

    			if($antenantalCaseData){
    			 echo $antenantalCaseData->procedure_concieve;

    				if ($antenantalCaseData->procedure_date!='') {
    					echo '  on '.date('d-m-Y', strtotime($antenantalCaseData->procedure_date));
    				}

    			}

    			?></td>
    			<td> </td>
    		</tr>

    		<tr>
    			<td><span>&#9744;&nbsp;&nbsp;</span>Number of spontaneous abortion:  <?php if($antenantalCaseData){echo $antenantalCaseData->spontaneous_abortion;}?></td>
    			<td> </td>
    		</tr>

    		<tr>
    			<td colspan="2"><span>&#9744;&nbsp;&nbsp;</span>With Previous History of:  
    				
    				
    			</td>
    			
    		</tr>

    	</table>
<?php



		if ($previousChild) {
					

?>
    	<table style="margin-left: 180px;width: 80%;font-size: 12px;" cellspacing="6"  >
    					
    						<tr>
    							<th width="10%" align="left">Year</th>
    							<th width="40%" align="left">Complication</th>
    							<th width="30%" align="left">Medical Problem</th>
    							<th width="30%" align="left">Other Problem</th>
    						</tr>
    						
    							<?php
    							foreach ($previousChild as $previouschildrow) {
    							?>
    						<tr>
    							<td><?php echo $previouschildrow['year'];?></td>
    							<td><?php echo $previouschildrow['complications'];?></td>
    							<td><?php echo $previouschildrow['med_prob'];?></td>
    							<td><?php echo $previouschildrow['med_prob_other'];?></td>
    						</tr>
    						<?php
    								}

    						?>
    						
    					
    				</table>
    			<?php }?>

    	<table width="100%"   class="demo_font" style="margin-left: 40px;margin-top: 10px;" >
    		<tr>
    			<td><span>&#9744;&nbsp;&nbsp;</span>With known case of : <?php echo $diseases;?></td>
    			<td>  </td>
    		</tr>

    		<tr>
    			<td><span>&#9744;&nbsp;&nbsp;</span>With surgical history of :</td>
    			<td>  </td>
    		</tr>
    	</table>
           <div style="margin-left:180px;word-wrap: break-word;font-size:12px;">
        <?php
                if ($surgicaData) {

                    foreach ($surgicaData as $surgicadatarow) {

                        if ($surgicadatarow->other_surgery_name!='') {
                            echo $surgicadatarow->other_surgery_name;
                        }else{   
                            echo $surgicadatarow->surgery_name;
                        }

                        echo '('.$surgicadatarow->yearback.' years back) |';
                    }
             

?>
</div>
        
                <?php }?>



        <table width="100%"   class="demo_font" style="margin-left: 40px;margin-top: 10px;" >
            <tr>
                <td><span>&#9744;&nbsp;&nbsp;</span>With allergy of : <?php 
                if($antenantalCaseData){
                 echo $antenantalCaseData->any_allergy;
                }
                ?></td>
                <td>  </td>
            </tr>
            <tr>
                <td colspan="2"><span>&#9744;&nbsp;&nbsp;</span>With Family History of:   
                </td>
                
            </tr>    
        </table>


        <?php
                if ($familyComponentList) {
                    

?>
        <table style="margin-left: 180px;width: 60%;font-size: 12px;" cellspacing="6"  >
                        
                            <tr>
                                <th width="10%" align="left">&nbsp;</th>
                                <th width="5%" align="left">Father</th>
                                <th width="5%" align="left">Mother</th>
                              
                            </tr>
                            
                                <?php
                                foreach ($familyComponentList as $familycomponentrow) {

                                    if ($familycomponentrow->is_father=='Y' || $familycomponentrow->is_mother=='Y') {
                                      
                                 
                                ?>
                            <tr>
                                  <td >&nbsp;<?php 

                                  if ($familycomponentrow->othercomptext!='') {
                                      echo $familycomponentrow->othercomptext;
                                  }else{
                                     echo $familycomponentrow->component_name;
                                  }

                                 
                                  ?></td>
                                <td><?php 
                                if ($familycomponentrow->is_father=='Y') {
                                     echo 'Yes';
                                }
                               
                                ?></td>
                                <td>
                                    <?php 
                                if ($familycomponentrow->is_mother=='Y') {
                                     echo 'Yes';
                                }
                               
                                ?>
                                </td>
                              
                               
                            </tr>
                            <?php
                                }
                                    }

                            ?>
                            
                        
                    </table>
                <?php }?>



    </div>


 <hr>
 <p class="demo_font" style="text-align: center">
    In case emergency to call 9874746006 /Techno Global Emergency number 9073943772
</div>
<!-- <div class='footer'>Footer</div> -->
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
            <td>Appointment No: 12345  </td>
            <td>Sunday 4:30 PM</td>
        </tr>
    </table>
 </div>
    <hr>

<div style="padding:3px 0;height:23.5cm;" >
    <table width="100%"   class="demo_font" style="margin-left: 40px;margin-top: 10px;" >
            <tr>
                <td><span>&#9744;&nbsp;&nbsp;</span>High risk for : <?php 
                if($antenantalCaseData){echo $highrisk;}
                ?></td>
                <td>  </td>
            </tr>

          <tr>
                <td><span>&#9744;&nbsp;&nbsp;</span>On medication : </td>
                <td>  </td>
            </tr> 
        </table>


                <?php
                if ($familyComponentList) {
                    

?>
        <table style="margin-left: 180px;width: 80%;font-size: 12px;" cellspacing="6"  >
                        
                            <tr>
                                <th width="15%" align="left">Medicine </th>
                                <th width="5%" align="left">Dose </th>
                                <th width="15%" align="left">for last(year)</th>
                                <th width="15%" align="left">for last(month)</th>
                              
                            </tr>
                            
                                <?php
                                foreach ($regularMedicineList as $regularmedicinerow) {

                                ?>
                            <tr>
                                 <td><?php echo $regularmedicinerow->medicine_name;?></td>
                                 <td><?php echo $regularmedicinerow->medicine_dose;?></td>
                                 <td><?php echo $regularmedicinerow->for_year;?></td>
                                 <td><?php echo $regularmedicinerow->for_month;?></td>

                               
                            </tr>
                            <?php
                              
                                 }

                            ?>
                            
                        
                    </table>
                <?php }?>



               <?php
                if ($inveltdata) {
                    

                ?>
<span class="spanhead">Investigation :</span>
                        <div style="margin-left:120px;word-wrap: break-word;font-size: 12px;">
                        
                        <?php if($inveltdata->hb_result!=''){ 
                          
                          echo "Hb : "; echo $inveltdata->hb_result.'   |   ';
                           
                        }
                        ?>
                       
                        <?php if($inveltdata->tc_result!=''){ echo "TC : "; echo $inveltdata->tc_result.'   |   ';} ?>
                          
                        <?php if($inveltdata->dc_result!=''){ echo "DC : "; echo $inveltdata->dc_result.'   |   '; } ?>

                        <?php if($inveltdata->fbs_result!=''){ echo "FBS : "; echo $inveltdata->fbs_result.'   |   '; } ?>

                        <?php if($inveltdata->ppbs_result!=''){ echo "PPBS : "; echo $inveltdata->ppbs_result.'   |   '; } ?>

                        <?php if($inveltdata->vdrl_result!=''){ echo "VDRL : "; echo $inveltdata->vdrl_result.'   |   '; } ?>

                        <?php if($inveltdata->hiv_one_result!=''){ echo "HIV 1 : "; echo $inveltdata->hiv_one_result.'   |   '; } ?>

                        <?php if($inveltdata->hiv_two_result!=''){ echo "HIV 2 : "; echo $inveltdata->hiv_two_result.'   |   '; } ?>

                        <?php if($inveltdata->hbsag_result!=''){ echo "Hbs Ag : "; echo $inveltdata->hbsag_result.'   |   '; } ?>

                        <?php if($inveltdata->antihcv_result!=''){ echo "Anti HCV : "; echo $inveltdata->antihcv_result.'   |   '; } ?>

                        <?php if($inveltdata->urine_re_result!=''){ echo "Urine R/E : "; echo $inveltdata->urine_re_result.'   |   '; } ?>

                        <?php if($inveltdata->cs_sensitive_to_result!=''){ echo "Urine C/S : "; echo $inveltdata->cs_sensitive_to_result.'   |   '; } ?>

                        <?php if($inveltdata->stsh_result!=''){ echo "STSH : "; echo $inveltdata->stsh_result.'   |   '; } ?>
                        
                        <?php if($inveltdata->s_urea_result!=''){ echo "S urea : "; echo $inveltdata->s_urea_result.'   |   '; } ?>

                        <?php if($inveltdata->s_creatinine_result!=''){ echo "S creatinine : "; echo $inveltdata->s_creatinine_result.'   |   '; } ?>

                        <?php if($inveltdata->combined_test_result!=''){ echo "Combined Test : "; echo $inveltdata->combined_test_result.'   |   '; } ?>

                        <?php if($inveltdata->thalassemia_result!=''){ echo "Thalassemia : "; echo $inveltdata->thalassemia_result.'   |   '; } ?>

                        <?php if($inveltdata->usg_slf_week!=''){ echo "USG dating scan : "; echo 'SLF of '.$inveltdata->usg_slf_week.' week '.$inveltdata->usg_slf_day.' day    |   '; } ?>

                        <?php if($inveltdata->nt_scan_lowerrisk!=''){ echo "NT scan + Double marker : "; echo 'Low risk for <b>'.$inveltdata->nt_scan_lowerrisk.'</b>  High risk for <b>'.$inveltdata->nt_scan_highrisk.'</b>   |   '; } ?>
                   

                        <?php if($inveltdata->anomaly_slf_week!=''){ echo "Anomaly scan : "; echo 'SLF of '.$inveltdata->anomaly_slf_week.' week '.$inveltdata->anomaly_slf_day.' day    |   '; } ?>

                        <?php if($inveltdata->thalassemia_result!=''){ echo "Growth scan : "; echo 'SLF of '.$inveltdata->growth_slf_week.' week '.$inveltdata->growth_slf_day.' day    |   '; } ?>
                        </div>

                      



        
                <?php }?>

              <table width="100%"   class="demo_font" style="margin-left: 150px;margin-top: 10px;" >
            <tr>
                <td><span>&#9744;&nbsp;&nbsp;</span>BMI : <?php  if ($examinationLatestData) {echo $examinationFirstData->exam_bmi;}?></td>
               <td><span>&#9744;&nbsp;&nbsp;</span>Weight : <?php  if ($examinationLatestData) {echo $examinationFirstData->exam_weight;}?></td>
            </tr>

            
        </table><br>

        <span class="spanhead">Clinical  Examination :</span>



                <?php
                if ($clinicalExaminationLatestData) {
                    

?>
        <table style="width: 90%;font-size: 12px;margin-left:60px;" cellspacing="6"  >
                        
                            <tr>
                                <th  align="left">Date  </th>
                                <th  align="left">weeks by LMP</th>
                                <th  align="left">Days by LMP</th>
                                <th  align="left">weeks by USG</th>
                                <th  align="left">Days by USG</th>
                                <th  align="left">Weight</th>
                                <th  align="left">BP(S) </th>
                                <th  align="left">BP(D)</th>
                              
                              
                            </tr>
                            
                                
                            <tr>
                                 <td><?php 
                                 if($clinicalExaminationLatestData->examination_date!=''){
                                    echo date('d-m-Y', strtotime($clinicalExaminationLatestData->examination_date));}
                                ?></td>
                                 <td align="center"><?php echo $clinicalExaminationLatestData->weeks_by_lmp;?></td>
                                 <td align="center"><?php echo $clinicalExaminationLatestData->days_by_lmp;?></td>
                                 <td align="center"><?php echo $clinicalExaminationLatestData->weeks_by_usg;?></td>
                                 <td align="center"><?php echo $clinicalExaminationLatestData->days_by_usg;?></td>
                                 <td align="center"><?php echo $clinicalExaminationLatestData->cliexm_weight;?> kg.</td>
                                 <td align="center"><?php echo $clinicalExaminationLatestData->cliexm_bp_s;?></td>
                                 <td align="center"><?php echo $clinicalExaminationLatestData->cliexm_bp_d;?></td>
                               
                            </tr>

                            <tr>
                                <td colspan="8">&nbsp;</td>
                            </tr>
                              <tr>
                                
                                <th  align="left">Pallor </th>
                                <th  align="left">Oedema </th>
                                <th  align="left">Fundal Height</th>
                                <th  align="left">SFH(cm)</th>
                                <th  align="left">FSH(/min)</th>
                                <th  align="left">Appointment</th>
                              
                            </tr>
                            <tr>
                                
                                 <td><?php echo $clinicalExaminationLatestData->cliexm_pallor;?></td>
                                 <td><?php echo $clinicalExaminationLatestData->cliexm_oedema;?></td>
                                 <td><?php echo $clinicalExaminationLatestData->fundal_height;?></td>
                                 <td><?php echo $clinicalExaminationLatestData->cliexm_sfh;?></td>
                                 <td><?php echo $clinicalExaminationLatestData->cliexm_fsh;?></td>
                                 <td><?php 

                                        if($clinicalExaminationLatestData->cliexm_appointment_date!=''){
                                            echo date('d-m-Y', strtotime($clinicalExaminationLatestData->cliexm_appointment_date));
                                        }else{
                                                if($clinicalExaminationLatestData->cliexm_after_week!=''){
                                                    echo $clinicalExaminationLatestData->cliexm_after_week.' weeks ';
                                                }
                                                if($clinicalExaminationLatestData->cliexm_after_days!=''){
                                                    echo $clinicalExaminationLatestData->cliexm_after_days.' days ';
                                                }
                                            }
                                 
                                 ?></td>
                                 
                            </tr>
                   
                    </table>
                <?php }?>


                <span class="spanhead">Prescription :</span>

<?php
      if ($prescriptionMedicineList) {
          

?>
<table style="margin-left: 180px;width: 80%;font-size: 12px;" cellspacing="6"  >
              
                  <tr>
                      <th width="15%" align="left">Medicine </th>
                      <th width="5%" align="left">Dosage </th>
                      <th width="15%" align="left">Frequency</th>
                      <th width="15%" align="left">Days</th>
                    
                  </tr>
                  
                      <?php
                      foreach ($prescriptionMedicineList as $prescriptionmedicinerow) {

                      ?>
                   <tr>
                       <td><?php echo $prescriptionmedicinerow->medicine_name;?></td>
                       <td><?php echo $prescriptionmedicinerow->dosage;?></td>
                       <td><?php echo $prescriptionmedicinerow->frequency;?></td>
                       <td><?php echo $prescriptionmedicinerow->days;?></td>

                  </tr>
                  <?php
                    
                       }

                  ?>
                  
              
          </table>
      <?php }?>



<br>
<span>Doctor Note :</span><p><?php  if ($prescriptionMedicineList) {echo $prescriptionLatestData->doctor_note;}?></p><br><br>
<span >Next Checkup Date :</span><?php 
if ($prescriptionMedicineList) {
if ($prescriptionLatestData->next_checkup_dt!='') {
                       echo date('l d M Y', strtotime($prescriptionLatestData->next_checkup_dt));
                     }

              }


?>


<br><br>

<span class="spanhead">Suggested Investigation : </span>&nbsp;     <?php
                                             if ($prescriptionMedicineList) {
                                                 $chkcoma=0;
                                              foreach ($prescriptionInvestigationList as $prescriptionInvestigation) {
                                                  if($chkcoma!=0){echo ",";}
                                                  echo $prescriptionInvestigation->inv_component_name;
                                                  $chkcoma++;
                                              }
                                             }
                                              ?>

<br><br>
<span class="spanhead">Review :</span><br><br>
<span class="spanhead">Diagnosis Summary :</span><br>

     

   </div> 
</div><!--end of page 2 div -->

<hr>
 <p class="demo_font" style="text-align: center">
    In case emergency to call 9874746006 /Techno Global Emergency number 9073943772</p>


    <!-- <div class="page_3">

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
            <td>Appointment No: 12345  </td>
            <td>Sunday 4:30 PM</td>
        </tr>
    </table>
 </div>
    <hr>

    <div class="custom-page-start" style="padding:3px 0;height:23.5cm;#border:1px solid gray;  ">
        
      

    </div>


        
    </div> -->
    <!-- end of page_3 -->

</div>



</body>
</html>