<?php
  $titre = "Réservez votre aventure unique";
  $Hacceuil='<section class="sectionTitre">
              <div class="titrePage">
                      <h1> '.$titre.'</h1>
              </div>
            </section>';
  $styles = "<link href='style/styleReservations.css' rel='stylesheet'>";
?>

<div class="resultat">

  <!---------------------------- CONTENU AVENTURE  ---------------------------->

  <div class="contenuAventure">
      <h1> Calendrier de réservations à venir </h1>
  </div>

  <div id="calendar"></div>

  <div id="eventModal" class="modal" style="display: none;">
    <div class="modal-content">
      <span class="close" onclick="closeModal()">&times;</span>
      <h2>Détails</h2>
      <h3>Description</h3>
      <div id="eventDetails">contennu</div>
      <h3>Début</h3>
      <div id="eventDetails">contennu</div>
      <h3>Durée</h3>
      <div id="eventDetails">contennu</div>
      <h3>Adresse</h3>
      <div id="eventDetails">contennu</div>
    </div>
  </div>
  
</div>
