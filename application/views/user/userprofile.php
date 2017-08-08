<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<div class="col-md-12 ">
    <div class="col-md-10 col-md-push-1 white_block pad0 border_lr">
        <div class="col-md-4 profiletitle"><?=$user_data->username?><i class="fa fa-truck pull-right" aria-hidden="true"></i> </div>
        <div class="col-md-7 pad5 ">
            <div class="user_status col-md-12"><?=$status?></div>
        </div>

        <div class="col-md-1 pad0 mgr-15">
            <a href="#" class=" btn_pro"  data-toggle="modal" data-target="#send_mail"><i class="fa fa-envelope" aria-hidden="true"></i></a>
            <a href="#" data-id="<?=$user_id?>" class=" btn_pro add_to_fav"><i class="fa fa-star" aria-hidden="true"></i></a>
        </div>
        <div class="col-md-12 pad0 profile">
            <div class="col-md-8 pad0">
                <?if($this->ion_auth->user()->row()->is_prim==1){?>
                <div class="thumbnail">
                    <div class="caption">
                        <h3><i class="fa fa-info-circle" aria-hidden="true"></i> About me:</h3>
                        <p><?=$user_data->about?></p>
                    </div>
                </div>
                <?}?>
            </div>

            <div class="col-md-4">
                <table class="table table-hover">
                    <thead>
                    <th colspan="2"><i class="fa fa-list" aria-hidden="true"></i></th>
                    </thead>
                    <tr>
                        <td>Стаж:</td>
                        <td><?=$user_data->howcdl?> года</td>
                    </tr>
                    <?if($this->ion_auth->user()->row()->is_prim==1){?>
                    <tr>
                        <td>Телефон:</td>
                        <td><?=$user_data->phone?></td>
                    </tr>
                    <tr>
                        <td>Адрес:</td>
                        <td><?=$user_data->address?></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><?=$user_data->email?></td>
                    </tr>

                    <tr>
                        <td>Phone number:</td>
                        <td><?=$user_data->phone?></td>
                    </tr>
                    <tr>
                        <td>Website:</td>
                        <td><?=$user_data->website?></td>
                    </tr>
                    <tr>
                        <td>MC:</td>
                        <td><?=$user_data->mc?></td>
                    </tr>
                    <tr>
                        <td>DOT:</td>
                        <td><?=$user_data->dit?></td>
                    </tr>
                    <tr>
                        <td>Policy name:</td>
                        <td><?=$user_data->policy_name?></td>
                    </tr>
                    <tr>
                        <td>Policy Information :</td>
                        <td><a target="_blank" href="<?=base_url()?>file/policy/<?=$user_data->policy?>">Open in new window</a></td>
                    </tr>
                    <?}?>
                </table>
                <?if($this->ion_auth->user()->row()->is_prim==1){?>
                <div class="col-md-12 mgb5 pad0"><b><i class="fa fa-comment"></i> Comments:</b></div>
                    <?foreach($user_comments as $com){?>
                <div class="col-md-12 mgb5" style="border-bottom:1px solid #eee ">

                    <div class="col-md-12 pad0"><b><?=$this->ion_auth->user($com->user_id)->row()->username?></b></div>
                    <div class="col-md-12 pad0 mgb5"><?=$com->comment?></div>

                </div>
                    <?}?>

                <div class="panel col-md-12 pad0">
                    <label> Отзыв о водителе</label>
                    <textarea class="form-control mgb20 user_coment"></textarea>
                    <button data-id="<?=$user_data->id?>" class="btn btn-block btn-primary send_comment"><i class="fa fa-share-square" aria-hidden="true"></i> Send</button>
                </div>
                <?}?>
            </div>
        </div>


        <div class="col-md-12 pad0">
            <div class="col-md-4 profileinfo">Документы <i class="fa fa-file pull-right" aria-hidden="true"></i> </div>
            <div class="col-md-8 "></div>

            <div class="col-md-12 mgt10 pad10 container-fluid">
                <?foreach($attachments as $attach){?>
                    <div class="col-xs-6 col-md-3 thumbnail attach">
                            <?
                            $type_img = [   '.jpg',
                                '.jpeg',
                                '.png',
                                '.JPEG',
                                '.JPG'];
                           if(in_array($attach->type,$type_img)){
                            ?>
                            <img  src="<?=base_url()?>file/<?=$attach->name_code?><?=$attach->type?>" alt="...">
                        <?}else{?>
                            <iframe class="embed_pr" src="http://docs.google.com/viewer?embedded=true&url=<?=base_url()?>file/<?=$attach->name_code?><?=$attach->type?>"></iframe>
                        <?}?>
                        <h3><?=$attach->att_name?></h3>
                        <p><?=$attach->att_description?></p>
                    </div>
                <?}?>

            </div>
        </div>
    </div>
</div>


<div id="send_mail" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Написать пользователю</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="form-group col-md-push-2 col-md-8">
                        <label>Отправить сообщение:</label>
                        <textarea class="form-control send_msg_text"></textarea>
                    </div>
                    <div class="form-group col-md-push-2 col-md-8">
                        <button class="btn btn-block btn-primary  send_msg_touser" data-id="<?=$user_id?>">Отправить</button>
                    </div>


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
