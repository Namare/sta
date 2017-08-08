<?php defined('BASEPATH') OR exit('No direct script access allowed');
if($this->ion_auth->logged_in()){
    $this->db->order_by('added','desc');
$msg = $this->db->get_where('messages',array(
    'to_user_id'=>$this->ion_auth->get_user_id()
))->result();
?>
<!-- Modal -->
<div id="modal_mail" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content ">
            <div class="modal-header pad5">
                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <div class="col-md-12 pad0">
                    <ul class="nav nav-tabs msg_menu">
                        <li class="active"><a data-toggle="tab" id="inbox" aria-expanded='true'>Входящие</a></li>
                        <li><a data-toggle="tab" aria-expanded='false' id="outbox"  >Исходящие</a></li>
                    </ul>
                </div>
            </div>
            <div class="modal-body pad0">
                <div class="container-fluid pad0 massg_block_con ">





                </div>
                <div class="col-md-12 pad0">

                    <div class="col-md-12  msg_re">

                        <div class="col-md-12 form-group">
                            <label>Ответить на сообщение:</label>
                            <textarea class="form-control msg_textarea"></textarea>
                        </div>

                        <div class="col-md-8 ">
                            <button class="btn btn-primary msg_back"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад</button>
                        </div>
                        <div class="col-md-4 form-group">
                            <button  class="btn btn-block btn-primary msg_send">Отправить</button>
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


<?

    ?>
<div id="modal_fav" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Favorite users</h4>
            </div>
            <div class="modal-body pad0">
                <div class="container-fluid pad0">
                    <table class="table table-hover fav_table">
                    <?

                    foreach( $this->db->get_where('favorite_users',array('user_id'=>$this->ion_auth->get_user_id()))->result() as $fav){?>
                        <tr>
                            <td> <i class="fa fa-user-circle-o" aria-hidden="true"></i> <a href="<?base_url()?>user/user_id/<?=$this->ion_auth->user($fav->fav_user_id)->row()->id?>"> <?=$this->ion_auth->user($fav->fav_user_id)->row()->username?> </a></td>
                            <td>
                                <div class="btn-group pull-right">
                                    <a href="#" data-id='<?=$fav->fav_user_id?>' data-toggle="modal" data-target="#modal_send_msg" class="btn btn-primary fav_send"><i class="fa fa-envelope" aria-hidden="true"></i> Send message</a>
                                    <a href="#" data-id='<?=$fav->fav_user_id?>' class="btn btn-primary add_to_fav"><i class="fa fa-ban" aria-hidden="true"></i> Delete</a>
                                </div>
                            </td>
                        </tr>
                    <?}?>

                    </table>


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

    <div id="modal_send_msg" class="modal fade" role="dialog">
        <div class="modal-dialog modal-md">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Send message users</h4>
                </div>
                <div class="modal-body ">
                    <div class="container-fluid">
                        <div class="col-md-12 form-group">
                            <label>Message:</label>
                            <textarea class="form-control send_msg_text"></textarea>
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Send:</label>
                           <button class="btn btn-primary send_msg_touser">Send</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <div class="pop_info pop_fav"></div>

    <div class="pop_info pop_msg"></div>

    <div class="col-md-3 navbar-fixed-bottom note_panel">
        <div class="col-md-12 padb5"><i class="fa fa-bell" ></i> Уведомления</div>
        <div class="col-md-12 pad0 msg_pop_con">
            <div class="col-md-12 msg_pop_head">Новое сообщение <i class="fa fa-times-circle-o pull-right" ></i></div>
            <div class="col-md-12 msg_pop_text">Новое сообщение:</div>
        </div>
    </div>

    <script type="text/javascript" src="<?=base_url()?>js/msg.js?<?=rand(1,1000)?>"></script>
<?}?>