<?php

require_once "modele/panier.class.php";

require_once "vue/vue.class.php";
/*************************************
Classe chargée d'exécuter les actions demandées par l'utilisateur
*************************************/
class ctlpanier {

  private $panier;    // Nom du fichier permettant de générer le contenu pour la vue en fonction de l'action demandée
                          // Exemple : "vue/vueAccueil.php", "vue/vueArticles.php", "vue/vueErreur.php", ...
  /*******************************************************
  Initialise le nom du fichier requis pour générer le contenu à afficher dans la vue correspondant à l'action
    Entrée : 
      action [string] : action demandée

    Sortie :
      $fichierVue [string] : nom du fichier requis pour générer le contenu à afficher dans la vue

    Retour : 
      
  *******************************************************/
  public function __construct() {
    $this->panier = new panier();
  } 

  /*******************************************************
  Affiche dans le gabarit la vue correspondant à l'action demandée
    Entrée : 
      data [array] : tableau associatif contenant les données à afficher dans la vue
  
    Retour : 
      
  *******************************************************/

  public function reservations() {
    if ($_SESSION['panier']!="none") {
      $reservations = $this->panier->getReservations($_SESSION['panier']);
    }else{
      $reservations = 0;
    }
    $escapes=$this->panier->getEscapes();

    $vue = new vue("Reservations"); // Instancie la vue appropriée
    $vue->afficher(array("reservations" => $reservations, "escapes" => $escapes));

  }

  public function panier() {

    $panier = $this->panier->getPanier($_SESSION['panier']);
    $vue = new vue("Panier"); // Instancie la vue appropriée
    $vue->afficher(array("panier"=> $panier));
  }


  
  /*******************************************************
  Affiche dans le gabarit la vue correspondant à l'action demandée
    Entrée : 
      data [array] : tableau associatif contenant les données à afficher dans la vue
  
    Retour : 
      
  *******************************************************/

  public function enregProduitPanier($idProduit){
    
    extract($_POST);
    //var_dump($_POST);     /************pour test*******************/
    $message="";

    if(empty($valeur_bon)) $valeur_bon=0;
    if(empty($nombre)) $message.="Veuillez indiquer la durée de l'escape game<br>";   
    //ajout a la BDD
    if (empty($message)){
      
      var_dump($_SESSION['acces']);
      var_dump($_SESSION['panier']);
      if(($_SESSION['acces']=="none")||($_SESSION['acces']=="admin")){
        var_dump('coucou');
        //si session[panier]=='none' on créé un panier sans id utilisateur
        if($_SESSION['panier']=="none"){
          if ($this->panier->Ajoutpaniervide()){
            $idPanier=$this->panier->getLastPanier();
            $_SESSION['panier']=$idPanier[0]['idPanier'];
            var_dump($_SESSION['panier']);
          }
          else
            throw new Exception("Echec de la création d'un nouveau panier");
        }

      }else{
        //regarde si un panier avec l'id utilisateur existe
        $panierid=$this->panier->getPanieridUser($_SESSION['acces']);
        if(!empty($paniersid)){
          //si panier lié au compte existe on met en session[panier] l'id du panier
          $_SESSION['panier']=$paniersid[0]['idPanier'];
        }else{
          if($_SESSION['panier']!="none"){
            //sinon si session[panier] != "none" on modifie le panier de cette id en ajoutant l'id utilisateur
            $panieridP = $this->panier->getPanieridPanier($_SESSION['panier']);
            if($_SESSION['panier']==10){
              if($this->panier->modifiUserPanier($_SESSION['panier'],$_SESSION['acces'])){
                var_dump('test1');
              }else
                throw new Exception("Echec de l'ajout du panier au compte utilisateur");            
            }
          }else{
            //sinon on créé un panier avec l'idutilisateur et on met en session[panier]l'id du panier
            if($this->panier->créerPanier($_SESSION['acces'])){
              $idPanier=$this->panier->getLastPanier();
              $_SESSION['panier']=$idPanier;
            }else
              throw new Exception("Echec de la création d'un nouveau panier"); 
          }
        }
        
        
      }

      //on ajoute le produit au panier

      if ($this->panier->insertProduitPanier($valeur_bon, $nombre, $idProduit, $_SESSION['panier'])){
        header('Location: index.php?action=cartecadeau&idProduit='.$idProduit.'&produit=ajoute');
        exit;
      }
      else
        throw new Exception("Echec de l'ajout du produit au panier");


    }
    else {
      $vue = new vue("CarteCadeau"); // Instancie la vue appropriée
      $vue->afficher(array("message"=> $message));
    }
  }


