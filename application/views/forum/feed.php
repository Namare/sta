
<?foreach($comments as $comment){?>

    <div class="col-md-12 feed_item">
       <a href="<?=base_url()?>user/user_id/<?=$comment->id?>"> <?=$comment->username?></a> <i class="fa fa-long-arrow-right"></i>
        <a href="<?=base_url()?>forum/view_thread/<?=$comment->thread_id?>"><?=htmlspecialchars($comment->title)?></a>
    </div>
    <div class="col-md-12 feed_comment">

        <b><i class="fa fa-clock-o"></i> <?=date('g:i A',$comment->add_time)?></b>
        <i class="fa fa-comment-o"></i>
       <?=parse_smileys(mb_substr(strip_tags ($comment->comment), 0,220,'Windows-1251'),base_url().'smileys/')?>...
    </div>
<?}?>
