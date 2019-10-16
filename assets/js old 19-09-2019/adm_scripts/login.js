$(function() {
    var tab = $('.tabs h3 a');
    tab.on('click', function(event) {
        event.preventDefault();
        tab.removeClass('active');
        $(this).addClass('active');
        tab_content = $(this).attr('href');
        $('div[id$="tab-content"]').removeClass('active');
        $(tab_content).addClass('active');
    });
});

// SLIDESHOW
$(function() {
    $('#slideshow > div:gt(0)').hide();
    setInterval(function() {
        $('#slideshow > div:first')
        .fadeOut(1000)
        .next()
        .fadeIn(1000)
        .end()
        .appendTo('#slideshow');
    }, 3850);
});

// CUSTOM JQUERY FUNCTION FOR SWAPPING CLASSES
// (function($) {
//     'use strict';
//     $.fn.swapClass = function(remove, add) {
//         this.removeClass(remove).addClass(add);
//         return this;
//     };
// }(jQuery));

// SHOW/HIDE PANEL ROUTINE (needs better methods)
// I'll optimize when time permits.
$(function() {
    $('.agree,.forgot, #toggle-terms, .log-in, .sign-up').on('click', function(event) {
        event.preventDefault();
        var terms = $('.terms'),
        recovery = $('.recovery'),
        close = $('#toggle-terms'),
        arrow = $('.tabs-content .fa');
        if ($(this).hasClass('agree') || $(this).hasClass('log-in') || ($(this).is('#toggle-terms')) && terms.hasClass('open')) {
            if (terms.hasClass('open')) {
                terms.swapClass('open', 'closed');
                close.swapClass('open', 'closed');
                arrow.swapClass('active', 'inactive');
            } else {
                if ($(this).hasClass('log-in')) {
                    return;
                }
                terms.swapClass('closed', 'open').scrollTop(0);
                close.swapClass('closed', 'open');
                arrow.swapClass('inactive', 'active');
            }
        }
        else if ($(this).hasClass('forgot') || $(this).hasClass('sign-up') || $(this).is('#toggle-terms')) {
            if (recovery.hasClass('open')) {
                recovery.swapClass('open', 'closed');
                close.swapClass('open', 'closed');
                arrow.swapClass('active', 'inactive');
            } else {
                if ($(this).hasClass('sign-up')) {
                    return;
                }
                recovery.swapClass('closed', 'open');
                close.swapClass('closed', 'open');
                arrow.swapClass('inactive', 'active');
            }
        }
    });
});

// DISPLAY MSSG
$(function() {
    $('.recovery .button').on('click', function(event) {
        event.preventDefault();
        $('.recovery .mssg').addClass('animate');
        setTimeout(function() {
            $('.recovery').swapClass('open', 'closed');
            $('#toggle-terms').swapClass('open', 'closed');
            $('.tabs-content .fa').swapClass('active', 'inactive');
            $('.recovery .mssg').removeClass('animate');
        }, 2500);
    });
});

// DISABLE SUBMIT FOR DEMO
$(function() {
    $('.button').on('click', function(event) {
        $(this).stop();
        event.preventDefault();
        return false;
    });
});



$(document).ready(function () {
alert("hello");
    var baseurl =$("#baseurl").val();
 
    $(document).on("click","#loginBtn",function(e){
        e.preventDefault();
         var uname = $("#sel_clinic").val();
         alert('u'+uname);
         console.log('u'+uname);
       
        // if(1)
        // {
        //     var formData = $("#LoginForm" ).serialize();
        //     formData = decodeURI(formData);
             
        //     $("#verifying-account").css("display","block");
        //     $("#loginBtn").css("display","none");
        //     $.ajax({
        //         type: "POST",
        //         url: baseurl + 'login/verifyLogin',
        //         dataType: "json",
        //         contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        //         data: {formDatas:formData},
        //         success: function (result) 
        //         {
        //             if(result.msg_status == 1)
        //             {
        //                 window.location=baseurl + 'admindashboard';
        //             }
        //             else
        //             {
        //                 $("#verifying-account").css("display","none");
        //                 $("#loginBtn").css("display","block");
        //                 $("#login_err").css("display","block").text(result.msg_data);
        //             }
                 
        //         },
        //         error: function (jqXHR, exception) {
        //             var msg = '';
        //             if (jqXHR.status === 0) {
        //                 msg = 'Not connect.\n Verify Network.';
        //             } else if (jqXHR.status == 404) {
        //                 msg = 'Requested page not found. [404]';
        //             } else if (jqXHR.status == 500) {
        //                 msg = 'Internal Server Error [500].';
        //             } else if (exception === 'parsererror') {
        //                 msg = 'Requested JSON parse failed.';
        //             } else if (exception === 'timeout') {
        //                 msg = 'Time out error.';
        //             } else if (exception === 'abort') {
        //                 msg = 'Ajax request aborted.';
        //             } else {
        //                 msg = 'Uncaught Error.\n' + jqXHR.responseText;
        //             }
        //             alert(msg);
        //         }
        //     });
        // }   
        
        
    });


    


}); 


function loginRequired()
{
    var uname = $("#username").val();
    var pass = $("#password").val();
    var sel_clinic = $("#sel_clinic").val();
    
   console.log(uname);
    $("#username,#password").removeClass("login_input_err");
    
    if(uname=="")
    {
        $("#username").focus().addClass("login_input_err");
        return false;   
    }
    if(pass=="")
    {
        $("#password").focus().addClass("login_input_err");
        return false;   
    }
    if(sel_clinic=="0")
    {
        $("#sel_clinic").focus().addClass("login_input_err");
        return false;   
    }
    
  //  return true;
    
}