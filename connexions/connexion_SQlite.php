<?php
	$uid='';
	$pwd='';
	//$base = 'C:\Users\dbrinon\Documents\Mes sources de donn�es\SIGNATURES_LOTUS.s3db';
// Connexion
try {
    $bdd = new SQLite3("C:\SIGNATURES_LOTUS.db");
} catch (SQLiteException $e) {
    die("La cr�ation ou l'ouverture de la base [$base] a �chou�e ".
         "pour la raison suivante: ".$e->getMessage());
}

// Inserer ici les requ�tes

// Deconnexion
//$bd = null;	
	if( $bdd === false )
{
     echo "Unable to connect.</br>";
     die( '<pre>'.print_r( sqlsrv_errors(), true).'</pre><br/><p><a href="test_connexions.php">retour</p>');
}
?>
