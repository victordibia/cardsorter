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
$query_rsdata = sprintf("SELECT * FROM responses WHERE username = %s and datatype = %s", 
GetSQLValueString($colname_rsdata, "text"),
GetSQLValueString($datatype, "text"));
$rsdata = mysql_query($query_rsdata, $conncard) or die(mysql_error());
$row_rsdata = mysql_fetch_assoc($rsdata);
$totalRows_rsdata = mysql_num_rows($rsdata);
mysql_select_db($database_conncard, $conncard);

do {  
   echo $row_rsdata['constructid'];
} while ($row_rsdata = mysql_fetch_assoc($rsdata)); 


mysql_free_result($rsdata);
?>
