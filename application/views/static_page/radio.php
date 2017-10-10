
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="/About us_files/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/About us_files/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="/About us_files/index.css">
    <link rel="stylesheet" type="text/css" href="/About us_files/responsive.css">
    <script type="text/javascript" src="/About us_files/jquery-2.1.4.min.js.Без названия"></script>
    <script type="text/javascript" src="/About us_files/exodus.js.Без названия"></script>
    <script type="text/javascript" src="/About us_files/bootstrap.min.js.Без названия"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("input[type=button]").attr("class", "btn btn-default btn-sm");
            $(".button_submit").attr("class", "btn btn-info btn-sm");
            $("#advanced_search input[type=\'text\'], #search_term_input input[type=\'text\']").removeAttr("size");
            $(".table_grid").addClass("table table-striped");
            $("img[alt=\'Новый\'], img.new_posts").replaceWith("<span class=\'label label-warning\'>Новый</span>");
            $("#profile_success").removeAttr("id").removeClass("windowbg").addClass("alert alert-success");
            $("#profile_error").removeAttr("id").removeClass("windowbg").addClass("alert alert-danger");
        });
    </script>
    <script type="text/javascript" src="/About us_files/script.js.Без названия"></script>
    <script type="text/javascript" src="/About us_files/theme.js.Без названия"></script>

    <meta name="viewport" content="width=device-width. initial-scale=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="FAQ" />
    <title>About us</title>
    <link rel="help" href="#" />
    <link rel="search" href="#" />
    <link rel="contents" href="//stassociation.com/" />
    <link rel="alternate" type="application/rss+xml" title="Slavic Truckers Associaion - RSS" href="#" />
    <style type="text/css">
        @media (min-width: 1200px){
            #main_content_section.forum, #main_content_section.action {width:80%;}
        }
    </style>

</head>
<body>

<header>
    <div class="container">
        <nav id="logo" class="navbar pull-left">
            <div>
                <a href="//stassociation.com/" title="Slavic Truckers Associaion">
                    <img class="img-responsive" src="/CherryFramework/images/logo.svg" alt="Logo" onerror="this.onerror=null; this.src='/CherryFramework/images/logo.svg'">
                </a>
            </div>
        </nav>
        <div class="pull-right">
            <nav class="nav nav__primary">
                <div id="small_logo"><a href="//stassociation.com/" title="Slavic Truckers Associaion"></a></div>
                <ul id="topnav" class="sf-menu">
                    <li id="menu-item-association" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children">
                        <a href="javascript:void(0)" 												<span class="last firstlevel">Ассоциация</span>
                        </a>
                        <ul class="sub-menu">
                            <li id="menu-item-about_us">
                                <a href="//stassociation.com/st/about_us/" >
                                    О нас											</a>
                            </li>
                            <li id="menu-item-faq">
                                <a href="//stassociation.com/st/faq/" >
                                    FAQ											</a>
                            </li>
                            <li id="menu-item-terms_of_use">
                                <a href="//stassociation.com/st/terms_of_use/" >
                                    Условия использования											</a>
                            </li>
                        </ul>
                    </li>
                    <li id="menu-item-service" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children">
                        <a href="//stassociation.com/st/service/" 												<span class="firstlevel">Услуги</span>
                        </a>
                        <ul class="sub-menu">
                            <li id="menu-item-logistic">
                                <a href="//stassociation.com/logistic" >
                                    Логистика											</a>
                            </li>
                            <li id="menu-item-map">
                                <a href="//stassociation.com/map/" >
                                    Карта											</a>
                            </li>
                            <li id="menu-item-forum">
                                <a href="//stassociation.com/forum/" >
                                    Форум											</a>
                            </li>
                            <li id="menu-item-classifieds">
                                <a href="//stassociation.com/forum/" >
                                    Объявления											</a>
                            </li>
                            <li id="menu-item-radio">
                                <a href="//stassociation.com/st/radio/" >
                                    Онлайн-радио											</a>
                            </li>
                            <li id="menu-item-consultation">
                                <a href="//stassociation.com/st/consultation/" >
                                    Консультации											</a>
                            </li>
                        </ul>
                    </li>
                    <li id="menu-item-news" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children">
                        <a href="javascript:void(0)" 												<span class="firstlevel">Информация</span>
                        </a>
                        <ul class="sub-menu">
                            <li id="menu-item-info">
                                <a href="//stassociation.com/stanews/" >
                                    Новости											</a>
                            </li>
                            <li id="menu-item-events">
                                <a href="#" >
                                    События											</a>
                            </li>
                            <li id="menu-item-recommend">
                                <a href="//stassociation.com/werecommend/" >
                                    Мы рекомендуем											</a>
                            </li>
                        </ul>
                    </li>
                    <li id="menu-item-contacts" class="menu-item menu-item-type-post_type menu-item-object-page ">
                        <a href="//stassociation.com/st/contacts/" 												<span class="last firstlevel">Контакты</span>
                        </a>
                    </li>
                </ul>

        </div>
        </nav>
        <div id="search_form" class="modal fade" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <span>Поиск</span>
                    </div>
                    <div class="modal-body">
                        <form class="form-inline" action="#" method="post" accept-charset="UTF-8">
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control input-lg" name="search" id="search" placeholder="Введите поисковую фразу......">
                                <input type="hidden" name="advanced" value="1" />
                            </div>
                            <input class="search-btn pull-right" type="submit" value="Найти">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="login_modal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <!--<div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title text-center">Welcome</h4>
							</div>
							<div class="modal-body">
								<form role="form" id="guest_form" action="http://sta.seogreen.net/login2/" method="post" accept-charset="UTF-8"  onsubmit="hashLoginPassword(this, '02e7efde3b1bddfac22a87c52b65f118');">
									<div class="form-group">
										<input type="text" name="user" size="5" class="form-control" placeholder="Пользователь" />
									</div>
									<div class="form-group">
										<input type="password" name="passwrd" size="5" class="form-control" placeholder="Пароль" />
									</div>
									<div class="form-group text-center">
										<input type="submit" value="Sign-in" class="btn btn-success"/>
										<input type="hidden" name="hash_passwrd" value="" />
										<input type="hidden" name="modal_login" value="1" />
									</div>
								</form>
								<p class="register">
									<a href="/auth/registration">Register</a>
								</p>
								<p class="reminder">
									<a href="/login">Forgot password ?</a>
								</p>
							</div>-->
            </div>
        </div>
    </div>

