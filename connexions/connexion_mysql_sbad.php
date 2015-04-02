<?php
	$uid='root';
	$pwd='';
	$bdd = new PDO('mysql:host=192.168.0.4;dbname=donnees', $uid, $pwd)	or die("Impossible de se connecter");
		 if( $bdd === false )
			{
				 echo "Connexion Impossible.</br>";
				 die( '<pre>'.print_r( sqlsrv_errors(), true).'</pre><br/><p><a href="test_connexions.php>retour</p>"');
			}
?>
