$(function(){
$('.map_admin_submenu').on('click',function(){
   $('.markers_adm').slideToggle();
});

$('.del_marker').on('click',function(){
    var th = $(this);
    $.ajax({
        url:BASE_URL+'map/ctrl_marker',
        method:"POST",
        data:'id='+$(this).data('id'),
        success:function(){
            th.parent().parent().parent().hide();
        }
    });
});

});