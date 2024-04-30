<?php
  $titre = "Liste des commandes";
  $styles = "<link href='style/stylePanier.css' rel='stylesheet'>";
  $Hacceuil='<section class="sectionTitre">
              <div class="titrePage">
                      <h1 class="panier-titre"> </h1>
              </div>
            </section>';
?>

<div class="resultat conteneur">
    
    <?php
        if(isset($message)){
            echo '<div class="erreur"><span class="message-erreur"> <span> '.$message.'</div>';
        }
    ?>

    <div class="container">
        <div class="panier">
            <h2 class='panier-titre2'></h2>
            <div class="articles">
                <?php

                $total=0;

                foreach ($panier as $key => $value) {
                    if($value["quantite"]==NULL){
                        $panier[$key]["nom"]="<a href='index.php' class='btnPanier phpmyadmin-game-".$value["nom"]."-titre'></a>";
                        $total+=$value["prix"];
                    }else {
                        $panier[$key]["nom"]="<a href='index.php' class='btnPanier phpmyadmin-produit-".$value["nom"]."-titre'></a>";
                        $total+=($value["prix"]*$value["quantite"]);
                        $panier[$key]["quantite"]="x ".$value["quantite"];
                    }
                    $panier[$key]["prix"].=' €';
                    $panier[$key]["supr"]='<a href="index.php" class="supr">-</a>';
                }

                    require_once "includes/html/tableau.class.php";

                    $tableau = new tableau();
                    $contenu = ['panier-nomproduit','panier-quantite','panier-prix'];

                    echo $tableau->head($contenu);
                    echo $tableau->body($panier);
                    echo $tableau->foot();

                ?>
                <!-- Répétez cette div pour chaque article dans le panier -->
            </div>
            
            
                <form method="post" action="index.php?action=login" class="promo">
                    <?php
                            require_once "includes/html/formulaire.class.php";

                            $formulaire = new formulaire($_POST);

                            echo $formulaire->inputText('code_promo', 'panier-promo');

                        ?>
                        <button class="bouton panier-bouton"> </button>
                </form>
            
        </div>
        
        <div class="total">
            <p>Total</p>
            <p>
                <?php 
                    $total=number_format($total, 2, ',', ' ');
                    echo $total;
                ?> €
            </p>
        </div>
        
        <div>
            
        </div><a href="achat.html"><button class="bouton" id="submit-btn class='panier-achat'"> </button></a>
    </div>

</div>

