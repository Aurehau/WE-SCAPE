<?php

require_once "modele/escapegame.class.php";
require_once "modele/lieu.class.php";
require_once "modele/photo.class.php";

require_once "vue/vue.class.php";
/*************************************
Classe chargée d'exécuter les actions demandées par l'utilisateur
*************************************/
class ctlescapegame {

  private $escapegame;    // Nom du fichier permettant de générer le contenu pour la vue en fonction de l'action demandée
                          // Exemple : "vue/vueAccueil.php", "vue/vueArticles.php", "vue/vueErreur.php", ...
  private $lieu;
  private $photo;
  /*******************************************************
  Initialise le nom du fichier requis pour générer le contenu à afficher dans la vue correspondant à l'action
    Entrée : 
      action [string] : action demandée

    Sortie :
      $fichierVue [string] : nom du fichier requis pour générer le contenu à afficher dans la vue

    Retour : 
      
  *******************************************************/
  public function __construct() {
    $this->escapegame = new escapegame();
    $this->lieu = new lieu();
    $this->photo = new photo();
  } 

  /*******************************************************
  Affiche dans le gabarit la vue correspondant à l'action demandée
    Entrée : 
      data [array] : tableau associatif contenant les données à afficher dans la vue
  
    Retour : 
      
  *******************************************************/

  public function adminCreerEscapeGame($idLieu) {
    $vue = new vue("AdminCreerEscapeGame"); // Instancie la vue appropriée
    $vue->afficher(array("idLieu" => $idLieu));
  }



