<div class="col-md-12 mgb20">
    <div class="col-md-12 white_block">
        <div class="col-md-12 adm_info"><i class="fa fa-newspaper-o" aria-hidden="true"></i> News:</div>
        <div class="col-md-8">
            <?foreach($news as $artcle){?>
            <div class="col-md-12 news_title"><a href="<?=base_url()?>stanews/news/<?=$artcle->id?>"><?=$artcle->title?></a></div>
            <div class="col-md-12 news_cover pad0"><a href="<?=base_url()?>stanews/news/<?=$artcle->id?>">
                    <img src="<?=base_url()?>file/news/<?=$artcle->cover?>" alt="Интересные факты о дальнобойщиках США">
                </a></div>
            <div class="col-md-12 news_desc ">
                <?

                ?>
                <?=mb_substr($artcle->description, 0,600,'UTF-8')?>...
            </div>
            <div class="col-md-12 news_more pad0">
                <div class="more">
                <a href="<?=base_url()?>stanews/news/<?=$artcle->id?>" class="bounce-to-right">Подробнее</a>
                </div>
            </div>
            <?}?>

        </div>
        <div class="col-md-4">
            <div class="col-md-12">
                <div class="col-md-12 news_menu_head">КАТЕГОРИИ</div>
                <?foreach($news_menu as $menu){?>
                    <a href="<?=current_url()?>/?cat=<?=$menu->url?>" class="news_menu"><?=$menu->category_name?></a>

                <?}?>
            </div>
        </div>

    </div>
</div>

