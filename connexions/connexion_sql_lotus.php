<?php

//$db = new PDO("DRIVER={IBM DB2 ODBC DRIVER};DATABASE='Personnes_Adresses';", "dbrinon", "dbrinon");
$ServerName='192.168.0.10'; //LNSRV01/LATTY INTERNATIONAL SA
$UserName='David BRINON/BROU/FRANCE/LATTY INTERNATIONAL SA';
$Password='dbrinon';

$DSN='Driver={Lotus Notes SQL Driver (*.nsf)};Database=names.nsf;Server=192.168.0.10;'; //UID=David BRINON/BROU/FRANCE/LATTY INTERNATIONAL SA;PWD=dbrinon;

//$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION; //pour afficher les erreurs
//$bdd = new PDO('odbc:DSN=names.nsf', $UserName, $Password); //Pour connexion PDO
//$bdd = odbc_connect($DSN, 'dbrinon', 'dbrinon'); //FONCTIONNE à condition que l'ID soit en local

try
{
        //$bdd = new PDO('odbc:DSN=names.nsf;host=$ServerName', $UserName, $Password); //Pour connexion PDO
		$bdd = odbc_connect($DSN, 'David BRINON/BROU/FRANCE/LATTY INTERNATIONAL SA', 'dbrinon'); //FONCTIONNE à condition que l'ID soit en local

}
 
catch(Exception $e)
{
        echo 'Erreur : '.$e->getMessage().'<br />';
        echo 'N° : '.$e->getCode();
		die();
}


if( $bdd === false )
	{ echo "Connexion Impossible.</br>";
		 die( '<pre>'.print_r( sqlsrv_errors(), true).'</pre>');
	} 
//pour tester si la co fonctionne et qu' l'on ramene des infos:
 //FONCTIONNE
 
 
 /* TEST 
 
$reponse = odbc_exec($bdd, "SELECT * FROM Personnes\Adresses");
//if (is_array($reponse )) 
if (isset($reponse ))
	{
		echo '<pre>$reponse est bien un objet<pre>';
	};
echo '<pre>'.print_r($reponse ).'<pre>';
odbc_result_all($reponse );
//*/

?>

