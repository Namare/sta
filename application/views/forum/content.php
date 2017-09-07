
<div class="col-md-12 pad25">

<!--Он закрывается в райтконтент-->


<div class="app_list_forums">
    <div class="col-md-8 mgb20 ">
<?foreach($forums as $forum){ ?>

<div class="col-md-12  forumblock pad0">
    <div class="col-md-12 bottbrdr forum_header"><?=$forum->forum_name?></div>
    <?foreach($this->db->get_where('forums_post', array('main_forum_id'=> $forum->forum_id))->result() as $subforum){?>
   <div class="col-md-12  forumborder">
    <div class="col-md-10 pad10 col-xs-9">
        <div class="col-md-12 forum_title"><a class="forum_href" data-target="<?=base_url()?>forum/view_forum/<?=$subforum->post_id?>" href="<?=base_url()?>forum/view_forum/<?=$subforum->post_id?>"><?=$subforum->post_name?></a></div>
        <div class="col-md-12 forumdesc"><?=$subforum->post_description?></div>
    </div>
    <div class="col-md-2 col-xs-3 forum_info_sm ">

        <div class="col-md-12">
            <div class="count_block"><?=$this->db->get_where('forum_thead',array('main_post_id'=>$subforum->post_id))->num_rows()?></div>
            <div class="count_block_mark"></div>
        </div>
        <div class="col-md-12">
            <i class="fa fa-eye" aria-hidden="true"></i>  <?=$this->db->query('SELECT SUM(views) as views FROM forum_thead where main_post_id ='.$subforum->post_id)->result()[0]->views?>
        </div>
    </div>
    </div>
    <?}?>
</div>
<?}?>
    </div>
</div>





<div id="add_forum" class="modal fade " role="dialog">
    <div class="modal-dialog  modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Создать Форум</h4>
            </div>
            <div class="container-fluid pad10">
                <div class="col-md-12 ">
                    <div class="form-group col-md-push-2 col-md-8">
                        <label>Заголовок:</label>
                        <input placeholder="Тема Форума" name="forum_title" class="form-control">
                    </div>
                    <div class="form-group col-md-push-2 col-md-8">
                        <label>Описание:</label>
                        <input placeholder="Описание Форума" name="forum_desc" class="form-control">
                    </div>
                    <div class="form-group col-md-push-2  col-md-8">
                        <label>Группа форума:</label>
                       <select class="form-control" name="main_forum">

                           <?foreach($forums as $f){?>
                             <option value="<?=$f->forum_id?>"><?=$f->forum_name?></option>

                           <?}?>
                       </select>
                    </div>
                </div>
                <div class="col-md-12 ">

                    <div class="form-group col-md-push-2  col-md-8">
                        <label>Создать форум:</label>
                        <button id="new_forum"  class="btn btn-success btn-block"><i class="fa fa-user-plus" aria-hidden="true"></i>Создать</button>
                    </div>

                </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default"  data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>