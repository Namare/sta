<script>
 map_markers = [];
var BASE_URL = 'http://stassociation.com/';
<?foreach($markers as $marker){?>
    var info_marker<?=$marker->marker_id?> = new google.maps.Marker({
    position:  {lat: <?=$marker->lat?>, lng:<?=$marker->lng?>},
    map: addMAP,
    animation: google.maps.Animation.DROP,
    icon:BASE_URL+'icon/<?=$marker->type_name?>.png'
    });
var ninfowindow<?=$marker->marker_id?> = new google.maps.InfoWindow({
    content:'<div class="panel mg0"><b>Added:</b> <?=date('d.m h:i', $marker->date_add)?></div>'
       ,
    maxWidth: 320
});
map_markers.push(info_marker<?=$marker->marker_id?>);
google.maps.event.addListener(info_marker<?=$marker->marker_id?>,'click',function() {
    ninfowindow<?=$marker->marker_id?>.open(addMAP, info_marker<?=$marker->marker_id?>);
});
<?}?>
</script>