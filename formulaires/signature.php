 <form method="post" action="signature.php" name="signature">
 	<fieldset>
 		<legend>Création des signatures HTML: </legend>
         <input type="checkbox" name="Salon" id="Salon" onclick="signature()" />
         	<label for="Salon">Ajouter un bandeau pour un salon (ajouter l'option "image cliquable? entrez le lien ici:")</label> <br/><br/>
         <input type="submit" name="Yapluka" value="Création des signatures" />
     </fieldset>
     <?php
         if (isset($_POST['Yapluka']))
         {
			echo "C'est fait !";
		    $i = "0"; //servira à compter le nombre de boucle du "While". Donc du nombre de signature.
		    include("connexions/connexion_sql_lotus.php"); // création de la connection $bdd
		    include("requetes/INFO_signatures_NAMES.php"); // ramène le resultat de l'execution d'une requete: $reponse
		    //vérification: la requete retourne un objet, et non pas "false" (erreur)
		    if ($reponse === false) {
		        $bdd->close();
		        echo '<p>Le résultat de la requete a retourné FALSE!</p>';
		 }; 
		 {
		        // On affiche chaque entrée une à une
		        while ($donnees = odbc_fetch_array($reponse)) {
		            $testfax = stripos(strtolower($donnees['prenom']), "fax"); // doit être = à false, car pas trouvé
		            $testlatty = stripos(strtolower($donnees['societe']), "latty"); // doit être != à false, car doit êre trouvé
		            if ($testfax === false) {
		                if ($testlatty !== false) {
		                    //CREATION des fichiers html:
		                    ob_start();
		                    include("modele_signature_Lotus.php");
		                    $resultat = ob_get_contents();  //$resulat contient la page HTML générée, et ne contient que du HTML
		                    ob_end_clean();
		                    //Enregistrement de la page HTML
		                    file_put_contents('signatures/' . $donnees['nom'] . '_' . $donnees['prenom'] . '.html', $resultat); //FONCTIONNE
		                    $i = $i + 1;
		                }
		            }
				        }
					        echo '<p>Création de ' . $i . ' fichier  html réussi!</p>';
					        odbc_close($bdd); ?>
					        <div id="visu-sign">  <?php include("signatures/BRINON_David.html"); ?> </div>
					        <?php
					        //$reponse->closecursor();	// si $bdd=lotus
			   			}
			} 
	?>
 </form>
