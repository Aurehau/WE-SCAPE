<?php
  $titre = "Liste des commandes";
  $styles = "<link href='style/stylePanier.css' rel='stylesheet'>";
  $Hacceuil='<section class="sectionTitre">
              <div class="titrePage">
                      <h1 class="panier-titre">Panier</h1>
              </div>
            </section>';
?>

<div class="resultat">
    
    <?php
        if(isset($message)){
            echo '<div class="erreur">Erreur : '.$message.'</div>';
        }
    ?>

    <div class="container">
        <div class="panier">
            <h2>Votre Panier</h2>
            <div class="articles">
                <div class="article">
                    <p>Nom du produit</p>
                    <p>Prix</p>
                </div>
                <!-- Répétez cette div pour chaque article dans le panier -->
            </div>
            
            
                <form method="post" action="index.php?action=login" class="promo">
                    <?php
                            require_once "includes/html/formulaire.class.php";

                            $formulaire = new formulaire($_POST);

                            echo $formulaire->inputText('code_promo', 'panier-promo');

                        ?>
                        <button class="bouton">Appliquer</button>
                </form>
            
        </div>
        
        <div class="total">
            <p>Total</p>
            <p>Prix total ici</p>
        </div>
        
        <div>
            
        </div><a href="achat.html"><button class="bouton" id="submit-btn">Je passe à l'achat</button></a>
    </div>

</div>
