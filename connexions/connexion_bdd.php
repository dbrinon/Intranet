<?php
	$uid='root';
	$pwd='';
	$bdd = new PDO('mysql:host=localhost;dbname=donnees', $uid, $pwd)
		or die("Impossible de se connecter");
		
		 		if( $bdd === false )
{
     echo "Unable to connect.</br>";
     die( '<pre>'.print_r( sqlsrv_errors(), true).'</pre>');
}
?>
