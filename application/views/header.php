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
    <script src="<?=base_url()?>js/radio.js?<?=rand(1,10000)?>"></script>
    <script src="<?=base_url()?>js/map.js?<?=rand(1,1000)?>"></script>
    <script src="<?=base_url()?>js/main.js?<?=rand(1,1000)?>"></script>
    <script type="text/javascript" src="/Slavic Truckers Association_files/superfish.js.загружено"></script>


    <style type='text/css'>


        @media (min-width: 768px) and (max-width: 979px) {
            .sidebar .search-form_it { width:130px; }
        }
        .nav__primary {
            position:relative;
            z-index:15;
        }
        .sf-menu, .sf-menu * {
            margin:0;
            padding:0;
            list-style:none;
        }
        .sf-menu { line-height:1.0; }
        .sf-menu ul {
            display:none;
            position:absolute;
            top:-999em;
            width:10em;
        }
        .sf-menu ul li { width:100%; }
        .sf-menu li:hover { visibility:inherit; }
        .sf-menu li {
            position:relative;
            float:left;
        }
        .sf-menu a {
            position:relative;
            display:block;
        }
        .sf-menu li:hover ul, .sf-menu li.sfHover ul {
            top:100%;
            left:0;
            z-index:99;
        }
        ul.sf-menu li:hover li ul, ul.sf-menu li.sfHover li ul { top:-999em; }
        ul.sf-menu li li:hover ul, ul.sf-menu li li.sfHover ul {
            top:0;
            left:100%;
        }
        ul.sf-menu li li:hover li ul, ul.sf-menu li li.sfHover li ul { top:-999em; }
        ul.sf-menu li li li:hover ul, ul.sf-menu li li li.sfHover ul {
            top:0;
            left:10em;
        }
        .sf-menu { float:right; }
        .sf-menu > li {
            background:#ddd;
            text-align:center;
        }
        .sf-menu > li > a {
            padding:10px 12px;
            border-top:1px solid #DDD;
            border-left:1px solid #fff;
            color:#13a;
            text-decoration:none;
        }
        .sf-menu li .desc {
            display:block;
            font-size:0.9em;
        }
        .sf-menu li li { background:#AABDE6; }
        .sf-menu li li a {
            padding:10px 12px;
            border-top:1px solid #DDD;
            border-left:1px solid #fff;
            color:#13a;
            text-decoration:none;
        }
        .sf-menu > li > a:hover, .sf-menu > li.sfHover> a, .sf-menu > li.current-menu-item > a, .sf-menu > li.current_page_item > a { background:#CFDEFF; }
        .sf-menu li li > a:hover, .sf-menu li li.sfHover > a, .sf-menu li li.current-menu-item > a, .sf-menu li li.current_page_item > a { background:#CFDEFF; }
        .sf-menu a.sf-with-ul {
            padding-right:2.25em;
            min-width:1px;
        }
        .sf-sub-indicator {
            position:absolute;
            top:1.05em;
            right:.75em;
            display:block;
            overflow:hidden;
            width:10px;
            height:10px;
            background:url(/images/arrows-ffffff.png) no-repeat -10px -100px;
            text-indent:-999em;
        }
        a > .sf-sub-indicator { background-position:0 -100px; }
        a:focus > .sf-sub-indicator, a:hover > .sf-sub-indicator, a:active > .sf-sub-indicator, li:hover > a > .sf-sub-indicator, li.sfHover > a > .sf-sub-indicator { background-position:-10px -100px; }
        .sf-menu ul .sf-sub-indicator { background-position:-10px 0; }
        .sf-menu ul a > .sf-sub-indicator { background-position:0 0; }
        .sf-menu ul a:focus > .sf-sub-indicator, .sf-menu ul a:hover > .sf-sub-indicator, .sf-menu ul a:active > .sf-sub-indicator, .sf-menu ul li:hover > a > .sf-sub-indicator, .sf-menu ul li.sfHover > a > .sf-sub-indicator { background-position:-10px 0; }
        @media (max-width: 767px) {
            .sf-menu { display:none; }
        }
        .select-menu {
            display:none;
            border:1px solid #DDD;
            background-color:#e4e4e4;
            width:100%;
            height:30px;
            padding:5px;
            margin:0;
            cursor:pointer;
            outline:none;
            -webkit-border-radius:4px;
            -moz-border-radius:4px;
            border-radius:4px;
        }
        .select-menu:focus { border-color:#DDD; }
        .select-menu option {
            padding:5px;
            cursor:pointer;
        }
        .select-menu option.main_item { font-weight:bold; }
        .logo_h__txt, .logo_link { font: normal 80px/70px Lato;  color:#ffffff; }
        .sf-menu > li > a { font: bold 20px/30px Lato;  color:#ffffff; }
        .nav.footer-nav a { font: normal 12px/18px Lato;  color:#ffffff; }
        .sf-menu {
            position:relative;
            float:none;
        }
        .sf-menu a.sf-with-ul { padding-right:0px !important; }
        .sf-menu a.sf-with-ul .sf-sub-indicator {
            position:absolute;
            right:50%;
            margin-right:-5px;
            background-image:url(images/arrows-ffffff.png) !important;
        }
        .isStuck .sf-menu {
            box-shadow:0 0 3px #000;
            box-shadow:0 0 7px rgba(0,0,0,0.6);
        }
        .sf-menu>li {
            text-align:center;
            background:none;
        }
        .sf-menu>li>a, .sf-menu>li>a.sf-with-ul {
            -webkit-transition:color 0.5s ease;
            -moz-transition:color 0.5s ease;
            -o-transition:color 0.5s ease;
            transition:color 0.5s ease;
            background:none !important;
            position:relative;
            z-index:1;
            text-transform:uppercase;
            padding:35px 30px !important;
            border:none;
            overflow:hidden;
        }
        .sf-menu>li>a>.sf-sub-indicator, .sf-menu>li>a.sf-with-ul>.sf-sub-indicator {
            background:url(images/arrows-ffffff.png) 0 bottom no-repeat !important;
            right:50%;
            margin-right:-5px !important;
            bottom:30px !important;
            margin:0px 0 0;
            top:auto !important;
            opacity:1 !important;
        }
        .sf-menu>li>a:before, .sf-menu>li>a.sf-with-ul:before {
            position:absolute;
            top:50%;
            content:'';
            width:0px;
            height:0px;
            left:50%;

            -webkit-transform:translate(-50%,-50%);
            -moz-transform:translate(-50%,-50%);
            -ms-transform:translate(-50%,-50%);
            -o-transform:translate(-50%,-50%);
            transform:translate(-50%,-50%);
            background-color:#2d1009;
            z-index:-1;
            -webkit-transition:0.4s ease;
            -moz-transition:0.4s ease;
            -o-transition:0.4s ease;
            transition:0.4s ease;
        }
        .sf-menu>li>a:before, .sf-menu>li>a.sf-with-ul:before {
            left:-20px;
            -webkit-transform:translate(-40%,-50%);
            -moz-transform:translate(-40%,-50%);
            -ms-transform:translate(-40%,-50%);
            -o-transform:translate(-40%,-50%);
            transform:translate(-40%,-50%);
        }
        .sf-menu>li>a:after, .sf-menu>li>a.sf-with-ul:after {
            right:-20px;
            -webkit-transform:translate(50%,-50%);
            -moz-transform:translate(50%,-50%);
            -ms-transform:translate(50%,-50%);
            -o-transform:translate(50%,-50%);
            transform:translate(50%,-50%);
        }
        .sf-menu .sub-menu {
            top:100% !important;
            padding:15px 0 16px;
            background-color:#402b2a;
            width:182px;
            left:0% !important;
            text-transform:none;
        }
        .sf-menu .sub-menu li {
            background:none;
            text-align:left;
            text-transform:none;
            font:14px/20px 'Lato', sans-serif;
        }
        .sf-menu .sub-menu li+li { margin-top:-1px; }
        .sf-menu .sub-menu li.sfHover>a {
            color:#fff;
            background-color:#2d1009 !important;
        }
        .sf-menu .sub-menu li a {
            position:relative;
            background:none !important;
            color:#fff;
            -webkit-transition:background-color 0.5s ease;
            -moz-transition:background-color 0.5s ease;
            -o-transition:background-color 0.5s ease;
            transition:background-color 0.5s ease;
            display:block;
            padding:10px 30px 11px;
            border:0;
            letter-spacing:1px;
        }
        .sf-menu .sub-menu li a .sf-sub-indicator {
            top:auto !important;
            bottom:16px !important;
            left:0;
            margin-left:5px;
        }
        .sf-menu .sub-menu li a:hover {
            color:#fff;
            background-color:#2c1812 !important;
        }
        .sf-menu .sub-menu .sub-menu {
            top:0 !important;
            width:150px;
            margin-top:-15px;
            left:100% !important;
            margin-left:0px !important;
        }
        .sf-menu .sub-menu .sub-menu li a:hover { color:#fff; }
        .isStuck {
            background-color:#e11313;
            left:0;
            right:0;
            z-index:999;
        }
        .isStuck .sf-menu {
            margin-top:-2px;
            float:none;
            text-align:center;
            box-shadow:none;
            top:0;
            left: 14%;
        }
        .isStuck .sf-menu>li {
            position:relative;
            top:2px;
            display:inline-block;
            float:none;
        }
        .isStuck .sf-menu>li>a {
            padding-top:10px !important;
            padding-bottom:10px !important;
            color:#fff;
        }
        .sf-menu > li > a:hover, .sf-menu > li.sfHover> a, .sf-menu > li.current-menu-item > a, .sf-menu > li.current_page_item > a { color:#fff !important; }
        .sf-menu > li > a:hover:before, .sf-menu > li.sfHover> a:before, .sf-menu > li.current-menu-item > a:before, .sf-menu > li.current_page_item > a:before {
            width:400px;
            height:400px;
        }
        .ie9 .sf-menu > li > a:hover, .ie9 .sf-menu > li.sfHover> a, .ie9 .sf-menu > li.current-menu-item > a, .ie9 .sf-menu > li.current_page_item > a { background-color:#242426 !important; }
        .header, .isStuck  {
            background-color: #df6018 !important;
        }

    .
    </style>


    <style>

        #back-top-wrapper #back-top a span {
            background-color:#df6018;
        }

        .parallax-box.parallax-1 .parallax-content:before {
            background-color:#df6018;
        }
        .list.custom-list ul li:before {
            background-color: #df6018;
        }
        .btn.btn-2:before, .btn-primary.btn-2:before, .btn-default.btn-2:before, .btn-normal.btn-2:before, .btn-inline.btn-2:before {
            background-color: #df6018;
        }
        a{
            color:#df6018 ;
        }
        .btn:before, .btn-primary:before, .btn-default:before, .btn-normal:before, .btn-inline:before {
            background-color: #df6018;
        }
        #paralaxSliderPagination.buttons_pagination ul li:hover, .parallax-slider #paralaxSliderPagination.buttons_pagination ul li.active {
            background: #df6018;
        }
        .parallax-box.parallax-2 {
            margin-bottom: 0px;
        }
        .parallax-box.parallax-1 {
            margin-bottom: 30px;
        }

        .content_box.box-1 {
            margin-top: 30px;
        }

        .content_box.box-2:before {
            background-color: #df6018;
        }
        .logo_h__img img{width: 390px; margin-top: 14px}
        @media (max-width: 1205px) {
            .logo_h__img img{
                width: 290px;
                margin-top: 8px;}
        }
        .parallax-1:before{
            background-color:#df6018;
        }
        .sf-menu > li > a, .slider_caption h1, .slider_caption p, h1,h2,h3,a,h4,h5,p {
            font-family:sans-serif !important;
        }
        .slider_caption h1{
            font-size: 55px;
            word-wrap: break-word;
        }
        .parallax-slider #mainCaptionHolder .container {
            top: 7%;
        }
        .parallax-slider #paralaxSliderPagination {

            bottom: 40px;
        }
        @media (min-width: 1200px)
        responsive.css:109
        [class*="span"] {
            float: left;
            min-height: 1px;
            margin-left: 0px;
        }
        .nav__primary select {
            background-color:#fff;
            height:40px;
        }

        .isStuck #small_logo {
            background: #df6018 url('/CherryFramework/images/logo.svg') no-repeat scroll left center/auto 100%;
            bottom: auto;
            color: #fff;
            display: block;
            height: calc(100% - 4px);
            left: 3vh;
            position: absolute;
            text-transform: uppercase;
            top: 3px;
            width: 380px;
        }
        .icon-odnoklassniki:before{content:"\f263"}

        @media (max-width: 767px) {
            .sf-menu { display:none; }
        }

        @media only screen and (max-width: 767px)
        main-style.css:1581
        .nav__primary {
            padding: 30px 0;
            clear: both;
        }
    .user_panel{
            background-color: #2c1812;
            cursor: pointer;
            left: inherit;
        }
        .user_panel>li>a:focus, .user_panel>li>a:hover{
            background: none;
            text-decoration: underline;
        }
        @media screen and (max-width: 767px) {
            .select-menu{
                display: block;
            }
        }
        @media only screen and (max-width: 767px){
        .nav__primary {
            padding: 30px 0;
            clear: both;
        }
        }

        @media only screen and (max-width: 767px){
        .container {
            padding-left: 30px !important;
            padding-right: 30px !important;
        }
        }
        @media only screen and (max-width: 767px){

        .header .pull-left, .header .pull-right {
            float: none !important;
        }
        }
    </style>

    <script type="text/javascript">
        // Init navigation menu
        $(function(){
            // main navigation init
            $('ul.sf-menu').superfish({
                delay: 1000, // the delay in milliseconds that the mouse can remain outside a sub-menu without it closing
                animation: {
                    opacity: "show",
                    height: "show"
                }, // used to animate the sub-menu open
                speed: "normal", // animation speed
                autoArrows: false, // generation of arrow mark-up (for submenu)
                disableHI: true // to disable hoverIntent detection
            });

            //Zoom fix
            //IPad/IPhone
            var viewportmeta = document.querySelector && document.querySelector('meta[name="viewport"]'),
                ua = navigator.userAgent,
                gestureStart = function () {
                    viewportmeta.content = "width=device-width, minimum-scale=0.25, maximum-scale=1.6, initial-scale=1.0";
                },
                scaleFix = function () {
                    if (viewportmeta && /iPhone|iPad/.test(ua) && !/Opera Mini/.test(ua)) {
                        viewportmeta.content = "width=device-width, minimum-scale=1.0, maximum-scale=1.0";
                        document.addEventListener("gesturestart", gestureStart, false);
                    }
                };
            scaleFix();
        })
    </script>
    <!-- stick up menu -->
    <script type="text/javascript">
        $(document).ready(function(){
            if(!device.mobile() && !device.tablet()){
                $('.header .nav__primary').tmStickUp({
                    correctionSelector: $('#wpadminbar')
                    ,	listenSelector: $('.listenSelector')
                    ,	active: true				,	pseudo: true				});
            }
        })
    </script>


    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('.select-menu').on('change',function(){
                window.location = $(this).find('option:selected').attr('value');
            });
            if(!device.mobile() && !device.tablet()){
                liteModeSwitcher = false;
            }else{
                liteModeSwitcher = true;
            }
            if($.browser.msie && parseInt($.browser.version) < 9){
                liteModeSwitcher = true;
            }



        });
    </script>

</head>
<body>
<header class="motopress-wrapper header">
    <div class="container">
        <div class="row">
            <div class="span12" data-motopress-wrapper-file="wrapper/wrapper-header.php" data-motopress-wrapper-type="header" data-motopress-id="590f7aa7e1f6b">
                <div class="pull-left" data-motopress-type="static" data-motopress-static-file="static/static-logo.php">
                    <!-- BEGIN LOGO -->
                    <div class="logo pull-left">
                        <a href="<?=base_url()?>" class="logo_h logo_h__img"><img src="/CherryFramework/images/logo.svg" alt="TRUCKY" title="Transportation company"></a>

                    </div>
                    <!-- END LOGO -->		<div class="clear"></div>
                </div>
                <div class="pull-right" data-motopress-type="static" data-motopress-static-file="static/static-nav.php">
                    <!-- BEGIN MAIN NAVIGATION -->
                    <nav class="nav nav__primary clearfix">
                        <div id="small_logo"><a href="https://stassociation.com/" title="Slavic Truckers Associaion"></a></div>
                        <ul id="topnav" class="sf-menu">
                            <li id="menu-item-1810" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children"><a href="#">Ассоциация</a>
                                <ul class="sub-menu">
                                    <li id="menu-item-1811" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="/st/about_us/">О нас</a></li>
                                    <li id="menu-item-1812" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="/st/faq/">FAQ</a></li>
                                    <li id="menu-item-1805" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="/st/terms_of_use/">Условия использования</a></li>
                                </ul>
                            </li>
                            <li id="menu-item-1808" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children"><a href="/st/service">Услуги</a>
                                <ul class="sub-menu">
                                    <li id="menu-item-1815" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="/logistic/">Логистика</a></li>
                                    <li id="menu-item-1814" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children"><a href="/map/"> Карта</a></li>
                                    <li id="menu-item-1813" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="/forum/">Форум</a></li>
                                    <li id="menu-item-1813" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="/forum/"> Объявления	</a></li>
                                    <li id="menu-item-1813" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="/st/radio/">Онлайн-радио</a></li>
                                    <li id="menu-item-1813" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="/st/consultation/">Консультации</a></li>
                                </ul>
                            </li>
                            <li id="menu-item-1806" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="#">Информация</a>
                                <ul class="sub-menu">
                                    <li id="menu-item-1815" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="/stanews/">Новости		</a></li>
                                    <li id="menu-item-1814" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children"><a href="/events/"> События											</a></li>
                                    <li id="menu-item-1813" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="/werecommend/"> Мы рекомендуем</a></li>

                                </ul>
                            </li>
                            <li id="menu-item-1804" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="/st/contacts/">Контакты</a></li>
                        </ul>
                        <select class="select-menu"><option value="#" selected="selected" disabled="disabled">Navigate to...</option><option value="javascript:void(0)">Ассоциация
                            </option><option value="https://stassociation.com/st/about_us/" selected="selected">–
                                О нас											</option><option value="https://stassociation.com/st/faq/">–
                                FAQ											</option><option value="https://stassociation.com/st/terms_of_use/">–
                                Условия использования											</option><option value="https://stassociation.com/st/service/">Услуги
                            </option><option value="https://stassociation.com/logistic">–
                                Логистика											</option><option value="https://stassociation.com/map/">–
                                Карта											</option><option value="https://stassociation.com/forum/">–
                                Форум											</option><option value="https://stassociation.com/forum/">–
                                Объявления											</option><option value="https://stassociation.com/st/radio/">–
                                Онлайн-радио											</option><option value="https://stassociation.com/st/consultation/">–
                                Консультации											</option><option value="javascript:void(0)">Информация
                            </option><option value="https://stassociation.com/stanews/">–
                                Новости											</option><option value="https://stassociation.com/st/about_us/#">–
                                События											</option><option value="https://stassociation.com/werecommend">–
                                Мы рекомендуем											</option><option value="https://stassociation.com/st/contacts/">Контакты
                            </option></select>
                    </nav><!-- END MAIN NAVIGATION -->	</div>
                <div class="clear"></div>
                <div class="hidden-phone" data-motopress-type="static" data-motopress-static-file="static/static-search.php">
                    <!-- BEGIN SEARCH FORM -->
                    <!-- END SEARCH FORM -->	</div>
            </div>
        </div>
    </div>
</header>
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


        <div class="col-md-2 col-sm-4 col-xs-4 radio_load"></div>
        <div class="col-md-2 col-sm-4 col-xs-7 pull-right pad0" >
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