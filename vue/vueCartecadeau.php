<?php
  $titre = $produit[0]["idProduit"];
  $styles = "<link href='style/styleTemplateAventure.css' rel='stylesheet'>";
  $lienphoto=$produit[0]["lien_photo"];


  $Hacceuil=<<<HTML
  <section class="sectionTitre" style="--imgtitre: url('../images/imgBDD/{$lienphoto}')">
      <div class="titrePage">
          <h1 class="phpmyadmin-produit-{$titre}-titre"> </h1>
      </div>
  </section>
  HTML;
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
            <li ><a id="occasion" href="#occasionSection"> Occasion </a></li>
            <li ><a id="delai" href="#delaiSection"> Délai  </a></li>
            <li ><a id="taille" href="#tailleSection"> Taille </a></li>
            <li ><a id="tarifs" href="#tarifsSection"> Tarifs </a></li>
            <li ><a id="valeur" href="#valeurSection"> Valeur </a></li>
            <li ><a id="quantite" href="#quantiteSection"> Quantité </a></li>

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

        <h1 data-menu="delai" class="anchor-offset" id="delaiSection"> Délai de livraison</h1>
            <p>
              <?php  echo $produit[0]["delai"]; ?> <span>jours</span>
            </p>

        <h1 data-menu="taille" class="anchor-offset" id="tailleSection"> Taille du produit</h1>
              <?php
                  echo "<p class='niveau-taille-".$produit[0]["taille_colis"]."'></p>";
                ?>

        <h1 data-menu="tarifs" class="anchor-offset" id="tarifsSection"> Tarifs</h1>
            <p>
              <?php  echo $produit[0]["prix_produit"]; ?> €
            </p>
<?php
        $valeur_bon= json_decode($produit[0]["valeur_bon"]);

        if($valeur_bon[0]!=""){
        
        echo '<h1 data-menu="valeur" class="anchor-offset"id="valeurSection"> Valeur du bon</h1>';
        }
        
         echo '<form method="POST" action="index.php?action=enregProduitPanier&idProduit='.$produit[0]["idProduit"].'&prix='.$produit[0]["prix_produit"].'" enctype="multipart/form-data" id="ajout_panier" class="contact-form contact-grid">
         <p>';

         require_once "includes/html/formulaire.class.php";

                    $formulaire = new formulaire($_POST);

         if($valeur_bon[0]!=""){
         echo '<select name="valeur_bon" form="ajout_panier" required>';

            //$valeur_bon= json_decode($produit[0]["valeur_bon"]);
            foreach ($valeur_bon as $value) {
                echo '<option value="'.$value.'" class="" selected>'.$value.'€</option>
                ';
              }

            echo '
          </select>';
            }
        echo '</p>';
        echo '<h1 data-menu="quantite" class="anchor-offset" id="quantiteSection">Quantité souhaitée </h1>';
        echo $formulaire->inputNumberI('nombre');
        echo '<p>
      <input  class="btn bouton" type="submit" class="valid" name="ok" value="Ajouter au panier">
      </p></form> ';
      //var_dump($valeur_bon);
      ?>
            
    </div>


  </div>
      
</div>
