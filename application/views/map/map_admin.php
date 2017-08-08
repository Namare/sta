<div class="col-md-4  markers_adm panel panel-default ">
    <div class="panel-heading admp7"><i class="fa fa-map-marker" aria-hidden="true"></i> Список маркеров <button onclick="$('.markers_adm').slideToggle()" class="btn pull-right btn-default pad3 mgt-5"><i class="fa no-ico fa-times-circle"></i></button></div>
    <div class="panel-body">Обновите страницу после изменений</div>
    <div class="map_ower">
    <table class="table table-hover">
        <?foreach($markers as $marker){?>
        <tr>
            <td><img style="height: 50px"  src="<?=base_url()?>icon/<?=$marker->type_name?>.png"></td>
            <td><?=$this->ion_auth->user($marker->user_id)->row()->username?></td>
            <td><?=date('d.m h:i',$marker->date_add)?></td>

            <td>
                <div class="col-md-12 btn-group btn-group-xs">
                    <button class="btn btn-default marker_desc" data-placement="bottom" title="<?=$marker->type_desc?>"><i class="fa fa-info-circle" aria-hidden="true"></i></button>
                    <button class="btn btn-default del_marker" data-id="<?=$marker->marker_id?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </div>
            </td>
        </tr>
        <?}?>
    </table>
    </div>
</div>