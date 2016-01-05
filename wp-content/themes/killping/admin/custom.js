/**
 * Created by zubair khan
 */
$=jQuery;

$(document).ready(function(){

    $('.option_open').click(function(){
        //alert("test");return false;
       var $var = $(this).parent(".option_block").find(".option_content");

        if($($var).hasClass("open")) {
            $($var).removeClass("open").slideUp();
       }else {

           $($var).addClass("open").slideDown();

       }

        return false;
    });

});
