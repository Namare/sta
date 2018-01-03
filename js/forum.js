FRM = {
    LOGIN:'',
    nologin:function(){
        $.ajax({
            'method':'POST',
            'url':BASE_URL+'forum/nologin',
            success:function(data){
                FRM.LOGIN = data;
            }

        });

    },

    loginWindow:function(){
        if( FRM.LOGIN){
            return true;
        }else{
            $('#loginModal').modal();
            return false;
        }
    },
    init:function(){
        FRM.nologin();
        $('.load_feed').load(BASE_URL+'forum/feed');

        $('.forum_login').on('click',function(){
            $.ajax({
                method:'POST',
                url:BASE_URL + 'forum/login',
                data:'e='+$('.forum_email').val()+"&p="+$('.forum_pass').val(),
                success:function(data){
                    if(data){
                        window.location.reload();
                    }else{
                       $('.forum_err').html(' <div class="alert alert-danger"><strong>Wrong!</strong> Wrong username or password.</div>');
                    }
                }
            });
        });

       if($('.app-clock').data('time')!= undefined){

           $.each($('.app-clock'), function(){
               var timestamp =  $(this).data('time') * 1000;
               var date = new Date();
               date.setTime(parseInt(timestamp));
               $(this).find('span').text(
                   date.toLocaleString()
               );
           });
       }



        $('.thumb_up').on('click',function(){
            if(!FRM.loginWindow()){return false}
            var th =  $(this).children('span');
           $.ajax({
               'method':'POST',
               'url':BASE_URL+'forum/add_like',
               'data':'i='+$(this).data('id'),
               success:function(data){

                   if(data == 2){
                      th.text(parseInt(th.text()) - parseInt(1));
                   }
                   else if(data == 1){
                      th.text(parseInt(th.text()) + parseInt(1));
                   }
               }
           });
        });
        $('.thumb_down').on('click',function(){
            if(!FRM.loginWindow()){return false}
            var th =  $(this).children('span');
           $.ajax({
               'method':'POST',
               'url':BASE_URL+'forum/add_dislike',
               'data':'i='+$(this).data('id'),
               success:function(data){

                   if(data == 2){
                      th.text(parseInt(th.text()) - parseInt(1));
                   }
                   else if(data == 1){
                      th.text(parseInt(th.text()) + parseInt(1));
                   }
               }
           });
        });


        $(document).on('click',function(a){
            if($(a.target).hasClass('col-md-12')){
                $('.smiles_table').hide();
                $('.share_box').hide(200);
            }

            });

        $('.forum_smile').on('click',function(){
            if(!FRM.loginWindow()){return false}
            $('.smiles_table').toggle();
        });
        $('.smiles_table img').on('click',function(){
            $('.smiles_table').hide();
        });


        $('.forum_quote').on('click',function(){
            if(!FRM.loginWindow()){return false};

            $("html, body").animate({ scrollTop: $(document).height() }, 1000);
            var com = $(this).parent().parent().parent().find('.current_comment').html();
            var com_autor = $(this).parent().parent().parent().find('.comment_autor').text();
            $('#new_comment_reply').val('<blockquote class="blockquote"><p class="mb-0">'+$.trim(com)+'</p><footer class="blockquote-footer">'+$.trim(com_autor)+'</footer></blockquote>');
        });

        $('.report_btn .btn-block').on('click', function(){
            $('#reportModal').modal('hide');

            $.ajax({
                'url':BASE_URL+"forum/send_report",
                'type':"POST",
                data:'i='+USER_ID+'&p='+$('.report_btn').data('id')+'&r='+$(this).data('id')
            });
        });



        $('.upload_link').on('click',function(){
            var formData = new FormData($('form.up_img')[0]);
            if(!FRM.loginWindow()){return false}
            var com = $('#new_comment').val();
            $.ajax({
                url: BASE_URL+"forum/send_image",
                type: "POST",
                data: formData,
                contentType: 'multipart/form-data',
                success: function (msg) {

                    com += '<img class="forum_images" src ="'+BASE_URL+'images/forum/'+USER_ID+'/'+msg+'">';
                    $('#new_comment').val(com);

                    $('#uploadModal').modal('hide');

                },
                cache: false,
                contentType: false,
                processData: false
            });


        });


        $('.insert_link').on('click',function(){
            if(!FRM.loginWindow()){return false}

            var com = $('#new_comment').val();
            com += '<img class="forum_images" src ="'+$('.image_link').val()+'">';
            $('#new_comment').val(com);

            $('#uploadModal').modal('hide');

        });

        $('.insert_youtube').on('click',function(){
            if(!FRM.loginWindow()){return false}

            var com = $('#new_comment').val();
            com += ' <iframe width="100%" height="300" src="https://www.youtube.com/embed/'+$('.youtube_link').val().substring(32)+'" frameborder="0" allowfullscreen></iframe>';
            $('#new_comment').val(com);

            $('#youtubeModal').modal('hide');

        });

        $('.delete_thread').on('click',function(){
            if(!FRM.loginWindow()){return false}

            $.ajax({
                method:'post',
                url:BASE_URL+'forum/delete_thread',
                data:'id='+$(this).data('id'),
                success:function(){
                    window.location.href = BASE_URL+'forum';
                }

            });


        });


        $('.forum_del_com').on('click', function(){
            var th =  $(this);
            var com_id = th.data('id');
            $.ajax({
                method:'POST',
                url: BASE_URL+'forum/del_comment',
                data: 'id='+ com_id,
                    success:function(){
                        $('.comment_block[data-id="'+com_id+'"]').slideUp(300);

                    }
            });
        });

        $('.forum_share').on('click',function(){$(this).parent().find('.share_box').toggle(200)});

    }


}

FRM.init();