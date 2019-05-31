$(document).ready(function(){
    var basepath = $("#basepath").val();


$("#antenantalbtn").addClass("bg-teal");
$("#antenantalbtn_section").css("display", "block");
$("#antenantal_left_tab_menu_1").addClass("bg-light-green");
$("#antenantal_left_tab_menu_1_section").css("display", "block");


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



});