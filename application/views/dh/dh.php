<style>
    td,th {vertical-align: middle !important;}
</style>
<div class="col-md-12 ">
    <div class="col-md-12 white_block">
        <div class="col-md-12  col-xs-12 mgb10">
            <div class="col-md-12 col-sm-7 col-xs-7 adm_info"><i class="fa fa-tachometer" aria-hidden="true"></i> My Dashboard</div>
           </div>

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-newspaper-o" aria-hidden="true"></i> История событий</div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Дата</th>
                                <th>Событие</th>
                                <th>Описание</th>
                                <th>Дополнительные Данные</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?foreach($news as $news){?>
                            <tr>
                                <th scope="row"><i class="fa fa-<?=$news->icon?>" aria-hidden="true"></i></th>
                                    <td><?=date('d.m.Y H:i',$news->date)?></td>
                                    <td><b><?=$news->name?></b></td>
                                    <td><?=($this->ion_auth->get_user_id() != $news->owner_id)?$news->description:$news->description2?></td>
                                <td>
                                    <ul class="list-group">
                                        <?
                                        $ar = unserialize($news->data);
                                        if($ar!=null)
                                        foreach($ar as $arr){?>
                                        <li class="list-group-item">
                                            <?=$arr['name']?>
                                            <?=$arr['value']?>
                                        </li>
                                        <?}?>
                                    </ul>
                                </td>
                            </tr>
                        <?}?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>