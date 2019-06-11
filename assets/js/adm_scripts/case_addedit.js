$(document).ready(function(){
    var basepath = $("#basepath").val();
    var rowNoUpload = 0;


$("#antenantalbtn").addClass("bg-teal");
$("#antenantalbtn_section").css("display", "block");
$("#antenantal_left_tab_menu_1").addClass("bg-light-green");
$("#antenantal_left_tab_menu_1_section").css("display", "block");

 // $('#investallTable').DataTable(
 //    {
 //        "bPaginate": false,
 //        "bFilter": false,
 //        "bInfo": false
 //                 } );



  var oTable = $('#investallTable').DataTable({
                                                    "bPaginate": false,
                                                    "bFilter": false,
                                                    "bInfo": false
                                                             } );

      $("#investallTable tbody tr td:nth-child(1)").attr("class", "details-control");

        $('#investallTable').on('click', 'td.details-control', function() {
        var tr = $(this).closest('tr');
        var row = oTable.row(tr);
        var rowdata = (oTable.row(tr).data());

        /* if (row.child.isShown()) {
             tr.removeClass('details');
             row.child.hide();

         }*/
        if (row.child.isShown()) {
            // This row is already open - close it
            $('div.slider', row.child()).slideUp(function() {
                tr.removeClass('details');
                row.child.hide();
            });
        } else {
            console.log(oTable.row(tr).data());
            tr.addClass('details');
            row.child(format(row.child, rowdata, basepath)).show();

            $('div.slider', row.child()).slideDown();
        }
    });

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
            $(".antenatelbasicsavebtn").css('display', 'none');
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


       // Add regular medicine Details
    $(document).on('click','.addRegularMedicines',function(){

          // rowNoUpload++;

          var rowno=  $("#rowno").val();
        console.log(basepath);
        rowno++;
        $.ajax({
            type: "POST",
            url: basepath+'patientcase/addRegularMedicinesDetail',
            dataType: "html",
            data: {rowNo:rowno},
            success: function (result) {
                $("#rowno").val(rowno);
                $("#detail_regularmedicine table").css("display","block"); 
                $("#detail_regularmedicine table tbody").append(result);   
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

    $(document).on('click','.delRegularMedicine',function(){
        
        var currRowID = $(this).attr('id');
        var rowDtlNo = currRowID.split('_');
       // console.log(rowDtlNo[1]);
        console.log(currRowID);

        //$("tr#rowDocument_"+rowDtlNo[1]+"_"+rowDtlNo[2]).remove();
        $("tr#rowRegularMedicine_"+rowDtlNo[1]).remove();
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


// high risk values

$(document).on('change','.highrisk',function(event){
     event.stopImmediatePropagation();

        var currRowID = $(this).attr('id');
        console.log('currow : '+currRowID);
        var rowDtlNo = currRowID.split('_');
       // console.log(rowDtlNo[1]);
       
       var selectvalue = this.value; 
    //   console.log(selectvalue);

        var highrisk = [];

        $.each($("#highrisk option:selected"), function(){            

            highrisk.push($(this).val());

        });

        console.log('highrisk'+highrisk);

        console.log(highrisk.toString());
        $("#highriskValues").val(highrisk.toString());


         /* 5 : high risk others */
        if(jQuery.inArray("5", highrisk) != -1) {
        
            $('#othersriskerr').css('display','block'); 
             $("#isOtherHighrisk").val('Y');
        } else {
           // console.log("is NOT in array");
            $('#othersriskerr').css('display','none');
            $("#isOtherHighrisk").val('N');
        } 

       /* select value 6= others */

       // if (selectvalue==6) {
       //    $('#othersproblemerr_'+rowDtlNo[1]).css('display','block');
       // }else{
       //     $('#othersproblemerr_'+rowDtlNo[1]).css('display','none');
       // }

    });


// family component father

$(document).on('change','.fmlycmpfather',function(event){
     event.stopImmediatePropagation();
        
        var currRowID = $(this).attr('id');
       // console.log('currow : '+currRowID);
        var rowDtlNo = currRowID.split('_');

        //console.log(rowDtlNo);
      if($(this).prop('checked')) {
           // alert("Checked Box Selected");
           //alert("#ischeckfatherhist_"+rowDtlNo);
           $("#ischeckfatherhist_"+rowDtlNo[2]).val('Y');
        } else {
           // alert("Checked Box deselect");
            $("#ischeckfatherhist_"+rowDtlNo[2]).val('N');
        }


});

// family component mother

$(document).on('change','.fmlycmpmother',function(event){
     event.stopImmediatePropagation();
        
        var currRowID = $(this).attr('id');
       // console.log('currow : '+currRowID);
        var rowDtlNo = currRowID.split('_');

        //console.log(rowDtlNo);
      if($(this).prop('checked')) {
           // alert("Checked Box Selected");
           //alert("#ischeckfatherhist_"+rowDtlNo);
           $("#ischeckmotherhist_"+rowDtlNo[2]).val('Y');
        } else {
           // alert("Checked Box deselect");
            $("#ischeckmotherhist_"+rowDtlNo[2]).val('N');
        }


});


// on change examination select

$(document).on('change','.selexam',function(event){

 $("#ischangeExamination").val('Y');
});

$(document).on('input','.inpexam',function(event){

 $("#ischangeExamination").val('Y');
});


// on change investigation select

$(document).on('input','.inpinve',function(event){

 $("#ischangeInvestigation").val('Y');
});

$(document).on('change','.selinve',function(event){

 $("#ischangeInvestigation").val('Y');
});

 

 $(document).on('click','#resetinvestigation',function(event){

$('.inpinve,.selinve').val('');

});


$(document).on('click','#examallshowbtn',function(event){

 //$("#examdataall").show();
 $("#examdataall").toggle('slow');
});


$(document).on('click','#investallshowbtn',function(event){

 //$("#examdataall").show();
 $("#investdataall").toggle('slow');
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

    // if(cigarette_addiction=="0")
    // {    
    //     $("#cigarette_addiction").focus();
    //     $("#cigarette_addictionerr").addClass("bordererror");
    //     $("#antenatelmsg")
    //     .text("Error : Select cigarette addiction .")
    //     .addClass("form_error")
    //     .css("display", "block");
    //     return false;
    // }

    // if(alcohol_addiction=="0")
    // {    
    //     $("#alcohol_addiction").focus();
    //     $("#alcohol_addictionerr").addClass("bordererror");
    //     $("#antenatelmsg")
    //     .text("Error : Select alcohol addiction .")
    //     .addClass("form_error")
    //     .css("display", "block");
    //     return false;
    // }
 
 
    return true;
}


$(window).load(function () {
    $('#antenantal_left_tab_menu_6').click();
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


/* data table details rows investigation_record_master */

function format(callback, id, basepath) {
    var inv_record_id = id[1];
    $.ajax({
        url: basepath + 'patientcase/getInvestigationDetailRow',
        data: { inv_record_id: inv_record_id },
        dataType: "json",
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        complete: function(response) {
            var data = JSON.parse(response.responseText);

            console.log(data);

            // console.log(response);
            var thead = '<tr class="expandrowDetails"><th style="width:10%;">Test</th><th style="width:10%;">Test Result</th><th style="width:10%;">Test Date</th></tr>';
            tbody = '';

            $.each(data, function(i, datas) {

               

                tbody += '<tr>';
                tbody += '<td>Hb</td>';
                tbody += '<td>'+datas.hb_result+'</td>';
                tbody += '<td>'+dateFormat(datas.hb_date)+'</td>';
                tbody += '</tr>';

                tbody += '<tr>';
                tbody += '<td>TC</td>';
                tbody += '<td>'+datas.tc_result+'</td>';
                tbody += '<td>'+dateFormat(datas.tc_date)+'</td>';
                tbody += '</tr>';

                tbody += '<tr>';
                tbody += '<td>DC</td>';
                tbody += '<td>'+datas.dc_result+'</td>';
                tbody += '<td>'+dateFormat(datas.dc_date)+'</td>';
                tbody += '</tr>';

                tbody += '<tr>';
                tbody += '<td>FBS</td>';
                tbody += '<td>'+datas.fbs_result+'</td>';
                tbody += '<td>'+dateFormat(datas.fbs_date)+'</td>';
                tbody += '</tr>';

                tbody += '<tr>';
                tbody += '<td>PPBS</td>';
                tbody += '<td>'+datas.ppbs_result+'</td>';
                tbody += '<td>'+dateFormat(datas.ppbs_date)+'</td>';
                tbody += '</tr>';

                tbody += '<tr>';
                tbody += '<td>VDRL</td>';
                tbody += '<td>'+datas.vdrl_result+'</td>';
                tbody += '<td>'+dateFormat(datas.vdrl_date)+'</td>';
                tbody += '</tr>';


            });

            callback($('<div class="slider"><table class="table table-striped rowexpandTable" >' + thead + tbody + '</table></div>')).show();
        },
        error: function() {
            console.log("Error Found");
        }
    });
}


function dateFormat(date){

    if (date=='null') {

    var dateval = date.slice(0, 10);
    console.log(dateval);
     var dateDtl = dateval.split('-');
      console.log(dateDtl);

      var newDt=dateDtl[2]+'-'+dateDtl[1]+'-'+dateDtl[0];
      return newDt;

    }else{
        return '';
    }

}
