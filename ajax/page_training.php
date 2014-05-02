<?php require_once('../Connections/conncardsorter.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_conncardsorter, $conncardsorter);
$query_rsconstructs = "SELECT * FROM constructs";
$rsconstructs = mysql_query($query_rsconstructs, $conncardsorter) or die(mysql_error());
$row_rsconstructs = mysql_fetch_assoc($rsconstructs);
$totalRows_rsconstructs = mysql_num_rows($rsconstructs);

mysql_select_db($database_conncardsorter, $conncardsorter);
$query_rstraindata = "SELECT * FROM traintable";
$rstraindata = mysql_query($query_rstraindata, $conncardsorter) or die(mysql_error());
$row_rstraindata = mysql_fetch_assoc($rstraindata);
$totalRows_rstraindata = mysql_num_rows($rstraindata);
?>
<div class="row">
	<div id="breadcrumb" class="col-md-12">
		<ol class="breadcrumb">
			<li><a href="index.html">Dashboard</a></li>
			<li><a href="#">Pages</a></li>
			<li><a href="#">Training Exercise </a></li>
		</ol>
	</div>
</div>


<div class="row">
	<div class=" cardboxholder col-xs-12">
	sdf
	</div>
</div>    
<div class="row cardbox" style="display:none;">
  <?php
  $i = 1 ;
   do { ?>
   
    <div class="col-xs-12 carditem" >
      <div class="whitepadded " id="<?php echo $i; ?>">
        <div class=" ">
          <div class="bg-default whitepadded">
             <strong><?php echo "[ Card  ".$i." of ". ($totalRows_rstraindata ) . " ]  " . $row_rstraindata['title']; ?> </strong> 
            </div>
          <div class="no-move"></div>
          </div>
        <div class="" style="padding:15px">
          <div class="row-fluid centered">
             <?php echo $row_rstraindata['description']; ?>  
            </div><br />
          
          
          </div>
        </div><br />
      
      
      
      </div>
    <?php $i++ ; } while ($row_rstraindata = mysql_fetch_assoc($rstraindata)); ?>
</div>

<div class="col-xs-12 row-fluid whitepadded" style="border-bottom:1px solid #CCC;">
                
					<div class="col-sm-12 constructbox" >
						
<?php 
$groupname = "" ;
$colorindex = 0 ;
$colors = array("#FF0000","#FF7F00","#FFFF00","#7FFF00","#00FFFF"," #007FFF"," #0000FF","#7F00FF"," #FF0000") ;
do { 

?>

<?php if ($groupname != $row_rsconstructs['constructgroup']) { 
$groupname = $row_rsconstructs['constructgroup'] ;
$colorindex =($colorindex + 1) % count($colors) ;

?>

<?php } ?>

<div class="radio col-sm-3" style="border-bottom:5px solid <?php echo $colors[$colorindex] ;?>; padding-bottom:10px; margin-right:0px;" >
					    
						   <div  > 
                           <label class="constructs" data-placement="top"   data-toggle="tooltip"  title="<?php echo $row_rsconstructs['description']; ?>">
						      <input type="radio" name="<?php echo $row_rsconstructs['constructgroup']; ?>" > <?php echo $row_rsconstructs['title']; ?>
						      <i class="fa fa-circle-o"></i>
					      </label>
                          </div>
                           
				        </div> 
                       
						  <?php } while ($row_rsconstructs = mysql_fetch_assoc($rsconstructs)); ?>
					</div>
</div>
<br />
<br />

<div class="col-xs-12   whitepadded" style="">
					<div class="col-xs-12">
					  <div class=" ">
					    <div class=" ">
						  <div class="col-sm-4">
                           <a   class="previousbutton" style="cursor:pointer" >
                         <p class="page-header"><strong><i class="fa fa-angle-double-left"></i> Previous </strong> </p>
                         </a>
                          </div>
	          <div class="col-sm-4" align="center">
                           </div>
                          <div class="col-sm-4" align="right">
                          <a   class="nextbutton" style="cursor:pointer" >
                          <p class="page-header"><strong>Next </strong> <i class="fa fa-angle-double-right"></i></p>
                          </a>
                          </div>
	          <div class="clearfix"></div>
								 
					    </div>
					  </div>
					</div>
</div>
                

                
<?php
mysql_free_result($rsconstructs);

mysql_free_result($rstraindata);
?>


<script type="text/javascript">
// Run Select2 plugin on elements
function DemoSelect2(){
	$('#s2_with_tag').select2({placeholder: "Select OS"});
	$('#s2_country').select2();
}
// Run timepicker
function DemoTimePicker(){
	$('#input_time').timepicker({setDate: new Date()});
}
$(document).ready(function() {
    //variable to keep all responses.
	var responses ;
	var responserow = [] ; // each question response
	var numconstructs = $('.constructbox').children().length ;
	var numquestions = $('.cardbox').children().length ;
	var currentindex = $('.cardboxholder').children(":first").attr("id") ;
	var nextindex  ;
		
	//alert(numquestions) ;
	 
    
	$('.constructs').tooltip(); 
	
	// Display the first train data
	$('.cardboxholder').html($('.cardbox').children(":first").html());
	 
	
	//On next button Click
	$('.previousbutton').on('click', function () {
		currentindex = $('.cardboxholder').children(":first").attr("id") ;
		nextindex = (currentindex *1 - 1) ;		
		saveCurrentState(currentindex) ;
		//alert($('.cardbox').find('#'+nextindex).length) ;
		if ($('.cardbox').find('#'+nextindex).length > 0){
			$('.cardboxholder').html($('.cardbox').find('#'+nextindex).parent().html());
			$('.cardboxholder').hide();
			$('.cardboxholder').fadeIn( "slow", function() {});
			loadState(nextindex) ;	
		}
			
	});
	
	//On next button click 
	$('.nextbutton').on('click', function () {
		currentindex = $('.cardboxholder').children(":first").attr("id") ;
		nextindex = (currentindex *1 + 1) ;
		//Save state
		saveCurrentState(currentindex);	
		//alert(nextindex) ;
		if ($('.cardbox').find('#'+nextindex).length > 0){
					
			$('.cardboxholder').html($('.cardbox').find('#'+nextindex).parent().html());
			$('.cardboxholder').hide();
			$('.cardboxholder').fadeIn( "slow", function() {});
			currentindex = nextindex ;
			loadState(nextindex) ;
		}
		
	});
	function saveCurrentState(index){
		var state = "" ;
		$('.constructbox').children().each(function () { 			 
			if ( $(this).find('input').is(':checked') ){
				state += "1" ;
			}else {
			    state += "0" ;
			}
		});
		//alert ( index + " - " + state ) ;
		responserow[index] = state ;
		console.log("Saving to spot " + index + " - " + state);
     }
	 
	function loadState(index){
      //	alert($('.constructbox').children(':nth-child(2)').html());
		if (typeof responserow[index] == "undefined" ){
			console.log("Nothing to load - " + " - " + index );
			// Reset the radio buttons
			$('.constructbox').find('input').prop('checked', false); 			
		}else {
			//load the values
			console.log("Loading  " + responserow[index] + " - " + index);
			//alert(responserow[index].length);	
			for (var i=1; i < responserow[index].length +1; i++) {
				//alert("Char at " + i + " = " + responserow[index].charAt(i - 1) + " \n" + $('.constructbox').find(':nth-child(' + i + ')').html() );
				if ( responserow[index].charAt(i-1) == "1" ){
					//$(this).find('input:nth-child(' + i + ')').prop('checked', true) ; 
					$('.constructbox').children(':nth-child(' + i + ')').find('input').prop('checked', true) ; 
					//console.log("1"  );
				}else {
				  $('.constructbox').children(':nth-child(' + i + ')').find('input').prop('checked', false) ;
				}
			} 
		}
	}
});
</script>
