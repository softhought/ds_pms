$(document).ready(function(){


    var groupColumn = 2;
    var table = $('#examplegroup').DataTable({
        "columnDefs": [
            { "visible": false, "targets": groupColumn }
        ],
        "order": [[ groupColumn, 'asc' ]],
        paging: false,
        bFilter: false,
        ordering: false,
        searching: false,
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
 
            api.column(groupColumn, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="group"><td colspan="5">'+group+'</td></tr>'
                    );
 
                    last = group;
                }
            } );
        }
    } );
 
    // Order by the grouping
    $('#example tbody').on( 'click', 'tr.group', function () {
        var currentOrder = table.order()[0];
        if ( currentOrder[0] === groupColumn && currentOrder[1] === 'asc' ) {
            table.order( [ groupColumn, 'desc' ] ).draw();
        }
        else {
            table.order( [ groupColumn, 'asc' ] ).draw();
        }
    } );
    var basepath = $("#basepath").val();
    var rowNoUpload = 0;

    $("#sel_diseases").selectpicker({
                    noneSelectedText : '&nbsp;' // by this default 'Nothing selected'
                });


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


    var oTablePres = $('#pressallTable').DataTable({
                                                    "bPaginate": false,
                                                    "bFilter": false,
                                                    "bInfo": false
                                                             } );

      $("#pressallTable tbody tr td:nth-child(1)").attr("class", "details-control");

         $('#pressallTable').on('click', 'td.details-control', function() {
        var tr = $(this).closest('tr');
        var row = oTablePres.row(tr);
        var rowdata = (oTablePres.row(tr).data());

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
            console.log(oTablePres.row(tr).data());
            tr.addClass('details');
            row.child(formatPrescription(row.child, rowdata, basepath)).show();

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
                       $("#ischangePrescription").val('N');
                       $("#ischangeExamination").val('N');
                       $("#ischangeInvestigation").val('N');

                            
                  
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


    /**/

       /* save and update Prescription information and print details */


    $(document).on('click','#savebtn_prescription',function(event)
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
        

            console.log('-----------');
            
    
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
                       $("#ischangePrescription").val('N');
                       $("#ischangeExamination").val('N');
                       $("#ischangeInvestigation").val('N');

                         var caseID = $("#caseID").val();
                         console.log('Pres caseID : '+caseID);
                 
                     window.open(basepath+'patientcase/print_prescription/'+caseID,'_blank');
                            
                  
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
          $("#selmens_medicineerr").removeClass("bordererror");

          var rowno=  $("#rowno").val();
          var selmens_medicine=  $("#selmens_medicine").val();
          var selmens_medicine_duration=  $("#selmens_medicine_duration").val();
        console.log(basepath);
        if (selmens_medicine!='0') {
        rowno++;
        $.ajax({
            type: "POST",
            url: basepath+'patientcase/addLastMenstrualMedicinedetail',
            dataType: "html",
            data: {rowNo:rowno,selmens_medicine:selmens_medicine,selmens_medicine_duration:selmens_medicine_duration},
            success: function (result) {
                $("#rowno").val(rowno);
                $("#detail_timeslot table").css("display","block"); 
                $("#detail_timeslot table tbody").append(result);   
                $('select').selectpicker();
              //  $(".demo-masked-input").inputmask();
                var $demoMaskedInput = $('.demo-masked-input');

                $('#selmens_medicine_duration').val('');
                $('#selmens_medicine').val(0).change();

            
         
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

        }else{
            $("#selmens_medicine").focus();
            $("#selmens_medicineerr").addClass("bordererror");
           
        }
  
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
          var medicine =  $("#selregular_medicine").val();
          var dose =  $("#selregular_dose").val();
          var year =  $("#selregularmed_year").val();
          var month =  $("#selregularmed_month").val();

        console.log(basepath);
        if(medicine!='0'){
        rowno++;
        $.ajax({
            type: "POST",
            url: basepath+'patientcase/addRegularMedicinesDetail',
            dataType: "html",
            data: {rowNo:rowno,medicine:medicine,dose:dose,year:year,month:month},
            success: function (result) {
                $("#rowno").val(rowno);
                $("#detail_regularmedicine table").css("display","block"); 
                $("#detail_regularmedicine table tbody").append(result);   
                $('select').selectpicker();
              //  $(".demo-masked-input").inputmask();
                var $demoMaskedInput = $('.demo-masked-input');

                $('#selregular_dose').val('');
                $('#selregularmed_year').val('');
                $('#selregularmed_month').val('');
                $('#selregular_medicine').val(0).change();

           
         
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

        }else{
           
            $("#selregular_medicine").focus();
            $("#regular_medicineerr").addClass("bordererror");
           
        }
  
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




    /*Add clinical examination Details */

           
           $(document).on('click','.addClicinalExam',function(){

            // rowNoUpload++;
  
            var rowno=  $("#cliexmrowno").val();
          console.log(basepath);
          rowno++;
          $.ajax({
              type: "POST",
              url: basepath+'patientcase/addClinicalExaminationdetail',
              dataType: "html",
              data: {rowNo:rowno},
              success: function (result) {
                  $("#cliexmrowno").val(rowno);
                  $("#detail_clinical_exam table").css("display","block"); 
                  $("#detail_clinical_exam table tbody").append(result);   
                  $('select').selectpicker();
                  $('.datepicker2').bootstrapMaterialDatePicker({
                    format: 'DD-MM-YYYY',
                    clearButton: true,
                    weekStart: 1,
                    time: false
                });
  
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


      $(document).on('click','.delClinicalExam',function(){
        
        var currRowID = $(this).attr('id');
        var rowDtlNo = currRowID.split('_');
       // console.log(rowDtlNo[1]);
        console.log(currRowID);

        //$("tr#rowDocument_"+rowDtlNo[1]+"_"+rowDtlNo[2]).remove();
        $("tr#rowClinicalExam_"+rowDtlNo[1]).remove();
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
     


    });

    /* added on 02.07.2019 */
    
    $('#seleddbyusg_date').on('change', function() {

        // alert(this.value)
  
        var seleddbyusg_date = this.value;
        console.log(seleddbyusg_date);
  
      
        EddUsgDateCalculation(basepath,seleddbyusg_date);
  
  
      });


    $('#edd_week,#edd_days').on('input', function() {

   // var lmpdate = $("#lmp_date").val();
    var seleddbyusg_date = $("#seleddbyusg_date").val();

        if (seleddbyusg_date!='') {
             EddUsgDateCalculation(basepath,seleddbyusg_date);

        }
     

    });



    /* ------------------- start clinical examination calculation ---------------*/

  $(document).on('change','.cliexmDate',function(){


        var cliexmDate = this.value;
        console.log(cliexmDate);

        var currRowID = $(this).attr('id');
        var rowDtlNo = currRowID.split('_');
      //  console.log('cliexmId '+rowDtlNo[2]);

        // 
        WeekDaysCalculationByLmp(basepath,cliexmDate,rowDtlNo[2]);

        WeekDaysCalculationByUsg(basepath,cliexmDate,rowDtlNo[2]);


  
      });



    /* ------------------- end clinical examination calculation ---------------*/


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
               // $('select').selectpicker();

                $("select").selectpicker({
                    noneSelectedText : '&nbsp;' // by this default 'Nothing selected'
                });
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
     event.preventDefault();

 $("#ischangeExamination").val('Y');
});

$(document).on('input','.inpexam',function(event){
     event.preventDefault();

 $("#ischangeExamination").val('Y');
});


// on change investigation select

$(document).on('input','.inpinve',function(event){

 $("#ischangeInvestigation").val('Y');
});

$(document).on('change','.selinve',function(event){

 $("#ischangeInvestigation").val('Y');
});


$(document).on('keyup paste change','.selpres',function(event){

 $("#ischangePrescription").val('Y');
});



 

 $(document).on('click','#resetinvestigation',function(event){

$('.inpinve,.selinve').val('');

});


$(document).on('click','#examallshowbtn',function(event){
 $("#examdataall").toggle('slow');
 $('#spanexamallshow').text( $('#spanexamallshow').text() == 'Hide All Record' ? 'Show All Record' : 'Hide All Record' );
});


$(document).on('click','#investallshowbtn',function(event){

 //$("#examdataall").show();
 $("#investdataall").toggle('slow');
 $('#spaninvestallshow').text( $('#spaninvestallshow').text() == 'Hide All Record' ? 'Show All Record' : 'Hide All Record' );

});


$(document).on('click','#prescallshowbtn',function(event){

 //$("#examdataall").show();
 $("#presdataall").toggle('slow');
 $('#spanprescriptionallshow').text( $('#spaninvestallshow').text() == 'Hide All Record' ? 'Show All Record' : 'Hide All Record' );

});




$(document).on('change','.noanomalyckbx',function(event){
     event.stopImmediatePropagation();

      if($(this).prop('checked')) {
         
           $("#is_no_anomaly_seen").val('Y');
          
        } else {
        
            $("#is_no_anomaly_seen").val('N');
            
        }


});


$(document).on('change','.otheranomalyckbx',function(event){
     event.stopImmediatePropagation();

      if($(this).prop('checked')) {
           $("#other_annomaly_div").show();
           $("#is_other_anomaly").val('Y');

        } else {
            $("#other_annomaly_div").hide();
            $("#is_other_anomaly").val('N');
        }


});

/* add prescription medicine*/

 
    $(document).on('click','#addPresMedicine',function(event){

        event.stopImmediatePropagation();

          // rowNoUpload++;

          var rowno=  $("#presmedrow").val();
          var medicine=  $("#prescription_medicine").val();
          var dosage=  $("#pres_medicine_dosage").val();
          var frequency=  $("#pres_medicine_frequency").val();
          var days=  $("#pres_medicine_days").val();
          var medinstruction=  $("#medinstruction").val();
         console.log('medicine:'+medicine);
           $("#prescription_medicineerr").removeClass("bordererror");

          if (medicine!='0') {
        console.log(rowno);
        rowno++;
        $.ajax({
            type: "POST",
            url: basepath+'patientcase/addPrescriptionMedicineDetails',
            dataType: "html",
            data: {rowNo:rowno,medicine:medicine,dosage:dosage,frequency:frequency,days:days,medinstruction:medinstruction},
            success: function (result) {
                $("#presmedrow").val(rowno);
                $("#detail_presmed table").css("display","block"); 
                $("#detail_presmed table tbody").append(result);   
                $('select').selectpicker();
              //  $(".demo-masked-input").inputmask();
                var $demoMaskedInput = $('.demo-masked-input');
               
                $('#pres_medicine_days').val('');
                $('#medinstruction').val('');
                $('#prescription_medicine').val(0).change();
                $('#pres_medicine_dosage').val(0).change();
                $('#pres_medicine_frequency').val(0).change();
                $("#prescription_medicine").prop("checked", false);

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

    }else{      

            $("#prescription_medicine").focus();
            $("#prescription_medicineerr").addClass("bordererror");
          

    }
  
    }); // End Visiting Details


 // Delete Table Row of prescription medicine

    $(document).on('click','.delPresMed',function(){
        
        var currRowID = $(this).attr('id');
        var rowDtlNo = currRowID.split('_');
       // console.log(rowDtlNo[1]);
        console.log(currRowID);
        $("#ischangePrescription").val('Y');
        //$("tr#rowDocument_"+rowDtlNo[1]+"_"+rowDtlNo[2]).remove();
        $("tr#rowPrescriptionMedicine_"+rowDtlNo[1]).remove();
    });


/* add prescription medicine*/

 
    $(document).on('click','#addPresTest',function(){

          // rowNoUpload++;

          var rowno=  $("#presTestrow").val();
          var investigation=  $("#prescription_investigation").val();
        

           $("#prescription_investigationerr").removeClass("bordererror");

          if (investigation!='0') {
        console.log(rowno);
        rowno++;
        $.ajax({
            type: "POST",
            url: basepath+'patientcase/addPrescriptionTestDetails',
            dataType: "html",
            data: {rowNo:rowno,investigation:investigation},
            success: function (result) {
                $("#presTestrow").val(rowno);
                $("#detail_presTest table").css("display","block"); 
                $("#detail_presTest table tbody").append(result);   
                $('select').selectpicker();
              //  $(".demo-masked-input").inputmask();
                var $demoMaskedInput = $('.demo-masked-input');

            $('#prescription_investigation').val(0).change();
         
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

    }else{      

            $("#prescription_investigation").focus();
            $("#prescription_investigationerr").addClass("bordererror");
          

    }
  
    }); // End Visiting Details


     // Delete Table Row of Investigation

    $(document).on('click','.delPresInvestigation',function(){
        
        var currRowID = $(this).attr('id');
        var rowDtlNo = currRowID.split('_');
       // console.log(rowDtlNo[1]);
        console.log(currRowID);
        $("#ischangePrescription").val('Y');
        //$("tr#rowDocument_"+rowDtlNo[1]+"_"+rowDtlNo[2]).remove();
        $("tr#rowPrescriptionInvestigation_"+rowDtlNo[1]).remove();
    })



    /*  Print Prescription */

     $(document).on('click','.prescriptionprint',function(){
        
     var caseID = $("#caseID").val();
     console.log('caseID : '+caseID);

       window.location.replace(basepath+'patientcase/print_prescription/'+caseID,'_blank');
    });


    $(document).on('click','.newMedAdd',function(){
        
        var callfrom = $(this).data("callfrom");

        $("#medicinemodelcallfrom").val(callfrom);
      
    
    });





    /*----------------------- add new medicine to master ------------------- */

    
    $(document).on('submit','#medicineForm',function(event)
    {
        event.preventDefault();
        if(validatemedicine())
        {   

            var formDataserialize = $("#medicineForm").serialize();
            formDataserialize = decodeURI(formDataserialize);
            console.log(formDataserialize);

            var medicinemodelcallfrom = $("#medicinemodelcallfrom").val();

            var formData = { formDatas: formDataserialize };
            $(".medicinesavebtn").css('display', 'none');
            $(".loademedicinesavebtnn").css('display', 'block');
        

            console.log(medicinemodelcallfrom);
            
    
        $.ajax({
                type: "POST",
                url: basepath+'medicine/medicine_action',
                dataType: "json",
                contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                data: formData,
                
                success: function (result) {
                    
                    if (result.msg_status == 1) {
   
                        resetPrescriptionMedDropdown(basepath);
                        resetMensuMedDropdown(basepath);
                        resetRegularMedDropdown(basepath);
                    } 
                    else {
                       
                    }
                    
                    $(".medicinesavebtn").css('display', 'none');
                    $(".loademedicinesavebtnn").css('display', 'none');
                    $('#prescription_newmedmodel').modal('hide');
                  
                  
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


    $(document).on('change','.selectYear',function(event){
        event.stopImmediatePropagation();
        console.log("gfhgh");
        var selectYearId = $(this).attr('id');
        var rowDtlNo = selectYearId.split('_');

       
        console.log(rowDtlNo[1]);
        var selectYear = $(this).val();
        console.log(selectYear);

       var currentYear= new Date().getFullYear();
       if(selectYear!=''){
        var age = parseInt(currentYear)-parseInt(selectYear);
        $("#babyage_"+rowDtlNo[1]).val(age);
       }else{
        $("#babyage_"+rowDtlNo[1]).val(''); 
       }
      


    });



    $(document).on('change','.obsthist',function(){
     //  console.log('Obstetrics History');

     var A = parseInt($("#termdelivery").val() || 0);
     var B = parseInt($("#paritypreterm").val() || 0);
     var C = parseInt($("#parityabortion").val() || 0);

     var gravida =(A+B+C+1);

     $("#gravida_parity").val(gravida);
     $("#gravida_parity").focus();
     console.log(gravida);
 
    });

    // load fresh master advice data
    $(document).on('click','#resetAdvice',function(event){

       console.log("Reset Advice");
       var callfrom="Reset Advice";
       $(".advice_area").html("");

       $.ajax({
        type: "POST",
        url: basepath+'patientcase/resetAdviceData',
        dataType: "html",
        data: {callfrom:callfrom},
        success: function (result) {
            
           
            
            $(".advice_area").html(result);
            $("input.advoptiontag").tagsinput('items');
            $('.form-line').addClass('focused');
            $("textarea").css({'overflow':'hidden'});
     
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

  $(document).on('change','#medicine_category',function(event){
        event.preventDefault();
   
        var medicine_category = $(this).val();

        var callfrom='prescriptionmedicine';

        $.ajax({
            type: "POST",
            url: basepath+'patientcase/resetPresMedicineDropdownByCategory',
            dataType: "html",
            data: {callfrom:callfrom,medicine_category:medicine_category},
            success: function (result) {
                
                $("#prescription_medicinedrp").html(result);
               
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



   });


   $(document).on('change','#prescription_medicine',function(event){
    event.preventDefault();

    var prescription_medicine = $(this).val();

    var callfrom='medicineInstruction';
    $("#medinstruction").val("");

    $.ajax({
        type: "POST",
        url: basepath+'patientcase/getMedicineInstruction',
        dataType: "html",
        data: {callfrom:callfrom,prescription_medicine:prescription_medicine},
        success: function (result) {
            
            $("#medinstruction").val(result);
           
            
     
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
    $('#antenantal_left_tab_menu_1').click();
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


function EddUsgDateCalculation(basepath,seleddbyusg_date){

     var edd_week = $('#edd_week').val() || 0;
     var edd_days = $('#edd_days').val() || 0;



        $.ajax({
            type: "POST",
            url: basepath+'patientcase/eddUsgDateCalculation',
            dataType: "html",
            data: {seleddbyusg_date:seleddbyusg_date,edd_week:edd_week,edd_days:edd_days},
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
            var thead = '<tr class="expandrowDetails"><th style="width:10%;">Test</th><th style="width:10%;">Test Result</th><th style="width:5%;">Test Date</th></tr>';
            tbody = '';

            $.each(data, function(i, datas) {

               

                tbody += '<tr>';
                tbody += '<td>Hb</td>';
                tbody += '<td>'+CheckNull(datas.hb_result)+'</td>';
                tbody += '<td>'+dateFormat(datas.hb_date)+'</td>';
                tbody += '</tr>';

                tbody += '<tr>';
                tbody += '<td>TC</td>';
                tbody += '<td>'+CheckNull(datas.tc_result)+'</td>';
                tbody += '<td>'+dateFormat(datas.tc_date)+'</td>';
                tbody += '</tr>';

                tbody += '<tr>';
                tbody += '<td>DC</td>';
                tbody += '<td>'+CheckNull(datas.dc_result)+'</td>';
                tbody += '<td>'+dateFormat(datas.dc_date)+'</td>';
                tbody += '</tr>';

                tbody += '<tr>';
                tbody += '<td>FBS</td>';
                tbody += '<td>'+CheckNull(datas.fbs_result)+'</td>';
                tbody += '<td>'+dateFormat(datas.fbs_date)+'</td>';
                tbody += '</tr>';

                tbody += '<tr>';
                tbody += '<td>PPBS</td>';
                tbody += '<td>'+CheckNull(datas.ppbs_result)+'</td>';
                tbody += '<td>'+dateFormat(datas.ppbs_date)+'</td>';
                tbody += '</tr>';

                tbody += '<tr>';
                tbody += '<td>VDRL</td>';
                tbody += '<td>'+CheckNull(datas.vdrl_result)+'</td>';
                tbody += '<td>'+dateFormat(datas.vdrl_date)+'</td>';
                tbody += '</tr>';

                tbody += '<tr>';
                tbody += '<td>HIV 1</td>';
                tbody += '<td>'+CheckNull(datas.hiv_one_result)+'</td>';
                tbody += '<td>'+dateFormat(datas.hiv_one_date)+'</td>';
                tbody += '</tr>';

                tbody += '<tr>';
                tbody += '<td>HIV 2</td>';
                tbody += '<td>'+CheckNull(datas.hiv_two_result)+'</td>';
                tbody += '<td>'+dateFormat(datas.hiv_two_date)+'</td>';
                tbody += '</tr>';

                tbody += '<tr>';
                tbody += '<td>Hbs Ag</td>';
                tbody += '<td>'+CheckNull(datas.hbsag_result)+'</td>';
                tbody += '<td>'+dateFormat(datas.hbsag_date)+'</td>';
                tbody += '</tr>';

                tbody += '<tr>';
                tbody += '<td>Anti HCV</td>';
                tbody += '<td>'+CheckNull(datas.antihcv_result)+'</td>';
                tbody += '<td>'+dateFormat(datas.antihcv_date)+'</td>';
                tbody += '</tr>';

                tbody += '<tr>';
                tbody += '<td>Urine R/E</td>';
                tbody += '<td>'+CheckNull(datas.urine_re_result)+'</td>';
                tbody += '<td>'+dateFormat(datas.urine_re_date)+'</td>';
                tbody += '</tr>';

                tbody += '<tr>';
                tbody += '<td>Urine C/S</td>';
                tbody += '<td>'+CheckNull(datas.cs_sensitive_to_result)+'</td>';
                tbody += '<td>'+dateFormat(datas.cs_sensitive_date)+'</td>';
                tbody += '</tr>';

                tbody += '<tr>';
                tbody += '<td>STSH</td>';
                tbody += '<td>'+CheckNull(datas.stsh_result)+'</td>';
                tbody += '<td>'+dateFormat(datas.stsh_date)+'</td>';
                tbody += '</tr>';

                tbody += '<tr>';
                tbody += '<td>S urea</td>';
                tbody += '<td>'+CheckNull(datas.s_urea_result)+'</td>';
                tbody += '<td>'+dateFormat(datas.s_urea_date)+'</td>';
                tbody += '</tr>';

                tbody += '<tr>';
                tbody += '<td>S creatinine</td>';
                tbody += '<td>'+CheckNull(datas.s_creatinine_result)+'</td>';
                tbody += '<td>'+dateFormat(datas.s_creatinine_date)+'</td>';
                tbody += '</tr>';

                tbody += '<tr>';
                tbody += '<td>Combined Test</td>';
                tbody += '<td>'+CheckNull(datas.combined_test_result)+'</td>';
                tbody += '<td>'+dateFormat(datas.combined_test_date)+'</td>';
                tbody += '</tr>';

                tbody += '<tr>';
                tbody += '<td>Thalassemia</td>';
                tbody += '<td>'+CheckNull(datas.thalassemia_result)+'</td>';
                tbody += '<td>'+dateFormat(datas.thalassemia_date)+'</td>';
                tbody += '</tr>';

                tbody += '<tr>';
                tbody += '<td>USG dating scan</td>';
                tbody += '<td>SLF of '+CheckNull(datas.usg_slf_week)+' week '+CheckNull(datas.usg_slf_day)+' day'+'</td>';
                tbody += '<td>'+dateFormat(datas.usg_scan_date)+'</td>';
                tbody += '</tr>';

                tbody += '<tr>';
                tbody += '<td>NT scan + Double marker</td>';
                tbody += '<td> Low risk for <b>'+CheckNull(datas.nt_scan_lowerrisk)+'</b><br> High risk for <b>'+CheckNull(datas.nt_scan_highrisk)+'</b></td>';
                tbody += '<td>'+dateFormat(datas.nt_scan_date)+'</td>';
                tbody += '</tr>';

                tbody += '<tr>';
                tbody += '<td>Anomaly scan</td>';
                tbody += '<td>SLF of '+CheckNull(datas.anomaly_slf_week)+' week '+CheckNull(datas.anomaly_slf_day)+' day'+'</td>';
                tbody += '<td>'+dateFormat(datas.anomaly_scan_date)+'</td>';
                tbody += '</tr>';

                tbody += '<tr>';
                tbody += '<td>Growth scan</td>';
                tbody += '<td>SLF of '+CheckNull(datas.growth_slf_week)+' week '+CheckNull(datas.growth_slf_day)+' day <br>Presentation:'+CheckNull(datas.growth_presentation)+'<br>AFI:'+CheckNull(datas.growth_afi)+'<br>Liquor:'+CheckNull(datas.growth_liquor)+'</td>';
                tbody += '<td>'+dateFormat(datas.growth_date)+'</td>';
                tbody += '</tr>';

                tbody += '<tr>';
                tbody += '<td>Dopple scan</td>';
                tbody += '<td>SLF of '+CheckNull(datas.doppler_slf_week)+' week '+CheckNull(datas.doppler_slf_day)+' day <br>Presentation:'+CheckNull(datas.doppler_presentation)+'<br>AFI:'+CheckNull(datas.doppler_afi)+'<br>Liquor:'+CheckNull(datas.doppler_liquor)+'</td>';
                tbody += '<td>'+dateFormat(datas.doppler_scan_date)+'</td>';
                tbody += '</tr>';
                
                tbody += '<tr>';
                tbody += '<td>Doppler parameters </td>';
                tbody += '<td colspan="2">'+CheckDopplerLimit(datas.doppler_checkbox)+'Umbilical artery PI: '+CheckNull(datas.umbilical_artery_pi)+'<br>MCA PI :'+CheckNull(datas.mca_pi)+'<br>CP Ratio:'+CheckNull(datas.cp_ratio)+'</td>';
                tbody += '</tr>';

                tbody += '<tr>';
                tbody += '<td>Others Investigation</td>';
                tbody += '<td>'+CheckNull(datas.others_investigation)+'</td>';
                tbody += '<td>'+dateFormat(datas.others_investigation_date)+'</td>';
                tbody += '</tr>';



            });

            callback($('<div class="slider"><table class="table table-striped rowexpandTable" >' + thead + tbody + '</table></div>')).show();
        },
        error: function() {
            console.log("Error Found");
        }
    });
}


/* data table details rows investigation_record_master */

function formatPrescription(callback, id, basepath) {
    var inv_record_id = id[1];
   
    $.ajax({
        url: basepath + 'patientcase/getPrescriptionDetailRow',
        data: { inv_record_id: inv_record_id },
        dataType: "json",
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        complete: function(response) {
            var data = JSON.parse(response.responseText);

           // console.log(data['medicine']);

            // console.log(response);
            var thead = '<tr class="expandrowDetails"><th style="width:10%;">Medicine</th><th style="width:30%;">Instruction</th><th style="width:10%;">Dosage</th><th style="width:5%;">Frequency</th><th style="width:5%;">Days</th></tr>';
            tbody = '';

            $.each(data['medicine'], function(i, datas) {

                console.log(datas);

                tbody += '<tr>';
                tbody += '<td>'+CheckNull(datas.medicine_name)+'</td>';
                tbody += '<td>'+CheckNull(datas.med_instruction)+'</td>';
                tbody += '<td>'+CheckNull(datas.dosage)+'</td>';
                tbody += '<td>'+CheckNull(datas.frequency)+'</td>';
                tbody += '<td>'+CheckNull(datas.days)+'</td>';
                tbody += '</tr>';

              


            });

             tbody += '<tr><td colspan="5">&nbsp;</td></tr>';
            var thead2 = '<tr class="expandrowDetails"><th colspan="5" style="width:10%;">Investigation</th></tr>';
            tbody2 = '';

              $.each(data['investigation'], function(i, datasin) {

                //console.log(datasin);

                tbody2 += '<tr>';
                tbody2 += '<td colspan="5">'+CheckNull(datasin.inv_component_name)+'</td>';
              
                tbody2 += '</tr>';

              


            });

            callback($('<div class="slider"><table class="table table-striped rowexpandTable" >' + thead + tbody + thead2 + tbody2 +'</table></div>')).show();
        },
        error: function() {
            console.log("Error Found");
        }
    });
}


function dateFormat(date){

 var newDt='';
    if (date==null) {

    return newDt;

    }else{
        var dateval = date.slice(0, 10);
    console.log(dateval);
     var dateDtl = dateval.split('-');
      console.log(dateDtl);

      var newDt=dateDtl[2]+'-'+dateDtl[1]+'-'+dateDtl[0];
      return newDt;
    }

}


function CheckNull(result){


    if (result==null) {
        return '';
    }else{
        return result;
    }

}

function CheckDopplerLimit(result){


    if (result=='Normal') {
        return 'Within Normal Limit.<br>';
    }else{
        return '';
    }

}


/* claculate weeks days by LMP  */ 
function WeekDaysCalculationByLmp(basepath,cliexmDate,rowID){

    var lmp_date = $('#lmp_date').val();
    console.log(lmp_date);
    console.log(cliexmDate);
    


        if(lmp_date!='' && cliexmDate!=''){
       $.ajax({
           type: "POST",
           url: basepath+'patientcase/weekDaysCalculationByLmp',
           dataType: "html",
           data: {lmp_date:lmp_date,cliexmDate:cliexmDate},
           success: function (result) {
            
         var weeks_days=result;
         var dataDtl = weeks_days.split('_');

         console.log(dataDtl);
           $("#weeks_by_lmp_"+rowID).val(dataDtl[0]);
           $("#days_by_lmp_"+rowID).val(dataDtl[1]);
        
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




/* claculate weeks days by USG  */ 
function WeekDaysCalculationByUsg(basepath,cliexmDate,rowID){

    var seleddbyusg_date = $('#seleddbyusg_date').val();
    console.log(seleddbyusg_date);
    console.log(cliexmDate);
    


        if(seleddbyusg_date!='' && cliexmDate!=''){
       $.ajax({
           type: "POST",
           url: basepath+'patientcase/weekDaysCalculationByUsg',
           dataType: "html",
           data: {seleddbyusg_date:seleddbyusg_date,cliexmDate:cliexmDate},
           success: function (result) {
            
         var weeks_days=result;
         var dataDtl = weeks_days.split('_');

         console.log(dataDtl);
           $("#weeks_by_usg_"+rowID).val(dataDtl[0]);
           $("#days_by_usg_"+rowID).val(dataDtl[1]);
        
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


function validatemedicine()
{
    var medicinename = $("#medicinename").val();
  

    $("#medicinemsg").text("").css("dispaly", "none").removeClass("form_error");

    if(medicinename=="")
    {
        $("#medicinename").focus();
        $("#medicinemsg")
        .text("Error : Enter medicine name .")
        .addClass("form_error")
        .css("display", "block");
        return false;
    }
 
    return true;
}



function resetPrescriptionMedDropdown(basepath){

    var callfrom='prescription';

    $.ajax({
        type: "POST",
        url: basepath+'patientcase/resetPrescriptionMedDropdown',
        dataType: "html",
        data: {callfrom:callfrom},
        success: function (result) {
            
           
            
            $("#prescription_medicinedrp").html(result);
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


function resetMensuMedDropdown(basepath){

    var callfrom='mensmedicine';

    $.ajax({
        type: "POST",
        url: basepath+'patientcase/resetMensuMedDropdown',
        dataType: "html",
        data: {callfrom:callfrom},
        success: function (result) {
            
            $("#selmens_medicinedrp").html(result);
           
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



function resetRegularMedDropdown(basepath){

    var callfrom='regularmedicine';

    $.ajax({
        type: "POST",
        url: basepath+'patientcase/resetRegularMedDropdown',
        dataType: "html",
        data: {callfrom:callfrom},
        success: function (result) {
            
            $("#regular_medicinedrp").html(result);
           
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
