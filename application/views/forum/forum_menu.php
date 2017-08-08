<div class="forum_menu col-md-12">
    <form method="GET" action="<?=base_url()?>forum/search">
    <div class="col-md-1"></div>
    <div class="col-md-5" style="margin-right: -25px">
        <input  name="s" class="form-control forum_search" placeholder="Search" >
    </div>
    <div class="col-md-1">
        <button type="submit" class="btn btn-primary btn_forum"  ><i class="fa  fa-search no-ico"></i></button>
    </div>
        <?if($this->ion_auth->logged_in()){?>
    <div class="col-md-2 pad0"><a href="<?=base_url()?>forum/add_thread" class="btn btn-success btn-block mgt5"><i class="fa fa-plus"></i>New topic</a></div>

   <div class="col-md-2 pad5 text-center"> <a href="<?=base_url()?>forum/profile"> <img   style="width: 30px; border-radius: 5px; " src="<?=base_url()?>images/forum/avatar/<?= $this->ion_auth->get_user_id()?>.jpg?<?=rand(1,100)?>"> <?=$this->ion_auth->user()->row()->username?></a></div><?}?>
    </form>
</div>