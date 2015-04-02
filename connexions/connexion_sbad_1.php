<?php
	  /*déclarations de connexion  */
	  /*connexion en utilisant le login SQL */
		$serverName = "sbad";
		$uid="sa";
		$pwd="";
		$database="articles";
		$connectionInfo = array( "Database"=>"articles", "UID"=>$uid, "PWD"=>$pwd ); /* array( "Database"=>$db, "UID"=>$uid, "PWD"=>$pwd); */
		
	/* Connect using SQL Server Authentication. */
	 	$bdd = sqlsrv_connect( $serverName, $connectionInfo); 

 		if( $bdd === false )
{
     echo "Unable to connect.</br>";
     die( '<pre>'.print_r( sqlsrv_errors(), true).'</pre>');
	 elseif "connexion OK ! ! !";
} 
?>