<?php
require_once "controleur/ctlCartecadeau.class.php";
require_once "controleur/ctlContact.class.php";
require_once "controleur/ctlLieu.class.php";
require_once "controleur/ctlEscapeGame.class.php";
require_once "controleur/ctlCompte.class.php";
require_once "controleur/ctlPanier.class.php";

require_once "controleur/ctlCommande.class.php";
require_once "controleur/ctlPage.class.php";

/*************************************
Démarage de la session pour savoir si connecté et qui
*************************************/
session_start();

if(!isset($_SESSION['acces'])) $_SESSION['acces']="none";
if(!isset($_SESSION['panier'])) $_SESSION['panier']="none";


//var_dump($_SESSION['acces']);


/*************************************
Classe chargée d'exécuter les actions demandées par l'utilisateur
*************************************/

class Routeur {

  private $ctlCartecadeau;    // Nom du fichier permettant de générer le contenu pour la vue en fonction de l'action demandée
  private $ctlContact;
  private $ctlProduit;
  private $ctlLieu;
  private $ctlEscapeGame;
  private $ctlCompte;
  private $ctlPanier;
  //private $ctlCommande;
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
    $this->ctlCartecadeau = new ctlcartecadeau();
    $this->ctlContact = new ctlcontact();
    $this->ctlLieu = new ctllieu();
    $this->ctlEscapeGame = new ctlescapegame();
    $this->ctlCompte = new ctlcompte();
    $this->ctlPanier = new ctlpanier();
    //$this->ctlCommande = new ctlcommande();
    $this->ctlPage = new ctlpage();
  } 



  
/*   public function afficherMenuLieu($data) {
    $lieux=$this->ctlLieu->chageMenuLieux(); 
    return $lieux;
  } */

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
/******************depuis le header***************/
    
          case"cartescadeaux":
            $this->ctlCartecadeau->cartescadeaux();         // Affichage de la page des cartes cadeaux
            break;
    
          case "reservations":
            $this->ctlPanier->reservations();        // Affichage de la page des reservations
            break;
    
          case "contact":
            $this->ctlContact->contact();          // Affichage de la page contact
            break;

          case "panier":
            $this->ctlPanier->panier();       // Affichage de la page panier
            break;

          case "Lieu":
            if(isset($_GET["idLieu"])) {
              $idLieu = (int)$_GET["idLieu"];
              if($idLieu > 0)
              $this->ctlLieu->lieu($idLieu);      // Affichage de la page du lieu selectionné
              else
                throw new Exception("Identifiant du lieu invalide");
            }
            break;

/************************ Pages produits *********************/

          case "cartecadeau":
            if(isset($_GET["idProduit"])) {
              $idProduit = (int)$_GET["idProduit"];
              if($idProduit > 0)
              $this->ctlCartecadeau->carteCadeau($idProduit);      // Affichage de la page du lieu selectionné
              else
                throw new Exception("Identifiant du produit invalide");
            }
            break;

            case "escape":
              if(isset($_GET["idLieu"]) && isset($_GET["idEscapeGame"])) {
                $idLieu = (int)$_GET["idLieu"];
                $idEscapeGame = (int)$_GET["idEscapeGame"];
                if(($idLieu > 0) && ($idEscapeGame > 0))
                $this->ctlEscapeGame->escapeGame($idLieu,$idEscapeGame);      // Affichage de la page du lieu selectionné
                else
                  throw new Exception("Identifiant du lieu et/ou de l'escape game invalide");
              }
              break;

            case "escapeLieu":
              extract($_POST);
              //var_dump($_POST);
              if(isset($_GET["idEscapeGame"])) {
                $idEscapeGame = (int)$_GET["idEscapeGame"];
                if(($idLieu > 0) && ($idEscapeGame > 0))
                $this->ctlEscapeGame->escapeGame($idLieu,$idEscapeGame);      // Affichage de la page du lieu selectionné
                else
                  throw new Exception("Identifiant du lieu et/ou de l'escape game invalide");
              }
              break;

