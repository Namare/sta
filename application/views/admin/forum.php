
<div class="col-md-12  ">

    <div class="col-md-12  white_block">
        <div class="col-md-12 mgb10">
            <div class="col-md-4 adm_info"><i class="fa fa-cog" aria-hidden="true"></i> <?=$content['header']?></div>
            <div class="col-md-4 pad5">
                <div class="form-group">

                </div>
            </div>
        </div>

        <div class="col-md-12 ">
            <table class="table table-hover ">
                <thead>
                <tr>
                    <th>Имя Группы Форумов</th>
                    <th>Переименовать</th>
                    <th>Добавить</th>
                </tr>
                </thead>
                <tbody>
                <?foreach($list_forums as $forums){?>
                <tr>
                    <td><?=$forums->forum_name?></td>
                    <td><input class="form-control" name="rename" data-id="<?=$forums->forum_id?>" value="<?=$forums->forum_name?>"></td>
                    <td><button data-toggle="modal" data-name="<?=$forums->forum_name?>" data-id_forum="<?=$forums->forum_id?>" data-target="#add_fr" class="btn btn-success add_btn"><i class="fa fa-plus" aria-hidden="true"></i>Добавить тему</button></td>
                </tr>
               <?}?>
                </tbody>
            </table>
        </div>


        <div class="col-md-12 ">
            <table class="table table-hover ">
                <thead>
                <tr>
                    <th>Имя темы</th>
                    <th>Переименовать</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?foreach($list_subforum as $subforums){?>
                <tr>
                    <td><?=$subforums->post_name?></td>
                    <td><input class="form-control" name="rename_sub"  data-id="<?=$subforums->post_id?>" value="<?=$subforums->post_name?>"></td>

                    <td>
                        <div class="btn-group pull-right">
                            <button data-toggle="modal" data-target="#add_fr" data-name="<?=$subforums->post_name?>" data-id_post="<?=$subforums->post_id?>" class="btn btn-success add_btn"><i class="fa fa-plus" aria-hidden="true"></i>Добавить тему</button>
                            <button class="btn btn-success"><i class="fa fa-list" aria-hidden="true"></i>Список тем</button>
                        </div>

                    </td>
                </tr>
               <?}?>
                </tbody>
            </table>
        </div>

    </div>

</div>


<div id="add_fr" class="modal fade " role="dialog">
    <div class="modal-dialog  modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Создать Тему </h4>
            </div>
            <div class="container-fluid pad10">
                <div class="col-md-12 ">
                    <div class="form-group col-md-push-2 col-md-8">
                        <label><b class="edit_forum_head"></b> </label>
                        <input placeholder="Заголовок" name="th_title" class="form-control edit_forum_head">
                    </div>
                     <div class="form-group col-md-push-2 col-md-8 hd">
                        <label>Описание: </label>
                        <textarea class="form-control" name="desc"></textarea>
                    </div>
                    <div class="col-md-12 col-md-push-2 col-md-8">
                        <button id="add_new_fr"  class="btn btn-success btn-block"><i class="fa fa-plus" aria-hidden="true"></i>Создать</button>
                    </div>

                </div>




            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default"  data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>