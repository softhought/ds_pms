$(document).ready(function(){
	
$('input.timepicker2').timepicker();

var basepath = $("#basepath").val();


$('button[data-id = medicine]').css('z-index','unset');
$('button[data-id = give_inj]').css('z-index','unset');
$('#give_inj').css('z-index','unset');
$('button[data-id = injbeforeshift]').css('z-index','unset');
$('#injbeforeshift').css('z-index','unset');

 $('.selecttime').bootstrapMaterialDatePicker
            ({
                date: false,
                shortTime: true,
                format: 'hh:mm a'
            });

 $('.datepicker').bootstrapMaterialDatePicker({
                    format: 'DD-MM-YYYY',
                    clearButton: true,
                    weekStart: 1,
                    time: false
  });


 $('.resetTime').click(function(){

   var id = $(this).attr('data-id');

   $("#"+id).val('');

 })

//only for check box to hide multiple input filled


$('.colrowhide').click(function(){

  var hideidcls = $(this).attr('data-hideidcls');
  var valId = $(this).attr('data-exnovalId');
  var hideIdvalcls = $(this).attr('data-hideIdvalcls');

  if($(this).prop('checked') == true){

     $("."+hideidcls).css('display','block');
     $("#"+valId).val('Y');

  }else{

  	$("."+hideidcls).css('display','none');
  	$("#"+valId).val('N');
  	$("."+hideIdvalcls).val('').change();
  }


});




$(document).on('submit','#preopForm',function(event)
    {
        event.preventDefault();
        

            var formDataserialize = $("#preopForm").serialize();
            formDataserialize = decodeURI(formDataserialize);
            //console.log(formDataserialize);

            var formData = {formDatas: formDataserialize };
            $(".preoprationbtn").css('display', 'none');
            $(".preloaderbtn").css('display', 'block');
        

        $.ajax({
                type: "POST",
                url: basepath+'preoperation/preopration_action',
                dataType: "json",
                contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                data: formData,
                
                success: function (result) {
                    
                    if (result.msg_status == 1) {

                      $("#preoprationId").val(result.insertId);
        	          $(".preoprationbtn").removeClass("btn-danger");
        	          $(".preoprationbtn").addClass("btn-primary");
                      $(".preoprationbtn").html('Updated');
                            
                  
                    } 
                    else {
                     //   $("#cls_response_msg").text(result.msg_data);
                    }
                    
                    $(".preloaderbtn").css('display', 'none');
                    
                    $(".preoprationbtn").css({
                        "display": "block",
                        "margin": "0 auto"
                    });
                  
                }, 
                error: function (jqXHR, exception) {
                  var msg = '';
                    if (jqXHR.status === 0) {
                        msg = 'Not connect.\n Verify Network.';
                    } else if (jqXHR.status == 404) {
                        msg = 'Requested page not found. [404]';
                    } else if (jqXHR.status == 500) {
                        msg = 'Internal Server Error [500].';
                    } else if (exception === 'parsererror') {
                        msg = 'Requested JSON parse failed.';
                    } else if (exception === 'timeout') {
                        msg = 'Time out error.';
                    } else if (exception === 'abort') {
                        msg = 'Ajax request aborted.';
                    } else {
                        msg = 'Uncaught Error.\n' + jqXHR.responseText;
                    }
                   // alert(msg);  
                }
            }); /*end ajax call*/

       
        
    });

//single select and show single input filled

  $(document).on("change",".selshowId",function(event){

     event.preventDefault();

     var value = $(this).val();
     var strmatch = $(this).attr('data-match').split(',');
     var strhideshowId = $(this).attr('data-hideshowId').split(',');
     var nullvalID = $(this).attr('data-nullvalID').split(',');
     
     
     for(i=0;i<strmatch.length;i++){

       if(value == strmatch[i]){
         
          
         $("#"+strhideshowId[i]).css("display","block");

       }else{

           $("#"+strhideshowId[i]).css("display","none");
           $("#"+nullvalID[i]).val("");
       }


     }
   
   
  });


  $("#preposed_operation_date").change(function(){

    var value = $(this).val();
    $("#operationdate").val(value);
   
    
    WeekDaysCalculationByLmpfordischarge(basepath,value);




  })



 $(document).on("change","#medicine_cat_id",function(){

    var value = $('#medicine_cat_id option:selected').text();
    var catId = $(this).val();
    var caseID = $("#caseID").val();

  
    if(value == "Others"){

      $("#othermedicine").css('display','block');
      $("#drpmedicine").css('display','none');
      $("#defaultsel").prop('selected',true);

        }else{

      $("#othermedicine").css('display','none');
      $("#drpmedicine").css('display','block');

      $.ajax({
                type: "POST",
                url: basepath+'preoperation/getmedicineBycat',
                dataType: "html",
                data: {catId:catId,caseID:caseID},
                
                success: function (result) {
                   
                   $('#medicindrp').html(result); 
                   $('select').selectpicker();
                   
                }, 
                error: function (jqXHR, exception) {
                  var msg = '';
                    if (jqXHR.status === 0) {
                        msg = 'Not connect.\n Verify Network.';
                    } else if (jqXHR.status == 404) {
                        msg = 'Requested page not found. [404]';
                    } else if (jqXHR.status == 500) {
                        msg = 'Internal Server Error [500].';
                    } else if (exception === 'parsererror') {
                        msg = 'Requested JSON parse failed.';
                    } else if (exception === 'timeout') {
                        msg = 'Time out error.';
                    } else if (exception === 'abort') {
                        msg = 'Ajax request aborted.';
                    } else {
                        msg = 'Uncaught Error.\n' + jqXHR.responseText;
                    }
                   // alert(msg);  
                }
            }); /*end ajax call*/

    }

  });


 /* add Pre op medicine*/

 
    $(document).on('click','#addpredaymedicine',function(event){

        event.stopImmediatePropagation();

          var rowno=  $("#preopmedrow").val();
          var medcatvalue = $('#medicine_cat_id option:selected').text();
          var medcatid=  $("#medicine_cat_id").val();
       
          var medicine=  $("#medicine").val();
          var other_medicine=  $("#other_medicine").val();
          var medicine_time=  $("#medicine_time").val();
          var operationdate=  $("#operationdate").val();

         

      if (validatePreop()) {
       
        rowno++;
        $.ajax({
            type: "POST",
            url: basepath+'preoperation/addOperationMedicineDetails',
            dataType: "html",
            data: {rowNo:rowno,medcatvalue:medcatvalue,medicine:medicine,other_medicine:other_medicine,medicine_time:medicine_time,operationdate:operationdate},
            success: function (result) {

                $("#preopmedrow").val(rowno);
                //$("#detail_operationdaymedine table").addClass("disp"); 
                $("#detail_operationdaymedine table tbody").append(result);   
                $('select').selectpicker();
               var $demoMaskedInput = $('.demo-masked-input');
               
                $('#medicine_time').val('');
                $('#other_medicine').val('');
                
                $('#medicine_cat_id').val('').change();
                $('#medicine').val('').change();
                

                   

            
         
            }, 
            error: function (jqXHR, exception) {
              var msg = '';
                if (jqXHR.status === 0) {
                    msg = 'Not connect.\n Verify Network.';
                } else if (jqXHR.status == 404) {
                    msg = 'Requested page not found. [404]';
                } else if (jqXHR.status == 500) {
                    msg = 'Internal Server Error [500].';
                } else if (exception === 'parsererror') {
                    msg = 'Requested JSON parse failed.';
                } else if (exception === 'timeout') {
                    msg = 'Time out error.';
                } else if (exception === 'abort') {
                    msg = 'Ajax request aborted.';
                } else {
                    msg = 'Uncaught Error.\n' + jqXHR.responseText;
                }
               // alert(msg);  
            }
            }); /*end ajax call*/

    }
  
    }); // End Visiting Details

    // Delete Table Row of to take medicine

    $(document).on('click','.delpreopRow',function(){
        
        var currRowID = $(this).attr('id');
        var rowDtlNo = currRowID.split('_');
       // console.log(rowDtlNo[1]);
        console.log(currRowID);
        //$("#ischangePrescription").val('Y');
        //$("tr#rowDocument_"+rowDtlNo[1]+"_"+rowDtlNo[2]).remove();
        $("tr#rowpreopMedicine_"+rowDtlNo[1]).remove();
    });



});


