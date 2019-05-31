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
           // $("#caseregsavebtn").css('display', 'none');
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