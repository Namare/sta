<div class="col-md-12 mgb20" xmlns="http://www.w3.org/1999/html">
    <div class="col-md-12 white_block">
        <div class="col-md-12 mgb10">
            <div class="col-md-12 adm_info"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Professional Service: <div class="btn btn-success pull-right" data-toggle="modal" data-target="#add_user"><i class="fa fa-plus"></i> Add user</div></div>
            <div class="col-md-3 pad0">

                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-filter" aria-hidden="true"></i>  Filter:</div>
                    <div class="panel-body">
                        <div class="form-group">
                        <label>Select professon:</label>
                        <select class="form-control profs">
                            <option disabled selected value="">Select professon</option>
                            <?foreach($profession as $prof){?>
                                <option value="<?=$prof->id?>"><?=$prof->prof_name?></option>
                            <?}?>
                        </select>
                        </div>
                        <div class="form-group">
                        <label>Select state:</label>

                        <select class="form-control states">
                            <option disabled selected value="">Select state</option>
                            <?foreach($states as $state){?>
                            <option value="<?=$state->state_code?>"><?=$state->state?></option>
                            <?}?>
                        </select>
                        </div>
                        <div class="form-group">
                        <label>Select city:</label>
                        <select class="form-control city">
                            <option value="">Select state first</option>
                        </select>
                        </div>


                    </div>
                </div>
            </div>


            <div class="col-md-9">
                <div class="col-md-12  we_rec">
                    <i class="fa fa-spinner fa-pulse fa-3x" aria-hidden="true"></i>

                </div>
            </div>


        </div>
    </div>
</div>




<div id="add_user" class="modal fade " role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add user </h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid  pad0">


                    <form  action="<?=base_url()?>werecommend/add_user" method="post" enctype="multipart/form-data">
                        <div class="col-md-12 form-group">
                            <label >User name:</label>
                            <input class="form-control"  name="user_name">
                        </div>
                        <div class="col-md-12 form-group">
                            <label >User email:</label>
                            <input class="form-control"  name="email">
                        </div>
                        <div class="col-md-12 form-group">
                            <label >User phone:</label>
                            <input class="form-control"  name="phone">
                        </div>
                        <div class="col-md-12 form-group">
                            <label >Details:</label>
                            <input class="form-control"  name="details">
                        </div>

                        <div class="col-md-12 form-group">
                            <label>Select state:</label>
                            <select name="state" class="form-control add_states">
                            <option disabled selected value="">Select state</option>
                            <?foreach($states as $state){?>
                                <option value="<?=$state->state_code?>"><?=$state->state?></option>
                            <?}?>
                            </select>
                        </div>

                        <div class="col-md-12 form-group">
                            <label>Select state:</label>
                            <select name="city" class="form-control add_city">
                            <option disabled selected value="">Select state</option>

                            </select>
                        </div>

                        <div class="col-md-12 form-group">
                            <label>Select profession:</label>
                            <select name="prof" class="form-control">
                                <?foreach($profession as $prof){?>
                                    <option value="<?=$prof->id?>"><?=$prof->prof_name?></option>
                                <?}?>

                            </select>
                        </div>


                        <div class="col-md-12 form-group">
                            <label >Upload avatar:</label>
                            <input type="file" class="form-control"  name="cover">
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




<script>
    $(function(){

        $('.we_rec').load('<?=base_url()?>werecommend/list_user/');

        $('.add_states').on('change',function(){
        $('.add_city').load('<?=base_url()?>werecommend/list_city/'+$('.add_states option:selected').val());
        });

        $('.states').on('change',function(){
            $('.we_rec').html('<i class="fa fa-spinner fa-pulse fa-3x" aria-hidden="true"></i>');

            $('.city').load('<?=base_url()?>werecommend/list_city/'+$('.states option:selected').val());
            $('.we_rec').load('<?=base_url()?>werecommend/list_user/?state='+$('.states option:selected').val()+'&profs='+$('.profs option:selected').val()+'&city='+$('.city option:selected').val());
        });

        $('.profs').on('change',function(){
            $('.we_rec').html('<i class="fa fa-spinner fa-pulse fa-3x" aria-hidden="true"></i>');

            $('.we_rec').load('<?=base_url()?>werecommend/list_user/?state='+$('.states option:selected').val()+'&profs='+$('.profs option:selected').val()+'&city='+$('.city option:selected').val());
        });

        $('.city').on('change',function(){
            $('.we_rec').html('<i class="fa fa-spinner fa-pulse fa-3x" aria-hidden="true"></i>');

            $('.we_rec').load('<?=base_url()?>werecommend/list_user/?state='+$('.states option:selected').val()+'&profs='+$('.profs option:selected').val()+'&city='+$('.city option:selected').val());
        });


        <?if($this->ion_auth->is_admin()){?>
        $('body').on('click','.del_werec',function(){
            $.ajax({
                url:BASE_URL + 'werecommend/del_user',
                method:"POST",
                data:'i='+$(this).data('id'),
                success:window.location.reload()
            });
        });
        $('body').on('click','.lock_rec',function(){
            $.ajax({
                url:BASE_URL + 'werecommend/rec_lock',
                method:"POST",
                data:'i='+$(this).data('id'),
                success:window.location.reload()
            });
        });
        <?}?>
    });
</script>