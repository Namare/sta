<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<div class=" col-md-4 btn-group btn-group-sm map_menu">
    <button  class="btn btn-default hide_track"><i class="fa fa-truck" aria-hidden="true"></i> <span>Hide truck</span></button>
    <button  class="btn btn-default hide_police"><i class="fa fa-taxi" aria-hidden="true"></i> <span>Show police</span></button>
    <button class="btn btn-default hide_alert"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <span>Show warnings</span></button>
    <button class="btn btn-default map_submenu"><i class="fa fa-plus" aria-hidden="true"></i></button>
    <?if($this->ion_auth->is_admin()){?>
        <button class="btn btn-default map_admin_submenu"><i class="fa fa-map-marker" aria-hidden="true"></i></button>
    <?}?>
    <div class="form-group-sm col-md-4 pad0">
<?if($this->ion_auth->logged_in()){?>
    <select  class="form-control  change_status">
        <option value="1">Driving</option>
        <option value="2">Sleeping</option>
        <option value="3">On duty</option>
        <option value="4">Not driving</option>
        <option value="5">Off duty</option>
    </select>
    </div>
<?}?>

</div>
<div class=" col-md-4 map_marker_menu panel panel-default">
        <div class="panel-heading"><i class="fa fa-map" aria-hidden="true"></i> Выберите Маркер   <button onclick="$('.map_marker_menu').slideToggle()" class="btn pull-right btn-default mgt-5"><i class="fa no-ico fa-times-circle"></i></button></div>
        <div class="panel-body marker_info">
           Выберите маркер их списка и утановите на карту

        </div>
    <div class="map_ower">
    <table class="table table-hover ">
        <tbody>
        <?foreach($map_markers as $marker){?>
        <tr class="mid mid<?=$marker->type_id?>">
            <td><img style="height: 50px"  src="<?=base_url()?>icon/<?=$marker->type_name?>.png"></td>
            <td>
                <div class="col-md-12 btn-group btn-group-xs">

                    <button class="btn btn-default select_marker" data-id="<?=$marker->type_id?>"  data-name="<?=$marker->type_name?>"><i class="fa fa-map-marker" aria-hidden="true"></i> Установить</button>

                    <button class="btn btn-default "><i class="fa fa-info-circle" aria-hidden="true"></i> <?=$marker->type_desc?></button>
                </div>
            </td>
        </tr>
        <?}?>
        </tbody>
    </table>
    </div>
</div>



<div class="col-md-12 ">
<div id="map" style="width:100%;height:600px;"></div>
</div>

<div style="display: none">
    <?foreach($users as $user){
        if( $user->status_id == 0)continue;
      if( $user->status_id == 5)continue;

        ?>

    <div data-user-id="<?=$user->id?>" data-lat="<?=$user->lat?>" data-lng="<?=$user->lng?>" data-status="<?=$user->status_id?>" class="p">
        <table class="table  borderless infomap" >
            <tr>
                <td class="col-md-1"><i class="fa fa-user-circle-o" aria-hidden="true"></i></td>
                <td><a target="_blank" href="<?base_url()?>user/user_id/<?=$user->id?>"><?=$user->username?> </a></td>
            </tr>
            <tr>
                <td><i class="fa fa-microphone" aria-hidden="true"></i></td>
                <td><?=@$this->db->get_where('profile_status',array('user_id'=>$user->user_id))->result()[0]->status_text?></td>
            </tr>
            <tr>
                <td><i class="fa fa-truck" aria-hidden="true"></i></td>
                <td><?=$this->db->get_where('type_auto',array('auto_id'=>$user->auto_id))->result()[0]->auto_name?></td>
            </tr>
        </table>
    </div>
    <?}?>
