$(document).ready(function(){

var basepath = $("#basepath").val();

$("#wizard_horizontal li").removeClass("disabled");
$("#wizard_horizontal li").addClass("done");

$('#wizard_horizontal .actions').hide();

$("#gynnewcasebtn").addClass("bg-teal");

$("#gynnewcasebtn_section").css("display", "block");




$(document).on('click','.gyntabtnnonclck',function(){

    var btnid= $(this).attr('id');

    $(".gyntabbtn").removeClass("bg-teal");
    $(".gyntabbtn").addClass("gyntabtnnonclck");

    $("#"+btnid).removeClass("gyntabtnnonclck");
    $("#"+btnid).addClass("bg-teal");

    $(".gynnewundertreatsec").css("display", "none");

    $("#"+btnid+"_section").css("display", "block");


   
});

$('input[type=radio][name=gyn_patient_type]').change(function() {

             var selected_value = this.value;
           
             $("#gyn_new_patient_div,#gyn_existing_patient_div").css("display", "none");

            if (selected_value=='New') {
                $("#gyn_new_patient_div").css("display", "block");
                $("#gyn_existing_patient_div").css("display", "none");
            }else{
                $("#gyn_existing_patient_div").css("display", "block");
                $("#gyn_new_patient_div").css("display", "none");
            }

    });

$(document).on('submit','#gynnewcaseForm',function(event)
    { 
        event.preventDefault();
        if(validatgynNewCase())
        {  
               
            var formDataserialize = $("#gynnewcaseForm").serialize();
            formDataserialize = decodeURI(formDataserialize);
            //console.log(formDataserialize);

            var formData = { formDatas: formDataserialize };
           $("#gyncaseregsavebtn").css('display', 'none');
            $("#gyncaseregsavebtn").prop('disabled', true);
            $("#gynloaderbtn").css('display', 'block');
        

            //console.log(formData);
            
    
        $.ajax({
                type: "POST",
                url: basepath+'patientcase/casegenetate_action',
                dataType: "json",
                contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                data: formData,
                
                success: function (result) {
                    //console.log(result);
                    if (result.msg_status == 1) {

                        var caseno = result.case_master_id;
                            
                      window.location.replace(basepath+'gynccology/addEdit/'+caseno);

                    } 
                    else {
                        $("#cls_response_msg").text(result.msg_data);
                    }
                    
                    $("#gynloaderbtn").css('display', 'none');
                    
                    $("#gyncaseregsavebtn").css({
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
/* check if mobile number already register 26-09-2016 by anil */

$(document).on('keyup paste ', '#gynselfmobile', function () {
   
    var selfmobile = $("#gynselfmobile").val();
    var majorgroup = $("#majorgroup").val();
    $("#gyncaseregsavebtn").attr('disabled',false);
    $("#gyncaseregmsg").text("").css("dispaly", "none").removeClass("form_error");
    //alert(selfmobile.length);
    if(selfmobile.length == 10){

    var type = "POST"; 
                var urlpath = basepath + 'patientcase/checkPatientMobile';
                $.ajax({
                    type: type,
                    url: urlpath,
                    data: {selfmobile:selfmobile,majorgroup:majorgroup},
                    dataType: 'json',
                    contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                    success: function(result) {
                        if(result.msg_status==1){
                            $("#gyncaseregmsg")
                            .text("Error : This mobile no already registered.Please go for existing patient.")
                            .addClass("form_error")
                            .css("display", "block");
                            $("#gyncaseregsavebtn").attr('disabled',true);
                        }
                        else{
                           
                        }
                    },
                    error: function(jqXHR, exception) {
                        var msg = '';
                    }
                });


    }

});

  $(document).on('submit','#GynnewcaseExistingPatientForm',function(event)
    {
        event.preventDefault();
        if(gynvalidatNewCaseExistingPatient())
        {   
           

            var formDataserialize = $("#GynnewcaseExistingPatientForm").serialize();
            formDataserialize = decodeURI(formDataserialize);
            console.log(formDataserialize);

            var formData = { formDatas: formDataserialize };
            $("#gynextpcaseregsavebtn").css('display', 'none');
            $("#gynextploaderbtn").css('display', 'block');
        

            //console.log(formData);
            
    
        $.ajax({
                type: "POST",
                url: basepath+'patientcase/existingpatient_casegenetate',
                dataType: "json",
                contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                data: formData,
                
                success: function (result) {
                    
                    if (result.msg_status == 1) {

                        var caseno = result.case_master_id;
                            
                      window.location.replace(basepath+'gynccology/addEdit/'+caseno);

                    } 
                    else {
                        $("#cls_response_msg").text(result.msg_data);
                    }
                    
                    $("#gynextploaderbtn").css('display', 'none');
                    
                    $("#gynextpcaseregsavebtn").css({
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

$(document).on('change','#gyn_existing_patient_sel_caseno',function(){

            var caseid=$(this).val();

            
        if(caseid!='0')
        {  
      
    $.ajax({
    type: "POST",
    dataType: "json",
    contentType: "application/x-www-form-urlencoded; charset=UTF-8",
    url: basepath+'patientcase/existingPatientBasicDetail',
    data: {caseid:caseid},
    
    success: function(result){
           if (result.msg_status == 1) {
                console.log(result.pdata.selfmobile);

                $("#GynnewcaseExistingPatientForm #gyn_extpselfmobile").val(result.pdata.selfmobile).focus();
                $("#GynnewcaseExistingPatientForm #gyn_extpalternate_mobile").val(result.pdata.alternate_mobile).focus();
                $("#GynnewcaseExistingPatientForm #gyn_extppatientname").val(result.pdata.patientname).focus();
                $("#GynnewcaseExistingPatientForm #gyn_extppatientage").val(result.pdata.patientage).focus();
                $("#GynnewcaseExistingPatientForm #previous_case_id").val(caseid).focus();
                $("#GynnewcaseExistingPatientForm #patient_id").val(result.pdata.patient_id).focus();
                $("#GynnewcaseExistingPatientForm #gynextpgender").val(result.pdata.patientgender).trigger("change");
              //  $("#neGynnewcaseExistingPatientFormwcaseExistingPatientForm #extpbloodgroup").val(result.pdata.bloodgroup).trigger("change");
               // $("#newcaseExistingPatientForm #extphusband_bloodgroup").val(result.pdata.husband_bloodgroup).trigger("change");
                $("#GynnewcaseExistingPatientForm #gynextpaddress").val(result.pdata.address).focus();
           }else{
                 $('#GynnewcaseExistingPatientForm')[0].reset();
           }
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



    });/*end ajax call*/

   }else{
       $('#GynnewcaseExistingPatientForm')[0].reset();
   }


});

$(document).on('submit','#gynviewcaseDetailsForm',function(event)

    {
        event.preventDefault();
       // var form =  $('#gynviewcaseDetailsForm');
        var caseno = $("#gyn_sel_caseno").val();
        //alert(caseno);
        if(caseno!='0')
        {   
                 window.location.replace(basepath+'gynccology/addEdit/'+caseno);

  

        }   // end master validation


        
    });
    

});



function validatgynNewCase(){

  var selfmobile = $("#gynselfmobile").val();
    var patientname = $("#gynpatientname").val();
    var patientage = $("#gynpatientage").val();
    // var bloodgroup = $("#bloodgroup").val();
     //alert(selfmobile);

    $("#gyncaseregmsg").text("").css("dispaly", "none").removeClass("form_error");
    $("#bloodgrpeerr").removeClass("bordererror");

    if(selfmobile=="")
    {
        $("#gynselfmobile").focus();
        $("#gyncaseregmsg")
        .text("Error : Enter self mobile .")
        .addClass("form_error")
        .css("display", "block");
        return false;
    }


    if(patientname=="")
    {
        $("#gynpatientname").focus();
        $("#gyncaseregmsg")
        .text("Error : Enter patient name .")
        .addClass("form_error")
        .css("display", "block");
        return false;
    }

    if(patientage=="")
    {
        $("#gynpatientage").focus();
        $("#gyncaseregmsg")
        .text("Error : Enter patient age .")
        .addClass("form_error")
        .css("display", "block");
        return false;
    }


    // if(bloodgroup=="0")
    // {    
    //     $("#bloodgroup").focus();
    //     $("#bloodgrpeerr").addClass("bordererror");
    //     $("#caseregmsg")
    //     .text("Error : Select blood group .")
    //     .addClass("form_error")
    //     .css("display", "block");
    //     return false;
    // }
 
    return true;
}

function gynvalidatNewCaseExistingPatient()
{
    var existing_patient_sel_caseno = $("#gyn_existing_patient_sel_caseno").val();
    var selfmobile = $("#gyn_extpselfmobile").val();
    var patientname = $("#gyn_extppatientname").val();
    var patientage = $("#gyn_extppatientage").val();
    // var bloodgroup = $("#extpbloodgroup").val();
  

    $("#gynextpcaseregmsg").text("").css("dispaly", "none").removeClass("form_error");
    $("#gynextpbloodgrpeerr,#gyn_existing_patienterr").removeClass("bordererror");

  if(existing_patient_sel_caseno=="0")
    {    
        $("#gyn_existing_patient_sel_caseno").focus();
        $("#gyn_existing_patienterr").addClass("bordererror");
        $("#gynextpcaseregmsg")
        .text("Error : Select Mobile or Case No .")
        .addClass("form_error")
        .css("display", "block");
        return false;
    }

    if(selfmobile=="")
    {
        $("#gyn_extpselfmobile").focus();
        $("#gynextpcaseregmsg")
        .text("Error : Enter self mobile .")
        .addClass("form_error")
        .css("display", "block");
        return false;
    }


    if(patientname=="")
    {
        $("#gyn_extppatientname").focus();
        $("#gynextpcaseregmsg")
        .text("Error : Enter patient name .")
        .addClass("form_error")
        .css("display", "block");
        return false;
    }

    if(patientage=="")
    {
        $("#gyn_extppatientage").focus();
        $("#gynextpcaseregmsg")
        .text("Error : Enter patient age .")
        .addClass("form_error")
        .css("display", "block");
        return false;
    }


    // if(bloodgroup=="0")
    // {    
    //     $("#extpbloodgroup").focus();
    //     $("#extpbloodgrpeerr").addClass("bordererror");
    //     $("#extpcaseregmsg")
    //     .text("Error : Select blood group .")
    //     .addClass("form_error")
    //     .css("display", "block");
    //     return false;
    // }
 
    return true;
}