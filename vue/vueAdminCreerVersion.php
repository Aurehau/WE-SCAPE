<?php
  $titre = "Ajouter une nouvelle version de cette escape game";
  $styles = "<link href='style/styleContact.css' rel='stylesheet'> <link rel='stylesheet' href='https://uicdn.toast.com/tui-calendar/latest/tui-calendar.css'>";
  $Hacceuil='<section class="sectionTitre">
                <div class="titrePage">
                    <h1> '.$titre.'</h1>
                </div>
            </section>';
?>

<div class="resultat">
    
    <?php
        /********** Il faut prendre en compte l'id du lieu et l'id de l'escapegame***********/
        
        /*** penser a ajouter la photo miniature au niveau du titre ***/
        if(isset($message)){
            echo '<div class="erreur">Erreur :'.$message.'</div>';
        }
    ?>
  
    <div class="divForm">
            <?php
                echo '<form method="POST" action="index.php?action=enregAdminCreerEscapeGame&idLieu='.$idLieu.'&idEscapeGame='.$gabaritEscape[0]['idEscapeGame'].'" enctype="multipart/form-data" id="ajout_escape_form" class="contact-form contact-grid">';
                    require_once "includes/html/formulaire.class.php";

                    $formulaire = new formulaire($_POST);
            ?>

                    <div>
                        <div class='remplirFrancais'>Français</div>
                        <div class='remplirAnglais'>Anglais</div>
                    </div>

            <?php
                    echo "<h2 class='phpmyadmin-game-".$gabaritEscape[0]['idEscapeGame']."-titre'></h2>";
                    echo "<div><label class='adminAjout-cible' ></label><div class='phpmyadmin-game-".$gabaritEscape[0]['idEscapeGame']."-groupe_cible'></div><div>";
                    echo "<div><label class='adminAjout-prix' ></label><div class=''>".$gabaritEscape[0]['prix_game']."</div><div>";
                    echo "<div><label class='adminAjout-niveauparcours' ></label><div class='adminAjout-niveau-".$gabaritEscape[0]['niveau_parcours']."'></div><div>";
                    echo "<div><label class='adminAjout-niveaupuzzle' ></label><div class='adminAjout-niveau-".$gabaritEscape[0]['niveau_puzzle']."'></div><div>";

            ?> 

                    <div id='formulaireFr'>
                        <?php
                                echo $formulaire->textAreaIP('descriptionfr', $gabEscapetrad['description']['fr'], 'adminAjout-description');
                        ?>
                    </div>

                    <div id='formulaireEn'>
                        <?php
                                echo $formulaire->textAreaIP('descriptionen', $gabEscapetrad['description']['en'], 'adminAjout-description');
                        ?>
                    </div>



                    <div class=ligne></div> <!-- une ligne pour marquer la séparation entre la partie commun au francais et l'anglais et les parti qui change -->


                    <div class="prix">
                        <label class="label adminAjout-prix">Durée</label>
                        <div><?php echo $formulaire->inputNumberIP('duree', $gabaritEscape['nbclient']);?> heures</div>
                    </div>

                    <fieldset>
                        <legend>Langues</legend>
                        <div>
                            <input type="checkbox" id="fr" name="langues[]" value='fr' checked />
                            <label for="fr">Français</label>
                        </div>
                        <div>
                            <input type="checkbox" id="en" name="langues[]" value='en' />
                            <label for="en">Anglais</label>
                        </div>
                    </fieldset>


                    <div id='formulaireFr'>
                        <?php
                                echo $formulaire->textAreaIP('histoirefr', $gabEscapetrad['histoire']['fr'], 'adminAjout-histoire');
                                echo $formulaire->inputTextI('adressefr', '--------');
                                //le pays est mis automatiquement en france (site pour la france)
                        ?>
                    </div>

                    <div id='formulaireEn'>
                        <?php
                                echo $formulaire->textAreaIP('histoireen', $gabEscapetrad['description']['en'], 'adminAjout-histoire');
                                echo $formulaire->inputTextI('adresseen', '--------');
                        ?>
                    </div>

                    <?php 
                        echo $formulaire->inputTextI('ville', '--------');
                        echo $formulaire->inputTextI('code_postal', '---------');
                        echo $formulaire->inputText('coordonne', '---------'); //label = Coordonné (X.XXX,Y.YYYY)
                    ?>

                    <fieldset>
                        <legend>Transports</legend>
                        <div>
                            <input type="checkbox" id="parking" name="transports[]" value='parking' checked />
                            <label for="parking">Parking</label>
                        </div>
                        <div>
                            <input type="checkbox" id="train" name="transports[]" value='train' />
                            <label for="train">Train</label>
                        </div>
                        <div>
                            <input type="checkbox" id="bus" name="transports[]" value='bus' />
                            <label for="bus">Bus</label>
                        </div>
                    </fieldset>


                    <!-- mettre images et créneaux ici -->
                    

                    <!-- plusieurs photos -->
                    <div class="plus_de_photo">
                        <label for="file">Ajouter plus de photo</label>
                        <input type="file" id="files" name="files[]" accept="image/png, image/jpeg, image/jpg" multiple /><!--photos de présentation-->
                        <div>(png, jpeg, jpg) max 700 ko</div>
                    </div>



                    <div class="prix">
                        <label class="label adminAjout-nbclient">Nombre maximum de client</label>
                        <div><?php echo $formulaire->inputNumberIP('nbclient', $gabaritEscape['nbclient']);?> clients</div>
                    </div>


                    <div id='formulaireFr'>
                        <?php
                                echo $formulaire->inputText('rdvfr', 'adminAjout-rdv');
                                echo $formulaire->textAreaP('contientfr', $gabEscapetrad['contenu']['fr'], 'adminAjout-contient');
                                echo $formulaire->textAreaP('apporterfr', $gabEscapetrad['a_apporter']['fr'], 'adminAjout-apporter');
                                echo $formulaire->textAreaP('importantfr', $gabEscapetrad['info_importante']['fr'], 'adminAjout-important');
                                echo $formulaire->textAreaP('exigencefr', $gabEscapetrad['exigence']['fr'], 'adminAjout-exigence');
                                echo $formulaire->textArea('autrefr', 'adminAjout-autre');



                        ?>
                    </div>

                    <div id='formulaireEn'>
                        <?php
                                echo $formulaire->inputText('rdven', 'adminAjout-rdv');
                                echo $formulaire->textAreaP('contienten', $gabEscapetrad['contenu']['en'], 'adminAjout-contient');
                                echo $formulaire->textAreaP('apporteren', $gabEscapetrad['a_apporter']['en'], 'adminAjout-apporter');
                                echo $formulaire->textAreaP('importanten', $gabEscapetrad['info_importante']['en'], 'adminAjout-important');
                                echo $formulaire->textAreaP('exigenceen', $gabEscapetrad['exigence']['en'], 'adminAjout-exigence');
                                echo $formulaire->textArea('autreen', 'adminAjout-autre');
                        ?>
                    </div>


            <input  class="btn" type="submit" class="valid" name="ok" value="Créer">
        </form>
        <!-- <h1>Ajouter des créneaux horaires pour un escape game</h1>
                    <div id="calendar"></div>
                    <button onclick="ajouterCreneaux()">Ajouter les créneaux sélectionnés</button> -->
    </div>
</div>
