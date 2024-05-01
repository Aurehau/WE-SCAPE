<?php
  $titre = "";
  $Hacceuil = "<div class='contenuBanniere'>
                <h1 class='accueil-slogan'> </h1>
                <p class='accueil-description'> </p>
                <a href='templateReservations.html'><button alt='bouton réservations' class='accueil-bouton'> </button></a>
                </div>";
  $styles = '<link href="style/styleAccueil.css" rel="stylesheet">';


  //temporaire pour connexion *****************************************

  ?>

<div class="resultat">
<div class="presentationCategories conteneur">
            <h2>Prêts à vivre une expérience <span id="spanJaune">hors du commun ?</span></h2>

            <div class="presentation">

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
                        echo '<form method="POST" action="index.php?action=adminCreerVersion&idEscapeGame='.$value["idEscapeGame"].'" enctype="multipart/form-data" id="voir_escape_form" class="contact-form contact-grid">
                          <div class="form-field subject">
                          <label class="label">À</label>
                          <select name="idEscapeGame" form="voir_escape_form" required>';
                        foreach ($EscapeGame as $value) {
                          if ($variable2==$value["idEscapeGame"]) {
                          
                              echo '<option value="'.$value["idLieu"].'" class="" selected>'.$value["nom_lieu"].'</option>
                              ';
                              }
                            }
                        echo '</select>
                          </div>
                          <input  class="btn bouton" type="submit" class="valid" name="ok" value="Ajouter">
                          </form>';
                        echo '</div>
                        </div>';
                      }

                    $variable=$value["idEscapeGame"];
                    $variable2=$value["idEscapeGame"];
                  }

                ?>

                <div class="category category1">
                    <div class="overlay">
                        <h3>Escape game n°1</h3>
                        <a href="#" class="button">Découvrir</a>
                    </div>
                </div>
                <div class="category category2">
                    <div class="overlay">
                        <h3>Escape game n°2</h3>
                        <a href="#" class="button">Découvrir</a>
                    </div>
                </div>
                <div class="category category3">
                    <div class="overlay">
                        <h3>Escape game n°3</h3>
                        <a href="#" class="button">Découvrir</a>
                    </div>
                </div>
                <div class="category category4">
                    <div class="overlay">
                        <h3>Escape game n°4</h3>
                        <a href="#" class="button">Découvrir</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="sectionVideo">
            <div class="conteneur">
                <h2>L'événement d'équipe parfait avec <span id="spanNoir">100% de plaisir garanti </span></h2>
                <h3> pour les entreprises, les associations, la famille et les amis </h3>
                <iframe src="https://www.youtube.com/embed/FGLOhfsFeg8" title="We-Escape - In Vino Veritas Kino Trailer [HD]" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </div>

        <div class="sectionCartesCadeaux conteneur">
            <h2>Un cadeau qui <span id="spanJaune">marque !</span></h2>

         
            <div class="section">
                <div class="image"></div>
                <div class="text">
                    <h3>Ofrrez l'exploration !</h3>
                    <p>
                        Offrez des aventures uniques en Alsace avec nos cartes cadeaux spécialement conçues pour vos proches. Des aventures uniques qui laisseront une empreinte indélébile dans les mémoires. Tout évenement mérite son escape game.
                    </p>
                    <a href="#" class="button">3, 2, 1, réserver !</a>
                </div>
            </div>
            

        </div>
</div>


