<?php
  $titre = "Ajouter un nouveau produit";
  $styles = "<link href='style/styleContact.css' rel='stylesheet'>";
  $Hacceuil='<section class="sectionTitre">
                <div class="titrePage">
                    <h1 class="adminAjout-ajoutcarteTitre"> </h1>
                </div>
            </section>';
?>

<div class="resultat">

    <?php
        if(isset($message)){
            echo '<div class="erreur"><span class="message-erreur"> </span> '.$message.'</div>';
        }
    ?>
  
    <div class="divForm">
        <form method="POST" action="index.php?action=enregAdminAjoutCarte" enctype="multipart/form-data" id="ajout_produit_form" class="contact-form contact-grid">
            <?php
                    require_once "includes/html/formulaire.class.php";

                    $formulaire = new formulaire($_POST);
            ?>

                    
                    <div class='remplirFrancais btn adminAjout-langues-1'>Français</div>
                    <div class='remplirAnglais btn adminAjout-langues-2'>Anglais</div>
                

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
                        <label for="file" class="adminAjout-photoPrincipale"></label>
                        <input type="file" id="file" name="file[]" accept="image/png, image/jpeg, image/jpg" required/><!--photos de présentation-->
                        <div>(png, jpeg, jpg) max 700 ko</div>
                    </div>


                    <div class="prix">
                        <label class="label adminAjout-prix"> </label>
                        <div><?php echo $formulaire->inputNumberI('prix');?> €</div>
                    </div>

                    <!-- réfléchir pour ajouter les valeur possible du bon -->
                    <div class="choix_bon">
                        <div class="valeurs">
                            <label class="label adminAjout-valeur"></label>
                            <div><?php echo $formulaire->inputNumber('valeur');?> €</div>
                            <div class=ajoutinput0></div>
                        </div>
                        <button type="button" id="ajouterInput" class="adminAjout-ajoutValeur"></button>
                    </div>

                    <div class="delai">
                        <label class="label adminAjout-delai"></label>
                        <div><?php echo $formulaire->inputNumberI('delai');?><div class='adminAjout-jours'></div></div>
                    </div>

                    <div class="form-field subject">
                      <label class="label adminAjout-taille-label"></label>
                      <select name="taille" form="ajout_produit_form" required>
                        <option value="1" class="niveau-taille-1" selected></option>
                        <option value="2" class="niveau-taille-2"></option>
                        <option value="3" class="niveau-taille-3"></option>
                      </select>
                    </div>

                      <!-- plusieurs photos -->
                    <div class="plus_de_photo">
                        <label for="file" class="adminAjout-photos"></label>
                        <input type="file" id="files" name="files[]" accept="image/png, image/jpeg, image/jpg" multiple /><!--photos de présentation-->
                        <div>(png, jpeg, jpg) max 700 ko</div>
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
