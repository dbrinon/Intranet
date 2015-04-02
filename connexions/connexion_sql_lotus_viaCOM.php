<?php
//Autre méthode de connexion: instanciation via objet COM
//Initiate Lotus Notes session
$session = new COM( "Lotus.NotesSession", "lotus, dbrinon ,dbrinon" );
$session->Initialize();

?>