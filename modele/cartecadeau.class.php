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
    //  $req = 'SELECT id_client AS "N° Client", nom AS "NOM", prenom AS "Prénom", adresse AS "Adresse", ville AS "Ville", mail AS "Adresse email", age AS "Age" FROM client ORDER BY nom, prenom;';
    /* $req = 'SELECT id_client AS "N° Client", nom AS "NOM", prenom AS "Prénom" , adresse AS "Adresse" , ville AS "Ville" , mail AS "Adresse email" , age AS "Âge"FROM client ORDER BY nom, prenom;';
    $cartescadeaux = $this->execReq($req);
    return $cartescadeaux; */
  }


  public function getLastProduit(){
    $req = 'SELECT * FROM produit ORDER BY idProduit DESC LIMIT 1;';
    $lastcartescadeaux = $this->execReq($req);
    return $lastcartescadeaux;
  }


  public function insertProduit($file, $prix, $valeur, $taille, $delai){
    $req = "INSERT INTO `produit` (`img_produit`, `prix_produit`, `valeur_bon`, `taille_colis`, `delai`) VALUES (?,?,?,?,?)";
    $resultat = $this->execReqPrep($req, array($file, $prix, $valeur, $taille, $delai));

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
    $tableau_json["phpmyadmin"]["produit"][] = $nouvel_element;

    // Convertir le tableau mis à jour en JSON
    if($this->modifJSON($tableau_json)!== false) {
      return true;
    } else {
      return false;
    }

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



  public function insertClient($nom, $prenom, $age, $adresse, $ville, $mail=""){
    $req = "INSERT INTO `client`(`nom`, `prenom`, `age`, `adresse`, `ville`, `mail`) VALUES (?,?,?,?,?,?)";
    $resultat = $this->execReqPrep($req, array($nom, $prenom, $age, $adresse, $ville, $mail));

    if($resultat==1)   // Le client se trouve dans la 1ère ligne de $resultat
      return TRUE;
    else
      return FALSE; 
  }

}   // Balise PHP non fermée pour éviter de retourner des caractères "parasites" en fin de traitement