<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div id='map_from_pop' class="map_pop"></div>
<div id='map_to_pop' class="map_pop"></div>


<div id='add_map_to_pop' class="map_pop"></div>
<div class="col-md-10  col-md-offset-1 pad0">
<ul class="nav nav-tabs pad0">
    <li class="active"><a href="#"><b><i class="fa fa-filter" aria-hidden="true"></i> Search</b></a></li>
</ul>
</div>
<div class="logistic_app">
        <div class="filter col-md-10 col-md-offset-1">
        <form class="app_filter" action="<?=base_url()?>logistic" method="post">

            <div class="col-md-12" >
                <div class="col-md-4 form-group">
                        <label for="email">Pick Up Location:</label>
                         <input class="form-control " id="filter_from" name="filter_from" placeholder="Pick Up">
                </div>

                <div class="col-md-4 form-group">
                    <label for="email">Delivery Location:</label>
                    <input class="form-control" id="filter_to" name="filter_to"  placeholder="Delivery">
                </div>
                <div class="col-md-4 form-group">
                    <label>Equipment:</label>

                    <select class="form-control" name="filter_auto" >
                        <option value="0">Not select</option>
                        <option value="Rifer">Rifer</option>
                        <option value="Flat">Flat Bed</option>
                        <option value="Dryvan">Dryvan</option>
                        <option value="Car-carrier">Car-carrier</option>
                        <option value="Sprinter">Sprinter</option>
                        <option value="Other">Other</option>

                    </select>
                </div>

            </div>

            <div class="col-md-12">

                <div class="btn-group" >
                    <a href="<?=base_url()?>logistic<?=($this->input->server('QUERY_STRING')=='')?'?sort=asap':'';?>"  class="btn btn-default app_asap"><i class="fa fa-filter" aria-hidden="true"></i> Filter asap </a>
                </div>

                <div class="btn-group pull-right" >
                    <button  class="btn btn-default  app_clear"><i class="fa fa-eraser" aria-hidden="true"></i> Clear </button>
                    <button  class="btn btn-default app_search"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                </div>
            </div>

            </form>
        </div>







    <div class="col-md-12 app_display" style="display: inline-flex;">
        <div class="list_order_content col-md-12">
<!--Тут сам заказ           -->

 <div class="col-md-12 order_list_names hidden-xs hidden-sm">
     <?if(count($orders)==0){echo"No loads found";}else{?>
     <div class="col-xs-1">Added</div>
     <div class="col-xs-3">Pick Up Location</div>
     <div class="col-xs-4">Delivery Location</div>
     <div class="col-xs-1 pad0">Pick Up Date</div>
     <div class="col-xs-1">Equipment</div>
     <div class="col-xs-1">Price</div>
     <div class="col-xs-1">Rate</div>
     <?}?>
 </div>

