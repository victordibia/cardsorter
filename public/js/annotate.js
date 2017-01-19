(function ($) {
  var videostate = [] ;
  $("#annotatebox").hide();
  $.ajax({
    url: "/data/videos/all",
    context: document.body
  }).done(function(data) {
    data.forEach(function(obj) {
      console.log(obj)
      videostate[obj._id] = obj;

      var imagediv =
      "<div class='col-md-3 vidbox' id='" + obj._id + "'>"
      + "<div class='box box-success'>"
      + "<div class='box-header with-border'>"
      + "<h3 class='thumb-title'>" + shortenText(obj.title, 20) + "</h3>"
      + "<div class='box-tools pull-right deletebutton' id='" + obj._id + "'><button class='btn btn-box-tool' data-widget='remove' id =" + obj._id+  "'>"
      + "<i class='fa fa-times'></i></button></div>"
      + "</div>"
      + "<div class='box box-widget widget-user-2'>"
      + "<div>"
      + "<div ><img class='trainthumb' src='" + obj.thumb + "'> </div>"
      + "</div>"
      + "<div class='box-footer no-padding'>"
      + "<ul class='nav nav-stacked'> "
      + " <li><a href='#'>Status : <span class='pull-right badge bg-green'>" + "  processed "+ "</span></a></li> "
      + "</ul>"
      + "</div>"
      + "</div>"
      + "</div>"
      + "</div>"   ;

      //console.log(imagediv);
      $("#videorow").append(imagediv) ;

    });

    $(".deletebutton").click(function(event) {
      //alert(  jQuery(this).html());
      //alert(jQuery(this).attr("id"));
      $.ajax({
        url: "/data/healthytrain/delete/" + jQuery(this).attr("id"),
        context: document.body
      }).done(function(data) {
        //showUpdateMessage(data);
      });
    });


    $(".vidbox").click(function(event) {
      id= jQuery(this).attr("id") ;
      $("#annotateframe").html("") ;
      var annotations ;
      var currentannotation ;
      //alert(JSON.stringify(videostate[jQuery(this).attr("id")]));
      $('#videotitle').text(videostate[id].title) ;
      $('#videoplayer').attr("src",  videostate[id].url )
      var vid = document.getElementById("videoplayer");
      vid.volume = 0.2;
      vid.play();
      //console.log(videostate[id].texttags)
      vid.ontimeupdate = function() {
        var progress = Math.round(vid.currentTime / vid.duration * 100) ;
        annotations = videostate[id].annotations ;
        //console.log(annotations[0]);
        currentannotation = annotations[Math.round(vid.currentTime)] ;
        if( currentannotation !== undefined){
          var frametags = ""
          currentannotation.forEach(function(obj){
            frametags = frametags + "<div class='tagframe'> " + obj.text + "</div>"
          })

          $("#annotateframe").html(frametags)
          $("#timebox").text(Math.round(vid.currentTime  / 60) + " : " + Math.round(vid.currentTime) )
        }else {


        }
        $('#vidprogress').css('width', progress+'%').attr('aria-valuenow', progress);

        // //Add healthy food training data tags
        // var healthytags = videostate[id].framehealthytags[parseInt(vid.currentTime)].result.images[0];
        // var healthyfood = healthytags.classifiers[1].classes[1].score * 100 ;
        // var healthyfoodbowl = healthytags.classifiers[1].classes[2].score * 100 ;
        //
        // //console.log(healthyfood + " - " + healthyfoodbowl);
        // $('#healthyfood').css('width', healthyfood+'%').attr('aria-valuenow', healthyfood);
        // $('#healthyfoodbowl').css('width', healthyfoodbowl+'%').attr('aria-valuenow', healthyfoodbowl);
        //
        // // Add text extraction tags
        // var words = videostate[id].texttags[parseInt(vid.currentTime)].result.images[0].words;
        // var tagdivs = "<span class='taglabel  bg-yellow'><i class='fa fa-flag-o'></i></span>"
        // words.forEach(function(obj) {
        //   tagdivs = tagdivs + "<div class='tagframe'> " + obj.word + "</div>"
        // });
        // $(".tagbox").html(tagdivs);
        // //console.log(tagdivs)
        //$("#tagtime").text( parseInt(vid.currentTime  / 60) + " : " + parseInt(vid.currentTime) );
      };

      vid.onpause = function(event){
         var currenttime = Math.round(vid.currentTime) ;
        $("#annotationtime").text("@: " + currenttime);
        $("#annotatebox").fadeIn("slow")
      }

      $('#annotatebox').on('keypress', function (e) {
        var currenttime = Math.round(vid.currentTime) ;
        if(e.which === 13){
          $(this).attr("disabled", "disabled");
          console.log("enter pressed", currentannotation, id )
          var inputannotation = $("#annotateinputbox").val() ;
          if(currentannotation === undefined) {
            videostate[id].annotations[currenttime] = [{text: inputannotation, type : "free"}]
          }else{
            videostate[id].annotations[currenttime].push({text: inputannotation ,type:"free"})
          }

          console.log(videostate[id].annotations)
          $("#annotatebox").fadeOut("slow")
          //vid.play();
        }
      });

      vid.onplay = function(event){
        //console.log( "play ==", vid.currentTime);
        $("#annotatebox").fadeOut("slow")
        $("#annotateinputbox").val("")
      }

      vid.onended = function(event){
        console.log(event);
        // var verdict = "<span class='bg-yellow watsonsverdict'> Watsons Verdict : <strong>UNHEALTHY! </strong> </span>"
        // $(".verdictbox").html(verdict);
      }
      $('#videomodal').modal({
        show: true
      })
    });

    $('#videomodal').on('hidden.bs.modal', function () {
      var vid = document.getElementById("videoplayer");
      vid.pause();
      //alert(JSON.stringify(videostate[id].annotations))
      updateAnnotations(id, videostate[id])
    });



  });


  $(".recordcamera").click(function(event) {

    var thistag = jQuery(this) ;
    var status = thistag.attr("status")  ;
    //alert( thistag.attr("status")  ); //alert(jQuery(this).attr("id"));  // jQuery(this).attr("id")
    cameraid = thistag.attr("id") ;
    command = status == "off" ? "on" : "off" ;
    $.ajax({
      url: "/recordapi/start" ,
      data: { cameraid: cameraid , command: command }
    }).done(function(data) {
      //showUpdateMessage(data);
      status == "off" ? thistag.find('i').attr('class', "fa fa-square redcolor") : thistag.find('i').attr('class', "fa fa-circle");
      status == "off" ? thistag.attr('status', "on") : thistag.attr('status', "off") ;
    });
  });

  function updateAnnotations(videoid, video){
    $.ajax({
      method: "POST",
      url: "/data/videos/annotations/update/" ,
      data: { videoid: videoid , annotations: JSON.stringify(video.annotations), videotitle: video.title }
    }).done(function(data) {
      showUpdateMessage(data);
    });
  }

  function showUpdateMessage(message){
    $("#updatemessage p").text(message) ;
    $("#updatemessage").css('opacity', 0)
    .slideDown('slow')
    .animate(
      { opacity: 1 },
      { queue: false, duration: 'slow' }
    ).delay( 5000 )
    .slideUp('slow')
    .animate(
      { opacity: 1},
      { queue: false, duration: 'slow' }
    )
  }

  function shortenText(text, length){
    if (text.length > length ) {
      text = text.substring(0,length) + " ..." ;
    }
    return text ;
  }

})(jQuery);
