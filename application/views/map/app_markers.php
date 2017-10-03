<div class="no_app">
    <script>
    map_markers = [];
var BASE_URL = 'https://stassociation.com/';
<?foreach($markers as $key => $marker){?>
    var info_marker<?=$marker->marker_id?> = new google.maps.Marker({
    position:  {lat: <?=$marker->lat?>, lng:<?=$marker->lng?>},
    map: addMAP,
    icon:BASE_URL+'icon/<?=$marker->type_name?>.png'
    });
var ninfowindow<?=$marker->marker_id?> = new google.maps.InfoWindow({
    content:'<div class="panel mg0"><b>Added:</b> <?=date('m.d.Y H:i', $marker->date_add)?></div>'+'<div data-l="<?=$key?>" data-id="<?=$marker->marker_id?>" class="btn del_info_marker btn-default btn-block mgb5">Delete marker</div>'
       ,
    maxWidth: 320
});
map_markers.push(info_marker<?=$marker->marker_id?>);
google.maps.event.addListener(info_marker<?=$marker->marker_id?>,'click',function() {
    ninfowindow<?=$marker->marker_id?>.open(addMAP, info_marker<?=$marker->marker_id?>);
});
<?}?>
</script>
</div>