<?foreach($orders as $order){
    $added_desc = time() - $order->added;
    $added_s = date( 's',time() - $order->added);
    $added_min = date( 'i',time() - $order->added);
    $added_h = date( 'G',time() - $order->added);
    $added_d = round($added_desc/86400);
    $added= $added_s.' s';
    if($added_desc > 60){
        $added= $added_min.' min';
    }
    if($added_desc >= 3600){
        $added= $added_h.' h';
    }
    if($added_desc >= 78000){
        $added= $added_d .' day';
    }


    $dis_ml = round($order->distance/1609);

    ?>


             <div class="item_order col-xs-12 <?=((time() - $order->added) < 3600  )?'ishot':''?>">
                <div class="col-xs-3  col-md-1 order_list_time app_br_r dp_none_app">
                    <i class="fa fa-clock-o" aria-hidden="true"></i>   <?=$added?>
                    <div class="app_info_filter"> Load age</div>
                </div>
                <div class="col-xs-12 col-md-3">
                    <div class="dest_header app_trim add_arr_app"><?=$order->from_end?></div>
                </div>
                <div class="col-xs-12 col-md-4 app_br_b">
                    <div class="dest_header app_trim"><?=$order->to_end?></div>
                </div>

                 <div class="col-xs-3 col-md-1 order_list_header pad0 app_list_date ">
                     <?
                     if($order->asap == 1){?>
                         <div class="btn btn-danger btn-block "><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> ASAP</div>
                     <?}else{
                    echo $order->date_start;?>
                     <div class="app_info_filter dp_none"> Pick Up</div>
                     <? }?>
                 </div>
                <div class=" col-md-1 hidden-xs hidden-sm order_list_header">
                    <?=$order->auto?>
                </div>
                <div class="col-xs-4 col-md-1 app_list_price dp_none app_br_l">
                    <i class="fa fa-clock-o" aria-hidden="true"></i>   <?=$added?>
                    <div class="app_info_filter"> Load age</div>
                </div>
                <div class="col-xs-4 col-md-1 app_list_price app_br_l app_br_r">
                    $<?=$order->price?>
                    <div class="app_info_filter"> Load price</div>
                </div>
                <div class="pull-right col-xs-3 col-md-1 order_list_price ">
                    $<?=@round($order->price/$dis_ml,2)?>
                    <div class="app_info_filter"> Load rate</div>
                </div>
            </div>

             <div class="item_order_info col-xs-12">


                 <div class="col-xs-12 col-md-12">
                     <div class="pad5 order_list_header ">Order details:</div>
                 </div>

                 <div class="col-md-6 orderlistplace" >
                     <div class="col-md-12">
                         <b><?=$order->date_start?></b>
                     </div>
                     <div class="col-md-12 ">
                          <div class="dest_header"><?=$order->from_end?></div>
                     </div>

                     <div class="col-md-12">
                         <b><?=$order->date_end?></b>
                     </div>
                     <div class="col-md-12 ">
                         <div class="dest_header"> <?=$order->to_end?></div>
                     </div>
                </div>

                 <div class="col-md-6 orderlistmap">
                    <div class="col-md-12 pad0">
                        <img class="col-md-12 pad0"  src="https://maps.googleapis.com/maps/api/staticmap?size=520x130&scale=2&path=weight:5|color:blue|enc:<?=urldecode($order->points)?>&markers=label:A|color:green|<?=urldecode($order->pickuplat)?>,<?=urldecode($order->pickuplng)?>&markers=label:B|color:red|<?=urldecode($order->deliverylat)?>,<?=urldecode($order->deliverylng)?><?=$apikey?>">
                    </div>
                 </div>

                 <div class="col-md-2 info_middle pad0 padb20" >
                     <div class="col-md-12">
                         <i class="fa fa-balance-scale" aria-hidden="true"></i> Weight: <b><?=$order->weight?> </b>
                     </div>
                     <div class="col-md-12">
                         <i class="fa fa-long-arrow-up" aria-hidden="true"></i> Length: <b><?=$order->length?> </b>
                     </div>
                     <div class="col-md-12">
                         <i class="fa fa-arrows-h" aria-hidden="true"></i> Wide: <b><?=$order->wide?> </b>
                     </div>
                     <div class="col-md-12">
                         <i class="fa fa-arrows-v" aria-hidden="true"></i> Height: <b><?=$order->height?> </b>
                     </div>
                     <div class="col-md-12">
                         <i class="fa fa-map-marker" aria-hidden="true"></i>  Distance : <b><?=$dis_ml?> ml</b>
                     </div>
                     <div class="col-md-12">
                         <i class="fa fa-truck" aria-hidden="true"></i>  Equipment : <b>  <?=$order->auto?></b>
                     </div>
                     <div class="col-md-12">
                         Rate: ~ <b><?=@round($order->price/$dis_ml,2)?> $/ml</b>
                     </div>
                 </div>
                 <div class="col-md-4 " >
                     <div class="col-md-12">
                         <button type="button" data-order_id="<?=$order->id?>" data-owner_id="<?=$order->owner_id?>" <?=(!$this->ion_auth->logged_in())?' data-toggle="modal" data-target="#loginModal" ':''?> class="btn btn-info btn-block getOrder">Contact</button>

                     </div>
                     <div class="col-md-12 pad5">
                         <button type="button" class="btn btn-default btn-block showmap">Show map</button>
                     </div>
                     <div class="col-md-12 pad5" style="font-size: 10px">
                         <?=$order->info?>
                     </div>

                 </div>
            </div>


<?}?>
<!--Тут сам заказ   конец        -->
        </div>
    </div>
