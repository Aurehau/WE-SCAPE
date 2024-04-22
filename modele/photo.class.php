<?php
require_once "modele/database.class.php";

/***************************************************************
Classe chargée de la gestion des clients dans la base de données
***************************************************************/
class photo extends database {

  /*******************************************************
    Enregistrer la miniature d'un produit
        Entrée :
        $idAnimal [string] : Identifiant de l'animal
        FILES [array] : Tableau contenant les informations de l'image téléchargée

        Retour :
    *******************************************************/
    public function updateMiniatureProduit($nomfichier=""){
      global $Conf;

      if (isset($_FILES['file']['error']))
      {
        // Test si la taille du fichier uploadé est conforme
        if ($_FILES['file']['size'][0] <= 700000)
        {
          // Test si l'extension du fichier uploadé est autorisée
          $infosfichier = new SplFileInfo($_FILES['file']['name'][0]);
          $extension_upload = $infosfichier->getExtension();
          $extensions_autorisees = array('jpg', 'png', 'jpeg');
          if (in_array($extension_upload, $extensions_autorisees))
          {
    
            // Stockage définitif du fichier photo dans le dossier uploads
            move_uploaded_file($_FILES['file']['tmp_name'][0], $Conf->IMG.$nomfichier /* 'images/imgBDD/test2.png' */);
          }
          else
            throw new Exception("Echec du transfert de la photo principale : Type de fichier non autorisé.") ;
        }
        else
        throw new Exception("Echec du transfert de la photo principale : Fichier trop volumineux.");
      }
      else
      throw new Exception("Echec du transfert de la photo principale avec le code d'erreur : ".$_FILES['file']['error'][0]);
   }



  public function insertPhoto($file){
    $req = "INSERT INTO `photo` (`lien_photo`) VALUES (?)";
    $resultat = $this->execReqPrep($req, array($file));

    if($resultat==1)   // La photo se trouve dans la 1ère ligne de $resultat
      return TRUE;
    else
      return FALSE; 
  }

  public function getPhoto(){
    $req = "SELECT * FROM `photo`";
    $photos = $this->execReq($req);
    return $photos; 
  }

  //récupération de l'id d'une photo
  public function getPhotoIn($file){
    $req = "SELECT * FROM `photo` WHERE `lien_photo`= ?";
    $resultat = $this->execReqPrep($req, array($file));
    return $resultat;
  }


  public function getLastProduit(){
    $req = 'SELECT * FROM produit ORDER BY idProduit DESC LIMIT 1;';
    $lastcartescadeaux = $this->execReq($req);
    return $lastcartescadeaux;
  }

}   // Balise PHP non fermée pour éviter de retourner des caractères "parasites" en fin de traitement