(function ($) {

  $.ajax({
    url: "/data/healthytrain/all",
    context: document.body
  }).done(function(data) {
    data.forEach(function(obj) {
      var title = obj.url.substring(obj.url.lastIndexOf("/") + 1, (obj.url.length - 4));
      title = title.substring(0,20);
      var size  =  (obj.size.substring(0, obj.size.length - 2)) * 1;
      sizebgColor = "bg-green" ;
      if (size > 2048 ) {
        sizebgColor = "bg-red" ;
      }
      //console.log(size);

      var imagediv =
      "<div class='col-md-3 '> "
      + "<div class='box box-success box-solid'>"
      + "<div class='box-header with-border'>"
      + "<h3 class='thumb-title'>" + title + "</h3>"
      + "<div class='box-tools pull-right deletebutton' id='" + obj._id + "'><button class='btn btn-box-tool' data-widget='remove' id =" + obj._id+  "'>"
      + "<i class='fa fa-times'></i></button></div>"
      + "</div>"
      + "<div class=''>"
      + "<div ><img class='trainthumb' src='" + obj.thumb + "'> </div>"
      + "<ul class='nav nav-stacked'> <li>"
      + " <a href='#'>File size : <span class='pull-right badge " + sizebgColor + "'>" + obj.size + "</span></a></li> "
      + "</ul>"
      + "</div>"
      + "</div>"
      + "</div>"   ;
      //console.log(imagediv);
      //console.log(obj.subclass );
      if (obj.subclass == "healthyfood"){
        $("#imagerow").append(imagediv) ;
      }else if (obj.subclass == "healthyfoodbowl"){
        $("#foodbowlrow").append(imagediv) ;
      }else if (obj.subclass == "healthybreakfast"){
        $("#breakfastrow").append(imagediv) ;
      }else if (obj.subclass == "unhealthyfood"){
        $("#unhealthyrow").append(imagediv) ;
      }else if (obj.subclass == "healthymeal"){
        $("#healthymealrow").append(imagediv) ;
      }


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
})(jQuery);
