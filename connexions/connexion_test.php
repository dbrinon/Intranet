<?php
	$uid='root';
	$pwd='';
	$bdd = new PDO('mysql:host=localhost;dbname=test', $uid, $pwd)
		or die("Impossible de se connecter � la base TEST");
?>