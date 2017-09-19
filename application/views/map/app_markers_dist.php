<script>
    map_markers_dist = [];

    <?foreach($markers as $marker){?>
    var info_marker_dist<?=$marker->marker_id?> = new google.maps.Marker({
        position:  {lat: <?=$marker->lat?>, lng:<?=$marker->lng?>},
        id: <?=$marker->marker_id?>,
        type: '<?=$marker->type_name?>'
    });

    map_markers_dist.push(info_marker_dist<?=$marker->marker_id?>);

    <?}?>
</script>