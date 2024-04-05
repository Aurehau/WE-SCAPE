<?php
  $titre = "Ajout d'un clients";
  $styles = "";
?>

<div class="resultat">

<?php
  if(isset($message)){
    echo '<div class="erreur">Erreur :'.$message.'</div>';
  }
?>

  <form action="index.php?action=enregClient" method="POST">
  <?php

    require_once "includes/html/formulaire.class.php";

    $formulaire = new formulaire($_POST);

    echo $formulaire->inputText('nom','Nom');
    echo $formulaire->inputText('prenom','Prénom');
    echo $formulaire->inputText('age','Age');
    echo $formulaire->inputText('adresse','Adresse');
    echo $formulaire->inputText('ville','Ville');
    echo $formulaire->inputText('mail','Adresse mail');
    echo $formulaire->submit('ok');

  ?>
  </form>
</div>

