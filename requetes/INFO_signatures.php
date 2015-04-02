<?php $reponse = $bdd->query('
SELECT adr.*, adr2.agence_filiale, adr2.rue,adr2.rue2, adr2.cp, adr2.ville, adr2.nom_agence_filiale, adr2.pays
FROM adresses adr
LEFT JOIN adresses_agences_filiales adr2
ON adr.agence_filiale = adr2.agence_filiale
'); ?>

<?php /* $reponse = $bdd->query('SELECT * FROM adresses'); */ ?>