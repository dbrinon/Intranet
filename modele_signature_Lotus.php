<?php 
	
	if($donnees['nom']=='MENARD') echo'<p>Yours faithfully</p>';
	if($donnees['nom']=='GERLACH') echo'<p>mit freundlichen Gr��en</p>';

	//Variables diverses
	$Dimensions ='width="87" height="87"';


	//recherche d'une fonctionen, dans la chaine fonction. Les deux sont séparés par un ";"

			$mystring = $donnees['fonction'];
			$findme =';';
			$pos = strpos($mystring, $findme);
			if ($pos !== false) 
				{
					$fonctionen = substr($mystring, ($pos +1));     // récupère ce qu'il y a APRES le ';'
					$fonction = strstr($mystring, $findme, true); //récupère la fonction AVANT le ';' 
				} 
			else 	
				{
					$fonction = $donnees['fonction'];
					$fonctionen = NULL;
				};
?>
<!DOCTYPE html>

<table border="0" width="575" cellspacing="0" align="left">
	<tr>
		<td rowspan="2" <?php echo $Dimensions; ?> align="center" valign="center">
			
			<?php	
			switch ($donnees["pays"])
				{
					case "FRANCE":
						if ($donnees["societe"]=="LATTY Mecaseal") {echo '<img src="mecaseal.jpg" alt="logo Latty Int." '.$Dimensions.'/>';} 
						elseif ($donnees["societe"]=="LATTY Mecanetanche") {echo '<img src="mecanetanche.jpg" alt="logo Latty Int." '.$Dimensions.'/>';} 
						else {echo'<img /*src="france.jpg"*/ src="95ans.jpg" alt="logo Latty Int." '.$Dimensions.' />';}
							break;
					case "BELGIQUE":
						echo '<img src="belgium.jpg" alt="logo Latty Belgique" '.$Dimensions.'/>';
						break;
					case "SPAIN":
						echo '<img src="iberica.jpg" alt="logo Latty Iberica" '.$Dimensions.'/>';
						break;
					case "UNITED KINGDOM":
						echo '<img src="england.jpg" alt="logo Latty ltd" '.$Dimensions.'/>';
						break;
					case "ARGENTINA":
						echo '<img src="argentina.jpg" alt="logo Latty Argentina" '.$Dimensions.'/>';
						break;
					case "MAROC":
						echo '<img src="maroc.jpg" alt="logo Latty Maroc" '.$Dimensions.'/>';
						break;
					case "GERMANY":
						echo '<img src="deutschland.jpg" alt="logo Latty Deutschland" '.$Dimensions.'/>';
						break;
				}
			?>
				
		</td>
		<td width="250" valign="top">
			<table border="0" cellspacing="0" align="left">
				<tr>
					<td><font face="tahoma" size="2"><b><?php echo ($donnees['prenom'])." "; echo $donnees['nom']; ?></b></font></td>
				</tr>
                <?php if ($donnees['ville']=="WAVRE") echo '<tr><td><font face="tahoma" size="2">&nbsp;</font></td></tr>'; ?>
				<tr>
					<td><font face="tahoma" size="1"><?php echo ($fonction); ?></font></td>
				</tr>
				<?php
					if($fonctionen!="") echo'<tr><td><font face="tahoma" size="1"><i>'.$fonctionen.'</i></font></td></tr>';
				?>
				<tr>
					<td><font face="tahoma" size="1">Tel: <?php echo $donnees['telbureau']; ?></font></td>
				</tr>
				<?php 
					if($donnees['telmobile'] !="") echo '<tr><td><font face="tahoma" size="1">Mobile: '.$donnees['telmobile'].'</font></td></tr>';
				?>
				<tr>
				<?php 
					if($donnees['fax']!="") 
						{	echo '<td><font face="tahoma" size="1">Fax: '.$donnees['fax'].'</font></td>';}
						 elseif ($donnees['nom']=='ANDRE') {echo '<td><font face="tahoma" size="1">Assistante: +33 5 57 30 02 60</font></td>';} //C'est le numéro de Pascale Martin.
						else
						{	echo '<td><font face="tahoma" size="1">Fax:    </font></td>'; }
				?>
					
				</tr>
				<tr>
				<?php
					if($donnees['email']!="") 
					echo'<td><font face="tahoma" size="1">Email: <a href="mailto:'.$donnees['email'].'?subject=Renseignement">'.$donnees['email'].'</a></font></td>'
				?>
				</tr>
			</table>
		</td>
		<td width="218" valign="top">
			<table border="0" width="218" cellspacing="0px">
				<tr>
					<td><font face="tahoma" size="2"><b><?php echo $donnees['nom_agence_filiale'];?></b></font></td>
				</tr>
				<tr>
					<td><font face="tahoma" size="1">
							<?php echo htmlentities($donnees['rue']);?>
                         </font></td>
                </tr> 			
				<tr>
					<td><font face="tahoma" size="1">
							<?php 
								if($donnees['pays']=="UNITED KINGDOM") 
									{ echo $donnees['ville'].' '.$donnees['cp'];}
								else 
									{ echo $donnees['cp'].' '.$donnees['ville'];}
							?>
                        </font>
                     </td>
				</tr>
				<tr>
					<td><font face="tahoma" size="1"><?php echo $donnees['pays'];?></font></td>
				</tr>
				<?php //on ajoute une ligne vide entre l'adresse et le lien web, sauf pour le maroc et l'UK: adresse trop longue prend deux lignes.
					if((!is_null($donnees['telmobile'])) && $donnees['pays']!=="MAROC") //si tel mobile et pays n'EST PAS maroc: +1 ligne vide
						echo '<tr><td><font face="tahoma" size="1">&nbsp;</font></td></tr>';
					if((!is_null($fonctionen))) // && $donnees['pays']!=="MAROC") 
						echo '<tr><td><font face="tahoma" size="1">&nbsp;</font></td></tr>';
				?>
				<tr>
					<td><font face="tahoma" size="1"><a href="http://www.latty.com">www.latty.com</a></font></td>
				</tr>
			</table>
		</td>
	</tr>
     
	<tr>	
		<!-- Pied de page écolo -->
    	<td colspan="2" width="528" align="left" valign="middle"><img src="ecolo.jpg" alt="logo ecolo" width="26" height="24"><font face="tahoma" size="1"><b><?php 	
							if ($donnees["pays"]=="UNITED KINGDOM") {include ('Signatures/Textes/Ecolo-En.txt');}
							elseif ($donnees["pays"]=="SPAIN") {include('Signatures/Textes/Ecolo-Es.txt');}
							elseif ($donnees["pays"]=="GERMANY") {include('Signatures/Textes/Ecolo-De.txt');}
							else include('Signatures/Textes/Ecolo-Fr.txt');
					?>
                   </b></font></td> 
	</tr>
	<!--Pied de page pour un salon -->
	<?php if(isset($_POST['Salon'])){include('Signatures/Textes/Salon.html');} ?>
	<tr>
		<?php 	
		 if ($donnees["pays"]=="UNITED KINGDOM")
			{
				include('Signatures/Textes/En.txt');
			} 
		elseif ($donnees["pays"]=="SPAIN") 
			{
				include('Signatures/Textes/Es.txt');
			} 
		elseif ($donnees['pays']=="GERMANY") 
			{
				include('Signatures/Textes/De.txt');
			}
		?>
	</tr>

</table>

<br><br><br><br><br><br><br><br><br><br>

<?php if(isset($_POST['Salon'])){echo "<br><br><br><br><br><br><br><br>"; } ?>
<!-- des BR tout moche pour obliger le retour à la ligne APRES les blocs TABLE ... snaz -->