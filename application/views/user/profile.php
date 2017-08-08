<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="user_id hidden"><?=$my->id?></div>
<div class="col-md-12 mgb20">
    <div class="col-md-12 white_block">
        <div class="col-md-12  col-xs-12 mgb10">
            <div class="col-md-9 col-sm-7 col-xs-7 adm_info"><i class="fa fa-id-card-o" aria-hidden="true"></i> My profile:</div>
            <div class=" col-md-2 col-sm-3  col-xs-5 btn-group z999">
                <a href="javascript:void(0)" class=" btn btn-primary modal_mail" data-toggle="modal" data-target="#modal_mail"><i class="fa fa-envelope" aria-hidden="true"></i></a>
                <a href="javascript:void(0)" class=" btn btn-primary" data-toggle="modal" data-target="#modal_fav"><i class="fa fa-star" aria-hidden="true"></i></a>
                <a href="javascript:void(0)" class=" btn btn-primary" data-toggle="modal" data-target="#attach_upload_modal"><i class="fa fa-upload" aria-hidden="true"></i></a>
                <a href="<?=base_url()?>user/user_id/<?=$my->id?>" target="_blank" class=" btn btn-primary"><i class="fa fa-desktop" aria-hidden="true"></i></a>
            </div>
            <div class=" col-md-1 col-sm-2 hidden-xs"><a href="javascript:void(0)" class=" btn btn-default toggl_block btn-block"><i class="fa fa-caret-up" aria-hidden="true"></i></a></div>
        </div>

        <div class="cls">
        <div class="col-md-4">
            <form class="form-horizontal">
            <div class="form-group">
                    <label label class="control-label col-md-3"> First Name: </label>
                <div class="col-md-9">
                    <input class="form-control"  value="<?=$my->first_name?>" name="proffirstname" placeholder="Name">
                </div>
            </div>

            <div class="form-group">
                    <label label class="control-label col-md-3"> Last Name: </label>
                <div class="col-md-9">
                    <input class="form-control"   value="<?=$my->last_name?>" name="proflastname" placeholder="Last Name">
                </div>
            </div>

            <div class="form-group">
                    <label label class="control-label col-md-3"> Username: </label>
                <div class="col-md-9">
                    <input class="form-control" disabled value="<?=$my->username?>" name="username" placeholder="Username">
                </div>
            </div>



            <div class="form-group">
                    <label label class="control-label col-md-3"> Company: </label>
                <div class="col-md-9">

                    <select class="form-control"name="profilecompany">
                        <?foreach($this->db->get('company')->result() as $company ){?>
                            <option <?=($company->id==$this->ion_auth->user($my->id)->row()->company_id)?'selected':'';?> value="<?=$company->id?>"><?=$company->company_name?></option>
                        <?}?>
                    </select>
                </div>
            </div>


            </form>
        </div>
        <div class="col-md-5">
            <form class="form-horizontal">
                <div class="form-group">
                    <label  class="control-label col-md-3"> Equipment: </label>
                    <div class="col-md-9">
                        <select class="form-control"name="profileload">
                           <?foreach($this->db->get('type_auto')->result() as $auto ){?>
                               <option <?=($auto->auto_id==$this->ion_auth->user($my->id)->row()->auto_id)?'selected':'';?> value="<?=$auto->auto_id?>"><?=$auto->auto_name?></option>
                            <?}?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label  class="control-label col-md-3"> How long CDL: </label>
                    <div class="col-md-9">
                        <input class="form-control" name="profcdl"  value="<?=$my->howcdl?>" >
                    </div>
                </div>

                <div class="form-group">
                    <label  class="control-label col-md-3">You are:</label>
                    <div class="col-md-9">
                        <input class="form-control" disabled  value="<?=$this->ion_auth->get_users_groups($my->id)->row()->name?>" name="username">
                    </div>
                </div>






            </form>
        </div>
        <div class="col-md-3 pad0">
            <div class="col-md-12 adm_info pad0 mg0"><i class="fa fa-paperclip" aria-hidden="true"></i> Вложения:</div>
            <div class="col-md-12 attach_block">
                <table class="table table-hover table_attach">

                    <tbody>
                    <?foreach($attach as $attr){?>
                        <tr class="open_att" data-toggle="modal"
                            data-desc="<?=$attr->att_description?>"
                            data-name_code="<?=$attr->name_code?>"
                            data-ip="<?=$attr->is_profile?>"
                            data-id="<?=$attr->att_id?>"
                            data-type="<?=$attr->type?>"
                            data-name="<?=$attr->att_name?>" data-target="#attach_modal">
                            <td><i class="fa fa-file fa-3x" aria-hidden="true"></i></td>
                            <td><?=$attr->att_name?></td>
                            <td><a href="#"  data-id="<?=$attr->att_id?>" class="btn btn-danger delete_attach"><i class="fa fa-trash  no-ico" aria-hidden="true"></i></a></td>
                        </tr>
                    <?}?>

                    </tbody>
                </table>

            </div>

        </div>

        </div>
    </div>
</div>


