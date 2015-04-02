<?php
	$uid='';
	$pwd='';
	//$base = 'C:\Users\dbrinon\Documents\Mes sources de données\SIGNATURES_LOTUS.s3db';
// Connexion
try {
    $bdd = new SQLite3("C:\SIGNATURES_LOTUS.db");
} catch (SQLiteException $e) {
    die("La création ou l'ouverture de la base [$base] a échouée ".
         "pour la raison suivante: ".$e->getMessage());
}

// Inserer ici les requêtes

// Deconnexion
//$bd = null;	
	if( $bdd === false )
{
     echo "Unable to connect.</br>";
     die( '<pre>'.print_r( sqlsrv_errors(), true).'</pre><br/><p><a href="test_connexions.php">retour</p>');
}
?>
