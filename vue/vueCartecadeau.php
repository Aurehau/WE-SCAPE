<?php
  $titre = "Liste des commandes";
  $styles = "<link href='style/styleTemplateAventure.css' rel='stylesheet'>";
  $Hacceuil="<section class='sectionTitre' style ='--imgtitre: url(\"images/imgBDD/".$produit[0]["lien_photo"]."\");'>
              <div class='titrePage'>
                      <h1 class='phpmyadmin-produit-".$produit[0]["idProduit"]."-titre'>  </h1>
              </div>
            </section>";
?>

<div class="resultat">

  <ul class="carousel_img">
    <?php 
    echo '<img class="photo" src="images/imgBDD/'.$produit[0]["lien_photo"].'" alt="image du produit">';
      
      if($imgproduit!=0){
      foreach ($imgproduit as $value) {
        echo '<img class="photo" src="images/imgBDD/'.$value["lien_photo"].'" alt="image du produit">';
      }}
    ?>
  </ul>

  <div class="grid-aventure">

    <div class="menuAventure">

        <ul>
            <li ><a id="description" href="#descriptionSection"> Description </a></li>
            <li ><a id="tarifs" href="#tarifsSection"> Tarifs </a></li>
            <li ><a id="duree" href="#dureeSection"> Durée </a></li>
            <li ><a id="reservations" href="#reservationsSection"> Réservations </a></li>
        </ul>

    </div>

    <div class="contenuAventure">          
        
        <h1 data-menu="description" class="anchor-offset" id="descriptionSection"> Description </h1>
            <?php 
              echo "<p class='phpmyadmin-produit-".$produit[0]["idProduit"]."-description'></p>"; 
            ?>

        <h1 data-menu="occasion" class="anchor-offset" id="occasionSection"> Occasion </h1>
            <?php 
              echo "<p class='phpmyadmin-produit-".$produit[0]["idProduit"]."-raisons'></p>"; 
            ?>
            

        <h1 data-menu="tarifs" class="anchor-offset" id="tarifsSection"> Tarifs</h1>
            <p>
              <?php  echo $produit[0]["prix_produit"]; ?> €
            </p>

        <h1 data-menu="duree" class="anchor-offset" id="dureeSection"> Délai de livraison</h1>
            <p>
              <?php  echo $produit[0]["delai"]; ?> <span>jours</span>
            </p>

        <h1 data-menu="taille" class="anchor-offset" id="tailleSection"> Taille du produit</h1>
              <?php
                  echo "<p class='niveau-taille-".$produit[0]["taille_colis"]."'></p>";
                ?>

        <h1 data-menu="reservations" class="anchor-offset"id="reservationsSection"> Valeurs du bon</h1>
        <?php
         echo '<form method="POST" action="index.php?action=enregProduitPanier&idProduit='.$produit[0]["idProduit"].'&prix='.$produit[0]["prix_produit"].'" enctype="multipart/form-data" id="ajout_panier" class="contact-form contact-grid">
         <p>

          <select name="valeur_bon" form="ajout_panier" required>';

            $valeur_bon= json_decode($produit[0]["valeur_bon"]);
            foreach ($valeur_bon as $value) {
                echo '<option value="'.$value.'" class="" selected>'.$value.'€</option>
                ';
              }

            echo '
          </select>
        </p>
        <p>
      <input  class="btn bouton" type="submit" class="valid" name="ok" value="Ajouter au panier">
      </p></form> ';
      //var_dump($valeur_bon);
      ?>
            
    </div>


  </div>
      
</div>
