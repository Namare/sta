<div class="col-md-12 pad25">

<div class="app_list_forums">

<div class=" app_list_thead">


    <div class="col-md-8 mgb20 ">

        <div class="col-md-12 pad0">
            <h1 class="forum_h1"><?=$forum_meta[0]->post_name?></h1>
        </div>
        <div class="col-md-12  forumblock ">
            <div class="btn-group app_control">
            <div class="btn btn-default dp_none return_menu" data-id="1"><i class="fa fa-arrow-circle-left"></i> Back</div>
            <div class="btn btn-success app_menu" data-id="add_thread"><i class="fa fa-plus"></i> New topic</div>
            </div>





            <?foreach($forums_head as $forum){
                $cur_avatar = @$this->db->get_where('forum_comments',array('thread_id'=>$forum->id_thead))->result()[0]->autor_id;
                ?>

    <div class="col-md-12  forumborder">
        <div class="col-md-2 forum_avatar f_a_m">
<div class="col-md-12  ">
    <?$this->db->order_by('comment_id','desc');?>
    <img class="img-circle img-thumbnail "  src="<?=base_url()?>images/forum/avatar/<?=(!file_exists($_SERVER['DOCUMENT_ROOT'].'/images/forum/avatar/'.$cur_avatar.'.jpg'))?'noavatar':$cur_avatar?>.jpg">
</div>
        </div>

        <div class="col-md-8 col-xs-9 pad10">
            <div class="col-md-12 forum_title"><a class="sub_forum_href" data-target="<?=base_url()?>forum/view_thread/<?=$forum->id_thead?>" href="<?=base_url()?>forum/view_thread/<?=$forum->id_thead?>"><?=$forum->title?></a></div>
            <div class="col-md-12 forumdesc">
                <?$this->db->order_by('comment_id','desc');?>
                <?=parse_smileys(@$this->db->get_where('forum_comments',array('thread_id'=>$forum->id_thead))->result()[0]->comment, base_url().'smileys/')?>

            </div>
        </div>
        <div class="col-md-2 col-xs-3  forum_info_sm">
            <div class="col-md-12 ">
                <div class="count_block"><?=$this->db->get_where('forum_comments',array('thread_id'=>$forum->id_thead))->num_rows()?></div>
                <div class="count_block_mark"></div>
            </div>
            <div class="col-md-12">
                <i class="fa fa-eye" aria-hidden="true"></i> <?=$forum->views?>
            </div>
            <?if($this->ion_auth->is_admin()){?>
            <div class="col-md-12">
                <div data-id="<?=$forum->id_thead?>" class="btn btn-danger delete_thread"><i class="fa fa-trash" aria-hidden="true"></i> Delete</div>
            </div>
            <?}?>
        </div>
    </div>

<?}?>

    </div>
    </div>




</div>
</div>



