<?php

require_once "modele/compte.class.php";

require_once "vue/vue.class.php";
/*************************************
Classe chargée d'exécuter les actions demandées par l'utilisateur
*************************************/
class ctlcompte {

  private $compte;    // Nom du fichier permettant de générer le contenu pour la vue en fonction de l'action demandée
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
    $this->compte = new compte();
  } 

  /*******************************************************
  Affiche dans le gabarit la vue correspondant à l'action demandée
    Entrée : 
      data [array] : tableau associatif contenant les données à afficher dans la vue
  
    Retour : 
      
  *******************************************************/
  public function cartescadeaux() {

    /* $cartescadeaux = $this->cartecadeau->getCartescadeaux();
    $vue = new vue("Cartescadeaux"); // Instancie la vue appropriée
    $vue->afficher(array("cartescadeaux" => $cartescadeaux)); */

  }



  /** partie pas encore modifier pour wescape **/ 

  public function ajoutCompte() {
    $vue = new vue("CreerCompte"); // Instancie la vue appropriée
    $vue->afficher(array());

  }

  public function connexion() {
    $vue = new vue("Connexion"); // Instancie la vue appropriée
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