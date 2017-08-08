<?php defined('BASEPATH') OR exit('No direct script access allowed');?>


<div class="col-md-12 mgb20">
    <div class="col-md-12 white_block">

            <div class="col-md-12 panel pad0 mg0">
                <div class="col-md-4 pad0">
                    <div class="btn-group padb5">
                    <div class="btn btn-default">Dispatch To :</div>
                    <div class="btn btn-default current_user"><i class="fa fa-user-circle-o" aria-hidden="true"></i><span></span></div>
                    <div class="btn btn-default undisp"> Cancel order</div>
                        <?if($order[0]->user_id == $order[0]->accept and $order[0]->user_id != 0){?>
                            <div class="btn btn-success"><i class="fa fa-check no-ico" aria-hidden="true"></i></div>
                        <?}?>
                    </div>
                </div>
                <div class="col-md-5 pad5">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    <?=$order[0]->from_end?>
                    <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                    <?=$order[0]->to_end?>
                    <span class="order_id hidden"><?=$order[0]->id?></span>

                </div>
                <div class="col-md-3 pad5">
                    <div class="btn-group pull-right">
                    <a href="<?=base_url()?>order_id/<?=$order[0]->id?>" class="btn btn-primary "><i class="fa fa-external-link " aria-hidden="true"></i> Open load details</a>
                    <a href="#" class="btn btn-danger delete_load"><i class="fa fa-trash " aria-hidden="true"></i> Delete Load</a>
                    </div>
                </div>
            </div>


        <div class="col-md-8  ">
            <div class="col-md-12 adm_info  pad0"><h3 class="pad0"><i class="fa fa-truck" aria-hidden="true"></i> Interested in this load:</h3></div>
            <div class="input-group" >
                <span class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></span>
                <input onchange="USR.search_from_all();"
                       onkeyup="USR.search_from_all();" onpaste="USR.search_from_all();" oninput="USR.search_from_all();"
                       class="form-control find_drivers_all" style="height:auto" type="text" placeholder="Find driver from all users">
            </div>

                <div class="col-md-12 adm_info  pad0"><h3 class="pad0"><i class="fa fa-search" aria-hidden="true"></i> Find  Companies:</h3></div>

                <table class="table list_from_all">

                    <?foreach($user_drivers as $drivers){?>
                        <tr>
                            <td><a href="<?=base_url()?>user/user_id/<?=$drivers->id?>"><?=$drivers->username?></a>
                                <div class="btn-group btn-group-xs pull-right">
                                    <div data-id="<?=$drivers->id?>" class="btn btn-primary set_disp"><i class="fa fa-check-circle-o" aria-hidden="true"></i> Dispatch</div>
                                </div>
                            </td>
                        </tr>
                    <?}?>
                </table>


            <table class="table table-hover list_candr">

                <?foreach($order_users as $users){?>
                <tr>

                    <td><a href="<?=base_url()?>user/user_id/<?=$users->id?>"><?=$users->username?></a>
                        <div class="btn-group btn-group-xs pull-right">
                            <div data-id="<?=$users->id?>" class="btn btn-primary set_disp"><i class="fa fa-check-circle-o" aria-hidden="true"></i> Dispatch</div>
                            <div data-id="<?=$users->id?>" class="btn btn-primary user_questions" data-toggle="modal" data-target="#user_questions"><i class="fa fa-comments" aria-hidden="true"></i> Questions</div>
                        </div>
                    </td>
                </tr>

                <?}?>
            </table>
            <div class="col-md-12 load_order_comment">
                <h2>  <span class="fa-stack fa-lg">
        <i class="fa fa-question fa-stack-1x"></i>
        <i class="fa fa-ban fa-stack-2x text-danger"></i>
        </span>No questions</h2>
            </div>

        </div>
        <div class="col-md-4">

            <div class="panel col-md-12 pad0">
                <div class="col-md-12 adm_info  pad0"><h3 class="pad0"><i class="fa fa-file-text" aria-hidden="true"></i> Legal Documents:</h3></div>
                <table class="table table-hover  load_order_docs" >
                </table >
                <div class="col-md-12 adm_info pad0">
                    <select class="form-control select_attach">
                        <?foreach($attach as $att){?>
                            <option value="<?=$att->att_id?>"><?=$att->att_name?></option>
                        <?}?>
                    </select>
                </div>
                <div class="col-md-12 adm_info pad0 ">
                    <button class="btn btn-block btn-primary add_select_attach">
                        <i class="fa fa-plus-square" aria-hidden="true"></i> Add
                    </button>
                </div>
            </div>

        </div>

       <div class="col-md-12">

           <div class="col-md-12 adm_info  pad0"><h3 class="pad0"><i class="fa fa-pencil-square" aria-hidden="true"></i> Edit load:</h3> </div>

           <div class="col-md-6 form-group inp_list">
               <label>Weight:</label>
               <input class="form-control" value="<?=$order[0]->weight?>" name="weight" >
               <label>Height:</label>
               <input class="form-control" value="<?=$order[0]->height?>" name="height">
               <label>length:</label>
               <input class="form-control" value="<?=$order[0]->length?>" name="length">
               <label>Wide:</label>
               <input class="form-control" value="<?=$order[0]->wide?>" name="wide">
               <label>Load type:</label>
               <select name="auto" class="form-control">
                   <?foreach($this->db->get('type_auto')->result() as $load_type){
                       if($load_type->auto_id==0)continue;
                       $checked = ($load_type->auto_name ==$order[0]->auto)?' selected ':'';

                   ?>
                   <option <?=$checked?> value="<?=$load_type->auto_name?>"><?=$load_type->auto_name?></option>
                   <?}?>
               </select>
           </div>
           <div class="col-md-6 form-group inp_list">
               <label>Price:</label>
               <input class="form-control"   value="<?=$order[0]->price?>" name="price">
               <label>Pickup location:</label>
               <input  class="form-control"  disabled value="<?=$order[0]->from_end?>">
               <label>Delivery location:</label>
               <input class="form-control" disabled value="<?=$order[0]->to_end?>">
               <label>Load #:</label>
               <input class="form-control" value="<?=$order[0]->actual_id?>" name="actual_id">
               <label>Additional information:</label>
               <textarea class='form-control' name="additional"><?=$order[0]->additional?></textarea>
               <a href="javascript:alert('Data saved')" class="btn btn-success btn-block mgt10">Save</a>

           </div>



       </div>

    </div>
</div>

<div id="user_questions" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">User questions</h4>
            </div>
            <div class="modal-body pad0">
                <div class="container-fluid load_user_comment pad0">



                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<script>

        var projects = [
            <?foreach($order_users as $users){?>
            {
                label: "<?=$users->username?>"
            },
            <?}?>
        ];
        var drivers = [
            <?foreach($user_drivers as $driver){?>
            {
                label: "<?=$driver->username?>"
            },
            <?}?>
        ];

</script>