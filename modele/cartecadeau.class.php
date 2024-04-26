<?php
require_once "modele/database.class.php";

/***************************************************************
Classe chargée de la gestion des clients dans la base de données
***************************************************************/
class cartecadeau extends database {

  /*******************************************************
  Retourne la liste des clients 
    Entrée : 
  
    Retour : 
      [array] : Tableau associatif contenant la liste des clients
  *******************************************************/
  public function getCartescadeaux() {
    $req = 'SELECT produit.*, photo.lien_photo FROM produit INNER JOIN photo ON produit.idPhoto = photo.idPhoto ;';
    $cartescadeaux = $this->execReq($req);
    return $cartescadeaux;
  }

  public function getCartecadeau($idProduit) {
    $req = 'SELECT produit.*, photo.lien_photo FROM produit INNER JOIN photo ON produit.idPhoto = photo.idPhoto WHERE idProduit=? ;';
    $cartecadeau = $this->execReqPrep($req, array($idProduit));
    return $cartecadeau;
  }

  public function getIMGCartecadeau($idProduit) {
    $req = 'SELECT illustrer.*, photo.lien_photo FROM `illustrer` INNER JOIN photo ON photo.idPhoto=illustrer.idPhoto WHERE idProduit=?';
    $imgcartecadeau = $this->execReqPrep($req, array($idProduit));
    return $imgcartecadeau;
  }


  public function getLastProduit(){
    $req = 'SELECT * FROM produit ORDER BY idProduit DESC LIMIT 1;';
    $lastcartescadeaux = $this->execReq($req);
    return $lastcartescadeaux;
  }


  public function insertProduit($idPhoto, $prix, $valeur, $taille, $delai){
    $req = "INSERT INTO `produit` (`idPhoto`, `prix_produit`, `valeur_bon`, `taille_colis`, `delai`) VALUES (?,?,?,?,?)";
    $resultat = $this->execReqPrep($req, array($idPhoto, $prix, $valeur, $taille, $delai));

    if($resultat==1)   // Le client se trouve dans la 1ère ligne de $resultat
      return TRUE;
    else
      return FALSE; 
  }


  public function insertProduitJSON($idProduit,$titrefr, $titreen,$descriptionfr,$descriptionen,$raisonsfr,$raisonsen) {
    // récupère le JSON actuel sous forme de tableau
    $tableau_json = $this->accesJSON();

    // Données à insérer (par exemple)
    $nouvel_element = array(
        $idProduit => array(
          'titre' => array(
            'fr' => $titrefr,
            'en' => $titreen
          ),
          'description' => array(
            'fr' => $descriptionfr,
            'en' => $descriptionen
          ),
          'raisons' => array(
            'fr' => $raisonsfr,
            'en' => $raisonsen
          )
        )
    );

    // Ajouter les nouvelles données au tableau existant
    $tableau_json["phpmyadmin"]["produit"] += $nouvel_element;

    // Convertir le tableau mis à jour en JSON
    if($this->modifJSON($tableau_json)!== false) {
      return true;
    } else {
      return false;
    }

  }

  

}   // Balise PHP non fermée pour éviter de retourner des caractères "parasites" en fin de traitement