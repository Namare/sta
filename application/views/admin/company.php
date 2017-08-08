
<div class="col-md-12  ">

    <div class="col-md-12  white_block">
        <div class="col-md-12 mgb10">
            <div class="col-md-4 adm_info"><i class="fa fa-cog" aria-hidden="true"></i> <?=$content['header']?></div>
            <div class="col-md-4 pad5">
                <div class="form-group">
                    <button  data-toggle="modal" data-target="#add_company" class="btn btn-success"> <i class="fa fa-user-plus" aria-hidden="true"></i>Создать</button>
                </div>
            </div>
        </div>





        <div class="col-md-12 pad10">

            <table class="table table-hover lh_adm">
                <thead>
                <tr>
                    <th>Действие</th>
                    <th><i class="fa fa-building" aria-hidden="true"></i> Имя компании</th>
                    <th><span class="fa fa-id-card-o"></span> Профиль</th>
                    <th><span class="fa fa-truck"></span> Водителей</th>
                    <th><span class="fa fa-user"></span> Заказчиков</th>


                </tr>
                </thead>
                <tbody>
                    <?foreach($company_list as $company){?>
                    <tr>
                        <td style="width:80px">
                            <div class="dropdown" >
                                <button class="btn btn-default dropdown-toggle" type="button" id="drm1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <span class="fa fa-cogs"></span>
                                </button>
                                <ul class="dropdown-menu pull-left" aria-labelledby="drm1">
                                    <li><a href="javascript:void(1)" ><span class="fa fa-pencil"></span> Ред.</a></li>
                                    <li><a href="javascript:void(1)" class="del_company" data-id="<?=$company->id?>" ><span class="fa fa-trash"></span> Удал.</a></li>

                                    <li role="separator" class="divider"></li>

                                </ul>
                            </div>

                        </td>
                        <td><?=$company->company_name?></td>
                        <td><?=$company->company_type?></td>
                        <td></td>
                        <td></td>


                    </tr>
                    <?}?>
                </tbody>
            </table>
        </div>
    </div>



    <div id="add_company" class="modal fade " role="dialog">
        <div class="modal-dialog  modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Создать анкету Компании</h4>
                </div>
                <div class="container-fluid pad10">
                    <div class="col-md-12 ">
                        <div class="form-group col-md-6">
                            <label>Имя компании:</label>
                            <input placeholder="Введите имя" name="company_name" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Тип компании:</label>
                            <input placeholder="Профиль компании" name="company_type" class="form-control">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Описание компании</label>

                            <textarea name="company_description" class="form-control"></textarea>
                        </div>

                    </div>

                    <div class="col-md-12 ">

                        <div class="form-group col-md-6">
                            <label>Создать компанию:</label>
                            <button id="new_company" class="btn btn-success btn-block"><i class="fa fa-building-o" aria-hidden="true"></i>Создать</button>
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