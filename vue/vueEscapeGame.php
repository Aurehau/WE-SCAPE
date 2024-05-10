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

  <?php
      if(isset($message)){
          echo '<div class="erreur> <span class="message-erreur"> </span>'.$message.'</div>';
      }
  ?>

  
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
            <li ><a id="histoire" href="#histoireSection" class="escapeGame-histoire"> </a></li>
            <li ><a id="description" href="#descriptionSection" class="escapeGame-description"> </a></li>
            <li ><a id="groupescibles" href="#cibleSection" class="escapeGame-cible"> </a></li>
            <li ><a id="duree" href="#dureeSection" class="escapeGame-duree"> </a></li>
            <li ><a id="niveau" href="#niveauSection" class="escapeGame-niveau"> </a></li>
            <li ><a id="lieu" href="#lieuSection" class="escapeGame-lieu"> </a></li>
            <li ><a id="reservations" href="#reservationsSection" class="escapeGame-reservations"> </a></li>
            <li ><a id="tarifs" href="#tarifsSection" class="escapeGame-tarifs"> </a></li>
            <li ><a id="plusinfos" href="#infosSection" class="escapeGame-plusdinfos"> </a></li>
        </ul>

    </div>

    <div class="contenuAventure">
          
        
        <h1 data-menu="description" class="anchor-offset escapeGame-histoire" id="histoireSection"> </h1>
            <?php 
              echo "<p class='phpmyadmin-version-".$version[0]["idVersion"]."-histoire'></p>"; 
            ?>

        <h1 data-menu="description" class="anchor-offset escapeGame-description" id="descriptionSection" > </h1>
            <?php 
              echo "<p class='phpmyadmin-version-".$version[0]["idVersion"]."-description'></p>"; 
            ?>

        <h1 data-menu="occasion" class="anchor-offset escapeGame-groupescible" id="cibleSection" > </h1>
            <?php 
              echo "<p class='phpmyadmin-game-".$version[0]["idEscapeGame"]."-groupe_cible'></p>"; 
            ?>

        <h1 data-menu="duree" class="anchor-offset escapeGame-dureedujeu" id="dureeSection" > </h1>
            <p>
              <?php  echo $version[0]["durée"]; ?> <span class="adminAjout-jours"> </span>
            </p>

        <h1 data-menu="taille" class="anchor-offset escapeGame-niveau" id="niveauSection"> </h1>
              <?php
                  echo "<p>
                          <span class='escapeGame-niveaudespuzzles'> </span> <span class='adminAjout-niveau-".$version[0]["niveau_puzzle"]."'></span> (".$version[0]["niveau_puzzle"]."/3)<br>
                          <span class='escapeGame-niveauduparcours'> </span> <span class='adminAjout-niveau-".$version[0]["niveau_parcours"]."'></span> (".$version[0]["niveau_parcours"]."/3)
                        </p>";
                ?>

        <h1 data-menu="taille" class="anchor-offset escapeGame-lieudujeu" id="lieuSection"> </h1>
              <?php
                  echo "<p>
                          <span class='escapeGame-coordonne-adresse'> </span> <span class='phpmyadmin-version-".$version[0]["idVersion"]."-adresse'></span><br>
                          <span class='escapeGame-coordonne-ville'> </span> ".$version[0]["ville"]."<br>
                          <span class='escapeGame-coordonne-codePostal'> </span> ".$version[0]["code_postal"]."<br>
                          <span class='escapeGame-coordonne-pays'> </span> <br><br>

                          <span class='adminAjout-transports-transport'> </span> ";
                          
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

                          <span class='escapeGame-rdv'>  </span> <span class='phpmyadmin-version-".$version[0]["idVersion"]."-rdv'></span><br>
                        </p>";
                ?>


        <h1 data-menu="reservations" class="anchor-offset escapeGame-reservations" id="reservationsSection"> </h1>
        <?php 
          echo '<form method="POST" action="index.php?action=enregEscapePanier&idVersion='.$version[0]["idVersion"].'" enctype="multipart/form-data" id="ajout_panier" class="contact-form contact-grid">';
        ?>
        <h2 data-menu="tarifs" class="anchor-offset escapeGame-tarifs" id="tarifsSection"> </h2>
            <p>
              <?php 
              //$version[0]["nbclient"]=9;       ***** pour test *****
              //$version[0]["prix_game"]=25;
              echo '<select name="prix" form="ajout_panier" required>';

              
              for ($i=2; $i <= $version[0]["nbclient"] ; $i++) { 
                $prix=$version[0]["prix_game"] + (($i-4) * (-0.3));
                $prix= $prix*$i;
                $prix=round($prix);

                echo '<option value="['.$prix.','.$i.']" class="" selected>'.$prix.'€ ( '.$i.' <span class="escapeGame-nbpersonnes"> </span>)</option>';
              }

              echo '</select>';
              
              ?>
            </p>
        <?php
        $aujourdhui = date("Y-m-d");

        echo '<h2 class="escapeGame-creneau"> </h2>
        <p>
        <input type="date" id="date" name="date" min="'.$aujourdhui.'" required>
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

      <h1 data-menu="taille" class="anchor-offset escapeGame-plusdinformations" id="infosSection" > </h1>
      <h2 class="escapeGame-langues"> </h2>
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
      
      <h2 class="escapeGame-informationsImportantes"></h2>
          <?php 
            echo "<p class='phpmyadmin-version-".$version[0]["idVersion"]."-info_importante'></p>"; 
          ?>
      
      <h2 class="escapeGame-exigences"></h2>
          <?php 
            echo "<p class='phpmyadmin-version-".$version[0]["idVersion"]."-exigence'></p>"; 
          ?>

      <h2 class="escapeGame-contenu"></h2>
          <?php 
            echo "<p class='phpmyadmin-version-".$version[0]["idVersion"]."-contenu'></p>"; 
          ?>

      <h2 class="escapeGame-apporter"></h2>
          <?php 
            echo "<p class='phpmyadmin-version-".$version[0]["idVersion"]."-a_apporter'></p>"; 
          ?>

      <h2 class="escapeGame-autre"></h2>
          <?php 
            echo "<p class='phpmyadmin-version-".$version[0]["idVersion"]."-autre'></p>"; 
          ?>
            
    </div>


  </div>
      
</div>
