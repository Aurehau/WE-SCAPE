<?php
  $titre = "Réservez votre aventure unique";
  $Hacceuil='<section class="sectionTitre">
              <div class="titrePage">
                      <h1 class="reservations-titre"> </h1>
              </div>
            </section>';
  $styles = "<link href='style/styleReservations.css' rel='stylesheet'>";
?>

<div class="resultat">

  <!---------------------------- CONTENU AVENTURE  ---------------------------->

  <div class="contenuAventure">
      <h1 class='Aventure-titre'> </h1>
  </div>

  <div id="calendar"></div>

  <div id="eventModal" class="modal" style="display: none;">
    <div class="modal-content">
      <span class="close" onclick="closeModal()">&times;</span>
      <h2>Détails</h2>
      <h3 id="eventTitre"></h3>
      <h4>Début</h4>
      <div id="eventDebut">contennu</div>
      <h4>Durée</h4>
      <div><span id="eventDure"></span>h</div>
      <h4>Adresse</h4>
      <div>
        <span id="eventAdresse"></span> <span id="eventVille"></span> <span id="eventPostal"></span><br>
        <span>France</span>
      </div>
    </div>
  </div>

  <?php 
  $maVariable=array();

  foreach ($reservations as $value) {
    $maVariable[] = array(
      'title' => $escapes[$value['idEscapeGame']]['titre']['fr'],
      'start' => $value['date_reservation'],
      'dure' => $value['durée'],
      'idVersion' => $value['idVersion'],
      'idEscape' => $value['idEscapeGame'],
      'code_postal' => $value['code_postal'],
      'ville' => $value['ville'],
      'backgroundColor' => '#FFAE00',
      'borderColor' => '#FFAE00',
      'textColor' => '#000'
    );
  }
  ?>
  <script>
    var contenuVariable = <?php echo json_encode($maVariable); ?>;
    
  </script>
  
</div>