<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>


<script>
    $(function(){
        tinymce.init({
            selector: 'textarea#add',
            height: 200,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table contextmenu paste code'
            ],
            toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image'

        });



        $('.delete_news').on('click',function(){
            $.ajax({
                url:'<?=base_url()?>admin/del_news',
                method:'POST',
                data:'i='+$(this).data('id'),
                success:location.reload()
            });
        });
    });
</script>

<div class="col-md-12 mgb20">
    <div class="col-md-12 white_block">
        <div class="col-md-12 mgb10">
            <div class="col-md-12 adm_info"><i class="fa fa-newspaper-o" aria-hidden="true"></i> Manage news:
                <div class="btn btn-success pull-right" data-toggle="modal" data-target="#add_news"><i class="fa fa-plus" aria-hidden="true"></i> Add News</div>
            </div>
            <table class="table table-hover">
                <thead>
                <th colspan="2">Title</th>
                <th colspan="2">Added</th>
                </thead>
                <?foreach($news as $page){?>
                    <tr>
                        <td><b><?=$page->id?></b></td>
                        <td><b><?=$page->title?></b></td>
                        <td><?=date('l jS \of F Y h:i:s A', (int)$page->added)?></td>
                        <td><a target="_blank" href="<?=base_url()?>admin/editnews/<?=$page->id?>" data-toggle="modal" class="btn btn-success "><i class="fa fa-edit no-ico"></i></a>
                        <div data-id="<?=$page->id?>"  class="btn btn-danger delete_news"><i class="fa fa-trash no-ico"></i></div></td>
                    </tr>
                <?}?>

            </table>

        </div>
    </div>
</div>



<div id="add_news" class="modal fade " role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add news </h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid  pad0">


                    <form  action="<?=base_url()?>admin/add_news" method="post" enctype="multipart/form-data">
                        <div class="col-md-12 form-group">
                            <label >News title:</label>
                            <input class="form-control"  name="news_title">
                        </div>

                        <div class="col-md-12 form-group">
                            <label>Select category:</label>
                            <select name="news_category" class="form-control">

                                <option value="2">В мире</option>
                                <option value="3">На дороге</option>
                                <option value="4">Вопросы-ответы</option>
                            </select>
                        </div>


                        <div class="col-md-12 form-group">
                            <label >Upload title cover:</label>
                            <input type="file" class="form-control"  name="cover">
                        </div>


                        <div class="col-md-12 form-group ">
                            <label >News description:</label>
                            <textarea  id="add"  name="news_description"></textarea>
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

