<form action="test.php">
  <fieldset>
      <legend>TEST: exploitation facile des cases à cocher avec PHP</legend>

      <input type="hidden" name="envoi" value="yes">
      <input type="text" name="voiture"><br>
      <input type="checkbox" id="choix1"name="options[]" value="Injection au méthane"><label for="choix1">&nbsp;Injection au méthane</label><br>
      <input type="checkbox" name="options[]" value="Trois roues de secours">&nbsp;Trois roues de secours<br>
      <input type="checkbox" name="options[]" value="Miroir de courtoisie dans le coffre">&nbsp;Miroir de rtoisie dans le coffre<br>
      <input type="checkbox" name="options[]" value="Ventilation des rotules (côté conducteur)">&nbsp;tilation des rotules côtés conducteur)<br>
      <input type="checkbox" name="options[]" value="Kit James-Bond ">&nbsp;Kit James-Bond <br>
      <input type="submit">
  </fieldset>
</form>

<?php
      if(isset($_GET['envoi'])){

          $voiture = $_GET['voiture'];            //Nom de la voiture
          $options = $_GET['options'];            //Contenu des cases à cocher

          $options_text = implode(', ',$options);
          echo '<h1>L\'auto de vos rêves &quot;'.$voiture.'&quot;:</h1>';
          echo '<p>options choisies : '.$options_text.'</p>';
        }
?>