<?php
  $titre = "Liste des commandes";
  $styles = "<link href='style/styleContact.css' rel='stylesheet'>";
?>

<div class="resultat">
  
    <div class="card modif_compte">
        <h1>Créé votre compte</h1>
        <form method="post" action=<?= "index.php?action=login"?>>
            <div class="message"><?php echo (isset($message))?$message:"";?></div>
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
