<?php
require_once "modele/database.class.php";

/***************************************************************
Classe chargée de la gestion des clients dans la base de données
***************************************************************/
class compte extends database {

  /*******************************************************
  Retourne la liste des clients 
    Entrée : 
  
    Retour : 
      [array] : Tableau associatif contenant la liste des clients
  *******************************************************/
  public function getComptes() {
    /* $req = 'SELECT id_client AS "N° Client", nom AS "NOM", prenom AS "Prénom" , adresse AS "Adresse" , ville AS "Ville" , mail AS "Adresse email" , age AS "Âge"FROM client ORDER BY nom, prenom;';
    $cartescadeaux = $this->execReq($req);
    return $cartescadeaux; */
  }

  /*******************************************************
  Retourne les informations d'un client 
    Entrée : 
      idClient [int] : Identifiant du client

    Retour : 
      [array] : Tableau associatif contenant les information du client ou FALSE en cas d'erreur
  *******************************************************/
  public function getCompte($mail) {
    $req = 'SELECT * FROM utilisateur WHERE mail=?';
    $resultat = $this->execReqPrep($req, array($mail));

    if(isset($resultat[0]))   // Le client se trouve dans la 1ère ligne de $resultat
      return $resultat[0];
    else
      return FALSE;           // Retourne FALSE si le client n'existe pas
    
    // Ou :
    //return isset($resultat[0]) ? $resultat[0] : FALSE;    // Retourne FALSE si le client n'existe pas
  }


    /*******************************************************
  Retourne les informations d'un client 
    Entrée : 
      idClient [int] : Identifiant du client

    Retour : 
      [array] : Tableau associatif contenant les information du client ou FALSE en cas d'erreur
  *******************************************************/
  public function getCompteID($ID) {
    $req = 'SELECT * FROM utilisateur WHERE idUtilisateur=?';
    $resultat = $this->execReqPrep($req, array($ID));

    if(isset($resultat[0]))   // Le client se trouve dans la 1ère ligne de $resultat
      return $resultat[0];
    else
      return FALSE;           // Retourne FALSE si le client n'existe pas
    
    // Ou :
    //return isset($resultat[0]) ? $resultat[0] : FALSE;    // Retourne FALSE si le client n'existe pas
  }


  /*******************************************************
  Retourne les informations d'un client 
    Entrée : 
      idClient [int] : Identifiant du client

    Retour : 
      [array] : Tableau associatif contenant les information du client ou FALSE en cas d'erreur
  *******************************************************/
  public function getNbMail($mail) {
    $req = "  SELECT COUNT(*) AS nombre_de_comptes FROM utilisateur WHERE mail=?";
    $resultat = $this->execReqPrep($req, array($mail));

    if(isset($resultat[0]))   // Le client se trouve dans la 1ère ligne de $resultat
      return $resultat[0];
    else
      return FALSE;           // Retourne FALSE si le client n'existe pas
    
    // Ou :
    //return isset($resultat[0]) ? $resultat[0] : FALSE;    // Retourne FALSE si le client n'existe pas
  }

  /*******************************************************
  Retourne les informations d'un client 
    Entrée : 
      idClient [int] : Identifiant du client

    Retour : 
      [array] : Tableau associatif contenant les information du client ou FALSE en cas d'erreur
  *******************************************************/
  public function getClient($idClient) {
    $req = 'SELECT * FROM client WHERE id_client=?';
    $resultat = $this->execReqPrep($req, array($idClient));

    if(isset($resultat[0]))   // Le client se trouve dans la 1ère ligne de $resultat
      return $resultat[0];
    else
      return FALSE;           // Retourne FALSE si le client n'existe pas
    
    // Ou :
    //return isset($resultat[0]) ? $resultat[0] : FALSE;    // Retourne FALSE si le client n'existe pas
  }



  public function insertCompte($nom, $prenom, $mdp, $email, $tel="", $adresse="", $ville="", $code_postal="", $pays=""){
    $req = "INSERT INTO `utilisateur` (`nom`, `prenom`, `mdp`, `mail`, `tel`, `adresse`, `ville`, `code_postal`, `pays`) VALUES (?,?,?,?,?,?,?,?,?)";
    $resultat = $this->execReqPrep($req, array($nom, $prenom, $mdp, $email, $tel, $adresse, $ville, $code_postal, $pays));

    if($resultat==1)   // Le client se trouve dans la 1ère ligne de $resultat
      return TRUE;
    else
      return FALSE; 
  }

}   // Balise PHP non fermée pour éviter de retourner des caractères "parasites" en fin de traitement