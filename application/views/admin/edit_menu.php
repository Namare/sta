<div class="col-md-12">
    <div class="col-md-12  white_block ">

        <div class="col-md-12 mgb10">
            <div class="col-md-4 adm_info"><i class="fa fa-cog" aria-hidden="true"></i> <?=$content['header']?></div>
            <div class="col-md-4 pad5">
                <div class="form-group">
                    <button data-target="#add_menu" data-toggle="modal"  class="btn btn-success add_menu"><i class="fa fa-plus" aria-hidden="true"></i> Добавить меню</button>
                </div>
            </div>
        </div>

        <?foreach($menu as $menu){?>
        <div class="col-md-12 edit_menu">
            <div class="col-md-2 edit_main_menu">
                <button class="btn btn-default btn-block "  ><?=$menu->menu_name?></button>
            </div>
            <?foreach($this->db->get_where('submenu',array('parent_id'=>$menu->menu_id))->result() as $submenu){?>
            <div class="pad3"  style="display: inline-block; margin: 0px 5px">
                <div class="btn-group">
                    <button class="btn btn-default"><?=$submenu->submenu_name?></button>
                    <button class="btn btn-default edit_submenu" data-target="#edit_submain_menu_modal" data-toggle="modal" data-name='<?=$submenu->submenu_name?>' data-url='<?=$submenu->submenu_url?>' data-id="<?=$submenu->submenu_id?>"><span class="fa fa-edit"></span></button>
                    <button class="btn btn-default del_submenu"  data-id="<?=$submenu->submenu_id?>" ><span class="fa fa-trash"></span></button>
                </div>
            </div>
            <?}?>

            <div class="col-sm-2 edit_main_menu pull-right" style="width: 8.666666%">
                <div class="btn-group">
                   <button class="btn btn-success add_submenu"  data-id="<?=$menu->menu_id?>" data-toggle="modal"  data-target='#add_submenu_modal'><span class="fa fa-plus"></span></button>
                   <button class="btn btn-success edit_menu_modal" data-name="<?=$menu->menu_name?>" data-url="<?=$menu->menu_url?>"  data-id="<?=$menu->menu_id?>"  data-target="#edit_menu_modal" data-toggle="modal" data-id="<?=$menu->menu_id?>"><span class="fa fa-edit"></span></button>
                   <button class="btn btn-success delete_menu" data-id="<?=$menu->menu_id?>"><span class="fa fa-trash"></span></button>
                </div>
            </div>
        </div>
        <?}?>


    </div>
</div>


<div id="add_submenu_modal" class="modal fade " role="dialog">
    <div class="modal-dialog  modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Добавить подменю</h4>
            </div>
            <div class="container-fluid pad10">
                <div class="col-md-12 ">
                    <div class="form-group col-md-push-2 col-md-8">
                        <label>Имя:</label>
                        <input placeholder="Имя" name="add_submenu_name" class="form-control edit_forum_head">
                    </div>
                    <div class="form-group col-md-push-2 col-md-8 hd">
                        <label>URL: </label>
                        <input placeholder="Ссылка" name="add_submenu_url" class="form-control edit_forum_head">
                    </div>
                    <div class="col-md-12 col-md-push-2 col-md-8">
                        <button id="add_submenu" rel="" class="btn btn-success btn-block"><i class="fa fa-plus" aria-hidden="true"></i>Добавить</button>
                    </div>

                </div>




            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default"  data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>


<div id="edit_submain_menu_modal" class="modal fade " role="dialog">
    <div class="modal-dialog  modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Редактировать подменю</h4>
            </div>
            <div class="container-fluid pad10">
                <div class="col-md-12 ">
                    <div class="form-group col-md-push-2 col-md-8">
                        <label>Имя:</label>
                        <input placeholder="Имя" name="edit_submenu_name" class="form-control edit_forum_head">
                    </div>
                    <div class="form-group col-md-push-2 col-md-8 hd">
                        <label>URL: </label>
                        <input placeholder="Ссылка" name="edit_submenu_url" class="form-control edit_forum_head">
                    </div>
                    <div class="col-md-12 col-md-push-2 col-md-8">
                        <button id="edit_submain_menu" rel="" class="btn btn-success btn-block"><i class="fa fa-plus" aria-hidden="true"></i>Изменить</button>
                    </div>

                </div>




            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default"  data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<div id="edit_menu_modal" class="modal fade " role="dialog">
    <div class="modal-dialog  modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Редактировать меню</h4>
            </div>
            <div class="container-fluid pad10">
                <div class="col-md-12 ">
                    <div class="form-group col-md-push-2 col-md-8">
                        <label>Имя:</label>
                        <input placeholder="Имя" name="edit_menu_name" class="form-control edit_forum_head">
                    </div>
                    <div class="form-group col-md-push-2 col-md-8 hd">
                        <label>URL: </label>
                        <input placeholder="Ссылка" name="edit_menu_url" class="form-control edit_forum_head">
                    </div>
                    <div class="col-md-12 col-md-push-2 col-md-8">
                        <button id="edit_main_menu" rel="" class="btn btn-success btn-block"><i class="fa fa-plus" aria-hidden="true"></i>Изменить</button>
                    </div>

                </div>




            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default"  data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<div id="add_menu" class="modal fade " role="dialog">
    <div class="modal-dialog  modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Создать меню</h4>
            </div>
            <div class="container-fluid pad10">
                <div class="col-md-12 ">
                    <div class="form-group col-md-push-2 col-md-8">
                        <label>Имя:</label>
                        <input placeholder="Имя" name="menu_name" class="form-control edit_forum_head">
                    </div>
                    <div class="form-group col-md-push-2 col-md-8 hd">
                        <label>URL: </label>
                        <input placeholder="Ссылка" name="menu_url" class="form-control edit_forum_head">
                    </div>
                    <div class="col-md-12 col-md-push-2 col-md-8">
                        <button id="add_new_menu"  class="btn btn-success btn-block"><i class="fa fa-plus" aria-hidden="true"></i>Создать</button>
                    </div>

                </div>




            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default"  data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>