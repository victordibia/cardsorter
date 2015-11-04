<?php include("restrict.php"); ?>
<?php 

//echo "data saved!" ;
if(isset($_POST['responsedata'])) {
    $json = json_decode($_POST['responsedata'], true);
   // print_r($json) ;
   foreach($json as $rowid => $content) {
    //in here you have the key in $keyName and the value in $value
     // echo $rowid ; //= $value;
	 foreach ($content as $value){
	 	echo $rowid . " - " . $value["id"].":".$value["state"] . " |  " ;
	 }
	 echo "\n" ;
   }	
 } else {
    echo "Noooooooob";
 }
 
function ifRecordExists(){
	
}

 ?>
