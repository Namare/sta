STARDO = {
    init:function(){
        $('.radio_load').prepend('<div class="load_chanels"></div><table class="mg0"><tr class="radio_player"><td class="pad0"><span class="pad010">Radio</span></td><td class="radio_play_btn pad05"> <i class="fa fa-play" aria-hidden="true"></i></td><td class="show_radio_list pad05"><i class="fa fa-list" aria-hidden="true"></i></td></tr></table><audio id="radio_player" controls="" preload="" src="http://cast.radiogroup.com.ua:8000/retro"><source src="" type="audio/mpeg"></audio></div>');
        if(window.location == 'https://stassociation.com/' || window.location == 'https://stassociation.com/#' ){
            $('.radio_load').hide();
        }

        $('.radio_player').hover(
            function(){
                $('.radio_play_btn ').animate({color:'#df6018'},500);
        },
            function(){
                $('.radio_play_btn ').animate({color:'white'},500);
            }
        );



        $('.radio_play_btn').on('click',function(){
            if( localStorage.getItem('play') !=1){
            localStorage.setItem("play", 1);
            }else{
            localStorage.setItem("play", 0);
            }


            if($('#radio_player')[0].paused){
                document.getElementById('radio_player').play();

                $(this).find('i').removeClass('fa-play');
                $(this).find('i').addClass('fa-pause');
            }
            else{
                document.getElementById('radio_player').pause();
                $(this).find('i').addClass('fa-play');
                $(this).find('i').removeClass('fa-pause');
            }
        });

        $('.show_radio_list').on('click',function(){
            $('.load_chanels').slideToggle();
        });
        $('.radio_hide_btn').on('click',function(){$('.radio_player').slideUp()});

        $('body').on('click','.radio-block',function(){
            $('.radio_player').slideDown();
            var th = $(this);

            $('.radio_play_btn').find('i').removeClass('fa-play');
            $('.radio_play_btn').find('i').addClass('fa-pause');


            localStorage.setItem("chanel", $(this).data('audio'));
            localStorage.setItem("play", 1);


            setTimeout(function () {
                $('.radio_name').text(th.find('.radio-head').text());
                $('#radio_player').attr('src',th.data('audio'));
                if($('#radio_player')[0].paused){
                    document.getElementById('radio_player').play();
                }
            },500);
        });

        $('.load_chanels').load('https://stassociation.com/radio');

    }
}
