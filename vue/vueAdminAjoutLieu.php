<?php
  $titre = "Ajouter un nouveau lieu";
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
            echo '<div class="erreur"><span class="message-erreur"> <span> '.$message.'</div>';
        }
    ?>
  
    <div class="divForm">
        <form method="POST" action="index.php?action=enregAdminAjoutLieu" enctype="multipart/form-data" id="ajout_lieu_form" class="contact-form contact-grid">
            <?php
                    require_once "includes/html/formulaire.class.php";

                    $formulaire = new formulaire($_POST);

                    echo $formulaire->inputTextI('nomlieu', 'adminAjout-nomlieu');
            ?>
                    
                    <div class="plus_de_photo">
                        <label for="logo" class="adminAjout-logo"></label>
                        <input type="file" id="logo" name="logo[]" accept="image/png, image/jpeg, image/jpg" required/><!--photos de présentation-->
                        <div>(png, jpeg, jpg) max 700 ko</div>
                    </div>
                    
            <?php
                    echo $formulaire->inputTextI('video', 'adminAjout-video');
            ?>
                    
                      
                    <div class="plus_de_photo">
                        <label for="file adminAjout-photosLieu"></label>
                        <input type="file" id="file" name="file[]" accept="image/png, image/jpeg, image/jpg" required/><!--photos de présentation-->
                        <div>(png, jpeg, jpg) max 700 ko</div>
                    </div>

            <input  class="btn" type="submit" class="valid" name="ok" value="Créer">
        </form>
    </div>
</div>
