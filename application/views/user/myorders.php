<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div  class="col-md-12 mgb20 ">
    <div class="col-md-12 white_block">
        <div class="col-md-12 mgb10">
            <div class="col-md-11 col-xs-6 adm_info"><i class="fa fa-check-square" aria-hidden="true"></i> Dispatch to Me:</div>
            <div class=" btn btn-default toggl_block"><i class="fa fa-caret-down no-ico" aria-hidden="true"></i></div>

            <div class="cls">
                <div id="app_list_dispach" class="col-md-12 pad0">
                    <table class="table table-hover ">
                        <thead >
                        <th id="app_span5" colspan="2"><i class="fa fa-calendar" aria-hidden="true"></i> Date: Start/End</th>
                        <th class="hidden-xs" colspan="2"><i class="fa fa-map-marker" aria-hidden="true"></i> Place: Start/End</th>
                        <th class="hidden-xs" colspan="3"></th>
                        </thead>
                        <?foreach($disp_orders as $orders){?>

                            <tr>
                                <td class="start"><?=$orders->date_start?></td>
                                <td class="end"><?=$orders->date_end?></td>
                                <td class="hidden-xs from"><?=$orders->from_end?></td>
                                <td class="hidden-xs to"><?=$orders->to_end?></td>

                                <td class=" status">

                                </td>
                                <td >
                                    <div class=" btn-group-xs">

                                        <a  href="<?=base_url()?>order_id/<?=$orders->id?>" class="btn btn-primary app_info" > <i class="fa fa-info-circle no-ico" aria-hidden="true"></i></a>
                                        <?if($orders->user_id==$orders->accept){?>
                                            <a  data-id="<?=$orders->id?>"
                                                data-toggle="modal" data-target="#addi_attach"
                                                class="btn btn-primary load_docs" >
                                                <i class="fa fa-file"></i> Documents
                                            </a>
                                        <?}else{?>
                                            <a  data-id="<?=$orders->id?>"
                                                data-toggle="modal" data-target="#accp_disp"
                                                data-text="<?=$orders->additional?>"
                                                class="btn btn-success load_addition" >
                                                <i class="fa fa-file-text"></i>  Аccept Load
                                            </a>
                                        <?}?>
                                    </div>
                                </td>
<!--                                <td>-->
<!--                                    --><?//if($orders->user_id==$orders->accept){?>
<!--                                        <i class="fa fa-hourglass-half fa-2x text-success" aria-hidden="true"></i>-->
<!--                                    --><?//}?>
<!--                                </td>-->
                            </tr>
                        <?}?>
                    </table>
                </div>


            </div>
        </div>
    </div>
</div>
<div class="col-md-12 mgb20">
    <div class="col-md-12 white_block">
        <div class="col-md-12 mgb10">
            <div class="col-md-11 col-xs-6 adm_info"><i class="fa fa-list-alt" aria-hidden="true"></i>  Pending Loads:</div>
            <div class=" btn btn-default toggl_block"><i class="fa fa-caret-down no-ico" aria-hidden="true"></i></div>

        </div>
        <div class="cls">
        <div class="col-md-12">
            <table class="table table-hover ">
                <thead>
                    <th colspan="2"><i class="fa fa-calendar" aria-hidden="true"></i> Date: Start/End</th>
                    <th class="hidden-xs" colspan="2"><i class="fa fa-map-marker" aria-hidden="true"></i> Place: Start/End</th>
                    <th class="hidden-xs" colspan="2"></th>
                </thead>
            <?foreach($myorders as $orders){?>

                <tr>
                    <td class="start"><?=$orders->date_start?></td>
                    <td class="end"><?=$orders->date_end?></td>
                    <td class="hidden-xs from"><?=$orders->from_end?></td>
                    <td class="hidden-xs to"><?=$orders->to_end?></td>

                    <td class=" status">

                    </td>
                    <td >
                        <div class="btn-group btn-group-sm">
                        <a  href="<?=base_url()?>order_id/<?=$orders->id?>" class="btn btn-default " > <i class="fa fa-info-circle no-ico" aria-hidden="true"></i></a>
                        </div>
                    </td>
                </tr>
            <?}?>
            </table>
        </div>


        </div>
    </div>
</div>

<?if(!$this->ion_auth->in_group(4)){?>
<div class="col-md-12 mgb20">
    <div class="col-md-12 white_block">
        <div class="col-md-12 mgb10">
            <div class="col-md-11 col-xs-6 adm_info"><i class="fa fa-list-alt" aria-hidden="true"></i> Posted Loads:</div>
            <div class=" btn btn-default toggl_block"><i class="fa fa-caret-down no-ico" aria-hidden="true"></i></div>

        </div>
        <div class="cls">
        <div class="col-md-12">

            <input class="form-control input-sm mgb20 findbyid" placeholder="Search by ID">

            <table class="table table-hover ">
                <thead>
                    <th>ID</th>
                    <th colspan="2"><i class="fa fa-calendar" aria-hidden="true"></i> Date: Start/End</th>
                    <th class="hidden-xs" colspan="2"><i class="fa fa-map-marker" aria-hidden="true"></i> Place: Start/End</th>
                    <th class="hidden-xs" colspan="2"></th>
                </thead>
            <?foreach($createdloads as $orders){?>

                <tr rel="orderid" data-id="<?=$orders->id?>">
                    <td class="start"><?=$orders->id?></td>
                    <td class="start"><?=$orders->date_start?></td>
                    <td class="end"><?=$orders->date_end?></td>
                    <td class="hidden-xs from"><?=$orders->from_end?></td>
                    <td class="hidden-xs to"><?=$orders->to_end?></td>

                    <td class=" status">

                    </td>
                    <td >
                        <div class="btn-group btn-group-sm">
                        <a  href="<?=base_url()?>order_id/<?=$orders->id?>" class="btn btn-default " > <i class="fa fa-info-circle no-ico" aria-hidden="true"></i></a>
                        <a  href="<?=base_url()?>user/orders/<?=$orders->id?>" class="btn btn-default " > <i class="fa fa-cog no-ico" aria-hidden="true"></i></a>
                       <?if($orders->user_id == $orders->accept and $orders->user_id !=0){?>
                        <div class="btn btn-success"><i class="fa fa-check no-ico" aria-hidden="true"></i></div>
                       <?}?>
                        </div>
                    </td>
                </tr>
            <?}?>
            </table>
        </div>


        </div>
    </div>
</div>
<?}?>
<div id="accp_disp" class="modal fade " role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Additioan information <span class="addit_id"></span></h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid  pad0">
                    <div class="col-md-12 pad5 mgb20 additional_info_data">
                    </div>
                    <div class="col-md-12 pad5 mgb20 additional_info">
                    </div>
                    <div class="col-md-12">
                        <a href="#" class="btn btn-success col-md-4 set_accept"><i class="fa fa-check" aria-hidden="true"></i> Accept</a>
                        <a href="#" class="btn btn-danger pull-right set_dicline col-md-4">  <i class="fa fa-ban "></i> Decline</a>
                    </div>




                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<!-- Modal -->
<div id="addi_attach" class="modal fade " role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Order <span class="order_number"></span>  </h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid load_adding_file pad0">


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<script>
    $(function(){

        $('div.cls:eq(0)').show();
        $('div.cls:eq(1)').show();
    });
</script>
