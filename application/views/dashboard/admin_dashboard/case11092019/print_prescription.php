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

 <?php
    $CI =& get_instance();
    

?>
	
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
    			<td colspan="1"><?php echo $patientmasterData->address;?></td>
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
    	<span class="spanhead">History Summary :</span>
    	<table width="100%"   class="demo_font" style="margin-left: 40px;margin-top: 10px;" >
            
            <?php ?>
            <tr>
    			<td colspan="2"> <?php if($antenantalCaseData){echo "<span>&#9744;&nbsp;&nbsp;</span>GN :".$total_parity;}?>&nbsp;
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



		if ($previousChildHistory) { ?>
             <div style="margin-left:180px;word-wrap: break-word;font-size:10px;margin-top:-15px;">
        <?php
                foreach ($previousChild as $previouschildrow) {
				                
                                
             if ($previouschildrow['year']!='') { $childYear= 'In '.$previouschildrow['year']; }else{ $childYear="";  }

             if ($previouschildrow['complications']!='') {
                 $childComplications="| Complications: ".$previouschildrow['complications'];
             }else{
                 $childComplications="";
             }

             if ($previouschildrow['med_prob']!='') {
                $childMedProb="|Medical Problem(s) ".rtrim($previouschildrow['med_prob'],",Others");

             }else{
                 $childMedProb="";
             }
                                
             if ($previouschildrow['med_prob_other']!='') {
                 $childOtherProb="|Others Problem".$previouschildrow['med_prob_other'];
             }else{
                 $childOtherProb=""; 
             }
                                
             echo $childYear.$childComplications.$childMedProb."<br>";

                }?>
                 </div>
                <?php

                }?>
               

    	<table width="100%"   class="demo_font" style="margin-left: 40px;margin-top: 0px;" >
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
         
        <?php
                    $surgicalCount=count($surgicaData);
                if ($surgicaData) {?>

  <div style="margin-left:180px;word-wrap: break-word;font-size:10px;margin-top:-15px;">
                <?php

                    foreach ($surgicaData as $surgicadatarow) {
                        $surgicalCount--;

                        if ($surgicadatarow->other_surgery_name!='') {
                            echo $surgicadatarow->other_surgery_name;
                        }else{   
                            echo $surgicadatarow->surgery_name;
                        }

                        echo '('.$surgicadatarow->yearback.' years back) ';
                        if ($surgicalCount!=0) {echo "|"; }
                       
                    }
             

                ?>

                   </div>
                <?php }?>
               



        <table width="100%"   class="demo_font" style="margin-left: 40px;margin-top:0px;" >
          
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
                if ($familyCompData=='Y') {?>
             <div style="margin-left:180px;word-wrap: break-word;font-size:10px;margin-top:-15px;">
                <?php
                    $familyCompCount=0;
                    foreach ($familyComponentList as $familycomponentrow) {
                        $familyCompCount++;
                 if ($familycomponentrow->is_father=='Y' || $familycomponentrow->is_mother=='Y') {
                        if ($familyCompCount>1) {echo "|";}
                         if ($familycomponentrow->othercomptext!='') {
                             echo $familycomponentrow->othercomptext;
                         }else{
                             echo $familycomponentrow->component_name;
                         }

                        if ($familycomponentrow->is_father=='Y' && $familycomponentrow->is_mother=='Y') {
                                     echo '- both father and mother ';
                        }else if($familycomponentrow->is_father=='Y'){
                                 echo '- father ';
                        }else if($familycomponentrow->is_mother=='Y'){
                                 echo '- mother ';
                        }

              

                    }

                     }


              ?>
                        </div>
                <?php    
                }?>

                


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
        <?php   if ($regularMedicineList) { ?>
        <div style="margin-left:180px;word-wrap: break-word;font-size:10px;margin-top:-15px;">
        <?php
            foreach ($regularMedicineList as $regularmedicinerow) {

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

            } ?>
        </div>
                
         <?php
         } ?>
         

