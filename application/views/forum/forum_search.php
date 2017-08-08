<div class="col-md-12 pad25">

    <div class="col-md-8 mgb20 ">
        <div class="col-md-12 pad0">
            <h1 class="forum_h1">Search result</h1>
        </div>

        <div class="app_list_forums">
            <?if( count($comments) == 0){?>

                <div class="col-md-12  forumborder">
                    <h1 style="text-align: center"> No results</h1>

                </div>

            <?}?>

            <?foreach($comments as $comment){?>





                <div class="col-md-12  forumborder">
                    <div class="col-md-2 forum_avatar">

                        <div class="col-md-12  ">
                            <i class="fa fa-3x fa-user-circle"></i>
                        </div>
                        <div class="col-md-12 ">
                            <?=$comment->username?>
                        </div>
                    </div>
                    <div class="col-md-10 pad10">

                        <div class="col-md-12 forumdesc">
                            <?=parse_smileys($comment->comment,base_url().'smileys/')?>

                        </div>
                    </div>
                    <div class="col-md-12 forum_msg_footer" >
                        <div class="col-md-2 forum_share text-center" >
                            <i class="fa fa-share-alt" aria-hidden="true"></i>
                        </div>
                        <div class="col-md-3 ">
                            <i class="fa fa-clock-o" aria-hidden="true"></i> <span  style="font-size: 12px"> <?=date('G:i  d/m/Y',$comment->add_time)?></span>
                        </div>
                        <div class="col-md-6">
                            <a href="<?=base_url()?>/forum/view_thread/<?=$comment->thread_id?>" target="_blank"><i class="fa fa-long-arrow-right"></i> К теме</a>
                        </div>

                    </div>

                </div>

            <?}?>


        </div >

    </div>
