function geoFindMe() {
    var output = document.getElementById("out");

    if (!navigator.geolocation){
        output.innerHTML = "<p>Geolocation is not supported by your browser</p>";
        return;
    }

    function success(position) {
        var latitude  = position.coords.latitude;
        var longitude = position.coords.longitude;

        output.innerHTML = '<p>Latitude is ' + latitude + '° <br>Longitude is ' + longitude + '°</p>';

        var img = new Image();
        img.src = "http://maps.googleapis.com/maps/api/staticmap?center=" + latitude + "," + longitude + "&zoom=13&size=300x300&sensor=false";

        output.appendChild(img);
    };

    function error() {
        output.innerHTML = "Unable to retrieve your location";
    };

    output.innerHTML = "<p>Locating…</p>";

    navigator.geolocation.getCurrentPosition(success, error);
}
ADM
    = {

   contol_user: function(){
            $('#new_user').on('click',function(){
                $.ajax({
                    method:'POST',
                    url:BASE_URL+'admin/new_user',
                    data:"username=" +$('input[name="username"]').val()+
                        "&email=" +$('input[name="email"]').val()+
                        "&first_name=" +$('input[name="first_name"]').val()+
                        "&last_name=" +$('input[name="last_name"]').val()+
                        "&company=" +$('input[name="company"]').val()+
                        "&password=" +$('input[name="password"]').val()+
                        "",
                    success:function(){location.reload();}
                });
            });

            $('.change_premium').on('click',function(){
                $.ajax({
                    url:BASE_URL+'admin/change_premium',
                    method:"POST",
                    data:'i='+$(this).data('id'),
                    success:location.reload()
                });
            });

            $('.del_user').on('click',function(){
                $.ajax({
                    method:'POST',
                    url:BASE_URL+'admin/del_user',
                    data:"user_id=" +$(this).data('id')+
                        "",
                    success:function(){location.reload();}
                });
            });





    },
    control_company: function(){
        $('#new_company').on('click',function(){
            $.ajax({
                method:'POST',
                url:BASE_URL+'admin/new_company',
                data:"company_name=" +$('input[name="company_name"]').val()+
                    "&company_type=" +$('input[name="company_type"]').val()+
                    "&company_description=" +$('textarea[name="company_description"]').val()+
                                      "",
                success:function(){location.reload();}
            });
        });

        $('.del_company').on('click',function(){
            $.ajax({
                method:'POST',
                url:BASE_URL+'admin/del_company',
                data:"company_id=" +$(this).data('id')+
                    "",
                success:function(){location.reload();}
            });
        });

    },
    control_forum:function(){
        sw = null;
        parent_f = null;
        $('.add_btn').on('click',function(){
            if($(this).data('id_forum')!=undefined){
                $('b.edit_forum_head').text('Добавить форум в группу: '+$(this).data('name'));

                sw = 'forum';
                parent_f =$(this).data('id_forum') ;
                $('.hd').show();
            }
            if($(this).data('id_post')!=undefined){
                $('b.edit_forum_head').text('Добавить тему в форум: '+$(this).data('name'));
                sw = 'subforum';
                parent_f =$(this).data('id_post') ;
                $('.hd').hide();
            }

        });

        $('#add_new_fr').on('click',function(){
            if(sw == 'forum'){
                $('textarea[name="desc"]').show();
                $.ajax({
                    method:'POST',
                    url:BASE_URL+'admin/forum_add',
                    data:'title='+$('input[name="th_title"]').val()+'' +
                        '&desc='+$('textarea[name="desc"]').val()+
                        '&parent='+parent_f,
                    success:function(){location.reload();}
                });
            }

            if(sw == 'subforum'){
                $.ajax({
                    method:'POST',
                    url:BASE_URL+'admin/subforum_add',
                    data:'title='+$('input[name="th_title"]').val()+
                        '&parent='+parent_f,
                    success:function(){location.reload();}
                });
            }
        });

        //update

        $('input[name="rename"]').on('change',function(){
            $.ajax({
                method:'POST',
                url:BASE_URL+'admin/forum_update',
                data:'title='+$(this).val()+
                    '&id='+$(this).data('id')
            });
        });

        $('input[name="rename_sub"]').on('change',function(){
            $.ajax({
                method:'POST',
                url:BASE_URL+'admin/subforum_update',
                data:'title='+$(this).val()+
                    '&id='+$(this).data('id')
            });
        });
    },
    control_pages:function(){
        $('.add_page').on('click',function(){
            $.ajax({
                method:'POST',
                url:window.location.href,
                data:'title='+$('input[name="title"]').val(),
                success:window.location.reload()
            });
        });

        $('.del_page').on('click',function(){
            $.ajax({
                method:'POST',
                url:window.location.href,
                data:'del_id='+$(this).data('id'),
                success:window.location.reload()
            });
        });

        $('.save_page').on('click',function(){
            $.ajax({
                method:'POST',
                url:window.location.href,
                data:'title='+$('input[name="title"]').val()+
                    '&content='+tinyMCE.get('content').getContent(),
                success:function(){
                    window.location.href = window.location.href;
                }
            });
        });
    },
    menu_edit:function(){
        $('#add_new_menu').on('click',function(){
        $.ajax({
            method:'POST',
            url:BASE_URL+'admin/add_menu',
            data:'name='+$('input[name="menu_name"]').val()+
                '&url='+$('input[name="menu_url"]').val(),
            success:window.location.reload()
        });
        });

        $('.delete_menu').on('click',function(){
            $.ajax({
                method:'POST',
                url:BASE_URL+'admin/delete_menu',
                data:'id='+$(this).data('id'),
                success:window.location.reload()
            });
        });

        $('.edit_menu_modal').on('click',function(){
            $('input[name="edit_menu_name"]').val($(this).data('name'));
            $('input[name="edit_menu_url"]').val($(this).data('url'));

            $('#edit_main_menu').attr('rel',$(this).data('id'));
        });

        $('#edit_main_menu').on('click',function(){
            $.ajax({
                method:'POST',
                url:BASE_URL+'admin/update_menu',
                data:'id='+$(this).attr('rel')+'' +
                    '&url='+ $('input[name="edit_menu_url"]').val()+
                    '&name='+ $('input[name="edit_menu_name"]').val(),
                success:function(){
                    window.location.href=BASE_URL+"admin/edit_menu";
                }
            });
        });

        $('.add_submenu').on('click',function(){
            $('#add_submenu').attr('rel',$(this).data('id'));
        });
        $('#add_submenu').on('click',function(){
            $.ajax({
                method:'POST',
                url:BASE_URL+'admin/add_submenu',
                data:'id='+$(this).attr('rel')+'' +
                    '&url='+ $('input[name="add_submenu_url"]').val()+
                    '&name='+ $('input[name="add_submenu_name"]').val(),
                success:function(){
                    window.location.href=BASE_URL+"admin/edit_menu";
                }
            });
        });

        $('.del_submenu').on('click',function(){
            $.ajax({
                method:'POST',
                url:BASE_URL+'admin/delete_submenu',
                data:'id='+$(this).data('id'),
                success:function(){
                    window.location.href=BASE_URL+"admin/edit_menu";
                }
            });
        });

        $('.edit_submenu').on('click',function(){
            $('input[name="edit_submenu_name"]').val($(this).data('name'));
            $('input[name="edit_submenu_url"]').val($(this).data('url'));

            $('#edit_submain_menu').attr('rel',$(this).data('id'));
        });

        $('#edit_submain_menu').on('click',function(){
            $.ajax({
                method:'POST',
                url:BASE_URL+'admin/update_submenu',
                data:'id='+$(this).attr('rel')+'' +
                    '&url='+ $('input[name="edit_submenu_url"]').val()+
                    '&name='+ $('input[name="edit_submenu_name"]').val(),
                success:function(){
                    window.location.href=BASE_URL+"admin/edit_menu";
                }
            });
        });






    }

}




