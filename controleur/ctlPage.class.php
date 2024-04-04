<?php
/*************************************
Classe chargée d'exécuter les actions demandées par l'utilisateur
*************************************/
class ctlpage {


  /*******************************************************
  Affiche dans le gabarit la vue correspondant à l'action demandée
    Entrée : 
      data [array] : tableau associatif contenant les données à afficher dans la vue
  
    Retour : 
      
  *******************************************************/
  public function accueil() {
    $vue = new vue("Accueil"); // Instancie la vue appropriée
    $vue->afficher(array());

  }

  public function erreur($message) {
    $vue = new vue("Erreur"); // Instancie la vue appropriée
    $vue->afficher(array("message"=>$message));
  }
}