<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="col-md-12">
    <div class="col-md-12 white_block">
        <div class="col-md-12  col-xs-12 mgb10">
            <div class="col-md-12 col-sm-7 col-xs-7 adm_info"><i class="fa  fa-id-card-o" aria-hidden="true"></i> Заказ номер:<?=$order[0]->id?></div>
        </div>

        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-map-signs" aria-hidden="true"></i> Маршрут</div>
                <div class="panel-body pad0">
                    <div
                        data-pickuplat="<?=$order[0]->pickuplat?>"
                        data-pickuplng="<?=$order[0]->pickuplng?>"
                        data-deliverylng="<?=$order[0]->deliverylng?>"
                        data-deliverylat="<?=$order[0]->deliverylat?>"
                        style="width: 100%;height: 350px" id="map_order">

                </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default to-load">
                <div class="panel-heading"><i class="fa fa-info-circle" aria-hidden="true"></i> Детали</div>
                <div class="panel-body pad0">
                  <table class="table table-bordered">
                      <tr>
                          <td> <i class="fa fa-balance-scale" aria-hidden="true"></i> Weight: <b><?=$order[0]->weight?></b></td>
                      </tr>
                      <tr>
                          <td> <i class="fa fa-arrows-h" aria-hidden="true"></i>  Wide: <b><?=$order[0]->wide?> </b></td>
                      </tr>
                      <tr>
                          <td> <i class="fa fa-arrows-v" aria-hidden="true"></i>  Height: <b><?=$order[0]->height?> </b></td>
                      </tr>
                      <tr>
                          <td> <i class="fa fa-long-arrow-up" aria-hidden="true"></i>  Length: <b><?=$order[0]->length?> </b></td>
                      </tr>
                      <tr>
                          <td>
                              <?
                              $dis_ml = round($order[0]->distance/1609);
                              ?>
                              <i class="fa fa-map-marker" aria-hidden="true"></i>  Distance : <b><?=$dis_ml?> ml</b>
                          </td>
                      </tr>
                      <tr>
                          <td>Price/Distance: ~ <b><?=@round($order[0]->price/$dis_ml,2)?> $/ml</b></td>
                      </tr>
                      <tr>
                          <td>Pick Up Date: <b><?=$order[0]->date_start?> </b></td>
                      </tr>
                      <tr>
                          <td>Delivery Date: <b><?=$order[0]->date_end?> </b></td>
                      </tr>
                      <tr>
                          <td>Load type: <b><?=$order[0]->auto?> </b></td>
                      </tr>
                      <tr>
                          <td><i class="fa fa-id-badge" aria-hidden="true"></i> Owner : <b><a href="<?=base_url()?>user/user_id/<?=$order[0]->owner_id?>" target="_blank"><?=@$this->ion_auth->user($order[0]->owner_id)->row()->username?></b></td>
                      </tr>
                  </table>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading "><i class="fa fa-comment" aria-hidden="true"></i> Коментарии пользователей</div>
                <div class="panel-body pad0">

                    <?foreach($comments as $comment){?>

                        <div data-to="15" class="col-md-12 massg_block ">
                            <div class="col-md-12 msg_name"><?=$this->ion_auth->user($comment->user_id)->row()->username?> </div>
                            <div class="col-md-12 msg_text"><?=$comment->comment?></div>
                            <div class="col-md-12 msg_time"></div>

                        </div>
                    <?}?>

                </div>
            </div>
        </div>


    </div>
</div>
<script src="<?=base_url()?>js/ordermap.js?<?=rand(1,1000)?>"></script>