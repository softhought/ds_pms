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
            font-size: 13px;

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
    <div class="custom-page-start" style="padding:3px 0;#border:1px solid gray;  ">
    	
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
        <?php if(!empty($antenantalCaseData)){ ?>    
    	<span class="spanhead">History Summary :</span>
    <?php } ?>
    	<table width="100%"   class="demo_font" style="margin-left: 40px;margin-top: 10px;" >
            
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
                if($antenantalCaseData->usg_week !="0"){ echo  '( by USG done at '.$antenantalCaseData->usg_week.' weeks ';if($antenantalCaseData->usg_days =="0"){echo ' )'; } }if($antenantalCaseData->usg_days !="0"){ echo $antenantalCaseData->usg_days.' and days )'; }?></td>
                <td> </td>
            
            <?php } ?>
            </tr>

            <tr>
                <?php if($antenantalCaseData){?>
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
            if(!empty($lastchildBirth->year)){

            if($lastchildBirth->year != ''){
                $curyear = date("Y"); 
             $backyear =  $curyear - $lastchildBirth->year;
             $backyte = '('. $backyear.' years back)';
         }else{

            $backyte = '';
         }
       }else{
               $backyte = '';
       }

             

            ?> 

                <td>No. Of Having Previous Suction Evacuation :  <?php echo $total_suction.$backyte;?></td>
                           
            <?php } ?>

                			
    		</tr>

            <tr>

             <?php if($total_cesarean!=0){ ?>    
           
                <td>No. Of Having Previous CS :  <?php echo $total_cesarean;?>&emsp;&emsp;</td>
               
            
            <?php } ?>

             <?php if($total_ND!=0){ ?>    
           
                <td>No. Of Having Previous ND :  <?php echo $total_ND;?>&emsp;&emsp;</td>
               
            
            <?php } ?>

            

            </tr>
            
                      
            
            <?php  if(!empty($lastchildBirth)){
                            
            ?>
    		<tr>
    			<td>Last child birth :  <?php echo $lastchildBirth->year;?></td>
    			<td> </td>
    		</tr>
    		<?php
             } 
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

                       
            <?php if ($previousChildHistory) {
            ?>

    		<tr>
    			<td colspan="2">Previous Obstetric History : 	</td>
    			
            </tr>
            <?php } ?>

    	</table>
        
