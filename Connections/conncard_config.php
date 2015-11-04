<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_conncard = "localhost";
$database_conncard = "cardsorter";
$username_conncard = "root";
$password_conncard = "";
$conncard = mysql_pconnect($hostname_conncard, $username_conncard, $password_conncard) or trigger_error(mysql_error(),E_USER_ERROR); 
?>