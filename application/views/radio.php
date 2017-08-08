<div class="col-xs-12 col-sm-12 pad0">
    <?foreach($radios as $radio){?>
    <div data-audio="<?=$radio->audio?>" class="col-xs-12 col-sm-12 radio-block pad0">

        <div class=" radio-img pad0"><img src="<?=$radio->img?>" ></div>
        <div class=" radio-head"><?=$radio->name?></div>
    </div>
    <?}?>
</div>