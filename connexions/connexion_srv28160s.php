<?php
$server='srv28160s';
$dbase='essai';
$uid='sa';
$pwd='cegid';
	
	try 
		{
			// Connexion à la base de données
			$bdd = odbc_connect("Driver={SQL Server};Server=$server;Database=$dbase;", $uid, $pwd)or die("Impossible de se connecter");
			//$connection = odbc_connect("Driver={SQL Server Native Client 10.0};Server=$server;Database=$database;", $user, $password);
		}
	catch(Exception $e)
		{
			echo 'Erreur : '.$e->getMessage().'<br />';
			echo 'N° : '.$e->getCode();
		}
?>