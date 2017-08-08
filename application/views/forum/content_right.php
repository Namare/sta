<div class="col-md-4 right_content">
  <div class="col-md-12 right_block pad0">
  <h2 class="right_header">Live</h2>
      <div class="col-md-12 load_feed">

      </div>
  </div>


  <div class="col-md-12 right_block pad0 ">
  <h2 class="right_header">Subforums  </h2>
      <ul class="list-group forum_right_cat">
  <?foreach($posts as $post){?>


      <li class="list-group-item"><a href="<?=base_url()?>forum/view_forum/<?=$post->post_id?>"><?=$post->post_name?></a> <span class="badge"><?=$post->count_cat?></span></li>
  <?}?>
      </ul>
  </div>



  <div class="col-md-12 right_block pad0">
  <h2 class="right_header">Discussion</h2>
      <ul class="list-group forum_right_cat">
  <?foreach($thread as $thr){
      if($thr->title == '')continue;
      ?>

      <li class="list-group-item"><a href="<?=base_url()?>forum/view_thread/<?=$thr->id_thead?>"><?=$thr->title?></a> <span class="badge"><?=$thr->count_com?></span></li>
  <?}?>
      </ul>
  </div>
</div>

<!--Тут Закрывается контейнер форума-->
</div>