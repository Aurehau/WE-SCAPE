<?php
  $titre = "Liste des clients";
  $styles = '<link href="style/styleCarteCadeaux.css" rel="stylesheet">';
  $Hacceuil='<section class="sectionTitre">
              <div class="titrePage">
                      <h1> '.$titre.'</h1>
              </div>
            </section>';
?>

<div class="resultat">

  <?php
    /* if (count($clients)) {
      require_once "includes/html/tableau.class.php";

      echo tableau::head(array_keys($clients[0]));
      echo tableau::body($clients);
      echo tableau::foot();

      // Affichage des titres de colonnes du tableau
      echo '<table><tr>';
      foreach($clients[0] as $cle => $valeur) {
        echo '<th>'.$cle.'</th>';
      }
      echo '</tr>';
      
      // Affichage des lignes du tableau
      foreach($clients as $ligne) {
        echo '<tr>';
        // Affichage des valeurs d'une ligne
        foreach($ligne as $valeur) {
          echo '<td>'.$valeur.'</td>';
        }
        echo '</tr>';
      }
      echo '</table>';
    }
    else{
      echo "<div class='reponse'>Aucun client n'est enregistré dans la liste</div>";
    } */
  ?>

<p><a href="index.php?action=ajoutClient"><button class="valid">Ajouter un client</button></a></p>

</div>

