<?php
  $titre = "Ajouter un nouveau produit";
  $styles = "<link href='style/styleContact.css' rel='stylesheet'>";
  $Hacceuil='<section class="sectionTitre">
                <div class="titrePage">
                    <h1> '.$titre.'</h1>
                </div>
            </section>';
?>

<div class="resultat">

    <?php
        if(isset($message)){
            echo '<div class="erreur">Erreur :'.$message.'</div>';
        }
    ?>
  
    <div class="divForm">
        <form method="POST" action="index.php?action=enregAdminAjoutCarte" enctype="multipart/form-data" id="contact_form" class="contact-form contact-grid">
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
                                echo $formulaire->inputTextI('raisonsfr', 'adminAjout-raisons');
                                echo $formulaire->textAreaI('descriptionfr', 'adminAjout-description');
                        ?>
                    </div>

                    <div id='formulaireEn'>
                        <?php
                                echo $formulaire->inputTextI('titreen', 'adminAjout-titre');
                                echo $formulaire->inputTextI('raisonsen', 'adminAjout-raisons');
                                echo $formulaire->textAreaI('descriptionen', 'adminAjout-description');
                        ?>
                    </div>

                    <div class=ligne></div> <!-- une ligne pour marquer la séparation entre la partie commun au francais et l'anglais et les parti qui change -->

                      <!-- plusieurs photos -->
                    <div class="plus_de_photo">
                        <label for="file">Ajouter la photo principale</label>
                        <input type="file" id="file" name="file[]" accept="image/png, image/jpeg, image/jpg" required/><!--photos de présentation-->
                        <div>(png, jpeg, jpg)</div>
                    </div>


                    <div class="prix">
                        <label class="label adminAjout-prix">Prix</label>
                        <div><input type='number' id='prix' name='prix'> €</div>
                    </div>

                    <!-- réfléchir pour ajouter les valeur possible du bon -->
                    <div class="choix_bon">
                        <div class="valeurs">
                            <label class="label adminAjout-valeur">Valeurs possibles</label>
                            <div><input type='number' id='valeur' name='valeur'> €</div>
                        </div>
                        <button type="button" id="ajouterInput">Ajouter une valeur</button>
                    </div>

                    <div class="delai">
                        <label class="label adminAjout-delai">Delais de livraison</label>
                        <div><input type='number' id='delai' name='delai'><div class='adminAjout-jours'>jours</div></div>
                    </div>

                    <div class="form-field subject">
                      <label class="label adminAjout-taille-label"></label>
                      <select name="taille" form="contact_form" required>
                        <option value="1" class="adminAjout-taille-1" selected></option>
                        <option value="2" class="adminAjout-taille-2"></option>
                        <option value="3" class="adminAjout-taille-3"></option>
                      </select>
                    </div>

                      <!-- plusieurs photos -->
                    <div class="plus_de_photo">
                        <label for="file">Ajouter plus de photo</label>
                        <input type="file" id="files" name="files[]" accept="image/png, image/jpeg, image/jpg" multiple /><!--photos de présentation-->
                        <div>(png, jpeg, jpg)</div>
                    </div>

<!-- titre
img (miniature)
prix
valeurs bon (liste)
description
raison possible
délai de livraison
taille colis  -->

            <input  class="btn" type="submit" class="valid" name="ok" value="Créer">
        </form>
    </div>
</div>
