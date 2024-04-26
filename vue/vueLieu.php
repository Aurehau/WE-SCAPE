<?php
  $titre = "Liste des commandes";
  $styles = "<link href='style/styleCarteCadeaux.css' rel='stylesheet'>";
  $Hacceuil="<section class='sectionTitre' style ='--imgtitre: url(\"../images/imgBDD/".$infolieu[0]["lien_photo"]."\");'>
              <div class='titrePage'>
                      <h1> <img src='images/imgBDD/".$infolieu[0]["logo"]."' alt='logo wescape' > </h1>
              </div>
            </section>";
?>

<div class="resultat">

      <div class='espace_video'>
        <?php
        var_dump($infolieu[0]);
        if (isset($infolieu[0]["video"])) {
          echo '<iframe width="560" height="315" src="'.$infolieu[0]["video"].'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>';
        }
          
        ?>
      </div>

      <div class="cartes-cadeaux">
  <?php 
    foreach ($escapeLieu as $key => $value) {
      //var_dump($escapeLieu);
      //echo $value["idEscapeGame"];

      echo '<div class="carte">

                <div class="image">
                    <img src="images/imgBDD/'.$value["lien_photo"].'" alt="illustration escape game">
                </div>

                <div class="details">
                    <h3 class="phpmyadmin-game-'.$value["idEscapeGame"].'-titre"></h3>
                    <h4><span>Durée</span> : <span>'.$value["durée"].'</span> <span class="info">heure</span></h4>
                    <p>Convient aux <span class="niveau-puzzle-'.$value["niveau_puzzle"].'"></span></p>';
                    if ($_SESSION['acces']=="admin") {
                      echo '<a href="templateAventures.html" class="bas"> <button class="bouton">Modifier</button> </a>
                      <a href="templateAventures.html" class="bas"> <button class="bouton">Supprimer</button> </a>';
                    }
      echo         '<a href="templateAventures.html" class="bas"> <button class="bouton">Consulter</button> </a>
                </div>
            </div>';

    }


    if ($_SESSION['acces']=="admin") {

      echo '<div class="carte">
      <div class="details">
      <h3><span class="game-9-titre">Ajouter un escape game à </span>'.$infolieu[0]["nom_lieu"].'</h3>
      <form method="POST" action="index.php?action=adminCreerVersion&idLieu='.$infolieu[0]["idLieu"].'" enctype="multipart/form-data" id="ajout_escape_form" class="contact-form contact-grid">
        <div class="form-field subject">
        <label class="label adminAjout-niveau-puzzle"></label>
        <select name="idEscapeGame" form="ajout_escape_form" required>';

      foreach ($escapes as $keyescape => $escape) {
        $test=0;
        foreach ($escapeLieu as $key => $value) {
          if ($value["idEscapeGame"]==$escape["idEscapeGame"]) {
            $test=1;
          }
    
        }

        if ($test==0) {
          echo '<option value="'.$escape["idEscapeGame"].'" class="phpmyadmin-game-'.$escape["idEscapeGame"].'-titre" selected></option>
          ';
        }
      }

      echo '
    </select>
  </div>
      <input  class="btn" type="submit" class="valid" name="ok" value="Ajouter">
      </form></div>
      </div>';

    /***********************Création d'un nouveau******************************/
      echo '<div class="carte">
      <div class="details">
      <h3><span class="game-9-titre">Creer un escape game et l\'ajouter à </span>'.$infolieu[0]["nom_lieu"].'</h3>
      <a href="index.php?action=adminCreerEscapeGame&idLieu='.$infolieu[0]["idLieu"].'" class="bas"> <button class="bouton">Créer et ajouter</button> </a>
      </div>
      </div>';
    }

  ?>

      </div>
</div>