<table class="table table-hover">
<?
$type_arr = [
    '.jpg',
    '.jpeg',
    '.png',
    '.JPEG',
    '.JPG'
];
?>
<?php foreach($docs as $doc){?>

    <tr>
        <td><?=$doc->att_name?></td>
        <td>
            <div class="btn btn-group btn-group-xs pull-right">
                <?if(in_array($doc->type,$type_arr)){?>
                    <a target="_blank" class="btn btn-primary" href="http://stassociation.com/file/<?=$doc->name_code.$doc->type?>"><i class="fa fa-external-link" aria-hidden="true"></i> Open document</a>
                <?}else{?>
                <a target="_blank" class="btn btn-primary" href="https://docs.google.com/viewerng/viewer?url=http://stassociation.com/file/<?=$doc->name_code.$doc->type?>"><i class="fa fa-external-link" aria-hidden="true"></i> Open document</a>
                <?}?>
            </div>
        </td>
    </tr>

<?}?>
</table>