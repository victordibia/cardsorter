
$(document).ready(function() {
    //variable to keep all responses.
	var responses ;
	var responserow = {} ; // each question response
	var recentrow = {} ; // last saved row
	var numconstructs = $('.constructbox').children().length ;
	var numquestions = $('.cardbox').children().length ;
	var currentindex = $('.cardboxholder').children(":first").attr("id") ;
	var nextindex  ;
		
	//alert(numquestions) ;
	 
    $('.currenttitle').text("Card 1 of " + numquestions) ;
	
	$('.constructs').tooltip(); 
	
	
	// Display the first train data
	$('.cardboxholder').html($('.cardbox').children(":first").html());
	UpdateProgressBar(1); 
	// fetch state from database
	 
	$.post( "loaddata.php", { type : "train" } )
		  .done(function( data ) {
			$("#response").fadeOut("fast").fadeIn("fast"); 
			$("#response").html("Saved data has been loaded from database.") ;
			row = JSON.parse(data);   
			//console.log(JSON.stringify(row)); 
			responserow = row ; 
         	currentindex = $('.cardboxholder').children(":first").attr("id") ;
			dbid = $('.cardbox').find('#'+currentindex).attr("dbid") ;
			//console.log(JSON.stringify(responserow[dbid]))
			loadState(currentindex, dbid) ;
 	}); 
	
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
		$.post( "savedata.php", { responsedata : JSON.stringify(data) , type : "train" } )
		  .done(function( data ) {
			//console.log( "Data Loaded: " + data );
			$("#response").html("Response for <span class='cardresponse'> Card " + currentindex + " </span> has been saved to database." );
			//alert();
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
	
	//iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });
});