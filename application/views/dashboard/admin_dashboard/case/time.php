 <link href="<?php echo(base_url());?>assets/css/jquery.timepicker.min.css" rel="stylesheet">
    <script src="<?php echo(base_url());?>assets/js/jquery.timepicker.min.js"></script>

   <script type="text/javascript">
   	(function($) {
    $(function() {
        $('input.timepickerg').timepicker();
    });
      })(jQuery);
   </script> 

    <h1>jQuery TimePicker Demo</h1>

<br/>

<form>
    <input type="text" class="timepickerg" name="time"/>
</form>


<a href="http://github.com/wvega/timepicker" target="_blank"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://s3.amazonaws.com/github/ribbons/forkme_right_red_aa0000.png" alt="Fork me on GitHub"></a>