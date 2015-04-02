<?php 
	session_start();
	$services=array('INFO');//Liste des services authorisés à se connecter à cette page
	//include('connexions/verif_login.php');
?>
<!DOCTYPE html>
<html >
	<head>
         <title>Page des tests en PHP</title>
          <!-- <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" /> 
		  NE PAS encoder en UTF-8 ! Le serveur apache est réglé en iso-8859-1.
		  Les pages .php doivent etre encodés en iso-8859-1   -->
		 <meta name="author" content="Service Informatique" />
		 <meta http-equiv="Content-Language" content="fr" />
		 <!-- CSS déclaré ci-après -->
		 <link rel="stylesheet" media="screen" type="text/css" title="style du tchat" href="tchat.css" />
		 <!-- ICONE latty dans l'entête de l'adresse -->
	</head>
	<body> 
			<h1 align="center">Petite page pour tester les connexions aux différentes bases de données.</h1><br/>
            <p><a href="test.php">Retour</a></p>
            <form method="post" action="test_connexions.php">

                <p><?php $liste_connexions=array('MySQL local','MySQL sur SBAD','SQL sur SBAD','SQL sur Lotus','SQL sur Lotus, via COM','SQL sur SRV28160S' );?>
                	<label for="connexions">Connexion à  tester: </label><br />
                    	<select name="connexions" id="connexions">
                        	<option>- - - - -</option>
                          	<option value="connexion_mysql_local.php"><?php echo $liste_connexions[0] ?></option>
                          	<option value="connexion_mysql_sbad.php"><?php echo $liste_connexions[1] ?></option>
                          	<option value="connexion_sql_sbad.php"><?php echo $liste_connexions[2] ?></option>
                          	<option value="connexion_sql_lotus.php"><?php echo $liste_connexions[3] ?></option>
                          	<option value="connexion_sql_lotus_viaCOM.php"><?php echo $liste_connexions[4] ?></option>
                            <option value="connexion_srv28160s.php"><?php echo $liste_connexions[5] ?></option>
                  		</select>
                    <input type="submit" value=" Go "><br>
                 	<?php if (isset($_POST['connexions']) and $_POST['connexions']!="")
							{
								$co_a_tester=$_POST['connexions'];
								include('connexions/'.$co_a_tester);
								if($bdd == FALSE)
									$resultat_connexion =  "Connexion impossible <br />";
								else
									$resultat_connexion =  "<strong>Connexion réussi! </strong><br />";
							}
							else	$resultat_connexion="<em>En attente de choix</em><br />";	
					?>
                 <em><?php echo $resultat_connexion ?></em>
                </p>
            
            test de requete SQL sur:<br>
            <input name="serveur" type="radio" value="srv28160s" checked id="srv28160s"><label for="srv28160s">SRV28160S1</label><br>
            <input name="serveur" type="radio" value="mysql" id="mysql"><label for="mysql">Mysql Local</label><br>
            <input type="submit" name="extraction" value="extraction" /><br>
            </form>
            
            <?php 
			if (isset($_POST['extraction']) AND $_POST['extraction'] == "extraction" )
				{
					if ($_POST['serveur'] == "srv28160s")
						{
							include("connexions/connexion_srv28160s.php");
							include("requetes/INFO_CA_Mois.php");
							echo (' GL_DATEPIECE, GA_LIBREART1, SUM(GL_MONTANTHT) V0 <br />');
							
							while($donnees = odbc_fetch_array( $requete ) )
								{
									$date=$donnees['GL_DATEPIECE'];
									echo date('d', strtotime($date)).'/'.date('m', strtotime($date)).'/'.date('y', strtotime($date)).' - '.$donnees['GA_LIBREART1']." - ".$donnees['V0'].'<br />';
									//date('d', strtotime($date)).'/'.date('m', strtotime($date)).'\\'.date('y', strtotime($date)).'\\'.
								}  
							odbc_close($bdd);
						}
						
					if ($_POST['serveur'] == "mysql")
						{
							include("connexions/connexion_test.php");
							$reponse=$bdd->query('SELECT UPPER(nom) AS nom_maj FROM jeux_video');
							while ($donnees = $reponse->fetch())
								{
									echo $donnees['nom_maj'] . '<br />';
								}
							$reponse->closeCursor();
						}
				};

			?>
</body>