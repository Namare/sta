<div class="col-md-12 mgb20">
    <div class="col-md-12 white_block">
        <div class="col-md-12 news_title"><?=$news[0]->title?>   </div>
        <div class="col-md-8">
        <div class="col-md-12 pad0 mgt10">
            <img class=" img-thumbnail  event_cover" src="<?=base_url()?>file/news/<?=$news[0]->cover?>">
        </div>

        <div class="col-md-12 pad10 mgt10" style="font-size: 16px">
            <p>
                <?=$news[0]->description?>
            </p>
            <div class="addthis_inline_share_toolbox"></div>
        </div>

        </div>
        <div class="col-md-4">
            <div class="col-md-12">
                <div class="col-md-12 news_menu_head">КАТЕГОРИИ</div>
                <?foreach($news_menu as $menu){?>
                    <a href="<?=base_url()?>/stanews/?cat=<?=$menu->url?>" class="news_menu"><?=$menu->category_name?></a>

                <?}?>
            </div>
        </div>
    </div>
</div>
<!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-595cc7fa0036b40f"></script>