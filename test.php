<?php 
//session_start();
	$services=array('INFO');
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
    	<?php include ("head.html"); ?>

        <title>Page des tests en PHP</title>
        <!-- <script type="text/javascript" src='js/signature.js'></script>-->
    </head>
    <body> 
        <?php include ("header.html"); ?>
            <!-- FORMULAIRE -->
        <?php  
        	include("test/tests.html");
        ?>

            <!-- FOOTER -->
        <?php include ("footer.html"); ?>

    
    <script type="text/javascript" src="JS/signature.js"></script>

    </body>
</html>