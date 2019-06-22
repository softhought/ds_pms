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

    	<table width="100%"   class="demo_font" style="margin-left: 40px;margin-top: 10px;" >
    		<tr>
    			<td width="7%">Name : </td>
    			<td width="35%"><?php echo $patientmasterData->patientname;?></td>
    			<td width="40%">Age : <?php echo $patientmasterData->patientage;?>
    				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sex : <?php echo $patientmasterData->gender;?>
    			</td>
    			
    			
    			
    		</tr>
    		
    		<tr>
    			<td >Self Blood Group :</td>
    			<td><?php echo $patientmasterData->slfbldgrp;?></td>
    			<td width="40%" style="word-wrap: no-warp;">Husband Blood Group : <?php echo $patientmasterData->husbldgrp;?></td>
    			
    			
    			
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
    			<td width="15%">TT Taken on :</td>
    			<td>&nbsp;</td>
    			<td width="15%">T dap Taken on :</td>
    		</tr>
    		
    	</table>

		<br>
    	<span class="spanhead">History Summary</span>
    	<table width="100%"   class="demo_font" style="margin-left: 40px;margin-top: 10px;" >
    		<tr>
    			<td colspan="2"><span>&#9744;&nbsp;&nbsp;</span>Parity : <?php if($antenantalCaseData){echo $total_parity;}?>&nbsp;
    				
    				[ sTermdelivery : <?php if($antenantalCaseData){echo $antenantalCaseData->parity_term_delivery;}?>, 
    				Preterm : <?php if($antenantalCaseData){ echo $antenantalCaseData->parity_preterm;}?>, 
    				Abortion : <?php if($antenantalCaseData){echo $antenantalCaseData->parity_abortion;}?>,
    				Issue : <?php if($antenantalCaseData){echo $antenantalCaseData->parity_issue;}?> ] 
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
    			<td><span>&#9744;&nbsp;&nbsp;</span>With surgica history of :</td>
    			<td>  </td>
    		</tr>
    	</table>

        <?php
                if ($surgicaData) {
                    

?>
        <table style="margin-left: 180px;width: 60%;font-size: 12px;" cellspacing="6"  >
                        
                            <tr>
                                <th width="10%" align="left">Surgery</th>
                                <th width="5%" align="left">Years back</th>
                              
                            </tr>
                            
                                <?php
                                foreach ($surgicaData as $surgicadatarow) {
                                ?>
                            <tr>
                                <td><?php 

                                if ($surgicadatarow->other_surgery_name!='') {
                                    echo $surgicadatarow->other_surgery_name;
                                }else{   
                                    echo $surgicadatarow->surgery_name;
                                }

                                ?></td>
                                <td align="center">&nbsp;<?php echo $surgicadatarow->yearback;?></td>
                               
                            </tr>
                            <?php
                                    }

                            ?>
                            
                        
                    </table>
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
        <table style="margin-left: 180px;width: 80%;font-size: 12px;" cellspacing="6"  >
                        
                            <tr>
                                <th width="15%" align="left">Test </th>
                                <th width="40%" align="left">Test Result </th>
                                <th width="10%" align="left">Test Date </th>
                              
                              
                            </tr>

                             <?php if($inveltdata->hb_result!=''){?> 
                             <tr> <td>Hb</td> <td><?php echo $inveltdata->hb_result;?></td>
                             <td><?php 
                             if ($inveltdata->hb_date!='') {
                                echo date('d-m-Y', strtotime($inveltdata->hb_date));
                             }
                             ?></td>
                            </tr>
                            <?php }

                             if($inveltdata->tc_result!=''){
                             ?> 
                            <tr><td>TC</td> <td><?php echo $inveltdata->tc_result;?></td>
                             <td><?php 
                             if ($inveltdata->tc_date!='') {
                                echo date('d-m-Y', strtotime($inveltdata->tc_date));
                             }
                             ?></td>
                            </tr>
                            <?php }

                            if($inveltdata->dc_result!=''){
                             ?> 
                            <tr><td>DC</td> <td><?php echo $inveltdata->dc_result;?></td>
                            <td><?php 
                             if ($inveltdata->dc_date!='') {
                                echo date('d-m-Y', strtotime($inveltdata->dc_date));
                             }
                             ?></td>
                            </tr>
                            <?php }

                            if($inveltdata->fbs_result!=''){ ?> 
                            <tr><td>FBS</td> <td><?php echo $inveltdata->fbs_result;?></td>
                            <td><?php 
                             if ($inveltdata->fbs_date!='') {
                                echo date('d-m-Y', strtotime($inveltdata->fbs_date));
                             }
                             ?></td>
                            </tr>
                            <?php }

                            if($inveltdata->ppbs_result!=''){ ?> 
                            <tr><td>PPBS</td> <td><?php echo $inveltdata->ppbs_result;?></td>
                            <td><?php 
                             if ($inveltdata->ppbs_date!='') {
                                echo date('d-m-Y', strtotime($inveltdata->ppbs_date));
                             }
                             ?></td>
                            </tr>
                            <?php }

                             if($inveltdata->vdrl_result!=''){ ?> 
                            <tr><td>VDRL</td> <td><?php echo $inveltdata->vdrl_result;?></td>
                            <td><?php 
                             if ($inveltdata->vdrl_date!='') {
                                echo date('d-m-Y', strtotime($inveltdata->vdrl_date));
                             }
                             ?></td>
                            </tr>
                            <?php }

                             if($inveltdata->hiv_one_result!=''){ ?> 
                            <tr><td>HIV 1</td> <td><?php echo $inveltdata->hiv_one_result;?></td>
                            <td><?php 
                             if ($inveltdata->hiv_one_date!='') {
                                echo date('d-m-Y', strtotime($inveltdata->hiv_one_date));
                             }
                             ?></td>
                            </tr>
                            <?php }

                            if($inveltdata->hiv_two_result!=''){ ?> 
                            <tr><td>HIV 2</td> <td><?php echo $inveltdata->hiv_two_result;?></td>
                            <td><?php 
                             if ($inveltdata->hiv_two_date!='') {
                                echo date('d-m-Y', strtotime($inveltdata->hiv_two_date));
                             }
                             ?></td>
                            </tr>
                            <?php }

                            if($inveltdata->hbsag_result!=''){ ?> 
                            <tr><td>Hbs Ag</td> <td><?php echo $inveltdata->hbsag_result;?></td>
                            <td><?php 
                             if ($inveltdata->hbsag_date!='') {
                                echo date('d-m-Y', strtotime($inveltdata->hbsag_date));
                             }
                             ?></td>
                            </tr>
                            <?php }

                            if($inveltdata->antihcv_result!=''){ ?> 
                            <tr><td>Anti HCV</td> <td><?php echo $inveltdata->antihcv_result;?></td>
                            <td><?php 
                             if ($inveltdata->antihcv_date!='') {
                                echo date('d-m-Y', strtotime($inveltdata->antihcv_date));
                             }
                             ?></td>
                            </tr>
                            <?php }

                            if($inveltdata->urine_re_result!=''){ ?> 
                            <tr><td>Urine R/E</td> <td><?php echo $inveltdata->urine_re_result;?></td>
                            <td><?php 
                             if ($inveltdata->urine_re_date!='') {
                                echo date('d-m-Y', strtotime($inveltdata->urine_re_date));
                             }
                             ?></td>
                            </tr>
                            <?php }

                            if($inveltdata->cs_sensitive_to_result!=''){ ?> 
                            <tr><td>Urine C/S</td> <td><?php echo $inveltdata->cs_sensitive_to_result;?></td>
                            <td><?php 
                             if ($inveltdata->cs_sensitive_date!='') {
                                echo date('d-m-Y', strtotime($inveltdata->cs_sensitive_date));
                             }
                             ?></td>
                            </tr>
                            <?php }

                             if($inveltdata->stsh_result!=''){ ?> 
                            <tr><td>Urine C/S</td> <td><?php echo $inveltdata->stsh_result;?></td>
                            <td><?php 
                             if ($inveltdata->stsh_date!='') {
                                echo date('d-m-Y', strtotime($inveltdata->stsh_date));
                             }
                             ?></td>
                            </tr>
                            <?php }

                             if($inveltdata->s_urea_result!=''){ ?> 
                            <tr><td>S urea</td> <td><?php echo $inveltdata->s_urea_result;?></td>
                            <td><?php 
                             if ($inveltdata->s_urea_date!='') {
                                echo date('d-m-Y', strtotime($inveltdata->s_urea_date));
                             }
                             ?></td>
                            </tr>
                            <?php }

                             if($inveltdata->s_creatinine_result!=''){ ?> 
                            <tr><td>S creatinine</td> <td><?php echo $inveltdata->s_creatinine_result;?></td>
                            <td><?php 
                             if ($inveltdata->s_creatinine_date!='') {
                                echo date('d-m-Y', strtotime($inveltdata->s_creatinine_date));
                             }
                             ?></td>
                            </tr>
                            <?php }

                            if($inveltdata->combined_test_result!=''){ ?> 
                            <tr><td>Combined Test</td> <td><?php echo $inveltdata->combined_test_result;?></td>
                            <td><?php 
                             if ($inveltdata->combined_test_date!='') {
                                echo date('d-m-Y', strtotime($inveltdata->combined_test_date));
                             }
                             ?></td>
                            </tr>
                            <?php }

                            if($inveltdata->thalassemia_result!=''){ ?> 
                            <tr><td>Thalassemia</td> <td><?php echo $inveltdata->thalassemia_result;?></td>
                            <td><?php 
                             if ($inveltdata->thalassemia_date!='') {
                                echo date('d-m-Y', strtotime($inveltdata->thalassemia_date));
                             }
                             ?></td>
                            </tr>
                            <?php }

                            if($inveltdata->usg_slf_week!=''){ ?> 
                            <tr><td>USG dating scan</td> <td><?php echo 'SLF of '.$inveltdata->usg_slf_week.' week '.$inveltdata->usg_slf_day.' day ';?>
      
                            </td>
                            <td><?php 
                             if ($inveltdata->usg_scan_date!='') {
                                echo date('d-m-Y', strtotime($inveltdata->usg_scan_date));
                             }
                             ?></td>
                            </tr>
                            <?php }

                            if($inveltdata->nt_scan_lowerrisk!=''){ ?> 
                            <tr><td>NT scan + Double marker</td> <td><?php echo 'Low risk for <b>'.$inveltdata->nt_scan_lowerrisk.'</b> <br> High risk for <b>'.$inveltdata->nt_scan_highrisk.'</b>';?>
      
                            </td>
                            <td><?php 
                             if ($inveltdata->nt_scan_date!='') {
                                echo date('d-m-Y', strtotime($inveltdata->nt_scan_date));
                             }
                             ?></td>
                            </tr>
                            <?php }

                        
                            if($inveltdata->anomaly_slf_week!=''){ ?> 
                            <tr><td>Anomaly scan</td> <td><?php echo 'SLF of '.$inveltdata->anomaly_slf_week.' week '.$inveltdata->anomaly_slf_day.' day ';?>
      
                            </td>
                            <td><?php 
                             if ($inveltdata->anomaly_scan_date!='') {
                                echo date('d-m-Y', strtotime($inveltdata->anomaly_scan_date));
                             }
                             ?></td>
                            </tr>
                            <?php }

                             if($inveltdata->growth_slf_week!=''){ ?> 
                            <tr><td>Growth scan</td> <td><?php echo 'SLF of '.$inveltdata->growth_slf_week.' week '.$inveltdata->growth_slf_day.' day ';?>
      
                            </td>
                            <td><?php 
                             if ($inveltdata->growth_date!='') {
                                echo date('d-m-Y', strtotime($inveltdata->growth_date));
                             }
                             ?></td>
                            </tr>
                            <?php }?>


                    </table>
                <?php }?>

              <table width="100%"   class="demo_font" style="margin-left: 150px;margin-top: 10px;" >
            <tr>
                <td><span>&#9744;&nbsp;&nbsp;</span>BMI : <?php  if ($examinationLatestData) {echo $examinationFirstData->exam_bmi;}?></td>
               <td><span>&#9744;&nbsp;&nbsp;</span>Weight : <?php  if ($examinationLatestData) {echo $examinationFirstData->exam_weight;}?></td>
            </tr>

            
        </table><br>

        <span class="spanhead">Clinical  Examination :</span>



                <?php
                if ($examinationLatestData) {
                    

?>
        <table style="width: 90%;font-size: 12px;margin-left: 140px;" cellspacing="6"  >
                        
                            <tr>
                                <th  align="left">Height(cm) </th>
                                <th  align="left">Weight(kg)</th>
                                <th  align="left">BMI</th>
                                <th  align="left">Pulse/min</th>
                                <th  align="left">BP(S)</th>
                                <th  align="left">BP(D)</th>
                              
                            </tr>
                            
                                
                            <tr>
                                 <td><?php echo $examinationLatestData->exam_height;?></td>
                                 <td><?php echo $examinationLatestData->exam_weight;?></td>
                                 <td><?php echo $examinationLatestData->exam_bmi;?></td>
                                 <td><?php echo $examinationLatestData->exam_pluse;?></td>
                                 <td><?php echo $examinationLatestData->exam_bp_systolic;?></td>
                                 <td><?php echo $examinationLatestData->exam_bp_diastolic;?></td>
                            </tr>
                            <tr>
                                <td colspan="6">&nbsp;</td>
                            </tr>
                              <tr>
                                <th  align="left">Pallor </th>
                                <th  align="left">Icterus </th>
                                <th  align="left">Thyroid </th>
                                <th  align="left">Teeth </th>
                                <th  align="left">Cus  </th>
                                <th  align="left">Chest </th>
                            </tr>
                            <tr>
                                 <td><?php echo $examinationLatestData->exam_pallor;?></td>
                                 <td><?php echo $examinationLatestData->exam_icterus;?></td>
                                 <td><?php echo $examinationLatestData->exam_thyroid;?></td>
                                 <td><?php echo $examinationLatestData->exam_teeth;?></td>
                                 <td><?php echo $examinationLatestData->exam_cus;?></td>
                                 <td><?php echo $examinationLatestData->exam_chest;?></td>
                            </tr>
                   
                    </table>
                <?php }?>

     

   </div> 
</div><!--end of page 2 div -->

<hr>
 <p class="demo_font" style="text-align: center">
    In case emergency to call 9874746006 /Techno Global Emergency number 9073943772</p>


    <div class="page_3">

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



          <?php
                if ($prescriptionMedicineList) {
                    

?>
        <table style="margin-left: 180px;width: 80%;font-size: 12px;" cellspacing="6"  >
                        
                            <tr>
                                <th width="15%" align="left">Investigation</th>
                               
                              
                            </tr>
                            
                                <?php
                                foreach ($prescriptionInvestigationList as $prescriptionInvestigation) {

                                ?>
                             <tr>
                                 <td><?php echo $prescriptionInvestigation->inv_component_name;?></td>
                              
 
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

<span class="spanhead">Suggested Investigation :</span><br><br>
<span class="spanhead">Review :</span><br><br>
<span class="spanhead">Diagnosis Summary :</span><br>

    </div>


        
    </div><!-- end of page_3 -->

</div>



</body>
</html>