<div class="col-md-12  white_block">
    <div class="col-md-12 mgb10">
       <div class="col-md-3 adm_info"><i class="fa fa-user-secret" aria-hidden="true"></i> Административная часть</div>
       <div class="col-md-3 adm_info">Пользователей на сайте: <i class="fa fa-user-circle-o" aria-hidden="true"></i> <?=rand(5,7)?></div>
    </div>

    <div class="col-md-3 ">
        <div class="admin_header"> Пользователи</div>
        <a href="<?=base_url()?>admin/users" class="admin_menu"><i class="fa fa-users" aria-hidden="true"></i>  Пользователи</a>
<!--        <a class="admin_menu"><i class="fa fa-user-plus" aria-hidden="true"></i> Создать пользователя</a>-->
    </div>
    <div class="col-md-3">
        <div class="admin_header"> Компании и фирмы</div>
        <a href="<?=base_url()?>admin/company/" class="admin_menu"><i class="fa fa-building-o" aria-hidden="true"></i>  Компании</a>

<!--        <a class="admin_menu"><i class="fa fa-plus" aria-hidden="true"></i> Создать Компанию</a>-->
    </div>

    <div class="col-md-3">
        <div class="admin_header"> Настройки сайта</div>
        <a href="<?=base_url()?>admin/pages/" class="admin_menu"><i class="fa fa-file" aria-hidden="true"></i> Статьи</a>
        <a href="<?=base_url()?>admin/edit_menu/" class="admin_menu"><i class="fa fa-list" aria-hidden="true"></i>Меню</a>
        <a href="<?=base_url()?>admin/stanews/" class="admin_menu"><i class="fa fa-newspaper-o" aria-hidden="true"></i>Новости</a>
        <a href="<?=base_url()?>/admin/events/" class="admin_menu"><i class="fa fa-calendar" aria-hidden="true"></i>События</a>
    </div>

    <div class="col-md-3">
        <div class="admin_header"> Настройки форума</div>
        <a class="admin_menu" href="<?=base_url()?>admin/forum"><i class="fa fa-comments" aria-hidden="true"></i></i>  Создать тему</a>
        <a class="admin_menu"><i class="fa fa-cog  fa-spin" aria-hidden="true"></i> Настройки</a>
    </div>

<!--    <div class="col-md-3">-->
<!--        <div class="admin_header"> Авто</div>-->
<!--        <a class="admin_menu"><i class="fa fa-truck fa-flip-horizontal" aria-hidden="true"></i>Список авто</a>-->
<!--    </div>-->

    <div class="col-md-12 mgt20 mgb20">
        <div class="col-md-12 adm_info"><i class="fa fa-bar-chart" aria-hidden="true"></i> Статистика</div>

        <div class="col-md-6 ">
        <table class="table table-hover ">
            <thead>
            <tr>
                <th>Заказы</th>
                <th>Оставлено</th>
                <th>Взято</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>За день</td>
                <td><span class="label label-default">10</span></td>
                <td><span class="label label-default">3</span></td>
            </tr>
            <tr>
                <td>За неделю</td>
                <td><span class="label label-default">54</span></td>
                <td><span class="label label-default">30</span></td>
            </tr>
            <tr>
                <td>За месяц</td>
                <td><span class="label label-default">211</span></td>
                <td><span class="label label-default">146</span></td>
            </tr>
            </tbody>
        </table>
        </div>

        <div class="col-md-3 ">
        <table class="table table-hover ">
            <thead>
            <tr>
                <th> Пользователей</th>
                <th>Новых</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>За день</td>
                <td><span class="label label-default">2</span></td>
            </tr>
            <tr>
                <td>За неделю</td>
                <td><span class="label label-default">24</span></td>

            </tr>
            <tr>
                <td>За месяц</td>
                <td><span class="label label-default">52</span></td>
            </tr>
            </tbody>
        </table>
        </div>

        <div class="col-md-3 ">
        <table class="table table-hover ">
            <thead>
            <tr>
                <th>Посещений</th>
                <th>Логистика</th>
                <th>Форум</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>За день</td>
                <td><span class="label label-default">100</span></td>
                <td><span class="label label-default">53</span></td>
            </tr>
            <tr>
                <td>За неделю</td>
                <td><span class="label label-default">450</span></td>
                <td><span class="label label-default">750</span></td>

            </tr>
            <tr>
                <td>За месяц</td>
                <td><span class="label label-default">705</span></td>
                <td><span class="label label-default">1039</span></td>
            </tr>
            </tbody>
        </table>
        </div>


    </div>



</div>