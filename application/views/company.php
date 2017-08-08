<div class="col-md-12 ">
    <div class="col-md-10 col-md-push-1 white_block pad0 border_lr">
        <div class="col-md-5 profiletitle"> <?=$company[0]->company_name?> <i class="fa fa-building pull-right" aria-hidden="true"></i> </div>



    <div class="col-md-12 pad0 profile">
        <div class="col-md-12pad0">
            <div class="thumbnail">
                <div class="caption">
                    <h3><i class="fa fa-info-circle" aria-hidden="true"></i> О Компании:</h3>
                    <p><b><?=$company[0]->company_type?></b></p>
                    <p><?=$company[0]->company_description?></p>
                </div>
            </div>
        </div>
    </div>


        <div class="col-md-12 pad0">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading "><i class="fa fa-truck" aria-hidden="true"></i> Водители</div>
                    <div class="panel-body pad0">
                        <table class="table table-hover">
                            <?foreach($company_users as $user){
                                if(!$this->ion_auth->in_group(4,$user->id))continue
                                ?>
                            <tr>
                                <td> <?=$user->username?>: <?=$user->first_name?> <?=$user->last_name?></td>
                                <td>
                                    <div class="pull-right btn-group-xs">
                                        <a target="_blank" href="<?=base_url()?>user/user_id/<?=$user->id?>" class="btn btn-default"><i class="fa fa-external-link" aria-hidden="true"></i> Open profile</a>
                                    </div>
                                </td>
                            </tr>

                            <?}?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Операторы</div>
                    <div class="panel-body pad0">
                        <table class="table table-hover">
                            <?foreach($company_users as $user){

                                if($this->ion_auth->in_group(4,$user->id)){continue;}
                                $user_arr[] = $user->id;
                                ?>
                                <tr>
                                    <td> <?=$user->username?>: <?=$user->first_name?> <?=$user->last_name?></td>
                                    <td>
                                        <div class="pull-right btn-group-xs">
                                            <a target="_blank" href="<?=base_url()?>user/user_id/<?=$user->id?>" class="btn btn-default"><i class="fa fa-external-link" aria-hidden="true"></i> Open profile</a>
                                        </div>
                                    </td>
                                </tr>
                            <?}?>

                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-th-list" aria-hidden="true"></i> Заказы</div>
                    <div class="panel-body pad0">
                        <table class="table table-hover">
                            <? foreach($this->db->query('select * from logistic_orders where owner_id in('.implode(',',$user_arr).')')->result() as $us){

                                ?>
                                <tr>
                                    <td><i class="fa fa-map-marker" aria-hidden="true"></i> <?=$us->from_end?> <i class="fa fa-long-arrow-right" aria-hidden="true"></i> <?=$us->to_end?></td>
                                    <td>
                                        <div class="pull-right btn-group-xs">
                                            <a target="_blank" href="<?=base_url()?>order_id/<?=$us->id?>" class="btn btn-default"><i class="fa fa-external-link" aria-hidden="true"></i> Open order page</a>
                                        </div>
                                    </td>
                                </tr>
                            <?}?>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>