<?php
  $titre = "Liste des commandes";
  $styles = "<link href='style/styleContact.css' rel='stylesheet'>";
  $Hacceuil='<section class="sectionTitre">
              <div class="titrePage">
                      <h1 class="contact-titre">  </h1>
                      <p class="contact-description">  </p>
                      <div class="infoContact">
                          <div>
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                              07668996660
                          </div>
                          <div>
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                              <a id="mailto" href="mailto:booking@we-escape.de"> booking@we-escape.de </a>
                          </div>
                      </div>
              </div>
            </section>';
?>

<div class="resultat">
  <?php 
  if(isset($_POST['comment-box'])){
    $retour = mail('aurehau6@gmail.com', 'Envoi depuis la page Contact', $_POST['comment-box'], 'From: aurehau6@gmail.com');
    if ($retour)
        echo '<p contact-messageEnvoye ></p>';
  }
    ?>

  <div class="divForm">
                <form method="post" action="index.php?action=contact" id="contact_form" class="contact-form contact-grid">
                  
                <?php
                    require_once "includes/html/formulaire.class.php";

                    $formulaire = new formulaire($_POST);

                    echo $formulaire->inputTextI('name', 'contact-nom-prenom');
                    echo $formulaire->inputEmail('email', 'contact-email');
                    echo $formulaire->inputTelI('phone', 'contact-tel');
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
                    echo $formulaire->textAreaI('comment-box', 'contact-message');
                  ?>
                  
                  <div class="submit-button">
                      <button id="submit-btn" class="btn contact-envoie" type="submit" value="submit" onclick="validateForm()"></button>
                  </div>
                    
                </form>

        </div>

</div>

