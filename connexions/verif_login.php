<?php
if(empty($_SESSION['login']))
	{
		header('Location: index.php');
	}
	{
		$ok_to_go=FALSE;
		foreach($services as $service)
			{
				foreach($_SESSION['memberof'] as $ligne)
					{
						if(stristr($ligne, $service)!=FALSE) //si on trouve $service dans une des lignes de l'array $info[0]['memberof']
							{
								$ok_to_go=TRUE;
								$FindService=$service;
								break;
							}
					}
			}
		// Si l'utilisateur fait bien partie du service, acc�s accord�.
			if ($ok_to_go)
				{
					echo $_SESSION['displayname'].", tu fais bien partie du service \"$FindService\".<br><a href='index.php'>Retour � l'index.</a>  <a href='http://127.0.0.1/test/connexions/deco.php' title='D�connexion et retour accueil'> -D�connexion-.</a> ";
				}
			else header('Location: index.php');

			echo '<br>';
	}
?>