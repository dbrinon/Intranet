<head><SCRIPT LANGUAGE='JavaScript'>
<!--
function redirect() 
{
window.location='<?echo "$_GET[nom]";?>.html' // page ou vous voulez que l'internaute soit redirig�
}
setTimeout('redirect()',5000); // delai en millisecondes - soit ici 5 secondes.
-->
//Ce script permet d'etre rediriger (apres un certain temps ici 5 secondes mais 1 suffit) vers la page qui va etre cr�e
</SCRIPT>
 
<?php
// Simple function to write text file
function writeTextFile($fileName,$text) 
{
    $session = fopen($fileName,"a+");
    fputs($session,$text);
    fclose($session);
}
 
ob_start(); // D�but de l'enregistrement
 
//---
// Le script PHP qui retrounera les
// donn�es HTML qui vous int�ressent.
//---?>
<? //	CHRONOMETRE
// On r�cup�re la date au lancement de la page
$temps = microtime();
$temps = explode(' ', $temps);
$debut = $temps[1] + $temps[0];
//	CHRONOMETRE?>
 
 
INSEREZ ICI VOTRE PAGE PHP AVEC LES BALISES SQL, PHP ET HTML 
IL S'AGIT DE LA PAGE SOURCE !!!
 
 
 
<? //CHRONOMETRE
// On r�cup�re la date de fin d'ex�cution du script
$temps = microtime();
$temps = explode(' ', $temps);
$fin = $temps[1] + $temps[0];
 
// On affiche la diff�rence entre des deux valeurs
echo 'Page ex�cut�e en '.round(($fin - $debut),6).' secondes.';
// CHRONOMETRE?>
</div>
</div>
 
<? $content = ob_get_contents(); // Fin de l'enregistrement
// Sauvegarder ma page dans un fichier html
writeTextFile("$_GET[nom].html",$content);
?></body>
</html>