  public function enregAdminCreerEscapeGame($idLieu){
    
    extract($_POST);
    var_dump($_POST);     /************pour test*******************/
    $message="";
    if(empty($titrefr)) $message.="Veuillez indiquer un titre en français<br>";
    if(empty($titreen)) $message.="Veuillez indiquer le titre en anglais<br>";
    if(empty($ciblefr)) $message.="Veuillez ajouter le public cibles (en français)<br>";
    if(empty($cibleen)) $message.="Veuillez ajouter le public cibles (en anglais)<br>";
    if(empty($descriptionfr)) $message.="Veuillez ajouter une description en français<br>";
    if(empty($descriptionen)) $message.="Veuillez ajouter la description en anglais<br>";

    
    if(empty($prix)) $message.="Veuillez indiquer un prix<br>";
    if(empty($duree)) $message.="Veuillez indiquer la durée de l'escape game<br>";
    if(empty($langues)) $message.="Veuillez indiquer les langues disponible pour cette escape game<br>";


    if(empty($histoirefr)) $message.="Veuillez ajouter l'histoire de l'escape game (en français)<br>";
    if(empty($histoireen)) $message.="Veuillez ajouter l'histoire de l'escape game (en anglais)<br>";
    if(empty($adressefr)) $message.="Veuillez indiquer l'adresse en français<br>";
    if(empty($adresseen)) $message.="Veuillez indiquer l'adresse en anglais<br>";


    if(empty($ville)) $message.="Veuillez indiquer la ville<br>";
    if(empty($code_postal)) $message.="Veuillez indiquer le code postale<br>";
    if(empty($transports)) $message.="Veuillez indiquer les moyens de transport disponible<br>";
    if(empty($niveauparcours)) $message.="Veuillez indiquer le niveau du parcours<br>";
    if(empty($niveaupuzzle)) $message.="Veuillez indiquer le niveau des puzzle<br>";
    if(empty($nbclient)) $message.="Veuillez indiquer le nombre maximum de client pour cette escape game<br>";

    if(empty($rdvfr)) $rdvfr="non renseigné";
    if(empty($rdven)) $rdven="not specified";
    if(empty($contientfr)) $contientfr="non renseigné";
    if(empty($contienten)) $contienten="not specified";
    if(empty($apporterfr)) $apporterfr="non renseigné";
    if(empty($apporteren)) $apporteren="not specified";
    if(empty($importantfr)) $importantfr="non renseigné";
    if(empty($importanten)) $importanten="not specified";
    if(empty($exigencefr)) $exigencefr="non renseigné";
    if(empty($exigenceen)) $exigenceen="not specified";
    if(empty($autrefr)) $autrefr="non renseigné";
    if(empty($autreen)) $autreen="not specified";
    

    //ajout a la BDD
    if (empty($message)){


      //ajout de l'images principale dans la bdd ************************************************************** 

      $bonnePhoto=$_FILES['file']["name"][0];
      $bonnePhoto = str_replace(' ', '-', $bonnePhoto);
      $bonnePhoto = str_replace("'", '_', $bonnePhoto);
      $_FILES['file']["name"][0]=$bonnePhoto;

      $photos=$this->photo->getPhoto();
      $idPhoto='';
      foreach ($photos as $value) {
        if($value['lien_photo']==$_FILES['file']["name"][0]){              //si la photo est deja enregistré on recupère son id
          $idPhoto=$this->photo->getPhotoIn($_FILES['file']["name"][0]);
        }
      }
      if($idPhoto==''){
        $this->photo->insertPhoto($_FILES['file']["name"][0]);            //si la photo n'est pas deja enregistré on l'ajoute a la bdd et on recupère son id
        $idPhoto=$this->photo->getPhotoIn($_FILES['file']["name"][0]);
      }

      $idPhoto=$idPhoto[0]['idPhoto'];
      //var_dump($idPhoto);
      
      //var_dump('lalalalallalalalaal');
      //var_dump($_FILES['files']);
      //miniature
      if(isset($_FILES['file']) && $_FILES['file']['error'][0] != 4){
        //var_dump("coucou");
        $this->photo->updateMiniatureProduit($_FILES['file']["name"][0]);
      }

      //ajout des autre images ici pour pas ajouter une partie du contenu plusieur fois a cause des erreur de poids ********************************************

      //autre photo
      $photos=$this->photo->getPhoto();
      $idPhotos=[];
      $id1Photo='';

      if(isset($_FILES['files']) && $_FILES['files']['error'][0] != 4){
          for ($i = 0; $i <= count($_FILES['files']['error'])-1; $i++) {
            $id1Photo='';
      //retirer élément problématique pour la suite
            $bonnePhoto=$_FILES['files']["name"][$i];
            $bonnePhoto = str_replace(' ', '-', $bonnePhoto);
            $bonnePhoto = str_replace("'", '_', $bonnePhoto);
            $_FILES['files']["name"][$i]=$bonnePhoto;
          //ajout a la bdd
            foreach ($photos as $value) {
              if($value['lien_photo']==$_FILES['files']["name"][$i]){              //si la photo est deja enregistré on recupère son id
                $id1Photo=$this->photo->getPhotoIn($_FILES['files']["name"][$i]);
                $idPhotos[]=$id1Photo[0]['idPhoto'];
              }
            }
            if($id1Photo==''){
              $this->photo->insertPhoto($_FILES['files']["name"][$i]);            //si la photo n'est pas deja enregistré on l'ajoute a la bdd et on recupère son id
              $id1Photo=$this->photo->getPhotoIn($_FILES['files']["name"][$i]);
              $idPhotos[]=$id1Photo[0]['idPhoto'];
            }
            //ajout des photos dans le dossier imgBDD/
            $this->photo->updatePhotosProduit($i, $_FILES['files']["name"][$i]);
            var_dump($idPhotos);
          }  
        }



      if ($this->escapegame->insertEscapeGame($idPhoto, $prix, $niveauparcours, $niveaupuzzle)){
        $idEscapeGame=$this->escapegame->getLastEscapeGame();
        //var_dump($idProduit);

        $this->escapegame->insertEscapeGameJSON($idEscapeGame[0]['idEscapeGame'],$titrefr, $titreen,$ciblefr,$cibleen);


        //traitement des tableaux 
        $langues=json_encode($langues);

        $parking = 0;
        $train = 0;
        $bus = 0;
        foreach ($transports as $key => $value) {
          if($value=='parking'){
            $parking = 1;
          }
          if($value=='train'){
            $train = 1;
          }
          if($value=='bus'){
            $bus = 1;
          }
        }

        if ($this->escapegame->insertVersion($idEscapeGame[0]['idEscapeGame'], $idLieu, $duree, $langues, $ville, $code_postal, $coordonne, $parking, $train, $bus,$nbclient)){
          $idVersion=$this->escapegame->getLastVersion();
          //var_dump($idProduit);
  
          $this->escapegame->insertVersionJSON($idVersion[0]['idEscapeGame'],$histoirefr, $histoireen,$descriptionfr,$descriptionen,$adressefr,$adresseen,$rdvfr,$rdven,$contientfr,$contienten,$apporterfr,$apporteren,$importantfr,$importanten,$exigencefr,$exigenceen,$autrefr,$autreen);

          if(isset($_FILES['files']) && $_FILES['files']['error'][0] != 4){
              //attribution des photos au produit
              foreach ($idPhotos as $value) {
                if($this->photo->insertPhotosEscapeGame($idVersion[0]['idVersion'], $value)){

                }
                else
                  throw new Exception("Echec de l'enregistrement des photos de l'escape game");
              }
          }
          header('Location: index.php?produit=ajoute');
          exit;
        }
        else
          throw new Exception("Echec de l'enregistrement du nouvelle escape game");
      }
      else
        throw new Exception("Echec de l'enregistrement du nouvelle escape game");
    }
    else {
      $vue = new vue("AdminAjoutCarte"); // Instancie la vue appropriée
      $vue->afficher(array("message"=> $message));
    }


    // $this->client->insertClient($nom, $prenom, $age, $adresse, $ville, $mail);
    // $clients = $this->client->getClients();
    // $vue = new vue("Clients"); // Instancie la vue appropriée
    // $vue->afficher(array("clients" => $clients));
  }


