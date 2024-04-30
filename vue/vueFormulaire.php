<?php
  $titre = "Ajout d'un clients";
  $styles = "";
?>

<div class="resultat">

<?php
  if(isset($message)){
    echo '<div class="erreur"><span class="message-erreur"> </span> '.$message.'</div>';
  }
?>

  <form action="index.php?action=enregClient" method="POST">
  <?php

    require_once "includes/html/formulaire.class.php";

    $formulaire = new formulaire($_POST);

    echo $formulaire->inputText('nom','contact-nom');
    echo $formulaire->inputText('prenom','contact-prenom');
    echo $formulaire->inputText('age','contact-age');
    echo $formulaire->inputText('adresse','contact-adresse');
    echo $formulaire->inputText('ville','contact-ville');
    echo $formulaire->inputText('mail','contact-email');
    echo $formulaire->submit('ok');

  ?>
  </form>
</div>

