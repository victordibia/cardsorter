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
?>
<div class="row">
	<div id="breadcrumb" class="col-md-12">
		<ol class="breadcrumb">
			<li><a href="index.html">Dashboard</a></li>
			<li><a href="#">Pages</a></li>
			<li><a href="#">Codes</a></li>
		</ol>
	</div>
</div>

<div class="row">
					<div class="col-xs-12">
					  <div class="box">
					    <div class="box-content">
						  <p class="page-header"><strong>Instructions </strong></p>
								 
						  <p>Each of the boxes below represent a theme. Please read each theme and ensure you understand it carefully . When you have read all themes, you may proceed to try some some card sorting.

					    </p></div>
						</div>
					</div>
				</div>
<div class="row">
	
	<?php do { ?>
	  <div class="col-xs-12 col-sm-4">
	    <div class="box box-pricing">
	      <div class="box-header">
	        <div class="box-name" align="center">
	          <span><strong><?php echo $row_rsconstructs['title']; ?></strong></span>
	          </div>
	        <div class="no-move"></div>
	        </div>
             
	      <div class="box-content no-padding">
	        <div class="row-fluid centered">
	          <div class="col-sm-12"><?php echo $row_rsconstructs['description']; ?></div>
	          
	          </div>
	        <div class="row-fluid bg-default">
	          <div class="col-sm-6"></div>
	          <div class="col-sm-6"></div>
	          <div class="clearfix"></div>
	          </div>
	        </div>
	      </div>
      </div>
	  <?php } while ($row_rsconstructs = mysql_fetch_assoc($rsconstructs)); ?>
</div>
<?php
mysql_free_result($rsconstructs);
?>
