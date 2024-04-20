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




  public function insertProduitJSON() {
      // Chemin vers le fichier JSON
    $chemin_fichier = "chemin/vers/votre_fichier.json";

    // Charger le contenu JSON existant
    $contenu_json = file_get_contents($chemin_fichier);

    // Convertir le JSON en tableau PHP
    $tableau_json = json_decode($contenu_json, true);

    // Données à insérer (par exemple)
    $nouvel_element = array(
        'id' => 1,
        'nom' => 'Produit 1',
        'prix' => 10.99
    );

    // Ajouter les nouvelles données au tableau existant
    $tableau_json[] = $nouvel_element;

    // Convertir le tableau mis à jour en JSON
    $nouveau_contenu_json = json_encode($tableau_json, JSON_PRETTY_PRINT);

    // Écrire le nouveau contenu JSON dans le fichier
    file_put_contents($chemin_fichier, $nouveau_contenu_json);

    echo "Données ajoutées avec succès au fichier JSON.";
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