</div>

    <link rel="stylesheet" type="text/css" href="<?=base_url()?>style/map.css?<?=rand(1,10000)?>" >

    <script>
        $(function(){
            $('.submenu, nav').hide();


            $('.change_status').on('change',function(){
                $.ajax({
                    method:'POST',
                    url:BASE_URL+'auth/app_change_status',
                    data:'s='+$(this).val()
                });
            });
            $('.change_status option[value="<?=$this->ion_auth->user()->row()->status_id?>"]').attr('selected','selected');

            var mapCanvas = document.getElementById("map");
            var myCenter=new google.maps.LatLng(44.5,-96.1);
            var mapOptions = {
                center: myCenter,
                zoom: 4
            };


             addMAP = new google.maps.Map(mapCanvas, mapOptions);
             track_marker = [];
             alert_marker = [];
             police_marker = [];
            $('.p').each(function(data){
                var st = '';
                if($(this).data('status')== '1'){
                     st = ''
                }

                if($(this).data('status')== '2'){
                     st = '1'
                }

                if($(this).data('status')== '3'){
                     st = '3'
                }

                if($(this).data('status')== '4'){
                     st = '2'
                }
                var marker = new google.maps.Marker({
                    position:  {lat: $(this).data('lat'), lng:$(this).data('lng')},
                    map: addMAP,
                    animation: google.maps.Animation.DROP,
                    icon:BASE_URL+'icon/track'+st+'.png'
                });
                track_marker.push(marker);
                var infowindow = new google.maps.InfoWindow({
                    content:$(this).html(),
                    maxWidth: 320
                });
                google.maps.event.addListener(marker,'click',function() {
                    infowindow.open(addMAP, marker);
                });
            });




            <?foreach($info_markers  as $im){?>
            var info_marker<?=$im->marker_id?> = new google.maps.Marker({
                position:  {lat: <?=$im->lat?>, lng:<?=$im->lng?>},
                map: addMAP,
                animation: google.maps.Animation.DROP,
                icon:BASE_URL+'icon/<?=$im->type_name?>.png'
            });

            var cut_type = '<?=$im->type_name?>';
            if(cut_type == 'police' ){
                info_marker<?=$im->marker_id?>.setMap(null);
                police_marker.push(info_marker<?=$im->marker_id?>);
            }
            else{
                info_marker<?=$im->marker_id?>.setMap(null);
                alert_marker.push(info_marker<?=$im->marker_id?>);
            }

            var ninfowindow<?=$im->marker_id?> = new google.maps.InfoWindow({
                content:'<div class="panel mg0"><b>Added:</b> <?=date('d.m h:i', $im->date_add)?></div> <br>' +
                    '<div data-id="<?=$im->marker_id?>" class="btn del_info_marker btn-default btn-block mgb5">Delete marker</div>',
                maxWidth: 320
            });
            google.maps.event.addListener(info_marker<?=$im->marker_id?>,'click',function() {
                ninfowindow<?=$im->marker_id?>.open(addMAP, info_marker<?=$im->marker_id?>);
            });
            <?}?>




            $('.hide_track').on('click',function(){
                if($(this).find('span').text() == 'Hide truck'){
                    var map = null;
                    $(this).find('span').text('Show truck');
                }else{
                    var map = addMAP;
                    $(this).find('span').text('Hide truck');
                }

                for (var i = 0; i < track_marker.length; i++) {
                    if(map!=null){
                        track_marker[i].setAnimation(google.maps.Animation.DROP);
                    }
                    track_marker[i].setMap(map);
                }
            });

            $('.hide_police').on('click',function(){
                if($(this).find('span').text() == 'Show police'){
                    var map = addMAP;
                    $(this).find('span').text('Hide police');
                }else{
                    var map = null;
                    $(this).find('span').text('Show police');
                }

                for (var i = 0; i < track_marker.length; i++) {
                    if(map!=null){
                        police_marker[i].setAnimation(google.maps.Animation.DROP);
                    }
                    police_marker[i].setMap(map);
                }
            });

            $('.hide_alert').on('click',function(){
                if($(this).find('span').text() == 'Show warnings'){
                    var map = addMAP;
                    $(this).find('span').text('Hide warnings');
                }else{
                    var map = null;
                    $(this).find('span').text('Show warnings');
                }

                for (var i = 0; i < track_marker.length; i++) {
                    if(map!=null){
                        alert_marker[i].setAnimation(google.maps.Animation.DROP);
                    }
                    alert_marker[i].setMap(map);
                }
            });

            $('.marker_desc').tooltip();
            $('.map_submenu').on('click',function(){
                $('.map_marker_menu').slideToggle();
            });

            $('body').on('click','.del_info_marker',function(){
                $.ajax({
                    url:BASE_URL+'map/del_info_marker',
                    method:'POST',
                    data:'i='+$(this).data('id')

                });
                $(this).parent().parent().parent().parent().hide()
            });

            //add marker
           current_marker = null;
            $('.select_marker').on('click',function(){
                current_marker = {
                    id:$(this).data('id'),
                    name:$(this).data('name')
                };
                $('tr.mid').css({"background-color":"#fff"});
                $('tr.mid'+current_marker.id+'').css({"background-color":"#ececec"})
            });
            addMAP.addListener('click',function(e) {
                $('.map_marker_menu').hide();
                if(current_marker!=null){
                    var new_marker = new google.maps.Marker({
                        position:  e.latLng,
                        map: addMAP,
                        animation: google.maps.Animation.DROP,
                        icon:BASE_URL+'icon/'+current_marker.name+'.png'
                    });

                    $.ajax({
                        url:"<?base_url()?>map/add_marker",
                        method:'POST',
                        data:"id="+current_marker.id+"" +
                            "&lat="+e.latLng.lat()+
                            "&lng="+e.latLng.lng()
                    });
                    current_marker = null;
                    $('tr.mid').css({"background-color":"#fff"})
                }
            });




        });





    </script>
<?if($this->ion_auth->is_admin()){?>
    <script src="<?=base_url()?>js/admin_map.js?<?=rand(1,1000)?>"></script>
<?}?>