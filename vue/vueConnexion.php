<?php
  $titre = "Connexion";
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
        <form method="post" action="index.php?action=login" id="contact_form" class="contact-form contact-grid">
            <?php
                    require_once "includes/html/formulaire.class.php";

                    $formulaire = new formulaire($_POST);

                    echo $formulaire->inputEmail('email', 'contact-email');
                    echo $formulaire->inputMdp('mdp', '------');

                ?>
            <input  class="btn" type="submit" class="valid" name="ok" value="Connexion">
        </form>
        <a href="index.php?action=creer_compte">Je n’ai pas de compte !</a>
    </div>
</div>
