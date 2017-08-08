<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?
$type_arr = [
    '.jpg',
    '.jpeg',
    '.png',
    '.JPEG',
    '.JPG'
];
?>
<?foreach($orders as $order){?>
    <tr>
        <td><i class="fa fa-file-o" aria-hidden="true"></i>  <?=$order->att_name?></td>
        <td>
            <div class="btn-group btn-group-xs pull-right">
            <?if(in_array($order->type,$type_arr)){?>
              <a target="_blank" class="btn btn-primary" href="http://stassociation.com/file/<?=$order->name_code.$order->type?>"><i class="fa fa-external-link" aria-hidden="true"></i> Open</a>
                <?}else{?>
                <a target="_blank" class="btn btn-primary" href="https://docs.google.com/viewerng/viewer?url=http://stassociation.com/file/<?=$order->name_code.$order->type?>"><i class="fa fa-external-link" aria-hidden="true"></i> Open</a>
                <?} if(!$this->ion_auth->in_group(4)){?>
                <a data-id="<?=$order->id?>" class="btn btn-primary delete_att_order" href="#"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
                <?}?>
            </div>
        </td>
    </tr>

<?}?>