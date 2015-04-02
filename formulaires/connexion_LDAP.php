<?php 	
	if(isset($_GET['erreur']) && ($_GET['erreur']="badlogin")) echo "Veuillez renseigner un login et mot de passe correct.";
	if(isset($_SESSION['login'])) echo 'Connexion réussi pour '.$_SESSION['login'].' .'; 
?>
<form action="test.php" name="form" method="post" id="Form_ldap">
    <fieldset>
        <legend>TEST: connexions LDAP</legend>
        
        <label for="login">Login</label><input class="texte" type="text" name="login" id="login" /><br />
        <label for="password">Password</label><input type="password" class="texte" name="pass" id="password" /><br />
        <label for="domaine">Domaine</label><select name="domaine" id="domaine">
        				<option selected>...</option>
                        <option value="lattysa.lan">lattysa.lan</option>
                        <option value="127.0.0.1">Local</option>
                       </select><br />
        <input type="submit" class="valid" value="Se connecter"/>
    </fieldset>
</form>
<?php
        include ("connexions/LDAP.php");
?>