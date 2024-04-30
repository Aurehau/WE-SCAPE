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

  <?php 
  $maVariable=array(
    array(
        'title' => 'Escape Game 3',
        'description' => 'Détails de l\'escape game 1',
        'start' => '2024-04-30',
        'backgroundColor' => '#FFAE00',
        'borderColor' => '#FFAE00',
        'textColor' => '#000'
    ),
    array(
        'title' => 'Escape Game 4',
        'description' => 'Détails de l\'escape game 1',
        'start' => '2024-05-02',
        'backgroundColor' => '#FFAE00',
        'borderColor' => '#FFAE00',
        'textColor' => '#000'
    )
);

$maVariable[] = array(
  'title' => 'Escape Game 3',
  'description' => 'Détails de l\'escape game 3',
  'start' => '2024-05-05',
  'dure' => '#FFAE00',
  'borderColor' => '#FFAE00',
  'textColor' => '#000'
);
  $maVariablePHP=json_encode($reservations);
  var_dump($maVariablePHP);
  var_dump($reservations);

  foreach ($reservations as $value) {
    $maVariable[] = array(
      'title' => 'Escape Game 3',
      'start' => '2024-05-05',
      'dure' => '#FFAE00',
      'borderColor' => '#FFAE00',
      'textColor' => '#000'
    );
  }
  ?>
  <script>
    var contenuVariable = <?php echo json_encode($maVariable); ?>;
    console.log(contenuVariable); // Affiche le contenu de la variable PHP dans la console JavaScript
  </script>
  
</div>