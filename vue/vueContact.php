<?php
  $titre = "Liste des commandes";
  $styles = "<link href='style/styleContact.css' rel='stylesheet'>";
?>

<div class="resultat">
  <?php 
  if(isset($_POST['comment-box'])){
    $retour = mail('aurehau6@gmail.com', 'Envoi depuis la page Contact', $_POST['comment-box'], 'From: aurehau6@gmail.com');
    if ($retour)
        echo '<p>Votre message a bien été envoyé.</p>';
  }
    ?>
  <section class="sectionReservation">

  <div class="titreReservation">

          <h1 class="contact-titre">  </h1>
          <p class="contact-description">  </p>

  </div>

  </section>
  <div class="divForm">
                <form method="post" action="index.php?action=contact" id="contact_form" class="contact-form contact-grid">
                  
                <?php
                    require_once "includes/html/formulaire.class.php";

                    $formulaire = new formulaire($_POST);

                    echo $formulaire->inputText('name', 'contact-nom-prenom');
                    echo $formulaire->inputEmail('email', 'contact-email');
                    echo $formulaire->inputTel('phone', 'contact-tel');
                ?>
                
                  <div class="form-field subject">
                      <label class="label contact-objet-label"></label>
                      <select name="subject" form="contact_form" required>
                        <option value="appointment" class="contact-objet-1" selected></option>
                        <option value="cancellation" class="contact-objet-2"></option>
                        <option value="order" class="contact-objet-3"></option>
                        <option value="order" class="contact-objet-4"></option>
                        <option value="other" class="contact-objet-5"></option>
                      </select>
                  </div>

                  <?php
                    echo $formulaire->textArea('comment-box', 'contact-message');
                  ?>
                  
                  <div class="submit-button">
                      <button id="submit-btn" class="btn contact-envoie" type="submit" value="submit" onclick="validateForm()"></button>
                  </div>
                    
                </form>

        </div>

</div>

