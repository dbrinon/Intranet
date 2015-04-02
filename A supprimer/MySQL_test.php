<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_MySQL_test = "localhost";
$database_MySQL_test = "test";
$username_MySQL_test = "root";
$password_MySQL_test = "";
$MySQL_test = mysql_pconnect($hostname_MySQL_test, $username_MySQL_test, $password_MySQL_test) or trigger_error(mysql_error(),E_USER_ERROR); 
?>