<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Logistic</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Cache-Control" content="no-cache">

    <link rel="stylesheet" type="text/css" href="<?=base_url()?>bootstrap/css/bootstrap.min.css" >
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="//stassociation.com/style/font-awesome.min.css" >
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>style/main.css?<?=rand(1,10000)?>" >
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
    <?if(isset($add_css) and count($add_css)>0 and is_array($add_css)){
        foreach($add_css as $css){?>
            <link rel="stylesheet" type="text/css" href="<?=base_url()?>style/<?=$css?>.css?<?=rand(1,10000)?>" >
        <?}
    }
    ?>
    <script>
        BASE_URL = "<?=base_url()?>";
        USER_ID = "<?=$this->ion_auth->get_user_id()?>";
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&amp;language=en&amp;key=AIzaSyCGWPy8EXdIZF6fIGX5IsMlrv2y-pT1BZY" ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="<?=base_url()?>bootstrap/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>js/radio.js"></script>
    <script src="<?=base_url()?>js/map.js?<?=rand(1,1000)?>"></script>
    <script src="<?=base_url()?>js/main.js?<?=rand(1,1000)?>"></script>



</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top header " >
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="<?=base_url()?>" class="col-sm-1 logo btn-block"></a>

        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

            <?
            $this->db->order_by("order", "asc");
            foreach($this->db->get('menu')->result() as $menu){?>
                <li class="headmenu">
                    <a  class="bounce-to-right head_menu" href="<?=$menu->menu_url?>"   aria-expanded="false"><?=$menu->menu_name?></a>
                    <ul class="headsubmenu">
                        <?foreach($this->db->get_where('submenu',array('parent_id'=>$menu->menu_id))->result() as $submenu){?>
                        <li><a href="<?=$submenu->submenu_url?>"><?=$submenu->submenu_name?></a></li>
                        <?}?>
                    </ul>

                </li>
            <?}?>
            </ul>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<script>
    $(function(){

        STARDO.init();

        if(localStorage.getItem('chanel') != ''){
        $('#radio_player').attr('src',localStorage.getItem('chanel'));
        }
        if(localStorage.getItem('play') == 1){
        document.getElementById('radio_player').play();
        $('.radio_play_btn').find('i').removeClass('fa-play');
        $('.radio_play_btn').find('i').addClass('fa-pause');
       }else{
        $('.radio_play_btn').find('i').addClass('fa-play');
        $('.radio_play_btn').find('i').removeClass('fa-pause');
       }
        $(window).scroll(function(){
            if(window.pageYOffset > 100){
            $('a.head_menu').addClass('a_scrl');
            $('a.logo').addClass('logo_scrl');
            }else{
                $('a.head_menu').removeClass('a_scrl');
                $('a.logo').removeClass('logo_scrl');
            }

        });
    });
</script>



<div class="col-md-12 submenu">

    <?if(!$this->ion_auth->logged_in()){?>


        <div class="col-md-2 col-sm-3 col-xs-4 pad0">  <a href="#" class="search_user"><i class="fa fa-search" aria-hidden="true"></i> Find user</a></div>
        <div class="col-md-1 col-sm-4  col-xs-5 radio_load pad0"></div>
        <div class="col-md-1 col-sm-3  pull-right pad0">
            <a href="javascript:void()" data-toggle="dropdown" ><i class="fa fa-lock" aria-hidden="true"></i> Login <i class="fa fa-caret-down" aria-hidden="true"></i></a>
            <ul class="dropdown-menu user_panel">
       <li> <a href="<?=base_url()?>auth/registration"><i class="fa fa-key" aria-hidden="true"></i> Registration</a></li>
       <li> <a href="<?=base_url()?>login?p=<?=current_url()?>"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign-in</a></li>
            </ul>

        </div>
    <?}else{?>


        <div class="col-md-2 col-sm-4 col-xs-6 radio_load"></div>
        <div class="col-md-2 col-sm-4 col-xs-6 pull-right pad0" >
            <a href="javascript:void()" data-toggle="dropdown" ><i class="fa fa-user-circle-o" aria-hidden="true"></i> <?=$this->ion_auth->user()->row()->username?> <i class="fa fa-caret-down" aria-hidden="true"></i></a> <?=($this->ion_auth->user()->row()->is_prim==1)?'<span class="" style="color: #2fbd2f;padding: 0px 5px">Premium</span>':'';?>
            <ul class="dropdown-menu user_panel">
                <?if($this->router->fetch_class()=='logistic' and !$this->ion_auth->in_group(4) and $this->ion_auth->logged_in()){?>
                    <li>    <a id="addOrder" ><i class="fa fa-plus" aria-hidden="true"></i> Аdd load</a></li>
                <?}?>
                <?if($this->ion_auth->is_admin()){?><li><a href="<?=base_url()?>auth"><i class="fa fa-cog fa-spin" aria-hidden="true"></i> Admin</a></li><?}?>
                <li>  <a href="<?=base_url()?>dashboard/"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a></li>

                <li>  <a href="#" class="search_user"><i class="fa fa-search" aria-hidden="true"></i> Find user</a></li>
                <li> <a href="<?=base_url()?>user/"><i class="fa fa-user-circle-o" aria-hidden="true"></i> My profile</a></li>
                <li> <a href="<?=base_url()?>logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Sign-out</a></li>

            </ul>
        </div>
    <?}?>
</div>
<div class="search_block_container">
    <div class="search_block">
        <div class="search_head">
            <form id="search_inp" style="margin: 0px" method="get" action="<?=base_url()?>search">
                <input name='s' class="search_block" placeholder="Find users"> <a class="find_btn" href="javascript:void ()"  > Find</a>
                <a class="search_close" href="javascript:void()"><i class="fa fa-2x fa-times-circle-o"></i></a>
            </form>
        </div>
    </div>
</div>
<script>
    $(function(){
        $('.search_user, .search_close').on('click',function(){
            $('.search_block_container').slideToggle();
        });



        $('.find_btn').on('click',function(){
            $('#search_inp').submit();
        });
    });
</script>


<div class="col-md-12" style="display: block">
    <ol class="breadcrumb">
        <?foreach($breadcrumbs as $k => $breadcrumb){?>
         <?if(count($breadcrumbs)-1 != $k){?><li><a href="<?echo(isset($breadcrumbs[$k]['link']))?$breadcrumbs[$k]['link']:base_url();?>"><?echo(isset($breadcrumbs[$k]['name']))?$breadcrumbs[$k]['name']:$breadcrumb;?></a></li><?}else{?>
        <li class="active"><?echo(isset($breadcrumbs[$k]['name']))?$breadcrumbs[$k]['name']:$breadcrumb;?></li><?}?>
        <?}?>
    </ol>
</div>