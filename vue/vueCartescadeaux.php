<?php
  $titre = "Liste des clients";
  $styles = '<link href="style/styleCarteCadeaux.css" rel="stylesheet">';
  $Hacceuil='<section class="sectionTitre">
              <div class="titrePage">
                      <h1> '.$titre.'</h1>
              </div>
            </section>';
?>

<div class="resultat">
    <div class="cartes-cadeaux">
      <?php 
        foreach ($cartescadeaux as $key => $value) {
          //var_dump($escapeLieu);
          //echo $value["idEscapeGame"];

          echo '<div class="carte">

                    <div class="image">
                        <img src="images/imgBDD/'.$value["lien_photo"].'" alt="illustration escape game">
                    </div>

                    <div class="details">
                        <h3 class="phpmyadmin-produit-'.$value["idProduit"].'-titre"></h3>
                        <h4><span>Prix</span> : <span>'.$value["prix_produit"].'</span>€<span class="info"> + valeur du bon</span></h4>
                        <h4><span>Délai</span> : <span>'.$value["delai"].'</span> <span class="info">jours</span></h4>
                        <p class="limite-caracteres phpmyadmin-produit-'.$value["idProduit"].'-description"></p>';
                        if ($_SESSION['acces']=="admin") {
                          echo '<a href="templateAventures.html" class="bas"> <button class="bouton">Modifier</button> </a>
                          <a href="templateAventures.html" class="bas"> <button class="bouton">Supprimer</button> </a>';
                        }
          echo         '<a href="templateAventures.html" class="bas"> <button class="bouton">Consulter</button> </a>
                    </div>
                </div>';

        }


        if ($_SESSION['acces']=="admin") {


        /***********************Création d'un nouveau******************************/
          echo '<div class="carte">
          <div class="details">
          <h3 class="carte-produit-ajout">Ajouter un produit</h3>
          <a href="index.php?action=adminAjoutCarte" class="bas"> <button class="bouton">Ajouter</button> </a>
          </div>
          </div>';
        }

      ?>
    </div>
</div>

