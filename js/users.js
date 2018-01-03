USR = {
    init:function(){

        $('.send_comment').on('click',function(){
            $.ajax({
                'method':'POST',
                'url':BASE_URL+'user/send_comment_user',
                data:'u=' +$(this).data('id')+
                    '&c='+$('.user_coment').val(),
                success:function(){
                    location.reload();
                }
            });

        });


        $('.toggl_block').on('click',function(){
            $(this).parent().parent().parent().find('div.cls').fadeToggle(150);
            if($(this).children('i').attr('class')=='fa fa-caret-up no-ico'){
                $(this).children('i').attr('class','fa fa-caret-down no-ico');
            }
            else{
                $(this).children('i').attr('class','fa fa-caret-up no-ico');
            }

        });

        $('.table_attach img').on('click',function(){
            var src = $(this).attr('src');
            $('#modal_img').attr('src',src);
        });


        $('input[name="profilephone"]').on('change',function(){
            $.ajax({
                method:'POST',
                url:BASE_URL+'user/phone',
                data:'p='+$(this).val()

            });
        });

        $('select[name="group"]').on('change',function(){
            $.ajax({
                method:'POST',
                url:BASE_URL+'user/group',
                data:'p='+$(this).val()

            });
        });

        $('input[name="profcdl"]').on('change',function(){
            $.ajax({
                method:'POST',
                url:BASE_URL+'user/howcdl',
                data:'p='+$(this).val()

            });
        });
        $('input[name="proflastname"]').on('change',function(){
            $.ajax({
                method:'POST',
                url:BASE_URL+'user/lastname',
                data:'p='+$(this).val()

            });
        });

        $('input[name="proffirstname"]').on('change',function(){
            $.ajax({
                method:'POST',
                url:BASE_URL+'user/firstname',
                data:'p='+$(this).val()

            });
        });

        $('input[name="profileaddress"]').on('change',function(){
            $.ajax({
                method:'POST',
                url:BASE_URL+'user/address',
                data:'p='+$(this).val()

            });
        });

        $('select[name="profileload"]').on('change',function(){
            $.ajax({
                method:'POST',
                url:BASE_URL+'user/auto',
                data:'p='+$(this).val()

            });
        });

        $('input[name="profilewebsite"]').on('change',function(){
            $.ajax({
                method:'POST',
                url:BASE_URL+'user/website',
                data:'p='+$(this).val()

            });
        });

        $('input[name="premiumdit"]').on('change',function(){
            $.ajax({
                method:'POST',
                url:BASE_URL+'user/dit',
                data:'p='+$(this).val()

            });
        });
        $('input[name="premiummc"]').on('change',function(){
            $.ajax({
                method:'POST',
                url:BASE_URL+'user/mc',
                data:'p='+$(this).val()

            });
        });
        $('input[name="premiumname"]').on('change',function(){
            $.ajax({
                method:'POST',
                url:BASE_URL+'user/policyname',
                data:'p='+$(this).val()

            });
        });

        $('select[name="profilecompany"]').on('change',function(){
            $.ajax({
                method:'POST',
                url:BASE_URL+'user/company',
                data:'p='+$(this).val()

            });
        });

        $('textarea[name="profileabout"]').on('change',function(){
            $.ajax({
                method:'POST',
                url:BASE_URL+'user/about',
                data:'a='+$(this).val()

            });
        });


    },
    user_orders:function(){
        $('.load_addition').on('click',function(){
            $('.additional_info').text($(this).data('text'))
            $('.additional_info_data').load(BASE_URL+'order_id/'+$(this).data('id')+' .to-load');
            $('.addit_id').text($(this).data('id')) ;
            $('.set_accept').data('id',$(this).data('id'));
            $('.set_dicline').data('id',$(this).data('id'));

        });

        $('.load_docs').on('click',function(){
         $('.load_adding_file').load(BASE_URL+'user/get_addition_files/'+$(this).data('id'));
        });


        $('.set_accept').on('click',function(){
            $.ajax({
                method:'POST',
                url:BASE_URL+'user/update_accept',
                data:'i='+$(this).data('id'),
                success:window.location.reload()
            });
        });


        $('.set_dicline').on('click',function(){
            $.ajax({
                method:'POST',
                url:BASE_URL+'user/update_dicline',
                data:'i='+$(this).data('id'),
                success:window.location.reload()
            });
        });

        $('.findbyid').on('input',function(){
            var find = $(this).val();
            $('tr[rel="orderid"]').each(function(){
                if(find.length<4){
                    $('tr[rel="orderid"]').show();

                }
                if($(this).data('id')!=find){
                    $(this).hide();
                }else{
                    $(this).show();
                }
            })
        });

    },
    user_status:function(){


        $('.user_status').on('dblclick',function(){
            var st = $(this).text();
            var text = '<input class="form-control st_f" value="'+st+'" name="status"><button class="btn btn-primary st_save">Save</button>';

            $(this).html(text);

            $('.st_save').on('click',function(){
                $.ajax({
                    url:BASE_URL +'user/update_status',
                    method:'POST',
                    data: 't='+$('.st_f').val(),
                    success:function(){
                        $('.user_status').text($('.st_f').val());
                    }

                })
            });
        });
    },
    order:function(){
        $.getJSON('/user/get_dispatch_user/'+$('span.order_id').text(), function(data){
            $('.current_user span').html('<a target="_blank" href="'+BASE_URL+'user/user_id/'+data.id+'">'+data.user+"</a>");
            $('.current_user span').data('id',data.id);

        });
        $( ".find_drivers" ).autocomplete({
                minLength: 0,
                source: projects
        });
        $( ".find_drivers_all" ).autocomplete({
                minLength: 0,
                source: drivers
        });

        $('.inp_list input, .inp_list select, .inp_list textarea').on('change',function(){
            $.ajax({
                url:BASE_URL+'user/update_order',
                method:'post',
                data:'i='+$('span.order_id').text() +
                    "&n="+$(this).attr('name')+'&v='+$(this).val()
            })
        });

        $('.delete_load').on('click',function(){
            $.ajax({
                url:BASE_URL+'user/delete_order',
                method:'post',
                data:'i='+$('span.order_id').text(),
                success:function(){
                    window.location = BASE_URL+'user'
                }

            })
        });



        $('.add_select_attach').on('click',function(){
            $.ajax({
                url:BASE_URL+'user/add_select_attach',
                method:'post',
                data:'a='+$('.select_attach option:selected').val()+'&i='+$('span.order_id').text(),
                success:function(){
                    $('.load_order_docs').load(BASE_URL+'user/order_attach/'+$('span.order_id').text());
                    alert('Документ добавлен');
                }

            })
        });
        $('body').on('click','.delete_att_order',function(){
            $.ajax({
                method:"POST",
                url:BASE_URL+'user/del_order_attach',
                data:'i=' +$(this).data('id'),
                success:function(){
                    $('.load_order_docs').load(BASE_URL+'user/order_attach/'+$('span.order_id').text());
                }
            });
        });



        $('.user_questions').on('click',function(){
            $.ajax({
               "method":"POST",
               "url":BASE_URL+'user/get_user_questions',
               "data":'i=' + $(this).data('id') +
                   '&o=' + $('span.order_id').text(),
               success:function(data){
                   $('.load_user_comment').html(data);
               }

            });
        });
        $('.load_order_comment').load(BASE_URL+'user/get_order_comment?id='+$('span.order_id').text());
        $('.load_order_docs').load(BASE_URL+'user/order_attach/'+$('span.order_id').text());
        $('.list_from_all tr').hide();



        $('.set_disp').on('click',function(){
            $.ajax({
                'method':'POST',
                'url':BASE_URL+'user/set_dispatch_user/'+$('span.order_id').text(),
                'data':'id='+$(this).data('id'),
                success:function(){
                    $.getJSON('/user/get_dispatch_user/'+$('span.order_id').text(), function(data){
                        $('.current_user span').text(data.user)
                        $('.current_user span').data('id',data.id);
                    });
                }
            });
        });

        $('.undisp').on('click',function(){
            $.ajax({
                'method':'POST',
                'url':BASE_URL+'user/set_dispatch_user_null/'+$('span.order_id').text(),
                success:function(){
                    $.getJSON('/user/get_dispatch_user/'+$('span.order_id').text());
                        $('.current_user').find('span').text('');
                        $('.current_user').find('span').data('id','');

                }
            });
        });


    },
     search_d: function(){
            var find =$('.find_drivers').val();

            $('.list_candr td').each(function(){
                var th =$(this);
                var el = $(this).text();
                if(find==''){
                    $('.list_candr td').show();
                    return false;

                }

                $.each(el.split('',2),function(a,i){
                    if(find[a] == undefined){return false;}
                    if(i!=find[a]){
                        th.hide();
                    }else{
                        th.show();
                    }
                });
            });

        }
    ,
    search_from_all:function(){
        var find =$('.find_drivers_all').val();

        $('.list_from_all tr').each(function(){
            var th =$(this);
            var el = $(this).find('td').text();

            $.each(el.split('',2),function(a,i){
                if(find[a] == undefined){return false;}
                if(i!=find[a]){
                    th.hide();
                }else{
                    th.show();
                }
            });
        });
    },
    user_attach:function(){

        $('.open_att').on('click',function(){
            $('input[name="uatt_name"]').val($(this).data('name'));
            $('input[name="uatt_name"]').data('id',$(this).data('id'));
            $('textarea[name="uatt_desc"]').val($(this).data('desc'));
            if($(this).data('ip')==1){
                $('input[name="is_profile"]').attr('checked',true);
            }else{
                $('input[name="is_profile"]').attr('checked',false);
            }
            var type_img = [
                '.jpg',
                '.jpeg',
                '.png',
                '.JPEG',
                '.JPG'
            ];
            if($.inArray($(this).data('type'),type_img) == -1){
            $('.embed').attr('src',"http://docs.google.com/viewer?embedded=true&url="+BASE_URL+'file/'+$(this).data('name_code')+$(this).data('type'));
            }else{
                $('.embed').attr('src',BASE_URL+'file/'+$(this).data('name_code')+$(this).data('type'));
            }
        });

        $('.attach_update').on('click',function(){
            var ch = $('input[name="is_profile"]').is(':checked')?'1':'0';
            $.ajax({
                method:'post',
                url:BASE_URL+'user/update_attach',
                data:'n=' +$('input[name="uatt_name"]').val()+
                    '&d='+$('textarea[name="uatt_desc"]').val()+
                    '&i='+$('input[name="uatt_name"]').data('id')+
                    '&is='+ch,
                success:function(){$('#attach_modal').modal('hide');}
            });
        });

        $('.delete_attach').on('click',function(){
            $.ajax({
                method:'post',
                url:BASE_URL+'user/delete_attach',
                data:"i="+$(this).data('id'),
                success:window.location.reload()
            });
        });



    }
}

USR.init();