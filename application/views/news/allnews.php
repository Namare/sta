
<div class="col-md-12">
    <div class="white_block col-md-12">
        <div class="col-md-12 news_title">Other news</div>
        <div class="row ">
        <?foreach($news as $new){?>

        <div class="col-md-3 ">
        <div class="thumbnail">
            <a href="<?=base_url()?>stanews/news/<?=$new->id?>"> <img  style="width: 100%; height:165px" src="<?=base_url()?>file/news/<?=$new->cover?>"></a>

            <div class=" caption" style="min-height: 60px">
                <a href="<?=base_url()?>stanews/news/<?=$new->id?>"><?=$new->title?></a>
            </div>
        </div>
        </div>

        <?}?>
    </div>
    </div>
</div>
