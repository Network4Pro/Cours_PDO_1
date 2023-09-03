
<form action="" method="post">
    Name   : <input type="text" name="nom" /><br>
    Prenom : <input type="text" name="prenom" /><br>
    Envoi  : <button type="submit" name="envoi">Envoii</button><br>
</form>



<?php 
    var_dump($_POST); echo "<br>";
    var_dump($_REQUEST); echo "<br>";
    var_dump(isset($_POST['envoi']));
  if(isset($_POST['envoi'])){
    echo "Nom : ".$_POST["nom"]  ." **  Prenom : ". $_POST["prenom"]."<br>";
    echo "Nom du Button : " . $_POST["envoi"];
  }