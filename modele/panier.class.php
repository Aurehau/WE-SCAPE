<?php
require_once "modele/database.class.php";

/***************************************************************
Classe chargée de la gestion des clients dans la base de données
***************************************************************/
class panier extends database {

  /*******************************************************
  Retourne la liste des clients 
    Entrée : 
  
    Retour : 
      [array] : Tableau associatif contenant la liste des clients
  *******************************************************/
  public function Ajoutpaniervide() {
    $req = 'INSERT INTO panier (idUtilisateur) VALUES (10)'; //=idadmin pour panier qui appartient pas a un compte
    $resultat = $this->execReqPrep($req,array());
    
    if($resultat==1)   // Le client se trouve dans la 1ère ligne de $resultat
      return TRUE;
    else
      return FALSE; 
  }


  public function getLastPanier(){
    $req = 'SELECT * FROM `panier` ORDER BY idPanier DESC LIMIT 1;';
    $lastPanier = $this->execReq($req);
    return $lastPanier;
  }

  public function getPanieridUser($idUser){
    $req = 'SELECT * FROM panier WHERE idUtilisateur = ?;';
    $panier = $this->execReqPrep($req, array($idUser));
    return $panier;
  }

  public function getPanieridPanier($idPanier){
    $req = 'SELECT * FROM panier WHERE idPanier = ?;';
    $panier = $this->execReqPrep($req, array($idPanier));
    return $panier;
  }

  public function modifiUserPanier($idPanier, $idUtilisateur){
    $req = "UPDATE panier SET idUtilisateur = ? WHERE idPanier = ?;";
    $resultat = $this->execReqPrep($req, array($idUtilisateur,$idPanier));

    if($resultat==1)   // Le client se trouve dans la 1ère ligne de $resultat
      return TRUE;
    else
      return FALSE; 
  }


  public function créerPanier($idUtilisateur){
    $req = "INSERT INTO panier (idUtilisateur) VALUES (?);";
    $resultat = $this->execReqPrep($req, array($idUtilisateur));

    if($resultat==1)   // Le client se trouve dans la 1ère ligne de $resultat
      return TRUE;
    else
      return FALSE; 
  }


  public function insertProduitPanier($valeur_bon, $nombre, $idProduit, $idPanier){
    $req = "INSERT INTO `envisager` (`valeur_bon`, `nb_produit`, `idProduit`, `idPanier`, `payer`) VALUES (?, ?, ?, ?, '0');";
    $resultat = $this->execReqPrep($req, array($valeur_bon, $nombre, $idProduit, $idPanier));

    if($resultat==1)   // Le client se trouve dans la 1ère ligne de $resultat
      return TRUE;
    else
      return FALSE; 
  }



  public function insertEscapePanier($moment, $nombre, $idVersion, $idPanier, $prix){
    $req = "INSERT INTO `reserver` (`date_reservation`, `nb_reservation`, `payer`, `idVersion`, `idPanier`, `prix`) VALUES (?, ?, '0', ?, ?, ?);";
    $resultat = $this->execReqPrep($req, array($moment, $nombre, $idVersion, $idPanier, $prix));

    if($resultat==1)   // Le client se trouve dans la 1ère ligne de $resultat
      return TRUE;
    else
      return FALSE; 
  }

  public function getVersionID($idVersion){
    $req = 'SELECT * FROM `version` WHERE idVersion = ?;';
    $version = $this->execReqPrep($req, array($idVersion));
    return $version;
  }


  public function getPanier($idPanier){
    $req = 'SELECT 
    nom,
    quantite,
    prix
FROM (
    SELECT 
        p.idProduit AS nom,
        (p.prix_produit + ga.valeur_bon) AS prix,
        ga.nb_produit AS quantite
    FROM 
        envisager AS ga
    LEFT JOIN 
        produit AS p ON ga.idProduit = p.idProduit
    WHERE 
        ga.idPanier = ?
    
    UNION ALL
    
    SELECT 
        e.idEscapeGame AS nom,
        eg.prix_game AS prix,
        NULL AS quantite
    FROM 
        reserver AS ve
    LEFT JOIN 
        version AS e ON ve.idVersion = e.idVersion
    LEFT JOIN
    	escape_game AS eg ON eg.idEscapeGame = e.idEscapeGame
    WHERE 
        ve.idPanier = ?
) AS resultats;';
    $panier = $this->execReqPrep($req, array($idPanier, $idPanier));
    return $panier;
  }



