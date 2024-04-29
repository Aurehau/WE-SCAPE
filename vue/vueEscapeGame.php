<?php
  $titre = $version[0]["idEscapeGame"];
  $styles = "<link href='style/styleTemplateAventure.css' rel='stylesheet'>";

  $lienphoto=$version[0]["lien_photo"];


  $Hacceuil=<<<HTML
  <section class="sectionTitre" style="--imgtitre: url('../images/imgBDD/{$lienphoto}')">
      <div class="titrePage">
          <h1 class="phpmyadmin-game-{$titre}-titre"> </h1>
      </div>
  </section>
  HTML;
?>

<div class="resultat">
  
  <ul class="carousel_img">
    <?php 
    echo '<img class="photo" src="images/imgBDD/'.$version[0]["lien_photo"].'" alt="image du produit">';
      
      if($imgescape!=0){
      foreach ($imgescape as $value) {
        echo '<img class="photo" src="images/imgBDD/'.$value["lien_photo"].'" alt="image du produit">';
      }}
    ?>
  </ul>

  <div class="grid-aventure">

    <div class="menuAventure">

        <ul>
            <li ><a id="histoire" href="#histoireSection"> Histoire </a></li>
            <li ><a id="description" href="#descriptionSection"> Description </a></li>
            <li ><a id="groupescibles" href="#cibleSection"> Cible </a></li>
            <li ><a id="duree" href="#dureeSection"> Durée </a></li>
            <li ><a id="niveau" href="#niveauSection"> Niveau </a></li>
            <li ><a id="lieu" href="#lieuSection"> Lieu </a></li>
            <li ><a id="reservations" href="#reservationsSection"> Réservations </a></li>
            <li ><a id="tarifs" href="#tarifsSection"> Tarifs </a></li>
            <li ><a id="plusinfos" href="#infosSection"> Plus d'infos </a></li>
        </ul>

    </div>

    <div class="contenuAventure">
          
        
        <h1 data-menu="description" class="anchor-offset" id="histoireSection"> Histoire </h1>
            <?php 
              echo "<p class='phpmyadmin-version-".$version[0]["idVersion"]."-histoire'></p>"; 
            ?>

        <h1 data-menu="description" class="anchor-offset" id="descriptionSection"> Description </h1>
            <?php 
              echo "<p class='phpmyadmin-version-".$version[0]["idVersion"]."-description'></p>"; 
            ?>

        <h1 data-menu="occasion" class="anchor-offset" id="cibleSection"> Goupes cibles </h1>
            <?php 
              echo "<p class='phpmyadmin-game-".$version[0]["idEscapeGame"]."-groupe_cible'></p>"; 
            ?>

        <h1 data-menu="duree" class="anchor-offset" id="dureeSection"> Durée</h1>
            <p>
              <?php  echo $version[0]["durée"]; ?> <span>jours</span>
            </p>

        <h1 data-menu="taille" class="anchor-offset" id="niveauSection"> Niveau</h1>
              <?php
                  echo "<p>
                          <span>Niveau des puzzles :</span> <span class='adminAjout-niveau-".$version[0]["niveau_puzzle"]."'></span> (".$version[0]["niveau_puzzle"]."/3)<br>
                          <span>Niveau du parcours :</span> <span class='adminAjout-niveau-".$version[0]["niveau_parcours"]."'></span> (".$version[0]["niveau_parcours"]."/3)
                        </p>";
                ?>

        <h1 data-menu="taille" class="anchor-offset" id="lieuSection"> Lieu</h1>
              <?php
                  echo "<p>
                          <span>Adresse :</span> <span class='phpmyadmin-version-".$version[0]["idVersion"]."-adresse'></span><br>
                          <span>Ville :</span> ".$version[0]["ville"]."<br>
                          <span>Code postal :</span> ".$version[0]["code_postal"]."<br>
                          <span>Pays :</span> France <br><br>

                          <span>Transports :</span> ";
                          
                          if($version[0]["parking"]==1){
                            echo "<span class='adminAjout-transports-1'></span> ";
                          }

                          if($version[0]["train"]==1){
                            echo "<span class='adminAjout-transports-2'></span> ";
                          }

                          if($version[0]["bus"]==1){
                            echo "<span class='adminAjout-transports-3'></span> ";
                          }
                          
                          echo "<br><br>

                          <span>Rendez-vous :</span> <span class='phpmyadmin-version-".$version[0]["idVersion"]."-rdv'></span><br>
                        </p>";
                ?>


        <h1 data-menu="reservations" class="anchor-offset"id="reservationsSection"> Réservation</h1>
        <h2 data-menu="tarifs" class="anchor-offset" id="tarifsSection">Tarifs</h2>
            <p>
              <?php 
              //$version[0]["nbclient"]=9;       ***** pour test *****
              //$version[0]["prix_game"]=25;
              echo '<select name="valeur_bon" form="ajout_panier" required>';

              
              for ($i=2; $i <= $version[0]["nbclient"] ; $i++) { 
                $prix=$version[0]["prix_game"] + (($i-4) * (-0.3));
                $prix= $prix*$i;

                echo '<option value="['.$prix.','.$i.']" class="" selected>'.$prix.'€ ( '.$i.' <span>personnes</span>)</option>';
              }

              echo '</select>';
              
              ?>
            </p>
        <?php
        $aujourdhui = date("Y-m-d");

        echo '<form method="POST" action="index.php?action=enregEscapePanier&idVersion='.$version[0]["idVersion"].'" enctype="multipart/form-data" id="ajout_panier" class="contact-form contact-grid">
        <h2>Sélectionné un créneau</h2>
        <p>
        <input type="date" id="date" name="date" min="'.$aujourdhui.'">
        <div>
          <input type="radio" id="option1" name="heure" value="09:00">
          <label for="option1">09:00</label><br>
          <input type="radio" id="option2" name="heure" value="10:00">
          <label for="option2">10:00</label><br>
          <input type="radio" id="option3" name="heure" value="11:00">
          <label for="option3">11:00</label><br>
          <input type="radio" id="option4" name="heure" value="12:00">
          <label for="option4">12:00</label><br>
          <input type="radio" id="option5" name="heure" value="13:00">
          <label for="option5">13:00</label><br>
          <input type="radio" id="option6" name="heure" value="14:00">
          <label for="option6">14:00</label><br>
          <input type="radio" id="option7" name="heure" value="15:00">
          <label for="option7">15:00</label><br>
          <input type="radio" id="option8" name="heure" value="16:00">
          <label for="option8">16:00</label><br>
          <input type="radio" id="option9" name="heure" value="17:00">
          <label for="option9">17:00</label><br>
          <input type="radio" id="option10" name="heure" value="18:00" checked>
          <label for="option10">18:00</label><br>
        </div>
        </p>
        <p>
      <input  class="btn bouton" type="submit" class="valid" name="ok" value="Ajouter au panier">
      </p></form> ';
      //var_dump($valeur_bon);
      ?>

      <h1 data-menu="taille" class="anchor-offset" id="infosSection"> Plus d'informations</h1>
      <h2>Langues disponibles</h2>
          <?php 
                $langues= json_decode($version[0]["langues"]);
                foreach ($langues as $value) {
                  if($value=="fr"){
                    echo "<span class='adminAjout-langues-1'></span><br><br>  ";
                  }
                  if($value=="en"){
                    echo "<span class='adminAjout-langues-2'></span><br><br>  ";
                  }
                  }
          ?>
      
      <h2>Informations importantes</h2>
          <?php 
            echo "<p class='phpmyadmin-version-".$version[0]["idVersion"]."-info_importante'></p>"; 
          ?>
      
      <h2>Exigences</h2>
          <?php 
            echo "<p class='phpmyadmin-version-".$version[0]["idVersion"]."-exigence'></p>"; 
          ?>

      <h2>Contenu</h2>
          <?php 
            echo "<p class='phpmyadmin-version-".$version[0]["idVersion"]."-contenu'></p>"; 
          ?>

      <h2>À apporter</h2>
          <?php 
            echo "<p class='phpmyadmin-version-".$version[0]["idVersion"]."-a_apporter'></p>"; 
          ?>

      <h2>Autre</h2>
          <?php 
            echo "<p class='phpmyadmin-version-".$version[0]["idVersion"]."-autre'></p>"; 
          ?>
            
    </div>


  </div>
      
</div>
