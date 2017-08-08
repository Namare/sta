<?if(count($users)==0){die('<h1>No services were found in this city</h1>');}?>
<?foreach($users as $user){?>
    <div class="col-md-12  mgb20 we_item">
    <div class="col-md-3 pad0"><img src="<?=base_url()?>file/avatars/<?=$user->avatar?>" class="img-thumbnail  avatar"></div>
    <div class="col-md-7">
        <div class="we-head col-md-12 "><?=$user->user_name?></div>
        <div class="col-md-12 pad0">
            <ul class="we-list">
                <li>Professon: <b><?=$user->prof_name?></b></li>
                <li>Email: <b><?=$user->email?></b></li>
                <li>Phone: <b><?=$user->phone?></b></li>
                <li>State: <b><?=$user->state?></b></li>
                <li>City: <b><?=$user->city?></b></li>
                <li>Details: <b><?=$user->details?></b></li>
            </ul>
        </div>
    </div>
        <div class="col-md-2 pad0">
            <?if($this->ion_auth->is_admin()){?>
            <div class="btn-group-xs pull-right">
            <div data-id="<?=$user->id_we?>" class="btn btn-danger del_werec"><i class="fa fa-trash no-ico"></i></div>
           <?if($user->is_sort == 1){?>
            <div data-id="<?=$user->id_we?>" class="btn btn-primary lock_rec"><i class="fa fa-lock no-ico"></i></div>
            <?}else{?>
            <div data-id="<?=$user->id_we?>" class="btn btn-primary lock_rec"><i class="fa fa-unlock no-ico"></i></div>
            <?}?>
                </div>
            <?}?>
        </div>

    </div>

<?}?>