<?php



		if ($previousChildHistory) { ?>
             <div style="margin-left:180px;word-wrap: break-word;font-size:10px;margin-top:-15px;">
        <?php
                foreach ($previousChild as $previouschildrow) {
				                
              if ($previouschildrow['complications']!='') {

                 $childComplications="Had ".$previouschildrow['complications'];
             }else{
                 $childComplications="";
             } 

             if ($previouschildrow['year']!='') { $childYear= ' in '.$previouschildrow['year']; }else{ $childYear="";  }

            

             if ($previouschildrow['med_prob']!='') {
                $childMedProb=" suffered from ".rtrim($previouschildrow['med_prob'],",Others");

             }else{
                 $childMedProb="";
             }
                                
             if ($previouschildrow['med_prob_other']!='') {
                 $childOtherProb=" & ".$previouschildrow['med_prob_other'];
             }else{
                 $childOtherProb=""; 
             }

             if ($previouschildrow['delevery_type']!='') {
                if($previouschildrow['delevery_type'] == 'SE'){
                  
                  $deleverytype=$previouschildrow['delevery_type'];

                }else if($previouschildrow['delevery_type'] == 'CS'){

                     $deleverytype=$previouschildrow['delevery_type'];

                }
                else if($previouschildrow['delevery_type'] == 'ND'){

                  $deleverytype=$previouschildrow['delevery_type'];
                }

                             
             }else{
                 $deleverytype=""; 
             }

             if($previouschildrow['babygender']!=''){

                if($previouschildrow['babygender'] == 'Male'){
                 
                 $babygen = 'baby boy ';
                }
                else if($previouschildrow['babygender'] == 'Female'){
                 
                 $babygen = 'baby girl ';
                }
                 else if($previouschildrow['babygender'] == 'Other'){
                 
                 $babygen = 'other ';
                }
                else if($previouschildrow['babygender'] == 'Not Known'){
                 
                 $babygen = 'not known ';
                }
             }else{

                 $babygen = '';
             }

             if($previouschildrow['baby_weight'] != ''){

                $babywt = ' of '.$previouschildrow['baby_weight'].'kg';
             }else{

                $babywt = '';
             }
                                
             echo $childComplications.$childYear.$childMedProb.$childOtherProb.', '.$deleverytype.' done '.$childYear.'( delivered a ' .$babygen.$babywt.' by '.$deleverytype.' had '.$childMedProb.$childOtherProb. ' at that time)'. "<br>";

                }?>
                 </div>
                <?php

                }?>
               

    	<table width="100%"   class="demo_font" style="margin-left: 40px;margin-top: 0px;" >
    		<?php if($diseases!=''){?>

               
            <tr>
    			<td>Known case of <?php echo $diseases;?> had 
                 <?php
                    $surgicalCount=count($surgicaData);
                if ($surgicaData) {?>

                 <?php

                    foreach ($surgicaData as $surgicadatarow) {
                        $surgicalCount--;

                        if ($surgicadatarow->other_surgery_name!='') {
                            echo $surgicadatarow->other_surgery_name;
                        }else{   
                            echo $surgicadatarow->surgery_name;
                        }

                        echo ' '.$surgicadatarow->yearback.' years back ';
                        if ($surgicalCount!=0) {echo " and "; }
                       
                    }
             

                ?>

                 
                <?php }?>

                </td>
    			<td>  </td>
    		</tr>
            <?php } ?>
            

    	</table>
         
         

        <table width="100%"   class="demo_font" style="margin-left: 40px;margin-top:0px;" >
          
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
             <div style="margin-left:44px;word-wrap: break-word;font-size:10px;margin-top:-5px;">
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

                


        <table width="100%"   class="demo_font" style="margin-left: 40px;">
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
        <div style="margin-left:180px;word-wrap: break-word;font-size:10px;margin-top:-15px;">
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
                        <div style="margin-left:120px;word-wrap: break-word;font-size: 10px;margin-top: -15px;">
                        
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

                        if($inveltdata->cs_sensitive_to_result!=''){ 
                            echo "Urine C/S : "; echo $inveltdata->cs_sensitive_to_result.$CI->dateDMY($inveltdata->cs_sensitive_date)." | ";
                        } 

                        if($inveltdata->stsh_result!=''){ 
                            echo "STSH : "; echo $inveltdata->stsh_result.' mIU/ml'.$CI->dateDMY($inveltdata->stsh_date)." | ";
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
                <td>First Visit: &nbsp; BMI : <?php  if ($examinationLatestData) {echo $examinationFirstData->exam_bmi;}?></td>
               <td><span>&nbsp;&nbsp;</span>Weight : <?php  if ($examinationLatestData) {echo $examinationFirstData->exam_weight;}?></td>
            </tr>
                    <?php }?>

            
        </table>
     

                    
                

                   

                        </div>

                      



        
                <?php }
 /*----------------------------------------------- End Investigation ----------------------------------------------*/

                ?>
 

      
                <?php
                if (!empty($clinicalExaminationLatestData)) {
                    

?>
<br>
 <span class="spanhead">Clinical  Examination :</span>
        <table style="width: 90%;font-size: 10px;margin-left:60px;" cellspacing="2"  >
                        
                            <tr>
                                <td  align="left">Date  &emsp;</td>
                                <td  align="left">By LMP&emsp;&emsp;</td>
                               <!--  <td  align="left">Days by LMP</td> -->
                                <td  align="left">By USG&emsp;&emsp;</td>
                                <!-- <td  align="left">Days by USG</td> -->
                                <td  align="left">Weight&emsp;&emsp;</td>
                                <td  align="left">BP(mm of Hg)</td>
                               <!--  <td  align="left">BP(D)</td> -->
                               <td  align="left">Pallor &emsp;&emsp;</td>
                                <td  align="left">Oedema &emsp;&emsp;</td>
                                <td  align="left">Fundal Height&emsp;</td>
                                <td  align="left">SFH(cm)&emsp;&emsp;</td>
                                <td  align="left">FHS(/min)&emsp;&emsp;</td>
                                <td  align="left">Next Appointment Date</td>
                              
                              
                            </tr>
                            
                                
                            <tr>
                                 <td><?php 
                                 if($clinicalExaminationLatestData->examination_date!=''){
                                    echo date('d-m-Y', strtotime($clinicalExaminationLatestData->examination_date));}else{
                                        echo 'Nil';
                                    }
                                ?>&emsp;</td>     <td><?php echo $clinicalExaminationLatestData->weeks_by_lmp.' wks '.$clinicalExaminationLatestData->days_by_lmp.' days';?>&emsp;&emsp;&emsp;&emsp;</td>
                                <!--  <td align="center"><?php echo $clinicalExaminationLatestData->days_by_lmp;?></td> -->
                                 <td><?php echo $clinicalExaminationLatestData->weeks_by_usg.' wks '.$clinicalExaminationLatestData->days_by_usg.' days';?>&emsp;&emsp;&emsp;&emsp;</td>
                                <!--  <td align="center"><?php echo $clinicalExaminationLatestData->days_by_usg;?></td> -->
                                 <td><?php echo $clinicalExaminationLatestData->cliexm_weight;?> kg.&emsp;&emsp;</td>
                                 <td><?php echo $clinicalExaminationLatestData->cliexm_bp_s.'/'.$clinicalExaminationLatestData->cliexm_bp_d;?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                                 <!-- <td><?php echo $clinicalExaminationLatestData->cliexm_bp_d;?></td> -->
                                 <td align="left"><?php  if($clinicalExaminationLatestData->cliexm_pallor == ''){echo 'Nil'; }else{ echo $clinicalExaminationLatestData->cliexm_pallor;} ?>&emsp;&emsp;&emsp;&emsp;</td>
                                  <td><?php if($clinicalExaminationLatestData->cliexm_oedema == ''){
                                    echo "Nil"; }else{ echo $clinicalExaminationLatestData->cliexm_oedema; } ?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                                 <td><?php if($clinicalExaminationLatestData->fundal_height == ''){ echo 'Nil'; }else{ echo $clinicalExaminationLatestData->fundal_height; } ?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                                 <td><?php if($clinicalExaminationLatestData->cliexm_sfh == ''){
                                   echo "Nil"; }else{ echo $clinicalExaminationLatestData->cliexm_sfh; } ?>&emsp;&emsp;</td>
                                 <td><?php if($clinicalExaminationLatestData->cliexm_fsh == ''){
                                    echo "Nil"; }else{ echo $clinicalExaminationLatestData->cliexm_fsh; }?>&emsp;&emsp;</td>
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
                                 
                                 ?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                               
                            </tr>

                           
                              <!-- <tr>
                                
                                
                                <td  align="left">Oedema </td>
                                <td  align="left">Fundal Height</td>
                                <td  align="left">SFH(cm)</td>
                                <td  align="left">FHS(/min)</td>
                                <td  align="left" colspan="2">Next Appointment Date</td>
                              
                            </tr> -->
                           <!--  <tr>
                                
                                 
                                 <td><?php if($clinicalExaminationLatestData->cliexm_oedema == ''){
                                    echo "Nil"; }else{ echo $clinicalExaminationLatestData->cliexm_oedema; } ?></td>
                                 <td><?php if($clinicalExaminationLatestData->fundal_height == ''){ echo 'Nil'; }else{ echo $clinicalExaminationLatestData->fundal_height; } ?></td>
                                 <td><?php if($clinicalExaminationLatestData->cliexm_sfh == ''){
                                   echo "Nil"; }else{ echo $clinicalExaminationLatestData->cliexm_sfh; } ?></td>
                                 <td><?php if($clinicalExaminationLatestData->cliexm_fsh == ''){
                                    echo "Nil"; }else{ echo $clinicalExaminationLatestData->cliexm_fsh; }?></td>
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
                                 
                            </tr> -->
                   
                    </table>
                <?php }?>



