<?php
  $titre = "";
  $Hacceuil = "<div class='contenuBanniere'>
                <h1 class='accueil-slogan'> </h1>
                <p class='accueil-description'> </p>
                <a href='#EscapeSection'><button alt='bouton réservations' class='accueil-bouton'> </button></a>
                </div>";
  $styles = '<link href="style/styleAccueil.css" rel="stylesheet">';


  //temporaire pour connexion *****************************************

  ?>

<div class="resultat">
<div class="presentationCategories conteneur">
            <h2 class='accueil-H2-1'> </h2>

            <div class="presentation" id="EscapeSection">

                <?php 
                  //var_dump($EscapeGame) ;
                  $variable2=$EscapeGame[0]["idEscapeGame"];
                  
                  foreach ($EscapeGame as $key => $value) {
                    if (empty($EscapeGame[$key-1]["idEscapeGame"])) {
                      $EscapeGame[$key-1]["idEscapeGame"]=0;
                    }
                    if ($EscapeGame[$key-1]["idEscapeGame"]!=$value["idEscapeGame"]) {
                        $lienphoto=$value["lien_photo"];
                        echo <<<HTML
                        <div class="category " style="--imgtitre: url('../images/imgBDD/{$lienphoto}')">
                        HTML;
                        echo '<div class="overlay">';
                        echo '<h3 class="phpmyadmin-game-'.$value["idEscapeGame"].'-titre"></h3>';
                        echo '<form method="POST" action="index.php?action=escapeLieu&idEscapeGame='.$value["idEscapeGame"].'" enctype="multipart/form-data" id="voir_escape_form" class="contact-form contact-grid">
                          <div class="form-field subject">
                          <label class="label">À</label>
                          <select class="cardEscape" name="idLieu" form="voir_escape_form">';
                        foreach ($EscapeGame as $value) {
                          if ($variable2==$value["idEscapeGame"]) {
                          
                              echo '<option value="'.$value["idLieu"].'" class="" selected>'.$value["nom_lieu"].'</option>
                              ';
                              }
                            }
                        echo '</select>
                          </div>
                          <input  class="btn bouton" type="submit" class="valid" name="ok" value="Consulter">
                          </form>';
                        echo '</div>
                        </div>';
                      }

                    $variable=$value["idEscapeGame"];
                    $variable2=$value["idEscapeGame"];
                  }

                ?>

            </div>
        </div>

        <div class="sectionVideo">
            <div class="conteneur">
                <h2 class='accueil-H2-2'></h2>
                <h3 class='accueil-H3-1'></h3>
                <iframe src="https://www.youtube.com/embed/FGLOhfsFeg8" title="We-Escape - In Vino Veritas Kino Trailer [HD]" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </div>

        <div class="sectionCartesCadeaux conteneur">
            <h2 class="accueil-H2-3"></h2>

         
            <div class="section">
                <div class="image"></div>
                <div class="text">
                    <h3 class="accueil-H3-1"></h3>
                    <p class="accueil-p-1">
                        
                    </p>
                    <a href="#EscapeSection" class="button accueil-button-1"></a>
                </div>
            </div>
            

        </div>
</div>