  public function insertEscapeGameJSON($idEscapeGame,$titrefr, $titreen,$ciblefr,$cibleen) {
    // récupère le JSON actuel sous forme de tableau
    $tableau_json = $this->accesJSON();

    // Données à insérer (par exemple)
    $nouvel_element = array(
      $idEscapeGame => array(
          'titre' => array(
            'fr' => $titrefr,
            'en' => $titreen
          ),
          'groupe_cible' => array(
            'fr' => $ciblefr,
            'en' => $cibleen
          )
        )
      );

    // Ajouter les nouvelles données au tableau existant
    $tableau_json["phpmyadmin"]["game"] += $nouvel_element;

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
  public function getLastVersion(){
    $req = 'SELECT * FROM `version` ORDER BY idVersion DESC LIMIT 1;';
    $lastversion = $this->execReq($req);
    return $lastversion;
  }


  public function insertVersion($idEscapeGame, $idLieu, $duree, $langues, $ville, $code_postal, $coordonne, $parking, $train, $bus, $nbclient){
    $req = "INSERT INTO `version` (`idEscapeGame`, `idLieu`, `durée`, `langues`, `ville`, `code_postal`, `coordonne_GPS`, `parking`, `train`, `bus`, `nbclient`) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
    $resultat = $this->execReqPrep($req, array($idEscapeGame, $idLieu, $duree, $langues, $ville, $code_postal, $coordonne, $parking, $train, $bus, $nbclient));

    if($resultat==1)   // Le client se trouve dans la 1ère ligne de $resultat
      return TRUE;
    else
      return FALSE; 
  }



  public function insertVersionJSON($idVersion,$histoirefr, $histoireen,$descriptionfr,$descriptionen,$adressefr,$adresseen,$rdvfr,$rdven,$contientfr,$contienten,$apporterfr,$apporteren,$importantfr,$importanten,$exigencefr,$exigenceen,$autrefr,$autreen) {
    // récupère le JSON actuel sous forme de tableau
    $tableau_json = $this->accesJSON();

    // Données à insérer (par exemple)
    $nouvel_element =array(
      $idVersion => array(
          'histoire' => array(
            'fr' => $histoirefr,
            'en' => $histoireen
          ),
          'description' => array(
            'fr' => $descriptionfr,
            'en' => $descriptionen
          ),
          'adresse' => array(
            'fr' => $adressefr,
            'en' => $adresseen
          ),
          'rdv' => array(
            'fr' => $rdvfr,
            'en' => $rdven
          ),
          'info_importante' => array(
            'fr' => $importantfr,
            'en' => $importanten
          ),
          'exigence' => array(
            'fr' => $exigencefr,
            'en' => $exigenceen
          ),
          'contenu' => array(
            'fr' => $contientfr,
            'en' => $contienten
          ),
          'a_apporter' => array(
            'fr' => $apporterfr,
            'en' => $apporteren
          ),
          
          'autre' => array(
            'fr' => $autrefr,
            'en' => $autreen
          )
        )
      );

    // Ajouter les nouvelles données au tableau existant
    $tableau_json["phpmyadmin"]["version"] += $nouvel_element;

    // Convertir le tableau mis à jour en JSON
    if($this->modifJSON($tableau_json)!== false) {
      return true;
    } else {
      return false;
    }

  }


  /*******************ajout version***************************/

  public function getGabaritEscape($idEscapeGame){
    $req = 'SELECT eg.idPhoto, eg.prix_game, eg.niveau_parcours, eg.niveau_puzzle, v.* FROM escape_game AS eg INNER JOIN version AS v ON eg.idEscapeGame = v.idEscapeGame WHERE v.idEscapeGame = ? LIMIT 1;';
    $gabarit = $this->execReqPrep($req, array($idEscapeGame));
    return $gabarit;
  }


  public function getVersion($idVersion) {
    // récupère le JSON actuel sous forme de tableau
    $tableau_json = $this->accesJSON();

    // Données à insérer (par exemple)
    return $tableau_json["phpmyadmin"]["version"][$idVersion];
  }

  public function getEscapeLieu($idLieu){
    $req = 'SELECT escape_game.*, photo.lien_photo, version.durée FROM escape_game INNER JOIN photo ON escape_game.idPhoto = photo.idPhoto INNER JOIN version ON escape_game.idEscapeGame = version.idEscapeGame INNER JOIN lieu ON version.idLieu = lieu.idLieu WHERE lieu.idLieu = ? GROUP BY escape_game.idEscapeGame, version.durée;';
    $lieu = $this->execReqPrep($req, array($idLieu));
    return $lieu;
  }

  public function getEscape(){
    $req = 'SELECT * FROM `escape_game` WHERE 1 ;';
    $escapes = $this->execReq($req);
    return $escapes;
  }

  public function getVersionEscape($idLieu,$idEscapeGame){
    $req = 'SELECT escape_game.niveau_parcours,escape_game.niveau_puzzle,escape_game.prix_game, version.*, photo.lien_photo FROM escape_game INNER JOIN photo ON escape_game.idPhoto = photo.idPhoto INNER JOIN version ON escape_game.idEscapeGame = version.idEscapeGame INNER JOIN lieu ON version.idLieu = lieu.idLieu WHERE lieu.idLieu = ? && escape_game.idEscapeGame=? ;';
    $version = $this->execReqPrep($req, array($idLieu,$idEscapeGame));
    return $version;
  }

}   // Balise PHP non fermée pour éviter de retourner des caractères "parasites" en fin de traitement