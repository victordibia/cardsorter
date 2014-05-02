<?php require_once('Connections/conncardsorter.php'); ?>
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
$query_rsconstructs = "SELECT constructgroup, title FROM constructs ORDER BY constructgroup";
$rsconstructs = mysql_query($query_rsconstructs, $conncardsorter) or die(mysql_error());
$row_rsconstructs = mysql_fetch_assoc($rsconstructs);
$totalRows_rsconstructs = mysql_num_rows($rsconstructs);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php do { ?>
  <?php echo $row_rsconstructs['constructgroup']; ?> .<?php echo $row_rsconstructs['title']; ?><br />
  <?php } while ($row_rsconstructs = mysql_fetch_assoc($rsconstructs)); ?>
</body>
</html>
<?php
mysql_free_result($rsconstructs);
?>
