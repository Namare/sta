/**
 * Created with JetBrains PhpStorm.
 * User: Виктор
 * Date: 04.11.16
 * Time: 16:29
 * To change this template use File | Settings | File Templates.
 */

   LG = {
      init: function(){
          $(function(){

             LG.orders();
             MAP.initMap();


          });
      },
      orders:function(){


          $("#addOrder").on("click",function(){
              $("#addorderModal").modal();
          });

          $("#addorderModal").on('shown.bs.modal',function(){
              google.maps.event.trigger(addMAP, "resize");
          });

          $('.showmap').on('click',function(){
              $(this).parent().parent().parent().find('.orderlistmap').slideToggle(10);
              $(this).parent().parent().parent().find('.orderlistplace').slideToggle(10);
          });

          $("#myorder").on("click",function(){
              $("#myorderModal").modal();

          });

          $('.item_order').on('click',function(){
              $(this).next('.item_order_info').slideToggle(200);
          });


          $('.setorderpoint').on('click',function(){
              if($(this).hasClass('atop')){
                  $('input[name="add_from"]').val($('.MAPstart').text());
                  $('input[name="add_to"]').val($('.MAPend').text());
                  $('input[name="pickuplat"]').val(MAP.addSL.lat);
                  $('input[name="pickuplng"]').val(MAP.addSL.lng);
                  $('input[name="deliverylat"]').val(MAP.addEL.lat);
                  $('input[name="deliverylng"]').val(MAP.addEL.lng);
                  $('input[name="addmappoints"]').val( MAP.addPoints);
                  $('input[name="distance"]').val($('.MAPvalue').text());
                  $('input[name="totaltime"]').val($('.MAPduration').text());
              }
//              if($(this).hasClass('btop')){
//                  $('input[name="add_to"]').val($('.MAPstart').text());
//                  $('input[name="add_from"]').val($('.MAPend').text());
//                  $('input[name="pickuplat"]').val(MAP.addEL.lat);
//                  $('input[name="pickuplng"]').val(MAP.addEL.lng);
//                  $('input[name="deliverylat"]').val(MAP.addSL.lat);
//                  $('input[name="deliverylng"]').val(MAP.addSL.lng);
//                  $('input[name="addmappoints"]').val( MAP.addPoints);
//                  $('input[name="distance"]').val($('.MAPvalue').text());
//                  $('input[name="totaltime"]').val($('.MAPduration').text());
//              }
          });


          $('input[name="date_start"]').datepicker();
          $('input[name="date_end"]').datepicker();

          $('input[name="filter_start"]').datepicker();
          $('input[name="filter_end"]').datepicker();

          $('#send_order').on('click',function(){
              var add_from = $('input[name="add_from"]').val();
              var add_to = $('input[name="add_to"]').val();

              var add_start = $('input[name="date_start"]').val();
              var add_end = $('input[name="date_end"]').val();

              var add_auto = $('select[name="add_auto"]').children('option:selected').val();
              var add_auto_other = $('input[name="add_other"]').val();

              var add_length = $('input[name="add_length"]').val();
              var add_wide = $('input[name="add_wide"]').val();
              var add_height = $('input[name="add_height"]').val();
              var add_weight = $('input[name="add_weight"]').val();

              var add_asap = ($('input[name="asap"]').is(':checked') == true)?'1':'0';


              var add_info = $('textarea[name="add_info"]').val();
              var additional = $('textarea[name="additional"]').val();
              var add_price = $('input[name="add_price"]').val();

              var pickuplat = $('input[name="pickuplat"]').val();
              var pickuplng = $('input[name="pickuplng"]').val();

              var deliverylat = $('input[name="deliverylat"]').val();
              var deliverylng = $('input[name="deliverylng"]').val();

              var distance = $('input[name="distance"]').val();
              var totaltime = $('input[name="totaltime"]').val();
              var points = $('input[name="addmappoints"]').val();





              $.ajax({
                  method:'POST',
                  url:'/logistic/add_order',
                  data:"add_from="+ add_from +
                      "&add_to="+ add_to +
                      "&add_start="+ add_start +
                      "&add_end="+ add_end +
                      "&add_auto="+ add_auto +
                      "&add_other="+ add_auto_other +
                      "&add_length="+ add_length +
                      "&add_weight="+ add_weight +
                      "&add_wide="+ add_wide +
                      "&add_height="+ add_height +
                      "&add_asap="+ add_asap +
                      "&add_info="+ add_info+
                      "&additional="+ additional+
                      "&puplat="+ pickuplat+
                      "&puplng="+ pickuplng+
                      "&delat="+ deliverylat+
                      "&delng="+ deliverylng+
                      "&dist="+ distance+
                      "&tt="+ totaltime+
                      "&points="+ points+
                      "&add_price="+ add_price,
                  success:function(){
                      show_done();
                      location.href = window.location.href ;
                  }
              });
          });

          function show_done(){
              $("#addorderModal").modal('hide');
              $("#addorderModal").find("input, textarea").val("");
              $(".filter .col-md-12:first-child").prepend('<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Успешно!</strong> заказ добавлен. Обновите страницу.</div>');

          }




          $('.getOrder').on('click',function(){
             $('#getorderModal').modal();
             $('#getorderModal').find('.orderName').text($(this).data('order_id'));
             $('#getorderModal').find('#sendOrder').attr('rel',$(this).data('order_id'));
             $('#getorderModal').find('#sendOrder').data('owner_id',$(this).data('owner_id'));

             $('.get_phone span').load(BASE_URL+'logistic/get_phone/'+$(this).data('owner_id'));
             $('.get_email span').load(BASE_URL+'logistic/get_email/'+$(this).data('owner_id'));
             $('.get_name span').load(BASE_URL+'logistic/get_name/'+$(this).data('owner_id'));

              $.ajax({
                  method:"POST",
                  url:"/logistic/get_order",
                  data:'order_id='+$(this).data('order_id') + '&owner_id='+$(this).data('owner_id')
              });
         });


          $('select[name="add_auto"]').on('change',function(){
              if($(this).find('option:selected').text()=='Other'){
                $('.show_other_field').slideDown(200);
              }else{
                  $('.show_other_field').slideUp(200);
              }
          });

         $('#sendOrder').on('click',function(){
             $.ajax({
                 method:"POST",
                 url:"/logistic/get_order",
                 data:'order_id='+$(this).attr('rel')+'&owner_id='+$(this).data('owner_id')+
                     '&commentOrder='+$("textarea[name='commentOrder']").val(),
                 success:function(){
                     $('#getorderModal').find('.container-fluid').prepend('<div class="alert alert-success"><strong>Вы взяли новый заказ!</strong> Ваше сообщение отправленно заказчику. </div>');
                     $('#getorderModal').modal('hide');
                     location.reload();
                 }
             });
         });

      }

   }

   LG.init();
