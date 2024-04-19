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
        <form method="POST" action="index.php?action=enregCompte" id="contact_form" class="contact-form contact-grid">
            <?php
                    require_once "includes/html/formulaire.class.php";

                    $formulaire = new formulaire($_POST);

                    echo $formulaire->inputTextI('titre', 'adminAjout-titre');
                    ?>
                      <!-- plusieurs photos -->
                      <div class="plus_de_photo">
                        <label for="file">Ajouter la photo principale</label>
                        <input type="file" id="file" name="file[]" accept="image/png, image/jpeg, image/jpg" /><!--photos de présentation-->
                    </div>
            <?php
                    /*réfléchir pour ajouter la miniature */
                    echo $formulaire->inputTextI('prix', 'adminAjout-prix');
            ?>
                    <!-- réfléchir pour ajouter les valeur possible du bon -->
                    <div class="choix_bon">
                        <div class="valeurs">
                            <label class="label adminAjout-valeur">Valeurs possibles</label>
                            <div><input type='text' id='valeur' name='valeur'> €</div>
                        </div>
                        <button type="button" id="ajouterInput">Ajouter une valeur</button>
                    </div>


            <?php
                    echo $formulaire->textAreaI('description', 'adminAjout-description');
                    echo $formulaire->inputTextI('raisons', 'adminAjout-raisons');
                    echo $formulaire->inputTextI('delai', 'adminAjout-delai');
            ?>
                    <div class="form-field subject">
                      <label class="label adminAjout-taille-label"></label>
                      <select name="taille" form="contact_form" required>
                        <option value="petit" class="adminAjout-taille-1" selected></option>
                        <option value="moyen" class="adminAjout-taille-2"></option>
                        <option value="grand" class="adminAjout-taille-3"></option>
                      </select>
                    </div>

                      <!-- plusieurs photos -->
                    <div class="plus_de_photo">
                        <label for="file">Ajouter plus de photo</label>
                        <input type="file" id="files" name="files[]" accept="image/png, image/jpeg, image/jpg" multiple /><!--photos de présentation-->
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
        <a href="index.php?action=connexion">J’ai un compte !</a>
    </div>
</div>
