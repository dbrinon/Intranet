<?php 
if($donnees['nom']=='de LEOTARD') echo'<p>I do remain<br>Best regards</p>';
if($donnees['nom']=='MENARD') echo'<p>Yours faithfully</p>';
if($donnees['nom']=='GERLACH') echo'<p>mit freundlichen Gr��en</p>';
?>
<table border="0" width="575" cellspacing="0">
	<tr>
		<td width="105" height="88" align="center" valign="center">

			<?php
			// En fonction de la ville, ajout du logo correspondant � la filiale
				if ($donnees["pays"]=="belgique") echo '<img src="belgium.jpg" alt="logo Latty Belgique" width="87" height="87"/>';
				if ($donnees["pays"]=="espagne") echo '<img src="iberica.jpg" alt="logo Latty Iberica" width="87" height="87"/>';
				if ($donnees["pays"]=="angleterre") echo '<img src="england.jpg" alt="logo Latty ltd" width="87" height="87"/>';
				if ($donnees["pays"]=="argentine") echo '<img src="argentina.jpg" alt="logo Latty Argentina" width="87" height="87"/>';
				if ($donnees["pays"]=="maroc") echo '<img src="maroc.jpg" alt="logo Latty Maroc" width="87" height="87"/>';
				if ($donnees["pays"]=="allemagne") echo '<img src="deutschland.jpg" alt="logo Latty Deutschland" width="87" height="87"/>';
				if ($donnees["societe"]=="Latty Brou") echo'<img src="france.jpg" alt="logo Latty Int." width="87" height="87"/>';
				if ($donnees["societe"]=="LATTY Mecaseal" echo'<img src="mecaseal.jpg" alt="logo Latty Int." width="87" height="87"/>';
				
			?>

		</td>
		<td width="250" valign="top">
			<table border="0" cellspacing="0" align="left">
				<tr>
					<td><font face="tahoma" size="2"><b><?php echo htmlentities($donnees['prenom'])." "; echo $donnees['nom']; ?></b></font></td>
				</tr>
                <?php if ($donnees['ville']=="WAVRE") echo '<tr><td><font face="tahoma" size="2">&nbsp;</font></td></tr>'; 
					//ce code ajoute une ligne car l'intitulé latty SA belgium est sur DEUX lignes
					?>
				<tr>
					<td><font face="tahoma" size="1"><?php echo htmlentities($donnees['fonction']); ?></font></td>
				</tr>
				<?php
					if($donnees["fonctionen"] !="") echo'<tr><td><font face="tahoma" size="1"><i>'.$donnees['fonctionen'].'</i></font></td></tr>';
				?>
				<tr>
					<td><font face="tahoma" size="1">Tel: <?php echo $donnees['telbureau']; ?></font></td>
				</tr>
				<?php 
					if($donnees['telmobile'] !="") echo '<tr><td><font face="tahoma" size="1">Mobile: '.$donnees['telmobile'].'</font></td></tr>';
				?>
				<tr>
					<td><font face="tahoma" size="1">Fax: <?php echo $donnees['fax']; ?></font></td>
				</tr>
				<tr>
					<td><font face="tahoma" size="1">Email: <a href="mailto:<?php echo $donnees['email']; ?>?subject=Renseignement">
					<?php echo $donnees['email']; ?></a></font></td>
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
							<?php 
								if ($donnees['pays']=="maroc") {echo htmlentities($donnees['rue'])
									.'<tr><td><font face="tahoma" size="1">'.$donnees['rue2']
									.'</font></td></tr>';}
								else {echo htmlentities($donnees['rue']);}
							?>
                         </font></td>
                </tr> 			
				<tr>
					<td><font face="tahoma" size="1">
							<?php 
								if($donnees['pays']=="angleterre") echo $donnees['ville'].' '.$donnees['cp'] ;
								if($donnees['pays']!="angleterre") echo $donnees['cp'].' '.$donnees['ville'];
							?>
                        </font>
                     </td>
				</tr>
				<tr>
					<td><font face="tahoma" size="1">&nbsp;</font></td>
				</tr>
				<?php //on ajoute une ligne vide entre l'adresse et le lien web, sauf pour le maroc et l'UK: adresse trop longue prend deux lignes.
					if($donnees['telmobile'] !=="" and $donnees['pays']!=="maroc")
						echo '<tr><td><font face="tahoma" size="1">&nbsp;</font></td></tr>';
					if($donnees["fonctionen"] !=="" and $donnees['pays']!=="maroc") echo '<tr><td><font face="tahoma" size="1">&nbsp;</font></td></tr>';
				?>
				<tr>
					<td><font face="tahoma" size="1"><a href="http://www.latty.com">www.latty.com</a></font></td>
				</tr>
			</table>
		</td>
	</tr>
                                <?php 	if ($donnees["pays"]=="angleterre")
											{
												include('Signatures/Textes/En.txt');
											} 
										elseif ($donnees["pays"]=="espagne") 
											{
												include('Signatures/Textes/Es.txt');
											} 
										elseif ($donnees['pays']=="allemagne") 
											{
												include('Signatures/Textes/De.txt');
											}
/*										else 
											{
												include('Signatures/Textes/Fr.txt');
											}*/
								?>
	<tr>
		<!--Pied de page pour la fin d'année: bandeau animé
    	<td colspan="3"width="732" align="middle" valign="middle"><img src="cyclatom2012 .jpg" alt="Salon Cyclatom 2012" width="732" height="177">
        </td>  --> 
		
		<!-- SIGNATURE ORIGINAL -->
    	<td colspan="3"width="528" align="left" valign="middle"><img src="ecolo.jpg" alt="logo ecolo" width="26" height="24"><font face="tahoma" size="1"><b><?php 	
							if ($donnees["pays"]=="angleterre") {include ('Signatures/Textes/Ecolo-En.txt');}
							elseif ($donnees["pays"]=="espagne") {include('Signatures/Textes/Ecolo-Es.txt');}
							elseif ($donnees["pays"]=="allemagne") {include('Signatures/Textes/Ecolo-De.txt');}
							else include('Signatures/Textes/Ecolo-Fr.txt');
					?>
                   </b></font></td> 
	</tr>
</table>