<?php
        if (!empty($adviceDetailsData)) {
             
?>

 <span class="spanhead">Advice: </span>
 <div style="margin-left:50px;word-wrap: break-word;font-size:10px;margin-top:-15px;#border:1px solid red;">
 <?php      $advType="";$i=1;
            foreach ($adviceDetailsData as $advicedetailsrow) {
                // if ($advType!=$advicedetailsrow['advType']) {
                //     echo "<br><u>".$advicedetailsrow['advType'].":</u> ";
                // }
               
              
              echo "<br>".$i.'.'.substr($advicedetailsrow['advicedtl'], 2);
             
              //$advType=$advicedetailsrow['advType'];
          $i++; }


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





<?php  if (!empty($prescriptionInvestigationpanel) || $prescriptionInvestigationList) { ?>
<br>

<table>
       <tr>
<td colspan="2" class="spanhead" style="font-family: sans-serif;;width: 26%;vertical-align: top;">Suggested Investigation :</td>
           <td style="font-size: 10px;width: 74%;vertical-align: bottom;"> <?php 
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


  

            
<!--  <span style="font-size:10px; border: 1px solid red;word-wrap: b"><?php
                                            
                                                 $chkcoma=0;
                                                //created by anil 23-09-2019 
                                                 foreach ($prescriptionInvestigationpanel as $prescriptionInvestigationpanel) {
                                                  if($chkcoma!=0){echo ",";}
                                                  echo $prescriptionInvestigationpanel->panel_investigation_details;
                                                  $chkcoma++;
                                              }
                                             // echo "<br>";
                                              foreach ($prescriptionInvestigationList as $prescriptionInvestigation) {
                                                  if($chkcoma!=0){echo ",";}
                                                  echo $prescriptionInvestigation->inv_component_name;
                                                  $chkcoma++;
                                              }

                                              
                                             
                                              ?>
                                              </span>  
 -->
<br>
<?php 

 if(!empty($clinicalExaminationLatestData->cliexm_appointment_date)){
                                            echo "<span style='font-size:13px;'>Next Checkup Date :</span><span style='font-size:10px;'>".date('l d M Y', strtotime($clinicalExaminationLatestData->cliexm_appointment_date));

   }                                         
?>
<!-- <?php 
if ($prescriptionMedicineList) {
if ($prescriptionLatestData->next_checkup_dt!='') {
                       echo "<span>Next Checkup Date :</span><span style='font-size:10px;'>".date('l d M Y', strtotime($prescriptionLatestData->next_checkup_dt))."</span>";
                     }

              }


?> -->


     
</div>
</div>
  
</div>

<footer id="footer"><hr>
 <p class="demo_font" style="text-align: center">
    In case emergency to call 9874746006 /Techno Global Emergency number 9073943772</p></footer>


</div>



</body>
</html>