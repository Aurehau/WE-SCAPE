<?php
// Definition des paramètres de la BDD
/* define("DBHOST", "localhost");
define("DBNAME", "magasin");
define("DBUSER", "root");
define("DBPWD", "");

// Définition des paramètres du site
define("TITREONGLET", "Magasin");   // Titre de l'onglet
define("NOMSITE", "Web Shop");      // Titre affiché dans le header

// Menu par défaut
define("MENU", "<a class='lien' href='index.php?action=clients'>Clients</a>
                <a class='lien' href='index.php?action=articles'>Articles</a>
                <a class='lien' href='index.php?action=commandes'>Commandes</a>");
 */

/*************************************
Classe chargée d'exécuter les actions demandées par l'utilisateur
*************************************/
abstract class Config {

    public static $DBHOST= "localhost";  //modifiable  
    public static $DBNAME= "wescape";   //modifiable
    public static $DBUSER= "root";    //modifiable
    public static $DBPWD= "";  //modifiable

    public const TITREONGLET= "Magasin"; //modifiable
    public const NOMSITE= "Web Shop"; //modifiable
    
   /*  public static $MENU=  "<a class='lien' href='index.php?action=clients'>Clients</a>
    <a class='lien' href='index.php?action=articles'>Articles</a>
    <a class='lien' href='index.php?action=commandes'>Commandes</a>"; //interdit de modifier */

  

  }