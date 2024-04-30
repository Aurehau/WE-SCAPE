<?php
        $lieu = new lieu();
        $lieux = $lieu->getLieux(); // Appel de la méthode pour récupérer les lieux
        
        if ($_SESSION['acces']=="admin"){
                echo "<li><a href='index.php?action=adminAjoutLieu'> <spanclass='adminAjout-ajouterLieu'> </span></a></li>";
        }


        foreach ($lieux as $lieu){
                echo "<li><a href='index.php?action=Lieu&idLieu=".$lieu['idLieu']."'>".$lieu['nom_lieu']."</a></li>";
        }
        