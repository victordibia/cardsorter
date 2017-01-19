(function ($) {

  var videostate = [] ;
  $.ajax({
    url: "/data/videos/all/",
    context: document.body
  }).done(function(data) {
    data.forEach(function(obj) {
      // keep state!
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
        url: "/data/videos/delete/" + jQuery(this).attr("id"),
        context: document.body
      }).done(function(data) {
        //$( this ).addClass( "done" );
        showUpdateMessage(data);
      });
    });

    $(".vidbox").click(function(event) {
      id= jQuery(this).attr("id") ;
      //alert(JSON.stringify(videostate[jQuery(this).attr("id")]));
      $('#videotitle').text(videostate[id].title) ;
      $('#videoplayer').attr("src", "/videos/" + videostate[id].videoid + ".mp4")
      var vid = document.getElementById("videoplayer");
      vid.volume = 0.2;
      vid.play();
      //console.log(videostate[id].texttags)
      vid.ontimeupdate = function() {
        //Add healthy food training data tags
        var healthytags = videostate[id].framehealthytags[parseInt(vid.currentTime)].result.images[0];
        var healthyfood = healthytags.classifiers[1].classes[1].score * 100 ;
        var healthyfoodbowl = healthytags.classifiers[1].classes[2].score * 100 ;

        //console.log(healthyfood + " - " + healthyfoodbowl);
        $('#healthyfood').css('width', healthyfood+'%').attr('aria-valuenow', healthyfood);
        $('#healthyfoodbowl').css('width', healthyfoodbowl+'%').attr('aria-valuenow', healthyfoodbowl);

        // Add text extraction tags
        var words = videostate[id].texttags[parseInt(vid.currentTime)].result.images[0].words;
        var tagdivs = "<span class='taglabel  bg-yellow'><i class='fa fa-flag-o'></i></span>"
        words.forEach(function(obj) {
          tagdivs = tagdivs + "<div class='tagframe'> " + obj.word + "</div>"
        });
        $(".tagbox").html(tagdivs);
        //console.log(tagdivs)
        //$("#tagtime").text( parseInt(vid.currentTime  / 60) + " : " + parseInt(vid.currentTime) );
      };

      vid.onended = function(event){
        console.log(event);
        var verdict = "<span class='bg-yellow watsonsverdict'> Watsons Verdict : <strong>UNHEALTHY! </strong> </span>"
        $(".verdictbox").html(verdict);
      }
      $('#videomodal').modal({
        show: true
      })
    });

    $('#videomodal').on('hidden.bs.modal', function () {
      var vid = document.getElementById("videoplayer");
      vid.pause();
    });

  });

function showUpdateMessage(message){
  $("#updatemessage p").text(message) ;
  $("#updatemessage").css('opacity', 0)
  .slideDown('slow')
  .animate(
    { opacity: 1 },
    { queue: false, duration: 'slow' }
  ).delay( 1000 )
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
