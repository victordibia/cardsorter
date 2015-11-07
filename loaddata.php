<?php include("restrict.php"); ?>
<?php require_once('Connections/conncard.php'); ?>
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

$colname_rsdata = "-1";
$datatype = "train" ;
if (isset($_SESSION['MM_Username'])) {
  $colname_rsdata = $_SESSION['MM_Username'];
}
mysql_select_db($database_conncard, $conncard);
$query_rsdata = sprintf("SELECT * FROM responses WHERE username = %s and datatype = %s ORDER by itemid", 
GetSQLValueString($colname_rsdata, "text"),
GetSQLValueString($datatype, "text"));
$rsdata = mysql_query($query_rsdata, $conncard) or die(mysql_error());
$row_rsdata = mysql_fetch_assoc($rsdata);
$totalRows_rsdata = mysql_num_rows($rsdata);
mysql_select_db($database_conncard, $conncard);
$rowholder = $row_rsdata['itemid'] ;

$arrbb  = new stdClass();
$arrb = array();
do {  
	//echo $row_rsdata['itemid'] . "<br/>" ;
   if ($rowholder == $row_rsdata['itemid']) {
	  // echo $row_rsdata['constructid'] ;
	   $arr = array('id' => $row_rsdata['constructid'], 'state' => $row_rsdata['state']);
	   array_push($arrb, $arr);
   }else {
        //echo "<br/>======= " . $row_rsdata['itemid'] . "===============" ;
		//array_push($arrbb, array( $rowholder => $arrb));
		$arrbb-> $rowholder = $arrb ; 
		// ==============
		$arrb = array();
		$arr = array('id' => $row_rsdata['constructid'], 'state' => $row_rsdata['state']);
	    array_push($arrb, $arr);
		//echo $row_rsdata['constructid'];
		$rowholder = $row_rsdata['itemid'] ;
   }
  
} while ($row_rsdata = mysql_fetch_assoc($rsdata)); 
 $arrbb-> $rowholder = $arrb ; 
echo json_encode($arrbb);

mysql_free_result($rsdata);
?>
