<script src="<?=base_url()?>/js/jquery.timepicker.min.js"></script>
<link rel="stylesheet" href="<?=base_url()?>style/jquery.timepicker.css">
<div class="col-md-12 mgb20">
    <div class="col-md-12 white_block">
        <div class="col-md-12 mgb10">
            <div class="col-md-12 adm_info"><i class="fa fa-calendar-o" aria-hidden="true"></i> Edit event:</div>
            <div class="col-md-12">

                <script>
                    $( function() {
                        $('#spinner_start, #spinner_end').timepicker({ 'timeFormat': 'H:i:s' });
                        $('#date_start').datepicker();
                        $('#date_end').datepicker();
                        $('#date_end').datepicker( "option", "dateFormat", 'mm-dd-yy');
                        $('#date_start ').datepicker( "option", "dateFormat", 'mm-dd-yy');
                        $('#date_end').val("<?=$event[0]->event_end_date?>");
                        $('#date_start').val("<?=$event[0]->event_start_date?>");

                        $('.delete_event').on('click',function(){
                            $.ajax({
                                'url':'<?=base_url()?>admin/del_event',
                                'type':'POST',
                                'data':'i='+$(this).data('id'),
                                success:location.reload()
                            });

                        });


                    } );
                </script>
                <form  action="<?=base_url()?>admin/edit_event/<?=$this->uri->segment(3)?>" method="post" enctype="multipart/form-data">
                    <div class="col-md-12 form-group">
                        <label >Event title:</label>
                        <input class="form-control"  value="<?=$event[0]->event_title?>" name="event_title">
                    </div>


                    <div class="col-md-6 form-group">
                        <label for="spinner">Start date:</label>
                        <input class="form-control" value="<?=$event[0]->event_start_date?>" id="date_start" name="date_start">
                    </div>

                    <div class="col-md-6 form-group">
                        <label for="spinner">End date:</label>
                        <input class="form-control" value="<?=$event[0]->event_end_date?>" id="date_end" name="date_end">
                    </div>

                    <div class="col-md-6 form-group">
                        <label for="spinner">Start time:</label>
                        <input class="form-control" value="<?=$event[0]->event_start_time?>" id="spinner_start" name="time_start" value="08:30 PM">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="spinner">End time:</label>
                        <input class="form-control" value="<?=$event[0]->event_end_time?>" id="spinner_end" name="time_end" value="08:30 PM">
                    </div>


                    <div class="col-md-12 form-group">
                        <label >Upload image:</label>
                        <input type="file" class="form-control"  name="cover">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for="spinner">Event link</label>
                        <input class="form-control" value="<?=$event[0]->event_link?>"  name="event_link" value="<?=$event[0]->event_link?>">
                    </div>

                    <div class="col-md-12 form-group">
                        <label >Event description:</label>
                        <textarea class="form-control"  name="event_description"><?=$event[0]->event_description?></textarea>
                    </div>


                    <div class="col-md-4 form-group  pull-right" >

                        <button class="btn btn-primary btn-block">Send</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>