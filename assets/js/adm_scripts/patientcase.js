$(document).ready(function(){
    var basepath = $("#basepath").val();

$("#wizard_horizontal li").removeClass("disabled");
$("#wizard_horizontal li").addClass("done");

$('#wizard_horizontal .actions').hide();

$("#newcasebtn").addClass("bg-teal");
$("#newcasebtn_section").css("display", "block");

$("#newcasebtn").addClass("bg-teal");
 



 $('input[type=radio][name=treat]').change(function() {

		     var selected_value = this.value;
		     $("#case_div").css("display", "none");

			if (selected_value=='Obstetrics') {
				$("#case_div").css("display", "block");
                $("#majorgroup").val(selected_value);
			}else{
				$("#case_div").css("display", "none");
			}

	});


 /* Tab button on click*/

 $(document).on('click','.tabtnnonclck',function(){

 	var btnid= $(this).attr('id');
 	$(".tabbtn").removeClass("bg-teal");
 	$(".tabbtn").addClass("tabtnnonclck");

 	$("#"+btnid).removeClass("tabtnnonclck");
 	$("#"+btnid).addClass("bg-teal");

    $(".newundertreatsec").css("display", "none");

    $("#"+btnid+"_section").css("display", "block");


   
});


 /* on change patient type */


  $('input[type=radio][name=patient_type]').change(function() {

		     var selected_value = this.value;
		     $("#new_patient_div,#existing_patient_div").css("display", "none");

			if (selected_value=='New') {
				$("#new_patient_div").css("display", "block");
				$("#existing_patient_div").css("display", "none");
			}else{
				$("#existing_patient_div").css("display", "block");
				$("#new_patient_div").css("display", "none");
			}

	});


/* new case registration */






    $(document).on('submit','#newcaseForm',function(event)
    {
        event.preventDefault();
        if(validatNewCase())
        {   

            var formDataserialize = $("#newcaseForm").serialize();
            formDataserialize = decodeURI(formDataserialize);
            console.log(formDataserialize);

            var formData = { formDatas: formDataserialize };
            $("#caseregsavebtn").css('display', 'none');
            $("#loaderbtn").css('display', 'block');
        

            //console.log(formData);
            
    
        $.ajax({
                type: "POST",
                url: basepath+'patientcase/casegenetate_action',
                dataType: "json",
                contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                data: formData,
                
                success: function (result) {
                    
                    if (result.msg_status == 1) {

                        var caseno = result.case_master_id;
                            
                      window.location.replace(basepath+'patientcase/addPatientCase/'+caseno);

                    } 
                    else {
                        $("#cls_response_msg").text(result.msg_data);
                    }
                    
                    $("#loaderbtn").css('display', 'none');
                    
                    $("#caseregsavebtn").css({
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






    $(document).on('submit','#viewcaseDetailsForm',function(event)
    {
        event.preventDefault();

        var caseno = $("#sel_caseno").val();
        if(caseno!='0')
        {   
                 window.location.replace(basepath+'patientcase/addPatientCase/'+caseno);

  

        }   // end master validation


        
    });



 $(document).on('change','#existing_patient_sel_caseno',function(){

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

                $("#newcaseExistingPatientForm #extpselfmobile").val(result.pdata.selfmobile).focus();
                $("#newcaseExistingPatientForm #extpalternate_mobile").val(result.pdata.alternate_mobile).focus();
                $("#newcaseExistingPatientForm #extppatientname").val(result.pdata.patientname).focus();
                $("#newcaseExistingPatientForm #extppatientage").val(result.pdata.patientage).focus();
                $("#newcaseExistingPatientForm #previous_case_id").val(caseid).focus();
                $("#newcaseExistingPatientForm #patient_id").val(result.pdata.patient_id).focus();
                $("#newcaseExistingPatientForm #extpgender").val(result.pdata.patientgender).trigger("change");
                $("#newcaseExistingPatientForm #extpbloodgroup").val(result.pdata.bloodgroup).trigger("change");
                $("#newcaseExistingPatientForm #extphusband_bloodgroup").val(result.pdata.husband_bloodgroup).trigger("change");
                $("#newcaseExistingPatientForm #extpaddress").val(result.pdata.address).focus();
           }else{
                 $('#newcaseExistingPatientForm')[0].reset();
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
       $('#newcaseExistingPatientForm')[0].reset();
   }


});


     $(document).on('submit','#newcaseExistingPatientForm',function(event)
    {
        event.preventDefault();
        if(validatNewCaseExistingPatient())
        {   

            var formDataserialize = $("#newcaseExistingPatientForm").serialize();
            formDataserialize = decodeURI(formDataserialize);
            console.log(formDataserialize);

            var formData = { formDatas: formDataserialize };
            $("#extpcaseregsavebtn").css('display', 'none');
            $("#loaderbtn").css('display', 'block');
        

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
                            
                      window.location.replace(basepath+'patientcase/addPatientCase/'+caseno);

                    } 
                    else {
                        $("#cls_response_msg").text(result.msg_data);
                    }
                    
                    $("#loaderbtn").css('display', 'none');
                    
                    $("#extpcaseregsavebtn").css({
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


 }); // end of document ready




function validatNewCase()
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


function validatNewCaseExistingPatient()
{
    var existing_patient_sel_caseno = $("#existing_patient_sel_caseno").val();
    var selfmobile = $("#extpselfmobile").val();
    var patientname = $("#extppatientname").val();
    var patientage = $("#extppatientage").val();
    var bloodgroup = $("#extpbloodgroup").val();
  

    $("#extpcaseregmsg").text("").css("dispaly", "none").removeClass("form_error");
    $("#extpbloodgrpeerr,#existing_patienterr").removeClass("bordererror");

  if(existing_patient_sel_caseno=="0")
    {    
        $("#existing_patient_sel_caseno").focus();
        $("#existing_patienterr").addClass("bordererror");
        $("#extpcaseregmsg")
        .text("Error : Select Mobile or Case No .")
        .addClass("form_error")
        .css("display", "block");
        return false;
    }

    if(selfmobile=="")
    {
        $("#extpselfmobile").focus();
        $("#extpcaseregmsg")
        .text("Error : Enter self mobile .")
        .addClass("form_error")
        .css("display", "block");
        return false;
    }


    if(patientname=="")
    {
        $("#extppatientname").focus();
        $("#extpcaseregmsg")
        .text("Error : Enter patient name .")
        .addClass("form_error")
        .css("display", "block");
        return false;
    }

    if(patientage=="")
    {
        $("#extppatientage").focus();
        $("#extpcaseregmsg")
        .text("Error : Enter patient age .")
        .addClass("form_error")
        .css("display", "block");
        return false;
    }


    if(bloodgroup=="0")
    {    
        $("#extpbloodgroup").focus();
        $("#extpbloodgrpeerr").addClass("bordererror");
        $("#extpcaseregmsg")
        .text("Error : Select blood group .")
        .addClass("form_error")
        .css("display", "block");
        return false;
    }
 
    return true;
}