  /*****************************************************/
  /*                ajout d'une version                */
  /*****************************************************/

  public function enregEscapePanier($idVersion){
    
    extract($_POST);
    //var_dump($_POST);     /************pour test*******************/
    $message="";

    if(empty($prix)) $message.="Veuillez indiquer le nombre de personne dans le groupe<br>";
    if(empty($date)) $message.="Veuillez indiquer la durée de l'escape game<br>"; 
    if(empty($heure)) $message.="Veuillez indiquer la durée de l'escape game<br>";  
    //ajout a la BDD
    if (empty($message)){
      
      var_dump($_SESSION['acces']);
      var_dump($_SESSION['panier']);
      if(($_SESSION['acces']=="none")||($_SESSION['acces']=="admin")){
        var_dump('coucou');
        //si session[panier]=='none' on créé un panier sans id utilisateur
        if($_SESSION['panier']=="none"){
          if ($this->panier->Ajoutpaniervide()){
            $idPanier=$this->panier->getLastPanier();
            $_SESSION['panier']=$idPanier[0]['idPanier'];
            var_dump($_SESSION['panier']);
          }
          else
            throw new Exception("Echec de la création d'un nouveau panier");
        }

      }else{
        //regarde si un panier avec l'id utilisateur existe
        $panierid=$this->panier->getPanieridUser($_SESSION['acces']);
        if(!empty($paniersid)){
          //si panier lié au compte existe on met en session[panier] l'id du panier
          $_SESSION['panier']=$paniersid[0]['idPanier'];
        }else{
          if($_SESSION['panier']!="none"){
            //sinon si session[panier] != "none" on modifie le panier de cette id en ajoutant l'id utilisateur
            $panieridP = $this->panier->getPanieridPanier($_SESSION['panier']);
            if($_SESSION['panier']==10){
              if($this->panier->modifiUserPanier($_SESSION['panier'],$_SESSION['acces'])){
                var_dump('test1');
              }else
                throw new Exception("Echec de l'ajout du panier au compte utilisateur");            
            }
          }else{
            //sinon on créé un panier avec l'idutilisateur et on met en session[panier]l'id du panier
            if($this->panier->créerPanier($_SESSION['acces'])){
              $idPanier=$this->panier->getLastPanier();
              $_SESSION['panier']=$idPanier;
            }else
              throw new Exception("Echec de la création d'un nouveau panier"); 
          }
        }
        
        
      }

      $moment=$date.' '.$heure;
      $prix=json_decode($prix);

      //on ajoute l'escape game au panier

      if ($this->panier->insertEscapePanier($moment, $prix[1], $idVersion, $_SESSION['panier'], $prix[0])){
        $infoVersion=$this->panier->getVersionID($idVersion);
        header('Location: index.php?action=escape&idLieu='.$infoVersion[0]['idLieu'].'&idEscapeGame='.$infoVersion[0]['idEscapeGame'].'&produit=ajoute');
        exit;
      }
      else
        throw new Exception("Echec de l'ajout de l'escape game au panier");


    }
    else {
      $vue = new vue("EscapeGame"); // Instancie la vue appropriée
      $vue->afficher(array("message"=> $message));
    }
  }


  public function suprProduitPanier($valeur_bon, $nombre, $idProduit,){
    if ($this->panier->deletProduitPanier($idProduit, $_SESSION['panier'], $nombre, $valeur_bon)){
      header('Location: index.php?action=panier&produit=ajoute');
      exit;
    }
    else
      throw new Exception("Echec de l'ajout du produit au panier");


  }
}