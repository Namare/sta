<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.9";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<script src="<?=base_url()?>js/recorder.js"></script>
<script src="<?=base_url()?>js/Fr.voice.js"></script>

<script src="<?=base_url()?>js/app.js"></script>
<div class="col-md-12 pad25">

<div class="col-md-8 mgb20 ">
    <div class="app_list_forums">
    <div class="col-md-12 pad0">
        <h1 class="forum_h1"><?=$this->db->get_where('forum_thead', array('id_thead'=>$th_id))->result()[0]->title?></h1>
    </div>



        <?$co = 0;?>
        <?foreach($comments as $comment){
            if($co == 1){
                echo $pagination;
            }
            $co++
            ?>


            <div class="col-md-12  forumborder comment_block">
                <div class="col-md-2 forum_avatar">

                    <div class="col-md-12 col-xs-3 ">
                        <img class="img-circle img-thumbnail "  src="<?=base_url()?>images/forum/avatar/<?=$comment->autor_id?>.jpg">
                    </div>
                    <div class="col-md-12 col-xs-9 comment_autor pad5">
                        <?=$comment->username?>
                    </div>
                </div>
                <div class="col-md-10 pad10">

                    <div class="col-md-12 forumdesc current_comment">
                        <?=parse_smileys($comment->comment,base_url().'smileys/')?>

                    </div>
                </div>
                <div class="col-md-12 forum_msg_footer" >
                    <div class="col-md-2"></div>
                    <div class="col-md-2 col-xs-3 text-center pad0">
                        <a href="javascript:void()" data-id="<?=$comment->comment_id?>" class="text-success thumb_up"><i class="fa fa-thumbs-o-up"></i> <span><?echo $this->db->get_where('sta_likes',array('comment_id'=>$comment->comment_id))->num_rows()?></span></a>

                        <a href="javascript:void()" data-id="<?=$comment->comment_id?>" class="text-danger thumb_down"><i class="fa fa-thumbs-o-down"></i> <span><?echo $this->db->get_where('sta_dislikes',array('comment_id'=>$comment->comment_id))->num_rows()?></span></a>
                    </div>

                    <div class="share_box">
                         <div class="addthis_inline_share_toolbox"></div>
                    </div>
                    <div class="col-md-1 col-xs-1 forum_share">
                        <i class="fa fa-share-alt" aria-hidden="true"></i>
                    </div>


                    <div class="col-md-3 col-xs-5 ">
                        <i class="fa fa-clock-o" aria-hidden="true"></i> <span  style="font-size: 12px"> <?=date('G:i  d/m/Y',$comment->add_time)?></span>
                    </div>


                    <div class="col-md-3 text-center  pull-right btn-group-xs col-xs-2">
                    <?if($this->ion_auth->logged_in()){?>
                        <div class="btn btn-default" data-toggle="modal" data-target="#reportModal"><i class="fa fa-flag" aria-hidden="true"></i>  Complain</div>
                    <?}?>
                        <div class="btn btn-default forum_quote "  ><i class="fa fa-quote-right" aria-hidden="true"></i>  Reply</div></div>

                </div>

            </div>

        <?}?>
        <?=$pagination?>

        <div class="col-md-10 mgb10 app_forum_send">
            <div class="form-group">
            <label>Comment:</label>
            <input class="form-control app_msg" placeholder="Leave comment">
            </div>
            <div class="form-group">
                <button data-url='<?=current_url()?>' data-id='<?=$th_id?>' class="btn btn-primary app_msg_send">Send comment</button>

                <button  data-url='<?=current_url()?>' data-id='<?=$th_id?>' class="btn btn-primary  app_mic"><i class="fa fa-microphone"></i></button>
                <button  data-url='<?=current_url()?>' data-id='<?=$th_id?>' class="btn btn-primary  app_cam"><i class="fa fa-camera"></i></button>

                <button   data-url='<?=current_url()?>' style="display: none" data-url='<?=current_url()?>' data-id='<?=$th_id?>' class="btn btn-primary app_audio_send"><i class="fa fa-microphone"></i> Send record</button>
                <button  data-url='<?=current_url()?>' style="display: none" data-url='<?=current_url()?>' data-id='<?=$th_id?>' class="btn btn-primary app_img_send"><i class="fa fa-camera"></i> Send photo</button>

                <form class="forum_photo">
                <input name="photo_forum" style="display: none" id="app_cam"  type="file" accept="image/*"  capture="camera">

                </form>
                <form class="forum_audio">
                <input name="micro_forum"  style="display: none" id="app_mic" type="file" accept="audio/*"  capture="true">
                </form>




            </div>
        </div>




    </div>
    <?php echo smiley_js(); ?>

    <div class="col-md-12  forumborder pad10">
        <div class="col-md-2 forum_avatar">

            <div class="col-md-12  ">
                <img class="img-circle img-thumbnail" src="<?=base_url()?>images/forum/avatar/<?= $this->ion_auth->get_user_id()?>.jpg?<?=rand(1,100)?>">
            </div>

        </div>
    <div class="col-md-10 form-group ">
        <label>Оставить коментарий:</label>
        <form class="nk">
        <textarea data-th="<?=$th_id?>" class="form-control new_comment" rows="6" id="new_comment" name="cm"></textarea>
            <input type="hidden" name="id">
            <input type="hidden" id="new_comment_reply" name="new_comment_reply">


        </form>
        <div class="col-md-12 pad0 mgt10">

        <div class="col-md-4 pad0">
            <button class="btn btn-default forum_smile pad5a f18"><i class="fa fa-smile-o no-ico"></i></button>
            <div  class="btn btn-default forum_youtube pad5a f18" data-toggle="modal" data-target="#youtubeModal"><i class="fa fa-youtube-square no-ico "></i></div>
            <div  class="btn btn-default forum_link pad5a f18" data-toggle="modal" data-target="#uploadModal"><i class="fa fa-image no-ico "></i></div>
        </div>
            <div class="col-md-12 pad0"><button class="btn btn-primary forum_send">Отправить</button></div>
        </div>
        <div class="smiles_table">
            <?php echo $smiley_table; ?>
        </div>
    </div>



    </div >
