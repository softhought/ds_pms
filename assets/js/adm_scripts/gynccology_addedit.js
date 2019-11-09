$(document).ready(function(){

 var basepath = $("#basepath").val();

resetprevioussurgery(basepath);
resetPlannedSurgery(basepath);
resetgynInvestigationpanelDropDown(basepath);
Activechiefcomplaintform();

$("#gynccology_section").css("display", "block");

$(document).on('click','.changecss',function(e){
	 e.preventDefault();
	$('.changezindex').css('z-index','unset');
	
});


$(".inputreadonly").on('click',function(){

   //Activechiefcomplaintform();
    var id = $(this).attr('id');
    var complaintID = $(this).attr('data-complaint-id');
    
    var insertID = $(this).attr('data-insert-id');
   
    var comp_detail_id = $("#"+insertID).val();
    var complaint_master_id = $("#complaint_id_"+complaintID).val();
    var caseId = $("#caseID").val();
     //alert(caseId);

	var check = $(this).attr('data-check');
	var year = $(this).attr('data-year');
	var month = $(this).attr('data-month');
	var day = $(this).attr('data-day');
	var complaint_type = $(this).attr('data-select');
	//var disableclass = $(".btn").attr('id',select);
	//alert(year);

   if($(this).prop("checked") == true){

        $("#"+year).attr('disabled',false);
        $('button[data-id = '+year+']').removeClass('disabled');
        

   	    $("#"+month).attr('disabled',false);
        $('button[data-id = '+month+']').removeClass('disabled');
        

   	     $("#"+day).attr('readonly',false);
   	     

   		 $("#"+complaint_type).attr('disabled',false);
         $('button[data-id = '+complaint_type+']').removeClass('disabled');

   		 $("#"+check).val('Y');

	   		 if(complaintID >= 3 && complaintID <= 7){

	    	$("#complaint_" + complaintID).css("display",'block');
	    	$("#menstralProblem").css("display",'block');

		    }else{

		    	$("#complaint_" + complaintID).css("display",'block');
		    }
   		 

   		 //$("#is_form_" + complaintID).val('Y');
   		
   	
   
   }
   else{
   		 $("#"+year).attr('disabled',true);
   		 
   		 $("#"+year).val('').change();
         $('button[data-id = '+year+']').addClass('disabled');
        

   	    $("#"+month).attr('disabled',true);
        $('button[data-id = '+month+']').addClass('disabled');
         $("#"+month).val('').change();

   		 $("#"+day).attr('readonly',true);
   		 $("#"+day).val('');

   		 $("#"+complaint_type).attr('disabled',true);
         $('button[data-id = '+complaint_type+']').addClass('disabled');
          $("#"+complaint_type).val('').change();

   		$("#"+check).val('N');
   		//3 and 7 is complainid to menstrual problem data
   		if(complaintID >= 3 && complaintID <= 7){

   		$(".menstrualcheck").each(function(){
      
         if($(this).prop("checked") == false){

           $("#menstralProblem").css("display",'none');
           $("#complaint_" + complaintID).css("display",'none');
           
                      
         }
       });
         $(".menstrualcheck").each(function(){
      
         if($(this).prop("checked") == true){

           $("#menstralProblem").css("display",'block');
           $("#complaint_" + complaintID).css("display",'none');
           
                      
         }
         
         
   		});	


   		}else{
   			$("#complaint_" + complaintID).css("display",'none');
   		}
   		

   		 $.ajax({
                type: "POST",
                url: basepath+'gynccology/CheckComplaintRespectiveData',
                dataType: "json",
                contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                data: {compdetailsID:comp_detail_id,complaint_master_id:complaint_master_id,caseID:caseId},
                
                success: function (result) {
                    
                    if (result.msg_status == 1) {
                     
                     var ok = confirm("If Press Ok Then Delete Complaint Details Data..");
                   
                      if(ok == false){
                      	//alert(id);
                       $("#"+id).prop("checked",true);
                       $("#complaint_" + complaintID).css("display",'block');
                      }
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
            }); /*end ajax call*/
   		
   }
 
});

$('.ischangechiefcomplaint').on('change',function(){
	
	$('#ifchiefChangedata').val('Y');
})

$('.ischangechiefcomplaint').on('keyup',function(){
	
	$('#ifchiefChangedata').val('Y');
})

//update patient data of gynccology using same controller which is used in patientcase


$(document).on('submit','#gynccologypatientBasicForm',function(event)
    {
        event.preventDefault();
        if(validatPatientBasicInfo())
        {   

            var formDataserialize = $("#gynccologypatientBasicForm").serialize();
            formDataserialize = decodeURI(formDataserialize);
            console.log(formDataserialize);

            var formData = { formDatas: formDataserialize };
            $("#gynpatientbasicsavebtn").css('display', 'none');
            $("#gynpatientloaderbtn").css('display', 'block');
        

            //console.log(formData);
            
    
        $.ajax({
                type: "POST",
                url: basepath+'patientcase/updatePatientBasicInfo',
                dataType: "json",
                contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                data: formData,
                
                success: function (result) {
                    
                    if (result.msg_status == 1) {

                      
        	          $("#gynpatientbasicsavebtn").removeClass("btn-danger");
        	          $("#gynpatientbasicsavebtn").addClass("btn-primary");
                      $("#gynpatientbasicsavebtn").html('Updated');
                         
                  
                    } 
                    else {
                     //   $("#cls_response_msg").text(result.msg_data);
                    }
                   
                    $("#gynpatientloaderbtn").css('display', 'none');
                    
                    $("#gynpatientbasicsavebtn").css({
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

//add data of gynccology master and others table


$(document).on('submit','#GynccologyBasicRecordForm',function(event)
    {
        event.preventDefault();

        $(".ischangechiefcomplaint").attr('disabled',false);
        
       
            var formDataserialize = $("#GynccologyBasicRecordForm").serialize();
            formDataserialize = decodeURI(formDataserialize);
            console.log(formDataserialize);

            var formData = { formDatas: formDataserialize };
            $(".gynccologysavebtn").css('display', 'none');
            //$(".antenatelbasicsavebtn").css('display', 'none');
            $(".gynccologyloaderbtn").css('display', 'block');
        

            //console.log(formData);
            
    
        $.ajax({
                type: "POST",
                url: basepath+'gynccology/gynccologyinfo_action',
                dataType: "json",
                contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                data: formData,
                
                success: function (result) {
                     //console.log(result);
                    
                    if (result.msg_status == 1) {
                        imageupload(basepath);  
                      
        	           $(".gynccologysavebtn").removeClass("btn-danger");
        	           $(".gynccologysavebtn").addClass("btn-primary");
                       $(".gynccologysavebtn").html('Updated');
                       $('#gynccologyID').val(result.gynccologyID);
                       var alllastinsertComplaintId = result.AllchiefcomplaintId;
                       var j =1;
                       for (var i = 0; i < alllastinsertComplaintId.length; i++) {

                       	   $("#gynccology_insertedID_" + j).val(alllastinsertComplaintId[i]);
                        	
                        j++;	
                        } 
                      
                      $("#paininsertedID").val(result.pain_lower_lastID);   
                      $("#examination_master_id").val(result.examination_master_id);   
                      $("#gyn_investigation_id").val(result.gyninvestigationId); 

                     
                  
                    } 
                    else {
                     //   $("#cls_response_msg").text(result.msg_data);
                    }
                    
                    $(".gynccologyloaderbtn").css('display', 'none');               
                    $(".gynccologysavebtn").css({
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

/* molar pregnancy tag apper how many year back filled*/

$("#any_molar_pregnancy").on('change',function(){

  var value = $(this).val();

  if(value == 'Yes'){
  	$("#how_many_back").css('display','block');

  }else{
  	$("#how_many_back").css('display','none');
  	$("#back_days").val('');
  	$("#back_months").val('');
  	$("#back_years").val('');
  	
  }

});

/* end maolor pregnancy */

/* White discharge Previous Episode */

$("#white_previous_episode").on('change',function(){

  var value = $(this).val();

  if(value == 'Yes'){
  	$("#episode_pre").css('display','block');
  	$("#ispreviousEpisode").val('Y');


  }else{
  	$("#episode_pre").css('display','none');
   	$("#ispreviousEpisode").val('N');
   	$("#previous_episode").val('').change();
  	  	
  }

});

/* trying for pregnancy in others history */

$("#trying_for_pregnancy").on('change',function(){

  var value = $(this).val();

  if(value == 'Yes'){
  	$("#homanymonths").css('display','block');
  	$("#homanyyears").css('display','block');

  }else{
  	$("#homanymonths").css('display','none');
  	$("#homanyyears").css('display','none');
  	$("#how_many_years").val('');
  	$("#how_many_months").val('');
  	
  	
  }

});

$("#married_status").on('change',function(){

  var value = $(this).val();

  if(value == 'Married'){
  	$("#marriedyears").css('display','block');
  

  }else{
  	$("#marriedyears").css('display','none');
  	
  	$("#married_years").val('');
  	
  	
  }

});

/* Previous Surgery add more */

$(document).on('click','.addPreviousSurgery',function(){

          // rowNoUpload++;

          var rowno=  $("#surgeryrowno").val();
          var surgeryID =  $("#surgeryID").val();
          var surgery_date =  $("#surgery_date").val();
         
       // alert(surgeryID);
        //console.log(basepath);
        if(surgeryID!='0'){
        rowno++;
        $.ajax({
            type: "POST",
            url: basepath+'gynccology/addPreviousSurgeryDetail',
            dataType: "html",
            data: {rowNo:rowno,surgeryID:surgeryID,surgery_date:surgery_date},
            success: function (result) {
                $("#surgeryrowno").val(rowno);
                $("#detail_previousSurgery table").css("display","block"); 
                $("#detail_previousSurgery table tbody").append(result);   
                $('select').selectpicker();
              //  $(".demo-masked-input").inputmask();
                var $demoMaskedInput = $('.demo-masked-input');

                $('#surgeryID').val('0').change();
                $('#surgery_date').val('').change();
                resetprevioussurgery(basepath);

           
         
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
           
            $("#surgeryID").focus();
            $("#previous_surgeryerr").addClass("bordererror");
           
        }
  
    }); // End Visiting Details

 // Delete Table Row

    $(document).on('click','.delPreviousSurgery',function(){
        
        var currRowID = $(this).attr('id');
        var rowDtlNo = currRowID.split('_');
       // console.log(rowDtlNo[1]);
        console.log(currRowID);

        //$("tr#rowDocument_"+rowDtlNo[1]+"_"+rowDtlNo[2]).remove();
        $("tr#rowprevious_surgery_"+rowDtlNo[1]).remove();
        resetprevioussurgery(basepath);
    });


/* Planned Surgery add more */

$(document).on('click','.addSurgeryPlanned',function(){

          // rowNoUpload++;

          var rowno=  $("#surgeryplannedrowno").val();
          var surgeryPlannedID =  $("#surgeryPlannedID").val();
          var surgery_planned_date =  $("#surgery_planned_date").val();
         
        //alert(surgeryPlannedID);
        //console.log(basepath);
        if(surgeryPlannedID!='0'){

        rowno++;
        $.ajax({
            type: "POST",
            url: basepath+'gynccology/addPlannedSurgeryDetail',
            dataType: "html",
            data: {rowNo:rowno,surgeryPlannedID:surgeryPlannedID,surgery_planned_date:surgery_planned_date},
            success: function (result) {
                $("#surgeryplannedrowno").val(rowno);
                $("#detail_PlannedSurgery table").css("display","block"); 
                $("#detail_PlannedSurgery table tbody").append(result);   
                $('select').selectpicker();
              //  $(".demo-masked-input").inputmask();
                var $demoMaskedInput = $('.demo-masked-input');

                $('#surgeryPlannedID').val('0').change();
                $('#surgery_planned_date').val('').change();
                resetPlannedSurgery(basepath);
                

           
         
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
           
            $("#surgeryPlannedID").focus();
            $("#surgery_plannederr").addClass("bordererror");
           
        }
  
    }); // End Visiting Details

// Delete Table Row

    $(document).on('click','.delPlannedSurgery',function(){
        
        var currRowID = $(this).attr('id');
        var rowDtlNo = currRowID.split('_');
       // console.log(rowDtlNo[1]);
        console.log(currRowID);

        //$("tr#rowDocument_"+rowDtlNo[1]+"_"+rowDtlNo[2]).remove();
        $("tr#rowplanned_surgery_"+rowDtlNo[1]).remove();
        resetPlannedSurgery(basepath);
    });

 $(document).on('keyup paste change click','.gynccologyselpres',function(event){

 $("#isChangeRgularMedicine").val('Y');
}); 

$("#period_rel_pain").on('change',function(){

	var value = $(this).val();
	if(value == 'Yes'){

	  $("#painDrp").css("display",'block');
    $("#othersdesign").css("display",'block');

	  $("#isPeriodrelPain").val('Y');
	  	
	}
	else{
		 $("#painDrp").css("display",'none');
     $("#othersdesign").css("display",'none');
		 $("#sel_period_pain").val('').change();
		 $("#other_pain  ").val('');
		  $("#isPeriodrelPain").val('N');
	}
}); 

  $(document).on('change','.sel_period_pain',function(event){
     event.stopImmediatePropagation();
       // alert();
        var currRowID = $(this).attr('id');
        console.log('currow : '+currRowID);
        var rowDtlNo = currRowID.split('_');
       // console.log(rowDtlNo[1]);
       
       var selectvalue = this.value; 
    //   console.log(selectvalue);

        var diseasesIDs = [];

        $.each($("#sel_period_pain option:selected"), function(){            

            diseasesIDs.push($(this).val());

        });

        console.log(diseasesIDs);

        console.log(diseasesIDs.toString());
        $("#sel_painValues").val(diseasesIDs.toString());


        /* 12 : Other Diseases (diseases_master id) */

        if(jQuery.inArray("Others", diseasesIDs) != -1) {
           // console.log("is in array");
             $('#other_pain_col').css('display','block'); 
             $("#isOtherPain").val('Y');
        } else {
           // console.log("is NOT in array");
            $('#other_pain_col').css('display','none');
            $("#isOtherPain").val('N');
            $("#other_pain").val('');
        } 

  

    }); 

$(document).on('change','.white_dicharge',function(event){
     event.stopImmediatePropagation();
       // alert();
        var currRowID = $(this).attr('id');
        console.log('currow : '+currRowID);
        var rowDtlNo = currRowID.split('_');
       // console.log(rowDtlNo[1]);
       
       var selectvalue = this.value; 
    //   console.log(selectvalue);

        var whitedischage = [];

        $.each($("#white_discharge_assoc option:selected"), function(){            

            whitedischage.push($(this).val());

        });
    
        console.log(whitedischage);

        console.log(whitedischage.toString());
        $("#whiteDischargeValues").val(whitedischage.toString());

  

    });

//treated medicine 

$(document).on('change','.treatmentmedicine',function(event){
     event.stopImmediatePropagation();
       // alert();
        var currRowID = $(this).attr('id');
        console.log('currow : '+currRowID);
        var rowDtlNo = currRowID.split('_');
       // console.log(rowDtlNo[1]);
       
       var selectvalue = this.value; 
    //   console.log(selectvalue);

        var medicine = [];

        $.each($("#treated_with_medicine option:selected"), function(){            

            medicine.push($(this).val());

        });
    
        console.log(medicine);

        console.log(medicine.toString());
        $("#treatedmedicine").val(medicine.toString());

  

    });

/* wants termination in unwanyed pregnancy */

$(document).on('change','.wantsterminationchange',function(event){
     event.stopImmediatePropagation();
       // alert();
        var currRowID = $(this).attr('id');
        console.log('currow : '+currRowID);
        var rowDtlNo = currRowID.split('_');
       // console.log(rowDtlNo[1]);
       
       var selectvalue = this.value; 
    //   console.log(selectvalue);

        var wantermintaion = [];

        $.each($("#wants_termination option:selected"), function(){            

            wantermintaion.push($(this).val());

        });
    
        console.log(wantermintaion);

        console.log(wantermintaion.toString());
        $("#WantsterminationValues").val(wantermintaion.toString());

        if(jQuery.inArray("Others", wantermintaion) != -1) {
           // console.log("is in array");
             $('#terminationOther').css('display','block'); 
             $("#isWantOthers").val('Y');
        } else {
           // console.log("is NOT in array");
            $('#terminationOther').css('display','none');
            $("#isWantOthers").val('N');
            $("#wantterminationOther").val('');
        } 


    });

/* end unwanted pregnancy*/

/* Urinary Inconsistany */

$(document).on('change','#urinary_episode',function(){
  //alert();

  var value = $(this).val();

   if(value == 'Recurrent'){

     $(".recurrentyermon").css("display","block");
     $("#isurinaryepisode").val('Y');
      $("#episode_years").val("");
      $("#episode_months").val("");
   }
   else if(value == 'Continous'){

     $(".recurrentyermon").css("display","block");
      $("#isurinaryepisode").val('Y');
      $("#episode_years").val("");
      $("#episode_months").val("");
   }else{

    $(".recurrentyermon").css("display","none");
     $("#isurinaryepisode").val('N');
      $("#episode_years").val("");
      $("#episode_months").val("");
   }

  // alert();

  });


/* Post Menopausal Bleeding */


$("#stopbleedingby").on('change',function(){

var value = $(this).val();

if(value == 'On Medication'){

  $("#stopbleedingmed").css("display","block");
  $("#isStopBleeding").val('Y');

}
else{

  $("#stopbleedingmed").css("display","none");
  $("#isStopBleeding").val('N');
  $("#stopbleedingmedValues").val('');

}


});





$(document).on('change','.medicineforstop',function(event){
     event.stopImmediatePropagation();
       // alert();
        var currRowID = $(this).attr('id');
        console.log('currow : '+currRowID);
        var rowDtlNo = currRowID.split('_');
       // console.log(rowDtlNo[1]);
       
       var selectvalue = this.value; 
    //   console.log(selectvalue);

        var medicine = [];

        $.each($("#bleedig_stop_medicine option:selected"), function(){            

            medicine.push($(this).val());

        });
    
        console.log(medicine);

        console.log(medicine.toString());
        $("#stopbleedingmedValues").val(medicine.toString());

      
    });


/*End Post Menopausal Bleeding*/


  $('.paindata').on('keyup',function(){

  	$("#isChangeData").val('Y');

  // alert();

  });
  $('.paindata').on('change',function(){

  	$("#isChangeData").val('Y');

  // alert();

  });

  $("#termination_by").on('change',function(){

  var value = $(this).val();

  if(value == 'Surgical Method'){
  	$("#AllsurgicalMethod").css('display','block');
  	$("#isSurgicalMethod").val('Y');


  }else{
  	$("#AllsurgicalMethod").css('display','none');
   	$("#isSurgicalMethod").val('N');
   	$("#surgical_method_with").val('').change();
  	  	
  }

});

   $("#lump_felt").on('change',function(){

  var value = $(this).val();

  if(value == 'Yes'){
  	$("#lump_felt_no").css('display','none');
  	$("#lump_felt_yes").css('display','block');
  	$("#with_nodularity").val('').change();
  	$("#islumpFelt").val('Y');

  }else if(value == 'No'){
  	$("#lump_felt_yes").css('display','none');
  	$("#lump_felt_no").css('display','block');
  	$("#firm").attr('checked',false);
  	$("#hard").attr('checked',false);
  	$("#mobile").attr('checked',false);
  	$("#not_mobile").attr('checked',false);
  	$("#right_breast").attr('checked',false);
  	$("#left_breast").attr('checked',false);
  	$("#rightBreastvalues").val('N');
  	$("#leftBreastvalues").val('N');
  	$("#lump_felt_location").val('');
  	$("#lump_felt_size").val('');
  	
   	$("#islumpFelt").val('N');
  	  	
  }
  else{
  	$("#lump_felt_yes").css('display','none');
  	$("#lump_felt_no").css('display','none');
  	$("#islumpFelt").val('');
  	$("#with_nodularity").val('').change();
  	$("#firm").attr('checked',false);
  	$("#hard").attr('checked',false);
  	$("#mobile").attr('checked',false);
  	$("#not_mobile").attr('checked',false);
  	$("#right_breast").attr('checked',false);
  	$("#left_breast").attr('checked',false);
  	$("#rightBreastvalues").val('N');
  	$("#leftBreastvalues").val('N');
  	$("#lump_felt_location").val('');
  	$("#lump_felt_size").val('');
  }

});

   $("#right_breast").on('click',function(){

   if($(this).prop("checked")){
   	
   	$("#rightBreastvalues").val('Y');

   }else{
   $("#rightBreastvalues").val('N');
   }
   
   });

   $("#left_breast").on('click',function(){

   if($(this).prop("checked")){
   	
   	$("#leftBreastvalues").val('Y');

   }else{
   $("#leftBreastvalues").val('N');
   }
   
   });

   $("#pcos").on('click',function(){

   if($(this).prop("checked")){
   	
   	$("#pcosvalues").val('Y');

   }else{
   $("#pcosvalues").val('N');
   }
   
   });


/* Year Months Carray Forward from Chief complaint to details  */

$(".yearvalueCarryforward").on("change",function(){

  var value = $(this).val();
  var id = $(this).attr("id").split('_');
 
  var checkid = ['1','12','14','15','17'];

  //alert(idse);

  if(jQuery.inArray(id[1],checkid) != -1){

    //alert("");

  $(".dtl_years_"+id[1]).val(value); 

  }
  
 

});
$(".monthvalueCarryforward").on("change",function(){

  var value = $(this).val();
  var id = $(this).attr("id").split('_');

  var checkid = ['1','8','12','14','15','17','18'];

  if(jQuery.inArray(id[1],checkid) != -1){

   $(".dtl_months_"+id[1]).val(value); 

  }

});

$(".dayvalueCarryforward").on("keyup",function(){

  var value = $(this).val();
  var id = $(this).attr("id").split('_');

  var checkid = ['1','8','14','15','17','18'];

  if(jQuery.inArray(id[1],checkid) != -1){

       $(".dtl_days_"+id[1]).val(value);

    } 

 

});


// start General Examination requried

//comman for other tag using 

$(".dispOther").change(function(event){

  event.stopImmediatePropagation();

var id = $(this).attr("id");

 var value = $(this).val();

 //alert("#"+id+"_other");

 if(value == 'Other'){

    $("#"+id+"_other").css("display","block");
 }else{

   $("#"+id+"_other").css("display","none");
 }


});


//bmi calaculation 

$(document).on('keyup','.genbmi',function(){
        
      var height = parseInt($('#exam_height').val() || 0);
      height_m= height/100;
      var weight = parseInt($('#exam_weight').val() || 0);

    
      if(height_m!=0){
        var bmi =weight/(height_m*height_m);
      $('#gen_exam_bmi').val(bmi.toFixed(2))
      }else{
       $('#gen_exam_bmi').val('') 
      }
      ;
      $("#gen_exam_bmi").focus();
      $(this).focus();
    });


$(document).on("change keyup",".isChangeGenExam",function(){


  $("#isGeneralDataChange").val('Y');

});

$(".reset_btn").click(function(){

$(".isChangeGenExam").val("");

$(".isChangeGenExam").val("").change();


});

//Abdominal Examination 


$(document).on('click','.tenderdatafill',function(){

  var id = $(this).attr('id');
  var value = $(this).val();

  if(value == 'N'){
     $("#"+id).prop('checked', true);
     $("#"+id).val('Y');
        
  }
  else{
     $("#"+id).prop('checked', false);
     $("#"+id).val('N');

       
  }

});



$("#abdominal_exam").change(function(){

  var value = $(this).val();
  

  if(value == "Tender"){

     $("#ascitesdata").css("display","none");
    $("#lumpdata").css("display","none");
    $(".tenderdata").css("display","block");
    $(".alllumpValue").val("").change();
    $(".ascitesvalue").val("").change();

  }else if (value == "Lump") 
  {
       $("#ascitesdata").css("display","none");
      $(".tenderdata").css("display","none");
     $("#lumpdata").css("display","block");
     $(".alltedval").val("N");
     $(".alltedval").prop("checked",false);
      $(".ascitesvalue").val("").change();
  } else if(value == "Ascites"){

      $(".tenderdata").css("display","none");
    $("#lumpdata").css("display","none");
    $("#ascitesdata").css("display","block");
     $(".alltedval").val("N");
     $(".alltedval").prop("checked",false);
     $(".alllumpValue").val("").change();
  }
  else{
      $("#ascitesdata").css("display","none");
    $(".tenderdata").css("display","none");
    $("#lumpdata").css("display","none");
    $(".alltedval").prop("checked",false);
     $(".alltedval").val("N");
    $(".alllumpValue").val("").change();
    $(".ascitesvalue").val("").change();
  }


});


$(document).on('change keyup click','.isAnyChangeexam',function(){

  $("#isChangeExamdata").val('Y');

});

$("#per_speculam_exam").change(function(){

  var value = $(this).val();
if(value == 'Growth Seen'){

   $("#polyprespect").css("display","none"); 
  $("#growthrespect").css("display","block");
   $("#polyprespect").val("").change();

}else if(value == 'Polyp Seen'){

  $("#growthrespect").css("display","none");
  $("#polyprespect").css("display","block");
  $("#speculam_growth_seen").val("").change();
}else{
      $("#polyprespect").css("display","none"); 
      $("#growthrespect").css("display","none");
       $("#polyprespect").val("").change();
       $("#speculam_growth_seen").val("").change();
}

 
})

$("#vulva_exam").change(function(){

var value = $(this).val();

if(value == 'Growth Seen'){

  $("#vulavagrowth").css("display","block");

}
else{

   $("#vulavagrowth").css("display","none");
   $("#vulva_growth_notes").val("");
}


});

// End General Examination requried


//Start Gynaecology Investigation

$(document).on("change keyup",".isChangeinv",function(event){
   
   event.stopImmediatePropagation();

   $("#isChangeInvestigation").val("Y");
});

/* add prescription panel by anil 23-09-2019*/

     $(document).on('click','#addPresGynPanelTest',function(){
 
          // rowNoUpload++;
          // $("#addPresPanelTest").attr("disabled","true");
          var rowno=  $("#presTestrowpanel").val();

          var panel=  $("#prescription_investigationpanel").val();

          var count = $("#prescription_investigationpanel :selected").length;
        
        
          $("#prescription_investigationerr").removeClass("bordererror");

        if (count!='0') {
       //console.log(investigation);
        rowno++;
       
        $.ajax({
            type: "POST",
            url: basepath+'gynccology/addPrescriptionTestDetailspanel',
            dataType: "html",
            data: {rowNo:rowno,panel:panel},
            success: function (result) {
                //console.log(result);
                rowno=rowno+count-1;
                $("#presTestrowpanel").val(rowno);
                //$("#detail_presTestpanel table").css("display","block"); 
                $("#detail_presTestpanel table tbody").append(result);

                $('select').selectpicker();
              //  $(".demo-masked-input").inputmask();
                var $demoMaskedInput = $('.demo-masked-input');

          //  $('#prescription_investigation').val(0).change();
             $('#prescription_investigationpanel').multiSelect('deselect_all');
            resetgynInvestigationpanelDropDown(basepath);


         
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

            $("#prescription_investigationpanel").focus();
            $("#prescription_investigationpanel").addClass("bordererror");
          

    }
  
    });// End prescription panel
//dellete gynaecology investigation panel


$(document).on('click','.delPresGynInvestigationpanel',function(event){

        event.preventDefault();
       
        var currRowID = $(this).attr('id');
        var rowDtlNo = currRowID.split('_');
       // console.log(rowDtlNo[1]);
        console.log(currRowID);
        $("#ischangePrescription").val('Y');
        //$("tr#rowDocument_"+rowDtlNo[1]+"_"+rowDtlNo[2]).remove();
        $("tr#rowPrescriptionInvestigationpanel_"+rowDtlNo[1]).remove();

        resetgynInvestigationpanelDropDown(basepath);
    });


//End Gynaecology Investigation



});



//created for previous surgery drp anil 02-10-2019

function resetprevioussurgery(basepath){
   //alert();
    var presurgeryitm=[];
    
      $(".PreviousSurgeryIDcls").each(function() { 
       presurgeryitm.push($(this).val());
      });
   
     //console.log(presurgeryitm);

         $.ajax({
        type: "POST",
        url: basepath+'gynccology/resetPreviousSurgeryDropdown',
        dataType: "html",
        data: {surgeryIDs:presurgeryitm},
        success: function (result) {
            //console.log(result);
            $("#previous_surgerydrp").html(result);
           
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

function resetPlannedSurgery(basepath){
   //alert();
    var plannedSurgeryIDs=[];
    
      $(".SurgeryPlannedIDcls").each(function() { 
       plannedSurgeryIDs.push($(this).val());
      });
   
     //console.log(presurgeryitm);

         $.ajax({
        type: "POST",
        url: basepath+'gynccology/resetPlannedSurgeryDropdown',
        dataType: "html",
        data: {surgeryplannedIDs:plannedSurgeryIDs},
        success: function (result) {
            //console.log(result);
            $("#surgery_planneddrp").html(result);
           
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

// show form Which is checked in chief complaint 

function Activechiefcomplaintform(){

  $(".inputreadonly").each(function(){

   
    if($(this).prop("checked") == true){

      var complaintID = $(this).attr('data-complaint-id');

   // 3 to 7 is complaint id for display menstrual problem and its children  data like oligomenorrhoea data

    if(complaintID >= 3 && complaintID <= 7){

    	$("#complaint_" + complaintID).css("display",'block');
    	$("#menstralProblem").css("display",'block');
    }else{

    	$("#complaint_" + complaintID).css("display",'block');
    }
      

      //alert(complaintID);
      

    }

  });
  
}

function resetgynInvestigationpanelDropDown(basepath){
    
    var investigationpanelItem=[];
    
      $(".presinvestigationIDPanelCls").each(function() { 
       investigationpanelItem.push($(this).val());
      });

      //console.log(investigationpanelItem);

         $.ajax({
        type: "POST",
        url: basepath+'gynccology/resetGynInvestigationpanelDropdown',
        dataType: "html",
        data: {investigationpanelItem:investigationpanelItem},
        success: function (result) {
            //console.log(result);
            $("#prescription_investigationpaneldrp").html(result);
           
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

function imageupload(basepath){

      //alert(basepath);
            var formData = new FormData($("#GynccologyBasicRecordForm")[0]);
            $("#gynpatientbasicsavebtn").css('display', 'none');
            $("#gynpatientloaderbtn").css('display', 'block');
        

            //console.log(formData);
            
    
        $.ajax({
                type: "POST",
                url: basepath+'gynccology/imageupload',
                dataType: "json",
                processData: false,
                contentType: false,
                data: formData,
                
                success: function (result) {
                    //console.log(result);
                    if(result.msg_status == 1){
                      $("#info_leaflet").val("");
                      $("#consent_form").val("");

                     
                     

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
            }); /*end ajax call*/

}

