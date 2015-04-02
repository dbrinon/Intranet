<?php 
	$sql='	SELECT LastName as nom, FirstName as prenom, OfficePhoneNumber as telbureau, CellPhoneNumber as telmobile, 
			OfficeFAXPhoneNumber as fax,JobTitle as fonction, InternetAddress as email, Location as nom_agence_filiale, 
			OfficeStreetAddress as rue, OfficeZIP as cp, OfficeCity as ville,OfficeCountry as pays, CompanyName as societe
			FROM Personnes\Adresses
			ORDER BY LastName'; 

	if ($sql != false)
	{
		$reponse = odbc_exec($bdd, $sql);
	}; 

?>