</div>
<?if($this->ion_auth->logged_in()){?>



    <div id="addorderModal" class="modal  fade" role="dialog">
        <div class="modal-dialog  modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header mgb10">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add load</h4>
                </div>
                <div class="container-fluid">
                    <?if($this->ion_auth->user()->row()->is_prim != 0){?>
                    <div class="col-md-12 pad0">
                        <div class="col-md-3  form-group">
                            <label >Pick Up Location:</label>
                            <input class="form-control " id="pickuploc" type="text" name="add_from" placeholder="">
                            <input class="form-control "  type="hidden" name="pickuplat">
                            <input class="form-control "  type="hidden" name="pickuplng">
                            <input class="form-control "  type="hidden" name="addmappoints">
                        </div>

                        <div class="col-md-3  form-group">
                            <label>Delivery Location:</label>
                            <input class="form-control " type="text" id="deliveryloc" name="add_to" placeholder="">
                            <input class="form-control " type="hidden" name="deliverylat">
                            <input class="form-control " type="hidden" name="deliverylng">
                            <input class="form-control " type="hidden" name="distance" >
                            <input class="form-control " type="hidden" name="totaltime" >
                        </div>

                        <div class="col-md-2  form-group">
                            <label>Pick Up Date :</label>
                            <input class="form-control " name="date_start" placeholder="">
                        </div>
                        <div class="col-md-2  form-group">
                            <label>Delivery Date:</label>
                            <input class="form-control " name="date_end" placeholder="">
                        </div>
                        <div class="col-md-2 form-group ">
                            <label>Set ASAP:</label>
                            <label class=" btn btn-default btn-block text-left" ><input type="checkbox" name="asap" > ASAP</label>
                        </div>
                    </div>
                    <div class="col-md-12 pad10">
                        <div class="col-md-12 "  id="map_add_order"></div>
                    </div>

                    <div class="col-md-12 MAPdata">
                        <table class="table table-hover">
                            <tr>
                                <td class="col-md-2"><i class="fa fa-map-marker" aria-hidden="true"></i> Point A:</td>
                                <td class="MAPstart "></td>
                                <td class="col-md-2"><i class="fa fa-map-marker" aria-hidden="true"></i> Point B:</td>
                                <td class="MAPend "></td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <a href="javascript:void(0)" class="btn col-md-push-2 col-md-8 btn-success setorderpoint atop"><i class="fa fa-map-marker" aria-hidden="true"></i> Confirm</a>
                                </td>
                            </tr>
                         <tr>
                                <td colspan="2">Distance: <span  class="MAPtext"></span> (<span  class="MAPvalue"></span> m)</td>
                                <td colspan="2"><i class="fa fa-clock-o" aria-hidden="true"></i> <span  class="MAPduration"></span></td>
                         </tr>
                        </table>


                    </div>

                    <div class="col-md-12 ">
                        <div class="col-md-4 form-group">
                            <label>Equipment:</label>
                            <select class="form-control"  name="add_auto" >
                                <option>Not select</option>
                                <option>Rifer</option>
                                <option>Flat Bed</option>
                                <option>Dryvan</option>
                                <option>Car-carrier</option>
                                <option>Sprinter</option>
                                <option>Other</option>
                            </select>
                        </div>
                        <div class="col-md-8 form-group show_other_field">
                            <label>Other:</label>
                           <input class="form-control" placeholder="Other" name="add_other">
                        </div>


                        <div class="col-md-2 form-group">
                            <label>Weight:</label>
                            <input class="form-control " name="add_weight" placeholder="Weight">
                        </div>
                        <div class="col-md-2 form-group">
                            <label>Height:</label>
                            <input class="form-control " name="add_height" placeholder="Height">
                        </div>
                        <div class="col-md-2 form-group">
                            <label>Wide:</label>
                            <input class="form-control " name="add_wide" placeholder="Wide">
                        </div>

                        <div class="col-md-2 form-group">
                            <label>Lenght</label>
                            <input class="form-control " name="add_length" placeholder="Lenght">
                        </div>

                    </div>

                    <div class="col-md-12 ">

                        <div class="col-md-4 form-group">
                            <label>Price:</label>
                            <input class="form-control" type="text" name="add_price" placeholder="Price">
                        </div>




                    </div>
                    <div class="col-md-12 ">

                        <div class="col-md-12 form-group">
                            <label>Additional information:</label>
                            <textarea class="form-control" rows="3" name="additional"  placeholder="Additional information"></textarea>
                        </div>


                    </div>
                    <div class="col-md-12">

                        <div class="col-md-4 form-group col-md-push-8">
                            <button type="button" id="send_order" class="btn btn-success btn-block">Add load</button>
                        </div>
                    </div>

                    <?}else{?>
                        <p>Please fill out your profile completely to get a premium access.</p>
                        <ul>
                            <li>CDL</li>
                            <li>DL</li>
                            <li>Insurance</li>
                        </ul>
                        <p>Go to <a href="<?=base_url()?>/user">profile</a></p>
                    <?}?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>



    <div id="getorderModal" class="modal  fade " role="dialog">
        <div class="modal-dialog  modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header mgb10">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Added load</h4>
                </div>
                <div class="container-fluid">
                    <?if($this->ion_auth->user()->row()->is_prim != 0){?>

                    <div class="col-md-12 form-group hidden">
                       Вы хотите взять заказ №: <span class="orderName"></span>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Leave comment for this company:</label>
                        <textarea class="form-control" name="commentOrder"></textarea>
                        <div class="col-md-12 form-group pad0 mgt10">


                            <button type="button" id="sendOrder" rel="" class="btn btn-info btn-block" >Send message</button>
                        </div>

                    </div>
                    <div class="col-md-6 form-group">
                        <ul class="list-group">
                            <li class="list-group-item get_name"><b><i class="fa fa-user-circle-o" aria-hidden="true"></i> Name</b>: <span></span></li>
                            <li class="list-group-item get_phone"><b><i class="fa fa-phone-square" aria-hidden="true"></i> Phone</b>: <span></span></li>
                            <li class="list-group-item get_email"><b><i class="fa fa-envelope" aria-hidden="true"></i> Email</b>: <span></span></li>
                        </ul>
                    </div>

                    <?}else{?>
                        <p>Please fill out your profile completely to get a premium access.
                            Go to profile.</p>

                        <p>Go to <a href="<?=base_url()?>/user">profile<a/></p>
                    <?}?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

<?}else{?>
    <script>
        $(function(){
        $('.forum_login').on('click',function(){
            $.ajax({
                method:'POST',
                url:BASE_URL + 'forum/login',
                data:'e='+$('.forum_email').val()+"&p="+$('.forum_pass').val(),
                success:function(data){
                    if(data){
                        window.location.reload();
                    }else{
                        $('.forum_err').html(' <div class="alert alert-danger"><strong>Wrong!</strong> Wrong username or password.</div>');
                    }
                }
            });
        });
        });
    </script>
    <div id="loginModal" class="modal  fade" role="dialog">
        <div class="modal-dialog  modal-sm">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header mgb10">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Login</h4>

                </div>
                <div class="container-fluid">
                    <div class="col-md-12">
                        <div class="col-md-12 forum_err"></div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input class="form-control forum_email error">
                        </div>
                        <div class="form-group">
                            <label>Password:</label>
                            <input type="password" class="form-control forum_pass">
                        </div>
                        <div class="form-group">
                            <label>Sing-in:</label>
                            <button type="submit" class="btn btn-primary btn-block forum_login"><i class="fa fa-sign-in"></i> Login</button>
                            <h6 class="modal-title mgt10"><a href="<?=base_url()?>auth/registration"> Register </a></h6>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
<?}?>
    <div class="col-md-12 " style="display: none" id="map_add_order"></div>

    <script src="<?=base_url()?>js/logistic.js?<?=rand(1,1000)?>"></script>
