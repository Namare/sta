<script src="<?=base_url()?>/js/jquery.timepicker.min.js"></script>
<link rel="stylesheet" href="<?=base_url()?>style/jquery.timepicker.css">
<div class="col-md-12 mgb20">
    <div class="col-md-12 white_block">
        <div class="col-md-12 mgb10">
            <div class="col-md-12 adm_info"><i class="fa fa-calendar-o" aria-hidden="true"></i> Manage events:
                <div class="btn btn-success pull-right" data-toggle="modal" data-target="#add_event"><i class="fa fa-plus" aria-hidden="true"></i> Add Event</div>
            </div>
            <table class="table table-hover">
                <?foreach($events as $event){?>
                <tr>
                    <td><b><?=$event->id?></b></td>
                    <td><b><?=$event->event_title?></b></td>
                    <td><?=$event->event_start_time?></td>
                    <td><?=$event->event_end_time?></td>
                    <td><?=$event->event_start_date?></td>
                    <td><?=$event->event_end_date?></td>
                    <td><a href="<?=base_url()?>admin/edit_event/<?=$event->id?>" class="btn btn-success edit_event"><i class="fa fa-edit no-ico"></i></a></td>
                    <td><div data-id="<?=$event->id?>" class="btn btn-danger delete_event"><i class="fa fa-trash no-ico"></i></div></td>
                </tr>
                <?}?>
            </table>

        </div>
    </div>
</div>

<div id="add_event" class="modal fade " role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Event </h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid  pad0">

                    <script>
                        $( function() {
                            $('#spinner_start, #spinner_end').timepicker({ 'timeFormat': 'H:i:s' });
                            $('#date_start').datepicker();
                            $('#date_end').datepicker();
                            $('#date_end').datepicker( "option", "dateFormat", 'mm-dd-yy');
                            $('#date_start ').datepicker( "option", "dateFormat", 'mm-dd-yy');


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
                    <form  action="<?=base_url()?>admin/add_event" method="post" enctype="multipart/form-data">
                    <div class="col-md-12 form-group">
                        <label >Event title:</label>
                        <input class="form-control"  name="event_title">
                    </div>


                    <div class="col-md-6 form-group">
                        <label for="spinner">Start date:</label>
                        <input class="form-control" id="date_start" name="date_start">
                    </div>

                    <div class="col-md-6 form-group">
                        <label for="spinner">End date:</label>
                        <input class="form-control" id="date_end" name="date_end">
                    </div>

                    <div class="col-md-6 form-group">
                        <label for="spinner">Start time:</label>
                        <input class="form-control" id="spinner_start" name="time_start" value="08:30 PM">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="spinner">End time:</label>
                        <input class="form-control" id="spinner_end" name="time_end" value="08:30 PM">
                    </div>


                    <div class="col-md-12 form-group">
                        <label >Upload image:</label>
                        <input type="file" class="form-control"  name="cover">
                    </div>


                    <div class="col-md-12 form-group">
                        <label >Event description:</label>
                        <textarea class="form-control"  name="event_description"></textarea>
                    </div>


                    <div class="col-md-4 form-group  pull-right" >

                       <button class="btn btn-primary btn-block">Send</button>
                    </div>
                </form>





                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

