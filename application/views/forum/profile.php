<div class="col-md-12 pad25">

    <div class="app_list_forums">

        <div class=" app_list_thead">


            <div class="col-md-8 mgb20 ">

                <div class="col-md-12 pad0">
                    <h1 class="forum_h1">Forum profile</h1>
                </div>

                <div class="col-md-12  forumblock pad0">
                    <div class="col-md-12  forumborder ">
                        <h1><i class="fa fa-user-circle"></i> Forum avatar:</h1>
                      <div class="col-md-6 pad10 text-center">
                                <img class="img-circle img-thumbnail "  src="<?=base_url()?>images/forum/avatar/<?= $this->ion_auth->get_user_id()?>.jpg?<?=rand(1,100)?>">
                                <div><b><?=$this->ion_auth->user()->row()->username?></b></div>
                      </div>
                      <div class="col-md-6 text-left pad10">
                          <form  action="<?=base_url()?>forum/change_avatar" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Upload avatar</label>
                                    <input class="form-control" name="avatar" type="file">
                                </div>
                                <div class="form-group">
                                    <label>Upload avatar:</label>
                                    <button type="submit" class="btn btn-success">Change</button>
                                </div>
                            </form>
                      </div>
                   </div>

                    <div class="col-md-12  forumborder">
                        <div class="col-md-12 pad10">
                           <table class="table table-hover">
                               <thead>
                               <tr><th  colspan="2"><i class="fa fa-list"></i> Статистика</th></tr>
                               </thead>
                               <tbody>
                               <tr>
                                   <td>Всего комментариев:</td>
                                   <td><?=$comments->num_rows()?></td>
                               </tr>
                               <tr>
                                   <td>Последний комментарий:</td>
                                   <td><?=date('G:i  d/m/Y',$comments->result()[0]->add_time)?></td>
                               </tr>
                               <tr>
                                   <td>Последняя тема:</td>
                                   <td><a href="<?=base_url()?>forum/view_thread/<?=$last_thread[0]->id_thead?>" ><?=$last_thread[0]->title?></a></td>
                               </tr>
                               </tbody>
                           </table>
                        </div>

                    </div>
                    <div class="col-md-12  forumborder">
                        <div class="col-md-12 pad10">
                           <table class="table table-hover">
                               <thead>
                               <tr><th  colspan="3"><i class="fa fa-comments" aria-hidden="true"></i> Обсуждения:</th></tr>
                               </thead>
                               <tbody>
                               <?foreach($this->db->query('select distinct * from  forum_comments
                               right join forum_thead
                               on forum_comments.thread_id = forum_thead.id_thead
                               where forum_comments.autor_id = '.$this->ion_auth->get_user_id().'
                               group by forum_comments.thread_id

                               ')->result() as $thread){?>

                               <tr>
                                   <td><a href="<?=base_url()?>forum/view_thread/<?=$thread->id_thead?>"><?=$thread->title?></a></td>
                                   <td><?=date('G:i  d/m/Y',$thread->add_time)?></td>
                                   <td><?=parse_smileys(strip_tags($thread->comment),base_url().'smileys/')?></td>
                               </tr>
                               <?}?>
                               </tbody>
                           </table>
                        </div>

                    </div>

                </div>
            </div>






        </div>
    </div>



