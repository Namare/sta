<div class="col-md-12 mgb20">
    <div class="col-md-12 white_block">
        <div class="col-md-12 event_title"><?=$event[0]->event_title?> </div>

        <div class="col-md-4 pad0 mgt10">
            <img class="img-thumbnail" src="<?=base_url()?>file/events/<?=$event[0]->cover?>">
        </div>

        <div class="col-md-8 pad10 mgt10">
            <div class="col-md-12 event_info_item pad0 pad10">

                <i class="fa fa-calendar "></i> <?=$event[0]->event_start_date?>
                - <?=$event[0]->event_end_date?>
            </div>
            <br>
            <p><?=$event[0]->event_description?></p>
            <div class="addthis_inline_share_toolbox"></div>

            <div class="col-md-12 news_more pad0 mgt10">
                <div class="more">
                    <a href="<?=$event[0]->event_link?>" class="bounce-to-right">Details</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-595cc7fa0036b40f"></script>