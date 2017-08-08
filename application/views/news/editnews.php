<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
    $(function(){
    $('[name="edit_category"]').find('option[value="<?=$news[0]->category_id?>"]').attr('selected','selected');
        tinymce.init({
            selector: 'textarea#tiy',
            height: 200,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table contextmenu paste code'
            ],
            toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image'

        });

    });

</script>
<div class="col-md-12 mgb20">
<div class="col-md-12 white_block">

                    <form  action="<?=base_url()?>admin/edit_news" method="post" enctype="multipart/form-data">
                        <div class="col-md-12 form-group">
                            <label >News title:</label>
                            <input class="form-control" value="<?=$news[0]->title?>" name="edit_title">
                        </div>

                        <div class="col-md-12 form-group">
                            <label>Select category:</label>
                            <select name="edit_category" class="form-control">
                                <option value="2">В мире</option>
                                <option value="3">На дороге</option>
                                <option value="4">Вопросы-ответы</option>
                            </select>
                        </div>




                        <div class="col-md-12 form-group ">
                            <label >News description:</label>
                            <textarea  id="tiy"  name="edit_description"><?=$news[0]->description?></textarea>
                        </div>


                        <div class="col-md-4 form-group  pull-right" >
                            <input type="hidden"  value="<?=$news[0]->id?>" name="edit_id">
                            <button class="btn btn-primary btn-block">Send</button>
                        </div>
                    </form>

</div>
</div>