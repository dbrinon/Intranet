<?php
	  /*déclarations de connexion  */
	  /*connexion en utilisant le login SQL */
/* 	  	EXEMPLE QUI FONCTIONNE:
		$uid='root';
		$pwd='';
		$bdd = new PDO('mysql:host=localhost;dbname=testphp', $uid, $pwd) */
	 
/*  EXEMPLE de co php sur serveur sql distant, via ODBC*/	 
/* 	  $dsn="Driver={SQL Server};"."Server=IP_de_la_machine_distante_B;"."database=nomBDD;"."uid=sa;pwd=";
	  $s=odbc_connect($dsn,'','') */
		$serverName = "192.168.0.4";
		
		$uid="sa";
		$pwd="";
		$database=("articles");
		$connectionInfo = array( "Database"=>$database, "UID"=>$uid, "PWD"=>$pwd,);
		
	/* Connect using SQL Server Authentication. */
	 	$bdd = sqlsrv_connect( $serverName, $connectionInfo);

 		if( $bdd === false )
{
     echo "Unable to connect.</br>";
     die( '<pre>'.print_r( sqlsrv_errors(), true).'</pre>');
} 
?>