<div class="col-md-12 mgb20">
    <div class="col-md-12 white_block">
        <div class="col-md-12  col-xs-12 mgb10">
            <div class="col-md-11 col-sm-7 col-xs-7 adm_info"><i class="fa fa-id-card-o" aria-hidden="true"></i> Premium Access:</div>
            <div class=" col-md-1 col-sm-2 hidden-xs"><a href="javascript:void(0)" class=" btn btn-default toggl_block btn-block"><i class="fa fa-caret-up" aria-hidden="true"></i></a></div>
        </div>
        <div class="cls">
            <form class="form-horizontal" method="post" action="<?=base_url()?>user/premium_data" enctype="multipart/form-data">
            <div class="form-group form-group-sm col-md-6 pad0">
                <label class="control-label col-md-2">МC#</label>
                <div class="col-md-10">
                    <input class="form-control" value="<?=$this->ion_auth->user($my->id)->row()->mc?>" name="premiummc" placeholder="MC">
                </div>
            </div>

            <div class="form-group form-group-sm col-md-6  pad0">
                    <label  class="control-label col-md-3"> Phone: </label>
                    <div class="col-md-9">
                        <input class="form-control" value="<?=$my->phone?>" name="profilephone" placeholder="Phone">
                    </div>
            </div>

                <div class="form-group form-group-sm col-md-6  pad0">
                    <label  class="control-label col-md-2">Website:</label>
                    <div class="col-md-10">
                        <input class="form-control" name="profilewebsite" value="<?=$my->website?>">
                    </div>
                </div>
                <div class="form-group form-group-sm col-md-6  pad0">
                    <label  class="control-label col-md-3"> About me:</label>
                    <div class="col-md-9">
                        <textarea class="form-control" name="profileabout"><?=$my->about?></textarea>
                    </div>
                </div>

            <div class="form-group form-group-sm col-md-6  pad0">
                  <label  class="control-label col-md-2"> Address: </label>
                    <div class="col-md-10">
                        <input class="form-control" value="<?=$my->address?>" name="profileaddress" placeholder="Address">
                    </div>
            </div>
            <div class="form-group form-group-sm col-md-6 pad0">
                <label class="control-label col-md-4"> # Policy Expiration Date </label>
                <div class="col-md-8">
                    <input class="form-control"   value="<?=$this->ion_auth->user($my->id)->row()->policy_name?>"  name="premiumname" placeholder="MM-DD-YYYY">
                </div>
            </div>
            <div class="form-group form-group-sm col-md-6 pad0">
                <label class="control-label col-md-2">DOT#</label>
                <div class="col-md-10">
                    <input class="form-control"  value="<?=$this->ion_auth->user($my->id)->row()->dit?>"  name="premiumdit" placeholder="DOT">
                </div>
            </div>
            <div class="form-group form-group-sm col-md-6 pad0">
                <label class="control-label col-md-4">Upload only Policy Information </label>
                <div class="col-md-8">
                    <input type="file" name="policy" class="form-control">
                </div>
            </div>
                <div class="col-md-6 pad0">
                  <?if($this->ion_auth->user($my->id)->row()->policy!=null){?>
                    <a target="_blank" href="<?=base_url()?>file/policy/<?=$this->ion_auth->user($my->id)->row()->policy?>"> <span class="fa fa-file-text"></span> Current <b>Policy File</b></a>
                  <?}else{?>
                    <span class="text-danger"><b> Upload Policy Information!</b></span>
                  <?}?>
                </div>
                <div class=" col-md-2 col-md-push-4 pad10">
                        <button type="submit" class="btn btn-primary btn-block">Save</button>
                </div>
            </form>
        </div>




    </div>
</div>


<!-- Modal -->
<div id="attach_modal" class="modal fade attach_modal" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Вложение</h4>
            </div>
            <div class="modal-body">
               <div class="container-fluid">
                   <div class="col-md-8"><iframe class="embed"></iframe></div>
                   <div class="col-md-4">
                       <div class="form-group">
                           <label>Name:</label>
                           <input class="form-control" name="uatt_name" placeholder="Name">
                       </div>
                       <div class="form-group">
                           <label>Descriprion:</label>
                           <textarea class="form-control" name="uatt_desc"   placeholder="Descriprion"></textarea>
                       </div>
                       <div class="form-group checkbox">
                           <label><input type="checkbox" name="is_profile"> Отображать в профиле</label>

                       </div>
                       <div class="form-group">
                           <button class="btn btn-primary btn-block attach_update">Save</button>
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

<div id="attach_upload_modal" class="modal fade " role="dialog">
    <div class="modal-dialog modal-md">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Вложение</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="col-md-12">
                        <form action="<?=current_url()?>" method="post" enctype="multipart/form-data">
                            <div class="col-md-12 form-group">
                                <label>Имя документа:</label>
                                <input name="attach_name" class="form-control" >
                            </div>
                            <div class="col-md-12 form-group">
                                <label>Описание документа:</label>
                                <input name="attach_desc" class="form-control" >
                            </div>
                            <div class="col-md-12 checkbox">
                                <label><input type="checkbox" name="attach_ispr"  > Показывать в профиле</label>

                            </div>
                            <div class="col-md-12 form-group">
                                <label>Загрузить документ:</label>
                                <input name="attach" class="form-control" type="file">
                            </div>
                            <div class="col-md-12 form-group">
                                <button class="btn btn-primary btn-block "><i class="fa fa-upload" aria-hidden="true"></i>Upload</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

