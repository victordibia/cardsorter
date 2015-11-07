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

mysql_select_db($database_conncard, $conncard);

?>

<?php 

//echo "data saved!" ;
if(isset($_POST['responsedata'])) {
    $json = json_decode($_POST['responsedata'], true);
	$datatype = $_POST['type'] ;
   // print_r($json) ;
   foreach($json as $rowid => $content) {
    //in here you have the key in $keyName and the value in $value
     // echo $rowid ; //= $value;
	 foreach ($content as $value){
	 	//echo $rowid . " - " . $value["id"].":".$value["state"] . " |  " ;
		//echo ifRecordExists($rowid, $value["id"], $conncard)  ? 'true' : 'false'; 
		
		// if it exists, we update it else we insert it.
		if (ifRecordExists($rowid, $value["id"], $conncard)) {
			 $updateSQL = sprintf("UPDATE responses SET state=%s WHERE username=%s and  itemid  = %s and constructid = %s",
                       GetSQLValueString($value["state"], "int"),
					   GetSQLValueString($_SESSION['MM_Username'], "text"),
					   GetSQLValueString($rowid, "int"),
                       GetSQLValueString($value["id"], "int"));

			  mysql_select_db($database_conncard, $conncard);
			  $Result1 = mysql_query($updateSQL, $conncard) or die(mysql_error());
		}else {
			$insertSQL = sprintf("INSERT INTO responses (username, itemid, constructid,datatype, state) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString( $_SESSION['MM_Username'], "text"),
					   GetSQLValueString($rowid , "int"),
					   GetSQLValueString($value["id"] , "int"),
                       GetSQLValueString($datatype, "text"),
                       GetSQLValueString($value["state"], "int"));
			
			  mysql_select_db($database_conncard, $conncard);
			  $Result1 = mysql_query($insertSQL, $conncard) or die(mysql_error());
		}
	 }
	 echo "\n" ;
   }	
 } else {
    echo "Noooooooob";
 }
 
function ifRecordExists($rowid, $constructid, $conncard){

$query_rsexists = "SELECT * FROM responses WHERE itemid  = " .$rowid." and constructid = " . $constructid . "  and username = '" . $_SESSION['MM_Username'] ."'" ;
//echo $query_rsexists;
$rsexists = mysql_query($query_rsexists, $conncard) or die(mysql_error());
$row_rsexists = mysql_fetch_assoc($rsexists);
$totalRows_rsexists = mysql_num_rows($rsexists);
mysql_free_result($rsexists);

if ($totalRows_rsexists > 0) {
	return true ;
}else {
    return false ;
}
}

 

?>
