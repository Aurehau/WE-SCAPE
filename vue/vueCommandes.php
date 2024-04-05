<?php
  $titre = "Liste des commandes";
  $styles = "";
?>

<div class="resultat">
  <?php
    if (count($commandes)) {

      require_once "includes/html/tableau.class.php";

      echo tableau::head(array_merge([""], array_keys($commandes[0])));

      foreach($commandes as $ligne){
        $lien="<a class='action' href='index.php?action=commande&idComm={$ligne["N° Commande"]}'>Afficher</a>";
        echo tableau::row(array_merge([$lien],$ligne));
      }
      echo tableau::foot();




      // Affichage des titres de colonnes du tableau
/*       echo '<table><tr>';
      echo '<th class="invisible"></th>';   // Première colonne utilisée pour afficher le détail de la commande
      foreach($commandes[0] as $cle => $valeur)
      {
        echo '<th>'.$cle.'</th>';
      }
      echo '</tr>';
      
      // Affichage des lignes du tableau
      foreach($commandes as $ligne)
      {
        echo '<tr>';
        echo '<td><a class="action" href="index.php?action=commande&idComm='.$ligne["N° Commande"].'">Afficher</a></td>';
        // Affichage des valeurs d'une ligne
        foreach($ligne as $valeur)
        {
          echo '<td>'.$valeur.'</td>';
        }
        echo '</tr>';
      }
      echo '</table>'; */
    }
    else
      echo "<div class='reponse'>Aucune commande n'est enregistrée dans la liste</div>";
  ?>
</div>

