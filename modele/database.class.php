<?php
/*********************************************************
Classe permettant la communication avec la base de données
*********************************************************/
abstract class database {

  // Objet permettant la connexion à la BDD
  private $bdd;

  /*******************************************************
  Execution d'une requête simple 
    Entrée : 
      req [string] : Requête SQL
  
    Retour : 
      [array] : Tableau associatif contenant le résultat de la requête
  *******************************************************/
  protected function execReq($req) {
    $reponse = $this->connexionBDD()->query($req);
    $resultat = $reponse->fetchAll(PDO::FETCH_ASSOC);
    return $resultat;
  }

  /*******************************************************
  Execution d'une requête préparée 
    Entrée : 
      req [string] : Requête préparée
      data [array] : Tableau contenant les données utilisées par la requête préparée
  
    Retour : 
      [array] : Tableau associatif contenant le résultat de la requête
  *******************************************************/
  protected function execReqPrep($req, $data) {
    $reponse = $this->connexionBDD()->prepare($req);
    if($reponse->execute($data)){
      $resultat = $reponse->fetchAll(PDO::FETCH_ASSOC);
      if(!empty($resultat))
        return $resultat;          // Résultat de la requête dans un tab. assoc.
      else
        return $reponse->rowCount(); // Nombre de lignes modifiées par la requête
    }
    return FALSE;                  // Erreur lors de l'exécution de la requête
  }
  
  /*******************************************************
  Connexion à la BDD à partir des paramètres de configuration
    Entrée : 
      
    Retour : 
      [object] : Objet de type PDO
  *******************************************************/


  private function connexionBDD() {

    global $Conf;
    
    if (!isset($this->bdd))     // Si la connexion à la BDD n'est pas encore établie
      try {  // Connexion à la base de données et initialisation de la propriété bdd
        $options=array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        $this->bdd = new PDO('mysql:host='.$Conf->DBHOST.';dbname='.$Conf->DBNAME, $Conf->DBUSER, $Conf->DBPWD, $options);
      }
      catch(Exception $err) {   // Erreur lors de la connexion à la BDD
        throw new Exception("Connexion à la BDD"); //.$err->getMessage());
      }

    return $this->bdd;
  }



    /*******************************************************
  Execution d'une requête simple 
    Entrée : 
      req [string] : Requête SQL
  
    Retour : 
      [array] : Tableau associatif contenant le résultat de la requête
  *******************************************************/
  protected function accesJSON() {
    $chemin_fichier = "modele/bdd.json";

    // Charger le contenu JSON existant
    $contenu_json = file_get_contents($chemin_fichier);

    // Convertir le JSON en tableau PHP
    $tableau_json = json_decode($contenu_json, true);
    return $tableau_json;
  }

  protected function modifJSON($tableau_json) {
    $chemin_fichier = "modele/bdd.json";
    $nouveau_contenu_json = json_encode($tableau_json, JSON_PRETTY_PRINT);

    // Écrire le nouveau contenu JSON dans le fichier
    if (file_put_contents($chemin_fichier, $nouveau_contenu_json) !== false) {
      return true;
  } else {
      return false;
  }
  }
}   // Balise PHP non fermée pour éviter de retourner des caractères "parasites" en fin de traitement