</header>
<?=$statmenu?>
<script>
    $(function(){

        $.each($('.radio-item-holder a'),function(){
            var radio_url = $(this).attr('href');
            $(this).attr('href','javascript:void()');
            $(this).attr('rel',radio_url);
        });
        $('.radio-item-holder a').on('click',function(){
            localStorage.setItem("chanel", $(this).attr('rel'));
            $('#radio_player').attr('src',$(this).attr('rel'));
            localStorage.setItem("play", 1);
            document.getElementById('radio_player').play();
            $('.radio_play_btn').find('i').addClass('fa-pause');


        });

    });
</script>
<div class="container">
    <div id="content_section">
        <div id="main_content_section" class="action radio">


            <p></p>
            <div class="cat_bar">
                <h3 class="catbg">Онлайн-радио</h3>
            </div>
            <section class="radio">
                <ul class="list-inline">
                    <li class="radio-item col-xs-12 col-sm-6 col-md-4">
                        <div class="radio-item-holder clearfix text-center">
                            <figure class="thumbnail">
                                <a href="http://tvvl.nstelcom.com:29482/ra_radio_drive.mp3" title="Радио дальнобойщиков">
                                    <img class="img-responsive" src="http://sta.seogreen.net/images/radio/track.jpg" alt="Радио дальнобойщиков">
                                    <span class="zoom-icon"></span>
                                </a>
                            </figure>
                            <div class="radio-caption text-left">
                                <h4><a href="http://tvvl.nstelcom.com:29482/ra_radio_drive.mp3">Радио дальнобойщиков</a></h4>
                                <p class="radio-description" style="height: 408px;">Радиостанция “о” и “для” дальнобойщиков. В эфире 24 часа в сутки/ 7 дней в неделю. Студия радиостанции находится в городе Сакраменто, США, где проживает большой процент водителей-тракистов.
                                    <br><br>
                                    Помимо песенного репертуара, подобранного специально для прослушивания в пути, радиоведущие регулярно выходят в эфир для обсуждения насущных тем для дальнобойщиков.
                                    <br><br>
                                    В рамках эфира можно поздравить и передать привет тому, кто сейчас в пути и далеко от дома. <br><br>Телефон  прямого эфира 916.482.4012</p>
                                <p class="radio-links">
                                    <a href="http://tvvl.nstelcom.com:29482/ra_radio_drive.mp3" class="btn slide_right" title="Слушать" data-hover="Слушать">Слушать<span></span></a>
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="radio-item col-xs-12 col-sm-6 col-md-4">
                        <div class="radio-item-holder clearfix text-center">
                            <figure class="thumbnail">
                                <a href="http://cast.avtoradio.ua/avtoradio" title="Авторадио">
                                    <img class="img-responsive" src="http://sta.seogreen.net/images/radio/autoradio.jpg" alt="Авторадио">
                                    <span class="zoom-icon"></span>
                                </a>
                            </figure>
                            <div class="radio-caption text-left">
                                <h4><a href="http://cast.avtoradio.ua/avtoradio">Авторадио</a></h4>
                                <p class="radio-description" style="height: 408px;">Киевская сетевая музыкальная радиостанция.<br>
                                    Покрытие сети: 28 городов вещания.<br>
                                    В 2004 году это радио пришло в Украину и очень быстро завоевало популярность.<br><br>
                                    Музыкальный формат радиостанции — популярная музыка, диско, поп, рок разных лет,
                                    с преобладанием композиций 80-90-х  годов, а также современные хиты отечественных и зарубежных исполнителей.<br><br>
                                    Авторадио — это самые лучшие хиты и самая свежая информация для тех, кто за рулем!</p>
                                <p class="radio-links">
                                    <a href="http://cast.avtoradio.ua/avtoradio" class="btn slide_right" title="Слушать" data-hover="Слушать">Слушать<span></span></a>
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="radio-item col-xs-12 col-sm-6 col-md-4">
                        <div class="radio-item-holder clearfix text-center">
                            <figure class="thumbnail">
                                <a href="http://cast.radiogroup.com.ua:8000/retro" title="Retro FM">
                                    <img class="img-responsive" src="http://sta.seogreen.net/images/radio/retro_fm.jpg" alt="Retro FM">
                                    <span class="zoom-icon"></span>
                                </a>
                            </figure>
                            <div class="radio-caption text-left">
                                <h4><a href="http://cast.radiogroup.com.ua:8000/retro">Retro FM</a></h4>
                                <p class="radio-description" style="height: 408px;">Ретро FM – самая крупная радиосеть в Украине.<br>
                                    Только любимые песни, золотые хиты 70х-80х-90х. <br><br>
                                    «Ретро FM» – это радиостанция, которая дает возможность своему слушателю почувствовать себя молодым.
                                    Ведь так хочется вернуться к бесшабашной юности в пестрые 80-е или культовые 90е.<br><br>
                                    «Ретро FM» – это не ностальгия, не тоска по прошлому, а любимая музыка, которая вызывает яркие эмоции!</p>
                                <p class="radio-links">
                                    <a href="http://cast.radiogroup.com.ua:8000/retro" class="btn slide_right" title="Слушать" data-hover="Слушать">Слушать<span></span></a>
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="radio-item col-xs-12 col-sm-6 col-md-4">
                        <div class="radio-item-holder clearfix text-center">
                            <figure class="thumbnail">
                                <a href="http://cast.nrj.in.ua/nrj" title="Europa Plus">
                                    <img class="img-responsive" src="http://sta.seogreen.net/images/radio/europaplus.jpg" alt="Europa Plus">
                                    <span class="zoom-icon"></span>
                                </a>
                            </figure>
                            <div class="radio-caption text-left">
                                <h4><a href="http://cast.nrj.in.ua/nrj">Europa Plus</a></h4>
                                <p class="radio-description" style="height: 408px;">Киевская сетевая музыкальная радиостанция.
                                    Музыкальный формат радиостанции — хиты мировой поп и рок-музыки разных лет, и современные композиции. Соотношение зарубежной и отечественной музыки — 3:1. Также в эфире — новости, погода, программы «Европейское утро», «Гороскоп», «Пробки», «PlayBox», «Афиша», «Show-biz».
                                    <br></br>
                                    Радио работает в музыкальном формате – современное хитовое радио, то есть основу музыкального наполнения эфира составляют наиболее популярные текущие хиты, определяющиеся с помощью хит-парадов.</p>
                                <p class="radio-links">
                                    <a href="http://cast.nrj.in.ua/nrj" class="btn slide_right" title="Слушать" data-hover="Слушать">Слушать<span></span></a>
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="radio-item col-xs-12 col-sm-6 col-md-4">
                        <div class="radio-item-holder clearfix text-center">
                            <figure class="thumbnail">
                                <a href="http://online.svitle.org:6728/sre" title="Светлое радио">
                                    <img class="img-responsive" src="http://sta.seogreen.net/images/radio/svitle.jpg" alt="Светлое радио">
                                    <span class="zoom-icon"></span>
                                </a>
                            </figure>
                            <div class="radio-caption text-left">
                                <h4><a href="http://online.svitle.org:6728/sre">Светлое радио</a></h4>
                                <p class="radio-description" style="height: 408px;">Радио «Еммануил»(Светлое радио) cоздана для того, чтобы нести людям через музыку, искусство, поэзию, литературу, историю и другие сферы нашей жизни веками созданные ценности общечеловеческой культуры, основанные на принципах христианской морали.<br></br>

                                    Для объективного освещения благой вести в эфире звучат проповеди признанных священнослужителей всех христианских конфессий. В эфире звучит современная духовная, хоровая и классическая музыка. </p>
                                <p class="radio-links">
                                    <a href="http://online.svitle.org:6728/sre" class="btn slide_right" title="Слушать" data-hover="Слушать">Слушать<span></span></a>
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="radio-item col-xs-12 col-sm-6 col-md-4">
                        <div class="radio-item-holder clearfix text-center">
                            <figure class="thumbnail">
                                <a href="http://198.178.123.14:7320/stream/1/" title="Proactive FM">
                                    <img class="img-responsive" src="http://sta.seogreen.net/images/radio/proactive_fm.jpg" alt="Proactive FM">
                                    <span class="zoom-icon"></span>
                                </a>
                            </figure>
                            <div class="radio-caption text-left">
                                <h4><a href="http://198.178.123.14:7320/stream/1/">Proactive FM</a></h4>
                                <p class="radio-description" style="height: 408px;">Proactive.fm это христианское межконфессиальное динамичное современное радио, для любого поколения. <br></br>На  волне проакив вы можете слышать современную христианскую музыку, вдохновляющее слово, а главное самому стать участником шоу.</p>
                                <p class="radio-links">
                                    <a href="http://198.178.123.14:7320/stream/1/" class="btn slide_right" title="Слушать" data-hover="Слушать">Слушать<span></span></a>
                                </p>
                            </div>
                        </div>
                    </li>
                </ul>
            </section>
            <section class="radio">
                <ul class="list-inline">
                    <li class="radio-item col-xs-12 col-sm-6 col-md-4">
                        <div class="radio-item-holder clearfix text-center">
                            <figure class="thumbnail">
                                <a href="http://tvvl.nstelcom.com:29482/ra_radio_drive.mp3" title="Хит FM">
                                    <img class="img-responsive" src="http://sta.seogreen.net/images/radio/hitfm.png" alt="ХИТ FM">
                                    <span class="zoom-icon"></span>
                                </a>
                            </figure>
                            <div class="radio-caption text-left">
                                <h4><a href="http://tvvl.nstelcom.com:29482/ra_radio_drive.mp3">ХИТ FM</a></h4>
                                <p class="radio-description" style="height: 408px;">Киевская сетевая музыкальная радиостанция.
                                    Покрытие сети: 51 город вещания, около 90% территории страны.<br></br>

                                    Музыкальный формат Хит FM — поп-музыка 90-х годов и начала тысячелетия. Звучат и современные хиты, в несколько меньшем количестве. 70% — композиции западных исполнителей.

                                    <br></br>

                                    Хит FM — это Ваши самые любимые, раскрученные и узнаваемые песни!</p>
                                <p class="radio-links">
                                    <a href="http://tvvl.nstelcom.com:29482/ra_radio_drive.mp3" class="btn slide_right" title="Слушать" data-hover="Слушать">Слушать<span></span></a>
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="radio-item col-xs-12 col-sm-6 col-md-4">
                        <div class="radio-item-holder clearfix text-center">
                            <figure class="thumbnail">
                                <a href="http://cast.avtoradio.ua/avtoradio" title="Русское радио">
                                    <img class="img-responsive" src="http://stassociation.com/images/radio/russkoeradio.png" alt="Русское радио">
                                    <span class="zoom-icon"></span>
                                </a>
                            </figure>
                            <div class="radio-caption text-left">
                                <h4><a href="http://cast.avtoradio.ua/avtoradio">Русское радио</a></h4>
                                <p class="radio-description" style="height: 408px;">Каждый час прослушивания Русского радио преподносит новый заряд бодрости и энергии. Только лучшие отечественные композиции, только самые последние новости, только рейтинговые программы и только на русском языке. <br/><br/>На этой волне проходит музыкальная жизнь страны, т. к. каждую неделю составляется хит-парад лучших песен. Крупнейшая радиосеть в мире, насчитывающая многомиллионную аудиторию – все это Русское радио. </p>
                                <p class="radio-links">
                                    <a href="http://cast.avtoradio.ua/avtoradio" class="btn slide_right" title="Слушать" data-hover="Слушать">Слушать<span></span></a>
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="radio-item col-xs-12 col-sm-6 col-md-4">
                        <div class="radio-item-holder clearfix text-center">
                            <figure class="thumbnail">
                                <a href="http://cast.radiogroup.com.ua:8000/retro" title="Бизнес радио">
                                    <img class="img-responsive" src="http://sta.seogreen.net/images/radio/businessradio.jpg" alt="Бизнес радио">
                                    <span class="zoom-icon"></span>
                                </a>
                            </figure>
                            <div class="radio-caption text-left">
                                <h4><a href="http://cast.radiogroup.com.ua:8000/retro">Бизнес радио</a></h4>
                                <p class="radio-description" style="height: 408px;">Киевская музыкально-информационная радиостанция.
                                    Покрытие сети: Киев и Харьков.<br></br>

                                    Музыкальный формат радиостанции — поп и рок-музыка, исключительно западные исполнители.<br></br>

                                    Информационные программы — выпуски новостей, интервью с представителями бизнес-элиты и известными политиками, авторские проекты.</p>
                                <p class="radio-links">
                                    <a href="http://cast.radiogroup.com.ua:8000/retro" class="btn slide_right" title="Слушать" data-hover="Слушать">Слушать<span></span></a>
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="radio-item col-xs-12 col-sm-6 col-md-4">
                        <div class="radio-item-holder clearfix text-center">
                            <figure class="thumbnail">
                                <a href="http://cast.nrj.in.ua/nrj" title="Радио Вести">
                                    <img class="img-responsive" src="http://sta.seogreen.net/images/radio/radiovesti.jpg" alt="Радио Вести">
                                    <span class="zoom-icon"></span>
                                </a>
                            </figure>
                            <div class="radio-caption text-left">
                                <h4><a href="http://cast.nrj.in.ua/nrj">Радио Вести</a></h4>
                                <p class="radio-description" style="height: 408px;">Информационно-разговорное радио.
                                    Главные новости, максимум мнений.<br></br>

                                    Круглосуточно – выпуски новостей, интервью, аналитические программы, известные и популярные ведущие, авторские проекты: "Утро с Матвеем Ганапольским", "Едоки"(ведущий Матвей Ганапольский), "Максимум мнений" (Сакен Аймурзаев), "Герой дня" и "Точка зрения" (Юлия Литвиненко)...</p>
                                <p class="radio-links">
                                    <a href="http://cast.nrj.in.ua/nrj" class="btn slide_right" title="Слушать" data-hover="Слушать">Слушать<span></span></a>
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="radio-item col-xs-12 col-sm-6 col-md-4">
                        <div class="radio-item-holder clearfix text-center">
                            <figure class="thumbnail">
                                <a href="http://online.svitle.org:6728/sre" title="Радио Мелодия">
                                    <img class="img-responsive" src="http://sta.seogreen.net/images/radio/radiomelodia.png" alt="Радио Мелодия">
                                    <span class="zoom-icon"></span>
                                </a>
                            </figure>
                            <div class="radio-caption text-left">
                                <h4><a href="http://online.svitle.org:6728/sre">Радио Мелодия</a></h4>
                                <p class="radio-description" style="height: 408px;">Радио Мелодия начала свое вещание в Харькове в 2000 году в формате «ретро», а уже с января 2002 года стала транслировать свои передачи из Киева на все регионы страны.<br></br>
                                    Особенный музыкальный формат сразу же выделил новую радиостанцию из числа прочих похожих между собой, как близнецы, радиостанций.

                                    Также в эфире — программы «Сегодня тому назад», «20 Век», «Смехопанорама», «Вокруг света», «Вкуснотища», «Бесконечные истории о вечной любви» и прогноз погоды.<br></br>

                                    Радио «Мелодия» - это песни, которые все знают, любят и с удовольствием напевают. </p>
                                <p class="radio-links">
                                    <a href="http://online.svitle.org:6728/sre" class="btn slide_right" title="Слушать" data-hover="Слушать">Слушать<span></span></a>
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="radio-item col-xs-12 col-sm-6 col-md-4">
                        <div class="radio-item-holder clearfix text-center">
                            <figure class="thumbnail">
                                <a href="http://198.178.123.14:7320/stream/1/" title="Гала радио">
                                    <img class="img-responsive" src="http://sta.seogreen.net/images/radio/gala_radio_big.jpg" alt="Гала радио">
                                    <span class="zoom-icon"></span>
                                </a>
                            </figure>
                            <div class="radio-caption text-left">
                                <h4><a href="http://198.178.123.14:7320/stream/1/">Гала радио</a></h4>
                                <p class="radio-description" style="height: 408px;">Киевская сетевая музыкально-развлекательная радиостанция.
                                    Покрытие сети: 12 городов вещания.<br></br>

                                    Музыкальный формат радиостанции — современная музыка направлений Pop, R&B, Pop-Rock. В плейлисте преобладает музыка западных и украинских исполнителей.<br></br>

                                    Также в эфире — программы Gala Radio: хит-парады «Пашина Двадцатка» и «Шереметьево — Борисполь», утреннее шоу «Маша и Паша», вечернее шоу «Драйв-Тайм», информационные рубрики, интерактивные игры</p>
                                <p class="radio-links">
                                    <a href="http://198.178.123.14:7320/stream/1/" class="btn slide_right" title="Слушать" data-hover="Слушать">Слушать<span></span></a>
                                </p>
                            </div>
                        </div>
                    </li>
                </ul>
            </section>
            <section class="radio">
                <ul class="list-inline">
                    <li class="radio-item col-xs-12 col-sm-6 col-md-4">
                        <div class="radio-item-holder clearfix text-center">
                            <figure class="thumbnail">
                                <a href="http://tvvl.nstelcom.com:29482/ra_radio_drive.mp3" title="Радио Ностальжи">
                                    <img class="img-responsive" src="http://sta.seogreen.net/images/radio/nostalgie.png" alt="Радио Ностальжи">
                                    <span class="zoom-icon"></span>
                                </a>
                            </figure>
                            <div class="radio-caption text-left">
                                <h4><a href="http://tvvl.nstelcom.com:29482/ra_radio_drive.mp3">Радио Ностальжи</a></h4>
                                <p class="radio-description" style="height: 408px;">Киевская местная музыкальная радиостанция.<br><br>

                                    Музыкальный формат радиостанции — Oldies/Gold Music, композиции зарубежных и отечественных исполнителей 80-90-х годов (традиционная поп-музыка, диско, поп-рок).

                                    Также в эфире — короткие блоки новостей, развлекательные программы, программа по заявкам, авторские проекты.<br><br>

                                    В каком бы Вы ни были настроении, включив Nostalgie, Вы услышите то, что хочет слышать Ваша душа. Nostalgie - радио хорошего вкуса и приятных воспоминаний.</p>
                                <p class="radio-links">
                                    <a href="http://tvvl.nstelcom.com:29482/ra_radio_drive.mp3" class="btn slide_right" title="Слушать" data-hover="Слушать">Слушать<span></span></a>
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="radio-item col-xs-12 col-sm-6 col-md-4">
                        <div class="radio-item-holder clearfix text-center">
                            <figure class="thumbnail">
                                <a href="http://cast.avtoradio.ua/avtoradio" title="Радио Юмор">
                                    <img class="img-responsive" src="http://sta.seogreen.net/images/radio/humorfm.jpg" alt="Радио Юмор">
                                    <span class="zoom-icon"></span>
                                </a>
                            </figure>
                            <div class="radio-caption text-left">
                                <h4><a href="http://cast.avtoradio.ua/avtoradio">Радио Юмор</a></h4>
                                <p class="radio-description" style="height: 408px;">Юмористическая сетевая музыкальная радиостанция.<br><br>

                                    Формат радиостанции — игры, викторины, ток-шоу, юмористические и сатирические передачи. Отечественная и зарубежная музыка всех жанров и направлений. Концерты (в том числе по заявкам радиослушателей).<br><br>

                                    Радио «Юмор FM» - пока первая и единственная радиостанция, основу формата которой составляет качественный юмор.</p>
                                <p class="radio-links">
                                    <a href="http://cast.avtoradio.ua/avtoradio" class="btn slide_right" title="Слушать" data-hover="Слушать">Слушать<span></span></a>
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="radio-item col-xs-12 col-sm-6 col-md-4">
                        <div class="radio-item-holder clearfix text-center">
                            <figure class="thumbnail">
                                <a href="http://cast.radiogroup.com.ua:8000/retro" title="Волна Счастья">
                                    <img class="img-responsive" src="http://sta.seogreen.net/images/radio/volnahappy.png" alt="Волна Счастья">
                                    <span class="zoom-icon"></span>
                                </a>
                            </figure>
                            <div class="radio-caption text-left">
                                <h4><a href="http://cast.radiogroup.com.ua:8000/retro">Волна Счастья</a></h4>
                                <p class="radio-description" style="height: 408px;">Радиостанция «Волна Счастья» была основана 22 января 2010 года. Радио является одним из проектов некоммерческой организации «Portland Russian Media Center». Студия находится в городе Портленд, штат Орегон, США. <br><br>
                                    Все мы – участники и сотрудники радио являемся неравнодушными к медиа волонтерами с профильным образованием.
                                </p>
                                <p class="radio-links">
                                    <a href="http://cast.radiogroup.com.ua:8000/retro" class="btn slide_right" title="Слушать" data-hover="Слушать">Слушать<span></span></a>
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="radio-item col-xs-12 col-sm-6 col-md-4">
                        <div class="radio-item-holder clearfix text-center">
                            <figure class="thumbnail">
                                <a href="http://cast.nrj.in.ua/nrj" title="Радио Ангел">
                                    <img class="img-responsive" src="http://sta.seogreen.net/images/radio/radioangel.png" alt="Радио Ангел">
                                    <span class="zoom-icon"></span>
                                </a>
                            </figure>
                            <div class="radio-caption text-left">
                                <h4><a href="http://cast.nrj.in.ua/nrj">Радио Ангел</a></h4>
                                <p class="radio-description" style="height: 408px;">Радио Ангел - христианское интернет радио, которое не только вещает христианские песни и музыку, но и интересные передачи. На "Радио Ангел" Вы найдете записи передач с музыкантами, христианские новости, хорошую христианскую музыку, прямые эфиры из студии и общение в чате.ет в музыкальном формате – современное хитовое радио, то есть основу музыкального наполнения эфира составляют наиболее популярные текущие хиты, определяющиеся с помощью хит-парадов.</p>
                                <p class="radio-links">
                                    <a href="http://cast.nrj.in.ua/nrj" class="btn slide_right" title="Слушать" data-hover="Слушать">Слушать<span></span></a>
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="radio-item col-xs-12 col-sm-6 col-md-4">
                        <div class="radio-item-holder clearfix text-center">
                            <figure class="thumbnail">
                                <a href="http://online.svitle.org:6728/sre" title="Радио Романтика">
                                    <img class="img-responsive" src="http://sta.seogreen.net/images/radio/romantikaradio.png" alt="Радио Романтика">
                                    <span class="zoom-icon"></span>
                                </a>
                            </figure>
                            <div class="radio-caption text-left">
                                <h4><a href="http://online.svitle.org:6728/sre">Радио Романтика</a></h4>
                                <p class="radio-description" style="height: 408px;">Московская музыкальная радиостанция. <br></br>

                                    Радио Romantika – это лучшие лирические баллады и романтические хиты российских и зарубежных исполнителей. Проникновенные трогательные мелодии всех времён. Радио для современных романтиков.<br></br>

                                    "СЛУШАЙ. ЧУВСТВУЙ. МЕЧТАЙ." – этот призыв является слоганом радиостанции, отражающим то особое настроение, которое создает эфир Радио Romantika. Тщательно подобранные музыкальные произведения создают у слушателя позитивный, возвышенный настрой.
                                </p>
                                <p class="radio-links">
                                    <a href="http://online.svitle.org:6728/sre" class="btn slide_right" title="Слушать" data-hover="Слушать">Слушать<span></span></a>
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="radio-item col-xs-12 col-sm-6 col-md-4">
                        <div class="radio-item-holder clearfix text-center">
                            <figure class="thumbnail">
                                <a href="http://198.178.123.14:7320/stream/1/" title="Радио Юность">
                                    <img class="img-responsive" src="http://sta.seogreen.net/images/radio/radiou.png" alt="Радио Юность ">
                                    <span class="zoom-icon"></span>
                                </a>
                            </figure>
                            <div class="radio-caption text-left">
                                <h4><a href="http://198.178.123.14:7320/stream/1/">Радио Юность </a></h4>
                                <p class="radio-description" style="height: 408px;">Московская сетевая музыкальная радиостанция.

                                    Музыкальный формат радиостанции — DANCE — самые актуальные новинки мировой музыки, хиты западных звёзд клубной сцены, джинглы танцевального характера.

                                    Также в эфире — программы «Classic Sound»(современные ремиксы и кавер-версии на музыкальные композиции давно ушедших дней), «Made In Russia»(представлены русские треки), «3-ка лучших из Юни-Хита».</p>
                                <p class="radio-links">
                                    <a href="http://198.178.123.14:7320/stream/1/" class="btn slide_right" title="Слушать" data-hover="Слушать">Слушать<span></span></a>
                                </p>
                            </div>
                        </div>
                    </li>
                </ul>
            </section>
            <section class="radio">
                <ul class="list-inline">
                    <li class="radio-item col-xs-12 col-sm-6 col-md-4">
                        <div class="radio-item-holder clearfix text-center">
                            <figure class="thumbnail">
                                <a href="http://tvvl.nstelcom.com:29482/ra_radio_drive.mp3" title="Радио Classic">
                                    <img class="img-responsive" src="http://sta.seogreen.net/images/radio/radiogold.jpg" alt="Радио Classic">
                                    <span class="zoom-icon"></span>
                                </a>
                            </figure>
                            <div class="radio-caption text-left">
                                <h4><a href="http://tvvl.nstelcom.com:29482/ra_radio_drive.mp3">Радио Classic</a></h4>
                                <p class="radio-description" style="height: 408px;">Радио Classic — московский филиал международной музыкальной радиостанции.

                                    Музыкальный формат радиостанции — Классические музыкальные произведения в современном исполнении, инструментальная и электронная музыка, сходная по звучанию с классикой — «новая классика» иными словами, ну и конечно же «старая классика» включая оперу, а также мюзиклы и этнические шедевры.</p>
                                <p class="radio-links">
                                    <a href="http://tvvl.nstelcom.com:29482/ra_radio_drive.mp3" class="btn slide_right" title="Слушать" data-hover="Слушать">Слушать<span></span></a>
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="radio-item col-xs-12 col-sm-6 col-md-4">
                        <div class="radio-item-holder clearfix text-center">
                            <figure class="thumbnail">
                                <a href="http://cast.avtoradio.ua/avtoradio" title="Радио Jazz">
                                    <img class="img-responsive" src="http://sta.seogreen.net/images/radio/radiojazz.png" alt="Радио Jazz">
                                    <span class="zoom-icon"></span>
                                </a>
                            </figure>
                            <div class="radio-caption text-left">
                                <h4><a href="http://cast.avtoradio.ua/avtoradio">Радио Jazz</a></h4>
                                <p class="radio-description" style="height: 408px;">Музыкальный формат радиостанции — Jazz, Блюз, современный джаз, Рок-музыка.<br></br>

                                    Радио Jazz — это музыка для людей, которые не любят рэп или современную поп-музыку, это музыка солидных горожан, преимущественно в возрасте от 30 до 50 лет, людей с определённым доходом, которые устали слушать ретро . . .  её не признаёт музыкальная критика, называя её "лёгкой музыкой" или "лёгким джазом”, музыкой для людей, которым нравится джаз как идея, но собственно джаз на самом деле не нравится. </p>
                                <p class="radio-links">
                                    <a href="http://cast.avtoradio.ua/avtoradio" class="btn slide_right" title="Слушать" data-hover="Слушать">Слушать<span></span></a>
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="radio-item col-xs-12 col-sm-6 col-md-4">
                        <div class="radio-item-holder clearfix text-center">
                            <figure class="thumbnail">
                                <a href="http://cast.radiogroup.com.ua:8000/retro" title="Эхо Москвы">
                                    <img class="img-responsive" src="http://sta.seogreen.net/images/radio/ehoradio.png" alt="Эхо Москвы">
                                    <span class="zoom-icon"></span>
                                </a>
                            </figure>
                            <div class="radio-caption text-left">
                                <h4><a href="http://cast.radiogroup.com.ua:8000/retro">Эхо Москвы</a></h4>
                                <p class="radio-description" style="height: 408px;">Радио Эхо Москвы — радиостанция работающая в формате News/Talk.
                                    Социологические исследования показывают, что "Эхо Москвы" занимает стабильно высокие позиции в рейтингах радиостанций по объему аудитории, являясь, фактически, единственным информационным коммерческим радио.
                                    Эхо Москвы занимает первое место в FM-диапазоне по продолжительности слушания (больше, чем 200 минут в день) и по лояльности аудитории — около 40 % её слушателей называют «Эхо Москвы» любимой радиостанцией.</p>
                                <p class="radio-links">
                                    <a href="http://cast.radiogroup.com.ua:8000/retro" class="btn slide_right" title="Слушать" data-hover="Слушать">Слушать<span></span></a>
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="radio-item col-xs-12 col-sm-6 col-md-4">
                        <div class="radio-item-holder clearfix text-center">
                            <figure class="thumbnail">
                                <a href="http://cast.nrj.in.ua/nrj" title="Доброе радио – Маяк">
                                    <img class="img-responsive" src="http://sta.seogreen.net/images/radio/dobroeradiomajak.jpg" alt="Доброе радио – Маяк">
                                    <span class="zoom-icon"></span>
                                </a>
                            </figure>
                            <div class="radio-caption text-left">
                                <h4><a href="http://cast.nrj.in.ua/nrj">Доброе радио – Маяк</a></h4>
                                <p class="radio-description" style="height: 408px;">Нести в мир христианские ценности: ценности веры, надежды и любви, - приносить ободрение тем, кто в узах отчаяния, вдохновлять и утешать - это то, для чего было создано «Доброе радио – Маяк».<br></br>

                                    Слово Божие, которое Вы услышите здесь, эта та Истина, что так долго Вы искали. Она может дать Вам настоящую свободу и неподдельное счастье. Мы надеемся стать для Вас хорошим другом и интересным собеседником.</p>
                                <p class="radio-links">
                                    <a href="http://cast.nrj.in.ua/nrj" class="btn slide_right" title="Слушать" data-hover="Слушать">Слушать<span></span></a>
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="radio-item col-xs-12 col-sm-6 col-md-4">
                        <div class="radio-item-holder clearfix text-center">
                            <figure class="thumbnail">
                                <a href="http://online.svitle.org:6728/sre" title="Relax FM">
                                    <img class="img-responsive" src="http://sta.seogreen.net/images/radio/relax-fm.png" alt="Relax FM">
                                    <span class="zoom-icon"></span>
                                </a>
                            </figure>
                            <div class="radio-caption text-left">
                                <h4><a href="http://online.svitle.org:6728/sre">Relax FM</a></h4>
                                <p class="radio-description" style="height: 408px;">Музыкальный формат радиостанции - это изысканное и гармоничное сочетание стилей New Age, Soft Pop, Ambient, Smooth Jazz, Lounge и Contemporary Easy Listening. Эфир Relax FM не похож ни на одну из существующих радиостанций, он отражает реальные ожидания московской аудитории.<br></br>

                                    Нужно всего лишь настроиться на частоту 90.8 FM! Музыкальная радиостанция Relax FM - это проект в уникальном для российского радио формате, основные характеристики которого лежат не в музыкальной, но в эмоциональной плоскости. </p>
                                <p class="radio-links">
                                    <a href="http://online.svitle.org:6728/sre" class="btn slide_right" title="Слушать" data-hover="Слушать">Слушать<span></span></a>
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="radio-item col-xs-12 col-sm-6 col-md-4">
                        <div class="radio-item-holder clearfix text-center">
                            <figure class="thumbnail">
                                <a href="http://198.178.123.14:7320/stream/1/" title="JT радио">
                                    <img class="img-responsive" src="http://sta.seogreen.net/images/radio/jtradio.png" alt="JT радио">
                                    <span class="zoom-icon"></span>
                                </a>
                            </figure>
                            <div class="radio-caption text-left">
                                <h4><a href="http://198.178.123.14:7320/stream/1/">JT радио</a></h4>
                                <p class="radio-description" style="height: 408px;">Киевская сетевая музыкально-развлекательная радиостанция.
                                    Покрытие сети: 12 городов вещания.<br></br>

                                    Музыкальный формат радиостанции — современная музыка направлений Pop, R&B, Pop-Rock. В плейлисте преобладает музыка западных и украинских исполнителей.<br></br>

                                    Также в эфире — программы Gala Radio: хит-парады «Пашина Двадцатка» и «Шереметьево — Борисполь», утреннее шоу «Маша и Паша», вечернее шоу «Драйв-Тайм», информационные рубрики, интерактивные игры</p>
                                <p class="radio-links">
                                    <a href="http://198.178.123.14:7320/stream/1/" class="btn slide_right" title="Слушать" data-hover="Слушать">Слушать<span></span></a>
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="radio-item col-xs-12 col-sm-6 col-md-4">
                        <div class="radio-item-holder clearfix text-center">
                            <figure class="thumbnail">
                                <a href="http://www.radiodacha.ru/player.htm" title="Радио Дача">
                                    <img class="img-responsive" src="http://stassociation.com/images/radio/dacha-radio.png" alt="Радио Дача">
                                    <span class="zoom-icon"></span>
                                </a>
                            </figure>
                            <div class="radio-caption text-left">
                                <h4><a href="http://www.radiodacha.ru/player.htm">Радио Дача</a></h4>
                                <p class="radio-description" style="height: 408px;">На волнах Радио Дача можно услышать как популярные песни советских времен, так и современных исполнителей.  Музыкальное наполнение эфира — популярная музыка. <br/><br/>Кроме музыки, в эфир «Радио Дача» выходят различные специальные программы оригинального формата — информационные, развлекательные, музыкальные, интерактивные.</p>
                                <p class="radio-links">
                                    <a href="http://www.radiodacha.ru/player.htm" class="btn slide_right" title="Слушать" data-hover="Слушать">Слушать<span></span></a>
                                </p>
                            </div>
                        </div>
                    </li>
                                    </ul>
            </section>
            <script>
                (function($){
                    var radio = {
                        option: {
                            si: '.radio-item',
                            sd: '.radio-description'
                        },
                        init: function(){
                            var _this=this;
                            _this.eq_height();
                        },
                        eq_height: function(){
                            var _this=this,o=_this.option;
                            $(o.si).find(o.sd).equalizeHeights();
                        }
                    };
                    $(document).ready(function(){
                        radio.init();
                    });
                    $(window).on('resize',function(){
                        radio.eq_height();
                    });
                })(jQuery);
            </script>
        </div>
    </div>
