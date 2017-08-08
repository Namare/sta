<div class="col-md-12  ">

    <div class="col-md-12  white_block">
        <div class="col-md-12 mgb10">
            <div class="col-md-4 adm_info"><i class="fa fa-cog" aria-hidden="true"></i> <?=$content['header']?></div>
            <div class="col-md-4 pad5">
                <input class="form-control input-sm" name="title" placeholder="new Title">
            </div>
            <div class="col-md-4 pad5">
                <button  class="btn btn-success add_page"><i class="fa fa-plus" aria-hidden="true"></i> Добавить</button>
            </div>
        </div>

        <div class="col-md-12 ">
            <table class="table table-hover ">
                <thead>
                <tr>
                    <th>Имя Группы Форумов</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?foreach($pages as $page){?>
                        <tr>
                            <td><?=$page->title?></td>
                            <td>
                                <div class="pull-right">
                                    <button  data-id="<?=$page->page_id?>"  class="btn btn-danger del_page"><i class="fa fa-trash" aria-hidden="true"></i> Удалить</button>
                                    <a href="<?=base_url()?>admin/edit_page/<?=$page->page_id?>" class="btn btn-success"><i class="fa fa-edit" aria-hidden="true"></i> Редактировать</a>
                                    <a href="<?=base_url()?>pages/<?=$page->page_id?>" class="btn btn-success"><i class="fa fa-file" aria-hidden="true"></i> Просмотр</a>

                                </div>
                            </td>
                            <td></td>
                        </tr>
                <?}?>

                </tbody>
            </table>
        </div>




    </div>
</div>