function restore(){
  $("#record, #live").removeClass("disabled");
  $("#pause").replaceWith('<a class="button one" id="pause">Pause</a>');
  $(".one").addClass("disabled");
  Fr.voice.stop();
}



$(document).ready(function(){
  $(document).on("click", "#record:not(.disabled)", function(){
    Fr.voice.record($("#live").is(":checked"), function(){
      $(".recordButton").addClass("disabled");

      $("#live").addClass("disabled");
      $(".one").removeClass("disabled");

    });
  });

  $(document).on("click", "#recordFor5:not(.disabled)", function(){
    Fr.voice.record($("#live").is(":checked"), function(){
      $(".recordButton").addClass("disabled");

      $("#live").addClass("disabled");
      $(".one").removeClass("disabled");


    });

    Fr.voice.stopRecordingAfter(5000, function(){
      alert("Recording stopped after 5 seconds");
    });
  });

  $(document).on("click", "#pause:not(.disabled)", function(){
    if($(this).hasClass("resume")){
      Fr.voice.resume();
      $(this).replaceWith('<a class="button one" id="pause">Pause</a>');
    }else{
      Fr.voice.pause();
      $(this).replaceWith('<a class="button one resume" id="pause">Resume</a>');
    }
  });

  $(document).on("click", "#stop:not(.disabled)", function(){
    restore();
  });

  $(document).on("click", "#play:not(.disabled)", function(){
    Fr.voice.export(function(url){
      $("#audio").attr("src", url);
      $("#audio")[0].play();
    }, "URL");
    restore();
  });

  $(document).on("click", "#download:not(.disabled)", function(){
    Fr.voice.export(function(url){
      $("<a href='"+url+"' download='MyRecording.wav'></a>")[0].click();
    }, "URL");
    restore();
  });
URLA = null;
  $(document).on("click", "#base64:not(.disabled)", function(){
    Fr.voice.export(function(url){
        URLA = url;

       $('#audio').attr('src',url);
      $("<a href='"+ url +"' target='_blank'></a>")[0].click();
    }, "base64");
    restore();
  });

    $('.forum_send').on('click',function(){
        if(!FRM.loginWindow()){return false}

        $('input[name="id"]').val($('.new_comment').data('th'));
        $('input[name="aud"]').val(URLA);
        $.ajax({
            type:"POST",
            url:BASE_URL+'forum/new_comment',
            data:$('.nk').serialize(),
            success:function(){
                window.location.href = window.location.href  ;
            }
        });

    });

  $(document).on("click", "#mp3:not(.disabled)", function(){
    alert("The conversion to MP3 will take some time (even 10 minutes), so please wait....");
    Fr.voice.export(function(url){
      console.log("Here is the MP3 URL : " + url);
      alert("Check the web console for the URL");

      $("<a href='"+ url +"' target='_blank'></a>")[0].click();
    }, "mp3");
    restore();
  });

  $(document).on("click", "#save:not(.disabled)", function(){
    Fr.voice.export(function(blob){
      var formData = new FormData();
      formData.append('file', blob);

      $.ajax({
        url: BASE_URL+"forum/audio",
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(url) {
          $("#audio").attr("src", url);
          $("#audio")[0].play();
          alert("Saved In Server. See audio element's src for URL");
        }
      });
    }, "blob");
    restore();
  });
});