</div><!--  start of history summery -->


               <?php
  /*----------------------------------------------- Start Investigation ----------------------------------------------*/             
                if ($inveltdata) {
                    

                ?>
           
<span class="spanhead">Investigation :</span>
                        <div style="margin-left:120px;word-wrap: break-word;font-size: 10px;margin-top: -15px;">
                        
                        <?php if($inveltdata->hb_result!=''){                          
                          echo "Hb : "; echo $inveltdata->hb_result.$CI->dateDMY($inveltdata->hb_date)." | ";       
                        }

                        if($inveltdata->tc_result!=''){ 
                            echo "TC : "; echo $inveltdata->tc_result.$CI->dateDMY($inveltdata->tc_date)." | ";
                        }

                        if($inveltdata->dc_result!=''){ 
                            echo "DC : "; echo $inveltdata->dc_result.$CI->dateDMY($inveltdata->dc_date)." | ";
                        }

                        if($inveltdata->fbs_result!=''){ 
                            echo "FBS : "; echo $inveltdata->fbs_result.$CI->dateDMY($inveltdata->fbs_date)." | ";
                        } 

                        if($inveltdata->ppbs_result!=''){
                         echo "PPBS : "; echo $inveltdata->ppbs_result.$CI->dateDMY($inveltdata->ppbs_date)." | ";
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

                        if($inveltdata->cs_sensitive_to_result!=''){ 
                            echo "Urine C/S : "; echo $inveltdata->cs_sensitive_to_result.$CI->dateDMY($inveltdata->cs_sensitive_date)." | ";
                        } 

                        if($inveltdata->stsh_result!=''){ 
                            echo "STSH : "; echo $inveltdata->stsh_result.$CI->dateDMY($inveltdata->stsh_date)." | ";
                        } 

                        if($inveltdata->s_urea_result!=''){
                         echo "S urea : "; echo $inveltdata->s_urea_result.$CI->dateDMY($inveltdata->s_urea_date)." | ";
                        }

                       if($inveltdata->s_creatinine_result!=''){ 
                        echo "S creatinine : "; echo $inveltdata->s_creatinine_result.$CI->dateDMY($inveltdata->s_creatinine_date)." | ";

                        }

                        if($inveltdata->combined_test_result!=''){
                         echo "Combined Test : "; echo $inveltdata->combined_test_result.$CI->dateDMY($inveltdata->combined_test_date)." | ";
                        }

                        if($inveltdata->thalassemia_result!=''){
                          echo "Thalassemia : "; echo $inveltdata->thalassemia_result.$CI->dateDMY($inveltdata->thalassemia_date)." | ";
                        } 


                        if($inveltdata->usg_slf_week!='' || $inveltdata->usg_slf_day!=''){

                               echo "USG dating scan : SLF of "; 
                                if ($inveltdata->usg_slf_week!='' & $inveltdata->usg_slf_week!='0') {
                                    echo $inveltdata->usg_slf_week.' week ';
                                }

                                if ($inveltdata->usg_slf_day!='' && $inveltdata->usg_slf_day!='0') {
                                    echo $inveltdata->usg_slf_day.' day ';
                                }

                                echo $CI->dateDMY($inveltdata->usg_scan_date)." | ";

                            
                          }

                    if($inveltdata->nt_scan_lowerrisk!='' || $inveltdata->nt_scan_highrisk!=''){ 
                             echo "NT scan + Double marker : ";
                             if ($inveltdata->nt_scan_lowerrisk!='' && $inveltdata->nt_scan_lowerrisk!='0') {
                                echo 'Low risk for '.$inveltdata->nt_scan_lowerrisk;
                             }

                             if ($inveltdata->nt_scan_highrisk!='' && $inveltdata->nt_scan_highrisk!='0') {
                                 echo '  High risk for '.$inveltdata->nt_scan_highrisk;
                             }
                              echo $CI->dateDMY($inveltdata->nt_scan_date)." | ";
                            
                           
                   }

                    if($inveltdata->anomaly_slf_week!='' || $inveltdata->anomaly_slf_day!=''){ 

                         echo "Anomaly scan : ";

                         if ($inveltdata->anomaly_slf_week!='') {
                            echo 'SLF of '.$inveltdata->anomaly_slf_week.' week ';
                         }

                         if ($inveltdata->anomaly_slf_day!='') {
                           echo $inveltdata->anomaly_slf_day.' day '; 
                         }

                          echo $CI->dateDMY($inveltdata->anomaly_scan_date)." | ";

                          
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


                    if($inveltdata->growth_slf_week!='' || $inveltdata->growth_slf_day!=''){ 

                        echo "Growth scan : "; 
                        if ($inveltdata->growth_slf_week!='') {
                            echo 'SLF of '.$inveltdata->growth_slf_week.' week ';
                        }
                        if ($inveltdata->growth_slf_day!='') {
                         echo $inveltdata->growth_slf_day.' day '; 
                        }

                         echo $CI->dateDMY($inveltdata->growth_date)." | ";

                     }

                    if($inveltdata->growth_presentation!=''){
                      echo "Growth Presentation: ".$inveltdata->growth_presentation." | ";

                    } 

                    if($inveltdata->growth_afi!=''){
                     echo  "Growth AFI(".$inveltdata->growth_afi.")  | ";
                    }

                    if($inveltdata->growth_liquor!=''){
                         echo "Growth Liquor: ".$inveltdata->growth_liquor." | ";
                    }

                    if($inveltdata->doppler_slf_week!='' || $inveltdata->doppler_slf_day!=''){
                     
                         echo "Doppler scan : "; 
                         if ($inveltdata->doppler_slf_week!='') {
                                echo 'SLF of '.$inveltdata->doppler_slf_week.' week ';
                         }
                         if ($inveltdata->doppler_slf_day!='') {
                            echo $inveltdata->doppler_slf_day.' day  ';
                         }

                         echo $CI->dateDMY($inveltdata->doppler_scan_date)." | ";
                  
                    } 

                    if($inveltdata->doppler_presentation!=''){
                       
                       echo "Doppler Presentation: ".$inveltdata->doppler_presentation." | ";
                    }

                    if($inveltdata->doppler_afi!=''){
                     echo  "Doppler AFI(".$inveltdata->doppler_afi.")  | ";
                    }

                     if($inveltdata->doppler_liquor!=''){
                         echo "Doppler Liquor: ".$inveltdata->doppler_liquor." | ";
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
                       
                      

                   <table width="50%"   class="demo_font" style="margin-left: 0px;margin-top: 10px;" >
              <?php if ($examinationLatestData) {?>
            <tr>
                <td><span>&#9744;&nbsp;&nbsp;</span>First Visit: &nbsp; BMI : <?php  if ($examinationLatestData) {echo $examinationFirstData->exam_bmi;}?></td>
               <td><span>&nbsp;&nbsp;</span>Weight : <?php  if ($examinationLatestData) {echo $examinationFirstData->exam_weight;}?></td>
            </tr>
                    <?php }?>

            
        </table>
     

                    
                

                   

                        </div>

                      



        
                <?php }
 /*----------------------------------------------- End Investigation ----------------------------------------------*/

                ?>
 



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

<div style="padding:3px 0;height:22.5cm;" >


             
       



                <?php
                if ($clinicalExaminationLatestData) {
                    

?>
 <span class="spanhead">Clinical  Examination :</span>
        <table style="width: 90%;font-size: 10px;margin-left:60px;" cellspacing="2"  >
                        
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
                                <td  align="left">FHS(/min)</td>
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
        if ($adviceDetailsData) {
             
?>

 <span class="spanhead">Advice: </span>
 <div style="margin-left:50px;word-wrap: break-word;font-size:10px;margin-top:-15px;#border:1px solid red;">
 <?php      $advType="";
            foreach ($adviceDetailsData as $advicedetailsrow) {
                if ($advType!=$advicedetailsrow['advType']) {
                    echo "<br><u>".$advicedetailsrow['advType'].":</u> ";
                }
              
              echo "<br>".$advicedetailsrow['advicedtl'];
             
              $advType=$advicedetailsrow['advType'];
            }


 ?>


</div>
<?php } ?>

               

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
<p><?php  if ($prescriptionMedicineList) {
    if($prescriptionLatestData->doctor_note!=''){
        echo '<span class="spanhead">Doctor Note :</span> '.$prescriptionLatestData->doctor_note."<br>";
    }
    }?></p>



<br>
<?php  if ($prescriptionMedicineList) {?>
<span class="spanhead">Suggested Investigation :</span>&nbsp; <span style="font-size:10px;">    <?php
                                            
                                                 $chkcoma=0;
                                              foreach ($prescriptionInvestigationList as $prescriptionInvestigation) {
                                                  if($chkcoma!=0){echo ",";}
                                                  echo $prescriptionInvestigation->inv_component_name;
                                                  $chkcoma++;
                                              }
                                             }
                                              ?>
                                              </span>  

<br>

<?php 
if ($prescriptionMedicineList) {
if ($prescriptionLatestData->next_checkup_dt!='') {
                       echo "<span >Next Checkup Date :</span><span style='font-size:10px;'>".date('l d M Y', strtotime($prescriptionLatestData->next_checkup_dt))."</span>";
                     }

              }


?>


     

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