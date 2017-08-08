<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
    <tr>
        <td><b>User name </b></td>
        <td><b>Status</b></td>
    </tr>
<?foreach($users  as $key => $user){?>
    <?
    $order=  $this->db->get_where('logistic_orders',array('id'=>$user->order_id))->result()[0]->owner_id;
    echo $order;
    echo $this->ion_auth->get_user_id();
    $st = '';
    if($this->ion_auth->get_user_id() != $order){
        $st ='disabled';
    }
    ?>
    <tr>
        <td><a target="_blank" href="<?=base_url()?>user/user_id/<?=$user->user_id?>"><?=@$this->ion_auth->user($user->user_id)->row()->username?></a></td>
        <?$this->db->get_where('approve_status')?>
        <td>
            <select <?=$st?> data-id="<?=$user->user_id?>" class="form-control change_status">
                <?foreach($this->db->get('approve_status')->result() as $status){
                    $ch = ($status->status_id == $user->approve_status)?'selected':'';
                    ?>
            <option <?=$ch?> value="<?=$status->status_id?>"> <?=$status->status_name?> </option>
                <?}?>
            </select>
        </td>
    </tr>
<?}?>