/************************ Gestion panier *********************/

          case "enregProduitPanier":
            if(isset($_GET["idProduit"])) {
              $idProduit = (int)$_GET["idProduit"];
              if($idProduit > 0)
              $this->ctlPanier->enregProduitPanier($idProduit);      // Affichage de la page du lieu selectionné
              else
                throw new Exception("Identifiant du produit invalide");
            }
            break;

          case "enregEscapePanier":
            if(isset($_GET["idVersion"])) {
              $idVersion = (int)$_GET["idVersion"];
              if($idVersion > 0)
              $this->ctlPanier->enregEscapePanier($idVersion);      // Affichage de la page du lieu selectionné
              else
                throw new Exception("Identifiant de l'escape game invalide");
            }
            break;

          case "suprProduitPanier":
            if(isset($_GET["idProduit"])&&isset($_GET["nb"])&&isset($_GET["valeur"])) {
              $idProduit = (int)$_GET["idProduit"];
              $valeur_bon = (int)$_GET["valeur"];
              $nombre = (int)$_GET["nb"];
              if($idProduit > 0)
              $this->ctlPanier->suprProduitPanier($valeur_bon, $nombre, $idProduit);      // Affichage de la page du lieu selectionné
              else
                throw new Exception("Identifiant du produit, valeur du bon ou quantité invalide");
            }
            break;

          case "suprEscapePanier":
            if(isset($_GET["idVersion"])&&isset($_GET["moment"])&&isset($_GET["prix"])) {
              $idVersion = (int)$_GET["idVersion"];
              $moment = (int)$_GET["moment"];
              $prix = (int)$_GET["prix"];
              if($idVersion > 0)
              $this->ctlPanier->suprEscapePanier($moment, $prix, $idVersion);      // Affichage de la page du lieu selectionné
              else
                throw new Exception("Identifiant de l'escape game, prix ou date invalide");
            }
            break;


/******************gestion connexion et compte***************/

          case "creer_compte":
            $this->ctlCompte->ajoutCompte();          // Affichage de la page de création d'un compte
            break;

          case "enregCompte":
            
            $this->ctlCompte->enregCompte();        // Affichage de la liste des articles
            break;

          case "connexion":
            $this->ctlCompte->connexion();          // Affichage de la page de connexion
            break;

          case "login":
            $this->ctlCompte->login();         // Affichage de la page de connexion
            break;

          case "infoCompte":
            $this->ctlCompte->infoCompte();          // Affichage de la page de connexion
            break;

          case "quitter":
            $this->ctlCompte->deconnexion();          // Affichage de la page de connexion
            break;

          case "modif_compte":
            $this->ctlCompte->deconnexion();          // Affichage de la page de connexion
            break;

            
/******************footer***************/

          case "mentionslegales":
            $this->ctlPage->mentions();          // Affichage de la page de connexion
            break;
          
          case "CGV":
            $this->ctlPage->condition();          // Affichage de la page de connexion
            break;

          case "Confidentialite":
            $this->ctlPage->confidentialite();          // Affichage de la page de connexion
            break;

/******************Admin***************/
    
            //carte cadeaux
          case "adminAjoutCarte":
            $this->ctlCartecadeau->adminAjoutCarte();         // Affichage de la page ajout des cartes cadeaux
            break;

          case "enregAdminAjoutCarte":
            $this->ctlCartecadeau->enregAdminAjoutCarte();         // Enregistrement des cartes cadeaux
            break;

          case "AdminSuprProduit":
            if(isset($_GET["idProduit"])) {
              $idProduit = (int)$_GET["idProduit"];
              if($idProduit > 0)
                $this->ctlCartecadeau->AdminSuprProduit($idProduit);   
              else
                throw new Exception("Identifiant du lieu ou de l'escape game invalide");
            }    
            break;

            //lieu
          case "adminAjoutLieu":
            $this->ctlLieu->adminAjoutLieu();         // Affichage de la page ajout des lieux
            break;

          case "enregAdminAjoutLieu":
            $this->ctlLieu->enregAdminAjoutLieu();         // Enregistrement des lieux
            break;


           //escape game
           case "adminCreerEscapeGame":
            if(isset($_GET["idLieu"])) {
              $idLieu = (int)$_GET["idLieu"];
              if($idLieu > 0)
              $this->ctlEscapeGame->adminCreerEscapeGame($idLieu);      // Affichage du formulaire de création
              else
                throw new Exception("Identifiant du lieu invalide");
            }
            break;

          case "enregAdminCreerEscapeGame":
            if(isset($_GET["idLieu"])) {
              $idLieu = (int)$_GET["idLieu"];
              if($idLieu > 0)
                $this->ctlEscapeGame->enregAdminCreerEscapeGame($idLieu);   
              else
                throw new Exception("Identifiant du lieu invalide");
            }    
            break;


          //version escape game
          case "adminCreerVersion":
            if(isset($_GET["idLieu"])) {
              $idLieu = (int)$_GET["idLieu"];
              if($idLieu > 0)
              $this->ctlEscapeGame->adminCreerVersion($idLieu);      // Affichage du formulaire de création
              else
                throw new Exception("Identifiant du lieu invalide");
            }
            break;

          case "enregAdminCreerVersion":
            if(isset($_GET["idLieu"])&&isset($_GET["idEscapeGame"])) {
              $idLieu = (int)$_GET["idLieu"];
              $idEscapeGame = (int)$_GET["idEscapeGame"];
              if(($idLieu > 0)&& ($idEscapeGame > 0))
                $this->ctlEscapeGame->enregAdminCreerVersion($idLieu,$idEscapeGame);   
              else
                throw new Exception("Identifiant du lieu ou de l'escape game invalide");
            }    
            break;
    
          /* case "commande":
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
              break; */
    
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