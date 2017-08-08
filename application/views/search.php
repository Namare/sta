<div class="col-md-12">
    <div class="col-md-12 white_block">
        <h3><i class="fa fa-search"></i> Find Users:</h3>
        <table class="table  table-hover">
            <thead>
            <th><i class="fa fa-list"></i> User List</th>

            </thead>
            <tbody>
            <?foreach($users as $user){?>
            <tr>
                <td>
                    <div class="panel panel-default col-md-12 pad10">
                       <div class="col-md-4 pad0">
                           <div class="col-md-12"><a href="<?=base_url()?>user/user_id/<?=$user->id?>" class="search_head"><?=$user->username?></a></div>
                           <ul class="search_list">
                               <li><b>Phone:</b> <?=$user->phone?></li>
                               <li><b>Email:</b> <?=$user->email?></li>
                               <li><b>Website:</b> <?=$user->website?></li>
                               <li><b>Company:</b> <?=$user->company?></li>
                           </ul>

                       </div>
                  <div class="col-md-8 pad0">

                      <div class="btn-group btn-group-xs pull-right pad5 ">

                          <a class="btn btn-default" href="<?=base_url()?>user/user_id/<?=$user->id?>"><i class="fa fa-user-circle no-ico"></i></a>
                      </div>
                      <div class="col-md-12 pad0">
                      <div class="panel panel-default ">
                          <div class="panel-heading">About</div>
                          <div class="panel-body"><?=$user->about?></div>
                      </div>
                      </div>

                  </div>
                    </div>
                </td>
            </tr>
            <?}?>
            </tbody>
        </table>
    </div>
</div>