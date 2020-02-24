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
        font-size:14px;     
        
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
        font-size:13px; 
     }

.spanhead{
            text-decoration: underline;
            font-size: 15px;

        }

/*@page :first {
    margin: 1cm 1cm 3cm 1cm;
}*/
@page {
  /* switch to landscape */
  size: Portrait;
  /* set page margins */
  margin: 3cm 1cm 3cm 1cm;
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

   <!-- <div class='header'>

     
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
 </div> -->
 <hr>
 <div style="text-align:right;font-size:10px;"><span >Case No:<?php
                            if($patientCaseData){
                                    echo $patientCaseData->case_no;
                                    
                            }

                            if($prescriptionLatestData){
                                if ($prescriptionLatestData->created_on != '') {
                                    echo "<br>Visiting Dt : ";
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
    <?php } ?>

      </div>
    


</body>
</html>