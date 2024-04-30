<?php
  $titre = "Créé votre compte";
  $styles = "<link href='style/styleContact.css' rel='stylesheet'>";
  $Hacceuil='<section class="sectionTitre">
                <div class="titrePage">
                    <h1 class="compte-titre"> </h1>
                </div>
            </section>';
?>

<div class="resultat">

    <?php
        if(isset($message)){
            echo '<div class="erreur""><span class="message-erreur"> <span> '.$message.'</div>';
        }
    ?>
  
    <div class="divForm">
        <form method="POST" action="index.php?action=enregCompte" id="contact_form" class="contact-form contact-grid">
            <?php
                    require_once "includes/html/formulaire.class.php";

                    $formulaire = new formulaire($_POST);

                    echo $formulaire->inputTextI('nom', 'contact-nom');
                    echo $formulaire->inputTextI('prenom', 'contact-prenom');
                    echo $formulaire->inputEmail('email', 'contact-email');
                    echo $formulaire->inputTel('tel', 'contact-tel');
                    echo $formulaire->inputText('adresse', '--------');
                    echo $formulaire->inputText('ville', '--------');
                    echo $formulaire->inputText('code_postal', '---------');
                    echo $formulaire->inputText('pays', '-------');
                    echo $formulaire->inputMdp('mdp', '------');
                    echo $formulaire->inputMdp('mdpConfirmation', '------');

                ?>
            <input  class="btn" type="submit" class="valid" name="ok" value="Créer">
        </form>
        <a href="index.php?action=connexion" class="compte-inscrit"></a>
    </div>
</div>
