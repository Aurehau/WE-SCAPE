<?php
  $titre = "Liste des commandes";
  $styles = "<link href='style/styleCarteCadeaux.css' rel='stylesheet'>";
  $Hacceuil='<section class="sectionTitre" style = --imgtitre:>
              <div class="titrePage">
                      <h1> <img src="images/imgBDD/'.$infolieu[0]["logo"].'" alt="logo wescape" > </h1>
              </div>
            </section>';
?>

<div class="resultat">

      <div class='espace_video'>
        <?php
        if (isset($infolieu[0]["video"])) {
          # code...
        }
          echo '<iframe width="560" height="315" src="'.$infolieu[0]["video"].'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>';
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
                    <h3 class="phpmyadmin-game-9-titre"></h3>
                    <h4><span>Durée</span> : <span>1</span> <span class="info">heure</span></h4>
                    <p>Convient aux <span class="niveau-puzzle-'.$value["niveau_puzzle"].'"></span></p>
                    <a href="templateAventures.html" class="bas"> <button class="bouton">Consulter</button> </a>
                </div>

            </div>';

    }
  ?>

      </div>
</div>