function validatePreop(){


   var medcatvalue = $('#medicine_cat_id option:selected').text();
   var medcatid=  $("#medicine_cat_id").val();
   var medicine=  $("#medicine").val();
   var other_medicine=  $("#other_medicine").val();
   var medicine_time=  $("#medicine_time").val();
   var operationdate=  $("#operationdate").val();

   
   $("#medcaterr,#preposeddateerr,#medicineerr,#othermederr").css('border-bottom','1px solid #fdc8e3');
   $("#premedicinetimerr").removeClass('errcl');
   
  if(operationdate == ''){
     
    $("#preposeddateerr").css('border-bottom','2px solid red');
    return false;
  }else if(medcatid == ''){

     $("#medcaterr").css('border-bottom','2px solid red');
     return false;
  }else if(medcatvalue != 'Others'){

     if(medicine == ''){

       $("#medicineerr").css('border-bottom','2px solid red');
       return false;

     }

  }else if(medcatvalue == 'Others'){

    if(other_medicine == ''){

       $("#othermederr").css('border-bottom','2px solid red');
       return false;

     }

  }
  if(medicine_time == ''){

      $("#premedicinetimerr").addClass('errcl');
      
      return false;

    }



   return true;


}


/* claculate weeks days by LMP for operation date  */ 

function WeekDaysCalculationByLmpfordischarge(basepath,operationdate){

      var lmp_date = $('#lmp_date').val();

    // console.log(lmp_date);
    // console.log(cliexmDate);
     
        if(lmp_date!='' && operationdate!=''){

           $.ajax({
               type: "POST",
               url: basepath+'patientcase/weekDaysCalculationByLmp',
               dataType: "html",
               data: {lmp_date:lmp_date,cliexmDate:operationdate},
               success: function (result) {
               
               var weeks_days=result;
               var dataDtl = weeks_days.split('_');

              console.log(dataDtl);

               $("#disterm_pregnancy_wks").val(dataDtl[0]);
               $("#disterm_pregnancy_days").val(dataDtl[1]);
               $("#dis_preg_wks").text(dataDtl[0]+" wks ");
               $("#dis_preg_days").text(dataDtl[1]+" days ");
            
               }, 
               error: function (jqXHR, exception) {
                 var msg = '';
                   if (jqXHR.status === 0) {
                       msg = 'Not connect.\n Verify Network.';
                   } else if (jqXHR.status == 404) {
                       msg = 'Requested page not found. [404]';
                   } else if (jqXHR.status == 500) {
                       msg = 'Internal Server Error [500].';
                   } else if (exception === 'parsererror') {
                       msg = 'Requested JSON parse failed.';
                   } else if (exception === 'timeout') {
                       msg = 'Time out error.';
                   } else if (exception === 'abort') {
                       msg = 'Ajax request aborted.';
                   } else {
                       msg = 'Uncaught Error.\n' + jqXHR.responseText;
                   }
                  // alert(msg);  
               }
               }); /*end ajax call*/


        }


}