
<div class="col-md-12">
    <div class="white_block col-md-12">
        <div class="col-md-12 event_title pad5 mgb5" style="font-size: 24px; border-bottom: 2px solid #eee">Other events</div>
        <div class="row ">
            <?foreach($events as $event){?>

                <div class="col-md-3 ">
                    <div class="thumbnail">
                        <a href="<?=base_url()?>events/page/<?=$event->id?>"> <img  style="width: 100%; height:165px" src="<?=base_url()?>file/events/<?=$event->cover?>"></a>

                        <div class=" caption" style="min-height: 60px">
                            <a href="<?=base_url()?>events/page/<?=$event->id?>"><?=$event->event_title?></a>
                        </div>
                    </div>
                </div>

            <?}?>
        </div>
    </div>
</div>
