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
                
					<div class="col-sm-12 constructs" >
						
						<?php do { ?>
					    <div class="radio col-sm-3" >
						    <label class="constructs" data-placement="top"   data-toggle="tooltip"  title="<?php echo $row_rsconstructs['description']; ?>">
						      <input type="radio" name="<?php echo $row_rsconstructs['group']; ?>" > <?php echo $row_rsconstructs['title']; ?>
						      <i class="fa fa-circle-o"></i>
					      </label>
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
 
	$('.constructs').tooltip(); 
	
	// Display the first train data
	$('.cardboxholder').html($('.cardbox').children(":first").html());
	 
	$('.nextbutton').on('click', function () {
		var currentindex = $('.cardboxholder').children(":first").attr("id")
		var nextindex = (currentindex *1 + 1) ;
		//alert(nextindex) ;
		if ($('.cardbox').find('#'+nextindex).length > 0){
			$('.cardboxholder').html($('.cardbox').find('#'+nextindex).parent().html());
			$('.cardboxholder').hide();
			$('.cardboxholder').fadeIn( "slow", function() {});
		}
	});
	
	$('.previousbutton').on('click', function () {
		var currentindex = $('.cardboxholder').children(":first").attr("id")
		var nextindex = (currentindex *1 - 1) ;
		//alert($('.cardbox').find('#'+nextindex).length) ;
		if ($('.cardbox').find('#'+nextindex).length > 0){
			$('.cardboxholder').html($('.cardbox').find('#'+nextindex).parent().html());
			$('.cardboxholder').hide();
			$('.cardboxholder').fadeIn( "slow", function() {});
		}
	});
});
</script>
