<div class="col-md-12 pad25">
    <?php echo smiley_js(); ?>
    <div class="col-md-8 mgb20 ">
        <div class="col-md-12 pad0">
            <h1 class="forum_h1">Create new discussion</h1>
        </div>
        <div class="app_list_forums">

                <div class="col-md-12  forumborder">

                    <h1 class="forum_header pad10"><i class="fa fa-file-text" aria-hidden="true"></i> New thread</h1>

                    <div class="col-md-8 col-md-push-2">
                        <form method="POST" class="app_new_thread" action="<?=base_url()?>forum/new_thread">
                        <div class="form-group">
                        <label>Header</label>
                        <input class="form-control"  name="title" placeholder="Header">
                        </div>

                        <div class="form-group">
                        <label>Select Subcategory</label>
                        <select class="form-control" name="id">
                            <?foreach($subcats as $sub){?>
                            <option value="<?=$sub->post_id?>"><?=$sub->post_name?></option>
                            <?}?>
                        </select>
                        </div>
                        <div class="form-group">
                            <label>First comment:</label>
                            <textarea class="form-control" name="cm" id="new_comment" rows='7'></textarea>
                        </div>
                        <div class="form-group" >

                            <div  class="btn btn-default forum_smile pad5a no_app"><i class="fa fa-smile-o no-ico "></i></div>
                            <div  class="btn btn-default forum_youtube pad5a no_app" data-toggle="modal" data-target="#youtubeModal"><i class="fa fa-youtube-square no-ico "></i></div>
                            <div  class="btn btn-default forum_link pad5a f18 no_app" data-toggle="modal" data-target="#uploadModal"><i class="fa fa-image no-ico "></i></div>
                            <button type="submit" class="btn btn-primary btn-block no_app">Create</button>
                            <a  class="btn btn-primary btn-block dp_none app_new_thread_btn">Create</a>
                            <div class="smiles_table">
                                <?php echo $smiley_table; ?>
                            </div>
                        </div>
                        </form>

                    </div>
                    </div>

                </div>








    </div>
    <div id="uploadModal" class="modal  fade " role="dialog">
        <div class="modal-dialog  modal-md">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header mgb10">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Upload image</h4>
                </div>
                <div class="container-fluid">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#menu_img1">Add link</a></li>
                        <li><a data-toggle="tab" href="#menu_img2">Upload image</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="menu_img1" class="tab-pane fade in active">
                            <div class="col-md-12 pad5">
                                <div class="form-group">
                                    <label>Insert a link to image:</label>
                                    <input class="form-control image_link">
                                </div>
                                <div class="form-group">
                                    <label>Insert:</label>
                                    <button class="btn btn-primary btn-block insert_link"><i class="fa fa-image f18"></i> Insert</button>
                                </div>
                            </div>
                        </div>

                        <div id="menu_img2" class="tab-pane fade">
                            <div class="col-md-12 pad5">
                                <div class="form-group">
                                    <label>Upload image</label>
                                    <form class="up_img">
                                        <input type="file" class="form-control image_link" name="send_image">
                                    </form>
                                </div>
                                <div class="form-group">
                                    <label>Upload:</label>
                                    <button class="btn btn-primary btn-block upload_link"><i class="fa fa-upload f18"></i> Upload</button>
                                </div>
                            </div>
                        </div>


                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <div id="youtubeModal" class="modal  fade " role="dialog">
        <div class="modal-dialog  modal-sm">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header mgb10">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Insert youtube video</h4>
                </div>
                <div class="container-fluid">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Insert a link to youtube video:</label>
                            <input class="form-control youtube_link">
                        </div>
                        <div class="form-group">
                            <label>Insert:</label>
                            <button class="btn btn-primary btn-block insert_youtube"><i class="fa fa-youtube f18"></i> Insert</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>