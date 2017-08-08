<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<?if(count($comments)==0){?>
    <h2>
        <span class="fa-stack fa-lg">
        <i class="fa fa-question fa-stack-1x"></i>
        <i class="fa fa-ban fa-stack-2x text-danger"></i>
        </span>
        No questions
    </h2>
<?}?>
<?foreach($comments as $comment){?>

<div data-to="<?=$comment->user_id?>" class="col-md-12 pad0">

<div class="col-md-12 msg_name"><?=@$this->ion_auth->user($comment->user_id)->row()->username?></div>
<div class="col-md-12 msg_text"><?=$comment->comment?></div>
<div class="col-md-12 msg_time"></div>

</div>
<?}?>