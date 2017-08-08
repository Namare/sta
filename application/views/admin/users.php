

<div class="col-md-12  ">

<div class="col-md-12  white_block">
    <div class="col-md-12 mgb10">
        <div class="col-md-4 adm_info"><i class="fa fa-cog" aria-hidden="true"></i> <?=$content['header']?></div>
        <div class="col-md-4 pad5">
            <div class="form-group">
                <button  data-toggle="modal" data-target="#add_user" class="btn btn-success"> <i class="fa fa-user-plus" aria-hidden="true"></i>Создать</button>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a href="#"><i class="fa fa-list" aria-hidden="true"></i> Список</a></li>
<!--            <li role="presentation"><a href="#"><i class="fa fa-truck" aria-hidden="true"></i> Водители</a></li>-->
<!--            <li role="presentation"><a href="#"><i class="fa fa-suitcase" aria-hidden="true"></i> Заказчики</a></li>-->

        </ul>

    </div>


    <div class="col-md-12 pad10">

            <table class="table table-hover lh_adm">
                <thead>
                <tr>
                    <th>Действие</th>
                    <th>id</th>
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Компания</th>
                    <th>Роль</th>

                </tr>
                </thead>
                <tbody>
                <?foreach($list_users as $users){?>
                <tr>
                    <td style="width:80px">
                        <div class="dropdown" >
                            <button class="btn btn-default dropdown-toggle" type="button" id="drm1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <span class="fa fa-cogs"></span>
                            </button>
                            <ul class="dropdown-menu pull-left" aria-labelledby="drm1">
                                <li><a href="<?=base_url()?>user/user_id/<?=$users->id?>"><span class="fa fa-user-circle"></span> Profile</a></li>
                                <li><a href="javascript:void(0)"  class="del_user" data-id="<?=$users->id?>"><span class="fa fa-trash"></span> Удал.</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#" data-id="<?=$users->id?>" class="change_premium"><i class="fa fa-id-card-o"></i> Change Premium</a></li>
                            </ul>
                        </div>

                    </td>
                    <td><span class="label label-default"><?=$users->id?></span></td>
                    <td><?=$users->first_name?></td>
                    <td><?=$users->last_name?></td>
                    <td><?=$users->company?></td>
                    <td><?=$this->ion_auth->get_users_groups($users->id)->result()[0]->name?></td>
                    <td><?=($users->is_prim==0)?'<span class="text-danger">No premium</span>':'<span class="text-success">Premium</span>';?></td>


                </tr>
                <?}?>
                </tbody>
            </table>
    </div>
</div>



    <div id="add_user" class="modal fade " role="dialog">
        <div class="modal-dialog  modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Создать анкету пользователя</h4>
                </div>
                <div class="container-fluid pad10">
                <div class="col-md-12 ">
                      <div class="form-group col-md-3">
                         <label>Логин пользователя:</label>
                         <input placeholder="Введите логин" name="username" class="form-control">
                       </div>
                        <div class="form-group col-md-3">
                            <label>Email пользователя:</label>
                            <input placeholder="Введите email" name="email" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Имя:</label>
                            <input placeholder="Введите имя" name="first_name" class="form-control">
                        </div>

                        <div class="form-group col-md-3">
                            <label>Фамилия:</label>
                            <input placeholder="Введите фамилию" name="last_name" class="form-control">
                        </div>

                    <div class="form-group col-md-4">
                        <label>Компания:</label>
                        <input placeholder="Название компании" name="company" class="form-control">
                    </div>

                        <div class="form-group col-md-4">
                            <label>Тип аккаунта:</label>
                            <select placeholder="Тип анкеты" name="type_acc" class="form-control">
                                <option>Нет</option>
                                <option>Водитель</option>
                                <option>Заказчик</option>
                            </select>
                        </div>



                        <div class="form-group col-md-4">
                            <label>Права доступа:</label>

                            <select placeholder="Тип анкеты" class="form-control">
                                <option disabled selected>Тип анкеты</option>
                                <option>Администратор</option>
                                <option>Модератор</option>
                                <option>Пользователь</option>
                            </select>
                        </div>

                </div>

                <div class="col-md-12 ">
                    <div class="form-group col-md-3">
                        <label>Пароль:</label>
                        <input placeholder="Название компании" name="password" class="form-control">
                    </div>

                    <div class="form-group col-md-3">
                        <label>Подтвердите пароль:</label>
                        <input placeholder="Название компании" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                    <label>Создать пользователя:</label>
                    <button id="new_user" class="btn btn-success btn-block"><i class="fa fa-user-plus" aria-hidden="true"></i>Создать</button>
                    </div>

                </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>


</div>