  /*****************************************************/
  /*                ajout d'une version                */
  /*****************************************************/

  public function adminCreerVersion($idLieu) {
    extract($_POST);
    //var_dump($_POST);     /************pour test*******************/
    $message="";
    if(empty($idEscapeGame)) $message.="Veuillez indiquer l'escape game à ajouter au lieu<br>";

    if (empty($message)){
      $gabaritEscape = $this->escapegame->getGabaritEscape($idEscapeGame);
      $gabEscapetrad = $this->escapegame->getVersion($gabaritEscape[0]['idVersion']);
      $vue = new vue("AdminCreerVersion"); // Instancie la vue appropriée
      $vue->afficher(array("idLieu" => $idLieu, "gabaritEscape" => $gabaritEscape, "gabEscapetrad" => $gabEscapetrad));
    }
    else {
      $vue = new vue("Lieu"); // Instancie la vue appropriée
      $vue->afficher(array("message"=> $message));
    }
  }

  public function enregAdminCreerVersion($idLieu, $idEscapeGame){
    
    extract($_POST);
    var_dump($_POST);     /************pour test*******************/
    $message="";
    
    if(empty($descriptionfr)) $message.="Veuillez ajouter une description en français<br>";
    if(empty($descriptionen)) $message.="Veuillez ajouter la description en anglais<br>";

    
    if(empty($duree)) $message.="Veuillez indiquer la durée de l'escape game<br>";
    if(empty($langues)) $message.="Veuillez indiquer les langues disponible pour cette escape game<br>";


    if(empty($histoirefr)) $message.="Veuillez ajouter l'histoire de l'escape game (en français)<br>";
    if(empty($histoireen)) $message.="Veuillez ajouter l'histoire de l'escape game (en anglais)<br>";
    if(empty($adressefr)) $message.="Veuillez indiquer l'adresse en français<br>";
    if(empty($adresseen)) $message.="Veuillez indiquer l'adresse en anglais<br>";


    if(empty($ville)) $message.="Veuillez indiquer la ville<br>";
    if(empty($code_postal)) $message.="Veuillez indiquer le code postale<br>";
    if(empty($transports)) $message.="Veuillez indiquer les moyens de transport disponible<br>";
    if(empty($nbclient)) $message.="Veuillez indiquer le nombre maximum de client pour cette escape game<br>";

    if(empty($rdvfr)) $rdvfr="non renseigné";
    if(empty($rdven)) $rdven="not specified";
    if(empty($contientfr)) $contientfr="non renseigné";
    if(empty($contienten)) $contienten="not specified";
    if(empty($apporterfr)) $apporterfr="non renseigné";
    if(empty($apporteren)) $apporteren="not specified";
    if(empty($importantfr)) $importantfr="non renseigné";
    if(empty($importanten)) $importanten="not specified";
    if(empty($exigencefr)) $exigencefr="non renseigné";
    if(empty($exigenceen)) $exigenceen="not specified";
    if(empty($autrefr)) $autrefr="non renseigné";
    if(empty($autreen)) $autreen="not specified";
    

    //ajout a la BDD
    if (empty($message)){


      //ajout des autre images ici pour pas ajouter une partie du contenu plusieur fois a cause des erreur de poids ********************************************


      //autre photo
      $photos=$this->photo->getPhoto();
      $idPhotos=[];
      $id1Photo='';

      if(isset($_FILES['files']) && $_FILES['files']['error'][0] != 4){
          for ($i = 0; $i <= count($_FILES['files']['error'])-1; $i++) {
            $id1Photo='';

            $bonnePhoto=$_FILES['files']["name"][$i];
            $bonnePhoto = str_replace(' ', '-', $bonnePhoto);
            $bonnePhoto = str_replace("'", '_', $bonnePhoto);
            $_FILES['files']["name"][$i]=$bonnePhoto;
          //ajout a la bdd
            foreach ($photos as $value) {
              if($value['lien_photo']==$_FILES['files']["name"][$i]){              //si la photo est deja enregistré on recupère son id
                $id1Photo=$this->photo->getPhotoIn($_FILES['files']["name"][$i]);
                $idPhotos[]=$id1Photo[0]['idPhoto'];
              }
            }
            if($id1Photo==''){
              $this->photo->insertPhoto($_FILES['files']["name"][$i]);            //si la photo n'est pas deja enregistré on l'ajoute a la bdd et on recupère son id
              $id1Photo=$this->photo->getPhotoIn($_FILES['files']["name"][$i]);
              $idPhotos[]=$id1Photo[0]['idPhoto'];
            }
            //ajout des photos dans le dossier imgBDD/
            $this->photo->updatePhotosProduit($i, $_FILES['files']["name"][$i]);
            var_dump($idPhotos);
          }  
        }


        //traitement des tableaux 
        $langues=json_encode($langues);

        $parking = 0;
        $train = 0;
        $bus = 0;
        foreach ($transports as $key => $value) {
          if($value=='parking'){
            $parking = 1;
          }
          if($value=='train'){
            $train = 1;
          }
          if($value=='bus'){
            $bus = 1;
          }
        }

        if ($this->escapegame->insertVersion($idEscapeGame, $idLieu, $duree, $langues, $ville, $code_postal, $coordonne, $parking, $train, $bus,$nbclient)){
          $idVersion=$this->escapegame->getLastVersion();
          //var_dump($idProduit);
  
          $this->escapegame->insertVersionJSON($idVersion[0]['idEscapeGame'],$histoirefr, $histoireen,$descriptionfr,$descriptionen,$adressefr,$adresseen,$rdvfr,$rdven,$contientfr,$contienten,$apporterfr,$apporteren,$importantfr,$importanten,$exigencefr,$exigenceen,$autrefr,$autreen);

          if(isset($_FILES['files']) && $_FILES['files']['error'][0] != 4){

              //attribution des photos au produit
              foreach ($idPhotos as $value) {
                if($this->photo->insertPhotosEscapeGame($idVersion[0]['idVersion'], $value)){

                }
                else
                  throw new Exception("Echec de l'enregistrement des photos de l'escape game");
              }
          }
          header('Location: index.php?produit=ajoute');
          exit;
        }
        else
          throw new Exception("Echec de l'enregistrement de l'escape game pour ce lieu");
    }
    else {
      $vue = new vue("AdminAjoutCarte"); // Instancie la vue appropriée
      $vue->afficher(array("message"=> $message));
    }


    // $this->client->insertClient($nom, $prenom, $age, $adresse, $ville, $mail);
    // $clients = $this->client->getClients();
    // $vue = new vue("Clients"); // Instancie la vue appropriée
    // $vue->afficher(array("clients" => $clients));
  }


//affichage page d'un escape game
  public function escapeGame($idLieu,$idEscapeGame){

    $version = $this->escapegame->getVersionEscape($idLieu,$idEscapeGame);
    $idVersion=$version[0]['idVersion'];
    $imgescape = $this->photo->getIMGEscape($idVersion);
    $vue = new vue("EscapeGame"); // Instancie la vue appropriée
    $vue->afficher(array("version" => $version, "imgescape" => $imgescape));

  }

}