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
            <td style="color: gray;">Reg No: <?php echo $drRegNo;?> </td>
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
    			<td colspan="2"><?php echo $patientmasterData->address;?></td>
    		</tr>
    		<tr>
    			<td colspan="3">&nbsp;</td>
    		</tr>
    		<tr>
                <?php
                    if($tt1_tobetaken==''){
                    if($tt1_taken!=''){
                ?>
    			<td width="30%">TT1 Taken on : <?php echo $tt1_taken;?></td>
                <?php
                    }
                }else{
                ?>
                    <td width="30%">TT1 To be Taken on : <?php echo $tt1_tobetaken;?></td>
                <?php } ?>

                <?php
                    if($tt2_tobetaken==''){
                    if($tt2_taken!=''){
                ?>
    			<td width="30%">TT2 Taken on : <?php echo $tt2_taken;?></td>
                <?php
                    }
                }else{
                ?>
                    <td width="30%">TT2 To be Taken on : <?php echo $tt2_tobetaken;?></td>
                <?php } ?>


                <?php
                    if($tdap_tobetaken==''){
                    if($tdap_taken!=''){
                ?>
    			<td width="30%">Tdap Taken on : <?php echo $tdap_taken;?></td>
                <?php
                    }
                }else{
                ?>
                    <td width="30%">Tdap To be Taken on : <?php echo $tdap_tobetaken;?></td>
                <?php } ?>
    			
    			
    		</tr>
    		
    	</table>
    <?php }?>

		<br>
    	<span class="spanhead">History Summary</span>
    	<table width="100%"   class="demo_font" style="margin-left: 40px;margin-top: 10px;" >
            
            <?php ?>
            <tr>
    			<td colspan="2"><span>&#9744;&nbsp;&nbsp;</span> <?php if($antenantalCaseData){echo "GN :".$total_parity;}?>&nbsp;
    				<!-- [<span>P</span><sub>A+B+C+D</sub>] -->
    				<!-- [ Term Delivery : <?php if($antenantalCaseData){echo $antenantalCaseData->parity_term_delivery;}?>, 
    				Preterm : <?php if($antenantalCaseData){ echo $antenantalCaseData->parity_preterm;}?>, 
    				Abortion : <?php if($antenantalCaseData){echo $antenantalCaseData->parity_abortion;}?>,
    				Issue : <?php if($antenantalCaseData){echo $antenantalCaseData->parity_issue;}?> ]  -->
    			</td>
    			
    		</tr>

            <?php if($total_cesarean!=0){ ?>    
    		<tr>
    			<td><span>&#9744;&nbsp;&nbsp;</span>Having previous LUCS :  <?php echo $total_cesarean;?></td>
    			<td> </td>
    		</tr>
            <?php } 
            
             if($lastchildBirth){
            
            ?>
    		<tr>
    			<td><span>&#9744;&nbsp;&nbsp;</span>Last child birth :  <?php echo $lastchildBirth->year;?></td>
    			<td> </td>
    		</tr>
    		<?php
             }
            ?>
            
            <?php if($antenantalCaseData){

                if($antenantalCaseData->procedure_concieve!=''){
                ?>
    		<tr>
    			<td><span>&#9744;&nbsp;&nbsp;</span>Concieved after infertility treatment :  <?php

    			
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
            if($antenantalCaseData){
                if($antenantalCaseData->spontaneous_abortion!='' && $antenantalCaseData->spontaneous_abortion!='0'){
            ?>
    		<tr>
    			<td><span>&#9744;&nbsp;&nbsp;</span>Number of spontaneous abortion:  <?php echo $antenantalCaseData->spontaneous_abortion;?></td>
    			<td> </td>
    		</tr>
            <?php }}
            
            if ($previousChildHistory) {
            ?>

    		<tr>
    			<td colspan="2"><span>&#9744;&nbsp;&nbsp;</span>With Previous History of: 	</td>
    			
            </tr>
            <?php } ?>

    	</table>
<?php



		if ($previousChildHistory) {
					

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
    		<?php if($diseases!=''){?>
            <tr>
    			<td><span>&#9744;&nbsp;&nbsp;</span>With known case of : <?php echo $diseases;?></td>
    			<td>  </td>
    		</tr>
            <?php }
            if ($surgicaData) {
            ?>

    		<tr>
    			<td><span>&#9744;&nbsp;&nbsp;</span>With surgical history of :</td>
    			<td>  </td>
    		</tr>
            <?php }?>

    	</table>
           <div style="margin-left:180px;word-wrap: break-word;font-size:12px;margin-top:-20px;">
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

        
                <?php }?>
                </div>



        <table width="100%"   class="demo_font" style="margin-left: 40px;margin-top: 10px;" >
          
          <?php 
           if($antenantalCaseData){

            if($antenantalCaseData->any_allergy!=''){
          ?>
            <tr>
                <td><span>&#9744;&nbsp;&nbsp;</span>With allergy of : <?php 
               
                 echo $antenantalCaseData->any_allergy;
                
                ?></td>
                <td>  </td>
            </tr>
            <?php 
                } }


                if ($familyCompData=='Y') {

            ?>
            <tr>
                <td colspan="2"><span>&#9744;&nbsp;&nbsp;</span>With Family History of:   
                </td>
                
            </tr>  
                <?php } ?>  
        </table>


        <?php
                if ($familyCompData=='Y') {
                    

?>
        <table style="margin-left: 180px;width: 60%;font-size: 12px;margin-top:-20px;" cellspacing="6"  >
                        
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


        <table width="100%"   class="demo_font" style="margin-left: 40px;margin-top: 10px;" >
            <?php 
            if($antenantalCaseData){
                if($highrisk!=''){
            ?>
            <tr>
                <td><span>&#9744;&nbsp;&nbsp;</span>High risk for : <?php 
                echo $highrisk;
                ?></td>
                <td>  </td>
            </tr>
            <?php
            }}
            ?>
             <?php if ($regularMedicineList) {?>
             <tr>
                <td><span>&#9744;&nbsp;&nbsp;</span>On medication : </td>
                <td>  </td>
            </tr>
             <?php } ?>

        </table>

        <?php if ($regularMedicineList) {?>
        <table style="margin-left: 180px;width: 80%;font-size: 12px;margin-top:-20px;" cellspacing="2"  >
                        
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
        	<td style="color: gray;">Reg No: <?php echo $drRegNo;?>  </td>
            <td>Print Dt:<?php  echo date('d-m-Y');?></td>
        </tr>
    </table>
 </div>
    <hr>

<div style="padding:3px 0;height:23.5cm;" >



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

                        <?php if($inveltdata->nt_scan_lowerrisk!=''){ echo "NT scan + Double marker : "; echo 'Low risk for '.$inveltdata->nt_scan_lowerrisk.'  High risk for '.$inveltdata->nt_scan_highrisk.'   |   '; } ?>
                   

                        <?php if($inveltdata->anomaly_slf_week!=''){ echo "Anomaly scan : "; echo 'SLF of '.$inveltdata->anomaly_slf_week.' week '.$inveltdata->anomaly_slf_day.' day    |   '; } ?>

                        <?php if($inveltdata->growth_slf_week!=''){ echo "Growth scan : "; echo 'SLF of '.$inveltdata->growth_slf_week.' week '.$inveltdata->growth_slf_day.' day       '; } ?>

                        <?php if($inveltdata->growth_presentation!=''){?> Presentation(<?php echo $inveltdata->growth_presentation;?>) <?php } ?>

                        <?php if($inveltdata->growth_afi!=''){?>, AFI(<?php echo $inveltdata->growth_afi;?>) <?php } ?>

                        <?php if($inveltdata->growth_liquor!=''){?>, Liquor(<?php echo $inveltdata->growth_liquor;?>) <?php } echo "|";?>

                        <?php if($inveltdata->doppler_slf_week!=''){ echo "Doppler scan : "; echo 'SLF of '.$inveltdata->doppler_slf_week.' week '.$inveltdata->doppler_slf_day.' day       '; } ?>
                        <?php if($inveltdata->doppler_presentation!=''){?> Presentation(<?php echo $inveltdata->doppler_presentation;?>) <?php } ?>
                        <?php if($inveltdata->doppler_afi!=''){?>, AFI(<?php echo $inveltdata->doppler_afi;?>) <?php } ?>
                        <?php if($inveltdata->doppler_liquor!=''){?>, Liquor(<?php echo $inveltdata->doppler_liquor;?>) <?php } echo "|";?>

                        <?php if($inveltdata->doppler_checkbox!='' && $inveltdata->doppler_checkbox=='Normal'){?> Doppler parameters within normal limit <?php echo "|"; } ?>

                    <?php if($inveltdata->umbilical_artery_pi!=""){?> <?php echo " Umbilical artery PI:".$inveltdata->umbilical_artery_pi; }?>
                    <?php if($inveltdata->mca_pi!=""){?> <?php echo " MCA PI:".$inveltdata->mca_pi; }?>
                    <?php if($inveltdata->cp_ratio!=""){?> <?php echo " CP Ratio:".$inveltdata->cp_ratio; }?>
                    <?php if($inveltdata->doppler_parameters_others!=""){?> <?php echo " Doppler Others:".$inveltdata->doppler_parameters_others; }?>

                    <?php if($inveltdata->others_investigation!=""){?> <?php echo "Others Investigation:".$inveltdata->others_investigation; }?>

                        </div>

                      



        
                <?php }?>

              <table width="100%"   class="demo_font" style="margin-left: 150px;margin-top: 10px;" >
              <?php if ($examinationLatestData) {?>
            <tr>
                <td><span>&#9744;&nbsp;&nbsp;</span>BMI : <?php  if ($examinationLatestData) {echo $examinationFirstData->exam_bmi;}?></td>
               <td><span>&#9744;&nbsp;&nbsp;</span>Weight : <?php  if ($examinationLatestData) {echo $examinationFirstData->exam_weight;}?></td>
            </tr>
                    <?php }?>

            
        </table><br>

       



                <?php
                if ($clinicalExaminationLatestData) {
                    

?>
 <span class="spanhead">Clinical  Examination :</span>
        <table style="width: 90%;font-size: 12px;margin-left:60px;" cellspacing="6"  >
                        
                            <tr>
                                <td  align="left">Date  </td>
                                <td  align="left">Wks. by LMP</td>
                                <td  align="left">Days by LMP</td>
                                <td  align="left">Wks. by USG</td>
                                <td  align="left">Days by USG</td>
                                <td  align="center">Weight</td>
                                <td  align="left">BP(S) </td>
                                <td  align="left">BP(D)</td>
                              
                              
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
                                
                                <td  align="left">Pallor </td>
                                <td  align="left">Oedema </td>
                                <td  align="left">Fundal Height</td>
                                <td  align="left">SFH(cm)</td>
                                <td  align="left">FSH(/min)</td>
                                <td  align="left" colspan="2">Appointment</td>
                              
                            </tr>
                            <tr>
                                
                                 <td><?php echo $clinicalExaminationLatestData->cliexm_pallor;?></td>
                                 <td><?php echo $clinicalExaminationLatestData->cliexm_oedema;?></td>
                                 <td><?php echo $clinicalExaminationLatestData->fundal_height;?></td>
                                 <td><?php echo $clinicalExaminationLatestData->cliexm_sfh;?></td>
                                 <td><?php echo $clinicalExaminationLatestData->cliexm_fsh;?></td>
                                 <td colspan="2"><?php 

                                        if($clinicalExaminationLatestData->cliexm_appointment_date!=''){
                                            echo date('d-m-Y', strtotime($clinicalExaminationLatestData->cliexm_appointment_date));
                                        }else{
                                             echo "after ";
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


               

<?php
      if ($prescriptionMedicineList) {
          

?>
 <span class="spanhead">Prescription :</span>
<table style="margin-left: 150px;width: 100%;font-size: 12px;margin-top:-20px;" cellspacing="6"  >
              
                  <tr>
                      <th width="15%" align="left">Medicine </th>
                      <th width="35%" align="left">Instruction </th>
                      <th width="8%" align="left">Dos.</th>
                      <th width="15%" align="left">Freq.</th>
                      <th width="15%" align="left">Days</th>
                    
                  </tr>
                  
                      <?php
                      foreach ($prescriptionMedicineList as $prescriptionmedicinerow) {

                      ?>
                   <tr>
                       <td><?php echo $prescriptionmedicinerow->medicine_name;?></td>
                       <td><?php echo $prescriptionmedicinerow->med_instruction;?></td>
                       <td><?php echo $prescriptionmedicinerow->dosage;?></td>
                       <td><?php    if($prescriptionmedicinerow->frequency=="OD"){
                                     echo "once a day";
                                    }else if($prescriptionmedicinerow->frequency=="BD"){
                                     echo "twice a day";
                                    }else if($prescriptionmedicinerow->frequency=="TDS"){
                                     echo "thrice a day";
                                    }else if($prescriptionmedicinerow->frequency=="HS"){
                                       echo"at bedtime";
                                    }
                                    
                       ?></td>
                       <td><?php echo $prescriptionmedicinerow->days;?></td>

                  </tr>
                  <?php
                    
                       }

                  ?>
                  
              
          </table>
      <?php }?>



<br>
<span></span><p><?php  if ($prescriptionMedicineList) {
    if($prescriptionLatestData->doctor_note!=''){
        echo "Doctor Note :".$prescriptionLatestData->doctor_note."<br>";
    }
    }?></p>
<?php 
if ($prescriptionMedicineList) {
if ($prescriptionLatestData->next_checkup_dt!='') {
                       echo "<span >Next Checkup Date :</span>".date('l d M Y', strtotime($prescriptionLatestData->next_checkup_dt));
                     }

              }


?>


<br><br>
<?php  if ($prescriptionMedicineList) {?>
<span class="spanhead">Suggested Investigation : </span>&nbsp;     <?php
                                            
                                                 $chkcoma=0;
                                              foreach ($prescriptionInvestigationList as $prescriptionInvestigation) {
                                                  if($chkcoma!=0){echo ",";}
                                                  echo $prescriptionInvestigation->inv_component_name;
                                                  $chkcoma++;
                                              }
                                             }
                                              ?>

<br><br>


     

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