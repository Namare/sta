MSG = {
    init:function(){
        $('.modal_mail, #inbox').on('click',function(){
            $('.msg_re').slideUp();
            $('.massg_block_con').load(BASE_URL + 'user/inbox',anim());
        });

        $('#outbox').on('click',function(){
            $('.msg_re').slideUp();
            $('.massg_block_con').load(BASE_URL + 'user/outbox',anim());
        });
        function anim(){
       $('body').on('click','.massg_block',function(){
           var th = $(this);
           $('.massg_block').slideUp('400',function(){
               th.slideDown();
               th.animate({
                   backgroundColor: "#fff"
               });
               th.children('.msg_text').animate({
                   height: "130px",
                   fontSize:"15px"
               });
               $('.msg_re').slideDown();
           });

           $('.msg_send').attr('data-to',$(this).data('to'));

       });}



       $('.msg_back').on('click',function(){
         if($('#inbox').attr('aria-expanded')=='true'){
             $('.massg_block_con').load(BASE_URL + 'user/inbox',anim());
             $('.msg_re').slideUp();
         }
          if($('#outbox').attr('aria-expanded')=='true'){
              $('.massg_block_con').load(BASE_URL + 'user/outbox',anim());
              $('.msg_re').slideUp();
           }
       });

       $('.msg_send').on('click',function(){
           $.ajax({
               method:"POSt",
               url:BASE_URL+'user/msg',
               data:"u=" +$(this).data('to')+
                   "&t="+$('.msg_textarea').val(),
               success:function(){
                   $('.msg_back').trigger('click')
                   $('#modal_mail').modal('hide');
               }
           });
       });

        $('.send_msg_touser').on('click',function(){
            $.ajax({
                method:'post',
                url:BASE_URL+'user/send_msg',
                data:"i="+$('.send_msg_touser').data('id')+
                    "&msg="+$('.send_msg_text').val(),
                success:function(){
                    $('#send_mail').modal('hide');
                    $('#modal_send_msg').modal('hide');
                    $('#modal_fav').modal('hide');

                }
            });
        });

        $('.fav_send').on('click',function(){
            $('.send_msg_touser').data('id',$(this).data('id'));


        })


       $('.add_to_fav').on('click',function(){
           $.ajax({
               method:"POSt",
               url:BASE_URL+'user/add_fav',
               data:'i='+$(this).data('id'),
               success:function(data){
                    if(data == 0){
                        $('.pop_info').text('Удаленно из  избранного');
                    }else{
                        $('.pop_info').text('Добавленно в избранное');
                    }
                   $('.pop_info').fadeIn(400).delay(500).fadeOut(800);
               }
           });

        });



    },
    chat:function(){
        setInterval(function(){
            $.ajax({
                url:BASE_URL+"user/check_chat",
                method:"POST",
                success:function(data){
                    if(data !=''){
                        var ms = $.parseJSON(data);
                        $('.msg_pop_text').text(ms.text);
                        $('.msg_pop_con').data('id',ms.id);
                        $('.msg_pop_con').slideDown(250);
                    }
                }
            });
        },4000);

        $('.msg_pop_con').on('click',function(){
            $.ajax({
                url:BASE_URL+"user/check_view",
                method:"POST",
                data:'i='+$(this).data('id'),
                success:function(){
                    $('.msg_pop_con').slideUp(250);
                }

            });
        });

    }
}

MSG.init();
MSG.chat();