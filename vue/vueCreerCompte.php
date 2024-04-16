<?php
  $titre = "Créé votre compte";
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
  
    <div class="card modif_compte">
        <form method="post" action="index.php?action=login">
            <?php
                    require_once "includes/html/formulaire.class.php";

                    $formulaire = new formulaire($_POST);

                    echo $formulaire->inputText('nom', 'contact-nom');
                    echo $formulaire->inputText('prenom', 'contact-prenom');
                    echo $formulaire->inputEmail('email', 'contact-email');
                    echo $formulaire->inputTel('tel', 'contact-tel');
                    echo $formulaire->inputText('adresse', '--------');
                    echo $formulaire->inputText('ville', '--------');
                    echo $formulaire->inputText('code_postal', '---------');
                    echo $formulaire->inputText('pays', '-------');
                    echo $formulaire->inputMdp('mdp', '------');
                    echo $formulaire->inputMdp('mdpConfirmation', '------');

                ?>
            <input  class="boutton_connexion B_rencontre" type="submit" class="valid" name="ok" value="Créer">
        </form>
        <a href="index.php?action=ctl_acces">J’ai un compte !</a>
    </div>
</div>
