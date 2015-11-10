$(document).ready(function() {
	//variable to keep all responses.
	var responses ;
	var responserow = {} ; // each question response
	var recentrow = {} ; // last saved row
	var numconstructs = $('.constructbox').children().length ;
	var numquestions = $('.cardbox').children().length ;
	var currentindex = $('.cardboxholder').children(":first").attr("id") ;
	var nextindex  ;

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$('.currenttitle').text("Card 1 of " + numquestions) ;

	$('.constructs').tooltip(); 

	//BInd left and right arrow keys to prev and next button
	$(document).keydown(function(e) {
		switch(e.which) {
		case 37: // left
			$('.previousbutton').first().click();
			break;

		case 39: // right
			$('.nextbutton').first().click();
			break;

		default: return; // exit this handler for other keys
		}
		e.preventDefault(); // prevent the default action (scroll / move caret)
	});


	// Display the first train data
	$('.cardboxholder').html($('.cardbox').children(":first").html());
	UpdateProgressBar(1); 


	$.ajax({
		url: "loaddata",
		data: {type : "train"},
		context: document.body
	}).done(function(data) {
		$("#response").fadeOut("fast").fadeIn("fast"); 
		$("#response").html("Saved data has been loaded from database.") ;
		row = JSON.parse(data);   
		//console.log(data); 
		responserow = row ; 
		currentindex = $('.cardboxholder').children(":first").attr("id") ;
		dbid = $('.cardbox').find('#'+currentindex).attr("dbid") ;
		//console.log(JSON.stringify(responserow[dbid]))
		loadState(currentindex, dbid) ;   
	});
	// fetch state from database


	//On next button Click
	$('.previousbutton').on('click', function () {
		currentindex = $('.cardboxholder').children(":first").attr("id") ;
		dbid = $('.cardboxholder').children(":first").attr("dbid") ;
		nextindex = (currentindex *1 - 1) ;		
		saveCurrentState(currentindex,  dbid) ; 
		UpdateCard(nextindex);			
	});

	//On next button click 
	$('.nextbutton').on('click', function () {
		currentindex = $('.cardboxholder').children(":first").attr("id") ;
		dbid = $('.cardboxholder').children(":first").attr("dbid") ;
		nextindex = (currentindex *1 + 1) ; 
		saveCurrentState(currentindex, dbid);	
		UpdateCard(nextindex);
	});

	function UpdateProgressBar(nextindex){
		//Update progress status bar
		var perc = (nextindex/numquestions) * 100 ;
		//console.log(nextindex +  " perce " + perc);
		$("#progressstatus").width( perc + "%"  );
	}

	function UpdateCard(nextindex){
		if ($('.cardbox').find('#'+nextindex).length > 0){		
			$('.currenttitle').text("Card " + nextindex + " of " + numquestions) ;			
			$('.cardboxholder').html($('.cardbox').find('#'+nextindex).parent().html());
			$('.cardboxholder').hide();
			$('.cardboxholder').fadeIn( "slow", function() {});
			//currentindex = nextindex ;
			dbid = $('.cardbox').find('#'+nextindex).attr("dbid") ;
			loadState(nextindex, dbid) ;
			UpdateProgressBar(nextindex)

		}
	}

	function saveCurrentState(index, dbid){
		var state = "" ; var stateconc = "bb" ; var stateholder = [];
		$('.constructbox').children().each(function () { 	
			var currentcheckbox =  $(this).find('input') ;		 
			if (currentcheckbox.is(':checked') ){
				state = "1" ;
			}else {
				state = "0" ;
			}		 
			stateholder.push({ "id":  currentcheckbox.attr("dbid")  , "state":  state }) ; 
			//console.log(currentcheckbox.attr("dbid") + " : " + state); 
		});	 
		responserow[dbid] = stateholder ;
		recentrow = {} ; recentrow[dbid] = stateholder ; // keep the last record here so we can save only this 
		saveToDB(recentrow) ;
	}

	function saveToDB(data){
		//console.log(JSON.stringify(data));
		$("#response").html("Saving to database ..") ;
		//alert();
		$.ajax({
			url: "savedata",
			method: "POST",
			data: { responsedata : JSON.stringify(data) , responsetype : "train"},
			context: document.body
		}).done(function(data) {
			$("#response").html("Response for <span class='cardresponse'> Card " + currentindex + " </span> has been saved to database." );
			//$("#response").html(data);
		});


	}

	function loadState(index, dbid){
		//	alert($('.constructbox').children(':nth-child(2)').html());
		if (typeof responserow[dbid] == "undefined" ){
			//console.log("Nothing to load - " + " - " + index );
			// Reset the check boxes
			$('.constructbox').find('input').prop('checked', false); 
		}else {
			//load values
			values = responserow[dbid];
			//console.log("Loading  " + values[2].id + " - " + dbid);
			for (var i = 0; i < values.length; i++) {
				//console.log (values[i].id + " - " + values[i].state);
				if (values[i].state == 1){
					$('.constructbox').find("input[dbid='" + values[i].id + "']").prop('checked', true) ;
				}else {
					$('.constructbox').find("input[dbid='" + values[i].id + "']").prop('checked', false) ;
				}
			}
		}
	}


});