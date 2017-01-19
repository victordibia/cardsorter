(function ($) {
	var pagename =location.pathname.substring(location.pathname.lastIndexOf("/") + 1);

	$( "li.barlink" ).removeClass( "active" )
	if (pagename == "location"){
		$( "#locationlink" ).addClass("active");
	}else if (pagename == "" || pagename == "cogstate" || pagename == "motion" || pagename == "finemotion"){
		$( "#recordlink" ).addClass("active");
	}	else if ( pagename == "annotate" || pagename == "healthvis" || pagename == "celia"){
		$( "#annotatelink" ).addClass("active");
	}	else if ( pagename == "ambience" || pagename == "groupui" ){
		$( "#grouplink" ).addClass("active");
	}else if ( pagename == "serverdoc" || pagename == "androiddoc" ){
		$( "#doclink" ).addClass("active");
	}else if ( pagename == "devices" || pagename == "androiddoc" ){
		$( "#devlink" ).addClass("active");
	}




})(jQuery);
