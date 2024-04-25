<?php
require_once "modele/database.class.php";

/*****************************************************************
Classe chargée de la gestion des commandes dans la base de données
*****************************************************************/
class lieu extends database {

  /*******************************************************
  Retourne la liste des articles d'une commande 
    Entrée : 
      idComm [int] : Identifiant de la commande
  
    Retour : 
      [array] : Tableau associatif contenant la liste des articles de la commande
  *******************************************************/

  public function insertLieu($nomlieu, $logo, $idPhoto, $video){
    $req = "INSERT INTO `lieu` (`nom_lieu`, `logo`, `idPhoto`, `video`) VALUES (?,?,?,?)";
    $resultat = $this->execReqPrep($req, array($nomlieu, $logo, $idPhoto, $video));

    if($resultat==1)   // Le client se trouve dans la 1ère ligne de $resultat
      return TRUE;
    else
      return FALSE; 
  }

  public function getLieux(){
    $req = 'SELECT * FROM `lieu`;';
    $lieux = $this->execReq($req);
    return $lieux;
  }

}   // Balise PHP non fermée pour éviter de retourner des caractères "parasites" en fin de traitement