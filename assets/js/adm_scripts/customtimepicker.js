$(document).ready(function(){

$('.cutomtime').blur(function(){

	$(this).prop('maxlength','6');

         
      var value = $(this).val();
      var i=0;
      var strlength = value.length;

      if(strlength == 4 && $.isNumeric(value.charAt(0)) == true && $.isNumeric(value.charAt(1)) == true && $.isNumeric(value.charAt(2)) == true){

       if($.isNumeric(value.charAt(3)) == true){


		 if(value.charAt(2) < 6 && value.charAt(3) <= 9){

          if(value.charAt(0) > 0){

          	var hour = value.charAt(0)+value.charAt(1);

          }else{
          		var hour = value.charAt(1);
          }
          
           if(hour < 24){

           	if(hour > 12){

           	  var exacttime = hour - 12 ;

             }else{
             	var exacttime = hour;
             }

           	if(hour < 24 && hour >= 12 ){

           		var strtime = 'PM';

           	}else{

           		var strtime = 'AM';
           	}

           	 $(this).val(exacttime +':'+value.charAt(2)+value.charAt(3)+strtime);
           	
           }else{

           	 $(this).val('');
           }

         }else{
         	$(this).val('');
         }  
           

        }else{

		      if(value.charAt(1) < 6 && value.charAt(2) <= 9){

		      if(value.charAt(3).toLowerCase() == 'p'){
		        
		      	var strtime = 'PM';
		      }else{
		      	
		      	var strtime = 'AM';
		      }
		     
		      $(this).val(value.charAt(0)+':'+value.charAt(1)+value.charAt(2)+strtime);
		     }else{

		     	 $(this).val(value.charAt(0)+': 00AM');
		     }

    }

     }else if(strlength == 5 && $.isNumeric(value.charAt(0)) == true && $.isNumeric(value.charAt(1)) == true && $.isNumeric(value.charAt(2)) == true && $.isNumeric(value.charAt(3)) == true){
     
    
		 if(value.charAt(2) < 6 && value.charAt(3) <= 9){

          if(value.charAt(0) > 0){

          	var hour = value.charAt(0)+value.charAt(1);

          }else{
          		var hour = value.charAt(1);
          }
          
           if(hour < 25){

           	if(hour > 12){

           	  var exacttime = hour - 12 ;

             }else{
             	var exacttime = hour;
             }
        
              if(value.charAt(4).toLowerCase() == 'p'){
		        
		      	var strtime = 'PM';
		      }else{
		      	
		      	var strtime = 'AM';
		      }
           

           	 $(this).val(exacttime +':'+value.charAt(2)+value.charAt(3)+strtime);
           	
           }else{

           	 $(this).val('');
           }

         }else{
         	$(this).val('');
         }  
          
       

     }else if(strlength == 3 && $.isNumeric(value.charAt(0)) == true && $.isNumeric(value.charAt(1)) == true && $.isNumeric(value.charAt(2)) == true){

      if(value.charAt(1) < 6 && value.charAt(2) <= 9){

      $(this).val(value.charAt(0)+':'+value.charAt(1)+value.charAt(2)+'AM');

     }else{

     	$(this).val(value.charAt(0)+': 00AM');
     }


     }

     else if(strlength == 5 && $.isNumeric(value.charAt(0)) == true && value.charAt(1) == ':' && $.isNumeric(value.charAt(2)) == true && $.isNumeric(value.charAt(3)) == true){
     
     if(value.charAt(2) < 6 && value.charAt(3) <= 9){
    
      if(value.charAt(4).toLowerCase() == 'p'){
        var strtime = 'PM';
      	
      }else{
      	
      	var strtime = 'AM';
      }
     
      $(this).val(value.charAt(0)+value.charAt(1)+value.charAt(2)+value.charAt(3)+strtime);

     }else{

     	 $(this).val('1: 00AM');
     }

     }else if(strlength == 3 && $.isNumeric(value.charAt(0)) == true && $.isNumeric(value.charAt(1)) == true && $.isNumeric(value.charAt(2)) == true){

      if(value.charAt(1) < 6 && value.charAt(2) <= 9){

      $(this).val(value.charAt(0)+':'+value.charAt(1)+value.charAt(2)+'AM');

     }else{

     	$(this).val(value.charAt(0)+': 00AM');
     }


     }else if(strlength == 6 && $.isNumeric(value.charAt(0)) == true && $.isNumeric(value.charAt(1)) == true && value.charAt(2) == ':' && $.isNumeric(value.charAt(3)) == true && $.isNumeric(value.charAt(4)) == true){
       
      if(value.charAt(3) < 6 && value.charAt(4) <= 9){

      	if(value.charAt(5).toLowerCase() == 'p'){

        var strtime = 'PM';
      	
         }else{
      	
      	    var strtime = 'AM';
          }

         $(this).val(value.charAt(0)+value.charAt(1)+value.charAt(2)+value.charAt(3)+value.charAt(4)+strtime);

      }


     }
     else if(strlength == 1 || strlength == 2 || strlength < 6){

     	 $(this).val('');
     }
  
	
});

  $(document).on('keypress','.cutomtime',function(e) {

   $(this).prop('maxlength','6');

  	if(e.which == 13){

      e.preventDefault();

    
      var value = $(this).val();
      var i=0;
      var strlength = value.length;

      if(strlength == 4 && $.isNumeric(value.charAt(0)) == true && $.isNumeric(value.charAt(1)) == true && $.isNumeric(value.charAt(2)) == true){

       if($.isNumeric(value.charAt(3)) == true){


		 if(value.charAt(2) < 6 && value.charAt(3) <= 9){

          if(value.charAt(0) > 0){

          	var hour = value.charAt(0)+value.charAt(1);

          }else{
          		var hour = value.charAt(1);
          }
          
           if(hour < 24){

           	if(hour > 12){

           	  var exacttime = hour - 12 ;

             }else{
             	var exacttime = hour;
             }

           	if(hour < 24 && hour > 12 ){

           		var strtime = 'PM';

           	}else{

           		var strtime = 'AM';
           	}

           	 $(this).val(exacttime +':'+value.charAt(2)+value.charAt(3)+strtime);
           	
           }else{

           	 $(this).val('');
           }

         }else{
         	$(this).val('');
         }  
           

        }else{

		      if(value.charAt(1) < 6 && value.charAt(2) <= 9){

		      if(value.charAt(3).toLowerCase() == 'p'){
		        
		      	var strtime = 'PM';
		      }else{
		      	
		      	var strtime = 'AM';
		      }
		     
		      $(this).val(value.charAt(0)+':'+value.charAt(1)+value.charAt(2)+strtime);
		     }else{

		     	 $(this).val(value.charAt(0)+': 00AM');
		     }

    }

     }else if(strlength == 5 && $.isNumeric(value.charAt(0)) == true && $.isNumeric(value.charAt(1)) == true && $.isNumeric(value.charAt(2)) == true && $.isNumeric(value.charAt(3)) == true){
     
    
		 if(value.charAt(2) < 6 && value.charAt(3) <= 9){

          if(value.charAt(0) > 0){

          	var hour = value.charAt(0)+value.charAt(1);

          }else{
          		var hour = value.charAt(1);
          }
          
           if(hour < 25){

           	if(hour > 12){

           	  var exacttime = hour - 12 ;

             }else{
             	var exacttime = hour;
             }
        
              if(value.charAt(4).toLowerCase() == 'p'){
		        
		      	var strtime = 'PM';
		      }else{
		      	
		      	var strtime = 'AM';
		      }
           

           	 $(this).val(exacttime +':'+value.charAt(2)+value.charAt(3)+strtime);
           	
           }else{

           	 $(this).val('');
           }

         }else{
         	$(this).val('');
         }  
          
       

     }else if(strlength == 3 && $.isNumeric(value.charAt(0)) == true && $.isNumeric(value.charAt(1)) == true && $.isNumeric(value.charAt(2)) == true){

      if(value.charAt(1) < 6 && value.charAt(2) <= 9){

      $(this).val(value.charAt(0)+':'+value.charAt(1)+value.charAt(2)+'AM');

     }else{

     	$(this).val(value.charAt(0)+': 00AM');
     }


     }

     else if(strlength == 5 && $.isNumeric(value.charAt(0)) == true && value.charAt(1) == ':' && $.isNumeric(value.charAt(2)) == true && $.isNumeric(value.charAt(3)) == true){
     
     if(value.charAt(2) < 6 && value.charAt(3) <= 9){
    
      if(value.charAt(4).toLowerCase() == 'p'){
        var strtime = 'PM';
      	
      }else{
      	
      	var strtime = 'AM';
      }
     
      $(this).val(value.charAt(0)+value.charAt(1)+value.charAt(2)+value.charAt(3)+strtime);

     }else{

     	 $(this).val('1: 00AM');
     }

     }else if(strlength == 3 && $.isNumeric(value.charAt(0)) == true && $.isNumeric(value.charAt(1)) == true && $.isNumeric(value.charAt(2)) == true){

      if(value.charAt(1) < 6 && value.charAt(2) <= 9){

      $(this).val(value.charAt(0)+':'+value.charAt(1)+value.charAt(2)+'AM');

     }else{

     	$(this).val(value.charAt(0)+': 00AM');
     }


     }else if(strlength == 6 && $.isNumeric(value.charAt(0)) == true && $.isNumeric(value.charAt(1)) == true && value.charAt(2) == ':' && $.isNumeric(value.charAt(3)) == true && $.isNumeric(value.charAt(4)) == true){
       
      if(value.charAt(3) < 6 && value.charAt(4) <= 9){

      	if(value.charAt(5).toLowerCase() == 'p'){

        var strtime = 'PM';
      	
         }else{
      	
      	    var strtime = 'AM';
          }

         $(this).val(value.charAt(0)+value.charAt(1)+value.charAt(2)+value.charAt(3)+value.charAt(4)+strtime);

      }


     }
     else if(strlength == 1 || strlength == 2 || strlength <= 6){

     	 $(this).val('');
     }
   }
    
});


});