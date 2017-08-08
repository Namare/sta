<?=$css?>
<script src="<?=base_url()?>js/radio.js"></script>


<div class="col-md-12 submenu">

    <?if(!$this->ion_auth->logged_in()){?>


        <div class="col-md-2 col-sm-3 col-xs-4 pad0" style="display: inline-block">  <a href="#" class="search_user"><i class="fa fa-search" aria-hidden="true"></i> Find user</a></div>
        <div class="col-md-1 col-sm-4  col-xs-4 radio_load pad0"></div>
        <div class="col-md-1 col-sm-3 pad0" style="float: right;min-width: 95px;display: inline-block">
            <a href="javascript:void()" data-toggle="dropdown" ><i class="fa fa-lock" aria-hidden="true"></i> Login <i class="fa fa-caret-down" aria-hidden="true"></i></a>
            <ul class="dropdown-menu user_panel">
                <li> <a href="<?=base_url()?>auth/registration"><i class="fa fa-key" aria-hidden="true"></i> Registration</a></li>
                <li> <a href="<?=base_url()?>login?p=<?=current_url()?>"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign-in</a></li>
            </ul>

        </div>
    <?}else{?>


        <div style=" width: 130px; display: inline-block;" class="radio_load"></div>
        <div style="width: 220px; text-align:center; display: inline-block; float: right">
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

        $('.search_user, .search_close').on('click',function(){
            $('.search_block_container').slideToggle();
        });

        $('.find_btn').on('click',function(){
            $('#search_inp').submit();
        });

    });
</script>
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
