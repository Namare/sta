<script src='<?=base_url()?>js/moment.min.js'></script>
<script src='<?=base_url()?>js/fullcalendar.min.js'></script>

<div class="col-md-12 mgb20">
    <button class="btn btn-primary mgb5 pull-right change_view"><i class="fa fa-list" aria-hidden="true"></i> Change view</button>
    <div class="col-md-12 white_block calend_view">
        <div class="col-md-12 mgb10">
            <div class="col-md-12 adm_info"><i class="fa fa-calendar-o" aria-hidden="true"></i> Events:</div>

            <div class="col-md-12 sta_events">

                <div class="col-md-12 sta_events_content pad0">

                    <div id='calendar'></div>

                </div>
            </div>

        </div>
    </div>



    <div class="col-md-12 white_block list_view">
    <div class="col-md-12 mgb10">
        <div class="col-md-12 adm_info"><i class="fa fa-calendar-o" aria-hidden="true"></i> Events:</div>
        <?foreach($events as $event){?>
         <div class="col-md-12 pad10">
            <div class="col-md-3 pad10"><img class=" img-thumbnail  event_cover" src="<?=base_url()?>file/events/<?=$event->cover?>">
            </div>
            <div class="col-md-9">
            <div class="col-md-12 event_title"><a href="<?=base_url()?>events/page/<?=$event->id?>"><?=$event->event_title?></a></div>
            <div class="col-md-3 event_info_item"> <i class="fa fa-calendar "></i> <?=$event->event_start_date?></div>
            <div class="col-md-9 event_info_item"><i class="fa fa-calendar-o"></i> <?=$event->event_end_date?></div>
            <div class="col-md-12 event_info_desc"><?=$event->event_description?></div>
                <div class="col-md-12 news_more mgt10">
                    <div class="more">
                        <a href="<?=$event->event_link?>" class="bounce-to-right">Details</a>
                    </div>
                </div>

            </div>
        </div>
         <?}?>
         </div>
    </div>

</div>
                <script>

    $(document).ready(function() {
        $('.change_view').on('click',function(){
            $('.calend_view').slideToggle(200,function(){
                $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay,listWeek'
                    },
                    navLinks: true, // can click day/week names to navigate views
                    editable: true,
                    eventLimit: true, // allow "more" link when too many events
                    events: [

                        <?foreach($events as $event){?>
                        {
                            title: '<?=$event->event_title?>',
                            start: '<?=$event->event_start_date?>T<?=$event->event_start_time?>',
                            end: '<?=$event->event_end_date?>T<?=$event->event_end_time?>',
                            url:"<?=base_url()?>events/page/<?=$event->id?>"

                        },
                        <?}?>
                    ]
                });
            });
            $('.list_view').slideToggle(200);

        });



    });

</script>