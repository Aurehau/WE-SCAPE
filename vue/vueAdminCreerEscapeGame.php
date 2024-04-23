<?php
  $titre = "Ajouter une nouvelle escape game";
  $styles = "<link href='style/styleContact.css' rel='stylesheet'> <link rel='stylesheet' href='https://uicdn.toast.com/tui-calendar/latest/tui-calendar.css'>";
  $Hacceuil='<section class="sectionTitre">
                <div class="titrePage">
                    <h1> '.$titre.'</h1>
                </div>
            </section>';
?>

<div class="resultat">
    
    <?php
        /********** Il faut prendre en compte l'id du lieu ***********/
        
        if(isset($message)){
            echo '<div class="erreur">Erreur :'.$message.'</div>';
        }
    ?>
  
    <div class="divForm">
        <form method="POST" action="index.php?action=enregAdminAjoutCarte" enctype="multipart/form-data" id="ajout_escape_form" class="contact-form contact-grid">
            <?php
                    require_once "includes/html/formulaire.class.php";

                    $formulaire = new formulaire($_POST);
            ?>

                    <div>
                        <div class='remplirFrancais'>Français</div>
                        <div class='remplirAnglais'>Anglais</div>
                    </div>

                    <div id='formulaireFr'>
                        <?php
                                echo $formulaire->inputTextI('titrefr', 'adminAjout-titre');
                                echo $formulaire->inputTextI('ciblefr', 'adminAjout-cible');
                                echo $formulaire->textAreaI('descriptionfr', 'adminAjout-description');
                        ?>
                    </div>

                    <div id='formulaireEn'>
                        <?php
                                echo $formulaire->inputTextI('titreen', 'adminAjout-titre');
                                echo $formulaire->inputTextI('cibleen', 'adminAjout-cible');
                                echo $formulaire->textAreaI('descriptionen', 'adminAjout-description');
                        ?>
                    </div>



                    <div class=ligne></div> <!-- une ligne pour marquer la séparation entre la partie commun au francais et l'anglais et les parti qui change -->

                      <!-- miniature -->
                    <div class="plus_de_photo">
                        <label for="file">Ajouter la photo principale</label>
                        <input type="file" id="file" name="file[]" accept="image/png, image/jpeg, image/jpg" required/><!--photos de présentation-->
                        <div>(png, jpeg, jpg) max 700 ko</div>
                    </div>


                    <div class="prix">
                        <label class="label adminAjout-prix">Prix</label>
                        <div><?php echo $formulaire->inputNumberI('prix');?> €</div>
                    </div>

                    <div class="prix">
                        <label class="label adminAjout-prix">Durée</label>
                        <div><?php echo $formulaire->inputNumberI('duree');?> heures</div>
                    </div>

                    <fieldset>
                        <legend>Langues</legend>
                        <div>
                            <input type="checkbox" id="fr" name="langues" value='fr' checked />
                            <label for="fr">Français</label>
                        </div>
                        <div>
                            <input type="checkbox" id="en" name="langues" value='en' />
                            <label for="en">Anglais</label>
                        </div>
                    </fieldset>


                    <div id='formulaireFr'>
                        <?php
                                echo $formulaire->textAreaI('hisoitrefr', 'adminAjout-histoire');
                                echo $formulaire->inputText('adressefr', '--------');
                                //le pays est mis automatiquement en france (site pour la france)
                        ?>
                    </div>

                    <div id='formulaireEn'>
                        <?php
                                echo $formulaire->textAreaI('histoireen', 'adminAjout-histoire');
                                echo $formulaire->inputText('adresseen', '--------');
                        ?>
                    </div>

                    <?php 
                        echo $formulaire->inputText('ville', '--------');
                        echo $formulaire->inputText('code_postal', '---------');
                    ?>

                    <fieldset>
                        <legend>Transports</legend>
                        <div>
                            <input type="checkbox" id="parking" name="transports" value='parking' checked />
                            <label for="parking">Parking</label>
                        </div>
                        <div>
                            <input type="checkbox" id="train" name="transports" value='train' />
                            <label for="train">Train</label>
                        </div>
                        <div>
                            <input type="checkbox" id="bus" name="transports" value='bus' />
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

                    


                    <div class="form-field subject">
                      <label class="label adminAjout-niveauparcours-label"></label>
                      <select name="niveauparcours" form="ajout_escape_form" required>
                        <option value="1" class="adminAjout-niveau-1" selected></option>
                        <option value="2" class="adminAjout-niveau-2"></option>
                        <option value="3" class="adminAjout-niveau-3"></option>
                      </select>
                    </div>

                    <div class="form-field subject">
                      <label class="label adminAjout-niveaupuzzle-label"></label>
                      <select name="niveaupuzzle" form="ajout_escape_form" required>
                        <option value="1" class="adminAjout-niveau-1" selected></option>
                        <option value="2" class="adminAjout-niveau-2"></option>
                        <option value="3" class="adminAjout-niveau-3"></option>
                      </select>
                    </div>


                    <div id='formulaireFr'>
                        <?php
                                echo $formulaire->inputTextI('rdvfr', 'adminAjout-rdv');
                                echo $formulaire->textAreaI('contientfr', 'adminAjout-contient');
                                echo $formulaire->textAreaI('apporterfr', 'adminAjout-apporter');
                                echo $formulaire->textAreaI('importantfr', 'adminAjout-important');
                                echo $formulaire->textAreaI('exigencefr', 'adminAjout-exigence');
                                echo $formulaire->textAreaI('autrefr', 'adminAjout-autre');



                        ?>
                    </div>

                    <div id='formulaireEn'>
                        <?php
                                echo $formulaire->inputTextI('rdven', 'adminAjout-rdv');
                                echo $formulaire->textAreaI('contienten', 'adminAjout-contient');
                                echo $formulaire->textAreaI('apporteren', 'adminAjout-apporter');
                                echo $formulaire->textAreaI('importanten', 'adminAjout-important');
                                echo $formulaire->textAreaI('exigenceen', 'adminAjout-exigence');
                                echo $formulaire->textAreaI('autreen', 'adminAjout-autre');
                        ?>
                    </div>


            <input  class="btn" type="submit" class="valid" name="ok" value="Créer">
        </form>
        <!-- <h1>Ajouter des créneaux horaires pour un escape game</h1>
                    <div id="calendar"></div>
                    <button onclick="ajouterCreneaux()">Ajouter les créneaux sélectionnés</button> -->
    </div>
</div>
