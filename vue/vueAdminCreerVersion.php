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
            echo '<div class="erreur"><span class="message-erreur"> <span> '.$message.'</div>';
        }

        var_dump($_POST);
        var_dump($gabaritEscape);
    ?>
  
    <div class="divForm">
            <?php
                echo '<form method="POST" action="index.php?action=enregAdminCreerVersion&idLieu='.$idLieu.'&idEscapeGame='.$gabaritEscape['idEscapeGame'].'" enctype="multipart/form-data" id="ajout_escape_form" class="contact-form contact-grid">';
                    require_once "includes/html/formulaire.class.php";

                    $formulaire = new formulaire($_POST);
            ?>

                        <div class='remplirFrancais btn adminAjout-langues-1'> </div>
                        <div class='remplirAnglais btn adminAjout-langues-2'> </div>

            <?php
                    echo "<h2 class='phpmyadmin-game-".$gabaritEscape['idEscapeGame']."-titre'></h2>";
                    echo "<div class='groupe'><label class='adminAjout-cible' ></label><div class='phpmyadmin-game-".$gabaritEscape['idEscapeGame']."-groupe_cible'></div></div>";
                    echo "<div class='prix'><label class='adminAjout-prix' ></label><div class=''>".$gabaritEscape['prix_game']."</div></div>";
                    echo "<div class='niveau'><label class='adminAjout-niveauparcours' ></label><div class='adminAjout-niveau-".$gabaritEscape['niveau_parcours']."'></div></div>";
                    echo "<div class='niveaupuzzle'><label class='adminAjout-niveaupuzzle' ></label><div class='adminAjout-niveau-".$gabaritEscape['niveau_puzzle']."'></div></div>";

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
                        <label class="label adminAjout-duree"></label>
                        <div class="adminAjout-heures"><?php echo $formulaire->inputNumberIP('duree', $gabaritEscape['nbclient']);?></div>
                    </div>

                    <fieldset class="fieldLangues">
                        <legend>Langues</legend>
                        <div>
                            <input type="checkbox" id="fr" name="langues[]" value='fr' checked />
                            <label for="fr" class="adminAjout-langues-1"> </label>
                        </div>
                        <div>
                            <input type="checkbox" id="en" name="langues[]" value='en' />
                            <label for="en" class="adminAjout-langues-2"> </label>
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
                            <label for="parking" class="adminAjout-transports-1"></label>
                        </div>
                        <div>
                            <input type="checkbox" id="train" name="transports[]" value='train' />
                            <label for="train" class="adminAjout-transports-2"> </label>
                        </div>
                        <div>
                            <input type="checkbox" id="bus" name="transports[]" value='bus' />
                            <label for="bus" class="adminAjout-transports-3"></label>
                        </div>
                    </fieldset>


                    <!-- mettre images et créneaux ici -->
                    

                    <!-- plusieurs photos -->
                    <div class="plus_de_photo">
                        <label for="file" class="adminAjout-photoPrincipale"> </label>
                        <input type="file" id="files" name="files[]" accept="image/png, image/jpeg, image/jpg" multiple /><!--photos de présentation-->
                        <div>(png, jpeg, jpg) max 700 ko</div>
                    </div>



                    <div class="prix">
                        <label class="label adminAjout-nbclient"> </label>
                        <div><?php echo $formulaire->inputNumberIP('nbclient', $gabaritEscape['nbclient']);?><div class="adminAjout-clients"> </div></div>
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


            <input  class="btn boutonFormulaire" type="submit" class="valid" name="ok" value="Créer">
        </form>
        <!-- <h1>Ajouter des créneaux horaires pour un escape game</h1>
                    <div id="calendar"></div>
                    <button onclick="ajouterCreneaux()">Ajouter les créneaux sélectionnés</button> -->
    </div>
</div>
