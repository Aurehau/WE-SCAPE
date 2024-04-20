<?php

require_once "modele/cartecadeau.class.php";
require_once "modele/photo.class.php";

require_once "vue/vue.class.php";
/*************************************
Classe chargée d'exécuter les actions demandées par l'utilisateur
*************************************/
class ctlcartecadeau {

  private $cartecadeau;    // Nom du fichier permettant de générer le contenu pour la vue en fonction de l'action demandée
                          // Exemple : "vue/vueAccueil.php", "vue/vueArticles.php", "vue/vueErreur.php", ...

  private $photo;
  /*******************************************************
  Initialise le nom du fichier requis pour générer le contenu à afficher dans la vue correspondant à l'action
    Entrée : 
      action [string] : action demandée

    Sortie :
      $fichierVue [string] : nom du fichier requis pour générer le contenu à afficher dans la vue

    Retour : 
      
  *******************************************************/
  public function __construct() {
    $this->cartecadeau = new cartecadeau();
    $this->photo = new photo();
  } 

  /*******************************************************
  Affiche dans le gabarit la vue correspondant à l'action demandée
    Entrée : 
      data [array] : tableau associatif contenant les données à afficher dans la vue
  
    Retour : 
      
  *******************************************************/
  public function cartescadeaux() {

    $cartescadeaux = $this->cartecadeau->getCartescadeaux();
    $vue = new vue("Cartescadeaux"); // Instancie la vue appropriée
    $vue->afficher(array("cartescadeaux" => $cartescadeaux));

  }





  public function adminAjoutCarte() {
    $vue = new vue("AdminAjoutCarte"); // Instancie la vue appropriée
    $vue->afficher(array());

  }



  public function enregAdminAjoutCarte(){
    
    extract($_POST);
    var_dump($_POST);     /************pour test*******************/
    $message="";
    if(empty($titrefr)) $message.="Veuillez indiquer un titre en français<br>";
    if(empty($titreen)) $message.="Veuillez indiquer le titre en anglais<br>";
    if(empty($raisonsfr)) $message.="Veuillez ajouter les occasions aux quelles acheter le produit (en français)<br>";
    if(empty($raisonsen)) $message.="Veuillez ajouter les occasions aux quelles acheter le produit (en anglais)<br>";
    if(empty($descriptionfr)) $message.="Veuillez ajouter une description en français<br>";
    if(empty($descriptionen)) $message.="Veuillez ajouter la description en anglais<br>";

    
    if(empty($prix)) $message.="Veuillez indiquer un prix<br>";
    if(empty($delai)) $message.="Veuillez indiquer un delai de livraison<br>";
    if(empty($taille)) $message.="Veuillez choisir une taille de coli<br>";
    
    $valeurs = [$valeur];
    $j="valeur1";
    for ($i=3; isset($_POST[$j])==true; $i++) {
      $valeurs[]=$_POST[$j];
      $j="valeur".$i-1; 
    }
    $valeurs=json_encode($valeurs);

    //ajout a la BDD
    if (empty($message)){
      if ($this->cartecadeau->insertProduit($_FILES['file']["name"][0], $prix, $valeurs, $taille, $delai)){
        $idProduit=$this->cartecadeau->getLastProduit();
        var_dump($idProduit);

        $this->cartecadeau->insertProduitJSON($idProduit[0]['idProduit'],$titrefr, $titreen,$descriptionfr,$descriptionen,$raisonsfr,$raisonsen);
        
        $this->photo->updateMiniatureProduit($_FILES['file']["name"][0]);

        
        if(isset($_FILES['file']) && $_FILES['file']['error'] != 4){
          var_dump("coucou");
          $this->photo->updateMiniatureProduit(pathinfo($file[0], PATHINFO_FILENAME));
        }
/*         if(isset($_FILES['files']) && $_FILES['files']['error'][0] != 4){
            for ($i = 0; $i <= count($_FILES['files']['error'])-1; $i++) {
              $this->photo-> updateAnimalPhotoPresentation($idProduit,$i);
            }  
        } */
        header('Location: index.php?produit=ajoute');
        exit;
      }
      else
        throw new Exception("Echec de l'enregistrement du nouveau compte");
    }
    else {
      $vue = new vue("AdminAjoutCarte"); // Instancie la vue appropriée
      $vue->afficher(array("message"=> $message));
    }


    // $this->client->insertClient($nom, $prenom, $age, $adresse, $ville, $mail);
    // $clients = $this->client->getClients();
    // $vue = new vue("Clients"); // Instancie la vue appropriée
    // $vue->afficher(array("clients" => $clients));
  }


  /** partie pas encore modifier pour wescape **/ 

  public function ajoutClient() {
    $vue = new vue("Formulaire"); // Instancie la vue appropriée
    $vue->afficher(array());

  }


  public function enregClient(){
    
    extract($_POST);
    $message="";
    if(empty($nom)) $message.="Veuillez indiquer un nom<br>";
    if(empty($prenom)) $message.="Veuillez indiquer un prenom<br>";
    if(empty($age)) $message.="Veuillez indiquer votre age<br>";
    if(empty($adresse)) $message.="Veuillez indiquer une adresse<br>";
    if(empty($ville)) $message.="Veuillez indiquer une ville<br>";
    if(!filter_var($mail, FILTER_VALIDATE_EMAIL)) $message.="Veuillez indiquer une adresse mail valide";

    if (empty($message)){
      if ($this->client->insertClient($nom, $prenom, $age, $adresse, $ville, $mail))
        $this->clients();
      else
        throw new Exception("Echec de l'enregistrement du nouveau client");
    }
    else {
      $vue = new vue("Formulaire"); // Instancie la vue appropriée
      $vue->afficher(array("message"=> $message));
    }


    // $this->client->insertClient($nom, $prenom, $age, $adresse, $ville, $mail);
    // $clients = $this->client->getClients();
    // $vue = new vue("Clients"); // Instancie la vue appropriée
    // $vue->afficher(array("clients" => $clients));
  }
}