<?php
	session_start();
	$services=array('SECTEURVDS', 'BOC', 'ORDO', 'INFO'); //liste des services autorisés à afficher ce qui suis:

//récupération des variables du formulaire:
	$login = htmlentities($_POST["login"]); 
	$pass = htmlentities($_POST["pass"]);
	$domaine= htmlentities($_POST["domaine"]);

// initialisation de la connexion au domaine:
	$ds = ldap_connect("$domaine") or exit(">>Could not connect to LDAP server: $domaine<<");

//les "ldap_set_options" sont à intercaler entre ldap_connect et ldap_bind
	ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3); 	//Option à ajouter si LDAP sur Windows server2k3
	ldap_set_option($ds, LDAP_OPT_REFERRALS, 0); 			//Option à ajouter si LDAP sur Windows server2k3

//Identification sur le LDAP
	if (ldap_bind($ds,"$login@$domaine","$pass"))
		{
			ldap_bind($ds,"$login@$domaine","$pass") or die("Connexion impossible"); // connexion avec user et password
			
			// initialisation de la recherche:
				$dn="DC=lattysa,DC=lan";//nom distingué (Distingued Name) du dossier de base: à partir duquel la recherche doit s'effectuer
				$filter = "(|(objectClass=utilisateur)(samaccountname=".$login."))";	//ne pas mettre "user", mais "utilisateur"
				$justthese = array( "memberof","$login","displayName");				// filtre. contient les éléments qui nous interresse

				$sr=ldap_search($ds, $dn, $filter, $justthese);

				$info = ldap_get_entries($ds, $sr);

			//ajout dans $_SESSION de l'array "memberof"(si authorisation par "membre de ") et du login (si authorisation nominal)
			// mettre en minuscule le champ de l'array de la variable $info
				$_SESSION['memberof']=$info[0]['memberof'];
				$_SESSION['login']=$login;
				$_SESSION['displayname']=$info[0]['displayname'][0]; 
	
			ldap_close($ds);
			//penser à "unset" les variables...
			unset($dn,$filter,$sr,$login,$pass,$domain);
		}
		else
		{
			
			header('Location: /test/index.php?erreur=badlogin');
		}
//echo "Le résultat de connexion est  $ds <br />"; // Affichage du résultat de la connexion LDAP



//ce qui suit est à afficher pour des tests:
//*
echo '<br>';
echo "Affichage du contenu de l'array \$info:";
echo '<pre>';
print_r($info);
echo '</pre>';
echo"<br>";

echo "Affichage du contenu de \$_SESSION:<br>";
echo '<pre>';
print_r($_SESSION);
echo '</pre>';
//*/

// fin de la connexion. Il ne reste plus qu'à vérifier si le User est autorisé à accéder à la page.
?>
<?php
include('verif_login.php');
?>
</body>
</html>