</div>


    <div id="youtubeModal" class="modal  fade " role="dialog">
        <div class="modal-dialog  modal-sm">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header mgb10">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Insert youtube video</h4>
                </div>
                <div class="container-fluid">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Insert a link to youtube video:</label>
                            <input class="form-control youtube_link">
                        </div>
                        <div class="form-group">
                            <label>Insert:</label>
                            <button class="btn btn-primary btn-block insert_youtube"><i class="fa fa-youtube f18"></i> Insert</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

 <div id="reportModal" class="modal  fade " role="dialog">
        <div class="modal-dialog  modal-md">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header mgb10">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Report </h4>
                </div>
                <div class="container-fluid">
                    <div data-id="<?=$th_id?>" class="col-md-6 report_btn btn-group-md mgb20">
                        <div data-id="1" class="btn btn-default btn-block"><i class="fa fa-envelope-o" aria-hidden="true"></i> Spam</div>
                        <div data-id="2" class="btn btn-default btn-block"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Pornography</div>
                    </div>
                    <div class="col-md-6 report_btn btn-group-md mgb20">
                        <div data-id="3" class="btn btn-default btn-block"><i class="fa fa-exclamation" aria-hidden="true"></i> Angry Speech</div>
                        <div data-id="4" class="btn btn-default btn-block"><i class="fa fa-commenting-o" aria-hidden="true"></i> Other</div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <div id="uploadModal" class="modal  fade " role="dialog">
        <div class="modal-dialog  modal-md">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header mgb10">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Upload image</h4>
                </div>
                <div class="container-fluid">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#menu_img1">Add link</a></li>
                        <li><a data-toggle="tab" href="#menu_img2">Upload image</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="menu_img1" class="tab-pane fade in active">
                            <div class="col-md-12 pad5">
                                <div class="form-group">
                                    <label>Insert a link to image:</label>
                                    <input class="form-control image_link">
                                </div>
                                <div class="form-group">
                                    <label>Insert:</label>
                                    <button class="btn btn-primary btn-block insert_link"><i class="fa fa-image f18"></i> Insert</button>
                                </div>
                            </div>
                        </div>

                        <div id="menu_img2" class="tab-pane fade">
                            <div class="col-md-12 pad5">
                                <div class="form-group">
                                    <label>Upload image</label>
                                    <form class="up_img">
                                        <input type="file" class="form-control image_link" name="send_image">
                                    </form>
                                </div>
                                <div class="form-group">
                                    <label>Upload:</label>
                                    <button class="btn btn-primary btn-block upload_link"><i class="fa fa-upload f18"></i> Upload</button>
                                </div>
                            </div>
                        </div>


                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <div id="loginModal" class="modal  fade" role="dialog">
        <div class="modal-dialog  modal-sm">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header mgb10">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Login</h4>

                </div>
                <div class="container-fluid">
                    <div class="col-md-12">
                        <div class="col-md-12 forum_err"></div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input class="form-control forum_email error">
                        </div>
                        <div class="form-group">
                            <label>Password:</label>
                            <input type="password" class="form-control forum_pass">
                        </div>
                        <div class="form-group">
                            <label>Sing-in:</label>
                            <button type="submit" class="btn btn-primary btn-block forum_login"><i class="fa fa-sign-in"></i> Login</button>
                            <h6 class="modal-title mgt10"><a href="<?=base_url()?>auth/registration"> Register </a></h6>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>