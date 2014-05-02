<?php

//rename this file to conncardsorter.php 
//modify database parameters as suitable.

# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_conncardsorter = "localhost";
$database_conncardsorter = "cardsorter";
$username_conncardsorter = "root";
$password_conncardsorter = "";
$conncardsorter = mysql_pconnect($hostname_conncardsorter, $username_conncardsorter, $password_conncardsorter) or trigger_error(mysql_error(),E_USER_ERROR); 
?>