</div>
<footer>
    <ul class="social pull-right">
    </ul>
    <ul class="reset pull-left">
        <li class="copyright">
			<span class="hidden-xs">
				Slavic Truckers Associaion			</span>
            &copy;
            2016	    </li>
    </ul>
</footer>

<a href="javascript:void(0)" id="scroll_top" title="Scroll to top"></a>
<script src="/About us_files/modernizr.js"></script>
<script src="/About us_files/device.min.js"></script>
<script src="/About us_files/themeScripts.js"></script>
<script src="/About us_files/jquery.easing.min.js"></script>
<script src="/About us_files/superfish.js" type="text/javascript"></script>
<script src="/About us_files/jquery.mobilemenu.js" type="text/javascript"></script>
<script src="/About us_files/tmstickup.js" type="text/javascript"></script>
<script src="/About us_files/jquery.total-storage.min.js" type="text/javascript"></script>
<script type="text/javascript">
    (function($){
        $(document).ready(function(){
            $('.sf-menu').mobileMenu({defaultText: "Navigate to..."});
        });
    })(jQuery);
</script>
<!--<![endif]-->
<script type="text/javascript">
    // Init navigation menu
    (function($){
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
    })(jQuery);
</script>
<script type="text/javascript">
    (function($){
        $(document).ready(function(){
            if(!device.mobile() && !device.tablet()){
                $('header .nav__primary').tmStickUp({
                    correctionSelector: $('#wpadminbar'),
                    listenSelector: $('.listenSelector'),
                    active: true,
                    pseudo: true,
                    addition: $('nav#logo'),
                    offset: 40
                });
            }
        });
    })(jQuery);
</script>
</body>
</html>
