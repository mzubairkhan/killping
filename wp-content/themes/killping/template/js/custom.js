$=jQuery;
$(document).ready(function () {

    $("#faq_submit").click(function(){

        var that = $(this);
                    var AjaxUrl= SITE_URL + '/wp-admin/admin-ajax.php';
                    var searching_text;
                    if($(this).hasClass('text_clear')){
                   searching_text = '';
                     }else{
                   searching_text = $('#searching_text').val();
                   }
                    $("#loader").addClass("ajax");

                    $.ajax({

                                  type: "POST",
                                  url: AjaxUrl,
                                  data: {
                                      action:'faq_search',
                                      search: searching_text

                               },
                                  success: function(res){
                                      $('#faq_serach').html(res);


                                  }
                              });

                      });
       $( "#searching_text" ).keypress(function() {
       $('.searchclear').css({"display":"block"});
       });

    return false;



});

function clear_field(){
    $('#searching_text').val("");
    $('.searchclear').css({"display":"none"});


}

$('#form-submit').click(function(){
            var that = $(this);
            var AjaxUrl= SITE_URL + '/wp-admin/admin-ajax.php';
            var  fullName = $('#fullName').val();
            var  email = $('#email').val();
            var  message = $('#message').val();

                 $.ajax({

                     type: "POST",
                     url: AjaxUrl,
                     data: {
                         action:'form_submit',
                         fullName: fullName,
                         email: email,
                         message: message

                  },
                     success: function(res){
                         var jsonData = JSON.parse(res);
                         console.log(res);
                         if (jsonData.status=="success"){
                             $('#form-messages').empty();
                         $( "#form-messages" ).append(' <div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times"></i></a>'+jsonData.message+'</div>');
                        }else{
                             $('#form-messages').empty();
                             $( "#form-messages" ).append('<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times"></i></a>'+jsonData.message+'</div>');
                         }




                       // json_decode(res);


                     }
                 });



});


/**
* faq_posts_vote
* */

    $(".voting").click(function(){

        var that = $(this);
        if(that.hasClass('disabled')) {
            return false;
        }

        var post_id = that.data("post_id");
        var post_vote = that.data("post_voting");
        var ajax_url= SITE_URL + '/wp-admin/admin-ajax.php';

        $.ajax({

               type: "POST",
               url: ajax_url,
               data: {
                   action:'faq_posts_vote',
                   post_id: post_id,
                   post_vote: post_vote

            },
               success: function(res){
                   ///document.cookie="faq_posts_vote="+res+"; path=/";
                   //document.cookie="faq_posts_vote="+res;
                   var result = JSON.parse(res);
                   console.log(result);
                   $('.voting').removeClass('disabled');
                   that.addClass('disabled');
               }
           });



        return false;
    });
