<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_donnees = "127.0.0.1";
$database_donnees = "donnees";
$username_donnees = "root";
$password_donnees = "";
$donnees = mysql_pconnect($hostname_donnees, $username_donnees, $password_donnees) or trigger_error(mysql_error(),E_USER_ERROR); 
?>