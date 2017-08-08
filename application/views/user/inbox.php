<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
    <div  class="tab-pane fade in active">

<?foreach($msg as $ms){?>
    <div data-to="<?=$ms->from_user_id?>" class="col-md-12 massg_block">
       <? $us = ($usr !==false)?$ms->from_user_id:$ms->to_user_id;?>
        <div class="col-md-12 msg_name"><?=@$this->ion_auth->user($us)->row()->username?> <div class="col-md-2 pull-right"><?=date('H:i m-d-Y',$ms->added)?></div></div>
        <div class="col-md-12 msg_text"><?=$ms->text?></div>
        <div class="col-md-12 msg_time"></div>

    </div>
<?}?>
    </div>