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

     <div class="custom-page-start" style="padding:3px 0;height:22.5cm;#border:1px solid gray; ">

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

    <!--  start of Chief Complaint -->

    <?php if(!empty($chiefComplaintdetail)){ ?>
        <br>
        <div style="#border: 1px solid green; min-height: 200px;">

          <?php 

              foreach($chiefComplaintdetail as $chiefComplaintdetail1){ 

              if($chiefComplaintdetail1->year != '' || $chiefComplaintdetail1->month != '' || $chiefComplaintdetail1->day != ''){
            

          ?>
        <span class="spanhead">Complainting Of Chief Complaint:</span>

        <?php break; } } ?>

        <table width="100%"   class="demo_font" style="margin-left: 40px;margin-top: 10px;" >
          
            <?php  
              foreach($chiefComplaintdetail as $chiefComplaintdetail){ 

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

       <!--  End of Chief Complaint -->

          

      <table width="100%"   class="demo_font" style="margin-left: 40px;margin-top: 10px;" >

    <!--  start of Pain lower abdomen dtl -->

       <?php if(!empty($painlowerabdomen)){ ?>
       
       <tr>
         <td>
          <?php if($painlowerabdomen->duration_years != '' || $painlowerabdomen->duration_months != '' || $painlowerabdomen->duration_days != '' || $painlowerabdomen->associte_dysuria != '' || $painlowerabdomen->asso_frequency_wination != '' || $painlowerabdomen->period_pain != '' || $painlowerabdomen->pain_charcter != ''){ 
             echo "Pain lower abdomen "; 
           } ?>
          <?php  

          if($painlowerabdomen->duration_years != ''){
             echo ' for last '.$painlowerabdomen->duration_years.' years ';
          }
          if($painlowerabdomen->duration_months != ''){

             if($painlowerabdomen->duration_years != ''){

                 echo $painlowerabdomen->duration_months.' months ';
              }else{
                 echo ' for last '.$painlowerabdomen->duration_months.' months ';
              }

          } 

          if($painlowerabdomen->duration_days != ''){

            if($painlowerabdomen->duration_months != '' || $painlowerabdomen->duration_years != ''){

              echo $painlowerabdomen->duration_days.' days ';
            }else{
             
               echo ' for last '.$painlowerabdomen->duration_days.' days ';

            } 
          }

         

          if($painlowerabdomen->severty != ''){
            echo'which is ';
            echo $painlowerabdomen->severty.','; 
          }
       

$painlowerarrmsg = array(
                  'dysuria'=>array(
                                    'Yes'=>' associted with dysuria',
                                     'No'=>' not associted with dysuria',
                                     'text'=>''
                                    
                                    ),
                   'frequencyofurination'=> array(
                                  'Yes'=>' associted with frequency of urination',
                                  'No'=>' not associted with frequency of urination',
                                  'text'=>' frequency of urination ',
                                  
                                  
                                 ),
                   'menstrualcycl'=>array('Yes'=>' associted with menstrual cycle',
                                  'No'=>' not associted with menstrual cycle',
                                  'text'=>' menstrual cycle ',
                                  
                                ),
                   
                   );

$painlowerdata = array($painlowerabdomen->associte_dysuria,$painlowerabdomen->asso_frequency_wination,$painlowerabdomen->period_pain);


$paincolumn = array('dysuria','frequencyofurination','menstrualcycl');


$painlaststatus = '';
 

 for ($i=0; $i < 3 ; $i++) { 
   

    if($painlowerdata[$i] != ''){

       if($painlaststatus == $painlowerdata[$i]){

        echo " and ".$painlowerarrmsg[$paincolumn[$i]]['text'];

      }else{

         if($painlaststatus != ''){
           echo ' and ';
         }

         echo $painlowerarrmsg[$paincolumn[$i]][$painlowerdata[$i]];

         }
      
       $painlaststatus = $painlowerdata[$i];

       if($i == 2){
           echo '. ';
         }
    
     }
     
   
 }


           if($painlowerabdomen->pain_charcter != ''){

              echo 'It is '.$painlowerabdomen->pain_charcter.' in character.';

           }

          ?>
         </td>
       </tr>
       <?php } ?>

         <!--  End of Pain lower abdomen dtl -->

           <!--  start of Dysuria dtl -->

       <?php

       if(!empty($dysuriaprdata)){ ?>

        <tr>
          <td>

         <?php  if($dysuriaprdata->complaintyear != '' || $dysuriaprdata->complaintmonth != '' || $dysuriaprdata->complaintday != '' || $dysuriaprdata->freq_of_micturition != '' || $dysuriaprdata->pain_abdomen != '' || $dysuriaprdata->dysuria_fever != '' || $dysuriaprdata->burining_sensation != ''){

            echo "Dysuria ";

         } ?>  

           
 
       <?php 

        if($dysuriaprdata->complaintyear != ''){

              echo 'for '.$dysuriaprdata->complaintyear.' years ';

            }

            if($dysuriaprdata->complaintmonth != ''){

              if($dysuriaprdata->complaintyear != ''){

                echo $dysuriaprdata->complaintmonth.' months ';

               }else{

                  echo 'for '.$dysuriaprdata->complaintmonth.' months ';
               }
            }

            if($dysuriaprdata->complaintday != ''){

              if($dysuriaprdata->complaintyear != '' || $dysuriaprdata->complaintmonth != ''){
                echo  $dysuriaprdata->complaintday.' days ';
              }else{

                 echo 'for '.$dysuriaprdata->complaintday.' days ';
              }
            } 


 $arrmsg = array(
                  'frequency'=>array(
                                    'Yes'=>'associted with frequency of micturition',
                                     'No'=>' not associted with frequency of micturition',
                                     'text'=>''
                                    
                                    ),
                   'pain'=> array(
                                  'Yes'=>' associted with pain abdomen',
                                  'No'=>' not associted with pain abdomen',
                                  'text'=>'pain abdomen',
                                  
                                  
                                 ),
                   'fever'=>array('Yes'=>' associted with fever',
                                  'No'=>' not associted with fever',
                                  'text'=>'fever',
                                  
                                ),
                   'burning'=>array('Yes'=>' associted with burning sensation',
                                  'No'=>' not associted with burning sensation',
                                  'text'=>'burning sensation',
                                  
                                ),
                   );

$dysdata = array($dysuriaprdata->freq_of_micturition,$dysuriaprdata->pain_abdomen,$dysuriaprdata->dysuria_fever,$dysuriaprdata->burining_sensation,);


$column = array('frequency','pain','fever','burning');


$laststatus = '';
 

 for ($i=0; $i < 4 ; $i++) { 
   

    if($dysdata[$i] != ''){

       if($laststatus == $dysdata[$i]){

        echo " and ".$arrmsg[$column[$i]]['text'];

      }else{

         if($laststatus != ''){
           echo ' and ';
         }

         echo $arrmsg[$column[$i]][$dysdata[$i]];
      }


       $laststatus = $dysdata[$i];
       if($i == 2){
      echo '. ';
        }
     }

    
    
   
 }

       ?>

          


        </td>
      </tr>



      <?php  } ?>

      <!--  End of Dysuria dtl -->

      <!--  start of menstrule problem dtl -->
 
            <!--  start of oligomenorrhoea dtl -->

            <?php if(!empty($oligomenorrhoeadata)){ ?>
   
              <tr><td>
                
                <?php if($oligomenorrhoeadata->notes != ''){


                echo $oligomenorrhoeadata->notes; 


                } ?>


              </td></tr>


           <?php  } ?>

            <!--  end of oligomenorrhoea dtl -->

              <!--  start of secondary amenorrhoea dtl -->

            <?php if(!empty($secondaryamenorrhoeadata)){ ?>
   
              <tr><td>
                
                <?php if($secondaryamenorrhoeadata->notes != ''){


                echo $secondaryamenorrhoeadata->notes; 


                } ?>


              </td></tr>


           <?php  } ?>

            <!--  end of secondary amenorrhoea dtl -->

            <!--  start of menorrhagia dtl -->

            <?php if(!empty($menorrhagiadata)){ ?>
   
              <tr><td>
                
                <?php if($menorrhagiadata->notes != ''){


                echo $menorrhagiadata->notes; 


                } ?>


              </td></tr>


           <?php  } ?>

            <!--  end of menorrhagia dtl -->

            <!--  start of polymenorrhea dtl -->

            <?php if(!empty($polymenorrheadata)){ ?>
   
              <tr><td>
                
                <?php if($polymenorrheadata->notes != ''){


                echo $polymenorrheadata->notes; 


                } ?>


              </td></tr>


           <?php  } ?>

            <!--  end of polymenorrhea dtl -->

            <!--  start of hypomenorrhoea dtl -->

            <?php if(!empty($hypomenorrhoeadata)){ ?>
   
              <tr><td>
                
                <?php if($hypomenorrhoeadata->notes != ''){


                echo $hypomenorrhoeadata->notes; 


                } ?>


              </td></tr>


           <?php  } ?>

            <!--  end of hypomenorrhoea dtl -->


      <!--  end of menstrule problem dtl -->

        <!--  start of white discharge dtl -->

      <?php if(!empty($whitedischargedata)){ ?>

    <tr>
      <td>

        <?php

              if($whitedischargedata->duration_months != '' || $whitedischargedata->duration_days != ''){
                echo "White discharge ";
              }

             if($whitedischargedata->duration_months != ''){
              echo "for ".$whitedischargedata->duration_months.' months ';
             }

             if($whitedischargedata->duration_days != ''){

                  if($whitedischargedata->duration_months != ''){

                     echo $whitedischargedata->duration_days.' days ';

                  }else{

                      echo "for ". $whitedischargedata->duration_days.' days ';
                  }
             }

            
   $whitearrmsg = array(
                  'assoc'=>array(
                                    'Itching'=>'associted with Itching',
                                    'Bad Smell'=>'associted with bad smell',
                                    'Badsmeltext'=>'bad smell',
                                     'Profuse Flow'=>' associted with profuse flow',
                                     'Protext'=>'profuse flow',
                                     'With Fever'=>' associted with fever',
                                     'Without Fever'=>' not associted with fever',
                                     'Pain Abdomen Yes'=>' associted with pain abdomen',
                                     'Pain Abdomen No'=>' not associted with pain abdomen'
                                    
                                    ),
                   
                   );



$whiteassoc = explode(',',$whitedischargedata->associted_with);



//$column = array('frequency','pain','fever','burning');


$laststatus = '';
 

 for ($i=0; $i < count($whiteassoc); $i++) { 
   

    if($whiteassoc[$i] != ''){

      if($laststatus == 'Itching'){

        echo " and ".$whitearrmsg['assoc']['Badsmeltext'];

      }

       else if($laststatus == 'Bad Smell'){

        echo " and ".$whitearrmsg['assoc']['Protext'];

      }
      else{

         if($laststatus != ''){
           echo ' and ';
         }

         echo $whitearrmsg['assoc'][$whiteassoc[$i]];
      }


       $laststatus = $whiteassoc[$i];

        if($i == 2){
         echo ', ';
        }
    
     }

    
    
   
 }

   if($whitedischargedata->previous_episode != ''){

       if($whitedischargedata->previous_episode == 'Yes'){
         if($whitedischargedata->episode_previous_sel != ''){
           echo "<br>";
           echo "H/O previous episode ".strtolower($whitedischargedata->episode_previous_sel);
         }
         

       }
   }




         ?>
        
      </td>
    </tr>

     <?php  } ?>

          <!--  end of white discharge dtl -->

          <!--  start of unwanted pregnancy dtl -->
  
      <?php if(!empty($Unwantedpregnancydata)){  ?>

         <tr>
          <td>

            <?php

              if($Unwantedpregnancydata->urine_test_date != '' || $Unwantedpregnancydata->wants_termination != '' || $Unwantedpregnancydata->termination_by != '' || $Unwantedpregnancydata->surgical_method != ''){

                   echo "Unwanted pregnancy ";
              }

              if($Unwantedpregnancydata->urine_test_date != ''){

                echo "urine for pregnancy test +ve on ".date('d-m-Y',strtotime($Unwantedpregnancydata->urine_test_date));
              }
              if($Unwantedpregnancydata->wants_termination != ''){

                echo " wants termination because of some ";

                $terminatedata = explode(',',$Unwantedpregnancydata->wants_termination);

                
                for ($i=0; $i < count($terminatedata); $i++) { 
                  
                   
                    if($terminatedata[$i] != 'Others'){
                      echo $terminatedata[$i].' and ';
                    }

                  }
               
                  if($Unwantedpregnancydata->wantterminationOther != ''){

                      echo $Unwantedpregnancydata->wantterminationOther.' ';

                  }


                 if($Unwantedpregnancydata->termination_by != ''){

                   echo "wants termination by ".$Unwantedpregnancydata->termination_by.' ';

                 }

                 if($Unwantedpregnancydata->surgical_method != ''){

                    echo $Unwantedpregnancydata->surgical_method;
                 } 

              }





             ?>
           

         </td>
       </tr>


     <?php  } ?>



          <!--  end of unwanted pregnancy dtl -->
          <!--  start of incidental usg finding dtl -->

        <?php if(!empty($incidentalusgfindingdata)) { ?>
   

      <tr>
        <td>
         <?php   

           if($incidentalusgfindingdata->fibroid_size != '' || $incidentalusgfindingdata->usg_date != '' || $incidentalusgfindingdata->incidental_notes != ''){
             echo "Incidental USG finding ";
           }

           if($incidentalusgfindingdata->fibroid_size != ''){

               echo 'of fibroid of '.$incidentalusgfindingdata->fibroid_size;
           } 

           if($incidentalusgfindingdata->usg_date != ''){

            echo ' on '.date('d-m-Y',strtotime($incidentalusgfindingdata->usg_date));
           }

         if($incidentalusgfindingdata->incidental_notes != ''){

           echo ' other relevant finding if any '.$incidentalusgfindingdata->incidental_notes;
         }

         ?>

      </td>
    </tr>


        <?php } ?>




          <!--  end of incidental usg finding dtl -->

          <!--  start of stich line problem dtl -->

    <?php if(!empty($stichlineproblemdata)){ ?>

      <tr>
        <td>
          
          <?php 

              if($stichlineproblemdata->operation_name != ''){

                echo "H/O ".$stichlineproblemdata->operation_name.' operation ';

                if($stichlineproblemdata->operation_date != ''){

                   echo ' on '.date('d-m-Y',strtotime($stichlineproblemdata->operation_date));
                }

                if($stichlineproblemdata->hospital_name != ''){

                  echo ' at '.$stichlineproblemdata->hospital_name.' Hospital';
                }

                               
              }

            if($stichlineproblemdata->swelling_stich != '' || $stichlineproblemdata->redness_stich != '' || $stichlineproblemdata->stich_discharge != '')
             {
              echo "<br>";
              echo "Complaining of ";

              if($stichlineproblemdata->swelling_stich != ''){
                
                  echo "swelling for ".$stichlineproblemdata->swelling_stich.' days ';
              }
              if($stichlineproblemdata->redness_stich != ''){

                  if($stichlineproblemdata->swelling_stich != ''){
                    echo ' and ';
                  }
                
                  echo "redness for ".$stichlineproblemdata->redness_stich.' days ';
              }
             
             if($stichlineproblemdata->stich_discharge != ''){

                 if($stichlineproblemdata->swelling_stich != '' || $stichlineproblemdata->redness_stich){
                      echo ' and ';
                  }
                
              echo "discharge for ".$stichlineproblemdata->stich_discharge.' days.';
              }else{

                 echo ' without any discharge.';
              }
             

              }


           ?>
        </td>
      </tr>

    <?php  } ?>


          <!--  end of stich line problem dtl -->
          <!--  start of stich line problem dtl -->

          <?php if(!empty($somthingcommingdowndata)){ ?>

            <tr><td>
              <?php

              if($somthingcommingdowndata->duration_years != '' || $somthingcommingdowndata->duration_months != '' || $somthingcommingdowndata->stress_incontinence != '' || $somthingcommingdowndata->diff_in_wination != '' || $somthingcommingdowndata->diff_in_defection != ''){

                echo "Somthing comming down P/V ";

              }

              if($somthingcommingdowndata->duration_years != ''){

                echo " for last ".$somthingcommingdowndata->duration_years.' years ';
              }
              if($somthingcommingdowndata->duration_months != ''){

                if($somthingcommingdowndata->duration_years != ''){

                echo $somthingcommingdowndata->duration_months.' months '
                  ;

                  }else{
                   
                   echo " for last ".$somthingcommingdowndata->duration_months.' months ';

                  }

              }


$somecomearrmsg = array(
                  'stress'=>array(
                                    'Yes'=>'associted with stress incontinence,',
                                     'No'=>' not associted with stress incontinence,',
                                     'text'=>''
                                    
                                    ),
                   'urination'=> array(
                                  'Yes'=>' difficulty in urination',
                                  'No'=>' no difficulty in urination',
                                  'text'=>'',
                                  
                                  
                                 ),
                   'defecation'=>array('Yes'=>' difficulty in defecation',
                                  'No'=>' no difficulty in defecation',
                                  'text'=>'defecation',
                                  
                                ),
                   
                   );

$somecomedata = array($somthingcommingdowndata->stress_incontinence,$somthingcommingdowndata->diff_in_wination,$somthingcommingdowndata->diff_in_defection);


$somecol = array('stress','urination','defecation');


$laststatus = '';
 

 for ($i=0; $i < 3 ; $i++) { 
   

    if($somecomedata[$i] != ''){

       if($laststatus == $somecomedata[$i]){

        echo " and ".$somecomearrmsg[$somecol[$i]]['text'];

      }else{

         if($laststatus != ''){
           echo ' and ';
         }
         

         echo $somecomearrmsg[$somecol[$i]][$somecomedata[$i]];
      }

       if($i > 0){

         $laststatus = $somecomedata[$i];
       }

       if($i == 2){
         echo '. ';
        }
     }

     
    
   
 }

 if($somthingcommingdowndata->assoc_chronic_cough != '' || $somthingcommingdowndata->assoc_constipation != ''){
   echo '<br>';
  echo 'Had ';
 }


$somerrmsg = array(
                  'chronic'=>array(
                                    'Yes'=>' history of chronic cough',
                                     'No'=>' no history of chronic cough',
                                     'text'=>''
                                    
                                    ),
                   'cons'=> array(
                                  'Yes'=>' history of constipation',
                                  'No'=>'  no history of constipation',
                                  'text'=>' constipation ',
                                  
                                  
                                 ),
                  
                      );

$somechrdata = array($somthingcommingdowndata->assoc_chronic_cough,$somthingcommingdowndata->assoc_constipation);

$chrcol = array('chronic','cons');
$laststatus = '';

for ($i=0; $i < 2 ; $i++) { 
   

    if($somechrdata[$i] != ''){
     

       if($laststatus == $somechrdata[$i]){

        echo " and ".$somerrmsg[$chrcol[$i]]['text'];

      }else{

         if($laststatus != ''){
           echo ' and ';
         }
         

         echo $somerrmsg[$chrcol[$i]][$somechrdata[$i]];
      }

        $laststatus = $somechrdata[$i];

         if($i == 1){
           echo '.';
         }
     }

   
    
   
 }



               ?>

            </td></tr>

          <?php } ?>


          <!--  end of stich line problem dtl -->
          <!--  start of post menopausal bleeding dtl -->

    <?php if(!empty($postmenopausalbleedingdata)){ ?>
     <tr>
      <td>

        <?php

          if($postmenopausalbleedingdata->menopausal_episode != '' || $postmenopausalbleedingdata->bleeding != '' || $postmenopausalbleedingdata->bleeding_continue_days != ''){

            echo 'Post menopausal bleeding ';
          }

          if($postmenopausalbleedingdata->menopausal_episode != ''){

             echo $postmenopausalbleedingdata->menopausal_episode; 
          }

          if($postmenopausalbleedingdata->bleeding != ''){

            if($postmenopausalbleedingdata->menopausal_episode != ''){
              echo ' having '; 
            }
            echo $postmenopausalbleedingdata->bleeding; 
          }

         if($postmenopausalbleedingdata->bleeding_continue_days != ''){

          if($postmenopausalbleedingdata->bleeding != '' || $postmenopausalbleedingdata->menopausal_episode != ''){
            echo ',';
          }

          echo ' bleeding continuing '.$postmenopausalbleedingdata->bleeding_continue_days.' days.';
         }

         ?>
   


     </td>
    </tr>



    <?php } ?>


          <!--  end of post menopausal bleeding dtl -->
          <!--  start of urinary incontinence dtl -->
  <?php if(!empty($urinaryincontinencedata)){ ?>
  <tr>
    <td>
      <?php

         if($urinaryincontinencedata->urinary_incontinence != '' || $urinaryincontinencedata->urinary_incontinence_years != '' || $urinaryincontinencedata->urinary_incontinence_months != '' || $urinaryincontinencedata->urinary_incontinence_days != ''){

          echo "Urinary inconsistancy ";
         }

         if($urinaryincontinencedata->urinary_incontinence != ''){

           echo 'on '.$urinaryincontinencedata->urinary_incontinence; 
         }
         if($urinaryincontinencedata->urinary_incontinence_years != ''){

            echo ' for '.$urinaryincontinencedata->urinary_incontinence_years.' years ';
         }
          if($urinaryincontinencedata->urinary_incontinence_months != ''){

            if($urinaryincontinencedata->urinary_incontinence_years != ''){

              echo  $urinaryincontinencedata->urinary_incontinence_months.' months ';

            }else{

               echo ' for '.$urinaryincontinencedata->urinary_incontinence_months.' months ';
            }
           
         }
         if($urinaryincontinencedata->urinary_incontinence_days != ''){

           if($urinaryincontinencedata->urinary_incontinence_years != '' || $urinaryincontinencedata->urinary_incontinence_months != ''){

              echo  $urinaryincontinencedata->urinary_incontinence_days.' days.';

            }else{

               echo ' for '.$urinaryincontinencedata->urinary_incontinence_days.' days. ';
            }

         }

      

         if($urinaryincontinencedata->episode_months != '' || $urinaryincontinencedata->episode_years != ''){
        echo '<br>';
        echo 'This is ';
         if($urinaryincontinencedata->urinary_episode != ''){
            echo strtolower($urinaryincontinencedata->urinary_episode).' ';
         }
       }
        
        if($urinaryincontinencedata->episode_years != ''){
          echo 'for last '.$urinaryincontinencedata->episode_years.' years ';
        }
        if($urinaryincontinencedata->episode_months != ''){

          if($urinaryincontinencedata->episode_years != ''){

             echo $urinaryincontinencedata->episode_months.' months.';

          }else{

            echo ' for last '.$urinaryincontinencedata->episode_months.' months.' ;

          }
        }

       ?>
    </td>
  </tr>


  <?php } ?>



          <!--  end of urinary incontinence dtl -->
          <!--  start of lump lower abdomen dtl -->

          <?php if(!empty($lumplowerabdomendata)){ ?>
   <tr><td>
       <?php 

       if($lumplowerabdomendata->lump_lower_years != '' || $lumplowerabdomendata->lump_lower_months != '' || $lumplowerabdomendata->lump_lower_days != '' || $lumplowerabdomendata->lump_pain_abdomen != '' || $lumplowerabdomendata->weight_loss != ''){

        echo 'Lump lower abdomen ';

         }

          
         if($lumplowerabdomendata->lump_lower_years != ''){

            echo ' for '.$lumplowerabdomendata->lump_lower_years.' years ';
         }
          if($lumplowerabdomendata->lump_lower_months != ''){

            if($lumplowerabdomendata->lump_lower_years != ''){

              echo  $lumplowerabdomendata->lump_lower_months.' months ';

            }else{

               echo ' for '.$lumplowerabdomendata->lump_lower_months.' months ';
            }
           
         }
         if($lumplowerabdomendata->lump_lower_days != ''){

           if($lumplowerabdomendata->lump_lower_years != '' || $lumplowerabdomendata->lump_lower_months != ''){

              echo  $lumplowerabdomendata->lump_lower_days.' days';

            }else{

               echo ' for '.$lumplowerabdomendata->lump_lower_days.' days ';
            }

         }


$lumprmsg = array(
                  'painabdomen'=>array(
                                    'Yes'=>' associted with pain abdomen',
                                     'No'=>' not associted with pain abdomen',
                                     'text'=>''
                                    
                                    ),
                   'weight'=> array(
                                  'Yes'=>' associted with weight loss',
                                  'No'=>'  not associted with weight loss',
                                  'text'=>' weight loss ',
                                  
                                  
                                 ),
                  
                      );

$lumpdata = array($lumplowerabdomendata->lump_pain_abdomen,$lumplowerabdomendata->weight_loss);

$lumpcol = array('painabdomen','weight');
$laststatus = '';

for ($i=0; $i < 2 ; $i++) { 
   

    if($lumpdata[$i] != ''){
     

       if($laststatus == $lumpdata[$i]){

        echo " and ".$lumprmsg[$lumpcol[$i]]['text'];

      }else{

         if($laststatus != ''){
           echo ' and ';
         }
         

         echo $lumprmsg[$lumpcol[$i]][$lumpdata[$i]];
      }

        $laststatus = $lumpdata[$i];

        if($i == 1){
         echo '.';
       }
     }

    
    
   
 }


       ?>

   </td></tr>


         <?php } ?>   
          <!--  end of lump lower abdomen dtl -->


          <!--  start of wants family planning dtl -->

          <?php if(!empty($wantsfamilyplanningdata)){  ?>

           <tr><td>
             <?php

                   if($wantsfamilyplanningdata->temporary != ''){

                      echo 'Wants family planning by '.$wantsfamilyplanningdata->temporary,'.';
                   }



              ?>


           </td></tr>
 

       <?php } ?>
  

          <!--  end of wants family planning dtl -->

          <!--  start of lump in breast dtl -->

          <?php if(!empty($lumpinbreastdata)){ ?>
   <tr><td>
      <?php

       if($lumpinbreastdata->lump_breast_years != '' || $lumpinbreastdata->lump_breast_months != '' || $lumpinbreastdata->lump_breast_days != '' || $lumpinbreastdata->lump_breast_pain != '' || $lumpinbreastdata->nipple_discharge != ''){

        echo 'Lump in breast ';

       }

      if($lumpinbreastdata->lump_breast_years != ''){

            echo ' for '.$lumpinbreastdata->lump_breast_years.' years ';
         }
          if($lumpinbreastdata->lump_breast_months != ''){

            if($lumpinbreastdata->lump_breast_years != ''){

              echo  $lumpinbreastdata->lump_breast_months.' months ';

            }else{

               echo ' for '.$lumpinbreastdata->lump_breast_months.' months ';
            }
           
         }
         if($lumpinbreastdata->lump_breast_days != ''){

           if($lumpinbreastdata->lump_breast_years != '' || $lumpinbreastdata->lump_breast_months != ''){

              echo  $lumpinbreastdata->lump_breast_days.' days';

            }else{

               echo ' for '.$lumpinbreastdata->lump_breast_days.' days ';
            }

         }

$lumpbreastrmsg = array(
                  'breastpain'=>array(
                                    'Yes'=>' associted with pain',
                                     'No'=>' not associted with pain',
                                     'text'=>''
                                    
                                    ),
                   'discharge'=> array(
                                  'Yes'=>' associted with nipple discharge',
                                  'No'=>'  not associted with nipple discharge',
                                  'text'=>' nipple discharge ',
                                  
                                  
                                 ),
                  
                      );

$lumpbreastdata = array($lumpinbreastdata->lump_breast_pain,$lumpinbreastdata->nipple_discharge);

$lumpbreastcol = array('breastpain','discharge');
$laststatus = '';

for ($i=0; $i < 2 ; $i++) { 
   

    if($lumpbreastdata[$i] != ''){
     

       if($laststatus == $lumpbreastdata[$i]){

        echo " and ".$lumpbreastrmsg[$lumpbreastcol[$i]]['text'];

      }else{

         if($laststatus != ''){
           echo ' and ';
         }
         

         echo $lumpbreastrmsg[$lumpbreastcol[$i]][$lumpbreastdata[$i]];
      }

        $laststatus = $lumpbreastdata[$i];

        if($i == 1){
          echo '.';
        }
     }

    
    
   
 }      


       ?>

   </td></tr>


          <?php } ?>

          <!--  end of lump in breast dtl -->

          <!--  start of breast congestion dtl -->

  <?php if(!empty($breastcongestiondata)) { ?>

    <tr>
      <td>
        <?php

          if($breastcongestiondata->breast_congestion_months != '' || $breastcongestiondata->breast_congestion_days != '' || $breastcongestiondata->breastfeeding != '' ||  $breastcongestiondata->baby_age_years != '' || $breastcongestiondata->baby_age_months != ''){

            echo 'Congested breast ';
          }

          if($breastcongestiondata->breast_congestion_months != ''){

          
              echo ' for '.$breastcongestiondata->breast_congestion_months.' months ';
           
           
         }
         if($breastcongestiondata->breast_congestion_days != ''){

           if($breastcongestiondata->breast_congestion_months != ''){

              echo  $breastcongestiondata->breast_congestion_days.' days';

            }else{

               echo ' for '.$breastcongestiondata->breast_congestion_days.' days ';
            }

         }

         if($breastcongestiondata->breastfeeding == 'Yes'){

          echo ' on breast feeding ';

         }

         if($breastcongestiondata->baby_age_years != '' || $breastcongestiondata->baby_age_months != '')
         { 
          if($breastcongestiondata->breast_congestion_months != '' || $breastcongestiondata->breast_congestion_days != '' || $breastcongestiondata->breastfeeding != ''){
             echo ',';
          }


          echo ' age of baby is ';  
        }

        if($breastcongestiondata->baby_age_years != ''){

           
              echo $breastcongestiondata->baby_age_years.' years ';
           
           
         }
         if($breastcongestiondata->baby_age_months != ''){

              echo  $breastcongestiondata->baby_age_months.' months';

           
         }

         ?>
      </td>
    </tr>

  <?php } ?>


          <!--  end of breast congestion dtl -->
          <!--  start of pain in breast dtl -->

 <?php if(!empty($paininbreastdata)){ ?>

<tr><td>
  <?php 
       if($paininbreastdata->pain_in_breast != '' || $paininbreastdata->complaintyear != ''  || $paininbreastdata->complaintmonth != '' || $paininbreastdata->complaintday != ''){

          echo 'Pain ';
       }

       if($paininbreastdata->pain_in_breast != ''){

        if($paininbreastdata->pain_in_breast == 'Both'){
          echo 'in left & right both breast ';
        }else{
          echo 'in '.$paininbreastdata->pain_in_breast.' breast ';
        }
         
       }

        if($paininbreastdata->complaintyear != ''){

            echo ' for '.$paininbreastdata->complaintyear.' years ';
         }
          if($paininbreastdata->complaintmonth != ''){

            if($paininbreastdata->complaintyear != ''){

              echo  $paininbreastdata->complaintmonth.' months ';

            }else{

               echo ' for '.$paininbreastdata->complaintmonth.' months ';
            }
           
         }
         if($paininbreastdata->complaintday != ''){

           if($paininbreastdata->complaintyear != '' || $paininbreastdata->complaintmonth != ''){

              echo  $paininbreastdata->complaintday.' days';

            }else{

               echo ' for '.$paininbreastdata->complaintday.' days ';
            }

         }


  ?>
</td></tr>

 <?php } ?>


          <!--  end of pain in breast dtl -->
        

     </table>

      <?php if(!empty($gynccologymasterdetail)){ ?>    
        <span class="spanhead">History Summary :</span>
        <?php } ?>     
        <table width="100%"   class="demo_font" style="margin-left: 40px;margin-top:0px;" >
          <?php if($mestruallmp_date != ''){  ?>
         <tr>
            <td>
                 <?php echo 'LMP Date : ';
                   echo date('d-m-Y',strtotime($mestruallmp_date)); ?>
             
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
            <?php if(!empty($gynccologymasterdetail)){ ?>

            <td>&nbsp;G&nbsp;<sub style="font-size: 9px;"><?php echo $total_parity; ?></sub>&nbsp;P&nbsp;<sub style="font-size: 7px;"><?php echo $parity_term_delivery.' + '.$parity_preterm.' + '.$parity_abortion.' + '.$parity_issue; ?></sub>
                      
           <?php } ?>


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

  <br>    

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

               <?php echo $lumpconsistancy,',';   ?>
             <?php } ?>

             <?php if($lumpmobility != ''){ ?>
                 <?php echo ' '.$lumpmobility;   ?>

                <?php } ?>

               <?php if($pervaginalexam != ''){ 
        
               if($lumpconsistancy != '' || $lumpmobility != ''){ echo ' & '; }

                ?>
                pervaginal <?php echo strtolower($pervaginalexam).' ';   ?>

                <?php } ?>

                <?php if($prevaginalposition != ''){ ?>
                <?php echo strtolower($prevaginalposition); echo "<br>";  ?>

                <?php } ?>

                <?php if($perspeculamexam != ''){ ?>
               Perspeculum Cervix  <?php echo strtolower($perspeculamexam); if($perspeculamexam == 'Growth Seen' && $speculamgrowthseen != ''){ echo " which "; echo strtolower($speculamgrowthseen); } echo "<br>";  ?>

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
     <?php   $i = 1;
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
<table style="margin-top: -19px;">

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
</body>
</html>