<?php
require_once "controleur/ctlArticle.class.php";
require_once "controleur/ctlClient.class.php";
require_once "controleur/ctlCommande.class.php";
require_once "controleur/ctlPage.class.php";

/*************************************
Classe chargée d'exécuter les actions demandées par l'utilisateur
*************************************/
class Routeur {

  private $ctlClient;    // Nom du fichier permettant de générer le contenu pour la vue en fonction de l'action demandée
  private $ctlArticle;    // Exemple : "vue/vueAccueil.php", "vue/vueArticles.php", "vue/vueErreur.php", ...
  private $ctlCommande;
  private $ctlPage;

  /*******************************************************
  Initialise le nom du fichier requis pour générer le contenu à afficher dans la vue correspondant à l'action
    Entrée : 
      action [string] : action demandée

    Sortie :
      $fichierVue [string] : nom du fichier requis pour générer le contenu à afficher dans la vue

    Retour : 
      
  *******************************************************/
  public function __construct() {
    $this->ctlClient = new ctlclient();
    $this->ctlArticle = new ctlarticle();
    $this->ctlCommande = new ctlcommande();
    $this->ctlPage = new ctlpage();
  } 

  /*******************************************************
  Affiche dans le gabarit la vue correspondant à l'action demandée
    Entrée : 
      data [array] : tableau associatif contenant les données à afficher dans la vue
  
    Retour : 
      
  *******************************************************/
  public function routerRequete() {

    try {
      if(isset($_GET["action"])) {
        switch($_GET["action"]){
    
          case"clients":
            $this->ctlClient->clients();         // Affichage de la liste des clients
            break;
    
          case "articles":
            $this->ctlArticle->articles();        // Affichage de la liste des articles
            break;
    
          case "commandes":
            $this->ctlCommande->commandes();          // Affichage de la liste des commandes
            break;
    
          case "commande":
            if(isset($_GET["idComm"])) {
              $idComm = (int)$_GET["idComm"];
              if($idComm > 0)
              $this->ctlCommande->commande($idComm);      // Affichage d'une commande
              else
                throw new Exception("Identifiant de commande invalide");
            }
            else
              throw new Exception("Aucun identifiant de commande");
            break;

            case "ajoutClient":
              $this->ctlClient->ajoutClient();        // Affichage de la liste des articles
              break;

            case "enregClient":
              
              $this->ctlClient->enregClient();        // Affichage de la liste des articles
              break;
    
          default:
            throw new Exception("Action non valide");
        }
      }
      
      else                     // Page d'accueil
        $ctlaccueils = $this->ctlPage->accueil();
    
    }
    catch (Exception $e) {     // Page d'erreur
      $ctlerreurs = $this->ctlPage->erreur($e->getMessage());
    }
  }

}