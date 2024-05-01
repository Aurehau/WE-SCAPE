<?php

require_once "modele/escapegame.class.php";
/*************************************
Classe chargée d'exécuter les actions demandées par l'utilisateur
*************************************/
class ctlpage {

  private $escapegame;




  public function __construct() {
    $this->escapegame = new escapegame();
  } 

  /*******************************************************
  Affiche dans le gabarit la vue correspondant à l'action demandée
    Entrée : 
      data [array] : tableau associatif contenant les données à afficher dans la vue
  
    Retour : 
      
  *******************************************************/
  public function accueil() {
    $EscapeGame = $this->escapegame->get4EscapeLieu();
    $vue = new vue("Accueil"); // Instancie la vue appropriée
    $vue->afficher(array("EscapeGame"=> $EscapeGame));

  }


    /*******************************************************
  Affiche dans le gabarit la vue correspondant à l'action demandée
    Entrée : 
      data [array] : tableau associatif contenant les données à afficher dans la vue
  
    Retour : 
      
  *******************************************************/
  public function achat() {
    extract($_POST);
    $vue = new vue("Achat"); // Instancie la vue appropriée
    $vue->afficher(array("total"=> $total));

  }

/*******************************************************
  Affiche dans le gabarit la vue correspondant à l'action demandée
    Entrée : 
      data [array] : tableau associatif contenant les données à afficher dans la vue
  
    Retour : 
      
  *******************************************************/
  public function mentions() {
    $vue = new vue("Mentions"); // Instancie la vue appropriée
    $vue->afficher(array());

  }

/*******************************************************
  Affiche dans le gabarit la vue correspondant à l'action demandée
    Entrée : 
      data [array] : tableau associatif contenant les données à afficher dans la vue
  
    Retour : 
      
  *******************************************************/
  public function condition() {
    $vue = new vue("CGV"); // Instancie la vue appropriée
    $vue->afficher(array());

  }

/*******************************************************
  Affiche dans le gabarit la vue correspondant à l'action demandée
    Entrée : 
      data [array] : tableau associatif contenant les données à afficher dans la vue
  
    Retour : 
      
  *******************************************************/
  public function confidentialite() {
    $vue = new vue("Confidentialite"); // Instancie la vue appropriée
    $vue->afficher(array());

  }

  public function erreur($message) {
    $vue = new vue("Erreur"); // Instancie la vue appropriée
    $vue->afficher(array("message"=>$message));
  }
}