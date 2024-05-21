<?php

require_once "modele/contact.class.php";

require_once "vue/vue.class.php";
/*************************************
Classe chargée d'exécuter les actions demandées par l'utilisateur
*************************************/
class ctlcontact {

  private $contact;    // Nom du fichier permettant de générer le contenu pour la vue en fonction de l'action demandée
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
    $this->contact = new contact();
  } 

  /*******************************************************
  Affiche dans le gabarit la vue correspondant à l'action demandée
    Entrée : 
      data [array] : tableau associatif contenant les données à afficher dans la vue
  
    Retour : 
      
  *******************************************************/
  public function contact() {

    $contacts = $this->contact->getContact();
    $vue = new vue("Contact"); // Instancie la vue appropriée
    $vue->afficher(array("contacts" => $contacts));

  }

/*   public function commande($idComm) {

  $articles = $this->commande->getArticlesCommande($idComm);
  if (!empty($articles)) {
    $client = $this->client->getClient($this->commande->getIdClientCommande($idComm));
    $total = $this->commande->getTotalCommande($idComm);
    $vue = new vue("Commande"); // Instancie la vue appropriée
    $vue->afficher(array("articles" => $articles , "client" => $client, "total" => $total, "idComm" => $idComm));
  }
  else
    throw new Exception("Echec de l'affichage de la commande N°$idComm");

  }*/
} 