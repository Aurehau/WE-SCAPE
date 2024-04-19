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
                    /*réfléchir pour ajouter la miniature */
                    echo $formulaire->inputTextI('prix', 'adminAjout-prix');
                    /*réfléchir pour ajouter les valeur possible du bon */
                    echo $formulaire->textAreaI('description', 'adminAjout-description')
                    echo $formulaire->inputTextI('raisons', 'adminAjout-raisons');
                    echo $formulaire->inputTextI('delai', 'adminAjout-delai');
                    echo $formulaire->inputTextI('taille', 'adminAjout-taille');

/*                     titre
img (miniature)
prix
valeurs bon (liste)
description
raison possible
délai de livraison
taille colis */

                ?>
            <input  class="btn" type="submit" class="valid" name="ok" value="Créer">
        </form>
        <a href="index.php?action=connexion">J’ai un compte !</a>
    </div>
</div>
