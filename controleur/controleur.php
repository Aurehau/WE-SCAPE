<?php
require_once "modele/article.class.php";
require_once "modele/client.class.php";
require_once "modele/commande.class.php";

require_once "vue/vue.class.php";

require_once "controleur/ctlArticle.class.php";
require_once "controleur/ctlClient.class.php";
require_once "controleur/ctlCommande.class.php";
require_once "controleur/ctlPage.class.php";


/*******************************************************
Affichage de la page d'accueil du site
  Entrée : 

  Retour : 
    
*******************************************************/
function accueil() {
  $ctlaccueil = new ctlpage();
  $ctlaccueils = $ctlaccueil->accueil(); // Affiche la liste des clients dans la vue
}

/*******************************************************
Affichage de la liste des clients dans la vue concernée
  Entrée : 

  Retour : 
    
*******************************************************/
function clients() {
  $ctlClient = new ctlclient();
  $ctlclients = $ctlClient->clients();
}

/*******************************************************
Affichage de la liste des articles dans la vue concernée
  Entrée : 

  Retour : 
    
*******************************************************/
function articles() {
  $ctlArt = new ctlarticle();
  $ctlarticles = $ctlArt->articles();
}

/*******************************************************
Affichage de la liste des commandes dans la vue concernée
  Entrée : 

  Retour : 
    
*******************************************************/
function commandes() {
  $ctlComm = new ctlcommande();
  $ctlcommandes = $ctlComm->commandes();
}

/*******************************************************
Affichage des détails d'une commande et du client dans la vue concernée
  Entrée :
    idComm [int] : n° de la commande

  Retour : 
    
*******************************************************/
function commande($idComm) {
  $ctlComm = new ctlcommande();
  $ctlcommandes = $ctlComm->commande($idComm);
}

/*******************************************************
Affichage d'une page d'erreur
  Entrée : 
    message [string] : message d'erreur

  Retour : 
    
*******************************************************/
function erreur($message) {
  $ctlerreur = new ctlpage();
  $ctlerreurs = $ctlerreur->erreur($message);
}  