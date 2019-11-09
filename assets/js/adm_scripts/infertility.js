$(document).ready(function(){

$("#wizard_horizontal li").removeClass("disabled");
$("#wizard_horizontal li").addClass("done");

$('#wizard_horizontal .actions').hide();

$("#infertilityCasebtn").addClass("bg-teal");

$("#Infnewcasebtn_section").css("display", "block");


$(document).on('click','.infetabtnnonclck',function(){

    var btnid= $(this).attr('id');

    $(".Inftabbtn").removeClass("bg-teal");
    $(".Inftabbtn").addClass("infetabtnnonclck");

    $("#"+btnid).removeClass("infetabtnnonclck");
    $("#"+btnid).addClass("bg-teal");

    $(".Infnewundertreatsec").css("display", "none");

    $("#"+btnid+"_section").css("display", "block");


   
});

$('input[type=radio][name=Inf_patient_type]').change(function() {

             var selected_value = this.value;
           
             $("#Inf_new_patient_div,#Inf_existing_patient_div").css("display", "none");

            if (selected_value=='New') {
                $("#Inf_new_patient_div").css("display", "block");
                $("#Inf_existing_patient_div").css("display", "none");
            }else{
                $("#Inf_existing_patient_div").css("display", "block");
                $("#Inf_new_patient_div").css("display", "none");
            }

    });


});