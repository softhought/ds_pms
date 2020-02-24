<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Discharge</title>

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

       </div> <!-- End of the Header -->

        <hr>

        <table width="100%"   class="demo_font">
          <caption><u>DISCHARGE CERTIFICATE</u></caption>
          
          <tr>
            <td width="40%"><b>Name :</b>&emsp;<?php echo $patientmasterData->patientname;?></td>
            <td width="40%"><b>Age :</b> &emsp;<?php echo $patientmasterData->patientage." years";?></td>
           
          </tr>
          <br>

          <tr>
           

            <td width="50%"><b>Date of Admission :&emsp;</b>

               <?php if(!empty($preoperationEditdata) && $preoperationEditdata->preposed_operation_date != NULL){ ?>
              <?php echo date('d-m-Y',strtotime($preoperationEditdata->preposed_operation_date)); ?>

            <?php } ?>
            </td>

           

            <td width="50%"><b>Date of Discharge :&emsp;</b> 
               <?php if(!empty($dischargeEditdata) && $dischargeEditdata->discharge_date != NULL){ ?>
              <?php echo date('d-m-Y',strtotime($dischargeEditdata->discharge_date)); ?>
               <?php } ?>
            </td>

          

          </tr>
          <br><br>

          <tr>
            <td colspan="2"><b>Diagnosis :</b>&ensp;<?php   
           if($antenantalCaseData){ ?>
          &nbsp;G&nbsp;<sub style="font-size: 7px;"><?php echo $total_parity; ?></sub>&nbsp;P&nbsp;<sub style="font-size: 7px;"><?php echo $antenantalCaseData->parity_term_delivery.' + '.$antenantalCaseData->parity_preterm.' + '.$antenantalCaseData->parity_abortion.' + '.$antenantalCaseData->parity_issue; ?></sub>
                   &nbsp;at term pregnancy
                <?php } ?> 
                <?php if(!empty($preoperationEditdata) && $preoperationEditdata->disterm_pregnancy_wks != ''){ echo $preoperationEditdata->disterm_pregnancy_wks.' wks '; } ?></span><span id="dis_preg_days"><?php if(!empty($preoperationEditdata) && $preoperationEditdata->disterm_pregnancy_days != ''){ echo $preoperationEditdata->disterm_pregnancy_days.' days '; } ?>
               
                 <?php if($total_cesarean != 0){ echo " with previous LUCS(".$total_cesarean.")"; } ?> 
              
            </td>
          </tr>

         
          <br><br>

        <tr>
          <td colspan="2"><b>Management :</b>&emsp;

            <?php if(!empty($dischargeEditdata) && $dischargeEditdata->dislucs_done != ''){ ?>

            Elective LUCS done under <?php echo $dischargeEditdata->dislucs_done; ?> <?php if(!empty($preoperationEditdata) && $preoperationEditdata->preposed_operation_date != NULL){ echo "on ".date('d-m-Y',strtotime($preoperationEditdata->preposed_operation_date)); } ?> 

             <?php } ?>

          </td>
        </tr>

       
                    
          <br><br>
          <tr>
            <td colspan="2">
              <b>OT Note :</b>&emsp; <?php  if(!empty($dischargeEditdata) && $dischargeEditdata->dis_ot_note != ''){  echo $dischargeEditdata->dis_ot_note; } ?>
            </td>
          </tr>
          
          <br>
          <tr>
            <td width="50%"><b>Surgeon :</b>&emsp;<?php echo $doctorData->doctor_name; ?></td>
            <td width="50%"><b>Anaesthesiologist :</b>&emsp;<?php if(!empty($dischargeEditdata) && $dischargeEditdata->anaesthesiologist != ''){ echo $anaesthesiologist; } ?></td>
          </tr>
          <br><br>
          <tr>
            <td colspan="2"><b>Paediatrician :</b>&emsp;<?php if(!empty($dischargeEditdata) && $dischargeEditdata->paediatrician != ''){ echo $paediatrician; } ?>
              
            </td>
          </tr>
          <br><br>

<?php
        $baby = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
    if($babygender == 'Male'){

           $baby = 'Boy';
     }else if($babygender == 'Female'){

           $baby = 'Girl';

      }else if($babygender == 'Other') {

            $baby = 'Other';
       }else if($babygender == 'Not Known'){

             $baby = 'Not Known';
    }

?>

          <tr>
            <td colspan="2"><b>Procedure :</b>&emsp;Under all aseptic and antiseptic procedures bladder catheterized with Foley's catheter.Abdominal wall painted with betadine solution and proper draping done.Abdomen opened with Pfannenstiel incision in layers.Uterus opened over lower uterine segment by transverse incision,liquor was clear.A <?php echo $baby; ?>  baby delivered by vertex.Baby cried at birth.Placenta and membranes expelled.Uterus closed in 2 layers.After securing proper haemostasis and after taking meticulous count abdomen closed in layers.Skin closed with 2-0 vicryl subcut suture.</td>
          </tr>
<br><br>

<tr>
  <td colspan="2"><b>Post Op Period :</b>&emsp;Uneventful</td>
</tr>
<br><br>
<tr>
  <td colspan="2"><b>Stich Line :</b>&emsp;Healthy</td>
</tr>

        </table>
        <br>

  <table width="100%" class="demo_font">

    <tr>
      <td width="20%"><b>Baby Note :</b></td>
      <td width="40%"><b>Date :</b>&emsp;<?php if(!empty($preoperationEditdata) && $preoperationEditdata->preposed_operation_date != NULL){ echo date('d-m-Y',strtotime($preoperationEditdata->preposed_operation_date)); } ?></td>
      <td width="40%"><b>Birth Time :&emsp;</b><?php if(!empty($dischargeEditdata) && $dischargeEditdata->birth_time != ''){ echo $dischargeEditdata->birth_time; } ?></td>
    </tr>
    <br><br>
    <tr>
      <td></td>
      <td><b>Sex :</b>&emsp;<?php echo $babygender; ?></td>
      <td><b>Birth Weight :</b>&emsp;<?php if(!empty($dischargeEditdata) && $dischargeEditdata->dish_birth_weight != ''){ echo $dischargeEditdata->dish_birth_weight.' kg.'; } ?></td>
    </tr>
  <br><br>
    <tr>
     
      <td colspan="3">
        <b>Blood Group of Mother :</b>&emsp;<?php echo $slfbldgrp;?>&emsp;
      </td>
    </tr>
    
  </table>      

    
    


   </div>
</div>
   
</body>
</html>