
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
                                <a href="//stassociation.com/werecommend" >
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
<div class="container">
    <div id="content_section">
        <div id="main_content_section" class="action consultation">


            <style>
                .consultation-image {
                    max-height: 400px;
                    overflow: hidden;
                }
                .consultation-image img {
                    height: 100%;
                    width: auto;
                }
            </style>
            <p></p>
            <div class="cat_bar">
                <h3 class="catbg">Консультация</h3>
            </div>
            <section class="consultation">
                <div class="consultation-caption text-left">
                    <div class="text-center consultation-image">
                        <img src="/About us_files/advice_600.jpg" alt="Консультация">
                    </div>
                    <p>Мы работаем над тем, чтобы этот сервис был доступен всем пользователям сайта с расширенной регистрацией доступа. <br>
                        На данный момент мы подбираем компетентных в юридическом плане сотрудников, кто мог бы давать легальные совет,
                        а также помогать водителям-дальнобойщикам разрешать сложные вопросы. <br><br>
                        Как только этот вид услуги будет открыт, мы сообщим вам об этом. <br><br>
                        Если у вас есть какие-либо вопросы, пишите на адрес ассоциации.</p>
                    <form name="contacts" action="javascript:void()" method="post"
                          novalidate="novalidate" id="ajaxform" role="form">
                        <div class="row-fluid">
                            <p class="span4 field">
										<span>
											<input type="text" name="your_name" required
                                                   class=""
                                                   value=""
                                                   size="40" aria-required="true"
                                                   aria-invalid="false"
                                                   placeholder="Your name"/>
										</span>
                            </p>
                            <p class="span4 field">
										<span>
											<input type="text" name="your_email" required
                                                   class=""
                                                   value=""
                                                   size="40" aria-required="true"
                                                   aria-invalid="false"
                                                   placeholder="E-mail: "/>
										</span>
                            </p>
                            <p class="span4 field">
										<span>
											<input type="text" name="your_phone"
                                                   size="40" aria-invalid="false"
                                                   value=""
                                                   placeholder="Телефон: "/>
										</span>
                            </p>
                        </div>
                        <p class="field">
									<span>
										<textarea name="your_message" required
                                                  class=""
                                                  cols="40" rows="10" aria-invalid="false"
                                                  placeholder="Explain your  situation "
                                            ></textarea>
									</span>
                        </p>
                        <p class="help-block">
                        					</p>
                        <p class="submit-wrap">
                            <input type="hidden" name="push" value="form">
                            <input type="reset" value="Очистить"
                                   class="btn btn-primary"/>
                            <input type="submit" value="Отправить"
                                   class="btn btn-primary send_mail"/>
                        </p>
                    </form>
                </div>
            </section>
        </div>
    </div>
</div>
<script>
    $(function(){
        $('.send_mail').on('click',function(){
           if($('input[name="your_name"]').val() == ''){alert('Enter name'); }
          else if($('input[name="your_email"]').val() == ''){alert('Enter email'); }
          else if($('input[name="your_phone"]').val() == ''){alert('Enter phone'); }
          else if($('input[name="your_message"]').val() == ''){alert('Explain your  situation'); }
          else{
               $.ajax({
                   url:'/logistic/send_cons/',
                   method:"POST",
                   data:$('#ajaxform').serialize(),
                   success:function(){
                       alert('Message was sent');
                       $('#ajaxform')[0].reset();
                   }
               })
          }


        });
    });
 </script>
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
