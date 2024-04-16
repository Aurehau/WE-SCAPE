<?php
  $titre = "Liste des commandes";
  $styles = "<link href='style/styleContact.css' rel='stylesheet'>";
?>

<div class="resultat">
  
    <div class="card modif_compte">
        <h1>Connexion</h1>
        <form method="post" action=<?= "index.php?action=login"?>>
            <div class="message"><?php echo (isset($message))?$message:"";?></div>
            <?php
                    require_once "includes/html/formulaire.class.php";

                    $formulaire = new formulaire($_POST);

                    echo $formulaire->inputEmail('email', 'contact-email');
                    echo $formulaire->inputMdp('mdp', '------');

                ?>
            <input  class="boutton_connexion B_rencontre" type="submit" class="valid" name="ok" value="Connexion">
        </form>
        <a href="index.php?action=creer_compte">Je n’ai pas de compte !</a>
    </div>
</div>
