<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: 'textarea',
        height: 400,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table contextmenu paste code'
        ],
        toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        content_css: '//www.tinymce.com/css/codepen.min.css'
    });
</script>

<div class="col-md-12  ">

    <div class="col-md-12  white_block">
        <div class="col-md-12 mgb10">
            <div class="col-md-4 adm_info"><i class="fa fa-cog" aria-hidden="true"></i> <?=$content['header']?></div>
            <div class="col-md-4 pad5">
                <div class="form-group">
                    <button class="btn btn-success save_page"><i class="fa fa-save" aria-hidden="true"></i> Сохранить</button>
                </div>
            </div>
        </div>

        <div class="col-md-12 add_text_area ">
            <div class="form-group">
                <label>Title:</label>
               <input class="form-control" value="<?=$page[0]->title?>" name="title">
            </div>
            <label>Content:</label>
            <textarea name="content"><?=$page[0]->content?></textarea>
        </div>

    </div>
</div>
