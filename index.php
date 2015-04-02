<?php
	session_start();
	$services=array('SECTEURVDS', 'BOC', 'ORDO', 'INFO'); //liste des services autorisés à afficher ce qui suis:
	//include('connexions/verif_login.php');
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php include ("head.html"); ?>
        
        <title>Page (x)HTML de test</title>
    </head>
    <body>

        <?php include ("header.html"); ?>
        <?php include ("nav.html"); ?>
        <?php include ("footer.html"); ?>

        <script type="text/javascript" src="JS/JQuery-mini.js"></script>

    </body>
</html>