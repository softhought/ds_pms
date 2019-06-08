$(document).ready(function(){
    var basepath = $("#basepath").val();
    var rowNoUpload = 0;


$("#antenantalbtn").addClass("bg-teal");
$("#antenantalbtn_section").css("display", "block");
$("#antenantal_left_tab_menu_1").addClass("bg-light-green");
$("#antenantal_left_tab_menu_1_section").css("display", "block");
//$('#procedure_date').datepicker({format: 'mm/dd/yyyy'});


 /* Top Tab button on click*/

 $(document).on('click','.tabtnnonclck',function(){

 	var btnid= $(this).attr('id');
 	$(".tabbtn").removeClass("bg-teal");
 	$(".tabbtn").addClass("tabtnnonclck");

 	$("#"+btnid).removeClass("tabtnnonclck");
 	$("#"+btnid).addClass("bg-teal");

    $(".treatmentsection").css("display", "none");

    $("#"+btnid+"_section").css("display", "block");


   
});

 /* Left Tab button on click*/

 $(document).on('click','.tab_lf_btn',function(){

 	var btnid= $(this).attr('id');
 	$(".tab_lf_btn").removeClass("bg-light-green");
 //	$(".tab_lf_btn").addClass("lefttabtnnonclck");

 //	$("#"+btnid).removeClass("tab_lf_btn");
 	$("#"+btnid).addClass("bg-light-green");

    $(".antenantalDataSection").css("display", "none");

    $("#"+btnid+"_section").css("display", "block");


   
});



 /* new case registration */






    $(document).on('submit','#patientBasicForm',function(event)
    {
        event.preventDefault();
        if(validatPatientBasicInfo())
        {   

            var formDataserialize = $("#patientBasicForm").serialize();
            formDataserialize = decodeURI(formDataserialize);
            console.log(formDataserialize);

            var formData = { formDatas: formDataserialize };
            $("#patientbasicsavebtn").css('display', 'none');
            $("#loaderbtn").css('display', 'block');
        

            //console.log(formData);
            
    
        $.ajax({
                type: "POST",
                url: basepath+'patientcase/updatePatientBasicInfo',
                dataType: "json",
                contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                data: formData,
                
                success: function (result) {
                    
                    if (result.msg_status == 1) {

                      
        	          $("#patientbasicsavebtn").removeClass("btn-danger");
        	          $("#patientbasicsavebtn").addClass("btn-primary");
                      $("#patientbasicsavebtn").html('Updated');
                            
                  
                    } 
                    else {
                     //   $("#cls_response_msg").text(result.msg_data);
                    }
                    
                    $("#loaderbtn").css('display', 'none');
                    
                    $("#patientbasicsavebtn").css({
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

        
        	

        }   // end master validation


        
    });



    /* save and update antenatal information */


    $(document).on('submit','#antinatalBasicRecordForm',function(event)
    {
        event.preventDefault();
        if(validatAntinatalBasicRecord())
        { 

            if (MensuMeddetailValidation()) { 

            var formDataserialize = $("#antinatalBasicRecordForm").serialize();
            formDataserialize = decodeURI(formDataserialize);
            console.log(formDataserialize);

            var formData = { formDatas: formDataserialize };
            $("#patientbasicsavebtn").css('display', 'none');
           // $(".antenatelbasicsavebtn").css('display', 'none');
            $(".loaderbtn").css('display', 'block');
        

            //console.log(formData);
            
    
        $.ajax({
                type: "POST",
                url: basepath+'patientcase/antenantalinfo_action',
                dataType: "json",
                contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                data: formData,
                
                success: function (result) {

                     $(".antenatelbasicsavebtn").css('display', 'block');
                    if (result.msg_status == 1) {

                      
        	           $(".antenatelbasicsavebtn").removeClass("btn-danger");
        	           $(".antenatelbasicsavebtn").addClass("btn-primary");
                       $(".antenatelbasicsavebtn").html('Updated');
                       $("#antenantalID").val(result.antenantalID);
                       $("#antenantalmode").val(result.mode);
                            
                  
                    } 
                    else {
                     //   $("#cls_response_msg").text(result.msg_data);
                    }
                    
                    $(".loaderbtn").css('display', 'none');
                    
                    $("#patientbasicsavebtn").css({
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

        
        	  }// mensu med validation

        }   // end master validation

  


        
    });



    /* Onchange form value of patientBasicForm */
     $(document).on('input change','#patientBasicForm',function(){  

     		$("#patientbasicsavebtn").removeClass("btn-primary");
        	$("#patientbasicsavebtn").addClass("btn-danger");
        	$("#patientbasicsavebtn").html('Update');

     });

   
    /* Onchange form value of antinatalBasicRecordForm */
     $(document).on('input change','#antinatalBasicRecordForm',function(){  


     		var antenantalmode = $("#antenantalmode").val();

     		if (antenantalmode=='EDIT') {
     		$(".antenatelbasicsavebtn").removeClass("btn-primary");
        	$(".antenatelbasicsavebtn").addClass("btn-danger");
        	$(".antenatelbasicsavebtn").html('Update');
            }

     });



       // Add MensuMedicine Details
    $(document).on('click','.addMensuMedicine',function(){

          // rowNoUpload++;

          var rowno=  $("#rowno").val();
        console.log(basepath);
        rowno++;
        $.ajax({
            type: "POST",
            url: basepath+'patientcase/addLastMenstrualMedicinedetail',
            dataType: "html",
            data: {rowNo:rowno},
            success: function (result) {
                $("#rowno").val(rowno);
                $("#detail_timeslot table").css("display","block"); 
                $("#detail_timeslot table tbody").append(result);   
                $('select').selectpicker();
              //  $(".demo-masked-input").inputmask();
                var $demoMaskedInput = $('.demo-masked-input');

            //Time

            $('.selecttime').bootstrapMaterialDatePicker
            ({
                date: false,
                shortTime: true,
                format: 'hh:mm a'
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
  
    }); // End Visiting Details


                // Delete Table Row

    $(document).on('click','.delMenMedicine',function(){
        
        var currRowID = $(this).attr('id');
        var rowDtlNo = currRowID.split('_');
       // console.log(rowDtlNo[1]);
        console.log(currRowID);

        //$("tr#rowDocument_"+rowDtlNo[1]+"_"+rowDtlNo[2]).remove();
        $("tr#rowMenMedicine_"+rowDtlNo[1]).remove();
    });


    $('#cigarette_addiction').on('change', function() {

        $('#cigarette_per_day_div').css('display','none');
         if (this.value=='Yes') {
             $('#cigarette_per_day_div').css('display','block');
         }
    });


    $('#lmp_date').on('change', function() {

      // alert(this.value)

      var lmpdate = this.value;
      console.log(lmpdate);

      EddDateCalculation(basepath,lmpdate);
      EddUsgDateCalculation(basepath,lmpdate);


    });


    $('#edd_week,#edd_days').on('input', function() {

    var lmpdate = $("#lmp_date").val();

        if (lmpdate!='') {
             EddUsgDateCalculation(basepath,lmpdate);

        }
     

    });


    // Add previous child Birth Details
    $(document).on('click','.addPreChildDtl',function(){

          // rowNoUpload++;

        var rowno=  $("#childdtlrowno").val();
        console.log(basepath);
        rowno++;
        $.ajax({
            type: "POST",
            url: basepath+'patientcase/addPreviousChildHistoryDetail',
            dataType: "html",
            data: {rowNo:rowno},
            success: function (result) {
                $("#childdtlrowno").val(rowno);
                $("#detail_childHistory table").css("display","block"); 
                $("#detail_childHistory table tbody").append(result);   
                $('select').selectpicker();
              //  $(".demo-masked-input").inputmask();
                var $demoMaskedInput = $('.demo-masked-input');

          
         
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
  
    }); // End Visiting Details


   // Delete Table Row

    $(document).on('click','.delChildBirthHistory',function(){
        
        var currRowID = $(this).attr('id');
        var rowDtlNo = currRowID.split('_');
       // console.log(rowDtlNo[1]);
        console.log(currRowID);

        //$("tr#rowDocument_"+rowDtlNo[1]+"_"+rowDtlNo[2]).remove();
        $("tr#rowChildPreviousBirth_"+rowDtlNo[1]).remove();
    });


// complicationChild values

$(document).on('change','.complicationChild',function(event){
     event.stopImmediatePropagation();

        var currRowID = $(this).attr('id');
        console.log('complicationChild row : '+currRowID);
        var rowDtlNo = currRowID.split('_');

        var complication = [];

        $.each($("#complicationChild_"+rowDtlNo[1] +" option:selected"), function(){            

            complication.push($(this).val());

        });

        console.log(complication);

        console.log(complication.toString());
        $("#complicationChildValues_"+rowDtlNo[1]).val(complication.toString());



    });


// medicle problem values

$(document).on('change','.medicalproblem',function(event){
     event.stopImmediatePropagation();

        var currRowID = $(this).attr('id');
        console.log('currow : '+currRowID);
        var rowDtlNo = currRowID.split('_');
       // console.log(rowDtlNo[1]);
       
       var selectvalue = this.value; 
    //   console.log(selectvalue);

        var medicalproblem = [];

        $.each($("#medicalproblem_"+rowDtlNo[1] +" option:selected"), function(){            

            medicalproblem.push($(this).val());

        });

        console.log(medicalproblem);

        console.log(medicalproblem.toString());
        $("#medicalproblemValues_"+rowDtlNo[1]).val(medicalproblem.toString());



        if(jQuery.inArray("6", medicalproblem) != -1) {
           // console.log("is in array");
            $('#othersproblemerr_'+rowDtlNo[1]).css('display','block'); 
             $("#isOtherProblem_"+rowDtlNo[1]).val('Y');
        } else {
           // console.log("is NOT in array");
            $('#othersproblemerr_'+rowDtlNo[1]).css('display','none');
            $("#isOtherProblem_"+rowDtlNo[1]).val('N');
        } 

       /* select value 6= others */

       // if (selectvalue==6) {
       //    $('#othersproblemerr_'+rowDtlNo[1]).css('display','block');
       // }else{
       //     $('#othersproblemerr_'+rowDtlNo[1]).css('display','none');
       // }

    });


// diseases selected values

$(document).on('change','.sel_diseases',function(event){
     event.stopImmediatePropagation();

        var currRowID = $(this).attr('id');
        console.log('currow : '+currRowID);
        var rowDtlNo = currRowID.split('_');
       // console.log(rowDtlNo[1]);
       
       var selectvalue = this.value; 
    //   console.log(selectvalue);

        var diseasesIDs = [];

        $.each($("#sel_diseases option:selected"), function(){            

            diseasesIDs.push($(this).val());

        });

        console.log(diseasesIDs);

        console.log(diseasesIDs.toString());
        $("#sel_diseasesValues").val(diseasesIDs.toString());


        /* 12 : Other Diseases (diseases_master id) */

        if(jQuery.inArray("12", diseasesIDs) != -1) {
           // console.log("is in array");
             $('#other_diseases_col').css('display','block'); 
             $("#isOtherDiseases").val('Y');
        } else {
           // console.log("is NOT in array");
            $('#other_diseases_col').css('display','none');
            $("#isOtherDiseases").val('N');
        } 

  

    });



}); // end of document ready





function validatPatientBasicInfo()
{
    var selfmobile = $("#selfmobile").val();
    var patientname = $("#patientname").val();
    var patientage = $("#patientage").val();
    var bloodgroup = $("#bloodgroup").val();
  

    $("#caseregmsg").text("").css("dispaly", "none").removeClass("form_error");
    $("#bloodgrpeerr").removeClass("bordererror");

    if(selfmobile=="")
    {
        $("#selfmobile").focus();
        $("#caseregmsg")
        .text("Error : Enter self mobile .")
        .addClass("form_error")
        .css("display", "block");
        return false;
    }


    if(patientname=="")
    {
        $("#patientname").focus();
        $("#caseregmsg")
        .text("Error : Enter patient name .")
        .addClass("form_error")
        .css("display", "block");
        return false;
    }

    if(patientage=="")
    {
        $("#patientage").focus();
        $("#caseregmsg")
        .text("Error : Enter patient age .")
        .addClass("form_error")
        .css("display", "block");
        return false;
    }


    if(bloodgroup=="0")
    {    
        $("#bloodgroup").focus();
        $("#bloodgrpeerr").addClass("bordererror");
        $("#caseregmsg")
        .text("Error : Select blood group .")
        .addClass("form_error")
        .css("display", "block");
        return false;
    }
 
    return true;
}




function validatAntinatalBasicRecord()
{

    var wifebloodgroup = $("#wifebloodgroup").val();
    var wifeoccupation = $("#wifeoccupation").val();
    var cigarette_addiction = $("#cigarette_addiction").val();
    var alcohol_addiction = $("#alcohol_addiction").val();
  

    $("#antenatelmsg").text("").css("dispaly", "none").removeClass("form_error");
    $("#bloodgrpeerr,#wifeoccupationerr").removeClass("bordererror");


    // if(wifebloodgroup=="0")
    // {    
    //     $("#wifebloodgroup").focus();
    //     $("#wifebloodgrpeerr").addClass("bordererror");
    //     $("#antenatelmsg")
    //     .text("Error : Select wife blood group .")
    //     .addClass("form_error")
    //     .css("display", "block");
    //     return false;
    // }

    // if(wifeoccupation=="0")
    // {    
    //     $("#wifeoccupation").focus();
    //     $("#wifeoccupationerr").addClass("bordererror");
    //     $("#antenatelmsg")
    //     .text("Error : Select wife occupation .")
    //     .addClass("form_error")
    //     .css("display", "block");
    //     return false;
    // }

    if(cigarette_addiction=="0")
    {    
        $("#cigarette_addiction").focus();
        $("#cigarette_addictionerr").addClass("bordererror");
        $("#antenatelmsg")
        .text("Error : Select cigarette addiction .")
        .addClass("form_error")
        .css("display", "block");
        return false;
    }

    if(alcohol_addiction=="0")
    {    
        $("#alcohol_addiction").focus();
        $("#alcohol_addictionerr").addClass("bordererror");
        $("#antenatelmsg")
        .text("Error : Select alcohol addiction .")
        .addClass("form_error")
        .css("display", "block");
        return false;
    }
 
 
    return true;
}


$(window).load(function () {
    $('#antenantal_left_tab_menu_4').click();
})



function MensuMeddetailValidation()
{
    var isValid = true;
    $('.mensumedicinecls').each(function() 
    {
        var mensumedicine_id = $(this).attr('id');
        var mensumedicineIDS = mensumedicine_id.split("_");
        var mensumedicineVal = $(this).val();
        console.log(mensumedicine_id);

    if(mensumedicineVal=="")
    {    
        $("#"+mensumedicine_id).focus();
        $("#mensumedicineerr_"+mensumedicineIDS[1]).addClass("bordererror");
        $("#antenatelmsg")
        .text("Error : Enter Medicine Name .")
        .addClass("form_error")
        .css("display", "block");
        return false;
    }


      

    });

    return isValid;
}


function EddDateCalculation(basepath,lmpdate){


        $.ajax({
            type: "POST",
            url: basepath+'patientcase/eddDateCalculation',
            dataType: "html",
            data: {lmpdate:lmpdate},
            success: function (result) {
             
            $("#edd_date").val(result);
         
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


function EddUsgDateCalculation(basepath,lmpdate){

     var edd_week = $('#edd_week').val() || 0;
     var edd_days = $('#edd_days').val() || 0;



        $.ajax({
            type: "POST",
            url: basepath+'patientcase/eddUsgDateCalculation',
            dataType: "html",
            data: {lmpdate:lmpdate,edd_week:edd_week,edd_days:edd_days},
            success: function (result) {
             
            $("#usg_date").val(result);
         
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